<?php include('header.php'); include('script.php');require_once("funciones.php");?>

<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php 
if(!empty($_SESSION['carro'])){
    echo '
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre de Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>';

    $total = 0;
    foreach ($_SESSION['carro'] as $indice => $producto){
        // desde ajax cambio el display a none cuando se elimina el elemento
        echo '
                                
                                <tr data-id="'.openssl_encrypt($producto['id'],COD,KEY).'"> 
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-fluid" src="images/'.$producto['imagen'].'" alt="" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">'.$producto['nombre'].'</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>'.$producto['precio'].'</p>
                                    </td>
                                    <td class="quantity-box">'.$producto['cantidad'].'</td>
                                    <td class="total-pr">
                                        <p>'.number_format($producto['precio'] * $producto['cantidad'], 2).'</p>
                                    </td>
                                    <td class="remove-pr">

                                    <button class="cart btnEliminarCarrito" 
                                     data-id="'.openssl_encrypt($producto['id'],COD,KEY).'"
                                     type="button" ><i class="fas fa-times"></i></button>
                                        
                                    </td>
                                </tr>';
         $total += $producto['precio'] * $producto['cantidad'];
    }
    echo '<input type="hidden" id="total" value="'.$total.'">';
    echo '
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

           
                
            </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.php" class="ml-auto btn hvr-hover">Pasar por caja</a></div>
            </div>

        </div>
    </div>';
    
           
} else {
    echo '
    <div class="alert alert-success">
        No hay productos en el carrito
    </div>';
}
include('footer.php');
?>
