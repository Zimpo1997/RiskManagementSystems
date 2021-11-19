<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainrisksTeamrisksJoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainrisks_teamrisks_join', function (Blueprint $table) {
            $table->unsignedInteger('mainrisk_id');
            $table->unsignedInteger('teamrisk_id');
            $table->text('team_recommend')->nullable();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('mainrisk_id')->references('id')->on('mainrisks')->onDelete('cascade');
            $table->foreign('teamrisk_id')->references('id')->on('teamrisks')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['mainrisk_id', 'teamrisk_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainrisks_teamrisks_join');
    }
}
