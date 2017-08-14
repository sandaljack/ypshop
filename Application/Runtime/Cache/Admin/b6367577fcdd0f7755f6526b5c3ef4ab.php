<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>商品管理</title>
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
        
        <?php $page = ($_GET['p']);?>
        <div class="tpl-content-wrapper">
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li><a href="#">商品管理</a></li>
                <li class="am-active">商品信息</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span>商品信息
                    </div>
                    <div class="tpl-portlet-input tpl-fz-ml">
                        <div class="portlet-input input-small input-inline">
                            <div class="input-icon right"></div>
                        </div>
                    </div>
                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-5">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="/thinkphp_3.2.3_full/index.php/Admin/Addgoods/addgood"><button type="button" class="am-btn am-btn-default am-btn-success am-btn-xs"><span class="am-icon-plus"></span> 新增</button></a>
                                    <a href="/thinkphp_3.2.3_full/index.php/Admin/Showgoods/showgood"><button type="button" class="am-btn am-btn-default am-btn-success am-btn-xs"><span class="am-icon-plus"></span>清空搜索条件</button></a>
                                </div>
                            </div>
                        </div>
                        <form method="get" action="<?php echo U('Showgoods/showgood');?>">
                            <div class="am-u-sm-12 am-u-md-2">
                                <div id="firstsort" class="am-form-group">
                                    <select value="<?php echo ($postData['firstsortId']); ?>" name="firstsortId" class="firstsortId">
                                        <option value="0">一级分类</option>
                                        <?php if(is_array($firstsortData)): foreach($firstsortData as $key=>$v): ?><option <?=@$postData['firstsortId'] == $v['id']?'selected':''?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div> 
                            </div>
                            <div style="margin-left:-20px" class="am-u-sm-12 am-u-md-2">
                                <div id="secondsort" class="am-form-group">
                                    <select value="<?php echo ($postData['secondsortId']); ?>" name="secondsortId" class="secondsortId">
                                        <option value="0">二级分类</option>
                                    </select>
                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-3">
                                <div class="am-input-group am-input-group-sm">
                                    <input type="text" name="searchData" value="<?php echo ($postData['searchData']); ?>" placeholder="请输入要搜索的关键字" class="am-form-field">
                                    <span class="am-input-group-btn">
                                        <button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search"></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                
                    <div id="goodsDiv" class="am-g">
                        <div id="myDiv" class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr class="am-text-center">
                                            <th class="am-text-center">ID</th>
                                            <th class="table-title am-text-center">商品图片</th>
                                            <th class="table-type am-text-center">商品名字</th>
                                            <th class="table-author am-text-center">状态</th>
                                            <th class="table-date am-text-center">购买量</th>
                                            <th class="table-date am-text-center">点击量</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mytbody">                                      
                                        <?php if(is_array($goodsData)): foreach($goodsData as $key=>$v): ?><tr class="am-text-center">
                                                <td class="table-id"><?php echo ($v["id"]); ?></td>
                                                <td><img src="/thinkphp_3.2.3_full/Public/<?php echo ($v["pic_path"]); ?>" width="50"></td>
                                                <td class="am-hide-sm-only" title="<?php echo ($v["goods_name"]); ?>"><?php echo (subtext($v["goods_name"],8)); ?></td>
                                                <td class="am-hide-sm-only myselect">
                                                    <select num="<?php echo ($v["id"]); ?>">
                                                      <option <?=$v['goods_status']==0?'selected':''?> value="0">已下架</option>
                                                      <option <?=$v['goods_status']==1?'selected':''?> value="1">已上架</option>
                                                      <option <?=$v['goods_status']==2?'selected':''?> value="2">在售中</option>
                                                    </select>
                                                </td>
                                                <td class="am-hide-sm-only"><?php echo ($v["buynum"]); ?></td>
                                                <td class="am-hide-sm-only"><?php echo ($v["clicknum"]); ?></td>
                                                <td>
                                                    <div class="am-btn-toolbar">
                                                        <div class="am-btn-group am-btn-group-xs">
                                                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><a href='/thinkphp_3.2.3_full/index.php/Admin/Changegoods/changeGood/id/<?php echo ($v["id"]); ?>/page/<?php echo ($page); ?>'><span class="am-icon-pencil-square-o"></span>修改商品信息</a></button>
                                                            <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><a href='/thinkphp_3.2.3_full/index.php/Admin/Goodstore/showstore/id/<?php echo ($v["id"]); ?>'><span class="am-icon-copy"></span>库存信息</a></button>
                                                            <button num="<?php echo ($v["id"]); ?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only myDelete"><a href="javascript:;">删除</a></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr><?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                                </form>
                                <div class="am-cf">
                                    <div class="col-xs-12 col-md-12 col-lg-12 b-page"> <?php echo ($btn); ?></div>
                                </div>
                            <hr>
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
    <script>

        //每当#selected里的.firstsort下拉框数值发生变化时，触发下面的JS代码
        $('#firstsort').on('change', '.firstsortId', function () {

            //拿到一级分类下拉框的值
            var firstsortId = $(this).val();

            //然后根据一级分类下拉框的值用ajax查询二级分类的字段
            $.post(

                '/thinkphp_3.2.3_full/index.php/Admin/Showgoods/secondSort',

                {id: firstsortId},

                function (data) {

                    var str = '<select name="secondsortId" class="secondsortId"><option value="0">二级类别</option>';

                    for (var i = 0; i < data.length; i++) {

                    str += '<option value="'+ data[i].id +'">'+ data[i].name +'</option>';

                    }   
                    str += '</select>';

                    //先清除.firstsortId后面的所有select
                    $('.secondsortId').remove();
                    // console.log($('.firstsortId'));

                    $('#secondsort').append(str);
                },
                'json'
            );

        });

        $('.am-text-center').on('change', '.myselect select', function () {

            var that = $(this);

            var status = that.val();

            var goodId = that.attr('num');

            $.post(

                '/thinkphp_3.2.3_full/index.php/Admin/Showgoods/changeStatus',

                {id: goodId, statu: status},

                function (data) {

                    alert(data['msg']);

                },

                'json'
            );
        });

        //通过ajax删除商品信息
        $('.myDelete').on('click', function ()
        {
            var msg = '你确定要删除这条商品信息么';
            
            //点击删除按钮时，弹出一个是否确定删除的弹窗
            if (confirm(msg) == true) {

                var goodid = $(this).attr('num');

                var that = $(this);

                $.post(

                    '/thinkphp_3.2.3_full/index.php/Admin/Showgoods/goodsDelete',

                    {id: goodid},

                    function (data) {

                        if (data == 1) {

                            alert('删除成功');

                            that.parent().parent().parent().parent().remove();

                        } else {

                            alert('删除失败');
                        }
                    },

                    'json'
                );

            }    

        });

        //显示分页
        $('.current').wrap('<li></li>').parent().siblings().wrap('<li></li>').parent().parent().wrapInner('<ul class="am-pagination tpl-pagination"></ul>').wrapInner('<div class="am-fr"></div>').wrapInner('<div class="am-cf"></div>');
    </script>

    </body>    
</html>