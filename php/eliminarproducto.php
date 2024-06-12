<?php
session_start();
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("../funciones.php");
    $id_producto = openssl_decrypt($_POST['id'], COD, KEY); //desencripta id 
        foreach($_SESSION['carro'] as $indice => $elemento){ //recorre el carro
            if($elemento['id'] == $id_producto){ //si el id coincide
                unset($_SESSION['carro'][$indice]); //elimina el elemento del carro
                $numero_productos = count($_SESSION['carro']);
                $totaleliminado = 0;
                $totaleliminado = $totaleliminado - ($elemento['precio'] * $elemento['cantidad']); 
                
        echo "$numero_productos";  //Respondiendo a la solicitud AJAX
        
            }
        }
             
    }
   
?>
