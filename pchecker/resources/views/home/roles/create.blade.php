@extends("common.back")

@section('content')
    <form method="post" class="form-horizontal" action="{{url('home/roles/doCreate')}}">
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h1>添加角色</h1>
                    </div>

                    <div class="ibox-content">

                            {{csrf_field()}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">角色名称:</label>

                                <div class="col-sm-4">
                                    <input type="text" placeholder="输入角色名称" class="form-control" name="role_name">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">角色描述:</label>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="输入角色描述" class="form-control" name="display_name">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">添加角色</button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>设置权限</h5>
            </div>
                {{--<div class="ibox-content">--}}
                    {{--@foreach($data as $v)--}}
                        {{--<label style="font-size: 20px;">--}}
                            {{--<input type="checkbox" name="permission[]" value="{{$v['id']}}">--}}
                        {{--{{$v['name']}}--}}
                        {{--</label>&nbsp;&nbsp;--}}

                    {{--@endforeach--}}
                {{--</div>--}}
            <div class="panel-body panel-body-nopadding">
            {{csrf_field()}}
            @if(!empty($data))
                @foreach($data as $permission)
                    <!--一级菜单-->
                        <div class="top-permission col-md-12">

                            <label>
                                <input type="checkbox" name="permissions[]" value="{{$permission['id']}}"
                                       class="top-permission-checkbox"/>
                                &nbsp;{{$permission['name']}}</label>
                        </div>
                    @if(isset($permission['child']))
                        <!--二级菜单-->
                            <div class="sub-permissions col-md-11 col-md-offset-1">
                                <div class="col-sm-12">
                                    @foreach($permission['child'] as $sub)
                                        <label><input type="checkbox" name="permissions[]"
                                                      value="{{$sub['id']}}"
                                                      class="sub-permission-checkbox" />&nbsp;{{$sub['name']}}
                                        </label>&nbsp;

                                    @endforeach

                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
                <div class="hr-line-dashed"></div>
        </div>
    </div>
    </form>

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

    <script src="/js/app.js"></script>
    <script>
        $(".display-sub-permission-toggle").toggle(function () {
            $(this).children('span').removeClass('glyphicon-minus').addClass('glyphicon-plus')
                .parents('.top-permission').next('.sub-permissions').hide();
        }, function () {
            $(this).children('span').removeClass('glyphicon-plus').addClass('glyphicon-minus')
                .parents('.top-permission').next('.sub-permissions').show();
        });

        $(".top-permission-checkbox").change(function () {
            $(this).parents('.top-permission').next('.sub-permissions').find('input').prop('checked', $(this).prop('checked'));
        });

        $(".sub-permission-checkbox").change(function () {
            if ($(this).prop('checked')) {
                $(this).parents('.sub-permissions').prev('.top-permission').find('.top-permission-checkbox').prop('checked', true);
            }
        });
    </script>
    <script type="text/javascript">
        $("#save-role-permissions").click(function (e) {
            e.preventDefault();
            Rbac.ajax.request({
                href: $("#role-permissions-form").attr('action'),
                data: $("#role-permissions-form").serialize(),
                successTitle: '角色权限保存成功'
            });
        });
    </script>


@endsection

