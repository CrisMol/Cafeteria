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
            $sql = "UPDATE profesores SET saldo_profesor = $total WHERE id_profesor = '$idProfesor';";
            //Almacenar movimiento
            $sql_movimiento = "INSERT INTO movimientos_profesores (id_profesor, descripcion_mov_profesor, fecha_mov_profesor, hora_mov_profesor, debito_mov_profesor, cantidad_mov_profesor, credito_mov_profesor) ".
                              "VALUES('$idProfesor', 'Recarga Efectivo', CURDATE(), CURTIME(), 0, 1, $valorRecarga);";
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