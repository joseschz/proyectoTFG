<?php                    
require_once('funciones.php');  

$buscarproducto = $_POST['producto'];

$consulta ="SELECT * FROM productos WHERE Nombre LIKE '%$buscarproducto%'";
$resultado = ejecuta_SQL($consulta);

if($buscarproducto != ""){
if($resultado ->rowCount() > 0){

    echo "<div style='background-color: #f0f0f0'><ul>";
    foreach($resultado as $row){
        echo "<li style='margin-left: 15px';margin-top: 5px'><a href='detalleproducto.php?id=". $row['ID_Producto']. "'><strong>". $row['Nombre']. "</strong></a></li>";
    }   
    echo "</ul></div>";
}
else{
    echo "<li><strong style='color:black;'>No se ha encontrado <strong style='color:red;'>$buscarproducto</strong></strong></li>";
}
}

?> 