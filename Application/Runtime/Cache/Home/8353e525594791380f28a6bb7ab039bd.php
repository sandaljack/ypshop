<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>商品详情</title>
		<!-- link模块 -->
		
	
	<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
	<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
	<link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
	<link type="text/css" href="/thinkphp_3.2.3_full/Public/css/optstyle.css" rel="stylesheet" />
	<link type="text/css" href="/thinkphp_3.2.3_full/Public/css/style.css" rel="stylesheet" />
	<link type="text/css" href="/thinkphp_3.2.3_full/Public/css/detail.css" rel="stylesheet" />





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
	



			<div class="clear"></div>
            <b class="line"></b>
			<div class="listMain">

				<!--分类-->
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
				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a href="#">首页</a></li>
					<li><a href="#">分类</a></li>
					<li class="am-active">内容</li>
				</ol>


				

				<!--放大镜-->
			
				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">

						<div class="box">
							

							<div class="tb-booth tb-pic tb-s310">
								<a href="/thinkphp_3.2.3_full/Public/<?php echo ($pictures["pic_path1"]); ?>">
								<img src="/thinkphp_3.2.3_full/Public/<?php echo ($pictures["pic_path1"]); ?>" alt="细节展示放大镜特效" rel="/thinkphp_3.2.3_full/Public/<?php echo ($pictures["pic_path1"]); ?>" class="jqzoom" />
								</a>
							</div>


							<ul class="tb-thumb" id="thumblist">

								
								<?php if(is_array($pictures)): foreach($pictures as $key=>$vo): ?><li class="tb-selected">
										<div class="tb-pic tb-s40">
											<a href="#"> <img src="/thinkphp_3.2.3_full/Public/<?php echo ($vo); ?>" mid="/thinkphp_3.2.3_full/Public/<?php echo ($vo); ?>" big="/thinkphp_3.2.3_full/Public/<?php echo ($vo); ?>"></a>


										</div>
									</li><?php endforeach; endif; ?>

								
							</ul>
						</div>

						<div class="clear"></div>
					</div>



					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd">
							<h1>	
									<?php echo ($good["goods_name"]); ?>
	          </h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								<li class="price iteminfo_price">
									<dt>价格</dt>
									<dd><em>¥  </em><b id="goods_price" class="sys_item_price"><?php echo ($prices[0]["price"]); ?></b></dd>                                 
								</li>
								
								<div class="clear"></div>
							</div>

							<!--地址-->
							


							<div class="clear"></div>

							<!--销量-->
							<ul class="tm-ind-panel">
								
								<li class="tm-ind-item tm-ind-sumCount canClick">
									<div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">
									<?php echo ($good["buynum"]); ?></span></div>
								</li>
								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon">
										<span class="tm-label">累计评价</span>
										<span class="tm-count"><?php echo ($count); ?></span>
									</div>
								</li>

								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon">
											<a id="collectionShop" class="am-btn am-btn-warning am-round" href="javascript:;"><span class="tm-label">加入收藏</span></a>
										<span id="collectionShopend" class="tm-count"></span>
									</div>
								</li>
							</ul>
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>

									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod dform">
										<div class="" id="hiddenDiv">


											<form class="theme-signin" name="loginform" action="" method="post">

												<div class="theme-signin-left">

													<div class="theme-options">
														<div class="cart-title">尺码</div>

														<ul id="defaultsize">

															<?php if(is_array($size)): foreach($size as $k=>$v): ?><li class="sizestyle sku-line" name="<?php echo ($v["goods_id"]); ?>" value="<?php echo ($v["size"]); ?>"><?php echo ($v["size"]); ?><i></i></li><?php endforeach; endif; ?>

														</ul>
													</div>
													<div class="theme-options">
														<div class="cart-title">颜色</div>
														<ul id="defaultcolor">
															<?php if(is_array($color)): foreach($color as $k=>$vy): ?><li class="color sku-line"  name="<?php echo ($size[0]['goods_id']); ?>" value="<?php echo ($vy["color"]); ?>"><?php echo ($vy["color"]); ?><i></i></li><?php endforeach; endif; ?>
														</ul>
													</div>
													<div class="theme-options">
														<div class="cart-title number">数量</div>
														<dd>
															<input id="delnum" class="am-btn am-btn-default"  type="button" value="-" />
															<input id="text_box" type="text" value="1" style="width:30px" />
															<input id="addnum" class="am-btn am-btn-default" type="button" value="+" />

															<span id="Stock" class="tb-hidden">库存
																<span id="newStock"><?php echo ($size[0]["store"]); ?></span>
															件</span>
														</dd>

													</div>
													<div class="clear"></div>

													<div class="btn-op">
														<div class="btn am-btn am-btn-warning">确认</div>
														<div class="btn close am-btn am-btn-warning">取消</div>
													</div>
												</div>
												<div class="theme-signin-right">
													<div class="img-info">
														<img src="/thinkphp_3.2.3_full/Public/images/songzi.jpg" />
													</div>
													<div class="text-info">
														<span class="J_Price price-now">¥39.00</span>
														<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
													</div>
												</div>

											</form>
										</div>
										</div>
									</div>

								</dd>
							</dl>
							<div class="clear"></div>
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<dt class="tb-metatit">店铺优惠</dt>
									<div class="gold-list">
										<p>购物满2件打8折，满3件7折<span>点击领券<i class="am-icon-sort-down"></i></span></p>
									</div>
								</div>
								<div class="clear"></div>
								<div class="coupon">
									<dt class="tb-metatit">优惠券</dt>
									<div class="gold-list">
										<ul>
											<li>125减5</li>
											<li>198减10</li>
											<li>298减20</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="pay">
							<div class="pay-opt">
							<a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
							<a><span class="am-icon-heart am-icon-fw">收藏</span></a>
							
							</div>
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="javascript:;">立即购买</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<a id="LikBasket" title="加入购物车" gid="" size="" color="" href="javascript:;"><i></i>加入购物车</a>
								</div>
							</li>
						</div>

					</div>

				
					<div class="clear"></div>

				</div>

				
				<div class="clear"><hr></div>
				
							
				<!-- introduce-->

				<div class="introduce">
					<div class="browse">
					    <div class="mc"> 
						     

						     <ul>

						     					    
						     	<div class="mt">            
						            <h1>为您推荐</h1>        
					            </div>


					            <?php if(is_array($recomShop)): foreach($recomShop as $key=>$v): ?><li class="first" style="border: 1px solid #eee;margin-bottom: 5px;">
							      	<div class="p-img">                    
							      		<a  href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($v["id"]); ?>"> <img class="" src="/thinkphp_3.2.3_full/Public/<?php echo ($v["pic_path"]); ?>"></a>               
							      	</div>
							      	<div class="p-name"><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($v["id"]); ?>"><?php echo ($v["goods_name"]); ?></a>
							      	</div>
							      	<div class="p-price"><strong>￥ <?php echo ($v["price"]); ?></strong></div>
							      </li><?php endforeach; endif; ?>		
					      
						     </ul>						
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active">
									<a href="#">

										<span id="detailbady" class="index-needs-dt-txt">宝贝详情</span></a>

								</li>

								<li>
									<a id="allAppraisal" href="#">

										<span class="index-needs-dt-txt">全部评价</span></a>

								</li>

								<li>
									<a href="#">

										<span id="Similargoods" class="index-needs-dt-txt">同类商品</span></a>
								</li>
							</ul>

							<div class="am-tabs-bd">

								<div class="am-tab-panel am-fade am-in am-active">
									<div class="J_Brand">

										<div class="attr-list-hd tm-clear">
											<h4>产品参数：</h4></div>
										<div class="clear"></div>
										<ul id="J_AttrUL">

											<li title="">材质： <?php echo ($detail[0]['material']); ?></li>
											<li title="">领型： <?php echo ($detail[0]['collar']); ?></li>
											<li title="">长度： <?php echo ($detail[0]['length']); ?></li>
											<li title="">袖型： <?php echo ($detail[0]['sleeve_type']); ?></li>
											<li title="">袖长： <?php echo ($detail[0]['seeve_length']); ?></li>

											
										</ul>
										<div class="clear"></div>
									</div>

									<div class="details">
										<div class="attr-list-hd after-market-hd">
											<h4>商品细节：</h4>
										</div>
										<div class="twlistNews">

											<?php if(is_array($detail_pic)): foreach($detail_pic as $key=>$vol): ?><img src="/thinkphp_3.2.3_full/Public/<?php echo ($vol); ?>" /><?php endforeach; endif; ?>
											
											

											
										</div>
									</div>
									<div class="clear"></div>

								</div>

								<div class="am-tab-panel am-fade">
									
                                    <div class="actor-new">
                                    	<div class="rate">                
                                    		<strong>100<span>%</span></strong><br> <span>好评度</span>            
                                    	</div>
                                        <dl>                    
                                            <dt>买家印象</dt>                    
                                            <dd class="p-bfc">
                                            			<q class="comm-tags"><span>味道不错</span><em>(2177)</em></q>
                                            			<q class="comm-tags"><span>颗粒饱满</span><em>(1860)</em></q>
                                            			<q class="comm-tags"><span>口感好</span><em>(1823)</em></q>
                                            			<q class="comm-tags"><span>商品不错</span><em>(1689)</em></q>
                                            			<q class="comm-tags"><span>香脆可口</span><em>(1488)</em></q>
                                            			<q class="comm-tags"><span>个个开口</span><em>(1392)</em></q>
                                            			<q class="comm-tags"><span>价格便宜</span><em>(1119)</em></q>
                                            			<q class="comm-tags"><span>特价买的</span><em>(865)</em></q>
                                            			<q class="comm-tags"><span>皮很薄</span><em>(831)</em></q> 
                                            </dd>                                           
                                         </dl> 
                                    </div>	
                                    <div class="clear"></div>
									<div class="tb-r-filter-bar">
										<ul class=" tb-taglist am-avg-sm-4">
											<li class="tb-taglist-li tb-taglist-li-current">
												<div class="comment-info">
													<span>全部评价</span>
													<span class="tb-tbcr-num">(32)</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-1">
												<div class="comment-info">
													<span>好评</span>
													<span class="tb-tbcr-num">(32)</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-0">
												<div class="comment-info">
													<span>中评</span>
													<span class="tb-tbcr-num">(32)</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li--1">
												<div class="comment-info">
													<span>差评</span>
													<span class="tb-tbcr-num">(32)</span>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>

									<div>

									<ul id="assessAll" class="am-comments-list am-comments-list-flip">

										
										
									</ul>

									<div class="clear"></div>

									<!--分页 -->
									<ul class="am-pagination am-pagination-right">
										

										
									</ul>


									<div class="clear"></div>




									<div class="tb-reviewsft">
										<div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
									</div>

								</div>

								<div class="am-tab-panel am-fade">
									<div class="like">
										<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
											
											
										</ul>
									</div>
									<div class="clear"></div>

									<!--分页 -->
									<ul class="am-pagination am-pagination-right">
									
									</ul>
									<div class="clear"></div>

								</div>

							</div>

						</div>

					


						<div class="clear"></div>
<div class="am-tab-panel am-fade am-active am-in">
									<div class="like">
										<ul  class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes likegoods">
											
											
												
										</ul>
									</div>
									<div class="clear"></div>

									

								</div>
					
			<!--菜单 -->
		<div class=tip>
			<div id="sidebar">
				<div id="wrap">
					<div id="prof" class="item ">
						<a href="# ">
							<span class="setting "></span>
						</a>
						<div class="ibar_login_box status_login ">
							<div class="avatar_box ">
								<p class="avatar_imgbox "><img src="/thinkphp_3.2.3_full/Public/images/no-img_mid_.jpg " /></p>
								<ul class="user_info ">
									<li>用户名: <?php echo ($session["username"]); ?></li>
									<li>级&nbsp;别普通会员</li>
								</ul>
							</div>
							<div class="login_btnbox ">
								<a href="javascript:;" class="login_order ">我的订单</a>
								<a href="javascript:;" class="login_favorite ">我的收藏</a>
							</div>
							<i class="icon_arrow_white "></i>
						</div>

					</div>
					<div id="shopCart " class="item ">
						
							<span class="message "></span>
						
						<p>
							<a href="<?php echo U('Home/Shopcar/showcar');?> "></a>
						</p>
						
					</div>
					<div id="asset " class="item ">
						<a href="javascript:;">
							<span class="view "></span>
						</a>
						<div class="mp_tooltip ">
							我的资产
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="foot " class="item ">
						<a href="javascript:; ">
							<span class="zuji "></span>
						</a>
						<div class="mp_tooltip ">
							我的足迹
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="brand " class="item ">
						<?php if(!empty($session)): ?><a href="<?php echo U('Person/collection');?>">
							<span class="wdsc "><img src="/thinkphp_3.2.3_full/Public/images/wdsc.png " /></span>
						</a>
						<?php else: ?>
						<a href="<?php echo U('Login/login');?>">
							<span class="wdsc "><img src="/thinkphp_3.2.3_full/Public/images/wdsc.png " /></span>
						</a><?php endif; ?>
						<div class="mp_tooltip ">
							我的收藏
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>


					<div class="quick_toggle ">
						<li class="qtitem ">
							<a href="# "><span class="kfzx "></span></a>
							<div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
						</li>
						<!--二维码 -->
						<li class="qtitem ">
							<a href="#none "><span class="mpbtn_qrcode "></span></a>
							<div class="mp_qrcode " style="display:none; "><img src="/thinkphp_3.2.3_full/Public/images/weixin_code_145.png " /><i class="icon_arrow_white "></i></div>
						</li>
						<li class="qtitem ">
							<a href="#top " data-am-smooth-scroll class="return_top "><span class="top "></span></a>
						</li>
					</div>

					<!--回到顶部 -->
					<div id="quick_links_pop " class="quick_links_pop hide "></div>

				</div>

			</div>
			<div id="prof-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					我
				</div>
			</div>
			<div id="shopCart-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					购物车
				</div>
			</div>
			<div id="asset-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					资产
				</div>

				<div class="ia-head-list ">
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">优惠券</div>
					</a>
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">红包</div>
					</a>
					<a href="# " target="_blank " class="pl money ">
						<div class="num ">￥0</div>
						<div class="text ">余额</div>
					</a>
				</div>

			</div>
			<div id="foot-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					足迹
				</div>
			</div>
			<div id="brand-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					收藏
				</div>
			</div>
			<div id="broadcast-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					充值
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
	
	<script src="/thinkphp_3.2.3_full/Public/js/echarts.min.js"></script>
    <script src="/thinkphp_3.2.3_full/Public/js/jquery.min.js"></script>
    <script src="/thinkphp_3.2.3_full/Public/js/amazeui.min.js"></script>
    <script src="/thinkphp_3.2.3_full/Public/js/iscroll.js"></script>
    <script src="/thinkphp_3.2.3_full/Public/js/app.js"></script>
    <script type="text/javascript" src="/thinkphp_3.2.3_full/Public/basic/js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/basic/js/quick_links.js"></script>
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/js/jquery.imagezoom.min.js"></script>
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/js/list.js"></script>

 <script>	


	var size; 
	var color; 
	var id;
	
	 //点击到尺码  icandoit
    $('#hiddenDiv').on('click','#defaultsize li' ,function (){

    	 	$(this).css('border','2px solid red').siblings().css('border','1px solid #eee');
    	 	size = $(this).text();
    	 	$('#LikBasket').attr('size', size);

    	 	id = $(this).attr('name');
    	 	$('#hiddenDiv').removeClass('hiddenDiv');
    	 	$.post(

				'<?php echo U("convertSize");?>',   

				{id:id,size:size},

				function(data){

					str =' ';

					for (var tt=0;tt < data.length;tt++) {

						str += '<li class="color "  name="'+data[tt].goods_id+'" value="'+data[tt].color+'">'+data[tt].color+'</li>';
					} 

					$('#defaultcolor').html(str);
					
				},

				'json'

				);

     		

    	
    })



    //点到颜色
     $('#hiddenDiv').on('click','#defaultcolor li' ,function (){

    	 	$(this).css('border','2px solid red').siblings().css('border','1px solid #eee');
    	 	color = $(this).text();
    	 	$('#LikBasket').attr('color', color);
    	 	
    	 	id = $(this).attr('name');
    	 	$('#hiddenDiv').removeClass('hiddenDiv');

     		    $.post(

				'<?php echo U("convertColor");?>',  

				{id:id,size:size,color:color}, 

				function(data){   
						

					var newprice = data.price;
					var newStock = data.store;

					$('#goods_price').html(newprice);

					$('#newStock').html(newStock);
				

				
					
				 },

				'json'    //数据的格式

				);

     		
    		 	
    	
    })
    

     //加数量
	$('#addnum').click( function () {
		var originnum = parseInt($('#text_box').val());
		originnum += 1;
		$('#text_box').attr("value", originnum);
		if (isNaN($('#text_box').attr("value"))) {
			$('#text_box').attr("value", 1);
		}
	} );
	
	//减少数量
	$('#delnum').click( function () {
		var originnum = parseInt($('#text_box').val());
		if (originnum > 1) {
			originnum -= 1;
			$('#text_box').attr("value", originnum);		
		} else {
			$('#text_box').attr("value", 1);		
		}
		if (isNaN($('#text_box').attr("value"))) {
			$('#text_box').attr("value", 1);
		}
								
	} );

     

     // 处理商品加入购物车,不选择所的商品属性不能加入购物车
     $('#LikBasket').click(function(){

     	if (color == undefined || size == undefined){
     		$('#hiddenDiv').addClass('hiddenDiv');
     	} 
     	if (color != undefined && size != undefined) {
     		// 商品数量
			var nums = $("#text_box").attr("value");

			location.href="/thinkphp_3.2.3_full/index.php/Home/Shopcar/shopcar/gid/"+id+"/nums/"+nums+"/color/"+color+"/size/"+size+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
     	}
     		
     });

     //处理商品立即购买，不选择不能跳到结算页
     $('#LikBuy').click(function(){
     	if (color == undefined || size == undefined){
     		$('#hiddenDiv').addClass('hiddenDiv');
     	} 
     	if (color != undefined && size != undefined){
			var nums = $("#text_box").attr("value");
			
     		location.href="/thinkphp_3.2.3_full/index.php/Home/Pay/payCarInfo/lgid/"+id+"/lnums/"+nums+"/lcolor/"+color+"/lsize/"+size+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
     	}
     });







     

     //放大镜开始
    $(function() {});

	$(window).load(function() {

		$('.flexslider').flexslider({

			animation: "slide",

			start: function(slider) {

				$('body').removeClass('loading');

							}

						});
					});





		$(document).ready(function() {

			$(".jqzoom").imagezoom(); 

			$("#thumblist li a").click(function() {

				$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");

				$(".jqzoom").attr('src', $(this).find("img").attr("mid"));

				$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
			});
		});
	//放大镜结束
	

	//宝贝详情：基本信息
	
	
	// $('.am-tabs-bd').html();
	// var heightScreen = document.body.clientHeight; //获取到显示器的高度
	 var heightScreen = $(window).height();//获取到网页主体的高度
	// console.log(heightScreen);

	$('#detailbady').click(function (){

		$('.am-tabs-bd').html();

		var goodsid = $('.color').attr('name');


		$.post(

			'<?php echo U("detailBady");?>',

			{goodsid:goodsid},

			function (data) {

				
				str = ' ';

				str += '<li title="">材质： '+data['material']+'</li>';
				str += '<li title="">领型： '+data['collar']+'</li>';
				str += '<li title="">袖长 '+data['seeve_length']+'</li>';
				str += '<li title="">长度 '+data['length']+'</li>';
				str += '<li title="">袖子风格： '+data['sleeve_type']+'</li>';
		
				$('#J_AttrUL').html(str);
				
			},
			'json'

			);
	})



//全部评价
	$('#allAppraisal').click(function (){

		var goods_id = $('.color').attr('name');

		$.post(

			'<?php echo U("assessAll");?>',

			{goods_id:goods_id},

			function (data) {

				str = ' ';

				for (var kk=0;kk<data[0].length;kk++){

					str += '<li class="am-comment"><a href="/thinkphp_3.2.3_full/Public/'+data[0][kk].userpic+'"><img class="am-comment-avatar" src="/thinkphp_3.2.3_full/Public/'+data[0][kk].userpic+'" /></a><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#link-to-user" class="am-comment-author">'+data[0][kk].username+' &nbsp;&nbsp;</a>评论于&nbsp;&nbsp;<time datetime="'+data[0][kk].order_time+'">'+data[0][kk].order_time+'</time></div></header><div class="am-comment-bd"><div class="tb-rev-item " data-id="255776406962"><div class="J_TbcRate_ReviewContent tb-tbcr-content " style="font-size:14px;">'+data[0][kk].content+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="tb-r-act-bar" style="color:#bababa;">主要颜色：'+data[0][kk].color+'&nbsp;尺码：'+data[0][kk].size+'</div></div></div></div></li>';


				}

				
				// str += data[1].show;

				$('#assessAll').html(str);

			},

			'json'

			);

		
	})	






	//收藏商品
	$('#collectionShop').click(function (){

		var goods_id = $('.color').attr('name');

		
		$.post(

			'<?php echo U("collectionShop");?>',

			{goods_id:goods_id},

			function (data) {

				if (data == 'true'){

					alert('收藏成功~~');


				} else if(data == 'false') {

					
					
					

					if ( confirm("请先登录再收藏，现在是否去登录？") ) {

						var localdress = window.location.href;

						location.href = "/thinkphp_3.2.3_full/index.php/Home/Login/login?url="+localdress;

					}

					
					

				} else {

					alert('您已收藏，请勿再加入');
				}
			},

			'json'

			);


	});



$('#Similargoods').click(function () {

		var goods_id = $('.color').attr('name');

		$.post(

			'<?php echo U("Similargoods");?>',

			{goods_id:goods_id},

			function (data) {
				str = ' ';
				for (var i=0;i<data.length;i++) {

					str += '<li style="border:1px solid #eee;margin:0 0 2px 0px;text-align:center;color:#eee;"><div class="i-pic limit"><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[i].id+'"><img width="210px" height="210px" src="/thinkphp_3.2.3_full/Public/'+data[i].pic_path+'"><p> <span>'+data[i].goods_name+'</span></p><p class="price fl"><b>¥</b><strong>'+data[i].price+'</strong></p></div></li>';
				}

				$('.likegoods').html(str);
				
			},

			'json'
		);

	})

</script>

	</body>
</html>