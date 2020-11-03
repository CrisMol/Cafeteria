<?php

if(isset($_POST)){

	require_once 'include/conexion.php';

	$valorPago = isset($_POST['valorPago']) ? (float) $_POST['valorPago'] : false;
	$idProfesor = isset($_POST['idProfesor']) ? mysqli_real_escape_string($db, $_POST['idProfesor']) : false;
	$saldo = isset($_POST['saldo']) ? (float) $_POST['saldo'] : false;
	$saldo_credito = isset($_POST['saldo_credito']) ? (float) $_POST['saldo_credito'] : false;

		//validacion
		$errores = array();

		if (empty($valorPago)) {
			$errores['valorPago'] = 'Valor del Pago no es válido';
		}

		if (count($errores) == 0) {
				$total = $valorPago + $saldo;
				$totalCredito = $saldo_credito - $valorPago;
				$sql = "UPDATE profesores SET saldo_profesor = $total, saldo_credito_profesor = $totalCredito WHERE id_profesor = '$idProfesor';";

			//Almacenar movimiento
			$sql_movimiento = "INSERT INTO movimientos_profesores(id_profesor, descripcion_mov_profesor, fecha_mov_profesor, hora_mov_profesor, cantidad_mov_profesor, debito_mov_profesor, credito_mov_profesor, id_tipo_mov_profesor) VALUES ('$idProfesor','Pago Credito',CURDATE(),CURTIME(),1,0,$valorPago, 1)";

            $guardar = mysqli_query($db, $sql);
            $registrar_recarga = mysqli_query($db, $sql_movimiento);
			header("Location: pagoCredito.php");
		}else{
			$_SESSION['errores'] = $errores;
			if(isset($_GET['editar'])){
				header("Location: pagoCredito.php?id=".$_GET['editar']);
			}else{
				header("Location: pagoCredito.php");
			}
		}
}

?>