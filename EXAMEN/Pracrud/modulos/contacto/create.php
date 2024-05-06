<!--crear-->
<?php

 if($_POST){
   $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
   $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
   $fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");

   $stm=$conexion->prepare("INSERT INTO contactos(Id,nombre,telefono,fecha)
   VALUE(null,:nombre,:telefono,:fecha)");
   $stm->bindparam(":nombre",$nombre);
   $stm->bindparam(":telefono",$telefono);
   $stm->bindparam(":fecha",$fecha);
   $stm->execute();

   header("location:index.php");
 }










?>
<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="" placeholder="ingresa nombre">
      

        <label for="">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="" placeholder="ingresa telefono">
       

        <label for="">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="">



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>