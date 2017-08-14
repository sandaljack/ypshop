<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>找回密码</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="/thinkphp_3.2.3_full/Public/css/dlstyle.css" rel="stylesheet" type="text/css">

		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/thinkphp_3.2.3_full/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/css/stepstyle.css" rel="stylesheet" type="text/css">
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>

		<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/js/jquery-1.7.2.min.js"></script>
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
	</head>

	<body>
		<br><br>
		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="/thinkphp_3.2.3_full/Public/images/logobig.png" /></a>
		</div>
		<br><br><br><br><br><br>

		<div style="margin-left:40%;"><strong style="font-size:16px;">输入您注册的电子邮箱，设置新密码：</strong></div> 
		<br>

		<div style="margin-left:40%;"><input type="text" class="input" name="email" id="email" style="width:230px;height:35px;"><span id="chkmsg"></span></div> 
		<br>
		<div style="margin-left:40%;"><input type="button" class="btn" id="sub_btn" value="提 交" style="width:100px;height:25px;"></div>






	<script type="text/javascript">

		$('#sub_btn').click(function () {

			var email = $('#email').val();
			var preg =  /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

			if ( email == '' || !preg.test(email) ) {

				$('#chkmsg').html('请填写正确邮箱！');
			}

				// $('#sub_btn').attr('disabled','disabled').val('提交中...').css('cursor','default');

				$.post(

						"<?php echo U('Login/doForget');?>",

						{email: email},

						function(data) {
								
								console.log(data);
								if (data == 1) {

									alert('该邮箱未注册！');
								} else {

									alert('系统已向您的邮箱发送了一封邮件，请登录到您的邮箱及时重置您的密码！');
								}
								
						},
					'json'
				);
		});

	</script>













				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>
	</body>

</html>