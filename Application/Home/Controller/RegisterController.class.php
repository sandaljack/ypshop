<?php

namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller
{

    public $verify;
	/**
	 * 显示注册页面
	 * @return html文件 返回view视图的文件
	 */
    public function register()
    {	
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
        $this->assign('link', $flink);
    	//显示注册页
        $this->display();
    }


    /**
     * 处理注册页，由ajax提交的前端验证
     * @return int 返回数字
     */
    public function doregPre()
    {
		
		//接收AJAX传过的数据
    	$name = I('post.name');
    	$val = I('post.val');
        
    	

    	//判断是哪一个input框
    	switch ($name) {

    		//匹配输入用户名框
    		case 'username':

    			$res = preg_match('/^\w{4,20}$/', $val);

    			$arr = M('user')->where(['username'=>$val])->find();

    			if ($res && !$arr) {
    				echo 1;
    			} else {
    				echo 2;
    			}

    		break;

    		//匹配密码框
    		case 'password':

    			$res = preg_match('/^\d{3,6}$/', $val);

    			if ($res) {
    				echo 3;
    			} else {
    				echo 4;
    			}

    			session('password', $val);
    	
    		break;

    		//匹配重复密码框
    		case 'repassword':
    			
    			$password = session('password');

    			if ($val == $password) {
    				echo 5;
    			} else {
    				echo 6;
    			}

    		break;

            //匹配邮箱
            case 'email':

                $res = preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $val);

                $arr = M('user')->where(['email'=>$val])->find();

                if ($res && !$arr) {
                    echo 7;
                } else {
                    echo 8;
                }

            break;

    		default:
    			echo 9;
    	}
    }

    /**
     * 处理注册页面的表单后端验证
     * @return [type] [description]
     */
    public function doregBack()
    {

    	//判断是否表单POST提交
    	if (IS_POST) {

    		//接收用户名
    		$username = I('post.username');
            //接收邮箱
            $email = I('post.email');
    		//接收密码
    		$pass     = I('post.password');
    		//接收确认密码
    		$repass   = I('post.repassword');
    		//接收用户输入的验证码
    		$code     = I('post.code');
    		//接收用户是否确认条款
    		$agreet   = I('post.agreet');

    		//判断用户名，密码是否为空
    		if (empty($username) || empty($pass) ||  empty($repass)) {
                $this->error('用户名和密码不能为空！');
    			exit;
    		}

    		//判断验证码是否为空
    		if (empty($code)) {
    			$this->error("请输入验证码！");
    			exit;
    		}

    		//判断验证码是否输入正确
    		$verify = new \Think\Verify();
        
    		$res = $verify->check($code);   //返回值true false
    		
    		if (!$res) {
    			$this->error("验证码不正确！");
                exit;
    		}
    		


    		//判断用户名是否合法
    		$preg = preg_match('/^\w{4,20}$/', $username);
    		if (!$preg) {
    			$this->error("用户名不合法！");
                exit;
    		}

            //判断邮箱是否合法
            $preg = preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $email);
            if (!$preg) {
                $this->error("邮箱不合法！");
                exit;
            }

    		//判断密码是否合法
    		$preg_A = preg_match('/^\d{3,9}$/', $pass);
    		$preg_B = preg_match('/^\d{3,9}$/', $repass);

    		if (!$preg_A || !$preg_B) {
    			$this->error("密码不合法！");
    			exit;
    		}

    		//两次密码是否一致
    		if ($pass !== $repass) {
    			$this->error("两次密码不一致！");
    			exit;
    		}

    		//判断是否同意条款
			if ($agreet != 'on') {
    			$this->error("未同意条款！");
    			exit;
    		}


			//判断用户名是否存在
			$res = M('user')->where(['username'=>$username])->find();
			if ($res) {
				$this->error("用户名已存在！");
    			exit;
			}

            //判断邮箱是否存在
            $res = M('user')->where(['email'=>$email])->find();
            if ($res) {
                $this->error("该邮箱已注册！");
                exit;
            }

			//数据验证通过，插入到数据库
			$arr['username'] = $username;
			$arr['password'] = password_hash($pass, PASSWORD_DEFAULT);
            $arr['email']    = $email;
            $arr['regtime']  = time() + 60*60*24;
            $arr['token']    = md5($username);
            $arr['userpic']  = './uploads/userpic/usercommonpic.jpg';
			$res = M('user')->add($arr);

			//判断是否成功插入到数据库
			if ($res) {

                //注册成功，发送邮件
                think_send_mail($email, $username, '有品购物网', '
                亲爱的: '.$username.'，感谢您注册 有品购物网 账号，请点击下面链接来激活您的账号。（24小时内有效）

                <a href="http://192.168.37.122/prot/thinkphp/index.php/Home/Register/verify_token?token='.$arr['token'].'&username='.$username.'">http://192.168.37.122/protwo/thinkphp/index.php/Home/Register/verify_token?token='.$arr['token'].'</a>
                ');

				$this->success('注册成功！请尽快登录邮箱激活账号。', U('Login/login'),3);

			} else {

                //注册失败
				$this->error('注册失败！', U('register'),3);
			}

    	} else {

    		//不是POST提交过来的数据，自动跳回到注册页
    		$this->error('页面崩溃了！~~~', U('register'),3);
    	}
    }

    //验证token值
    public function verify_token()
    {
        
        $token1 = I('get.token');
        $username = I('get.username');
        $time = time();

        $res = M('user')->where(['username'=>$username])->find();
        $regtime = $res['regtime'];
        $token2 = md5($res['username']);

        
        //判断时间和token值
        if ($time > $regtime) {
            $this->error('该链接已失效........');
        }

        if ($token1 != $token2) {
            $this->error('未知链接........');
        }

        $msg = M('user')->where(['username'=>$username])->save(['status'=>2]);

        if($msg) {
            $this->success('激活成功~', U('Login/login'));
        } else {
            $this->error('账号已激活，赶快登录吧~~~~', U('Login/login'));
        }
    }


    /**
     * 注册页验证码
     * @return [type] [description]
     */
    public function code()
    {
    	$Verify = new \Think\Verify();
    	$Verify->fontSize =   30;   // 验证码字体大小    
    	$Verify->length   =   4;    // 验证码位数    
    	$Verify->useNoise =   false; // 关闭验证码杂点
        $Verify->codeSet = '0123456789ab';
    	//输入验证码，数字1--用来区分其他验证码
    	$Verify->entry();
    }


    
    
}