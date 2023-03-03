<div class="modal fade" id="crear_publicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Publicacion</h5>
    
      </div>
      <form action="publicaciones" method="POST" id="form_crearPublicacion">
        @csrf
      <div class="modal-body mEstilo">
      <label>Tipo: </label>
        <br>
        <select name="tipo" id="sTipo">
        <option value="nota">Nota</option>
        <option value="noticia">Noticia</option>
        </select>
       
        <br>
     
        <label>Titulo: </label>
        <br>
        <input type="text" id="txtTitulo" class="txtTitulo" name="titulo">
        <br>
        <div class="vModal"></div>
        <label> Publicacion</label>
        <br>
        <textarea id="txtComentario" class="txtComentario" name="publicacion"></textarea>
        <div class="vModal"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btnPublicar" class="btn btn-primary">Publicar</button>
    </form>
      </div>
    </div>
  </div>
</div>
