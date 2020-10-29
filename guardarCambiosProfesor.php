<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $idProfesor = isset($_POST['idProfesor']) ? mysqli_real_escape_string($db, $_POST['idProfesor']) : false;
    $apellidosProfesor = isset($_POST['apellidosProfesor']) ? mysqli_real_escape_string($db, $_POST['apellidosProfesor']) : false;
    $nombreProfesor = isset($_POST['nombreProfesor']) ? mysqli_real_escape_string($db, $_POST['nombreProfesor']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    $celular = isset($_POST['celular']) ? mysqli_real_escape_string($db, $_POST['celular']) : false;
    $cupoCredito = isset($_POST['cupoCredito']) ? (float) $_POST['cupoCredito'] : false;

        $errores = array();

        if (empty($apellidosProfesor)) {
            $errores['codigoEstudiante'] = 'El apellido del profesor no es valido';
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
        	$sql = "UPDATE profesores SET apellidos_profesor='$apellidosProfesor',nombres_profesor='$nombreProfesor',email_profesor='$email',credito_profesor=$cupoCredito,celular_profesor='$celular' WHERE id_profesor = '$idProfesor'";
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