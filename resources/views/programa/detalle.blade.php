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
                {!! Form::text('id_programa', null, ['disabled' => true,'class'=>'form-control']) !!}
                {!! $errors->has('id_programa')?$errors->first('id_programa'):'' !!}
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
            {!! Form::label('nombre_programa', 'Nombre', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('nombre_programa', null, ['disabled' => true,'class'=>'form-control']) !!}
                {!! $errors->has('nombre_programa')?$errors->first('nombre_programa'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('year_programa', 'Year', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">
                {!! Form::text('year_programa', null, ['disabled' => true,'class'=>'form-control']) !!}
                {!! $errors->has('year_programa')?$errors->first('year_programa'):'' !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('estado_programa', 'Estado', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-3">


            @if ($programa->estado_programa == 1)


            {!! Form::text('estado_programa', 'Activo', ['disabled' => true,'class'=>'form-control']) !!}

            @else

            {!! Form::text('estado_programa', 'Inactivo', ['disabled' => true,'class'=>'form-control']) !!}

            @endif 

            {!! $errors->has('estado_programa')?$errors->first('estado_programa'):'' !!}
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
                    <td>{{ $unidad->nombre_unidad }}</td>
                    <td>{{ $unidad->descripcion_unidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
            <a href="{{ route('programa.edit', $programa->id_programa)}}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    {!! Form::close() !!}

@stop 