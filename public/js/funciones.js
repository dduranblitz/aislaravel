$( document ).ready(function() {

///////funciones de crear tareas
if($("#tareaCiclica").val()=="si"){
       $( "#divCicloTarea" ).removeClass('hidden');
         $( "#divFechaInicio" ).addClass('hidden');
         $( "#divFechaFinal" ).addClass('hidden');
      

     } 

  if($("#tareaCiclica").val()=="no"){
      $( "#divCicloTarea" ).addClass('hidden');
      $( "#divFechaInicio" ).removeClass('hidden');
      $( "#divFechaFinal" ).removeClass('hidden');
   } 

  
  if($("#tareaCiclica").val()==""){
     $( "#divCicloTarea" ).addClass('hidden');
     $( "#divFechaInicio" ).addClass('hidden');
     $( "#divFechaFinal" ).addClass('hidden');
    } 


 
    if($("#tipoResponsable").val()=="persona"){
       $( "#divPersonaResponsable" ).removeClass('hidden');
       $( "#divGrupoResponsable" ).addClass('hidden');
    } 

  if($("#tipoResponsable").val()=="grupo"){
       $( "#divPersonaResponsable" ).addClass('hidden');
       $( "#divGrupoResponsable" ).removeClass('hidden');
     }

  if($("#tipoResponsable").val()==""){
       $( "#divPersonaResponsable" ).addClass('hidden');
       $( "#divGrupoResponsable" ).addClass('hidden');
    } 




////////change de select tarea ciclica
$( "#tareaCiclica" ).change(function() {

  if($("#tareaCiclica").val()=="si"){
    	 $( "#divCicloTarea" ).removeClass('hidden');
         $( "#divFechaInicio" ).addClass('hidden');
         $( "#divFechaFinal" ).addClass('hidden');
     	

     } 

  if($("#tareaCiclica").val()=="no"){
   	  $( "#divCicloTarea" ).addClass('hidden');
      $( "#divFechaInicio" ).removeClass('hidden');
   	  $( "#divFechaFinal" ).removeClass('hidden');
   } 

  
  if($("#tareaCiclica").val()==""){
  	 $( "#divCicloTarea" ).addClass('hidden');
   	 $( "#divFechaInicio" ).addClass('hidden');
   	 $( "#divFechaFinal" ).addClass('hidden');
    }   


});




////change select de tipoResponsable
$( "#tipoResponsable" ).change(function() {

  if($("#tipoResponsable").val()=="persona"){
    	 $( "#divPersonaResponsable" ).removeClass('hidden');
    	 $( "#divGrupoResponsable" ).addClass('hidden');
    } 

  if($("#tipoResponsable").val()=="grupo"){
    	 $( "#divPersonaResponsable" ).addClass('hidden');
    	 $( "#divGrupoResponsable" ).removeClass('hidden');
     }

  if($("#tipoResponsable").val()==""){
    	 $( "#divPersonaResponsable" ).addClass('hidden');
    	 $( "#divGrupoResponsable" ).addClass('hidden');
    }    

 
});






 
});