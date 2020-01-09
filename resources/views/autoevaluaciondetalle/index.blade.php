@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Rubrica')</title>


@section('header')
    <h2>Configuración Rúbricas Autoevaluacion Detalles</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /autoevaluaciondetalle/'.$idSelec.'/edit');

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
                <th>Nombre Rubrica</th>
                <th>Criterio</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rubricaAutoevaluacionDetalles as $rubricaAutoevaluacionDetalle)
                <tr>
                    <td>{{ $rubricaAutoevaluacionDetalle->id }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__rubricas_autoevaluaciones')->select('nombre')->where('id', $rubricaAutoevaluacionDetalle->rubrica_autoevaluacion_id)->get() )}}</td>

                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__criterios')->select('nombre')->where('id', $rubricaAutoevaluacionDetalle->criterio_id)->get() )}}</td>

                    @if ($rubricaAutoevaluacionDetalle->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $rubricaAutoevaluacionDetalle->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('autoevaluaciondetalle.create')}}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $rubricaAutoevaluacionDetalles->links() }}
    @stop

@endif