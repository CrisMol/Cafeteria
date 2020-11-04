<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$nombreCajero = isset($_POST['nombreCajero']) ? mysqli_real_escape_string($db, $_POST['nombreCajero']) : false;
	$cantidadPedido = isset($_POST['cantidadPedido']) ? (int) $_POST['cantidadPedido'] : false;
	$Valor = isset($_POST['valorPedido']) ? (float) $_POST['valorPedido'] : false;
	$numeroPedido = isset($_POST['numeroPedido']) ? (int) $_POST['numeroPedido'] : false;

		//validacion
		$errores = array();

		if (empty($nombreCajero)) {
			$errores['nombreCajero'] = 'El nombre del cajero no es válido';
		}

		if (empty($cantidadPedido)) {
			$errores['cantidadPedido'] = 'La cantidad del Pedido no es válido';
		}

		if (empty($numeroPedido)) {
			$errores['numeroPedido'] = 'El numero del pedido no es válido';
		}

		if (empty($Valor)) {
			$errores['Valor'] = 'El valor del pedido no es válido';
		}

		$exito = array();

		if (count($errores) == 0) {
				$sql = "DELETE FROM ventas WHERE numero_pedido = $numeroPedido";
				$exito['exito'] = "Exito! la reversion se realizo correctamente";
            $guardar = mysqli_query($db, $sql);
            $_SESSION['completado'] = $exito;
			header("Location: reversionEfectivo.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['numeroPedido'])){
				header("Location: reversionEfectivo.php?id=".$_GET['numeroPedido']);
			}else{
				header("Location: reversionEfectivo.php");
			}
		}
}

?>