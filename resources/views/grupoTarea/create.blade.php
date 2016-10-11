
@extends('layouts.admin')
@section('content')
@include('alerts.request')
{!!Form::open(['route'=>'grupoTarea.store','method'=>'POST'])!!}
@include('grupoTarea.forms.grupoTarea')
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
@stop