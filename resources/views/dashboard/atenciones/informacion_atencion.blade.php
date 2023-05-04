<div class="modal fade" id="verInformacion{{$atenciones->id_atencion}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INFORMACION HORA</h5>
    
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
      <label><b>Nombre Paciente:</b> {{$nombreCompleto}}</label>
      <br>
        <label><b>FECHA: </b>{{ $fecha }}</label>  
        <br>
        <label><b>HORA:</b> {{ $hora}}</label>
        <br>
        <hr>
        <label><b>BOLETA:</b> {{$boleta}}</label>
        <br>
        <label><b>VALOR:</b> {{ "$".$atenciones->precio_atencion }}</label>

        <hr>
        <label><b>OBS:</b>{{" ". $atenciones->nota}} </label>
    </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      

    </div>
  </div>
</div>