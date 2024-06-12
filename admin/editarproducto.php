<?php
require_once("../funciones.php");
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombre'];
$stock = $_POST['stock'];
$precio = $_POST['precio']; 
$orden = $_POST['orden'];
$consulta = "UPDATE productos  SET Nombre = '$nombre', Precio = '$precio', Descripcion = '$descripcion', stock = '$stock', Orden = '$orden' WHERE ID_Producto = '$id'";
$resultado = ejecuta_SQL($consulta);
if($resultado){
    echo "ok";
    
}else{
    echo "No se actualizaron los datos";
}
?> 