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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nombres');
            $table->string('a_paterno');
            $table->string('a_materno');
            $table->date('fecha_nacimiento');
            $table->decimal('peso',3,3);
            $table->string('sexo',6);
            $table->text('foto');
            $table->string('cp',5);
            $table->string('municipio');
            $table->string('colonia');
            $table->string('calle');
            $table->string('no_casa');
            $table->integer('cantidad_visitas');
            $table->text('alergias_enfermedades');
            $table->string('situacion_por_la_cual_necesita_terapia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};
