<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $codigoProfesor = isset($_POST['codigoProfesor']) ? mysqli_real_escape_string($db, $_POST['codigoProfesor']) : false;
    $apellidosProfesor = isset($_POST['apellidosProfesor']) ? mysqli_real_escape_string($db, $_POST['apellidosProfesor']) : false;
    $nombreProfesor = isset($_POST['nombreProfesor']) ? mysqli_real_escape_string($db, $_POST['nombreProfesor']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $celular = isset($_POST['celular']) ? mysqli_real_escape_string($db, $_POST['celular']) : false;
    $cupoCredito = isset($_POST['cupoCredito']) ? (float) $_POST['cupoCredito'] : false;

        $errores = array();

        if (empty($codigoProfesor)) {
            $errores['codigoProfesor'] = 'El codigo del profesor no es válido';
        }

        if (empty($apellidosProfesor)) {
            $errores['apellidosProfesor'] = 'El apellido del profesor no es valido';
        }

        if (empty($nombreProfesor)) {
            $errores['nombreProfesor'] = 'El nombre del profesor no es valido';
        }

        if (empty($email)) {
            $errores['email'] = 'El email del profesor no es valido';
        }

        if (empty($celular)) {
            $errores['celular'] = 'El celular del profesor no es valido';
        }

        if (count($errores) == 0) {
            $sql = "INSERT INTO `profesor`(ID_PROF, APELLIDO_PROF, NOM_PROF, MAIL_PROF, CEL_PROF, SALDO_PROF, CREDI_PROF) VALUES ('$codigoProfesor','$apellidosProfesor','$nombreProfesor','$email','$celular',0,$cupoCredito);";
            $guardar = mysqli_query($db, $sql);
            header("Location: nuevoProfesor.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: nuevoProfesor.php?id=".$_GET['editar']);
            }else{
                header("Location: nuevoProfesor.php");
            }
        }
}

?>