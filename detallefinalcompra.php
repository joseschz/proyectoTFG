
    <?php 
    include_once('header.php'); 
    include_once('funciones.php');
    $id_usuario = openssl_encrypt($_COOKIE['email'],COD,KEY);

$consulta = "SELECT id_transaccion FROM compra WHERE id_cliente = '$id_usuario' ORDER BY fecha DESC LIMIT 1 ";
$resultado = ejecuta_SQL($consulta);
foreach($resultado as $row){$id_transaccion = $row['id_transaccion'];}
//hago la consulta para traer los datos de la compra con la condicion donde la compra sea la última segun la fecha.
    $principal = "SELECT DISTINCT
	detalle_compra.nombre, 
	detalle_compra.precio, 
	detalle_compra.cantidad, 
	compra.fecha, 
	compra.email, 
	compra.`status`, 
	compra.id_transaccion, 
	compra.total, 
	productos.imagen, 
	compra.DireccionCompra, 
	compra.NombreCompra, 
	compra.PrimerApellidoCompra, 
	compra.SegundoApellidoCompra, 
	compra.CPCompra, 
	compra.TelefonoCompra, 
	productos.Orden
FROM
	detalle_compra
	INNER JOIN
	compra
	ON 
		detalle_compra.fecha = compra.fecha
	INNER JOIN
	productos
	ON 
		detalle_compra.id_producto = productos.ID_Producto
WHERE
	compra.id_transaccion = '$id_transaccion'
ORDER BY
	compra.fecha DESC;
";
    $resultado = ejecuta_SQL($principal);
    foreach($resultado as $row)
    {
        $id_transaccion = $row['id_transaccion'];
        $fecha = $row['fecha'];
        $estado = $row['status'];
        $total = $row['total'];
        $cantidad = openssl_decrypt($row['cantidad'],COD,KEY);
        $direccion = $row['DireccionCompra'];
        $comprador = $row['NombreCompra'];
        $apellido1 = $row['PrimerApellidoCompra'];
        $apellido2 = $row['SegundoApellidoCompra'];
        $cp = $row['CPCompra'];
        $telefono = $row['TelefonoCompra'];
    }
    echo '<br><div class="containerdetallefinal">
        <h1>ID del pedido: <strong style="color: #3581b4">'.$id_transaccion.'</strong></h1>
        <p>Realizado en la fecha: <strong style="color: green">'.$fecha.'</strong></p>
        <p>Estado: <strong style="color: red">'.$estado.'</strong></p>';
$consulta2 = "$principal";
    $resultado = ejecuta_SQL($consulta2);
    foreach($resultado as $row){
        
        $nombre = openssl_decrypt($row['nombre'],COD,KEY);
        $precio = openssl_decrypt($row['precio'],COD,KEY);
        $orden = $row['Orden'];
    echo'<div class="itemdetallefinal">
    <img src="images/'.$row['imagen'].'" style="width: 100px;max-height: 100px;margin-right: 20px;" alt="'.$nombre.'">
            <div class="itemdetallefinalcompra-details">
                <strong style="color: black">'.$nombre.'</strong>
                <p class="pricedetallefinalcompra"><strong style="color: #3581b4">'.$precio.'€</strong></p>
                <p>'.$orden.'</p>
                <p><strong style="color: purple">Cantidad:</strong> '.$cantidad.'</p>
                <p>Pedido pendiente de revisión.</p>
            </div>
        </div>';
    }
        echo'<h2>Dirección de entrega</h2>
        <p style="color:black;font-size: 18px"><strong>Nombre:</strong> '.$comprador.' '.$apellido1.' '.$apellido2.'</p>
        
        <p style="color:black;font-size: 18px"><strong>Dirección:</strong> '.$direccion.'</p>
        <br>
        <h2>Resumen del Pedido</h2>
        <div class="summarydetallefinalcompra">
            <p><strong>TOTAL</strong> <span><strong style="color: #3581b4">'.$total.'€</strong></span></p>
        </div>
        
        <div class="helpdetallefinalcompra">
            <p>¿Tienes problemas con tu pedido?</p>
            <a href="contacto.php">Contacta con nosotros</a>
        </div>
    </div><br>';
?>
    <?php include_once('footer.php'); ?>
