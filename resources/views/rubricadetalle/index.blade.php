@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Rubrica')</title>


@section('header')
    <h2>Configuración Rubricas Detalle</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /rubricadetalle/'.$idSelec.'/edit');

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
                <th>Rubrica</th>
                <th>Criterio</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rubricaDetalles as $rubricaDetalle)
                <tr>
                    <td>{{ $rubricaDetalle->id }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $rubricaNombre = DB::table('saesa__rubricas')->select('nombre')->where('id', $rubricaDetalle->rubrica_id)->get() )}}</td>

                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $criterioNombre = DB::table('saesa__criterios')->select('nombre')->where('id', $rubricaDetalle->criterio_id)->get() )}}</td>

                    @if ($rubricaDetalle->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $rubricaDetalle->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('rubricadetalle.create')}}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $rubricaDetalles->links() }}
    @stop

@endif