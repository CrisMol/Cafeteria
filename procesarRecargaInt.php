<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$valorRecarga = isset($_POST['valorRecarga']) ? (int) $_POST['valorRecarga'] : false;
	$codigoFamilia = isset($_POST['codigoFamilia']) ? mysqli_real_escape_string($db, $_POST['codigoFamilia']) : false;
	$nombreFamilia = isset($_POST['nombreFamilia']) ? mysqli_real_escape_string($db, $_POST['nombreFamilia']) : false;
	$saldo = isset($_POST['saldo']) ? (int) $_POST['saldo'] : false;

	$total = $saldo + $valorRecarga;

		//validacion
		$errores = array();

		if (empty($valorRecarga)) {
			$errores['valorRecarga'] = 'Valor de la Recarga no valido';
		}

		if (count($errores) == 0) {
			$sql = "UPDATE familias SET saldo_familia = $total WHERE id_familia = '$codigoFamilia'";
			//Insertar en la tabla recargas
			$sql_recargas = "INSERT INTO recargas(id_usuario, id_forma_pago, id_tipo_recarga, codigo_cliente_recarga, nombre_cliente_recarga, valor_recarga, fecha_recarga, hora_recarga) VALUES(1, 1, 1, '$codigoFamilia', '$nombreFamilia', $valorRecarga, CURDATE(), CURTIME())";
            $registrar_recarga = mysqli_query($db, $sql);
            $registrar_reporte_recarga = mysqli_query($db, $sql_recargas);
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