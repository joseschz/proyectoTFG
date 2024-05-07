<?php include('header.php'); require_once("script.php"); require_once("funciones.php");

?>

<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <?php
            //obtengo email de la cookie cuando inicia sesion 
            if(isset($_COOKIE['email'])) {
                $email = $_COOKIE['email'];
                //obtengo nombre y apellidos de la base de datos para rellenarlo en los campos input
                       $consulta ="SELECT * FROM usuarios WHERE email = '$email'";
                       $resultado = ejecuta_SQL($consulta);
                       foreach ($resultado as $row) {
                           $nombre = $row['nombre'];
                           $apellido1 = $row['Primer_Apellido'];
                           $apellido2 = $row['Segundo_Apellido'];
                           $email = $row['email'];
                           
                       } 
                       
                    } else{
            ?>
        <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Inicio de sesión de la cuenta</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click aquí para iniciar sesión</a></h5>
                    <form class="mt-3 collapse review-form-box" id="formLogin">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="emaillogin" placeholder="Introduce Email" > </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Contraseña</label>
                                <input type="password" class="form-control" id="passwordlogin" placeholder="Contraseña"> </div>
                        </div>
                        <input type="button" class="btn hvr-hover" id="btnLogin" >Iniciar Sesión</input>
                    </form>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Crear Nueva Cuenta</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click aquí para Registrarte</a></h5>
                   <form autocomplete="off" id="formRegister">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name" class="mb-0">Nombre</label>
                                <input type="text" class="form-control" id="nameregister" placeholder="Nombre" > </div>
                            <div class="form-group col-md-6">
                                <label for="Firstname" class="mb-0">Primer Apellido</label>
                                <input type="text" class="form-control" id="Firstnameregister" placeholder="Primer Apellido"> </div>
                            <div class="form-group col-md-6">
                                <label for="Lastname" class="mb-0">Segundo Apellido</label>
                                <input type="text" class="form-control" id="Lastnameregister" placeholder="Segundo Apellido"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email</label>
                                <input type="email" class="form-control" id="emailregister" placeholder="Introduce Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Contraseña</label>
                                <input type="password" class="form-control" id="passwordregister" placeholder="Contraseña"> </div>
                        </div>
                        <input type="button" id="btnRegistrar"class="btn login_btn" VALUE="Aceptar">
                    </form>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Dirección de facturación</h3>
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Primer Apellido *</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo$apellido1;?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Segundo Apellido *</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo$apellido2;?>" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="name">Nombre *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" placeholder="" value="<?php echo$nombre;?>" required >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="loginemail" placeholder="" value="<?php echo$email;?>">
                            </div>
                            <div class="mb-3">
                                <label for="address">Dirección *</label>
                                <input type="text" class="form-control" id="address" placeholder="" value="" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">País *</label>
                                    <select class="wide w-100" id="country">
									
									<option value="España">España</option>
								</select>
                                    
                                </div>
                                
                                <div class="col-md-3 mb-3">
                                    <label for="cp">CP *</label>
                                    <input type="text" class="form-control" id="cp" placeholder="" required>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="title"> <span>Pago</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Tarjeta de credito</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="debit">Tarjeta de debito</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Nombre de tarjeta</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required> <small class="text-muted">Nombre completo como se muestra en la tarjeta.</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Número de la tarjeta</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiración</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="payment-icon">
                                        <ul>
                                            <li><img class="img-fluid" src="images/payment-icon/1.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/2.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/5.png" alt=""></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-1"> </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Método de Compra</h3>
                                </div>
                                <div class="mb-4">
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
                                        <label class="custom-control-label" for="shippingOption1">Envío estandar</label> <span class="float-right font-weight-bold">Gratis</span> </div>
                                    <div class="ml-4 mb-2 small">(3-7 días laborales)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption2">SEUR</label> <span class="float-right font-weight-bold">5.00€</span> </div>
                                    <div class="ml-4 mb-2 small">(2-4 días laborales)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption3">Correo Express</label> <span class="float-right font-weight-bold">7.50€</span> </div>
                                        <div class="ml-4 mb-2 small">(1-2 días laborales)</div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Carrito de la compra</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
<?php 
echo '
<div class="cart-box-main">
    <div class="container" >
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive"style="height: 400px" >
                    <table class="table">
                        
                        <tbody>';

$total = 0;
foreach ($_SESSION['carro'] as $indice => $producto){
    // desde ajax cambio el display a none cuando se elimina el elemento
    echo '
                            
                            <tr data-id="'.openssl_encrypt($producto['id'],COD,KEY).'"> 
                                <td class="thumbnail-img">
                                        <img class="img-fluid" src="images/'.$producto['imagen'].'" alt="" />
                                </td>
                                <td class="name-pr">
                                <p><strong>'.$producto['nombre'].'</strong></p>
                                </td>
                                <td class="price-pr">
                                    <p>'.$producto['precio'].'</p>
                                </td>
                                <td class="quantity-box">'.$producto['cantidad'].'</td>
                                <td class="total-pr">
                                    <p>'.number_format($producto['precio'] * $producto['cantidad'], 2).'</p>
                                </td>
                               
                            </tr>';
                            $total += $producto['precio'] * $producto['cantidad']; 
}
                    echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> </div>';
    ?>
                                   
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
                                                <input class="form-control" placeholder="Introduce tu cupón" aria-label="Cupon" type="text">
                                                <div class="input-group-append">
                                                    <button class="btn btn-theme" type="button">Aplicar Cupón</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Tu Pedido</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Producto</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                
                                <div class="d-flex">
                                    <h4>Montaje</h4>
                                    <div class="ml-auto font-weight-bold"> $ 40 </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Cupón de Descuento</h4>
                                    <div class="ml-auto font-weight-bold"> $ 10 </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Envío</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Precio Total:</h5>
                                    <div class="ml-auto h5"><?php echo "$total"; ?> €</div>
                                </div>
                                <hr> </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"> <a href="checkout.html" class="ml-auto btn hvr-hover">Place Order</a> </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
<?php include('footer.php'); ?>