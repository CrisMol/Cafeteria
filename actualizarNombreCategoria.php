<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$idCategoria = isset($_POST['idCategoria']) ? (int) $_POST['idCategoria'] : false;
	$nombreCategoria = isset($_POST['nombreCategoria']) ? mysqli_real_escape_string($db, $_POST['nombreCategoria']) : false;

		//validacion
		$errores = array();

		if (empty($nombreCategoria)) {
			$errores['nombreCategoria'] = 'El nombre de la categoria no es válido';
		}

		if (empty($idCategoria)) {
			$errores['idCategoria'] = 'El código de la categoria no es válido';
		}

		$exito = array();

		if (count($errores) == 0) {
			$sql = "UPDATE categorias_producto SET nombre_categoria='$nombreCategoria' WHERE id_categoria = $idCategoria";
				$exito['exito'] = "Datos Actualizados Correctamente";
            $guardar = mysqli_query($db, $sql);
            $_SESSION['completado'] = $exito;
			header("Location: categoriasProductos.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['numeroPedido'])){
				header("Location: categoriasProductos.php?id=".$_POST['idCategoria']);
			}else{
				header("Location: categoriasProductos.php");
			}
		}
}

?>idPunto