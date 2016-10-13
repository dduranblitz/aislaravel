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
            $table->increments('id');
            $table->string('idUsuario',10);
            $table->string('idGrupo',10);
            $table->timestamps();
          //  $table->unique(['idUsuario', 'idGrupo']);
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
