<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$valorRecarga = isset($_POST['valorRecarga']) ? (int) $_POST['valorRecarga'] : false;
	$codigoFamilia = isset($_POST['codigoFamilia']) ? mysqli_real_escape_string($db, $_POST['codigoFamilia']) : false;
	$saldo = isset($_POST['saldo']) ? (int) $_POST['saldo'] : false;

	$total = $saldo + $valorRecarga;

		//validacion
		$errores = array();

		if (empty($valorRecarga)) {
			$errores['valorRecarga'] = 'Valor de la Recarga no valido';
		}

		if (count($errores) == 0) {
			$sql = "UPDATE familia SET SALDO_FAM = $total WHERE ID_FAM = '$codigoFamilia';";
			//Almacenar movimiento
            $sql_movimiento = "INSERT INTO recarga_efectivo (ID_PROF, ID_FAM, FECHA_REC_EFEC, HORA_REC_EFEC, VALOR_REC_EFEC) ".
                              "VALUES(null, '$codigoFamilia', CURDATE(), CURTIME(), $valorRecarga);";
            $guardar = mysqli_query($db, $sql);
            $registrar_recarga = mysqli_query($db, $sql_movimiento);
			$almacenar = mysqli_query($db, $registrar_recarga);
			header("Location: recargaEfectivo.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['editar'])){
				header("Location: recargaEfectivo.php?id=".$_GET['editar']);
			}else{
				header("Location: recargaEfectivo.php");
			}
		}
}

?>