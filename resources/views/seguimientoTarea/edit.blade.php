@extends('layouts.admin')
@section('content')
@include('alerts.request')
{!! Form::model($seguimiento, ['route' => ['seguimientoTarea.update', $seguimiento->id], 'method' => 'patch']) !!}
<h2>Agregar Seguimiento a Tarea</h2>
<div class="form-group">
{!!Form::label('Tarea (Seleccione, se cargara el avance actual de la tarea abajo):')!!}
{!!Form::select('idTarea',$tareas,null,['id'=>'tareaSeguimientoEdicion','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Avance Tarea (Se carga el actual, Si elige 100% la tarea sera actualizada como finalizada) :')!!}
{!!Form::select('avanceTarea',array('0' => '0%','5' => '5%','10' => '10%','20' => '20%','30' => '30%','40' => '40%','50' => '50%','60' => '60%','70' => '70%','80' => '80%', '90' => '90%', '100' => '100%' ),$avanceTarea,['id'=>'avanceTarea','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Autor Seguimiento:')!!}
{!!Form::select('idAutor',$autor,null,['id'=>'autor','class'=>'form-control'])!!}
</div>
<div class="form-group">
{!!Form::label('Nombre seguimiento:')!!}
{!!Form::text('nombreSeguimiento',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del seguimiento'])!!}
</div>
<div class="form-group">
{!!Form::label('Descripcion Seguimiento:')!!}
{!!Form::textarea('descripcionSeguimiento',null,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','size' => '30x5'])!!}
</div>
<div class="form-group"  >
{!!Form::label('Fecha Seguimiento:')!!}
{!!Form::date('fecha', null, ['id'=>'fecha','class' => 'form-control'])!!}
</div>
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
<br>
{!!Form::open(['route'=>['seguimientoTarea.destroy',$seguimiento->id],'method'=>'DELETE'])!!}
{!!Form::submit('Eliminar',['class'=>'btn btn-danger '])!!}
{!!Form::close()!!}
@stop