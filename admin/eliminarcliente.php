<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("../funciones.php");
    $id = $_POST['id']; 
    
    $consulta = "DELETE FROM usuarios WHERE id = '$id'";
    $resultado = ejecuta_SQL($consulta);
    
    if($resultado){
        echo"ok";
    }else{
        echo "No se ha borrado, hubo un error";
    }
} else {
    echo "No se ha borrado, hubo un error";
}

?>
