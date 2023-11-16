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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('terapeuta_id')->constrained('terapeutas');
            $table->foreignId('paciente_id')->constrained('pacientes');
            $table->foreignId('tipo_terapia_id')->constrained('tipo_terapia');
            $table->foreignId('estado_cita_id')->constrained('estados_citas');
            $table->date('fecha');
            $table->time('hora');
            $table->string('folio')->unique();
            $table->integer('no_cita');
            $table->text('observaciones');
            $table->text('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};
