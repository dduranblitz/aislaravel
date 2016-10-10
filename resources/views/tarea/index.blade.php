@extends('layouts.admin')
@include('alerts.success')
@section('content')
<table class="table">
	<thead>
		<th>Nombre</th>
		<th>Tarea Ciclica</th>
		<th>Ciclo Tarea</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Autor</th>
	    <th>Tipo Responsable</th>
	    <th>Persona Responsable</th>
	    <th>Grupo Responsable</th>
		<th>Observador</th>
		<th>Acciones</th>

	</thead>
   @foreach ($tareas as $tarea) 
	<tbody>
		<td>{{$tarea->nombreTarea}}</td>
		<td>{{$tarea->tareaCiclica}}</td>
		<td>{{$tarea->cicloTarea}}</td>
        <td>{{$tarea->fechaInicio}}</td>
        <td>{{$tarea->fechaFinal}}</td>
        <td>{{$tarea->autor}}</td>
        <td>{{$tarea->tipoResponsable}}</td>
        <td>{{$tarea->personaResponsable}}</td>
        <td>{{$tarea->grupoResponsable}}</td>
        <td>{{$tarea->observador}}</td>
        <td>
		{!!link_to_route('tarea.edit', $title = 'Editar', $parameters = $tarea->id, $attributes = ['class'=>'btn btn-primary'])!!}	

		</td>
	</tbody>
	@endforeach
</table>
{!!$tareas->render()!!}
@stop