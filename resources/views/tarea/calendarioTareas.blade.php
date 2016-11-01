@extends('layouts.admin')
@section('content')
<div class="form-group">
{!!Form::label('Filtrar calendario por:')!!}
{!!Form::select('claseFiltro',array('' => 'Seleccione el Filtro','filtroEstado' => 'Filtrar por estado','filtroAutor' => 'Filtrar por autor','filtroFecha' => 'Filtrar por fecha','filtroPersonaResponsable' => 'Filtrar por persona responsable',
'filtroGrupoResponsable' => 'Filtrar por grupo responsable'),null,['id'=>'tipoFiltroTarea','class'=>'form-control'])!!}
</div>
<div class="form-group hidden" id="divFiltroEstado">
{!!Form::label('Filtrar por estado:')!!}
{!!Form::select('estadoTareaFiltrar',array('' => 'Seleccione el estado','1' => 'Sin aprobar','2' => 'Aprobada','3' => 'Rechazada','4' => 'Finalizada'),null,['id'=>'estadoTareaFiltrar','class'=>'form-control'])!!}
</div>
<div class="form-group hidden" id="divFiltroAutor">
{!! Form::label('Filtrar por autor de la tarea') !!}
{!! Form::select('autorTareaFiltrar',array('' => 'Seleccione autor')+$usuarios, null, ['id'=>'autorTareaFiltrar','class' => 'form-control']) !!}
</div>
<div class="form-group hidden"  id="divFiltroFecha">
{!!Form::label('Fecha inicio tarea:')!!}
{!!Form::date('fechaInicioFiltro', \Carbon\Carbon::now(), ['id'=>'fechaInicioFiltro','class' => 'form-control'])!!}
{!!Form::label('Fecha final tarea:')!!}
{!!Form::date('fechaFinalFiltro', \Carbon\Carbon::now(), ['id'=>'fechaFinalFiltro','class' => 'form-control'])!!}
<br>
{!!Form::button('Filtrar por fecha',['class'=>'btn btn-primary','id'=>'filtrarFechaBtn'])!!}
</div>
<div class="form-group hidden" id="divFiltroPersonaResponsable">
{!! Form::label('Filtrar por persona responsable de la tarea') !!}
{!! Form::select('personaResponsableTareaFiltrar',array('' => 'Seleccione persona responsable')+$usuarios, null, ['id'=>'personaResponsableTareaFiltrar','class' => 'form-control']) !!}
</div>
<div class="form-group hidden" id="divFiltroGrupoResponsable">
{!! Form::label('Filtrar por grupo responsable de la tarea') !!}
{!! Form::select('grupoResponsableTareaFiltrar',array('' => 'Seleccione grupo responsable')+$grupos, null, ['id'=>'grupoResponsableTareaFiltrar','class' => 'form-control']) !!}
</div>
<div style="padding:33px;" id='calendar'>
</div>
@stop