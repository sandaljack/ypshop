<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>有品网登录页</title>
		<!-- link模块 -->
		
		<link rel="stylesheet" href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="/thinkphp_3.2.3_full/Public/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/thinkphp_3.2.3_full/Public/js/jquery-1.12.3.min.js"></script>

        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/images/youpinsize.png">
		<!-- script模块 -->
		
			
		
	</head>

	<body>
	<!-- 头部模块 -->
	

	<!-- 内容模块 -->
	

		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="/thinkphp_3.2.3_full/Public/images/logobig.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/thinkphp_3.2.3_full/Public/images/big.jpg" /></div>
				<div class="login-box">

							<h3 class="title">登录商城</h3>

							<div class="clear"></div>
						
					<div class="login-form">
						<form action="<?php echo U('doLogin');?>" method="post">
							   <div class="user-name">
								    <label for="user"><i style="margin-top: 12px;" class="am-icon-user"></i></label>
								    <input type="text" name="name" id="user" placeholder="邮箱/手机/用户名">
                 				</div>

			                 	<div class="user-pass">
										<label for="password"><i style="margin-top: 12px;" class="am-icon-lock"></i></label>
										<input type="password" name="pass" id="password" placeholder="请输入密码">
			                 	</div>

			                 	<div class="am-cf">
										<input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
								</div>
              			
           			</div>
            
					            <div class="login-links">
					                <label for="remember-me"><input  name="rem" id="remember-me" type="checkbox">记住密码</label>
													<a href="<?php echo U('Login/forgetPass');?>" class="am-fr">忘记密码</a>
													<a href="<?php echo U('Register/register');?>" class="zcnext am-fr am-btn-default">注册</a>
													<br />
					            </div>
							</form>	
						<div class="partner">		
								<h3>合作账号</h3>
							<div class="am-btn-group">
								<li style="margin-top: 10px;"><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
								<li style="margin-top: 10px;"><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
								<li style="margin-top: 10px;"><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
							</div>
						</div>	

				</div>
			</div>
		</div>


	<!-- 底部模块 -->
	
		<div class="clear"></div>		
		<div class="footer" >
			 <div class="footer-hd">
				 <p>
				 友情链接：<a href="<?php echo U('Home/Index/index');?>">有品科技</a>
				 <?php if(is_array($link)): foreach($link as $key=>$v): ?><b>|</b>
				 <a class="url" href="http://<?php echo ($v["furl"]); ?>" target="_blank" url="<?php echo ($v["furl"]); ?>"><?php echo ($v["fname"]); ?></a><?php endforeach; endif; ?>
				
				 </p>
				 </div>
				 <div class="footer-bd">
				 <p>
				 <a href="#">关于有品</a>
				 <a href="#">合作伙伴</a>
				 <a href="#">联系我们</a>
				 <a href="#">网站地图</a>
				 <em>© 2015-2025 youpin.com 版权所有</em>
				 </p>
			 </div>
		</div>
		<div class="clear"></div>
	
	<!-- 右边菜单模块 -->
	
	<!-- 写js区域模块 -->
	
	</body>
</html>