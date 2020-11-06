<?php

if(isset($_POST)){

	require_once 'include/conexion.php';
	require_once 'include/helpers.php';

	$cajero = isset($_POST['cajero']) ? mysqli_real_escape_string($db, $_POST['cajero']) : false;
	$hora = isset($_POST['hora']) ? mysqli_real_escape_string($db, $_POST['hora']) : false;
	$codigoMovimiento = isset($_POST['codigoMovimiento']) ? (int) $_POST['codigoMovimiento'] : false;
	$idCajero = isset($_POST['idCajero']) ? (int) $_POST['idCajero'] : false;

		//validacion
		$errores = array();

		if (empty($cajero)) {
			$errores['cajero'] = 'El cajero no es válido';
		}

		if (empty($hora)) {
			$errores['hora'] = 'La hora no es válido';
		}

		if (empty($codigoMovimiento)) {
			$errores['codigoMovimiento'] = 'El codigo de movimiento no es válido';
		}

		$exito = array();

		if (count($errores) == 0) {
				$sql = "DELETE FROM movimientos_cajeros WHERE id_mov_cajero = $codigoMovimiento";
				$exito['exito'] = "Exito! la reversion se realizo correctamente";
			//Actualizar saldo
			$sql_actualizar = "UPDATE cajeros SET id_estado_caja=1 WHERE id_cajero = $idCajero";
            $guardar = mysqli_query($db, $sql);
            $atualizar = mysqli_query($db, $sql_actualizar);
            $_SESSION['completado'] = $exito;
			header("Location: reversarCierreCaja.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['numeroPedido'])){
				header("Location: reversarCierreCaja.php?id=".$_GET['codigoMovimiento']);
			}else{
				header("Location: reversarCierreCaja.php");
			}
		}
}

?>