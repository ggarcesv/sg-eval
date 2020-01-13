@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Rubrica')</title>

@section('header')
    <h2>Configuración Rúbricas Autoevaluacion Detalles</h2>
@stop

@section('content')
    {!! Form::model($rubricaAutoevaluacionDetalle, ['route'=>['autoevaluaciondetalle.update', $rubricaAutoevaluacionDetalle->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        
    <div class="form-group">
            {!! Form::label('id', 'Id', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('id')?$errors->first('id'):'' !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('criterio_id', 'Criterio ID', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::number('criterio_id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('criterio_id')?$errors->first('criterio_id'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('rubrica_autoevaluacion_id', 'Rubrica ID', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::number('rubrica_autoevaluacion_id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('rubrica_autoevaluacion_id')?$errors->first('rubrica_autoevaluacion_id'):'' !!}
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