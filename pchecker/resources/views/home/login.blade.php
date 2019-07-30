<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>

</head>

<body class="signin">
<div class="signinpanel">
    <div class="row" id="login">
        <div class="col-sm-12">
            <form method="post" action="index.html" onsubmit=" return false">
                {{csrf_field()}}
                <h4 class="no-margins">登录：</h4>
                <input type="text" name="user_name" class="form-control uname" placeholder="用户名" />
                <input type="password" name="password" class="form-control pword m-b" placeholder="密码" />
                <div v-if="error_show" style="color:red;">{error_msg}</div>
                <a href="">忘记密码了？</a>
                <button class="btn btn-success btn-block" v-on:click="login">登录</button>
                <button class="btn btn-success btn-block" v-on:click="onLogin()">不登录</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        
    </div>
</div>
</body>

<script src="/js/app.js"></script>
<script src="/js/vue.js"></script>

<script>

    //vue的使用
    var login = new Vue({
        el:"#login",
        delimiters:['{','}'],
        data:{error_show:false,error_msg:''},
        methods:{
            login:function(){
                var user_name=$("input[name=user_name]").val();
                var password=$("input[name=password]").val();
                var token   =$("input[name=_token]").val();
                var that=this;

                $.ajax({
                    url:"/home/doLogin",
                    type:"post",
                    dataType:"json",
                    data:{
                        user_name:user_name,password:password,_token:token
                    },

                    success:function(res){
                        if(res.code==2000){
                            that.error_show=false;
                            window.location.href="/home/back";
                        }else{
                            that.error_show=true;
                            that.error_msg=res.msg;
                            return false;
                        }
                    },
                    error:function(res){

                    }
                })

            },

            //游客不登陆进入首页
            onLogin:function(coolie){

            }
        }
    })

</script>
</html>
