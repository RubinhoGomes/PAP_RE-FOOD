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
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('mes');
            $table->year('ano');
            $table->decimal('rendas', 8, 2);
            $table->decimal('eletrecidade', 8, 2);
            $table->decimal('agua', 8, 2);
            $table->decimal('consumiveis', 8, 2);
            $table->decimal('manutencao', 8, 2);
            $table->decimal('equipamentos', 8, 2);
            $table->decimal('combustivel', 8, 2);
            $table->decimal('outras', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despesas');
    }
};
