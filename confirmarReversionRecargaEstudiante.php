<?php

if(isset($_POST)){

	require_once 'include/conexion.php';
	require_once 'include/helpers.php';

	$codigoFamilia = isset($_POST['codigoFamilia']) ? mysqli_real_escape_string($db, $_POST['codigoFamilia']) : false;
	$nombreFamilia = isset($_POST['nombreFamilia']) ? mysqli_real_escape_string($db, $_POST['nombreFamilia']) : false;
	$valor = isset($_POST['valor']) ? (float) $_POST['valor'] : false;
	$codigoRecarga = isset($_POST['codigoRecarga']) ? (int) $_POST['codigoRecarga'] : false;

	$familia = conseguir_familias($db, $codigoFamilia);
 	$saldo_familia = mysqli_fetch_assoc($familia);

 	$saldo_final = $saldo_familia['SALDO'] - $valor;

		//validacion
		$errores = array();

		if (empty($codigoFamilia)) {
			$errores['codigoFamilia'] = 'El codigo de la familia no es válido';
		}

		if (empty($nombreFamilia)) {
			$errores['nombreFamilia'] = 'El nombre de la familia no es válido';
		}

		if (empty($codigoRecarga)) {
			$errores['codigoRecarga'] = 'El codigo de la recarga no es válido';
		}

		if (empty($valor)) {
			$errores['valor'] = 'El valor de la recarga no es válido';
		}

		$exito = array();

		if (count($errores) == 0) {
				$sql = "DELETE FROM recargas WHERE id_recarga = $codigoRecarga";
				$exito['exito'] = "Exito! la reversion se realizo correctamente";
			//Actualizar saldo
			$sql_actualizar = "UPDATE familias SET saldo_familia = $saldo_final WHERE id_familia = '$codigoFamilia'";
            $guardar = mysqli_query($db, $sql);
            $atualizar = mysqli_query($db, $sql_actualizar);
            $_SESSION['completado'] = $exito;
			header("Location: reversionRecargaEstudiante.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['numeroPedido'])){
				header("Location: reversionRecargaEstudiante.php?id=".$_GET['codigoRecarga']);
			}else{
				header("Location: reversionRecargaEstudiante.php");
			}
		}
}

?>