<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>结算页面</title>
		<!-- link模块 -->
		
	<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
	<link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
	<link href="/thinkphp_3.2.3_full/Public/css/cartstyle.css" rel="stylesheet" type="text/css" />
	<link href="/thinkphp_3.2.3_full/Public/css/jsstyle.css" rel="stylesheet" type="text/css" />

        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/images/youpinsize.png">
		<!-- script模块 -->
		
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/js/address.js"></script>
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
	
			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<?php if($addcount < 5 ): ?><div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
						</div>
						<?php else: ?>
							<a href="<?php echo U('Address/showAddress');?>" target="_blank" class="am-btn am-btn-warning" style="margin-top:15px;margin-left:10px">管理收货地址</a>
							<span style="position:relative;top:10px">每个用户收货地址最多为5个，点击管理收货地址进行管理</span><?php endif; ?>
						
						<div class="clear"></div>
						<ul id="uladdress">
							<?php if(is_array($addinfo)): foreach($addinfo as $key=>$v): ?><div class="per-border"></div><?php if($v["add_default"] == 1 ): ?><li class="user-addresslist defaultAddr"><?php else: ?><li class="user-addresslist"><?php endif; ?>
						
								<div class="address-left" >
									<div class="user DefaultAddr">
										<span class="buy-address-detail">   
                   						<span class="buy-user"><?php echo ($v["add_name"]); ?> </span>
										<span class="buy-phone"><?php echo ($v["add_phone"]); ?></span>
										</span>
									</div>
									 <div class="default-address DefaultAddr">   
									
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								   		<span class="province"><?php echo ($v["add_province"]); ?></span>
										<span class="city"><?php echo ($v["add_city"]); ?></span>
										<span class="dist"><?php echo ($v["add_area"]); ?></span>
										<span class="town"><?php echo ($v["add_town"]); ?></span>
										<span class="street"><?php echo ($v["add_detail"]); ?></span>
										</span>

										</span>
									</div>
									
								</div>
								<!-- <div class="address-right">
									<a href="/thinkphp_3.2.3_full/Public/person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>

								</div>
								<div class="clear"></div> -->

								<div class="new-addr-btn" >
									<?php if($v["add_default"] == 1 ): ?><ins class="deftip" style="position:relative">默认地址</ins>
									<?php else: ?>
									<ins class="deftip hidden" style="position:relative">默认地址</ins><?php endif; ?>
									<?php if($v["add_default"] != 1 ): ?><a class="updefault" aid="<?php echo ($v["id"]); ?>" href="javascript:;">设为默认</a>
									<span class="new-addr-bar">|</span>
									<?php else: ?>
									<a href="javascript:;" aid="<?php echo ($v["id"]); ?>" class="hidden updefault">设为默认</a>
									<span class="new-addr-bar hidden">|</span><?php endif; ?>
									<a class="" target="_blank" href="/thinkphp_3.2.3_full/index.php/Home/Address/editAddress/id/<?php echo ($v["id"]); ?>">修改</a>
									<!-- <span class="new-addr-bar">|</span>
									<a class="deladd" aid="<?php echo ($v["id"]); ?>" def="<?php echo ($v["add_default"]); ?>" href="javascript:void(0);" >删除</a> -->
								</div>
								
							</li><?php endforeach; endif; ?>
							
						</ul>

						<div class="clear"></div>
					</div>
					<!--物流 -->
					<div class="logistics">
						<h3>选择物流方式</h3>
						<ul class="op_express_delivery_hot">
							<li data-value="yuantong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li>
							<li data-value="shentong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li>
							<li data-value="yunda" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li>
							<li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li>
							<li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<li class="pay card"><img src="/thinkphp_3.2.3_full/Public/images/wangyin.jpg" />银联<span></span></li>
							<li class="pay qq"><img src="/thinkphp_3.2.3_full/Public/images/weizhifu.jpg" />微信<span></span></li>
							<li class="pay taobao"><img src="/thinkphp_3.2.3_full/Public/images/zhifubao.jpg" />支付宝<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner" style="margin-left:-380px">商品信息</div>
									</div>
									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
									<div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div>

								</div>
							</div>
							<div class="clear"></div>
							
							<div  id="gid" gid="<?php echo ($gid); ?>" color="<?php echo ($color); ?>" size="<?php echo ($size); ?>" nums="<?php echo ($nums); ?>" style="display:none"></div>
							<?php if(!empty($listinfo)): ?><tr class="item-list">
								<div class="bundle  bundle-last">
									<div class="bundle-main">
										<ul class="item-content clearfix" gid="<?php echo ($listinfo["goods_id"]); ?>" color="<?php echo ($listinfo["color"]); ?>" size="<?php echo ($listinfo["size"]); ?>" nums="<?php echo ($listinfo["nums"]); ?>" total="<?php echo ($listinfo[nums] * $listinfo[price]); ?>.00" name="info">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="/thinkphp_3.2.3_full/Public/<?php echo ($listinfo["pic_path"]); ?>" class="" style="width:80px;height=100px"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo ($listinfo["goods_name"]); ?></a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line">颜色：<?php echo ($listinfo["color"]); ?></span>
														<span class="sku-line">尺码：<?php echo ($listinfo["size"]); ?></span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now"><?php echo ($listinfo["price"]); ?></em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<span class="text_box" name="" type="text" value="<?php echo ($v["nums"]); ?>" style="width:30px;"><?php echo ($listinfo["nums"]); ?></span>
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="countprice" class="J_ItemSum number"><?php echo ($listinfo['price'] * $listinfo['nums']); ?>.00</em>
												</div>
											</li>
												<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														<!-- 快递<b class="sys_item_freprice">0</b>元 -->
														包邮
													</div>
												</div>
											</li>

										</ul>
										<div class="clear"></div>

									</div>
							</tr>
							<?php else: ?> 
							<?php if(is_array($carinfo)): foreach($carinfo as $k=>$v): if(is_array($v)): foreach($v as $key=>$val): ?><tr class="item-list">
								<div class="bundle  bundle-last">
									<div class="bundle-main">
										<ul class="item-content clearfix" gid="<?php echo ($val["goods_id"]); ?>" color="<?php echo ($val["color"]); ?>" size="<?php echo ($val["size"]); ?>" nums="<?php echo ($val["nums"]); ?>" total="<?php echo ($val[nums] * $val[price]); ?>.00" name="info">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="/thinkphp_3.2.3_full/Public/<?php echo ($val["pic_path"]); ?>" class="" style="width:80px;height=100px"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo ($val["goods_name"]); ?></a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line">颜色：<?php echo ($val["color"]); ?></span>
														<span class="sku-line">尺码：<?php echo ($val["size"]); ?></span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now"><?php echo ($val["price"]); ?></em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<span class="text_box" name="" type="text" value="<?php echo ($v["nums"]); ?>" style="width:30px;"><?php echo ($val["nums"]); ?></span>
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="countprice" class="J_ItemSum number"><?php echo ($val['price'] * $val['nums']); ?>.00</em>
												</div>
											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														<!-- 快递<b class="sys_item_freprice">0</b>元 -->
														包邮
													</div>
												</div>
											</li>

										</ul>
										<div class="clear"></div>

									</div>
							</tr><?php endforeach; endif; endforeach; endif; endif; ?> 
							
							<div class="clear"></div>
							</div>

							
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input id="buymsg" type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" value="" placeholder="选填, 建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>
							<!--优惠券 -->
							<div class="buy-agio">
								<li class="td td-coupon">

									<span class="coupon-title">优惠券</span>
									<select data-am-selected>
										<option value="a">
											<div class="c-price">
												<strong>￥8</strong>
											</div>
											<div class="c-limit">
												【消费满95元可用】
											</div>
										</option>
										<option value="b" selected>
											<div class="c-price">
												<strong>￥3</strong>
											</div>
											<div class="c-limit">
												【无使用门槛】
											</div>
										</option>
									</select>
								</li>

								<li class="td td-bonus">

									<span class="bonus-title">红包</span>
									<select data-am-selected>
										<option value="a">
											<div class="item-info">
												¥50.00<span>元</span>
											</div>
											<div class="item-remainderprice">
												<span>还剩</span>10.40<span>元</span>
											</div>
										</option>
										<option value="b" selected>
											<div class="item-info">
												¥50.00<span>元</span>
											</div>
											<div class="item-remainderprice">
												<span>还剩</span>50.00<span>元</span>
											</div>
										</option>
									</select>

								</li>

							</div>
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em id="ordertotal" class="pay-sum alltotal">244.00</em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="alltotal" class="style-large-bold-red " id="J_ActualFee">244.00</em>
											</span>
										</div>
										<?php if(is_array($addinfo)): foreach($addinfo as $key=>$v): if($v["add_default"] == 1): ?><div id="holyshit268" class="pay-address">
											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
								   				<span id="_province" class="province"><?php echo ($v["add_province"]); ?></span>
												<span id="_city" class="city"><?php echo ($v["add_city"]); ?></span>
												<?php if($v.['add_area'] != null): ?><span id="_dist" class="dist"><?php echo ($v["add_area"]); ?></span><?php endif; ?>
												<?php if($v.['add_town'] != null): ?><span id="_town" class="town"><?php echo ($v["add_town"]); ?></span><?php endif; ?>
												<span id="_street" class="street"><?php echo ($v["add_detail"]); ?></span>

												</span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                         		<span id="_buy-user" class="buy-user"><?php echo ($v["add_name"]); ?></span>
												<span id="_buy-phone" class="buy-phone"><?php echo ($v["add_phone"]); ?></span>
												</span>
											</p>
										</div><?php endif; endforeach; endif; ?>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<?php if($addcount != 0): ?><a id="submitOrders" href="javascript:;" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
											<?php else: ?>
											<a id="noaddress" href="javascript:;" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a><?php endif; ?>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>

			<!-- 地址点击 -->
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form class="am-form am-form-horizontal">

						<div class="am-form-group">
							<label for="buyname" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="buyname" name="buyname"  placeholder="收货人">
							</div>
						</div>

						<div class="am-form-group">
							<label for="buyphone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="buyphone" name="phone" placeholder="手机号必填" type="email" >
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">所在地</label>
							<div class="am-form-content address">
								<div id="area">
									<select name="province" id="province" data-am-selected>
										<option value="-1">--请选择--</option>
									</select>
								</div>
							</div>
						</div>

						<div class="am-form-group">
							<label for="addDetail" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3" id="addDetail" placeholder="输入详细地址"></textarea>
								<small>100字以内写出你的详细地址</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<div class="am-btn am-btn-danger" id="saveAdd">保存</div>
								<div class="am-btn am-btn-danger close" id="close">返回</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="clear"></div>

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

				//计算总价
				var alltotal = 0;
				$('.countprice').each(function() {
					alltotal += parseInt($(this).html());
				});
				$('.alltotal').each(function() {
					$(this).html(alltotal+'.00');
				});
				
				//点击提交菜单
				$('#submitOrders').click(function() {
					//获取提交数据
					var gid = '';
					var nums = '';
					var color = '';
					var size = '';
					$('ul[name="info"]').each(function () {
						gid = $(this).attr('gid')+','+gid;
						nums = $(this).attr('nums')+','+nums;
						color = $(this).attr('color')+','+color;
						size = $(this).attr('size')+','+size; 
						
					});
					
					//订单总价
					var total = $('#ordertotal').html();
					//收货人
					var buyuser = $('#_buy-user').html();
					//收货人手机
					var buyphone = $('#_buy-phone').html();
					//省份
					var province = $('#_province').html();
					//城市
					var city = $('#_city').html();
					//区
					var area = $('#_dist').html();
					//城镇
					var town = $('#_town').html();
					//详情地址
					var street = $('#_street').html();
					//买家留言
					var message = $('#buymsg').val();
					location.href="/thinkphp_3.2.3_full/index.php/Home/Pay/submitOrders/gid/"+gid+"/nums/"+nums+"/color/"+color+"/size/"+size+"/total/"+total+"/buyuser/"+buyuser+"/buyphone/"+buyphone+"/province/"+province+"/city/"+city+"/area/"+area+"/town/"+town+"/street/"+street+"/message/"+message+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
				});

				//地址三级联动
				$.post(
					'<?php echo U("Pay/addressInfo");?>',

					{upid: 0},

					function (data) {
						var str = '';
						for (var i = 0; i < data.length; i++) {
							str += '<option value="'+ data[i].id +'">'+ data[i].name +'</option>';
						}
						$('#province').append(str);
					},
					'json'
					);
				//获取地址数据
				$('#area').on('change', 'select', function () {
					if ($('#province').val() != '-1' ) {
						var province = $('#province').children(':selected').html();
					} else {
							$('#city').val('-1');
							$('#county').val('-1');
					}
					if ($('#city').val() != '-1' && $('#city').val() != undefined ) {
						var city = $('#city').children(':selected').html();
					} else {
							$('#county').val('-1');
					}
					if ($('#county').val() != '-1' && $('#county').val() != undefined) {
						var county = $('#county').children(':selected').html();
					} else {
							$('#town').val('-1');
					}
					if ($('#town').val() != '-1' && $('#county').val() != undefined) {
						var town = $('#town').children(':selected').html();
					}
					//拿到当前省份的id
					var id = $(this).val();
					var that = $(this);
					var nameVal = '';
					switch ($(this).index()) {
						case 0:
							nameVal = 'city';
							break;
						case 1:
							nameVal = 'county';
							break;
						case 2:
							nameVal = 'town';
							break;
						case 3:
							nameVal = 'road';
							break;
						default:
							nameVal = 'other';
							break;
					}

					$.post(
						'<?php echo U("Pay/addressInfo");?>',

						{upid: id},

						function (data) {
							if (data.length > 0) {
								var str = '<select name="'+ nameVal +'" id="'+ nameVal +'">';
								str += '<option value="-1">--请选择--</option>';
								for (var i = 0; i < data.length; i++) {

									str += '<option value="'+ data[i].id +'">'+data[i].name+'</option>';
								}
								str += '</select>';

								//先删除#pro后面的所有select
								that.nextAll('select').remove();
								$('#area').append(str);
								if ($('#province').val() == '') {
									$('#province').next().remove();
								}
							}
						},
						'json'
						);
				});

			//点击保存新加地址
			$('#saveAdd').click(function() {
				var province = $('#province').children(':selected').html();
				var city = $('#city').children(':selected').html();
				var county = $('#county').children(':selected').html();
				var town = $('#town').children(':selected').html();
				var buyname = $('#buyname').attr('value');
				var buyphone = $('#buyphone').attr('value');
				var detail = $('#addDetail').attr('value');

					if (province == '--请选择--') {
						alert('请选择省份');
					} else if (city == '--请选择--') {
						alert('请选择城市');
					} else if (county == '--请选择--') {
						alert('请选择地区');
					} else if (town == '--请选择--') {
						alert('请选择城镇');
					} else if (!detail) {
						alert('请填写详情地址');
					} else if (!buyname) {
						alert('请填写收货人');
					} else if (!buyphone) {
						alert('请填写收货人手机号码');
					} else {
						if (county == null) {
							county = ' ';
						}
						if (town == null) {
							town = ' ';
						}
						$.post(
							'<?php echo U("Pay/addAddress");?>',
							{buyname:buyname, buyphone:buyphone, province:province, city:city, county:county, town:town, detail:detail },
							function (data) {
								if (data == 1) {
									// alert('添加地址成功');
									var gid = $('#gid').attr('gid');
									var color = $('#gid').attr('color');
									var size = $('#gid').attr('size');
									var nums = $('#gid').attr('nums');
									if (nums == 'car') {
										
										location.href = "/thinkphp_3.2.3_full/index.php/Home/Pay/payCarInfo/gid/"+gid+"/color/"+color+"/size/"+size+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
									} else {
										
										location.href = "/thinkphp_3.2.3_full/index.php/Home/Pay/payCarInfo/lgid/"+gid+"/lnums/"+nums+"/lcolor/"+color+"/lsize/"+size+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
									} 
										
								} else {
									alert('添加地址失败');
								}
							},
							'json'

						);

					}
			});

			//设置默认地址
			$('.updefault').each(function() {
				var aid = $(this).attr('aid');
				$(this).click(function() {
					var that = $(this);
					$.post(
					'<?php echo U("Pay/upDefaultAdd");?>',
					{id:aid},
					function (data) {
						if (data == 1) {
							//将所有的改变
							$('#uladdress').find('.updefault').removeClass('hidden').next().removeClass('hidden').parent().parent().find('.deftip').addClass('hidden');
							//然后单独改变
							that.addClass('hidden').next().addClass('hidden').parent().parent().find('.deftip').removeClass('hidden');
						}
					},
					'json'
					);
				});
			});

			//点击选择收货地址
			$('.user-addresslist').each(function() {
				$(this).click(function() {
					$('#_province').html($(this).find('.province').html());
					$('#_city').html($(this).find('.city').html());
					$('#_dist').html($(this).find('.dist').html());
					$('#_town').html($(this).find('.town').html());
					$('#_street').html($(this).find('.street').html());
					$('#_buy-user').html($(this).find('.buy-user').html());
					$('#_buy-phone').html($(this).find('.buy-phone').html());

				});
			});

			//没有地址不能提交
			$('#noaddress').click(function() {
				alert('没有地址选择，请添加新地址！');
			});
		</script>

	</body>
</html>