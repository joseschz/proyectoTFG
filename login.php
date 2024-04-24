<?php
require 'funciones.php';
if(isset($_SESSION["id"])){
  header("Location: contacto.php");
}?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  	<link rel="stylesheet" href="css/styles.css"> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>

	<!-- MANEJO DE ERRORES LOGIN -->
    <div class="alert alert-danger alert-dismissable" id="contrasenia" style="display:none;">
                <button type="button" onclick="CloseWindow();" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><strong>Error!</strong> Contraseña incorrecta!.</p>
    </div>
	<div class="alert alert-warning alert-dismissable" id="noregistrado" style="display:none;">
                <button type="button" onclick="CloseWindow();" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error!</strong> Usuario no registrado.
    </div>
	
	
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="ficheros/images/logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form autocomplete="off" action="" method="post">
						<input type="hidden" id="action" value="login">
						<p class="pacifico-regular" align="center">INICIAR SESIÓN</p>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" id="username" class="form-control input_user" value="" size="20" maxlength="20" placeholder="Usuario">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="password" class="form-control input_pass" value="" size="12" maxlength="12" placeholder="Contraseña">
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="button"  onclick="submitData();" class="btn login_btn" VALUE="Aceptar"></input>
				   </div>
					</form>
				</div>
				
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						¿No tienes cuenta? <a href="register.php" class="ml-2">Registrarse</a>
					</div>
					
					<div class="d-flex justify-content-center links">
						<a href="#">Recuperar contraseña</a>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">

			<div id="resultado" style="background-color:#aaa;width:100%;" class=""></div>
	  
			<input type="button" class="btn btn-success" style="display:none;width:100%;" id="boton1" value="Limpiar">

		  </div>
	</div>
	<?php require 'script.php'; ?>
</body>
</html>
