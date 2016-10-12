<div class="form-group">
{!!Form::label('Grupo:')!!}
{!!Form::select('idGrupo',$grupoTarea,null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Integrante a añadir al grupo:')!!}
{!!Form::select('idUsuario',$usuarios,null,['class'=>'form-control'])!!}
</div>
