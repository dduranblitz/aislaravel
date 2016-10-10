@extends('layouts.admin')
@include('alerts.success')
@section('content')
<table class="table">
	<thead>
		<th>Nombre</th>
		<th>Autor</th>
		<th>Observador</th>
	</thead>
   @foreach ($tareas as $tarea) 
	<tbody>
		<td>{{$tarea->nombreTarea}}</td>
		<td>{{$tarea->autor}}</td>
		<td>
		{!!link_to_route('tarea.edit', $title = 'Editar', $parameters = $tarea->id, $attributes = ['class'=>'btn btn-primary'])!!}	

		</td>
	</tbody>
	@endforeach
</table>
{!!$tareas->render()!!}
@stop