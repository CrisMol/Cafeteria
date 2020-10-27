<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $infoAdicional = isset($_POST['infoAdicional']) ? mysqli_real_escape_string($db, $_POST['infoAdicional']) : false;
    $idProducto = isset($_POST['idProducto']) ? mysqli_real_escape_string($db, $_POST['idProducto']) : false;
    $costoProducto = isset($_POST['costoProducto']) ? (float) $_POST['costoProducto'] : false;
    $precioVenta = isset($_POST['precioVenta']) ? (float) $_POST['precioVenta'] : false;
    $kiosko = isset($_POST['kiosko']) ? (int) $_POST['kiosko'] : false;
    $verInventario = isset($_POST['inventario']) ? (int) $_POST['inventario'] : false;


        //validacion
        $errores = array();

        if (empty($infoAdicional)) {
            $errores['infoAdicional'] = 'La Descripcion Adicional no es válida';
        }


        if (empty($costoProducto)) {
            $errores['costoProducto'] = 'El costo del producto no es válido';
        }

        if (empty($precioVenta)) {
            $errores['precioVenta'] = 'El precio de venta del producto no es válido';
        }

        if ($verInventario!=0 && $verInventario!=1) {
            $errores['verInventario'] = 'El inventario no es válido';
        }

        if ($kiosko!=0 && $kiosko!=1) {
            $errores['kiosko'] = 'La precompra no es válida';
        }

        if (count($errores) == 0) {
            $sql = "UPDATE producto SET COSTO_PROD=$costoProducto,PRECIO_VENTA=$precioVenta,ESTADO_INVE=$verInventario,ESTADO_PRECO=$kiosko,DESC_ADIC='$infoAdicional' WHERE ID_PRODUCTO=$idProducto";
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

?>