<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/../css/estilo.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<title>Dashboard</title>
</head>

<body>

    <div class="contenedor">

        <div class="container">
        <br>
            <div class="row">
            <div class="col-md-1 imgl">
                    <img class="imgl" src="/../imagenes/imglr.jpg">
                </div>

            <div class="col-md-9">
                <div class="contenedorPrincipal">
                    @yield('contenedor')
                </div>
            </div>
        </div>

    </div>
    
    <br>
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

        </div>

    </footer>
    <script src="/../javascript/javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

</body>

</html>