

<!-- Tengo que crear esto ya que dentro de la carpete perfil tienen otra ruta los enlaces como ../funciones.php  "../" -->

<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dulces y Eventos</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <link href="../js/sweetalert2.min.css" rel="stylesheet">

</head>
<body>
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-phone-box">
                        <p>LLamanos  : <a href="#"> 652 652 652</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                        <?php if(!empty($_COOKIE['email'])){echo'<li><a href="../perfil.php"><i class="fa fa-user s_color"></i> Mi Cuenta</a></li>';} ?>
                            <li><a href="../sobrenosotros.php"><i class="fas fa-location-arrow"></i> Nuestra localización</a></li>
                            <li><a href="../contacto.php"><i class="fas fa-headset"></i> Contáctanos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <?php if(!empty($_COOKIE['email'])){echo'<div class="login-box">
                    <button id="logoutButton" class="btn btn-primary" type="button" onclick="location.href=\'../logout.php\'">
                        <span class="fas fa-sign-out-alt d-md-none"></span>
                        <span class="d-none d-md-inline">Cerrar Sesión</span>
                    </button>
                </div>';} ?>


                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                           <?php require_once('../funciones.php'); $consulta="SELECT cupones.Porcentaje, cupones.Codigo, productos.Nombre
                                        FROM cupones INNER JOIN	productos ON cupones.ID_Producto = productos.ID_Producto"; 
                            $resultado = ejecuta_SQL($consulta);
                            foreach($resultado as $row) {
                                echo "<li> <i class='fab fa-opencart'></i>".$row['Porcentaje'] . " % Codigo " . $row['Codigo'] . " para el Producto " . $row['Nombre'] . "</li>";
                            }?>   
                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="../index.php"><img src="../images/logo.png" class="logo" alt="" width="95px" height="95px"></a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="../index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="../sobrenosotros.php">Sobre nosotros</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tienda</a>
                            <ul class="dropdown-menu">
								<li><a href="../tienda.php">Nuestros Productos</a></li>
                                <li><a href="../carrito.php">Carrito</a></li>
                                <?php if(!empty($_COOKIE['email'])){echo'<li><a href="../perfil.php">Mi Cuenta</a></li>';} ?>
                               
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="../contacto.php">Contáctanos</a></li>
                    </ul>
                </div>

                <div class="attr-nav">
                    <ul>
                        <li class="side-menu" >
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
                                <!--Bibliografia2  https://www.youtube.com/watch?v=rqYhZGskLfI&list=PLSuKjujFoGJ0XF_Gv0VpiTHxAtO7LL8jl&index=12 -->
								<span class="badge" id="contadorCarrito"><?php  echo(empty($_SESSION['carro'])) ? 0 : count($_SESSION['carro']) ?></span>
								<p>Mi Carrito</p> 
							</a>
						</li>
                    </ul>
                </div>
            </div>
  <!-- Carrito desplegable derecha -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                    <?php 
                    
                    if(!empty($_SESSION['carro'])){
                        $total = 0;
                        foreach ($_SESSION['carro'] as $indice => $producto){
                            echo '<li>
                                    <img src="../images/'.$producto['imagen'].'" class="cart-thumb" alt="" />
                                    <h6><a href="#">'.$producto['nombre'].'</a></h6>
                                    <p>'.$producto['cantidad'].'x - <span class="price">'.$producto['precio'].'€</span></p>
                                </li>';
                        }

                    }
                
?>

                    </ul>
                </li>
            </div>
        </nav>
    </header>
    <!-- buscador pagina principal -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    