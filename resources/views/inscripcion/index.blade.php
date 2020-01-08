@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Inscripcion')</title>


@section('header')
    <h2>Configuración Inscripciones</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /inscripcion/'.$idSelec.'/edit');

        exit();
    }
?>

<form method="GET" action="">
@csrf
@if (empty($idSelec))

<table class="table table-bordered table-responsive" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Fecha Ingreso</th>
                <th>Asignatura</th>
                <th>Alumno</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inscripciones as $inscripcion)
                <tr>
                    <td>{{ $inscripcion->created_at }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__asignaturas')->select('nombre')->where('id', $inscripcion->curso_id)->get() )}}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__usuarios')->select('nombre')->where('id', $inscripcion->usuario_id)->get() )}}</td>
                    @if ($inscripcion->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $inscripcion->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
    <a href="{{ route('inscripcion.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Editar" class="btn btn-success">
     </form>

    {{ $inscripciones->links() }}
    @stop

@endif



