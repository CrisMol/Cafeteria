CREATE DATABASE cafeterisa;
USE cafeterisa;

CREATE TABLE grados (
	id_grado  		int(255) auto_increment not null,
	nombre_grado  	varchar(100) not null,
	CONSTRAINT pk_grados PRIMARY KEY(id_grado)
)ENGINE=InnoDB;

CREATE TABLE familias (
	id_familia  				varchar(10) not null,
	nombre_familia				varchar(100) not null,
	email_familia			  	varchar(255) not null,
	celular_familia				varchar(10) not null,
	saldo_familia				float(200,2),
	contraseNa_familia 			varchar(100) not null,
	CONSTRAINT pk_familias PRIMARY KEY(id_familia)
)ENGINE=InnoDB;


CREATE TABLE tipos_movimiento_estudiante (
	id_tipo_mov_estudiante		int(255) auto_increment not null,
	nombre_tipo_mov_estudiante	varchar(100) not null,
	CONSTRAINT pk_id_tipos_mov_estudiante PRIMARY KEY(id_tipo_mov_estudiante)
)ENGINE=InnoDB;


CREATE TABLE estudiantes (
	id_estudiante  				varchar(100) not null,
	id_grado					int(255) not null,
	id_familia					varchar(10) not null,
	apellidos_estudiante		varchar(100) not null,
	nombres_estudiante			varchar(100) not null,
	sexo_estudiante				varchar(100) not null,
	maximo_compras				varchar(100) not null,
	CONSTRAINT pk_estudiantes PRIMARY KEY(id_estudiante),
	CONSTRAINT fk_estudiante_grado FOREIGN KEY(id_grado) REFERENCES grados(id_grado),
	CONSTRAINT fk_estudiante_familia FOREIGN KEY(id_familia) REFERENCES familias(id_familia)
)ENGINE=InnoDB;

CREATE TABLE rfid_estudiantes (
	id_rfid_estudiante  		int(255) auto_increment not null,
	id_estudiante 				varchar(10) not null,
	estado_rfid_estudiante  	varchar(100) not null,
	CONSTRAINT pk_rfid_estudiantes PRIMARY KEY(id_rfid_estudiante),
	CONSTRAINT fk_rfid_estudiante FOREIGN KEY(id_estudiante) REFERENCES estudiantes(id_estudiante)
)ENGINE=InnoDB;

CREATE TABLE movimientos_estudiantes (
	id_mov_estudiante  	int(255) auto_increment not null,
	id_tipo_mov_estudiante  	int(255) not null,
	id_estudiante 				varchar(100) not null,
	descripcion_mov_estudiante	text,
	fecha_mov_estudiante		date not null,
	hora_mov_estudiante			time not null,
	cantidad_mov_estudiante		int(255),
	debito_mov_estudiante		float(100,2),
	credito_mov_estudiante		float(100,2),
	CONSTRAINT pk_movimientos_estudiantes PRIMARY KEY(id_mov_estudiante),
	CONSTRAINT fk_tipo_movimiento_estudiante FOREIGN KEY(id_tipo_mov_estudiante) REFERENCES tipos_movimiento_estudiante(id_tipo_mov_estudiante),
	CONSTRAINT fk_movimiento_estudiante FOREIGN KEY(id_estudiante) REFERENCES estudiantes(id_estudiante)
)ENGINE=InnoDB;

CREATE TABLE tipos_venta (
	id_tipo_venta		int(255) auto_increment not null,
	nombre_tipo_venta	varchar(100) not null,
	CONSTRAINT pk_tipos_venta PRIMARY KEY(id_tipo_venta)
)ENGINE=InnoDB;

CREATE TABLE tipos_cliente (
	id_tipo_cliente		int(255) auto_increment not null,
	nombre_tipo_cliente	varchar(100) not null,
	CONSTRAINT pk_tipos_cliente PRIMARY KEY(id_tipo_cliente)
)ENGINE=InnoDB;

CREATE TABLE tipos_usuario (
	id_tipo_usuario		int(255) auto_increment not null,
	nombre_tipo_usuario	varchar(100) not null,
	CONSTRAINT pk_tipos_usuario PRIMARY KEY(id_tipo_usuario)
)ENGINE=InnoDB;

CREATE TABLE usuarios (
	id_usuario  		int(255) auto_increment not null,
	id_tipo_usuario		int(255) not null,
	nombre_usuario  	varchar(100) not null,
	email_usuario		varchar(255) not null,
	contrasena_usuario	varchar(255) not null,
	alias_usuario		varchar(255) not null,
	CONSTRAINT pk_usuarios PRIMARY KEY(id_usuario),
	CONSTRAINT uq_email UNIQUE(email_usuario),
	CONSTRAINT fk_usuario_tipo_usuario FOREIGN KEY(id_tipo_usuario) REFERENCES tipos_usuario(id_tipo_usuario)
)ENGINE=InnoDB;


CREATE TABLE puntos_venta (
	id_punto_venta		int(255) auto_increment not null,
	nombre_punto_venta	varchar(100) not null,
	CONSTRAINT pk_puntos_venta PRIMARY KEY(id_punto_venta)
)ENGINE=InnoDB;

CREATE TABLE estados_caja (
	id_estado_caja		int(255) auto_increment not null,
	nombre_estado_caja	varchar(100) not null,
	CONSTRAINT pk_estados_caja PRIMARY KEY(id_estado_caja)
)ENGINE=InnoDB;

CREATE TABLE cajeros (
	id_cajero   		int(255) auto_increment not null,
	id_punto_venta		int(255) not null,
	id_estado_caja		int(255) not null,
	nombre_cajero	  	varchar(100) not null,
	nombre_usuario  	varchar(100) not null,
	contrasena_usuario	varchar(255) not null,
	CONSTRAINT pk_cajeros PRIMARY KEY(id_cajero),
	CONSTRAINT fk_cajero_punto_venta FOREIGN KEY(id_punto_venta) REFERENCES puntos_venta(id_punto_venta),
	CONSTRAINT fk_cajero_estado_caja FOREIGN KEY(id_estado_caja) REFERENCES estados_caja(id_estado_caja)
)ENGINE=InnoDB;

CREATE TABLE tipos_movimiento_cajero (
	id_tipo_mov_cajero		int(255) auto_increment not null,
	nombre_tipo_mov_cajero	varchar(100) not null,
	CONSTRAINT pk_tipos_movimientos_cajero PRIMARY KEY(id_tipo_mov_cajero)
)ENGINE=InnoDB;

CREATE TABLE movimientos_cajeros (
	id_mov_cajero   		int(255) auto_increment not null,
	id_cajero		int(255) not null,
	id_tipo_mov_cajero	int(255) not null,
	fecha_mov_cajero	date not null,
	hora_mov_cajero		time not null,
	valor_mov_cajero	float(200,2) not null,
	descripcion_mov_caja text not null,
	CONSTRAINT pk_movimientos_cajeros PRIMARY KEY(id_mov_cajero),
	CONSTRAINT fk_movimiento_cajero FOREIGN KEY(id_cajero) REFERENCES cajeros(id_cajero),
	CONSTRAINT fk_movimiento_tipo_cajero FOREIGN KEY(id_tipo_mov_cajero) REFERENCES tipos_movimiento_cajero(id_tipo_mov_cajero)
)ENGINE=InnoDB;

CREATE TABLE categorias_producto (
	id_categoria		int(255) auto_increment not null,
	nombre_categoria	varchar(100) not null,
	CONSTRAINT pk_categorias_productos PRIMARY KEY(id_categoria)
)ENGINE=InnoDB;

CREATE TABLE claves_autorizacion (
	id_clave_autorizacion 			int(255) auto_increment not null,
	codigo_clave_autorizacion 				varchar(100) not null,
	CONSTRAINT pk_claves_autorizacion PRIMARY KEY(id_clave_autorizacion)
)ENGINE=InnoDB;

CREATE TABLE productos (
	id_producto   		int(255) auto_increment not null,
	id_categoria		int(255) not null,
	id_clave_autorizacion int(255) not null,
	codigo_barras_producto		varchar(100),
	titulo_producto	  	varchar(100) not null,
	descripcion_producto	text,
	costo_producto			float(200,2) not null,
	precio_venta_producto	float(200,2) not null,
	cantidad_producto		int(255) not null,
	disponibilidad_inventario	char(1) not null,
	disponibilidad_precompra	char(1) not null,
	imagen_producto				varchar(255),
	CONSTRAINT pk_productos PRIMARY KEY(id_producto),
	CONSTRAINT fk_producto_categoria FOREIGN KEY(id_categoria) REFERENCES categorias_producto(id_categoria)
)ENGINE=InnoDB, AUTO_INCREMENT=100;

CREATE TABLE ventas (
	id_venta   			int(255) auto_increment not null,
	id_cajero   		int(255) not null,
	id_producto   		int(255) not null,
	id_tipo_cliente 	int(255) not null,
	id_tipo_venta		int(255) not null,
	id_cliente   		varchar(100) not null,
	numero_pedido		int(255) not null,
	cantidad_venta		int(255) not null,
	total_venta			float(200,2),
	fecha_venta			date not null,
	hora_venta			time not null,
	CONSTRAINT pk_ventas PRIMARY KEY(id_venta),
	CONSTRAINT fk_venta_cajero FOREIGN KEY(id_cajero) REFERENCES cajeros(id_cajero),
	CONSTRAINT fk_venta_producto FOREIGN KEY(id_producto) REFERENCES productos(id_producto),
	CONSTRAINT fk_venta_tipo_cliente FOREIGN KEY(id_tipo_cliente) REFERENCES tipos_cliente(id_tipo_cliente),
	CONSTRAINT fk_venta_tipo_venta FOREIGN KEY(id_tipo_venta) REFERENCES tipos_venta(id_tipo_venta)
)ENGINE=InnoDB;

CREATE TABLE proveedores (
	id_proveedor		int(255) auto_increment not null,
	codigo_proveedor 	varchar(100) not null,
	nombre_proveedor	varchar(100),
	vendedor_proveedor	varchar(100),
	telefono_proveedor	varchar(100),
	email_proveedor		varchar(255),
	CONSTRAINT pk_proveedores PRIMARY KEY(id_proveedor)
)ENGINE=InnoDB;

CREATE TABLE compras_proveedor (
	id_compra_proveedor   			int(255) auto_increment not null,
	id_proveedor  		int(255) not null,
	id_producto 		int(255) not null,
	precio_compra  		float(200,2) not null,
	cantidad_compra		int(255) not null,
	fecha_compra		date not null,
	hora_compra			time not null,
	CONSTRAINT pk_compras_proveedor PRIMARY KEY(id_compra_proveedor),
	CONSTRAINT fk_compra_producto FOREIGN KEY(id_producto) REFERENCES productos(id_producto),
	CONSTRAINT fk_compra_proveedor FOREIGN KEY(id_proveedor) REFERENCES proveedores(id_proveedor)
)ENGINE=InnoDB;

CREATE TABLE tipos_movimiento_profesor (
	id_tipo_mov_profesor		int(255) auto_increment not null,
	nombre_tipo_mov_profesor	varchar(100) not null,
	CONSTRAINT pk_tipos_movimientos_profesor PRIMARY KEY(id_tipo_mov_profesor)
)ENGINE=InnoDB;

CREATE TABLE profesores (
	id_profesor  				varchar(100) not null,
	apellidos_profesor			varchar(100) not null,
	nombres_profesor			varchar(100) not null,
	email_profesor				varchar(255) not null,
	credito_profesor			float(200,2) not null,
	debito_profesor				float(200,2) not null,
	contrasena_profesor			varchar(100) not null,
	saldo_profesor				float(200,2) not null,
	celular_profesor			varchar(10),
	saldo_credito_profesor		float(200,2) not null,
	CONSTRAINT pk_profesores PRIMARY KEY(id_profesor)
)ENGINE=InnoDB;

CREATE TABLE rfid_profesores (
	id_rfid_profesor  			int(255) auto_increment not null,
	id_profesor 				varchar(10) not null,
	estado_rfid_profesor  		varchar(100) not null,
	CONSTRAINT pk_rfid_profesores PRIMARY KEY(id_rfid_profesor),
	CONSTRAINT fk_rfid_profesor FOREIGN KEY(id_profesor) REFERENCES profesores(id_profesor)
)ENGINE=InnoDB;

CREATE TABLE movimientos_profesores (
	id_mov_profesor		  		int(255) auto_increment not null,
	id_usuario 					int(255) not null,
	id_tipo_mov_profesor		int(255) not null,
	id_profesor					varchar(100) not null,
	descripcion_mov_profesor	text,
	fecha_mov_profesor			date not null,
	hora_mov_profesor			time not null,
	cantidad_mov_profesor		int(255),
	debito_mov_profesor			float(100,2),
	credito_mov_profesor		float(100,2),
	CONSTRAINT pk_movimientos_profesores PRIMARY KEY(id_mov_profesor),
	CONSTRAINT fk_tipo_movimiento_profesor FOREIGN KEY(id_tipo_mov_profesor) REFERENCES tipos_movimiento_profesor(id_tipo_mov_profesor),
	CONSTRAINT fk_movimiento_profesor_usuario FOREIGN KEY(id_usuario) REFERENCES usuarios(id_usuario),
	CONSTRAINT fk_movimiento_profesor FOREIGN KEY(id_profesor) REFERENCES profesores(id_profesor)
)ENGINE=InnoDB;

CREATE TABLE tipos_cliente_recarga (
	id_tipo_cliente_recarga		int(255) auto_increment not null,
	nombre_tipo_cliente_recarga	varchar(100) not null,
	CONSTRAINT pk_tipos_cliente_recarga PRIMARY KEY(id_tipo_cliente_recarga)
)ENGINE=InnoDB;

--CREATE TABLE recargas(

--)ENGINE=InnoDB;

CREATE TABLE bajas_producto (
	id_baja_producto  	int(255) auto_increment not null,
	id_producto			int(255) not null,
	cantidad_baja_producto  	int(255) not null,
	motivo_baja_producto		varchar(255) not null,
	CONSTRAINT pk_bajas_producto PRIMARY KEY(id_baja_producto),
	CONSTRAINT fk_baja_producto FOREIGN KEY(id_producto) REFERENCES productos(id_producto)
)ENGINE=InnoDB;

CREATE TABLE movimientos_productos (
	id_mov_producto		  		int(255) auto_increment not null,
	id_usuario  				int(255) not null,
	id_producto					int(255) not null,
	descripcion_mov_producto	text,
	fecha_mov_producto			date not null,
	hora_mov_producto			time not null,
	entrada_mov_producto		int(255) not null,
	salida_mov_producto			int(255) not null,
	saldo_mov_producto			int(255) not null,
	CONSTRAINT pk_movimientos_productos PRIMARY KEY(id_mov_producto),
	CONSTRAINT fk_movimiento_usuario FOREIGN KEY(id_usuario) REFERENCES usuarios(id_usuario),
	CONSTRAINT fk_movimiento_producto FOREIGN KEY(id_producto) REFERENCES productos(id_producto)
)ENGINE=InnoDB;

CREATE TABLE pagos_proveedor (
	id_pago_proveedor		  		int(255) auto_increment not null,
	id_usuario  				int(255) not null,
	id_proveedor				int(255) not null,
	valor_pago					float(200,2),
	fecha_pago 					date not null,
	CONSTRAINT pk_pagos_proveedor PRIMARY KEY(id_pago_proveedor),
	CONSTRAINT fk_pago_usuario FOREIGN KEY(id_usuario) REFERENCES usuarios(id_usuario),
	CONSTRAINT fk_pago_proveedor FOREIGN KEY(id_proveedor) REFERENCES proveedores(id_proveedor)
)ENGINE=InnoDB;

CREATE TABLE puntos_categorias (
	id_punto_categoria		  		int(255) auto_increment not null,
	id_punto_venta  				int(255) not null,
	id_categoria					int(255) not null,
	CONSTRAINT pk_puntos_categorias PRIMARY KEY(id_punto_categoria),
	CONSTRAINT fk_punto_venta FOREIGN KEY(id_punto_venta) REFERENCES puntos_venta(id_punto_venta),
	CONSTRAINT fk_punto_categoria FOREIGN KEY(id_categoria) REFERENCES categorias_producto(id_categoria)
)ENGINE=InnoDB;

CREATE TABLE modulos (
	id_modulo		int(255) auto_increment not null,
	nombre_modulo	varchar(100) not null,
	CONSTRAINT pk_modulos PRIMARY KEY(id_modulo)
)ENGINE=InnoDB;

CREATE TABLE privilegios (
	id_privilegio		int(255) auto_increment not null,
	id_modulo			int(255) not null,
	nombre_previlegio	varchar(100) not null,
	CONSTRAINT pk_previlegios PRIMARY KEY(id_privilegio),
	CONSTRAINT fk_privilegios_modulos FOREIGN KEY(id_modulo) REFERENCES modulos(id_modulo)
)ENGINE=InnoDB;

CREATE TABLE usuarios_privilegios (
	id_usuario_privilegio		int(255) auto_increment not null,
	id_privilegio 				int(255) not null,
	id_usuario 					int(255) not null,
	CONSTRAINT pk_usuarios_privilegios PRIMARY KEY(id_usuario_privilegio),
	CONSTRAINT fk_usuario FOREIGN KEY(id_usuario) REFERENCES usuarios(id_usuario),
	CONSTRAINT fk_usuario_privilegio FOREIGN KEY(id_privilegio) REFERENCES privilegios(id_privilegio)
)ENGINE=InnoDB;

CREATE TABLE parametrizaciones (
	id_parametrizacion			int(255) auto_increment not null,
	nombre_colegio 				varchar(255) not null,
	nombre_responsable			varchar(255) not null,
	email_notificaciones		varchar(255) not null,
	email_precompras			varchar(255) not null,
	hora_maxima_precompras		time,
	entrega_precompras_sabado 	char(1) not null,
	email_tienda_online			varchar(255) not null,
	whatsapp_soporte			varchar(25) not null,
	ventas_control_inventario	char(1) not null,
	servicio_precompras			char(1) not null,
	CONSTRAINT pk_paramtrizaciones PRIMARY KEY(id_parametrizacion)
)ENGINE=InnoDB;

ALTER TABLE productos AUTO_INCREMENT = 100;
ALTER TABLE compras_proveedor AUTO_INCREMENT = 100;

INSERT INTO modulos(nombre_modulo) VALUES('Menu Recargas / Pagos');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Familias');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Estudiantes');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Profesores');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Productos');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Inventario');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Proveedores');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Menu');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Informes');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Reversiones');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Importar');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Configuración');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Pagos / Bolsas');
INSERT INTO modulos(nombre_modulo) VALUES('Menu Planes Alimentación');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(1, 'Estudiante Efectivo');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(1, 'Profesor Efectivo');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(1, 'Pago Credito');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(2, 'Nueva / Editar');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(2, 'Restablecer Contraseña');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(3, 'Nueva / Editar');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(3, 'Movimientos');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(3, 'Registrar RFID');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(3, 'Grados');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(4, 'Nueva / Editar');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(4, 'Movimientos');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(4, 'Registrar RFID');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(4, 'Movimientos Credito');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(5, 'Seleccionar');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(5, 'Nuevo');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(5, 'Listado');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(5, 'Fotos Productos');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(6, 'Ver Inventario');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(6, 'Movimiento Producto');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(6, 'Ingresar Factura');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(7, 'Nuevo / Editar');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(7, 'Pagos Proveedor');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(7, 'Facturas');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(8, 'Cargar Menu');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Cuadre Cajeros');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Cuadre Admin');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Resumen Ventas');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Ventas Puntos');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Recargas');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Créditos Profesores');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Cuentas Por Cobrar');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Ventas Mensuales');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Productos Vendidos');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Pre Compras Estudiantes');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Pre Compras Profesores');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(9, 'Saldos Familias');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(10, 'Venta Efectivo');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(10, 'Recarga Familia');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(10, 'Recarga Profesor');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(10, 'Corte Créditos');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(10, 'Cierre Caja');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(10, 'Pago Credito');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(11, 'Estudiantes');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(11, 'Profesores');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(12, 'Puntos Venta');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(12, 'Categorias Productos');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(12, 'Cajeros');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(12, 'Usuarios');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(12, 'id_parametrizaciontrización');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(12, 'Kioskos');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(12, 'Subir Fotos');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(13, 'Pagar');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(13, 'Compra Bolsa SMS');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(13, 'Compra Bolsa Recargas');

INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(14, 'Registro');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(14, 'Estudiantes');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(14, 'Entregas');
INSERT INTO privilegios(id_modulo, nombre_previlegio) VALUES(14, 'Configuración');