<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users;
use App\Model\Roles;
use App\Model\UserRoles;
use App\Tools\UserFiles;

use Log;
use Illuminate\Support\Facades\DB;

class UsersConterller extends Controller
{
    //用户列表页面
    public function lists()
    {
        //获取数据
        $list = Users::getList();

        return view("home.users.lists");
    }

    //用户列表数据
    public function userDataList()
    {
        //获取数据
        $list = Users::getList();

        $return = [
            "code"  => 2000,
            "msg"   => "成功",
            "data"  => $list
        ];

        return json_encode($return);
    }


    //添加用户
    public function create(Request $request)
    {
        //实例化角色表
        $role = new Roles();
        //获取角色数据
        $list = $this -> selectDataList($role);

        return view("home.users.create", ['list' => $list]);
    }

    //执行添加用户
    public function doCreate(Request $request)
    {

        //接收全部数据
        $parms = $request->all();

        //判断用户名是否为空
        if(!isset($parms["user_name"]) || empty($parms["user_name"])){

            $return = [
                "code" => 4001,
                "msg"  => "用户名不能为空"
            ];

            return json_encode($return);
        }

        //判断邮箱是否为空
        if(!isset($parms["email"]) || empty($parms["email"])){

            $return = [
                "code" => 4002,
                "msg"  => "邮箱不能为空"
            ];

            return json_encode($return);
        }

        //判断邮箱格式是否正确
        $regex="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
        if(!preg_match($regex, $parms["email"])){
            $return = [
                "code"  => 4003,
                "msg"   => "邮箱格式不正确"
            ];

            return json_encode($return);
        }

        //判断密码是否为空
        if(!isset($parms["password"]) || empty($parms["password"])){

            $return = [
                "code"  => 4004,
                "msg"   => "密码不能为空"
            ];

            return json_encode($return);
        }

        $parms = $this -> delToken($parms);

        //判断图片书否存在
        if(!isset($parms['avatar']) || empty($parms['avatar'])){
            //图片为空默认地址
            $avatar = "/img/user.png";

        }else{
            //图片存储地址
            $avatar = UserFiles::uploadFile($parms['avatar']);
        }

        //事务
        try{

            DB::beginTransaction();//开启事务
            //用户数据
            //这里需要添加不上传头像时，采用默认头像图片。
            $data = [
                "user_name"     => $parms["user_name"] ?? "",
                "email"         => $parms["email"] ?? "",
                "password"      => md5($parms["password"]) ?? "",
                "avatar"        => $avatar ?? "",
                "status"        => $parms["status"] ?? "",
                'is_super'      => $parms['is_super'] ?? 1,
                "telephone"     => $parms["telephone"] ?? "",
            ];

//        dd($data);
            $users = new Users();

            //执行添加用户
            $this -> storeData( $users, $data);

            $userRoles = new UserRoles();

            //获取刚刚插入的最新用户的id
            $userId = $users::getMaxId();
            Log::info("用户id".$userId);

            $data1 = [
                "user_id" => $userId->user_id,
                "role_id" => $parms['role_id']
            ];

            //添加用户角色数据
            $userRoles::addUserRole($data1);

            DB::commit();//提交事务
        }catch(\Exception $e){
            DB::rollBack();//事务回滚

            Log::error('用户添加失败'.$e->getMessage());

            return redirect()->back();
        }

        return redirect("/home/users/lists");
//        return redirect("/home/back");

    }

    //修改用户
    public function edit($id)
    {

        //实例化角色表
        $role = new Roles();
        //获取角色数据
        $assign['list'] = $this -> selectDataList($role);

        $userRole = new UserRoles();
        //获取用户角色关联表的role_id进行默认选中
        $assign['role_id'] = $userRole::getUserRoleId($id) -> role_id ?? 0 ;

        //根据user_id获取对应的一条数据
        $assign['info'] = Users::getUserFirst($id);

        return view('home.users.edit',$assign);
    }

    //执行用户的修改
    public function doEdit(Request $request)
    {
        $parms = $request -> all();

        //删除token
        $parms = $this -> delToken($parms);

        //判断用户名是否为空
        if(!isset($parms["user_name"]) || empty($parms["user_name"])){

            $return = [
                "code" => 4001,
                "msg"  => "用户名不能为空"
            ];

            return json_encode($return);
        }

        //判断邮箱是否为空
        if(!isset($parms["email"]) || empty($parms["email"])){

            $return = [
                "code" => 4002,
                "msg"  => "邮箱不能为空"
            ];

            return json_encode($return);
        }

        //判断邮箱格式是否正确
        $regex="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
        if(!preg_match($regex, $parms["email"])){
            $return = [
                "code"  => 4003,
                "msg"   => "邮箱格式不正确"
            ];

            return json_encode($return);
        }

        $avatar = "";
        //判断图片不为空
        if(!empty($parms['avatar'])){
            $avatar = UserFiles::uploadFile($parms['avatar']);;
        }

        try{
            DB::beginTransaction();//开启事务

            $user =new Users();

            //用户修改的操作
            $data=[
                'user_name' => $parms['user_name'] ?? '',
                'email'     => $parms['email'] ?? '',
                'telephone' => $parms['telephone'] ?? '',
                'status'    => $parms['status'] ?? 1,
                'is_super'  => $parms['is_super'] ?? 1,
            ];

            if(!empty($avatar)){
                $data['avatar'] = $avatar;
            }
            // dd($data);
            $user->updateUser($data,$parms['user_id']);

            //添加用户和角色关联关系
            $userRole=new UserRoles();

            //先删除之前的关联记录
            $a=$userRole -> delByUserId($parms['user_id']);
            log::info('删除之前的关联记录'.$a);
            $data1=[
                'user_id' => $parms['user_id'],
                'role_id' => $parms['role_id'] ?? 0
            ];
            log::info('删除之前的关联记录'.json_encode($data1));
            $userRole->addUserRole($data1);
            // log::info('添加关联表'.$b);
            DB::commit();//提交事务
        }catch(\Exception $e){
            DB::rollBack();//事务回滚

            Log::error('用户添加失败'.$e->getMessage());

            return redirect()->back()->with('error_msg',$e->getMessage());

        }

        return redirect("/home/users/lists");

    }

    //用户的删除
    public function delUser($id)
    {

        try{
            Users::del($id);//删除用户

            $userRole=new UserRoles();

            $userRole->delByUserId($id);//删除用户角色关联关系
        }catch(\Exception $e){
            Log::error('用户删除失败',$e->getMessage());
        }


        return redirect('/home/users/lists');
    }

    //即点即改是否禁用
    public function userAttr(Request $request){

        $param = $request -> all();

        $return = [
            'code' => 2000,
            'msg'  => '成功'
        ];

        //组装要修改的数据值
        $data = [
            $param['key'] => $param['val'],
        ];

        $res = Users::upStatus($data,$param['id']);

        if(!$res){
            $return = [
                'code' => 4000,
                'msg'  => '属性修改失败'
            ];
        }
        return json_encode($return);
    }
}