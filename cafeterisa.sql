-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-11-2020 a las 23:56:32
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cafeterisa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajas_producto`
--

CREATE TABLE IF NOT EXISTS `bajas_producto` (
  `id_baja_producto` int(255) NOT NULL AUTO_INCREMENT,
  `id_producto` int(255) NOT NULL,
  `cantidad_baja_producto` int(255) NOT NULL,
  `motivo_baja_producto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_baja_producto`),
  KEY `fk_baja_producto` (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `bajas_producto`
--

INSERT INTO `bajas_producto` (`id_baja_producto`, `id_producto`, `cantidad_baja_producto`, `motivo_baja_producto`) VALUES
(1, 102, 5, 'No se vendieron'),
(2, 102, 3, 'no'),
(3, 103, 50, 'no'),
(4, 103, 5, 'No se vendieron'),
(5, 103, 5, 'No se vendieron');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajeros`
--

CREATE TABLE IF NOT EXISTS `cajeros` (
  `id_cajero` int(255) NOT NULL AUTO_INCREMENT,
  `id_punto_venta` int(255) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `nombre_cajero` varchar(100) NOT NULL,
  `id_estado_caja` int(255) NOT NULL,
  PRIMARY KEY (`id_cajero`),
  KEY `fk_cajero_punto_venta` (`id_punto_venta`),
  KEY `fk_cajero_usuario` (`id_usuario`),
  KEY `id_estado_caja` (`id_estado_caja`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cajeros`
--

INSERT INTO `cajeros` (`id_cajero`, `id_punto_venta`, `id_usuario`, `nombre_cajero`, `id_estado_caja`) VALUES
(1, 1, 3, 'Estefania Alban', 1),
(2, 1, 2, 'Daniel Merino', 1),
(3, 2, 3, 'Molina Cristian', 2),
(4, 1, 1, 'Alexander', 1),
(6, 1, 6, 'Juan ortiz', 1),
(7, 1, 2, 'Molina Cristian', 1),
(8, 1, 2, 'Molina Cristian', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_producto`
--

CREATE TABLE IF NOT EXISTS `categorias_producto` (
  `id_categoria` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categorias_producto`
--

INSERT INTO `categorias_producto` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Almuerzo'),
(2, 'Bebidas'),
(3, 'Comida Ràpida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `claves_autorizacion`
--

CREATE TABLE IF NOT EXISTS `claves_autorizacion` (
  `id_clave_autorizacion` int(255) NOT NULL AUTO_INCREMENT,
  `codigo_clave_autorizacion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_clave_autorizacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `claves_autorizacion`
--

INSERT INTO `claves_autorizacion` (`id_clave_autorizacion`, `codigo_clave_autorizacion`) VALUES
(1, '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_proveedor`
--

CREATE TABLE IF NOT EXISTS `compras_proveedor` (
  `id_compra_proveedor` int(255) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(255) NOT NULL,
  `precio_compra` float(200,2) NOT NULL,
  `cantidad_compra` int(255) NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_producto` int(255) NOT NULL,
  `hora_compra` time NOT NULL,
  PRIMARY KEY (`id_compra_proveedor`),
  KEY `fk_compra_proveedor` (`id_proveedor`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `compras_proveedor`
--

INSERT INTO `compras_proveedor` (`id_compra_proveedor`, `id_proveedor`, `precio_compra`, `cantidad_compra`, `fecha_compra`, `id_producto`, `hora_compra`) VALUES
(1, 1, 100.00, 50, '2020-10-30', 103, '21:30:00'),
(2, 1, 250.00, 150, '2020-10-31', 103, '22:31:00'),
(3, 2, 1.50, 10, '2020-10-30', 102, '21:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_caja`
--

CREATE TABLE IF NOT EXISTS `estados_caja` (
  `id_estado_caja` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_estado_caja` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estado_caja`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estados_caja`
--

INSERT INTO `estados_caja` (`id_estado_caja`, `nombre_estado_caja`) VALUES
(1, 'Abierta'),
(2, 'Cerrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id_estudiante` varchar(100) NOT NULL,
  `id_grado` int(255) NOT NULL,
  `id_familia` varchar(10) NOT NULL,
  `apellidos_estudiante` varchar(100) NOT NULL,
  `nombres_estudiante` varchar(100) NOT NULL,
  `sexo_estudiante` varchar(100) NOT NULL,
  `maximo_compras` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estudiante`),
  KEY `fk_estudiante_grado` (`id_grado`),
  KEY `fk_estudiante_familia` (`id_familia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `id_grado`, `id_familia`, `apellidos_estudiante`, `nombres_estudiante`, `sexo_estudiante`, `maximo_compras`) VALUES
('1001', 2, '1714764220', 'Merino Moreno', 'Daniel Alejandro', 'Masculino', 'Ilimitado'),
('1004', 1, '1714764220', 'Alban Laines', 'Darla', 'Femenino', 'Ilimitado'),
('1101', 1, '1722468236', 'Molina Cabezas', 'Angela Karen', 'Femenino', 'Ilimitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE IF NOT EXISTS `familias` (
  `id_familia` varchar(10) NOT NULL,
  `nombre_familia` varchar(100) NOT NULL,
  `email_familia` varchar(255) NOT NULL,
  `celular_familia` varchar(10) NOT NULL,
  `saldo_familia` float(200,2) DEFAULT NULL,
  `contrasena_familia` varchar(100) NOT NULL,
  PRIMARY KEY (`id_familia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id_familia`, `nombre_familia`, `email_familia`, `celular_familia`, `saldo_familia`, `contrasena_familia`) VALUES
('1714764220', 'Merino Moreno', 'merino_daniel1@hotmail.com', '0991943124', 65.00, '1234'),
('1722468236', 'Molina Cabeza', 'molinacuario_97@hotmail.com', '2988578', 30.00, '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formas_pago`
--

CREATE TABLE IF NOT EXISTS `formas_pago` (
  `id_forma_pago` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_forma_pago` varchar(100) NOT NULL,
  PRIMARY KEY (`id_forma_pago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `formas_pago`
--

INSERT INTO `formas_pago` (`id_forma_pago`, `nombre_forma_pago`) VALUES
(1, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
  `id_grado` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_grado` varchar(100) NOT NULL,
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `nombre_grado`) VALUES
(1, 'EGB2'),
(2, 'EGB3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_cajeros`
--

CREATE TABLE IF NOT EXISTS `movimientos_cajeros` (
  `id_mov_cajero` int(255) NOT NULL AUTO_INCREMENT,
  `id_cajero` int(255) NOT NULL,
  `id_tipo_mov_cajero` int(255) NOT NULL,
  `fecha_mov_cajero` date NOT NULL,
  `hora_mov_cajero` time NOT NULL,
  `valor_mov_cajero` float(200,2) NOT NULL,
  `descripcion_mov_caja` text NOT NULL,
  PRIMARY KEY (`id_mov_cajero`),
  KEY `fk_movimiento_cajero` (`id_cajero`),
  KEY `fk_movimiento_tipo_cajero` (`id_tipo_mov_cajero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `movimientos_cajeros`
--

INSERT INTO `movimientos_cajeros` (`id_mov_cajero`, `id_cajero`, `id_tipo_mov_cajero`, `fecha_mov_cajero`, `hora_mov_cajero`, `valor_mov_cajero`, `descripcion_mov_caja`) VALUES
(1, 3, 1, '2020-10-31', '08:30:00', 25.00, 'Saldo Inicial'),
(2, 3, 2, '2020-10-31', '13:30:00', 15.00, 'Pago proveedor'),
(3, 3, 3, '2020-10-31', '07:00:00', 5.00, 'Inicio de Caja'),
(4, 3, 4, '2020-10-31', '17:30:05', 40.00, 'Cierre de caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_estudiantes`
--

CREATE TABLE IF NOT EXISTS `movimientos_estudiantes` (
  `id_mov_estudiante` int(255) NOT NULL AUTO_INCREMENT,
  `id_estudiante` varchar(100) NOT NULL,
  `descripcion_mov_estudiante` text,
  `fecha_mov_estudiante` date NOT NULL,
  `hora_mov_estudiante` time NOT NULL,
  `cantidad_mov_estudiante` int(255) DEFAULT NULL,
  `debito_mov_estudiante` float(100,2) DEFAULT NULL,
  `credito_mov_estudiante` float(100,2) DEFAULT NULL,
  PRIMARY KEY (`id_mov_estudiante`),
  KEY `fk_movimiento_estudiante` (`id_estudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1053 ;

--
-- Volcado de datos para la tabla `movimientos_estudiantes`
--

INSERT INTO `movimientos_estudiantes` (`id_mov_estudiante`, `id_estudiante`, `descripcion_mov_estudiante`, `fecha_mov_estudiante`, `hora_mov_estudiante`, `cantidad_mov_estudiante`, `debito_mov_estudiante`, `credito_mov_estudiante`) VALUES
(1051, '1101', 'Recarga Efectivo', '2020-10-08', '20:07:48', 1, 0.00, 10.00),
(1052, '1101', 'Bebida', '2020-10-27', '20:07:48', 1, 2.50, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_productos`
--

CREATE TABLE IF NOT EXISTS `movimientos_productos` (
  `id_mov_producto` int(255) NOT NULL AUTO_INCREMENT,
  `id_producto` int(255) NOT NULL,
  `descripcion_mov_producto` text,
  `fecha_mov_producto` date NOT NULL,
  `hora_mov_producto` time NOT NULL,
  `entrada_mov_producto` int(255) NOT NULL,
  `salida_mov_producto` int(255) NOT NULL,
  `saldo_mov_producto` int(255) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  PRIMARY KEY (`id_mov_producto`),
  KEY `fk_movimiento_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `movimientos_productos`
--

INSERT INTO `movimientos_productos` (`id_mov_producto`, `id_producto`, `descripcion_mov_producto`, `fecha_mov_producto`, `hora_mov_producto`, `entrada_mov_producto`, `salida_mov_producto`, `saldo_mov_producto`, `id_usuario`) VALUES
(5, 102, 'Cambio de Inventario', '2020-10-30', '20:18:50', 5, 0, 20, 1),
(7, 103, 'Venta Estudiante Codigo 1004', '2020-10-30', '20:21:00', 0, 4, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_profesores`
--

CREATE TABLE IF NOT EXISTS `movimientos_profesores` (
  `id_mov_profesor` int(255) NOT NULL AUTO_INCREMENT,
  `id_profesor` varchar(100) NOT NULL,
  `descripcion_mov_profesor` text,
  `fecha_mov_profesor` date NOT NULL,
  `hora_mov_profesor` time NOT NULL,
  `cantidad_mov_profesor` int(255) DEFAULT NULL,
  `debito_mov_profesor` float(100,2) DEFAULT NULL,
  `credito_mov_profesor` float(100,2) DEFAULT NULL,
  PRIMARY KEY (`id_mov_profesor`),
  KEY `fk_movimiento_profesor` (`id_profesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1050 ;

--
-- Volcado de datos para la tabla `movimientos_profesores`
--

INSERT INTO `movimientos_profesores` (`id_mov_profesor`, `id_profesor`, `descripcion_mov_profesor`, `fecha_mov_profesor`, `hora_mov_profesor`, `cantidad_mov_profesor`, `debito_mov_profesor`, `credito_mov_profesor`) VALUES
(1045, '1722468236', 'Proteina Adicional', '2020-10-27', '20:07:48', 5, 2.50, 0.00),
(1046, '1722468236', 'Recarga Efectivo', '2020-10-29', '20:25:30', 1, 0.00, 2.00),
(1047, '1814764221', 'Pago Credito', '2020-11-01', '00:00:00', 1, 0.00, 1.00),
(1048, '1722468236', 'Recarga Efectivo', '2020-11-01', '20:54:31', 1, 0.00, 1.00),
(1049, '1722468236', 'Recarga Efectivo', '2020-11-01', '20:55:37', 1, 0.00, 1.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_proveedor`
--

CREATE TABLE IF NOT EXISTS `pagos_proveedor` (
  `id_pago_proveedor` int(255) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(255) NOT NULL,
  `id_proveedor` int(255) NOT NULL,
  `valor_pago` float(200,2) DEFAULT NULL,
  `fecha_pago` date NOT NULL,
  PRIMARY KEY (`id_pago_proveedor`),
  KEY `fk_pago_usuario` (`id_usuario`),
  KEY `fk_pago_proveedor` (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `pagos_proveedor`
--

INSERT INTO `pagos_proveedor` (`id_pago_proveedor`, `id_usuario`, `id_proveedor`, `valor_pago`, `fecha_pago`) VALUES
(1, 1, 1, 10.00, '2020-11-01'),
(2, 1, 2, 50.00, '2020-10-29'),
(3, 2, 1, 35.00, '2020-10-31'),
(4, 3, 1, 10.00, '2020-10-31'),
(5, 2, 1, 45.00, '2020-10-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
  `id_privilegio` int(255) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(255) NOT NULL,
  `nombre_privilegio` varchar(100) NOT NULL,
  PRIMARY KEY (`id_privilegio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(255) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(255) NOT NULL,
  `codigo_barras_producto` varchar(100) DEFAULT NULL,
  `titulo_producto` varchar(100) NOT NULL,
  `descripcion_producto` text,
  `costo_producto` float(200,2) NOT NULL,
  `precio_venta_producto` float(200,2) NOT NULL,
  `cantidad_producto` int(255) NOT NULL,
  `disponibilidad_inventario` char(1) NOT NULL,
  `disponibilidad_precompra` char(1) NOT NULL,
  `imagen_producto` varchar(255) DEFAULT NULL,
  `id_clave_autorizacion` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_producto_categoria` (`id_categoria`),
  KEY `id_clave_autorizacion` (`id_clave_autorizacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `codigo_barras_producto`, `titulo_producto`, `descripcion_producto`, `costo_producto`, `precio_venta_producto`, `cantidad_producto`, `disponibilidad_inventario`, `disponibilidad_precompra`, `imagen_producto`, `id_clave_autorizacion`) VALUES
(102, 1, '12345', 'Almuerzo Completo', 'Arrozcon papas', 0.00, 1.75, 15, '1', '0', NULL, 1),
(103, 2, '1232446', 'Coca Cola', 'Gaseosa', 0.25, 0.50, 40, '1', '0', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `id_profesor` varchar(100) NOT NULL,
  `apellidos_profesor` varchar(100) NOT NULL,
  `nombres_profesor` varchar(100) NOT NULL,
  `email_profesor` varchar(255) NOT NULL,
  `credito_profesor` float(200,2) NOT NULL,
  `debito_profesor` float(200,2) NOT NULL,
  `contrasena_profesor` varchar(100) NOT NULL,
  `saldo_profesor` float(200,2) NOT NULL,
  `celular_profesor` varchar(10) DEFAULT NULL,
  `saldo_credito_profesor` float DEFAULT NULL,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `apellidos_profesor`, `nombres_profesor`, `email_profesor`, `credito_profesor`, `debito_profesor`, `contrasena_profesor`, `saldo_profesor`, `celular_profesor`, `saldo_credito_profesor`) VALUES
('1714764221', 'Moreno Prieto', 'Juan Francisco', 'merino_daniel1@hotmail.com', 50.00, 0.00, '1234', 6.00, '0986655', NULL),
('1722468236', 'Molina Muñoz', 'Cristian Alexander', 'molinacuario_97@hotmail.com', 11.00, 0.00, '1234', 2.00, '0963639728', NULL),
('1814764221', 'Espin Palacios', 'Pedro Jose', 'merino_daniel1@hotmail.com', 40.00, 0.00, '1234', 1.00, '09879734', 1.75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(100) NOT NULL,
  `vendedor_proveedor` varchar(100) DEFAULT NULL,
  `telefono_proveedor` varchar(100) DEFAULT NULL,
  `email_proveedor` varchar(255) DEFAULT NULL,
  `codigo_proveedor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `vendedor_proveedor`, `telefono_proveedor`, `email_proveedor`, `codigo_proveedor`) VALUES
(1, 'Cafeteri.sa', 'Estefania Alban', '0991943124', 'clientes@cafeterisa.com', '1714764220001'),
(2, 'Productos Propios Cocina', 'Corpsunrise', '0991943124', 'd.merino@corpsunrise.com', '1714764220');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_venta`
--

CREATE TABLE IF NOT EXISTS `puntos_venta` (
  `id_punto_venta` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_punto_venta` varchar(100) NOT NULL,
  PRIMARY KEY (`id_punto_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `puntos_venta`
--

INSERT INTO `puntos_venta` (`id_punto_venta`, `nombre_punto_venta`) VALUES
(1, 'Cafetería Proyectos Corpsunrise'),
(2, 'Colegio Sagrados Corazones De Rumipamba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recargas`
--

CREATE TABLE IF NOT EXISTS `recargas` (
  `id_recarga` int(255) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(255) NOT NULL,
  `id_forma_pago` int(255) NOT NULL,
  `id_tipo_recarga` int(255) NOT NULL,
  `codigo_cliente_recarga` varchar(100) NOT NULL,
  `nombre_cliente_recarga` varchar(100) NOT NULL,
  `valor_recarga` float(200,2) DEFAULT NULL,
  `fecha_recarga` date NOT NULL,
  `hora_recarga` time NOT NULL,
  PRIMARY KEY (`id_recarga`),
  KEY `fk_recarga_usuario` (`id_usuario`),
  KEY `fk_recarga_tipo_recarga` (`id_tipo_recarga`),
  KEY `fk_recarga_forma_pago` (`id_forma_pago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `recargas`
--

INSERT INTO `recargas` (`id_recarga`, `id_usuario`, `id_forma_pago`, `id_tipo_recarga`, `codigo_cliente_recarga`, `nombre_cliente_recarga`, `valor_recarga`, `fecha_recarga`, `hora_recarga`) VALUES
(1, 1, 1, 1, '1722468236', 'Molina Cabeza', 10.00, '2020-11-01', '00:00:00'),
(2, 1, 1, 1, '1722468236', 'Cristian Alexander', 1.00, '2020-11-01', '20:55:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rfid_estudiantes`
--

CREATE TABLE IF NOT EXISTS `rfid_estudiantes` (
  `id_rfid_estudiante` int(255) NOT NULL AUTO_INCREMENT,
  `id_estudiante` varchar(10) NOT NULL,
  `estado_rfid_estudiante` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rfid_estudiante`),
  KEY `fk_rfid_estudiante` (`id_estudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12454 ;

--
-- Volcado de datos para la tabla `rfid_estudiantes`
--

INSERT INTO `rfid_estudiantes` (`id_rfid_estudiante`, `id_estudiante`, `estado_rfid_estudiante`) VALUES
(12453, '1004', 'Si Registra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rfid_profesores`
--

CREATE TABLE IF NOT EXISTS `rfid_profesores` (
  `id_rfid_profesor` int(255) NOT NULL AUTO_INCREMENT,
  `id_profesor` varchar(10) NOT NULL,
  `estado_rfid_profesor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rfid_profesor`),
  KEY `fk_rfid_profesor` (`id_profesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12346 ;

--
-- Volcado de datos para la tabla `rfid_profesores`
--

INSERT INTO `rfid_profesores` (`id_rfid_profesor`, `id_profesor`, `estado_rfid_profesor`) VALUES
(12345, '1714764221', 'Si Registra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_cliente`
--

CREATE TABLE IF NOT EXISTS `tipos_cliente` (
  `id_tipo_cliente` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_cliente` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipos_cliente`
--

INSERT INTO `tipos_cliente` (`id_tipo_cliente`, `nombre_tipo_cliente`) VALUES
(1, 'Profesor'),
(2, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_movimiento_cajero`
--

CREATE TABLE IF NOT EXISTS `tipos_movimiento_cajero` (
  `id_tipo_mov_cajero` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_mov_cajero` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_mov_cajero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipos_movimiento_cajero`
--

INSERT INTO `tipos_movimiento_cajero` (`id_tipo_mov_cajero`, `nombre_tipo_mov_cajero`) VALUES
(1, 'Ingreso'),
(2, 'Egreso'),
(3, 'Inicio de Caja'),
(4, 'Cierre de caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_recarga`
--

CREATE TABLE IF NOT EXISTS `tipos_recarga` (
  `id_tipo_recarga` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_recarga` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_recarga`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipos_recarga`
--

INSERT INTO `tipos_recarga` (`id_tipo_recarga`, `nombre_tipo_recarga`) VALUES
(1, 'Recarga Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE IF NOT EXISTS `tipos_usuario` (
  `id_tipo_usuario` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_usuario` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id_tipo_usuario`, `nombre_tipo_usuario`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_venta`
--

CREATE TABLE IF NOT EXISTS `tipos_venta` (
  `id_tipo_venta` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_venta` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipos_venta`
--

INSERT INTO `tipos_venta` (`id_tipo_venta`, `nombre_tipo_venta`) VALUES
(1, 'Venta Efectivo'),
(2, 'Precompra'),
(3, 'Venta Profesor'),
(4, 'Venta Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(255) NOT NULL AUTO_INCREMENT,
  `id_tipo_usuario` int(255) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `contraseña_usuario` varchar(255) NOT NULL,
  `alias_usuario` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `uq_email` (`email_usuario`),
  KEY `fk_usuario_tipo_usuario` (`id_tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_tipo_usuario`, `nombre_usuario`, `email_usuario`, `contraseña_usuario`, `alias_usuario`) VALUES
(1, 1, 'Cristian', 'molinacuario_97@hotmail.com', 'Barrilete25', 'Cristian'),
(2, 1, 'Daniel Merino', 'daniel.merino@katulatam.com', '1234', 'demoec'),
(3, 1, 'Estefania Alban', 'ealban@corpsunrise.com', '1234', 'adminpro'),
(6, 1, 'Juan Ortiz', 'aserekmolina@gmail.com', '1234', 'Juan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(255) NOT NULL AUTO_INCREMENT,
  `numero_pedido` int(255) NOT NULL,
  `id_cajero` int(255) NOT NULL,
  `id_producto` int(255) NOT NULL,
  `id_tipo_cliente` int(255) NOT NULL,
  `id_tipo_venta` int(255) NOT NULL,
  `id_cliente` varchar(100) NOT NULL,
  `cantidad_venta` int(255) NOT NULL,
  `total_venta` float(200,2) DEFAULT NULL,
  `fecha_venta` date NOT NULL,
  `hora_venta` time NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `fk_venta_cajero` (`id_cajero`),
  KEY `fk_venta_producto` (`id_producto`),
  KEY `fk_venta_tipo_cliente` (`id_tipo_cliente`),
  KEY `fk_venta_tipo_venta` (`id_tipo_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `numero_pedido`, `id_cajero`, `id_producto`, `id_tipo_cliente`, `id_tipo_venta`, `id_cliente`, `cantidad_venta`, `total_venta`, `fecha_venta`, `hora_venta`) VALUES
(13, 1050, 1, 102, 1, 1, '1001', 2, 2.50, '2020-10-31', '12:50:00'),
(14, 1050, 1, 103, 1, 1, '1001', 1, 1.50, '2020-10-31', '12:50:00'),
(15, 1051, 1, 102, 2, 1, '1722468236', 1, 2.50, '2020-10-31', '12:50:00'),
(16, 1051, 1, 103, 2, 1, '1722468236', 2, 2.50, '2020-10-31', '12:50:00'),
(17, 1052, 2, 102, 1, 1, '1005', 5, 10.50, '2020-10-31', '10:30:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bajas_producto`
--
ALTER TABLE `bajas_producto`
  ADD CONSTRAINT `fk_baja_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `cajeros`
--
ALTER TABLE `cajeros`
  ADD CONSTRAINT `fk_cajero_punto_venta` FOREIGN KEY (`id_punto_venta`) REFERENCES `puntos_venta` (`id_punto_venta`),
  ADD CONSTRAINT `fk_cajero_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `compras_proveedor`
--
ALTER TABLE `compras_proveedor`
  ADD CONSTRAINT `compras_proveedor_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `fk_compra_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_estudiante_familia` FOREIGN KEY (`id_familia`) REFERENCES `familias` (`id_familia`),
  ADD CONSTRAINT `fk_estudiante_grado` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`);

--
-- Filtros para la tabla `movimientos_cajeros`
--
ALTER TABLE `movimientos_cajeros`
  ADD CONSTRAINT `fk_movimiento_cajero` FOREIGN KEY (`id_cajero`) REFERENCES `cajeros` (`id_cajero`),
  ADD CONSTRAINT `fk_movimiento_tipo_cajero` FOREIGN KEY (`id_tipo_mov_cajero`) REFERENCES `tipos_movimiento_cajero` (`id_tipo_mov_cajero`);

--
-- Filtros para la tabla `movimientos_estudiantes`
--
ALTER TABLE `movimientos_estudiantes`
  ADD CONSTRAINT `fk_movimiento_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`);

--
-- Filtros para la tabla `movimientos_productos`
--
ALTER TABLE `movimientos_productos`
  ADD CONSTRAINT `fk_movimiento_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `movimientos_productos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `movimientos_profesores`
--
ALTER TABLE `movimientos_profesores`
  ADD CONSTRAINT `fk_movimiento_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`);

--
-- Filtros para la tabla `pagos_proveedor`
--
ALTER TABLE `pagos_proveedor`
  ADD CONSTRAINT `fk_pago_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `fk_pago_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_producto` (`id_categoria`),
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_clave_autorizacion`) REFERENCES `claves_autorizacion` (`id_clave_autorizacion`);

--
-- Filtros para la tabla `recargas`
--
ALTER TABLE `recargas`
  ADD CONSTRAINT `fk_recarga_forma_pago` FOREIGN KEY (`id_forma_pago`) REFERENCES `formas_pago` (`id_forma_pago`),
  ADD CONSTRAINT `fk_recarga_tipo_recarga` FOREIGN KEY (`id_tipo_recarga`) REFERENCES `tipos_recarga` (`id_tipo_recarga`),
  ADD CONSTRAINT `fk_recarga_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `rfid_estudiantes`
--
ALTER TABLE `rfid_estudiantes`
  ADD CONSTRAINT `fk_rfid_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`);

--
-- Filtros para la tabla `rfid_profesores`
--
ALTER TABLE `rfid_profesores`
  ADD CONSTRAINT `fk_rfid_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipos_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_venta_cajero` FOREIGN KEY (`id_cajero`) REFERENCES `cajeros` (`id_cajero`),
  ADD CONSTRAINT `fk_venta_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `fk_venta_tipo_cliente` FOREIGN KEY (`id_tipo_cliente`) REFERENCES `tipos_cliente` (`id_tipo_cliente`),
  ADD CONSTRAINT `fk_venta_tipo_venta` FOREIGN KEY (`id_tipo_venta`) REFERENCES `tipos_venta` (`id_tipo_venta`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
