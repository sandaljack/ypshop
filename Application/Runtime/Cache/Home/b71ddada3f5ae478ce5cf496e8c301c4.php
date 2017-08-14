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

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr/>

						<div class=" am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li style="background:#EEEEEE;"><a id="allorder">所有订单</a></li>
								<li style="background:lightblue;"><a id="waitpay">待付款</a></li>
								<li><a id="waitgo">待发货</a></li>
								<li><a id="waitback">待收货</a></li>
								<li><a id="waitcomm">待评价</a></li>
							</ul>


							<script>

								$('#allorder').click(function () {

									location.href = "/thinkphp_3.2.3_full/index.php/Home/Order/orders"
								});

								$('#waitpay').click(function () {

									location.href="/thinkphp_3.2.3_full/index.php/Home/Order/ordersa";
								});

								$('#waitgo').click(function () {

									location.href="/thinkphp_3.2.3_full/index.php/Home/Order/ordersb";
								});

								$('#waitback').click(function () {

									location.href="/thinkphp_3.2.3_full/index.php/Home/Order/ordersc";
								});

								$('#waitcomm').click(function () {

									location.href="/thinkphp_3.2.3_full/index.php/Home/Order/ordersd";
								});
								
							</script>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
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
										<div class="order-list">
											<!--不同状态订单-->
											<div class="order-status3">
								
								<?php if(is_array($res)): foreach($res as $key=>$val): ?><div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;" class="order"><?php echo ($val["orders_num"]); ?></a></div>
													<span>成交时间：<?php echo ($val["addtime"]); ?> </span>

													<!--    <em>店铺：小桔灯</em>-->
												</div>

								
												<div class="order-content">
													<div class="order-left">
													
													
									<?php if(is_array($rest)): foreach($rest as $k=>$val2): if($val['orders_num'] == $val2[0]['orders_num'] ): if(is_array($val2)): foreach($val2 as $key=>$val3): ?><ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/thinkphp_3.2.3_full/Public/<?php echo ($val3["pic_path"]); ?>" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($val3["goods_name"]); ?></p>
																			<p class="info-little">颜色分类：<?php echo ($val3["color"]); ?>
																				<br/>尺码：<?php echo ($val3["size"]); ?></p>
																			
																			
																			
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($val3["price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($val3["buynum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul><?php endforeach; endif; ?>
											
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($val["total"]); ?>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
											
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">等待买家付款</p>
																	<p class="order-info"><a href="#">取消订单</a></p>
																	<p class="order-info"><a href="<?php echo U('Order/orderInfo', array('num'=>$val['orders_num']) );?>">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="javascript:void:;">
																<div oid="<?php echo ($val['orders_num']); ?>" class="am-btn am-btn-danger anniu">
																	一键支付</div></a>
															</li>
														</div>
													</div><?php endif; endforeach; endif; ?>
												</div>
											<!-- 所有订单遍历结束 --><?php endforeach; endif; ?>
											</div>
											<?php echo ($btn); ?>
										</div>
									</div>
								</div>

								<script>

									$('.anniu').each(function () {

										$(this).click(function () {								
											
											var oid = $(this).attr('oid');

											location.href = "/thinkphp_3.2.3_full/index.php/Home/Pay/payOrder/oid/"+oid+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
											});

									});

								</script>



								<!-- 待付款 -->
								<div class="am-tab-panel am-fade" id="tab2">

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
										<div class="order-list">
											<div class="order-status1">
										<!-- 遍历待付款 -->
										<?php if(is_array($res1)): foreach($res1 as $key=>$v1): ?><div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($v1["orders_num"]); ?></a></div>
													<span>成交时间：<?php echo ($v1["addtime"]); ?></span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/thinkphp_3.2.3_full/Public/images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($v1["goods_name"]); ?> </p>
																			<p class="info-little">颜色分类：<?php echo ($v1["color"]); ?>
																				<br/><?php echo ($v1["size"]); ?></p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($v1["price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($v1["buynum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																<?php echo ($v1["total"]); ?>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">等待买家付款</p>
																	<p class="order-info"><a href="#">取消订单</a></p>

																</div>
															</li>
															<li class="td td-change">
																<a href="pay.html">
																<div class="am-btn am-btn-danger anniu">
																	一键支付</div></a>
															</li>
														</div>
													</div>

												</div>
												<!-- 待付款遍历结束 --><?php endforeach; endif; ?>
											</div>
										<?php echo ($btn1); ?>
										</div>

									</div>
								</div>


								<!-- 待发货 -->
								<div class="am-tab-panel am-fade" id="tab3">
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
										<div class="order-list">
											<div class="order-status3">
											
												<!-- 遍历待付款 -->
										<?php if(is_array($res2)): foreach($res2 as $key=>$v2): ?><div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($v2["orders_num"]); ?></a></div>
													<span>成交时间：<?php echo ($v2["addtime"]); ?></span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/thinkphp_3.2.3_full/Public/images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($v2["goods_name"]); ?> </p>
																			<p class="info-little">颜色分类：<?php echo ($v2["color"]); ?>
																				<br/><?php echo ($v2["size"]); ?></p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($v2["price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($v2["buynum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																<?php echo ($v2["total"]); ?>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
														</div>
														</div>
													</div>

												</div>
												<!-- 待付款遍历结束 --><?php endforeach; endif; ?>
											</div>
										</div>

									</div>
								</div>
									


								<div class="am-tab-panel am-fade" id="tab4">
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
										<div class="order-list">
											<div class="order-status3">
											
												<!-- 遍历待付款 -->
										<?php if(is_array($res3)): foreach($res3 as $key=>$v3): ?><div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($v3["orders_num"]); ?></a></div>
													<span>成交时间：<?php echo ($v3["addtime"]); ?></span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/thinkphp_3.2.3_full/Public/images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($v3["goods_name"]); ?> </p>
																			<p class="info-little">颜色分类：<?php echo ($v3["color"]); ?>
																				<br/><?php echo ($v3["size"]); ?></p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($v3["price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($v3["buynum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																<?php echo ($v3["total"]); ?>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">卖家已发货</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																	<p class="order-info"><a href="#">延长收货</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	确认收货</div>
															</li>
														</div>
														
													</div>

												</div>
												<!-- 待付款遍历结束 --><?php endforeach; endif; ?>
											</div>
										</div>

									</div>
								</div>

								<div class="am-tab-panel am-fade" id="tab5">
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
										<div class="order-list">
											<div class="order-status3">
											
												<!-- 遍历待付款 -->
										<?php if(is_array($res4)): foreach($res4 as $key=>$v4): ?><div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($v4["orders_num"]); ?></a></div>
													<span>成交时间：<?php echo ($v4["addtime"]); ?></span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/thinkphp_3.2.3_full/Public/images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($v4["goods_name"]); ?> </p>
																			<p class="info-little">颜色分类：<?php echo ($v4["color"]); ?>
																				<br/><?php echo ($v4["size"]); ?></p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($v4["price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($v4["buynum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																<?php echo ($v4["total"]); ?>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
														
													</div>

												</div>
												<!-- 待付款遍历结束 --><?php endforeach; endif; ?>
											</div>
										</div>

									</div>
								</div>
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
							<li> <a href="<?php echo U('Person/collection');?>">收藏</a></li>
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
	
	<script>
		//显示分页
        $('.current').wrap('<li></li>').parent().siblings().wrap('<li></li>').parent().parent().wrapInner('<ul class="am-pagination tpl-pagination"></ul>').wrapInner('<div class="am-fr"></div>').wrapInner('<div class="am-cf"></div>');
	</script>


	</body>
</html>