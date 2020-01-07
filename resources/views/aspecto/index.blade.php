@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Aspecto')</title>


@section('header')
    <h2>Configuración Aspectos</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /config/aspecto/'.$idSelec.'/edit');

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
                <th>Ponderación</th>     
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aspectos as $aspecto)
                <tr>
                    <td>{{ $aspecto->id }}</td>
                    <td>{{ $aspecto->nombre }}</td>
                    <td>{{ $aspecto->ponderacion }}</td>

                    @if ($aspecto->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $aspecto->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('aspecto.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $aspectos->links() }}
    @stop

@endif