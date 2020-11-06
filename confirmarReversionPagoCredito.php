<?php

if(isset($_POST)){

	require_once 'include/conexion.php';
	require_once 'include/helpers.php';

	$nombreProfesor = isset($_POST['nombreProfesor']) ? mysqli_real_escape_string($db, $_POST['nombreProfesor']) : false;
	$codigoProfesor = isset($_POST['codigoProfesor']) ? mysqli_real_escape_string($db, $_POST['codigoProfesor']) : false;
	$codigoMovimiento = isset($_POST['codigoMovimiento']) ? (int) $_POST['codigoMovimiento'] : false;
	$valor = isset($_POST['valor']) ? (float) $_POST['valor'] : false;

	//Obtener profesores
	$profesor = conseguir_profesores_por_codigo($db, $codigoProfesor);
 	$credito_profesor = mysqli_fetch_assoc($profesor);

 	$saldo_final = $credito_profesor['CREDITO'] + $valor;
		//validacion
		$errores = array();

		if (empty($nombreProfesor)) {
			$errores['nombreProfesor'] = 'El nombre del profesor no es válido';
		}

		if (empty($valor)) {
			$errores['valor'] = 'El valor no es válido';
		}

		if (empty($codigoMovimiento)) {
			$errores['codigoMovimiento'] = 'El codigo de movimiento no es válido';
		}

		$exito = array();

		if (count($errores) == 0) {
				$sql = "DELETE FROM movimientos_profesores WHERE id_mov_profesor = $codigoMovimiento";
				$exito['exito'] = "Exito! la reversion se realizo correctamente";
			//Actualizar saldo
			$sql_actualizar = "UPDATE profesores SET saldo_credito_profesor=$saldo_final WHERE id_profesor = '$codigoProfesor'";
            $guardar = mysqli_query($db, $sql);
            $atualizar = mysqli_query($db, $sql_actualizar);
            $_SESSION['completado'] = $exito;
			header("Location: reversionPagoCredito.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['numeroPedido'])){
				header("Location: reversionPagoCredito.php?id=".$_GET['codigoMovimiento']);
			}else{
				header("Location: reversionPagoCredito.php");
			}
		}
}

?>