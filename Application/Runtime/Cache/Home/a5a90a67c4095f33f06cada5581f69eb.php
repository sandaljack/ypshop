<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>订单管理</title>
		<!-- link模块 -->
		
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/thinkphp_3.2.3_full/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/css/orstyle.css" rel="stylesheet" type="text/css">

        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/images/youpinsize.png">
		<!-- script模块 -->
		
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

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

					<div class="user-orderInfo">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
						</div>
						<hr/>
						<!--进度条-->
						<div class="m-progress">
							<div class="m-progress-list">
								<span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                   <p class="stage-name">拍下商品</p>
                                </span>
								<span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                   <p class="stage-name">卖家发货</p>
                                </span>
								<span class="step-3 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                   <p class="stage-name">确认收货</p>
                                </span>
								<span class="step-4 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                                   <p class="stage-name">交易完成</p>
                                </span>
								<span class="u-progress-placeholder"></span>
							</div>
							<div class="u-progress-bar total-steps-2">
								<div class="u-progress-bar-inner"></div>
							</div>
						</div>
						<div class="order-infoaside">
							<div class="order-logistics">
								<a href="logistics.html">
									<div class="icon-log">
										<i><img src="/thinkphp_3.2.3_full/Public/images/receive.png"></i>
									</div>
									<div class="latest-logistics">
										<p class="text">已签收,签收人是青年城签收，感谢使用天天快递，期待再次为您服务</p>
										<div class="time-list">
											<span class="date">2015-12-19</span><span class="week">周六</span><span class="time">15:35:42</span>
										</div>
										<div class="inquire">
											<span class="package-detail">物流：天天快递</span>
											<span class="package-detail">快递单号: </span>
											<span class="package-number">373269427868</span>
											<a href="logistics.html">查看</a>
										</div>
									</div>
									<span class="am-icon-angle-right icon"></span>
								</a>
								<div class="clear"></div>
							</div>
							<div class="order-addresslist">
								<div class="order-address">
									<div class="icon-add">
									</div>
									<p class="new-tit new-p-re">
										<span class="new-txt"><?php echo ($addr["buyname"]); ?></span>
										<span class="new-txt-rd2"><?php echo ($addr["phone"]); ?></span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">收货地址：</span>
											<span class="province"><?php echo ($addr["province"]); ?></span>省
											<span class="city"><?php echo ($addr["area"]); ?></span>市
											<span class="dist"><?php echo ($addr["town"]); ?></span>区
											<span class="street"><?php echo ($addr["detail"]); ?></span></p>
									</div>
								</div>
							</div>
						</div>
						<div class="order-infomain">

							<div class="order-top">
								<div class="th th-item">
									<td class="td-inner">商品</td>
								</div>
								<div class="th th-price">
									<td class="td-inner">单价</td>
								</div>
								<div class="th th-number">
									<td class="td-inner">数量</td>
								</div>
								<div class="th th-operation">
									<td class="td-inner">商品操作</td>
								</div>
								<div class="th th-amount">
									<td class="td-inner">合计</td>
								</div>
								<div class="th th-status">
									<td class="td-inner">交易状态</td>
								</div>
								<div class="th th-change">
									<td class="td-inner">交易操作</td>
								</div>
							</div>

							<div class="order-main">

								<div class="order-status3">
									<div class="order-title">
										<div class="dd-num">订单编号：<a href="javascript:;" id="order"><?php echo ($order["orders_num"]); ?></a></div>
										<span>成交时间：<?php echo ($order["addtime"]); ?></span>
										<!--    <em>店铺：小桔灯</em>-->
									</div>
									<div class="order-content">
										<div class="order-left">
												
										<?php if(is_array($detail)): foreach($detail as $key=>$v): ?><ul class="item-list">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="/thinkphp_3.2.3_full/Public/<?php echo ($v["pic_path"]); ?>" class="itempic J_ItemImg">
														</a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#">
																<p><?php echo ($v["goods_name"]); ?></p>
																<p class="info-little">颜色分类：<?php echo ($v["color"]); ?>
																	<br/>尺码：<?php echo ($v["size"]); ?></p>
															</a>
														</div>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price">
														<?php echo ($v["price"]); ?>
													</div>
												</li>
												<li class="td td-number">
													<div class="item-number">
														<span>×</span><?php echo ($v["buynum"]); ?>
													</div>
												</li>
												<li class="td td-operation">
													<div class="item-operation">
														退款/退货
													</div>
												</li>
											</ul><?php endforeach; endif; ?>
									</div>
										<div class="order-right">
											<li id="chg" class="td td-amount">
												<div class="item-amount">
													合计：<?php echo ($order["total"]); ?>
													<p>含运费：<span>10.00</span></p>
												</div>
											</li>
											

											<?php if($order['status'] == 1): ?><div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">等待买家付款</p>
																	<p class="order-info"><a href="#">取消订单</a></p>
																	<p class="order-info"><a href="<?php echo U('Order/orderInfo', array('num'=>$val['orders_num']) );?>">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="###">
																<div id="anniu" class="am-btn am-btn-danger anniu">
																	一键支付</div></a>
															</li>
														</div>

		<script>

			$('#anniu').click(function () {

				var oid = $('#order').text();

				location.href = "/thinkphp_3.2.3_full/index.php/Home/Pay/payOrder/oid/"+oid+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";

			});

		</script><?php endif; ?>

											<?php if($order['status'] == 2): ?><div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="<?php echo U('Order/orderInfo', array('num'=>$val['orders_num']) );?>">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div id="anniu" class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
														</div>

		<script>

			$('#anniu').click(function () {

				alert('已提醒商家火速为您发货！');
			});
			
		</script><?php endif; ?>

											<?php if($order['status'] == 3): ?><div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">卖家已发货</p>
																	<p class="order-info"><a href="<?php echo U('Order/orderInfo', array('num'=>$val['orders_num']) );?>">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																	<p class="order-info"><a href="#">延长收货</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div id="anniu" class="am-btn am-btn-danger anniu">
																	确认收货</div>
															</li>
														</div>

		<script>

				$('#anniu').click(function () {

					var num = $('#order').text();

					var chg = '<div class="move-right"><li class="td td-status"><div class="item-status"><p class="Mystatus">交易成功</p><p class="order-info"><a href="<?php echo U('Order/orderInfo', array('num'=>$val['orders_num']) );?>">订单详情</a></p><p class="order-info"><a href="logistics.html">查看物流</a></p></div></li><li class="td td-change"><a href="commentlist.html"><div class="am-btn am-btn-danger anniu">评价商品</div></a></li></div>';

					$('.move-right').remove();

					$('#chg').after(chg);

					$.post(

						"<?php echo U('Order/confirm');?>",

						{num: num},

						function (data) {

							if (data == 1) {
								alert('确认收货成功！');
							} else {
								alert('服务器繁忙，请稍后再试！');
							}
						},
						'json'
					);
				});
		</script><?php endif; ?>
												<?php if($order['status'] == 4): ?><div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="<?php echo U('Order/orderInfo', array('num'=>$val['orders_num']) );?>">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="javascript:;">
																	<div oid="<?php echo ($val['orders_num']); ?>" class="am-btn am-btn-danger anniu anniu4">
																		评价商品</div>
																</a>
															</li>
														</div>

	<script>

		$('.anniu').click(function () {

				var oid = $('#order').text();

				location.href = "/thinkphp_3.2.3_full/index.php/Home/Comment/CommentGoods/oid/"+oid+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";

		});
		
	</script><?php endif; ?>


												<script>


												</script>


										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>
				<!--底部-->
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
							<li class="active"><a href="<?php echo U('Home/Order/orders');?>">订单管理</a></li>
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