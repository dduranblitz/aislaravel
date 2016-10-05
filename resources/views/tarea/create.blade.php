@extends('layouts.admin')

@section('content')
@include('alerts.request')

{!!Form::open(['route'=>'tarea.store','method'=>'POST'])!!}
@include('tarea.forms.tarea')
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
<br><br>
@stop