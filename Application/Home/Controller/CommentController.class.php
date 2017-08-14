<?php

namespace Home\Controller;

use Think\Controller;

class CommentController extends CommonController
{	
	//评论商品
	public function CommentGoods()
	{
		if (IS_POST) {
			$oid = I('post.oid');
			$uid = I('post.uid');
			$gid = explode(',', rtrim(I('post.gid'), ', '));
	        $color = explode(',', rtrim(I('post.color'), ', '));
	        $size = explode(',', rtrim(I('post.size'), ', '));
	        $point = explode(',', rtrim(I('post.point'), ', '));
	        $text = explode(',', rtrim(I('post.text'), ', '));
	        $time = time();
	        foreach ($gid as $k=>$v) {
	        	$data = [
	        		'goods_id'=>$v,
	        		'color'=>$color[$k],
	        		'size'=>$size[$k],
	        		'point'=>$point[$k],
	        		'orders_num'=>$oid,
	        		'order_time'=>$time,
	        		'content'=>$text[$k],
	        		'ponit'=>$point[$k],
	        		'user_id'=>$uid
	        	];
	        	M('assess')->add($data);
	        }
	        $this->ajaxreturn(1);

		} else {
			$oid = I('get.oid');
			$ordersData = M('orders_detail o')->field('o.goods_id,o.color,o.size,g.goods_name,g.pic_path')->where(['orders_num'=>$oid])->join('yp_goods g on g.id=o.goods_id')->select();
			$this->assign('goods', $ordersData);
			$this->assign('oid', $oid);
			
            $this->assign('session', session('homeInfo'));
			$flink = M('friendlink')->select();
        	$this->assign('link', $flink);
			$this->display('Person/commentlist');

		}
		
	}

	//评论成功跳转
	public function successCom()
	{	
		$oid = I('get.oid');
		M('orders')->where(['orders_num'=>$oid])->save(['status'=>6]);
		$this->success('评价成功', U('Order/orders'));
	}

	//显示评论
	public function commentShow()
	{	
		$uid = session('homeInfo')['id'];
		$count = M('assess')->where(['user_id'=>$uid])->count();
		$Page  = new \Think\Page($count, 10);
		$data = M('assess a')->field('a.order_time,a.point,a.content,a.orders_num,a.color,a.size,g.pic_path,g.goods_name')
		->join('yp_goods g on g.id=a.goods_id')->where(['user_id'=>$uid])->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach ($data as $k=>$v){
			$data[$k]['add_time'] = date('Y-m-d H:i:s', $v['order_time']);
		}
		$show  = $Page->show();
		$this->assign('page', $show);
		$this->assign('data', $data);
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
        $this->assign('link', $flink);
		$this->display('Person/comment');
	}
}