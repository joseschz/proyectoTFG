<?php
require 'funciones.php';
//obtengo datos de ajax metodo post 
$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$email = $_POST['email'];
$primerapellido = $_POST['primerapellido'];
$segundoapellido = $_POST['segundoapellido'];

//hago comprobacion de que los datos no existen en la base de datos
$consultausuario = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = ejecuta_SQL($consultausuario);
    if ($resultado->rowCount() > 0) {
        echo "Este usuario o correo ya existe! Por favor elija otro.";
        exit;
    } else {
        $consulta = "INSERT INTO usuarios (rol, nombre, email, contraseña, Primer_Apellido , Segundo_Apellido) 
             VALUES ('[ROLE_USER]', '$nombre', '$email', '$contraseña', '$primerapellido', '$segundoapellido')";
            $resultado = ejecuta_SQL($consulta);
        echo "Usuario registrado correctamente";
    }
?>

