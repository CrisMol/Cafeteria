<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $idProducto = isset($_POST['idProducto']) ? mysqli_real_escape_string($db, $_POST['idProducto']) : false;
    $codigoAutorizaicon = isset($_POST['codigoAutorizaicon']) ? mysqli_real_escape_string($db, $_POST['codigoAutorizaicon']) : false;
    $inventario = isset($_POST['inventario']) ? (int) $_POST['inventario'] : false;

    //Conseguir clave de autorizacion
    $producto =conseguir_productos($db, $idProducto);
    $producto_clave = mysqli_fetch_assoc($producto);
    $claveAutorizacion = $producto_clave['CLAVE_AUTORIZACION'];
    $cantidadProducto = $producto_clave['CANTIDAD_PRODUCTO'];
    //Saber si es salida o entrada
    $entrada = 0;
    $salida = 0;
    $saldo = 0;
    if ($cantidadProducto < $inventario) {
    	$entrada = $inventario - $cantidadProducto;
    	$saldo = $cantidadProducto + $entrada;
    }else{
    	$salida = $cantidadProducto - $inventario;
    	$saldo = $cantidadProducto - $salida;
    }

    if ($claveAutorizacion == $codigoAutorizaicon) {
    	//validacion
        $errores = array();

        if (empty($codigoAutorizaicon)) {
            $errores['infoAdicional'] = 'La clave de autorización no es correcta';
        }

        if (empty($idProducto)) {
            $errores['idProducto'] = 'El código del producto es incorrecto';
        }

        if (count($errores) == 0) {
            $sql = "UPDATE producto SET CANTIDAD_PROD=$inventario WHERE ID_PRODUCTO=$idProducto;";
            //Ingresar en el movimiento
            $sql_movimiento = "INSERT INTO movimiento_producto(ID_PRODUCTO, FECHA_MOV_PROD, HORA_MOV_PROD, DESC_MOV_PROD, ENTRADA_MOV_PROD, SALIDA_MOV_PROD, SALDO_MOVI) VALUES ('$idProducto',CURDATE(),CURTIME(),'Cambio de Inventario', $entrada, $salida, $saldo)";
            $guardar = mysqli_query($db, $sql);
            $guardar_movimiento = mysqli_query($db, $sql_movimiento);
            header("Location: verInventario.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: verInventario.php?id=".$_GET['editar']);
            }else{
                header("Location: verInventario.php");
            }
        }
    }else{
    	$errores['infoAdicional'] = 'La clave de autorización no es correcta';
    	$_SESSION['errores'] = $errores;
    	header("Location: verInventario.php");
    }
}

?>