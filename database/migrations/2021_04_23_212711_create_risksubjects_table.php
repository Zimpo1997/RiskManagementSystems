<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risksubjects', function (Blueprint $table) {
            $table->string('id', 6)->primary()->index();
            $table->text('name_th')->nullable();
            $table->string('riskgroup_id', 5);
            $table->string('riskcategories_id', 5);
            $table->string('risktype_id', 5);
            $table->string('risksubcategories_id', 5);
            $table->string('is_standard')->nullable();
            $table->boolean('publish', 1)->default(true);
            $table->timestamps();

            $table->foreign('riskgroup_id')->references('id')->on('riskgroups')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('riskcategories_id')->references('id')->on('riskcategories')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('risktype_id')->references('id')->on('risktypes')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('risksubcategories_id')->references('id')->on('risksubcategories')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('risksubjects');
    }
}
