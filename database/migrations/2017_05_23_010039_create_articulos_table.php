<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->string('descripcion')->nullable(); 
            $table->string('inv_interno')->nullable()->unique();
            $table->string('inv_externo')->nullable()->unique();
            $table->string('serie')->nullable()->unique();
            $table->integer('marca_id')->unsigned();
            $table->string('modelo');
            $table->integer('status_id')->unsigned();
            $table->string('ip_address')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('ubicacion');
            $table->timestamps();
            
            
    
    
    $table->foreign('categoria_id')->references('id')->on('categorias');
    $table->foreign('marca_id')->references('id')->on('marcas');
    $table->foreign('status_id')->references('id')->on('statuses');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
        
    }
}
