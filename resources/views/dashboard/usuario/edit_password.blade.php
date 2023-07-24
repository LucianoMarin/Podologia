
@extends('..plantilla.plantillaPagina')



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
<div class="container-fluid">
  <div class="row">
  <div class="col-md-11">  
  <h4 class="alert-heading"><img class="iconosPrincipales" src="imagenes/iconos/clave.svg"><b>Cambiar Contraseña</b></h4>

</div>

    <div class="col-md-6">  
    <br>

    <form action="{{Route('cambiar_clave', $id)}}" method="POST" >     
        @csrf
        @method('patch')   

        <label>USUARIO:</label>   
        <br>

        <input type="text" name="usuario" class="inputFormularios" readonly value="{{$usuario}}" >

        <br>
        
    </div>
    <div class="col-md-4">  
    <br>
    <label>Nueva Contraseña:</label>
        <br>
        <input type="password" name="contraseña" class="inputFormularios" value="">
        <br>
        <label>Validar Contraseña:</label>
        <br>
        <input type="password" name="contraseña2" class="inputFormularios" value="">
    <br>

    <br>
        <input type="submit" class="btnPublicar" value="CAMBIAR">
    </form>
        </div>
    </div>
    <br>
</div>
</div>

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
















