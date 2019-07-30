<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Permissions;


class PermissionsController extends Controller
{
    //权限列表
    public function lists(Request $request)
    {

        return view("home.permissions/lists");
    }

    //获取权限列表
    public function permissionsList($parent_id = 0)
    {
        $return = [
            "code"  => 2000,
            "msg"   => "根据父级id获取权限成功"
        ];

        $data = Permissions::getListByFid($parent_id);

        $return['data'] = $data;
        return json_encode($return);
    }

    //添加权限
    public function create(Request $request)
    {
        //权限节点
        $list = Permissions::getListByFid();

        //获取权限
        return view("home.permissions.create",['list' => $list]);
    }

    public function doCreate(Request $request)
    {
        //执行权限
        $parms = $request -> all();

        $return = [
            "code" => 2000,
            "msg"  => "成功"
        ];

        //判断权限名是否为空
        if(!isset($parms['name']) || empty($parms['name'])){

            $return = [
                "code"  => 4002,
                "msg"   => "权限名不能为空"
            ];

            return json_encode($return);
        }

        //判断url名是否为空
        if(!isset($parms['url']) || empty($parms['url'])){

            $return = [
                "code"  => 4002,
                "msg"   => "url名不能为空"
            ];

            return json_encode($return);
        }



        //接受数据
        $data = [
            "parent_id" => $parms['parent_id'] ?? "",
            "name"      => $parms['name'] ?? "",
            "url"       => $parms['url'] ?? "",
            "is_menu"   => $parms['is_menu']
        ];

        $permissions = new Permissions();

        //权限的添加
        $res = $this -> storeData( $permissions, $data);

        if(!$res){

            return redirect()->back()->with('msg','权限添加失败');
        }

            return redirect("/home/permissions/lists");
    }

    //权限的修改
    public function editId($id)
    {
        $return = $id;

        return $return;
    }

    //修改权限的页面
    public function edit($id)
    {
        //权限节点
        $list = Permissions::getListByFid();

        $permissions = new Permissions();

        //根据id查询一条数据
        $info = $this -> getListId($permissions, $id);

        return view("/home/permissions/edit",["list" => $list, "info" => $info]);
    }

    //执行权限的修改
    public function doEdit(Request $request)
    {
        $parms = $request -> all();

        $parms = $this -> delToken($parms);

        //判断权限名是否为空
        if(!isset($parms['name']) || empty($parms['name'])){

            $return = [
                "code"  => 4001,
                "msg"   => "权限名不能为空"
            ];

            return json_encode($return);
        }

        //判断url名是否为空
        if(!isset($parms['url']) || empty($parms['url'])){

            $return = [
                "code"  => 4002,
                "msg"   => "url名不能为空"
            ];

            return json_encode($return);
        }

        $permissions = Permissions::find($parms['id']);

        //权限的修改
        $res = $this -> storeData( $permissions, $parms);

        if(!$res){

            return redirect()->back()->with('msg','权限修改失败');
        }

        return redirect("/home/permissions/lists");

    }

    //删除权限
    public function del($id)
    {

        $res = Permissions::del($id);

        if($res){

            $return = [
                'code' => 2000,
                'msg'  => '权限删除成功',
            ];

        }else{
            $return = [
                'code' => 4000,
                'msg'  => '权限删除失败',
            ];
        }


        return json_encode($return);
    }

}
