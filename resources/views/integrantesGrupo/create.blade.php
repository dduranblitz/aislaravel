
@extends('layouts.admin')
@section('content')
@include('alerts.request')
{!!Form::open(['route'=>'integrantesGrupo.store','method'=>'POST'])!!}
@include('integrantesGrupo.forms.integrantesGrupo')
{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

<br>
{!!Form::open(['route'=>['integrantesGrupo.destroy'],'method'=>'DELETE'])!!}
@include('integrantesGrupo.forms.integrantesGrupoEliminar')
{!!Form::submit('Eliminar',['class'=>'btn btn-danger '])!!}
{!!Form::close()!!}

@stop