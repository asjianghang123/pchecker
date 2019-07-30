<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //删除_token下划线token值
    public function delToken(array $params)
    {
        if(!isset($params['_token'])){
            return false;
        }
        unset($params['_token']);

        return $params;
    }

    //保存数据的操作，此方法可用于添加和修改
    public function storeData($object,$params)
    {
        if(empty($params)){
            return false;
        }
//         dd($params);
        foreach($params as $key => $value) {
            $object->$key = $value;
        }

        return $object->save();
    }

    //没有分页的数据列表
    public function getDataList($object,$where = [])
    {
        $list = $object->where($where)->get()->toArray();

        return $list;
    }

    //根据页面传过来的id获取相应的一条数据 通用
    public function getListId($object, $id, $key="id")
    {
        $list = $object -> where($key,$id) -> first();

        return $list;
    }

    //查询没有where条件的单表数据数据
    public function selectDataList($object)
    {
        $list = $object -> get() -> toArray();

        return $list;
    }


}
