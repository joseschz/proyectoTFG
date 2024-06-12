<?php
require_once("../funciones.php");
$primerap = $_POST['primerap'];
$segundoap = $_POST['segundoap'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$nombre = $_POST['nombre'];
$rol = $_POST['rol'];
$fechaactual = date("Y-m-d H:i:s");

$consulta = "INSERT INTO usuarios (rol,nombre, email, contraseña, Primer_Apellido,Segundo_Apellido,fecha) VALUES('$rol','$nombre', '$email', '$contraseña', '$primerap', '$segundoap', '$fechaactual')";
$resultado = ejecuta_SQL($consulta);
if($resultado){
    echo "ok";
    
}else{
    echo "No se añadieron los datos";
}
?> 