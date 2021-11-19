<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskseveritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riskseverities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('slug')->nullable();
            $table->string('color', 20)->nullable();
            $table->text('comments')->nullable();
            $table->string('publish', 1)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riskseverities');
    }
}
