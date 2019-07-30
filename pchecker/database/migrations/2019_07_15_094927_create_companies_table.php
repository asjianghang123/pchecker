<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id')->comment('公司id');
            $table->string('name',60)->default('')->comment('公司名称');
            $table->string('type',200)->default('')->comment('公司类型');
            $table->string('location',200)->default('')->comment('公司地址');
            $table->string('permit',200)->default('')->comment('公司执照图片');
            $table->unsignedInteger('connector_id')->comment('联系人id');
            $table->string('com_code',20)->default('')->comment('统一社会信用代码');
            $table->string('telephone',11)->default('')->comment('公司联系电话');
            $table->string('manager',45)->default('')->comment('公司法人名称');
            $table->string('range')->default('')->comment('公司经营范围');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::statement("ALTER TABLE `companies` comment '公司表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
