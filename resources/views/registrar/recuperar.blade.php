@extends('plantilla.plantillaRegistro')
@section('contenedor')

<form action="registrar" method="POST">
@csrf
<div class="container">
<div class="row">
<h2>RECUPERAR CONTRASEÑA</h2>
<div class="col-md-6">
<div class="cRegistro">

<label>Correo Electronico: </label>
<br>
<input name="correo" type="text">
<br>
</div>
</div>
<div class="col-md-6">


<label>Nombre de usuario: </label>
<br>
<input name="username" type="text" value="">
<br>

    <br>
    <br>
    <input type="submit" value="Recuperar">
    <br>
    <br>

</form>

</div>

</div>

@if (session('resultado'))
<div class="alert alert-success">
{{ session('resultado') }}
</div>
@elseif (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

</div>
@stop