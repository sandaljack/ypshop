<?php

namespace Home\Controller;

use Think\Controller;


class DetailController extends Controller
{


	// protected $id; //商品的id

	 /**
     * 商品详情页所有数据
     * @return 	$goods $path $pictures $prices $size $color $good_pictures $assessd		
     */
	public function Detail() 
	{


		$id = I('get.id');	

		

		//拿到商品所有相关的数据
		$goods = D('Detail')->goodsDetailAll($id);

		//商品点击量+1
		$num = M('goods')->field('clicknum')->where("id=%d",$id)->find();
		$num['clicknum'] += 1;
		$bool =  M('goods')->where("id=%d",$id)->save($num);

		//商品的基本信息
		$this->assign('user',$goods['user']);  

		//商品的基本信息
		$this->assign('good',$goods['goods']);  
		
		//商品详情页的所有图片 
		$this->assign('detail',$goods['path']);
		
		//商品主图片
		$this->assign('pictures',$goods['pictures']);


		//商品的价格
		$this->assign('prices',$goods['prices']);

		//商品的尺码
		$this->assign('size',$goods['size']);

		//商品的颜色
		$this->assign('color',$goods['color']);

		//商品的详情页图片
		$this->assign('detail_pic',$goods['detail_pic']);

		//获取到评价数量
		$this->assign('count',$goods['count']);
		
		//商品的ID，给到商品详情页
		$this->assign('goods_id',$id);

		$this->assign('session', session('homeInfo'));


		//推荐商品
		$recomShop = D('Detail')->recommendShop($id);

		// dump($recomShop);
		$this->assign('recomShop',$recomShop);

		 //前台的模版
		$this->display('Detail/detail');
		

	}



	/**
	 *ajax 价格变动
	 * @param 
     * @return  $newpricerrr
	 *
	 */
	public function convertSize()
	{
		// 获取商品id
		$goods_id = I('post.id');

		//获取到商品的尺码
		$size = I('post.size');

		//获取到用户选中的当前颜色
		$color = I('post.color');
		
		$where['goods_id'] = $goods_id;

		$where['size'] = $size;

		//查询用size 查询 颜色

		$dataColor =  M('goods_price')->field('goods_id,color')->where($where)->select();

		$this->ajaxreturn($dataColor);
			
	}











	//获取商品价格
	public function convertColor()
	{
		// 获取商品id
		$goods_id = I('post.id');

		//获取到商品的尺码
		$size = I('post.size');
		
		$color = I('post.color');

		// 先查询数据库
		$price  = M('goods_price');


		$where['goods_id'] = $goods_id;
		$where['color'] = $color;
		$where['size'] = $size;

		$data = $price->field('goods_id,color,size,price,store')->where($where)->find();

		// 返回数据给前台 ajax 
		$this->ajaxreturn($data);  

		
	}













	//宝贝详情
	/**
	 * [detailBady 商品的详情页的 详情页数据]
	 * @return [type] [description]
	 */
	public function detailBady() 
	{

		$goodsid = I('post.goodsid');

		$data =  M('goods_detail')->field()->where("goods_id=%d",$goodsid)->find();

		//返回数据给前台 ajax 
		$this->ajaxreturn($data);  

	}



	/**
	 * [assessAll 商品的是所有评价]
	 * @return [array] $data 
	 */
	public function assessAll()
	{
		// 获取商品id
		$goods_id = I('post.goods_id');

		//分页条件
		$countWhere['goods_id'] = $goods_id;

		//多表联查，得到数据
		$dataDetailsAssess = M('assess a')->field('a.user_id,a.goods_id,a.point,a.content,a.orders_num,a.order_time,a.color,a.size,u.username,u.userpic')

			->join('yp_user u on a.user_id = u.id')

			->page($_GET['p'].',10')

			->where($countWhere)

			->select();

		// //将拿到的时间戳格式化
		foreach ($dataDetailsAssess as $key => $value) {

				$dataDetailsAssess[$key]['order_time'] = date("Y-m-d H:i",$value['order_time']);
			}	


		// 查询满足要求的总记录数$Page 
		$count = M('assess')->where($countWhere)->count();

		// 实例化分页类 传入总记录数和每页显示的记录数(25)$show 
		$Page  = new \Think\Page($count,10);

		// 分页显示输出
		$show  = $Page->show();


        //将两个数组合在一个数组
        $data = [$dataDetailsAssess,$show];

		//返回数据给前台 ajax 
		$this->ajaxreturn($data);  
	}
	


	/**
	 * [collectionShop 添加收藏夹]
	 * @return [string] [ture:成功，false 请登录，2失败]
	 */
	public function collectionShop() 
	{
		$good_id = I('post.goods_id');

		$bool = session('?homeInfo.username');

		//判断用户是否登陆，真 表示已经登录， 否则表示未登录
		if ($bool) {

			//获取用户的id
			$user_id = session('homeInfo.id');

			//用户id
			$array['user_id'] = $user_id;

			//商品id
			$array['good_id'] = $good_id;

			//查看是否已经收藏
			$collectBool = M('collect')->where("user_id=%d and good_id=%d",$user_id,$good_id)->find();

			//判断是否收藏，返回 2 表示已经收藏，返回true 收藏成功
			if ($collectBool) { 

				$data = '2';

			} else {

				M('collect')->data($array)->add($array);

				$data = 'true';
			}
			

		} else {

			//失败，要先登录才可以收藏
			$data = 'false';
		}

		//返回数据给前台 ajax 
		$this->ajaxreturn($data);  
	}



	public function Similargoods () {


		//商品id
		$goods_id = I('post.goods_id');
		$num = 2;
		$where['id'] = $goods_id;

		$data = M('goods')->field('second_sort_id')->where($where)->select();

		// $price = M('goods_price')->field()->where($where)->find();

		
		$shop = M('goods')->field('goods_name,first_sort_id,id,buynum,pic_path')->where("second_sort_id=%d and goods_status=%d",$data[0],$num)->limit(12)->select();


		for ($i=0;$i<count($shop);$i++) {
				
			$a['goods_id'] = $shop[$i]['id'];

			$priceabbu = M('goods_price')->field('price')->where($a)->find();

			$shop[$i]['price'] = $priceabbu['price'];
		}
		

		// dump($shop);
		//返回数据给前台 ajax 
		$this->ajaxreturn($shop);
	}

}

