<div class="modal fade" id="eliminar_atencion{{$atenciones->id_atencion}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Atencion</h5>
    
      </div>
      <div class="modal-body">
    
        <label>Esta seguro que desea eliminar la atencion del paciente: </label>
        <br>
        <label class="textoSubModal">{{$atenciones->primer_nombre}} {{$atenciones->segundo_nombre}} {{$atenciones->apellido_paterno}} {{$atenciones->apellido_materno}}</label>
        <br>
        <br>
        @php
        $fecha=date('d/m/Y', strtotime($atenciones->fecha_atencion ));
        $hora = substr($atenciones->hora_inicio, 0, -3);
        $validador = substr($atenciones->rut, -1, 1);
        $rut = substr($atenciones->rut, 0, -1)."-".$validador;
        @endphp
        <label><b>Correspondiente al rut:</b> {{$rut}}</label>  
        <br>

        <label><b>FECHA: </b>{{ $fecha }}</label>  
        <br>
        <label><b>HORA:</b> {{ $hora}}</label>
    </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      

        <form action="{{route('eliminar.atencion', [$atenciones->id_atencion])}}" method="POST">

        <button type="submit" id="btnPublicar" class="btnPublicar">Eliminar</button></div>
        @method('DELETE')
        @csrf

    </form>
    </div>
  </div>
</div>