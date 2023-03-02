

@extends('plantilla.plantillaPagina')

@section('menuLateral')


<img class="icono" src="imagenes/iconos/enlace.png">
<label class="submenu">Accesos rapidos</label>
<br>
<a href="#">Ing. Paciente</a>
<br>
<a href="#">Agendar Hora</a>
@stop
@section('contenedor')
@include('dashboard.usuario.nuevo_usuario')



<br>
<br>
<br> 
   
@stop
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
@section('cHorizontal')
<img class="icono" src="imagenes/iconos/publicalo.png">
<label>Crear nota: </label>
<br>
<br>
<button id="btnNotas" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crear_publicacion">
Ventana
</button>

@stop





