<?php

namespace Admin\Controller;

use Think\Controller;
// session_start();

class ClassifyController extends CommonController
{
	/**
	 * [添加分类的公共方法]
	 * @param  [type] $class [数据库的名字]
	 * @param  [type] $list  [插入数据库的字段和数据]
	 * @param  [type] $text1 [成功时返回的字段]
	 * @param  [type] $text2 [失败时返回的字段]
	 */
	public function common($class, $list, $text1, $text2)
	{
		$firstsort = D("$class");

		if (!$firstsort->create()) {

			$this->error($firstsort->getError());

		} else {

			$result = $firstsort->data($list)->add();

			if ($result) {

				$this->success("$text1", 'showClassify');
				exit;
			
			} 

			$this->error("$text2");
			exit;
		}
	}

	/**
	 * [addClassify 分类的添加]
	 */
	public function addClassify()
	{	

		if (IS_POST) {	

			if (I('post.firstsortId') == 0) {

				$list = [
					'name' => I('post.name')
				];
			
				//调用添加分类的公共方法common
				$this->common('Firstsort', $list, '一级分类名添加成功', '一级分类名添加失败');


			} else {

				//插入数据库的字段和数据
				$list = [
					'name' 			=> I('post.name'),
					'first_sort_id' => I('post.firstsortId')
				];

				//调用添加分类的公共方法common
				$this->common('Secondsort', $list, '二级分类名添加成功', '二级分类名添加失败');

			}


		} else {

			$firstsort = D('Firstsort');

			//查询已存在的一级商品分类
			$result = $firstsort->checksort();

			$this->assign('firstsortData', $result);

			$this->assign('session', session('adminInfo'));

			$this->display('addclassify');
		}	
	}
	

	public function showClassify()
	{
		$firstSort = M('first_sort')->field(['id','name'])->select();

		$this->assign('firstsortData', $firstSort);

		$this->assign('session', session('adminInfo'));

		$this->display('showclassify');

	}

	public function ajaxshowClassify() 
	{

		$firstsortId = I('post.fid');

		$secondSort = M('second_sort')->field(['id','name'])->where(['first_sort_id'=>$firstsortId])->select();

		$this->ajaxReturn($secondSort);
	}

	public function changeClassify()
	{

		if (IS_POST) {

			$data = I('post.');

			$changData = M('first_sort')->field(['name'])->where(['id'=>$data['id']])->setField(['name'=>$data['name']]);

			if ($changData) {

				$this->success('一级分类名修改成功', 'showClassify');

			} else {

				$this->error('一级分类名修改失败');

			}

		} else {

		$firstsortId = I('get.id');

		$firstSort = M('first_sort')->field(['id','name'])->where(['id'=>$firstsortId])->find();

		$this->assign('firstSort', $firstSort);

		$this->assign('session', session('adminInfo'));

		$this->display('changeclassify');

		}

	}

	public function changesecondClassify()
	{

		if (IS_POST) {

			$data = I('post.');

			$changData = M('second_sort')->field(['name'])->where(['id'=>$data['id']])->setField(['name'=>$data['name']]);

			if ($changData) {

				$this->success('二级分类名修改成功', 'showClassify');

			} else {

				$this->error('二级分类名修改失败');

			}

		} else {

		$secondsortId = I('get.id');

		$secondSort = M('second_sort')->field(['id','name'])->where(['id'=>$secondsortId])->find();

		$this->assign('secondSort', $secondSort);

		$this->assign('session', session('adminInfo'));

		$this->display('changesecondclassify');

		}

	}

	public function deleteClassify()
	{
		$firstsortId = I('post.id');

		$secondsort = M('second_sort')->field('id')->where(['first_sort_id'=>$firstsortId])->find();

		if ($secondsort) {

			$data = [
				'msg'  => '请先删除该分类下子分类或者商品数据，再来执行本操作',
				'code' => '404'
			];

			$this->ajaxReturn($data);
		}

		$firstsort = M('first_sort')->where(['id'=>$firstsortId])->delete();

		if ($firstsort) {

			$data = [
				'msg'  => '分类删除成功',
				'code' => '200'
			];

			$this->ajaxReturn($data);

		} else {

			$data = [
				'msg'  => '分类删除失败',
				'code' => '403'
			];

			$this->ajaxReturn($data);
		}
	}


	public function deletesecondClassify()
	{
		$secondsortId = I('post.id');

		$goods = M('goods')->field('id')->where(['second_sort_id'=>$secondsortId])->find();

		if ($goods) {

			$data = [
				'msg'  => '请先删除该分类下的商品数据，再来执行本操作',
				'code' => '404'
			];

			$this->ajaxReturn($data);
		}

		$secondsort = M('second_sort')->where(['id'=>$secondsortId])->delete();

		if ($secondsort) {

			$data = [
				'msg'  => '二级分类删除成功',
				'code' => '200'
			];

			$this->ajaxReturn($data);

		} else {

			$data = [
				'msg'  => '二级分类删除失败',
				'code' => '403'
			];

			$this->ajaxReturn($data);
		}
	}
}