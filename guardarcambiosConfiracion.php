<?php

if(isset($_POST)){

    require_once 'include/conexion.php';

    $nombreColegio = isset($_POST['nombreColegio']) ? mysqli_real_escape_string($db, $_POST['nombreColegio']) : false;
    $responsable = isset($_POST['responsable']) ? mysqli_real_escape_string($db, $_POST['responsable']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $emailPrecompras = isset($_POST['emailPrecompras']) ? mysqli_real_escape_string($db, $_POST['emailPrecompras']) : false;
    $horaPrecompras = isset($_POST['horaPrecompras']) ? mysqli_real_escape_string($db, $_POST['horaPrecompras']) : false;
    $preCompraSabados = isset($_POST['preCompraSabados']) ? (int) $_POST['preCompraSabados'] : false;
    $emailTiendaOnline = isset($_POST['emailTiendaOnline']) ? mysqli_real_escape_string($db, $_POST['emailTiendaOnline']) : false;
    $whatsapp = isset($_POST['whatsapp']) ? mysqli_real_escape_string($db, $_POST['whatsapp']) : false;
    $controlInventario = isset($_POST['controlInventario']) ? (int) $_POST['controlInventario'] : false;
    $servicioPrecompras = isset($_POST['servicioPrecompras']) ? (int) $_POST['servicioPrecompras'] : false;
    $idParametrizacion = isset($_POST['idParametrizacion']) ? (int) $_POST['idParametrizacion'] : false;

        //validacion
        $errores = array();

        $exito = array();

        if (count($errores) == 0) {
            if ($idParametrizacion == false) {
               $sql = "INSERT INTO parametrizaciones(nombre_colegio, nombre_responsable, email_notificaciones, email_precompras, hora_maxima_precompras, entrega_precompras_sabado, email_tienda_online, whatsapp_soporte, ventas_control_inventario, servicio_precompras) VALUES ('$nombreColegio','$responsable','$email','$emailPrecompras','$horaPrecompras',$preCompraSabados,'$emailTiendaOnline','$whatsapp',$controlInventario, $servicioPrecompras)";
            }else{
                $sql = "UPDATE parametrizaciones SET nombre_colegio='$nombreColegio',nombre_responsable='$responsable',email_notificaciones='$email',email_precompras='$emailPrecompras',hora_maxima_precompras='$horaPrecompras',entrega_precompras_sabado=$preCompraSabados,email_tienda_online='$emailTiendaOnline',whatsapp_soporte='$whatsapp',ventas_control_inventario=$controlInventario,servicio_precompras=$servicioPrecompras WHERE id_parametrizacion = $idParametrizacion";
            }
            $guardar = mysqli_query($db, $sql);
            if ($guardar) {
               $exito['exito'] = "Datos Ingresados Correctamente";
            }
            $_SESSION['completado'] = $exito;
            header("Location: parametrizacion.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['idParametrizacion'])){
                header("Location: parametrizacion.php?id=".$_POST['idParametrizacion']);
            }else{
                header("Location: parametrizacion.php");
            }
        }
}

?>