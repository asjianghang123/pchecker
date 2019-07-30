@extends("common.back")

@section("content")
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>添加用户</h3>
                </div>

                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{url('home/users/doCreate')}}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户角色:</label>

                            <div class="col-sm-2">
                                <select name="role_id" id="" class="form-control">
                                    @foreach($list as $v)
                                    <option value="{{$v['role_id']}}">{{$v['role_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户名:</label>

                            <div class="col-sm-2">
                                <input type="text" placeholder="输入用户名" class="form-control" name="user_name">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">邮箱:</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="输入邮箱" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">手机号:</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="输入手机号" class="form-control" name="telephone">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">密码:</label>

                            <div class="col-sm-2">
                                <input type="password" placeholder="输入密码" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">头像:</label>

                            <div class="col-sm-2">
                                <input type="file" placeholder="用户头像" name="avatar">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户状态:</label>

                            <div class="col-sm-2">
                                <div class="radio"><label><input type="radio" name="status" value="1" checked> 启用</label></div>
                                <div class="radio"><label><input type="radio" name="status" value="2" >禁用</label></div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否管理员:</label>

                            <div class="col-sm-2">
                                <div class="radio"><label><input type="radio" name="status" value="2" checked> 否</label></div>
                                <div class="radio"><label><input type="radio" name="status" value="1" >是</label></div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">添加用户</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- 全局js -->
<script src="/js/jquery.min.js?v=2.1.4"></script>
<script src="/js/bootstrap.min.js?v=3.3.6"></script>

<!-- 自定义js -->
<script src="/js/content.js?v=1.0.0"></script>

<!-- iCheck -->
<script src="/js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
@endsection
