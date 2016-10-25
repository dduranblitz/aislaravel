<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplazamientoTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplazamiento_tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tarea')->unsigned();
            $table->integer('autor')->unsigned();
            $table->string('nombreAplazamiento',100);
            $table->string('descripcionAplazamiento',300);
            $table->date('fechaFinalizacionInicial');
            $table->date('fechaFinalizacionUltima');
            $table->date('fecha');
            $table->timestamps();
        });
  

      Schema::table('aplazamiento_tareas', function($table) {
       $table->foreign('autor')->references('id')->on('users')->onDelete('cascade');
       });

      Schema::table('aplazamiento_tareas', function($table) {
       $table->foreign('tarea')->references('id')->on('tareas')->onDelete('cascade');
       }); 





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aplazamiento_tareas');
    }
}
