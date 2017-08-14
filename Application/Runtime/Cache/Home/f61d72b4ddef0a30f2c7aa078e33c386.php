<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>有品购物网注册</title>
		<!-- link模块 -->
		
		<link rel="stylesheet" href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/thinkphp_3.2.3_full/Public/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/images/youpinsize.png">
		<!-- script模块 -->
		
			
		
	</head>

	<body>
	<!-- 头部模块 -->
	

	<!-- 内容模块 -->
	
		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="/thinkphp_3.2.3_full/Public/images/logobig.png" /></a>
		</div>

		<div class="res-banner" style="height:490px;">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/thinkphp_3.2.3_full/Public/images/big.jpg" /></div>
				<div class="login-box" style="height:600px;position:absolute;top:-50px;background:#F5F5F5;">
						<div class="am-tabs" id="doc-my-tabs">
							
							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">
						<form action="<?php echo U('Register/doregBack');?>" method="post">
										
								<p style="font-size:25px;margin-left:80px;">欢&nbsp迎&nbsp注&nbsp册</p>
								<div>&nbsp</div>
							    <div class="user-name">
									<label for="user"><i style="margin-top: 12px;" class="am-icon-user"></i></label>
									<input type="text" name="username" id="user" placeholder="输入账号" autocomplete="off">
                 				</div>

                 				<div id="user">
									<span style="color:#F5F5F5;font-size:13px;">支持中文、字母、数组、"_" 4-10个字符</span>
								</div>

								<div class="user-email">
									<label for="email"><i style="margin-top: 12px;" class="am-icon-envelope-o"></i></label>
									<input type="text" name="email" id="email" placeholder="输入邮箱" autocomplete="off">
                 				</div>

                 				<div id="email">
									<span style="color:#F5F5F5;font-size:13px;">XXXXXXX@163.com</span>
								</div>

								
                 				<div class="user-pass">
								    <label for="password"><i style="margin-top: 12px;" class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="设置密码" autocomplete="off">
                 				</div>

                 				<div id="pass">
									<span style="color:#F5F5F5;font-size:13px;">密码为3-6位数字</span>
								</div>

                 				<div class="user-pass">
								    <label for="passwordRepeat"><i style="margin-top: 12px;" class="am-icon-lock"></i></label>
								    <input type="password" name="repassword" id="repassword" placeholder="确认密码" autocomplete="off">
                 				</div>

                 				<div id="repass">
									<span style="color:#F5F5F5;font-size:13px;">密码为3-6位数字</span>
								</div>

								<div class="verification">
									<label for="code"><i class="am-icon-lock"></i></label>
									<input placeholder="输入验证码" type="text" name="code" style="width: 50%;position: relative;left: 0px;top:-25px;"><img width="100px" height="48px" src="<?php echo U('Register/code');?>" style="cursor:pointer;margin-left: 10px;" alt="验证码" title="点击刷新"  id="code" onClick="this.src=this.src+'?'+Math.random()">
								</div>

							<!-- <div class="verification">
											<label for="code"><i class="am-icon-code-fork"></i></label>
											<input type="tel" name="code" id="code" placeholder="请输入验证码">
											<img width="100px" height="50px" src="<?php echo U('Register/code');?>" style="cursor:pointer;margin-left: 10px;" alt="验证码" title="点击刷新"  id="code" onClick="this.src=this.src+'?'+Math.random()">
										</div> -->
			

								<br>
									<ul style="height: 20px;width: 300px;">
										<li style="width: 30px;height: 30px;float: left;">

										  <input type="checkbox" name="agreet" style="zoom:50%;width: 50px;height: 30px;">
										 </li>
										

										 <li style="display: inline;height: 20px;float: left;">点击表示您同意商城《服务协议》
										 </li>
									</ul>
							  	
										<div class="am-cf">
											<input type="button" id="btn" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>

										

								</div>

								<div class="am-tab-panel">
                 		</form>

                 	<script>

                 		
                 	$('#btn').click(function () {

                 		var user = $('input[name="username"]').val();
                 		var email = $('input[name="email"]').val();
                 		var pass = $('input[name="password"]').val();
                 		var repass = $('input[name="repassword"]').val();
                 		var code = $('input[name="code"]').val();


						// console.log($('input[name="username"]'));
      //            		console.log($('input[name="username"]').val().length);

                 		if ((user.length > 0) && (email.length > 0) && (pass.length > 0) && (repass.length > 0) && (code.length > 0) ) {

                 			$('#btn').attr('type','submit');
                 			
                 		} else {

                 			alert('请完善注册信息');
                 		}
                 	});
                 		
                 	</script>
						
						<!-- 如果input框没内容，得到焦点提示输入格式，失去焦点取消提示 -->
						<!-- 如果input框有内容，失去焦点验证内容是否符合要求 -->


					<script type="text/javascript">

						//user框
						$('input#user').focus(function() {

							$(this).css('border-color','white');

							$('div#user').children().text('中文、字母、数字、"_" 4-20个字符').css({"color":"gray", "font-weight":"600"});
						}).blur(function() {

							$('div#user').children().css("color","#F5F5F5");
						});

						//邮箱框
						$('input#email').focus(function() {

							$(this).css('border-color','white');

							$('div#email').children().text('邮箱格式：XXXXX@163.com').css({"color":"gray", "font-weight":"600"});
						}).blur(function() {

							$('div#email').children().css("color","#F5F5F5");
						});

						//密码
						$('input#password').focus(function() {

							$(this).css('border-color','white');

							$('div#pass').children().text('密码为3-9位数字').css({"color":"gray", "font-weight":"600"});
						}).blur(function() {

							$('div#pass').children().css("color","#F5F5F5");
						});

						//重复密码
						$('input#repassword').focus(function() {

							$(this).css('border-color','white');

							$('div#repass').children().text('密码为3-9位数字').css({"color":"gray", "font-weight":"600"});
						}).blur(function() {

							$('div#repass').children().css("color","#F5F5F5");
						});

						


						// console.log($('#user').length);
							// $('input').each(function () {
							// 	//如果input框没内容，得到焦点提示输入格式，失去焦点取消提示
								

							// 		//input得到焦点，对应的儿子span标签，提示字改为灰色
							// 		$(this).focus(function() {

							// 		$(this).parent().next().children().css('color', 'gray');
											
							// 		});

							// 		//input失去焦点，对应的儿子span标签，提示字与背景同色
							// 		$(this).blur(function () {

							// 		$(this).parent().next().children().css('color', '#F8F8F8');
							// 			});
								
							// });

							//如果input框有内容，失去焦点验证内容是否符合要求

							
                 	

                 		

                 			$('input').each(function () {

                 				$(this).blur( function () {

                 					var that = $(this);
                 					var userVal = that.val();
                 					// console.log(that.val());

                 					if (userVal.length > 0) {

                 						// console.log(userVal.length);
                 						// var lastVal = that.attr('title');

                 						
                 						// if ( userVal != lastVal ) {

                 							// console.log(that.attr('name'));
                 							// console.log(that.val());
                 							$.post(
                 								"<?php echo U('Register/doregPre');?>",

                 								{name: that.attr('name'),val: that.val()},

                 								function (data) {
                 									
                 									switch (data) {

                 										case 1:
                 											that.parent().next().children().text('√ 恭喜！该用户名可用').css("color","#90B71B");
                 										break;

                 										case 2:
                 											that.css('border-color','red').parent().next().children().text('该账号已被注册  /  格式不符！').css("color","#EE2222");
                 										break;

                 										case 3:
                 											that.parent().next().children().text('√ 该密码可用').css("color","#90B71B");
                 										break;

                 										case 4:
                 											that.css('border-color','red').parent().next().children().text('密码应为4-6位数字！').css("color","#EE2222");
                 										break;

                 										case 5:
                 											that.parent().next().children().text('√ 密码通过').css("color","#90B71B");
                 										break;

                 										case 6:
                 											that.css('border-color','red').parent().next().children().text('重复密码不一致！').css("color","#EE2222");
                 										break;

                 										case 7:
                 											that.parent().next().children().text('√ 可用邮箱').css("color","#90B71B");
                 										break;

                 										case 8:
                 											that.css('border-color','red').parent().next().children().text('该邮箱已被注册  /  格式不符！').css("color","#EE2222");
                 										break;
                 											
                 									}
                 								},
                 								'json'
                 							);
                 						// }
                 					}
                 				}
                 			);
                 		});
                 			
                 	</script>


						
                 
								 
									<form method="post">
                 <div class="user-phone">
								    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								    <input type="tel" name="" id="phone" placeholder="请输入手机号">
                 </div>																			
										<div class="verification">
											<label for="code"><i class="am-icon-code-fork"></i></label>
											<input type="tel" name="" id="code" placeholder="请输入验证码">
											<a class="btn" href="javascript:void(0);" onclick="sendMobileCode();" id="sendMobileCode">
												<span id="dyMobileButton">获取</span></a>
										</div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="" id="password" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="" id="passwordRepeat" placeholder="确认密码">
                 </div>	
									</form>
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
										</label>
							  	</div>
										<div class="am-cf">
											<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
								
									<hr>
								</div>

								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>

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