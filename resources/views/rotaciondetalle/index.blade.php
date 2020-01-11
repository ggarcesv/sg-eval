@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Rotacion')</title>

@section('header')
    <h2>Configuración Rotación Detalle</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /rotaciondetalle/'.$idSelec.'/edit');

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
                <th>Rotacion Grupo</th>
                <th>Alumno</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rotacionesDetalles as $rotacionDetalle)
                <tr>
                    <td>{{ $rotacionDetalle->id }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $rotacionGrupoNombre = DB::table('saesa__rotacion_grupos')->select('nombre')->where('id', $rotacionDetalle->rotacion_grupo_id)->get() )}}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $usuarioNombre = DB::table('saesa__usuarios')->select('nombre')->where('id', $rotacionDetalle->usuario_id)->get() )}}</td>
                    @if ($rotacionDetalle->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $rotacionDetalle->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('rotaciondetalle.create')}}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $rotacionesDetalles->links() }}
    @stop

@endif