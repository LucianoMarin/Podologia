<div class="modal fade" id="confirmar_atencion{{$atenciones->id_atencion}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    
      </div>
      <div class="modal-body">
    
        <label class="notificacion">Esta seguro de <b>Confirmar</b> la atencion?</label>
        
    </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      

        <form action="{{route('confirmar_atencion', [$atenciones->id_atencion])}}" method="POST">

        <button type="submit" id="btnPublicar" class="btnPublicar">Confirmar</button></div>
        @method('PATCH')

        @csrf

    </form>
    </div>
  </div>
</div>