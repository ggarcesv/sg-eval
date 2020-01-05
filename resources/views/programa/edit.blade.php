@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Programa')</title>

@section('header')
    <h2>Configuración Programas</h2>
@stop

@section('content')

    {!! Form::model($programa, ['route'=>['programa.update', $programa->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        
        <div class="form-group">
            {!! Form::label('id', 'Id', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('id')?$errors->first('id'):'' !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('asignatura', 'Asignatura', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('asignatura_id', $asignaturaList, ['class'=>'form-control']) !!} 
                {!! $errors->has('asignatura_id')?$errors->first('escuela'):'' !!}
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
            {!! Form::label('year', 'Year', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('year', null, ['class'=>'form-control']) !!}
                {!! $errors->has('year')?$errors->first('year'):'' !!}
            </div>
        </div>



        <div class="form-group">
            {!! Form::label('estado', 'Estado', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('estado', array('1' => 'Habilitado', '0' => 'Deshabilitado'),['class'=>'form-control']) !!}
                {!! $errors->has('estado')?$errors->first('estado'):'' !!}
            </div>
        </div>


        @foreach($unidadesList as $unidad)

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre Unidad', ['class'=>'control-label col-md-2']) !!}
                <div class="col-md-3">
                    {!! Form::text('nombre', $unidad->nombre, ['class'=>'form-control']) !!}
                    {!! $errors->has('nombre')?$errors->first('nombre'):'' !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion', ['class'=>'control-label col-md-2']) !!}
                <div class="col-md-3">
                    {!! Form::text('descripcion', $unidad->descripcion, ['class'=>'form-control']) !!}
                    {!! $errors->has('descripcion')?$errors->first('descripcion'):'' !!}
                </div>
            </div>

        @endforeach



        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop