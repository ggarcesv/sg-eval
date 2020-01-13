@extends('layouts.master')
@include('partials.Navbar')

<title>@yield('title', 'Notas')</title>


@section('header')
    <h2>Promedio de Notas</h2>
@stop

@section('content')

<table class="table table-bordered table-responsive" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rotacionGrupos as $grupo)
                <tr>
                    <td>{{ $grupo->id }}</td>
                    <td>{{ $grupo->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
   
</form>

{{ $rotacionGrupos->links() }}
@stop

