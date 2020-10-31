<?php

if(isset($_POST)){

    require_once 'include/conexion.php';

    $idProveedor = isset($_POST['idProveedor']) ? (int) $_POST['idProveedor'] : false;
    $idProducto = isset($_POST['idProducto']) ? (int) $_POST['idProducto'] : false;
    $cantidad = isset($_POST['cantidad']) ? (int) $_POST['cantidad'] : false;
    $costoTotal = isset($_POST['costoTotal']) ? (float) $_POST['costoTotal'] : false;

    /*$costoUnitario = $cantidad / $costoTotal;

    $factor = pow(10, 2);
   	$costoUnitario = (round($costoUnitario*$factor)/$factor);*/

        //validacion
        $errores = array();

        if (empty($idProducto)) {
            $errores['idProducto'] = 'El código del producto no es válido';
        }

        if (empty($idProveedor)) {
            $errores['idProveedor'] = 'El código del proveedor no es válido';
        }

        if (count($errores) == 0) {
            $sql = "INSERT INTO compras_proveedor(id_proveedor, precio_compra, cantidad_compra, fecha_compra, id_producto) VALUES ($idProveedor,$costoTotal,$cantidad,CURDATE(), $idProducto)";
            $guardar = mysqli_query($db, $sql);
            header("Location: ingresarFacturaProveedor.php?idProveedor=".$idProveedor);
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: ingresarFacturaProveedor.php?idProveedor=".$_GET['editar']);
            }else{
                header("Location: ingresarFacturaProveedor.php");
            }
        }
}

?>