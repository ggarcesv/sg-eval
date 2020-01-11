@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Curso')</title>

@section('header')
    <h2>Configuración Curso</h2>
@stop

@section('content')

    {!! Form::open(['url'=>'curso','class'=>'form-horizontal']) !!}
        
        <div class="form-group">
            {!! Form::label('id', 'Id', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('id', null, ['class'=>'form-control']) !!}
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
            {!! Form::label('docente', 'Docente', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('usuario_id', $docenteList, null, ['placeholder' => 'Seleccione'], ['class'=>'form-control']) !!} 
                {!! $errors->has('usuario_id')?$errors->first('usuario_id'):'' !!}
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('asignatura', 'Asignatura', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('asignatura_id', $asignaturaList, null, ['placeholder' => 'Seleccione'], ['class'=>'form-control']) !!} 
                {!! $errors->has('asignatura_id')?$errors->first('asignatura_id'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('year', 'Año', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('year', null, ['class'=>'form-control']) !!}
                {!! $errors->has('year')?$errors->first('year'):'' !!}
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('seccion', 'Sección', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('num_seccion', null, ['class'=>'form-control']) !!}
                {!! $errors->has('num_seccion')?$errors->first('num_seccion'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('carrera', 'Carrera', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('carrera_id', $carreraList, null, ['placeholder' => 'Seleccione'], ['class'=>'form-control']) !!} 
                {!! $errors->has('carrera_id')?$errors->first('carrera_id'):'' !!}
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