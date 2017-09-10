-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2017 a las 04:50:07
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
CREATE TABLE `campanna` (
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
('CP-00001', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1),
('CP-00002', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1),
('CP-00003', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1),
('CP-00004', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1),
('CP-00005', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1),
('CP-00006', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1),
('CP-00007', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1),
('CP-00008', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1),
('CP-00009', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1),
('CP-00010', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1),
('CP-00000', 'PROMOCION MES PATRIO 2017', '2017-09-01 18:28:04', '2017-09-30 18:28:10', 1, 1, '100000.00', 'OBERVACIONES', 'MENSAJE PATRIO', '2017-09-01 18:28:40', '2017-09-09 18:28:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna_asignacion`
--

DROP TABLE IF EXISTS `campanna_asignacion`;
CREATE TABLE `campanna_asignacion` (
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `Fecha_asignacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanna_asignacion`
--

INSERT INTO `campanna_asignacion` (`ID_Campannas`, `ID_Usuario`, `Fecha_asignacion`) VALUES
('CP-00004', 2, '2017-09-09 18:34:35'),
('CP-00007', 2, '2017-09-09 18:34:35'),
('CP-00000', 2, '2017-09-09 18:34:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna_cliente`
--

DROP TABLE IF EXISTS `campanna_cliente`;
CREATE TABLE `campanna_cliente` (
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `ID_Cliente` varchar(10) DEFAULT NULL,
  `Meta` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanna_cliente`
--

INSERT INTO `campanna_cliente` (`ID_Campannas`, `ID_Cliente`, `Meta`) VALUES
('CP-00000', '00666', '50000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna_estados`
--

DROP TABLE IF EXISTS `campanna_estados`;
CREATE TABLE `campanna_estados` (
  `ID_Estado` int(11) NOT NULL,
  `Nombre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
CREATE TABLE `campanna_registros` (
  `ID_Usuario` int(11) DEFAULT NULL,
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `Monto` decimal(10,4) DEFAULT NULL,
  `Tiempo` time DEFAULT NULL,
  `Comentarios` varchar(500) DEFAULT NULL,
  `ID_TPF` int(11) DEFAULT NULL,
  `ID_CLIENTE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanna_registros`
--

INSERT INTO `campanna_registros` (`ID_Usuario`, `ID_Campannas`, `Monto`, `Tiempo`, `Comentarios`, `ID_TPF`, `ID_CLIENTE`) VALUES
(2, 'CP-00000', '100.0000', '00:00:05', 'mi segundo comentario', 0, '0234'),
(2, 'CP-00000', '100.0000', '00:00:08', 'mi tercer comentario', 5, '0125'),
(2, 'CP-00000', '8.0000', '00:00:03', '8', 4, '01264'),
(2, 'CP-00000', '0.0000', '00:00:03', 't', 2, '0'),
(2, 'CP-00000', '0.0000', '00:00:01', 'j', 1, '0'),
(2, 'CP-00000', '0.0000', '00:00:03', 'd', 5, '0'),
(2, 'CP-00000', '0.0000', '00:00:01', 'd', 2, '222'),
(2, 'CP-00000', '0.0000', '00:00:02', 'f', 3, '1111'),
(2, 'CP-00000', '151.2500', '00:00:29', 'Comentario Final', 2, '00666'),
(2, 'CP-00000', '175.5000', '00:00:03', 'llamada final', 2, '66665'),
(2, 'CP-00000', '2235.2500', '00:00:03', 'saldo', 4, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna_tipificacion`
--

DROP TABLE IF EXISTS `campanna_tipificacion`;
CREATE TABLE `campanna_tipificacion` (
  `ID_TPF` int(11) NOT NULL,
  `Tipificacion` varchar(100) DEFAULT NULL,
  `Fecha_TPF` datetime DEFAULT NULL,
  `Activa` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
CREATE TABLE `clientes` (
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
('00666', 'SATAN', 'INFIERNO', '666-666', '666-666', '666-666');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos` (
  `IdGrupo` int(11) NOT NULL,
  `NombreGrupo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IdResponsable` int(11) NOT NULL,
  `Estado` int(11) NOT NULL,
  `FechaCreada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`IdGrupo`, `NombreGrupo`, `IdResponsable`, `Estado`, `FechaCreada`) VALUES
(1, 'grupo 1', 2, 1, '2017-09-05 00:00:00'),
(2, 'grupo 2', 2, 1, '2017-09-05 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
CREATE TABLE `usuario` (
  `IdUser` int(11) NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Rol` int(1) NOT NULL,
  `Activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUser`, `Usuario`, `Nombre`, `contrasenia`, `Rol`, `Activo`) VALUES
(1, 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0, b'1'),
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
-- Estructura Stand-in para la vista `view_campannas_clientes`
--
DROP VIEW IF EXISTS `view_campannas_clientes`;
CREATE TABLE `view_campannas_clientes` (
`ID_Campannas` varchar(10)
,`ID_Cliente` varchar(10)
,`Nombre` varchar(255)
,`Telefono1` varchar(10)
,`Meta` decimal(10,0)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_campannas_info`
--
DROP VIEW IF EXISTS `view_campannas_info`;
CREATE TABLE `view_campannas_info` (
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
,`Estado` int(5)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_monto_clientes`
--
DROP VIEW IF EXISTS `view_monto_clientes`;
CREATE TABLE `view_monto_clientes` (
`ID_Campannas` varchar(10)
,`ID_CLIENTE` varchar(10)
,`MONTO_REAL` decimal(32,4)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_campannas_clientes`
--
DROP TABLE IF EXISTS `view_campannas_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_campannas_clientes`  AS  select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`ID_Cliente` AS `ID_Cliente`,`t1`.`Nombre` AS `Nombre`,`t1`.`Telefono1` AS `Telefono1`,`t0`.`Meta` AS `Meta` from (`campanna_cliente` `t0` join `clientes` `t1` on((`t0`.`ID_Cliente` = `t1`.`ID_Cliente`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_campannas_info`
--
DROP TABLE IF EXISTS `view_campannas_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_campannas_info`  AS  select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`Nombre` AS `Nombre`,`t1`.`Fecha_Inicio` AS `Fecha_Inicio`,`t1`.`Fecha_Cierre` AS `Fecha_Cierre`,count(`t0`.`ID_Campannas`) AS `TOTAL_LLAMADAS`,sec_to_time(sum(time_to_sec(`t0`.`Tiempo`))) AS `TIEMPO_TOTAL`,sec_to_time(avg(time_to_sec(`t0`.`Tiempo`))) AS `TIEMPO_PROMEDIO`,`t1`.`Meta` AS `Meta`,sum(`t0`.`Monto`) AS `MONTO_REAL`,`t1`.`Observaciones` AS `Observaciones`,`t1`.`Estado` AS `Estado` from (`campanna_registros` `t0` join `campanna` `t1` on((`t0`.`ID_Campannas` = `t1`.`ID_Campannas`))) group by `t0`.`ID_Campannas` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_monto_clientes`
--
DROP TABLE IF EXISTS `view_monto_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_monto_clientes`  AS  select `t0`.`ID_Campannas` AS `ID_Campannas`,`t0`.`ID_CLIENTE` AS `ID_CLIENTE`,sum(`t0`.`Monto`) AS `MONTO_REAL` from `campanna_registros` `t0` group by `t0`.`ID_Campannas`,`t0`.`ID_CLIENTE` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campanna_estados`
--
ALTER TABLE `campanna_estados`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indices de la tabla `campanna_tipificacion`
--
ALTER TABLE `campanna_tipificacion`
  ADD PRIMARY KEY (`ID_TPF`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`IdGrupo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campanna_estados`
--
ALTER TABLE `campanna_estados`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `campanna_tipificacion`
--
ALTER TABLE `campanna_tipificacion`
  MODIFY `ID_TPF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `IdGrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
