<?php
require 'funciones.php';
//obtengo datos de ajax metodo post 
$contraseña = $_POST['contraseña'];
$email = $_POST['email'];
	
//hago comprobacion de que los datos no existen en la base de datos
$consultausuario = "SELECT email,contraseña FROM usuarios WHERE email = '$email'";
    $resultado = ejecuta_SQL($consultausuario);
    if ($resultado->rowCount() > 0) {
		foreach($resultado as $row) {
			$pass = $row['contraseña'];
			$emailadress = $row['email'];
			
		}

		if($contraseña == $pass){
        	echo "Logeado correctamente";
			setcookie("email", $email, time() + (86400), "/");  //cookie valida para 1 dia 
			exit;
		}
		else{
			echo"Hubo un error en email o contraseña"; 
        	exit;
		}
    } else {
        echo "No existe este email o contraseña";
    }
?>

