<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>有品商城网</title>
		<!-- link模块 -->
		
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/thinkphp_3.2.3_full/Public/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/thinkphp_3.2.3_full/Public/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
		<style>
			hover:a{
				color:black;
			}
			.dl-sort a {
				color:#D2364C;
			}
			.mystyle{
				color:black;
				background:#D2364C;
				border-radius: 5px;
				}

			.hide{
				display:none;
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
		
			<div class="banner">
              <!--轮播 -->
				<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
					<ul class="am-slides">
						<li style="background:#7ECCE2" class="banner1"><a href="/thinkphp_3.2.3_full/index.php<?php echo ($adverdata[0]['ad_url']); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($adverdata[0]['ad_pic']); ?>" /></a></li>
						<li style="background:#D8D9DD" class="banner2"><a href="/thinkphp_3.2.3_full/index.php<?php echo ($adverdata[1]['ad_url']); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($adverdata[1]['ad_pic']); ?>" /></a></li>
						<li style="background:#FDEBB9" class="banner3"><a href="/thinkphp_3.2.3_full/index.php<?php echo ($adverdata[2]['ad_url']); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($adverdata[2]['ad_pic']); ?>" /></a></li>
						
					</ul>
				</div>
				<div class="clear"></div>	
			</div>
			<div class="shopNav">
				<div class="slideall">	
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
		        				
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									<div class="category">
										<ul class="category-list" id="js_climit_li">
											<?php if(is_array($navName)): foreach($navName as $k=>$v): ?><li class="appliance js_toggle relative" value="<?php echo ($v["id"]); ?>">
													<div class="category-info">
														<h3 class="category-name b-category-name"><i><img src="/thinkphp_3.2.3_full/Public/images/yp_icon<?php echo ($k); ?>.png"></i><a href="/thinkphp_3.2.3_full/index.php/Home/List/list/fid/<?php echo ($v["id"]); ?>" class="ml-22" title="<?php echo ($v["name"]); ?>"><?php echo ($v["name"]); ?></a></h3>
														<em>&gt;</em>
													</div>
													<div class="menu-item menu-in top">
														<div class="area-in">
															<div class="area-bg">
																<div class="menu-srot">

																</div>
															</div>
														</div>
													</div>
												<b class="arrow"></b>	
												</li><?php endforeach; endif; ?>
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						<!--轮播-->
				
						<script type="text/javascript">

							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							});


							$('#js_climit_li').on('mouseenter', 'li', function () {

								var firstsortId = $(this).attr('value');
								
								that = $(this);

								ajaxside(firstsortId, that);
								
							});

							function ajaxside(firstsortId, that)
							{
								if (that.attr('data') != 1){
				
									$.post(

										'/thinkphp_3.2.3_full/index.php/Home/Index/sideNav',

										{fid: firstsortId},

										function (data) {

											var string = '<div class="sort-side">';

											for (var i = 0; i < data.length; i++) {

												string += '<dl class="dl-sort"><dt><a href="/thinkphp_3.2.3_full/index.php/Home/List/list/sid/'+data[i][0][1]+'"><span title="'+data[i][0][0]+'">'+data[i][0][0]+'</span></a></dt>';

												for (var t = 0; t < data[i][1].length; t++) {

												string += '<dd><a title="'+data[i][1][t]['goods_name']+'" href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[i][1][t]['id']+'"><span>'+data[i][1][t]['goods_name']+'</span></a></dd>';

											}

											string += "</dl>";
										}

										string += '</div>';

										that.children().eq(1).children().children().children().html(string);

										that.attr('data', 1);

										},
										'json'

									);
								}
							}
						</script>
					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/thinkphp_3.2.3_full/Public/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/thinkphp_3.2.3_full/Public/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/thinkphp_3.2.3_full/Public/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/thinkphp_3.2.3_full/Public/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">有品头条</span>
						<div class="demo">
							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="/thinkphp_3.2.3_full/Public/images/TJ2.jpg"></img>
									<span>[公告]</span>热烈庆祝战狼2票房突破40亿								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="/thinkphp_3.2.3_full/Public/images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="/thinkphp_3.2.3_full/Public/person/index.html">
									<img src="/thinkphp_3.2.3_full/Public/images/getAvatar.do.jpg">
								</a>
								<em>
								<?php if(empty($session)): ?><span class="s-name">亲，您还没登录</span>
									<a href="#"><p>点击更多优惠活动</p></a>	
								<?php else: ?>
									Hi,<span class="s-name"><?php echo ($session["username"]); ?></span>
									<a href="#"><p>点击更多优惠活动</p></a><?php endif; ?>
								</em>
							</div>
							<div class="member-logout">
								<?php if(empty($session)): ?><a class="am-btn-warning btn" href="<?php echo U('Login/login');?>">登录</a><a class="am-btn-warning btn" href="<?php echo U('Register/register');?>">注册</a>
								<?php else: ?>
								<a class="am-btn-warning btn" href="<?php echo U('Login/login');?>">更换用户</a><a class="am-btn-warning btn" href="<?php echo U('Login/loginOut');?>">退出</a><?php endif; ?>
							</div>
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																    
							<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
							<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
							<li><a target="_blank" href="#"><span>[特惠]</span>商城首天运营千万优惠等你拿</a></li>
		
						</ul>
                        <div class="advTip"><img src="/thinkphp_3.2.3_full/Public/images/activity05.jpg"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="am-u-sm-3 " >
							<img class="am-radius" style="width:98%" src="/thinkphp_3.2.3_full/Public/images/2017selling.jpg"></img>
						</div>
						<?php if(is_array($sellinggood)): foreach($sellinggood as $key=>$v): ?><div class="am-u-sm-3 am-u-lg-3 ">
								<div class="info">
									<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/Detail/id/<?php echo ($v["id"]); ?>"><h3><?php echo ($v["goods_name"]); ?></h3></a>
									<h4>购买量：<?php echo ($v["buynum"]); ?></h4>
								</div>
								<div class="recommendationMain one">
									<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/Detail/id/<?php echo ($v["id"]); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($v["pic_path"]); ?> "></img></a>
								</div>
							</div><?php endforeach; endif; ?>						
					</div>
					<div class="clear "></div>
					<!--热门活动 -->

					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							<span class="more ">
                              <a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					  <div class="am-g am-g-fixed ">
						<div class="am-u-sm-3 ">
							<div class="icon-sale one "></div>	
								<h4>秒杀</h4>							
							<div class="activityMain ">
								<img src="/thinkphp_3.2.3_full/Public/images/activity02.jpg "></img>
							</div>
							<div class="info ">
								<h3>优选女上衣活动</h3>
							</div>														
						</div>
						
						<div class="am-u-sm-3 ">
						  <div class="icon-sale two "></div>	
							<h4>特惠</h4>
							<div class="activityMain ">
								<img src="/thinkphp_3.2.3_full/Public/images/activity01.jpg "></img>
							</div>
							<div class="info ">
								<h3>优选女T恤活动</h3>								
							</div>							
						</div>						
						
						<div class="am-u-sm-3 ">
							<div class="icon-sale three "></div>
							<h4>团购</h4>
							<div class="activityMain ">
								<img src="/thinkphp_3.2.3_full/Public/images/activity03.jpg "></img>
							</div>
							<div class="info ">
								<h3>优选男上衣活动</h3>
							</div>							
						</div>						

						<div class="am-u-sm-3 last ">
							<div class="icon-sale "></div>
							<h4>超值</h4>
							<div class="activityMain ">
								<img src="/thinkphp_3.2.3_full/Public/images/activity04.jpg "></img>
							</div>
							<div class="info ">
								<h3>优选男T恤活动</h3>
							</div>													
						</div>

					  </div>
                   </div>

					<div class="clear "></div>


                <div style="height:520px" id="f1">	
					<div class="am-container ">
						<div class="shopTitle ">
							<h4><?php echo ($navName[0]['name']); ?></h4>
							<h3>瞧一瞧，看一看咯</h3>
							<div class="today-brands mydiv">
								<?php if(is_array($allData[0][0])): foreach($allData[0][0] as $key=>$v): ?><a href="# " val="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a><?php endforeach; endif; ?>
							</div>
							<span class="more ">
                    			<a href="/thinkphp_3.2.3_full/index.php/Home/List/list/fid/<?php echo ($navName[0]['id']); ?>">更多<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        	</span>
						</div>
					</div>
					<div>
						<div class="mybox">
							<div class="am-g am-g-fixed floodFour">
								<div class="am-u-sm-5 am-u-md-4 text-one list ">
									<div class="word">
										<span style="opacity:0.2" class="outer"></span>
										<span style="opacity:0.6" class="outer"></span>
										<span style="opacity:0.2" class="outer"></span>
										<span style="opacity:0.6" class="outer"></span>
										<span style="opacity:0.2" class="outer"></span>
										<span style="opacity:0.6" class="outer"></span>
									</div>
									<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][0][id]); ?>">
										<div class="outer-con ">
											<div class="title ">
												<?php echo ($allData[0][1][0][goods_name]); ?>
											</div>
											<div class="sub-title ">
												¥<?php echo ($allData[0][2][0][price]); ?>
											</div>									
										</div>
				                        <img src="/thinkphp_3.2.3_full/Public/<?php echo ($allData[0][1][0][pic_path]); ?>" />
				                        
				                    </a>
									<div class="triangle-topright"></div>						
								</div>
									<div class="am-u-sm-7 am-u-md-4 text-two sug">
										<div class="outer-con ">
											<div class="title ">
												<?php echo ($allData[0][1][1][goods_name]); ?>
											</div>									
											<div class="sub-title ">
												¥<?php echo ($allData[0][2][1][price]); ?>
											</div>
											<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][1][id]); ?>"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
										</div>
										<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][1][id]); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($allData[0][1][1][pic_path]); ?>" /></a>
									</div>

									<div class="am-u-sm-7 am-u-md-4 text-two">
										<div class="outer-con ">
											<div class="title ">
												<?php echo ($allData[0][1][2][goods_name]); ?>
											</div>
											<div class="sub-title ">
												¥<?php echo ($allData[0][2][2][price]); ?>
											</div>
											<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][2][id]); ?>"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
										</div>
										<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][2][id]); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($allData[0][1][2][pic_path]); ?>" /></a>
									</div>


								<div class="am-u-sm-3 am-u-md-2 text-three big">
									<div class="outer-con ">
										<div class="title ">
											<?php echo ($allData[0][1][3][goods_name]); ?>
										</div>
										<div class="sub-title ">
											¥<?php echo ($allData[0][2][3][price]); ?>
										</div>
										<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][3][id]); ?>"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
									</div>
									<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][3][id]); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($allData[0][1][3][pic_path]); ?>" /></a>
								</div>

								<div class="am-u-sm-3 am-u-md-2 text-three sug">
									<div class="outer-con ">
										<div class="title ">
											<?php echo ($allData[0][1][4][goods_name]); ?>
										</div>
										<div class="sub-title ">
											¥<?php echo ($allData[0][2][4][price]); ?>
										</div>
										<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][4][id]); ?>"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
									</div>
									<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][4][id]); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($allData[0][1][4][pic_path]); ?>" /></a>
								</div>

								<div class="am-u-sm-3 am-u-md-2 text-three ">
									<div class="outer-con ">
										<div class="title ">
											<?php echo ($allData[0][1][5][goods_name]); ?>
										</div>
										<div class="sub-title ">
											¥<?php echo ($allData[0][2][5][price]); ?>
										</div>
										<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][5][id]); ?>"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
									</div>
									<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][5][id]); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($allData[0][1][5][pic_path]); ?>" /></a>
								</div>

								<div class="am-u-sm-3 am-u-md-2 text-three last big ">
									<div class="outer-con ">
										<div class="title ">
											<?php echo ($allData[0][1][6][goods_name]); ?>
										</div>
										<div class="sub-title ">
											¥<?php echo ($allData[0][2][6][price]); ?>
										</div>
										<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][6][id]); ?>"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a>
									</div>
									<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/<?php echo ($allData[0][1][6][id]); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($allData[0][1][6][pic_path]); ?>" /></a>
								</div>
							</div>
						</div>
						<div class="mybox hide"></div>
						<div class="mybox hide"></div>
						<div class="mybox hide"></div>
						<div class="mybox hide"></div>
						<div class="mybox hide"></div>
						<div class="mybox hide"></div>
						<div class="mybox hide"></div>
					</div>
                 	<div class="clear "></div>                 
                </div>
                 
  
				<script>

					//商品模块数据ajax得到的数据
					$(document).on('mouseenter', '.mydiv a', function () {

						// console.log(1);
						var secondSort = $(this).attr('val');

						that = $(this);

						that.addClass('mystyle').siblings().removeClass('mystyle');

						var list = that.parent().parent().parent().next().children().eq(that.index()).show().siblings().hide();

						if (!that.data('exists') == '1') {
							
							$.post(

								'/thinkphp_3.2.3_full/index.php/Home/Index/pageData',

								{sid: secondSort},

								function (data) {

									var string = '<div class="am-g am-g-fixed floodFour">';

									string += '<div class="am-u-sm-5 am-u-md-4 text-one list "><div class="word"><span style="opacity:0.2" class="outer" ></span><span style="opacity:0.6" class="outer" ></span><span style="opacity:0.2" class="outer" ></span><span style="opacity:0.6" class="outer" ></span><span style="opacity:0.2" class="outer" ></span><span style="opacity:0.6" class="outer" ></span></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][0].id+'"><div class="outer-con "><div class="title ">'+data[0][0].goods_name+'</div><div class="sub-title ">¥'+data[1][0].price+'</div></div><img src="/thinkphp_3.2.3_full/Public/'+data[0][0].pic_path+'" /></a><div class="triangle-topright"></div></div>';

									string += '<div class="am-u-sm-7 am-u-md-4 text-two sug"><div class="outer-con "><div class="title ">'+data[0][1].goods_name+'</div><div class="sub-title ">¥'+data[1][1].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][1].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][1].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[0][1].pic_path+'" /></a></div>';

									string += '<div class="am-u-sm-7 am-u-md-4 text-two"><div class="outer-con "><div class="title ">'+data[0][2].goods_name+'</div><div class="sub-title ">¥'+data[1][2].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][2].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][2].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[0][2].pic_path+'" /></a></div>';

									string += '<div class="am-u-sm-3 am-u-md-2 text-three big"><div class="outer-con "><div class="title ">'+data[0][3].goods_name+'</div><div class="sub-title ">¥'+data[1][3].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][3].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][3].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[0][3].pic_path+'" /></a></div>';

									string += '<div class="am-u-sm-3 am-u-md-2 text-three sug"><div class="outer-con "><div class="title ">'+data[0][4].goods_name+'</div><div class="sub-title ">¥'+data[1][4].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][4].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][4].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[0][4].pic_path+'" /></a></div>';

									string += '<div class="am-u-sm-3 am-u-md-2 text-three "><div class="outer-con "><div class="title ">'+data[0][5].goods_name+'</div><div class="sub-title ">¥'+data[1][5].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][5].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][5].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[0][5].pic_path+'" /></a></div>';

									string += '<div class="am-u-sm-3 am-u-md-2 text-three last big "><div class="outer-con "><div class="title ">'+data[0][6].goods_name+'</div><div class="sub-title ">¥'+data[1][6].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][6].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[0][6].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[0][6].pic_path+'" /></a></div>';
			
									string += '</div>';

									// console.log(list.parent);
									list.siblings().eq(that.index()).html(string);

									that.data('exists', '1');
			
								},

								'json'

							);

						}
					});

					//滚动条触发ajax加载商品模块数据
				var	num = 1;
				var idNum = 2;
				$(document).on('scroll', function() {
					
					var digital1 = $(document).scrollTop() + $(window).height();

					var digital2 = $(document).height() - 50;

					if (digital1 > digital2 && num < 5) 
					{
						$.post(

								'/thinkphp_3.2.3_full/index.php/Home/Index/loadData',

								{fid: num},

								function (data) {
								
									var string = '<div style="height:520px" id="f'+idNum+'"><div class="am-container "><div class="shopTitle "><h4>'+data[0].name+'</h4><h3>瞧一瞧，看一看咯</h3><div class="today-brands mydiv">';
										
									idNum++;

									for (var i = 0; i < data[1].length; i++) {

										string += '<a href="javascript:" val="'+data[1][i].id+'">'+data[1][i].name+'</a>';
									}
								
									string += '</div><span class="more "><a href="/thinkphp_3.2.3_full/index.php/Home/List/list/fid/'+data[0].id+'">更多<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a></span></div></div>';
							
									string += '<div><div class="mybox">';
									
									string += '<div class="am-g am-g-fixed floodFour">';

									string += '<div class="am-u-sm-5 am-u-md-4 text-one list "><div class="word"><span style="opacity:0.2" class="outer" ></span><span style="opacity:0.6" class="outer" ></span><span style="opacity:0.2" class="outer" ></span><span style="opacity:0.6" class="outer" ></span><span style="opacity:0.2" class="outer" ></span><span style="opacity:0.6" class="outer" ></span></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][0].id+'"><div class="outer-con "><div class="title ">'+data[2][0].goods_name+'</div><div class="sub-title ">¥'+data[3][0].price+'</div></div><img src="/thinkphp_3.2.3_full/Public/'+data[2][0].pic_path+'" /></a><div class="triangle-topright"></div></div>';

									string += '<div class="am-u-sm-7 am-u-md-4 text-two sug"><div class="outer-con "><div class="title ">'+data[2][1].goods_name+'</div><div class="sub-title ">¥'+data[3][1].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][1].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][1].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[2][1].pic_path+'" /></a></div>';

									string += '<div class="am-u-sm-7 am-u-md-4 text-two"><div class="outer-con "><div class="title ">'+data[2][2].goods_name+'</div><div class="sub-title ">¥'+data[3][2].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][2].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][2].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[2][2].pic_path+'" /></a></div>';

									string += '<div class="am-u-sm-3 am-u-md-2 text-three big"><div class="outer-con "><div class="title ">'+data[2][3].goods_name+'</div><div class="sub-title ">¥'+data[3][3].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][3].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][3].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[2][3].pic_path+'" /></a></div>';

									string += '<div class="am-u-sm-3 am-u-md-2 text-three sug"><div class="outer-con "><div class="title ">'+data[2][4].goods_name+'</div><div class="sub-title ">¥'+data[3][4].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][4].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][4].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[2][4].pic_path+'" /></a></div>';

									string += '<div class="am-u-sm-3 am-u-md-2 text-three "><div class="outer-con "><div class="title ">'+data[2][5].goods_name+'</div><div class="sub-title ">¥'+data[3][5].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][5].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][5].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[2][5].pic_path+'" /></a></div>';

									string += '<div class="am-u-sm-3 am-u-md-2 text-three last big "><div class="outer-con "><div class="title ">'+data[2][6].goods_name+'</div><div class="sub-title ">¥'+data[3][6].price+'</div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][6].id+'"><i class="am-icon-shopping-basket am-icon-md  seprate"></i></a></div><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/detail/id/'+data[2][6].id+'"><img src="/thinkphp_3.2.3_full/Public/'+data[2][6].pic_path+'" /></a></div>';
			
									string += '</div>';
							
									string += '</div><div class="mybox hide"></div><div class="mybox hide"></div><div class="mybox hide"></div><div class="mybox hide"></div><div class="mybox hide"></div><div class="mybox hide"></div><div class="mybox hide"></div></div><div class="clear "></div></div>';

									$('.shopMain').append(string);
                
								},

								'json'
						);	
					num++;
					}
				});
		
				</script>
				</div>
			</div>
   			<div></div>	
   			<div></div>
		<!--引导 -->
		<div class="navCir">
			<li class="active"><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="/thinkphp_3.2.3_full/Public/person/index.html"><i class="am-icon-user"></i>我的</a></li>					
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
						<?php if(empty($session)): ?><a href="<?php echo U('Home/Shopcar/showCar');?> "></a>
						<?php else: ?>
							<a href="<?php echo U('Home/Shopcar/shopCar');?> "></a><?php endif; ?>
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
	
	</body>
</html>