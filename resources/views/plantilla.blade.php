<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url ('bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url ('jquery/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ url ('css/submenu.css') }}">

        <title>Salutem</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('inicio') }}"> Salutem </a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administración
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#"> Campos de formularios </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('administracion.clase.listar', array('clase'=>'ocupacion', 'plural'=>'ocupaciones')) }}"> Ocupación </a></li>                                           
                                    <li><a class="dropdown-item" href="{{ route('administracion.clase.listar', array('clase'=>'estadocivil', 'plural'=>'estados civiles')) }}"> Estado Civil </a></li>
                                    <li><a class="dropdown-item" href="{{ route('administracion.clase.listar', array('clase'=>'obrasocial', 'plural'=>'obras sociales')) }}"> Obra Social </a></li>
                                    <li><a class="dropdown-item" href="{{ route('administracion.clase.listar', array('clase'=>'medicamento', 'plural'=>'medicamentos')) }}"> Medicamento </a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#"> Eliminados </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('personas.listar_eliminados') }}"> Personas </a></li>            
                                </ul>
                            </li>  
                        </ul>
                    </li>                                         
                </ul>                
            </div>
        </nav>

        <br/>

        <div class="container-fluid">
            @yield('contenido')
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ url('jquery/js/jquery-3.3.1.js') }}"></script>
        <script src="{{ url('jquery/js/jquery-ui.js') }}" ></script>
        <script src="{{ url('bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ url('bootstrap/js/popper.js') }}"></script>
        @yield("script")

    </body> 
</html>