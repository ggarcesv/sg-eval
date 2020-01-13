
@yield('content')
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

                <li class="nav-item">
                    <a class="nav-link" href="/login">Cerrar Sesión</a>
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
