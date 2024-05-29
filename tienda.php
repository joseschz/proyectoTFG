<?php include('header.php'); ?>
<?php include('script.php'); ?>
<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-8 text-center text-sm-left">
                            <div class="toolbar-sorter-right">
                                <span>Filtrar</span>
                                <select id="basic" class="selectpicker show-tick form-control" data-placeholder="EUR">
                                    <option data-display="Select">Nada</option>
                                    <option value="1">Popularidad</option>
                                    <option value="2">Precio Alto → Precio Alto</option>
                                    <option value="3">Precio Bajo → Precio Alto</option>
                                    <option value="4">Más vendido</option>
                                </select>
                            </div>
                            <p>Mostrando <?php $consulta="SELECT COUNT(*) AS total_productos FROM productos"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row){$total = $row[0];} echo $total;?> resultados</p>
                        </div>
                        <div class="col-12 col-sm-4 text-center text-sm-right">
                            <ul class="nav nav-tabs ml-auto">
                                <li>
                                    <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                </li>
                                <!-- <li>
                                    <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                    <div class="product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    <?php 
                                        require_once('funciones.php');  
                                        require_once('script.php');  

                                        $consulta ="SELECT * FROM productos";
                                        $resultado = ejecuta_SQL($consulta);
                                    
                                        foreach ($resultado as $row) {
                                            echo '<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="sale">Venta</p>
                                                            </div>
                                                            <img src="images/'.$row['imagen'].'" class="img-fluid" alt="Image">
                                                            <div class="mask-icon">
                                                                <ul>
                                                                    <li><a href="detalleproducto.php?id='.$row['ID_Producto'].'" data-toggle="tooltip" data-placement="right" title="Ver Producto"><i class="fas fa-eye"></i></a></li>
                                                                </ul>
                                                                
                                                                <button class="cart btnAgregarCarrito" style="background-color: #3581b4;color: white;" 
                                                                        data-id="'.openssl_encrypt($row['ID_Producto'], COD, KEY).'" 
                                                                        data-nombre="'.openssl_encrypt($row['Nombre'], COD, KEY).'" 
                                                                        data-precio="'.openssl_encrypt($row['Precio'], COD, KEY).'" 
                                                                        data-imagen="'.openssl_encrypt($row['imagen'], COD, KEY).'" 
                                                                        data-cantidad="'.openssl_encrypt(1, COD, KEY).'" 
                                                                        type="button">Añadir al carrito</button>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="why-text">
                                                            <h4>'.$row['Nombre'].'</h4>
                                                            <h5>'.$row['Precio'].'€</h5>
                                                        </div>
                                                    </div>
                                                </div>';
                                        }
                                    ?>
                                </div>
                                <div id="resultado"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <form action="#">
                            <input class="form-control" placeholder="Busca aquí..." type="text">
                            <button type="submit"> <i class="fa fa-search"></i> </button>
                        </form>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Categorias</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <div class="list-group-collapse sub-men">
                                <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Productos & Accesorios <small class="text-muted">(<?php $consulta="SELECT COUNT(*) AS total_productos FROM productos"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row){$total = $row[0];} echo $total;?>)</small></a>
                                <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action">Accesorios<small class="text-muted">(<?php $consulta="SELECT COUNT(*) AS total_productos FROM productos WHERE Orden = 'Accesorios' "; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row){$total = $row[0];} echo $total;?>)</small></a>
                                        <a href="#" class="list-group-item list-group-item-action">Decoración<small class="text-muted">(<?php $consulta="SELECT COUNT(*) AS total_productos FROM productos WHERE Orden = 'Decoracion' "; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row){$total = $row[0];} echo $total;?>)</small></a>
                                        <a href="#" class="list-group-item list-group-item-action">Globos<small class="text-muted">(<?php $consulta="SELECT COUNT(*) AS total_productos FROM productos WHERE Orden = 'Globos' "; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row){$total = $row[0];} echo $total;?>)</small></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
<?php include("footer.php") ?>
