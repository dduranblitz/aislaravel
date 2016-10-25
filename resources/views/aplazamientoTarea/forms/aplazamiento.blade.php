<h2>Agregar Aplazamiento a Tarea</h2>
<div class="form-group">
{!!Form::label('Seleccione la Tarea (se cargara la fecha de finalizacion actual abajo):')!!}
{!!Form::select('tarea',array('' => 'Seleccione la tarea')+$tareas,null,['id'=>'tareaAplazada','class'=>'form-control'])!!}
</div>
<div id="divFechaFinalTarea" class="form-group"  >
{!!Form::label('Fecha actual de finalizacion tarea:')!!}
{!!Form::date('fechaFinalTarea', null, ['id'=>'fechaFinalTarea','class' => 'form-control', 'readonly' => 'readonly'])!!}
</div>
<div id="divNuevaFechaFinal" class="form-group"  >
{!!Form::label('Nueva Fecha Finalizacion tarea ( seleccione una nueva, la tarea sera actualizada con esta nueva fecha final):')!!}
{!!Form::date('nuevaFechaFinalTarea', null, ['id'=>'nuevaFechaFinalTarea','class' => 'form-control'])!!}
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
{!!Form::label('Fecha Registro Aplazamiento:')!!}
{!!Form::date('fecha', '', ['id'=>'fecha','class' => 'form-control'])!!}
</div>
