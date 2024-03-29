@extends("common.back")

@section("content")
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--360浏览器优先以webkit内核解析-->
    <title> - 主页示例</title>

    <link rel="shortcut icon" href="/favicon.ico"> <link href="{{asset('css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css?v=4.1.0')}}" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-4">
                    <div class="row row-sm text-center">
                        <div class="col-xs-6">
                            <div class="panel padder-v item">
                                <div class="h1 text-info font-thin h1">521</div>
                                <span class="text-muted text-xs">同比增长</span>
                                <div class="top text-right w-full">
                                    <i class="fa fa-caret-down text-warning m-r-sm"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="panel padder-v item bg-info">
                                <div class="h1 text-fff font-thin h1">521</div>
                                <span class="text-muted text-xs">今日访问</span>
                                <div class="top text-right w-full">
                                    <i class="fa fa-caret-down text-warning m-r-sm"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="panel padder-v item bg-primary">
                                <div class="h1 text-fff font-thin h1">521</div>
                                <span class="text-muted text-xs">销售数量</span>
                                <div class="top text-right w-full">
                                    <i class="fa fa-caret-down text-warning m-r-sm"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="panel padder-v item">
                                <div class="font-thin h1">$129</div>
                                <span class="text-muted text-xs">近日盈利</span>
                                <div class="bottom text-left">
                                    <i class="fa fa-caret-up text-warning m-l-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="border-bottom:none;background:#fff;">
                            <h5>服务器状态</h5>
                        </div>
                        <div class="ibox-content" style="border-top:none;">
                            <div id="flot-line-chart-moving" style="height:217px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9" style="padding-right:0;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="border-bottom:none;background:#fff;">
                            <h5>往年数据</h5>
                        </div>
                        <div class="ibox-content" style="border-top:none;">
                            <div id="yesterday" style="height:217px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3" style="padding-left:0;">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content" style="border-top:none;background-color:#e4eaec;">
                            <h5>新增玩家</h5>
                            <div class="progress progress-striped active">
                                <div style="width: 75%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" role="progressbar" class="progress-bar">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                            <h5>流失玩家</h5>
                            <div class="progress progress-striped active">
                                <div style="width: 75%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" role="progressbar" class="progress-bar progress-bar-warning">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                            <h5>新增玩家</h5>
                            <div class="progress progress-striped active">
                                <div style="width: 75%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" role="progressbar" class="progress-bar .progress-bar-danger">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                            <h5>新增玩家</h5>
                            <div class="progress progress-striped active">
                                <div style="width: 75%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" role="progressbar" class="progress-bar progress-bar-info">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="ibox float-e-margins">
                        <div class="" id="ibox-content">

                            <div id="vertical-timeline" class="vertical-container light-timeline">
                                <div class="vertical-timeline-block">
                                    <div class="vertical-timeline-icon navy-bg">
                                        <i class="fa fa-briefcase"></i>
                                    </div>

                                    <div class="vertical-timeline-content">
                                        <h2>会议</h2>
                                        <p>上一年的销售业绩发布会。总结产品营销和销售趋势及销售的现状。
                                        </p>
                                        <a href="#" class="btn btn-sm btn-primary"> 更多信息</a>
                                        <span class="vertical-date">
                                    今天 <br>
                                    <small>2月3日</small>
                                </span>
                                    </div>
                                </div>

                                <div class="vertical-timeline-block">
                                    <div class="vertical-timeline-icon blue-bg">
                                        <i class="fa fa-file-text"></i>
                                    </div>

                                    <div class="vertical-timeline-content">
                                        <h2>给张三发送文档</h2>
                                        <p>发送上年度《销售业绩报告》</p>
                                        <a href="#" class="btn btn-sm btn-success"> 下载文档 </a>
                                        <span class="vertical-date">
                                    今天 <br>
                                    <small>2月3日</small>
                                </span>
                                    </div>
                                </div>

                                <div class="vertical-timeline-block">
                                    <div class="vertical-timeline-icon lazur-bg">
                                        <i class="fa fa-coffee"></i>
                                    </div>

                                    <div class="vertical-timeline-content">
                                        <h2>喝咖啡休息</h2>
                                        <p>喝咖啡啦，啦啦啦~~</p>
                                        <a href="#" class="btn btn-sm btn-info">更多</a>
                                        <span class="vertical-date"> 昨天 <br><small>2月2日</small></span>
                                    </div>
                                </div>

                                <div class="vertical-timeline-block">
                                    <div class="vertical-timeline-icon yellow-bg">
                                        <i class="fa fa-phone"></i>
                                    </div>

                                    <div class="vertical-timeline-content">
                                        <h2>给李四打电话</h2>
                                        <p>给李四打电话分配本月工作任务</p>
                                        <span class="vertical-date">昨天 <br><small>2月2日</small></span>
                                    </div>
                                </div>

                                <div class="vertical-timeline-block">
                                    <div class="vertical-timeline-icon lazur-bg">
                                        <i class="fa fa-user-md"></i>
                                    </div>

                                    <div class="vertical-timeline-content">
                                        <h2>公司年会</h2>
                                        <p>发年终奖啦，啦啦啦~~</p>
                                        <span class="vertical-date">前天 <br><small>2月1日</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>所有项目</h5>
                            <div class="ibox-tools">
                                <a href="projects.html" class="btn btn-primary btn-xs">创建新项目</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-1">
                                    <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> 刷新</button>
                                </div>
                                <div class="col-md-11">
                                    <div class="input-group">
                                        <input type="text" placeholder="请输入项目名称" class="input-sm form-control"> <span class="input-group-btn">
                                                <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="project-list">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td class="project-status">
                                                    <span class="label label-primary">进行中
                                                </span></td>
                                        <td class="project-title">
                                            <a href="project_detail.html">LIKE－一款能够让用户快速获得认同感的兴趣社交应用</a>
                                            <br>
                                            <small>创建于 2014.08.15</small>
                                        </td>
                                        <td class="project-completion">
                                            <small>当前进度： 48%</small>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </td>
                                        <td class="project-people">
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                        </td>
                                        <td class="project-actions">
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 查看 </a>
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="project-status">
                                                    <span class="label label-primary">进行中
                                                </span></td>
                                        <td class="project-title">
                                            <a href="project_detail.html">米莫说｜MiMO Show</a>
                                            <br>
                                            <small>创建于 2014.08.15</small>
                                        </td>
                                        <td class="project-completion">
                                            <small>当前进度： 28%</small>
                                            <div class="progress progress-mini">
                                                <div style="width: 28%;" class="progress-bar"></div>
                                            </div>
                                        </td>
                                        <td class="project-people">
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a7.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a6.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                        </td>
                                        <td class="project-actions">
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 查看 </a>
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="project-status">
                                                    <span class="label label-default">已取消
                                                </span></td>
                                        <td class="project-title">
                                            <a href="project_detail.html">商家与购物用户的交互试衣应用</a>
                                            <br>
                                            <small>创建于 2014.08.15</small>
                                        </td>
                                        <td class="project-completion">
                                            <small>当前进度： 8%</small>
                                            <div class="progress progress-mini">
                                                <div style="width: 8%;" class="progress-bar"></div>
                                            </div>
                                        </td>
                                        <td class="project-people">
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                        </td>
                                        <td class="project-actions">
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 查看 </a>
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="project-status">
                                                    <span class="label label-primary">进行中
                                                </span></td>
                                        <td class="project-title">
                                            <a href="project_detail.html">天狼---智能硬件项目</a>
                                            <br>
                                            <small>创建于 2014.08.15</small>
                                        </td>
                                        <td class="project-completion">
                                            <small>当前进度： 83%</small>
                                            <div class="progress progress-mini">
                                                <div style="width: 83%;" class="progress-bar"></div>
                                            </div>
                                        </td>
                                        <td class="project-people">
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a7.jpg"></a>
                                        </td>
                                        <td class="project-actions">
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 查看 </a>
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="project-status">
                                                    <span class="label label-primary">进行中
                                                </span></td>
                                        <td class="project-title">
                                            <a href="project_detail.html">乐活未来</a>
                                            <br>
                                            <small>创建于 2014.08.15</small>
                                        </td>
                                        <td class="project-completion">
                                            <small>当前进度： 97%</small>
                                            <div class="progress progress-mini">
                                                <div style="width: 97%;" class="progress-bar"></div>
                                            </div>
                                        </td>
                                        <td class="project-people">
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                        </td>
                                        <td class="project-actions">
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 查看 </a>
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="project-status">
                                                    <span class="label label-primary">进行中
                                                </span></td>
                                        <td class="project-title">
                                            <a href="project_detail.html">【私人医生项目】</a>
                                            <br>
                                            <small>创建于 2014.08.15</small>
                                        </td>
                                        <td class="project-completion">
                                            <small>当前进度： 48%</small>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </td>
                                        <td class="project-people">
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                        </td>
                                        <td class="project-actions">
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 查看 </a>
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="project-status">
                                                    <span class="label label-primary">进行中
                                                </span></td>
                                        <td class="project-title">
                                            <a href="project_detail.html">快狗家居</a>
                                            <br>
                                            <small>创建于 2014.08.15</small>
                                        </td>
                                        <td class="project-completion">
                                            <small>当前进度： 28%</small>
                                            <div class="progress progress-mini">
                                                <div style="width: 28%;" class="progress-bar"></div>
                                            </div>
                                        </td>
                                        <td class="project-people">
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a7.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a6.jpg"></a>
                                            <a href="projects.html"><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                        </td>
                                        <td class="project-actions">
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 查看 </a>
                                            <a href="projects.html#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>任务列表</h5>
                </div>
                <div class="ibox-content">
                    <ul class="todo-list m-t small-list ui-sortable">
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-check-square"></i> </a>
                            <span class="m-l-xs todo-completed">吃饭</span>

                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-check-square"></i> </a>
                            <span class="m-l-xs  todo-completed">多吃饭</span>

                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                        <li>
                            <a href="widgets.html#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">睡觉</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1小时</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 全局js -->
<script src="{{asset('/js/jquery.min.js?v=2.1.4')}}"></script>
<script src="{{asset('/js/bootstrap.min.js?v=3.3.6')}}"></script>
<script src="{{asset('/js/plugins/layer/layer.min.js')}}"></script>
<!-- Flot -->
<script src="{{asset('/js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('/js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('/js/plugins/flot/jquery.flot.pie.js')}}"></script>
<!-- 自定义js -->
<script src="{{asset('/js/content.js')}}"></script>
<!--flotdemo-->

</body>

</html>
@endsection
