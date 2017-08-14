<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>收藏中心</title>
		<!-- link模块 -->
		
		<link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/css/colstyle.css" rel="stylesheet" type="text/css">

		<style>
			
		 .mystylea:hover{
		 	color:red;
		 	background:#eee;
		 }

		 .similargoto{
		 	background: #ccc; 
		 	widht:100%;
		 	text-align:center;
		 }
		  .similargoto:hover{
		 	background: #0a0; 
		 	color:#fff;
		 	width:100%;
		 	height:25px;
		 	text-align:center;
		 	line-height:25px;
		 }

		</style>

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

					<div class="user-collection">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr/>

						<div class="you-like">
							<div class="s-bar">
								我的收藏
								<a class="am-badge am-badge-danger am-round">降价</a>
								<a class="am-badge am-badge-danger am-round">下架</a>
							</div>
							<div class="s-content" id="deleteCollectID">

								<?php if(is_array($collectGood)): foreach($collectGood as $key=>$v): ?><div class="s-item-wrap">

										<div class="s-item">
											<div class="s-pic">
												<a href="#" class="s-pic-link">
													<img width="186px" height="186px" src="/thinkphp_3.2.3_full/Public/<?php echo ($v["pic_path"]); ?>" alt="<?php echo ($v["goods_name"]); ?>" title="<?php echo ($v["goods_name"]); ?>" class="s-pic-img s-guess-item-img">
												</a>
											</div>

											<div class="s-info">
												<div class="s-title"><a  href="/thinkphp_3.2.3_full/index.php/" title=""><?php echo ($v["goods_name"]); ?></a></div>
												<div class="s-price-box">
													<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value"><?php echo ($v["price"]); ?></em></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value"><?php echo ($v['price'] * $number); ?></em></span>
												</div>

												<div class="s-extra-box">
													<span class="s-sales">销量：<?php echo ($v["buynum"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<a href="javascript:;" name="<?php echo ($v["good_id"]); ?>" class="deleteColect"><span class="s-sales mystylea">取消收藏</span></a>
												</div>
											</div>

											<div class="s-tp">
												<a href="/thinkphp_3.2.3_full/index.php/Home/List/list/sid/<?php echo ($v["second_sort_id"]); ?>">
												<dd class="similargoto">找相似</dd></a>
												<i class="am-icon-shopping-cart"></i>
											</div>


										</div>
									</div><?php endforeach; endif; ?>

							</div>

							<div class="am-sm-9">
								<?php echo ($show); ?>
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
						<a href="#">我的小窝</a>
						<ul>
							<li class="active"> <a href="<?php echo U('Person/collection');?>">收藏</a></li>
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
	
	 <script type="text/javascript" src="/thinkphp_3.2.3_full/Public/basic/js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/js/script.js"></script>
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/basic/js/quick_links.js"></script>
	<script type="text/javascript">

		$('#deleteCollectID').on('click','.deleteColect',function (){

			var goodid = $(this).attr('name');

			var deteleid = 1;

			$.post(

				'<?php echo U("collection");?>',

				{delete:deteleid,goodid:goodid},

				function (data){

					if (data == 0){

						alert('取消收藏失败');

					} else {

						var str = ' ';

						for (var i=0;i<data[1].length;i++){

							str += '<div class="s-item-wrap"><div class="s-item"><div class="s-pic"><a href="#" class="s-pic-link"><img width="186px" height="186px"  src="/thinkphp_3.2.3_full/Public/'+data[1][i].pic_path+'" alt="'+data[1][i].goods_name+'" title="'+data[1][i].goods_name+'" class="s-pic-img s-guess-item-img"></a></div><div class="s-info"><div class="s-title"><a  href="" title="'+data[1][i].goods_name+'">'+data[1][i].goods_name+'</a></div><div class="s-price-box"><span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">'+data[1][i].price+'</em></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">'+data[1][i].price+'</em></span></div><div class="s-extra-box"><span class="s-sales">销量：'+data[1][i].buynum+'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" name="'+data[1][i].good_id+'" class="deleteColect"><span class="s-sales mystylea">取消收藏</span></a></div></div><div class="s-tp"><a href="/thinkphp_3.2.3_full/index.php/Home/List/list/sid/'+data[1][i].second_sort_id+'"><dd class="similargoto">找相似</dd></a><i class="am-icon-shopping-cart"></i></div></div></div>';

						}


						$('#deleteCollectID').html(str);
						
					}

				},

				'json'

				);

		})

	$('#')





		$('.current').wrap('<li></li>').parent().siblings().wrap('<li></li>').parent().parent().wrapInner('<ul class="am-pagination tpl-pagination"></ul>').wrapInner('<div class="am-fr"></div>').wrapInner('<div class="am-cf"></div>');

	</script>

	</body>
</html>