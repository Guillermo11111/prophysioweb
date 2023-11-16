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
        Schema::create('terapeutas_x_especialidades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('terapeuta_id')->constrained('terapeutas');
            $table->foreignId('espacialidad_id')->constrained('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terapeutas_x_especialidades');
    }
};
