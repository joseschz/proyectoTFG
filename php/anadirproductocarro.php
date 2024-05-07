<?php
session_name("carro");
session_start();
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("../funciones.php");
    
    $id_producto = openssl_decrypt($_POST['id'], COD, KEY);
    $nombre_producto = openssl_decrypt($_POST['nombre'], COD, KEY);
    $precio_producto = openssl_decrypt($_POST['precio'], COD, KEY);
    $cantidad = openssl_decrypt($_POST['cantidad'], COD, KEY);
    $imagen = openssl_decrypt($_POST['imagen'], COD, KEY);
    
    if (!isset($_SESSION['carro'])) {
        $producto = array(
            'id' => $id_producto,
            'nombre' => $nombre_producto,
            'precio' => $precio_producto,
            'imagen' => $imagen,
            'cantidad' => $cantidad
        );
        $_SESSION['carro'][0] = $producto;

    } else {
        $numero_productos = count($_SESSION['carro'])+1;
        $producto = array(
            'id' => $id_producto,
            'nombre' => $nombre_producto,
            'precio' => $precio_producto,
            'imagen' => $imagen,
            'cantidad' => $cantidad
        );
        $_SESSION['carro'][$numero_productos] = $producto;
        echo "$numero_productos";  // Respondiendo a la solicitud AJAX

    }
    
    
}
?>
