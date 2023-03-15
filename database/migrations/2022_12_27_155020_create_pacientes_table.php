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
            $table->integer('rut');
            $table->string('primer_nombre',15);
            $table->string('segundo_nombre',15);
            $table->string('apellido_paterno',15);
            $table->string('apellido_materno',15);
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->string('direccion',100);
            $table->integer('telefono');
            $table->primary('rut');
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
