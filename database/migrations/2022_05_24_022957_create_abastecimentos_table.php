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
        Schema::create('abastecimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrinhas_id');
            $table->datetime('data');
            $table->double('litros', 7, 3);
            $table->double('precoPLitro', 10, 4);


            $table->foreign('carrinhas_id')
                ->references('id')
                ->on('carrinhas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abastecimentos');
    }
};
