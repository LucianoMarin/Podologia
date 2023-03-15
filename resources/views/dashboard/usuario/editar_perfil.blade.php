
@extends('..plantilla.plantillaPagina')



@section('menuLateral')


<img class="icono" src="../imagenes/iconos/enlace.png">
<label class="submenu">Accesos rapidos</label>
<br>
<a href="#">Ing. Paciente</a>
<br>
<a href="#">Agendar Hora</a>
@stop




@section('contenedor')
<div class="container-fluid">
  <div class="row">
  <div class="col-md-11">  
  <div class="alert-info alerta" role="alert">
  <h4 class="alert-heading"><b>EDITAR</b></h4>
  <p>Sr <b>usuarios</b>, tener precaucion al cambiar sus datos de perfil, ya que estos se veran reflejados en las demas funciones del sistema.</p>


  <hr>
  <p class="mb-0">Si necesita ayuda, por favor contactarse con un administrador.</p>
</div>

</div>

    <div class="col-md-6">  
    <br>

    <form action="{{Route('editar.perfil', $especialista->id_especialista)}}" method="POST" id="editar_perfil">     
    @csrf
    @method('PUT')   

        <label>Primer Nombre:</label>   
        <br>
        <input type="text" name="primer_nombre" value="{{$especialista->primer_nombre}}">
        <br>
        <label>Segundo Nombre:</label>
        <br>
        <input type="text" name="segundo_nombre" value="{{$especialista->segundo_nombre}}">
        <br>
       
        
    </div>
    <div class="col-md-4">  
    <br>
    <label>Apellido Paterno:</label>
        <br>
        <input type="text" name="apellido_paterno" value="{{$especialista->apellido_paterno}}">
        <br>
        <label>Apellido Materno:</label>
        <br>
        <input type="text" name="apellido_materno" value="{{$especialista->apellido_materno}}">
    <br>
    <br>

    <lavel>Cargo: </label>  
    <select name="cargo">
    @foreach($cargo as $cargos)
    <option value="{{$cargos->id_cargo}}">{{$cargos->nombre}}</option>
    @endforeach
    </select>
    <br>
    <br>
    <br>
    <br>
        <input type="submit" class="btnPublicar" value="Guardar">
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
















