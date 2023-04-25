
<!-- Modal -->
<div class="modal fade" id="ver_publicacion{{$publicacion->id_publicacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ver Publicacion</h5>
    
      </div>
     
      <div class="modal-body">
      <label>Contenido: </label>
        <br>
     
        <textarea id="txtComentario"  class="txtComentario" name="publicacion" disabled="disabled">{{$publicacion->contenido}}</textarea>
        <br>
        <br>
        @php
        $fecha=date('d/m/Y', strtotime($publicacion->fecha_publicacion));
        @endphp
        <label>Fecha Publicacion: {{$fecha}}</label>
        <br>
      </div>
    <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>