<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>商品列表</title>
		<!-- link模块 -->
		
	
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/thinkphp_3.2.3_full/Public/css/seastyle.css" rel="stylesheet" type="text/css" />

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
           <div class="search">
			<div class="search-list">
			<div class="nav-table">
					   <a href="/thinkphp_3.2.3_full/index.php/Home/List/list" title="所有商品列表"><div class="long-title"><span class="all-goods">全部分类</span></div></a>
					   <div class="nav-cont">
							<ul>
								<ul>
								<li class="index"><a href="/thinkphp_3.2.3_full/index.php/Home">首页</a></li>
                                <li class="qc"><a href="javascript:;">闪购</a></li>
                                <li class="qc"><a href="javascript:;">限时抢</a></li>
                                <li class="qc"><a href="javascript:;">团购</a></li>
                                <li class="qc last"><a href="javascript:;">大包装</a></li>
							</ul>
                              
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12 accurateSearch">
	                  	<div class="theme-popover">														
							<div class="searchAbout">
								<span class="font-pale">相关搜索：</span>
								<a title="坚果" href="#">坚果</a>
								<a title="瓜子" href="#">瓜子</a>
								<a title="鸡腿" href="#">豆干</a>

							</div>

							<ul class="select">
								<p class="title font-normal">
									<!-- <span class="fl">松子</span> -->
									<!-- <span class="total fl">搜索到<strong class="num">997</strong>件相关商品</span> -->
								</p>
								<div class="clear"></div>
								

								<div class="clear"></div>
																
								<li class="select-list">
									<dl id="select1">
										<dt class="am-badge am-round ">一级分类:</dt>
										<div class="dd-conent listFirst" id="listFirstends">
											<dd class="select-all selected"><a href="javascript:;">全部</a></dd>

											<?php if(is_array($listFirst)): foreach($listFirst as $key=>$v): ?><dd class="select1-type" value="<?php echo ($v["id"]); ?>"><a href="javascript:;"><?php echo ($v["name"]); ?></a></dd><?php endforeach; endif; ?>

										</div>
									</dl>
								</li>


								<li class="select-list">
									<dl id="select2">
										<dt class="am-badge am-round">二级分类:</dt>	

										 <div class="dd-conent" id="listSecondens">
											<dd class="select-all selected" ><a href="javascript:;">全部</a></dd>

											 <?php if(is_array($listSecond)): foreach($listSecond as $key=>$vo): ?><dd class="select2-type" value="<?php echo ($vo["first_sort_id"]); ?>"><a href="javascript:;"><?php echo ($vo["name"]); ?></a></dd><?php endforeach; endif; ?>
										</div>
									</dl>
								</li>
					        
							</ul>
							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
									<li class="first"><a  href="javascript:;" title="销量">销量排序</a></li>
									<li><a title="价格"   href="javascript:;" >价格优先</a></li>
									<li class="big"><a    href="javascript:;" title="评价"  >已有评价</a></li>
								</div>

								<div class="clear"></div>

								<ul id="shopListUl" class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes" id="shopListSeach">

									<?php if(is_array($goodsList)): foreach($goodsList as $key=>$vy): ?><li>
											<div class="i-pic limit"><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/Detail/id/<?php echo ($vy["id"]); ?>">
												<img width="218px" title="<?php echo ($vy["goods_name"]); ?>" height="218px" src="/thinkphp_3.2.3_full/Public/<?php echo ($vy["pic_path"]); ?>"/></a>											
												<p class="title fl" ><?php echo (subtext($vy["goods_name"],18)); ?></p>
												<p class="price fl">
													<b>¥</b>
													<strong><?php echo ($vy["price"]); ?></strong>
												</p>
												<p class="number fl">
													销量：<span><?php echo ($vy["buynum"]); ?></span>
												</p>
											</div>
										</li><?php endforeach; endif; ?>
									
									
									
								</ul>
							</div>

							<div class="search-side">

								<div class="side-title">
									商品推荐
								</div>
			
								<?php if(is_array($recommendShop)): foreach($recommendShop as $key=>$v): ?><li>
									<div class="i-pic check" id="recommend">
										<a href="/thinkphp_3.2.3_full/index.php/Home/Detail/Detail/id/<?php echo ($v["id"]); ?>"><img src="/thinkphp_3.2.3_full/Public/<?php echo ($v["pic_path"]); ?>" /></a>
										
										<p class="check-title" style="font-size: 12px;" title="<?php echo ($v["goods_name"]); ?>"><?php echo (subtext($v["goods_name"],8)); ?></p>
										<p class="price fl">
											<b>¥</b>
											<strong><?php echo ($v["price"]); ?></strong>
										</p>
										<p class="number fl">
											销量<span><?php echo ($v["buynum"]); ?></span>
										</p>
									</div>
								</li><?php endforeach; endif; ?>

							</div>

							<div class="am-u-sm-6"><?php echo ($show); ?></div>
							
						
						</div>
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
	

    <script type="text/javascript" src="/thinkphp_3.2.3_full/Public/basic/js/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/js/script.js"></script>
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/basic/js/quick_links.js"></script>

	<script>
			window.jQuery || document.write('<script src="basic/js/jquery-1.9.min.js"><\/script>');

			var that;

			$( '.accurateSearch' ).on( 'click','.select1-type',function (){

				that = $(this).attr( 'value' );

				var firstText = $(this).attr( 'value' );


				$.post(	

					'<?php echo U("listFirs1");?>',

					{first:firstText},

					function ( data ) {

						

						var str = '<dd class="select-all selected" ><a href="javascript:;">全部</a></dd>';

						var shop = ' ';

						for ( var p=0;p<data[0].length;p++ ) {
							
							
							str += '<dd class="select2-type" value="'+data[0][p].id+'"><a href="javascript:;">'+data[0][p].name+'</a></dd>';

						}

						$( '#listSecondens' ).html( str );
						for (var i=0;i<data[1].length;i++){
							 shop +='<li><div class="i-pic limit"><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/Detail/id/'+data[1][i].id+'"><img width="218px" height="218px" src="/thinkphp_3.2.3_full/Public/'+data[1][i].pic_path+'" /></a><p class="title fl">'+data[1][i].goods_name+'</p><p class="price fl"><b>¥</b><strong>'+data[1][i].price+'</strong></p><p class="number fl">销量：<span>'+data[1][i].buynum+'</span></p></div></li>';
						}

						$('#shopListUl').html( shop );

					},

					'json'

					);
				
			});


			$( '.accurateSearch' ).on( 'click', '.select2-type',function (){

				var secondid = $(this).attr( 'value' );

				$(this).addClass('selected').siblings().removeClass('selected');

				$.post(	

					'<?php echo U("listSecond1");?>',

					{id:secondid},

					function ( data ) {

						var arrayList = ' ';
						for (var y=0;y<data.length;y++){

							 arrayList +='<li><div class="i-pic limit"><a href="/thinkphp_3.2.3_full/index.php/Home/Detail/Detail/id/'+data[y].id+'"><img width="218px" height="218px" src="/thinkphp_3.2.3_full/Public/'+data[y].pic_path+'" /></a><p class="title fl">'+data[y].goods_name+'</p><p class="price fl"><b>¥</b><strong>'+data[y].price+'</strong></p><p class="number fl">销量：<span>'+data[y].buynum+'</span></p></div></li>';
						}

						$('#shopListUl').html(arrayList);
						
					},

					'json'

					);

			});


		//分页类
		$('.current').wrap('<li></li>').parent().siblings().wrap('<li></li>').parent().parent().wrapInner('<ul class="am-pagination tpl-pagination"></ul>').wrapInner('<div class="am-fr"></div>').wrapInner('<div class="am-cf"></div>');








		//综合排序
		//销量排序
		//价格优先
		$('.accurateSearch').on('click','.first' ,function () {


			var ko = $('.select1-type').attr('value');

			console.log(ko);

		});

		
			
	</script>

	
	


	</body>
</html>