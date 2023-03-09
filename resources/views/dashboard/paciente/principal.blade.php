

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
<h1>Lista de Pacientes: </h1>
<br>
<br>
<table class="tablas">
    <thead>
     
    <th>Rut</th>
    <th>Nombre Completo</th>
    <th>Eliminar </th>
    <th>Modificar </th>
    <th>Ver Ficha </th>

</thead>

        <tbody>
        <tr>
        <td></td>
        <td></td>
        <td>
        <button type="button" class="btnTablas" data-bs-toggle="modal" data-bs-target="#eliminar_publicacion">
        <img src="/imagenes/iconos/table_icons/eliminar.png" class="t_imagen">
        </button>
        </td>
        <td>
        <button type="button" class="btnTablas" data-bs-toggle="modal" data-bs-target="#editar_publicacion" id="btnEditarPublicacion">
        <img src="/imagenes/iconos/table_icons/editar.png" value="" class="t_imagen">    
        </button>
        </td>
        <td>
        <button type="button" class="btnTablas" data-bs-toggle="modal" data-bs-target="#ver_publicacion">
        <img src="/imagenes/iconos/table_icons/comentarios.png" class="t_imagen"></button>
        </td>
        </tr>

  
</tr>
</tbody>
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

<div class="fecha">
<label>12 de Diciembre</label>
<br>
<label>2022</label>

</div>
<br>

@stop



