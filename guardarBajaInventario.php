<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $motivo = isset($_POST['motivo']) ? mysqli_real_escape_string($db, $_POST['motivo']) : false;
    $baja = isset($_POST['baja']) ? (int) $_POST['baja'] : false;
    $idProducto = isset($_POST['idProducto']) ? (int) $_POST['idProducto'] : false;
    

    $producto =conseguir_productos($db, $idProducto);
    $producto = mysqli_fetch_assoc($producto);
    $cantidadProducto = $producto['CANTIDAD_PRODUCTO'];
    $inventario = $cantidadProducto - $baja;
    	//validacion
        $errores = array();

        if (empty($motivo)) {
            $errores['motivo'] = 'El motivo no es valido';
        }

        if (empty($baja)) {
            $errores['baja'] = 'La cantidad de baja no es correcta';
        }


        if (count($errores) == 0) {
            $sql = "UPDATE productos SET cantidad_producto=$inventario WHERE id_producto=$idProducto";
            //Ingresar en el movimiento
            $sql_baja = "INSERT INTO bajas_producto(id_producto, cantidad_baja_producto, motivo_baja_producto) VALUES ($idProducto,$baja,'$motivo')";
            $guardar = mysqli_query($db, $sql);
            $guardar_movimiento = mysqli_query($db, $sql_baja);
            header("Location: verInventario.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: verInventario.php?id=".$_GET['editar']);
            }else{
                header("Location: verInventario.php");
            }
        }
}

?>