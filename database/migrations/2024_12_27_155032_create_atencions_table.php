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
            $table->bigInteger('precio_atencion')->nullable();
            $table->string('nota',255)->nullable();
            $table->boolean('boleta');
            $table->integer('estado');
            $table->string('rut_especialista');
            $table->integer('nombre_proyecto')->nullable();
            $table->bigInteger('id_pacientes')->unsigned();
            $table->bigInteger('id_atenciones')->unsigned();
            $table->foreign('rut_especialista')->references('rut')->on('especialistas');
            $table->foreign('id_pacientes')->references('id_paciente')->on('pacientes');
            $table->foreign('id_atenciones')->references('id_tipo')->on('forma_atencion');

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
