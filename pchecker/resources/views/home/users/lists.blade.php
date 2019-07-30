@extends("common.back")

@section('content')

    <div class="col-sm-12">
        <div class="ibox" >
            <div class="ibox-title">
                <h5>用户列表</h5>
                <div class="ibox-tools">
                    <a href="/home/users/create" class="btn btn-primary btn-xs">添加新用户</a>
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

                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8" id="user_lists">
                        <thead>
                        {{csrf_field()}}
                        <tr>

                            <th>用户名</th>
                            <th>手机号</th>
                            <th data-hide="all">邮箱</th>
                            <th>状态</th>
                            <th data-hide="all">头像</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="lists in user_lists">
                            <td>{lists.user_name}</td>
                            <td>{lists.telephone}</td>
                            <td>{lists.email}</td>
                            <td>
                                <button @click="userAttr(lists.user_id,'status',2)" v-if="lists.status==1" class="btn btn-sm btn-success">启用</button>
                                <button @click="userAttr(lists.user_id,'status',1)" v-else class="btn btn-sm btn-black">禁用</button>
                            </td>
                            <td>
                                <img alt="image" class="img-circle" v-if="lists.avatar == ''" src="/img/a5.jpg" style="height: 35px;width: 35px;">
                                <img alt="image" class="img-circle" v-else :src="lists.avatar" style="height: 35px;width: 35px;">
                            </td>
                            <td>
                                <a :href="'/home/users/edit/'+lists.user_id" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑用户 </a>
                                <a :href="'/home/users/delUser/'+lists.user_id" class="btn btn-white btn-sm">
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

    <script src="/js/vue.js"></script>
    <script src="/js/app.js"></script>
    <script>

        var user_lists = new Vue({
            el:"#user_lists",
            delimiters: ['{','}'],
            data:{
                user_lists:[]
            },
            created:function(){
                this.userList()
            },

            methods:{
                userList:function(){
                    var that=this;
                    $.ajax({
                        url:"/home/users/data/lists",
                        type:"post",
                        data:{
                            _token:$("input[name=_token]").val()
                        },
                        dataType:"json",
                        success:function(res){
                            if(res.code==2000){
                                that.user_lists = res.data;
                            }
                        }
                    })
                },
                //即点即改  修改是否禁用
                userAttr:function(id,key,val){
                    var that = this;

                    $.ajax({
                        url:"/home/users/userAttr/lists",
                        type:"get",
                        data:{
                            _token:$("input[name=_token]").val(),
                            id:id,key:key,val:val
                        },
                        dataType:"json",
                        success:function(res){
                            if(res.code==2000){
                                that.userList();
                            }
                        }
                    })
                }
            }

        })
    </script>
@endsection