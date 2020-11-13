<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$nombreUsuario = isset($_POST['nombreUsuario']) ? mysqli_real_escape_string($db, $_POST['nombreUsuario']) : false;
	$emailUsuario = isset($_POST['emailUsuario']) ? mysqli_real_escape_string($db, $_POST['emailUsuario']) : false;
	$idUsuario = isset($_POST['idUsuario']) ? (int) $_POST['idUsuario'] : false;

		//validacion
		$errores = array();

		if (empty($nombreUsuario)) {
			$errores['nombreUsuario'] = 'El nombre del Usuario no es válido';
		}

		if (empty($emailUsuario)) {
			$errores['emailUsuario'] = 'El email del Usuario no es válido';
		}

		if (empty($idUsuario)) {
			$errores['idUsuario'] = 'El Código del Usuario no es válido';
		}


		$exito = array();

		if (count($errores) == 0) {
			$sql = "UPDATE usuarios SET nombre_usuario = '$nombreUsuario', email_usuario = '$emailUsuario' WHERE id_usuario = $idUsuario";
			$exito['exito'] = "Datos Actualizados Correctamente";
            $guardar = mysqli_query($db, $sql);
            $_SESSION['completado'] = $exito;
			header("Location: usuarios.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['numeroPedido'])){
				header("Location: usuarios.php?id=".$_POST['idUsuario']);
			}else{
				header("Location: usuarios.php");
			}
		}
}

?>