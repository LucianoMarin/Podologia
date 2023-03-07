
@extends('..plantilla.plantillaPagina')
<link href="../css/estilo.css" rel="stylesheet"/>


@section('contenedor')
<div class="container-fluid">
  <div class="row">
  <div class="col-md-11">  
  <div class="alert-info alerta" role="alert">
  <h4 class="alert-heading"><b>EDITAR</b></h4>
  <p>El registro de datos personales es obligatorio para los <b>usuarios nuevos</b>, si sus datos personales no son registrados, su cuenta no se considerada como especialista y no podra usar todas las funcionalidades del sistema.</p>
  <hr>
  <p class="mb-0">Si necesita ayuda, por favor contactarse con un administrador.</p>
</div>

</div>

    <div class="col-md-6">  
    <br>

    <form action="{{Route('editar.perfil', $especialista->rut)}}" method="POST">
        @method('PATCH')   
        @csrf
        <label>Primer Nombre:</label>   
        <br>
        <input type="text" name="edprimer_nombre">
        <br>
        <label>Segundo Nombre:</label>
        <br>
        <input type="text" name="edsegundo_nombre">
        <br>
       
        
    </div>
    <div class="col-md-4">  
    <br>
    <label>Apellido Paterno:</label>
        <br>
        <input type="text" name="edapellido_paterno">
        <br>
        <label>Apellido Materno:</label>
        <br>
        <input type="text" name="edapellido_materno">
    <br>
    <br>
  
    <lavel>Cargo: </label>  
    <select name="edcargo">
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















