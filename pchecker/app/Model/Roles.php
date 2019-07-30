<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //模型roles表
    protected $table = "roles";

    //根据id查询角色的一条信息
    public static function getRoleId($id)
    {
        return self::where("role_id", $id)->first();

    }

    //根据role_id修改角色数据
    public static function roleUpdate($data, $role_id)
    {
        return self::where("role_id",$role_id) -> update($data);
    }

    //根据id删除角色
    public static function delRole($id)
    {
        return self::where('role_id',$id) -> delete();
    }

    //权限的三级分类
    public static function make_tree($data, $parent_id = 0)
    {
        $tree=array();
        $packData=array();
        //将所有的分类id作为数组的key
        foreach ($data as $k => $v) {
            $packData[$v['id']]=$v;
        }
//        dd($packData);
        //利用引用，将每个分类添加到父类child数组中
        foreach ($packData as $key => $val) {
            if($val['parent_id']==$parent_id){//父id等于0
                $tree[]=&$packData[$key];//key值引用赋值给$tree空数组
            }else{
                //否则找到父类赋值给child数组
                $packData[$val['parent_id']]['child'][]=&$packData[$key];
            }
        }
//        dd($tree);
        return $tree;
    }
}
