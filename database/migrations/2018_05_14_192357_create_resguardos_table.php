<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResguardosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resguardos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('n_resguardo');
            $table->string('resguardante');
            $table->string('puesto');
            $table->integer('departamento_id')->unsigned();
            $table->string('descripcion');
            $table->string('extension')->nullable();
            $table->integer('articulo_id')->unsigned();
            $table->string('archivo')->nullable();
            $table->timestamps();

        $table->foreign('departamento_id')->references('id')->on('departamentos');
        $table->foreign('articulo_id')->references('id')->on('articulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resguardos');
    }
}
