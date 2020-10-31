<?php

if(isset($_POST)){

    require_once 'include/conexion.php';

    $idProveedor = isset($_POST['idProveedor']) ? mysqli_real_escape_string($db, $_POST['idProveedor']) : false;
    $valorPago = isset($_POST['valorPago']) ? (float) $_POST['valorPago'] : false;
    

        //validacion
        $errores = array();

        if (empty($idProveedor)) {
            $errores['idProveedor'] = 'El código del proveedor no es válido';
        }

        if (count($errores) == 0) {
            $sql = "INSERT INTO pagos_proveedor(id_usuario, id_proveedor, valor_pago) VALUES (1,$idProveedor,$valorPago)";
            $guardar = mysqli_query($db, $sql);
            header("Location: pagosProveedor.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: pagosProveedor.php?id=".$_GET['editar']);
            }else{
                header("Location: pagosProveedor.php");
            }
        }
}

?>