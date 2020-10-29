<?php

if(isset($_POST)){

    require_once 'include/conexion.php';
    require_once 'include/helpers.php';

    $codigoMovimiento = isset($_POST['idExtracto']) ? (int) $_POST['idExtracto'] : false;
    $idProfesor = isset($_POST['idProfesor']) ? mysqli_real_escape_string($db, $_POST['idProfesor']) : false;
    $Descripcion = isset($_POST['Descripcion']) ? mysqli_real_escape_string($db, $_POST['Descripcion']) : false;
    $valor = isset($_POST['valor']) ? (float) $_POST['valor'] : false;

 	$profesor = conseguir_profesores_por_codigo($db, $idProfesor);
 	$saldo_profesor = mysqli_fetch_assoc($profesor);

 	$saldo_final = $saldo_profesor['SALDO_PROFESOR'] - $valor;
        //validacion
        $errores = array();

        if (empty($codigoMovimiento)) {
            $errores['codigoMovimiento'] = 'El còdigo del movimiento no es valido';
        }

        if (empty($idProfesor)) {
            $errores['idProfesor'] = 'La còdigo del profesor no es valido';
        }

        if (empty($Descripcion)) {
            $errores['Descripcion'] = 'La Descripcion del profesor no es valido';
        }

        if (count($errores) == 0) {
            $sql = "DELETE FROM movimientos_profesores WHERE id_mov_profesor = $codigoMovimiento";
            //Regresar Valores
            if ($Descripcion == 'Recarga Efectivo') {
            	$sql_actualizar = "UPDATE profesores SET saldo_profesor = $saldo_final";
            	$atualizar = mysqli_query($db, $sql_actualizar);
            }
            $guardar = mysqli_query($db, $sql);
            header("Location: verMovimientosProfesor.php?idProfesor=".$idProfesor);
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: verMovimientosProfesor.php?id=".$_GET['editar']);
            }else{
                header("Location: verMovimientosProfesor.php?idProfesor=".$idProfesor);
            }
        }
}

?>