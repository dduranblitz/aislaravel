<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegrantesGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrantes_grupos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('idUsuario')->unsigned();
            $table->integer('idGrupo')->unsigned();
            $table->timestamps();
            $table->unique(['idUsuario', 'idGrupo']);
        });


   Schema::table('integrantes_grupos', function($table) {
       $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
   });

 
   Schema::table('integrantes_grupos', function($table) {
       $table->foreign('idGrupo')->references('id')->on('grupo_tareas')->onDelete('cascade');
   });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('integrantes_grupos');
    }
}
