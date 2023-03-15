<div class="modal fade" id="eliminar_paciente{{$pacientes->rut}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Paciente</h5>
    
      </div>
      <div class="modal-body">
        <h1>Eliminar </h1>
        <label>Esta seguro que desea eliminar el paciente?</label>
        <br>
        <label class="textoSubModal">{{$pacientes->primer_nombre}} {{$pacientes->segundo_nombre}} {{$pacientes->apellido_paterno}} {{$pacientes->apellido_materno}}</label>
        <br>
        <br>
        <label><b>Correspondiente al rut:</b> {{$pacientes->rut}}-{{$pacientes->verificador}}</label>    
    </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      

        <form action="{{route('eliminar.paciente', [$pacientes->id_paciente])}}" method="POST">

        <button type="submit" id="btnPublicar" class="btnPublicar">Eliminar</button></div>
        @method('DELETE')
        @csrf

    </form>
    </div>
  </div>
</div>