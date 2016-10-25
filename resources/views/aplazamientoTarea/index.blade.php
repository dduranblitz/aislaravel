@extends('layouts.admin')
@include('alerts.success')
@section('content')
<table class="table">
	<thead>
		<th>Tarea</th>
		<th>Autor Aplazamiento</th>
		<th>Nombre Aplazamiento</th>
		<th>Descripción Aplazamiento</th>
		<th>Fecha Final Tarea Antes Aplaz.</th>
		<th>Fecha Final Tarea Despues Aplaz.</th>
	    <th>Fecha Registro</th>
		<th>Acciones</th>
	</thead>
   @foreach ($aplazamientos as $aplazamiento) 
	<tbody>
		<td>{{DB::table('tareas')->where('id', $aplazamiento->tarea)->value('nombreTarea')}}</td>
		<td>{{DB::table('users')->where('id', $aplazamiento->autor)->value('name')}}</td>
		<td>{{$aplazamiento->nombreAplazamiento}}</td>
		<td>{{$aplazamiento->descripcionAplazamiento}}</td>
		<td>{{$aplazamiento->fechaFinalizacionInicial}}</td>
		<td>{{$aplazamiento->fechaFinalizacionUltima}}</td>
		<td>{{$aplazamiento->fecha}}</td>
		<td>
	    @if($rol=='administrador')
		{!!link_to_route('aplazamientoTarea.edit', $title = 'Editar', $parameters = $aplazamiento->id, $attributes = ['class'=>'btn btn-primary'])!!}	
        @elseif($rol=='usuario')
        <p style="color:red">No tiene los privilegios</p>
        @endif 		
        </td>
	</tbody>
	@endforeach
</table>
{!!$aplazamientos->render()!!}
@stop

