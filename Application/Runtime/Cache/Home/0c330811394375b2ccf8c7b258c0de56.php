<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>下单成功页面</title>
		<!-- link模块 -->
		
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		 <!-- <link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css"> -->
		<link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<!-- <link href="/thinkphp_3.2.3_full/Public/css/cartstyle.css" rel="stylesheet" type="text/css" />
		
		<link href="/thinkphp_3.2.3_full/Public/css/jsstyle.css" rel="stylesheet" type="text/css" /> -->
		<link rel="stylesheet" href="/thinkphp_3.2.3_full/Public/css/successcustomer.css">
    	<link rel="stylesheet" href="/thinkphp_3.2.3_full/Public/css/successordermain.css">

        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/images/youpinsize.png">
		<!-- script模块 -->
		

	<script src="/thinkphp_3.2.3_full/Public/js/jquery-1.7.2.min.js"></script>

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
	

			<!-- <div class="clear"></div> -->
			 <!-- 内容开始 -->
			 <div class="am-g">
				  <div class="am-u-sm-12">
				  		<div id="notice_main" style="margin-left:150px">
	            <b><h1 style="margin-left:30px">您的订单提交成功，请尽快完成支付！</h1></b>
	            <div id="notice_info">
	            
	                <p >订单号：<span id="orderid" class="highlight bold success_info_pos"><?php echo ($info["orders_num"]); ?></span>需支付金额：<span class="highlight bold success_info_pos"><?php echo ($info["total"]); ?></span>支付方式：<span class="highlight bold">支付宝</span></p>
	                <div>
	                    <div id="success_line_2">还差一步，在收到全部订单金额后，我们会尽快为您安排发货！ </div>
	                    <div id="online_payment">
	                        <button id="pay" style="background:#FF3300;color:#fff;width:100px;height:35px;border-radius:10%;font-size:18px;margin-left:30px">立即支付</button>   
	                    </div>
	                    <div style="position:absolute;top:50px;left:750px;"><img src="/thinkphp_3.2.3_full/Public/images/zfb.jpg" style="width:200px;" alt=""></div>
	                </div>
	                <p class="isolate">如遇到其他问题，您可以拨打客户服务热线：400-666-8888</p>
	            </div>  
	            <div id="success_shopping_line"></div>
	            <div id="notice_desc">您还可以<a id="order_detail_link" title="查看订单详情" href="/thinkphp_3.2.3_full/index.php/Home/Order/orderinfo/num/<?php echo ($info["orders_num"]); ?>">查看订单详情</a>
	            <a id="continue_to_shopping" title="继续购物" href="<?php echo U('Home/List/list');?>">继续购物</a>
	            </div>
	        </div>
				  </div>
			</div>
	        
			
			<!-- <div class="clear"></div> -->

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
	
		<script>
			$('#pay').click(function() {
				var oid = $('#orderid').html();

				location.href="/thinkphp_3.2.3_full/index.php/Home/Pay/payOrder/oid/"+oid+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
			});
		</script>

	</body>
</html>