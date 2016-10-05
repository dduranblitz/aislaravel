<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreTarea',100);
            $table->string('tareaCiclica',10);
            $table->date('fechaInicio')->nullable();
            $table->date('fechaFinal')->nullable();
            $table->string('cicloTarea',50)->nullable();
            $table->string('autor',100);
            $table->string('tipoResponsable',50);
            $table->string('personaResponsable',100)->nullable();
            $table->string('grupoResponsable',100)->nullable();
            $table->string('observador',100)->nullable();
            $table->string('editada',10)->nullable();
            $table->string('estadoTarea',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tareas');
    }
}
