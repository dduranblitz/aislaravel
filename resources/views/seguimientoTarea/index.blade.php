@extends('layouts.admin')
@include('alerts.success')
@section('content')
<table class="table">
	<thead>
		<th>Tarea</th>
		<th>Autor Seguimiento</th>
		<th>Nombre Seguimiento</th>
		<th>Descripción Seguimiento</th>
	    <th>Fecha Registro</th>
		<th>Acciones</th>
	</thead>
   @foreach ($seguimientos as $seguimiento) 
	<tbody>
		<td>{{DB::table('tareas')->where('id', $seguimiento->idTarea)->value('nombreTarea')}}</td>
		<td>{{DB::table('users')->where('id', $seguimiento->idAutor)->value('name')}}</td>
		<td>{{$seguimiento->nombreSeguimiento}}</td>
		<td>{{$seguimiento->descripcionSeguimiento}}</td>
		<td>{{$seguimiento->fecha}}</td>
		<td>
	    @if($rol=='administrador')
		{!!link_to_route('seguimientoTarea.edit', $title = 'Editar', $parameters = $seguimiento->id, $attributes = ['class'=>'btn btn-primary'])!!}	
        @elseif($rol=='usuario')
        <p style="color:red">No tiene los privilegios</p>
        @endif			
        </td>
	</tbody>
	@endforeach
</table>
{!!$seguimientos->render()!!}
@stop

