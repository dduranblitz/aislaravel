<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class AplazamientoTarea extends Model
{
       protected  $table="aplazamiento_tareas";
       protected $fillable = ['tarea', 'autor','nombreAplazamiento','descripcionAplazamiento','fecha','fechaFinalizacionInicial','fechaFinalizacionUltima']; 



       /////funcion que retorna la fecha final de una tarea por su id
   public static function fechaFinalTarea($id){
        $fechaFinalTarea = \DB::table('tareas')->select('fechaFinal')->where('id','=',$id)->first();
        return   $fechaFinalTarea->fechaFinal;
    }

  
}
