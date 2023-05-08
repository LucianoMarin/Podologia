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
    
        Schema::create('forma_atencion', function (Blueprint $table) {
        $table->id('id_tipo');
        $table->string('nombre_tipo');
        });

        

        DB::table("forma_atencion")
        ->insert([
           ["id_tipo" => 0,
            "nombre_tipo" => "Proyectos"],
            ["id_tipo" => 0,
            "nombre_tipo" => "Domicilio"],
            ["id_tipo" => 0,
            "nombre_tipo" => "Particular"],
        ]);
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forma_atencion');

    }
};
