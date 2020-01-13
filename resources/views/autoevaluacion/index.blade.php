@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Autoevaluación')</title>


@section('header')
    <h2>Configuración Rúbrica Autoevaluación</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /autoevaluacion/'.$idSelec.'/edit');

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
            @foreach($rubricaAutoevaluaciones as $rubricaAutoevaluacion)
                <tr>
                    <td>{{ $rubricaAutoevaluacion->id }}</td>
                    <td>{{ $rubricaAutoevaluacion->nombre }}</td>
                    @if ($rubricaAutoevaluacion->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $rubricaAutoevaluacion->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('autoevaluacion.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $rubricaAutoevaluaciones->links() }}
    @stop

@endif