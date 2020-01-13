@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Calendario')</title>

@section('header')
    <h2>Configuración Calendario</h2>
@stop

@section('content')
    {!! Form::model($calendario, ['route'=>['calendario.update', $calendario->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        
        <div class="form-group">
            {!! Form::label('id', 'Id', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::number('id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('id')?$errors->first('id'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('nombre', 'nombre', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
                {!! $errors->has('nombre')?$errors->first('nombre'):'' !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('fecha', 'fecha', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::date('fecha', null, ['class'=>'form-control']) !!}
                {!! $errors->has('fecha')?$errors->first('fecha'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('asignatura_seccion_curso_id', 'Curso', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('asignatura_seccion_curso_id', $cursoList, null, ['placeholder' => 'Seleccione'], ['class'=>'form-control']) !!} 
                {!! $errors->has('asignatura_seccion_curso_id')?$errors->first('asignatura_seccion_curso_id'):'' !!}
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