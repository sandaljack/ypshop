<?php
return array(
	//'配置项'=>'配置值'
	//购物车session设置
	'SESSION_OPTIONS' => array(
    'name' => 'id',
    'prefix' => 'think',
    'expire' =>36000,
    ),  
	

	//redis缓存
	 // 'DATA_CACHE_PREFIX' => 'Redis_',//缓存前缀
	 // 'DATA_CACHE_TYPE'=>'Redis',//默认动态缓存为Redis
	 'REDIS_RW_SEPARATE' => true, //Redis读写分离 true 开启
	 'REDIS_HOST'=>'192.168.37.250', //redis服务器ip，多台用逗号隔开；读写分离开启时，第一台负责写，其它[随机]负责读；
	 'REDIS_PORT'=>'6379',//端口号
	 'REDIS_TIMEOUT'=>'300',//超时时间
	 'REDIS_PERSISTENT'=>false,//是否长连接 false=短连接
	 'REDIS_AUTH'=>'',//AUTH认证密码

	 //邮箱配置参数
    'THINK_EMAIL' => array(

    	'SMTP_HOST' => 'smtp.163.com',
    	'SMTP_PORT' => 465,
    	'SMTP_USER' => 'dawenrenr@163.com',
    	'SMTP_PASS' => 'a5332905',//不是邮箱登录密码
    	'FROM_EMAIL'=> 'dawenrenr@163.com',
    	'FROM_NAME' => '',
    	'REPLY_EMAIL' => '',
    	'REPLY_NAME' => '',
    	'SESSION_EXPIRE' => '72',
    ),

    // 开启静态缓存
    'HTML_CACHE_ON'     =>    true,

     // 全局静态缓存有效期（秒）
    'HTML_CACHE_TIME'   =>    60, 

    // 设置静态缓存文件后缀
    'HTML_FILE_SUFFIX'  =>    '.shtml', 

    'HTML_CACHE_RULES'  =>     array(

        //前台首页静态缓存
        // 'Index:' => array('Home/Index/index', '60'),

    ),



);