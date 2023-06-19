<div class="modal fade" id="eliminarProyecto{{$proyectos->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Proyecto</h5>
    
      </div>
      <div class="modal-body">
    
        <label>Esta seguro que desea eliminar el proyecto: </label>
        <br>
       

        <label><b>Nombre Proyecto: </b>{{ $proyectos->nombre }}</label>  
        <br>
 
    </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      

        <form action="{{route('eliminar_proyecto', [$proyectos->id])}}" method="POST">

        <button type="submit" id="btnPublicar" class="btnPublicar">Eliminar</button></div>
        @method('DELETE')
        @csrf

    </form>
    </div>
  </div>
</div>