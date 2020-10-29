<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $nombreGrado = isset($_POST['nombreGrado']) ? mysqli_real_escape_string($db, $_POST['nombreGrado']) : false;
   
    //Comprobar si existe estudiante
    $existe_grado = saber_si_existe_grado($db, $nombreGrado);

    if($existe_grado > 0){
        $error_grado['grado'] = 'Ya existe un grado con ese nombre';
        $_SESSION['errores'] = $error_grado;
        header("Location: grados.php");
    }else{
        //validacion
        $errores = array();

        if (empty($nombreGrado)) {
            $errores['nombreGrado'] = 'El nombre no es válido';
        }

        if (count($errores) == 0) {
            $sql = "INSERT INTO grados(nombre_grado) VALUES ('$nombreGrado');";
            $guardar = mysqli_query($db, $sql);
            header("Location: grados.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: grados.php?id=".$_GET['editar']);
            }else{
                header("Location: grados.php");
            }
        }
    }
}

?>