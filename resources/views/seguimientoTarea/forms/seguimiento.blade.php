<h2>Agregar Seguimiento a Tarea</h2>
<div class="form-group">
{!!Form::label('Tarea:')!!}
{!!Form::select('tarea',array('' => 'Seleccione la tarea')+$tareas,null,['id'=>'tarea','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Autor Seguimiento:')!!}
{!!Form::select('autor',array('' => 'Seleccione el autor')+$autor,null,['id'=>'autor','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Nombre seguimiento:')!!}
{!!Form::text('nombreSeguimiento',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del seguimiento'])!!}
</div>
<div class="form-group">
{!!Form::label('Descripcion Seguimiento:')!!}
{!!Form::textarea('descripcionSeguimiento',null,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','size' => '30x4'])!!}
</div>
<div class="form-group"  >
{!!Form::label('Fecha Seguimiento:')!!}
{!!Form::date('fecha', '', ['id'=>'fecha','class' => 'form-control'])!!}
</div>