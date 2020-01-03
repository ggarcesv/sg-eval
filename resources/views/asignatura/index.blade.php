@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Asignatura')</title>


@section('header')
    <h2>Configuración Asignatura</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /config/asignatura/'.$idSelec.'/edit');

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
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asignaturas as $asignatura)
                <tr>
                    <td>{{ $asignatura->id }}</td>
                    <td>{{ $asignatura->nombre }}</td>
                    @if ($asignatura->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $asignatura->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('asignatura.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $asignaturas->links() }}
    @stop

@endif