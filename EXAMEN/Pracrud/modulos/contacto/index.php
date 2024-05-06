<?php 
include("../../conexion.php");

$stm=$conexion->prepare("SELECT * FROM contactos");
$stm->execute();
$contactos=$stm->fetchAll(PDO::FETCH_ASSOC);


//eliminar//

if(isset($_GET['Id'])){
    $txtId=(isset($_GET['Id'])?$_GET['Id']:"");
    $stm=$conexion->prepare("DELETE FROM contactos WHERE Id=:txtId");
    $stm->bindparam(":txtId",$txtId);
    $stm->execute();
    header("location:index.php");
}



?>



<?php include("../../template/header.php")?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Agregar
</button>
<!--bs5-table-deafult-->
<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto) {?>
            <tr class="">
                <td scope="row"><?php echo $contacto['Id']; ?></td>
                <td><?php echo $contacto['nombre'];?></td>
                <td><?php echo $contacto['telefono'];?></td>
                <td><?php echo $contacto['fecha'];?></td>
                <td>
                <a href="edit.php?Id=<?php echo $contacto['Id']; ?>" class="btn btn-success">Editar</a>
                <a href="index.php?Id=<?php echo $contacto['Id']; ?>" class="btn btn-danger">Eliminar</a>



                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<?php include("create.php"); ?>






<?php include("../../template/footer.php")?>