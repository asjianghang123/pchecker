@extends("common.back")

@section("content")
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h3>修改用户</h3>
                    </div>

                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{url('home/users/doEdit')}}" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <input type="hidden" name="user_id" value="{{$info['user_id']}}">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户角色:</label>

                                <div class="col-sm-2">
                                    <select name="role_id" id="" class="form-control">
                                        @foreach($list as $v)
                                            <option value="{{$v['role_id']}}"
                                            @if($role_id == $v['role_id']) selected @endif>{{$v['role_name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户名:</label>

                                <div class="col-sm-2">
                                    <input type="text" placeholder="输入用户名" class="form-control" name="user_name" value="{{$info['user_name']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">邮箱:</label>
                                <div class="col-sm-2">
                                    <input type="text" placeholder="输入邮箱" class="form-control" name="email" value="{{$info['email']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">手机号:</label>
                                <div class="col-sm-2">
                                    <input type="text" placeholder="输入手机号" class="form-control" name="telephone" value="{{$info['telephone']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">头像:</label>

                                <div class="col-sm-2">
                                    <input type="file" placeholder="用户头像" name="avatar">
                                    @if(!empty($info['avatar']))
                                        <img alt="image" class="img-circle" src="{{$info['avatar']}}" style="width: 40px;height: 40px;">
                                    @endif
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">用户状态:</label>

                                <div class="col-sm-2">
                                    <div class="radio"><label><input type="radio" name="status" value="1"
                                    @if($info['status'] == 1) checked @endif> 启用</label></div>
                                    <div class="radio"><label><input type="radio" name="status" value="2"
                                    @if($info['status'] == 2) checked @endif>禁用</label></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否管理员:</label>

                                <div class="col-sm-2">
                                    <div class="radio"><label><input type="radio" name="is_super" value="2"
                                    @if($info['is_super'] == 1) checked @endif> 否</label></div>
                                    <div class="radio"><label><input type="radio" name="is_super" value="1"
                                    @if($info['is_super'] == 2) checked @endif>是</label></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">修改用户</button>
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
