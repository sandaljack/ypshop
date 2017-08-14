<?php 

namespace Admin\Controller;

use Think\Controller;

Class IndexController extends CommonController
{
	public function index()
	{
		//得出的总价
		$total = M('orders')->field('total')->where(['status'=>2])->select();

		$allTotal = 0;

		for ($i = 0; $i < count($total); $i++) {

			$allTotal = $total[$i]['total']+$allTotal;
		}

		$allData['alltotal'] = $allTotal;

		//得出订单数
		$number = M('orders')->count();

		$allData['number'] = $number;

		//得出商品数量
		$goodNumber = M('goods')->count();

		$allData['goodsnumber'] = $goodNumber;

		//得出注册人数
		$userNumber = M('user')->count();

		$allData['usernumber'] = $userNumber;

		$this->assign('allData', $allData);

		//遍历点击量最高的8个商品
		$good = M('goods')->field(['goods_name', 'goods_status', 'buynum', 'pic_path'])->order('buynum desc')->limit(8)->select();

		$this->assign('goods', $good);

		$user = M('user')->field(['username', 'userpic', 'phone', 'status'])->limit(8)->select();

		$this->assign('users', $user);

		$this->assign('session', session('adminInfo'));

		$this->display();
	
	}

	public function goodsAjax(){

		//遍历购买量最高的8个商品
		$good = M('goods')->field(['goods_name', 'goods_status', 'buynum', 'pic_path'])->order('buynum desc')->limit(8)->select();

		$this->ajaxReturn($good);

	}



}