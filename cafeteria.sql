-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-10-2020 a las 00:18:10
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajero`
--

DROP TABLE IF EXISTS `cajero`;
CREATE TABLE IF NOT EXISTS `cajero` (
  `COD_CAJERO` int(11) NOT NULL,
  `COD_PTOVENTA` int(11) DEFAULT NULL,
  `USUA_CAJERO` varchar(30) NOT NULL,
  `NOM_CAJERO` varchar(20) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  PRIMARY KEY (`COD_CAJERO`),
  KEY `FK_CAJERO_PUNTOVENTA` (`COD_PTOVENTA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catego_prod`
--

DROP TABLE IF EXISTS `catego_prod`;
CREATE TABLE IF NOT EXISTS `catego_prod` (
  `ID_CATEPROD` int(11) NOT NULL,
  `NOM_CATEPROD` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_CATEPROD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `catego_prod`
--

INSERT INTO `catego_prod` (`ID_CATEPROD`, `NOM_CATEPROD`) VALUES
(0, 'Almuerzo'),
(1, 'Desayuno'),
(2, 'Bebida'),
(3, 'Preparado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `ID_ESTU` varchar(4) NOT NULL,
  `ID_FAM` varchar(10) DEFAULT NULL,
  `ID_GRADO` int(11) DEFAULT NULL,
  `APELLIDO_ESTU` varchar(15) NOT NULL,
  `NOM_ESTU` varchar(15) NOT NULL,
  `SEXO_ESTU` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_ESTU`),
  KEY `FK_FAMILIA_ESTUDIANTE` (`ID_FAM`),
  KEY `FK_GRADO_ESTUDIANTE` (`ID_GRADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_ESTU`, `ID_FAM`, `ID_GRADO`, `APELLIDO_ESTU`, `NOM_ESTU`, `SEXO_ESTU`) VALUES
('1010', '1722468236', 1, 'Molina', 'Angela', 'Mujer'),
('1013', '1714764220', 1, 'Lopez', 'Maria Augusto', 'Masculino'),
('1025', '1714764220', 2, 'Alexander', 'Leona', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_compra_productos`
--

DROP TABLE IF EXISTS `estudiante_compra_productos`;
CREATE TABLE IF NOT EXISTS `estudiante_compra_productos` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_ESTU` varchar(4) NOT NULL,
  `ID_TIPO_COMPRA` int(11) DEFAULT NULL,
  `COD_CAJERO` int(11) DEFAULT NULL,
  `HORA_EST_COMPRA` time NOT NULL,
  `VALOR_EST_COMPRA` float NOT NULL,
  `CANTIDAD_EST_COMPRA` int(11) NOT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `FK_PRODUTO_VENTA_ESTUDIANTE2` (`ID_ESTU`),
  KEY `FK_RELATIONSHIP_19` (`ID_TIPO_COMPRA`),
  KEY `FK_RELATIONSHIP_21` (`COD_CAJERO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

DROP TABLE IF EXISTS `familia`;
CREATE TABLE IF NOT EXISTS `familia` (
  `ID_FAM` varchar(10) NOT NULL,
  `NOM_FAM` varchar(250) NOT NULL,
  `MAIL_FAM` varchar(150) NOT NULL,
  `CEL_FAM` varchar(15) NOT NULL,
  `SALDO_FAM` float NOT NULL,
  PRIMARY KEY (`ID_FAM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`ID_FAM`, `NOM_FAM`, `MAIL_FAM`, `CEL_FAM`, `SALDO_FAM`) VALUES
('1714764220', 'Merino Moreno', 'merino_daniel18@hotmail.com', '96358777', 22),
('1722468235', 'Monyalvo', 'montalvo_@gmail.com', '96365555', 12),
('1722468236', 'Molina Cabeza', 'molinacuario97@hotmail.com', '963639720', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

DROP TABLE IF EXISTS `grado`;
CREATE TABLE IF NOT EXISTS `grado` (
  `ID_GRADO` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_GRADO` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_GRADO`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`ID_GRADO`, `NOM_GRADO`) VALUES
(1, 'EGB2'),
(2, 'EGB6'),
(3, 'EGB7'),
(5, 'EGB10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `ID_MENU` int(11) NOT NULL,
  `ID_USUARIO` varchar(15) DEFAULT NULL,
  `FECHA_MENU` date NOT NULL,
  `FOTO_MENU` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_MENU`),
  KEY `FK_USUARIO_MENU` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_credito`
--

DROP TABLE IF EXISTS `pago_credito`;
CREATE TABLE IF NOT EXISTS `pago_credito` (
  `ID_PAG_CRED` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROF` varchar(10) DEFAULT NULL,
  `FECHA_PAG_CRED` date NOT NULL,
  `HORA_PAG_CRED` time NOT NULL,
  `VALOR_CRED` float DEFAULT NULL,
  `VALOR_DEB` float DEFAULT NULL,
  PRIMARY KEY (`ID_PAG_CRED`),
  KEY `FK_PAGO_PROFESOR_CREDITO` (`ID_PROF`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `pago_credito`
--

INSERT INTO `pago_credito` (`ID_PAG_CRED`, `ID_PROF`, `FECHA_PAG_CRED`, `HORA_PAG_CRED`, `VALOR_CRED`, `VALOR_DEB`) VALUES
(9, '1722453689', '2020-10-25', '17:59:40', 5, 1),
(10, '1722453689', '2020-10-25', '18:00:50', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

DROP TABLE IF EXISTS `privilegio`;
CREATE TABLE IF NOT EXISTS `privilegio` (
  `ID_PRIVILEGIO` int(11) NOT NULL,
  `ID_USUARIO` varchar(15) DEFAULT NULL,
  `ESTA_ESTU_EFE` tinyint(1) NOT NULL,
  `ESTA_PROF_EFE` tinyint(1) NOT NULL,
  `ESTA_MF_NUE` tinyint(1) NOT NULL,
  `ESTA_MF_RESTCONT` tinyint(1) NOT NULL,
  `ESTA_ME_NUE` tinyint(1) NOT NULL,
  `ESTA_ME_MOV` tinyint(1) NOT NULL,
  `ESTA_ME_RFID` tinyint(1) NOT NULL,
  `ESTA_ME_GRAD` tinyint(1) NOT NULL,
  `ESTA_MPROF_NUE` tinyint(1) NOT NULL,
  `ESTA_MPROF_MOV` tinyint(1) NOT NULL,
  `ESTA_MPROF_RFID` tinyint(1) NOT NULL,
  `ESTA_MPROF_CRED` tinyint(1) NOT NULL,
  `ESTA_MPROD_SEL` tinyint(1) NOT NULL,
  `ESTA_MPROD_NUE` tinyint(1) NOT NULL,
  `ESTA_MPROD_LIST` tinyint(1) NOT NULL,
  `ESTA_MPROD_FOTPROD` tinyint(1) NOT NULL,
  `ESTA_MINV_VER` tinyint(1) NOT NULL,
  `ESTA_MINV_MOVPROD` tinyint(1) NOT NULL,
  `ESTA_MINV_INGFAC` tinyint(1) NOT NULL,
  `ESTA_MPROV_NUE` tinyint(1) NOT NULL,
  `ESTA_MPROV_PAGPROV` tinyint(1) NOT NULL,
  `ESTA_MPROV_FAC` tinyint(1) NOT NULL,
  `ESTA_MENU_CARG` tinyint(1) NOT NULL,
  `ESTA_MINFOR_CUACAJ` tinyint(1) NOT NULL,
  `ESTA_MINFO_CUADM` tinyint(1) NOT NULL,
  `ESTA_MINFO_RESVEN` tinyint(1) NOT NULL,
  `ESTA_MINFO_VENPUNT` tinyint(1) NOT NULL,
  `ESTA_MINFO_REC` tinyint(1) NOT NULL,
  `ESTA_MINFO_CREPROF` tinyint(1) NOT NULL,
  `ESTA_MINFO_CUEXCOB` tinyint(1) NOT NULL,
  `ESTA_MINFO_VENMEN` tinyint(1) NOT NULL,
  `ESTA_MINFO_PRODVEN` tinyint(1) NOT NULL,
  `ESTA_MINFO_PRECOMEST` tinyint(1) NOT NULL,
  `ESTA_MINFO_PRECOMPROF` tinyint(1) NOT NULL,
  `ESTA_MINFO_SALFAM` tinyint(1) NOT NULL,
  `ESTA_MREVE_VENEFE` tinyint(1) NOT NULL,
  `ESTA_MREVE_RECFAM` tinyint(1) NOT NULL,
  `ESTA_MREVE_RECPROF` tinyint(1) NOT NULL,
  `ESTA_MREVE_CORCRE` tinyint(1) NOT NULL,
  `ESTA_MREVE_CIECAJ` tinyint(1) NOT NULL,
  `ESTA_MREVE_PAGCRE` tinyint(1) NOT NULL,
  `ESTA_MCUEVIR_SAL` tinyint(1) NOT NULL,
  `ESTA_MCUEVIR_BAN` tinyint(1) NOT NULL,
  `ESTA_MCUEVIR_PAGTER` tinyint(1) NOT NULL,
  `ESTA_MCUEVIR_TER` tinyint(1) NOT NULL,
  `ESTA_MIMPO_ESTU` tinyint(1) NOT NULL,
  `ESTA_MIMPO_PROF` tinyint(1) NOT NULL,
  `ESTA_MCONF_PTOVEN` tinyint(1) NOT NULL,
  `ESTA_MCONF_CATPRO` tinyint(1) NOT NULL,
  `ESTA_MCONF_CAJ` tinyint(1) NOT NULL,
  `ESTA_MCONF_USU` tinyint(1) NOT NULL,
  `ESTA_MCONF_PARAM` tinyint(1) NOT NULL,
  `ESTA_MCONF_KIO` tinyint(1) NOT NULL,
  `ESTA_MCONF_SUBFOT` tinyint(1) NOT NULL,
  `ESTA_MPAG_PAG` tinyint(1) NOT NULL,
  `ESTA_MPAG_COMBOLSMS` tinyint(1) NOT NULL,
  `ESTA_MPAG_COMBOLREC` tinyint(1) NOT NULL,
  `ESTA_MPALI_REG` tinyint(1) NOT NULL,
  `ESTA_MPALI_EST` tinyint(1) NOT NULL,
  `ESTA_MPALI_ENTRE` tinyint(1) NOT NULL,
  `ESTA_MPALI_CONF` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_PRIVILEGIO`),
  KEY `FK_TIENE` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_CATEPROD` int(11) DEFAULT NULL,
  `COD_PTOVENTA` int(11) DEFAULT NULL,
  `ID_TIPO_PROD` int(11) DEFAULT NULL,
  `COD_BARRA` varchar(100) DEFAULT NULL,
  `DESC_PROD` text NOT NULL,
  `COSTO_PROD` float NOT NULL,
  `PRECIO_VENTA` float NOT NULL,
  `CANTIDAD_PROD` int(11) NOT NULL,
  `ESTADO_INVE` int(11) NOT NULL,
  `ESTADO_PRECO` int(11) NOT NULL,
  `TITULO_PROD` varchar(100) DEFAULT NULL,
  `FOTO_PROD` varchar(255) DEFAULT NULL,
  `DESC_ADIC` text DEFAULT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `FK_ALMACENA` (`COD_PTOVENTA`),
  KEY `FK_PRODUCTO_CATEGORIAPROD` (`ID_CATEPROD`),
  KEY `FK_RELATIONSHIP_23` (`ID_TIPO_PROD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `ID_CATEPROD`, `COD_PTOVENTA`, `ID_TIPO_PROD`, `COD_BARRA`, `DESC_PROD`, `COSTO_PROD`, `PRECIO_VENTA`, `CANTIDAD_PROD`, `ESTADO_INVE`, `ESTADO_PRECO`, `TITULO_PROD`, `FOTO_PROD`, `DESC_ADIC`) VALUES
(0, 0, NULL, 1, '1234678', 'Pan', 0.25, 0.5, 10, 1, 0, NULL, NULL, NULL),
(15365, 0, NULL, 1, '12345', 'Arroz con Pollo', 12, 13, 1, 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `ID_PROF` varchar(10) NOT NULL,
  `APELLIDO_PROF` varchar(15) NOT NULL,
  `NOM_PROF` varchar(15) NOT NULL,
  `MAIL_PROF` varchar(150) NOT NULL,
  `CEL_PROF` varchar(15) NOT NULL,
  `SALDO_PROF` float NOT NULL,
  `CREDI_PROF` float NOT NULL,
  PRIMARY KEY (`ID_PROF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`ID_PROF`, `APELLIDO_PROF`, `NOM_PROF`, `MAIL_PROF`, `CEL_PROF`, `SALDO_PROF`, `CREDI_PROF`) VALUES
('1722453689', 'Lopez Man', 'Mariano Sanchez', 'molinacuario_97@yahoo.com', '096553632', 15, 2),
('1722468235', 'Saenz', 'Jean', 'aserekmolina@gmail.com', '0959154391', 3, 8),
('1722468236', 'Molina', 'Alexander', 'molinacuario_97@hotmail.com', '0963637219', 0.25, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_compra_productos`
--

DROP TABLE IF EXISTS `profesor_compra_productos`;
CREATE TABLE IF NOT EXISTS `profesor_compra_productos` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_PROF` varchar(10) NOT NULL,
  `ID_TIPO_COMPRA` int(11) DEFAULT NULL,
  `COD_CAJERO` int(11) DEFAULT NULL,
  `HORA_PROF_COMPRA` time NOT NULL,
  `VALOR_PROF_COMPRA` float NOT NULL,
  `CANTIDAD_PROF_COMPRA` int(11) NOT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `FK_PRODUCTO_VENTA_PROFESOR2` (`ID_PROF`),
  KEY `FK_RELATIONSHIP_20` (`ID_TIPO_COMPRA`),
  KEY `FK_RELATIONSHIP_22` (`COD_CAJERO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_venta`
--

DROP TABLE IF EXISTS `punto_venta`;
CREATE TABLE IF NOT EXISTS `punto_venta` (
  `COD_PTOVENTA` int(11) NOT NULL,
  `NOM_PTOVENTA` varchar(50) NOT NULL,
  PRIMARY KEY (`COD_PTOVENTA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recarga_efectivo`
--

DROP TABLE IF EXISTS `recarga_efectivo`;
CREATE TABLE IF NOT EXISTS `recarga_efectivo` (
  `ID_REC_EFEC` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROF` varchar(10) DEFAULT NULL,
  `ID_FAM` varchar(10) DEFAULT NULL,
  `FECHA_REC_EFEC` date NOT NULL,
  `HORA_REC_EFEC` time NOT NULL,
  `VALOR_REC_EFEC` float NOT NULL,
  PRIMARY KEY (`ID_REC_EFEC`),
  KEY `FK_PROFESOR_RECARGA_EFECTIVO` (`ID_PROF`),
  KEY `FK_RECARGA_FAMILIA_EFECTIVO` (`ID_FAM`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `recarga_efectivo`
--

INSERT INTO `recarga_efectivo` (`ID_REC_EFEC`, `ID_PROF`, `ID_FAM`, `FECHA_REC_EFEC`, `HORA_REC_EFEC`, `VALOR_REC_EFEC`) VALUES
(2, NULL, '1722468236', '2020-10-25', '17:07:06', 1),
(3, '1722468235', NULL, '2020-10-25', '17:07:20', 1),
(4, '1722468235', NULL, '2020-10-25', '17:07:47', 2),
(5, '1722453689', NULL, '2020-10-25', '17:07:58', 15),
(6, NULL, '1722468236', '2020-10-25', '17:08:14', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rfid`
--

DROP TABLE IF EXISTS `rfid`;
CREATE TABLE IF NOT EXISTS `rfid` (
  `ID_RFID` varchar(100) NOT NULL,
  `ID_ESTU` varchar(4) DEFAULT NULL,
  `ESTADO_RFID` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_RFID`),
  KEY `FK_ESTUDIANTE_RFID` (`ID_ESTU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `rfid`
--

INSERT INTO `rfid` (`ID_RFID`, `ID_ESTU`, `ESTADO_RFID`) VALUES
('1234', '1013', 'Si Registra'),
('8963', '1010', 'Si Registra'),
('986899', '1025', 'Si Registra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rfid_profesor`
--

DROP TABLE IF EXISTS `rfid_profesor`;
CREATE TABLE IF NOT EXISTS `rfid_profesor` (
  `ID_RFID` varchar(255) NOT NULL,
  `ID_PROF` varchar(10) NOT NULL,
  `ESTADO_RFID` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_RFID`),
  KEY `fk_rfid_profesor` (`ID_PROF`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rfid_profesor`
--

INSERT INTO `rfid_profesor` (`ID_RFID`, `ID_PROF`, `ESTADO_RFID`) VALUES
('2478', '1722453689', 'Si Registra'),
('124580', '1722468235', 'Si Registra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_compra`
--

DROP TABLE IF EXISTS `tipo_compra`;
CREATE TABLE IF NOT EXISTS `tipo_compra` (
  `ID_TIPO_COMPRA` int(11) NOT NULL,
  `NOMBRE_TIPO__COMPRA` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_TIPO_COMPRA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_prod`
--

DROP TABLE IF EXISTS `tipo_prod`;
CREATE TABLE IF NOT EXISTS `tipo_prod` (
  `ID_TIPO_PROD` int(11) NOT NULL,
  `NOM_PROD` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_TIPO_PROD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `tipo_prod`
--

INSERT INTO `tipo_prod` (`ID_TIPO_PROD`, `NOM_PROD`) VALUES
(1, 'Preparado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `ID_TIPO_USUARIO` int(11) NOT NULL,
  `NOM_TIPO_USUARIO` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_TIPO_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` varchar(15) NOT NULL,
  `ID_TIPO_USUARIO` int(11) DEFAULT NULL,
  `NOM_USUARIO` varchar(20) NOT NULL,
  `MAIL_USUARIO` varchar(150) DEFAULT NULL,
  `ALIAS_USUARIO` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `uq_nom_usuario` (`NOM_USUARIO`),
  KEY `FK_TIPO_USUARIO` (`ID_TIPO_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cajero`
--
ALTER TABLE `cajero`
  ADD CONSTRAINT `FK_CAJERO_PUNTOVENTA` FOREIGN KEY (`COD_PTOVENTA`) REFERENCES `punto_venta` (`COD_PTOVENTA`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `FK_FAMILIA_ESTUDIANTE` FOREIGN KEY (`ID_FAM`) REFERENCES `familia` (`ID_FAM`),
  ADD CONSTRAINT `FK_GRADO_ESTUDIANTE` FOREIGN KEY (`ID_GRADO`) REFERENCES `grado` (`ID_GRADO`);

--
-- Filtros para la tabla `estudiante_compra_productos`
--
ALTER TABLE `estudiante_compra_productos`
  ADD CONSTRAINT `FK_PRODUTO_VENTA_ESTUDIANTE` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `FK_PRODUTO_VENTA_ESTUDIANTE2` FOREIGN KEY (`ID_ESTU`) REFERENCES `estudiante` (`ID_ESTU`),
  ADD CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`ID_TIPO_COMPRA`) REFERENCES `tipo_compra` (`ID_TIPO_COMPRA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`COD_CAJERO`) REFERENCES `cajero` (`COD_CAJERO`);

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_USUARIO_MENU` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `pago_credito`
--
ALTER TABLE `pago_credito`
  ADD CONSTRAINT `FK_PAGO_PROFESOR_CREDITO` FOREIGN KEY (`ID_PROF`) REFERENCES `profesor` (`ID_PROF`);

--
-- Filtros para la tabla `privilegio`
--
ALTER TABLE `privilegio`
  ADD CONSTRAINT `FK_TIENE` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_ALMACENA` FOREIGN KEY (`COD_PTOVENTA`) REFERENCES `punto_venta` (`COD_PTOVENTA`),
  ADD CONSTRAINT `FK_PRODUCTO_CATEGORIAPROD` FOREIGN KEY (`ID_CATEPROD`) REFERENCES `catego_prod` (`ID_CATEPROD`),
  ADD CONSTRAINT `FK_RELATIONSHIP_23` FOREIGN KEY (`ID_TIPO_PROD`) REFERENCES `tipo_prod` (`ID_TIPO_PROD`);

--
-- Filtros para la tabla `profesor_compra_productos`
--
ALTER TABLE `profesor_compra_productos`
  ADD CONSTRAINT `FK_PRODUCTO_VENTA_PROFESOR` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `FK_PRODUCTO_VENTA_PROFESOR2` FOREIGN KEY (`ID_PROF`) REFERENCES `profesor` (`ID_PROF`),
  ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`ID_TIPO_COMPRA`) REFERENCES `tipo_compra` (`ID_TIPO_COMPRA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_22` FOREIGN KEY (`COD_CAJERO`) REFERENCES `cajero` (`COD_CAJERO`);

--
-- Filtros para la tabla `recarga_efectivo`
--
ALTER TABLE `recarga_efectivo`
  ADD CONSTRAINT `FK_PROFESOR_RECARGA_EFECTIVO` FOREIGN KEY (`ID_PROF`) REFERENCES `profesor` (`ID_PROF`),
  ADD CONSTRAINT `FK_RECARGA_FAMILIA_EFECTIVO` FOREIGN KEY (`ID_FAM`) REFERENCES `familia` (`ID_FAM`);

--
-- Filtros para la tabla `rfid`
--
ALTER TABLE `rfid`
  ADD CONSTRAINT `FK_ESTUDIANTE_RFID` FOREIGN KEY (`ID_ESTU`) REFERENCES `estudiante` (`ID_ESTU`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_TIPO_USUARIO` FOREIGN KEY (`ID_TIPO_USUARIO`) REFERENCES `tipo_usuario` (`ID_TIPO_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
