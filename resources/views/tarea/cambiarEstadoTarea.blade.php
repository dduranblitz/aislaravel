@extends('layouts.admin')
@include('alerts.success')
@section('content')
<table class="table">
	<thead>
		<th>Nombre de Tarea</th>
		<th>Estado Actual Tarea</th>
		<th>Acciones Tarea</th>
    </thead>
   @foreach ($tareas as $tarea) 
	<tbody>
		<td>{{$tarea->nombreTarea}}</td>
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
		@if($tarea->estadoTarea==1)
         {!!link_to_route('tarea.setear', $title = 'Aprobar',  $parameters = [$tarea->id, 2 ], $attributes = ['class'=>'btn btn-primary'])!!}
         {!!link_to_route('tarea.setear', $title = 'Rechazar', $parameters = [$tarea->id, 3 ], $attributes = ['class'=>'btn btn-primary'])!!}
        @endif 
        @if($tarea->estadoTarea==2)
         {!!link_to_route('tarea.setear', $title = 'Finalizar', $parameters = [$tarea->id, 4 ], $attributes = ['class'=>'btn btn-primary'])!!}
        @endif
		</td>
	</tbody>
	@endforeach
</table>
{!!$tareas->render()!!}
@stop