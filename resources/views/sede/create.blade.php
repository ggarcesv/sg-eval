@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Sede')</title>


@section('header')
    <h2>Configuración Sede</h2>
@stop

@section('content')
    <a href="/config/sede/create" class="btn btn-primary">Add new</a>
    <table class="table table-bordered table-responsive" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>dirección</th>
                <th>Telefono</th>
                <th>Estado</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sede as $sede)
            <tr>
                <td>{{ $sede->id }}</td>
                <td>{{ $sede->nombre }}</td>
                <td>{{ $sede->direccion }}</td>
                <td>{{ $sede->telefono }}</td>
                @if ($sede->estado == 1)<td>Habilitado</td>
                @else <td>Deshabilitado</td>
                @endif
                <td>
                    <a href="{{ route('sede.edit', $sede->id) }}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method'=>'delete', 'route'=>['sede.destroy', $sede->id]]) !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("¿Quieres eliminar este registro?")']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $sede->links() }}
@stop