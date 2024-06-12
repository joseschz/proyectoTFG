<?php
require_once("../funciones.php");
$cupon = $_POST['cupon'];
$porcentaje = $_POST['porcentaje'];
$rebaja = $_POST['rebaja'];
$relacionado = $_POST['relacionado'];

$consulta = "INSERT INTO cupones (Porcentaje,Codigo, REBAJA,ID_Producto) VALUES('$porcentaje','$cupon', '$rebaja', '$relacionado')";
$resultado = ejecuta_SQL($consulta);
if($resultado){
    echo "ok";
    
}else{
    echo "No se añadieron los datos";
}
?> 

