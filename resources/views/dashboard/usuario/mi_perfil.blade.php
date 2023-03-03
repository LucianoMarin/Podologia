<div class="container-fluid">
  <div class="row">
  <div class="col-md-11">  
  <div class="alert-info alerta" role="alert">
  <h4 class="alert-heading"><img src="imagenes/usuario/configuraciones.png"><b>Mi Perfil</b></h4>
<label>Opciones:</label>
<br>
<label>Editar Perfil</label>
<hr>
</hr>
</div>

</div>

    <div class="col-md-6">  
    <br>

    <form action="" method="POST">
        <label>Rut:</label>
        <br>
        <input type="text" name="rut" disabled="disabled">
        <br>
        <label>Primer Nombre:</label>   
        <br>
        <input type="text" name="nombre" disabled="disabled">
        <br>
        <label>Segundo Nombre:</label>
        <br>
        <input type="text" name="segundo_nombre"  disabled="disabled">
        <br>
       
        
    </div>
    <div class="col-md-4">  
    <br>
    <label>Apellido Paterno:</label>
        <br>
        <input type="text" name="apellido_paterno"  disabled="disabled">
        <br>
        <label>Apellido Materno:</label>
        <br>
        <input type="text" name="apellido_materno"  disabled="disabled">
    <br>
    <br>
  
    <lavel>Cargo: </label>  
    <br>
    @foreach($cargo as $cargos)
    <input type="text" value="{{$cargos->nombre}}" disabled="disabled">
    @endforeach
   
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