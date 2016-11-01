<?php namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
   protected  $table="tareas";

   protected $fillable = ['nombreTarea', 'tareaCiclica','fechaInicio','fechaFinal','cicloTarea','autor','tipoResponsable','personaResponsable','grupoResponsable','observador'];



 /////funcion que retorna la matriz de tareas json
   public static function calendarioJsonTareas(){
        $calendarioJsonTareas = \DB::table('tareas')->select('id','nombreTarea','fechaInicio','fechaFinal','tareaCiclica','cicloTarea','autor','tipoResponsable','personaResponsable','grupoResponsable','estadoTarea','estadoTarea')->get();
        $coleccionJsonTareas = collect();
        
      
       ////armar coleccion
        foreach($calendarioJsonTareas as $calendario){

         $id = $calendario->id;
         $title = $calendario->nombreTarea;
         $start = $calendario->fechaInicio;
         $estadoTareaId = $calendario->estadoTarea;
         $autorTareaId = $calendario->autor;
         $end = $calendario->fechaFinal;
         $personaResponsableId= $calendario->personaResponsable;
         $grupoResponsableId= $calendario->grupoResponsable;
         $allDay = false;

         $estadoTarea='';
         if($calendario->estadoTarea==1){ $estadoTarea='Sin Aprobar';}
         if($calendario->estadoTarea==2){ $estadoTarea='Aprobada';}
         if($calendario->estadoTarea==3){ $estadoTarea='Rechazada';}
         if($calendario->estadoTarea==4){ $estadoTarea='Finalizada';}     

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

          $title = $title." | Estado : ".$estadoTarea;
       	  
       	 if($id%2==0){ 
       	 $coleccionJsonTareas->push(['id'=>$id,'title'=>$title,'start'=>$start,'end'=>$end,'allDay'=>$allDay,'color'=>'red','estadoTareaId'=>$estadoTareaId, 'autorTareaId'=>$autorTareaId, 'personaResponsableId'=>$personaResponsableId,'grupoResponsableId'=>$grupoResponsableId]);
          }

          if($id%2!=0){ 
       	$coleccionJsonTareas->push(['id'=>$id,'title'=>$title,'start'=>$start,'end'=>$end,'allDay'=>$allDay,'estadoTareaId'=>$estadoTareaId,'autorTareaId'=>$autorTareaId,'personaResponsableId'=>$personaResponsableId,'grupoResponsableId'=>$grupoResponsableId]);
          }

        } 

      return  $coleccionJsonTareas;
 } 




 



}