<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>发表评论</title>
		<!-- link模块 -->
		
	<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
	<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
	<link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
	
	<link href="/thinkphp_3.2.3_full/Public/css/personal.css" rel="stylesheet" type="text/css">
	<link href="/thinkphp_3.2.3_full/Public/css/appstyle.css" rel="stylesheet" type="text/css">

        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/images/youpinsize.png">
		<!-- script模块 -->
		
		
		<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/js/jquery-1.7.2.min.js"></script>

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

					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
						</div>
						<hr/>

						<div class="comment-main" oid="<?php echo ($oid); ?>" uid="<?php echo ($session["id"]); ?>">
							<?php if(is_array($goods)): foreach($goods as $key=>$v): ?><div class="comment-list allpoint" gid="<?php echo ($v["goods_id"]); ?>" point="1" size="<?php echo ($v["size"]); ?>" color="<?php echo ($v["color"]); ?>">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="/thinkphp_3.2.3_full/Public/<?php echo ($v["pic_path"]); ?>" class="itempic">
									</a>
								</div>

								<div class="item-title">
									<div class="item-name">
										<a href="#">
											<p class="item-basic-info"><?php echo ($v["goods_name"]); ?></p>
										</a>
									</div>
									<div class="item-info" >
										<div class="info-little">
											<span>颜色：<?php echo ($v["color"]); ?></span>
											<span>尺寸：<?php echo ($v["size"]); ?></span>
										</div>									
									</div>
								</div>
								<div class="clear"></div>
								<div class="item-comment">
									<textarea class="text" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！"></textarea>
								</div>
								<div class="item-opinion point" >
									<li class="good"><i class="op1"></i>好评</li>
									<li class="middle"><i class="op2"></i>中评</li>
									<li class="bad"><i class="op3"></i>差评</li>
								</div>
							</div><?php endforeach; endif; ?>					
								<div class="info-btn">
									<div class="am-btn am-btn-danger sendcom">发表评论</div>
								</div>							
									
					
												
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
							<li> <a href="<?php echo U('Home/Person/infor');?>">个人信息</a></li>
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
							<li class="active"> <a href="<?php echo U('Comment/commentShow');?>">评价</a></li>
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
	
	<script>

		$(document).ready(function() {
			$(".comment-list .item-opinion li").click(function() {	
				$(this).prevAll().children('i').removeClass("active");
				$(this).nextAll().children('i').removeClass("active");
				$(this).children('i').addClass("active");
			});
	     })


		//点击评价
		$('.good').each(function() {
			$(this).click(function() {
				$(this).parent().parent().attr('point', 1);
			});
		});

		$('.middle').each(function() {
			$(this).click(function() {
				$(this).parent().parent().attr('point', 2);
			});
		});

		$('.bad').each(function() {
			$(this).click(function() {
				$(this).parent().parent().attr('point', 3);
			});
		});


		//发表评论
		var gid = '';
		var color = '';
		var size = '';
		var point = '';
		var com = '';
		var text = '';
		$('.sendcom').click(function() {
			var uid = $('.comment-main').attr('uid');
			var oid = $('.comment-main').attr('oid');
			$('.comment-list').each(function() {
				gid = $(this).attr('gid')+','+gid;
				color = $(this).attr('color')+','+color;
				size = $(this).attr('size')+','+size;
				point = $(this).attr('point')+','+point;
				text = $(this).find('.text').val()+','+text;

			});

			$.post(
				'<?php echo U("Comment/commentGoods");?>',
				{gid:gid, color:color, size:size, point:point, text:text, oid:oid, uid:uid},
				function (data) {
					if (data == 1) {
						location.href = "/thinkphp_3.2.3_full/index.php/Home/Comment/successCom/oid/"+oid;
					}
				},
				'json'
			);
			
		});
	</script>

	</body>
</html>