<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$emailNotificaciones = isset($_POST['emailNotificaciones']) ? mysqli_real_escape_string($db, $_POST['emailNotificaciones']) : false;
	$celularNotificaciones = isset($_POST['celularNotificaciones']) ? mysqli_real_escape_string($db, $_POST['celularNotificaciones']) : false;
	$idFamilia = isset($_POST['idFamilia']) ? $_POST['idFamilia'] : false;

	//Para guardar

	$codigoFamilia = isset($_POST['codigoFamilia']) ? $_POST['codigoFamilia'] : false;
	$nombreFamilia = isset($_POST['nombreFamilia']) ? $_POST['nombreFamilia'] : false;

	//validacion
	$errores = array();

	if (empty($emailNotificaciones)) {
		$errores['emailNotificaciones'] = 'El email no es valido';
	}

	if (empty($celularNotificaciones)) {
		$errores['celularNotificaciones'] = 'El celular no es valido';
	}

	if (count($errores) == 0) {
		if (isset($_GET['editar'])) {
			$codigo_familia= $_GET['editar'];
			$sql = "UPDATE familias SET email_familia='$emailNotificaciones',celular_familia='$celularNotificaciones' WHERE id_familia = '$codigo_familia'";
			//$usuario_id = $_SESSION['usuario']['id'];
		}else{
			//guardar en la base
			$sql = "INSERT INTO familias(id_familia, nombre_familia, email_familia, celular_familia, saldo_familia, contrasena_familia) VALUES ('$codigoFamilia','$nombreFamilia','$emailNotificaciones','$celularNotificaciones',0,'1234')";
		}
		$guardar = mysqli_query($db, $sql);
		header("Location: nuevaFamilia.php");
	}else{
		$_SESSION['errores_entradas'] = $errores;
		if(isset($_GET['editar'])){
			header("Location: nuevaFamilia.php?id=".$_GET['editar']);
		}else{
			header("Location: nuevaFamilia.php");
		}
	}
}

?>