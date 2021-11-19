<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploadfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filepath');
            $table->string('filename');
            $table->integer('filesize')->nullable();
            $table->string('filetype')->nullable();
            $table->string('fileextension')->nullable();
            $table->unsignedBigInteger('uploadfileable_id');
            $table->string('uploadfileable_type');
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
        Schema::dropIfExists('uploadfiles');
    }
}
