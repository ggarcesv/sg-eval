@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Rubrica')</title>


@section('header')
    <h2>Configuración Rubricas</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /rubrica/'.$idSelec.'/edit');

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
                <th>Modulo</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rubricas as $rubrica)
                <tr>
                    <td>{{ $rubrica->id }}</td>
                    <td>{{ $rubrica->nombre }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__modulos')->select('nombre')->where('id', $rubrica->modulo_id)->get() )}}</td>

                    @if ($rubrica->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $rubrica->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('rubrica.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $rubricas->links() }}
    @stop

@endif