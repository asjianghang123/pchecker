<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    //表名
    protected $table = "user_roles";

    public $timestamps = "false";

    //添加用户角色数据
    public static function addUserRole($data)
    {
        return self::insert($data);
    }

    //根据id获取一条数据
    public static function getUserRoleId($id)
    {
        return self::where('user_id', $id) -> first();
    }

    //根据user_id删除相应的数据
    public static function delByUserId($id)
    {
        return self::where('user_id', $id) -> delete();
    }
}
