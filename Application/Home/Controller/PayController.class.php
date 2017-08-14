<?php

namespace Home\Controller;

use Think\Controller;

class PayController extends CommonController
{
	//初始化先执行
    public function __construct()
    {   
        parent::__construct(); 
    	//初始化模型
        $this->model = D('Pay');  
    }

    //显示结算页面
    public function payCarInfo()
    {   
        // dump(session());
        //判断是否登陆
        $userinfo = session('homeInfo')['id'];
        // $userinfo['id'] = 1;
        //获得要结算的id字符串
        if (I('get.lgid') != '') {
            $gid = I('get.lgid');
            $nums = I('get.lnums');
            $color = I('get.lcolor');
            $size = I('get.lsize');
        }
        if (I('get.gid') != '') {
            $gid = explode(',', rtrim(I('get.gid'), ', '));
            $color = explode(',', rtrim(I('get.color'), ', '));
            $size = explode(',', rtrim(I('get.size'), ', '));
            $nums = 'car';
        }     
        

        if (!$userinfo) {
            //没登录跳去登录页面
           $this->redirect('Login/login'); 
        } else {
            if (I('get.gid') != '') {
                     //查商品和购物车信息
                $model = M('shopcar s');
                $map['user_id'] = session('homeInfo')['id'];
                //只结算选中的商品
                foreach ($gid as $k=>$v) {
                    $map['s.goods_id'] = $v;
                    $map['s.color'] = $color[$k];
                    $map['s.size'] = $size[$k];
                    $data[] = $model->field('s.user_id,s.goods_id,s.total,s.nums,p.store,p.color,p.size,p.price,g.goods_name,g.pic_path')
                    ->join('yp_goods_price p on s.goods_id=p.goods_id and s.color=p.color and s.size=p.size')
                    ->join('yp_goods g on g.id=s.goods_id')
                    ->where($map)->select();
                }
            }
           
            if (I('get.lgid') != '') {
                $ldata = M('goods')->field('goods_name,pic_path')
                ->where(['id'=>$gid, 'color'=>$color, 'size'=>$size])->find();
                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$gid, 'color'=>$color, 'size'=>$size])->find();
                $ldata['nums'] = $nums;
                $ldata['color'] = $color;
                $ldata['size'] = $size;
                $ldata['price'] = $price['price'];
                $ldata['goods_id'] = $price['goods_id'];
            }

            //查用户的地址信息
            $addInfo = M('address')->field('id,add_name,add_province,add_city,add_area,add_town,add_detail,add_phone,add_default')
                        ->where(['user_id'=>session('homeInfo')['id']])->order('add_default desc')->select();
            //获取地址数量
            $addcount = 0;
            foreach( $addInfo as $k) {
            	$addcount++;
            }
            // dump($ldata);
            if (I('get.lgid') != '') {
                //返回商品id
                $this->assign('gid', $gid);
                //返回商品颜色
                $this->assign('color', $color);
                //返回商品尺寸
                $this->assign('size', $size);
                //返回列表页跳过来商品数量
                $this->assign('nums', $nums);
            }

            if (I('get.gid') != '') {
                 //返回商品id
                $this->assign('gid', I('get.gid'));
                //返回商品颜色
                $this->assign('color', I('get.color'));
                //返回商品尺寸
                $this->assign('size', I('get.size'));
                //返回列表页跳过来商品数量
                $this->assign('nums', $nums);
            }

            //返回地址数量
            $this->assign('addcount', $addcount);
            //返回地址新消息
            $this->assign('addinfo', $addInfo);
            //返回购物车信息
            $this->assign('carinfo', $data);
            //返回查到的信息
            $this->assign('listinfo', $ldata);
            $this->assign('session', session('homeInfo'));
            $flink = M('friendlink')->select();
            $this->assign('link', $flink);
            $this->display('Pay/pay');  


        }    
        
    }

    //收货地址三级联动处理
    public function addressInfo()
    {
        $upid = @intval(I('post.upid'));
        //预处理
        $data = M('area')->where("upid=%d", $upid)->select();
        echo json_encode($data);

    }

    //添加新的地址
    public function addAddress()
    {
        $info = I('post.');
        $userid = session('homeInfo')['id'];
        $res = $this->model->addNewAddress($info, $userid);
        if ($res) {
            $this->ajaxreturn(1);
        } else {
            $this->ajaxreturn(2);
        }
    }

    //显示最新地址
    public function showAddAddress()
    {   
        $map = [
            'user_id'=>session('homeInfo')['id'],
            'add_default'=>1
        ];
        $data = M('address')->field('id,add_name,add_province,add_city,add_area,add_town,add_detail,add_phone')->where($map)->order('add_detail desc')->find();
        $this->ajaxreturn($data);
    }

    //修改默认地址
    public function upDefaultAdd()
    {
    	$id = I('post.id');

    	$map['id']  = array('neq', $id);
	    $map['user_id'] = session('homeInfo')['id'];
	    M('address')->where(['id'=>$id])->setField('add_default', 1);
	    M('address')->where($map)->setField('add_default', '');
	    $this->ajaxreturn(1);
    }

    //删除地址
    public function delAdd()
    {
        $id = I('post.id');

        $lastId = M('address')->where(['id'=>$id])->delete();
        if ($lastId) {
            $this->ajaxreturn(1);
        }
    }

    //提交订单处理
    public function submitOrders()
    {   
        //用户id
        $uid =  session('homeInfo')['id'];

        //前台页面提交的数据
        $data = I('get.');
       // dump($data);exit;
        $info = $this->model->transaction($data, $uid);
        
        if ($info['code'] == 200) {
            //显示下单成功页面
            $this->redirect('Home/Pay/successOrder/oid/'.$info['info']['orders_num']);
        } else {
            $this->error('下单失败');
        }
    }

    //显示下单成功页面
    public function successOrder()
    {   
        $oid = I('get.oid');

        $data = M('orders')->field('total,orders_num')->where(['orders_num'=>$oid])->find();
        
        $this->assign('info', $data);
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
            $this->assign('link', $flink);

        $this->display('Pay/ordersuccess');
    }

    //处理支付
    public function payOrder()
    {
        $oid = I('get.oid');
        //支付成功，改为已付款状态
     
        $data['status'] = 2;
        $res = M('orders')->where(['orders_num'=>$oid])->save($data);
        
        if ($res) {
            $this->redirect('Home/Pay/paySuccess/oid/'.$oid);
        } else {
            $this->error('支付失败');
        }
    }

    //显示付款成功页面
    public function paySuccess()
    {   
        //查出付款金额和收货地址
        $oid = I('get.oid');
        $info = M('orders_address')->field('orders_num,buyname,phone,province,city,area,town,detail')->where(['orders_num'=>$oid])->find();
        $info2 = M('orders')->field('total')->where(['orders_num'=>$oid])->find();
        $info['total'] = $info2['total'];
        // dump($info);
        $this->assign('info', $info);
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
            $this->assign('link', $flink);
        // dump($oid);
        $this->display('Pay/paysuccess');
    }

} 