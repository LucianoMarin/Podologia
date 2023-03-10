

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
<h1>Publicaciones</h1>
<br>
<br>

<table class="tablas" id="tablaPublicacion">
    <thead>
     
    <th>Titulo</th>
    <th>Fecha</th>
    <th>Eliminar </th>
    <th>Modificar </th>
    <th>Ver </th>

</thead>


        <tbody>
        <tr>
        @foreach ($publicaciones as $publicacion)
        @php
        $fecha=date('d/m/Y', strtotime($publicacion->fecha_publicacion));
        @endphp
        <td id="titulo">{{$publicacion->titulo}}</td>
        <td>{{$fecha}}</td>
        <td>
        <button type="button" class="btnTablas" data-bs-toggle="modal" data-bs-target="#eliminar_publicacion{{$publicacion->id_publicacion}}">
        <img src="/imagenes/iconos/table_icons/eliminar.png" class="t_imagen">
        </button>
        </td>
        <td>
        <button type="button" class="btnTablas" data-bs-toggle="modal" data-bs-target="#editar_publicacion{{$publicacion->id_publicacion}}" id="btnEditarPublicacion">
        <img src="/imagenes/iconos/table_icons/editar.png" value="" class="t_imagen">    
        </button>
        </td>
        <td>
        <button type="button" class="btnTablas" data-bs-toggle="modal" data-bs-target="#ver_publicacion{{$publicacion->id_publicacion}}">
        <img src="/imagenes/iconos/table_icons/comentarios.png" class="t_imagen"></button>
        </td>
        </tr>
       
        @include('dashboard.publicacion.eliminar_publicacion')
        @include('dashboard.publicacion.editar_publicacion')
        @include('dashboard.publicacion.ver_publicacion')

        @endforeach
</tr>
</tbody>
</table>


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





