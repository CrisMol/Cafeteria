<?php

if(isset($_POST)){

    require_once 'include/conexion.php';

    $valorRecarga = isset($_POST['valorRecarga']) ? $_POST['valorRecarga'] : false;
    $idProfesor = isset($_POST['idProfesor']) ? mysqli_real_escape_string($db, $_POST['idProfesor']) : false;
    $saldo = isset($_POST['saldo']) ? (int) $_POST['saldo'] : false;

    $total = $saldo + $valorRecarga;

        //validacion
        $errores = array();

        if (empty($valorRecarga)) {
            $errores['valorRecarga'] = 'Valor de la Recarga no valido';
        }

        if (count($errores) == 0) {
            $sql = "UPDATE profesor SET SALDO_PROF = $total WHERE ID_PROF = '$idProfesor';";
            //Almacenar movimiento
            $sql_movimiento = "INSERT INTO recarga_efectivo (ID_PROF, ID_FAM, FECHA_REC_EFEC, HORA_REC_EFEC, VALOR_REC_EFEC) ".
                              "VALUES('$idProfesor', null, CURDATE(), CURTIME(), $valorRecarga);";
            $guardar = mysqli_query($db, $sql);
            $registrar_recarga = mysqli_query($db, $sql_movimiento);
            header("Location: recargaEfectivoProfesor.php");
        }else{
            $_SESSION['errores'] = $errores;
            if(isset($_GET['editar'])){
                header("Location: recargaEfectivoProfesor.php?id=".$_GET['editar']);
            }else{
                header("Location: recargaEfectivoProfesor.php");
            }
        }
}

?>