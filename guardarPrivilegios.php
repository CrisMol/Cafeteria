<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$idUsuario = isset($_POST['idUsuario']) ? (int) $_POST['idUsuario'] : false;

		//validacion
		$errores = array();

		if (empty($idUsuario)) {
			$errores['idUsuario'] = 'El código del Usuario no es válido';
		}

		if (count($errores) == 0) {
			$sql_usuarios_privilegios = "SELECT id_privilegio FROM usuarios_privilegios WHERE id_usuario = $idUsuario";
			$obtener_usuarios_privilegios = mysqli_query($db, $sql_usuarios_privilegios);
			while ($usuarioPrivilegios = mysqli_fetch_assoc($obtener_usuarios_privilegios)) {
    			$arrUsuariosPrivilegios[] = $usuarioPrivilegios['id_privilegio'];
    		}

			if (!empty($_POST['idOpcion'])) {
				foreach($_POST['idOpcion'] as $selected){
					$idOpcion = $selected;
					$arrPuntosPOST[] = $idOpcion; 
					$sql_privilegio_usuario = "SELECT id_usuario_privilegio FROM usuarios_privilegios WHERE id_privilegio = $idOpcion AND id_usuario = $idUsuario";
					$privilegio_usuario = mysqli_query($db, $sql_privilegio_usuario);
					if (mysqli_num_rows($privilegio_usuario) == 0) {
						$sql = "INSERT INTO usuarios_privilegios(id_privilegio, id_usuario) VALUES($idOpcion, $idUsuario)";
						$guardar = mysqli_query($db, $sql);
					}
				}
				//Eliminar cuando no se chekea
    			foreach ($arrUsuariosPrivilegios as $valor) {
    				if (!in_array($valor, $arrPuntosPOST)) {
    					$sql_eliminar = "DELETE FROM usuarios_privilegios WHERE id_usuario = $idUsuario AND id_privilegio = $valor";
    					$eliminar = mysqli_query($db, $sql_eliminar);
    				}
    			}
    			
			}else{
				if ($arrUsuariosPrivilegios != null) {
					$sql_eliminar = "DELETE FROM usuarios_privilegios WHERE id_usuario = $idUsuario";
					$eliminar = mysqli_query($db, $sql_eliminar);
				}
			}
			header("Location: privilegiosUsuario.php?idUsuario=".$_POST['idUsuario']);
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['idUsuario'])){
				header("Location: privilegiosUsuario.php?id=".$_POST['idUsuario']);
			}else{
				header("Location: privilegiosUsuario.php");
			}
		}
}

?>idPunto