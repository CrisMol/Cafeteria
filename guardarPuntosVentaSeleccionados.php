<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$idCategoria = isset($_POST['idCategoria']) ? (int) $_POST['idCategoria'] : false;

		//validacion
		$errores = array();

		if (empty($idCategoria)) {
			$errores['idCategoria'] = 'El código de la categoria no es válido';
		}

		if (count($errores) == 0) {
			if (!empty($_POST['idPunto'])) {
				foreach($_POST['idPunto'] as $selected){
					$idPunto = $selected;
					$sql_categoria_punto = "SELECT id_punto_categoria FROM puntos_categorias WHERE id_punto_venta = $idPunto AND id_categoria = $idCategoria";
					$categoria_punto = mysqli_query($db, $sql_categoria_punto);
					if (mysqli_num_rows($categoria_punto) == 0) {
						$sql = "INSERT INTO puntos_categorias(id_punto_venta, id_categoria) VALUES($idPunto, $idCategoria)";
						$guardar = mysqli_query($db, $sql);
					}
				}
			}
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