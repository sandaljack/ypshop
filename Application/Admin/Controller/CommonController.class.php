<?php

namespace Admin\Controller;

use Think\Controller;

//后台公共控制器
class CommonController extends Controller 
{
	public  function _initialize()
	{

		//判断登录
		if (!session('adminInfo')) {
			// $this->error('请登录');
			$this->redirect('Login/login');
			// exit;
			
		}
		// 
		
		//进行权限验证
		//从session得到管理员的uid
		$uid = session('adminInfo')['id'];
		// //拿到管理员当前访问 模块/控制/方法
		$url = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;

		if ( $url!= 'Admin/Index/index' ) {
			$auth = new \Think\Auth();
			//调用Auth类的check方法进行权限验证
			$bool = $auth->check($url, $uid);
			// 没有权限访问
			if (!$bool) {
				$this->error('抱歉！没有权限访问该功能', U('Index/index'));
			}
			
		}


	}
}