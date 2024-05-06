<?php 
include("../../conexion.php");


if(isset($_GET['Id'])){ 

    $txtId=(isset($_GET['Id'])?$_GET['Id']:"");
    $stm=$conexion->prepare("SELECT * FROM contactos WHERE Id=:txtId");
    $stm->bindparam(":txtId",$txtId);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $nombre=$registro['nombre'];
    $telefono=$registro['telefono'];
    $fecha=$registro['fecha'];
}

if($_POST){
    $txtId=(isset($_POST['txtId'])?$_POST['txtId']:"");
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
    $fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");
 
    $stm=$conexion->prepare("UPDATE contactos SET nombre=:nombre,telefono=:telefono,fecha=:fecha WHERE Id=:txtId");
    $stm->bindparam(":nombre",$nombre);
    $stm->bindparam(":telefono",$telefono);
    $stm->bindparam(":fecha",$fecha);
    $stm->bindparam(":txtId",$txtId);
    $stm->execute();
 
    header("location:index.php");
  }









?>
<?php include("../../template/header.php")?>


<form action="" method="post">


        <input type="hidden" class="form-control" name="txtId" value="<?php echo $txtId; ?>" placeholder="ingresa nombre">
      
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" placeholder="ingresa nombre">
      

        <label for="">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>" placeholder="ingresa telefono">
       

        <label for="">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="<?php echo $fecha; ?>">



      </div>
      <div class="modal-footer">
        <a href="index.php"class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>
      <?php include("../../template/footer.php")?>