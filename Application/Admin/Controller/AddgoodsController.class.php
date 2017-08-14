<?php

namespace Admin\Controller;

use Think\Controller;

class AddgoodsController extends Controller
{
	/**
	 * [添加商品信息的方法]
	 */
	public function addGood() 
	{

		if (IS_POST) {

			//自动验证方法判断
			if (!D('Addgoods')->create()) {

			$this->error(D('Addgoods')->getError(), U('addGood'), 1);

			}

			
			// 实例化自己的类Addgoods
			$result = D('Addgoods')->transaction();
		
			
			if ($result['info']) {

				$goodName = I('post.name');

				$goodid = M('goods')->field('id')->where(['goods_name'=>$goodName])->find();

				$this->success($result['msg'], U('Goodstore/addStore', ['id'=>$goodid['id']]), 1);

			} else {

				$this->error($result['msg']);

			}
			
		} else {

			$list = ['name', 'id'];

			//查询商品第一分类的分类名字
			$firstdata = M('first_sort')->field($list)->select();

			//传给view模块页面
			$this->assign('firstsortData', $firstdata);

            $this->assign('session', session('adminInfo'));

			$this->display('Goods/addgood');
			
		}
		
	}

	/**
	 * [ajaxData 通过ajax的post方法取得数据商品添加页面的下拉框数据]
	 * @return [array] [二级分类下拉框的参数]
	 */
	public function ajaxData() {


		$list = [ 'first_sort_id' => I('post.id')];

		$data = M('second_sort')->field(['name', 'id'])->where($list)->select();

		//返回数据
		$this->ajaxReturn($data);

	}


}
