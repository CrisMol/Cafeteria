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


        if ($verInventario!=0 && $verInventario!=1) {
            $errores['verInventario'] = 'El inventario no es válido';
        }

        if ($kiosko!=0 && $kiosko!=1) {
            $errores['kiosko'] = 'La precompra no es válida';
        }

        if (count($errores) == 0) {
            $sql = "UPDATE productos SET costo_producto=$costoProducto,precio_venta_producto=$precioVenta,disponibilidad_inventario=$verInventario,disponibilidad_precompra=$kiosko,descripcion_producto='$infoAdicional' WHERE id_producto=$idProducto";
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