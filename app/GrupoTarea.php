<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class GrupoTarea extends Model
{
      protected  $table="grupo_tareas";
      protected $fillable = ['nombre','descripcion'];

}


