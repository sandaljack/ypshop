<?php

namespace Home\Model;

// use Think\Upload;

class UploadsModel
{

/*    public function __construct()
    {
        $this->uploads();
    }*/
    public function uploads()
    {

    	$upload = new \Think\Upload();// 实例化上传类

		$upload->maxSize   =     3145728 ;// 设置附件上传大小

		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型


		//设置文件保存根目录
		$upload->rootPath = './Public/';

		$upload->savePath  = './uploads/userpic/'; // 设置附件上传目录

		//做文件上传
    	$info   =   $upload->upload();
       
    	if(!$info) {// 上传错误提示错误信息

    		// $this->error( $upload->getError() );
    		
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

}