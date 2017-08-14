<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends CommonController
{
	public function index() {


		$navName = M('first_sort')->field(['name','id'])->limit(10)->select();


		for ($i = 0; $i < 5; $i++) {

			$secondSort = M('second_sort')->field(['name', 'id'])->where(['first_sort_id'=>$navName[$i]['id']])->order('id desc')->select();

			$goods = M('goods')->field(['id','goods_name','pic_path'])->where(['second_sort_id'=>$secondSort[$i]['id']])->limit(7)->select();

			foreach ($goods as $k => $v) {

				$price[] = M('goods_price')->field(['goods_id', 'price'])->where(['goods_id'=>$v['id']])->find();
			}
			
			$allData[$i][] = $secondSort;
			$allData[$i][] = $goods;
			$allData[$i][] = $price;
		}

		$advertisesData = M('advertises')->field(['ad_pic', 'ad_url'])->limit(3)->select();

		$sellingGood = M('goods')->field(['id', 'goods_name', 'pic_path', 'buynum'])->order('buynum desc')->limit(3)->select();

		$this->assign('navName', $navName);
		$this->assign('allData', $allData);
		$this->assign('adverdata', $advertisesData);
		$this->assign('sellinggood', $sellingGood);
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
        $this->assign('link', $flink);
		$this->display();
		
	}

	//用ajax技术传输数据到侧边导航栏
	public function sideNav() {

		$firstsortId = I('post.fid');

		$navData = M('second_sort')->field(['name','id'])->where(['first_sort_id'=>$firstsortId])->limit(4)->select();

		foreach($navData as $k =>$v) {
			
			$data[$k][] = [$v['name'], $v['id']];
			$data[$k][] = M('goods')->field(['goods_name','id'])->where(['second_sort_id'=>$v['id']])->limit(8)->select();
		}

		$this->ajaxReturn($data);

	}

	//接收商品模块ajax的数据，并处理返回
	public function pageData()
	{
		$secondsortId = I('post.sid');

		$goods = M('goods')->field(['id','goods_name','pic_path'])->where(['second_sort_id'=>$secondsortId])->limit(7)->select();

		foreach ($goods as $k => $v) {

			$price[] = M('goods_price')->field(['goods_id', 'price'])->where(['goods_id'=>$v['id']])->find();
		}

		$pageData[] = $goods;
		$pageData[] = $price;


		// dump($pageData);
		$this->ajaxReturn($pageData);
	}


	public function loadData()
	{

		$firstsortId = I('post.fid');

		// dump($firstsortId);
		$firstSort = M('first_sort')->field(['name','id'])->where(['id'=>$firstsortId])->find();

		$secondSort = M('second_sort')->field(['name', 'id'])->where(['first_sort_id'=>$firstsortId])->select();

		$goods = M('goods')->field(['id','goods_name','pic_path'])->where(['second_sort_id'=>$secondSort[0]['id']])->limit(7)->select();

		foreach ($goods as $k => $v) {

			$price[] = M('goods_price')->field(['goods_id', 'price'])->where(['goods_id'=>$v['id']])->find();
		}
		
		$allData[] = $firstSort;
		$allData[] = $secondSort;
		$allData[] = $goods;
		$allData[] = $price;

		$this->ajaxReturn($allData);

	}
}