@extends('layouts.admin')
@section('content')
@include('alerts.request')
{!!Form::open(['route'=>'aplazamientoTarea.store','method'=>'POST'])!!}
@include('aplazamientoTarea.forms.aplazamiento')
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
@stop