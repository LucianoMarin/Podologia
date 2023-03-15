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
        Schema::create('especialistas', function (Blueprint $table) {
            $table->id('id_especialista');
            $table->integer('rut');
            $table->string('verificador',1);
            $table->string('primer_nombre', 15);
            $table->string('segundo_nombre', 15);
            $table->string('apellido_paterno', 15);
            $table->string('apellido_materno', 15);
            $table->bigInteger('cargo')->unsigned();
            $table->bigInteger('user')->unsigned();
            $table->foreign('cargo')->on('cargos')->references('id_cargo');
            $table->foreign('user')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialistas');
    }
};
