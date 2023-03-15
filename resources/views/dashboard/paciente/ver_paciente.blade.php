<div class="modal fade" id="ver_paciente{{$pacientes->rut}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informacion Paciente:</h5>
    
      </div>
      <div class="modal-body">
      <h3>Datos Personales: </h3>
      <label><b>Rut: </b></label>
        <br>
        <label>{{($pacientes->rut . '-' . $pacientes->verificador)}}</label>
        <br>
        <label><b>Nombre: </b></label>
        <br>
        <label>{{$pacientes->primer_nombre . ' ' . $pacientes->segundo_nombre . ' ' .$pacientes->apellido_paterno .' '.$pacientes->apellido_materno }}</label>
        <br>
        @php
        $fecha=date('d/m/Y', strtotime($pacientes->fecha_nacimiento ));
        @endphp
        <label><b>Fecha Nacimiento: </b></label>
        <br>
        <label>{{$fecha}}</label>
        <br>

        <label><b>Edad: </b></label>
        <br>
  
        <label>{{$pacientes->edad}}</label>
        <br>

        <hr>
        <h3>Contacto: </h3>
        <label><b>Dirección: </b></label>
        <br>
  
        <label>{{$pacientes->direccion}}</label>
        <br>
      
        <label><b>Teléfono: </b></label>
        <br>
        <label>{{$pacientes->telefono}}</label>
        <br>
    </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

    </div>
  </div>
</div>