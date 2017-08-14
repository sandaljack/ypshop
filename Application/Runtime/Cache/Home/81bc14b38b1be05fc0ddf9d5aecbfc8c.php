<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>付款成功页面</title>
		<!-- link模块 -->
		
    <link rel="stylesheet"  type="text/css" href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css"/>
    <link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />

    <link href="/thinkphp_3.2.3_full/Public/css/sustyle.css" rel="stylesheet" type="text/css" />

        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/images/youpinsize.png">
		<!-- script模块 -->
		

  <script type="text/javascript" src="/thinkphp_3.2.3_full/Public/basic/js/jquery-1.7.min.js"></script>

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
	
<div class="clear"></div>

 <div class="am-g">
          <div class="am-u-sm-12">

<div class="take-delivery">
 <div class="status">
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
       <li>付款金额<em>¥<?php echo ($info["total"]); ?></em></li>
       <div class="user-info">
         <p>收货人：<?php echo ($info["buyname"]); ?></p>
         <p>联系电话：<?php echo ($info["phone"]); ?></p>
         <p>收货地址：<?php echo ($info["province"]); ?> <?php echo ($info["city"]); ?> <?php echo ($info["area"]); ?> <?php echo ($info["town"]); ?> <?php echo ($info["detail"]); ?></p>
       </div>
             请认真核对您的收货信息，如有错误请联系客服
                               
     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="<?php echo U('Home/Order/orders');?>" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="/thinkphp_3.2.3_full/index.php/Home/Order/orderInfo/num/<?php echo ($info["orders_num"]); ?>" class="J_MakePoint">查看<span>交易详情</span></a>
     </div>
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