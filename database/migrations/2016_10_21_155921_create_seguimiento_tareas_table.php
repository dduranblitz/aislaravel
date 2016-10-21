<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientoTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idTarea')->unsigned();
            $table->integer('idAutor')->unsigned();
            $table->string('nombreSeguimiento',100);
            $table->string('descripcionSeguimiento',300);
            $table->date('fecha');
            $table->timestamps();
        });


      Schema::table('seguimiento_tareas', function($table) {
       $table->foreign('idAutor')->references('id')->on('users')->onDelete('cascade');
       });

      Schema::table('seguimiento_tareas', function($table) {
       $table->foreign('idTarea')->references('id')->on('tareas')->onDelete('cascade');
       });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seguimiento_tareas');
    }
}
