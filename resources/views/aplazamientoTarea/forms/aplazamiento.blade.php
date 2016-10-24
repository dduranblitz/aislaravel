<h2>Agregar Aplazamiento a Tarea</h2>
<div class="form-group">
{!!Form::label('Tarea:')!!}
{!!Form::select('tarea',array('' => 'Seleccione la tarea')+$tareas,null,['id'=>'tarea','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Autor Aplazamiento:')!!}
{!!Form::select('autor',array('' => 'Seleccione el autor')+$autor,null,['id'=>'autor','class'=>'form-control'])!!}
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
{!!Form::label('Fecha Aplazamiento:')!!}
{!!Form::date('fecha', '', ['id'=>'fecha','class' => 'form-control'])!!}
</div>