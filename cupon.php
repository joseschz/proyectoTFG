<?php
require_once("funciones.php");
session_start();
if(isset($_POST['cupon']) && isset($_POST['ids'])) {
    $cupon = $_POST['cupon'];
    $idsCifrados = $_POST['ids']; // Array de IDs de productos cifrados
    $idsDesencriptados = array(); // Array para almacenar los IDs desencriptados

    //desencripto los ids cifrados
    foreach ($idsCifrados as $idCifrado) {
        $idsDesencriptados[] = openssl_decrypt($idCifrado, COD, KEY);
    }
    //hago condicional que si es distinto a vacío a los ids me ponga una coma evitando el principio y el final 
    if (!empty($idsDesencriptados)) {
        $idsDesencriptadosString = implode(',', $idsDesencriptados);
        $idsDesencriptadosString = trim($idsDesencriptadosString, ',');
        //sino mostrará vacío
    } else {
        $idsDesencriptadosString = '';
    }
    //consulta para verificar si el cupón es aplicable a alguno de los productos seleccionados
    $consulta = "SELECT COUNT(*) AS num_cupones, cupones.REBAJA FROM cupones WHERE ID_Cupon IN (SELECT ID_Cupon FROM cupones WHERE Codigo = '$cupon') AND ID_Producto IN ($idsDesencriptadosString)";
    $resultado = ejecuta_SQL($consulta);
    
    if ($resultado->rowCount() > 0) {
       foreach ($resultado as $fila) {
        $numCupones = $fila['num_cupones'];
        $Rebaja = $fila['REBAJA'];
       }
        // Si el número de cupones encontrados es mayor que cero, el cupón es válido
        if ($numCupones > 0) {
            $_SESSION['Rebaja'] = $Rebaja;
            echo "Aplicado.";
        } else {
            echo "No Aplicado.";
        }
    } else {
        echo "Error al verificar la validez del cupón.";
    }
}
?>