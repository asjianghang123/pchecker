<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id')->comment('权限id');
            $table->integer('parent_id')->default(0)->comment('父id');
            $table->string('name',50)->default('')->comment('权限名称');
            $table->string('url',150)->default('#')->comment('权限的url地址');
            $table->enum('is_menu',['1','2'])->default('1')->comment('是否显示菜单 1否 2是');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::statement("ALTER TABLE `permissions` comment '权限表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
