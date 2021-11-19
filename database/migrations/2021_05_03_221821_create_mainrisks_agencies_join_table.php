<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainrisksAgenciesJoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainrisks_agencies_join', function (Blueprint $table) {
            $table->unsignedInteger('mainrisk_id');
            $table->unsignedInteger('agency_id');
            $table->text('agency_recommend')->nullable();

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('mainrisk_id')->references('id')->on('mainrisks')->onDelete('cascade');
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['mainrisk_id', 'agency_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainrisks_agencies_join');
    }
}
