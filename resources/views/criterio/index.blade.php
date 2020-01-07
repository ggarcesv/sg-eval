@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Criterio')</title>


@section('header')
    <h2>Configuración Criterios</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /config/criterio/'.$idSelec.'/edit');

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
                <th>Criterio</th>
                <th>Aspecto</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($criterios as $criterio)
                <tr>
                    <td>{{ $criterio->id }}</td>
                    <td>{{ $criterio->nombre }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__aspectos')->select('nombre')->where('id', $criterio->aspecto_id)->get() )}}</td>

                    @if ($criterio->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $criterio->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('criterio.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $criterios->links() }}
    @stop

@endif