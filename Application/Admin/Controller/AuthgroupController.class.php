<?php

namespace Admin\Controller;

use Think\Controller;

//后台权限角色管理
class AuthgroupController extends CommonController 
// class AuthgroupController extends Controller
{
	//模型
    protected $model;

    public function __construct()
    {
        parent::__construct(); 
        //初始化模型
       	$this->model = D('Authgroup'); 
    }   

	//显示用户组列表
	public function index()
	{	
		//分页
		$count = M('auth_group')->count();
		$Page  = new \Think\Page($count, 2);
		$show  = $Page->show();
		$groupsData = M('auth_group')->field('id,title,status,rules,function')
					->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('list', $groupsData);
		$this->assign('page',$show);
        $this->assign('session', session('adminInfo'));

		$this->display();
		
	
	}

	//ajax修改首页启用状态
	public function changeStatus()
	{
		$id = I('post.id');
		$status = I('post.status');
		$lastId = M('auth_group')->where(['id'=>$id])->setField('status', $status);
		if ($lastId) {
			$this->ajaxreturn($id);
		} else {
			$this->ajaxreturn($id);
		}
	}

	//添加组
	public function addGroup()
	{	
		if (IS_POST) {
			$info = I('post.');

			$lastId = $this->model->addGroup($info);
			if ($lastId) {
				//成功
				$this->success('新增组成功', U('index') );
				exit;
			} 
			$this->error('新增组失败');
		} else {
			$rule = M('auth_rule')->field('id,title,classify')
					->where(['status' => 1])->select();
			$this->assign('rule', $rule);
        	$this->assign('session', session('adminInfo'));

			$this->display();

		}	
	}

	//删除用户组
	public function delGroup()
	{
		$id = I('post.id');
		$lastId = M('auth_group')->where(['id'=>$id])->delete();
		if ($lastId) {
			$this->ajaxreturn(1);
		} else {
			$this->ajaxreturn(2);
		}
	}

	//管理组权限规则
	public function editGroup()
	{
		if (IS_POST) {
			$info = I('post.');
			$lastId = $this->model->upGroup($info);
			if ($lastId) {
				//成功
				$this->success('修改组成功', U('index') );
				exit;
			} 
			$this->error('修改组失败');
		} else {
			$id = I('get.id');
			$rules = M('auth_rule')->field('id,classify,title')->where(['status' => 1])->select();
			$group = M('auth_group')->field('id,title,status,rules,function')->where(['id'=>$id])->find();
			$this->assign('group', $group);
			$this->assign('rule', $rules);
       		 $this->assign('session', session('adminInfo'));

			$this->display();
		}
	}

	//在组中管理用户
	public function editUser()
	{	
		//得到组id
		$gid = I('get.id');
		//分页
		$count = M('auth_group_access')->where(['group_id'=>$gid])->count();
		$Page  = new \Think\Page($count, 1);
		$show  = $Page->show();
		$uids = M('auth_group_access')->field('uid')->where(['group_id'=>$gid])
				->limit($Page->firstRow.','.$Page->listRows)->select();
		$group = M('auth_group')->field('id,title,function')
				->where(['id'=>$gid])->find();
		foreach ($uids as $v) {
			$userInfo[] = M('adminuser')->field('id,username')
					->where(['id' => $v['uid']])->find();
		}
		$this->assign('userlist', $userInfo);
		$this->assign('group', $group);
		$this->assign('page', $show);
        $this->assign('session', session('adminInfo'));

		$this->display();
	}

	//用户管理中新增用户
	public function addUser()
	{	
		if (IS_POST) {
			$info = I('post.');
			$res = M('adminuser')->where(['username'=>$info['username']])->find();
			if (!$res) {
				$this->error('没有此用户，请先添加!');
				exit;
			} 
			$data = [
				'uid'	=> $res['id'],
				'group_id'=>$info['groupid']
			];
			$lastId = M('auth_group_access')->add($data);
			if ($lastId) {
				$this->success('添加用户成功！', U('edituser', array('id'=>$info['groupid'])));
			} else {
				$this->error('添加用户失败!');
			}
			
		} else {
			$id = I('get.id');
			$group = M('auth_group')->field('id,title')->where(['id'=>$id])->find();
			$this->assign('group', $group);
        	$this->assign('session', session('adminInfo'));

			$this->display();
		}
		
	}

	//用户管理中删除用户
	public function delUser()
	{
		$uid = I('post.uid');
		$gid = I('post.gid');
		$lastId = M('auth_group_access')->where(['uid'=>$uid, 'group_id'=>$gid])->delete();
		if ($lastId) {
			$this->ajaxreturn(1);
		} else {
			$this->ajaxreturn(2);
		}
	}

}