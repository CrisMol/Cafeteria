<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $idCategoria = isset($_POST['idCategoria']) ? (int) $_POST['idCategoria'] : false;
    $codigoBarras = isset($_POST['codigoBarras']) ? mysqli_real_escape_string($db, $_POST['codigoBarras']) : false;
    $nombreProducto = isset($_POST['nombreProducto']) ? mysqli_real_escape_string($db, $_POST['nombreProducto']) : false;
    $descripcionProducto = isset($_POST['descripcionProducto']) ? mysqli_real_escape_string($db, $_POST['descripcionProducto']) : false;
    $costoProducto = isset($_POST['costoProducto']) ? (float) $_POST['costoProducto'] : false;
    $ventaProducto = isset($_POST['ventaProducto']) ? (float) $_POST['ventaProducto'] : false;
    $cantidadProducto = isset($_POST['cantidadProducto']) ? (int) $_POST['cantidadProducto'] : false;
    $verInventario = isset($_POST['verInventario']) ? (int) $_POST['verInventario'] : false;
    

    $kiosko = isset($_POST['kiosko']) ? (int)$_POST['kiosko'] : false;

    //Comprobar si existe estudiante
    $existe_codigo = saber_si_existe_codigo_barras($db, $codigoBarras);

    $exito = array();

    if($existe_codigo > 0){
        $error_codigo['codigo_barra'] = 'Ya existe un producto con ese código de barra';
        $_SESSION['errores'] = $error_codigo;
        header("Location: formNuevoProducto.php");
    }else{
        //validacion
        $errores = array();

        if (empty($idCategoria)) { //Debes cambiar en la base para que empiece desde 1
            $errores['idCategoria'] = 'La categoria no es válida';
        }

        if (empty($codigoBarras)) {
            $errores['codigoBarras'] = 'El codigo de barras no es el correcto';
        }

        if (empty($nombreProducto)) {
            $errores['nombreProducto'] = 'El nombre del producto no es valido';
        }

        if (empty($descripcionProducto)) {
            $errores['descripcionProducto'] = 'La Descripcion del producto no es valido';
        }

        if (empty($ventaProducto)) {
            $errores['ventaProducto'] = 'El precio de venta del producto no es válido';
        }

        if (empty($cantidadProducto)) {
            $errores['cantidadProducto'] = 'La cantidad del producto no es válido';
        }

        if ($verInventario!=0 && $verInventario!=1) {
            $errores['verInventario'] = 'El inventario no es válido';
        }

        if ($kiosko!=0 && $kiosko!=1) {
            $errores['kiosko'] = 'La precompra no es válida';
        }
        
        if (count($errores) == 0) {
        	$sql = "INSERT INTO productos(id_categoria, codigo_barras_producto, titulo_producto, descripcion_producto, costo_producto, precio_venta_producto, cantidad_producto, disponibilidad_inventario, disponibilidad_precompra, id_clave_autorizacion) VALUES ($idCategoria,'$codigoBarras','$nombreProducto','$descripcionProducto',$costoProducto,$ventaProducto,$cantidadProducto,$verInventario,$kiosko, 1)";
        	$exito['exito'] = "Datos Ingresados Correctamente";
			$_SESSION['completado'] = $exito;
            $guardar = mysqli_query($db, $sql);
            header("Location: nuevoProducto.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: nuevoProducto.php?id=".$_GET['editar']);
            }else{
                header("Location: nuevoProducto.php");
            }
        }
    }
}

?>