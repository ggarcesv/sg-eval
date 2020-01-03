@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Carrera')</title>


@section('header')
    <h2>Configuración Carrera</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /config/carrera/'.$idSelec.'/edit');

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
                <th>Escuela</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carreras as $carrera)
                <tr>
                    <td>{{ $carrera->id }}</td>
                    <td>{{ $carrera->nombre }}</td>
                    
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__escuelas')->select('nombre')->where('id', $carrera->escuela_id)->get() )}}</td>
                    @if ($carrera->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $carrera->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('carrera.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $carreras->links() }}
    @stop

@endif