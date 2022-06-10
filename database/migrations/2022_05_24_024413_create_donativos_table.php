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
        Schema::create('donativos', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('mes');
            $table->year('ano');
            $table->double('valorDinheiro', 12, 2);
            $table->double('valorNaoPerciveis', 12, 2);
            $table->double('valorConsumiveis', 12, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donativos');
    }
};
