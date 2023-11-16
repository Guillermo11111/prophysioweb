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
        Schema::create('terapeutas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nombres');
            $table->string('a_paterno');
            $table->string('a_materno');
            $table->date('fecha_nacimiento');
            $table->string('sexo',6);
            $table->text('foto');
            $table->string('cp',5);
            $table->string('municipio');
            $table->string('colonia');
            $table->string('calle');
            $table->string('no_casa');
            $table->integer('active');
            $table->string('estudio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terapeutas');
    }
};
