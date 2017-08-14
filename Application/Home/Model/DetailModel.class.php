<?php

	namespace Home\Model;

	use Think\Model;

	class DetailModel 
	{

		//解决D方法直接查数据库，虚拟模型的问题
   		protected $autoCheckFields = false;

   		/**
   		 * [goodsDetailAll 商品详情页的全部数据]
   		 * @param  [number] $id [商品的ID]
   		 * @return [array]  $arrayAll [这是一个三维数组，返回了所有的数据]
   		 */
   		public function goodsDetailAll($id)
   		{

	   		$user =  M('goods');

			$goods = $user->field('id,first_sort_id,second_sort_id,goods_name,goods_name,goods_status,buynum,clicknum,pic_path,store')->where("id=%d",$id)->find();
			
			// 拿到商品详情页的基本数据
			$goodsDetail =  M('goods_detail');

			$path = $goodsDetail->field('goods_id,value_id,addtime,outtime,changetime,admin_id,good_description,length,seeve_length,material,collar,sleeve_type')->where("goods_id=%d",$id)->select();


			// 拿到商品图片
			$picture =  M('goods_pictures');

			$pictures = $picture->field('pic_path1,pic_path2,pic_path3,pic_path4,pic_path5')->where("goods_id=%d",$id)->select();
			
			

			//处理商品图片的数据， 去除 无效数据
			$pic = array_filter($pictures[0]);

		
			// dump($pic);
			// 拿到商品的价格
			$price =  M('goods_price');

			$prices = $price->field('price,color')->where("goods_id=%d",$id)->select();

			$goodsColors = $prices[0]['color'];


			//获取到商品的尺码
			$size = $price->field('id,goods_id,color,size,price,store')->where("goods_id='%d'and color='%s'",array($id,$goodsColors))->select();


			$sizes = $size[0]['size'];

			// 获取到商品的所有颜色
			$color = $price->field('color')->where("goods_id='%d' and size='%s'",$id,$sizes)->select();

			// 拿到商品详情页的所有图片
			$goods_detail_pictures = M('goods_detail_pictures');

			$detail_pictures = $goods_detail_pictures->field('pic_path1,pic_path2,pic_path3,pic_path4,pic_path5')
								 ->where("goods_id='%d'",$id)->select();

			
			//处理商品详情的图片数据， 去除 无效数据					 
			$detail_pic  = array_filter($detail_pictures[0]);



			// 获取用户信息
			$tableuser = M('user');
			$user = $tableuser->field('id,username,userpic,status')->where("id=%d",$id)->select();

			// 获取评价数量
			$assess = M('assess');
			$count = $assess->where("goods_id='%d'",$id)->count();
			$arrayAll = ['goods'=>$goods,'path'=>$path,'pictures'=>$pic,'prices'=>$prices,'size'=>$size,'color'=>$color,'detail_pic'=>$detail_pic,'user'=>$user,'count'=>$count];

			return $arrayAll;

   		}



   		public function recommendShop($id) {

   			$status = 2;
   			$first_sort_id = $id;
   			$numberLimit = 5;


   			 $field = ['id','first_sort_id','second_sort_id','goods_name','goods_status','buynum','clicknum','pic_path','store'];



   			//  //推荐商品 
             $recommendShop = M('goods')->field($field)->where("goods_status=%d and first_sort_id=%d",$status,$first_sort_id)->limit($numberLimit)->order('buynum desc')->select();
             
            for ($k = 0;$k < count($recommendShop);$k++) {

                $price = M('goods_price')->field('price,goods_id')->where(['goods_id'=>$recommendShop[$k]['id']])->find();

                $recommendShop[$k]['price'] =$price['price'];

                $recommendShop[$k]['goods_id'] = $price['goods_id'];

            }



            return $recommendShop;
            
   		}
	}