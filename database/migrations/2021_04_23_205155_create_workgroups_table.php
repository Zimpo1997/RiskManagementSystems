<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workgroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tokenline')->nullable();
            $table->unsignedInteger('mission_id');
            $table->timestamps();

            // $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade')->onDelete('restrict');
            $table
                ->foreign('mission_id')
                ->references('id')
                ->on('missions')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workgroups');
    }
}
