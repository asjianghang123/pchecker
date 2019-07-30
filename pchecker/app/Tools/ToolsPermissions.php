<?php

namespace App\Tools;

/**
 *  分配权限的公共方法
 */
class ToolsPermissions
{
    /**
     * 获取所有权限的主键id
     * 根据用户id查询角色id
     * 根据角色id查询权限id
     */
    public static function getRolePermissinsId($userId)
    {
        //判断谁否存在userId
        if(!isset($userId) || empty($userId)){
            return [];
        }

        $userRole = new \App\Model\UserRoles();

        //查询角色id
        $roleId = $userRole -> getUserRoleId($userId);
//        dd($roleId);
        //角色不存在返回空数组
        if(empty($roleId)){

            return [];
        }

        $roleP = new \App\Model\RolePermissions();
        //根据角色id去查询权限id
        $permissionsId = $roleP -> getRolePermissionsId($roleId -> role_id);
//        dd($permissionsId);
        //返回所有的权限id
        return $permissionsId;

    }

    /**
     * 获取当前用户的url地址
     */
    public static function getUserUrl($userId)
    {
        //获取所有的权限id
        $permissionsId = self::getRolePermissinsId($userId);
//        dd($permissionsId);
        //根据权限id获取所有的url地址
        $getUrl = \App\Model\Permissions::getUrlId($permissionsId);
//        dd($getUrl);
        return $getUrl;
    }
}