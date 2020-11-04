<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $codigoRecarga = isset($_POST['codigoRecarga']) ? (int) $_POST['codigoRecarga'] : false;
    $hora = isset($_POST['hora']) ? mysqli_real_escape_string($db, $_POST['hora']) : false;
    $fecha = isset($_POST['fecha']) ? mysqli_real_escape_string($db, $_POST['fecha']) : false;
    $idProfesor = isset($_POST['idProfesor']) ? mysqli_real_escape_string($db, $_POST['idProfesor']) : false;
    $valor = isset($_POST['valor']) ? (float) $_POST['valor'] : false;

 	$profesor = conseguir_profesores_por_codigo($db, $idProfesor);
 	$saldo_profesor = mysqli_fetch_assoc($profesor);

 	$saldo_final = $saldo_profesor['SALDO_PROFESOR'] - $valor;
        //validacion
        $errores = array();

        if (empty($codigoRecarga)) {
            $errores['codigoRecarga'] = 'El còdigo de la Recarga no es valido';
        }

        if (empty($idProfesor)) {
            $errores['idProfesor'] = 'La còdigo del profesor no es valido';
        }

        $exito = array();

        if (count($errores) == 0) {
            //Eliminar de la tabla movimientos
        	$sql_eliminar_movimiento = "DELETE FROM movimientos_profesores WHERE id_profesor = $idProfesor AND fecha_mov_profesor = '$fecha' AND hora_mov_profesor = '$hora' AND credito_mov_profesor = $valor AND descripcion_mov_profesor = 'Recarga Efectivo'";


            $sql = "DELETE FROM recargas WHERE id_recarga = $codigoRecarga";
            $exito['exito'] = "Exito! la reversion se realizo correctamente";
            //Regresar Valores
         	$sql_actualizar = "UPDATE profesores SET saldo_profesor = $saldo_final WHERE id_profesor = '$idProfesor'";
         	$eliminar_movimiento = mysqli_query($db, $sql_eliminar_movimiento);
            $atualizar = mysqli_query($db, $sql_actualizar);
            $eliminar = mysqli_query($db, $sql);
            $_SESSION['completado'] = $exito;
            header("Location: reversionRecargaProfesor.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: reversionRecargaProfesor.php?id=".$_GET['editar']);
            }else{
                header("Location: reversionRecargaProfesor.php");
            }
        }
}

?>