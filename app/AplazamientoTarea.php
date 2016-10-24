<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class AplazamientoTarea extends Model
{
       protected  $table="aplazamiento_tareas";
       protected $fillable = ['tarea', 'autor','nombreAplazamiento','descripcionAplazamiento','fecha']; 
  
}
