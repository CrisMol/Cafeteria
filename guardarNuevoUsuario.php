<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$nombreUsuario = isset($_POST['nombreUsuario']) ? mysqli_real_escape_string($db, $_POST['nombreUsuario']) : false;
	$usuario = isset($_POST['usuario']) ? mysqli_real_escape_string($db, $_POST['usuario']) : false;
	$emailUsuario = isset($_POST['emailUsuario']) ? mysqli_real_escape_string($db, $_POST['emailUsuario']) : false;

		//validacion
		$errores = array();

		if (empty($nombreUsuario)) {
			$errores['nombreUsuario'] = 'El nombre del Usuario no es válido';
		}

		if (empty($emailUsuario)) {
			$errores['emailUsuario'] = 'El email del Usuario no es válido';
		}

		if (empty($usuario)) {
			$errores['usuario'] = 'El Usuario no es válido';
		}


		$exito = array();

		if (count($errores) == 0) {
			$sql = "INSERT INTO usuarios(id_tipo_usuario, nombre_usuario, email_usuario, contrasena_usuario, alias_usuario) VALUES(1, '$nombreUsuario', '$emailUsuario', '1234', '$usuario')";
			$exito['exito'] = "Datos Ingresados Correctamente";
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