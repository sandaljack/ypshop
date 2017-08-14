<?php

namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{

	/**
	 * 显示后台登录页
	 * @return [type] [description]
	 */
    public function login()
    {
        $this->display();
    }

    /**
     * 处理验证后台登录
     * @return [type] [description]
     */
    public function doLogin()
    {
    	//接收用户名
    	$user = I('post.user');
    	//接收密码
    	$pass = I('post.pass');

    	//判断是否由表单提交
    	if (IS_POST) {

    		//判断账号和密码是否为空
    		if (empty($user) || empty($pass)) {
    			$this->error('账号或密码不能为空!');
    		}

    		//查数据库
    		$res = M('adminuser')->where(['username'=>$user])->find();

    		//判断用户是否存在
    		if ($res) {

    			//用户存在，密码正确，判断状态
    			if (password_verify( $pass, $res['password']) && $res['status'] == 0) {
    				$this->error('你的账号已被禁用，请联系管理员！');
    			}

    			//用户存在，判断密码
    			if (password_verify( $pass, $res['password'])) {

    				//登录成功，存入SESSION
                    session('adminInfo', $res);
    				$this->success('登录成功', U('Admin/Index/index'));
    			} else {

    				//密码错误
    				$this->error('用户名或密码错误!');
    			}

    		} else {

    			//用户名错误
    			$this->error('用户名或密码错误！');
    		}

    	} else {
    		
    		$this->error('未知错误！');
    	}

    	// $user = D("User"); // 实例化user对象

    	// if (!$user->create()) {     
    	// 	// 如果创建失败 表示验证没有通过 输出错误提示信息     
    	// 	exit($User->getError());

    	// }else{     
    	// 	// 验证通过 可以进行其他数据操作
    	// 	$this->success('登录成功');
    	// }
    }

    /**
     * 处理退出登录
     * @return [type] [description]
     */
    public function doLogout()
    {  
        //销毁session
        session('adminInfo', null);

        //跳转到后台登录页
        $this->success('退出成功！', U('Login/login'));
    }
    
}