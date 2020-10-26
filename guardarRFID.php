<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $idEstudiante = isset($_POST['idEstudiante']) ? mysqli_real_escape_string($db, $_POST['idEstudiante']) : false;
    $rfid = isset($_POST['rfid']) ? mysqli_real_escape_string($db, $_POST['rfid']) : false;

    $saber_si_tiene_rfid = conseguir_rfid($db, $idEstudiante);

        //validacion
        $errores = array();

        if (empty($idEstudiante)) {
            $errores['idEstudiante'] = 'EL código del estudiante no es válido';
        }

        if (empty($rfid)) {
            $errores['rfid'] = 'EL RFID del estudiante no es válido';
        }

        if (count($errores) == 0) {
            if (!empty($saber_si_tiene_rfid) && mysqli_num_rows($saber_si_tiene_rfid) >= 1) {
                       $sql = "UPDATE rfid SET ID_RFID = '$rfid' WHERE ID_ESTU = '$idEstudiante';";
            }else{
                 $sql = "INSERT INTO rfid(ID_RFID, ID_ESTU, ESTADO_RFID) ".
                       "VALUES('$rfid', '$idEstudiante', 'Si Registra');";
            }
            $guardar = mysqli_query($db, $sql);
            header("Location: asignarRfidEstudiante.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: asignarRfidEstudiante.php?id=".$_GET['editar']);
            }else{
                header("Location: asignarRfidEstudiante.php");
            }
        }
}

?>