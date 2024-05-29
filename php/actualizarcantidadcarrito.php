<?php
session_start();
require_once('../funciones.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = openssl_decrypt($_POST['id'], COD, KEY);
    $nueva_cantidad = $_POST['nuevaCantidad'];

    if ($id_producto !== false && is_numeric($nueva_cantidad) && $nueva_cantidad > 0) {
        foreach ($_SESSION['carro'] as &$producto) {
            if ($producto['id'] == $id_producto) {
                //actualiza la cantidad del producto
                $producto['cantidad'] = $nueva_cantidad;
                break;
            }
        }
        unset($producto);  // Desreferencia el último elemento para evitar posibles errores
        echo "Cantidad actualizada";
    } else {
        echo "Error al actualizar la cantidad";
    }
}
?>
