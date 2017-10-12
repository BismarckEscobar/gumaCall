/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : gcdb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-12 16:02:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for campanna
-- ----------------------------
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

-- ----------------------------
-- Records of campanna
-- ----------------------------
INSERT INTO `campanna` VALUES ('CP-00001', 'campaña prueba', '2017-09-25 00:00:00', '2017-09-30 00:00:00', '2', '1', '40000.00', 'Ninguna', 'Ninguno', '2017-09-25 09:34:35', null, '1');
INSERT INTO `campanna` VALUES ('CP-00002', 'campaña prueba numero', '2017-09-26 00:00:00', '2017-09-30 00:00:00', '1', '1', '500000.00', 'Datos de prueba', 'Mensaje de prueba 22', '2017-09-26 11:26:17', null, '1');
INSERT INTO `campanna` VALUES ('CP-00003', 'campaña prueba CP-00003', '2017-09-26 00:00:00', '2017-10-06 00:00:00', '1', '1', '30000.00', 'Datos de prueba 2', 'Mensaje de prueba', '2017-09-26 16:32:50', null, '1');
INSERT INTO `campanna` VALUES ('CP-00004', 'nombre CP-00004', '2017-09-20 00:00:00', '2017-11-01 00:00:00', '1', '1', '25000.00', 'Datos de prueba editado 3', 'Datos de prueba editado', '2017-09-26 16:35:27', null, '1');
INSERT INTO `campanna` VALUES ('CP-00005', 'campaña cp-00005', '2017-09-25 00:00:00', '2017-10-06 00:00:00', '1', '1', '50000.00', 'Campaña de prueba observaciones', 'Campaña de prueba mensaje', '2017-09-27 16:24:21', null, '1');
INSERT INTO `campanna` VALUES ('CP-00006', 'prueba', '2017-10-09 00:00:00', '2017-10-22 00:00:00', '1', '1', '50000.00', 'ahora si\n', 'ahora si', '2017-10-09 08:38:33', null, '1');
INSERT INTO `campanna` VALUES ('CP-00007', 'prueba 007', '2017-10-09 00:00:00', '2017-10-28 00:00:00', '1', '1', '80000.00', 'Prueba 007', 'Prueba 007', '2017-10-09 13:55:27', null, '1');
INSERT INTO `campanna` VALUES ('CP-00008', 'prueba 008', '2017-10-09 00:00:00', '2017-10-14 00:00:00', '1', '1', '80000.00', 'campaña numero 008', 'Estos son datos de prueba', '2017-10-10 14:43:27', null, '1');
INSERT INTO `campanna` VALUES ('CP-00009', 'campaña 009', '2017-10-09 00:00:00', '2017-10-14 00:00:00', '1', '1', '78000.00', 'Campaña numero 009', 'Datos de prueba para Campaña numero 009', '2017-10-10 15:25:28', null, '1');

-- ----------------------------
-- Table structure for campanna_asignacion
-- ----------------------------
DROP TABLE IF EXISTS `campanna_asignacion`;
CREATE TABLE `campanna_asignacion` (
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `Fecha_asignacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of campanna_asignacion
-- ----------------------------
INSERT INTO `campanna_asignacion` VALUES ('CP-00007', '2', '2017-10-10 15:23:43');
INSERT INTO `campanna_asignacion` VALUES ('CP-00007', '3', '2017-10-10 15:23:43');
INSERT INTO `campanna_asignacion` VALUES ('CP-00007', '5', '2017-10-10 15:23:44');
INSERT INTO `campanna_asignacion` VALUES ('CP-00007', '6', '2017-10-10 15:23:44');
INSERT INTO `campanna_asignacion` VALUES ('CP-00007', '7', '2017-10-10 15:23:44');
INSERT INTO `campanna_asignacion` VALUES ('CP-00007', '8', '2017-10-10 15:23:44');
INSERT INTO `campanna_asignacion` VALUES ('CP-00007', '9', '2017-10-10 15:23:44');
INSERT INTO `campanna_asignacion` VALUES ('CP-00007', '10', '2017-10-10 15:23:44');
INSERT INTO `campanna_asignacion` VALUES ('CP-00005', '3', '2017-10-10 15:24:22');
INSERT INTO `campanna_asignacion` VALUES ('CP-00005', '4', '2017-10-10 15:24:22');
INSERT INTO `campanna_asignacion` VALUES ('CP-00005', '5', '2017-10-10 15:24:22');
INSERT INTO `campanna_asignacion` VALUES ('CP-00005', '6', '2017-10-10 15:24:22');
INSERT INTO `campanna_asignacion` VALUES ('CP-00005', '7', '2017-10-10 15:24:22');
INSERT INTO `campanna_asignacion` VALUES ('CP-00005', '8', '2017-10-10 15:24:22');
INSERT INTO `campanna_asignacion` VALUES ('CP-00005', '9', '2017-10-10 15:24:22');
INSERT INTO `campanna_asignacion` VALUES ('CP-00005', '10', '2017-10-10 15:24:22');
INSERT INTO `campanna_asignacion` VALUES ('CP-00003', '2', '2017-10-10 15:46:52');
INSERT INTO `campanna_asignacion` VALUES ('CP-00003', '10', '2017-10-10 15:46:52');
INSERT INTO `campanna_asignacion` VALUES ('CP-00001', '3', '2017-10-10 16:10:48');
INSERT INTO `campanna_asignacion` VALUES ('CP-00004', '2', '2017-10-11 08:33:24');
INSERT INTO `campanna_asignacion` VALUES ('CP-00004', '10', '2017-10-11 08:33:24');
INSERT INTO `campanna_asignacion` VALUES ('CP-00008', '2', '2017-10-11 11:49:01');
INSERT INTO `campanna_asignacion` VALUES ('CP-00002', '2', '2017-10-11 12:06:47');
INSERT INTO `campanna_asignacion` VALUES ('CP-00002', '3', '2017-10-11 12:06:47');
INSERT INTO `campanna_asignacion` VALUES ('CP-00006', '2', '2017-10-11 12:07:07');
INSERT INTO `campanna_asignacion` VALUES ('CP-00006', '3', '2017-10-11 12:07:07');
INSERT INTO `campanna_asignacion` VALUES ('CP-00006', '7', '2017-10-11 12:07:07');
INSERT INTO `campanna_asignacion` VALUES ('CP-00009', '2', '2017-10-11 12:07:29');
INSERT INTO `campanna_asignacion` VALUES ('CP-00009', '7', '2017-10-11 12:07:29');

-- ----------------------------
-- Table structure for campanna_cliente
-- ----------------------------
DROP TABLE IF EXISTS `campanna_cliente`;
CREATE TABLE `campanna_cliente` (
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `ID_Cliente` varchar(10) DEFAULT NULL,
  `Meta` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of campanna_cliente
-- ----------------------------
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '03000', '20000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '788', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '789', '6000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '790', '7000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '791', '8000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '792', '9000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '793', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '788', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '789', '6000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '790', '7000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '791', '8000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '792', '9000');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '793', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '788', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '789', '6000');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '790', '7000');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '791', '8000');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '792', '9000');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '03000', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '788', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '789', '6000');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '790', '7000');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '791', '8000');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '792', '9000');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '3000', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '788', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '789', '6000');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '790', '7000');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '791', '8000');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '792', '9000');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '03000', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '788', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '789', '6000');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '790', '7000');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '791', '8000');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '792', '9000');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '03000', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '788', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '789', '6000');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '790', '7000');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '791', '8000');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '792', '9000');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '03000', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '788', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '789', '6000');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '790', '7000');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '791', '8000');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '792', '9000');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '03000', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '788', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '789', '6000');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '790', '7000');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '791', '8000');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '792', '9000');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '03000', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00009', '788', '5000');
INSERT INTO `campanna_cliente` VALUES ('CP-00009', '789', '6000');
INSERT INTO `campanna_cliente` VALUES ('CP-00009', '790', '7000');
INSERT INTO `campanna_cliente` VALUES ('CP-00009', '791', '8000');
INSERT INTO `campanna_cliente` VALUES ('CP-00009', '792', '9000');
INSERT INTO `campanna_cliente` VALUES ('CP-00009', '03000', '5000');

-- ----------------------------
-- Table structure for campanna_estados
-- ----------------------------
DROP TABLE IF EXISTS `campanna_estados`;
CREATE TABLE `campanna_estados` (
  `ID_Estado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_Estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of campanna_estados
-- ----------------------------
INSERT INTO `campanna_estados` VALUES ('1', 'Activa');
INSERT INTO `campanna_estados` VALUES ('2', 'Inactiva');
INSERT INTO `campanna_estados` VALUES ('3', 'Aprobada');

-- ----------------------------
-- Table structure for campanna_registros
-- ----------------------------
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

-- ----------------------------
-- Records of campanna_registros
-- ----------------------------
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00001', '82449100', '03000', '2017-09-25', '09:39:05', '09:45:15', '120.0000', null, 'Ninguno', '1');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00004', '88268430', '788', '2017-09-27', '13:26:55', '00:00:12', '120.0000', '55', 'ninguno', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00004', '88268430', '788', '2017-09-27', '13:27:44', '00:00:05', '497.0000', '78', 'ninguno', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00004', '88268430', '788', '2017-09-27', '13:28:47', '00:00:02', '500.0000', '12', 'ninguno', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '88268430', '788', '2017-09-27', '15:48:23', '00:00:21', '2000.0000', null, 'prueba', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00005', '88268430', '788', '2017-09-27', '16:41:35', '00:00:04', '3500.0000', null, 'tres mil quinientos en ventas', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00005', '88268430', '788', '2017-10-02', '09:45:14', '00:00:07', '1000.0000', null, 'cualquiera', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00004', '1', '788', '2017-10-03', '16:55:53', '00:00:00', '5000.0000', '30', '', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '882222', '788', '2017-10-03', '18:14:08', '00:00:07', '3000.0000', null, '', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '88268430', '788', '2017-10-03', '18:15:00', '00:00:03', '998.0000', null, 'no', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '88268430', '788', '2017-10-04', '15:06:08', '00:00:13', '9998.0000', null, '', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '4', '788', '2017-10-04', '15:33:54', '00:00:08', '1999.0000', null, 'no', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00004', '8555', '788', '2017-10-04', '17:05:44', '00:04:21', '3500.0000', '20', 'no', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00002', '155', '788', '2017-10-09', '08:15:46', '00:00:11', '4500.0000', null, '', '5');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00002', '10', '790', '2017-10-12', '08:42:58', '00:00:00', '2323.0000', null, '', '1');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00002', '88888888', '789', '2017-10-12', '10:50:22', '00:00:00', '33333.0000', '10', '', '2');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00002', '12', '788', '2017-10-12', '11:00:13', '00:00:00', '12.0000', '21', '', '2');

-- ----------------------------
-- Table structure for campanna_tipificacion
-- ----------------------------
DROP TABLE IF EXISTS `campanna_tipificacion`;
CREATE TABLE `campanna_tipificacion` (
  `ID_TPF` int(11) NOT NULL AUTO_INCREMENT,
  `Tipificacion` varchar(100) DEFAULT NULL,
  `Fecha_TPF` datetime DEFAULT NULL,
  `Activa` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_TPF`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of campanna_tipificacion
-- ----------------------------
INSERT INTO `campanna_tipificacion` VALUES ('1', 'Razon', '2017-09-09 16:04:54', '1');
INSERT INTO `campanna_tipificacion` VALUES ('2', 'Razon 2', '2017-09-09 16:04:54', '1');
INSERT INTO `campanna_tipificacion` VALUES ('3', 'Razon 3', '2017-09-09 16:04:54', '1');
INSERT INTO `campanna_tipificacion` VALUES ('4', 'Razon 4', '2017-09-09 16:04:54', '1');
INSERT INTO `campanna_tipificacion` VALUES ('5', 'Razon 5', '2017-09-09 16:04:54', '1');
INSERT INTO `campanna_tipificacion` VALUES ('6', 'Razon 6', '2017-09-09 16:04:54', '1');
INSERT INTO `campanna_tipificacion` VALUES ('7', 'Razon 7', '2017-09-09 16:04:54', '1');
INSERT INTO `campanna_tipificacion` VALUES ('8', 'Razon 8', '2017-09-09 16:04:54', '1');
INSERT INTO `campanna_tipificacion` VALUES ('9', 'Razon 9', '2017-09-09 16:04:54', '1');
INSERT INTO `campanna_tipificacion` VALUES ('10', 'Razon 10', '2017-09-09 16:04:54', '1');

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
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

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('788', 'Pedro Pablo Lopez Calderon', 'Masaya, Nicaragua', '88268430', '88268431', '88268430', 'F02');
INSERT INTO `clientes` VALUES ('789', 'Maria Jose Perez G.', 'Managua, Nicaragua', '88268430', '88268431', '88268432', 'F05');
INSERT INTO `clientes` VALUES ('790', 'Bismarck Escobar M.', 'Niquinohomo', '88268431', '84426249', '84426249', 'F03');
INSERT INTO `clientes` VALUES ('791', 'CLIENTE DE PRUEBA', 'INFIERNO', '82449100', '82449100', '82449100', 'F05');
INSERT INTO `clientes` VALUES ('792', 'CLIENTE PRUEBA', 'CUALQUIERA', '88268432', '88268433', '88268434', 'F09');
INSERT INTO `clientes` VALUES ('3000', 'Roberto Jose Perez Gaitan', 'Nose', '88268430', '88268450', '88568720', 'F02');
INSERT INTO `clientes` VALUES ('1788', 'Jose Alberto Sanchez', 'Masaya, Nicaragua', '88268430', '88268431', '88268430', 'F09');
INSERT INTO `clientes` VALUES ('2789', 'Pedro Hernandez Lopez', 'Managua, Nicaragua', '88268430', '88268431', '88268432', 'F04');
INSERT INTO `clientes` VALUES ('4790', 'Laura Perez Guitierrez', 'Niquinohomo', '88268431', '84426249', '84426249', 'F09');
INSERT INTO `clientes` VALUES ('2791', 'Jorge Guadamuz', 'INFIERNO', '82449100', '82449100', '82449100', 'F06');
INSERT INTO `clientes` VALUES ('8792', 'Daniel Ortega', 'CUALQUIERA', '88268432', '88268433', '88268434', 'F02');
INSERT INTO `clientes` VALUES ('3100', 'Emely Espinoza', 'Nose', '88268430', '88268450', '88568720', 'F03');

-- ----------------------------
-- Table structure for grupos
-- ----------------------------
DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos` (
  `IdGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `NombreGrupo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IdResponsable` int(11) NOT NULL,
  `Estado` int(11) NOT NULL,
  `FechaCreada` datetime NOT NULL,
  PRIMARY KEY (`IdGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of grupos
-- ----------------------------
INSERT INTO `grupos` VALUES ('1', 'SAC 1', '2', '1', '2017-09-05 00:00:00');
INSERT INTO `grupos` VALUES ('2', 'SAC 2', '3', '1', '2017-09-05 00:00:00');
INSERT INTO `grupos` VALUES ('3', 'SAC 3', '3', '1', '2017-09-20 17:27:31');
INSERT INTO `grupos` VALUES ('4', 'SAC4', '5', '1', '2017-10-12 11:30:42');

-- ----------------------------
-- Table structure for grupo_asignacion
-- ----------------------------
DROP TABLE IF EXISTS `grupo_asignacion`;
CREATE TABLE `grupo_asignacion` (
  `IdGrupo` int(11) NOT NULL,
  `Vendedor` varchar(10) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grupo_asignacion
-- ----------------------------
INSERT INTO `grupo_asignacion` VALUES ('1', 'F01', '2017-10-06', '1');
INSERT INTO `grupo_asignacion` VALUES ('1', 'F02', '2017-10-06', '1');
INSERT INTO `grupo_asignacion` VALUES ('3', 'F02', '2017-10-10', '1');
INSERT INTO `grupo_asignacion` VALUES ('3', 'F03', '2017-10-10', '1');
INSERT INTO `grupo_asignacion` VALUES ('3', 'F10', '2017-10-10', '1');
INSERT INTO `grupo_asignacion` VALUES ('4', 'F06', '2017-10-12', '1');
INSERT INTO `grupo_asignacion` VALUES ('4', 'F05', '2017-10-12', '1');

-- ----------------------------
-- Table structure for llaves
-- ----------------------------
DROP TABLE IF EXISTS `llaves`;
CREATE TABLE `llaves` (
  `concepto` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of llaves
-- ----------------------------
INSERT INTO `llaves` VALUES ('campaña', '0');
INSERT INTO `llaves` VALUES ('Campaña', '1');
INSERT INTO `llaves` VALUES ('Campaña', '2');
INSERT INTO `llaves` VALUES ('Campaña', '3');
INSERT INTO `llaves` VALUES ('Campaña', '4');
INSERT INTO `llaves` VALUES ('Campaña', '5');
INSERT INTO `llaves` VALUES ('Campaña', '6');
INSERT INTO `llaves` VALUES ('Campaña', '7');
INSERT INTO `llaves` VALUES ('Campaña', '8');
INSERT INTO `llaves` VALUES ('Campaña', '9');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', '0');
INSERT INTO `roles` VALUES ('2', 'Agente', '1');
INSERT INTO `roles` VALUES ('3', 'Supervisor', '2');
INSERT INTO `roles` VALUES ('4', 'Gerente', '3');

-- ----------------------------
-- Table structure for tipificaciones
-- ----------------------------
DROP TABLE IF EXISTS `tipificaciones`;
CREATE TABLE `tipificaciones` (
  `ID_Tipificacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `estado` bit(1) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`ID_Tipificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tipificaciones
-- ----------------------------
INSERT INTO `tipificaciones` VALUES ('1', 'Devolución de llamada durante la tarde', 'Ninguno', '2017-10-10', '', '1');
INSERT INTO `tipificaciones` VALUES ('2', 'Queja del servicio', 'Ninguno', '2017-10-10', '', '1');
INSERT INTO `tipificaciones` VALUES ('3', 'Número incorrecto', 'Número incorrecto', '2017-10-10', '\0', '1');
INSERT INTO `tipificaciones` VALUES ('4', 'No interesado', 'No interesado', '2017-10-11', '\0', '1');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Rol` int(1) NOT NULL,
  `Activo` bit(1) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'SU', 'SU', 'e10adc3949ba59abbe56e057f20f883e', '0', '');
INSERT INTO `usuario` VALUES ('2', 'SAC1', 'MARYAN', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('3', 'SAC2', 'BISMARK', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('4', 'SAC3', 'SAC3', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('5', 'SAC4', 'SAC4', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('6', 'SAC5', 'SAC5', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('7', 'SAC6', 'SAC6', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('8', 'SAC7', 'SAC7', 'e10adc3949ba59abbe56e057f20f883e', '1', '\0');
INSERT INTO `usuario` VALUES ('9', 'SAC8', 'SAC8', 'e10adc3949ba59abbe56e057f20f883e', '1', '\0');
INSERT INTO `usuario` VALUES ('10', 'SAC9', 'SAC9', 'e10adc3949ba59abbe56e057f20f883e', '1', '\0');

-- ----------------------------
-- Table structure for usuario_registros
-- ----------------------------
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

-- ----------------------------
-- Records of usuario_registros
-- ----------------------------
INSERT INTO `usuario_registros` VALUES ('1', '4ba826bd321159ff921ea8e0a25596e876ad4780', 'SU', 'SU', '2017-10-11 13:56:24', '2017-10-11 13:59:15', '00:02:51', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('2', 'c384dcff27074f19e0766eed25766bd10fc3cc82', 'SAC1', 'MARYAN', '2017-10-11 13:59:25', '2017-10-11 13:59:59', '00:00:34', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', '226f34874f4237f6a149a19490259218caea0bf9', 'SAC1', 'MARYAN', '2017-10-11 14:01:09', '2017-10-11 14:02:17', '00:01:08', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', '226f34874f4237f6a149a19490259218caea0bf9', 'SAC1', 'MARYAN', '2017-10-11 14:01:17', '2017-10-11 14:02:17', '00:01:00', 'PAUSA', null);
INSERT INTO `usuario_registros` VALUES ('1', '40de85d2c55b4ed2265a867c17152903d9342182', 'SU', 'SU', '2017-10-11 14:02:27', '2017-10-11 14:05:03', '00:02:36', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('2', 'f520cef9359a3e7e1b5d1a367e3ee1beb02a8c3b', 'SAC1', 'MARYAN', '2017-10-11 14:05:10', '2017-10-11 14:06:26', '00:01:16', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', 'f520cef9359a3e7e1b5d1a367e3ee1beb02a8c3b', 'SAC1', 'MARYAN', '2017-10-11 14:05:24', '2017-10-11 14:06:26', '00:01:02', 'PAUSA', '1');
INSERT INTO `usuario_registros` VALUES ('1', '5379242e72e8342cdcefd7e7c9808c280fda451e', 'SU', 'SU', '2017-10-11 14:14:48', '2017-10-11 14:20:28', '00:05:40', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('1', '58ae381f1f39cf0425bbb538b166478a4d1750fd', 'SU', 'SU', '2017-10-11 14:20:33', '2017-10-11 14:20:55', '00:00:22', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('1', '28a53928e1ae4f6a39729933780644a0d947eb9a', 'SU', 'SU', '2017-10-11 14:28:16', '2017-10-11 14:41:24', '00:13:08', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('1', 'f22e210fdc752ad32eadefbc6cbc9efd8ebab7da', 'SU', 'SU', '2017-10-11 14:41:29', '2017-10-11 14:54:34', '00:13:05', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('2', '5d44e9ac348d961fcbe6a460b3d7a629ea1e7ca5', 'SAC1', 'MARYAN', '2017-10-11 14:54:48', '2017-10-11 14:55:30', '00:00:42', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('1', '837c1441b56155942b5e3ea9584db683f3dd9881', 'SU', 'SU', '2017-10-11 14:55:35', '2017-10-11 15:23:00', '00:27:25', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('2', '47d7945d508cbe374dd3b99f2eebe36c33483ea4', 'SAC1', 'MARYAN', '2017-10-11 15:23:08', '2017-10-11 16:40:54', '01:17:46', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', '74b6c972fa92b43a2bd26ed4ce4b336ad92e45a1', 'SAC1', 'MARYAN', '2017-10-11 16:41:07', '2017-10-11 17:00:25', '00:19:18', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', 'b37750fc59a6203583cbddd37df87f8d1feb335b', 'SAC1', 'MARYAN', '2017-10-11 17:00:35', '2017-10-11 17:21:18', '00:20:43', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', '382242416213124d6cc0a2f138060633d6f7f135', 'SAC1', 'MARYAN', '2017-10-11 17:21:30', '2017-10-11 17:22:45', '00:01:15', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('1', 'ecb28fd791d95a0a084eccce9b83de1194258d90', 'SU', 'SU', '2017-10-11 17:22:51', '2017-10-11 17:28:37', '00:05:46', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('2', '99169298030c5814dab6281bf6649bfc148dd6a4', 'SAC1', 'MARYAN', '2017-10-11 17:28:45', '2017-10-11 17:43:01', '00:14:16', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('1', 'aee76cc8b9f4054ea1b41ca8ca02c2b8b8f465ca', 'SU', 'SU', '2017-10-11 17:42:50', '2017-10-11 17:45:38', '00:02:48', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('3', '0c23b6e4e3f78ec1c7d375946821014c46b3e8a8', 'SAC2', 'BISMARK', '2017-10-11 17:44:00', '2017-10-11 17:45:30', '00:01:30', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('3', '0c23b6e4e3f78ec1c7d375946821014c46b3e8a8', 'SAC2', 'BISMARK', '2017-10-11 17:45:13', '2017-10-11 17:45:30', '00:00:17', 'PAUSA', '1');
INSERT INTO `usuario_registros` VALUES ('2', 'bed601a9cb9b694be529fb10e44131431a38a9b9', 'SAC1', 'MARYAN', '2017-10-11 17:45:51', '2017-10-11 18:01:41', '00:15:50', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('1', '396cb53577d91a56c638d9805597e8eede576c78', 'SU', 'SU', '2017-10-11 18:01:45', '2017-10-11 18:03:38', '00:01:53', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('2', 'd638159c28e66fb580e9b6a37aadad9428f99c2d', 'SAC1', 'MARYAN', '2017-10-11 18:02:01', '2017-10-11 18:03:20', '00:01:19', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('1', '6e95a5b45e09c4bc46b251750a980500d1facdd7', 'SU', 'SU', '2017-10-12 08:08:06', '2017-10-12 08:14:10', '00:06:04', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('2', 'f0175e9e54afbc5b737bc8eb098ba3d0a8db8db0', 'SAC1', 'MARYAN', '2017-10-12 08:10:22', '2017-10-12 08:11:05', '00:00:43', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('3', '95c923e38e0b28c9a4df6c4990447d99dd91ff9c', 'SAC2', 'BISMARK', '2017-10-12 08:11:19', '2017-10-12 08:13:46', '00:02:27', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', '1b4289cdeadda2ae5099b6fad369d53630167c0b', 'SAC1', 'MARYAN', '2017-10-12 08:14:16', '2017-10-12 08:19:09', '00:04:53', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', 'f62bf62dbb85ac602a23fbeb6c458aa3ad3fb8fb', 'SAC1', 'MARYAN', '2017-10-12 08:19:28', '2017-10-12 11:16:56', '02:57:28', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', 'f62bf62dbb85ac602a23fbeb6c458aa3ad3fb8fb', 'SAC1', 'MARYAN', '2017-10-12 08:56:12', '2017-10-12 11:16:55', '02:20:43', 'PAUSA', '1');
INSERT INTO `usuario_registros` VALUES ('1', '2e00a806c650f557bc02bcff0e5217670679f122', 'SU', 'SU', '2017-10-12 11:16:18', '2017-10-12 11:20:28', '00:04:10', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('2', '304f1f18eb09ba3ede4eec0e0633aaa6c4a75a5b', 'SAC1', 'MARYAN', '2017-10-12 11:17:03', '2017-10-12 11:21:30', '00:04:27', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', '304f1f18eb09ba3ede4eec0e0633aaa6c4a75a5b', 'SAC1', 'MARYAN', '2017-10-12 11:19:04', '2017-10-12 11:21:30', '00:02:26', 'PAUSA', '1');
INSERT INTO `usuario_registros` VALUES ('1', '995c14a5d8a2de3723b35c8be7d4e5a393bab360', 'SU', 'SU', '2017-10-12 11:21:42', '2017-10-12 11:35:03', '00:13:21', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('3', 'fa4a69a6666a5b16e52ce5ecb31ef1030599fd6d', 'SAC2', 'BISMARK', '2017-10-12 11:21:50', '2017-10-12 11:56:29', '00:34:39', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('3', 'fa4a69a6666a5b16e52ce5ecb31ef1030599fd6d', 'SAC2', 'BISMARK', '2017-10-12 11:24:20', '2017-10-12 11:24:26', '00:00:06', 'PAUSA', '1');
INSERT INTO `usuario_registros` VALUES ('3', 'fa4a69a6666a5b16e52ce5ecb31ef1030599fd6d', 'SAC2', 'BISMARK', '2017-10-12 11:24:32', '2017-10-12 11:24:47', '00:00:15', 'PAUSA', '1');
INSERT INTO `usuario_registros` VALUES ('3', 'fa4a69a6666a5b16e52ce5ecb31ef1030599fd6d', 'SAC2', 'BISMARK', '2017-10-12 11:27:30', '2017-10-12 11:56:29', '00:28:59', 'PAUSA', '1');
INSERT INTO `usuario_registros` VALUES ('2', 'e30def2a7f0ec2af8219771922994ba0f5bd9ed3', 'SAC1', 'MARYAN', '2017-10-12 11:56:34', '2017-10-12 11:57:08', '00:00:34', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('5', '3a524e21d7b318ed97a6550c459e3030df17b757', 'SAC4', 'SAC4', '2017-10-12 11:57:14', '2017-10-12 12:02:23', '00:05:09', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('1', '3d37a6b0614187006d0d4595a51ac33e1738112a', 'SU', 'SU', '2017-10-12 12:02:28', '2017-10-12 12:03:18', '00:00:50', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('5', '71a53f241fa00ba30624ad6b0f90a7d6420f3c34', 'SAC4', 'SAC4', '2017-10-12 12:03:26', '2017-10-12 14:33:24', '02:29:58', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', '2e041592a2311f93754b1c8807f948a44a1de5a6', 'SAC1', 'MARYAN', '2017-10-12 14:33:32', '2017-10-12 14:41:32', '00:08:00', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('1', 'deafb3b897208b63f41586e9f1801da7f9672068', 'SU', 'SU', '2017-10-12 14:41:37', '2017-10-12 14:46:05', '00:04:28', 'ON', '0');
INSERT INTO `usuario_registros` VALUES ('3', '1778de67a18ebbc632a660faed08b98669f0a817', 'SAC2', 'BISMARK', '2017-10-12 14:46:15', '2017-10-12 14:54:28', '00:08:13', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('3', '3648a8c5e9f98ae1e671e7b5c532b0d7fc16b063', 'SAC2', 'BISMARK', '2017-10-12 14:54:36', '2017-10-12 15:13:45', '00:19:09', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('2', 'ded43cc77c00a41d74788c06095a82c81e32c604', 'SAC1', 'MARYAN', '2017-10-12 15:13:54', '2017-10-12 15:18:24', '00:04:30', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('3', 'd40cebdd28498ef3b3ddccb6b837619f6d6bbc3a', 'SAC2', 'BISMARK', '2017-10-12 15:18:34', '2017-10-12 15:25:50', '00:07:16', 'ON', '1');
INSERT INTO `usuario_registros` VALUES ('1', '2323cf04276d0c08bad4c6d95d60b85282ff474e', 'SU', 'SU', '2017-10-12 15:53:54', null, null, 'ON', '0');

-- ----------------------------
-- View structure for view_campannas_clientes
-- ----------------------------
DROP VIEW IF EXISTS `view_campannas_clientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_campannas_clientes` AS SELECT
	`t0`.`ID_Campannas` AS `ID_Campannas`,
	`t1`.`ID_Cliente` AS `ID_Cliente`,
	`t1`.`Nombre` AS `Nombre`,
	`t1`.`Telefono1` AS `Telefono1`,
	`t1`.`Telefono2` AS `Telefono2`,
	`t1`.`Telefono3` AS `Telefono3`,
	`t0`.`Meta` AS `Meta`,
	`t1`.`Vendedor` AS `Vendedor`
FROM
	(
		`campanna_cliente` `t0`
		JOIN `clientes` `t1` ON (
			(
				`t0`.`ID_Cliente` = `t1`.`ID_Cliente`
			)
		)
	) ;

-- ----------------------------
-- View structure for view_campannas_info
-- ----------------------------
DROP VIEW IF EXISTS `view_campannas_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_campannas_info` AS select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`Nombre` AS `Nombre`,`t1`.`Fecha_Inicio` AS `Fecha_Inicio`,`t1`.`Fecha_Cierre` AS `Fecha_Cierre`,count(`t0`.`ID_Campannas`) AS `TOTAL_LLAMADAS`,sec_to_time(sum(time_to_sec(`t0`.`Duracion`))) AS `TIEMPO_TOTAL`,sec_to_time(avg(time_to_sec(`t0`.`Duracion`))) AS `TIEMPO_PROMEDIO`,`t1`.`Meta` AS `Meta`,sum(`t0`.`Monto`) AS `MONTO_REAL`,`t1`.`Observaciones` AS `Observaciones`,`t1`.`Mensaje` AS `Mensaje`,`t1`.`Estado` AS `Estado` from (`campanna_registros` `t0` join `campanna` `t1` on((`t0`.`ID_Campannas` = `t1`.`ID_Campannas`))) group by `t0`.`ID_Campannas` ;

-- ----------------------------
-- View structure for view_clientescampaniadetalle
-- ----------------------------
DROP VIEW IF EXISTS `view_clientescampaniadetalle`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_clientescampaniadetalle` AS SELECT

  cc.ID_Campannas,
  cc.ID_Cliente,
  cl.Nombre,
  cc.Meta,
  (SELECT MONTO_REAL FROM view_monto_clientes WHERE ID_CLIENTE = cc.ID_Cliente AND ID_Campannas = cc.ID_Campannas) AS montoReal
FROM
  campanna_cliente cc
JOIN clientes cl ON cl.ID_Cliente = cc.ID_Cliente ;

-- ----------------------------
-- View structure for view_monto_clientes
-- ----------------------------
DROP VIEW IF EXISTS `view_monto_clientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_monto_clientes` AS select `t0`.`ID_Campannas` AS `ID_Campannas`,`t0`.`ID_CLIENTE` AS `ID_CLIENTE`,sum(`t0`.`Monto`) AS `MONTO_REAL` from `campanna_registros` `t0` group by `t0`.`ID_Campannas`,`t0`.`ID_CLIENTE` ;

-- ----------------------------
-- View structure for view_vendedoresporgrupo
-- ----------------------------
DROP VIEW IF EXISTS `view_vendedoresporgrupo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_vendedoresporgrupo` AS SELECT
    gp.IdResponsable AS idUsuario,
    GROUP_CONCAT(ga.Vendedor SEPARATOR ', ') AS vendedores
FROM
    grupo_asignacion ga
INNER JOIN grupos gp ON ga.IdGrupo = gp.IdGrupo
GROUP BY nombreGrupo ;

-- ----------------------------
-- Procedure structure for sp_infoCampania
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_infoCampania`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_infoCampania`(IN ID_CampanniaC VARCHAR(20))
BEGIN
SET @totalLlamadas = (SELECT TOTAL_LLAMADAS FROM view_campannas_info WHERE ID_Campannas = ID_CampanniaC );
SET @tiempoPro = (SELECT TIEMPO_PROMEDIO FROM view_campannas_info WHERE ID_Campannas = ID_CampanniaC );
SET @tiempoTotal = (SELECT TIEMPO_TOTAL FROM view_campannas_info WHERE ID_Campannas = ID_CampanniaC );
SET @realMonto = (SELECT MONTO_REAL FROM view_monto_clientes WHERE ID_Campannas = ID_CampanniaC );
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

END
;;
DELIMITER ;
