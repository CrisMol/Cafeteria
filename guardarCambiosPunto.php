<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$nombrePunto = isset($_POST['nombrePunto']) ? mysqli_real_escape_string($db, $_POST['nombrePunto']) : false;
	$idPunto = isset($_POST['idPunto']) ? (int) $_POST['idPunto'] : false;

		//validacion
		$errores = array();

		if (empty($nombrePunto)) {
			$errores['nombrePunto'] = 'El nombre del Punto de Venta no es válido';
		}

		if (empty($idPunto)) {
			$errores['idPunto'] = 'El código del Punto de Venta es Incorrecto';
		}

		$exito = array();

		if (count($errores) == 0) {
			$sql = "UPDATE puntos_venta SET nombre_punto_venta = '$nombrePunto' WHERE id_punto_venta = $idPunto";
			$exito['exito'] = "Datos Actualizados Correctamente";
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