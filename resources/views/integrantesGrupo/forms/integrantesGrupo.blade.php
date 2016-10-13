<div class="form-group">
{!!Form::label('Grupo:')!!}
{!!Form::select('idGrupo',array('' => 'Seleccione el grupo')+$grupoTarea,null,['id'=>'selectIdGrupo','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Integrante a añadir al grupo:')!!}
{!!Form::select('idUsuario',array('' => ''),null,['id'=>'selectIdUsuario','class'=>'form-control'])!!}
</div>
