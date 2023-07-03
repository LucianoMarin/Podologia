<div class="modal fade" id="eliminar_Atencion{{$atenciones->id_atencion}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    
      </div>
      <div class="modal-body">
    
        <label class="notificacion">Esta seguro que desea <b>Rechazar</b> la atencion? </label>
        <br>
       
        <br>
 
    </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      

        <form action="{{route('rechazar_atencion', $atenciones->id_atencion)}}" method="POST">

        <button type="submit" id="btnPublicar" class="btnPublicar">Rechazar</button></div>
        @method('DELETE')
        @csrf

    </form>
    </div>
  </div>
</div>