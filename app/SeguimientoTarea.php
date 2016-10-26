<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class SeguimientoTarea extends Model
{
    
   protected  $table="seguimiento_tareas";

   protected $fillable = ['idTarea', 'idAutor','nombreSeguimiento','descripcionSeguimiento','fecha']; 
  

   public static function avanceTarea($id){
        $tarea = \DB::table('tareas')->select('avanceTarea')->where('id','=',$id)->first();
        return   $tarea->avanceTarea;
    }

  
}
