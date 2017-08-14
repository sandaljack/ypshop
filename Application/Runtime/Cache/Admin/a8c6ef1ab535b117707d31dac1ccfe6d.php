<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>订单详情</title>
        <meta name="description" content="这是一个 index 页面">
        <meta name="keywords" content="index">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="icon" type="image/png" href="/thinkphp_3.2.3_full/Public/i/favicon.png">
        <link rel="apple-touch-icon-precomposed" href="/thinkphp_3.2.3_full/Public/i/app-icon72x72@2x.png">
        <meta name="apple-mobile-web-app-title" content="Amaze UI" />
        <link rel="stylesheet" href="/thinkphp_3.2.3_full/Public/css/amazeui.min.css" />
        <link rel="stylesheet" href="/thinkphp_3.2.3_full/Public/css/admin.css">
        <link rel="stylesheet" href="/thinkphp_3.2.3_full/Public/css/app.css">
        
        <style>
            .b-page {
                background:#fff;
                box-shadow:0 1px 2px 0 #e2e2e2
            }
            .b-page .page {
                width:100%;
                padding:30px 15px;
                background:#fff;
                text-align:center;
                overflow:hidden
            }
            .b-page .page .first,.b-page .page .prev,.b-page .page .current,.b-page .page .num,.b-page .page .current,.b-page .page .next,.b-page .page .end {
                padding:6px 13px;
                margin:0 3px;
                display:inline-block;
                color:#008cba;
                border:1px solid #f2f2f2;
                border-radius:2px
            }
            .b-page .page .first:hover,.b-page .page .prev:hover,.b-page .page .current:hover,.b-page .page .num:hover,.b-page .page .current:hover,.b-page .page .next:hover,.b-page .page .end:hover {
                text-decoration:none;
                background:#f8f5f5
            }
            .b-page .page .current {
                background-color:#008cba;
                color:#fff;
                border-radius:2px;
                border:1px solid #008cba
            }
            .b-page .page .current:hover {
                text-decoration:none;
                background:#008cba
            }
        </style>
    </head>

<body data-type="index">

    
    <header class="am-topbar am-topbar-inverse admin-header">
        <div class="am-topbar-brand">
            <a href="javascript:;" class="tpl-logo">
                <img src="/thinkphp_3.2.3_full/Public/img/logo.png" alt="">
            </a>
        </div>
        <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

        </div>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
                <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                    
                    
                </li>
                
                
                <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
                <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                    <a class="am-dropdown-toggle tpl-header-list-link" href="javascript:;">
                        <span class="tpl-header-list-user-nick"><?php echo ($session["username"]); ?></span><span class="tpl-header-list-user-ico"> <img src="/thinkphp_3.2.3_full/Public/img/user01.png"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="#"><span class="am-icon-bell-o"></span> 资料</a></li>
                        <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                        <li><a href="<?php echo U('Login/doLogout');?>"><span class="am-icon-power-off"></span> 退出</a></li>
                    </ul>
                </li>
                <li><a href="###" class="tpl-header-list-link"><span class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a></li>
            </ul>
        </div>
    </header>

    

    <!-- 左边导航 -->
    
    <div class="tpl-page-container tpl-page-header-fixed">
        <div class="tpl-left-nav tpl-left-nav-hover">
            <div class="tpl-left-nav-title">
                后台列表
            </div>
            <div class="tpl-left-nav-list">
                <ul class="tpl-left-nav-menu">
                    <li class="tpl-left-nav-item">
                        <a href="<?php echo U('Index/index');?>" class="nav-link">
                            <i class="am-icon-home"></i>
                            <span>首页</span>
                        </a>
                    </li>
                    <li class="tpl-left-nav-item">
                         <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-table"></i>
                            <span>用户管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>
                                <a href="<?php echo U('Admin/User/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>用户列表</span>
                                </a>
                                <a href="<?php echo U('Admin/User/addUser');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>用户添加</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-table"></i>
                            <span>分类管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>
                                <a href="<?php echo U('Admin/Classify/showClassify');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>分类列表</span>
                                </a>
                                <a href="<?php echo U('Admin/Classify/addClassify');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>添加分类</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-wpforms"></i>
                            <span>商品管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>
                                <a href="<?php echo U('Admin/Showgoods/showgood');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>商品列表</span>
                                </a>
                                <a href="<?php echo U('Admin/Addgoods/addGood');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>商品添加</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-wpforms"></i>
                            <span>订单管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>
                                <a href="<?php echo U('Admin/Orders/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>订单列表</span>
                                </a>
                                <a href="<?php echo U('Admin/Comment/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>评价管理</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-wpforms"></i>
                            <span>广告管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>
                                <a href="<?php echo U('Admin/Advertises/index');?>" >
                                    <i class="am-icon-angle-right"></i>
                                    <span>轮播图管理</span>
                                </a>
                                <a href="<?php echo U('Admin/Friendlink/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>友情链接管理</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-wpforms"></i>
                            <span>权限管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>
                                <a href="<?php echo U('Admin/Authgroup/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>角色管理</span>
                                </a>
                                <a href="<?php echo U('Admin/Authrule/index');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>权限列表</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tpl-left-nav-item">
                        <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-wpforms"></i>
                            <span>管理员管理</span>
                            <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
                        </a>
                        <ul class="tpl-left-nav-sub-menu">
                            <li>
                                <a href="<?php echo U('Admin/Adminuser/index');?>" >
                                    <i class="am-icon-angle-right"></i>
                                    <span>管理员列表</span>
                                </a>
                                <a href="<?php echo U('Admin/Adminuser/addAdminuser');?>">
                                    <i class="am-icon-angle-right"></i>
                                    <span>管理员添加</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="tpl-left-nav-item">
                        <a href="<?php echo U('Admin/Login/login');?>" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-key"></i>
                            <span>登录</span>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
        

        <!-- 内容模块 -->
        
        <div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
            </div>
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li><a href="#">订单管理</a></li>
                <li class="am-active">订单详情</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 订单详情
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right">
                               <button id="back" class="am-btn am-btn-primary" style="margin-left:20px">返回</button> 
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    订单编号: <?php echo ($orders["orders_num"]); ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="tpl-table-images">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-4">
                                <div class="tpl-table-images-content">
                                    <div class="tpl-table-images-content-i-time">

                                    下单时间：<?php echo ($orders["addtime"]); ?>  </div>
                                    <div class="tpl-i-title">
                                        收货信息：<br>
                                          收货人：<?php echo ($address["buyname"]); ?> <br>
                                          手机：<?php echo ($address["phone"]); ?> <br>
                                          地址： <?php echo ($address["province"]); ?> <?php echo ($address["city"]); ?> <?php echo ($address["area"]); ?> <?php echo ($address["town"]); ?> <?php echo ($address["detail"]); ?>
                                    </div>
                                    <a href="javascript:;" class="tpl-table-images-content-i">
                                        <div class="tpl-table-images-content-i-info">
                                            <span class="ico">
                                   
                                 </span>

                                        </div>
                                        <span class="tpl-table-images-content-i-shadow"></span>
                                        
                                    </a>
                                    <div class="tpl-table-images-content-block">
                                        <div class="tpl-i-font">

                                        </div>
                                        <div class="tpl-i-more">
                                            <ul>
                                                <li><span class=" am-text-warning">留言：<?php echo ($orders["buymsg"]); ?></span></li>

                                            </ul>
                                        </div>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs tpl-edit-content-btn">
                                                <?php if($orders['status'] == 1 ): ?><button type="button" class="am-btn am-btn-default am-btn-danger">未付款</button><?php endif; ?>
                                                <?php if($orders['status'] == 2 ): ?><button type="button" class="am-btn am-btn-default am-btn-warning">已付款</button><?php endif; ?>
                                                <?php if($orders['status'] == 3 ): ?><button type="button" class="am-btn am-btn-default am-btn-secondary">已发货</button><?php endif; ?>
                                                <?php if($orders['status'] == 4 ): ?><button type="button" class="am-btn am-btn-default am-btn-success">交易完成</button><?php endif; ?>
                                                <?php if($orders['status'] == 6 ): ?><button type="button" class="am-btn am-btn-default am-btn-success">交易完成</button><?php endif; ?>
                                                <?php if($orders['status'] == 5 ): ?><button type="button" class="am-btn am-btn-default am-btn-danger">取消交易</button><?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                    <div class="am-g">
                        <div class="am-u-sm-12">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <th class="table-id">ID</th>
                                            <th class="table-name">商品图片</th>

                                            <th class="table-name">商品信息</th>
                                            <th>颜色</th>
                                            <th>尺寸</th>
                                            <th class="table-name">单价</th>
                                            
                                            <th class="table-date am-hide-sm-only">数量</th>

                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><tr>
                                            <td><?php echo ($v["goods_id"]); ?></td>
                                            <td><img src="/thinkphp_3.2.3_full/Public/<?php echo ($v["pic_path"]); ?>" style="width:80px;height:80px" alt=""></td>
                                            <td class="am-hide-sm-only"><?php echo ($v["goods_name"]); ?></td>
                                            <td><?php echo ($v["color"]); ?></td>
                                            <td><?php echo ($v["size"]); ?></td>
                                            <td><?php echo ($v["price"]); ?></td>
                                            <td><?php echo ($v["buynum"]); ?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only deluser" uid="<?php echo ($v["id"]); ?>" gid="<?php echo ($group["id"]); ?>"><span class="am-icon-trash-o"></span> 删除</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr><?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                                <?php echo ($page); ?>
                                <hr>
                        </div>

                    </div>
                </div>
                <div class="tpl-alert"></div>
            </div>
        </div>
    </div>

       
        <!-- js模块 -->
        
    <script src="/thinkphp_3.2.3_full/Public/js/jquery.min.js"></script>
    <script src="/thinkphp_3.2.3_full/Public/js/amazeui.min.js"></script>
    <script src="/thinkphp_3.2.3_full/Public/js/app.js"></script>
    <script>

        //显示分页
        $('.current').wrap('<li></li>').parent().siblings().wrap('<li></li>').parent().parent().wrapInner('<ul class="am-pagination tpl-pagination"></ul>').wrapInner('<div class="am-fr"></div>').wrapInner('<div class="am-cf"></div>');
         //点击返回
        $('#back').click(function() {
            location.href = '/thinkphp_3.2.3_full/index.php/Admin/Orders/index';
        });

    </script>

    </body>    
</html>