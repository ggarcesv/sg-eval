@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Programa')</title>


@section('header')
    <h2>Configuración Programa</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /config/programa/'.$idSelec.'/detalle');

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
                <th>Asignatura</th>
                <th>Nombre Programa</th>
                <th>Año</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programas as $programa)
                <tr>
                    <td>{{ $programa->id }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__asignaturas')->select('nombre')->where('id', $programa->asignatura_id)->get() )}}</td>

                    <td>{{ $programa->nombre }}</td>
                    <td>{{ $programa->year }}</td>
                    @if ($programa->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $programa->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('programa.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Ver" class="btn btn-success">
     </form>

    {{ $programas->links() }}
    @stop

@endif