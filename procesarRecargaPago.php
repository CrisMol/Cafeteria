<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$valorPago = isset($_POST['valorPago']) ? (float) $_POST['valorPago'] : false;
	$idProfesor = isset($_POST['idProfesor']) ? mysqli_real_escape_string($db, $_POST['idProfesor']) : false;
	$saldo_credito = isset($_POST['saldo_credito']) ? (float) $_POST['saldo_credito'] : false;

		//validacion
		$errores = array();

		if (empty($valorPago)) {
			$errores['valorPago'] = 'Valor del Pago no es válido';
		}

		if (count($errores) == 0) {

			if ($valorPago > $saldo_credito) {
				$total = $valorPago - $saldo_credito;
				$sql = "UPDATE profesor SET SALDO_PROF = $total, CREDI_PROF = 0 WHERE ID_PROF = '$idProfesor';";
			}else{
				$total = $saldo_credito - $valorPago;
				$sql = "UPDATE profesor SET CREDI_PROF = $total WHERE ID_PROF = '$idProfesor';";
			}

			//Almacenar credito
            $sql_movimiento = "INSERT INTO pago_credito (ID_PROF, FECHA_PAG_CRED, HORA_PAG_CRED, VALOR_CRED) ".
                              "VALUES('$idProfesor', 'CURDATE()', CURTIME(), $valorPago);";
            $guardar = mysqli_query($db, $sql);
            $registrar_recarga = mysqli_query($db, $sql_movimiento);
			$almacenar = mysqli_query($db, $registrar_recarga);
			header("Location: pagoCredito.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['editar'])){
				header("Location: pagoCredito.php?id=".$_GET['editar']);
			}else{
				header("Location: pagoCredito.php");
			}
		}
}

?>