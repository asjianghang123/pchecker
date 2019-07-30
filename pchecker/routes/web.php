<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home/index');
});

/**********************登录界面*************************/

//登录页面
Route::get('home/login','Home\LoginController@login');
//执行登录页面
Route::any('home/doLogin','Home\LoginController@doLogin');
//退出登录
Route::any('home/logout','Home\LoginController@logout');

//前台访客用户上传界面
Route::get('','Home\BackController@index');
/**********************登录界面*************************/

//403页面
Route::get('403',function(){
    return view('403');
});

//后台RBAC权限管理路由组

Route::middleware(['back_login','permissions_auth'])->prefix('home')->group(function () {

    //后台首页
    Route::get('back','Home\BackController@back')->name('home.back');
    Route::get('bashboard','Home\BackController@bashboard');
    //Route::get('bashboard','Home\BashboardController@bashboard');

/**********************用户类*************************/

    //用户列表页面
    Route::get('users/lists','Home\UsersConterller@lists')->name('home.users.lists');
    //用户列表数据
    Route::post('users/data/lists','Home\UsersConterller@userDataList')->name('home.users.data.lists');
    //即点即改是否禁用
    Route::get('users/userAttr/lists','Home\UsersConterller@userAttr')->name('home.users.userAttr.lists');

    //添加用户
    Route::get('users/create','Home\UsersConterller@create')->name('home.users.create');
    //执行添加用户
    Route::post('users/doCreate','Home\UsersConterller@doCreate')->name('home.users.doCreate');

    //修改用户
    Route::get('users/edit/{id}','Home\UsersConterller@edit')->name('home.users.edit');
    //执行修改用户
    Route::post('users/doEdit','Home\UsersConterller@doEdit')->name('home.users.doEdit');

    //用户删除
    Route::get('users/delUser/{id}','Home\UsersConterller@delUser')->name('home.users.delUser');

/**********************用户类*************************/

/**********************权限类*************************/
    //权限列表
    Route::get('permissions/lists','Home\PermissionsController@lists')->name('home.permissions.lists');
    //获取权限列表
    Route::post('get/permissions/{parent_id?}','Home\PermissionsController@permissionsList')->name('home.get.permissions');

    //添加权限
    Route::get('permissions/create','Home\PermissionsController@create')->name('home.permissions.create');
    //执行添加权限
    Route::post('permissions/doCreate','Home\PermissionsController@doCreate')->name('home.permissions.doCreate');

    //获取修改权限的id
    Route::get('permissions/editId/{id?}','Home\PermissionsController@editId')->name('home.permissions.editId');
    //修改权限
    Route::get('permissions/edit/{id?}','Home\PermissionsController@edit')->name('home.permissions.edit');
    //执行权限修改
    Route::post('permissions/doEdit','Home\PermissionsController@doEdit')->name('home.permissions.doEdit');

    //删除权限
    Route::get('permissions/del/{id}','Home\PermissionsController@del')->name('home.permissions.del');

/**********************权限类*************************/

/**********************权限类*************************/

    //角色列表
    Route::get('roles/lists','Home\RolesController@lists')->name('home.roles.lists');

    //获取权限的数据
    Route::get('roles/permissions/{id}','Home\RolesController@permissions')->name("home.roles.permissions");
    //执行设置权限
    Route::post('roles/doPermissions','Home\RolesController@doPermissions')->name('home.roles.doPermissions');

    //角色的添加页面
    Route::get('roles/create','Home\RolesController@create')->name('home.roles.create');
    //执行角色的添加
    Route::post('roles/doCreate','Home\RolesController@doCreate')->name('home.roles.doCreate');

    //角色的修改页面
    Route::get('roles/edit/{id}','Home\RolesController@edit')->name("home.roles.edit");
    //执行角色的修改
    Route::post('roles/doEdit','Home\RolesController@doEdit')->name('home.roles.doEdit');

    //删除角色
    Route::get('roles/del/{id}','Home\RolesController@del')->name("home.roles.del");


/**********************权限类*************************/

/**********************项目类*************************/

    //项目列表
    Route::get('projects/lists','Home\ProjectsController@lists')->name('home.projects.lists');

    //添加项目
    Route::get('projects/create','Home\ProjectsController@create')->name('home.projects.create');
    //执行项目添加
    Route::post('projects/doCreate','Home\ProjectsController@doCreate')->name('home.projects.doCreate');

    //修改项目
    Route::get('projects/edit/{id}','Home\ProjectsController@edit')->name('home.projects.edit');
    //执行修改项目
    Route::post('projects/doEdit','Home\ProjectsController@doEdit')->name('home.projects.doEdit');

    //删除项目
    Route::post('projects/del/{id}','Home\ProjectsController@del')->name('home.projects.del');

    /**********************项目类*************************/

/**********************楼栋类*************************/

    //楼栋列表
    Route::get('build/lists','Home\BuildController@lists')->name('home.build.lists');

    //楼栋添加
    Route::get('build/create','Home\BuildController@create')->name('home.build.create');
    //楼栋执行添加
    Route::post('build/doCreate','Home\BuildController@doCreate')->name('home.build.doCreate');

    //楼栋修改
    Route::get('build/edit/{id}','Home\BuildController@edit')->name('home.build.edit');
    //楼栋执行修改
    Route::post('build/doEdit','Home\BuildController@doEdit')->name('home.build.doEdit');

    //楼栋删除
    Route::get('build/del/{id}','Home\BuildController@del')->name('home.build.del');

/**********************楼栋类*************************/

});

