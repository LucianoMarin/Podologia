
<!---@auth--->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/../css/estilo.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    

    
<title>Dashboard</title>
</head>

<body>
<div class="estiloNav ">    
<nav class="navbar navbar-expand-lg">
  <div class="container ">

 
    <div class="navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
       
      </ul>
      <span class="navbar-text">
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle dropColor" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  Usuario: {{Auth::user()->username}}
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item " href="/usuario">Mi Perfil</a></li>
    <li><a class="dropdown-item" href="">Cambiar Contraseña</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="/salir">Cerrar Sesion</a></li>
  </ul>
</div>
      </span>
    </div>
  </div>
</nav>
</div>
<div class="contenedor">
    <div class="container">
        <div class="row">
            <div class="col-md-1 imgl">
                <a href="/dashboard"><img class="imgl" src="/../imagenes/imgl.png"></a>
            </div>
            <div class="col col-md-11 cnav">
                <div class="navo">
                <nav>
                    <ul>
                        <li><a href="#">Pacientes</a>
                            <ul>
                                <li><a href="/crear_paciente">Crear Paciente</a></li>
                                <li><a href="/pacientes">Listado Pacientes</a></li>

                        </li>
                    </ul>
                    </li>

                    <li><a href="#">Atenciones</a>
                        <ul>
                            <li><a href="/atencion">Agendar Hora</a></li>
                            <li><a href="/gestionar_atencion">Modificar Hora</a></li>

                    </li>
                    
                    </ul>
                    
                    <li><a href="#">Crear</a>
                        <ul>
                            <li><a href="/proyecto">Proyecto</a></li>

                    </li>
                  
                    <!---LIBRE-->
                    </li>
                    </ul>
                </nav>
                
            </div>
        </div>
        
    </div>
    </div>

    <!--FIN DEL NAV --->


    <!-- PRIMER MODULO HORIZONTAL 12--->

    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                
 
            @yield('cHorizontal3')
    
            </div>
            
            <div class="col-md-4">
                
                @yield('cHorizontal2')
                
            </div>
        </div>


    </div>


    <!----FIN----->


    <!--Inicio Body-->

<div class="container">
<div class="row">
<div class="col-12 col-xs-6 col-sm-6 col-md-3 col-lg-2 ">
<br>
<div class="row">          
<div class="menuLateral">
<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="acordion1-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#acordion1-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        OPCIONES RAPIDAS
      </button>
    </h2>
    <div id="acordion1-collapseOne" class="accordion-collapse collapse" aria-labelledby="acordion1-headingOne">
      <div class="accordion-body">
      @yield('menuLateral')
    </div>
    </div>
  </div>
  </div>                   
<br>

@yield('menulat2')

  </div>
  </div>
  </div>       
    
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-10 ">
            <br>
                <div class="contenedorPrincipal">
                    @yield('contenedor')
                    <br>
                 
        
                </div>
                
            </div>
      
        </div>
        <br>

        <br>
        <br>
        <br>

    <br>
    </div>
    </div>





    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <lable>AYUDA O SOPORTE</lable>

                </div>
                <div class="col-md-6">


                </div>


            </div>
            
            <div class="col-md-12">
                <h4>Sistema Gestion Podologia - 2022</h4>
                <h6>Luciano Marin © - Freelance</h6>
            </div>



    </footer>


    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/../javascript/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
 <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script src="/../javascript/javascript.js" type="module"></script>


</body>

    </html>
    <!----@endauth---->