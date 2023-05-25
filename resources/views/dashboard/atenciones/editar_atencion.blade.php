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
      <input type="text" value="{{$atenciones->rut}}"  readOnly>
      <br>
      <label><b>Nombre</b></label>
      <br>
      <input type="text" value="{{$nombreCompleto}}"  readOnly>
      <br>
      <hr>
      <br>
      <h3>HORARIO ASIGNADO: </h3>
      <label><b>Fecha: </b></label>
      <br>
      <input type="text" value="{{$fecha}}" readOnly>
      <br>
      <label><b>Hora: </b></label>
      <br>
      <input type="text" value="{{$hora}}" readOnly>
      <hr>
        <h3>MODIFICANDO HORARIO</h3>
      <label><b>Nueva Fecha</b></label>
      <br>
      <input type="date" id="fecha_atencion" name="fecha_atencion" class="fecha_atencion">
      <br>
      <label><b>Nueva Hora </b></label>
      <br>
      <select name="hora" id="hora" class="hora">
<option></option>

</select>

<br>
<hr>
<h3>TIPO DE ATENCION</h3>
<label><b>Tipo:</b></label>
<br>
<select class="tipo_atencion" name="tipo_atencion">
<option value="" selected></option>
    @foreach($tipo_atencion as $tipo_atenciones)
<option value="{{$tipo_atenciones->id_tipo}}">{{$tipo_atenciones->nombre_tipo}}</option>
@endforeach
</select>

<br>
<br>
<div class="mostrarNombre">
<label >Nombre Proyecto:</label>
<select class="nombre_proyecto" id="nombre_proyecto" name="nombre_proyecto">
</select>
</div>
<br>
<br>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
  </div>
</div>
</div>
</div>