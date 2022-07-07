<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerals', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('mes');
            $table->year('ano');
            $table->bigInteger('numBeneficiarios');
            $table->bigInteger('numFamilias');
            $table->bigInteger('numVoluntarios');
            $table->bigInteger('numFontesAlimentos');
            $table->bigInteger('numParceirosSociais');
            $table->bigInteger('numAssociacoesParceiras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gerals');
    }
};
