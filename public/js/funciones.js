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



///////////agregar integrantes a grupo selects dependientes, añade al select integrantes que no son del grupo

$("#selectIdGrupo").change(function(event){
   if(event.target.value==''){
      $("#selectIdUsuario").empty();
      return false;
     }

$.get("integrantesGrupo/"+event.target.value+"",function(response,state){
    $("#selectIdUsuario").empty();
    console.log(response);
    for(i=0; i<response.length;i++){
      $("#selectIdUsuario").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
    }
  });

});




  
///document ready fin
 
});