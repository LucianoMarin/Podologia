@extends('plantilla.plantillaPagina')

@section('cHorizontal3')

@if(!empty($resultado))
  <div class="alert alert-success"> {{ $resultado }}</div>


@elseif(!empty($error))
<div class="alert alert-danger">
{{ $error }}
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
<img src="/../imagenes/iconos/idea.png" class="iconosPrincipales"><label><h1>Proyectos: </h1></label>
<br>
<br>
<table class="tablass">
    <th>Nombre</th>
    <th>Opciones</th>
    <tr>

@foreach($proyecto as $proyectos)
        <td>{{$proyectos->nombre}}</td>
        <td>
        <button type="button" class="btnTablasAtenciones" data-bs-toggle="modal" data-bs-target="#eliminarProyecto{{$proyectos->id}}">
        <img src="/imagenes/iconos/table_icons/eliminar.png" class="t_imagen"></button>
            <tr>

            @include('dashboard.proyecto.eliminar')

            @endforeach
               
    </td>
</table>
<br>
<form action="{{route('crear_proyecto')}}" method="POST">
    @csrf
<label>Proyecto: </label>
<br>
<input type="text" name="nombre_proyecto"><input type="submit" value="Crear">
<form>
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




