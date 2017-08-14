<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- title模块 -->
		<title>购物车</title>
		<!-- link模块 -->
		
	<link href="/thinkphp_3.2.3_full/Public/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
	<link href="/thinkphp_3.2.3_full/Public/basic/css/demo.css" rel="stylesheet" type="text/css" />
	<link href="/thinkphp_3.2.3_full/Public/css/cartstyle.css" rel="stylesheet" type="text/css" />
	<link href="/thinkphp_3.2.3_full/Public/css/optstyle.css" rel="stylesheet" type="text/css" />
	<!-- 加的 -->
	<link href="/thinkphp_3.2.3_full/Public/css/jsstyle.css" rel="stylesheet" type="text/css" />

        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/images/youpinsize.png">
		<!-- script模块 -->
		
	<!-- 加的 -->
	<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/js/address.js"></script>

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

			<!--购物车 -->
			<div class="am-g" >
                       <div class="am-u-sm-9 am-u-sm-centered" >

						<table class="am-table table-main"  width="960px" border="1" cellspacing="0" cellpadding="0" >
							<thead>
							  	<tr style="background:#f5f5f5"  height="50">
	
									<td></td>
									<td>商品信息</td>
									<td></td>
									<td></td>
									<td></td>
									<td>单价</td>
									<td>数量</td>
									<td>金额</td>
									<td>操作</td>
						    	</tr>
						    </thead>
						
							<tbody>
							<?php if(empty($list)): ?><tr><td colspan="5">哎呀，您的购物篮中还没有商品呢～<a href="<?php echo U('List/list');?>">快去购物吧！</a></td></tr><?php endif; ?>
							<?php if(is_array($list)): foreach($list as $k=>$v): ?><tr class="cartr" id="tr<?php echo ($k); ?>" gid="<?php echo ($v["goods_id"]); ?>" nums="<?php echo ($v["nums"]); ?>" color="<?php echo ($v["color"]); ?>" size="<?php echo ($v["size"]); ?>">
										<td class="goods_id" style="display:none"><?php echo ($v["goods_id"]); ?></td>
								        <td height="50"><input type="checkbox"  name="checkbox" id="checkbox<?php echo ($k); ?>"  /></td>
								        <td height="50" style=""><img src="/thinkphp_3.2.3_full/Public/<?php echo ($v["pic_path"]); ?>" class="" style="height:85px;"></td>
								        <td height="50" width="140px" style=""><?php echo ($v["goods_name"]); ?></td>
								        <td height="50" width="80">颜色:<?php echo ($v["color"]); ?></td>
								        <td height="50" width="80">尺码:<?php echo ($v["size"]); ?></td>
								        <td height="50" width="80" ><span class="price"><?php echo ($v["price"]); ?></span></td>
								        <td height="50" width="150"  class="data" style="position:relative">
								            <input class="min" name="" type="button" value="-" />
								            <input type="text" orinums="<?php echo ($v["nums"]); ?>" gid="<?php echo ($v["goods_id"]); ?>" color="<?php echo ($v["color"]); ?>" size="<?php echo ($v["size"]); ?>" store="<?php echo ($v["store"]); ?>" class="input_val" name="input_val" value="<?php echo ($v["nums"]); ?>" style="width:30px"/>
								            <input class="add" name="" type="button" value="+" />
								            <span class="jixian" style="color:red;top:45px;left:3px;display:none;position:absolute;height:0">已到库存极限</span>
								        </td>
								        <td height="50" width="100" ><div><span class="subPrice"><?php echo ($v['price'] * $v['nums']); ?></span></div></td>
								        <td height="50" width="100"  ><a class="delete"  href="javascript:;">删除</a></td>

								</tr><?php endforeach; endif; ?>
							</tbody>
						</table>
					
						<span width="84" height="30" align="center" style="margin:10px"><input type="checkbox" name="allcheckbox" id="allselect"/> 全选</span> <a id="deleteAll" href="javascript:;">删除</a>
						<div class="subTotal" style="float:right;margin-right:20px" >
						商品总价：（不含运费和优惠扣减）<span id="total">0.00</span>元</div>
						<br>
						 <?php if(empty($_SESSION['think']['homeInfo'])): ?><div class="control" style="float:right;margin-right:10px;margin-top:10px">
								<div class="tc-btn createAddr theme-login am-btn am-btn-danger">去结算</div>
							</div>
						<?php else: ?>
							<div class="" style="float:right;margin-right:10px;margin-top:10px">
								<div id="pay" class="tc-btn createAddr  am-btn am-btn-danger">去结算</div>
							</div><?php endif; ?>
						
					
			<!-- 登录模块 -->
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">您尚未登录</strong> <small></small></div>
				</div>
				<hr/><br />
				<div class="am-u-md-12">
					<font size="6px" style="margin:0px 150px">登录商城</font><br /><br /><br />
					<form class="am-form am-form-horizontal" action="<?php echo U('Login/doLogin', array('go'=>pay));?>" method="post">	
						<div class="am-form-group">
							<label for="user" class="am-form-label">用户名</label>
							<div class="am-form-content">
								<input type="text" name="name" id="user" placeholder="邮箱/手机/用户名">
							</div>
						</div>
						<div class="am-form-group">
							<label for="password" class="am-form-label">密码</label>
							<div class="am-form-content">
								<input type="password" name="pass" id="password" placeholder="请输入密码">
							</div>
						</div>
						<div class="am-form-group">
							<div class="am-form-content">
							<label for="remember-me"><input  name="rem" id="remember-me" type="checkbox">记住密码</label>
							<a href="<?php echo U('Login/forgetpass');?>" class="am-fr">忘记密码</a>
							<a href="<?php echo U('Register/register');?>" class="zcnext am-fr am-btn-default">注册</a>
							</div>
						</div>	
						<div class="am-form-group">
							<div class="am-u-sm-9 am-u-sm-push-3"><br />
								<button class="am-btn am-btn-danger" style="margin-left:20px">登录</button>
								<button id="cancel" type="button"class="am-btn am-btn-danger close">取消</button>
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
		$(function(){
		  //商品加减计算
		  $(".min").click(function(){
		    var t = $(this).siblings(".input_val");
		    var that = $(this);
		    if(t.val()<=1){
		      return false;
		    }
		    t.val(parseInt(t.val())-1);
		    setTotal();
		    getCount();
		   
		    	 //ajax更新数据库数据
			  	 $.post(
			  		'<?php echo U("delNum");?>',
			  		{id: t.attr('gid'), nums: t.attr("value"), color: t.attr('color'), size: t.attr('size')},
			  		function (data) {
			  			if (data ==1 ) {
			  				t.attr('orinums', t.val());
							that.siblings('.jixian').hide();
							t.attr('store', parseInt(t.attr('store'))+1); 
			  			}
						
			  		},
			  		'json'
			  	);
			  	
		   
		  });
		  $(".add").click(function(){
		    var t = $(this).siblings(".input_val");
		    t.val(parseInt(t.val())+1);
		    var that = $(this);
		    // setTotal();
		    // getCount();
		    //ajax更新数据库数据
		    $.post(
		  		'<?php echo U("addNum");?>',
		  		{id: t.attr('gid'), nums: t.attr("value"), color: t.attr('color'), size: t.attr('size')},
		  		function (data) {
		  			if (data == 1) {
		  				// t.val(parseInt(t.val())+1);
		  				t.attr('orinums', t.val());
						t.attr('store', parseInt(t.attr('store'))-1); 

		  				setTotal();
		    			getCount();
						that.siblings('.jixian').hide();
						
		  			} else {
						that.siblings('.jixian').show();	
		  				t.val(parseInt(t.val())-1);
						setTotal();
		    			getCount();
		  			}

		  		},
		  		'json'
		  		);
		  	});
		  })
		  //选中单个checkbox
		  $("table tbody input[name='checkbox']").click(function(){
		    setTotal();
		    getCount();
		  });
		  
		  //checkbox 全选反选
		  $("#allselect").click(function(){
		    var t = $("input[name='checkbox']");
		    if($(this).is(":checked")){
		      t.prop("checked",true);
		      setTotal();
		      getCount();
		    }else{
		      t.prop("checked",false);
		      setTotal();
		      getCount();
		    }

		  });
		  
		  //删除商品
		  var clickone = true;
		  $(".delete").click(function(){
		    if(clickone){
		      var _this = $(this).parents("tr"), 
		        s = _this.find(".subPrice").text();
		      if(!_this.find(":checkbox").is(":checked")){
		        alert("请选择一个要删除的商品");return false;
		      }
		      $("#total").text((parseInt($("#total").text()) - parseInt(s)).toFixed(2));
		      clickone = false;
		      _this.fadeOut(500,function(){
		        _this.remove();
		        clickone = true;
		      });
		      //ajax删除
		      $.post(
		  		'<?php echo U("delGoods");?>',
		  		{id: _this.attr('gid'), nums: _this.find('input[type="text"]').attr('value'), color: _this.attr('color'), size: _this.attr('size')},
		  		function (data) {
		  			
		  		},
		  		'json'
		  		);
		      	if ($('.delete').size() == 1) {
						$('tbody').html('<tr><td colspan="5">哎呀，您的购物车中还没有商品呢～<a href="list.php">快去购物吧！</a></td></tr>');
				}
		    }
		  });
		  

		$(".input_val").change(function() {
			 var this_val = $(this).val();
			 var that = $(this);
			 // setTotal();
		  //    getCount();
		  		if ((that.attr('store')-this_val) >= 0) {
		  			//ajax修改数量
					  $.post(
					  		'<?php echo U("changeNum");?>',
					  		{id: $(this).attr('gid'), nums: $(this).attr("value"), orinums:$(this).attr('orinums'), color: $(this).attr('color'), size: $(this).attr('size') },
					  		function (data) {
					  			if (data == 1) {
				  					setTotal();
				    				getCount();
									that.siblings('.jixian').hide();
									that.attr('store', parseInt(that.attr('store'))-parseInt(that.val())); 
									
					  			} else {
									that.siblings('.jixian').show();
									
					  			}
					  		},
					  		'json'
					  	);
					  //让原来的值等于现在的值
					  $(this).attr('orinums', $(this).attr("value"));
		  		} else {
		  			alert('该商品库存小于当前修改数量');
		  			$(this).val($(this).attr('orinums'));
		  		}
		      
			  
		});

		//单个商品总价
		function setTotal(){
		  var s = 0, tr = $("tr");
		  tr.each(function(index, element) { 
		    s = parseInt($(this).find("input[type='text']").val())*parseInt($(this).find(".price").text());
		    $(this).find(".subPrice").text(s.toFixed(2));
		    });
		}

		//总价
		function getCount(){
		  var count = 0;
		  $("input[name='checkbox']").each(function(){
		    if($(this).is(":checked")){
		      count+=parseInt($(this).parents("tr").find(".subPrice").text());
		    }
		    });
		  $("#total").text(count.toFixed(2));
		}
		setTotal();

		//清空多条购物车商品
		$('#deleteAll').click(function () { 
			var gid = '';
			var delgid = '';
			var nums = '';
			var color = '';
			var size = '';
			var select;
			$("input[name='checkbox']").each(function(){
				if($(this).is(":checked")){
					gid = $(this).parents("tr").attr('gid')+','+gid;
					nums = $(this).parent().siblings('.data').children('input[type="text"]').attr('value')+','+nums;
					color = $(this).parents("tr").attr('color')+','+color;
					size = $(this).parents("tr").attr('size')+','+size;
					select = 1;
				}
			});
			if (select == undefined) {
				alert('请选择需要删除的商品');
				return false;
			}    	
			console.log(color);
			var bool = confirm('确认删除选中的所有商品?');
			
			if (bool) {
				$.post(
					'<?php echo U("delAllGoods");?>',
					{id: gid, nums: nums, color:color, size:size},
					function (data) {	
						delgid = gid.split(',');
						for(var i=0;i<delgid.length-1; i++) {
							$('.goods_id').each(function () {
								if ($(this).html() == delgid[i]) {
									$(this).parents('tr').remove();
								}
							});
						}

							//清空后显示没有商品
							if ($('.cartr').size() < 1) {
							$('tbody').html('<tr><td colspan="5">哎呀，您的购物车中还没有商品呢～<a href="list.php">快去购物吧！</a></td></tr>');
							}
						
					},
					'json'
				);
				
			}
					
		});

		//结算按钮，判断是否登录，没登录跳到登录页面
			$('#pay').click(function () {
				if ($('.cartr').size() < 1) {
					if (confirm('您的购物车中还没有商品呢，点击确定去选购商品')) {
						location.href = "<?php echo U('Home/index');?>";
					}
				} else {
						$.post(
							'<?php echo U("isLogin");?>',
							{},
							function (data) {
								if (data == 1) {
									var gid = '';
									var color = '';
									var size = '';
									var bool;
									$("input[name='checkbox']").each(function(){
		    							if($(this).is(":checked")){
		    								bool = 1;
		    								gid = $(this).parents().siblings('.data').children("input[type='text']").attr('gid')+','+gid;
		    								color = $(this).parents("tr").attr('color')+','+color;
											size = $(this).parents("tr").attr('size')+','+size;
		    								location.href="/thinkphp_3.2.3_full/index.php/Home/Pay/payCarInfo/gid/"+gid+"/color/"+color+"/size/"+size+"."+"<?php echo (C("URL_HTML_SUFFIX")); ?>";
		    								
		    							} 
		    						});
									if (bool == undefined) {
										alert('请选择需要结算的商品');
									}    					
								} 

							},
							'json'
						);

				}	
			});

			//结算框里的取消按钮
			$('#cancel').click(function(){
				location.href = "<?php echo U('Shopcar/showcar');?>";
			});

			//退出登录
			$('#loginout').click(function () {
				$.post(
					'<?php echo U("Login/loginOut");?>',
					{},
					function (data) {
						if (data==1) {

						}
					},
					'json'
					);
			});
		</script>

	</body>
</html>