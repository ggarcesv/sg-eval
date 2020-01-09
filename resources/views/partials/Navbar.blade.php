<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="https://virginiogomez.cl//templates/yoo_glass/favicon.ico" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css">
    

    <style>
        nav div ul li a{
            color: #effff8;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            margin: 0.5em 1.7em;
            padding: 0.3em;
        }
        nav{
            background-color: #3b3e44;
            border-radius: 0.5em;
        }
        nav div ul li div a{
            color: #385a8a;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            padding: 0.5em 1em;
            margin: 0.5em 0.1em;

        }
        html body nav {
            background-color: #385a8a;
            text-align: right;
            margin: 0.5em;
        }
        img{
            height: 10em;
            width: 15em;
        }

    </style>
    <style rel="stylesheet">
        SECTION {
            padding: 0.3em;
            background-color: #f0f0f0;
            overflow: auto;
        }
        SECTION > DIV {
            float: left;
            padding: 0.3em;
            display: inline-block;
        }
        SECTION > DIV + DIV {
            width: 4em;
            text-align: center;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index"><img src="https://virginiogomez.cl//images/logo.jpg" class="img-fluid" alt="Responsive image"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            
            <ul class="navbar-nav">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('/perfil/misdatos') }}">Mis Datos</a>
                        <a class="dropdown-item" href="{{ url('/perfil/autoevaluacion') }}">Autoevaluación</a>
                        <a class="dropdown-item" href="{{ url('/perfil/ayuda') }}">Ayuda</a>
                    </div> 
                </li>               

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ingreso Curso</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('/curso') }}">Curso</a>
                        <a class="dropdown-item" href="{{ url('/usuario') }}">Usuario</a>
                        <a class="dropdown-item" href="{{ url('/inscripcion') }}">Inscripcion</a>
                        <a class="dropdown-item" href="{{ url('/rubrica') }}">Rúbrica</a>
                        <a class="dropdown-item" href="{{ url('/rubricadetalle') }}">Rúbrica Detalle</a>
                        <a class="dropdown-item" href="{{ url('/autoevaluacion') }}">Autoevaluación</a>
                        <a class="dropdown-item" href="{{ url('/autoevaluaciondetalle') }}">Autoevaluación Detalle</a>

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Evaluación Curso</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('/calendario') }}">Calendario</a>
                        <a class="dropdown-item" href="{{ url('/rotacion') }}">Rotación</a>
                        <a class="dropdown-item" href="{{ url('/evaluacion') }}">Evaluar</a>
                        <a class="dropdown-item" href="{{ url('/notas') }}">Notas</a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Configuración</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('/config/sede') }}">Sede</a>
                        <a class="dropdown-item" href="{{ url('/config/escuela') }}">Escuela</a>
                        <a class="dropdown-item" href="{{ url('/config/carrera') }}">Carrera</a>
                        <a class="dropdown-item" href="{{ url('/config/asignatura') }}">Asignatura</a>
                        <a class="dropdown-item" href="{{ url('/config/programa') }}">Programa</a>
                        <a class="dropdown-item" href="{{ url('/config/privilegio') }}">Privilegio</a>
                        <a class="dropdown-item" href="{{ url('/config/rol') }}">Rol</a>
                        <a class="dropdown-item" href="{{ url('/config/modulo') }}">Módulo</a>
                        <a class="dropdown-item" href="{{ url('/config/aspecto') }}">Aspecto</a>
                        <a class="dropdown-item" href="{{ url('/config/criterio') }}">Criterio</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Cerrar Sesión</a>
                </li>
                
            </ul>
        </div>
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
</div>

</body>

</html>