<div class="container-fluid">
  <div class="row">
  <div class="col-md-11">  
  <div class="alert-info alerta" role="alert">
  <h4 class="alert-heading"><img class="icono" src="imagenes/usuario/configuraciones.png"><b>Mi Perfil</b></h4>
  <br>
  <label><h4>Nombre Usuario: <br>{{$username}}</h4></label>
  <br>
  <br>
<br>

<hr>
</hr>
<label>Editar Perfil</label>
</div>

</div>

    <div class="col-md-6">  
    <br>
        <label>Rut:</label>
        <br>
        <input type="text" name="rut" disabled="disabled" value="{{$especialistas->rut}}">
        <br>
        <label>Primer Nombre:</label>   
        <br>
        <input type="text" name="primer_nombre" disabled="disabled" value="{{$especialistas->primer_nombre}}">
        <br>
        <label>Segundo Nombre:</label>
        <br>
        <input type="text" name="segundo_nombre"  disabled="disabled" value="{{$especialistas->segundo_nombre}}">
        <br>
       
        
    </div>
    <div class="col-md-4">  
    <br>
    <label>Apellido Paterno:</label>
        <br>
        <input type="text" name="apellido_paterno"  disabled="disabled" value="{{$especialistas->apellido_paterno}}">
        <br>
        <label>Apellido Materno:</label>
        <br>
        <input type="text" name="apellido_materno"  disabled="disabled" value="{{$especialistas->apellido_materno}}">
    <br>
    <br>
  
    <lavel>Cargo: </label>  
    <br>
    <input type="text" disabled="disabled" value="{{$especialistas->nombre}}">
    <br>
    <br>
    <br>
    <br>

        </div>
    </div>
    <br>
</div>
</div>