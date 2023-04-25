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
        Schema::create('cargos', function (Blueprint $table) {
            $table->id('id_cargo');
            $table->string('nombre',50);
        });

        DB::table("cargos")
        ->insert([
           ["id_cargo" => 0,
            "nombre" => "Podologo"],
            ["id_cargo" => 0,
            "nombre" => "Informatico"]
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
};
