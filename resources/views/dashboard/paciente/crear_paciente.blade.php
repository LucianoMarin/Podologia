

@extends('plantilla.plantillaPagina')

@section('cHorizontal3')

@if (session('resultado'))
<div class="alert alert-success">
{{ session('resultado') }}
</div>

@elseif(session('error'))
<div class="alert alert-danger">
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

@stop

@section('menuLateral')

<img class="icono" src="imagenes/iconos/enlace.png">
<label class="submenu">Accesos rapidos</label>
<br>
<a href="#">Ing. Paciente</a>
<br>
<a href="#">Agendar Hora</a>
<br>
<a href="publicaciones">Publicaciones</a>

@stop
@section('contenedor')
<h1>Ingresar Pacientes: </h1>
<div class="container">
<div class="row">
<div class="col-md-6">
<label>Rut Paciente: </label>
<br>

<form action="{{route('crear_paciente')}}" method="POST" id="formulario_paciente">
    @csrf
<input type="text" name="rut"> -
<select name="verificador">
    <option selected value=""></option>
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="k ">K</option>
</select>
<br>
<label>Primer Nombre: </label>
<br>
<input type="text" name="primer_nombre">
<br>
<label>Segundo Nombre: </label>
<br>
<input type="text" name="segundo_nombre">
<br>
<label>Apellido Paterno: </label>
<br>
<input type="text" name="apellido_paterno">
<br>
<label>Apellido Materno: </label>
<br>
<input type="text" name="apellido_materno">
<br>
</div>


<div class="col-md-6">
<label>Fecha de nacimiento: </label>
<br>
<input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
<br>
<label>Edad: </label>
<br>
<input type="text" name="edad" id="edad" readonly>
<br>
<label>Direccion: </label>
<br>
<input type="text" name="direccion">
<br>
<label>Telefono: </label>
<br>
<input type="text" name="telefono">
<br>
<label>Discapacidad: </label>
<br>
<label>Si</label>
<input type="radio" name="discapacidad" value="0"/>
<label>No</label>
<input type="radio" name="discapacidad" value="1"/>

<br>
<br>    
<input type="submit" class="btnPublicar" value="Ingresar" id="btnCrearPaciente">
</form>
</div>
</div>
</div>

<br>
<br>


@stop

@section('menuLateral2')
<img class="icono" src="imagenes/iconos/paciente.png">
<label class="submenu">N° Total Pacientes: </label>
<br>
<label class="interior">12</label>
@stop


@section('cHorizontal3')

@stop
@section('cHorizontal2')

<div class="fecha">
<label>12 de Diciembre</label>
<br>
<label>2022</label>

</div>
<br>

@stop



