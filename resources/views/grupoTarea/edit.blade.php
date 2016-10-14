@extends('layouts.admin')
@section('content')
@include('alerts.request')
{!! Form::model($grupo, ['route' => ['grupoTarea.update', $grupo->id], 'method' => 'patch']) !!}
@include('grupoTarea.forms.grupoTarea')
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
@stop