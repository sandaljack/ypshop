<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>管理员管理</title>
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
            
            <ol class="am-breadcrumb">
                <li><a href="" class="am-icon-home">管理员管理</a></li>
                <li class="am-active">管理员列表</li>    
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 管理员列表
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right"> 

                            <input class="input" type="text" name="seachName">
                                
                        </div>
                    </div>
                </div>
                <div>
                      <div class="am-u-lg-3 am-u-sm-9 am-u-md-5">
                        <div class="am-input-group">
                          <input type="text" id="seachName" class="am-form-field" name="seachName" placeholder="管理员名称">
                          <span class="am-input-group-btn">
                            <button id="seachNameBtn" class="am-btn am-btn-default" type="button"><span class="am-icon-search"></span></button>
                          </span>
                        </div>
                      </div>
                </div>
                </div>

                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                     <a href="/thinkphp_3.2.3_full/index.php/Admin/Adminuser/addAdminUser"><button type="button" class="am-btn am-btn-default am-btn-success am-btn-xs"><span class="am-icon-plus"></span> 新增</button></a>
                                    <a href="/thinkphp_3.2.3_full/index.php/Admin/Adminuser/index"><button type="button" class="am-btn am-btn-default am-btn-success am-btn-xs"><span class="am-icon-plus"></span>清空搜索条件</button></a>
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
                                            <th class="table-name">管理员名称</th>

                                            <th class="table-type">状态</th>

                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                                            <td class="rid"><?php echo ($v["id"]); ?></td>
                                            <td><?php echo ($v["username"]); ?></td>
                                            <td>
                                                <div class="tpl-switch">
                                                    <input type="checkbox" name="status" class="ios-switch bigswitch tpl-switch-btn " <?php echo ($v['status']==1?checked:''); ?> value="<?php echo ($v["status"]); ?>"/>
                                                    <div class="tpl-switch-btn-view changestatus" style="margin-top:-1px"> 
                                                        <div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary upadminuser" uid="<?php echo ($v["id"]); ?>"><span class="am-icon-pencil-square-o" ></span> 编辑</button>
                                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only deladminuser" uid="<?php echo ($v["id"]); ?>"><span class="am-icon-trash-o"></span> 删除</button>
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
        

        //获取状态是否启用
        $('.changestatus').each(function() {
            var that = $(this);
            $(this).click(function() {
                if ($(this).siblings('input[name="status"]').attr('value') == 0) {
                    $(this).siblings('input[name="status"]').val(1);
                } else  {
                    $(this).siblings('input[name="status"]').val(0);
                } 
                var status = $(this).siblings('input[name="status"]').val();
                var rid = that.parent().parent().siblings('.rid').html(); 
                $.post(
                    '<?php echo U("Admin/Adminuser/changestatus");?>',
                    {id:rid, status:status},
                    function (data) {

                    },
                    'json'
                );  
            });
        });

        //修改分页 按钮
        $('.current').wrap('<li></li>').parent().siblings().wrap('<li></li>').parent().parent().wrapInner('<ul class="am-pagination tpl-pagination"></ul>').wrapInner('<div class="am-fr"></div>').wrapInner('<div class="am-cf"></div>');

        //点击编辑
         $('.upadminuser').each(function() {
            $(this).click(function () {
                var id = $(this).attr('uid');
                location.href = '/thinkphp_3.2.3_full/index.php/Admin/Adminuser/upAdminuser/id/'+id;
            });
        });
       
        //点击删除
        $('.deladminuser').each(function() {
            var that = $(this);
            $(this).click(function () {
                var id = $(this).attr('uid');
                $.post(
                    '<?php echo U("Admin/Adminuser/delAdminuser");?>',
                    {id:id},
                    function (data) {
                        if (data == 1) {
                            that.parent().parent().parent().parent().remove();
                        } 
                    },
                    'json'
                );
            });

        });

        //按照名字搜索触发 ajax
        $('#seachNameBtn').click(function() {
            var name = $('#seachName').val();
            location.href = '/thinkphp_3.2.3_full/index.php/Admin/Adminuser/index/name/'+name;
        });
        </script>

    </body>    
</html>