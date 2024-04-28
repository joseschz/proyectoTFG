<?php
require 'funciones.php';
if(isset($_SESSION["id"])){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>

   
    <link rel="stylesheet" href="css/styles.css"> 
  </head>
  <body>
    	<!-- MANEJO DE ERRORES LOGIN -->
    <div class="alert alert-danger alert-dismissable" id="error" style="display:none;">
                <button type="button" onclick="CloseWindow();" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><strong>Error!</strong> La contraseña debe tener al menos 6 caracteres.El usuario debe tener al menos 6 caracteres.El correo electrónico no es válido.</p>
            </div>
    <div class="alert alert-danger alert-dismissable" id="contrasenia1" style="display:none;">
                <button type="button" onclick="CloseWindow();" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><strong>Error!</strong> La contraseña debe tener al menos 6 caracteres.</p>
            </div>
            <div class="alert alert-danger alert-dismissable" id="contrasenia2" style="display:none;">
                <button type="button" onclick="CloseWindow();" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error!</strong> La contraseña debe contener al menos un número y una letra mayúscula.
            </div>  
	<div class="alert alert-danger alert-dismissable" id="correo" style="display:none;">
                <button type="button" onclick="CloseWindow();" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error!</strong> El correo electrónico no es válido.
            </div>
  <div class="alert alert-danger alert-dismissable" id="user" style="display:none;">
                <button type="button" onclick="CloseWindow();" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error!</strong> Este usuario o correo ya existe!,Por favor elija otro.
            </div>          
  <div class="alert alert-danger alert-dismissable" id="vacio" style="display:none;">
                <button type="button" onclick="CloseWindow();" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error!</strong> Por favor,Rellena todo el formulario.
            </div>
  <div class="alert alert-danger alert-dismissable" id="userchar" style="display:none;">
                <button type="button" onclick="CloseWindow();" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error!</strong> El usuario debe contener 6 caracteres.
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
          <!-- FORMULARIO -->
          <form autocomplete="off" action="" method="post" onsubmit="return validateForm()">

            <input type="hidden" id="action" value="register">
          <!-- NAME -->
          <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
              </div>
              <input type="text" id="name" class="form-control input_name" value="" size="20" maxlength="20" placeholder="nombre">
            </div>
          <!-- EMAIL -->
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="text" id="email" class="form-control input_email" value="" size="20" maxlength="20" placeholder="email">
            </div>
            
            <!-- USERNAME -->
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" id="username" class="form-control input_user" value="" size="20" maxlength="20" placeholder="usuario">
            </div>
            <!-- PASSWORD -->
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" id="password" class="form-control input_pass" value=""  size="12" maxlength="12" placeholder="contraseña">
            </div>
            <!-- BOTON ACEPTAR -->
            <div class="d-flex justify-content-center mt-2 login_container">
              <input type="button"  onclick="submitData();" class="btn login_btn" VALUE="Aceptar">
            </div>
        </form>
          </div>
          <div class="mt-4">
					<div class="d-flex justify-content-center links">
						¿Tienes cuenta? <a href="login.php" class="ml-2">Iniciar sesión</a>
					</div>
	
				</div>
      </div>
    </div>
    <br>
  
    <?php require 'script.php'; ?>
  </body>
</html>
