@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Rotación')</title>
@section('header')
    <h2>Configuración Rotaciones</h2>
@stop

@section('content')
    {!! Form::model($rotacion, ['route'=>['rotacion.update', $rotacion->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        
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
            {!! Form::label('rotacion_num', 'rotacion', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('rotacion_num', null, ['class'=>'form-control']) !!}
                {!! $errors->has('rotacion_num')?$errors->first('rotacion_num'):'' !!}
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('modulo_id', 'Modulo', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('modulo_id', $moduloList, null, ['placeholder' => 'Seleccione'], ['class'=>'form-control']) !!} 
                {!! $errors->has('modulo_id')?$errors->first('modulo_id'):'' !!}
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
            {!! Form::label('fecha_inicio', 'fecha Inicio', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('fecha_inicio', null, ['class'=>'form-control']) !!}
                {!! $errors->has('fecha_inicio')?$errors->first('fecha_inicio'):'' !!}
            </div>
        </div>


        
        <div class="form-group">
            {!! Form::label('fecha_termino', 'fecha Termino', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('fecha_termino', null, ['class'=>'form-control']) !!}
                {!! $errors->has('fecha_termino')?$errors->first('fecha_termino'):'' !!}
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











