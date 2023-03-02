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
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id('id_publicacion');
            $table->string('tipo',100);
            $table->string('titulo',200);
            $table->date('fecha_publicacion');
            $table->text('contenido');
            $table->bigInteger('user')->unsigned();
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
        Schema::dropIfExists('publicacions');
    }
};
