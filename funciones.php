<?php

   $DBHost="localhost:3306";
   $DBUser="root";
   $DBPass="root";
   $DB="eventos";
   $id_conexion=-1;
   define("KEY","joseignacio"); //encriptacion
   define("COD","AES-128-ECB");

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

// REGISTRAR
// function register(){
 
  
//   if (empty($name) || empty($email) || empty($password) || empty($firstname) || empty($lastname)) {
//     echo "Por favor, Rellena todo el formulario.";
//     exit;
// } elseif (strlen($password) < 6) {
//     echo "La contraseña debe tener al menos 6 caracteres.";
//     exit;
// } elseif (!preg_match("/^(?=.*[0-9])(?=.*[A-Z]).{6,}$/", $password)) {
//     echo "La contraseña debe contener al menos un número y una letra mayúscula.";
//     exit;
// } elseif (strlen($name) < 2) {
//     echo "El nombre debe tener al menos 2 caracteres.";
//     exit;
// } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     echo "El correo electrónico no es válido.";
//     exit;




?>
