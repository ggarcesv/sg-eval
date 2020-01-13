@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Rubrica')</title>

@section('header')
    <h2>Configuración Rubricas</h2>
@stop

@section('content')

    {!! Form::open(['url'=>'rubrica','class'=>'form-horizontal']) !!}
        
        <div class="form-group">
            {!! Form::label('id', 'Id', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::number('id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('id')?$errors->first('id'):'' !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('nombre', null, ['placeholder' => 'Ej: Rubrica 2020'],['class'=>'form-control']) !!}
                {!! $errors->has('nombre')?$errors->first('nombre'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('modulo', 'Modulo', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('modulo_id', $moduloList, null, ['placeholder' => 'Seleccione'], ['class'=>'form-control']) !!} 
                {!! $errors->has('modulo_id')?$errors->first('modulo_id'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('Asignacion Carrera', 'Asignacion Cerrera', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('asignacion_carrera_id', $asignacionCarreraList, null, ['placeholder' => 'Seleccione'], ['class'=>'form-control']) !!} 
                {!! $errors->has('asignacion_carrera_id')?$errors->first('asignacion_carrera_id'):'' !!}
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