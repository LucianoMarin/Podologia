<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="editarAtencion{{$atenciones->id_atencion}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR HORA</h5>
    
      </div>
      <div class="modal-body">

        @php
        $fecha=date('d/m/Y', strtotime($atenciones->fecha_atencion ));
        $nombreCompleto=$atenciones->primer_nombre." ".$atenciones->segundo_nombre." ".$atenciones->apellido_paterno;
        $hora = substr($atenciones->hora, 0, -3);
        $validador = substr($atenciones->rut, -1, 1);
        $mPago=substr($atenciones->precio_atencion,0,-1)."$ ";
        if($atenciones->boleta==0){
            $boleta="No";

        }
        elseif($atenciones->boleta==1){
            $boleta="Si";

        }

 

        @endphp


      <label><b>Rut</b></label>
      <br>
      <input type="text" value="{{$atenciones->rut}}" disabled="disabled" readOnly>
      <br>
      <label><b>Nombre</b></label>
      <br>
      <input type="text" value="{{$nombreCompleto}}" disabled="disabled" readOnly>
      <br>
      <hr>
        <h3>MODIFICANDO HORARIO</h3>
        <br>
      <label><b>Nueva Fecha</b></label>
      <br>
      <input type="date" id="fecha_atencion" name="fecha_atencion" class="fecha_atencion">
      <br>
      <label><b>Nueva Hora </b></label>
      <br>
      <select name="hora" id="hora" class="hora">
<option></option>

</select>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      

    </div>
  </div>
</div>
</div>
</div>