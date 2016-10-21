<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class SeguimientoTarea extends Model
{
    
   protected  $table="seguimiento_tareas";

   protected $fillable = ['idTarea', 'idAutor','nombreSeguimiento','descripcionSeguimiento','fecha']; 
  

}
