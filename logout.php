<?php
require_once('funciones.php');
setcookie('email', '', time() - 3600, '/');
session_destroy();
session_abort();
unset($_SESSION['carro']);
header('Location: index.php');
echo "Logout Successful";
?>
