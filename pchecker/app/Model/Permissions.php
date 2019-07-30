<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    //模型Permissions表
    protected $table = "permissions";

    public $timestamps = "true";


    //获取权限节点
    public static function getListByFid($fid=0)
    {
        $list= self::select('id','parent_id','name','url','is_menu')
                ->where('parent_id',$fid)
                ->get()
                ->toArray();
        return $list;
    }

    //删除权限
    public static function del($id)
    {
        return self::where('id',$id)->delete();
    }

    /**
     * 通过权限的主键id获取权限的url地址集合
     */
    public static function getUrlId($permissionsId)
    {
        $permissions = self::select('url')
            ->whereIn('id',$permissionsId)
            ->get()
            ->toArray();

        $getUrl = [];

        foreach ($permissions as $key => $value) {
            $getUrl[] = $value['url'];
        }

        return $getUrl;
    }
}
