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
            $table->string('nombre_tarea',100);
            $table->string('tarea_ciclica',10);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->string('ciclo_tarea',50)->nullable();
            $table->string('autor',100);
            $table->string('tipo_responsable',50);
            $table->string('persona_responsable',100)->nullable();
            $table->string('grupo_responsable',100)->nullable();
            $table->string('observador',100)->nullable();
            $table->string('editada',10)->nullable();
            $table->string('estado_tarea',50)->nullable();
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
