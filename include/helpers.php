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

	//Conseguir cajeros
	function conseguir_cajeros($conexion){
		$sql = "SELECT c.id_usuario AS CODIGO_USUARIO, u.nombre_usuario AS USUARIO FROM cajeros c INNER JOIN usuarios u ON c.id_usuario = u.id_usuario GROUP BY c.id_usuario ORDER BY u.nombre_usuario ASC";
		$cajeros = mysqli_query($conexion, $sql);

		$result = array();
		if ($cajeros && mysqli_num_rows($cajeros) >=1) {
			$result = $cajeros;
		}

		return $result;
	}

	//Conseguir las familias
	function conseguir_familias($conexion){
		$sql = "SELECT id_familia AS CODIGO, nombre_familia AS NOMBRE, email_familia AS EMAIL, celular_familia AS CELULAR, saldo_familia AS SALDO, contrasena_familia AS CONRASENA FROM familias ORDER BY id_familia ASC";
		$familias = mysqli_query($conexion, $sql);

		$result = array();
		if ($familias && mysqli_num_rows($familias) >=1) {
			$result = $familias;
		}

		return $result;
	}

	//Conseguir los estudianes
	function conseguir_estudiantes($conexion, $codigoEstudiante = null){
		$sql = "SELECT e.id_estudiante AS CODIGO, g.nombre_grado AS GRADO, e.id_familia AS CODIGO_FAMILIA, e.apellidos_estudiante AS APELLIDO, e.nombres_estudiante AS NOMBRE, sexo_estudiante, maximo_compras FROM estudiantes e INNER JOIN grados g ON e.id_grado = g.id_grado";
		if ($codigoEstudiante != null) {
			$sql .= " WHERE e.id_estudiante = '$codigoEstudiante'";
		}

		$estudiantes = mysqli_query($conexion, $sql);

		$result = array();
		if ($estudiantes && mysqli_num_rows($estudiantes) >=1) {
			$result = $estudiantes;
		}

		return $result;
	}

	//Conseguir movimientos estudiante
	function conseguir_movimientos_estudiante($conexion, $codigoEstudiante){
		$sql = "SELECT id_mov_estudiante AS CODIGO_MOVIMIENTO, id_estudiante AS CODIGO_ESTUDIANTE, descripcion_mov_estudiante AS DESCRIPCION_MOVIMIENTO, fecha_mov_estudiante AS FECHA_MOVIMIENTO, hora_mov_estudiante AS HORA_MOVIMIENTO, credito_mov_estudiante AS CREDITO_MOVIMIENTO, debito_mov_estudiante AS DEBITO_MOVIMIENTO, cantidad_mov_estudiante AS CANTIDAD_MOVIMIENTO FROM movimientos_estudiantes WHERE id_estudiante = '$codigoEstudiante'";
		$movimientos = mysqli_query($conexion, $sql);

		$result = array();
		if ($movimientos && mysqli_num_rows($movimientos) >=1) {
			$result = $movimientos;
		}

		return $result;
	}


	//Conseguir familias y estudiantes
	function conseguir_miembros($conexion, $codigoFamilia){
		$sql = "SELECT nombres_estudiante AS NOMBRE_ESTUDIANTE, apellidos_estudiante AS APPELIDO_ESTUDIANTE, id_estudiante AS CODIGO_ESTUDIANTE FROM estudiantes WHERE id_familia = '$codigoFamilia'";
		$miembros = mysqli_query($conexion, $sql);

		$result = array();
		if ($miembros && mysqli_num_rows($miembros) >=1) {
			$result = $miembros;
		}

		return $result;
	}

	//Conseguir RFID de estudiantes
	function conseguir_rfid($conexion, $codigoEstudiante){
		$sql = "SELECT id_rfid_estudiante AS RFID, id_estudiante, estado_rfid_estudiante AS ESTADO_REFID FROM rfid_estudiantes WHERE id_estudiante = '$codigoEstudiante'";
		$estudiantes_rfid = mysqli_query($conexion, $sql);
		$result = array();
		if ($estudiantes_rfid && mysqli_num_rows($estudiantes_rfid) >=1) {
			$result = $estudiantes_rfid;
		}

		return $result;
	}

	//Conseguir Codigos Familias
	function conseguir_codigos_familias($conexion){
		$sql = "SELECT id_familia AS CODIGO_FAMILIA FROM familias ORDER BY id_familia ASC;";
		$codigos_familia = mysqli_query($conexion, $sql);

		$result = array();
		if ($codigos_familia && mysqli_num_rows($codigos_familia) >=1) {
			$result = $codigos_familia;
		}

		return $result;
	}

	//Conseguir Grados
	function conseguir_grados($conexion){
		$sql = "SELECT id_grado AS CODIGO_GRADO, nombre_grado AS NOMBRE_GRADO FROM grados ORDER BY id_grado ASC;";
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
		$sql = "SELECT codigo_barras_producto FROM productos WHERE codigo_barras_producto = '$codigo'";
		$existe = mysqli_query($conexion, $sql);
		return $count = mysqli_num_rows($existe);
	}

	//Saber si existe codigo de barras
	function saber_si_existe_grado($conexion, $grado){
		$sql = "SELECT NOM_GRADO FROM grado WHERE NOM_GRADO = '$grado'";
		$existe = mysqli_query($conexion, $sql);
		return $count = mysqli_num_rows($existe);
	}

	//Conseguir Profesores
	function conseguir_profesores($conexion){
		$sql = "SELECT id_profesor AS CODIGO_PROFESOR, apellidos_profesor AS APELLIDOS_PROFESOR, nombres_profesor AS NOMBRE_PROFESOR, email_profesor AS EMAIL_PROFESOR, credito_profesor AS CREDITO, debito_profesor, contrasena_profesor, saldo_profesor AS SALDO_PROFESOR, celular_profesor AS CELULAR, saldo_credito_profesor AS SALDO_CREDITO FROM profesores ORDER BY id_profesor ASC";
		$profesores = mysqli_query($conexion, $sql);

		$result = array();
		if ($profesores && mysqli_num_rows($profesores) >=1) {
			$result = $profesores;
		}

		return $result;
	}

	//Conseguir Profesores por código
	function conseguir_profesores_por_codigo($conexion, $codigo){
		$sql = "SELECT id_profesor AS CODIGO_PROFESOR, apellidos_profesor AS APELLIDOS_PROFESOR, nombres_profesor AS NOMBRE_PROFESOR, celular_profesor AS CELULAR, saldo_profesor AS SALDO_PROFESOR, saldo_credito_profesor AS CREDITO, email_profesor AS EMAIL FROM profesores ".
			   "WHERE id_profesor = '$codigo'";
		$profesor = mysqli_query($conexion, $sql);

		$result = array();
		if ($profesor && mysqli_num_rows($profesor) >=1) {
			$result = $profesor;
		}

		return $result;
	}

	//Conseguir RFID de profesores
	function conseguir_rfid_profesor($conexion, $codigoProfesor){
		$sql = "SELECT id_rfid_profesor AS RFID, id_profesor, estado_rfid_profesor AS ESTADO_RFID FROM rfid_profesores WHERE id_profesor = '$codigoProfesor'";
		$profesores_rfid = mysqli_query($conexion, $sql);
		$result = array();
		if ($profesores_rfid && mysqli_num_rows($profesores_rfid) >=1) {
			$result = $profesores_rfid;
		}

		return $result;
	}

	//Conseguir movimientos profesor
	function conseguir_movimientos_profesor($conexion, $codigoProfesor){
		$sql = "SELECT id_mov_profesor AS CODIGO_MOVIMIENTO, id_profesor AS CODIGO_PROFESOR, descripcion_mov_profesor AS DESCRIPCION_MOVIMIENTO, fecha_mov_profesor AS FECHA_MOVIMIENTO, hora_mov_profesor AS HORA_MOVIMIENTO, credito_mov_profesor AS CREDITO_MOVIMIENTO, debito_mov_profesor AS DEBITO_MOVIMIENTO, cantidad_mov_profesor AS CANTIDAD_MOVIMIENTO, saldo_credito_profesor AS SALDO_CREDITO FROM movimientos_profesores WHERE id_profesor = '$codigoProfesor'";
		var_dump($sql);
		$movimientos = mysqli_query($conexion, $sql);

		$result = array();
		if ($movimientos && mysqli_num_rows($movimientos) >=1) {
			$result = $movimientos;
		}

		return $result;
	}

	//Conseguir Categorías Productos
	function conseguir_categoria_producto($conexion){
		$sql = "SELECT id_categoria AS CODIGO_CATEGORIA, nombre_categoria AS NOMBRE_CATEGORIA FROM categorias_producto ORDER BY nombre_categoria ASC";
		$categorias = mysqli_query($conexion, $sql);

		$result = array();
		if ($categorias && mysqli_num_rows($categorias) >=1) {
			$result = $categorias;
		}

		return $result;
	}

	//Conseguir Productos
	function conseguir_productos($conexion, $codigoProducto = null, $codigoCategoria = null){
		if ($codigoProducto != null) {
			$sql = "SELECT id_producto AS CODIGO_PRODUCTO, c.codigo_clave_autorizacion AS CLAVE_AUTORIZACION, cantidad_producto AS CANTIDAD_PRODUCTO FROM productos p INNER JOIN claves_autorizacion c ON p.id_clave_autorizacion = c.id_clave_autorizacion WHERE id_producto = '$codigoProducto'";
		}else{
			if ($codigoCategoria != null) {
				$sql = "SELECT id_producto AS CODIGO_PRODUCTO, descripcion_producto AS DESCRIPCION_PRODUCTO FROM productos WHERE id_categoria = $codigoCategoria ORDER BY id_producto ASC";
			}else{
				$sql = "SELECT p.id_producto AS CODIGO_PRODUCTO, c.codigo_clave_autorizacion AS CLAVE_AUTORIZACION, ca.nombre_categoria AS CATEGORIA_PRODUCTO, p.codigo_barras_producto CODIGO_BARRA, p.titulo_producto DESCRIPCION, p.descripcion_producto DESCRIPCION_ADICIONAL, p.costo_producto AS COSTO, p.precio_venta_producto AS PRECIO, p.cantidad_producto AS CANTIDAD_PRODUCTO, p.disponibilidad_inventario AS ESTADO_INVENTARIO, p.disponibilidad_precompra AS ESTADO_PRECOMPRA FROM productos p INNER JOIN claves_autorizacion c ON p.id_clave_autorizacion = c.id_clave_autorizacion INNER JOIN categorias_producto ca ON p.id_categoria = ca.id_categoria";
			}
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
		$sql = "SELECT id_mov_producto AS CODIGO_MOVIMIENTO, id_producto AS CODIGO_PRODUCTO, descripcion_mov_producto 	AS DESCRIPCION, fecha_mov_producto AS FECHA, hora_mov_producto AS HORA, entrada_mov_producto AS ENTRADA, salida_mov_producto AS SALIDA, saldo_mov_producto AS SALDO, u.alias_usuario AS USUARIO FROM movimientos_productos mp INNER JOIN usuarios u ON mp.id_usuario = u.id_usuario WHERE id_producto = $codigoProducto";
		$movimientos = mysqli_query($conexion, $sql);

		$result = array();
		if ($movimientos && mysqli_num_rows($movimientos) >=1) {
			$result = $movimientos;
		}

		return $result;
	}

	//Conseguir proveedores
	function conseguir_proveedores($conexion, $codigoProveedor = null){
		if ($codigoProveedor != null) {
			$sql = "SELECT id_proveedor AS CODIGO_PROVEEDOR, nombre_proveedor AS NOMBRE, vendedor_proveedor AS VENDEDOR, telefono_proveedor AS TELEFONO, email_proveedor AS EMAIL, codigo_proveedor AS CODIGO FROM proveedores WHERE $id_proveedor = $codigoProveedor";
		}else{
			$sql = "SELECT id_proveedor AS CODIGO_PROVEEDOR, nombre_proveedor AS NOMBRE, vendedor_proveedor AS VENDEDOR, telefono_proveedor AS TELEFONO, email_proveedor AS EMAIL, codigo_proveedor AS CODIGO FROM proveedores";
		}

		$proveedores = mysqli_query($conexion, $sql);

		$result = array();
		if ($proveedores && mysqli_num_rows($proveedores) >=1) {
			$result = $proveedores;
		}

		return $result;
	}

	//Conseguir pagos proveedores
	function conseguir_pagos_proveedor($conexion, $idProveedor){
		$sql = "SELECT id_pago_proveedor, id_usuario, id_proveedor, valor_pago FROM pagos_proveedor WHERE id_proveedor = $idProveedor";
		$movimientos = mysqli_query($conexion, $sql);

		$result = array();
		if ($movimientos && mysqli_num_rows($movimientos) >=1) {
			$result = $movimientos;
		}

		return $result;
	}

	//Conseguir pagos a proveedores por usuario
	function conseguir_pagos_proveedor_por_usuario($conexion, $idUsuario, $fechaInforme){
		$sql = "SELECT id_pago_proveedor, id_usuario AS USUARIO, id_proveedor AS PROVEEDOR, SUM(valor_pago) AS VALOR FROM pagos_proveedor WHERE id_usuario = $idUsuario AND fecha_pago = '$fechaInforme' GROUP BY id_usuario";
		$pagos_por_usuario = mysqli_query($conexion, $sql);

		$result = array();
		if ($pagos_por_usuario && mysqli_num_rows($pagos_por_usuario) >=1) {
			$result = $pagos_por_usuario;
		}

		return $result;
	}

	//Conseguir compras_proveedor
	function conseguir_compras_proveedor($conexion, $codigoProveedor = null){

		$sql = "SELECT id_compra_proveedor AS CODIGO, cp.id_proveedor AS ID_PROVEEDOR, pr.codigo_proveedor AS IDENTIFICACION, pr.nombre_proveedor AS NOMBRE_PROVEEDOR, precio_compra AS COSTO, cantidad_compra AS CANTIDAD, fecha_compra AS FECHA, hora_compra AS HORA, p.titulo_producto AS DESCRIPCION_PRODUCTO FROM compras_proveedor cp INNER JOIN productos p ON cp.id_producto = p.id_producto INNER JOIN proveedores pr ON cp.id_proveedor = pr.id_proveedor ORDER BY fecha_compra DESC";

		if ($codigoProveedor != null) {
			$sql .= "WHERE cp.id_proveedor = $codigoProveedor";
		}

		$compras_proveedor = mysqli_query($conexion, $sql);

		$result = array();
		if ($compras_proveedor && mysqli_num_rows($compras_proveedor) >=1) {
			$result = $compras_proveedor;
		}

		return $result;
	}

	//Conaguir productos_compras_proveedor
	function conseguir_productos_compra_proveedor($conexion, $codigoProveedor, $fechaCompra){
		$sql = "SELECT id_compra_proveedor AS CODIGO, id_proveedor, precio_compra AS COSTO, cantidad_compra AS CANTIDAD, p.titulo_producto AS DESCRIPCION_PRODUCTO, p.id_producto AS CODIGO_PRODUCTO, precio_compra AS COSTO, cantidad_compra AS CANTIDAD FROM compras_proveedor cp INNER JOIN productos p ON cp.id_producto = p.id_producto WHERE cp.id_proveedor = $codigoProveedor AND fecha_compra = '$fechaCompra'";
		$compras_proveedor = mysqli_query($conexion, $sql);

		$result = array();
		if ($compras_proveedor && mysqli_num_rows($compras_proveedor) >=1) {
			$result = $compras_proveedor;
		}

		return $result;
	}

	//Conseguir puntos de venta
	function conseguir_puntos_venta($conexion){
		$sql = "SELECT id_punto_venta AS CODIGO, nombre_punto_venta AS NOMBRE_PUNTO FROM puntos_venta ORDER BY nombre_punto_venta ASC";
		$puntos_venta = mysqli_query($conexion, $sql);

		$result = array();
		if ($puntos_venta && mysqli_num_rows($puntos_venta) >=1) {
			$result = $puntos_venta;
		}

		return $result;
	}

	//Conseguir ventas por punto de vente
	function ventas_por_punto($conexion, $idPuntoVenta, $fechaVenta, $tipoVenta){
		$sql = "SELECT SUM(total_venta) AS TOTAL_VENTA FROM ventas v INNER JOIN cajeros c ON v.id_cajero = c.id_cajero INNER JOIN tipos_venta tv ON v.id_tipo_venta = tv.id_tipo_venta WHERE c.id_punto_venta = $idPuntoVenta AND fecha_venta = '$fechaVenta' AND tv.nombre_tipo_venta = '$tipoVenta';";
		$ventas_punto = mysqli_query($conexion, $sql);
		$result = array();
		if ($ventas_punto && mysqli_num_rows($ventas_punto) >=1) {
			$result = $ventas_punto;
		}

		return $result;
	}

	//Conseguir ventas por fecha y Tipo de venta
	function ventas_por_fecha($conexion, $fechaInicio, $fechaFinal, $tipoVenta){
		$sql = "SELECT SUM(total_venta) AS TOTAL FROM ventas WHERE fecha_venta BETWEEN '$fechaInicio' AND '$fechaFinal' AND id_tipo_venta = $tipoVenta";
		$ventas_fecha = mysqli_query($conexion, $sql);
		$result = array();
		if ($ventas_fecha && mysqli_num_rows($ventas_fecha) >=1) {
			$result = $ventas_fecha;
		}

		return $result;
	}

	//Conseguir productos vendidos por fecha
	function conseguir_productos_vendidos_por_fecha($conexion, $fechaInicio, $fechaFinal){
		$sql = "SELECT p.titulo_producto AS PRODUCTO, SUM(cantidad_venta) AS CANTIDAD, SUM(total_venta) AS TOTAL FROM ventas v INNER JOIN productos p ON v.id_producto = p.id_producto WHERE fecha_venta BETWEEN '$fechaInicio' AND '$fechaFinal' GROUP BY v.id_producto";
		$productos_vendidos = mysqli_query($conexion, $sql);
		$result = array();
		if ($productos_vendidos && mysqli_num_rows($productos_vendidos) >=1) {
			$result = $productos_vendidos;
		}

		return $result;
	}

	//Conseguir productos por venta
	function conseguir_productos_por_venta($conexion, $idPuntoVenta, $fechaVenta, $tipoVenta = null){
		$sql = "SELECT p.id_producto AS CODIGO_PRODUCTO, p.titulo_producto, SUM(v.cantidad_venta) AS CANTIDAD, SUM(v.total_venta) AS TOTAL FROM ventas v INNER JOIN productos p ON v.id_producto = p.id_producto INNER JOIN cajeros c ON v.id_cajero = c.id_cajero WHERE fecha_venta = '$fechaVenta' AND c.id_punto_venta = $idPuntoVenta AND v.id_tipo_venta != 2 GROUP BY v.id_producto";
		if ($tipoVenta != null) {
			$sql = "SELECT p.id_producto AS CODIGO_PRODUCTO, p.titulo_producto, SUM(v.cantidad_venta) AS CANTIDAD, SUM(v.total_venta) AS TOTAL FROM ventas v INNER JOIN productos p ON v.id_producto = p.id_producto INNER JOIN cajeros c ON v.id_cajero = c.id_cajero WHERE fecha_venta = '$fechaVenta' AND v.id_tipo_venta = $tipoVenta GROUP BY v.id_producto";
			/*$sql = "SELECT p.id_producto AS CODIGO_PRODUCTO, p.titulo_producto, v.cantidad_venta AS CANTIDAD, v.total_venta AS TOTAL FROM ventas v INNER JOIN productos p ON v.id_producto = p.id_producto INNER JOIN cajeros c ON v.id_cajero = c.id_cajero WHERE v.id_tipo_venta = $tipoVenta";*/
		}
		$productos_venta = mysqli_query($conexion, $sql);
		$result = array();
		if ($productos_venta && mysqli_num_rows($productos_venta) >=1) {
			$result = $productos_venta;
		}

		return $result;
	}

	//Conseguir ventas de caja por efectivo
	function conseguir_ventas_efectivo_por_caja($conexion, $fechaVenta){
		$sql = "SELECT pv.nombre_punto_venta AS PUNTO_VENTA, u.alias_usuario AS USUARIO, c.nombre_cajero AS CAJERO, SUM(v.total_venta) AS TOTAL, v.id_cajero AS CODIGO_CAJERO FROM ventas v INNER JOIN cajeros c ON v.id_cajero = c.id_cajero INNER JOIN puntos_venta pv ON c.id_punto_venta = pv.id_punto_venta INNER JOIN usuarios u ON c.id_usuario = u.id_usuario WHERE v.id_tipo_venta = 1 AND v.fecha_venta = '$fechaVenta' GROUP BY(v.id_cajero)";
		$ventas_efectivo_por_cajas = mysqli_query($conexion, $sql);
		$result = array();
		if ($ventas_efectivo_por_cajas && mysqli_num_rows($ventas_efectivo_por_cajas) >=1) {
			$result = $ventas_efectivo_por_cajas;
		}

		return $result;
	}

	//Conseguir ventas del dìa por Clientes
	function conseguir_ventas_efectivo_por_cliente($conexion, $fechaVenta, $idCliente = null, $tipoVenta = null){
		if ($idCliente != null) {
			$sql = "SELECT SUM(total_venta) AS TOTAL FROM ventas WHERE id_tipo_cliente = $idCliente AND fecha_venta = '$fechaVenta' AND id_tipo_venta != 2";
		}else{
			if ($tipoVenta != null) {
				$sql = "SELECT SUM(total_venta) AS TOTAL FROM ventas WHERE id_tipo_venta = $tipoVenta AND fecha_venta = '$fechaVenta'";
			}else{
				$sql = "SELECT SUM(total_venta) AS TOTAL FROM ventas WHERE fecha_venta = '$fechaVenta' AND id_tipo_venta != 2";
			}
		}
		$ventas_efectivo_por_clientes = mysqli_query($conexion, $sql);
		$result = array();
		if ($ventas_efectivo_por_clientes && mysqli_num_rows($ventas_efectivo_por_clientes) >=1) {
			$result = $ventas_efectivo_por_clientes;
		}

		return $result;
	}

	//Conseguir datos de las ventas realizadas por dia
	function ventas_por_dia($conexion, $fechaVenta){
		$sql = "SELECT v.hora_venta AS HORA, v.numero_pedido AS PEDIDO, pv.nombre_punto_venta AS PUNTO_VENTA, c.nombre_cajero AS CAJERO, tp.nombre_tipo_venta AS TIPO_VENTA, SUM(v.total_venta) AS VALOR FROM ventas v INNER JOIN tipos_venta tp ON v.id_tipo_venta = tp.id_tipo_venta INNER JOIN cajeros c ON v.id_cajero = c.id_cajero INNER JOIN puntos_venta pv ON c.id_punto_venta = pv.id_punto_venta WHERE fecha_venta = '$fechaVenta' AND v.id_tipo_venta != 2 GROUP BY numero_pedido";
		$ventas_por_dia = mysqli_query($conexion, $sql);
		$result = array();
		if ($ventas_por_dia && mysqli_num_rows($ventas_por_dia) >=1) {
			$result = $ventas_por_dia;
		}

		return $result;
	}

	//Conseguir transacciones por caja
	function conseguir_transacciones_por_caja($conexion, $fechaVenta, $idCajero){
		$sql = "SELECT COUNT(Total) AS TRANSACCIONES FROM(SELECT numero_pedido, COUNT(*) Total FROM ventas WHERE id_cajero = $idCajero AND id_tipo_venta = 1 AND fecha_venta = '$fechaVenta' GROUP BY numero_pedido) AS SUB";
		$conseguir_transacciones_por_caja = mysqli_query($conexion, $sql);
		$result = array();
		if ($conseguir_transacciones_por_caja && mysqli_num_rows($conseguir_transacciones_por_caja) >=1) {
			$result = $conseguir_transacciones_por_caja;
		}

		return $result;
	}

	//Conseguir pagos a proveedores por cajas
	function conseguir_pagos_proveedor_por_caja($conexion, $fechaPago){
		$sql = "SELECT pv.id_usuario AS CODIGO_USUARIO, u.alias_usuario AS ALIAS, u.nombre_usuario AS USUARIO, SUM(pv.valor_pago) AS TOTAL,  COUNT( * ) AS TRANSACCIONES FROM pagos_proveedor pv INNER JOIN usuarios u ON pv.id_usuario = u.id_usuario WHERE fecha_pago = '$fechaPago' GROUP BY pv.id_usuario";
		//$sql = "SELECT p.nombre_punto_venta AS PUNTO_VENTA, u.alias_usuario AS ALIAS_USUARIO, c.nombre_cajero AS CAJERO, COUNT(*)AS TRANSACCIONES, SUM(valor_pago) AS TOTAL FROM pagos_proveedor pv INNER JOIN usuarios u ON pv.id_usuario = u.id_usuario INNER JOIN cajeros c ON pv.id_usuario = c.id_usuario INNER JOIN puntos_venta p ON c.id_punto_venta = p.id_punto_venta WHERE pv.fecha_pago = '$fechaPago' GROUP BY(pv.id_usuario)";
		$pagos_proveedor_por_cajas = mysqli_query($conexion, $sql);
		$result = array();
		if ($pagos_proveedor_por_cajas && mysqli_num_rows($pagos_proveedor_por_cajas) >=1) {
			$result = $pagos_proveedor_por_cajas;
		}

		return $result;
	}

	//Conseguir datos de cajeros
	function conseguir_puntos_por_cajero($conexion,$idUsuario){
		$sql = "SELECT p.nombre_punto_venta AS NOMBRE FROM cajeros c INNER JOIN puntos_venta p ON c.id_punto_venta = p.id_punto_venta WHERE id_usuario =$idUsuario";
		//$sql = "SELECT p.nombre_punto_venta AS PUNTO_VENTA, u.alias_usuario AS ALIAS_USUARIO, c.nombre_cajero AS CAJERO, COUNT(*)AS TRANSACCIONES, SUM(valor_pago) AS TOTAL FROM pagos_proveedor pv INNER JOIN usuarios u ON pv.id_usuario = u.id_usuario INNER JOIN cajeros c ON pv.id_usuario = c.id_usuario INNER JOIN puntos_venta p ON c.id_punto_venta = p.id_punto_venta WHERE pv.fecha_pago = '$fechaPago' GROUP BY(pv.id_usuario)";
		$punto_venta = mysqli_query($conexion, $sql);
		$result = array();
		if ($punto_venta && mysqli_num_rows($punto_venta) >=1) {
			$result = $punto_venta;
		}

		return $result;
	}
	//Conseguir ventas efectivo por cajero y fecha
	function conseguir_ventas_efectivo_por_cajero($conexion, $idUsuario, $fechaVenta){
		$sql = "SELECT SUM(v.total_venta) AS VENTAS FROM cajeros c INNER JOIN ventas v ON c.id_cajero = v.id_cajero WHERE id_usuario = $idUsuario AND id_tipo_venta = 1 AND fecha_venta = '$fechaVenta'";
		//$sql = "SELECT SUM(total_venta) AS VENTAS FROM ventas WHERE id_cajero = $idCajero AND id_tipo_venta = 1 AND fecha_venta = '$fechaVenta'";
		$ventas_efectivo_por_cajero = mysqli_query($conexion, $sql);
		$result = array();
		if ($ventas_efectivo_por_cajero && mysqli_num_rows($ventas_efectivo_por_cajero) >=1) {
			$result = $ventas_efectivo_por_cajero;
		}

		return $result;
	}

	//Conseguir movimientosde caja
	function conseguir_movimientos_caja($conexion, $idCajero = null, $fechaInforme){
		$sql = "SELECT id_mov_cajero AS CODIGO_MOVIMIENTO, id_cajero AS CAJERO, fecha_mov_cajero AS FECHA, hora_mov_cajero AS HORA, valor_mov_cajero AS VALOR, descripcion_mov_caja AS DESCRIPCION  FROM movimientos_cajeros WHERE id_tipo_mov_cajero = 4 AND fecha_mov_cajero = '$fechaInforme'";
		if ($idCajero != null) {
			$sql .= " AND id_cajero = $idCajero";
		}
		$conseguir_movimientos_caja = mysqli_query($conexion, $sql);
		$result = array();
		if ($conseguir_movimientos_caja && mysqli_num_rows($conseguir_movimientos_caja) >=1) {
			$result = $conseguir_movimientos_caja;
		}

		return $result;
	}

	function conseguir_estado_caja($conexion, $idUsuario, $fechaInforme){
		$sql = "SELECT e.nombre_estado_caja AS ESTADO FROM cajeros c INNER JOIN estados_caja e ON c.id_estado_caja = e.id_estado_caja WHERE id_usuario = $idUsuario GROUP BY id_usuario";
		$estado_caja = mysqli_query($conexion, $sql);
		$result = array();
		if ($estado_caja && mysqli_num_rows($estado_caja) >=1) {
			$result = $estado_caja;
		}

		return $result;
	}

	//Conseguir recargas
	function conseguir_recargas($conexion, $fechaInforme){
		$sql = "SELECT r.id_recarga AS CODIGO_RECARGA, u.nombre_usuario AS USUARIO, fp.nombre_forma_pago AS FORMA_PAGO, tr.nombre_tipo_recarga AS TIPO_RECARGA, codigo_cliente_recarga AS CODIGO_CLIENTE, nombre_cliente_recarga AS NOMBRE_CLIENTE, valor_recarga AS VALOR, fecha_recarga AS FECHA, hora_recarga AS HORA FROM recargas r INNER JOIN usuarios u ON r.id_usuario = u.id_usuario INNER JOIN formas_pago fp ON r.id_forma_pago = fp.id_forma_pago INNER JOIN tipos_recarga tr ON r.id_tipo_recarga = tr.id_tipo_recarga WHERE r.fecha_recarga = '$fechaInforme'";
		$estado_caja = mysqli_query($conexion, $sql);
		$result = array();
		if ($estado_caja && mysqli_num_rows($estado_caja) >=1) {
			$result = $estado_caja;
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