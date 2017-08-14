<?php

namespace Admin\Controller;

use Think\Controller;

class GoodstoreController extends CommonController
{
	public function addstore() {

		if(IS_POST) {

			$id = I('post.goodId');

			//自动验证方法判断
			if (!D('Goodstore')->create()) {

			$this->error(D('Goodstore')->getError(), U("addstore", ['id' => $id]), 1);

			}

			$id = I('post.goodId');
			
			$result = D('Goodstore')->addstores();

			if ($result) {

				$this->success('库存信息插入成功', "showstore/id/$id", 1);

			} else {

				$this->error('库存信息插入失败', "showstore/id/$id", 1);
			}
			
		} else {

			$id = I('get.id');

			$goodName = M('goods')->field('goods_name')->where(['id'=>$id])->find();

			$this->assign('goodName', $goodName);

			$this->assign('goodId', $id);

			$this->assign('session', session('adminInfo'));

			$this->display('Goods/addstore');
			// dump($goodName);
		}

	}

	public function showStore()
	{

		$goodId = I('get.id');

		$count = M('goods_price')->where(['goods_id'=>$goodId])->count();

		$Page = new \Think\Page($count, 6);

		$pageBtn = $Page->show();

		$storeData = M('goods_price')->field(['id', 'goods_id', 'store', 'color', 'price', 'size'])->where(['goods_id'=>$goodId])->order('size')->limit($Page->firstRow.','.$Page->listRows)->select();

		$goodName = M('goods')->field('goods_name')->where(['id'=>$goodId])->find();

		$this->assign('gid', $goodId);

		$this->assign('goodName', $goodName);

		$this->assign('storeData', $storeData);

		$this->assign('btn', $pageBtn);

		$this->assign('session', session('adminInfo'));

		$this->display('Goods/showstore');
		

	}

	public function changeStore()
	{

		if (IS_POST) {

			$goodid = (I('post.goodId'));
	
			$result = D('Goodstore')->changestores();

			if ($result) {

				$this->success('库存信息修改成功', "showstore/id/$goodid", 1);

			} else {

				$this->error('库存信息修改失败', "showstore/id/$goodid", 1);
			}

		} else {

		$goodId = I('get.goodid');

		$storeId = I('get.id');

		$goodName = M('goods')->field('goods_name')->where(['id'=>$goodId])->find();

		$this->assign('goodName', $goodName);

		$storeData = M('goods_price')->field(['id', 'store', 'color', 'price', 'size'])->where(['id'=>$storeId])->find();

		$this->assign('goodId', $goodId);

		$this->assign('storeData', $storeData);

		$this->assign('session', session('adminInfo'));

		$this->display('Goods/changestore');

		}

	}

	public function deleteStore()
	{

		$storeId = I('post.id');
		
		//实例化model类
		$Model = M();

		//开启事务
		$Model->startTrans();


		$priceDel = M('goods_price')->where(['id'=>$storeId])->delete();

		if ($priceDel) {

			$Model->commit();//事务提交

			$data = 1;

			$this->ajaxReturn($data);

		} else {

			$Model->rollback();//事务回滚

			$data = 2;

			$this->ajaxReturn($data);
		}


		
	}

}