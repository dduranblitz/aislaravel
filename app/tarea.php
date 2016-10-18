<?php namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
   protected  $table="tareas";

   protected $fillable = ['nombreTarea', 'tareaCiclica','fechaInicio','fechaFinal','cicloTarea','autor','tipoResponsable','personaResponsable','grupoResponsable','observador'];



 /////funcion que retorna la matriz de tareas json
   public static function calendarioJsonTareas(){
        $calendarioJsonTareas = \DB::table('tareas')->select('id','nombreTarea','fechaInicio','fechaFinal')->where('tareaCiclica','=','no')->get();
        $coleccionJsonTareas = collect();
        
      
       ////armar coleccion
        foreach($calendarioJsonTareas as $calendario){
         $id = $calendario->id;
         $title = $calendario->nombreTarea;
         $start = $calendario->fechaInicio;
         $end = $calendario->fechaFinal;
         $allDay = false;
       	  
       	 $coleccionJsonTareas->push(['id'=>$id,'title'=>$title,'start'=>$start,'end'=>$end,'allDay'=>$allDay]);
        } 

      return  $coleccionJsonTareas;
 } 




}