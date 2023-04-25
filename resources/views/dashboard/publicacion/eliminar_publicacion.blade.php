<div class="modal fade" id="eliminar_publicacion{{$publicacion->id_publicacion}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Publicacion</h5>
    
      </div>
      <div class="modal-body">
        <h1>Eliminar </h1>
        <label>Esta seguro que desea eliminar la publicacion?</label>
        <br>
        <label class="textoSubModal">{{$publicacion->titulo}}</label>
        </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <form action="{{route('eliminar.publicacion',[$publicacion->id_publicacion])}}" method="POST">

        <button type="submit" id="btnPublicar" class="btnPublicar">Eliminar</button></div>
        @method('DELETE')
        @csrf

    </form>
    </div>
  </div>
</div>