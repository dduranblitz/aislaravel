
@extends('layouts.admin')
@section('content')
@include('alerts.request')
{!!Form::open(['route'=>'integrantesGrupo.store','method'=>'POST'])!!}
@include('integrantesGrupo.forms.integrantesGrupo')
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
@stop