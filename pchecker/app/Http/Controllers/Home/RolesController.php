<?php

namespace App\Http\Controllers\Home;

use App\Model\PermissionsRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Roles;
use App\Model\Permissions;
use App\Model\RolePermissions;
use Log;
use Mockery\Exception;


class RolesController extends Controller
{

    //角色的页面展示
    public function lists(Request $request)
    {

        $roles = new Roles();

        $list = $this -> getDataList($roles);

//        dd($list);

        return view("/home/roles/lists",["list" => $list]);
    }

    //角色添加的页面
    public function create(Request $request)
    {
        $permissions = new Permissions();

        $data = $this -> getDataList($permissions);//权限的数据
        $assign["data"] = Roles::make_tree($data);//树形三级分类

        return view("/home/roles/create",$assign);
    }

    //执行角色的添加
    public function doCreate(Request $request)
    {
        $roleP = new RolePermissions();

        $parms = $request -> all();
//        dd($parms);

        //判断角色名是否为空
        if(!isset($parms['role_name']) || empty($parms['role_name'])){

            $return = [
                "code"  => 2000,
                "msg"   => "角色名称不能为空"
            ];
        }

        $parms = $this -> delToken($parms);

        //判断是否有设置权限
        if(isset($parms['permissions'])){

            try{
                //开启事务
                DB::beginTransaction();
                //拿出权限数据
                $permission = $parms['permissions'];
//            dd($permission);
                //删除权限数据
                unset($parms['permissions']);
//                dd($parms);

                //时间
                $time = date("Y-m-d H:i:s",time());

                //要添加的数据
                $data = [
                    "role_name"    => $parms['role_name'],
                    "display_name" => $parms['display_name'],
                    'created_at'    => $time,
                    'updated_at'    => $time
                ];

                //获取刚插入角色数据的id
                $roleId =  DB::table('roles')->insertGetId($data);


                $data=[];

                //接受的数组进行循环分割
                foreach ($permission as $key => $value) {
                    $data[$key]=[
                        'role_id'       => $roleId,
                        'permission_id' => $value,

                    ];
                }
//                dd($data);
                //保存设置权限插入数据
                $roleP -> addRolePermissions($data);
                //提交事务
                DB::commit();

            }catch(\Exception $e){
                DB::rollBack();//事务回滚

                Log::error('保存失败'.$e->getMessage());

                return redirect()->back();
            }

            return redirect("/home/roles/lists");
        }

        $roles = new Roles();

        //添加角色数据
        $res = $this -> storeData($roles, $parms);

        if(!$res){

            return redirect()->back()->with("msg","角色添加失败");
        }

        return redirect("/home/roles/lists");
    }

    //修改角色的页面
    public function edit($id)
    {
        $permissions = new Permissions();

        $roleP = new RolePermissions();

        $role = new Roles();

        $data = $this -> getDataList($permissions);//权限的数据
        $assign["data"] = Roles::make_tree($data);//树形三级分类

        $assign["role"] =  $role-> getRoleId($id);//根据角色id获取角色的一条数据

        //获取权限节点id进行默认选中
        $assign['pid'] = $roleP -> getRolePermissionsId($id);

        return view("home/roles/edit",$assign);
    }

    //执行角色的修改
    public function doEdit(Request $request)
    {

        $roleP = new RolePermissions();

        $role = new Roles();

        $parms = $request -> all();

        //删除token
        $parms = $this -> delToken($parms);

        //判断角色名是否为空
        if(!isset($parms['role_name']) || empty($parms['role_name'])){

            $return = [
                "code"  => 2000,
                "msg"   => "角色名称不能为空"
            ];
        }

        //判断是否有设置权限
        if(isset($parms['permissions'])){

            try{
                DB::beginTransaction();//开启事务
                //拿出权限数据
                $permission = $parms['permissions'];
//            dd($permission);
                //删除权限数据
                unset($parms['permissions']);
//                dd($parms);

                $roleP -> delData($parms['role_id']);

                $role -> roleUpdate($parms, $parms['role_id']);

                //定义一个空数组拼装数据
                $data=[];

                //接受的数组进行循环分割
                foreach ($permission as $key => $value) {
                    $data[$key]=[
                        'role_id'       => $parms['role_id'],
                        'permission_id' => $value,

                    ];
                }
//                dd($data);
                //保存设置权限插入数据
                $roleP -> addRolePermissions($data);
                DB::commit();//提交事务

            }catch(\Exception $e){

                DB::rollBack();//事务回滚

                Log::error('保存失败'.$e->getMessage());
                return redirect()->back();
            }

            return redirect("/home/roles/lists");
        }

        //添加角色数据
        $res = $role -> roleUpdate($parms, $parms['role_id']);

        //判断是否添加成功
        if(!$res){

            return redirect()->back()->with("msg","角色添加失败");
        }

        return redirect("/home/roles/lists");

    }

    //编辑角色权限的页面
    public function permissions($id)
    {
        $permissions = new Permissions();

        $roleP = new RolePermissions();

        $role = new Roles();

        $data = $this -> getDataList($permissions);//权限的数据
        $assign["data"] = Roles::make_tree($data);//树形三级分类

        $assign["role"] =  $role-> getRoleId($id);//根据角色id获取角色的一条数据

        //获取权限节点id进行默认选中
        $assign['pid'] = $roleP -> getRolePermissionsId($id);

        return view("home.roles.permissions",$assign);

    }

    //执行权限设置
    public function doPermissions(Request $request)
    {
        $roleP = new RolePermissions();
        $parms = $request -> all();

        try{
            //开启事务
            DB::beginTransaction();
            //先删除关联表的数据
            $roleP -> delData($parms['role_id']);

            $data=[];

            //接受的数组进行循环分割
            foreach ($parms['permissions'] as $key => $value) {
                $data[$key]=[
                    'role_id'       => $parms['role_id'],
                    'permission_id' => $value
                ];
            }

            //保存设置权限
            $roleP -> addRolePermissions($data);
            //提交事务
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();//事务回滚

            Log::error('保存失败'.$e->getMessage());
            return redirect()->back()->with("msg","设置权限失败");
        }

        return redirect("/home/roles/lists");
    }

    //删除角色
    public function del($id)
    {

        try{
            //开启事务
            DB::beginTransaction();
            //根据id删除角色权限关联表数据
            RolePermissions::delData($id);

            //根据id删除角色表数据
            Roles::delRole($id);
            //提交事务
            DB::commit();

        }catch (\Exception $e){
            DB::rollBack();//事务回滚

            log::error('角色删除失败'.$e->getMessage());
        }

        return redirect("/home/roles/lists");
    }
}
