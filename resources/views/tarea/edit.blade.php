@extends('layouts.admin')

@section('content')
@include('alerts.request')
{!! Form::model($tarea, ['route' => ['tarea.update', $tarea->id], 'method' => 'patch']) !!}
<div class="form-group">
{!!Form::label('Nombre tarea:')!!}
{!!Form::text('nombreTarea',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la tarea'])!!}
</div>
<div class="form-group">
{!!Form::label('Tarea ciclica:')!!}
{!!Form::select('tareaCiclica', array('' => '','si' => 'SI', 'no' => 'NO'),null,['id'=>'tareaCiclica','class'=>'form-control'])!!}
</div>
@if($tarea->tareaCiclica=="no")
<div class="form-group hidden" id="divFechaInicio" >
{!!Form::label('Fecha inicio tarea:')!!}
{!!Form::date('fechaInicio', null, ['id'=>'fechaInicio','class' => 'form-control'])!!}
</div>
<div class="form-group hidden"  id="divFechaFinal">
{!!Form::label('Fecha final tarea:')!!}
{!!Form::date('fechaFinal', null, ['id'=>'fechaFinal','class' => 'form-control'])!!}
</div>
@endif
@if($tarea->tareaCiclica=="si")
<div class="form-group hidden" id="divFechaInicio" >
{!!Form::label('Fecha inicio tarea:')!!}
{!!Form::date('fechaInicio', \Carbon\Carbon::now(), ['id'=>'fechaInicio','class' => 'form-control'])!!}
</div>
<div class="form-group hidden"  id="divFechaFinal">
{!!Form::label('Fecha final tarea:')!!}
{!!Form::date('fechaFinal', \Carbon\Carbon::now(), ['id'=>'fechaFinal','class' => 'form-control'])!!}
</div>
@endif
<div class="form-group hidden" id="divCicloTarea">
{!!Form::label('Ciclo tarea:')!!}
{!!Form::select('cicloTarea', array('semanal' => 'SEMANAL', 'mensual' => 'MENSUAL','anual' => 'ANUAL'),null,['id'=>'cicloTarea','class'=>'form-control '])!!}
</div>
<div class="form-group">
{!! Form::label('Autor') !!}
{!! Form::select('autor',$usuarios, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
{!!Form::label('Tipo Responsable:')!!}
{!!Form::select('tipoResponsable', array('persona' => 'PERSONA', 'grupo' => 'GRUPO'),null,['id'=>'tipoResponsable','class'=>'form-control'])!!}
</div>
<div class="form-group hidden"  id="divPersonaResponsable">
{!!Form::label('Persona Responsable:')!!}
{!!Form::select('personaResponsable', $usuarios,null,['id'=>'personaResponsable','class'=>'form-control'])!!}
</div>
<div class="form-group hidden" id="divGrupoResponsable">
{!!Form::label('Grupo Responsable:')!!}
{!!Form::select('grupoResponsable', $grupoTarea,null,['id'=>'grupoResponsable','class'=>'form-control'])!!}</div>
<div class="form-group">
{!!Form::label('Observador:')!!}
{!!Form::select('observador',$usuarios,null,['class'=>'form-control'])!!}
</div>
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
<br>
{!!Form::open(['route'=>['tarea.destroy',$tarea->id],'method'=>'DELETE'])!!}
{!!Form::submit('Eliminar',['class'=>'btn btn-danger '])!!}
{!!Form::close()!!}
<br><br>
@stop