<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id')->comment('楼栋id');
            $table->integer('project_id')->comment('项目id');
            $table->string('floor',60)->default('')->comment('楼层');
            $table->string('type')->default('')->comment('结构类型');
            $table->string('area')->default('')->comment('面积');
            $table->integer('similar')->comment('类似于（int）楼层');
            $table->string('storey_height')->default('')->comment('层高');
            $table->string('designer')->default('')->comment('设计人json格式');
            $table->string('buildingid',60)->comment('楼号 1#.2#.一号楼');
            $table->string('guid',100)->default('')->comment('楼栋');
            $table->string('model')->default()->comment('json格式 文件路径');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::statement("ALTER TABLE `buildings` comment '楼栋表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
