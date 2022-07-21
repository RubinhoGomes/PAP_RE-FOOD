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
        Schema::create('rotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrinhas_id');
            $table->date('data');
            $table->double('kmChegada', 16, 2);
            $table->double('kmPartida', 16, 2);
            $table->time('horaPartida');
            $table->time('horaChegada');
            $table->tinyInteger('numRota');
            $table->string('motorista');
            $table->string('observacoes')->nullable();
            $table->foreign('carrinhas_id')
                ->references('id')
                ->on('carrinhas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rotas');
    }
};
