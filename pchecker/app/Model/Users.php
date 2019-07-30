<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    //模型users表
    protected $table = "users";

    //获取刚刚插入数据的id
    public static function getMaxId()
    {
        return self::select('user_id') -> orderBy('user_id','desc') -> first();
    }

    //通过邮箱获取用户
    public static function getUserName($user_name)
    {

        $userInfo = self::where('user_name',$user_name)
            ->where('status','1')
            ->first();

        return $userInfo;
    }

    //获取用户列表
    public static function getList()
    {
        $return = self::select()->get()->toArray();

//        dd($return);

        return $return;
    }

    //获取用户数据一条
    public static function getUserFirst($id)
    {
        return self::where('user_id',$id) -> first();
    }

    //根据user_id修改数据
    public static function updateUser($data, $id)
    {
        return self::where('user_id',$id) -> update($data);
    }

    //删除用户
    public static function del($id)
    {
        return self::where('user_id', $id) -> delete();
    }

    //查询是否管理员
    public static function getIsSuper($userId)
    {
        $data = self::select('is_super')
            ->where('user_id', $userId)
            ->get()
            ->toArray();

        $isSuper = [];
        foreach ($data as $v){
            $isSuper = $v['is_super'];
        }

        return $isSuper;
    }

    //修改状态是否启用
    public static function upStatus($data, $id)
    {
        return self::where('user_id',$id)->update($data);
    }

}
