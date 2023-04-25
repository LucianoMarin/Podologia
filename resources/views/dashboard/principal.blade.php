

@extends('plantilla.plantillaPagina')


@section('menuLateral')

<img class="icono" src="/imagenes/iconos/enlace.png">
<label class="submenu">Accesos rapidos</label>
<br>
<a href="/crear_paciente">Ing. Paciente</a>
<br>
<a href="/atencion">Agendar Hora</a>
<br>
<a href="/publicaciones">Publicaciones</a>

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

@section('menulat2')
<div class="row">          
<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="acordion2-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#acordion2-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
    GADGET
    </button>
    </h2>
    <div id="acordion2-collapseOne" class="accordion-collapse collapse" aria-labelledby="acordion2-headingOne">
      <div class="accordion-body">
  
<!-- Button trigger modal -->
<img class="icono" src="imagenes/iconos/publicalo.png">
<label>Crear nota: </label>
<br>
<br>
<button id="btnNotas" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crear_publicacion">
Nueva Nota
</button>

      <br>
      <br>

<img class="icono" src="imagenes/iconos/atencion-medica.png">
<label class="submenu">Cupos Dia Hoy: </label>
<br>
@if(isset($cupos))
<label class="interior">
{{$cupos}}
</label>
@endif
<br>
<input type="button" id="btnCalendario" value="Buscar fecha">


                            @include('dashboard.publicacion.crear_publicacion')
    </div>
    </div>
  </div>
  </div>
  </div>
@stop





@section('cHorizontal3')

@if (session('resultado'))
<div class="alert alert-success">

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






