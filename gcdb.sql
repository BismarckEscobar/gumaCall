-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2017 a las 01:17:57
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gcdb`
--
CREATE DATABASE IF NOT EXISTS `gcdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gcdb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna`
--

DROP TABLE IF EXISTS `campanna`;
CREATE TABLE IF NOT EXISTS `campanna` (
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Fecha_Inicio` datetime DEFAULT NULL,
  `Fecha_Cierre` datetime DEFAULT NULL,
  `Estado` int(5) DEFAULT NULL,
  `Activo` int(5) DEFAULT NULL,
  `Meta` decimal(10,2) DEFAULT NULL,
  `Observaciones` varchar(500) DEFAULT NULL,
  `Mensaje` varchar(500) DEFAULT NULL,
  `Fecha_Creacion` datetime DEFAULT NULL,
  `Fecha_ultima_actualizado` datetime DEFAULT NULL,
  `ID_Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanna`
--

INSERT INTO `campanna` (`ID_Campannas`, `Nombre`, `Fecha_Inicio`, `Fecha_Cierre`, `Estado`, `Activo`, `Meta`, `Observaciones`, `Mensaje`, `Fecha_Creacion`, `Fecha_ultima_actualizado`, `ID_Usuario`) VALUES
('CP-00004', 'campaña prueba', '2017-09-01 12:07:47', '2017-09-30 12:07:52', 1, 1, '100000.00', 'observaciones', 'mensaje', '2017-09-19 12:08:18', '2017-09-19 12:08:21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna_asignacion`
--

DROP TABLE IF EXISTS `campanna_asignacion`;
CREATE TABLE IF NOT EXISTS `campanna_asignacion` (
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `Fecha_asignacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanna_asignacion`
--

INSERT INTO `campanna_asignacion` (`ID_Campannas`, `ID_Usuario`, `Fecha_asignacion`) VALUES
('CP-00004', 2, '2017-09-19 12:08:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna_cliente`
--

DROP TABLE IF EXISTS `campanna_cliente`;
CREATE TABLE IF NOT EXISTS `campanna_cliente` (
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `ID_Cliente` varchar(10) DEFAULT NULL,
  `Meta` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanna_cliente`
--

INSERT INTO `campanna_cliente` (`ID_Campannas`, `ID_Cliente`, `Meta`) VALUES
('CP-00004', '03000', '20000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna_estados`
--

DROP TABLE IF EXISTS `campanna_estados`;
CREATE TABLE IF NOT EXISTS `campanna_estados` (
  `ID_Estado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_Estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanna_estados`
--

INSERT INTO `campanna_estados` (`ID_Estado`, `Nombre`) VALUES
(1, 'Activa'),
(2, 'Inactiva'),
(3, 'Aprobada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna_registros`
--

DROP TABLE IF EXISTS `campanna_registros`;
CREATE TABLE IF NOT EXISTS `campanna_registros` (
  `ID_Usuario` int(11) DEFAULT NULL,
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `Num_CLI` varchar(10) DEFAULT NULL,
  `ID_CLIENTE` varchar(10) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Duracion` time DEFAULT NULL,
  `Monto` decimal(10,4) DEFAULT NULL,
  `Comentarios` varchar(500) DEFAULT NULL,
  `ID_TPF` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna_tipificacion`
--

DROP TABLE IF EXISTS `campanna_tipificacion`;
CREATE TABLE IF NOT EXISTS `campanna_tipificacion` (
  `ID_TPF` int(11) NOT NULL AUTO_INCREMENT,
  `Tipificacion` varchar(100) DEFAULT NULL,
  `Fecha_TPF` datetime DEFAULT NULL,
  `Activa` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_TPF`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanna_tipificacion`
--

INSERT INTO `campanna_tipificacion` (`ID_TPF`, `Tipificacion`, `Fecha_TPF`, `Activa`) VALUES
(1, 'Razon', '2017-09-09 16:04:54', 1),
(2, 'Razon 2', '2017-09-09 16:04:54', 1),
(3, 'Razon 3', '2017-09-09 16:04:54', 1),
(4, 'Razon 4', '2017-09-09 16:04:54', 1),
(5, 'Razon 5', '2017-09-09 16:04:54', 1),
(6, 'Razon 6', '2017-09-09 16:04:54', 1),
(7, 'Razon 7', '2017-09-09 16:04:54', 1),
(8, 'Razon 8', '2017-09-09 16:04:54', 1),
(9, 'Razon 9', '2017-09-09 16:04:54', 1),
(10, 'Razon 10', '2017-09-09 16:04:54', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `ID_Cliente` varchar(10) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Telefono1` varchar(10) DEFAULT NULL,
  `Telefono2` varchar(10) DEFAULT NULL,
  `Telefono3` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_Cliente`, `Nombre`, `Direccion`, `Telefono1`, `Telefono2`, `Telefono3`) VALUES
('03000', 'CLIENTE DE PRUEBA', 'INFIERNO', '82449100', '82449100', '82449100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `IdGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `NombreGrupo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IdResponsable` int(11) NOT NULL,
  `Estado` int(11) NOT NULL,
  `FechaCreada` datetime NOT NULL,
  PRIMARY KEY (`IdGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`IdGrupo`, `NombreGrupo`, `IdResponsable`, `Estado`, `FechaCreada`) VALUES
(1, 'grupo 1', 2, 1, '2017-09-05 00:00:00'),
(2, 'grupo 2', 2, 1, '2017-09-05 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_asignacion`
--

DROP TABLE IF EXISTS `grupo_asignacion`;
CREATE TABLE IF NOT EXISTS `grupo_asignacion` (
  `IdGrupo` int(11) NOT NULL,
  `ID_Vendedor` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llaves`
--

DROP TABLE IF EXISTS `llaves`;
CREATE TABLE IF NOT EXISTS `llaves` (
  `concepto` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `llaves`
--

INSERT INTO `llaves` (`concepto`, `valor`) VALUES
('Campa?a', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `descripcion`, `tipo`) VALUES
(1, 'admin', 0),
(2, 'Agente', 1),
(3, 'Supervisor', 2),
(4, 'Gerente', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Rol` int(1) NOT NULL,
  `Activo` bit(1) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUser`, `Usuario`, `Nombre`, `contrasenia`, `Rol`, `Activo`) VALUES
(1, 'SU', 'SU', 'e10adc3949ba59abbe56e057f20f883e', 0, b'1'),
(2, 'SAC1', 'MARYAN', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(3, 'SAC2', 'BISMARK', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(4, 'SAC3', 'SAC3', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(5, 'SAC4', 'SAC4', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(6, 'SAC5', 'SAC5', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(7, 'SAC6', 'SAC6', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(8, 'SAC7', 'SAC7', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(9, 'SAC8', 'SAC8', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(10, 'SAC9', 'SAC9', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_registros`
--

DROP TABLE IF EXISTS `usuario_registros`;
CREATE TABLE IF NOT EXISTS `usuario_registros` (
  `ID_Usuario` int(11) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `UserName` varchar(10) DEFAULT NULL,
  `Nombre` varchar(10) DEFAULT NULL,
  `FechaInicio` datetime DEFAULT NULL,
  `FechaFinal` datetime DEFAULT NULL,
  `Tiempo_Total` time DEFAULT NULL,
  `Tipo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_registros`
--

INSERT INTO `usuario_registros` (`ID_Usuario`, `session_id`, `UserName`, `Nombre`, `FechaInicio`, `FechaFinal`, `Tiempo_Total`, `Tipo`) VALUES
(2, '42aa4bfb29561962d769191772c89f60146c5273', 'SAC1', 'MARYAN', '2017-09-19 12:02:13', '2017-09-19 14:03:41', '02:01:28', 'ON'),
(2, '0729cbca80ae19b0284d8c62be3641a695d2d8cf', 'SAC1', 'MARYAN', '2017-09-19 14:05:00', '2017-09-19 14:05:10', '00:00:10', 'ON'),
(1, '5c65a7479456889738151cc2d7c4b9f5718d448c', 'SU', 'SU', '2017-09-19 14:05:35', '2017-09-19 14:34:02', '00:28:27', 'ON'),
(1, '76938ff8350828928ce88a0df6872632fab8d99a', 'SU', 'SU', '2017-09-20 10:06:18', '2017-09-20 10:20:12', '00:13:54', 'ON'),
(2, 'b1179a53a085c581c2e0ff120846a4abf8230f1e', 'SAC1', 'MARYAN', '2017-09-20 10:20:22', '2017-09-20 10:25:41', '00:05:19', 'ON'),
(2, 'ba2d0843682d5a6e39a8c7de9fc5b2eb9ba19ea6', 'SAC1', 'MARYAN', '2017-09-20 10:25:59', '2017-09-20 10:27:40', '00:01:41', 'ON'),
(1, 'd7600d573e1c3ec4b3b14530764a45088eea5170', 'SU', 'SU', '2017-09-20 10:27:49', '2017-09-20 10:28:47', '00:00:58', 'ON'),
(2, 'acdcad9179d761111c06f6d28a515f3f84a88afa', 'SAC1', 'MARYAN', '2017-09-20 10:28:50', '2017-09-20 10:51:16', '00:22:26', 'ON'),
(1, '52e8115ca1e5118593ecd1ed5421f588921de099', 'SU', 'SU', '2017-09-20 10:51:34', '2017-09-20 10:52:51', '00:01:17', 'ON'),
(2, '0523ec58b1934038f648bed11ddbe1c9a84c7e60', 'SAC1', 'MARYAN', '2017-09-20 10:53:03', '2017-09-20 10:56:34', '00:03:31', 'ON'),
(1, '3d41bcf34d8d7c952aa930673187eeb6f7c3e774', 'SU', 'SU', '2017-09-20 10:56:45', '2017-09-20 11:06:40', '00:09:55', 'ON'),
(2, 'edfebad278ed343fdaa35dc5bdd5251793019fa0', 'SAC1', 'MARYAN', '2017-09-20 11:08:12', '2017-09-20 11:08:15', '00:00:03', 'ON'),
(2, 'e1eee6b79afd4423fd08de3ee64c3ca83a6ce845', 'SAC1', 'MARYAN', '2017-09-20 11:52:41', '2017-09-20 14:09:16', '02:16:35', 'ON'),
(1, 'e8f51cf472856a0aa9729aa94556e0a30b6ff82e', 'SU', 'SU', '2017-09-20 14:09:38', '2017-09-20 14:09:45', '00:00:07', 'ON'),
(2, '300c66d5cd3b36f39eb097f8a021b32660e28bc4', 'SAC1', 'MARYAN', '2017-09-20 14:09:48', '2017-09-20 14:19:38', '00:09:50', 'ON'),
(2, 'c2111ac14b8dcf202d8ce36c38ed2d95645a5bec', 'SAC1', 'MARYAN', '2017-09-20 14:19:47', '2017-09-20 14:20:08', '00:00:21', 'ON'),
(2, '3e8dfc1e487fb000de2ae57d3d20a73733e03091', 'SAC1', 'MARYAN', '2017-09-20 14:20:14', '2017-09-20 14:26:52', '00:06:38', 'ON'),
(2, 'ca6abbd3079137ef66bbcd4ac927417ac5405a92', 'SAC1', 'MARYAN', '2017-09-20 14:26:58', '2017-09-20 15:01:09', '00:34:11', 'ON'),
(2, 'c813b7968505606b3c4821baad97ccca75fa4312', 'SAC1', 'MARYAN', '2017-09-20 15:01:28', '2017-09-20 15:01:50', '00:00:22', 'ON'),
(2, 'ea83f6958ae2caf514a8d433af98138655299b42', 'SAC1', 'MARYAN', '2017-09-20 15:01:53', '2017-09-20 15:02:01', '00:00:08', 'ON'),
(1, '562e5bf11c7ca104a9530bf783da059dfebef426', 'SU', 'SU', '2017-09-20 15:02:05', '2017-09-20 15:04:18', '00:02:13', 'ON'),
(2, 'd99d381797e4356c5ae8b7fa6e3d1999ef243e01', 'SAC1', 'MARYAN', '2017-09-20 15:04:22', '2017-09-20 15:06:23', '00:02:01', 'ON'),
(2, '6a9d05d8e044af9c7b4d71c43eac056b72114641', 'SAC1', 'MARYAN', '2017-09-20 15:07:49', NULL, NULL, 'ON'),
(2, '437d2eb1423dca7caeb53b1d48c0a281a0861878', 'SAC1', 'MARYAN', '2017-09-20 15:10:49', NULL, NULL, 'ON'),
(2, '7061ea58b7bab457e22d8ae8941f6f2152aec105', 'SAC1', 'MARYAN', '2017-09-20 15:14:03', '2017-09-20 15:22:27', '00:08:24', 'ON');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_campannas_clientes`
--
DROP VIEW IF EXISTS `view_campannas_clientes`;
CREATE TABLE IF NOT EXISTS `view_campannas_clientes` (
`ID_Campannas` varchar(10)
,`ID_Cliente` varchar(10)
,`Nombre` varchar(255)
,`Telefono1` varchar(10)
,`Telefono2` varchar(10)
,`Telefono3` varchar(10)
,`Meta` decimal(10,0)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_campannas_info`
--
DROP VIEW IF EXISTS `view_campannas_info`;
CREATE TABLE IF NOT EXISTS `view_campannas_info` (
`ID_Campannas` varchar(10)
,`Nombre` varchar(100)
,`Fecha_Inicio` datetime
,`Fecha_Cierre` datetime
,`TOTAL_LLAMADAS` bigint(21)
,`TIEMPO_TOTAL` time
,`TIEMPO_PROMEDIO` time(4)
,`Meta` decimal(10,2)
,`MONTO_REAL` decimal(32,4)
,`Observaciones` varchar(500)
,`Mensaje` varchar(500)
,`Estado` int(5)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_monto_clientes`
--
DROP VIEW IF EXISTS `view_monto_clientes`;
CREATE TABLE IF NOT EXISTS `view_monto_clientes` (
`ID_Campannas` varchar(10)
,`ID_CLIENTE` varchar(10)
,`MONTO_REAL` decimal(32,4)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_campannas_clientes`
--
DROP TABLE IF EXISTS `view_campannas_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_campannas_clientes`  AS  select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`ID_Cliente` AS `ID_Cliente`,`t1`.`Nombre` AS `Nombre`,`t1`.`Telefono1` AS `Telefono1`,`t1`.`Telefono2` AS `Telefono2`,`t1`.`Telefono3` AS `Telefono3`,`t0`.`Meta` AS `Meta` from (`campanna_cliente` `t0` join `clientes` `t1` on((`t0`.`ID_Cliente` = `t1`.`ID_Cliente`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_campannas_info`
--
DROP TABLE IF EXISTS `view_campannas_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_campannas_info`  AS  select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`Nombre` AS `Nombre`,`t1`.`Fecha_Inicio` AS `Fecha_Inicio`,`t1`.`Fecha_Cierre` AS `Fecha_Cierre`,count(`t0`.`ID_Campannas`) AS `TOTAL_LLAMADAS`,sec_to_time(sum(time_to_sec(`t0`.`Duracion`))) AS `TIEMPO_TOTAL`,sec_to_time(avg(time_to_sec(`t0`.`Duracion`))) AS `TIEMPO_PROMEDIO`,`t1`.`Meta` AS `Meta`,sum(`t0`.`Monto`) AS `MONTO_REAL`,`t1`.`Observaciones` AS `Observaciones`,`t1`.`Mensaje` AS `Mensaje`,`t1`.`Estado` AS `Estado` from (`campanna_registros` `t0` join `campanna` `t1` on((`t0`.`ID_Campannas` = `t1`.`ID_Campannas`))) group by `t0`.`ID_Campannas` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_monto_clientes`
--
DROP TABLE IF EXISTS `view_monto_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_monto_clientes`  AS  select `t0`.`ID_Campannas` AS `ID_Campannas`,`t0`.`ID_CLIENTE` AS `ID_CLIENTE`,sum(`t0`.`Monto`) AS `MONTO_REAL` from `campanna_registros` `t0` group by `t0`.`ID_Campannas`,`t0`.`ID_CLIENTE` ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
