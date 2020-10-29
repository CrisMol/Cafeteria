<?php

if(isset($_POST)){

	require_once 'include/conexion.php';
	require_once 'include/helpers.php';

	$apellidosEstudiante = isset($_POST['apellidosEstudiante']) ? mysqli_real_escape_string($db, $_POST['apellidosEstudiante']) : false;
	$nombreEstudiante = isset($_POST['nombreEstudiante']) ? mysqli_real_escape_string($db, $_POST['nombreEstudiante']) : false;
	$codigoFamilia = isset($_POST['codigoFamilia']) ? $_POST['codigoFamilia'] : false;

	//Para guardar

	$grado = isset($_POST['grado']) ? (int) $_POST['grado'] : false;
	$codigoEstudiante = isset($_POST['codigoEstudiante']) ? $_POST['codigoEstudiante'] : false;
	$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : false;

	//Comprobar si existe estudiante
	$existe_usuario = saber_si_existe_estudiante($db, $codigoEstudiante);

	if($existe_usuario > 0){
		$error_estudiante['estudiante'] = 'Ya existe un estudiante con ese código';
		$_SESSION['errores'] = $error_estudiante;
		header("Location: formNuevoEstudiante.php");
	}else{
		//validacion
		$errores = array();

		if (empty($codigoEstudiante)) {
			$errores['codigoEstudiante'] = 'El codigo del estudiante no es valido';
		}

		if (empty($apellidosEstudiante)) {
			$errores['apellidosEstudiante'] = 'Los apellidos del estudiante no son validos';
		}

		if (empty($nombreEstudiante)) {
			$errores['nombreEstudiante'] = 'El nombre del estudiante no es valido';
		}

		if (count($errores) == 0) {
			$sql = "INSERT INTO estudiantes(id_estudiante, id_grado, id_familia, apellidos_estudiante, nombres_estudiante, sexo_estudiante, maximo_compras) VALUES ('$codigoEstudiante',$grado,'$codigoFamilia','$apellidosEstudiante','$nombreEstudiante','$sexo', 'Ilimitado')";
			$guardar = mysqli_query($db, $sql);
			header("Location: nuevoEstudiantes.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['editar'])){
				header("Location: formNuevoEstudiante.php?id=".$_GET['editar']);
			}else{
				header("Location: formNuevoEstudiante.php");
			}
		}
	}
}

?>