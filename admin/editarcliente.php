<?php
require_once("../funciones.php");
$id = $_POST['id'];
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$primerap = $_POST['primerap'];
$segundoap = $_POST['segundoap']; 
$rol = $_POST['rol'];
$consulta = "UPDATE usuarios  SET nombre = '$nombre', Primer_Apellido = '$primerap', email = '$email', Segundo_Apellido = '$segundoap', rol = '$rol' WHERE id = $id";
$resultado = ejecuta_SQL($consulta);
if($resultado){
    echo "ok";
    
}else{
    echo "No se actualizaron los datos";
}
?> 