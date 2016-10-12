<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class IntegrantesGrupo extends Model
{
      protected  $table="integrantes_grupos";
      protected $fillable = ['idUsuario','idGrupo'];
}
