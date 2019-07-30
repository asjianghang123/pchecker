<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    //项目列表
    public function lists(Request $request)
    {

        return view("home.projects.lists");
    }

    //项目添加
    public function create(Request $request)
    {

    }

    //执行项目添加
    public function doCreate(Request $request)
    {

    }

    //项目修改
    public function edit($id)
    {

    }

    //执行项目修改
    public function doEdit(Request $request)
    {

    }

    //项目删除
    public function del($id)
    {

    }
}
