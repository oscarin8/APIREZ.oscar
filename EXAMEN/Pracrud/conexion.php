<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$db = "crudphp";

try {
   
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $password);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
