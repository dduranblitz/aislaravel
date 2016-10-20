<div class="form-group">
{!!Form::label('Nombre:')!!}
{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del usuario'])!!}
</div>
<div class="form-group">
{!!Form::label('Correo:')!!}
{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese el correo del usuario'])!!}
</div>
<div class="form-group">
{!!Form::label('Password:')!!}
{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese el password del usuario'])!!}
</div>
<div class="form-group">
{!!Form::label('Rol:(Rol Administrador crea, borra, edita y ve contenido con privilegios)')!!}
{!!Form::select('rol', array('' => 'Seleccione el rol','administrador' => 'ADMINISTRADOR', 'usuario' => 'USUARIO'),null,['id'=>'rol','class'=>'form-control'])!!}
</div>