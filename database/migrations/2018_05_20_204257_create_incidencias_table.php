<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asunto');
            $table->string('descripcion')->nullable();
            $table->integer('encargado_id')->unsigned();
            $table->integer('departamento_id')->unsigned();
            $table->string('solucion')->nullable();
            $table->timestamps();

        //$table->foreign('asunto_id')->references('id')->on('asuntos');
        $table->foreign('encargado_id')->references('id')->on('encargados');
        $table->foreign('departamento_id')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
