@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Evaluacion')</title>

@section('header')
<h2>Configuración Evaluación</h2>
@stop

@section('content')
    {!! Form::model($evaluacion, ['route'=>['evaluacion.update', $evaluacion->id], 'method'=>'PATCH', 'class'=>'form-horizontal']) !!}
        
        <div class="form-group">
            {!! Form::label('id', 'Id', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('id', null, ['class'=>'form-control']) !!}
                {!! $errors->has('id')?$errors->first('id'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('criterio_id', 'Criterio', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('criterio_id', $criterioList, null, ['placeholder' => 'Seleccione'], ['class'=>'form-control']) !!} 
                {!! $errors->has('criterio_id')?$errors->first('criterio_id'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('rotacion_grupo_id', 'Rotacion Grupo', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('rotacion_grupo_id', $rotacionGrupoList, null, ['placeholder' => 'Seleccione'], ['class'=>'form-control']) !!} 
                {!! $errors->has('rotacion_grupo_id')?$errors->first('rotacion_grupo_id'):'' !!}
            </div>
        </div>


    
        <div class="form-group">
            {!! Form::label('nota', 'Nota', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::select('nota', array('0'=>'N/A','1' => 'Nunca','5' => 'A Veces', '6' => 'Casi Siempre','7' => 'Siempre'),['class'=>'form-control']) !!}
                {!! $errors->has('nota')?$errors->first('nota'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('observacion', 'Observacion', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('observacion', null, ['class'=>'form-control']) !!}
                {!! $errors->has('observacion')?$errors->first('observacion'):'' !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop