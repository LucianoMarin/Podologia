<div class="container-fluid">
  <div class="row">
  <div class="col col-md-12">  
  <div class="alert-info alerta" role="alert">
  <h4 class="alert-heading"><img class="icono" src="imagenes/usuario/configuraciones.png"><b>Mi Perfil</b></h4>
  <br>
  <label><h4><b>Nombre Usuario: </b><br>{{$username}}</h4></label>
<br>
<div class="row">
<div class="col-md-6">  
    <br>
        <label>Rut:</label>
        <br>
        <input type="text" name="rut" disabled="disabled" value="{{$especialistas->rut}}-{{$especialistas->verificador}}">
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
    <div class="col-md-5">  
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

    </div>
<hr>
</hr>


<a href="{{Route('edit.perfil', $especialistas->rut)}}"><button class="btnPublicar">Editar Perfil</button></a>


</form>
</div>


</div>
        </div>
    </div>
    <br>
</div>
</div>