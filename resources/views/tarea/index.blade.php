@extends('layouts.admin')
@include('alerts.success')
@section('content')
<table class="table">
	<thead>
		<th>Nombre de Tarea</th>
		<th>Tarea Ciclica</th>
		<th>Ciclo Tarea</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Autor Tarea</th>
	    <th>Tipo Responsable</th>
	    <th>Persona Responsable</th>
	    <th>Grupo Responsable</th>
		<th>Observador Tarea</th>
		<th>Acciones Tarea</th>

	</thead>
   @foreach ($tareas as $tarea) 
	<tbody>
		<td>{{$tarea->nombreTarea}}</td>
		<td>{{$tarea->tareaCiclica}}</td>
		<td>{{$tarea->cicloTarea}}</td>
        <td>{{$tarea->fechaInicio}}</td>
        <td>{{$tarea->fechaFinal}}</td>
        <td>{{DB::table('users')->where('id', $tarea->autor)->value('name')}}</td>
        <td>{{$tarea->tipoResponsable}}</td>
        <td>{{DB::table('users')->where('id', $tarea->personaResponsable)->value('name')}}</td>
        <td>{{$tarea->grupoResponsable}}</td>
        <td>{{DB::table('users')->where('id', $tarea->observador)->value('name')}}</td>
        <td>
		{!!link_to_route('tarea.edit', $title = 'Editar', $parameters = $tarea->id, $attributes = ['class'=>'btn btn-primary'])!!}	

		</td>
	</tbody>
	@endforeach
</table>
{!!$tareas->render()!!}
@stop