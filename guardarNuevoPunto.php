<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$nombrePuntoNuevo = isset($_POST['nombrePuntoNuevo']) ? mysqli_real_escape_string($db, $_POST['nombrePuntoNuevo']) : false;

		//validacion
		$errores = array();

		if (empty($nombrePuntoNuevo)) {
			$errores['nombrePuntoNuevo'] = 'El nombre del Punto de Venta no es válido';
		}

		$exito = array();

		if (count($errores) == 0) {
				$sql = "INSERT INTO puntos_venta(nombre_punto_venta) VALUES('$nombrePuntoNuevo')";
				$exito['exito'] = "Datos Ingresados Correctamente";
            $guardar = mysqli_query($db, $sql);
            $_SESSION['completado'] = $exito;
			header("Location: puntosVenta.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['numeroPedido'])){
				header("Location: puntosVenta.php?id=".$_POST['idPunto']);
			}else{
				header("Location: puntosVenta.php");
			}
		}
}

?>