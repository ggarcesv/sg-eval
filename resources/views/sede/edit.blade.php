@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Sede')</title>

@section('header')
    <h2>Configuración Sede</h2>
@stop

@section('content')
    {!! Form::model($sede, ['route'=>['sede.update', $sede->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        
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
                {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
                {!! $errors->has('nombre')?$errors->first('nombre'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('direccion', 'Dirección', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('direccion', null, ['class'=>'form-control']) !!}
                {!! $errors->has('direccion')?$errors->first('direccion'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('telefono', 'Telefono', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::number('telefono', null, ['min'=>'1', 'max'=>'11','class'=>'form-control']) !!}
                {!! $errors->has('telefono')?$errors->first('telefono'):'' !!}
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