<?php

namespace Home\Controller;

use Think\Controller;

//购物车控制器
class ShopcarController extends CommonController
{	
	// a.用户没有登录时候，点击商品详情页的加入购物车的按钮，就可以将数据加入到redis,用户登录后在数据存到数据库
	// c.使用ajax局部刷新技术对商品数量进行修改和删除
	// b.使用session技术对购物车数据存储，可以使商品在购物车存放7天
	protected $redis;
    //商品id
    protected $gid; 
    //购物车商品数量
    protected $nums;
    //商品颜色
    protected $color;
    //商品尺寸
    protected $size;
    //模型
    protected $model;
    //初始化先执行
    public function __construct()
    {   
        parent::__construct(); 
         //配置redis
        C('DATA_CACHE_PREFIX', 'Redis_');
        C('DATA_CACHE_TYPE', 'Redis');
        $this->redis = new \Redis();
        $this->redis->connect('localhost', 6379); 
        //初始化模型
        $this->model = D('Shopcar');          
    }
    
    
    //处理购物车数据
    public function shopCar()
    {		     
        //判断是否登陆
        $userinfo = session('homeInfo')['id'];
        //得到详情页传过来的商品id
        $this->gid = I('get.gid');      
        //得到详情页传过来的商品数量
        $this->nums = I('get.nums');
        //得到详情页传过来的商品颜色
        $this->color = I('get.color');
        //得到详情页传过来的商品尺寸
        $this->size = I('get.size');
        $gname = $this->gid.':'.$this->color.':'.$this->size;
        //未登录，购物车没有商品将商品信息放redis中
		if (!$userinfo) {    
            session('id', session_id());  
            //判断redis里是否有对应商品的数据,没有就添加 goods为session_id 
			if (empty($this->redis->hget('goods', $gname))) {
                if ($this->gid != '') {
                    //得到该商品的信息
                    $info = $this->model->getFirstMysqlGoods($this->gid, $this->nums, $this->color, $this->size);
                    //用户的购物车信息存入redis
                    //判断该用户是否存在该商品数据
                    $this->model->getRedisUser($gname, $this->nums, $info, session_id());
                }                       
            //有对应商品数据，改变商品数量          
			} else {
                //查redis对应商品信息减少库存
                $info = $this->model->saveRedisGoods($gname, $this->nums);
                 //用户的购物车信息存入redis
                //判断该用户是否存在该商品数据
                $this->model->getRedisUser($gname, $this->nums, $info, session_id());
			}
		} else { 
            //已登录,判断redis是否有该商品的信息和当前用户购物车数据，有就加入到数据库再删除
            if ($this->redis->hgetall('userCar:'.session_id())) {
                //获取当前用户所有商品的id
                $gnames = $this->redis->smembers('userCarGoods:'.session_id());
                
                foreach ($gnames as $k=>$v) {
                    $jsdata = $this->redis->hget('userCar:'.session_id(), $v);
                    $data = json_decode($jsdata, true);
                    //判断是否从详情页过来的数量
                    if ($v == $gname) {
                        $data['nums'] = $data['nums'] + $this->nums;
                    }
                    //将gname的gid,color,size切割字符串
                    $res = explode(':', $v);
                    $gid = $res[0];
                    $color = $res[1];
                    $size = $res[2];
                    //先查看当前用户购物车是否已经有这个商品
                    $goods_count = $this->model->getGoodsCount($gid, $color, $size, session('homeInfo')['id']);
                    //有就追加数量  
                    if ($goods_count) {
                        $this->model->saveGoodsCount($gid, $color, $size, $data['nums'], session('homeInfo')['id']);
                    } else {
                    //没有就增加当前商品
                        $this->model->addGoodsCount($gid, $color, $size, $data['nums'], session('homeInfo')['id']);
                    }      
                }             
                //数据库合并完成清空redis里用户购物车的数据
                $this->redis->del('userCar:'.session_id());
                $this->redis->del('userCarGoods:'.session_id());

            }  else {
                //已登录,查看redis是否有该商品数据
                if (empty($this->redis->hget('goods', $gname))) {
                    if ($this->gid != '') {
                        //得到该商品的信息
                        $info = $this->model->getFirstMysqlGoods($this->gid, $this->nums, $this->color, $this->size);
                    }
                 }
                //已登录,redis里没有购物车数据，直接将数据保存到数据库,
                //先查看当前用户购物车是否已经有这个商品
                if ($this->gid != '') {
                    $goods_count = $this->model->getGoodsCount($this->gid, $this->color, $this->size,session('homeInfo')['id']);
                    //如果存在数量
                    if($goods_count) {
                        $this->model->saveGoodsCount($this->gid, $this->color, $this->size, $this->nums, session('homeInfo')['id']);
                    } else {
                        $this->model->addGoodsCount($this->gid, $this->color, $this->size, $this->nums, session('homeInfo')['id']);
                    }
                    //查redis对应商品信息减少库存
                    $info = $this->model->saveRedisGoods($gname, $this->nums);
                }
                
            }
			                    
		}
        //跳到购物车展示方法
	   $this->redirect('showCar');  	
    }
    
    //展示购物车页面
    public function showCar()
    {
        //判断是否登陆
        $userinfo = session('homeInfo')['id'];
        //如果没登录，返回redis里的数据
        if (!$userinfo) {
            $gids = $this->redis->smembers('userCarGoods:'.session_id());
            foreach ($gids as $v) {
                $jsdata = $this->redis->hget('userCar:'.session_id(), $v);
                if ($jsdata != '') {
                    $data[] = json_decode($jsdata, true);
                }   
            }
        } else {
        //已登录，返回数据库数据
             $model = M('shopcar s');  
             $data = $model->field('s.user_id,s.goods_id,s.total,s.nums,p.store,p.color,p.size,p.price,g.goods_name,g.pic_path')
             ->join('yp_goods_price p on s.goods_id=p.goods_id and s.color=p.color and s.size=p.size')
             ->join('yp_goods g on g.id=s.goods_id')
             ->where(['s.user_id'=>session('homeInfo')['id']])->select();
        }

        // dump(session_id());
        
        //将数据返回给购物车页面
        $this->assign('list', $data);

        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
            $this->assign('link', $flink);
        //显示购物车页面
        $this->display('Shopcar/shopcar');


    }

    //ajax处理增加数量
    public function addNum() 
    {       
        //判断是否登陆
        $userinfo = session('homeInfo')['id'];
        //获得商品id
        $this->gid = I('post.id');
        //获得商品数量
        $this->nums = I('post.nums');
        //获得商品颜色
        $this->color = I('post.color');
        //获得商品尺寸
        $this->size = I('post.size');
        $gname = $this->gid.':'.$this->color.':'.$this->size;

        if (empty($this->redis->hget('goods', $gname))) {
            $info = $this->model->getMysqlGoods($this->gid, $this->color, $this->size);
        } else {
            //根据id去查对应商品的库存
            $info = $this->model->getRedisGoods($gname);
        }
 
        //如果库存大于0才修改
        if ($info['store'] > 0) {
            //库存减1
            $info['store'] = $info['store'] -1 ;
            //未登录去改redis数据，登陆改数据库shopcar的数据
            if (!$userinfo) {
                $userCar = $this->redis->hget('userCar:'.session_id(), $gname);
                $userCar = json_decode($userCar, true);
                $userCar['nums'] = $userCar['nums'] + 1;
                $userCarData = json_encode($userCar);
                $this->redis->hset('userCar:'.session_id(), $gname, $userCarData);
            } else {
            //登陆就改变数量在shopcar数据库
                $this->model->changeGoodsCount($this->gid, $this->color, $this->size,$this->nums, session('homeInfo')['id']); 
            }
            //更新库存表的数据
             $this->model->upRedisGoods($gname, $info);   
            //成功返回1
            $this->ajaxreturn(1);
        //库存不大于0
        } else {
            //失败返回2
            $this->ajaxreturn(2);
        }
         
    }

    //ajax直接改变商品数量
    public function changeNum()
    {
        //判断是否登陆
        $userinfo = session('homeInfo')['id'];
        //获取商品ID
        $this->gid = I('post.id');
        //获取改变的商品数量
        $this->nums = I('post.nums');
        //获取原来的商品数量
        $this->orinums = I('post.orinums');
        //获得商品颜色
        $this->color = I('post.color');
        //获得商品尺寸
        $this->size = I('post.size');
        $gname = $this->gid.':'.$this->color.':'.$this->size;

        //判断现在数量是否大于原来的数量
        if ($this->nums >= $this->orinums) {
            $stonums = ($this->nums) - ($this->orinums);
        } else {
            $stonums = ($this->orinums) - ($this->nums);
        }

        if (empty($this->redis->hget('goods', $gname))) {
            $info = $this->model->getMysqlGoods($this->gid, $this->color, $this->size);
        } else {
            //查对应商品的库存
            $info = $this->model->getRedisGoods($gname);
        }

        //如果库存大于0才修改
        if (($this->nums) >= ($this->orinums)) {
            if ($info['store'] >= $stonums) {
                //减库存
                $info['store'] = $info['store'] - $stonums ;

                //未登录去改redis数据，登陆改数据库shopcar的数据
                if (!$userinfo) {
                    $userCar = $this->redis->hget('userCar:'.session_id(), $gname);
                    $userCar = json_decode($userCar, true);
                    $userCar['nums'] = $this->nums;
                    $userCarData = json_encode($userCar);
                    $this->redis->hset('userCar:'.session_id(), $gname, $userCarData);
                } else {
                //登陆就改变数量在shopcar数据库
                    $this->model->changeGoodsCount($this->gid, $this->color, $this->size, $this->nums, session('homeInfo')['id']); 
                }
                //更新库存表的数据
                $this->model->upRedisGoods($gname, $info);       

                //成功返回1
                $this->ajaxreturn(1);
                //库存不大于1
            } else {
                    //失败返回2
                    $this->ajaxreturn(2);
            } 
        } else {
            $info['store'] = $info['store'] + $stonums;
            //未登录去改redis数据，登陆改数据库shopcar的数据
            if (!$userinfo) {
                $userCar = $this->redis->hget('userCar:'.session_id(), $gname);
                $userCar = json_decode($userCar, true);
                $userCar['nums'] = $this->nums;
                $userCarData = json_encode($userCar);
                $this->redis->hset('userCar:'.session_id(), $gname, $userCarData);
            } else {
            //登陆就改变数量在shopcar数据库
                $this->model->changeGoodsCount($this->gid, $this->color, $this->size, $this->nums, session('homeInfo')['id']); 
            }
            //更新库存表的数据
            $this->model->upRedisGoods($gname, $info);   
             
            $this->ajaxreturn(1);  
        }
        
    }

    //ajiax处理减少数量
    public function delNum()
    {   
        //判断是否登陆
        $userinfo = session('homeInfo')['id'];
        // $userinfo['id'] = 1;
        //获取商品ID
        $this->gid = I('post.id');
        //获取商品的数量
        $this->nums = I('post.nums');
        //获得商品颜色
        $this->color = I('post.color');
        //获得商品尺寸
        $this->size = I('post.size');
        $gname = $this->gid.':'.$this->color.':'.$this->size;
        //库存表
        if (empty($this->redis->hget('goods', $gname))) {
            $info = $this->model->getMysqlGoods($this->gid, $this->color, $this->size);
        } else {
            //根据id去查对应商品的库存
            $info = $this->model->getRedisGoods($gname);
        }
        
        $info['store'] = $info['store'] + 1 ;

        //未改变登录，改变redis数据
        if (!$userinfo) {
            $userCar = $this->redis->hget('userCar:'.session_id(), $gname);
            $userCar = json_decode($userCar, true);
            $userCar['nums'] = $userCar['nums'] - 1;
            $userCarData = json_encode($userCar);
            $this->redis->hset('userCar:'.session_id(), $gname, $userCarData);
        } else {
            //登录改变shopcar数据数据
            $this->model->changeGoodsCount($this->gid, $this->color, $this->size, $this->nums, session('homeInfo')['id']);
        }
        //更新库存表数据
        $this->model->upRedisGoods($gname, $info);   
        
        //成功返回1
        $this->ajaxreturn(1);
    }    

    //ajax处理删除对应购物车商品数据
    public function delGoods()
    {
         //判断是否登陆
        $userinfo = session('homeInfo')['id'];
        // $userinfo['id'] = 1;
        //获取商品ID
        $this->gid = I('post.id');
        //获取商品数量
        $this->nums = I('post.nums');
        //获得商品颜色
        $this->color = I('post.color');
        //获得商品尺寸
        $this->size = I('post.size');
        $gname = $this->gid.':'.$this->color.':'.$this->size;

        if (empty($this->redis->hget('goods', $gname))) {
            $info = $this->model->getMysqlGoods($this->gid, $this->color, $this->size);
        } else {
            //查对应商品的库存
            $info = $this->model->getRedisGoods($gname);
        }

        $info['store'] = $info['store'] + $this->nums ;
        
        // //更新库存表数据
        $this->model->upRedisGoods($gname, $info);        
  
        if (!$userinfo) {
            //没登录删除redis对应的商品数据
           $this->redis->hdel('userCar:'.session_id(), $gname);
           $this->redis->srem('userCarGoods:'.session_id(), $gname);
           $this->ajaxreturn(1);
        } else {
            //登录删除shopcar数据库的对应的商品数据
           $this->model->removeGoods($this->gid, $this->color, $this->size, session('homeInfo')['id']);
           $this->ajaxreturn(1);
        }

    }

    //ajax处理删除购物车多条商品数据
    public function delAllGoods()
    {   
         //判断是否登陆
        $userinfo = session('homeInfo')['id'];
        //获取商品ID
        $this->gid = I('post.id');
        //获取商品数量
        $this->nums = I('post.nums');
         //获得商品颜色
        $this->color = I('post.color');
        //获得商品尺寸
        $this->size = I('post.size');
        
        //去除右边', '
        //字符串切割为数组
        $gid = explode(',', rtrim($this->gid, ', '));
        $nums = explode(',', rtrim($this->nums, ', '));
        $color = explode(',', rtrim($this->color, ', '));
        $size = explode(',', rtrim($this->size, ', '));

        //加上删除的数量在库存
        for($i=0; $i<count($gid); $i++) {
            $gname = $gid[$i].':'.$color[$i].':'.$size[$i];
            //库存表
            if (empty($this->redis->hget('goods', $gname))) {
                $info = $this->model->getMysqlGoods($gid[$i], $color[$i], $size[$i]);
            } else {
                //根据id去查对应商品的库存
                $info = $this->model->getRedisGoods($gname);
            }
            //更新库存表数据
            $info['store'] = $info['store'] + $nums[$i];
            $this->model->upRedisGoods($gname, $info);   
        }
      
        if (!$userinfo) {
            //没登陆删除redis所有数据
            foreach ($gid as $k=>$v) {
                $gname = $v.':'.$color[$k].':'.$size[$k];
                $this->redis->hdel('userCar:'.session_id(), $gname);
                $this->redis->srem('userCarGoods:'.session_id(), $gname);
            }
             $this->ajaxreturn(1);
        } else {
            foreach ($gid as $k=>$v) {
                $this->model->removeGoods($v, $color[$k], $size[$k], session('homeInfo')['id']);        
            }
            $this->ajaxreturn(1);
        }
    }

    //结算ajax返回判断登陆
    public function isLogin()
    {
        //判断是否登陆
        $userinfo = session('homeInfo')['id'];

        if (!$userinfo) {
            $this->ajaxreturn(2);
        } else {
            $this->ajaxreturn(1);
        }
    }

    
}