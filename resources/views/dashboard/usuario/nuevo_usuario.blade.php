<div class="container-fluid">
  <div class="row">
  <div class="col-md-11">  
  <div class="alert-info alerta" role="alert">
  <h4 class="alert-heading"><b>IMPORTANTE!</b></h4>
  <p>El registro de datos personales es obligatorio para los <b>usuarios nuevos</b>, si sus datos personales no son registrados, su cuenta no se considerada como especialista y no podra usar todas las funcionalidades del sistema.</p>
  <br>
  <p class="text-danger">Por favor tener precaucion al ingresar su RUT, ya que este solo podra ser modificado posteriormente por un administrador!</p>
  <hr>
  <p class="mb-0">Si necesita ayuda, por favor contactarse al correo: </p>
</div>

</div>

    <div class="col-md-6">  
    <br>

    <form action="{{Route('crear.perfil')}}" method="POST">
        @csrf
        <label>Rut:</label>
        <br>
        <input type="text" name="rut"> - <select>
            <option selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="K">K</option>
        </select>
        <br>
        <label>Primer Nombre:</label>   
        <br>
        <input type="text" name="primer_nombre">
        <br>
        <label>Segundo Nombre:</label>
        <br>
        <input type="text" name="segundo_nombre">
        <br>
       
        
    </div>
    <div class="col-md-4">  
    <br>
    <label>Apellido Paterno:</label>
        <br>
        <input type="text" name="apellido_paterno">
        <br>
        <label>Apellido Materno:</label>
        <br>
        <input type="text" name="apellido_materno">
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