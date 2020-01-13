@extends('layouts.master')
@include('partials.Navbarclean')

<title>@yield('title', 'Login')</title>


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">

            <form method="POST" action="">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
            </div>
            </form>

        </div>
    </div>
</div>
@stop