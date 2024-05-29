<?php
require_once('funciones.php');

// Obtain data from AJAX POST method 
$contraseña = $_POST['contraseña'];
$email = $_POST['email'];

// Check if the user exists in the database
$consultausuario = "SELECT email, contraseña, rol FROM usuarios WHERE email = '$email'";
$resultado = ejecuta_SQL($consultausuario);

if ($resultado->rowCount() > 0) {
    foreach ($resultado as $row) {
        $pass = $row['contraseña'];
        $emailadress = $row['email'];
        $rol = $row['rol'];
    }

    if ($rol === '[ROLE_ADMIN]') {
        echo "Admin";
        setcookie("email", $email, time() + (86400), "/");
        exit;
    } else {
        if ($contraseña == $pass) {
            echo "Logeado correctamente";
            setcookie("email", $email, time() + (86400), "/");  // Cookie valida 1 dia
            exit;
        } else {
            echo "Hubo un error en email o contraseña";
            exit;
        }
    }
} else {
    echo "No existe este email o contraseña";
}
?>
