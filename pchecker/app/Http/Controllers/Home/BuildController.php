<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuildController extends Controller
{
    //楼栋列表
    public function lists(Request $request)
    {
        return view("/home/build/lists");
    }

    //楼栋添加
    public function create(Request $request)
    {

    }

    //执行楼栋添加
    public function doCreate(Request $request)
    {

    }

    //楼栋修改
    public function edit($id)
    {

    }

    //执行楼栋修改
    public function doEdit(Request $request)
    {

    }

    //楼栋删除
    public function del($id)
    {

    }
}
