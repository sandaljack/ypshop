<?php
return array(
	//'配置项'=>'配置值'
	//配置权限设置
	'AUTH_CONFIG' => array(
            // 'AUTH_ON' => true, //认证开关
            // 'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
            // 用户组数据表名
            'AUTH_GROUP' => 'yp_auth_group',
            // 用户-用户组关系表
            'AUTH_GROUP_ACCESS' => 'yp_auth_group_access',
            // 权限规则表
            'AUTH_RULE' => 'yp_auth_rule',
            // 用户信息表
            'AUTH_USER' => 'yp_adminuser',    
   )
);