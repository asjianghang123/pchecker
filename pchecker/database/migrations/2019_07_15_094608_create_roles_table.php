<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('role_id')->comment('角色id');
            $table->string('role_name',60)->default('')->comment('角色名字');
            $table->string('display_name',60)->defaule('')->comment('显示名称');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::statement("ALTER TABLE `roles` comment '角色表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
