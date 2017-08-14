<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>商品库存模块</title>
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
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li><a href="#">商品管理</a></li>
                <li><a href="#">商品信息</a></li>
                <li class="am-active">添加库存</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span>添加库存
                        <span></span>
                    </div>
                    <div class="am-u-sm-9 am-u-sm-push-9">
                        <a href="/thinkphp_3.2.3_full/index.php/Admin/Goodstore/showstore/id/<?php echo ($goodId); ?>"><button class="am-btn am-btn-primary tpl-btn-bg-color-success ">返回
                        </button></a>
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right"></div>
                        </div>
                    </div>
                </div>

                <div class="tpl-block">

                    <div class="am-g tpl-amazeui-form">
                        <div class="tpl-form-body tpl-form-line">
                            <!--添加商品表单 -->
                            <form class="am-form am-form-horizontal" method="post" action="<?php echo U('addstore');?>" enctype="multipart/form-data">
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">商品名字</label>
                                    <div class="am-u-sm-5 am-u-end">
                                        <span><?php echo ($goodName['goods_name']); ?></span>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">库存</label>
                                    <div class="am-u-sm-5 am-u-end">
                                        <input type="text" name="store" id="user-name" placeholder="请输入库存数量">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">尺码</label>
                                    <div class="am-u-sm-5 am-u-end">
                                        <input type="text" name="size" id="user-name" placeholder="请输入商品的尺码">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">颜色</label>
                                    <div class="am-u-sm-5 am-u-end">
                                        <input type="text" name="color" id="user-name" placeholder="请输入产品的颜色">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">价格</label>
                                    <div class="am-u-sm-5 am-u-end">
                                        <input type="text" name="price" id="user-name" placeholder="请输入商品的价格">
                                    </div>
                                </div>
                                <input type="hidden" name="goodId" value="<?php echo ($goodId); ?>" id="user-name">
                                <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label"></label>
                                    <div class="am-u-sm-5 am-u-end">
                                        <textarea disabled="" class="" rows="5" id="user-intro" ></textarea>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

       
        <!-- js模块 -->
        
    <script src="/thinkphp_3.2.3_full/Public/js/echarts.min.js"></script>
    <script src="/thinkphp_3.2.3_full/Public/js/jquery.min.js"></script>
    <script src="/thinkphp_3.2.3_full/Public/js/amazeui.min.js"></script>
    <script src="/thinkphp_3.2.3_full/Public/js/iscroll.js"></script>
    <script src="/thinkphp_3.2.3_full/Public/js/app.js"></script>

    </body>    
</html>