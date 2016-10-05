<?php namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
   protected  $table="tareas";

   protected $fillable = ['nombreTarea', 'tareaCiclica','fechaInicio','fechaFinal','cicloTarea','autor','tipoResponsable','personaResponsable','grupoResponsable','observador'];


}