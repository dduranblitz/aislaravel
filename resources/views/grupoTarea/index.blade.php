@extends('layouts.admin')
@include('alerts.success')
@section('content')
<table class="table">
	<thead>
		<th>Nombre Grupo</th>
		<th>Descripcion Grupo</th>
		<th>Integrantes</th>
		<th>Acciones</th>
	</thead>
   @foreach ($grupoTarea as $grupo) 
	<tbody>
		<td>{{$grupo->nombre}}</td>
		<td>{{$grupo->descripcion}}</td>
		<td>@foreach ($integrantesGrupo as $integrantes)   
            @if ( $integrantes->idGrupo == $grupo->id)
                {{DB::table('users')->where('id', $integrantes->idUsuario)->value('name')}} <br>
             @endif
            @endforeach</td>
		<td>
	    @if($rol=='administrador')
		{!!link_to_route('grupoTarea.edit', $title = 'Editar', $parameters = $grupo->id, $attributes = ['class'=>'btn btn-primary'])!!}	
        @elseif($rol=='usuario')
        <p style="color:red">No tiene los privilegios</p>
        @endif	
		</td>
	</tbody>
	@endforeach
</table>
{!!$grupoTarea->render()!!}
@stop

