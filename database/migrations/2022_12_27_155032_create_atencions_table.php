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
        Schema::create('atencions', function (Blueprint $table) {
            $table->id('id_atencion');
            $table->date('fecha_atencion');
            $table->TIME('hora');
            $table->bigInteger('precio_atencion');
            $table->string('nota',255);
            $table->string('rut_especialista');
            $table->string('rut_paciente');
            $table->foreign('rut_especialista')->references('rut')->on('especialistas');
            $table->foreign('rut_paciente')->references('rut')->on('pacientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atencions');
    }
};
