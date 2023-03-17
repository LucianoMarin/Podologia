
<div class="modal fade" id="editar_paciente{{$pacientes->rut}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Paciente</h5>
    
      </div>
      <div class="modal-body">
        <label>Rut</label>
        <br>
        @php
        $rut=substr($pacientes->rut,0, -1);
        $verificador=substr($pacientes->rut, -1);
        $fecha=date('Y-m-d', strtotime($pacientes->fecha_nacimiento));

        @endphp
        <form action="{{route('editar.paciente', [$pacientes->rut])}}" method="POST" id="formulario_editarPaciente">
      <input type="text" name="rut" id="rut" value="{{$rut}}"> -
<select name="verificador" id="verificador">
    <option selected value="{{$verificador}}">*{{$verificador}}</option>
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="k">K</option>
</select>
<br>
<label>Primer Nombre: </label>
<br>
<input type="text" name="primer_nombre" id="primer_nombre" value="{{$pacientes->primer_nombre}}">
<br>
<label>Segundo Nombre: </label>
<br>
<input type="text" name="segundo_nombre" id="segundo_nombre" value="{{$pacientes->segundo_nombre}}">
<br>
<label>Apellido Paterno: </label>
<br>
<input type="text" name="apellido_paterno" id="apellido_paterno" value="{{$pacientes->apellido_paterno}}">
<br>
<label>Apellido Materno: </label>
<br>
<input type="text" name="apellido_materno" id="apellido_materno" value="{{$pacientes->apellido_materno}}">
<br>


<label>Fecha de nacimiento: </label>
<br>
<input type="date" name="fecha_nacimiento"  id="fecha_nacimiento2" class="fecha_nacimiento2" value="{{$fecha}}">
<br>
<label>Edad: </label>
<br>
<input type="text" name="edad" class="edad2" id="edad2"  readonly value="{{$pacientes->edad}}">
<br>
<label>Direccion: </label>
<br>
<input type="text" name="direccion" id="direccion" value="{{$pacientes->direccion}}">
<br>
<label>Telefono: </label>
<br>
<input type="text" name="telefono" id="telefono" value="{{$pacientes->telefono}}">
<br>


<label>Discapacidad: </label>
<br>
<label>Si</label>
<input type="radio" id="discapacidad" name="discapacidad" value="0" />
<label>No</label>
<input type="radio" id="discapacidad" name="discapacidad" value="1" />



<br>
<br>    




<br>
<br>


    </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      



        <button type="submit" id="btnPublicar" class="btnPublicar">Modificar</button></div>
        @method('PATCH')
        @csrf

    </form>
    </div>
  </div>
</div>