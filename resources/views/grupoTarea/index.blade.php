@extends('layouts.admin')
@include('alerts.success')
@section('content')
<table class="table">
	<thead>
		<th>Nombre Grupo</th>
		<th>Descripcion Grupo</th>
		<th>Acciones</th>
	</thead>
   @foreach ($grupoTarea as $grupo) 
	<tbody>
		<td>{{$grupo->nombre}}</td>
		<td>{{$grupo->descripcion}}</td>
		<td>
		{!!link_to_route('grupoTarea.edit', $title = 'Editar', $parameters = $grupo->id, $attributes = ['class'=>'btn btn-primary'])!!}	

		</td>
	</tbody>
	@endforeach
</table>
{!!$grupoTarea->render()!!}
@stop

