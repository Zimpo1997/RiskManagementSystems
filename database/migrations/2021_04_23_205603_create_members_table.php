<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title', 10)->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('card_number', 13)->nullable();
            $table->date('birthday')->nullable();
            $table->string('sex', 10)->nullable();
            $table->string('tel', 15)->nullable();

            $table->unsignedInteger('agencies_id');
            $table->string('position')->nullable();
            $table->string('degree')->nullable();
            $table->unsignedInteger('member_id')->nullable();

            $table->string('add_home')->nullable();
            $table->string('add_road')->nullable();
            $table->string('add_moo')->nullable();
            $table->string('add_district')->nullable();
            $table->string('add_amphure')->nullable();
            $table->string('add_province')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('agencies_id')->references('id')->on('agencies')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('member_id')->references('id')->on('members')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
