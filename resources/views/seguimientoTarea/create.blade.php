@extends('layouts.admin')
@section('content')
@include('alerts.request')
{!!Form::open(['route'=>'seguimientoTarea.store','method'=>'POST'])!!}
@include('seguimientoTarea.forms.seguimiento')
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
@stop