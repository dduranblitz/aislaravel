<div class="form-group">
{!!Form::label('Nombre tarea:')!!}
{!!Form::text('nombreTarea',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la tarea'])!!}
</div>
<div class="form-group">
{!!Form::label('Tarea ciclica:')!!}
{!!Form::select('tareaCiclica', array('si' => 'SI', 'no' => 'NO'),null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Fecha inicio:')!!}
{!!Form::date('fechaInicio', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
</div>