<?php

namespace Admin\Controller;

use Think\Controller;

class ShowgoodsController extends CommonController
{
	/**
	 * [showgood 显示商品信息]
	 * 
	 */
	public function showgood() {

		if (IS_GET) {

			$data = I('get.');

			$conditions = [];

			if (isset($data['firstsortId']) && $data['firstsortId'] !== '') {

				if ($data['firstsortId'] != 0) {

					$conditions['first_sort_id'] = $data['firstsortId'];

				}

			}

			if (isset($data['secondsortId']) && $data['secondsortId'] !== '') {

				if ($data['secondsortId'] != 0) {

					$conditions['second_sort_id'] = $data['secondsortId'];
				
				}
			}

			if (isset($data['searchData']) && $data['searchData'] !== '') {

				$conditions['goods_name'] = ['like',"%{$data['searchData']}%"];
			}

		}
		

		$data = I('get.');
		//算出总条数
		$count = M('goods')->where($conditions)->count();

		//实例化分页类
		$Page = new \Think\Page($count, 5);


		//拿到分页类按钮
		$pageBtn = $Page->show();

		//把要从数据库查出数据的字段整合成数组
		$list = ['id','store', 'goods_name', 'goods_status', 'buynum', 'clicknum', 'pic_path']; 

		//把数据按照要求查询出来
		$goodsData = M('goods')->field($list)->where($conditions)->limit($Page->firstRow.','.$Page->listRows)->select();


		//调用自定义Model的firstSort()，获取数据
		$firstsortData = D('Showgoods')->firstSort();

		//把获取到的数据发送到View的相应页面
		$this->assign('goodsData', $goodsData);

		//同上
		$this->assign('firstsortData', $firstsortData);

		$this->assign('postData', $data);

		//把按钮发送到VIEW响应页面
		$this->assign('btn', $pageBtn);

		$this->assign('session', session('adminInfo'));

		//显示View商品信息页面
		$this->display('Goods/showgood');
	}


	public function changeStatus()
	{
		$statusData = I('post.');
		$changedata = M('goods')->field('goods_status')->where(['id'=>$statusData['id']])->setField(['goods_status'=>$statusData['statu']]);

		if ($changedata) {

			$data = [
				'msg'  => '状态更新成功',
				'code' => '200'
			];

			$this->ajaxReturn($data);
		} else {

			$data = [
			'msg'  => '状态更新失败',
			'code' => '404'
			];

			$this->ajaxReturn($data);
		}
	}


	/**
	 * [secondSort ajax查询二级分类信息]
	 * @return [array] [二级分类的信息]
	 */
	public function secondSort()
	{
		
		$list = ['first_sort_id' => I('post.id')];

		$data = M('second_sort')->field(['id','name'])->where($list)->select();
		
		//返回数据
		$this->ajaxReturn($data);
	}


	/**
	 * [goodsDelete ajax删除对应商品信息]
	 * @return [int] [数字1或2]
	 */
	public function goodsDelete() {

		$goodId = I('post.id');

		//实例化model类
		$Model = M();

		//开启事务
		$Model->startTrans();

		
		$list = ['pic_path1', 'pic_path2', 'pic_path3', 'pic_path4', 'pic_path5'];

		$delPic1 = M('goods_pictures')->field($list)->where(['goods_id'=>$goodId])->find();

		$delPic2 = M('goods_detail_pictures')->field($list)->where(['goods_id'=>$goodId])->find();

		//删除数据库之前先把图片查询的路径出来，插入到F方法（快速缓存）中
		F('delPic1', $delPic1);

		F('delPic2', $delPic2);

		//下面6条语句是执行删除对应ID的商品信息
		$goodDel = M('goods')->where(['id'=>$goodId])->delete();

		$detailDel = M('goods_detail')->where(['goods_id'=>$goodId])->delete();

		$goodpicDel = M('goods_pictures')->where(['goods_id'=>$goodId])->delete();

		$detailpicDel = M('goods_detail_pictures')->where(['goods_id'=>$goodId])->delete();

		$priceDel = M('goods_price')->where(['goods_id'=>$goodId])->delete();

		$sizeDel = M('goods_size')->where(['goods_id'=>$goodId])->delete();

		if ($goodDel && $detailDel && $goodpicDel && $detailpicDel && $priceDel && $sizeDel) {

			$Model->commit();//事务提交

			//如果事务得到确认，就从F方法（快速缓存）查出图片路径，执行以下的删除
			$delPic1 = F('delPic1');

			foreach ($delPic1 as $v) {

				unlink('./Public/'.$v);
			}

			$delPic2 = F('delPic2');

			foreach ($delPic2 as $v) {

				unlink('./Public/'.$v);
			}

			$data = 1;

			$this->ajaxReturn($data);

		} else {

			$Model->rollback();//事务回滚

			$data = 2;

			$this->ajaxReturn($data);

		}
		

	}
	
}