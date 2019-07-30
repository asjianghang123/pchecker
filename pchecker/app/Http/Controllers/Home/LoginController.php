<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Model\Users;

class LoginController extends Controller
{
    //登录界面
    public function login(Request $request)
    {

        $session = $request->session();

        if($session->has('users')){
            //如果存在sesion信息的话不用登陆
            return redirect('/home/back');
        }

        return view("home.login");

    }

    //执行登录
    public function doLogin(Request $request)
    {

        //接受所有的参数
        $params = $request->all();

        $return = [
            'code' => 2000,
            'msg'  => '登录成功'
        ];

        //邮箱不能为空
        if(!isset($params['user_name']) || empty($params['user_name'])){

            $return = [
                'code' => 4001,
                'msg'  => "用户名不能为空",
            ];

            return json_encode($return);
        }

        //密码不能为空
        if(!isset($params['password']) || empty($params['password'])){

            $return = [
                'code' => 4002,
                'msg'  => "密码不能为空"
            ];

            return json_encode($return);
        }

        //通过邮箱获取用户的信息
        $userInfo = Users::getUserName($params['user_name']);
//        dd($userInfo);
        //邮箱不存在
        if(empty($userInfo)){

            $return = [
                'code' => 4003,
                'msg'  => "用户不存在"
            ];

            return json_encode($return);
        }else{
            //传递过来的参数密码
            $postPwd = md5($params['password']);

            //密码错误
            if($postPwd !== $userInfo->password){

                $return = [
                    'code' => 4004,
                    'msg'  => "密码不正确"
                ];

                return json_encode($return);
            }else{//密码正确, 执行登陆

                $session = $request->session();//获取session对象
                //存储用户id
                $session -> put('users.user_id',$userInfo  -> user_id);//使用session保存用户id
                $session -> put('users.user_name',$userInfo-> user_name);//使用session保存用户名
                $session -> put('users.is_super',$userInfo -> is_super);//使用session保存是否超管
                $session -> put('users.avatar',$userInfo -> avatar);//使用session保存图片地址
                $session -> put('users.email',$userInfo -> email);//使用session保存邮箱地址

                return json_encode($return);
            }
        }

    }

    //登录退出
    public function logout(Request $request)
    {
        //session删除
        $request->session()->forget('users');

        return redirect('/home/login');
    }
}
