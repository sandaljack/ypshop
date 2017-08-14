<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>个人资料</title>
		<!-- link模块 -->
		
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/thinkphp_3.2.3_full/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/css/infstyle.css" rel="stylesheet" type="text/css">
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>

        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/images/youpinsize.png">
		<!-- script模块 -->
		
			
		
	</head>

	<body>
	<!-- 头部模块 -->
	
		<!-- <div class="hmtop"> -->
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							<?php if(empty($session)): ?><a href="<?php echo U('Home/Login/login');?>" target="_top" class="h">亲，请登录</a>
								<a href="<?php echo U('Home/Register/register');?>" target="_top">免费注册</a>
							<?php else: ?>
								欢迎你,<?php echo ($session["username"]); ?>
								<a style="margin-left:15px" href="<?php echo U('Home/Login/loginOut');?>">退出</a><?php endif; ?>
							
						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="<?php echo U('Home/Index/index');?>" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<?php if(empty($session)): ?><div class="menu-hd MyShangcheng"><a href="<?php echo U('Home/Login/login');?>" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
						<?php else: ?>
							<div class="menu-hd MyShangcheng"><a href="<?php echo U('Home/Person/person');?>" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div><?php endif; ?>
						
					</div>
					<div class="topMessage mini-cart">
						<?php if(empty($session)): ?><div class="menu-hd"><a id="mc-menu-hd" href="<?php echo U('Home/Shopcar/showCar');?>" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
						<?php else: ?>
							<div class="menu-hd"><a id="mc-menu-hd" href="<?php echo U('Home/Shopcar/shopCar');?>" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"></strong></a></div><?php endif; ?>
					</div>
					<div class="topMessage favorite">
					<?php if(empty($session)): ?><div class="menu-hd"><a href="<?php echo U('Home/Login/login');?>" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
					<?php else: ?>
						<div class="menu-hd"><a href="<?php echo U('Person/collection');?>" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div><?php endif; ?>
				</ul>
				</div>

				<!--悬浮搜索框-->

				<div class="nav white">
					<div class="logo"><img src="/thinkphp_3.2.3_full/Public/images/logo.png" /></div>
					<div class="logoBig">
						<li><a href="<?php echo U('Home/Index/index');?>"><img src="/thinkphp_3.2.3_full/Public/images/youpinsize.png" /></a></li>
					</div>

					<div class="search-bar pr">
						<a name="index_none_header_sysc" href="#"></a>
						<form method="post" action="/thinkphp_3.2.3_full/index.php/Home/List/list">
							<input id="searchInput" name="keyword" type="text" placeholder="搜索" autocomplete="off">
							<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
						</form>
					</div>
				</div>

				<div class="clear"></div>
		<!-- 	</div> -->
	
	<!-- 内容模块 -->
	

            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="/thinkphp_3.2.3_full/index.php/Home">首页</a></li>
                                <li class="qc"><a href="javascript:;">闪购</a></li>
                                <li class="qc"><a href="javascript:;">限时抢</a></li>
                                <li class="qc"><a href="javascript:;">团购</a></li>
                                <li class="qc last"><a href="javascript:;">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

					<!--头像 -->
					<form action="<?php echo U('Person/doUpload');?>" method="post"  enctype="multipart/form-data">
						<div class="user-infoPic">

							<div class="filePic">
								<input type="file" name="pic" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img class="am-circle am-img-thumbnail" src="/thinkphp_3.2.3_full/Public/<?php echo ($list["userpic"]); ?>" alt="" />
								<!-- <img class="am-circle am-img-thumbnail" src="/thinkphp_3.2.3_full/Public/images/getAvatar.do.jpg" alt="" /> -->
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i><?php echo ($list["username"]); ?></i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
						            </span>
								</div>
								<div class="u-safety">
									<a href="safety.html">
									 账户安全
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
									</a>
								</div>
								<button>修改头像</button>
							</div>

						</div>
						</form>
				
					<!--个人信息 -->

						<div class="info-main">
							<form class="am-form am-form-horizontal" action="<?php echo U('Person/doInfo');?>" method="post">


								<div class="am-form-group">
									
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">地址</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="addr" placeholder="地址" value="<?php echo ($list["address"]); ?>">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">

									
										<label class="am-radio-inline">

											<input type="radio" name="radio" value="1" <?php echo $list['sex']==1?'checked':'';?> data-am-ucheck>男 
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="radio" value="0" <?php echo $list['sex']==0?'checked':'';?> data-am-ucheck>女
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="radio" value="2" <?php echo $list['sex']==2?'checked':'';?> data-am-ucheck>保密
										</label>
										
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div id="box" style="width:300px;top:460px;left:185px;position:absolute">
									
								      <select name="birthyear" id="sel1" >
								        <option value="birthyear"><?php echo ($list["birthyear"]); ?></option>
								      </select>

								      <select name="birthmonth" id="sel2">
								        <option value="birthmonth"><?php echo ($list["birthmonth"]); ?></option>
								      </select>

								      <select name="birthday" id="sel3">
								        <option value="birthday"><?php echo ($list["birthday"]); ?></option>
								      </select>

								      <span id="result"></span>
								    </div>
									
								</div>

								<script src="/thinkphp_3.2.3_full/Public/js/date.js"></script>
								<br>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="phone" class="zz" name="phone" placeholder="telephonenumber" type="tel" value="<?php echo ($list["phone"]); ?>">
										<span id="ts2" style="color: white;">手机号应为11位数字</span>

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="email" class="zz" name="email" placeholder="Email" type="email" value="<?php echo ($list["email"]); ?>">
										<span id="ts3" style="color: white;">邮箱格式：XXXXX@163.com</span>
									</div>
								</div>


		<!-- AJAX验证用户输入信息 -->
		<script type="text/javascript">

			$('input.zz').each(function() {

				$(this).blur(function() {

					var that = $(this);
					var val  = that.val();

					if (val.length > 0) {

						$.post(

							"<?php echo U('Person/vfInfo');?>",

							{name: that.attr('name'), val: that.val() },

							function (data) {

								switch (data) {

									case 1:
										$('span#ts1').css('color','red');
									break;

									case 2:
										$('span#ts1').css('color','white');
									break;

									case 3:
										$('span#ts2').css('color','red');
									break;

									case 4:
										$('span#ts2').css('color','white');
									break;

									case 5:
										$('span#ts3').css('color','red');
									break;

									case 6:
										$('span#ts3').css('color','white');
									break;
								}
							},
							'json'
						);
					} 
				});
			});
		</script>
								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="address.html">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>

									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">

											<span class="am-icon-angle-right"></span>

										</a>

									</div>
								</div>
								<div class="info-btn">
									<button style="width: 80px;height: 40px;">保存修改</button>
								</div>
<!-- <div class="am-btn am-btn-danger"></div> -->
							</form>
						
						</div>

					</div>

				</div>
				
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="<?php echo U('Home/Person/person');?>">个人中心</a>
					</li>
					<li class="person">
						<a href="javascript:;">个人资料</a>
						<ul>
							<li class="active"> <a href="<?php echo U('Home/Person/infor');?>">个人信息</a></li>
							<li> <a href="<?php echo U('Home/Person/password');?>">安全设置</a></li>
							<li> <a href="<?php echo U('Home/Address/showAddress');?>">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="javascript:;">我的交易</a>
						<ul>
							<li><a href="<?php echo U('Home/Order/orders');?>">订单管理</a></li>
							<li> <a href="javascript:;">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="javascript:;">我的资产</a>
						<ul>
							<li> <a href="javascript:;">优惠券 </a></li>
							<li> <a href="javascript:;">红包</a></li>
							<li> <a href="javascript:;">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="javascript:;">我的小窝</a>
						<ul>
							<li > <a href="<?php echo U('Person/collection');?>">收藏</a></li>
							<li> <a href="javascript:;">足迹</a></li>
							<li> <a href="<?php echo U('Comment/commentShow');?>">评价</a></li>
							<li> <a href="javascript:;">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
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