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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('es_admin')->default(0);
            $table->integer('es_paciente')->default(0);
            $table->integer('es_terapeuta')->default(0);
            $table->integer('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('es_admin');
            $table->dropColumn('es_paciente');
            $table->dropColumn('es_terapeuta');
            $table->dropColumn('active');
        });
    }
};
