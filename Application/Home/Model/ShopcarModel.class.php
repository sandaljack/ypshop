<?php

namespace Home\Model;

use Think\Model;

class ShopcarModel extends Model
{
	protected $tableName = 'shopcar';
    protected $redis;
     //初始化先执行
    public function _initialize()
    {   
         //配置redis
        C('DATA_CACHE_PREFIX', 'Redis_');
        C('DATA_CACHE_TYPE', 'Redis');
        $this->redis = new \Redis();
        $this->redis->connect('localhost', 6379);        
    }

	 /**
     * 获取当前用户的商品在数据库的数量
     * @param $gid  商品id
     * @param $color  商品颜色
     * @param $size  商品尺寸
     * @param $userId    用户id
     * @return mixed
     */
	public function getGoodsCount($gid, $color, $size,$userId)
	{
		$map = [
            'goods_id'=>$gid,
            'user_id' =>$userId,
            'color'   =>$color,
            'size'    =>$size
        ];
        return $this->where($map)->getField('nums');
	}

	/**
     * 数据库存在当前商品数量,则加上传过来的数量,再保存总数量
     * @param $gid    商品id
     * @param $color    商品颜色
     * @param $size    商品尺码
     * @param $nums       购买的数量
     * @param $userId      当前登录用户id
     * @return boolean
     */
    public function saveGoodsCount($gid, $color, $size, $nums, $userId)
    {
    	$map = [
            'goods_id'=>$gid,
            'color'   =>$color,
            'size'    =>$size,
            'user_id' =>$userId
        ];
       return  $this->where($map)->setInc('nums', $nums);
    }

    /**
     * 直接改变数据库当前商品的数量
     * @param  $gid  商品id
     * @param  $color  商品颜色
     * @param  $size  商品尺寸
     * @param  $nums     购买数量
     * @param  $userId   当前登录用户id
     * @return boolean         
     */
    public function changeGoodsCount($gid, $color, $size, $nums, $userId)
    {
        $map = [
            'goods_id'=>$gid,
            'color'   =>$color,
            'size'    =>$size,
            'user_id' =>$userId
        ];
        return  $this->where($map)->save(['nums'=>$nums]);
    }
    /**
     * 没有当前商品数量的时候,直接添加
     * @param $gid  商品id
     * @param $color  商品颜色
     * @param $size   商品尺寸
     * @param $nums     购买的数量
     * @param $userId    当前登录用户id
     * @return mixed
     */
    public function addGoodsCount($gid, $color, $size, $nums, $userId)
    {
        $data = [
            'nums'    =>$nums,
            'color'   =>$color,
            'size'    =>$size,
            'goods_id'=>$gid,
            'user_id' =>$userId
        ];
        return $this->add($data);
    }
    /**
     * 删除购物车数据库对应的商品
     * @param  $gid 商品id
     * @param  $color 商品颜色
     * @param  $size 商品尺寸
     * @param  $userId   用户id
     * @return boolean    
     */
    public function removeGoods($gid, $color, $size, $userId)
    {
        $data = [
            'goods_id'=>$gid,
            'color'   =>$color,
            'size'    =>$size,
            'user_id' =>$userId
        ];
        return $this->where($data)->delete();
    }
    /**
     * 查询商品信息
     * @param  [type] $gid 商品id
     * @param  [type] $color 商品颜色
     * @param  [type] $size 商品尺码
     * @return arry
     */
    public function getGoodsInfo($gid, $color, $size)
    {
        $model = M('goods_price');
        $map = [
            'goods_id'  =>  $gid,
            'color'     =>  $color,
            'size'      =>  $size
        ];
        $info = $model->field('goods_id,store,color,size,price')
        ->where($map)->find();
        $model2  = M('goods'); 
        $info2 = $model2->field('id,goods_name,pic_path')
        ->where(['id'=>$gid])->find();
        $info['goods_name'] = $info2['goods_name'];
        $info['pic_path'] = $info2['pic_path'];
        return $info;
    }
    /**
     * 先查数据库商品信息在保存在redis(从详情进来)
     * @param  [type] $gid  商品id
     * @param  [type] $nums 商品数量
     * @param  [type] $color 商品颜色
     * @param  [type] $size 商品尺寸
     * @return array       商品信息
     */
    public function getFirstMysqlGoods($gid, $nums, $color, $size)
    {
        //得到该商品的信息
        $info = $this->getGoodsInfo($gid, $color, $size);
        //减少库存
        if ( $nums <= $info['store']) { 
            $info['store'] = $info['store'] - $nums;
        }
        // session('shopcar', session_id());
        // 将数据转为json
        $value = json_encode($info);
        $gname = $gid.':'.$color.':'.$size;
        //将该商品信息存入redis
        $this->redis->hset('goods', $gname, $value);
        $this->redis->sadd('sgoods', $gname);
        $this->redis->expire('goods', 3600);
        $this->redis->expire('sgoods', 3600);

        return $info;
    }
    /**
     * 从数据库查该商品信息
     * @param  [type] $gid 商品id
     * @param  [type] $color 商品颜色
     * @param  [type] $size 商品尺码
     * @return array
     */
    public function getMysqlGoods($gid, $color, $size)
    {
        //得到该商品的信息
        $info = $this->getGoodsInfo($gid, $color, $size);
        return $info;
    }
    /**
     * 用户的购物车信息存入redis
     * @param  [type] $gname 商品查询名字
     * @param  [type] $nums 商品数量
     * @param  [type] $info 商品信息
     * @param  [type] $sid  sessionid
     * @return [type]       [description]
     */
    public function getRedisUser($gname, $nums, $info, $sid)
    {
        //判断该用户是否存在该商品数据
        $userCar= $this->redis->hget('userCar:'.$sid, $gname);
        
        if (empty($userCar)) {
            $userCar['nums'] = $nums;
            $userCar['goods_id'] = $info['goods_id'];
            $userCar['goods_name'] = $info['goods_name'];
            $userCar['price'] = $info['price'];
            $userCar['pic_path'] = $info['pic_path'];
            $userCar['color'] = $info['color'];
            $userCar['size'] = $info['size'];
        } else {
            $userCar = json_decode($userCar, true);
            $userCar['nums'] = $userCar['nums'] + $nums;
        }
        //用户的购物车数据
        $userCarData = json_encode($userCar);
        $this->redis->hset('userCar:'.$sid, $gname, $userCarData );
        $this->redis->sadd('userCarGoods:'.$sid, $gname);
        // $this->redis->sadd('userId', $sid);
        //设置过期时间
        $this->redis->expire('userCar:'.$sid, 604800);
        $this->redis->expire('userCarGoods:'.$sid, 604800);
        
    }
    /**
     * 查redis对应商品信息并减少数量
     * @param  $gname  商品查询名
     * @param   $nums  商品数量
     * @return array       [description]
     */
    public function saveRedisGoods($gname, $nums)
    {
        //将redis该商品的数据转换为数组
        $info = $this->redis->hget('goods', $gname);
        $info = json_decode($info, true);
        //判断传过来该商品的数量是否大于redis里的数量
        if ( $nums <= $info['store']) {
            $info['store'] = $info['store'] - $nums;
        } 
        $value = json_encode($info);
        //更新库存
        $this->redis->hset('goods', $gname, $value);
        return $info;
    }

    /**
     * 得到redis对应商品信息
     * @param  [type] $gname 商品查询名
     * @return array
     */
    public function getRedisGoods($gname)
    {
        //将redis该商品的数据转换为数组
        $info = $this->redis->hget('goods', $gname);
        $info = json_decode($info, true);
        return $info;
    }
    

    /**
     * 更新redis商品库存
     * @param  [type] $gname 商品查询名
     * @param  [type] $info  更新信息
     * @return 影响行号
     */
    public function upRedisGoods($gname, $info)
    {
        $value = json_encode($info);
        //更新库存
        $info = $this->redis->hset('goods', $gname, $value);
        return $info;
    }

    
}