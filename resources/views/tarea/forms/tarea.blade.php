<div class="form-group">
{!!Form::label('Nombre tarea:')!!}
{!!Form::text('nombreTarea',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la tarea'])!!}
</div>
<div class="form-group">
{!!Form::label('Tarea ciclica:')!!}
{!!Form::select('tareaCiclica', array('' => '','si' => 'SI', 'no' => 'NO'),null,['id'=>'tareaCiclica','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Fecha inicio:')!!}
{!!Form::date('fechaInicio', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Fecha final:')!!}
{!!Form::date('fechaFinal', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Ciclo tarea:')!!}
{!!Form::select('cicloTarea', array('diaria' => 'DIARIA', 'semanal' => 'SEMANAL','mensual' => 'MENSUAL'),null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Autor:')!!}
{!!Form::select('autor', array('1' => 'JOSE', '2' => 'MARIO','3' => 'DIEGO'),null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Responsable:')!!}
{!!Form::select('tipoResponsable', array('persona' => 'PERSONA', 'grupo' => 'GRUPO'),null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Persona Responsable:')!!}
{!!Form::select('personaResponsable', array('1' => 'JOSE', '2' => 'MARIO','3' => 'DIEGO'),null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Grupo Responsable:')!!}
{!!Form::select('grupoResponsable', array('1' => 'GRUPO 1', '2' => 'GRUPO 2','3' => 'GRUPO 3'),null,['class'=>'form-control'])!!}</div>
<div class="form-group">
{!!Form::label('Observador:')!!}
{!!Form::select('observador', array('1' => 'JOSE', '2' => 'MARIO','3' => 'DIEGO'),null,['class'=>'form-control'])!!}
</div>
