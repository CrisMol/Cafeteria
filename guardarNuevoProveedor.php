<?php

if(isset($_POST)){

    require_once 'include/conexion.php';

    $identificacion = isset($_POST['identificacion']) ? mysqli_real_escape_string($db, $_POST['identificacion']) : false;
    $nombreProveedor = isset($_POST['nombreProveedor']) ? mysqli_real_escape_string($db, $_POST['nombreProveedor']) : false;
    $emailProveedor = isset($_POST['emailProveedor']) ? mysqli_real_escape_string($db, $_POST['emailProveedor']) : false;
    $telefonoProveedor = isset($_POST['telefonoProveedor']) ? mysqli_real_escape_string($db, $_POST['telefonoProveedor']) : false;
    $contacto = isset($_POST['contacto']) ? mysqli_real_escape_string($db, $_POST['contacto']) : false;
    

        //validacion
        $errores = array();

        if (empty($identificacion)) {
            $errores['identificacion'] = 'La identificacion del proveedor no es válido';
        }

        if (count($errores) == 0) {
            $sql = "INSERT INTO proveedores(nombre_proveedor, vendedor_proveedor, telefono_proveedor, email_proveedor, codigo_proveedor) VALUES ('$nombreProveedor','$contacto','$telefonoProveedor','$emailProveedor','$identificacion')";
            $guardar = mysqli_query($db, $sql);
            header("Location: nuevoProveedor.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: nuevoProveedor.php?id=".$_GET['editar']);
            }else{
                header("Location: nuevoProveedor.php");
            }
        }
}

?>