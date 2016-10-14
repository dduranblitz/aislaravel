<h2>Eliminar Integrante Grupo</h2>
<div class="form-group">
{!!Form::label('Grupo:')!!}
{!!Form::select('idGrupoEliminar',array('' => 'Seleccione el grupo')+$grupoTarea,null,['id'=>'selectIdGrupoEliminar','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Integrante a eliminar del grupo:')!!}
{!!Form::select('idUsuarioEliminar',array('' => ''),null,['id'=>'selectIdUsuarioEliminar','class'=>'form-control'])!!}
</div>
