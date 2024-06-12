<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("./funciones.php");
    $id = $_POST['id']; 
    $idproducto = $_POST['idproducto'];
    $mensaje = $_POST['mensaje'];
    $valoracion = $_POST['valoracion'];
    $fechaactual = date("Y-m-d");
    $consulta = "INSERT INTO `reseña` ( `id`, `id_usuario`, `mensaje`, `valoracion`, `fecha`) VALUES ( '$idproducto','$id', '$mensaje', '$valoracion', '$fechaactual')";
    $resultado = ejecuta_SQL($consulta);
    if($resultado){
        echo"ok";
    }else{
        echo "No se ha añadido, hubo un error";
    }
} else {
    echo "No se ha añadido, hubo un error";
}

?>
