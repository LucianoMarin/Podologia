

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
<a href="#">Ing. Paciente</a>
<br>
<a href="#">Agendar Hora</a>
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
        $fecha=date('d/m/Y', strtotime($atenciones->fecha_atencion ));
        @endphp
</tr>

    <td>{{$atenciones->rut}}</td>
    <td>{{$atenciones->primer_nombre .' '.$atenciones->segundo_nombre.' '.$atenciones->apellido_paterno.' '.$atenciones->apellido_materno }}</td>
    <td>{{$fecha . ' '. $atenciones->hora }}</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
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



