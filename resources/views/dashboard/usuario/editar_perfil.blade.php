
@extends('..plantilla.plantillaPagina')
<link href="../css/estilo.css" rel="stylesheet"/>
@section('contenedor')
<div class="container-fluid">
  <div class="row">
  <div class="col-md-11">  
  <div class="alert-info alerta" role="alert">
  <h4 class="alert-heading"><b>EDITAR</b></h4>
  <p>Sr <b>usuarios</b>, tener precaucion al cambiar sus datos de perfil, ya que estos se veran reflejados en las demas funciones del sistema.</p>
  <hr>
  <p class="mb-0">Si necesita ayuda, por favor contactarse al correo: </p>
</div>

</div>

    <div class="col-md-6">  
    <br>

    <form action="{{Route('editar.perfil', $especialista->rut)}}" method="POST">

     
        @method('PATCH')   
        @csrf

        <label>Primer Nombre:</label>   
        <br>
        <input type="text" name="edprimer_nombre" value="{{$especialista->primer_nombre}}">
        <br>
        <label>Segundo Nombre:</label>
        <br>
        <input type="text" name="edsegundo_nombre" value="{{$especialista->segundo_nombre}}">
        <br>
       
        
    </div>
    <div class="col-md-4">  
    <br>
    <label>Apellido Paterno:</label>
        <br>
        <input type="text" name="edapellido_paterno" value="{{$especialista->apellido_paterno}}">
        <br>
        <label>Apellido Materno:</label>
        <br>
        <input type="text" name="edapellido_materno" value="{{$especialista->apellido_materno}}">
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















