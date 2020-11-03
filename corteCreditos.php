<?php
if(isset($_GET)){


	require_once 'include/conexion.php';
	require_once 'include/helpers.php';

	$fechaCorte = isset($_GET['fechaCorte']) ? mysqli_real_escape_string($db, $_GET['fechaCorte']) : false;
	date_default_timezone_set('America/Lima');
    $fechaEntera = strtotime($fechaCorte);
		$anio = date("Y", $fechaEntera);
		$mes = date("m", $fechaEntera);
		$dia = date("d", $fechaEntera);
		$fechaCorte = $anio . "-" . $mes . "-" .$dia;
		//validacion
		$errores = array();

		if (empty($fechaCorte)) {
			$errores['fechaCorte'] = 'La fecha corte no es válido';
		}

		//Obtener todos los profesores que tengan pago credito
		$profesores = conseguir_profesores($db);
		if(!empty($profesores) && mysqli_num_rows($profesores) >= 1 && count($errores) == 0){
			while ($profesor = mysqli_fetch_assoc($profesores)){
        		if ($profesor['SALDO_CREDITO'] != 0) {
        			$idProfesor = $profesor['CODIGO_PROFESOR'];
        			$saldo_credito = $profesor['SALDO_CREDITO'];
        			$sql = "UPDATE profesores SET saldo_credito_profesor = 0 WHERE id_profesor = '" .$profesor['CODIGO_PROFESOR']. "'";
        			var_dump($sql);
        			//registrar movimiento
        			$sql_movimiento = "INSERT INTO movimientos_profesores(id_profesor, descripcion_mov_profesor, fecha_mov_profesor, hora_mov_profesor, cantidad_mov_profesor, debito_mov_profesor, credito_mov_profesor, id_tipo_mov_profesor) VALUES ('$idProfesor','Corte','$fechaCorte',CURTIME(),1,0, $saldo_credito, 1)";
        			var_dump($sql_movimiento);

        			$guardar = mysqli_query($db, $sql);
            		$registrar_recarga = mysqli_query($db, $sql_movimiento);
					header("Location: creditosProfesores.php?fechaCorte=".$fechaCorte);
        		}
        	}
		}else{
			header("Location: creditosProfesores.php?fechaCorte=".$fechaCorte);
		}

		if (empty($fechaCorte)) {
			$_SESSION['errores'] = $errores;
			$errores['valorPago'] = 'Valor del Pago no es válido';
		}
}

?>