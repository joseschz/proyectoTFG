<?php
session_start();
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../funciones.php');

    $id_producto = openssl_decrypt($_POST['id'], COD, KEY);
    $nombre_producto = openssl_decrypt($_POST['nombre'], COD, KEY);
    $precio_producto = openssl_decrypt($_POST['precio'], COD, KEY);
    $cantidad = openssl_decrypt($_POST['cantidad'], COD, KEY);
    $imagen = openssl_decrypt($_POST['imagen'], COD, KEY);

    if (!isset($_SESSION['carro'])) {
        // Si no hay carrito, inicializarlo con el producto
        $producto = array(
            'id' => $id_producto,
            'nombre' => $nombre_producto,
            'precio' => $precio_producto,
            'imagen' => $imagen,
            'cantidad' => $cantidad
        );
        $_SESSION['carro'][] = $producto;
    } else {
        $producto_existe = false;
        foreach ($_SESSION['carro'] as &$producto) {
            if ($producto['id'] == $id_producto) {
                // Si el producto ya está en el carrito, sumar la cantidad
                $producto['cantidad'] += $cantidad;
                $producto_existe = true;
                break;
            }
        }
        unset($producto);  // Desreferencia el último elemento para evitar posibles errores

        if (!$producto_existe) {
            // Si el producto no está en el carrito, agregarlo como nuevo
            $producto = array(
                'id' => $id_producto,
                'nombre' => $nombre_producto,
                'precio' => $precio_producto,
                'imagen' => $imagen,
                'cantidad' => $cantidad
            );
            $_SESSION['carro'][] = $producto;
        }
    }

    // Contar el número total de productos
    $numero_productos = count($_SESSION['carro']);
    echo "$numero_productos";  // Respondiendo a la solicitud AJAX
}
?>
