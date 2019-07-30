<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * 用户表
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id')->comment('用户id');
            $table->string('user_name',60)->default('')->comment('用户名')->unique();
            $table->string('telephone',11)->default('')->comment('邮箱')->unique();
            $table->string('email',150)->default('')->comment('邮箱')->unique();
            $table->string('avatar',200)->default('')->comment('用户头像');
            $table->char('password',32)->default('')->comment('密码');
            $table->enum('is_super',['1','2'])->default('1')->comment('是否超管 1超管 2非超管');
            $table->enum('status',['1','2'])->default('1')->comment('用户状态 1启用 2禁用');
            $table->char('token',32)->default('')->comment('token值');
            $table->string('settings')->default('')->comment('设置');
            $table->string('macaddress',200)->default('')->comment('地址');
            $table->string('computername',90)->default('')->comment('计算机名');
            $table->timestamps();

            $table->engine = 'InnoDB';

        });

        DB::statement("ALTER TABLE `users` comment '用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
