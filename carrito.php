<?php include_once('header.php'); include_once('script.php');require_once("funciones.php");
?>

<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="tienda.php">Tienda</a></li>
                    <li class="breadcrumb-item active">Carrito</li>
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
                                    <form method="post" >
                                    <td class="quantity-box">
                                    
                                            <input type="number" name="nuevacantidad" size="4" value="'.$producto['cantidad'].'" min="1" step="1" class="c-input-text qty text" data-id="'. openssl_encrypt($producto['id'],COD,KEY) .'"  />
                                    </td>

                                    
                                    <td class="remove-pr">

                                    <button class="cart btnEliminarCarrito" 
                                     data-id="'.openssl_encrypt($producto['id'],COD,KEY).'"
                                     type="button" ><i class="fas fa-times"></i></button>
                                        
                                    </td>
                                    </form>
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
            <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Método de Compra</h3>
                                </div>
                                <div class="mb-4">
                                <form method="POST" action="checkout.php">
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio" value="3.50">
                                        <label class="custom-control-label" for="shippingOption1">Envío estandar</label> <span class="float-right font-weight-bold">3.50€</span> </div>
                                    <div class="ml-4 mb-2 small">(3-7 días laborales)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio" value="5.00">
                                        <label class="custom-control-label" for="shippingOption2">SEUR</label> <span class="float-right font-weight-bold">5.00€</span> </div>
                                    <div class="ml-4 mb-2 small">(2-4 días laborales)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio" value="7.50">
                                        <label class="custom-control-label" for="shippingOption3">Correo Express</label> <span class="float-right font-weight-bold">7.50€</span> </div>
                                        <div class="ml-4 mb-2 small">(1-2 días laborales)</div>

                                </div>
                            </div>
                        </div>
            
                        <div class="col-md-12 col-lg-12">
                        <div class="shipping-method-box">
                        <div class="title-left">
                            <h3>Montaje</h3>
                        </div>
                        <div class="mb-4">
                            <div class="custom-control custom-radio">
                                <input id="MontajeOption1" name="MontajeOption" class="custom-control-input"  type="radio" value="40">
                                <label class="custom-control-label" for="MontajeOption1">Incluir Montaje</label>
                                <span class="float-right font-weight-bold">40€</span>
                            </div>
                            <div class="ml-4 mb-2 small">(Contactaremos contigo para más detalles y ver disponibilidad)</div>
                            <div class="custom-control custom-radio">
                                <input id="MontajeOption2" name="MontajeOption" class="custom-control-input" checked="checked" type="radio" value="0">
                                <label class="custom-control-label" for="MontajeOption2">No Incluir Montaje</label>
                                <span class="float-right font-weight-bold">No Incluir Montaje</span>
                            </div>
                        </div>
                    </div>
                    
                    </div>
            <div class="col-md-12 col-lg-12">
            <div class="odr-box">
                <div class="title-left">
                    <h3>¿Tienes un cupón de descuento?</h3>
                </div>
                <div class="row my-5">
                    <div class="col-lg-6 col-sm-6">
                        <div class="coupon-box">
                            <div class="input-group input-group-sm">
                                <input class="form-control" placeholder="Introduce tu cupón" aria-label="Cupon" type="text" id="cupon">
                                <div class="input-group-append">
                                    <button class="btn btn-theme" type="button" id="aplicarcupon">Aplicar Cupón</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
           
                
            </div>
                <div class="col-12 d-flex shopping-box"><input class="ml-auto btn hvr-hover" type="submit"  value="Enviar"></div>
            </div>
            </form>
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

<script>
    //cuando el input cambia, con el change envío el producto actualizado 
$(document).ready(function() {
    $('input[name="nuevacantidad"]').on('change', function() {
        var id = $(this).data('id');
        var nuevaCantidad = $(this).val();

        $.ajax({
            url: 'php/actualizarcantidadcarrito.php',
            type: 'POST',
            data: {
                id: id,
                nuevaCantidad: nuevaCantidad
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>
