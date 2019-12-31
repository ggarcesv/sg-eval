@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Sede')</title>


@section('header')
    <h2>Configuración Sede</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /config/sede/'.$idSelec.'/edit');

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
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sedes as $sede)
                <tr>
                    <td>{{ $sede->id }}</td>
                    <td>{{ $sede->nombre }}</td>
                    <td>{{ $sede->direccion }}</td>
                    <td>{{ $sede->telefono }}</td>
                    @if ($sede->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $sede->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('sede.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $sedes->links() }}
    @stop

@endif