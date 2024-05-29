<?php
require_once("../funciones.php");
 $direccion = $_POST['direccion'];
 $cp = $_POST['cp'];
 $telefono = $_POST['telefono'];
 $email = $_COOKIE['email']; 
 try{
    $consulta = "UPDATE usuarios SET direccion='$direccion',cp='$cp',telefono='$telefono' WHERE email = '$email'";    
    ejecuta_SQL($consulta);
    echo "¡Los datos se han editado correctamente!";
}
catch(Exception $e){ 
    echo "Error";
}

?>