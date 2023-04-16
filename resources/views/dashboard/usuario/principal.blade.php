

@extends('plantilla.plantillaPagina')

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
@if($validar==false)
@include('dashboard.usuario.nuevo_usuario')
@else
@include('dashboard.usuario.mi_perfil')
@endif

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

