<?php

namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{

    //保存PDO对象
    protected $pdo;

    //构造方法
    public function __construct()
        {
            //重载父类的构造方法
            parent::__construct();

            //链接数据库
            $this->connectDB();
        }

    /**
     * 连接数据库
     * @return 返回一个对象
     */
    protected function connectDB()
    {
        $dsn = "mysql:host=localhost;dbname=yp;charset=utf8";
        $this->pdo = new \PDO($dsn, 'root', '123456');
    }

    /**
     * 显示登录页
     * @return [type] [description]
     */
    public function login()
    {   
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
        $this->assign('link', $flink);
        $this->display();

    }

    /**
     * 处理登录页
     * @return [type] [description]
     */
    public function doLogin()
    {

        //判断是否由表单提交过来
    	// if (IS_POST) {

            //接收用户名
    		$name = I('post.name');
            //接收密码
    		$pass = I('post.pass');
            //接收免登录
            $rem = I('post.rem');
            //来源购物车页面
            $go = I('get.go');


            //判断用户名，密码是否为空
            if ( empty($name) || empty($pass) ) {

                $this->error('用户名和密码不能为空');
                exit;
            }

            //查询数据库
            $res = M('user')->where(['username'=>$name])->find();

            

            //判断是否查询到信息
            if ( $res ){
                
                //检查用户最近30分钟密码错误次数
                $errmsg = $this->checkPassWrongTime($res['id']);
                // dump($errmsg);exit;
                //错误次数超过限制次数
                if ( $errmsg === false ) {

                    echo '<script>alert("你刚刚输错很多次密码，为了保证账户安全，系统已经将您账号锁定30分钟！");</script>';
                    $this->error('请30分钟后再次尝试登录！', U('Login/login'));
                    exit;
                }


                //判断账号状态
                if ( $res['status'] == 1 ) {
                    $this->error("该账号已被停用！请联系管理员");
                    exit;
                }


                //判断密码是否正确
                if ( password_verify( $pass, $res['password']) ) {

                    //选择7天免登录
                    if ( $rem == 'on' ) {

                        cookie('PHPSESSID',  SESSION_ID(), 'expire=3600*24*7');

                    }
                    
                    //登录成功，用户信息存进session
                    session('homeInfo', $res);
                   
                    
                    //销毁用来判断重复密码是否正确的密码
                    session('password', null);


                    //跳转到首页
                    if ($go == 'pay') {
                        $this->success('登录成功！', U('Shopcar/shopcar'));
                    } else {
                        $this->success('登录成功！', U('Index/index'));
                    }
                    
                    

                } else {

                    //记录密码错误次数
                    $this->recordPassWrongTime($res['id']);
                    //密码不正确
                    $this->error("用户名或密码错误！");
                    exit;
                }


            } else {

                //用户名不正确
                $this->error('用户名或密码错误！', U('Login/login'));
                exit;
            }
            

    }

        //记录密码输出信息
        protected function recordPassWrongTime($uid)
        {

                //ip2long()函数可以将IP地址转换成数字
                $ip = ip2long( $_SERVER['REMOTE_ADDR'] );

                // dump($ip);exit;
                // echo '<pre>';
                // var_dump($_SERVER);exit;
                $time = date('Y-m-d H:i:s');
                $sql = "insert into yp_user_info(uid,ipaddr,logintime,pass_wrong_time_status) values($uid,$ip,'{$time}',2)";

                // dump($sql);exit;
                $stmt = $this->pdo->prepare($sql);

                $stmt->execute();
        }

        /**
         * 检查用户最近$min分钟密码错误次数
         * $uid 用户ID
         * $min  锁定时间
         * $wTIme 错误次数
         * @return 错误次数超过返回false,其他返回错误次数，提示用户
         */
        protected function checkPassWrongTime($uid, $min=30, $wTime=3)
        {
                // return false;
                if ( empty($uid) ) {

                    throw new \Exception("第一个参数不能为空");

                }

                $time =date('Y-m-d H:i:s', time() );//9:00
                $prevTime = date('Y-m-d H:i:s', time() - $min*60);//8:30

                // echo '<pre>';
                //用户所在登录ip
                $ip = ip2long( $_SERVER['REMOTE_ADDR'] );
                // print_r($_SERVER);exit;

                //pass_wrong_time_status代表用户输出了密码
                $sql = "select * from yp_user_info where uid='$uid' and pass_wrong_time_status='2' and logintime between '$prevTime' and '$time' and ipaddr='$ip';";
                // dump($sql);

                $stmt = $this->pdo->prepare($sql);

                $stmt->execute();

                $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                // dump($data);exit;

                //统计错误次数
                $wrongTime = count($data);


                //判断错误次数是否超过限制次数
                if ( $wrongTime > $wTime ) {

                    return false;
                }

                return $wrongTime;



        }

    //忘记密码页面
    public function forgetPass()
    {   
        $this->assign('session', session('homeInfo'));
        $flink = M('friendlink')->select();
        $this->assign('link', $flink);
        $this->display();
    }

    //处理忘记密码
    public function doForget()
    {
        //接收用户填写邮箱
        $email = I('post.email');

       //查找数据库
        $res = M('user')->where( ['email'=>$email] )->find();

        //判断查找结果
        if (!$res) {

            //邮箱不存在
            echo 1;
            
        } else {

            
            //邮箱存在
            $getpasstime = time();
            $time = date('Y-m-d H:i');
            $uid  = $res['id'];

            //拼接token值
            $token = md5( $uid.$res['username'].$res['password'] );

            //拼接url
            $url = 'http://192.168.37.122/prot/thinkphp/index.php/Home/Login/chanPass?email='.$email.'&token='.$token;
            

            //把当前发送邮件的时间存入数据库
            $row =  M('user')->where( ['id'=>$uid] )->save( ['regetpasstime'=>$getpasstime] );

            //发送邮件
            $messg = think_send_mail($email,'有品购物网','【有品购物网】————重置密码','

                    亲爱的'.$email.':<br/>您在：'.$time.'提交了密码找回申请，请点击以下链接重置密码（24小时内有效）。<br/><a href="'.$url.'" target="_blank">'.$url.'</a>
                ');

            // $this->ajaxreturn(2);
            if ($messg) {
                echo 2;
            }
            
        }

        //查看最后输出的SQL语句
        //echo M("user")->_sql();
        
    }



    /**
     * 用户点击邮箱链接进行密码修改
     * @return [type] [description]
     */
    public function chanPass()
    {
        //获取值
        $token = I('get.token');
        $email = I('get.email');


        //用email查询数据库
        $res = M('user')->where(['email'=>$email])->find();

        if ($res) {
            //邮箱存在，构造token值
            $tk = md5($res['id'].$res['username'].$res['password']);

            //判断token是否正确
            if ($tk == $token) {

                //token值正确，判断时间
                if ( time()-$res['regetpasstime'] > 60*60*24 ) {

                    $this->error('链接已过期！');
                } else {

                    //修改密码页面
                    $this->success('正在进入修改密码页面，请稍后...', U('Login/chgPage',array('id'=>$res['id'])), 3);
                }
            } else {

                //token值匹配不上
                $this->error('错误的链接！');
            }
        } else{

            //不存在该邮箱
            $this->error('无效的链接！');
        }
        
    }

    //修改密码页面
    public function chgPage()
    {   
        $id = I('get.');

        $this->redirect('Login/chgPass',array('id'=>$id));
    }


    //处理修改密码
    public function doChgPass()
    {
        
        //获取密码
        $pass   = I('post.pass');
        $repass = I('post.repass');
        $id     = I('post.id');

        if (empty($pass) || empty($repass)) {
            $this->error('密码不能为空！');
        }

        if (!preg_match('/^\d{3,9}$/',$pass)) {
            $this->error('密码应为3-9位数字！');
        }

        if ($pass != $repass) {
            $this->error('两次密码不一致！');
        }

        if (empty($id)) {
            $this->error('未知用户！');
        }

        //加密密码
        $password = password_hash($pass, PASSWORD_DEFAULT);

        //修改密码
        $res = M('user')->where(['id'=>$id])->save(['password'=>$password]);

        //判断是否成功
        if ($res) {

            //修改成功
            $this->success('修改成功！', U('Login/login'));
        } else {

            $this->error('未知错误！');
        }
    }

    //退出登录
    public function loginOut()
    {
        session('homeInfo', null);
        $this->success('退出成功', U('Index/index'));
    }

}