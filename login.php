<?php
//Iniciar la sesión y la conexión a la bd
require_once 'include/conexion.php';
//Recoger datos del formulario
if (isset($_POST)) {
	$username = trim($_POST['username']);
	$password = $_POST['password'];
	//Consulta para comprobar las credenciales del usuario
	$sql = "SELECT nombre_usuario, email_usuario, contrasena_usuario FROM usuarios where alias_usuario = '$username' LIMIT 1";
	$login = mysqli_query($db, $sql);
	if ($login && mysqli_num_rows($login) == 1) {
		$usuario = mysqli_fetch_assoc($login);
		//Comprobar la contraseña
		//$verify = password_verify($password, $usuario['contrasena_usuario']);
		$verify = false;
		if ($usuario['contrasena_usuario'] == $password) {
			$verify = true;
		}

		if ($verify) {
			//Utilizar una sesión para guardar los datos del usuario logeado
			$_SESSION['usuario'] = $usuario;
			header("Location: dashboard.php");

			if (isset($_SESSION['error_login'])) {
				unset($_SESSION['error_login']);
			}
		}else{
			//Si algo falla enviar una sesión con el fallo
			$_SESSION['error_login'] = "Login incorrecto";
			header("Location: index.php");
		}
	}else{
		$_SESSION['error_login'] = "Login incorrecto";
		header("Location: index.php");
	}
}
