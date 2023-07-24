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
        $hora = substr($atenciones->hora_inicio, 0, -3);
        $hora_final=substr($atenciones->hora_termino, 0,-3);
        $validador = substr($atenciones->rut, -1, 1);
        $mPago=substr($atenciones->precio_atencion,0,-1)."$ ";
        if($atenciones->boleta==0){
        $boleta="No";

        }
        elseif($atenciones->boleta==1){
        $boleta="Si";

        }



        @endphp

        <h3>DATOS PACIENTE: </h3>
        <label><b>Rut</b></label>
        <br>
        <input type="text" value="{{$atenciones->rut}}" readOnly>
        <br>
        <label><b>Nombre</b></label>
        <br>
        <input type="text" value="{{$nombreCompleto}}" readOnly>
        <br>
        <br>
        <h3>HORARIO ASIGNADO: </h3>
        <label><b>Fecha: </b></label>
        <br>
        <input type="text" value="{{$fecha}}" readOnly>
        <br>
        <label><b>Hora Inicio: </b></label>
        <br>
        <input type="text" value="{{$hora}}" readOnly>
        <br>
        <label><b>Hora Termino: </b></label>
        <br>
        <input type="text" value="{{$hora_final}}" readOnly>
        <hr>

        <form action="{{route('editar_hora', $atenciones->id_atencion)}}" method="POST">

        @method('patch')
        @csrf

          <h3>MODIFICANDO HORARIO</h3>
          <label><b>Nueva Fecha</b></label>
          <br>
          <input type="date" id="fecha_atencion" name="fecha_atencion" class="fecha_atencion" min=<?php $hoy = date("Y-m-d");
           echo $hoy; ?> value="<?php $hoy = date("Y-m-d"); echo $hoy;?>">
          <br>
          <div class="mensaje">
          </div>
          <div class="horas">
            <label><b>Nueva Hora Inicio </b></label>
            <br>
            <select name="hora_inicio" id="inicio_hora" class="inicio_hora">
              <option></option>
            </select>

            <br>
            <br>
            <label><b>Nueva Hora Termino </b></label>
            <br>
            <select name="hora_termino" id="termino_hora" class="termino_hora">
              <option></option>
            </select>
          </div>

          <br>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Modificar</button>

        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>