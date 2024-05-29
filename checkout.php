
<?php  include_once('header.php'); require_once("script.php"); require_once("funciones.php");
?>
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Finalizar Compra</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="tienda.php">Tienda</a></li>
                        <li class="breadcrumb-item active">Finalizar Compra</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="checkout" style="display: hiden">

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
                           $rol = $row['rol'];
                           $direccion = $row['direccion'];
                           $cp = $row['cp'];
                           $telefono = $row['telefono'];
                    }
                 echo "<input type='hidden' id='rol' value=$rol>";   
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
                        <button type="button" class="btn hvr-hover" id="btnLogin" >Iniciar Sesión</button>
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
                        <input type="button" id="btnRegistrar" class="btn login_btn" VALUE="Aceptar">
                    </form>
                </div>
            </div>
            <?php } ?>

            <form >
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Dirección de facturación</h3>
                        </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="primerapellido">Primer Apellido *</label>
                                    <input type="text" class="form-control" id="primerapellido" name="primerapellido" placeholder="" value="<?php if(isset($apellido1)){echo$apellido1;}?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="segundoapellido">Segundo Apellido *</label>
                                    <input type="text" class="form-control" id="segundoapellido" name="segundoapellido" placeholder="" value="<?php if(isset($apellido2)){echo$apellido2;}?>" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Nombre">Nombre *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="" value="<?php if(isset($nombre)){echo$nombre;}?>" required >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php if(isset($email)){echo$email;}?>">
                            </div>
                            <div class="mb-3">
                                <label for="direccion">Dirección *</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" value="<?php if(isset($direccion)){echo$direccion;}?>" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">País *</label>
                                    <select class="wide w-100" id="pais" name="pais">
									
									<option value="España">España</option>
								</select>
                                    
                                </div>
                                
                                <div class="col-md-3 mb-3">
                                    <label for="cp">CP *</label>
                                    <input type="text" class="form-control" id="cp" name="cp" placeholder="CP" value = "<?php if(isset($cp)){echo$cp;}?>" required >
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="telefono">Teléfono *</label>
                                    <input type="number" class="form-control" max="10" id="Telf" name="Telf" placeholder="Telf" value="<?php if(isset($telefono)){echo$telefono;}?>" required>
                                </div>
                            </div>
                   
                            <hr class="mb-4">
                            <div style="display:none" id="PAGOS">
                            <hr class="mb-1"> </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                       
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
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Tu Pedido</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Producto</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                
                                <?php 
                                if(isset($_POST['MontajeOption'])) {
                                    $montaje = $_POST['MontajeOption'];
                                    $total = $total + $montaje;
                                    echo '<hr class="my-1">
                                        <div class="d-flex">
                                                <h4>Montaje</h4>
                                                <div class="ml-auto font-weight-bold">' . $montaje . ' € </div>
                                        </div>';
                                }
                                ?>
                                <?php if(isset($_SESSION['Rebaja'])) {
                                    $rebaja = $_SESSION['Rebaja']; 
                                    $total= $total - $rebaja;
                                echo'<hr class="my-1">

                                <div class="d-flex">
                                    <h4>Cupón de Descuento</h4>
                                    <div class="ml-auto font-weight-bold">' .$rebaja .' € </div>
                                </div>';
                            }?>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Envío</h4>
                                    <div class="ml-auto font-weight-bold"> <?php if(isset($_POST['shipping-option'])){ $envio = $_POST['shipping-option']; $total= $total + $envio;echo "$envio €";}else{$envio = 3.5; $total= $total + $envio;echo "$envio €";}?>  </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Precio Total:</h5>
                                    <div class="ml-auto h5"><?php echo "$total"; ?> €</div>
                                </div>
                                <hr> </div>
                        </div></div></div> </div>
                        <div class="col-12 d-flex shopping-box">
                        <!-- <input type="submit" name="btnenviar" value="Enviar"> -->
                        <div id="paypal-button-container" style="width: 300px;margin: 0 auto;text-align: center;"></div></div></div></div>
                        <script src="https://www.paypal.com/sdk/js?client-id=Ab_WDUdUhB2KTLx1v15CrE3u5IBI_S3dYkxyFp3lCYcKNjhd6oAsGVWGNA-uX1fHifFsfS4WrFgAbhdv&currency=EUR"></script>

                        <script>

//bibliografia https://www.youtube.com/watch?v=nAz8xRQaPZQ
        paypal.Buttons({
    style: {
        color: 'blue',
        shape: 'pill',
        label: 'pay'
    },
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: "<?php echo $total; ?>"
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        var url = 'completado/completado.php';
        return actions.order.capture().then(function(detalles) {
            // Obtener los valores de los campos del formulario
            var nombre = document.getElementById('Nombre').value;
            var primerapellido = document.getElementById('primerapellido').value;
            var segundoapellido = document.getElementById('segundoapellido').value;
            var direccion = document.getElementById('direccion').value;
            var cp = document.getElementById('cp').value;
            var telefono = document.getElementById('Telf').value;

            // Agregar los valores obtenidos al objeto detalles
            detalles.nombre = nombre;
            detalles.primerapellido = primerapellido;
            detalles.segundoapellido = segundoapellido;
            detalles.direccion = direccion;
            detalles.cp = cp;
            detalles.telefono = telefono;

            console.log(detalles);
            //lo mando a completado.php en formato json 
            return fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    detalles: detalles
                })
            });
        }).then(function(response) {
            if (response.ok) {
                Swal.fire({
                    icon: 'success',
                    title: 'Pago Completado',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al procesar el pago',
                    showConfirmButton: true
                });
            }
        }).catch(function(error) {
            Swal.fire({
                icon: 'error',
                title: 'Error de comunicación',
                text: 'No se pudo enviar la información. Por favor, inténtelo de nuevo.',
                showConfirmButton: true
            });
        });
    },
    onCancel: function(data) {
        Swal.fire({
            icon: 'error',
            title: 'Pago Cancelado',
            showConfirmButton: false,
            timer: 1500
        });
    }
}).render('#paypal-button-container');


</script>
<?php include('footer.php'); ?> 