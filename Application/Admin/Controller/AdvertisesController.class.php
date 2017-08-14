<?php

namespace Admin\Controller;

use Think\Controller;

class AdvertisesController extends CommonController
{

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
		
		$upload->savePath  = './uploads/Adver/';
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

	//广告主页
	public function index()
	{

		$adverData = M('advertises')->field(['id', 'ad_title', 'ad_pic', 'ad_url'])->select();

		$this->assign('adverData', $adverData);

		$this->display('Advertises/index');

		
	}

	//添加广告链接
	public function addAdvertises() 
	{
		if (IS_POST) {

			$name = I('post.name');

			$url = I('post.url');
			//上传图片
			if ($_FILES['picture']['name'] != '') {
				
				$uploadRes = $this->upload();

				$picPath = $uploadRes['info']['picture']['savepath'].$uploadRes['info']['picture']['savename'];
			} else {
				//图片未添加时插入的默认图片
				$picPath = '__PUBLIC__/uploads/Adver/commonurl.jpg';
			}

			$data = [
				'ad_title' => $name,
				'ad_url'   => $url,
				'ad_pic'   => $picPath
			];	

			$res = M('advertises')->add($data);

			if ($res) {

				$this->success('添加成功', U('Admin/Advertises/index'));

			} else {

				$this->error('添加失败');
			}
			
		} else {

			$this->assign('session', session('homeInfo'));
			$this->display('Advertises/addAdvertises');

		} 
		
	}

	public function editAdvertises()
	{
		if (IS_POST) {

			$editData = I('post.');
			
			if ($_FILES['picture']['name'] != '') {
				
				$uploadRes = $this->upload();

				$picPath = $uploadRes['info']['picture']['savepath'].$uploadRes['info']['picture']['savename'];

				unlink('./Public/'.$editData['adverpic']);

			} else {
				//图片未添加时插入的默认图片
				$picPath = $editData['adverpic'];
			}

			$data = [
				'ad_title' => $editData['name'],
				'ad_url'   => $editData['url'],
				'ad_pic'   => $picPath
			];	

			$editadver = M('advertises')->where(['id'=>$editData['aid']])->setField($data);

			if ($editadver) {

				$this->success('修改成功', U('Admin/Advertises/index'));
			} else {

				$this->error('修改失败');
			}

		} else {

			$adverId = I('get.aid');

			$adverData = M('advertises')->where(['id' => $adverId])->find();

			$this->assign('adverdata', $adverData);

			$this->display('Advertises/editAdvertises');

		}
	}

	public function delAdvertises()
	{

		$aid = I('post.id');

		$picpath = I('post.pic');

		$delData = M('advertises')->where(['id'=>$aid])->delete();

		if ($delData) {

			$this->ajaxreturn(1);

			unlink('./Public/'.$picpath);

		} else {

			$this->ajaxreturn(2);

		}


	}
}