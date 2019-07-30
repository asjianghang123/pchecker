<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->comment('项目id');
            $table->integer('project_id')->comment('项目名id');
            $table->string('name',150)->default('')->comment('项目名');
            $table->text('body')->comment('项目内容');
            $table->string('manager',60)->default('')->comment('项目经理名');
            $table->integer('manager_id')->default(0)->comment('项目经理id');
            $table->string('images')->default('')->comment('项目图片');
            $table->timestamp('complet_time')->comment('完成时间');
            $table->string('pro_drawings')->default('')->comment('预计工作量');
            $table->enum('harder',[1,2,3,4,5])->default('1')->comment('难度系数  *表示');
            $table->integer('creator_id')->default(0)->comment('项目创建人id');
            $table->integer('user_id')->default(0)->comment('联系人id');
            $table->string('location')->default('')->comment('项目地址坐标(json)');
            $table->string('designer',60)->default('')->comment('设计人');
            $table->enum('status',[1,2,3])->default('1')->comment('1 已开始 2 进行中 3 已完成');
            $table->string('area')->default('')->comment('面积');
            $table->string('structure_type')->default('')->comment('结构类型');
            $table->integer('person_id')->comment('甲方负责人id');
            $table->integer('guid')->comment('模型id');
            $table->integer('design_id')->comment('设计院id');
            $table->integer('party_id')->comment('甲方id');
            $table->integer('supervisor_id')->comment('监理单位id');
            $table->integer('constructtion_id')->comment('施工单位id');
            $table->integer('unitphone_id')->comment('施工单位联系人id');
            $table->integer('market_manager_id')->comment('市场经理id');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::statement("ALTER TABLE `projects` comment '项目表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
