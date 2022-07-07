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
            $table->double('rendas', 6, 2);
            $table->double('eletrecidade', 6, 2);
            $table->double('agua', 6, 2);
            $table->double('consumiveis', 6, 2);
            $table->double('manutencao', 6, 2);
            $table->double('equipamentos', 6, 2);
            $table->double('outras', 6, 2);
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
