<?php

namespace Admin\Controller;

use Think\Controller;

class ChangegoodsController extends CommonController
{

	/**
	 * [changeGood 更改商品数据]
	 * 
	 */
	public function changeGood(){


		if (IS_POST) {

			$page = I('post.page');

			//调用saveData方法，
			$result = D('Changegoods')->saveData();

			if ($result['info']) {

				$this->success($result['msg'], U('Showgoods/showgood', ['p'=>$page]));

			} else {

				$this->error($result['msg']);

			}
			
		} else {

		$result = D('Changegoods')->queryData();

		$this->assign('data',$result);

		$this->assign('page', I('get.page'));

		$this->display('Goods/changegood');


		}
	}
}