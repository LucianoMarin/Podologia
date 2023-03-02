<div class="modal fade" id="editar_publicacion{{$publicacion->id_publicacion}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Publicacion</h5>
    
      </div>
      <form action="{{route('editar.publicacion', [$publicacion->id_publicacion])}}" id="form_EPublicacion" method="POST">
      @method('PATCH')   
        @csrf
      <div class="modal-body mEstilo">
      <label>Tipo: </label>
        <br>
        <select name="tipo">
        <option value="noticia">Noticia</option>
        <option value="nota">Nota</option>
        </select>
       
        <br>
     
        <label>Titulo: </label>
        <br>
        <input type="text" id="txtTituloEd" class="txtTitulo" name="titulo" value="{{$publicacion->titulo}}">
        <br>
        <div class="vModalEDTitulo"></div>
        <label> Publicacion</label>
        <br>
        <textarea id="txtComentarioEd" class="txtComentario" name="publicacion">{{$publicacion->contenido}}</textarea>
        <br>
        <div class="vModalEDComentario"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btnPublicar" class="btn btn-primary">Modificar</button>
    </form>
      </div>
    </div>
  </div>
</div>