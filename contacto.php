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
else{
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Page</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Rubik:400,500" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rubik:400,500" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head> 
	
      
      <body>
		<!--BARRA DE NAVEGACION-->
		
		<nav class="navbar1">
			<div class="navbar1-container">
				<img src="ficheros/images/logo.png" alt="Logo de la empresa" class="navbar1-logo">
				<ul class="navbar1-list" align="center">
					<li class="navbar1-item"><a href="#" class="navbar1-link">Inicio</a></li>
					<li class="navbar1-item"><a href="#" class="navbar1-link">Servicios</a></li>
					<li class="navbar1-item"><a href="#" class="navbar1-link">Portafolio</a></li>
					
                    
                    <!-- Si existe la sesion,mostrar el boton de logout-->
                    <?php if(isset($_SESSION['id'])){?>
                        <li class="navbar1-item"><input type="button" onclick="submitDataLogout();" class="glyphicon glyphicon-log-out" VALUE="Logout"></input></li>
                        
                    <?php } ?>
                </ul>
			</div>
		</nav>
		
		
		<!-- CONTENIDO-->
        
        <div class="thm-container">
         <div class="row">
             <div class="col-md-8">
                 <div class="contact-form-content">
                     <div class="title">
                         <span>Contacta con nosotros</span>
                         <h2>Enviar un Mensaje</h2>
                     </div><!-- /.title -->
                     <form action="" class="contact-form" novalidate="novalidate">
                         <input type="text" name="name" placeholder="Nombre Completo">
                         <input type="text" name="email" placeholder="Email completo">
                         <textarea name="message" placeholder="Escribe aquí tu mensaje"></textarea>
                         <button type="submit" class="thm-btn yellow-bg">Enviar</button>
                         <div class="form-result"></div><!-- /.form-result -->
                     </form>
                 </div><!-- /.contact-form-content -->
             </div><!-- /.col-md-8 -->
             <div class="col-md-4">
                 <div class="contact-info text-center">
                     <div class="title text-center">
                        <span>Info de contacto</span>
                        <h2>Detalles</h2>
                     </div><!-- /.title -->
                     <div class="single-contact-info">
                         <h4>Email</h4>
                         <p>needhelp@printify.com <br> inquiry@printify.com</p>
                     </div><!-- /.single-contact-info -->
                     <div class="single-contact-info">
                         <h4>Redes Sociales</h4>
                         <div class="social">
                            <a href="https://www.instagram.com/dulces.y.eventos/" class="fab fa-instagram hvr-pulse" target="blank"></a><!--  
                                
                             
                             --><a href="#" class="fab fa-facebook-f hvr-pulse"></a><!--  
                             --><a href="#" class="fab fa-twitter hvr-pulse"></a>
                        </div><!-- /.social -->
                     </div><!-- /.single-contact-info -->
                 </div><!-- /.contact-info -->
             </div><!-- /.col-md-4 -->
         </div><!-- /.row -->
     </div>
        
<?php require 'script.php'; ?>
      </body>
	  </html>