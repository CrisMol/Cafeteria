<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$apellidosEstudiante = isset($_POST['apellidosEstudiante']) ? mysqli_real_escape_string($db, $_POST['apellidosEstudiante']) : false;
	$nombreEstudiante = isset($_POST['nombreEstudiante']) ? mysqli_real_escape_string($db, $_POST['nombreEstudiante']) : false;
	$codigoFamilia = isset($_POST['codigoFamilia']) ? $_POST['codigoFamilia'] : false;

	//Para guardar

	$grado = isset($_POST['grado']) ? (int) $_POST['grado'] : false;
	$idEstudiante = isset($_POST['idEstudiante']) ? $_POST['idEstudiante'] : false;

	//validacion
	$errores = array();

	if (empty($apellidosEstudiante)) {
		$errores['emailNotificaciones'] = 'Los apellidos del estudiante no son validos';
	}

	if (empty($nombreEstudiante)) {
		$errores['nombreEstudiante'] = 'El nombre del estudiante no es valido';
	}

	if (count($errores) == 0) {
		$sql = "UPDATE estudiante SET ID_FAM = '$codigoFamilia', APELLIDO_ESTU = '$apellidosEstudiante', ".
			   "NOM_ESTU = '$nombreEstudiante', ID_GRADO = $grado WHERE ID_ESTU = '$idEstudiante';";
		$guardar = mysqli_query($db, $sql);
		header("Location: nuevoEstudiantes.php");
	}else{
		$_SESSION['errores_entradas'] = $errores;
		if(isset($_GET['editar'])){
			header("Location: nuevoEstudiantes.php?id=".$_GET['editar']);
		}else{
			header("Location: nuevoEstudiantes.php");
		}
	}
}

?>