<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackController extends Controller
{
    //前台访客用户模型界面上传
    public function index(Request $request)
    {

        $data = md5($_SERVER['REMOTE_ADDR']);
        $time = 60*60*24*30;

        setCookie("user","$data",$time);

        $data = UserFiles::uploadfile('file');

        return view("home.index");


    }
    //后台首页
    public function back(Request $request)
    {

        return view("home.back.back");
    }
    //后台仪表盘
//    public function bashboard(Request $request)
//    {
//        return view("home.bashboard");
//    }
}
