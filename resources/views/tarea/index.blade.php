@extends('layouts.admin')
@include('alerts.success')
@section('content')
<table class="table table-responsive" style="width:50%;">
	<thead>
		<th>Nombre de Tarea</th>
		<th>Avance Actual</th>
		<th>Tarea Ciclica</th>
		<th>Ciclo Tarea</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Autor Tarea</th>
	    <th>Tipo Responsable</th>
	    <th>Persona Responsable</th>
	    <th>Grupo Responsable</th>
		<th>Observador Tarea</th>
		<th>Estado Tarea</th>
		<th>Acciones Tarea</th>
    </thead>
   @foreach ($tareas as $tarea) 
	<tbody>
		<td>{{$tarea->nombreTarea}}</td>
	    <td>{{$tarea->avanceTarea}}%</td> 
		<td>{{$tarea->tareaCiclica}}</td>
		<td>{{$tarea->cicloTarea}}</td>
        <td>{{$tarea->fechaInicio}}</td>
        <td>{{$tarea->fechaFinal}}</td>
        <td>{{DB::table('users')->where('id', $tarea->autor)->value('name')}}</td>
        <td>{{$tarea->tipoResponsable}}</td>
        <td>{{DB::table('users')->where('id', $tarea->personaResponsable)->value('name')}}</td>
        <td>{{DB::table('grupo_tareas')->where('id', $tarea->grupoResponsable)->value('nombre')}}</td>
        <td>{{DB::table('users')->where('id', $tarea->observador)->value('name')}}</td>
        <td>
	     @if($tarea->estadoTarea==1)
	     Sin aprobar
	     @elseif($tarea->estadoTarea==2)
	     Aprobada
	     @elseif($tarea->estadoTarea==3)
         Rechazada
	     @elseif($tarea->estadoTarea==4)
	     Finalizada
	     @endif
	    </td> 
        <td>
         @if($rol=='administrador')
		   {!!link_to_route('tarea.edit', $title = 'Editar', $parameters = $tarea->id, $attributes = ['class'=>'btn btn-primary'])!!}
         @elseif($rol=='usuario')
		  <p style="color:red">No tiene los privilegios</p>	
         @endif
		</td>
	</tbody>
	@endforeach
</table>
{!!$tareas->render()!!}
@stop