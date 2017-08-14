<?php

namespace Admin\Controller;

use Think\Controller;
//
//评价控制器
class CommentController extends CommonController
{	
	//显示评价管理
	public function index()
	{	

		$map = [];
		if (I('get.point') != '') {
			$map['point'] = I('get.point');
		}
		$count = M('assess')->where($map)->count();
		$Page  = new \Think\Page($count, 5);
		$data = M('assess a')->field('a.rescom,a.orders_num,a.id,a.user_id,a.order_time,a.point,a.content,a.orders_num,a.color,a.size,g.pic_path,g.goods_name')
		->join('yp_goods g on g.id=a.goods_id')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		foreach ($data as $k=>$v){
			$data[$k]['add_time'] = date('Y-m-d H:i:s', $v['order_time']);
		}
		$show  = $Page->show();
		$this->assign('page', $show);
		$this->assign('data', $data);
        $this->assign('session', session('adminInfo'));
        
		$this->display('Comment/index');
	}

	//删除评论
	public function delComment()
	{	
		$id = I('post.id');
		$lastId = M('assess')->where(['id'=>$id])->delete();
		if ($lastId) {
			$this->ajaxreturn(1);
		} else {
			$this->ajaxreturn(2);
		}
	}

	//点击回复评论
	public function resComment()
	{
		if (IS_POST) {
			$id = I('post.id');
			$resComment = I('post.content');
			$res = M('assess')->where(['id'=>$id])->save(['rescom'=>$resComment]);
			if ($res) {
				$this->success('回复成功', U('Comment/index'));
			} else {
				$this->error('回复失败');
			}
		} else {
			$id = I('get.cid');
			$this->assign('id', $id);
			$this->display('Comment/rescomment');
		}
	}
}