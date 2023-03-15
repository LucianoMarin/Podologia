<div class="modal fade" id="ver_paciente{{$pacientes->rut}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informacion Paciente:</h5>
    
      </div>
      <div class="modal-body">
      <label>Rut: </label>
        <br>
        <label>{{($pacientes->rut . '-' . $pacientes->verificador)}}</label>
        <br>
        <label>Nombre: </label>
        <br>
        <label>{{$pacientes->primer_nombre . ' ' . $pacientes->segundo_nombre . ' ' .$pacientes->apellido_paterno .' '.$pacientes->apellido_materno }}</label>
        <br>
        @php
        $fecha=date('d/m/Y', strtotime($pacientes->fecha_nacimiento ));
        @endphp

        <label>Fecha Nacimiento: </label>
        <br>
        <label>{{$fecha}}</label>
        <br>

        <label>Edad</label>
        <br>
  
        <label>{{$pacientes->edad}}</label>
        <br>
    </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <form action="{{route('eliminar.paciente', $pacientes->rut)}}" method="POST">

        <button type="submit" id="btnPublicar" class="btnPublicar">Eliminar</button></div>
        @method('DELETE')
        @csrf

    </form>
    </div>
  </div>
</div>