-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2017 a las 16:36:30
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

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_infoCampania`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_infoCampania` (IN `ID_CampanniaC` VARCHAR(20))  BEGIN
SET @totalLlamadas = (SELECT TOTAL_LLAMADAS FROM view_campannas_info WHERE ID_Campannas = ID_CampanniaC );
SET @tiempoPro = (SELECT TIEMPO_PROMEDIO FROM view_campannas_info WHERE ID_Campannas = ID_CampanniaC );
SET @tiempoTotal = (SELECT TIEMPO_TOTAL FROM view_campannas_info WHERE ID_Campannas = ID_CampanniaC );
SET @realMonto = (SELECT SUM(MONTO_REAL) FROM view_monto_clientes WHERE ID_Campannas = ID_CampanniaC );
SET @unidad = (SELECT SUM(Unidad) FROM campanna_registros WHERE ID_Campannas = ID_CampanniaC);

SELECT 
cm.ID_Campannas AS ID_Campannas,
cm.Nombre AS nombre,
cm.Fecha_Inicio AS fechaInicio,
cm.Fecha_Cierre AS fechaCierre,
cm.Meta AS meta,
cm.Observaciones AS observacion,
cm.Mensaje AS mensaje,
IF(ISNULL(@totalLlamadas),0, @totalLlamadas) AS totalLlamadas,
IF(ISNULL(@tiempoPro),0, @tiempoPro) AS tiempoPromedio,
IF(ISNULL(@tiempoTotal),0, @tiempoTotal) AS tiempoTotal,
IF(ISNULL(@realMonto),0,@realMonto) AS montoReal,
IF(ISNULL(@unidad),0, @unidad) AS unidad

FROM campanna cm




WHERE cm.ID_Campannas = ID_CampanniaC;

END$$

DROP PROCEDURE IF EXISTS `sp_infoCliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_infoCliente` (IN `idClienteC` VARCHAR(50))  begin
	SELECT 
		cr.ID_Campannas AS campania,
		SUM(cr.Monto) AS monto,
		SUM(cr.Unidad) AS  unidad,
		cc.Meta AS meta,
		cl.Nombre AS nombre,
		cl.Direccion AS direccion,
		cl.Telefono1 AS telefono1,
		cl.Telefono2 AS telefono2,
		cl.Telefono3 AS Telefono3,
		cl.ID_Cliente as idCliente,
		cl.Vendedor AS agente
	FROM clientes cl
	INNER JOIN campanna_cliente cc ON cl.ID_Cliente = cc.ID_Cliente
	INNER JOIN campanna_registros cr ON cc.ID_Cliente = cr.ID_CLIENTE
	WHERE cl.ID_CLIENTE = idClienteC AND cc.ID_Campannas = cr.ID_Campannas
	GROUP BY cr.ID_Campannas
 
UNION
 
		SELECT 
		cc.ID_Campannas AS campania,
		'0' AS monto,
		'0' AS unidad,
		cc.Meta AS meta,
		cl.Nombre AS nombre,
		cl.Direccion AS direccion,
		cl.Telefono1 AS telefono1,
		cl.Telefono2 AS telefono2,
		cl.Telefono3 AS Telefono3,
		cl.ID_Cliente as idCliente,
		cl.Vendedor AS agente
	FROM clientes cl
	INNER JOIN campanna_cliente cc ON cl.ID_Cliente = cc.ID_Cliente	
	WHERE cc.ID_Campannas NOT IN (SELECT cr.ID_Campannas FROM campanna_registros cr WHERE ID_Cliente = idClienteC ) AND
	cc.ID_Campannas IN (SELECT cc.ID_Campannas FROM campanna_asignacion cc) AND cl.ID_CLIENTE = idClienteC
	GROUP BY cc.ID_Campannas;
end$$

DROP PROCEDURE IF EXISTS `sp_infoUsuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_infoUsuario` (IN `ID_UsuarioC` INT(11), IN `desde` DATETIME, IN `hasta` DATETIME)  BEGIN
SET @tiempoON = 
(SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(Tiempo_Total))) 
FROM usuario_registros WHERE Tipo = 'ON' AND ID_Usuario = ID_UsuarioC
AND FechaInicio > desde AND FechaFinal < hasta);

SET @tiempoPAUSA =
(SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(Tiempo_Total))) AS horasPAUSA
FROM usuario_registros WHERE Tipo = 'PAUSA' AND ID_Usuario = ID_UsuarioC
AND FechaInicio >= desde AND FechaFinal <= hasta);

SELECT IF(ISNULL(@tiempoON),0, @tiempoON) AS tiempoON,
IF(ISNULL(@tiempoPAUSA),0, @tiempoPAUSA) AS tiempoPAUSA,
IF(ISNULL(TIMEDIFF(@tiempoON,@tiempoPAUSA)), 0, TIMEDIFF(@tiempoON,@tiempoPAUSA)) AS tiempoTotal,
us.IdUser AS IdUser,
us.Nombre AS nombre,
us.Usuario AS usuario,
us.Activo as activo,
desde AS fecha1,
hasta AS fecha2
FROM usuario us
WHERE IdUser = ID_UsuarioC
GROUP BY usuario;

END$$

DROP PROCEDURE IF EXISTS `sp_lista_clientes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lista_clientes` (IN `campania` VARCHAR(12), IN `usuarioC` INT)  BEGIN
SELECT
	cl.ID_Cliente AS ID_Cliente,
	cl.Nombre AS Nombre
FROM
	campanna_asignacion ca
INNER JOIN grupos gp ON gp.IdResponsable = ca.ID_Usuario
INNER JOIN grupo_asignacion ga ON gp.IdGrupo = ga.IdGrupo
INNER JOIN clientes cl ON cl.Vendedor = ga.Vendedor
WHERE
	ca.ID_Campannas = campania AND gp.IdResponsable = usuarioC ;

END$$

--
-- Funciones
--
DROP FUNCTION IF EXISTS `fn_insertCliente`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_insertCliente` (`ID_ClienteC` VARCHAR(20), `NombreC` VARCHAR(100), `D‏ireccionC` VARCHAR(100), `Telefono1C` INT, `Telefono2C` INT, `Telefono3C` INT, `VendedorC` VARCHAR(10)) RETURNS INT(11) BEGIN
	INSERT INTO clientes VALUES(ID_ClienteC,NombreC,D‏ireccionC,Telefono1C,Telefono2C,Telefono3C,VendedorC);

	RETURN 1;
END$$

DELIMITER ;

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
('CP-00001', 'campaña prueba', '2017-09-25 00:00:00', '2017-09-30 00:00:00', 2, 1, '40000.00', 'Ninguna', 'Ninguno', '2017-09-25 09:34:35', NULL, 1),
('CP-00002', 'campaña prueba numero', '2017-09-26 00:00:00', '2017-09-30 00:00:00', 1, 1, '500000.00', 'Datos de prueba', 'Mensaje de prueba 22', '2017-09-26 11:26:17', NULL, 1),
('CP-00003', 'campaña prueba CP-00003', '2017-09-26 00:00:00', '2017-10-06 00:00:00', 1, 1, '30000.00', 'Datos de prueba 2', 'Mensaje de prueba', '2017-09-26 16:32:50', NULL, 1),
('CP-00004', 'nombre CP-00004', '2017-09-20 00:00:00', '2017-11-01 00:00:00', 1, 1, '25000.00', 'Datos de prueba editado 3', 'Datos de prueba editado', '2017-09-26 16:35:27', NULL, 1),
('CP-00005', 'campaña cp-00005', '2017-09-25 00:00:00', '2017-10-06 00:00:00', 1, 1, '50000.00', 'Campaña de prueba observaciones', 'Campaña de prueba mensaje', '2017-09-27 16:24:21', NULL, 1),
('CP-00006', 'prueba', '2017-10-09 00:00:00', '2017-10-22 00:00:00', 1, 1, '50000.00', 'ahora si\n', 'ahora si', '2017-10-09 08:38:33', NULL, 1),
('CP-00007', 'prueba 007', '2017-10-09 00:00:00', '2017-10-28 00:00:00', 1, 1, '80000.00', 'Prueba 007', 'Prueba 007', '2017-10-09 13:55:27', NULL, 1),
('CP-00008', 'prueba 008', '2017-10-09 00:00:00', '2017-10-14 00:00:00', 1, 1, '80000.00', 'campaña numero 008', 'Estos son datos de prueba', '2017-10-10 14:43:27', NULL, 1),
('CP-00009', 'campaña 009', '2017-10-09 00:00:00', '2017-10-14 00:00:00', 1, 1, '78000.00', 'Campaña numero 009', 'Datos de prueba para Campaña numero 009', '2017-10-10 15:25:28', NULL, 1),
('CP-00010', 'campaña de prueba 0010', '2017-10-16 00:00:00', '2017-10-21 00:00:00', 1, 1, '100000.00', 'DATOS DE PRUEBA PARA OBSERVACION', 'DATOS DE PRUEBA PARA MENSAJE', '2017-10-16 18:09:03', NULL, 1),
('CP-00011', 'EXCEL', '2017-10-15 00:00:00', '2017-10-21 00:00:00', 1, 1, '78000.00', 'prueba de subida de excel', 'prueba de subida de excel 2', '2017-10-19 09:27:48', NULL, 1),
('CP-00012', 'EXCEL PRUEBA', '2017-10-15 00:00:00', '2017-10-21 00:00:00', 1, 1, '780050.00', 'NINGUNA', 'NINGUNA', '2017-10-19 09:30:45', NULL, 1),
('CP-00013', 'prueba excel de nuevo', '2017-10-22 00:00:00', '2017-10-28 00:00:00', 1, 1, '89000.00', 'ninguna', 'ninguno', '2017-10-19 09:33:18', NULL, 1),
('CP-00014', 'PRUEBA SUBIDA DE EXCEL OCTUBRE 2017', '2017-10-15 00:00:00', '2017-10-21 00:00:00', 1, 1, '450000.00', 'PRUEBA SUBIDA DE EXCEL OCTUBRE 2017', 'PRUEBA SUBIDA DE EXCEL OCTUBRE 2017', '2017-10-20 13:53:25', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campanna_asignacion`
--

DROP TABLE IF EXISTS `campanna_asignacion`;
CREATE TABLE `campanna_asignacion` (
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `ID_Usuario` varchar(11) DEFAULT NULL,
  `Fecha_asignacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanna_asignacion`
--

INSERT INTO `campanna_asignacion` (`ID_Campannas`, `ID_Usuario`, `Fecha_asignacion`) VALUES
('CP-00005', '3', '2017-10-10 15:24:22'),
('CP-00005', '4', '2017-10-10 15:24:22'),
('CP-00005', '5', '2017-10-10 15:24:22'),
('CP-00005', '6', '2017-10-10 15:24:22'),
('CP-00005', '7', '2017-10-10 15:24:22'),
('CP-00005', '8', '2017-10-10 15:24:22'),
('CP-00005', '9', '2017-10-10 15:24:22'),
('CP-00005', '10', '2017-10-10 15:24:22'),
('CP-00001', '3', '2017-10-10 16:10:48'),
('CP-00004', '2', '2017-10-11 08:33:24'),
('CP-00004', '10', '2017-10-11 08:33:24'),
('CP-00008', '2', '2017-10-11 11:49:01'),
('CP-00006', '2', '2017-10-11 12:07:07'),
('CP-00006', '3', '2017-10-11 12:07:07'),
('CP-00006', '7', '2017-10-11 12:07:07'),
('CP-00009', '2', '2017-10-11 15:39:59'),
('CP-00009', '5', '2017-10-11 15:39:59'),
('CP-00009', '6', '2017-10-11 15:39:59'),
('CP-00009', '7', '2017-10-11 15:39:59'),
('CP-00007', '2', '2017-10-11 16:08:26'),
('CP-00007', '3', '2017-10-11 16:08:26'),
('CP-00007', '4', '2017-10-11 16:08:26'),
('CP-00002', '2', '2017-10-16 18:07:28'),
('CP-00002', '3', '2017-10-16 18:07:28'),
('CP-00002', '4', '2017-10-16 18:07:28'),
('CP-00002', '5', '2017-10-16 18:07:29'),
('CP-00002', '7', '2017-10-16 18:07:29'),
('CP-00010', '2', '2017-10-16 18:09:04'),
('CP-00010', '7', '2017-10-16 18:09:04'),
('CP-00003', '2', '2017-10-19 09:14:25'),
('CP-00011', '2', '2017-10-19 09:27:48'),
('CP-00011', '3', '2017-10-19 09:27:48'),
('CP-00011', '4', '2017-10-19 09:27:48'),
('CP-00011', '5', '2017-10-19 09:27:49'),
('CP-00011', '7', '2017-10-19 09:27:49'),
('CP-00011', '11', '2017-10-19 09:27:49'),
('CP-00012', '2', '2017-10-19 09:30:45'),
('CP-00012', '11', '2017-10-19 09:30:45'),
('CP-00013', '2', '2017-10-19 10:54:25'),
('CP-00013', '3', '2017-10-19 10:54:25'),
('CP-00013', '4', '2017-10-19 10:54:25'),
('CP-00014', '3', '2017-10-20 13:53:25');

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
('CP-00001', '03000', '20000'),
('CP-00001', '788', '5000'),
('CP-00001', '789', '6000'),
('CP-00001', '790', '7000'),
('CP-00001', '791', '8000');

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
  `Num_CLI` varchar(10) DEFAULT NULL,
  `ID_CLIENTE` varchar(10) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Duracion` time DEFAULT NULL,
  `Monto` decimal(10,4) DEFAULT NULL,
  `Unidad` int(11) DEFAULT NULL,
  `Comentarios` varchar(500) DEFAULT NULL,
  `ID_TPF` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campanna_registros`
--

INSERT INTO `campanna_registros` (`ID_Usuario`, `ID_Campannas`, `Num_CLI`, `ID_CLIENTE`, `Fecha`, `Hora`, `Duracion`, `Monto`, `Unidad`, `Comentarios`, `ID_TPF`) VALUES
(2, 'CP-00001', '82449100', '03000', '2017-09-25', '09:39:05', '09:45:15', '120.0000', NULL, 'Ninguno', 1),
(2, 'CP-00004', '88268430', '788', '2017-09-27', '13:26:55', '00:00:12', '120.0000', 55, 'ninguno', 2),
(2, 'CP-00004', '88268430', '788', '2017-09-27', '13:27:44', '00:00:05', '497.0000', 78, 'ninguno', 2),
(2, 'CP-00004', '88268430', '788', '2017-09-27', '13:28:47', '00:00:02', '500.0000', 12, 'ninguno', 2),
(2, 'CP-00003', '88268430', '788', '2017-09-27', '15:48:23', '00:00:21', '2000.0000', NULL, 'prueba', 2),
(2, 'CP-00005', '88268430', '788', '2017-09-27', '16:41:35', '00:00:04', '3500.0000', NULL, 'tres mil quinientos en ventas', 2),
(2, 'CP-00005', '88268430', '788', '2017-10-02', '09:45:14', '00:00:07', '1000.0000', NULL, 'cualquiera', 2),
(2, 'CP-00004', '1', '788', '2017-10-03', '16:55:53', '00:00:00', '5000.0000', 30, '', 2),
(2, 'CP-00003', '882222', '788', '2017-10-03', '18:14:08', '00:00:07', '3000.0000', NULL, '', 2),
(2, 'CP-00003', '88268430', '788', '2017-10-03', '18:15:00', '00:00:03', '998.0000', NULL, 'no', 2),
(2, 'CP-00003', '88268430', '788', '2017-10-04', '15:06:08', '00:00:13', '9998.0000', NULL, '', 2),
(2, 'CP-00003', '4', '788', '2017-10-04', '15:33:54', '00:00:08', '1999.0000', NULL, 'no', 2),
(2, 'CP-00004', '8555', '788', '2017-10-04', '17:05:44', '00:04:21', '3500.0000', 20, 'no', 2),
(2, 'CP-00002', '155', '788', '2017-10-09', '08:15:46', '00:00:11', '4500.2500', NULL, '', 5),
(6, 'CP-00005', '2', '792', '2017-10-12', '08:24:46', '00:00:01', '4499.0000', 8, '', 2),
(6, 'CP-00005', '45', '791', '2017-10-12', '08:25:43', '00:00:01', '4500.0000', NULL, '', 2),
(2, 'CP-00009', '78', '790', '2017-10-13', '13:15:08', '00:00:01', '3200.0000', NULL, '', 2),
(2, 'CP-00004', '88268430', '792', '2017-10-18', '10:48:20', '00:00:22', '1200.5000', 5, '', 9),
(2, 'CP-00004', '88268430', '792', '2017-10-18', '10:50:42', '00:00:16', '3000.0000', 5, '', 5),
(2, 'CP-00002', '88268430', '790', '2017-10-19', '09:13:20', '00:01:02', '2500.0000', 78, '', 3),
(2, 'CP-00003', '88268430', '790', '2017-10-19', '09:15:47', '00:00:29', '3500.0000', 45, '', 4),
(2, 'CP-00013', '88268430', '03100', '2017-10-19', '10:55:27', '00:00:12', '520.0000', 45, '', 4);

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
(10, 'Razon 10', '2017-09-09 16:04:54', 1),
(11, 'NO CONTESTO', '2017-10-16 09:46:33', 0),
(12, 'numero desconocido', '2017-10-17 09:00:51', 0);

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
  `Telefono3` varchar(10) DEFAULT NULL,
  `Vendedor` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_Cliente`, `Nombre`, `Direccion`, `Telefono1`, `Telefono2`, `Telefono3`, `Vendedor`) VALUES
('00001', 'FARMACIA DAVID', 'PARQUE CARLOS NUÑEZ 1 1/2C AL NORTE, EL ROSARIO, ESTELI', '82449100', '82449100', '82449100', 'F09'),
('00002', 'FARMACIA LA PRINCIPAL', 'KM 28 CARRETERA VIEJA A LEON,GASOLINERA PETRONIC 1C AL NORTE 20VRS AL ESTE.VILLA EL CARMEN,MANAGUA', '82449100', '82449100', '82449100', 'F06'),
('00003', 'FARMACIA LA PROVIDENCIA', 'DETALLE: BANPRO SUBTIAVA 1C ABAJO 5C AL NORTE, LEON', '82449100', '82449100', '82449100', 'F06'),
('00004', 'FARMACIA LA UNION', 'CENTRO DE SALUD 1RO DE MAYO 1½C AL SUR, LEON', '82449100', '82449100', '82449100', 'F06'),
('00005', 'FARMACIA LOPEZ', 'IGLESIA EL CALVARIO 1½C. AL OESTE, LEÓN', '82449100', '82449100', '82449100', 'F06'),
('00006', 'FARMACIA MEDALLA MILAGROSA', 'DETALLE: IGLESIA RECOLECCION 125 VRS AL ESTE, LEON', '82449100', '82449100', '82449100', 'F06'),
('00007', 'FARMACIA MEG 24', 'COSTADO NORTE DEL PARQUE RUBEN DARIO,LEON', '82449100', '82449100', '82449100', 'F06'),
('00008', 'FARMACIA MERCEDES', 'UNION FENOSA 4C AL ESTE. CHINANDEGA', '82449100', '82449100', '82449100', 'F06'),
('00010', 'FARMACIA METROPOLITANA Y/O ANGEL JAVIER ARAUZ JUAREZ', 'DETALLE: COSTADO NORTE IGLESIA SAN JUAN, LEON', '82449100', '82449100', '82449100', 'F06'),
('00011', 'FARMACIA MI FARMACIA', 'COSTADO OESTE DEL PARQUE SAN JUAN 1½C AL NORTE, LEON', '82449100', '82449100', '82449100', 'F06'),
('00012', 'FARMACIA MILAGROS', 'IGLESIA LA MERCED 1½C AL NORTE, LEON', '82449100', '82449100', '82449100', 'F06');

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
(1, 'GRUPO SAC 1', 2, 1, '2017-09-05 00:00:00'),
(2, 'GRUPO SAC 2', 5, 1, '2017-09-05 00:00:00'),
(3, 'GRUPO SAC 3', 7, 1, '2017-09-20 17:27:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_asignacion`
--

DROP TABLE IF EXISTS `grupo_asignacion`;
CREATE TABLE `grupo_asignacion` (
  `IdGrupo` int(11) NOT NULL,
  `Vendedor` varchar(10) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_asignacion`
--

INSERT INTO `grupo_asignacion` (`IdGrupo`, `Vendedor`, `fechaCreacion`, `ID_User`) VALUES
(3, 'F02', '2017-10-10', 1),
(3, 'F03', '2017-10-10', 1),
(3, 'F10', '2017-10-10', 1),
(1, 'F02', '2017-10-19', 1),
(1, 'F09', '2017-10-19', 1),
(1, 'F03', '2017-10-19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llaves`
--

DROP TABLE IF EXISTS `llaves`;
CREATE TABLE `llaves` (
  `concepto` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `llaves`
--

INSERT INTO `llaves` (`concepto`, `valor`) VALUES
('campaña', 0),
('Campaña', 1),
('Campaña', 2),
('Campaña', 3),
('Campaña', 4),
('Campaña', 5),
('Campaña', 6),
('Campaña', 7),
('Campaña', 8),
('Campaña', 9),
('Campaña', 10),
('Campaña', 11),
('Campaña', 12),
('Campaña', 13),
('Campaña', 14);

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
(1, 'SU', 'SU', 'e10adc3949ba59abbe56e057f20f883e', 0, b'1'),
(2, 'SAC1', 'MARYAN', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(3, 'SAC2', 'BISMARK', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(4, 'SAC3', 'SAC3', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(5, 'SAC4', 'SAC4', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(6, 'SAC5', 'SAC5', 'e10adc3949ba59abbe56e057f20f883e', 1, b'0'),
(7, 'SAC6', 'SAC6', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1'),
(8, 'SAC7', 'SAC7', 'e10adc3949ba59abbe56e057f20f883e', 1, b'0'),
(9, 'SAC8', 'SAC8', 'e10adc3949ba59abbe56e057f20f883e', 1, b'0'),
(10, 'SAC9', 'SAC9', 'e10adc3949ba59abbe56e057f20f883e', 1, b'0'),
(11, 'sac10', 'Pedro pablo hernandez davila', 'e10adc3949ba59abbe56e057f20f883e', 1, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_registros`
--

DROP TABLE IF EXISTS `usuario_registros`;
CREATE TABLE `usuario_registros` (
  `ID_Usuario` int(11) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `UserName` varchar(10) DEFAULT NULL,
  `Nombre` varchar(10) DEFAULT NULL,
  `FechaInicio` datetime DEFAULT NULL,
  `FechaFinal` datetime DEFAULT NULL,
  `Tiempo_Total` time DEFAULT NULL,
  `Tipo` varchar(10) DEFAULT NULL,
  `Tipo_de_Usuario` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_registros`
--

INSERT INTO `usuario_registros` (`ID_Usuario`, `session_id`, `UserName`, `Nombre`, `FechaInicio`, `FechaFinal`, `Tiempo_Total`, `Tipo`, `Tipo_de_Usuario`) VALUES
(2, '7b98f3ed6401d23bcb95b5deed27898aef47a9c7', 'SAC1', 'MARYAN', '2017-10-11 13:50:54', '2017-10-11 13:51:45', '00:00:51', 'ON', 1),
(1, '7b1bb0c787a96bb4cf71660490903e71cf08b1f5', 'SU', 'SU', '2017-10-11 13:51:49', '2017-10-11 13:52:35', '00:00:46', 'ON', 0),
(1, '9b4ad9253fa964ca21e6e82263df3878f202b1f3', 'SU', 'SU', '2017-10-11 13:52:44', '2017-10-11 13:52:57', '00:00:13', 'ON', 0),
(3, '4ab24f6bba7fcedc097821198bba8929580c0f0b', 'SAC2', 'BISMARK', '2017-10-11 13:52:59', '2017-10-11 13:53:04', '00:00:05', 'ON', 1),
(1, '000cfd55114d3f5e687fd056658c35b8c6e4cb30', 'SU', 'SU', '2017-10-11 13:53:07', '2017-10-11 13:57:12', '00:04:05', 'ON', 0),
(2, 'c05e4400f39811479b2f960c5f24c82a09161f29', 'SAC1', 'MARYAN', '2017-10-11 13:57:19', '2017-10-11 13:57:33', '00:00:14', 'ON', 1),
(1, '898493c7db7fec123bcd40213be561ee44ea820c', 'SU', 'SU', '2017-10-11 13:57:36', '2017-10-11 14:21:50', '00:24:14', 'ON', 0),
(1, '6a5bb1911682abcf933060a3b0929871580bb79b', 'SU', 'SU', '2017-10-11 14:21:56', '2017-10-11 14:33:53', '00:11:57', 'ON', 0),
(2, 'd0d9d928f51f5583ddd4b66314a96eee5d97a78e', 'SAC1', 'MARYAN', '2017-10-11 14:33:59', '2017-10-11 14:34:32', '00:00:33', 'ON', 1),
(1, 'fd99f25dbc6ca42b3f20200564cddc4da3c07ca8', 'SU', 'SU', '2017-10-11 14:34:35', '2017-10-11 14:37:14', '00:02:39', 'ON', 0),
(2, '6c49ea20d4de2fe0316abd0f9e6b8c7a42a4abb2', 'SAC1', 'MARYAN', '2017-10-11 14:37:18', '2017-10-11 14:54:22', '00:17:04', 'ON', 1),
(1, '8becdc8b0c51c29c3144e1761992789d446b926f', 'SU', 'SU', '2017-10-11 14:54:25', '2017-10-11 14:55:32', '00:01:07', 'ON', 0),
(2, '179d633729e4452095e577aa845f8688aeb7ec01', 'SAC1', 'MARYAN', '2017-10-11 14:55:35', '2017-10-11 15:08:26', '00:12:51', 'ON', 1),
(1, '90cde6c814819cd325ac942087fe941b036109b7', 'SU', 'SU', '2017-10-11 15:08:28', '2017-10-11 15:13:13', '00:04:45', 'ON', 0),
(2, 'e5310d2693dcb5d66b07d4449c44ec1affbee4de', 'SAC1', 'MARYAN', '2017-10-11 15:13:16', '2017-10-11 15:22:38', '00:09:22', 'ON', 1),
(1, '5775d6b9b31460013b8e0241c3f956d15fcfd5e3', 'SU', 'SU', '2017-10-11 15:22:41', '2017-10-11 15:45:22', '00:22:41', 'ON', 0),
(2, '55f46ddc2a0c20eb51448b3a31bdad1f3a3d63af', 'SAC1', 'MARYAN', '2017-10-11 15:45:26', '2017-10-11 16:06:45', '00:21:19', 'ON', 1),
(1, '0ec2afa6a89164b5ddb9aaa13b680eab55729bae', 'SU', 'SU', '2017-10-11 16:06:47', '2017-10-11 16:26:22', '00:19:35', 'ON', 0),
(2, '40751e07f4e0e914b11192e5193679f6edb3cf40', 'SAC1', 'MARYAN', '2017-10-11 16:26:25', '2017-10-11 16:38:15', '00:11:50', 'ON', 1),
(1, '5c041f614822825d8889b266b662c00adbaed0ed', 'SU', 'SU', '2017-10-11 16:38:18', '2017-10-11 16:43:18', '00:05:00', 'ON', 0),
(2, 'f35b6df2166cf5bdae879517ce8a0fb6b05b0570', 'SAC1', 'MARYAN', '2017-10-11 16:43:21', NULL, NULL, 'ON', 1),
(1, '5d2cd61d8796579edc93dcd6e9c6fad7dfcbd2e2', 'SU', 'SU', '2017-10-12 07:46:57', '2017-10-12 07:47:05', '00:00:08', 'ON', 0),
(2, '7cca715e202edab92a4d5ec4266fbf2f11e6ef62', 'SAC1', 'MARYAN', '2017-10-12 07:47:10', '2017-10-12 07:47:24', '00:00:14', 'ON', 1),
(6, '25be0c4391d4d50716ae590caa18858e85bd5339', 'SAC5', 'SAC5', '2017-10-12 08:00:00', '2017-10-12 17:00:00', '01:03:31', 'ON', 1),
(1, '787b2f696df3b8228b339be72aa2505f4a0b02e4', 'SU', 'SU', '2017-10-12 08:51:02', '2017-10-12 09:18:30', '00:27:28', 'ON', 0),
(2, '8d7c99a17d8295449988e4842e988375f870bedd', 'SAC1', 'MARYAN', '2017-10-12 09:18:36', '2017-10-12 09:19:14', '00:00:38', 'ON', 1),
(2, '2ede57af973d4fa4a67e81b3b9878b37f6ef4571', 'SAC1', 'MARYAN', '2017-10-12 09:19:17', '2017-10-12 09:23:16', '00:03:59', 'ON', 1),
(2, '0683fad26d64ca0dfb2e265ba905b8872299899f', 'SAC1', 'MARYAN', '2017-10-12 09:23:19', '2017-10-12 09:23:27', '00:00:08', 'ON', 1),
(6, 'e1dedf9e5744b779a6ccd3fa41a2739612065a5f', 'SAC5', 'SAC5', '2017-10-12 09:23:30', '2017-10-12 09:25:49', '00:02:19', 'ON', 1),
(1, '528ad0fd34c2b8ff47f2cdab49251ad9bf6ffd8d', 'SU', 'SU', '2017-10-12 09:26:45', '2017-10-12 09:29:18', '00:02:33', 'ON', 0),
(6, '2618ba62e3545dfd1f54e944b22ed1a1456cadac', 'SAC5', 'SAC5', '2017-10-12 09:29:25', '2017-10-12 09:29:51', '00:00:26', 'ON', 1),
(1, '94d3a4ba9253e0b5d2cd4ef4cc6baa73665c7720', 'SU', 'SU', '2017-10-12 09:30:00', '2017-10-12 09:30:57', '00:00:57', 'ON', 0),
(2, '251e95881153ad3996f25577bd292e35fbf53133', 'SAC1', 'MARYAN', '2017-10-12 09:31:01', '2017-10-12 09:32:39', '00:01:38', 'ON', 1),
(1, 'b245aff29d028800fb1c0573f514e7ea9fc3efc0', 'SU', 'SU', '2017-10-12 09:32:43', '2017-10-12 09:33:27', '00:00:44', 'ON', 0),
(2, '83900b970fc45035dd48c4871a917bd02d81015e', 'SAC1', 'MARYAN', '2017-10-12 09:33:31', '2017-10-12 09:34:11', '00:00:40', 'ON', NULL),
(1, 'd2ec6e46f93ac753a42c20b6f52b5f97711709db', 'SU', 'SU', '2017-10-12 09:34:14', '2017-10-12 09:34:28', '00:00:14', 'ON', NULL),
(2, '290300dbac92975f8a5741ac6ff124bd5f5ada62', 'SAC1', 'MARYAN', '2017-10-12 09:34:32', '2017-10-12 09:41:31', '00:06:59', 'ON', NULL),
(1, '032672f71dba8f8a35a90a814422416673c1f6cc', 'SU', 'SU', '2017-10-12 09:41:35', '2017-10-12 10:09:39', '00:28:04', 'ON', 0),
(2, 'ccb002cb8bf9d5b4e054cbf132137c893238ebd7', 'SAC1', 'MARYAN', '2017-10-12 10:09:43', '2017-10-12 10:12:36', '00:02:53', 'ON', 1),
(1, 'a2916311dfb7cf9b87ef2e7e4532d89c8748fb25', 'SU', 'SU', '2017-10-12 10:12:40', '2017-10-12 10:56:49', '00:44:09', 'ON', 0),
(2, '41274ab84bdfba2c74c89ae17db2f3b2d2a520fb', 'SAC1', 'MARYAN', '2017-10-12 10:56:55', '2017-10-12 10:57:05', '00:00:10', 'ON', 1),
(1, '8f010344d29e424b55c2073a0085414cef6b67ce', 'SU', 'SU', '2017-10-12 10:57:09', '2017-10-12 10:57:55', '00:00:46', 'ON', 0),
(1, 'c348a13ab0df213bab8858259b8cbb85f297f408', 'SU', 'SU', '2017-10-12 10:58:04', NULL, NULL, 'ON', 0),
(1, 'f01e86a4e8e7c5abcfb314f68f1e6830002f82d7', 'SU', 'SU', '2017-10-13 08:00:15', '2017-10-13 09:28:51', '01:28:36', 'ON', 0),
(2, '122baf5f81a3e3889ba81c041e9506d7fdd87235', 'SAC1', 'MARYAN', '2017-10-13 09:28:54', '2017-10-13 09:29:14', '00:00:20', 'ON', 1),
(1, '7147b756dddfb07766a6fd3098b9f3dad048e46b', 'SU', 'SU', '2017-10-13 09:29:17', '2017-10-13 12:47:33', '03:18:16', 'ON', 0),
(2, 'a580449aa124f4cfc799513999ac5b55306031ed', 'SAC1', 'MARYAN', '2017-10-13 12:47:39', '2017-10-13 12:47:46', '00:00:07', 'ON', 1),
(1, '537fd949f272261400e871a568ee79011b5a8f01', 'SU', 'SU', '2017-10-13 12:47:50', '2017-10-13 12:48:13', '00:00:23', 'ON', 0),
(2, '6d9b9f1fb89cc28143e33e2bff1f49c5d215dd8d', 'SAC1', 'MARYAN', '2017-10-13 12:48:16', '2017-10-13 13:15:12', '00:26:56', 'ON', 1),
(1, '7ae895b16130e67a3914c7d154240d950252ec50', 'SU', 'SU', '2017-10-13 13:15:16', '2017-10-13 18:27:18', '05:12:02', 'ON', 0),
(1, '3aafaa229c50b7e4017d9f20459f3b2b4d0e00fc', 'SU', 'SU', '2017-10-16 07:53:23', '2017-10-16 14:56:21', '07:02:58', 'ON', 0),
(1, '2cc6ef1025d38d2c322b02ac726521f3d5698011', 'SU', 'SU', '2017-10-16 14:56:51', '2017-10-16 14:57:00', '00:00:09', 'ON', 0),
(1, '1d21f38d7fb6bb657f9206af73e1e4ef29d0202c', 'SU', 'SU', '2017-10-16 15:04:16', '2017-10-16 15:06:04', '00:01:48', 'ON', 0),
(1, '6f1d9d007dbd29db7d9cb6fbf1c76a9c288747d5', 'SU', 'SU', '2017-10-16 15:07:30', '2017-10-16 18:16:58', '03:09:28', 'ON', 0),
(7, 'bd93e80bf41368f314d99905f52888a3a79d3f6a', 'SAC6', 'SAC6', '2017-10-16 15:19:42', '2017-10-16 15:30:12', '00:10:30', 'ON', 1),
(7, 'bd93e80bf41368f314d99905f52888a3a79d3f6a', 'SAC6', 'SAC6', '2017-10-16 15:22:24', '2017-10-16 15:27:19', '00:04:55', 'PAUSA', NULL),
(7, '8e4dfcd7605f465b46365b8f542564cbf900fb27', 'SAC6', 'SAC6', '2017-10-16 15:35:27', '2017-10-16 15:43:56', '00:08:29', 'ON', 1),
(7, '8e4dfcd7605f465b46365b8f542564cbf900fb27', 'SAC6', 'SAC6', '2017-10-16 15:39:41', '2017-10-16 15:43:56', '00:04:15', 'PAUSA', NULL),
(7, '817894842bdfbe71f7b2b05a99c91d29e698524f', 'SAC6', 'SAC6', '2017-10-16 18:09:37', '2017-10-16 18:09:56', '00:00:19', 'ON', 1),
(7, '0625f81efe48f1dbab36c6d9c501e8e593d8936b', 'SAC6', 'SAC6', '2017-10-16 18:11:27', '2017-10-16 18:16:39', '00:05:12', 'ON', 1),
(1, '13742d8565962bf7b7c81e56788c8dcd47dfbbc2', 'SU', 'SU', '2017-10-17 08:26:42', NULL, NULL, 'ON', 0),
(7, '606280d71d63df80387d8e767e075f367972a745', 'SAC6', 'SAC6', '2017-10-17 11:56:13', '2017-10-17 12:00:58', '00:04:45', 'ON', 1),
(7, '606280d71d63df80387d8e767e075f367972a745', 'SAC6', 'SAC6', '2017-10-17 11:59:28', '2017-10-17 12:00:38', '00:01:10', 'PAUSA', 1),
(3, '4c74351a86af4188071ef92cc32fd9160955c21c', 'SAC2', 'BISMARK', '2017-10-17 16:20:57', '2017-10-17 16:25:01', '00:04:04', 'ON', 1),
(3, '4c74351a86af4188071ef92cc32fd9160955c21c', 'SAC2', 'BISMARK', '2017-10-17 16:23:07', '2017-10-17 16:25:01', '00:01:54', 'PAUSA', 1),
(1, '5ec22267c3cb063779ab1aa7d86ec1ffcb643372', 'SU', 'SU', '2017-10-18 08:11:30', NULL, NULL, 'ON', 0),
(2, '3f891a18526389487fa0061680b66ac3301fa88d', 'SAC1', 'MARYAN', '2017-10-18 10:45:45', '2017-10-18 11:08:48', '00:23:03', 'ON', 1),
(1, 'b9417c4a3dc53fb18126b5fab6098a1e6a5a30e2', 'SU', 'SU', '2017-10-19 08:03:26', NULL, NULL, 'ON', 0),
(2, 'a087ee197adf2d6174cf062b35590eabd1ae775f', 'SAC1', 'MARYAN', '2017-10-19 09:09:40', '2017-10-19 11:12:34', '02:02:54', 'ON', 1),
(1, '5259e8da93f9763cb69cc47044da5391b5bb2107', 'SU', 'SU', '2017-10-19 11:31:23', NULL, NULL, 'ON', 0),
(1, 'ce395deb3ba3b8f43f0ea8d4dda233cbb011b6cd', 'SU', 'SU', '2017-10-19 13:52:41', NULL, NULL, 'ON', 0),
(1, '5a177d21fa03558d1b37d000408661742ba96c6a', 'SU', 'SU', '2017-10-19 14:43:14', NULL, NULL, 'ON', 0),
(1, '59951462219cee835e8ea6aa3122a7e58cc9491c', 'SU', 'SU', '2017-10-19 17:29:54', NULL, NULL, 'ON', 0),
(1, '6a30ddb6fd5f416232d456e52d4f6f880e240be2', 'SU', 'SU', '2017-10-19 17:44:42', NULL, NULL, 'ON', 0),
(1, '504bf673a76a1f541b459a9b870c8b747c3ee5bd', 'SU', 'SU', '2017-10-20 07:57:26', NULL, NULL, 'ON', 0),
(1, '49e6b5dd8d7c2b5ead6a36d7e50df933bfc751af', 'SU', 'SU', '2017-10-20 08:47:50', '2017-10-20 18:00:35', '09:12:45', 'ON', 0),
(5, '66dcb3a6b3905335dd00dbacc0a0b34551715413', 'SAC4', 'SAC4', '2017-10-20 14:34:39', '2017-10-20 14:39:14', '00:04:35', 'ON', 1),
(5, '66dcb3a6b3905335dd00dbacc0a0b34551715413', 'SAC4', 'SAC4', '2017-10-20 14:37:27', '2017-10-20 14:39:14', '00:01:47', 'PAUSA', 1),
(1, '4b1cb793e96ff43c05df8ebfe285e31fbc8cd25b', 'SU', 'SU', '2017-10-23 08:07:15', NULL, NULL, 'ON', 0);

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
,`Telefono2` varchar(10)
,`Telefono3` varchar(10)
,`Meta` decimal(10,0)
,`Vendedor` varchar(10)
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
,`Mensaje` varchar(500)
,`Estado` int(5)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_clientescampaniadetalle`
--
DROP VIEW IF EXISTS `view_clientescampaniadetalle`;
CREATE TABLE `view_clientescampaniadetalle` (
`ID_Campannas` varchar(10)
,`ID_Cliente` varchar(10)
,`Nombre` varchar(255)
,`Meta` decimal(10,0)
,`montoReal` decimal(32,4)
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
-- Estructura Stand-in para la vista `view_vendedoresporgrupo`
--
DROP VIEW IF EXISTS `view_vendedoresporgrupo`;
CREATE TABLE `view_vendedoresporgrupo` (
`idUsuario` int(11)
,`vendedores` text
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_campannas_clientes`
--
DROP TABLE IF EXISTS `view_campannas_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_campannas_clientes`  AS  select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`ID_Cliente` AS `ID_Cliente`,`t1`.`Nombre` AS `Nombre`,`t1`.`Telefono1` AS `Telefono1`,`t1`.`Telefono2` AS `Telefono2`,`t1`.`Telefono3` AS `Telefono3`,`t0`.`Meta` AS `Meta`,`t1`.`Vendedor` AS `Vendedor` from (`campanna_cliente` `t0` join `clientes` `t1` on((`t0`.`ID_Cliente` = `t1`.`ID_Cliente`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_campannas_info`
--
DROP TABLE IF EXISTS `view_campannas_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_campannas_info`  AS  select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`Nombre` AS `Nombre`,`t1`.`Fecha_Inicio` AS `Fecha_Inicio`,`t1`.`Fecha_Cierre` AS `Fecha_Cierre`,count(`t0`.`ID_Campannas`) AS `TOTAL_LLAMADAS`,sec_to_time(sum(time_to_sec(`t0`.`Duracion`))) AS `TIEMPO_TOTAL`,sec_to_time(avg(time_to_sec(`t0`.`Duracion`))) AS `TIEMPO_PROMEDIO`,`t1`.`Meta` AS `Meta`,sum(`t0`.`Monto`) AS `MONTO_REAL`,`t1`.`Observaciones` AS `Observaciones`,`t1`.`Mensaje` AS `Mensaje`,`t1`.`Estado` AS `Estado` from (`campanna_registros` `t0` join `campanna` `t1` on((`t0`.`ID_Campannas` = `t1`.`ID_Campannas`))) group by `t0`.`ID_Campannas` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_clientescampaniadetalle`
--
DROP TABLE IF EXISTS `view_clientescampaniadetalle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_clientescampaniadetalle`  AS  select `cc`.`ID_Campannas` AS `ID_Campannas`,`cc`.`ID_Cliente` AS `ID_Cliente`,`cl`.`Nombre` AS `Nombre`,`cc`.`Meta` AS `Meta`,(select `view_monto_clientes`.`MONTO_REAL` from `view_monto_clientes` where ((`view_monto_clientes`.`ID_CLIENTE` = `cc`.`ID_Cliente`) and (`view_monto_clientes`.`ID_Campannas` = `cc`.`ID_Campannas`))) AS `montoReal` from (`campanna_cliente` `cc` join `clientes` `cl` on((`cl`.`ID_Cliente` = `cc`.`ID_Cliente`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_monto_clientes`
--
DROP TABLE IF EXISTS `view_monto_clientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_monto_clientes`  AS  select `t0`.`ID_Campannas` AS `ID_Campannas`,`t0`.`ID_CLIENTE` AS `ID_CLIENTE`,sum(`t0`.`Monto`) AS `MONTO_REAL` from `campanna_registros` `t0` group by `t0`.`ID_Campannas`,`t0`.`ID_CLIENTE` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_vendedoresporgrupo`
--
DROP TABLE IF EXISTS `view_vendedoresporgrupo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_vendedoresporgrupo`  AS  select `gp`.`IdResponsable` AS `idUsuario`,group_concat(`ga`.`Vendedor` separator ', ') AS `vendedores` from (`grupo_asignacion` `ga` join `grupos` `gp` on((`ga`.`IdGrupo` = `gp`.`IdGrupo`))) group by `gp`.`NombreGrupo` ;

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
  MODIFY `ID_TPF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `IdGrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
