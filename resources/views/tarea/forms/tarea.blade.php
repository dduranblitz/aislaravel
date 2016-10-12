<div class="form-group">
{!!Form::label('Nombre tarea:')!!}
{!!Form::text('nombreTarea',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la tarea'])!!}
</div>
<div class="form-group">
{!!Form::label('Tarea ciclica:')!!}
{!!Form::select('tareaCiclica', array('' => '','si' => 'SI', 'no' => 'NO'),null,['id'=>'tareaCiclica','class'=>'form-control'])!!}
</div>
<div class="form-group hidden" id="divFechaInicio" >
{!!Form::label('Fecha inicio tarea:')!!}
{!!Form::date('fechaInicio', \Carbon\Carbon::now(), ['id'=>'fechaInicio','class' => 'form-control'])!!}
</div>
<div class="form-group hidden"  id="divFechaFinal">
{!!Form::label('Fecha final tarea:')!!}
{!!Form::date('fechaFinal', \Carbon\Carbon::now(), ['id'=>'fechaFinal','class' => 'form-control'])!!}
</div>
<div class="form-group hidden" id="divCicloTarea">
{!!Form::label('Ciclo tarea:')!!}
{!!Form::select('cicloTarea', array('semanal' => 'SEMANAL', 'mensual' => 'MENSUAL','anual' => 'ANUAL'),null,['id'=>'cicloTarea','class'=>'form-control '])!!}
</div>
<div class="form-group">
{!! Form::label('Autor') !!}
{!! Form::select('autor',array('' => '')+$usuarios, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
{!!Form::label('Tipo Responsable:')!!}
{!!Form::select('tipoResponsable', array('' => '','persona' => 'PERSONA', 'grupo' => 'GRUPO'),null,['id'=>'tipoResponsable','class'=>'form-control'])!!}
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
{!!Form::select('observador',array('' => '')+$usuarios,null,['class'=>'form-control'])!!}
</div>
