<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $idProfesor = isset($_POST['idProfesor']) ? mysqli_real_escape_string($db, $_POST['idProfesor']) : false;
    $rfid = isset($_POST['rfid']) ? mysqli_real_escape_string($db, $_POST['rfid']) : false;

    $saber_si_tiene_rfid = conseguir_rfid_profesor($db, $idProfesor);

        //validacion
        $errores = array();

        if (empty($idProfesor)) {
            $errores['idProfesor'] = 'EL código del profesor no es válido';
        }

        if (empty($rfid)) {
            $errores['rfid'] = 'EL RFID del profesor no es válido';
        }

        if (count($errores) == 0) {
            if (!empty($saber_si_tiene_rfid) && mysqli_num_rows($saber_si_tiene_rfid) >= 1) {
            	$sql = "UPDATE rfid_profesores SET id_rfid_profesor='$rfid' WHERE id_profesor = '$idProfesor'";
            }else{
            	$sql = "INSERT INTO rfid_profesores(id_rfid_profesor, id_profesor, estado_rfid_profesor) VALUES ('$rfid','$idProfesor','Si Registra')";
            }
            $guardar = mysqli_query($db, $sql);
            header("Location: asignarRfidProfesor.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: asignarRfidProfesor.php?id=".$_GET['editar']);
            }else{
                header("Location: asignarRfidProfesor.php");
            }
        }
}

?>