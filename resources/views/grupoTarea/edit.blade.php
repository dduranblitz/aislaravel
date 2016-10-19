@extends('layouts.admin')
@section('content')
@include('alerts.request')
{!! Form::model($grupo, ['route' => ['grupoTarea.update', $grupo->id], 'method' => 'patch']) !!}
@include('grupoTarea.forms.grupoTarea')
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
<br>
{!!Form::open(['route'=>['grupoTarea.destroy',$grupo->id],'method'=>'DELETE'])!!}
{!!Form::submit('Eliminar',['class'=>'btn btn-danger '])!!}
{!!Form::close()!!}
@stop