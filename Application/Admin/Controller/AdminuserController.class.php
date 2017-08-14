<?php

namespace Admin\Controller;

use Think\Controller;

class AdminuserController extends CommonController
{
	//添加后台管理员方法
	public function addAdminuser() 
	{
		$this->display('Adminuser/addadminuser');
	}
	//处理添加
	public function actionAddAdminuser()
	{

		$username = I('post.name');

		$password = I('post.password');

		$repassword = I('post.repassword');

		$status = I('post.status');

		$user = M("adminuser"); 

		if (empty($username) || empty($password) || empty($repassword)) {
			$this->error('请输入用户名或者密码');
			exit;
		}

		//判断用户名是否合法：长度、是否有特殊字符
		if(!preg_match('/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{3,18}$/u', $username)){
			$this->error('用户名长度应在3~18个字符，不可有非法字符');
			exit;
		}
		//判断密码是否合法：长度6~18位字符
		if (strlen($password) < 3 || strlen($password) > 18){	
			$this->error('密码长度不符合');
			exit;
		}

		if ( $password !== $repassword){
			$this->error('两次输入的密码不一致，请重新输入!');
		}
	
		// 拿到管理员表数据 判断是否重名
		$user = M('adminuser');
		$dataUser = $user->field('username')->where(['username'=>$username])->find();

		if ($dataUser !== NULL) {
			//回到页面
			$this->error('用户名不可用，请用其他名字！！！');
		}

		//哈希加盐加密
		$passwords = password_hash($password, PASSWORD_DEFAULT);

		//addData 是插入数据表的数组
		$addData['username'] = $username;

		$addData['password'] = $passwords;

		$addData['status']  = $status;

		//将用户数据插入到数据库
   		$bool = $user->add($addData);

   		//插入成功，跳转页面
   		if ($bool) {
   			$this->success('插入成功', U('index'));
   		}

	}

	//显示管理员列表
	public function index()
	{
		$order = 'status desc,id';

		$user = M('adminuser');

		$map = [];
		if (I('get.name') != '') {
			$map['username'] = ['like', '%'.I('get.name').'%']; 
		}

		// 查询满足要求的总记录数
		$count = $user->where($map)->count();
		// 实例化分页类 传入总记录数和每页显示的记录数
		$Page  = new \Think\Page($count, 10);
		$data = $user->field('id,username,status')->where($map)->order($order)
		->limit($Page->firstRow.','.$Page->listRows)->select();
		
		// 分页显示输出
		$show  = $Page->show();
		//输出分页
		$this->assign('page', $show);

		$this->assign('list', $data);

        $this->assign('session', session('adminInfo'));


		$this->display('Adminuser/index');

	}

	//ajax修改首页启用状态
	public function changeStatus()
	{
		$id = I('post.id');
		$status = I('post.status');
		$lastId = M('adminuser')->where(['id'=>$id])->setField('status', $status);
		if ($lastId) {
			$this->ajaxreturn($id);
		} else {
			$this->ajaxreturn($id);
		}
	}

	//修改管理员数据
	public function upAdminuser()
	 {
	 	//获取到修改的用户 id
		$id = I('get.id');
		$list = M('adminuser')->field('id,username,status')->where(['id'=>$id])->find();
		//输出
		$this->assign('list', $list);
		//指定跳转到的页面
		$this->display('Adminuser/upadminuser');
	}

	//处理更新数据
	public function actionUpDate()
	{
		//list 接收POST提交过来的表单数据
		// 获取id
		$id = I('post.id');
		
		// 状态
		$list['status'] = I('post.status');
		//判断是否修改密码
		if (I('post.password')) {
			$list['password'] = I('post.password');
				//判断两次输入的密码是否一样
			if ($list['password'] !== I('post.repassword')) {
				$this->error('两次输入的密码不一致，请重新输入',U('User/upDate'));
			}
		}

		//实例化表
		$user = M('adminuser');
		//密码用 哈希加盐加密
		$list['password'] = password_hash($list['password'], PASSWORD_DEFAULT);
		//将用户数据插入到数据库
   		$bool = $user->where(['id'=>$id])->save($list);
   		//插入成功，跳转页面
   		if ($bool) {
   			$this->success('修改成功',U('Adminuser/index'));
   		} else {
   			$this->error('修改失败');
   		}

	}

	//删除管理员
	public function delAdminuser()
	{
		$id = I('post.id');
		$lastId = M('adminuser')->where(['id'=>$id])->delete();
		if ($lastId) {
			$this->ajaxreturn(1);
		} else {
			$this->ajaxreturn(2);
		}
	}

}