@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Programa')</title>

@section('header')
    <h2>Configuración Programas</h2>
@stop

@section('content')

    {!! Form::model($programa, ['route'=>['programa.update', $programa->id_programa], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        
        <div class="form-group">
            {!! Form::label('id_programa', 'Id', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('id_programa', null, ['class'=>'form-control']) !!}
                {!! $errors->has('id_programa')?$errors->first('id_programa'):'' !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('asignatura', 'Asignatura', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('asignatura', $asignaturaList, ['class'=>'form-control']) !!} 
                {!! $errors->has('asignatura')?$errors->first('escuela'):'' !!}
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('nombre_programa', 'Nombre', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('nombre_programa', null, ['class'=>'form-control']) !!}
                {!! $errors->has('nombre_programa')?$errors->first('nombre_programa'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('year_programa', 'Year', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('year_programa', null, ['class'=>'form-control']) !!}
                {!! $errors->has('year_programa')?$errors->first('year_programa'):'' !!}
            </div>
        </div>



        <div class="form-group">
            {!! Form::label('estado_programa', 'Estado', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('estado_programa', array('1' => 'Habilitado', '0' => 'Deshabilitado'),['class'=>'form-control']) !!}
                {!! $errors->has('estado_programa')?$errors->first('estado_programa'):'' !!}
            </div>
        </div>


        @foreach($unidadesList as $unidad)

            <div class="form-group">
                {!! Form::label('id_unidad', 'Id Unidad', ['class'=>'control-label col-md-2']) !!}
                <div class="col-md-3">
                    {!! Form::text('id_unidad[]', $unidad->id_unidad, ['class'=>'form-control']) !!}
                    {!! $errors->has('id_unidad[]')?$errors->first('[id_unidad[]'):'' !!}

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('nombre_unidad', 'Nombre Unidad', ['class'=>'control-label col-md-2']) !!}
                <div class="col-md-3">
                    {!! Form::text('nombre_unidad[]', $unidad->nombre_unidad, ['class'=>'form-control']) !!}
                    {!! $errors->has('nombre_unidad[]')?$errors->first('nombre_unidad[]'):'' !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('descripcion_unidad', 'Descripcion', ['class'=>'control-label col-md-2']) !!}
                <div class="col-md-3">
                    {!! Form::text('descripcion_unidad[]', $unidad->descripcion_unidad, ['class'=>'form-control']) !!}
                    {!! $errors->has('descripcion_unidad[]')?$errors->first('descripcion_unidad[]'):'' !!}
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