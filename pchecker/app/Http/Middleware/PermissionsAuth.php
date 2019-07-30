<?php

namespace App\Http\Middleware;

use Closure;
use App\Tools\ToolsPermissions;

class PermissionsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session = $request->session();
        //获取当前用户的权限节点的url地址
        $getUrl = ToolsPermissions::getUserUrl($session -> get('users.user_id'));
//         dd($getUrl);
//         dd(\Route::currentRouteName());//获取地址名称
        //当前路由名字
        $route = \Route::currentRouteName();

//        dd(!in_array($route, $getUrl));
        //当前用户不是超管并且没有访问当前路由的权限并且不等于空
        if($session->get('users.is_super') !=1 && !in_array($route, $getUrl)){
            return redirect('/403')->send();
        }

        return $next($request);
    }
}
