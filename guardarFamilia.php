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
			//$usuario_id = $_SESSION['usuario']['id'];
			$sql = "UPDATE familia SET MAIL_FAM = '$emailNotificaciones', CEL_FAM = $celularNotificaciones ".
					"where ID_FAM = $codigo_familia";
		}else{
			//guardar en la base
			$sql = "INSERT INTO familia VALUES('$codigoFamilia','$nombreFamilia', '$emailNotificaciones', '$celularNotificaciones', 0);";
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