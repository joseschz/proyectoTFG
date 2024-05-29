<?php
require_once("../funciones.php");

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$orden = $_POST['orden'];
$precio = $_POST['precio'];

$allowed_extensions = array("jpg", "png", "jfif","jpeg");
//extraer del fichero el formato 
$file_extension = strtolower(pathinfo($_FILES['fichero']['name'], PATHINFO_EXTENSION));
//si no existe en los valores de el array guardado muestra el error
if (!in_array($file_extension, $allowed_extensions)) {
    echo "El fichero no es una imagen válida (JPG, PNG, JPEG, JFIF).";
} else {
    $directorio = "C:\\xampp\\htdocs\\proyectoTFG\\images\\";

    $fichero_destino = $directorio  . $_FILES['fichero']['name'];

    $nombreimg = $_FILES['fichero']['name'];

    if ($_FILES['fichero']['size'] > 10000000 || $_FILES['fichero']['size'] < 1) {
        die("El tamaño del fichero debe ser menor a 10MB.");
    }
    if (move_uploaded_file($_FILES['fichero']['tmp_name'], $fichero_destino)) {
        try {
            $sql = "INSERT INTO productos ( Nombre, Precio, Descripcion, imagen,stock,Orden) VALUES (?, ?, ?, ?,?,?)";
                $parametros = array($nombre, $precio, $descripcion, $nombreimg,$stock,$orden);
            $resultado = ejecuta_SQL_con_parametros($sql, $parametros);

            if ($resultado) {
                echo "El producto se añadió correctamente.";
            } else {
                echo "Error al actualizar la imagen de perfil.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "No se ha podido subir el fichero.";
    }
}
?>
