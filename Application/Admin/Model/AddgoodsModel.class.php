<?php

namespace Admin\Model;

use Think\Model;

class AddgoodsModel extends Model
{	
	//解决D方法直接查数据库，而不查自己定义类的问题
	protected $autoCheckFields = false;

	//自动验证
	protected $_validate = array(

		array('firstsortId', 'require', '请选择一级分类', 1),
		array('secondsortId', 'require', '请选择二级分类', 1),
		array('name', 'require', '商品不能为空', 1),
		array('length', 'require', '衣长参数不能为空', 0),
		array('seevelength', 'require', '袖长参数不能为空', 0),
		array('material', 'require', '材质参数不能为空', 0),
		array('collar', 'require', '领型参数不能为空', 0),
		array('sleevetype', 'require', '袖型参数不能为空', 0),

	);

	/**
	 * [upload 调用ThinkPHP的上传模块]
	 * @return [array] [文件上传后成功/失败的提示信息]
	 */
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

    	return [//上传成功提示
	    	'code' => 200,
	    	'msg'  => '上传成功',
	    	'info' => $info,
		];

	}


	/**
	 * [transaction 采用事务方法添加文件信息]
	 * @return [array] [商品添加信息成功/失败的提示信息]
	 */
	public function transaction() {

			//把传过来的post值赋值给$data
			$data = I('post.');
	
			//实例化model类
			$Model = M();

			//开启事务
			$Model->startTrans();

			//如果添加商品页上传了图片，引用GoodModel的上传方法upload
			if ($_FILES['pictures1']['name'][0] != '') {
				
				$uploadRes = $this->upload();

				//商品主图的商品路径
				$picPath = $uploadRes['info'][0]['savepath'].$uploadRes['info'][0]['savename'];

			} else {
				//图片未添加时插入的默认图片
				$picPath = './uploads/common.jpg';
			}

	//tp_goods表的数据插入
	
			//把要插入yp_goods的字段整合成一个数组
			$list1 = ['first_sort_id','second_sort_id','goods_name','pic_path'];

			//把要插入yp_goods的数据整合成一个数组
			$goodData = [
				'first_sort_id'  => $data['firstsortId'],
				'second_sort_id' => $data['secondsortId'],
				'goods_name'     => $data['name'],
				'pic_path'		 => $picPath
				];

			//操作yp_goods表，插入数据
			$goods = M('goods')->field($list1)->data($goodData)->add();



	//tp_goods_detail表的数据插入
	
			//把要插入yp_goods_detail的字段整合成一个数组
			$list2 = ['addtime','length','seeve_length','material','collar','sleeve_type'];


			//获取当前时间商品插入的时间
			$addtime = date('Y-m-d H:i:s', time());

			//把要插入yp_goods_detail的数据整合成一个数组
			$detailData = [
				'addtime'	   => $addtime,
				'length' 	   => $data['length'],
				'seeve_length' => $data['seevelength'],
				'material'     => $data['material'],
				'collar'       => $data['collar'],
				'sleeve_type'  => $data['sleevetype'],
				];

			//操作yp_goods_detail表，插入数据
			$goodsDetail = M('goods_detail')->field($list2)->data($detailData)->add();
			

	//tp_goods_pictures和tp_goods_detail_pictures表的数据插入
	
			if ($_FILES['pictures1']['name'][0] != '' || $_FILES['pictures2']['name'][0] != '') {

				//遍历上传图片模块$uploadRes['info']的数据
				foreach ($uploadRes['info'] as $v) {

					//根据key键区分图片的来源
					if ($v['key'] == 'pictures1') {

						//得到商品浏览图片上传的图片
						$picpath1[] = $v['savepath'].$v['savename'];

					} else {

						////得到商品详情图片上传的图片
						$picpath2[] = $v['savepath'].$v['savename'];
					}
				}

			} else {

				$picpath1[] = './uploads/common.jpg';

				$picpath2[] = './uploads/common.jpg';
			}
		
			//使用同一个类里的commonPicture方法把商品浏览图片插入到数据库
			$goodPicture = $this->commonPicture($picpath1, 'goods_pictures');

			//使用同一个类里的commonPicture方法把商品详情图片插入到数据库
			$detailPicture = $this->commonPicture($picpath2, 'goods_detail_pictures');
			
			//判断4个数据库的数据是否都插入了数据
			if ($goods && $goodsDetail && $goodPicture && $detailPicture) {
			
				$info = $Model->commit();//事务提交

					return [
				    	'code' => 200,
				    	'msg'  => '商品信息插入成功',
				    	'info' => $info,
					];

			} else {

				$Model->rollback();//事务回滚

				foreach ($picpath1 as $v){

					//如果事务回滚了，就遍历删除已经上传的图片（商品浏览图片）
					unlink('./Public/'.$v);
				
				}

				
				foreach ($picpath2 as $v){
					
					//如果事务回滚了，就遍历删除已经上传的图片（商品详情图片）
					unlink('./Public/'.$v);
				}

				return [
				    	'code' => 404,
				    	'msg'  => '商品信息插入失败',
				    	'info' => $info,
					];



			}
	}

	/**
	 * [commonPicture description]
	 * @param   $picpath [图片上传的路径]
	 * @param   $db      [要插入数据库的名字]
	 * @return  string   返回的字符作事务提交的判断条件
	 */
	public function commonPicture($picpath, $db) 
	{
		//把要插入表的字段整合成一个数组
		$list = ['pic_path1','pic_path2','pic_path3','pic_path4','pic_path5'];

		////把要插入表的数据整合成一个数组
		$pictureData = [
				'pic_path1'	=> $picpath[0],
				'pic_path2' => $picpath[1],
				'pic_path3' => $picpath[2],
				'pic_path4' => $picpath[3],
				'pic_path5' => $picpath[4],
				];

		$addgoodPicture = M($db)->field($list)->data($pictureData)->add();

		//返回插入成功或者失败后的值
		return $addgoodPicture;
	}


	
	
}