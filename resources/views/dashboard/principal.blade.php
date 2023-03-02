

@extends('plantilla.plantillaPagina')

@section('menuLateral')

<img class="icono" src="imagenes/iconos/enlace.png">
<label class="submenu">Accesos rapidos</label>
<br>
<a href="#">Ing. Paciente</a>
<br>
<a href="#">Agendar Hora</a>
<br>
<a href="publicaciones">G. publicacion</a>
@stop
@section('contenedor')

@foreach($publicaciones as $publicacion)
@php
$fecha=date('d/m/Y', strtotime($publicacion->fecha_publicacion));
@endphp
<h1>{{$publicacion->titulo}}</h1>
<label>fecha publicacion:</label>
<br>

<label>{{$fecha}}</label>
<br>
<br>
@php
echo str_replace("\n", "<br>", $publicacion->contenido);
@endphp
<p>
<p>
<br>
<br>
<br>  

@endforeach  
{{$publicaciones->links()}}

@stop

@section('menuLateral2')
<img class="icono" src="imagenes/iconos/paciente.png">
<label class="submenu">N° Total Pacientes: </label>
<br>
<label class="interior">12</label>
@stop


@section('menuLateral3')
<img class="icono" src="imagenes/iconos/atencion-medica.png">
<label class="submenu">Cupos Hoy: </label>
<br>
<label class="interior">0</label>
<br>
<input type="button" id="btnCalendario" value="Buscar fecha">
@stop



@section('cHorizontal')
<!-- Button trigger modal -->
<img class="icono" src="imagenes/iconos/publicalo.png">
<label>Crear nota: </label>
<br>
<br>
<button id="btnNotas" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crear_publicacion">
Ventana
</button>
@stop
@section('cHorizontal3')

@if (session('resultado'))
<div class="alert alert-danger">
{{ session('resultado') }}
</div>

@endif

@stop
@section('cHorizontal2')
@php
date_default_timezone_set("America/Santiago");
$date = date("d/m/Y");
@endphp
<div class="fecha">
<label>Fecha Hoy:</label>
<br>
<label>{{$date}}</label>
</div>
<br>

@stop






