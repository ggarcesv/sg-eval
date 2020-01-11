@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Rotación')</title>

@section('header')
    <h2>Configuración Rotaciones</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /rotacion/'.$idSelec.'/edit');

        exit();
    }
?>

<form method="GET" action="">
@csrf
@if (empty($idSelec))

<table class="table table-bordered table-responsive" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Curso</th>
                <th>Modulo</th> 
                <th>N° Rotacion</th>     
                <th>Fecha Inicio</th>     
                <th>Fecha Termino</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rotaciones as $rotacion)
                <tr>
                    <td>{{ $rotacion->id }}</td>
                    <td>{{ $rotacion->nombre }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $nombreCursos = DB::table('saesa__cursos')->select('nombre')->where('id', $rotacion->asignatura_seccion_curso_id)->get() ) }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $nombreModulos = DB::table('saesa__modulos')->select('nombre')->where('id', $rotacion->modulo_id)->get() ) }}</td>
                    <td>{{ $rotacion->rotacion_num }}</td>

                    <td>{{ $rotacion->fecha_inicio }}</td>
                    <td>{{ $rotacion->fecha_termino }}</td>

                    @if ($rotacion->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $rotacion->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('rotacion.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $rotaciones->links() }}
    @stop

@endif