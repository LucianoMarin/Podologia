
@extends('plantilla.plantillaPagina')

@section('cHorizontal3')

@if (session('resultado'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('resultado') }}
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">

{{ session('error') }}
<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@elseif (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </ul>
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


@stop

@section('menuLateral')

<img class="icono" src="../imagenes/iconos/enlace.png">
<label class="submenu">Accesos rapidos</label>
<br>
<a href="../crear_paciente">Ing. Paciente</a>
<br>
<a href="../atencion">Agendar Hora</a>
<br>
<a href="../publicaciones">Publicaciones</a>

@stop
@section('contenedor')
<img src="/../imagenes/iconos/agendar.png" class="iconosPrincipales"><label><h1>Agendar hora: </h1></label>

<br>
<br>

<label>BUSCAR PACIENTE: </label>
<br>
<form action="{{route('buscar_atencion')}}" method="get">
<input type="text" name="rut"  id="buscarRut" class="buscarRut">
<button type="submit" class="btnPublicar">Buscar</button>
</form>
<div class="resultados"></div>

<hr>


@if($validar==1)

@include('dashboard.atenciones.crear_atencion')


@endif
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




