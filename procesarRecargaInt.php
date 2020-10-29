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
			$sql = "UPDATE familias SET saldo_familia = $total WHERE id_familia = '$codigoFamilia'";
            $registrar_recarga = mysqli_query($db, $sql);
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