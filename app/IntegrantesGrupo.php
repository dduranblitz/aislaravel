<?php

namespace Cinema;
use Illuminate\Database\Eloquent\Model;

class IntegrantesGrupo extends Model
{
      protected  $table="integrantes_grupos";
      protected $fillable = ['idUsuario','idGrupo'];


  /////funcion que retorna la matriz de usarios que faltan por agregar al grupo con $id 
   public static function integrantesPorAgregar($id){
     
        $usuariosTotales =  \DB::table('users')->select('id')->where('deleted_at','=',NULL)->get();
        $usuariosGrupo = \DB::table('integrantes_grupos')->select('idUsuario')->where('idGrupo','=',$id)->get();

        ///colecciones a comparar
        $coleccionIdUsuarios = collect();
        $coleccionIdUsuariosGrupo = collect();
        $coleccionFinal=collect();
         ////convertir id usuarios a coleccion
        foreach ($usuariosTotales as $totales){
            $coleccionIdUsuarios->push($totales->id);  
        }            
       ////convertir id usuarios grupo a coleccion
       foreach ($usuariosGrupo as $grupales){
            $coleccionIdUsuariosGrupo->push($grupales->idUsuario);  
        } 
       ////devuelve diferencia id de usuarios sistema con id usuarios de grupo para devolver los usuarios que no estan en grupo 
        $usuariosDiferencia=$coleccionIdUsuarios->diff($coleccionIdUsuariosGrupo);
      
       ////traer los nombres de los usuarios que no estan en el grupo mediante su id
        foreach( $usuariosDiferencia as $diferencia ){
            $usuario = \DB::table('users')->select('id','name')->where('id','=',$diferencia)->first();
       	    $name=$usuario->name;
       	    $id=$usuario->id;
       	    $coleccionFinal->push(['name'=>$name,'id'=>$id]);
        } 

      return  $coleccionFinal;
 }






 /////funcion que retorna la matriz de usarios que se pueden eliminar del grupo con $id 
   public static function integrantesPorEliminar($id){
        $usuariosGrupo = \DB::table('integrantes_grupos')->select('idUsuario')->where('idGrupo','=',$id)->get();
        $coleccionIdUsuariosGrupo = collect();
        $coleccionFinal=collect();
              
       ////convertir id usuarios grupo a coleccion
       foreach ($usuariosGrupo as $grupales){
            $coleccionIdUsuariosGrupo->push($grupales->idUsuario);  
        } 
      
      
       ////traer los nombres de los usuarios que no estan en el grupo mediante su id
        foreach($coleccionIdUsuariosGrupo as $integrantes){
            $usuario = \DB::table('users')->select('id','name')->where('id','=',$integrantes)->first();
       	    $name=$usuario->name;
       	    $id=$usuario->id;
       	    $coleccionFinal->push(['name'=>$name,'id'=>$id]);
        } 

      return  $coleccionFinal;
 }





}
