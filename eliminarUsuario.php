<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$nombreUsuario = isset($_POST['nombreUsuario']) ? mysqli_real_escape_string($db, $_POST['nombreUsuario']) : false;
	$idUsuario = isset($_POST['idUsuario']) ? (int) $_POST['idUsuario'] : false;

		//validacion
		$errores = array();

		if (empty($nombreUsuario)) {
			$errores['nombreUsuario'] = 'El nombre del Usuario no es válido';
		}

		if (empty($idUsuario)) {
			$errores['idUsuario'] = 'El Código del Usuario no es válido';
		}


		$exito = array();

		if (count($errores) == 0) {
			$sql = "DELETE FROM usuarios WHERE id_usuario = $idUsuario";
			$exito['exito'] = "Datos Eliminados Correctamente";
            $guardar = mysqli_query($db, $sql);
            $_SESSION['completado'] = $exito;
			header("Location: usuarios.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['idUsuario'])){
				header("Location: usuarios.php?id=".$_POST['idUsuario']);
			}else{
				header("Location: usuarios.php");
			}
		}
}

?>