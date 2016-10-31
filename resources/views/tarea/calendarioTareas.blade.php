@extends('layouts.admin')
@section('content')
<h2>Filtrar Calendarios</h2>
<div class="form-group">
{!!Form::label('Filtrar por estado:')!!}
{!!Form::select('estadoTareaFiltrar',array('' => 'Seleccione el estado','1' => 'Sin aprobar','2' => 'Aprobada','3' => 'Rechazada','4' => 'Finalizada'),null,['id'=>'estadoTareaFiltrar','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!! Form::label('Filtrar por autor de la tarea') !!}
{!! Form::select('autorTareaFiltrar',array('' => 'Seleccione autor')+$usuarios, null, ['id'=>'autorTareaFiltrar','class' => 'form-control']) !!}
</div>
<div class="form-group "  >
{!!Form::label('Filtrar por periodo de tiempo tarea:')!!}
<br>
{!!Form::label('Fecha inicio tarea:')!!}
{!!Form::date('fechaInicioFiltro', \Carbon\Carbon::now(), ['id'=>'fechaInicioFiltro','class' => 'form-control'])!!}
{!!Form::label('Fecha final tarea:')!!}
{!!Form::date('fechaFinalFiltro', \Carbon\Carbon::now(), ['id'=>'fechaFinalFiltro','class' => 'form-control'])!!}
<br>
{!!Form::button('Filtrar por periodo tiempo',['class'=>'btn btn-primary','id'=>'filtrarFechaBtn'])!!}
</div>
<div style="padding:33px;" id='calendar'>
</div>
@stop