

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
<a href="/crear_paciente">Ing. Paciente</a>
<br>
<a href="/atencion">Agendar Hora</a>
<br>
<a href="publicaciones">Publicaciones</a>

@stop
@section('contenedor')
<h1>Editar Atención: </h1>
<br>
<br>


<table class="tablas" id="tablaGestionarAtencion">

 <thead>
    <th>Rut</th>
    <th>Nombre</th>
    <th>Fecha Atención/Hora</th>
    <th>Estado</th>
    <th>Editar</th>
    <th>Eliminar</th>
    <th>Ver</th>
</thead>
<tbody>

@foreach($atencion as $atenciones)
@php

        $fecha=date('d/m/Y', strtotime($atenciones->fecha_atencion));
        $hora = substr($atenciones->hora, 0, -3);
        $validador = substr($atenciones->rut, -1, 1);
        $rut = substr($atenciones->rut, 0, -1)."-".$validador;
        @endphp
    
</tr>

    <td>{{$rut}}</td>
    <td>{{$atenciones->primer_nombre .' '.$atenciones->segundo_nombre.' '.$atenciones->apellido_paterno.' '.$atenciones->apellido_materno }}</td>
    <td>{{$fecha . ' '. $hora}}</td>

  
     @if($atenciones->estado==1)
     <td>
     <div class="p-2 mb-0 bg-success text-white text-center">Realizado</div>  
     </td>
    @elseif($atenciones->estado==2)
    <td>
     <div class="p-2 mb-0 bg-danger text-white text-center">Cancelada</div>  
     </td>
     @else
    <td>
    <div class="p-2 mb-0 bg-warning text-white text-center">Pendiente</div>  
  </td> 
    @endif


    <td></td>
    <td><button type="button" class="btnTablas" data-bs-toggle="modal" data-bs-target="#eliminar_atencion{{$atenciones->id_atencion}}">
        <img src="/imagenes/iconos/table_icons/eliminar.png" class="t_imagen"></button></td>
    <td></td>
</tr>
@include('dashboard.atenciones.eliminar_atencion')
@endforeach
    
    <tbody>  
</table> 

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



