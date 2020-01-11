@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Evaluacion')</title>


@section('header')
    <h2>Configuración Evaluación</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /evaluacion/'.$idSelec.'/edit');

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
                <th>Rotacion Grupo</th>
                <th>Nota</th>
                <th>Observacion</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluaciones as $evaluacion)
                <tr>
                    <td>{{ $evaluacion->id }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $nombreCriterio = DB::table('saesa__criterios')->select('nombre')->where('id', $evaluacion->criterio_id)->get() )}}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $nombreRotacionGrupos = DB::table('saesa__rotacion_grupos')->select('nombre')->where('id', $evaluacion->rotacion_grupo_id)->get() )}}</td>
                    <td>{{ $evaluacion->nota }}</td>
                    <td>{{ $evaluacion->observacion }}</td>
                    <td>
                    {{ Form::radio('idSelec', $evaluacion->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('evaluacion.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $evaluaciones->links() }}
    @stop

@endif