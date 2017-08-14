<?php

namespace Home\Controller;

use Think\Controller;

class OrderController extends CommonController
{


    //显示所有订单
    public function orders()
    {   


        //实例化订单表
        $orders = M('orders');

        //获取SESSION用户ID
        $uid = session('homeInfo')['id'];

        //算出总条数
        $count = $orders->where( array( 'user_id'=>array('eq', $uid) ) )->count();
        // dump($count);

        //(总条数，每页显示条数)
        $Page  = new \Think\Page($count, 5);

        //拿到分页按钮
        $pageBtn = $Page->show(); 


        
        //==================================================================================================
        
        //查询条件
        $map['user_id'] = array('eq', $uid);
        //查所有订单
        $resAll = M('orders')
        ->where( $map )
        ->field('orders_num,addtime,total,status')
        ->limit( $Page->firstRow.','. $Page->listRows)
        ->order('orders_num desc')
        ->select();

        // dump($resAll);exit;

        foreach ($resAll as $val) {

            $rest[] = M('orders_detail d')->field('d.color,d.size,d.buynum,g.goods_name,g.pic_path,p.price,d.orders_num')
            ->join('yp_goods g on g.id=d.goods_id')
            ->join('yp_goods_price p on p.goods_id=d.goods_id and d.color=p.color and d.size=p.size')
            ->where(['orders_num'=>$val['orders_num']])->select();
        }
        
        //将数据分配给模板
        $this->assign('btn', $pageBtn);
        //输出所有订单
        $this->assign('res', $resAll);
        $this->assign('rest', $rest);
       

        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
            $this->assign('link', $flink);
        //转到订单模板
        $this->display('Order/orders');
        
    }



    //显示待付款订单
    public function ordersa()
    {

    	//实例化订单表
        $orders = M('orders');

        //获取SESSION用户ID
        $uid = session('homeInfo')['id'];

        //查询条件
        $where = array(
        			'status'  => array('eq',1),
        			'user_id' => array('eq',$uid) 
        );

        //算出总条数
        $count = $orders->where( $where )->count();
        // dump($count);
        //(总条数，每页显示条数)
        $Page  = new \Think\Page($count, 5);

        //拿到分页按钮
        $pageBtn = $Page->show(); 


        
        $resAll = M('orders')
        ->where( $where )
        ->field('orders_num,addtime,total,status')
        ->limit( $Page->firstRow.','. $Page->listRows)
        ->order('orders_num desc')
        ->select();
        // dump($resAll);exit;

        foreach ($resAll as $val) {

            $rest[] = M('orders_detail d')->field('d.color,d.size,d.buynum,g.goods_name,g.pic_path,p.price,d.orders_num')
            ->join('yp_goods g on g.id=d.goods_id')
            ->join('yp_goods_price p on p.goods_id=d.goods_id and d.color=p.color and d.size=p.size')
            ->where(['orders_num'=>$val['orders_num']])->select();
        }
        
        //将数据分配给模板
        $this->assign('btn', $pageBtn);
        //输出所有订单
        $this->assign('res', $resAll);
        $this->assign('rest', $rest);
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
            $this->assign('link', $flink);
    	$this->display('Order/ordersa');
    }


    //显示待发货订单
    public function ordersb()
    {

    	//实例化订单表
        $orders = M('orders');

        //获取用户uid
        $uid = session('homeInfo')['id'];


        //查询条件
        $where = array(
        			'status'  => array('eq',2),
        			'user_id' => array('eq',$uid) 
        );

        //算出总条数
        $count = $orders->where($where)->count();

        //(总条数，每页显示条数)
        $Page  = new \Think\Page($count, 5);

        //拿到分页按钮
        $pageBtn = $Page->show(); 


        
        $resAll = M('orders')
        ->where( $where )
        ->field('orders_num,addtime,total,status')    
        ->limit( $Page->firstRow.','. $Page->listRows)
        ->order('orders_num desc')
        ->select();

        foreach ($resAll as $val) {

            $rest[] = M('orders_detail d')->field('d.color,d.size,d.buynum,g.goods_name,g.pic_path,p.price,d.orders_num')
            ->join('yp_goods g on g.id=d.goods_id')
            ->join('yp_goods_price p on p.goods_id=d.goods_id and d.color=p.color and d.size=p.size')
            ->where(['orders_num'=>$val['orders_num']])->select();
        }
        
        //将数据分配给模板
        $this->assign('btn', $pageBtn);
        //输出所有订单
        $this->assign('res', $resAll);
        $this->assign('rest', $rest);
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
            $this->assign('link', $flink);
    	$this->display('Order/ordersb');
    }


    //显示待收货订单
    public function ordersc()
    {

    	//实例化订单表
        $orders = M('orders');


        //获取用户uid
        $uid = session('homeInfo')['id'];

        //查询条件
        $where = array(
        			'status'  => array('eq',3),
        			'user_id' => array('eq',$uid) 
        );

        //算出总条数
        $count = $orders->where($where)->count();

        //(总条数，每页显示条数)
        $Page  = new \Think\Page($count, 5);

        //拿到分页按钮
        $pageBtn = $Page->show(); 


        
        $resAll = M('orders')
        ->field('orders_num,addtime,total,status')
        ->where( $where )
        ->limit( $Page->firstRow.','. $Page->listRows)
        ->order('orders_num desc')
        ->select();

        foreach ($resAll as $val) {

            $rest[] = M('orders_detail d')->field('d.color,d.size,d.buynum,g.goods_name,g.pic_path,p.price,d.orders_num')
            ->join('yp_goods g on g.id=d.goods_id')
            ->join('yp_goods_price p on p.goods_id=d.goods_id and d.color=p.color and d.size=p.size')
            ->where(['orders_num'=>$val['orders_num']])->select();
        }
        
        //将数据分配给模板
        $this->assign('btn', $pageBtn);
        //输出所有订单
        $this->assign('res', $resAll);
        $this->assign('rest', $rest);
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
            $this->assign('link', $flink);
    	$this->display('Order/ordersc');
    }


    //显示待评价订单
    public function ordersd()
    {

    	//实例化订单表
        $orders = M('orders');


        //获取用户uid
        $uid = session('homeInfo')['id'];

        //查询条件
        $where = array(
        			'status'  => array('eq',4),
        			'user_id' => array('eq',$uid) 
        );

        //算出总条数
        $count = $orders->where($where)->count();

        //(总条数，每页显示条数)
        $Page  = new \Think\Page($count, 5);

        //拿到分页按钮
        $pageBtn = $Page->show();


        
        $resAll = M('orders')
        ->where( $where )
        ->field('orders_num,addtime,total,status')
        ->limit( $Page->firstRow.','. $Page->listRows)
        ->order('orders_num desc')
        ->select();

        foreach ($resAll as $val) {

            $rest[] = M('orders_detail d')->field('d.color,d.size,d.buynum,g.goods_name,g.pic_path,p.price,d.orders_num')
            ->join('yp_goods g on g.id=d.goods_id')
            ->join('yp_goods_price p on p.goods_id=d.goods_id and d.color=p.color and d.size=p.size')
            ->where(['orders_num'=>$val['orders_num']])->select();
        }
        
        //将数据分配给模板
        $this->assign('btn', $pageBtn);
        //输出所有订单
        $this->assign('res', $resAll);
        $this->assign('rest', $rest);
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
            $this->assign('link', $flink);
    	$this->display('Order/ordersd');
    }


    //订单详情
    public function orderinfo()
    {

    	//获取订单号
    	$num = I('get.num');

    	//查询订单地址表
    	$address = M('orders_address')
			->where(['orders_num'=>$num])
			->field('buyname,phone,province,city,area,town,detail')
			->find();

    	//查询订单表
    	$order = M('orders')
	    	->where(['orders_num'=>$num])
	    	->field('orders_num,addtime,total,status')
	    	->find();

    	//查询订单详情表
    	$detail = M('orders_detail d')
    		->where(['orders_num'=>$num])
    		->field('d.color,d.size,d.buynum,p.price,g.pic_path,g.goods_name')
    		->join('yp_goods_price p on d.goods_id = p.goods_id and d.color=p.color and d.size=p.size')
    		->join('yp_goods g on p.goods_id = g.id')
    		->select();



    	$this->assign('addr', $address);
    	$this->assign('order', $order);
    	$this->assign('detail', $detail);
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
            $this->assign('link', $flink);
    	$this->display('Order/orderinfo');

    	
    }


    //确认收货
    public function confirm()
    {

    	$num = I('post.num');

    	$res = M('orders')->where(['orders_num'=>$num])->save(['status'=>4]);

    	if ($res) {
    		echo 1;
    	} else {
    		echo 2;
    	}
    }

    
}