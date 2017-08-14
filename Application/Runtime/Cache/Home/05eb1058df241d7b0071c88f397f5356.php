<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>地址修改</title>
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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址修改</strong> / <small>editAddress&nbsp;list</small></div>
						</div>
						<hr/>
						
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">修改地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" >
										<input type="hidden" id="aid" name="id" value="<?php echo ($data["id"]); ?>">
										<input type="hidden" id="url" name="url" value="<?php echo ($url); ?>">
										<div class="am-form-group">
											<label for="buyname" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="buyname" placeholder="收货人" name="name" value="<?php echo ($data["add_name"]); ?>">
											</div>
										</div>

										<div class="am-form-group">
											<label for="buyphone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="buyphone" placeholder="手机号必填" type="text" value="<?php echo ($data["add_phone"]); ?>" name="phone">
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
												<textarea name="detail" id="addDetail" class="" rows="3"  placeholder="输入详细地址" value="<?php echo ($data["add_detail"]); ?>"><?php echo ($data["add_detail"]); ?></textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<a id="upAdd" class="am-btn am-btn-danger">保存</a>
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
				 <a class="url" href="http://<?php echo ($v["furl"]); ?>" url="<?php echo ($v["furl"]); ?>"><?php echo ($v["fname"]); ?></a><?php endforeach; endif; ?>
				
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
	</script>
	<script>
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

			//点击保存地址
		$('#upAdd').click(function() {
				var id = $('#aid').attr('value');
				var province = $('#province').children(':selected').html();
				var city = $('#city').children(':selected').html();
				var county = $('#county').children(':selected').html();
				var town = $('#town').children(':selected').html();
				var buyname = $('#buyname').val();
				var buyphone = $('#buyphone').val();
				var detail = $('#addDetail').val();
				var preg =  /^1[34578]{1}\d{9}$/;
				console.log(detail);
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
							'<?php echo U("Address/editAddress");?>',
							{id:id, buyname:buyname, buyphone:buyphone, province:province, city:city, county:county, town:town, detail:detail },
							function (data) {
								if (data == 1) {
									alert('修改成功');
									location.href = "/thinkphp_3.2.3_full/index.php/Home/Address/showAddress"+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
								} else {
									alert('修改失败');
								}
							},
							'json'

						);

					}
			});
	</script>

	</body>
</html>