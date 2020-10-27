<?php
	function mostrar_error($errores, $campo){
		$alerta = "";
		if (isset($errores[$campo]) && !empty($campo)) {
			$alerta = "<div class='alert alert-danger' role='alert'>".$errores[$campo]."</div>";
		}
		return $alerta;
	}

	//Borrar la sesión

	function borrar_error(){
		$borrado = false;
		if(isset($_SESSION['errores'])){
			$_SESSION['errores'] = null;
			$borrado = true;
		}

		if(isset($_SESSION['errores_entradas'])){
			$_SESSION['errores_entradas'] = null;
			$borrado = true;
		}

		if(isset($_SESSION['completado'])){
			$_SESSION['completado'] = null;
			$borrado = true;
		}

		return $borrado;
	}

	//Conseguir las familias
	function conseguir_familias($conexion){
		$sql = "SELECT ID_FAM AS CODIGO, NOM_FAM AS NOMBRE, MAIL_FAM AS EMAIL, CEL_FAM AS CELULAR, SALDO_FAM AS SALDO FROM familia ORDER BY ID_FAM ASC;";
		$familias = mysqli_query($conexion, $sql);

		$result = array();
		if ($familias && mysqli_num_rows($familias) >=1) {
			$result = $familias;
		}

		return $result;
	}

	//Conseguir los estudianes
	function conseguir_estudiantes($conexion){
		$sql = "SELECT e.ID_ESTU AS CODIGO, e.APELLIDO_ESTU AS APELLIDO, e.NOM_ESTU AS NOMBRE, ".
				"e.ID_FAM AS CODIGO_FAMILIA, g.NOM_GRADO AS GRADO FROM estudiante e ".
				"INNER JOIN grado g ON e.ID_GRADO = g.ID_GRADO;";
		$estudiantes = mysqli_query($conexion, $sql);

		$result = array();
		if ($estudiantes && mysqli_num_rows($estudiantes) >=1) {
			$result = $estudiantes;
		}

		return $result;
	}

	//Conseguir RFID de estudiantes
	function conseguir_rfid($conexion, $codigoEstudiante){
		$sql = "SELECT ID_RFID AS RFID, ID_ESTU, ESTADO_RFID AS ESTADO_REFID FROM rfid WHERE ID_ESTU = $codigoEstudiante";
		$estudiantes_rfid = mysqli_query($conexion, $sql);
		$result = array();
		if ($estudiantes_rfid && mysqli_num_rows($estudiantes_rfid) >=1) {
			$result = $estudiantes_rfid;
		}

		return $result;
	}

	//Conseguir Codigos Familias
	function conseguir_codigos_familias($conexion){
		$sql = "SELECT ID_FAM AS CODIGO_FAMILIA FROM familia ORDER BY ID_FAM ASC;";
		$codigos_familia = mysqli_query($conexion, $sql);

		$result = array();
		if ($codigos_familia && mysqli_num_rows($codigos_familia) >=1) {
			$result = $codigos_familia;
		}

		return $result;
	}

	//Conseguir Grados
	function conseguir_grados($conexion){
		$sql = "SELECT ID_GRADO AS CODIGO_GRADO, NOM_GRADO AS NOMBRE_GRADO FROM `grado` ORDER BY NOM_GRADO ASC;";
		$grados = mysqli_query($conexion, $sql);

		$result = array();
		if ($grados && mysqli_num_rows($grados) >=1) {
			$result = $grados;
		}

		return $result;
	}

	//Saber si existe
	function saber_si_existe_estudiante($conexion, $codigo){
		$sql = "SELECT ID_ESTU FROM estudiante WHERE ID_ESTU = '$codigo'";
		$existe = mysqli_query($conexion, $sql);
		return $count = mysqli_num_rows($existe);
	}

	//Saber si existe codigo de barras
	function saber_si_existe_codigo_barras($conexion, $codigo){
		$sql = "SELECT COD_BARRA FROM producto WHERE COD_BARRA = '$codigo'";
		$existe = mysqli_query($conexion, $sql);
		return $count = mysqli_num_rows($existe);
	}

	//Saber si existe codigo de barras
	function saber_si_existe_grado($conexion, $grado){
		$sql = "SELECT NOM_GRADO FROM grado WHERE NOM_GRADO = '$grado'";
		$existe = mysqli_query($conexion, $sql);
		return $count = mysqli_num_rows($existe);
	}

	//Conseguir familias y estudiantes
	function conseguir_miembros($conexion, $codigoFamilia){
		$sql = "SELECT NOM_ESTU AS NOMBRE_ESTUDIANTE, APELLIDO_ESTU AS APPELIDO_ESTUDIANTE, ID_ESTU AS ". 
			   "CODIGO_ESTUDIANTE FROM estudiante WHERE ID_FAM = '$codigoFamilia'";
		$miembros = mysqli_query($conexion, $sql);

		$result = array();
		if ($miembros && mysqli_num_rows($miembros) >=1) {
			$result = $miembros;
		}

		return $result;
	}

	//Conseguir Profesores
	function conseguir_profesores($conexion){
		$sql = "SELECT ID_PROF AS CODIGO_PROFESOR, APELLIDO_PROF AS APELLIDOS_PROFESOR, NOM_PROF AS NOMBRE_PROFESOR, CEL_PROF AS CELULAR, ".
			   "SALDO_PROF AS SALDO_PROFESOR, CREDI_PROF AS CREDITO, MAIL_PROF AS EMAIL FROM profesor ".
			   "ORDER BY ID_PROF ASC;";
		$profesores = mysqli_query($conexion, $sql);

		$result = array();
		if ($profesores && mysqli_num_rows($profesores) >=1) {
			$result = $profesores;
		}

		return $result;
	}

	//Conseguir RFID de profesores
	function conseguir_rfid_profesor($conexion, $codigoProfesor){
		$sql = "SELECT ID_RFID AS RFID, ID_PROF, ESTADO_RFID AS ESTADO_REFID FROM rfid_profesor WHERE ID_PROF = $codigoProfesor";
		$profesores_rfid = mysqli_query($conexion, $sql);
		$result = array();
		if ($profesores_rfid && mysqli_num_rows($profesores_rfid) >=1) {
			$result = $profesores_rfid;
		}

		return $result;
	}

	//Conseguir Profesores por código
	function conseguir_profesores_por_codigo($conexion, $codigo){
		$sql = "SELECT ID_PROF AS CODIGO_PROFESOR, APELLIDO_PROF AS APELLIDOS_PROFESOR, NOM_PROF AS NOMBRE_PROFESOR, CEL_PROF AS CELULAR, ".
			   "SALDO_PROF AS SALDO_PROFESOR, CREDI_PROF AS CREDITO, MAIL_PROF AS EMAIL FROM profesor ".
			   "WHERE ID_PROF = '$codigo'";
		$profesor = mysqli_query($conexion, $sql);

		$result = array();
		if ($profesor && mysqli_num_rows($profesor) >=1) {
			$result = $profesor;
		}

		return $result;
	}

	//Conseguir Movimientos Pagos de Credito
	function conseguir_pagos_credito($conexion, $codigo){
		$sql = "SELECT ID_PAG_CRED AS CODIGO, FECHA_PAG_CRED AS FECHA, HORA_PAG_CRED AS HORA, ".
			   "VALOR_CRED AS CREDITO, VALOR_DEB AS DEBITO FROM pago_credito ".
			   "WHERE ID_PROF = $codigo";
		$pago_credito = mysqli_query($conexion, $sql);

		$result = array();
		if ($pago_credito && mysqli_num_rows($pago_credito) >=1) {
			$result = $pago_credito;
		}

		return $result;
	}

	//Conseguir Categorías Productos
	function conseguir_categoria_producto($conexion){
		$sql = "SELECT ID_CATEPROD AS CODIGO_CATEGORIA, NOM_CATEPROD AS NOMBRE_CATEGORIA FROM catego_prod ORDER BY ID_CATEPROD ASC;";
		$categorias = mysqli_query($conexion, $sql);

		$result = array();
		if ($categorias && mysqli_num_rows($categorias) >=1) {
			$result = $categorias;
		}

		return $result;
	}

	//Conseguir Productos
	function conseguir_productos($conexion, $codigoProducto = null){
		if ($codigoProducto != null) {
			$sql = "SELECT ID_PRODUCTO AS CODIGO_PRODUCTO, CLAVE_AUTORIZACION_PROD AS CLAVE_AUTORIZACION, CANTIDAD_PROD AS CANTIDAD_PRODUCTO FROM producto WHERE ".
				   "ID_PRODUCTO = '$codigoProducto'";
		}else{
			$sql = "SELECT p.ID_PRODUCTO AS CODIGO_PRODUCTO, c.NOM_CATEPROD AS CATEGORIA_PRODUCTO, COD_PTOVENTA AS CODIGO_PUNTO, ".
				"ID_TIPO_PROD AS TIPO_PRODUCTO, COD_BARRA AS CODIGO_BARRA, DESC_PROD AS DESCRIPCION, COSTO_PROD AS COSTO, ".
				"PRECIO_VENTA AS PRECIO, ESTADO_INVE AS ESTADO_INVENTARIO, ESTADO_PRECO AS ESTADO_PRECOMPRA, DESC_ADIC AS DESCRIPCION_ADICIONAL, CANTIDAD_PROD AS CANTIDAD_PRODUCTO FROM ".
				"producto p INNER JOIN catego_prod c ON c.ID_CATEPROD = p.ID_CATEPROD ";
		}
		
		$productos = mysqli_query($conexion, $sql);

		$result = array();
		if ($productos && mysqli_num_rows($productos) >=1) {
			$result = $productos;
		}

		return $result;
	}

	//Conseguir Movimientos Productos
	function conseguir_movimientos_productos($conexion, $codigoProducto){
		$sql = "SELECT ID_PRODUCTO AS CODIGO_PRODUCTO FROM movimiento_producto WHERE ID_PRODUCTO = $codigoProducto";
		$movimientos = mysqli_query($conexion, $sql);

		$result = array();
		if ($movimientos && mysqli_num_rows($movimientos) >=1) {
			$result = $movimientos;
		}

		return $result;
	}

	//Conseguir productos por categoria
	function conseguir_productos_por_categoria($conexion, $categoria){
		$sql = "SELECT ID_PRODUCTO AS CODIGO_PRODUCTO, DESC_PROD AS DESCRIPCION_PRODUCTO FROM `producto` WHERE ID_CATEPROD = $categoria";
		$productos = mysqli_query($conexion, $sql);

		$result = array();
		if ($productos && mysqli_num_rows($productos) >=1) {
			$result = $productos;
		}

		return $result;
	}

	//Conseguir las ultimas entradas
	function conseguir_entradas($conexion, $limit = null, $categoria = null, $busqueda = null){
		$sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
				"INNER JOIN categorias c ON e.categoria_id = c.id ";

		if (!empty($categoria)) {
			$sql .= "WHERE e.categoria_id = $categoria ";
		}

		if (!empty($busqueda)) {
			$sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
		}

		$sql .= "ORDER BY e.id DESC ";

		if ($limit) {
			$sql .= "LIMIT 4";
		}

		$entradas = mysqli_query($conexion, $sql);

		$result = array();
		if ($entradas && mysqli_num_rows($entradas) >= 1) {
			$result = $entradas;
		}
		return $entradas;
	}

	//Conseguir una categoria
	function conseguir_categoria($conexion, $id){
		$sql = "SELECT *FROM categorias where id = $id;";
		$categorias = mysqli_query($conexion, $sql);

		$result = array();
		if ($categorias && mysqli_num_rows($categorias) >=1) {
			$result = mysqli_fetch_assoc($categorias);
		}

		return $result;
	}
	//Conseguir una entrada
	function conseguir_entrada($conexion, $id){
		$sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ' ,u.apellidos) AS 'usuario' FROM entradas e".
				" INNER JOIN categorias c ON e.categoria_id = c.id ".
				" INNER JOIN usuarios u ON e.usuario_id = u.id ".
				"WHERE e.id = $id";
		$entrada = mysqli_query($conexion, $sql);

		$resultado = array();
		if ($entrada && mysqli_num_rows($entrada) >= 1) {
			$resultado = mysqli_fetch_assoc($entrada);
		}

		return $resultado;
	}
?>