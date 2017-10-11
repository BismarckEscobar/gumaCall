/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : gcdb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-11 13:33:52
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
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00007', '84426249', '789', '2017-10-10', '14:52:05', '00:00:06', '5000.0000', null, '', '3');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00008', '88432512', '790', '2017-10-10', '15:13:30', '00:00:02', '50000.0000', null, '', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of grupos
-- ----------------------------
INSERT INTO `grupos` VALUES ('1', 'SAC 1', '2', '1', '2017-09-05 00:00:00');
INSERT INTO `grupos` VALUES ('2', 'SAC 2', '3', '1', '2017-09-05 00:00:00');
INSERT INTO `grupos` VALUES ('3', 'SAC 3', '3', '1', '2017-09-20 17:27:31');

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
INSERT INTO `tipificaciones` VALUES ('4', 'No interesado', 'No interesado', '2017-10-11', '', '1');

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
INSERT INTO `usuario` VALUES ('3', 'SAC2', 'BISMARK', 'e10adc3949ba59abbe56e057f20f883e', '1', '\0');
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
  `Tipo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario_registros
-- ----------------------------
INSERT INTO `usuario_registros` VALUES ('2', '42aa4bfb29561962d769191772c89f60146c5273', 'SAC1', 'MARYAN', '2017-09-19 12:02:13', '2017-09-19 14:03:41', '02:01:28', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '0729cbca80ae19b0284d8c62be3641a695d2d8cf', 'SAC1', 'MARYAN', '2017-09-19 14:05:00', '2017-09-19 14:05:10', '00:00:10', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '5c65a7479456889738151cc2d7c4b9f5718d448c', 'SU', 'SU', '2017-09-19 14:05:35', '2017-09-19 14:34:02', '00:28:27', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '76938ff8350828928ce88a0df6872632fab8d99a', 'SU', 'SU', '2017-09-20 10:06:18', '2017-09-20 10:20:12', '00:13:54', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'b1179a53a085c581c2e0ff120846a4abf8230f1e', 'SAC1', 'MARYAN', '2017-09-20 10:20:22', '2017-09-20 10:25:41', '00:05:19', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'ba2d0843682d5a6e39a8c7de9fc5b2eb9ba19ea6', 'SAC1', 'MARYAN', '2017-09-20 10:25:59', '2017-09-20 10:27:40', '00:01:41', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'd7600d573e1c3ec4b3b14530764a45088eea5170', 'SU', 'SU', '2017-09-20 10:27:49', '2017-09-20 10:28:47', '00:00:58', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'acdcad9179d761111c06f6d28a515f3f84a88afa', 'SAC1', 'MARYAN', '2017-09-20 10:28:50', '2017-09-20 10:51:16', '00:22:26', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '52e8115ca1e5118593ecd1ed5421f588921de099', 'SU', 'SU', '2017-09-20 10:51:34', '2017-09-20 10:52:51', '00:01:17', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '0523ec58b1934038f648bed11ddbe1c9a84c7e60', 'SAC1', 'MARYAN', '2017-09-20 10:53:03', '2017-09-20 10:56:34', '00:03:31', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '3d41bcf34d8d7c952aa930673187eeb6f7c3e774', 'SU', 'SU', '2017-09-20 10:56:45', '2017-09-20 11:06:40', '00:09:55', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'edfebad278ed343fdaa35dc5bdd5251793019fa0', 'SAC1', 'MARYAN', '2017-09-20 11:08:12', '2017-09-20 11:08:15', '00:00:03', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'e1eee6b79afd4423fd08de3ee64c3ca83a6ce845', 'SAC1', 'MARYAN', '2017-09-20 11:52:41', '2017-09-20 14:09:16', '02:16:35', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'e8f51cf472856a0aa9729aa94556e0a30b6ff82e', 'SU', 'SU', '2017-09-20 14:09:38', '2017-09-20 14:09:45', '00:00:07', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '300c66d5cd3b36f39eb097f8a021b32660e28bc4', 'SAC1', 'MARYAN', '2017-09-20 14:09:48', '2017-09-20 14:19:38', '00:09:50', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'c2111ac14b8dcf202d8ce36c38ed2d95645a5bec', 'SAC1', 'MARYAN', '2017-09-20 14:19:47', '2017-09-20 14:20:08', '00:00:21', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '3e8dfc1e487fb000de2ae57d3d20a73733e03091', 'SAC1', 'MARYAN', '2017-09-20 14:20:14', '2017-09-20 14:26:52', '00:06:38', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'ca6abbd3079137ef66bbcd4ac927417ac5405a92', 'SAC1', 'MARYAN', '2017-09-20 14:26:58', '2017-09-20 15:01:09', '00:34:11', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'c813b7968505606b3c4821baad97ccca75fa4312', 'SAC1', 'MARYAN', '2017-09-20 15:01:28', '2017-09-20 15:01:50', '00:00:22', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'ea83f6958ae2caf514a8d433af98138655299b42', 'SAC1', 'MARYAN', '2017-09-20 15:01:53', '2017-09-20 15:02:01', '00:00:08', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '562e5bf11c7ca104a9530bf783da059dfebef426', 'SU', 'SU', '2017-09-20 15:02:05', '2017-09-20 15:04:18', '00:02:13', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'd99d381797e4356c5ae8b7fa6e3d1999ef243e01', 'SAC1', 'MARYAN', '2017-09-20 15:04:22', '2017-09-20 15:06:23', '00:02:01', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '6a9d05d8e044af9c7b4d71c43eac056b72114641', 'SAC1', 'MARYAN', '2017-09-20 15:07:49', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '437d2eb1423dca7caeb53b1d48c0a281a0861878', 'SAC1', 'MARYAN', '2017-09-20 15:10:49', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '7061ea58b7bab457e22d8ae8941f6f2152aec105', 'SAC1', 'MARYAN', '2017-09-20 15:14:03', '2017-09-20 15:22:27', '00:08:24', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'd2bf9d50ae86b566290edac89c3ff318d4f1d5f6', 'SU', 'SU', '2017-09-22 11:09:31', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '77159690c55a40a576947f308c66b4fcedbbead8', 'SU', 'SU', '2017-09-25 08:06:30', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '3399fb625c402b973a871d1b4a679b3831f89724', 'SU', 'SU', '2017-09-25 08:13:14', '2017-09-25 09:27:59', '01:14:45', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '291e6f424e51978ae604cdeee270d638f16e85d9', 'SAC1', 'MARYAN', '2017-09-25 09:28:03', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '749ab2badba6cdd659fcbe357996de16e7ba1a96', 'SU', 'SU', '2017-09-25 09:29:49', '2017-09-25 09:29:52', '00:00:03', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '51e2144b8c2887deb7a48daf0240bfce843fff37', 'SU', 'SU', '2017-09-25 09:29:58', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '211770f1904566737253114267331e768e61ccf3', 'SU', 'SU', '2017-09-26 07:54:36', '2017-09-26 08:31:31', '00:36:55', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '5f7eba9715adf283582a7a890f9470d507695292', 'SAC1', 'MARYAN', '2017-09-26 08:31:36', '2017-09-26 08:34:58', '00:03:22', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '1702904df41189a6483a8d39b12fd12777af6d7c', 'SU', 'SU', '2017-09-26 08:36:54', '2017-09-26 16:36:49', '07:59:55', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '1d7be16ac67f06abea85d0e285c994a09c2d305e', 'SAC1', 'MARYAN', '2017-09-26 16:36:54', '2017-09-26 16:39:29', '00:02:35', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '5f3b77af702ab2f9a4a5819b0654bdfce613f1bd', 'SAC1', 'MARYAN', '2017-09-26 16:39:36', '2017-09-26 16:44:02', '00:04:26', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'd3b2dbe07518c09cf61f28f61a3d37efdf2a8f8d', 'SU', 'SU', '2017-09-26 16:44:07', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '65bc2ae180842f3fc3a4f5aca3bf9bd38f1c0b7a', 'SU', 'SU', '2017-09-27 08:28:14', '2017-09-27 13:23:05', '04:54:51', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'fd374513e449dc5d2e0c95d051ac7b6adbcc6986', 'SAC1', 'MARYAN', '2017-09-27 13:23:09', '2017-09-27 13:24:11', '00:01:02', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'f86b7936a7ba87a8d74e26ab4f9fd1fd183d5442', 'SU', 'SU', '2017-09-27 13:24:30', '2017-09-27 13:25:45', '00:01:15', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'e9d0aa8b281146f4bce6e98f4d7a97eb0a82fc89', 'SAC1', 'MARYAN', '2017-09-27 13:25:51', '2017-09-27 13:29:13', '00:03:22', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '5f8d73eec4bdc1f142ceb803a252082348d8b103', 'SU', 'SU', '2017-09-27 13:29:19', '2017-09-27 15:47:09', '02:17:50', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '518991bc0faf99dc37654798caad062aa8a3e19f', 'SAC1', 'MARYAN', '2017-09-27 15:47:17', '2017-09-27 15:57:51', '00:10:34', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '466e41af5efe2bf32da28dfb6d20f07acf62c17f', 'SU', 'SU', '2017-09-27 15:57:53', '2017-09-27 16:24:25', '00:26:32', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '9fb170fb449cf3ab6278d8c65e3a5eb27ff27093', 'SAC1', 'MARYAN', '2017-09-27 16:24:30', '2017-09-27 16:24:58', '00:00:28', 'ON');
INSERT INTO `usuario_registros` VALUES ('3', 'e490551446760e5215a3e84df31c892181866a2e', 'SAC2', 'BISMARK', '2017-09-27 16:25:02', '2017-09-27 16:25:21', '00:00:19', 'ON');
INSERT INTO `usuario_registros` VALUES ('4', '9bcfddc1465d6d1bd1a64b608b124671b1814b1a', 'SAC3', 'SAC3', '2017-09-27 16:25:24', '2017-09-27 16:25:44', '00:00:20', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '8c659ed68076168f428704c2c8f32f435e6fe401', 'SU', 'SU', '2017-09-27 16:25:48', '2017-09-27 16:40:44', '00:14:56', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '19d4dedba5b4a3bb26f8726e4fbfe1251b7fba17', 'SAC1', 'MARYAN', '2017-09-27 16:40:50', '2017-09-27 16:41:48', '00:00:58', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '3dc055bb17b39b72c53b2f3a0e34ef25d76b46b4', 'SU', 'SU', '2017-09-27 16:41:51', '2017-09-27 16:42:21', '00:00:30', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'a59f274d2236a937fcdd43cef437d5bf77a692b9', 'SAC1', 'MARYAN', '2017-09-27 16:42:27', '2017-09-27 16:44:00', '00:01:33', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'b8b34eae5e4b9de08a2935f510252c0aef8630d7', 'SU', 'SU', '2017-09-27 16:44:04', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '09b629d5210e02d9cc8d3d2b8cdf8cddb13957fc', 'SU', 'SU', '2017-09-27 17:19:58', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '6def79578e7e9b07908383976a580e1253ffc517', 'SU', 'SU', '2017-09-28 11:40:43', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '1af242aa0d6e73e1c2db35c61c08c5116a545205', 'SU', 'SU', '2017-10-02 09:34:42', '2017-10-02 09:44:27', '00:09:45', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '5c32ac70ee2e27d03ee8f058c1922b16dd2b1332', 'SAC1', 'MARYAN', '2017-10-02 09:44:31', '2017-10-02 09:45:27', '00:00:56', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'eb711dc54c65ffc4f50389a8c9520f508ea34838', 'SU', 'SU', '2017-10-02 09:45:31', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '8da493014aac99dc7ce513f08094631956952517', 'SU', 'SU', '2017-10-03 09:49:05', '2017-10-03 16:44:49', '06:55:44', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '256866f14acf67ab178c9c727109913c24277a93', 'SAC1', 'MARYAN', '2017-10-03 16:44:54', '2017-10-03 16:57:05', '00:12:11', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '9ae4de57e7b47520e187f2a204a29835c4924c86', 'SU', 'SU', '2017-10-03 16:57:07', '2017-10-03 18:13:15', '01:16:08', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'e624f1252bebe3fb8f2f0ff48a71f5bb1d2f3967', 'SAC1', 'MARYAN', '2017-10-03 18:13:19', '2017-10-03 18:15:06', '00:01:47', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '4fbb1a957f8f927340a63732d95d16f34c864501', 'SU', 'SU', '2017-10-03 18:15:08', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '4e800bf56ad15880572d93c4f0fd6e8e82b909ad', 'SU', 'SU', '2017-10-04 08:11:21', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '2d2c11759d9381f603928561bd98bb1a4d41bd61', 'SU', 'SU', '2017-10-04 11:30:12', '2017-10-04 15:04:37', '03:34:25', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '36b074268fbe8c778efcd3bf357432f290a3821f', 'SAC1', 'MARYAN', '2017-10-04 15:04:41', '2017-10-04 15:06:15', '00:01:34', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '306ccf445063da649203500546e9b79be9061596', 'SU', 'SU', '2017-10-04 15:06:18', '2017-10-04 15:33:13', '00:26:55', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '56368dcf675adab28d26a362353aa69270cd9a66', 'SU', 'SU', '2017-10-04 15:33:16', '2017-10-04 15:33:19', '00:00:03', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '0cb3edc341e32dd60726cfa155d3cb6872f8f4e9', 'SAC1', 'MARYAN', '2017-10-04 15:33:23', '2017-10-04 15:34:02', '00:00:39', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '98037bc4f114dc55363c576230066b6d1b69c080', 'SU', 'SU', '2017-10-04 15:34:06', '2017-10-04 17:00:43', '01:26:37', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '258190e688de933859b494c942164658a4d00feb', 'SAC1', 'MARYAN', '2017-10-04 17:00:49', '2017-10-04 17:05:55', '00:05:06', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '6f394c9f7844f08245107c383aac9fd0c685338b', 'SU', 'SU', '2017-10-04 17:05:58', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'c6169a2137e19c5c7438c3cf1817e536865e410a', 'SU', 'SU', '2017-10-04 17:30:04', '2017-10-04 17:30:18', '00:00:14', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'd4e451f09265d82c23bf5daf54391c866b84d896', 'SU', 'SU', '2017-10-04 17:30:38', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '8a3bc16f8e8ee20f57a41803570594eb4adffc20', 'SU', 'SU', '2017-10-05 08:09:15', '2017-10-05 12:01:47', '03:52:32', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '5b1257e602d9e7a83b559d33e76b468ed5f046bf', 'SAC1', 'MARYAN', '2017-10-05 12:01:50', '2017-10-05 12:02:07', '00:00:17', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '3849b3893748a75015c6cbe4882e8e9b873138f0', 'SU', 'SU', '2017-10-05 12:02:10', '2017-10-05 12:03:24', '00:01:14', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '468f5e4213885359a2f30699f71ceb96b01a0585', 'SAC1', 'MARYAN', '2017-10-05 12:03:27', '2017-10-05 12:03:56', '00:00:29', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '23d5a4aa7f7b7a65665714a1ffb98ed7a674c79d', 'SU', 'SU', '2017-10-05 12:04:00', '2017-10-05 14:00:34', '01:56:34', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '793b4e25f115f64965057479f711a517c84c094e', 'SAC1', 'MARYAN', '2017-10-05 14:00:38', '2017-10-05 14:00:51', '00:00:13', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'e48f42519f2fc4454f50410094a4b9c66b1a191d', 'SAC1', 'MARYAN', '2017-10-05 14:00:54', '2017-10-05 14:01:12', '00:00:18', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '111d0b432dbc332e2ddf0a349afb2b5ea5a40f76', 'SU', 'SU', '2017-10-05 14:01:16', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '5d3a7ee2c3e9035cbee696d44f0ee56dff4e801e', 'SU', 'SU', '2017-10-06 10:38:04', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'cfc3de8e8ece9291873622c23999a0d31403c62a', 'SU', 'SU', '2017-10-06 16:34:54', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'dda0717b4a44298b360d1c19581acd242d629040', 'SU', 'SU', '2017-10-09 08:07:23', '2017-10-09 08:09:47', '00:02:24', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'd360d0f95cce43933e268844e7f386b6c10ab669', 'SAC1', 'MARYAN', '2017-10-09 08:09:50', '2017-10-09 08:17:21', '00:07:31', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '13ea910fe3a29011d878cca0e46e3ddf302ab55c', 'SU', 'SU', '2017-10-09 08:18:07', '2017-10-09 08:33:14', '00:15:07', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '65f784c3f8af277eba56ecd48f595b89b378ea45', 'SAC1', 'MARYAN', '2017-10-09 08:33:19', '2017-10-09 08:34:54', '00:01:35', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '67b989c50d4bfb0441c081eea93ae21b8c05aaed', 'SU', 'SU', '2017-10-09 08:34:59', '2017-10-09 09:04:42', '00:29:43', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '299df5854a90361f37d0ff7e669d61dae86c0a4f', 'SAC1', 'MARYAN', '2017-10-09 09:04:46', '2017-10-09 09:07:46', '00:03:00', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '1d5020a38310a028d18ad6af148aa79e1e1fc5eb', 'SAC1', 'MARYAN', '2017-10-09 09:16:59', '2017-10-09 09:21:45', '00:04:46', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '511d757055149f94397d6da3184fb7b208f2dd85', 'SU', 'SU', '2017-10-09 09:22:00', '2017-10-09 09:39:49', '00:17:49', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '6223bd75b2fe6f280134f7b4b80d20769ce0efa7', 'SAC1', 'MARYAN', '2017-10-09 09:39:53', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '1f1dc053e7cfb1bd7b4ecd01fae34857a5943a2f', 'SAC1', 'MARYAN', '2017-10-09 09:44:51', '2017-10-09 09:46:00', '00:01:09', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'adeaa96526602d5054662a48f6a50af76409eeeb', 'SU', 'SU', '2017-10-09 09:46:06', '2017-10-09 09:46:25', '00:00:19', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '3b45cf5f10aa9f3cb634a82c54e3838df91f9330', 'SAC1', 'MARYAN', '2017-10-09 09:46:32', '2017-10-09 09:47:38', '00:01:06', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'e4edb31958864073210c530049b1387830be45f0', 'SU', 'SU', '2017-10-09 09:51:21', '2017-10-09 10:17:35', '00:26:14', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'b42d43aa36f2bc89dea42d6f8337b80973547ff6', 'SU', 'SU', '2017-10-09 10:17:38', '2017-10-09 10:17:40', '00:00:02', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '40be2689097c18453ed5bf1768eb63ebcf2d7c04', 'SAC1', 'MARYAN', '2017-10-09 10:17:42', '2017-10-09 10:17:59', '00:00:17', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '4dcdae532ee13fa87e8e22953b24245a1a221d7c', 'SU', 'SU', '2017-10-09 10:18:02', '2017-10-09 10:23:49', '00:05:47', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'd3b7e28560ba1eaedd48fd825a7bf9c284907d24', 'SAC1', 'MARYAN', '2017-10-09 10:23:52', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '26c40e71f40000aecb8cb940e3c221481adc9248', 'SAC1', 'MARYAN', '2017-10-09 10:24:27', '2017-10-09 10:31:21', '00:06:54', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '43ca3e70485ff9338ab26f0e7ea9ba86ccb4670c', 'SU', 'SU', '2017-10-09 10:31:24', '2017-10-09 11:55:43', '01:24:19', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'a084759927173c7df67a275adfd2343803ddaee6', 'SU', 'SU', '2017-10-09 11:55:47', '2017-10-09 11:55:48', '00:00:01', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '39cf2b82d6ebb69f05515c30ffb823bbcb850339', 'SAC1', 'MARYAN', '2017-10-09 11:55:51', '2017-10-09 11:57:00', '00:01:09', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '026ddb7449cb77fc800877ef090b8bc8e3dd94fd', 'SU', 'SU', '2017-10-09 11:57:08', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '56147e2bbe63afb25a6ceafc7f28627aebd4825d', 'SU', 'SU', '2017-10-09 18:17:12', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '640cd9027b484b3486fadd13946e55a6f0995e09', 'SU', 'SU', '2017-10-10 08:14:06', '2017-10-10 14:51:02', '06:36:56', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '6c9e1d52ee63a47c652c2d32c7335033b56a4434', 'SAC1', 'MARYAN', '2017-10-10 14:51:05', '2017-10-10 14:52:11', '00:01:06', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '83350591be7e0b0976ab802f77922e435442b349', 'SU', 'SU', '2017-10-10 14:52:14', '2017-10-10 14:55:47', '00:03:33', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '2218deb26d808773f0bd86bc538826b11f749f3b', 'SAC1', 'MARYAN', '2017-10-10 14:55:50', '2017-10-10 14:56:00', '00:00:10', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '4e17a2bc98a7144be31355c6412a3a4b6282672b', 'SU', 'SU', '2017-10-10 14:56:06', '2017-10-10 15:12:50', '00:16:44', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '622efcaa4540a7ffc9248067592b98bb37bd97eb', 'SAC1', 'MARYAN', '2017-10-10 15:12:53', '2017-10-10 15:13:50', '00:00:57', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'c62f2c50263de002cd3813b188f066f6110f23fa', 'SU', 'SU', '2017-10-10 15:13:54', '2017-10-10 15:25:57', '00:12:03', 'ON');
INSERT INTO `usuario_registros` VALUES ('9', '6a4b72315171afef460a6163b9c4cc15f324e39d', 'SAC8', 'SAC8', '2017-10-10 15:26:01', '2017-10-10 15:27:08', '00:01:07', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '2fdd5d2e9c1e0d9958686df9331a61bda5d80556', 'SU', 'SU', '2017-10-10 15:27:11', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '55117809848e1c1a2dddccff194c15bc6ed26bd6', 'SU', 'SU', '2017-10-11 08:05:27', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '2cdabc948bae57dcb51ad44d6f900533a9ded303', 'SU', 'SU', '2017-10-11 10:31:23', '2017-10-11 10:45:49', '00:14:26', 'ON');
INSERT INTO `usuario_registros` VALUES ('4', '34c71c2f976d697df1845fb0802c8e60aeb75a3f', 'SAC3', 'SAC3', '2017-10-11 10:49:38', '2017-10-11 10:52:41', '00:03:03', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '5f3e8fbd3cdf8969db4c96d42266722c0c516780', 'SU', 'SU', '2017-10-11 10:55:36', '2017-10-11 11:05:46', '00:10:10', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'cb35ac669e7972e1001d237fda2bfe2d822d122a', 'SU', 'SU', '2017-10-11 11:05:54', '2017-10-11 11:06:17', '00:00:23', 'ON');
INSERT INTO `usuario_registros` VALUES ('8', '4876abe20b2b0b8bdf27986a7a51f7889675ccb7', 'SAC7', 'SAC7', '2017-10-11 11:06:20', '2017-10-11 11:06:23', '00:00:03', 'ON');
INSERT INTO `usuario_registros` VALUES ('9', '4976d03ab07472a7303d3ae46d51fd0521d0f60c', 'SAC8', 'SAC8', '2017-10-11 11:06:26', '2017-10-11 11:06:29', '00:00:03', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '431a78adc75d6a017aa34c9c1cc36b6d55e877b3', 'SU', 'SU', '2017-10-11 11:06:32', '2017-10-11 11:30:54', '00:24:22', 'ON');
INSERT INTO `usuario_registros` VALUES ('3', '782d9544ca84055280b24b652eb28e79b62a666f', 'SAC2', 'BISMARK', '2017-10-11 11:30:57', '2017-10-11 11:31:05', '00:00:08', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'b4cc5ab6923f0f681adf33b4f887bbc004debd7b', 'SU', 'SU', '2017-10-11 11:31:07', '2017-10-11 11:42:50', '00:11:43', 'ON');
INSERT INTO `usuario_registros` VALUES ('8', '5a4ac4761b6710a6f24bec493b506e5161736e00', 'SAC7', 'SAC7', '2017-10-11 11:42:54', '2017-10-11 11:42:56', '00:00:02', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'e5d540366e3c74ef981a958bab014aa1827e88cf', 'SU', 'SU', '2017-10-11 11:43:00', '2017-10-11 13:15:50', '01:32:50', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'e7b03208dc520278efb2bf920870d7e548201758', 'SAC1', 'MARYAN', '2017-10-11 13:16:14', '2017-10-11 13:24:08', '00:07:54', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '2dbe24e4f150800be961c79fff5dc7359417590f', 'SU', 'SU', '2017-10-11 13:24:11', null, null, 'ON');

-- ----------------------------
-- View structure for view_campannas_clientes
-- ----------------------------
DROP VIEW IF EXISTS `view_campannas_clientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_campannas_clientes` AS select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`ID_Cliente` AS `ID_Cliente`,`t1`.`Nombre` AS `Nombre`,`t1`.`Telefono1` AS `Telefono1`,`t1`.`Telefono2` AS `Telefono2`,`t1`.`Telefono3` AS `Telefono3`,`t0`.`Meta` AS `Meta` from (`campanna_cliente` `t0` join `clientes` `t1` on((`t0`.`ID_Cliente` = `t1`.`ID_Cliente`))) ;

-- ----------------------------
-- View structure for view_campannas_info
-- ----------------------------
DROP VIEW IF EXISTS `view_campannas_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_campannas_info` AS select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`Nombre` AS `Nombre`,`t1`.`Fecha_Inicio` AS `Fecha_Inicio`,`t1`.`Fecha_Cierre` AS `Fecha_Cierre`,count(`t0`.`ID_Campannas`) AS `TOTAL_LLAMADAS`,sec_to_time(sum(time_to_sec(`t0`.`Duracion`))) AS `TIEMPO_TOTAL`,sec_to_time(avg(time_to_sec(`t0`.`Duracion`))) AS `TIEMPO_PROMEDIO`,`t1`.`Meta` AS `Meta`,sum(`t0`.`Monto`) AS `MONTO_REAL`,`t1`.`Observaciones` AS `Observaciones`,`t1`.`Mensaje` AS `Mensaje`,`t1`.`Estado` AS `Estado` from (`campanna_registros` `t0` join `campanna` `t1` on((`t0`.`ID_Campannas` = `t1`.`ID_Campannas`))) group by `t0`.`ID_Campannas` ;

-- ----------------------------
-- View structure for view_clientescampaniadetalle
-- ----------------------------
DROP VIEW IF EXISTS `view_clientescampaniadetalle`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_clientescampaniadetalle` AS SELECT
	cc.ID_Campannas,
	cc.ID_Cliente,
	cl.Nombre,
	cc.Meta,
	(SELECT MONTO_REAL FROM view_monto_clientes WHERE ID_CLIENTE = cc.ID_Cliente AND ID_Campannas = cc.ID_Campannas) AS montoReal
FROM
	campanna_cliente cc
JOIN clientes cl ON cl.ID_Cliente = cc.ID_Cliente ;

-- ----------------------------
-- View structure for view_list_vendedores
-- ----------------------------
DROP VIEW IF EXISTS `view_list_vendedores`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_list_vendedores` AS  ;

-- ----------------------------
-- View structure for view_monto_clientes
-- ----------------------------
DROP VIEW IF EXISTS `view_monto_clientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_monto_clientes` AS select `t0`.`ID_Campannas` AS `ID_Campannas`,`t0`.`ID_CLIENTE` AS `ID_CLIENTE`,sum(`t0`.`Monto`) AS `MONTO_REAL` from `campanna_registros` `t0` group by `t0`.`ID_Campannas`,`t0`.`ID_CLIENTE` ;

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
/*INNER JOIN campanna_registros cr ON cm.ID_Campannas = cr.ID_Campannas  */
WHERE cm.ID_Campannas = ID_CampanniaC;

END
;;
DELIMITER ;
