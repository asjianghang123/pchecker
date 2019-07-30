<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> PChecker</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="/favicon.ico"> <link href="/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">

<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">PChecker</strong>
                                    </span>
                                </span>
                        </a>
                    </div>
                    <div class="logo-element">PChecker
                    </div>
                </li>
                <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                    <span class="ng-scope">总览</span>
                </li>
                <li>
                    <a class="J_menuItem" href="/home/back">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">主页</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa fa-bar-chart-o"></i>
                        <span class="nav-label">政策规范发布</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="#">政策</a>
                        </li>
                    </ul>
                </li>
                <li class="line dk"></li>
                <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                    <span class="ng-scope">装配式建筑指标评审</span>
                </li>
                <li>
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">项目</span><span class="label label-warning pull-right">16</span></a>
                    <ul class="nav nav-second-level">
                        <li><a class="J_menuItem" href="{{route('home.projects.lists')}}">项目管理</a>
                        </li>
                        <li><a class="J_menuItem" href="#">楼栋管理</a>
                        </li>
                        <li><a class="J_menuItem" href="#">指标计算</a>
                        </li>
                        <li><a class="J_menuItem" href="mailbox.html">计算书</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">评审</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a class="J_menuItem" href="#">评审清单</a>
                        </li>
                        <li><a class="J_menuItem" href="#">进行评审</a>
                        </li>
                    </ul>
                </li>

                @if($isSuper == 1)
                <li class="line dk"></li>
                <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                    <span class="ng-scope">系统设置（管理员可见）</span>
                </li>
                <li>
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">用户管理</span></a>
                    <ul class="nav nav-second-level">
                        <li><a class="J_menuItem" href="{{route('home.users.lists')}}">用户列表</a>
                        </li>
                        <li><a class="J_menuItem" href="{{route('home.permissions.lists')}}">权限管理</a>
                        </li>
                        <li><a class="J_menuItem" href="{{route('home.roles.lists')}}">角色管理</a>
                        </li>
                        <li><a class="J_menuItem" href="">字典设置</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">企业管理</span></a>
                    <ul class="nav nav-second-level">
                        <li><a class="J_menuItem" href="{{url('/home/users/lists')}}">企业列表</a>
                        </li>
                        <li><a class="J_menuItem" href="">客户列表</a>
                        </li>                       
                    </ul>
                </li>
                @endif

            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <a href="/home/logout" class="btn btn-primary btn-xs">点击此处暂时型的退出</a>

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="/home/logout">
                            <i class="fa fa-envelope"></i> <span class="label label-warning">退出</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li class="m-t-xs">
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        @if($avatar == null)
                                            <img alt="image" class="img-circle" src="/img/a7.jpg">
                                        @else
                                            <img alt="image" class="img-circle" src="{{$avatar}}">
                                        @endif
                                    </a>
                                    <div class="media-body">
                                        <h3><p>用户名：</p></h3>
                                        <p>{{$user_name}}</p>
                                        <h3><p>邮箱：</p></h3>
                                        <p>{{$email}}</p>
                                    </div>
                                </div>
                            </li>

                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a class="J_menuItem" href="/home/logout">
                                        <strong>退出 </strong>

                                    </a>
                                </div>

                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                        <span class="pull-right text-muted small">4分钟前</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-qq fa-fw"></i> 3条新回复
                                        <span class="pull-right text-muted small">12分钟钱</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a class="J_menuItem" href="notifications.html">
                                        <strong>查看所有 </strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

            @yield('content')

    </div>
    <!--右侧部分结束-->
</div>

<!-- 全局js -->
<script src="/js/jquery.min.js?v=2.1.4"></script>
<script src="/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/js/plugins/layer/layer.min.js"></script>

<!-- 自定义js -->
<script src="/js/hAdmin.js?v=4.1.0"></script>
<script type="text/javascript" src="/js/index.js"></script>

<!-- 第三方插件 -->
<script src="/js/plugins/pace/pace.min.js"></script>

</body>

</html>
