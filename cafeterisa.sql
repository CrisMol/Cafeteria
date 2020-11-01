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
	id_estudiante 				varchar(100) not null,
	descripcion_mov_estudiante	text,
	fecha_mov_estudiante		date not null,
	hora_mov_estudiante			time not null,
	cantidad_mov_estudiante		int(255),
	debito_mov_estudiante		float(100,2),
	credito_mov_estudiante		float(100,2),
	CONSTRAINT pk_movimientos_estudiantes PRIMARY KEY(id_mov_estudiante),
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
	contraseña_usuario	varchar(255) not null,
	alias_usuario		varchar(255) not null,
	CONSTRAINT pk_usuarios PRIMARY KEY(id_usuario),
	CONSTRAINT uq_email UNIQUE(email_usuario),
	CONSTRAINT fk_usuario_tipo_usuario FOREIGN KEY(id_tipo_usuario) REFERENCES tipos_usuario(id_tipo_usuario)
)ENGINE=InnoDB;

CREATE TABLE privilegios (
	id_privilegio		int(255) auto_increment not null,
	id_usuario 			int(255) not null,
	nombre_privilegio	varchar(100) not null,
	CONSTRAINT pk_privilegios PRIMARY KEY(id_privilegio)
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
	id_usuario  		int(255) not null,
	nombre_cajero	  	varchar(100) not null,
	CONSTRAINT pk_cajeros PRIMARY KEY(id_cajero),
	CONSTRAINT fk_cajero_punto_venta FOREIGN KEY(id_punto_venta) REFERENCES puntos_venta(id_punto_venta),
	CONSTRAINT fk_cajero_estado_caja FOREIGN KEY(id_estado_caja) REFERENCES estados_caja(id_estado_caja),
	CONSTRAINT fk_cajero_usuario FOREIGN KEY(id_usuario) REFERENCES usuarios(id_usuario)
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
	CONSTRAINT pk_movimientos_cajeros PRIMARY KEY(id__mov_cajero),
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
	id_profesor					varchar(100) not null,
	descripcion_mov_profesor	text,
	fecha_mov_profesor			date not null,
	hora_mov_profesor			time not null,
	cantidad_mov_profesor		int(255),
	debito_mov_profesor			float(100,2),
	credito_mov_profesor		float(100,2),
	CONSTRAINT pk_movimientos_profesores PRIMARY KEY(id_mov_profesor),
	CONSTRAINT fk_movimiento_profesor FOREIGN KEY(id_profesor) REFERENCES profesores(id_profesor)
)ENGINE=InnoDB;


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

CREATE TABLE tipos_recarga (
	id_tipo_recarga		int(255) auto_increment not null,
	nombre_tipo_recarga	varchar(100) not null,
	CONSTRAINT pk_tipos_recarga PRIMARY KEY(id_tipo_recarga)
)ENGINE=InnoDB;

CREATE TABLE formas_pago (
	id_forma_pago		int(255) auto_increment not null,
	nombre_forma_pago	varchar(100) not null,
	CONSTRAINT pk_formas_pago PRIMARY KEY(id_forma_pago)
)ENGINE=InnoDB;

CREATE TABLE recargas (
	id_recarga		  		int(255) auto_increment not null,
	id_usuario 				int(255) not null,
	id_forma_pago  				int(255) not null,
	id_tipo_recarga				int(255) not null,
	codigo_cliente_recarga		varchar(100) not null,
	nombre_cliente_recarga		varchar(100) not null,
	valor_recarga					float(200,2),
	fecha_recarga 					date not null,
	hora_recarga 					time not null,
	CONSTRAINT pk_recargas PRIMARY KEY(id_recarga),
	CONSTRAINT fk_recarga_usuario FOREIGN KEY(id_usuario) REFERENCES usuarios(id_usuario),
	CONSTRAINT fk_recarga_tipo_recarga FOREIGN KEY(id_tipo_recarga) REFERENCES tipos_recarga(id_tipo_recarga),
	CONSTRAINT fk_recarga_forma_pago FOREIGN KEY(id_forma_pago) REFERENCES formas_pago(id_forma_pago)
)ENGINE=InnoDB;

ALTER TABLE recargas AUTO_INCREMENT = 100;
ALTER TABLE productos AUTO_INCREMENT = 100;
ALTER TABLE compras_proveedor AUTO_INCREMENT = 100;