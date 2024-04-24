<?php
session_start();

  $DBHost="localhost:3306";
   $DBUser="root";
   $DBPass="";
   $DB="eventos";
   $id_conexion=-1;

   function conectar_BD() 
   {
      global $DBHost, $DBUser, $DBPass, $DB, $id_conexion;

      try {
         $id_conexion = new PDO("mysql:host=" . $DBHost. ";dbname=" . $DB. ";charset=utf8", $DBUser, $DBPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
         $id_conexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,  true);
         $id_conexion->setAttribute(PDO::NULL_TO_STRING, true);
      } 
      catch (PDOException $e) {
         die ("<p><H3>No se ha podido establecer la conexión.<P>Compruebe si está activado el 
         servidor de bases de datos MySQL.</H3></p>\n <p>Error: " . $e->getMessage() . "</p>\n");
      } 
   }

   function ejecuta_SQL($sql) 
   {
      global $id_conexion;

		$resultado=$id_conexion->query($sql);
		if (!$resultado){
			echo"<H3>No se ha podido ejecutar la consulta: <PRE>$sql</PRE><P><U> Errores</U>: </H3><PRE>";
			print_r($id_conexion->errorInfo());					
			die ("</PRE>");
		}
		return $resultado;
	} 
  conectar_BD();
// IF
if(isset($_POST["action"])){
  if($_POST["action"] == "register"){
    register();
  }
  else if($_POST["action"] == "login"){
    login();
  }
}

// REGISTRAR
function register(){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  if (empty($name) || empty($username) || empty($password)) {
    echo "Por favor, Rellena todo el formulario.";
    exit;
} elseif (strlen($password) < 6) {
    echo "La contraseña debe tener al menos 6 caracteres.";
    exit;
} elseif (!preg_match("/^(?=.*[0-9])(?=.*[A-Z]).{6,}$/", $password)) {
    echo "La contraseña debe contener al menos un número y una letra mayúscula.";
    exit;
} elseif (strlen($username) < 6) {
    echo "El usuario debe tener al menos 6 caracteres.";
    exit;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El correo electrónico no es válido.";
    exit;
} else {
    $consultausuario = "SELECT * FROM usuarios WHERE username = '$username' OR email = '$email'";
    $resultado = ejecuta_SQL($consultausuario);
    if ($resultado->rowCount() > 0) {
        echo "Este usuario o correo ya existe! Por favor elija otro.";
        exit;
    } else {
        $consulta = "INSERT INTO usuarios VALUES('', '[ROLE_USER]', '$name', '$username', '$password', '$email')";
        $resultado = ejecuta_SQL($consulta);
        echo "Usuario registrado correctamente";
    }
}
}

// LOGIN
function login(){
  

  $username = $_POST["username"];
  $password = $_POST["password"];

  $consulta = "SELECT * FROM usuarios WHERE username = '$username'";
  $resultado = ejecuta_SQL($consulta);

  if ($resultado->rowCount()>0) {

    $matriz = $resultado->fetchAll();
    foreach ($matriz as $myrow) {
      $pass=$myrow[4];
      $idusu=$myrow[0];
    	}

      if($password == $pass){
        echo "Login Successful";
      
        //$_SESSION["message-type"] = "success";
        $_SESSION["login"] = true;
        $_SESSION["id"] = $idusu;
      }
    else{
      echo "Wrong Password";
      exit;
    }
   
  }
  else{
    echo "User Not Registered";
    exit;
  }
}

?>
