<?php
require 'funciones.php';
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $consulta="SELECT * FROM usuarios WHERE id = $id";
  $resultado=ejecuta_SQL($consulta);
  $matriz = $resultado->fetchAll();
  foreach ($matriz as $myrow) {
    $user=$myrow[3];
    }
  
}

?>

<!DOCTYPE html>
<html>
	<title>Index Page</title>
	<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Fuente personalizada para titulo-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="css/styles.css">
      
      <link rel="stylesheet" href="css/navbar.css">
</head>  
      <body>
		<!--BARRA DE NAVEGACION-->
		
		<nav class="navbar1">
			<div class="navbar1-container">
				<img src="ficheros/images/logo.png" alt="Logo de la empresa" class="navbar1-logo">
				<ul class="navbar1-list" align="center">
					<li class="navbar1-item"><a href="#" class="navbar1-link"><span class="pacifico-regular">INICIO</span></a></li>
					<li class="navbar1-item"><a href="#" class="navbar1-link"><span class="pacifico-regular">SERVICIOS</span></a></li>
					<li class="navbar1-item"><a href="#" class="navbar1-link"><span class="pacifico-regular">PORTAFOLIOS</span></a></li>
					<li class="navbar1-item"><input type="button" onclick="Contact();" class="glyphicon glyphicon-log-out" VALUE="Contacto"></input></li>
                    <!-- Si existe la sesion,mostrar el boton de logout-->
                    <?php if(isset($_SESSION['id'])){?>
                        <li class="navbar1-item"><input type="button" onclick="submitDataLogout();" class="glyphicon glyphicon-log-out" VALUE="Logout"></input></li>
                        
                    <?php } ?>
                </ul>
			</div>
		</nav>
		
		
		<!-- CONTENIDO-->
        
        <div class="container">
        <?php if(isset($_SESSION["id"])){ ?>
        <h1>Welcome <?php echo $user; ?></h1>
        <?php } ?>
        </div>


            <div>
            <h1 class="pacifico-regular">Dulces y Eventos</h1>
        </div>


		<div class="container mb-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <a href="#">
                        <img class="card-img-top" src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                    </a>
                    <ul class="list-inline mt-3">
                        <li class="list-inline-item"><i class="fas fa-user"></i> Metus Vulputate</li>
                        <li class="list-inline-item"><i class="far fa-clock"></i> June 22, 2020</li>
                    </ul>
                    <hr>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a class="btn btn-outline-dark my-2" href="#" role="button">Read more...</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <a href="#">
                        <img class="card-img-top" src="https://images.pexels.com/photos/1714208/pexels-photo-1714208.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                    </a>
                    <ul class="list-inline mt-3">
                        <li class="list-inline-item"><i class="fas fa-user"></i> Metus Vulputate</li>
                        <li class="list-inline-item"><i class="far fa-clock"></i> June 22, 2020</li>
                    </ul>
                    <hr>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a class="btn btn-outline-dark my-2" href="#" role="button">Read more...</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <a href="#">
                        <img class="card-img-top" src="https://images.pexels.com/photos/1148820/pexels-photo-1148820.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                    </a>
                    <ul class="list-inline mt-3">
                        <li class="list-inline-item"><i class="fas fa-user"></i> Metus Vulputate</li>
                        <li class="list-inline-item"><i class="far fa-clock"></i> June 22, 2020</li>
                    </ul>
                    <hr>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a class="btn btn-outline-dark my-2" href="#" role="button">Read more...</a>
                </div>
            </div>
        </div>
    </div>
</div>
        
<?php require 'script.php'; ?>
      </body>
	  </html>