<?php
require_once("../funciones.php");
 $contresenia = $_POST['contresenia'];
 $nombre = $_POST['nombre'];
 $apellido1 = $_POST['apellido1'];
 $apellido2 = $_POST['apellido2'];

 $email = $_COOKIE['email']; 
 try{
    $consulta = "UPDATE usuarios SET contraseña='$contresenia',nombre='$nombre',Primer_Apellido='$apellido1',Segundo_Apellido='$apellido2' WHERE email = '$email'";    
    ejecuta_SQL($consulta);
    echo "¡Los datos se han editado correctamente!";
}
catch(Exception $e){ 
    echo "Error";
}

?>