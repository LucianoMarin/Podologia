<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <title>Bienvenido</title>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-3 ">

            </div>
            <div class="col col-12 col-md-6  ">
                <div class="login">
                    <img class="imgl" src="imagenes/imgl.png">
                    <h1>Bienvenido</h1>
                    <form action="login" method="POST">
                    @csrf    
                    <label>Usuario:</label>
                        <br>

                        <input type="text" name="usuario">
                        <br>
                        <label>Contraseña:</label>
                        <br>
                        <input type="password" name="contraseña">
                        <br>
                        <input type="submit" value="Ingresar">
                    </form>
                </div>

            </div>

            <div class="col col-md-3 ">
            @if (session('resultado'))
            @elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('resultado') }}
        {{ session('error') }}
    </div>
    @elseif (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </ul>
    </div>
@endif
            </div>
     

        </div>

    </div>

</head>

<body>






</body>

</html>