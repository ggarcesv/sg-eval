@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Calendario')</title>


@section('header')
    <h2>Configuración Calendario</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /calendario/'.$idSelec.'/edit');

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
                <th>Curso</th>
                <th>Sección</th>     
                <th>Nombre Evaluación</th>     
                <th>Fecha</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calendarios as $calendario)
                <tr>
                    <td>{{ $calendario->id }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $nombreCursos = DB::table('saesa__cursos')->select('nombre')->where('id', $calendario->asignatura_seccion_curso_id)->get() ) }}</td>
                    <td>{{ str_replace(array('[{"num_seccion":','}]'), '', $seccionCursos = DB::table('saesa__cursos')->select('num_seccion')->where('id', $calendario->asignatura_seccion_curso_id)->get() ) }}</td>
                    <td>{{ $calendario->nombre }}</td>
                    <td>{{ $calendario->fecha }}</td>

                    @if ($calendario->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $calendario->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('calendario.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $calendarios->links() }}
    @stop

@endif