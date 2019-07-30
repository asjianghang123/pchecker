<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCustomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customes', function (Blueprint $table) {
            $table->increments('id')->comment('客户表id');
            $table->string('name',60)->default('')->comment('客户名称');
            $table->string('telephone',11)->default('')->comment('客户电话');
            $table->string('cus_email',90)->default('')->commen('客户邮箱');
            $table->string('avatar',200)->default('')->comment('客户头像');
            $table->string('company_name',60)->default('')->comment('公司名称');
            $table->string('hobby',200)->default('')->comment('爱好');
            $table->string('position',60)->default('')->comment('职位');
            $table->unsignedInteger('age')->default(0)->comment('年龄');
            $table->unsignedInteger('user_id')->default(0)->comment('联系人id');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::statement("ALTER TABLE `customes` comment '客户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customes');
    }
}
