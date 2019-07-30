@extends('common.back')

@section('content')

    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>设置【{{$role['role_name']}}】权限</h5>

            </div>
            <form method="post" class="form-horizontal" action="/home/roles/doPermissions">
                <input type="hidden" name="role_id" value="{{$role['role_id']}}">
                {{--<div class="hr-line-dashed"></div>--}}

                    {{--<div class="ibox-content">--}}
                        {{--@foreach($data as $v)--}}
                            {{--<label style="font-size: 20px;">--}}
                            {{--<input type="checkbox" name="permissions[]" value="{{$v['id']}}"--}}
                            {{--@if(in_array($v['id'], $pid)) checked @endif>--}}
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
                                       class="top-permission-checkbox" @if(in_array($permission['id'], $pid)) checked @endif/>
                                &nbsp;{{$permission['name']}}</label>
                            </div>
                        @if(isset($permission['child']))
                            <!--二级菜单-->
                                <div class="sub-permissions col-md-11 col-md-offset-1">
                                    <div class="col-sm-12">
                                        @foreach($permission['child'] as $sub)
                                            <label><input type="checkbox" name="permissions[]"
                                                          value="{{$sub['id']}}"
                                                          class="sub-permission-checkbox" @if(in_array($sub['id'], $pid)) checked @endif/>&nbsp;{{$sub['name']}}
                                            </label>&nbsp;

                                    @endforeach

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <div class="hr-line-dashed"></div>

                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-10">
                        <button class="btn btn-primary" type="submit">保存{{$role['role_name']}}权限</button>
                        <a href="/home/roles/lists" class="btn btn-primary">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

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