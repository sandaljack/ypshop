<?php

namespace Admin\Controller;

use Think\Controller;

class OrdersController extends Controller
{
	public function index()
	{	
		$map = [];
		if (I('get.orders_num') != '') {
			$map['orders_num'] = ['like', '%'.I('get.orders_num').'%'];
		}
		if (I('get.status') != '') {
			$map['status'] = I('get.status');
		}
		
		$count = M('orders')->where($map)->count();
		$Page  = new \Think\Page($count, 4);
		$data = M('orders')->field('id,orders_num,addtime,status,total')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

		$show  = $Page->show();

		$this->assign('page', $show);
		$this->assign('list', $data);
        $this->assign('session', session('adminInfo'));

		$this->display('Orders/index');
		
	}

	//订单详情
	public function ordersDetail()
	{
		$oid = I('get.oid');

		$goodsData = M('orders_detail o')->field('o.goods_id,o.buynum,o.color,o.size,g.goods_name,g.pic_path,p.price')
				->join('yp_goods g on g.id=o.goods_id')
				->join('yp_goods_price p on p.goods_id=o.goods_id and p.size=o.size and p.color=o.color')
				->where(['orders_num'=>$oid])->select();
		$address = M('orders_address')->field('province,city,area,town,detail,buyname,phone')->where(['orders_num'=>$oid])->find();
		$ordersData = M('orders')->field('orders_num,status,buymsg,total,addtime')->where(['orders_num'=>$oid])->find();
		$this->assign('goods', $goodsData);
		$this->assign('orders', $ordersData);
		$this->assign('address', $address);
		$this->assign('session', session('adminInfo'));
		$this->display('Orders/ordersdetail');
	}

	//删除订单
	public function delOrders()
	{
		$oid = I('post.id');
		//实例化model类
        $Model = M();
        //开启事务
        $Model->startTrans();
		$res = M('orders')->where(['orders_num'=>$oid])->delete();
		$res2 = M('orders_address')->where(['orders_num'=>$oid])->delete();
		$res3 = M('orders_detail')->where(['orders_num'=>$oid])->delete();
		if ($res && $res2 && $res3) {
			$Model->commit();//事务提交
			$this->ajaxreturn(1);
		} else {
			$Model->rollback();//事务回滚
			$this->ajaxreturn(2);
		}
		
	}

	//点击发货
	public function sendGoods()
	{
		$oid = I('post.id');

		$res = M('orders')->where(['orders_num'=>$oid])->setField('status', 3);
		if ($res) {
			$this->ajaxreturn(1);
		} else {
			$this->ajaxreturn(2);
		}
	}

}