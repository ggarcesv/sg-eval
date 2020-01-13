@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Rotacion')</title>

@section('header')
<h2>Configuración Rotación Detalle</h2>
@stop

@section('content')

    {!! Form::open(['url'=>'rotaciondetalle','class'=>'form-horizontal']) !!}
        
        <div class="form-group">
            {!! Form::label('id', 'Id', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::number('id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('id')?$errors->first('id'):'' !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('rotacion_grupo_id', 'Rotacion Grupo ID', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::number('rotacion_grupo_id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('rotacion_grupo_id')?$errors->first('rotacion_grupo_id'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('usuario_id', 'Usuario ID', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::number('usuario_id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('usuario_id')?$errors->first('usuario_id'):'' !!}
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