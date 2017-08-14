<?php

namespace Admin\Model;

use Think\Model;

class ChangegoodsModel extends Model
{
	//解决D方法直接查数据库，而不查自己定义类的问题
	protected $autoCheckFields = false;

	//上传图片的方法
	public function upload()
	{
		$upload = new \Think\Upload();
		// 实例化上传类

		$upload->maxSize = 3145728;
		// 设置附件上传大小
		
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
		// 设置附件上传类型
		
		$upload->rootPath = './Public/';
		//设置附件上传目录
		
		$upload->savePath  = './uploads/';
		// 设置附件上传目录

		$info = $upload->upload();
		//最后文件上传

		if(!$info) {//上传错误提示

			return [
    			'code' => 404,
    			'msg'  => $upload->getError(),
    		];
		}

    	return [
	    	'code' => 200,
	    	'msg'  => '上传成功',
	    	'info' => $info,
		];

	}

	//查询已有的商品信息
	public function queryData() 
	{

		$goodId = (I('get.id'));

		$goodsData = M('goods')->field(['goods_name'])->where(['id' => $goodId])->find();

		$detailData = M('goods_detail')->field(['length', 'seeve_length', 'material', 'collar', 'sleeve_type'])->where(['goods_id' => $goodId])->find();

		$goodsPic = M('goods_pictures')->field(['pic_path1', 'pic_path2', 'pic_path3', 'pic_path4', 'pic_path5'])->where(['goods_id' => $goodId])->find();

		$detailPic = M('goods_detail_pictures')->field(['pic_path1', 'pic_path2', 'pic_path3', 'pic_path4', 'pic_path5'])->where(['goods_id' => $goodId])->find();

		$data[] =[$goodsData, $detailData, $goodsPic, $detailPic, $goodId];

		return $data;
	
	}

	//修改商品信息
	public function saveData() {

		$changeData = I('post.');

		$goodId = $changeData['goodId'];

		//实例化model类
		$Model = M();

		//开启事务
		$Model->startTrans();

	//tp_goods表的数据
		//把要修改yp_goods的字段整合成一个数组
		$list1 = ['goods_name','store'];

		//把要修改yp_goods的数据整合成一个数组
		$goodData = [
			'goods_name'     => $changeData['name'],
			'store'          => $changeData['store']
			];

		//操作yp_goods表，更改数据
		$goods = M('goods')->field($list1)->where(['id' => $goodId])->setField($goodData);


	//tp_goods_detail表的数据更改
	
		$list2 = ['changetime','length','seeve_length','material','collar','sleeve_type'];

		//获取当前时间商品信息修改的时间
		$changetime = date('Y-m-d H:i:s', time());

		//把要修改yp_goods_detail的数据整合成一个数组
		$detailData = [
			'addtime'	   => $changetime,
			'length' 	   => $changeData['length'],
			'seeve_length' => $changeData['seevelength'],
			'material'     => $changeData['material'],
			'collar'       => $changeData['collar'],
			'sleeve_type'  => $changeData['sleevetype'],
			];

		//操作yp_goods_detail表，插入数据
		$goodsDetail = M('goods_detail')->field($list2)->where(['goods_id' => $goodId])->setField($detailData);


		//判断列表图片或者商品列表图片是否有图片上传，如果有则给$success赋值
		for ($i = 1; $i <= 5; $i++) {

			if(!($_FILES["pictures$i"]['name'] == '') || !($_FILES["detailPic$i"]['name'] == '')) {

				$success = 1; 
			
			}

		}

		//判断$success是否有值，有的话证明有文件上传，所以触发上传类
		if ($success == 1) {

			$uploadRes = $this->upload();

		}
		
		//把要更换图片的字段信息列举出来
		$uploadData = $uploadRes['info'];

		foreach ($uploadData as $k => $v ) {

			$list = substr($k, 0, 8);

			if ($list == 'pictures') {

				$afterNum1 = substr($k, -1);

				$path1 = $v['savepath'].$v['savename'];

				$goodFields["pic_path$afterNum1"] = $path1;
				
			} else {

				$afterNum2 = substr($k, -1);

				$path2 = $v['savepath'].$v['savename'];

				$detailFields["pic_path$afterNum2"] = $path2;
			}

		}

		$goodPicture = M('goods_pictures')->where(['goods_id' => $goodId])->setField($goodFields);

		$detailPicture = M('goods_detail_pictures')->where(['goods_id' => $goodId])->setField($detailFields);

		if ($goods || $goodsDetail || $goodPicture || $detailPicture) {
			
			$info = $Model->commit();//事务提交

				return [
			    	'code' => 200,
			    	'msg'  => '商品信息更改成功',
			    	'info' => $info,
				];

				foreach ($goodFields as $v) {

					unlink('./Public/'.$v);

				}


				foreach ($detailFields as $v) {

					unlink('./Public/'.$v);

				}

		} else {

			$Model->rollback();//事务回滚

			return [
			    	'code' => 404,
			    	'msg'  => '商品信息更改失败',
			    	'info' => $info,
				];

		}
	}
}