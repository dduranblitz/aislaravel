<?php namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
   protected  $table="tareas";

   protected $fillable = ['nombreTarea', 'tareaCiclica','fechaInicio','fechaFinal','cicloTarea','autor','tipoResponsable','personaResponsable','grupoResponsable','observador'];



 /////funcion que retorna la matriz de tareas json
   public static function calendarioJsonTareas(){
        $calendarioJsonTareas = \DB::table('tareas')->select('id','nombreTarea','fechaInicio','fechaFinal','tareaCiclica','cicloTarea','autor','tipoResponsable','personaResponsable','grupoResponsable')->get();
        $coleccionJsonTareas = collect();
        
      
       ////armar coleccion
        foreach($calendarioJsonTareas as $calendario){
         $id = $calendario->id;
         $title = $calendario->nombreTarea;
         $start = $calendario->fechaInicio;
         $end = $calendario->fechaFinal;
         $allDay = false;
         if($calendario->tareaCiclica=='si'){
           $title = $title." | Ciclica : ".$calendario->cicloTarea;
         }

         $autor = \DB::table('users')->where('id', $calendario->autor)->first();
         $title = $title." | Autor : ".$autor->name;

         if($calendario->tipoResponsable=='persona'){
           $personaResponsable = \DB::table('users')->where('id', $calendario->personaResponsable)->first();
           $title = $title." | P. Responsable : ".$personaResponsable->name;

         }

          if($calendario->tipoResponsable=='grupo'){
           $grupoResponsable = \DB::table('grupo_tareas')->where('id', $calendario->grupoResponsable)->first();
           $title = $title." | G. Responsable : ".$grupoResponsable->nombre;

         }
       	  
       	 if($id%2==0){ 
       	 $coleccionJsonTareas->push(['id'=>$id,'title'=>$title,'start'=>$start,'end'=>$end,'allDay'=>$allDay,'color'=>'red']);
          }

          if($id%2!=0){ 
       	 $coleccionJsonTareas->push(['id'=>$id,'title'=>$title,'start'=>$start,'end'=>$end,'allDay'=>$allDay]);
          }

        } 

      return  $coleccionJsonTareas;
 } 




}