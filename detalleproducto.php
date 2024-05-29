<?php include_once('header.php');include_once('script.php');?>
    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <?php
                require_once('funciones.php');
               $ID_Producto = $_GET['id'];
               $consulta ="SELECT * FROM productos WHERE ID_Producto = $ID_Producto";
               $resultado = ejecuta_SQL($consulta);
               foreach ($resultado as $row){
                   $nombre = $row['Nombre'];
                   $imagen = $row['imagen'];
                   $descripcion = $row['Descripcion'];
                   $precio = $row['Precio'];
                   $stock = $row['stock'];
               }
               echo'<div class="col-xl-5 col-lg-5 col-md-6">
                    <div>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="images/'.$imagen.'" alt="First slide"> </div>
                            
                        </div>

                    </div>
                </div>';
                echo'<div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>'.$nombre.'</h2>
                        <h5> <del>$ 60.00</del>€ '.$precio.'</h5>
                        <p class="available-stock"><span>Más de '.$stock.' unidades disponibles</span><p>
						<h4>Descripción:</h4>
						<p>'.$descripcion.' </p>
						
                        ';
                        //Lo que hago aqui es copiar el boton de tienda.php y como la funcion la tengo definida en script.php pues unicamente tengo que pasarle los mismos valores de el producto
						echo'<button class="cart btnAgregarCarrito" style="background-color: #3581b4;color: white;" data-id="'.openssl_encrypt($ID_Producto, COD, KEY).'" data-nombre="'.openssl_encrypt($nombre, COD, KEY).'" data-precio="'.openssl_encrypt($precio, COD, KEY).'" data-imagen="'.openssl_encrypt($imagen, COD, KEY).'" data-cantidad="'.openssl_encrypt(1, COD, KEY).'" type="button">Añadir al carrito</button>


						<div class="add-to-btn">
							
							<div class="share-bar">
								<a class="btn hvr-hover" href="https://www.instagram.com/dulces.y.eventos/" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="https://x.com/" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
								<a class="btn hvr-hover" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
							</div>
						</div>
                    </div>
                </div>
            </div><div class="row my-5">
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    <h2>Reseñas de el Producto </h2>
                </div>
                <div class="card-body">
                    <div class="media mb-3">
                        <div class="mr-2"> 
                            <img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
                        </div>
                        <div class="media-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                            <small class="text-muted">Posted by Anonymous on 3/1/18</small>
                        </div>
                    </div>
                    <hr>
                    
                    ';
                    $consulta ="SELECT
                    `reseña`.mensaje, 
                    `reseña`.valoracion, 
                    usuarios.nombre,
                    `reseña`.fecha
                FROM
                    `reseña`
                    INNER JOIN
                    usuarios
                    ON 
                        `reseña`.id_usuario = usuarios.id WHERE `reseña`.id = $ID_Producto";                   
                    $resultado = ejecuta_SQL($consulta);
                    foreach($resultado as $row){
                        echo'<div class="media mb-3">
                        <div class="mr-2"> 
                            <img class="rounded-circle border p-1" src="images/'.$imagen.'" alt="Generic placeholder image" width="80px">
                        </div>
                        <div class="media-body">
                            <p>'.$row['mensaje'].'</p>
                            <small class="text-muted">Escrito por '.$row['nombre'].' el dia '.$row['fecha'].'</small>
                        </div>
                    </div>
                    <hr>';
                    }
                    //bibliografía modal https://getbootstrap.com/docs/5.0/components/modal/
                    if(isset($_COOKIE['email'])) {echo'
    
                    <div class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Dejar una Reseña 
                      </button>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva Reseña</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            
                              <div class="form-group">
                                <label for="password" class="col-form-label">Ingrese la Reseña:</label>
                                <textarea class="form-control" id="mensaje" value=""></textarea>
                              </div>
                              <div class="form-group">
                                <label for="rol" class="col-form-label">Valoración del Producto:</label>
                               <select class="form-control" id="valoracion">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                               </select>
                              </div>
                                                         
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="AnadirReseña()">Aceptar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
';}echo'
                </div>
              </div>
        </div>';
		?>


			

           

        </div>
    </div>
<?php include('footer.php'); ?>
