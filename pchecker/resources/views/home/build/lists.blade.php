@extends("common.back")

@section('content')
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>楼栋列表</h5>
                <div class="ibox-tools">
                    <a href="#" class="btn btn-primary btn-xs">添加楼栋</a>
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

                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                        <thead>
                        <tr>

                            <th>楼栋编号</th>
                            <th>楼栋名称</th>
                            <th>状态</th>
                            <th>预计工作量</th>
                            <th>难度</th>
                            <th>类型</th>
                            <th>管理员</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td><button class="btn btn-sm btn-primary">进行中</button></td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>

                                <a href="" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑楼栋 </a>
                                <a href="" class="btn btn-white btn-sm">
                                    <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除
                                </a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection