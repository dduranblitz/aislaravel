@extends('layouts.admin')
@section('content')
@include('alerts.request')
{!! Form::model($aplazamiento, ['route' => ['aplazamientoTarea.update', $aplazamiento->id], 'method' => 'patch']) !!}
<h2>Editar Aplazamiento a Tarea</h2>
<div class="form-group">
{!!Form::label('Seleccione la Tarea (se cargara la fecha de finalizacion actual abajo):')!!}
{!!Form::select('tarea',$tareas,null,['id'=>'tareaAplazadaEdicion','class'=>'form-control'])!!}
</div>
<div id="divFechaFinalTarea" class="form-group"  >
{!!Form::label('Fecha actual de finalizacion tarea:')!!}
{!!Form::date('fechaFinalizacionUltima', null, ['id'=>'fechaFinalizacionUltima','class' => 'form-control', 'readonly' => 'readonly'])!!}
</div>
<div id="divNuevaFechaFinal" class="form-group"  >
{!!Form::label('Nueva Fecha Finalizacion tarea ( seleccione una nueva, la tarea sera actualizada con esta nueva fecha final):')!!}
{!!Form::date('fechaFinalizacionUltimaEdicion', null, ['id'=>'fechaFinalizacionUltimaEdicion','class' => 'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Autor Aplazamiento:')!!}
{!!Form::select('autor',$autor,null,['id'=>'autor','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Nombre Aplazamiento:')!!}
{!!Form::text('nombreAplazamiento',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del aplazamiento'])!!}
</div>
<div class="form-group">
{!!Form::label('Descripcion Aplazamiento:')!!}
{!!Form::textarea('descripcionAplazamiento',null,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','size' => '30x4'])!!}
</div>
<div class="form-group"  >
{!!Form::label('Fecha Registro Aplazamiento:')!!}
{!!Form::date('fecha', null, ['id'=>'fecha','class' => 'form-control'])!!}
</div>

{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
<br>
{!!Form::open(['route'=>['aplazamientoTarea.destroy',$aplazamiento->id],'method'=>'DELETE'])!!}
{!!Form::submit('Eliminar',['class'=>'btn btn-danger '])!!}
{!!Form::close()!!}
<br><br>
@stop