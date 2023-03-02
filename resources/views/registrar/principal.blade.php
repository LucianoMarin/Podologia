@extends('plantilla.plantillaRegistro')
@section('contenedor')

<form action="registrar" method="POST">
@csrf
<div class="container">
<div class="row">
<h2>Formulario de registro</h2>
<div class="col-md-6">
<div class="cRegistro">

<label>Correo Electronico: </label>
<br>
<input name="correo" type="text">
<br>
<label>Nombre de usuario: </label>
<br>
<input name="username" type="text">
<br>
</div>
</div>
<div class="col-md-6">
    <label>Contraseña: </label>
    <br>
    <input name="contraseña" type="password">
    <br>
    <label>Validar Contraseña: </label>
    <br>
    <input name="validar_contraseña" type="password">
    <br>
    <br>
    <input type="submit" value="Registrar">
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