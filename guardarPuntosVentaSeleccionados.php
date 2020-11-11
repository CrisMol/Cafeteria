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
			$sql_puntos_categoria = "SELECT id_punto_venta FROm puntos_categorias WHERE id_categoria = $idCategoria";
			$obtener_puntos_categoria = mysqli_query($db, $sql_puntos_categoria);
			while ($puntosSQL = mysqli_fetch_assoc($obtener_puntos_categoria)) {
    			$arrPuntosSQL[] = $puntosSQL['id_punto_venta'];
    		}

			if (!empty($_POST['idPunto'])) {
				foreach($_POST['idPunto'] as $selected){
					$idPunto = $selected;
					$arrPuntosPOST[] = $idPunto; 
					$sql_categoria_punto = "SELECT id_punto_categoria FROM puntos_categorias WHERE id_punto_venta = $idPunto AND id_categoria = $idCategoria";
					$categoria_punto = mysqli_query($db, $sql_categoria_punto);
					if (mysqli_num_rows($categoria_punto) == 0) {
						$sql = "INSERT INTO puntos_categorias(id_punto_venta, id_categoria) VALUES($idPunto, $idCategoria)";
						$guardar = mysqli_query($db, $sql);
					}
				}
				//Eliminar cuando no se chekea
    			var_dump($arrPuntosSQL);
    			foreach ($arrPuntosSQL as $valor) {
    				if (!in_array($valor, $arrPuntosPOST)) {
    					$sql_eliminar = "DELETE FROM puntos_categorias WHERE id_categoria = $idCategoria AND id_punto_venta = $valor";
    					var_dump($sql_elimina);
    					$eliminar = mysqli_query($db, $sql_eliminar);
    				}
    			}
    			
			}else{
				if ($arrPuntosSQL != null) {
					$sql_eliminar = "DELETE FROM puntos_categorias WHERE id_categoria = $idCategoria";
					$eliminar = mysqli_query($db, $sql_eliminar);
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