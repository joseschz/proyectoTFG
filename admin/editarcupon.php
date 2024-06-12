<?php
require_once("../funciones.php");
$id = $_POST['id'];
$codigo = $_POST['codigo'];
$porcentaje = $_POST['porcentaje'];
$rebaja = $_POST['rebaja'];

$consulta = "UPDATE cupones  SET Codigo = '$codigo', Porcentaje = '$porcentaje', REBAJA = '$rebaja' WHERE ID_Cupon = '$id'";
$resultado = ejecuta_SQL($consulta);
if($resultado){
    echo "ok";
    
}else{
    echo "No se actualizaron los datos";
}
?> 