<?php
require 'funciones.php';
$_SESSION = [];
session_unset();
session_destroy();
//ajax me devuelve aquí y me muestra el siguiente contenido: 
echo "Logout Successful";
?>
