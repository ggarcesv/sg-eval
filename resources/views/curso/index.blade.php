@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Curso')</title>


@section('header')
    <h2>Configuración Curso</h2>
@stop

@section('content')

<?PHP

    if(!empty($_GET['idSelec'])) {

        $idSelec=$_GET['idSelec'];
        
        header('Location: /curso/'.$idSelec.'/detalle');

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
                <th>Docente</th>
                <th>Asignatura</th>
                <th>Año</th>
                <th>Sección</th>
                <th>Carrera</th>
                <th>Estado</th>
                <th>Selección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__usuarios')->select('nombre')->where('id', $curso->usuario_id)->get() )}}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__asignaturas')->select('nombre')->where('id', $curso->asignatura_id)->get() )}}</td>
                    <td>{{ $curso->year }}</td>
                    <td>{{ $curso->num_seccion }}</td>
                    <td>{{ str_replace(array('[{"nombre":"','"}]'), '', $r = DB::table('saesa__carreras')->select('nombre')->where('id', $curso->carrera_id)->get() )}}</td>

                    @if ($curso->estado == 1)<td>Activo</td>
                    @else <td>Inactivo</td>
                    @endif
                    <td>
                    {{ Form::radio('idSelec', $curso->id) }}  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   

    <a href="{{  route('curso.create') }}" class="btn btn-primary">Agregar</a>
    <input type="submit" value="Ver" class="btn btn-success">



     </form>

    {{ $cursos->links() }}
    @stop

@endif