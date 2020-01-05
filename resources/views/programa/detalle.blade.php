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
                {!! Form::text('id', null, ['disabled' => true,'class'=>'form-control']) !!}
                {!! $errors->has('id')?$errors->first('id'):'' !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('asignatura', 'Asignatura', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
            {!! Form::text('id', str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__asignaturas')->select('nombre')->where('id', $programa->asignatura_id)->get() ), ['disabled' => true,'class'=>'form-control']) !!}
            {!! $errors->has('asignatura')?$errors->first('asignatura'):'' !!}
            </div>
        </div>

        
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('nombre', null, ['disabled' => true,'class'=>'form-control']) !!}
                {!! $errors->has('nombre')?$errors->first('nombre'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('year', 'Year', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('year', null, ['disabled' => true,'class'=>'form-control']) !!}
                {!! $errors->has('year')?$errors->first('year'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('estado', 'Estado', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">


            @if ($programa->estado == 1)


            {!! Form::text('estado', 'Activo', ['disabled' => true,'class'=>'form-control']) !!}

            @else

            {!! Form::text('estado', 'Inactivo', ['disabled' => true,'class'=>'form-control']) !!}

            @endif 

            {!! $errors->has('estado')?$errors->first('estado'):'' !!}
            </div>
        </div>

        <table class="table table-bordered table-responsive" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unidadesList as $unidad)
                <tr>
                    <td>{{ $unidad->nombre }}</td>
                    <td>{{ $unidad->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
            <a href="{{ route('programa.edit', $programa->id)}}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    {!! Form::close() !!}

@stop 