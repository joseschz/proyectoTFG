<?php include_once('header.php'); ?>
<?php require_once('script.php'); ?>
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
                                <select id="filtrarprecio" class="selectpicker show-tick form-control" data-placeholder="EUR">
                                    <option value="2">Precio Alto → Precio Bajo</option>
                                    <option value="3">Precio Bajo → Precio Alto</option>
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
            <div class="row special-list">
                <?php 
                    require_once('funciones.php');  
                    require_once('script.php');  

                    $consulta ="SELECT * FROM productos ORDER BY precio DESC";
                    $resultado = ejecuta_SQL($consulta);
                $guardarprecioparafiltrar = array();
                    foreach ($resultado as $row) {
                        echo '<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 special-grid ' . $row['Orden'] . '">
                        <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <div class="type-lb">
                                            <p class="sale">Venta</p>
                                        </div>
                                        <img src="images/'.$row['imagen'].'" class="img-fluid" alt="Image" style="width: 250px; height: 250px !important;">
                                        <div class="mask-icon">
                                            <ul>
                                                <li><a href="detalleproducto.php?id='.$row['ID_Producto'].'" data-toggle="tooltip" data-placement="right" title="Ver Producto"><i class="fas fa-eye"></i></a></li>
                                            </ul>
                                            <button class="cart" id="btnAgregarCarrito" style="background-color: #3581b4;color: white;" 
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
                            $guardarprecioparafiltrar[] = array('precio' => $row['Precio']);
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

    <!-- BUSCADOR DE PRODUCTOS -->
        <div class="search-product">
                <input type="text" name="buscarproducto" class="form-control" placeholder="Busca aquí..." >
        </div>
        <div id="resultadobuscarproducto">

        <!-- ajax me insertaría los productos aquí -->       

        </div>
        
        <div class="filter-sidebar-left">
            <div class="title-left">
                <h3>Categorías</h3>
            </div>
            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                <div class="list-group-collapse sub-men">
                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Productos & Accesorios <small class="text-muted">(<?php $consulta="SELECT COUNT(*) AS total_productos FROM productos"; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row){$total = $row[0];} echo $total;?>)</small></a>
                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action" data-filter=".Accesorios">Accesorios<small class="text-muted">(<?php $consulta="SELECT COUNT(*) AS total_productos FROM productos WHERE Orden = 'Accesorios' "; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row){$total = $row[0];} echo $total;?>)</small></a>
                            <a href="#" class="list-group-item list-group-item-action" data-filter=".Decoracion">Decoración<small class="text-muted">(<?php $consulta="SELECT COUNT(*) AS total_productos FROM productos WHERE Orden = 'Decoracion' "; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row){$total = $row[0];} echo $total;?>)</small></a>
                            <a href="#" class="list-group-item list-group-item-action" data-filter=".Globos">Globos<small class="text-muted">(<?php $consulta="SELECT COUNT(*) AS total_productos FROM productos WHERE Orden = 'Globos' "; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row){$total = $row[0];} echo $total;?>)</small></a>
                            <a href="#" class="list-group-item list-group-item-action" data-filter=".Pack">Packs<small class="text-muted">(<?php $consulta="SELECT COUNT(*) AS total_productos FROM productos WHERE Orden = 'Pack' "; $resultado = ejecuta_SQL($consulta); foreach($resultado as $row){$total = $row[0];} echo $total;?>)</small></a>
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


<script>
//Este script lo reuso de custom.js que es donde lo uso para filtrar las imagenes de inicio.php 

$(document).ready(function() {

    // bibliografia = https://www.youtube.com/watch?v=H7u15qfyIdQ&t=444s&ab_channel=SergioDevWeb


// coge de la barra de buqueda y por cada tecla obtiene el valor,depués lo pasa por ajax a buscarproducto.php
    $('input[name="buscarproducto"]').keyup(function() {
        var producto = $(this).val();
        
    $.ajax ({
        url: "./buscarproducto.php",
        method: "POST",
        data: { producto: producto },
        success: function(response) {
            //de los resultados encontrados de buscarproducto.php me los pone en el div con el id resultadobuscarproducto
            $("#resultadobuscarproducto").html(response);
        }
    });
});

    var $div = $('.special-list');
    // Espera a que todas las imágenes dentro del contenedor se carguen completamente
    $div.imagesLoaded(function() {
        // Isotope es una librería JavaScript que proporciona un sistema de diseño y filtrado dinámico para elementos en una página web
        var $grid = $div.isotope({
            itemSelector: '.special-grid'
        });

        // Añade un evento de click a los enlaces dentro del elemento con la clase 'list-group'
        $('.list-group').on('click', 'a', function() {
        // Obtiene el valor del atributo 'data-filter' del enlace que fue clickeado
            var filterValue = $(this).attr('data-filter');
        // Filtra los elementos en el contenedor usando el valor de 'data-filter'

            $grid.isotope({ filter: filterValue });
            $(this).addClass('active').siblings().removeClass('active');
        });
    });
});


  // Crear array de precios
$(document).ready(function() {
    var $div = $('.special-list');
    $div.imagesLoaded(function() {
        var $grid = $div.isotope({
            itemSelector: '.special-grid'
        });

        $('#filtrarprecio').on('change', function() {
            var filtro = $(this).val();
            if (filtro === '2') {
                $grid.isotope({ sortBy: 'precio', sortAscending: true });
            } else if (filtro === '3') {
                $grid.isotope({ sortBy: 'precio', sortAscending: false });
            }
        });
    });
});
</script>