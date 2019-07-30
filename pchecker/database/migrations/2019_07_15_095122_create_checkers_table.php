<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCheckersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkers', function (Blueprint $table) {
            $table->increments('id')->comment('评审id');
            $table->unsignedInteger('project_id')->comment('评审项目id');
            $table->enum('status',[1,2,3])->default('1')->comment('评审状态 1未评审 2评审中 3已评审');
            $table->string('checker')->default('')->comment('审阅人 json格式');
            $table->text('body')->comment('body内容json格式');
            $table->integer('times')->default(0)->comment('评审次数');
            $table->integer('numbers')->default(0)->comment('评审数量');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::statement("ALTER TABLE `checkers` comment '评审表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkers');
    }
}
