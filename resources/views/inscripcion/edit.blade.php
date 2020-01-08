@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Inscripcion')</title>

@section('header')
    <h2>Configuración Inscripcion</h2>
@stop

@section('content')
    {!! Form::model($inscripcion, ['route'=>['inscripcion.update', $inscripcion->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        
    <div class="form-group">
            {!! Form::label('curso_id', 'Curso ID', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('curso_id',null, ['class'=>'form-control']) !!} 
                {!! $errors->has('curso_id')?$errors->first('curso_id'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('usuario_id', 'Usuario ID', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('usuario_id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('usuario_id')?$errors->first('id'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('estado', 'Estado', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('estado', array('1' => 'Habilitado', '0' => 'Deshabilitado'),['class'=>'form-control']) !!}
                {!! $errors->has('estado')?$errors->first('estado'):'' !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop