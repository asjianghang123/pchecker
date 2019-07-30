<?php

namespace App\Tools;


/**
 * 公共的方法类
 */

class UserFiles
{
    public static function uploadFile($files)
    {
        //判断文件是否为空
        if(empty($files)){
            return "";
        }

        //文件上传的目录
        $basePath = 'uploads/'.date("Y-m-d",time());

        //目录不存在创建一个目录
        if(!file_exists($basePath)){
            @mkdir($basePath, 755, true);
        }

        if($files -> isValid()){
            $filename = "/".date("YmdHis", time()).rand(0,10000).".".$files->extension();


            //执行文件的上传
            @move_uploaded_file($files, $basePath.$filename);

            return '/'.$basePath.$filename;

        }

        return "";

    }
}