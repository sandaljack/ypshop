<?php

namespace Admin\Controller;

use Think\Controller;

//后台权限规则管理
class AuthruleController extends CommonController 
// class AuthruleController extends Controller
{	
	//模型
    protected $model;

    public function __construct()
    {
        parent::__construct(); 
        //初始化模型
       	$this->model = D('Authrule'); 
    } 

	//显示权限规则列表
	public function index()
	{	
		//分页
		$count = M('auth_rule')->count();
		$Page  = new \Think\Page($count, 8);
		 
		$ruleData = M('auth_rule')->field('id,name,title,status,condition,classify')
					->limit($Page->firstRow.','.$Page->listRows)->select();
		$show  = $Page->show();
		$this->assign('list', $ruleData);
		$this->assign('page',$show);
        $this->assign('session', session('adminInfo'));
		$this->display();
	}

	//ajax修改首页启用状态
	public function changeStatus()
	{
		$id = I('post.id');
		$status = I('post.status');
		$lastId = M('auth_rule')->where(['id'=>$id])->setField('status', $status);
		if ($lastId) {
			$this->ajaxreturn(1);
		} else {
			$this->ajaxreturn(2);
		}
	}

	//添加权限规则
	public function addRule()
	{	
		if (IS_POST) {
			$info = I('post.');
			$lastId = $this->model->addRule($info);

			if ($lastId) {
				$this->success('新增规则成功', U('index'));
			} else {
				$this->error('新增规则失败');
			}
		} else {
			$this->display();
		}
	}

	//编辑权限规则
	public function editRule()
	{
		if (IS_POST) {
			$info = I('post.');
			$lastId = $this->model->editRule($info);
			
			if ($lastId) {
				$this->success('修改规则成功', U('index'));
			} else {
				$this->error('修改规则失败');
			}
		} else {
			$ruleId = I('get.id');
			$ruleData = M('auth_rule')->field('id,name,title,condition,status,classify')->where(['id'=>$ruleId])->find();
			$this->assign('rule', $ruleData);
			$this->display();
		}
	}

	//删除规则
	public function delRule()
	{
		$id = I('post.id');
		$lastId = M('auth_rule')->where(['id'=>$id])->delete();
		if ($lastId) {
			$this->ajaxreturn(1);
		} else {
			$this->ajaxreturn(2);
		}
	}

	//返回主页
	public function goBack()
	{
		$this->redirect('Admin/Authrule/index');
	}
}
