<?php

namespace Home\Controller;

use Think\Controller;

class AddressController extends CommonController
{	
	//展示收货地址
	public function showAddress()
	{	
		
		$data = M('address')->field('id,add_name,add_province,add_city,add_area,add_town,add_detail,add_default,add_phone')->where(['user_id'=>session('homeInfo')['id']])->order('add_default desc,id desc')->select();
		//获取地址数量
        $addcount = 0;
        foreach( $data as $k) {
        	$addcount++;
        }

        $this->assign('addcount', $addcount);
		$this->assign('list', $data);
		$this->assign('session', session('homeInfo'));
		$flink = M('friendlink')->select();
        $this->assign('link', $flink);
		$this->display('Person/address');
	}

	//添加收货地址
	public function addAddress()
	{
		$info = I('post.');
        $userid = session('homeInfo')['id'];
        $res = D('address')->addNewAddress($info, $userid);
        if ($res) {
            $this->ajaxreturn(1);
        } else {
            $this->ajaxreturn(2);
        }
	}

	//修改收货地址
	public function editAddress()
	{
  		if (IS_POST) {
  			$info = I('post.');

			$userid = session('homeInfo')['id'];
  			$res = D('address')->upAddress($info, $userid);
  			if ($res) {
	            $this->ajaxreturn(1);
	        } else {
	            $this->ajaxreturn(2);
	        }
  		} else {
  			$id = I('get.id');
	  		$data = M('address')->field('id,add_name,add_province,add_city,add_area,add_town,add_detail,add_phone')->where(['id'=>$id])->find();
	  		$this->assign('data', $data);
	  		$this->assign('session', session('homeInfo'));
	  		$flink = M('friendlink')->select();
        	$this->assign('link', $flink);
	  		$this->display('Person/editaddress');
  		}
  		
	}

	//删除收货地址
	public function delAddress()
	{
		$id = I('post.id');
		$userid = session('homeInfo')['id'];
		$res = M('address')->where(['user_id'=>$userid, 'id'=>$id])->delete();
		if ($res) {
            $this->ajaxreturn(1);
        } else {
            $this->ajaxreturn(2);
        }
	}

	//修改默认地址
    public function upDefaultAdd()
    {
    	$id = I('post.id');

    	$map['id']  = array('neq', $id);
	    $map['user_id'] = session('homeInfo')['id'];
	    M('address')->where(['id'=>$id, 'user_id'=>session('homeInfo')['id']])->setField('add_default', 1);
	    M('address')->where($map)->setField('add_default', 0);
	    $this->ajaxreturn(1);
    }
}