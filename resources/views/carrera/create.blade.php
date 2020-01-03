@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Carrera')</title>

@section('header')
    <h2>Configuración Carrera</h2>
@stop

@section('content')

    {!! Form::open(['url'=>'config/carrera','class'=>'form-horizontal']) !!}
        
        <div class="form-group">
            {!! Form::label('id', 'Id', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('id')?$errors->first('id'):'' !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
                {!! $errors->has('nombre')?$errors->first('nombre'):'' !!}
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
            {!! Form::label('escuela_id', 'Escuela_Id', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('escuela_id', array('0' => 'Seleccione', '1' => 'Escuela 1','2' => 'Escuela 2'), ['class'=>'form-control']) !!}
                {!! $errors->has('escuela_id')?$errors->first('escuela_id'):'' !!}
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop