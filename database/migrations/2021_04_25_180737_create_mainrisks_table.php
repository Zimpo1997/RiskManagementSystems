<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainrisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainrisks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('risksubject_id', 6);
            $table->date('isdate');
            $table->time('istime');
            $table->string('riskepoint_id');
            $table->unsignedInteger('riskseverities_id');
            $table->text('risk_detail')->nullable();
            $table->text('risk_inmanage')->nullable();
            $table->text('risk_note')->nullable();
            $table->unsignedInteger('agencies_id');
            $table->unsignedInteger('program_id')->nullable();
            $table->text('risk_edetail')->nullable();
            $table->text('risk_enote')->nullable();
            $table->unsignedInteger('member_id')->comment("ผู้รายงาน");
            $table->unsignedInteger('respon_workgroup_id')->nullable();
            $table->text('risk_solutions')->nullable();
            // $table->unsignedInteger('memberedit_id')->nullable()->comment("ผู้แก้ไขรายงาน");
            // $table->text('risk_recommend')->nullable();
            // $table->unsignedInteger('memberrecom_id')->nullable()->comment("ผู้เสนอแนะแก้ไขรายงาน");
            $table->integer('riskstep_id')->default(1);
            $table->text('risk_comment')->nullable();
            $table->boolean('status_del', 1)->default(false);
            $table->timestamps();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('risksubject_id')->references('id')->on('risksubjects')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('riskepoint_id')->references('id')->on('riskepoints')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('riskseverities_id')->references('id')->on('riskseverities')->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('agencies_id')->references('id')->on('agencies')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('program_id')->references('id')->on('programs')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('respon_workgroup_id')->references('id')->on('workgroups')->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('riskstep_id')->references('id')->on('risksteps')->onUpdate('cascade')->onDelete('restrict');
            // $table->foreign('memberedit_id')->references('id')->on('members')->onUpdate('cascade')->onDelete('restrict');
            // $table->foreign('memberrecom_id')->references('id')->on('members')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainrisks');
    }
}
