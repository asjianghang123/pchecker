@extends("common.back")

@section('content')
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>用户列表</h5>
                <div class="ibox-tools">
                    <a href="/home/roles/create" class="btn btn-primary btn-xs">添加角色</a>
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

                            <th>角色名称</th>
                            <th>角色描述</th>
                            <th>添加时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $v)
                        <tr>
                            <td>{{$v['role_name']}}</td>
                            <td>{{$v['display_name']}}</td>
                            <td>{{$v['created_at']}}</td>
                            <td>
                                <a href="{{route('home.roles.permissions',['id' => $v['role_id']])}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 权限设置 </a>
                                <a href="{{route('home.roles.edit',['id' => $v['role_id']])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑权限 </a>
                                <a href="{{route('home.roles.del',['id' => $v['role_id']])}}" class="btn btn-white btn-sm">
                                    <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除
                                </a>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection