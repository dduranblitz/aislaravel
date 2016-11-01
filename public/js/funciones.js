$( document ).ready(function() {

///////funciones de crear tareas
if($("#tareaCiclica").val()=="si"){
       $( "#divCicloTarea" ).removeClass('hidden');
       $( "#divFechaInicio" ).removeClass('hidden');
       $( "#divFechaFinal" ).removeClass('hidden');
     
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
      $( "#divFechaInicio" ).removeClass('hidden');
      $( "#divFechaFinal" ).removeClass('hidden');
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

///////////eliminar integrantes a grupo selects dependientes, añade al select integrantes  son del grupo

$("#selectIdGrupoEliminar").change(function(event){
   if(event.target.value==''){
      $("#selectIdUsuarioEliminar").empty();
      return false;
     }

$.get("integrantesGrupoEliminar/"+event.target.value+"",function(response,state){
    $("#selectIdUsuarioEliminar").empty();
    console.log(response);
    for(i=0; i<response.length;i++){
      $("#selectIdUsuarioEliminar").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
    }
  });

});



/////calendario
   $('#calendar').fullCalendar({
       timeFormat: ' ',
       events: {
            url: 'calendarioJsonTareas',
            type: 'GET', // Send post data
            error: function() {
                alert('There was an error while fetching events.');
            },
          
        }


    })


//////////////traer fecha finalizacion tarea by id cuando es creacion aplazamiento
$("#tareaAplazada").change(function(event){

  if(event.target.value==''){
      $("#fechaFinalTarea").val(null);
        return false;
      }


$.get("fechaFinalTarea/"+event.target.value+"",function(response,state){
      $("#fechaFinalTarea").val(response);
  });

});


//////////////traer fecha finalizacion tarea by id cuando es una edicion de aplazamiento
$("#tareaAplazadaEdicion").change(function(event){

  if(event.target.value==''){
      $("#fechaFinalizacionUltima").val(null);
        return false;
      }


$.get("../fechaFinalTarea/"+event.target.value+"",function(response,state){
      console.log(response)
      $("#fechaFinalizacionUltima").val(response);
  });

});


//////////////traer porcentaje de avance tarea cuando crea un seguimiento
$("#tareaSeguimiento").change(function(event){

  if(event.target.value==''){
      $("#avanceTarea").val('');
        return false;
      }


$.get("avanceTarea/"+event.target.value+"",function(response,state){
      console.log(response)
      $("#avanceTarea").val(response);
  });

});

//////////////traer porcentaje de avance tarea cuando edita un seguimiento
$("#tareaSeguimientoEdicion").change(function(event){

  if(event.target.value==''){
      $("#avanceTarea").val('');
        return false;
      }


$.get("../avanceTarea/"+event.target.value+"",function(response,state){
      console.log(response)
      $("#avanceTarea").val(response);
  });

});


function cargarCalendarioFiltrado(filtro) {
 estadoTareaId=$( "#estadoTareaFiltrar" ).val();
 autorTareaId=$( "#autorTareaFiltrar" ).val();
 fechaInicio=$( "#fechaInicioFiltro" ).val();
 fechaFin=$( "#fechaFinalFiltro" ).val();
 personaResponsableId=$( "#personaResponsableTareaFiltrar" ).val();
 grupoResponsableId=$( "#grupoResponsableTareaFiltrar" ).val();

 $('#calendar').fullCalendar( 'removeEvents');
 $.get("calendarioJsonTareas",function(response,state){
  console.log(response);
    
 for (var i = 0; i <= response.length; i++) {
       elemento = response[i];
       titulo = elemento.title;
       start = elemento.start;
       end = elemento.end;
       color = elemento.color;
       

 /////////filtrar por estado tarea
  if(filtro=='estado'){
   if(elemento.estadoTareaId==estadoTareaId){
   var newEvent = {
                title: titulo,
                start: start,
                end: end,
                color : color
            };
   $('#calendar').fullCalendar( 'renderEvent', newEvent ); 
  }
}
  
///////si filtro tarea es por autor tarea
 if(filtro=='autor'){
   if(elemento.autorTareaId==autorTareaId){
   var newEvent = {
                title: titulo,
                start: start,
                end: end,
                color : color
            };
   $('#calendar').fullCalendar( 'renderEvent', newEvent ); 
  }
}

//////////////////////////si filtro es por fecha
if(filtro=='fecha'){
   if(elemento.start>=fechaInicio && elemento.end<=fechaFin){
   var newEvent = {
                title: titulo,
                start: start,
                end: end,
                color : color
            };
   $('#calendar').fullCalendar( 'renderEvent', newEvent ); 
  }
}

///////////filtro por persona responsable
if(filtro=='personaResponsable'){
   if(elemento.personaResponsableId==personaResponsableId){
   var newEvent = {
                title: titulo,
                start: start,
                end: end,
                color : color
            };
   $('#calendar').fullCalendar( 'renderEvent', newEvent ); 
  }
}
///////////filtro grupo responsable
if(filtro=='grupoResponsable'){
   if(elemento.grupoResponsableId==grupoResponsableId){
   var newEvent = {
                title: titulo,
                start: start,
                end: end,
                color : color
            };
   $('#calendar').fullCalendar( 'renderEvent', newEvent ); 
  }
}




}


    

  

}); 
     
 
 
 


}

 
/////////////////////filtrar calendario con los selects
$( "#tipoFiltroTarea" ).change(function() {
  if($("#tipoFiltroTarea").val()=="filtroEstado"){
        $( "#divFiltroEstado" ).removeClass('hidden');
        $( "#divFiltroAutor" ).addClass('hidden');
        $( "#divFiltroFecha" ).addClass('hidden');
        $( "#divFiltroPersonaResponsable" ).addClass('hidden');
        $( "#divFiltroGrupoResponsable" ).addClass('hidden');
       } 

  if($("#tipoFiltroTarea").val()=="filtroAutor"){
        $( "#divFiltroEstado" ).addClass('hidden');
        $( "#divFiltroAutor" ).removeClass('hidden');
        $( "#divFiltroFecha" ).addClass('hidden');
        $( "#divFiltroPersonaResponsable" ).addClass('hidden');
        $( "#divFiltroGrupoResponsable" ).addClass('hidden');
       } 

  if($("#tipoFiltroTarea").val()=="filtroFecha"){
        $( "#divFiltroEstado" ).addClass('hidden');
        $( "#divFiltroAutor" ).addClass('hidden');
        $( "#divFiltroFecha" ).removeClass('hidden');
        $( "#divFiltroPersonaResponsable" ).addClass('hidden');
        $( "#divFiltroGrupoResponsable" ).addClass('hidden');
       } 
   if($("#tipoFiltroTarea").val()=="filtroPersonaResponsable"){
        $( "#divFiltroEstado" ).addClass('hidden');
        $( "#divFiltroAutor" ).addClass('hidden');
        $( "#divFiltroFecha" ).addClass('hidden');
        $( "#divFiltroPersonaResponsable" ).removeClass('hidden');
        $( "#divFiltroGrupoResponsable" ).addClass('hidden');
      } 
   if($("#tipoFiltroTarea").val()=="filtroGrupoResponsable"){
        $( "#divFiltroEstado" ).addClass('hidden');
        $( "#divFiltroAutor" ).addClass('hidden');
        $( "#divFiltroFecha" ).addClass('hidden');
        $( "#divFiltroPersonaResponsable" ).addClass('hidden');
        $( "#divFiltroGrupoResponsable" ).removeClass('hidden');
      } 

      
    


});

$( "#estadoTareaFiltrar" ).change(function() {
 cargarCalendarioFiltrado('estado');
});

$( "#autorTareaFiltrar" ).change(function() {
 cargarCalendarioFiltrado('autor');
});

$( "#filtrarFechaBtn" ).click(function() {
  cargarCalendarioFiltrado('fecha');
});

$( "#personaResponsableTareaFiltrar" ).change(function() {
 cargarCalendarioFiltrado('personaResponsable');
});

$( "#grupoResponsableTareaFiltrar" ).change(function() {
 cargarCalendarioFiltrado('grupoResponsable');
});


///document ready fin
 
});