<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolePermissions extends Model
{
    //模型role_permissins表
    protected $table = "role_permissions";

    public $timestamps = "false";

    //根据role_id删除关联表的数据
    public static function delData($role_id)
    {
        return self::where("role_id",$role_id) -> delete();
    }

    //添加角色权限关联数据绑定角色
    public static function addRolePermissions($data)
    {
        return self::insert($data);
    }

    //通过角色id查找权限节点id
    public static function getRolePermissionsId($id)
    {
        $data = self::select('permission_id')->where('role_id',$id)
               ->get()
               ->toArray();

        $pid=[];

        foreach ($data as $key => $value) {
            $pid[]=$value['permission_id'];
        }
//        dd($pid);
        return $pid;
    }

}
