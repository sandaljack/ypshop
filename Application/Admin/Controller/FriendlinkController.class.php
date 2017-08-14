<?php

namespace Admin\Controller;

use Think\Controller;

class FriendlinkController extends CommonController
{
	public function index()
	{	
		$map = [];
		if (I('get.name') != '') {
			$map['fname'] = ['like', '%'.I('get.name').'%']; 
		}
		$count = M('friendlink')->where($map)->count();
		$Page  = new \Think\Page($count, 10);
		$data = M('friendlink')->where($map)->order(['id desc'])->limit($Page->firstRow.','.$Page->listRows)->select();
		// 分页显示输出
		$show  = $Page->show();
		//输出分页
		$this->assign('page', $show);

		$this->assign('list', $data);
		$this->assign('session', session('adminInfo'));
		$this->display('Friendlink/index');
	}

	//添加友情链接
	public function addFriendlink()
	{
		if (IS_POST) {
			$name = I('post.name');
			$url = I('post.url');
			//上传logo
			if ($_FILES['logo']['name'] != '') {
				
				$uploadRes = $this->upload();

				$picPath = $uploadRes['info']['logo']['savepath'].$uploadRes['info']['logo']['savename'];
			} else {
				//图片未添加时插入的默认图片
				$picPath = '__PUBLIC__/uploads/flogo/commonlogo.jpg';
			}

			$data = [
				'fname'=>$name,
				'furl'=>$url,
				'flogo'=>$picPath
			];
			$res = M('friendlink')->add($data);
			if ($res) {
				$this->success('添加成功', U('Admin/Friendlink/index'));
			} else {
				$this->error('添加失败');
			}
		} else {
			$this->assign('session', session('adminInfo'));
			$this->display('Friendlink/addFriendlink');
		}
	}

	//删除友情链接
	public function delFriendlink()
	{
		$id = I('post.id');
		$lastId = M('friendlink')->where(['id'=>$id])->delete();
		if ($lastId) {
			$this->ajaxreturn(1);
		} else {
			$this->ajaxreturn(2);
		}
	}

	//修改友情链接
	public function editFriendlink()
	{
		if (IS_POST) {
			$id = I('post.id');
			$name = I('post.name');
			$url = I('post.url');

			if ($_FILES['logo']['name'] != '') {
				
				$uploadRes = $this->upload();

				$picPath = $uploadRes['info']['logo']['savepath'].$uploadRes['info']['logo']['savename'];
				unlink('./Public/'.I('post.originlogo'));
			} else {
				//图片未添加时插入的默认图片
				$picPath = I('post.originlogo');
			}
			// dump($picPath);exit;
			$data = [
				'fname'=>$name,
				'furl'=>$url,
				'flogo'=>$picPath
			];
			$res = M('friendlink')->where(['id'=>$id])->save($data);
			if ($res) {
				
				$this->success('修改成功', U('Admin/Friendlink/index'));
			} else {
				$this->error('修改失败');
			}
		} else {
			$id = I('get.fid');
			$data = M('friendlink')->where(['id'=>$id])->find();
			$this->assign('data', $data);
			$this->assign('session', session('adminInfo'));
			$this->display('Friendlink/editfriendlink');
		}
	}

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
		
		$upload->savePath  = './uploads/flogo/';
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
}