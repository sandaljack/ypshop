<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>地址管理</title>
		<!-- link模块 -->
		
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/thinkphp_3.2.3_full/Public/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/thinkphp_3.2.3_full/Public/css/addstyle.css" rel="stylesheet" type="text/css">
		<!-- 自己加的 -->
		<link href="/thinkphp_3.2.3_full/Public/css/address.css" rel="stylesheet" type="text/css">
		

        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/images/youpinsize.png">
		<!-- script模块 -->
		
		<script src="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
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

					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>每个用户可以设置5个收货地址</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails" id="uladdress">
							<?php if(is_array($list)): foreach($list as $key=>$v): if($v["add_default"] == 1 ): ?><li class="user-addresslist defaultAddr"><?php else: ?><li class="user-addresslist"><?php endif; ?>
								<?php if($v["add_default"] == 1 ): ?><span class="new-option-r deftip"><i class="am-icon-check-circle"></i>默认地址</span>
								<?php else: ?>
								<span class="new-option-r deftip" style="display:none"><i class="am-icon-check-circle"></i>默认地址</span><?php endif; ?>
								<?php if($v["add_default"] != 1 ): ?><span class="new-option-r updefault" aid="<?php echo ($v["id"]); ?>"><i class="am-icon-check-circle"></i>设为默认</span>
								<?php else: ?>
								<span class="new-option-r updefault" style="display:none" aid="<?php echo ($v["id"]); ?>"><i class="am-icon-check-circle"></i>设为默认</span><?php endif; ?>
								<p class="new-tit new-p-re">
									<span class="new-txt"><?php echo ($v["add_name"]); ?></span><br>
									<span class="new-txt-rd2"><?php echo ($v["add_phone"]); ?></span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="province"><?php echo ($v["add_province"]); ?></span>
										<span class="city"><?php echo ($v["add_city"]); ?></span>
										<span class="dist"><?php echo ($v["add_area"]); ?></span>
										<span class="town"><?php echo ($v["add_town"]); ?></span>
										<span class="street"><?php echo ($v["add_detail"]); ?></span>
										</span>
								</div>
								<div class="new-addr-btn control">
									<a  aid="<?php echo ($v["id"]); ?>" province="<?php echo ($v["add_province"]); ?>" city="<?php echo ($v["add_city"]); ?>" area="<?php echo ($v["add_area"]); ?>" town="<?php echo ($v["add_town"]); ?>" street="<?php echo ($v["add_detail"]); ?>" buyname="<?php echo ($v["add_name"]); ?>" phone="<?php echo ($v["add_phone"]); ?>" class="theme-login editAddress" href="#"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>
									<a class="deladd" aid="<?php echo ($v["id"]); ?>" def="<?php echo ($v["add_default"]); ?>" href="javascript:void(0);" ><i class="am-icon-trash"></i>删除</a>
								</div>
							</li><?php endforeach; endif; ?>
						</ul>
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" action="<?php echo U('Home/Address/addAddress');?>">

										<div class="am-form-group">
											<label for="buyname" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" name="name" id="buyname" placeholder="收货人">
											</div>
										</div>

										<div class="am-form-group">
											<label for="buyphone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="buyphone" name="phone" placeholder="手机号必填" type="email">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address">
												<div id="area">
													<select name="province" id="province" >
														<option value="-1">--请选择--</option>
													</select>
												</div>
											</div>
										</div>

										<div class="am-form-group">
											<label for="addDetail" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" name="detail" id="addDetail" placeholder="输入详细地址" ></textarea>
												<small>100字以内写出你的详细地址</small>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<a id="saveAdd" class="am-btn am-btn-danger">保存</a>
												<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>


					<div class="clear"></div>

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
							<li class="active"> <a href="<?php echo U('Home/Address/showAddress');?>">收货地址</a></li>
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
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="javascript:;">优惠券 </a></li>
							<li> <a href="javascript:;">红包</a></li>
							<li> <a href="javascript:;">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
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

		<!-- 地址点击 -->
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址</strong> / <small>edit address</small></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form class="am-form am-form-horizontal">

						<div class="am-form-group">
							<label for="_buyname" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="_buyname"  name="buyname"  placeholder="收货人" value="" >
							</div>
						</div>

						<div class="am-form-group">
							<label for="_buyphone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="_buyphone" name="phone" type="text">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">所在地</label>
							<div class="am-form-content address">
								<div id="area2">
									<select name="province" id="_province">
										<option value="-1">--请选择--</option>
									</select>
								</div>
							</div>
						</div>

						<div class="am-form-group">
							<label for="_addDetail" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3"  id="_addDetail" placeholder="输入详细地址"></textarea>
								<small>100字以内写出你的详细地址</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<div class="am-btn am-btn-danger" id="upAdd">保存</div>
								<div class="am-btn am-btn-danger close" id="close">返回</div>
							</div>
						</div>
					</form>
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
	
	<script type="text/javascript">
		$(document).ready(function() {							
			$(".new-option-r").click(function() {
				$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
			});
			
			var $ww = $(window).width();
			if($ww>640) {
				$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
			}
			
		})


			//添加地址三级联动
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


		//设置默认地址
		$('.updefault').each(function() {
			var aid = $(this).attr('aid');
			$(this).click(function() {
				var that = $(this);
				$.post(
				'<?php echo U("Address/upDefaultAdd");?>',
				{id:aid},
				function (data) {
					if (data == 1) {
						//将所有的改变
						$('#uladdress').find('.updefault').show().parent().parent().find('.deftip').hide();
						//然后单独改变
						that.hide().parent().parent().find('.deftip').show();
					}
				},
				'json'
				);
			});
		});

		//点击保存地址
		$('#saveAdd').click(function() {
				var province = $('#province').children(':selected').html();
				var city = $('#city').children(':selected').html();
				var county = $('#county').children(':selected').html();
				var town = $('#town').children(':selected').html();
				var buyname = $('#buyname').val();
				var buyphone = $('#buyphone').val();
				var detail = $('#addDetail').val();
				var preg =  /^1[34578]{1}\d{9}$/;
					if (!buyname) {
						alert('请填写收货人');
					} else if (!buyphone || !preg.test(buyphone)) {
						alert('请填写收货人手机号码');
					} else if (province == '--请选择--') {
						alert('请选择省份');
					} else if (city == '--请选择--') {
						alert('请选择城市');
					} else if (county == '--请选择--') {
						alert('请选择地区');
					} else if (town == '--请选择--') {
						alert('请选择城镇');
					} else if (!detail) {
						alert('请填写详情地址');
					}  else {
						if (county == null) {
							county = ' ';
						}
						if (town == null) {
							town = ' ';
						}
						$.post(
							'<?php echo U("Address/addAddress");?>',
							{buyname:buyname, buyphone:buyphone, province:province, city:city, county:county, town:town, detail:detail },
							function (data) {
								if (data == 1) {
									location.href = "/thinkphp_3.2.3_full/index.php/Home/Address/showAddress"+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
								} else {
									alert('添加地址失败,每个用户只能有5个收货地址，如要添加请先删除');
								}
							},
							'json'

						);

					}
			});
			
			//删除地址
			$('.deladd').each(function() {

				$(this).click(function() {
					var id = $(this).attr('aid');
					var def = $(this).attr('def');
					that = $(this);
					$.post(
						'<?php echo U("Address/delAddress");?>',
						{id:id},
						function (data) {
							if (data == 1) {
								that.parent().parent().remove();
							}
						},
						'json'
					);
				});
			});			
				//点击编辑地址
			$('.theme-login').each(function() {
				$(this).click(function() {
					var id = $(this).attr('aid');
					location.href = "/thinkphp_3.2.3_full/index.php/Home/Address/editAddress/id/"+id+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
				});
			});	

			
										
			// 弹出地址选择
			$(document).ready(function($) {
	
				var $ww = $(window).width();
	
				$('.theme-login').click(function() {
//					禁止遮罩层下面的内容滚动
					$(document.body).css("overflow","hidden");
				
					$(this).addClass("selected");
					$(this).parent().addClass("selected");

									
					$('.theme-popover-mask').show();
					$('.theme-popover-mask').height($(window).height());
					$('.theme-popover').slideDown(200);																		
					
				})
				
				$('.theme-poptit .close,.btn-op .close').click(function() {

					$(document.body).css("overflow","visible");
					$('.theme-login').removeClass("selected");
					$('.item-props-can').removeClass("selected");					
					$('.theme-popover-mask').hide();
					$('.theme-popover').slideUp(200);
				})

				
			}); 							
										
									 
						
	</script>

	</body>
</html>