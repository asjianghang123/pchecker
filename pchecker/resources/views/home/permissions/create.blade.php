@extends("common.back")

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h3>添加权限</h3>
                </div>

                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{url('home/permissions/doCreate')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">上级权限:</label>

                            <div class="col-sm-4">
                                <select name="parent_id" id="" class="form-control">
                                    <option value="0">顶级权限</option>
                                    @foreach($list as $v)
                                        <option value="{{$v['id']}}">{{$v['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">权限名:</label>

                            <div class="col-sm-4">
                                <input type="text" placeholder="输入权限名称" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">权限url地址:</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="根据路由输入url路径" class="form-control" name="url" value="#">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否菜单:</label>

                            <div class="col-sm-4">
                                <div class="radio"><label><input type="radio" name="is_menu" value="1" checked> 是</label></div>
                                <div class="radio"><label><input type="radio" name="is_menu" value="2" >否</label></div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">添加权限</button>
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

