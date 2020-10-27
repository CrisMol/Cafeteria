<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $idProducto = isset($_POST['idProducto']) ? mysqli_real_escape_string($db, $_POST['idProducto']) : false;

    //Conseguir valores de movimiento
    $producto =conseguir_movimientos_productos($db, $idProducto);
    $producto_id = mysqli_fetch_assoc($producto);
    if ($producto_id['CODIGO_PRODUCTO'] == $idProducto) {
    	$errores['error_borrar'] = 'No se puede eliminar el producto porque existe registros de movimientos';
    	$_SESSION['errores'] = $errores;
    	header("Location: listaProductos.php");
    }else{
    	//validacion
        $errores = array();

        if (empty($idProducto)) {
            $errores['idProducto'] = 'El còdigo no es válido';
        }

        if (count($errores) == 0) {
            $sql = "DELETE FROM producto WHERE ID_PRODUCTO=$idProducto";
            $guardar = mysqli_query($db, $sql);
            header("Location: listaProductos.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: listaProductos.php?id=".$_GET['editar']);
            }else{
                header("Location: listaProductos.php");
            }
        }
    }
}

?>