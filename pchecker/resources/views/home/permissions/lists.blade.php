@extends("common.back")

@section('content')
    <div class="col-sm-12" id="list">
        <div class="ibox">
            <div class="ibox-title">
                <h5>权限列表</h5>
                <div class="ibox-tools">
                    <a href="/home/permissions/create" class="btn btn-primary btn-xs">添加权限</a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row m-b-sm m-t-sm">
                    <div class="col-md-1">
                        <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top"  v-on:click="getPermissions()"><i class="fa fa-reply"></i>返回上一级</button>
                    </div>
                    <div class="col-md-11">
                        <div class="input-group">
                            <input type="text" placeholder="请输入项目名称" class="input-sm form-control"> <span class="input-group-btn">
<button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
                <div class="project-list">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>权限</th>
                            <th data-hide="all">url路劲</th>
                            <th>是否菜单</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="permission in permission_list">
                            <td>{permission.id}</td>
                            <td><span class="pie">{permission.name}</span></td>
                            <td>{permission.url}</td>
                            <td class="project-completion">
                                {permission.is_menu==1 ? '是' : '否'}
                            </td>
                            <td>
                                <button class="btn btn-white btn-sm" v-on:click="getPermissions(permission.id)"><i class="fa fa-folder"></i> 查看子权限 </button>
                                <button class="btn btn-white btn-sm" v-on:click="getEditId(permission.id)"><i class="fa fa-pencil"></i> 编辑 </button>
                                <button class="btn btn-white btn-sm" v-on:click="del(permission.id)">
                                    <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除
                                </button>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/vue.js"></script>
    <script>

        var list = new Vue({
            el:"#list",
            delimiters:['{','}'],
            data:{
                permission_list:[]
            },
            created:function(){
                this.getPermissions();
            },
            methods:{
                //获取权限列表
                getPermissions:function(parent_id = 0){

                    that = this;
                    var token=$("input[name=_token]").val();

                    $.ajax({
                        url:  "/home/get/permissions/"+parent_id,
                        type: "post",
                        data: {_token:token},
                        dataType: "json",
                        success:function(res){

                            if(res.code==2000){
                                that.permission_list=res.data;

                            }else{
                                alert(res.msg);
                            }
                        },
                        error:function(res){

                        }
                    })
                },

                //执行删除
                del:function(id){

                    var that = this;

                    $.ajax({
                        url: '/home/permissions/del/'+id,
                        type:'get',
                        data:{},
                        dataType: "json",
                        success: function(res){

                            if(res.code == 2000){
                                alert(res.msg);
                                that.getPermissions();
                            }
                        },

                        error: function(res){

                        }
                    })
                },

                //获取修改权限的id
                getEditId:function(id){

                    $.ajax({
                        url: "/home/permissions/editId/"+id,
                        type: "get",
                        data: {},
                        dataType: "json",
                        success:function(res){

                                window.location.href="/home/permissions/edit/"+res;

                        },
                        error:function(res){

                        }
                    })
                }

            }

        })
    </script>
@endsection