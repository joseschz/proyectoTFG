<?php
require_once("../funciones.php");
session_start();
$json = file_get_contents("php://input");
$datos = json_decode($json, true);


if (is_array($datos)) {
    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = openssl_encrypt($_COOKIE['email'], COD, KEY); 
    $nombre = $datos['detalles']['nombre'];
    $primerapellido = $datos['detalles']['primerapellido'];
    $segundoapellido = $datos['detalles']['segundoapellido'];
    $direccion = $datos['detalles']['direccion'];
    $cp = $datos['detalles']['cp'];
    $telefono = $datos['detalles']['telefono'];
    
    // Inserto valores obtenidos de PayPal y del formulario rellenado.
    $consulta = "INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente, total, NombreCompra, PrimerApellidoCompra, SegundoApellidoCompra, DireccionCompra, CPCompra, TelefonoCompra) VALUES ('$id_transaccion', '$fecha_nueva', '$status', '$email', '$id_cliente', '$total', '$nombre', '$primerapellido', '$segundoapellido', '$direccion', '$cp', '$telefono')";
    $resultado = ejecuta_SQL($consulta);

    if (isset($_SESSION['carro'])) {
        foreach ($_SESSION['carro'] as $indice => $producto) {
            $idencriptado = openssl_encrypt($producto['id'], COD, KEY);
            $id = $producto['id']; 
            $nombre = openssl_encrypt($producto['nombre'], COD, KEY); 
            $precio = openssl_encrypt($producto['precio'], COD, KEY); 
            $cantidad = openssl_encrypt(intval($producto['cantidad']), COD, KEY);  // Convertir a entero
            
            // Obtener el stock actual del producto desde la tabla productos
            $consulta = "SELECT stock FROM productos WHERE ID_Producto = '$id'";
            $resultado = ejecuta_SQL($consulta);
            foreach($resultado as $row){$stock = $row['stock'];}
            $stock = intval(trim($row['stock']));  // Convertir a entero y eliminar espacios en blanco alrededor

            // Calcular el nuevo stock
            $totalstock = $stock - $cantidad;
            $totalstock_str = strval($totalstock);

            // Inserto en la base de datos el detalle de los productos comprados 
            $consulta = "INSERT INTO detalle_compra (id_cliente, id_producto, nombre, precio, cantidad,fecha) VALUES ('$id_cliente', '$id', '$nombre', '$precio', '$cantidad','$fecha_nueva')";
            $resultado = ejecuta_SQL($consulta);

            // Actualizar el stock del producto
            $consulta = "UPDATE productos SET stock = '$totalstock_str' WHERE ID_Producto = '$id'";
            $resultado = ejecuta_SQL($consulta);
        }

        // Limpiar el carrito de la sesión
        unset($_SESSION['carro']);
    } else {
        echo "No hay productos en el carrito.";
    }
}

?>
