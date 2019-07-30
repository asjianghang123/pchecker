<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Model\Users;

class BackLogin
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

        //判断用户是否登录
        $session = $request->session();

        if(!$session->has('users')){

            //如果用户未登录，跳转到登录页面
            return redirect('home/login')->send();
        }
//        dd($session->get('users'));
        //视图共享
        View::share('user_name',$session->get('users.user_name'));
        View::share('avatar',$session->get('users.avatar'));
        View::share('email',$session->get('users.email'));

        //视图共享查询是否管理员
        $userId = $request -> session() -> get('users.user_id');
//        dd(Users::getIsSuper($userId));
        View::share('isSuper', Users::getIsSuper($userId));
        return $next($request);
    }
}
