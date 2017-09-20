/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : gcdb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-20 08:00:20
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
INSERT INTO `campanna` VALUES ('CP-00003', 'Prueba', '2017-09-18 00:00:00', '2017-09-22 00:00:00', '4', '1', '45000.00', 'Ninguna', 'Ninguno', '2017-09-18 14:29:03', null, '1');
INSERT INTO `campanna` VALUES ('CP-00004', 'nueva campaña', '2017-09-18 00:00:00', '2017-09-22 00:00:00', '4', '1', '50000.00', 'Ninguna', 'Ninguno', '2017-09-18 14:38:24', null, '1');
INSERT INTO `campanna` VALUES ('CP-00005', 'prueba', '2017-09-18 00:00:00', '2017-09-23 00:00:00', '2', '1', '60100.00', 'prueba', 'prueba', '2017-09-18 15:49:29', null, '1');
INSERT INTO `campanna` VALUES ('CP-00006', 'datos de prueba', '2017-09-18 00:00:00', '2017-09-23 00:00:00', '4', '1', '89000.00', 'Ninguna', 'Ninguno', '2017-09-19 08:06:42', null, '1');
INSERT INTO `campanna` VALUES ('CP-00007', 'campaña de prueba', '2017-09-18 00:00:00', '2017-09-22 00:00:00', '1', '1', '78000.00', 'Ninguna', 'Ninguno', '2017-09-19 16:56:21', null, '1');
INSERT INTO `campanna` VALUES ('CP-00008', 'prueba', '2017-09-19 00:00:00', '2017-09-19 00:00:00', '1', '1', '9000.00', 'ninguna', 'ninguna', '2017-09-19 18:09:17', null, '1');

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
INSERT INTO `campanna_asignacion` VALUES ('CP-00001', '2', '2017-09-18 11:34:55');
INSERT INTO `campanna_asignacion` VALUES ('CP-00002', '3', '2017-09-18 14:16:19');
INSERT INTO `campanna_asignacion` VALUES ('CP-00003', '6', '2017-09-18 14:29:03');
INSERT INTO `campanna_asignacion` VALUES ('CP-00004', '3', '2017-09-18 14:38:25');
INSERT INTO `campanna_asignacion` VALUES ('CP-00005', '6', '2017-09-18 15:49:29');
INSERT INTO `campanna_asignacion` VALUES ('CP-00006', '4', '2017-09-19 08:06:42');
INSERT INTO `campanna_asignacion` VALUES ('CP-00006', '7', '2017-09-19 08:06:43');
INSERT INTO `campanna_asignacion` VALUES ('CP-00007', '2', '2017-09-19 16:56:21');
INSERT INTO `campanna_asignacion` VALUES ('CP-00008', '3', '2017-09-19 18:09:17');

-- ----------------------------
-- Table structure for campanna_cliente
-- ----------------------------
DROP TABLE IF EXISTS `campanna_cliente`;
CREATE TABLE `campanna_cliente` (
  `ID_Campannas` varchar(10) DEFAULT NULL,
  `ID_Cliente` varchar(10) DEFAULT NULL,
  `Meta` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of campanna_cliente
-- ----------------------------
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '788', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '789', '6000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '790', '7000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '791', '8000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '792', '9000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00001', '793', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '788', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '789', '6000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '790', '7000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '791', '8000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '792', '9000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00002', '793', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '788', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '789', '6000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '790', '7000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '791', '8000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '792', '9000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00003', '793', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '788', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '789', '6000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '790', '7000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '791', '8000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '792', '9000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00004', '793', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '788', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '789', '6000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '790', '7000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '791', '8000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '792', '9000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00005', '793', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '788', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '789', '6000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '790', '7000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '791', '8000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '792', '9000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00006', '793', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '788', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '789', '6000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '790', '7000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '791', '8000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '792', '9000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00007', '793', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '788', '5000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '789', '6000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '790', '7000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '791', '8000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '792', '9000.00');
INSERT INTO `campanna_cliente` VALUES ('CP-00008', '793', '5000.00');

-- ----------------------------
-- Table structure for campanna_estados
-- ----------------------------
DROP TABLE IF EXISTS `campanna_estados`;
CREATE TABLE `campanna_estados` (
  `ID_Estado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_Estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of campanna_estados
-- ----------------------------
INSERT INTO `campanna_estados` VALUES ('1', 'Activa');
INSERT INTO `campanna_estados` VALUES ('2', 'Inactiva');
INSERT INTO `campanna_estados` VALUES ('3', 'Aprobada');
INSERT INTO `campanna_estados` VALUES ('4', 'Procesando');

-- ----------------------------
-- Table structure for campanna_registros
-- ----------------------------
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

-- ----------------------------
-- Records of campanna_registros
-- ----------------------------
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:23:05', 'mi segundo comentario', '0', '0234');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:23:05', 'mi tercer comentario', '5', '0125');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '8.0000', '00:23:05', '8', '4', '01264');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '0.0000', '00:23:05', 't', '2', '0');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '0.0000', '00:23:05', 'j', '1', '0');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '0.0000', '00:23:05', 'd', '5', '0');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '0.0000', '00:23:05', 'd', '2', '222');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '0.0000', '00:23:05', 'f', '3', '1111');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '151.2500', '00:23:05', 'Comentario Final', '2', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '175.5000', '00:23:05', 'llamada final', '2', '66665');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '2235.2500', '00:23:05', 'saldo', '4', '0');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '450.0000', '00:23:05', 'kjhkjhkj', '4', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '1500.0000', '00:23:05', 'mi primer comentario', '5', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '1500.0000', '00:23:05', 'mi primer comentario', '5', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:23:05', 'comentarios', '2', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:23:05', 'comentarios', '2', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:23:05', 'comentarios', '2', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:23:05', 'comentairo', '7', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:23:05', 'ggg', '3', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:23:05', '200', '5', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:23:05', '1111', '7', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:23:05', '111', '4', '03164');
INSERT INTO `campanna_registros` VALUES ('2', 'CP-00003', '100.0000', '00:00:09', 'gdfgdfgdfgdfgdf', '2', '03164');

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
  `Telefono3` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('03164', 'CLIENTE DE PRUEBA', 'INFIERNO', '82449100', '82449100', '82449100');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of grupos
-- ----------------------------
INSERT INTO `grupos` VALUES ('1', 'grupo editado 12', '3', '1', '2017-09-05 00:00:00');
INSERT INTO `grupos` VALUES ('2', 'GRUPO EDITADO 1', '4', '1', '2017-09-05 00:00:00');
INSERT INTO `grupos` VALUES ('3', 'Grupo prueba', '4', '1', '2017-09-19 09:14:50');
INSERT INTO `grupos` VALUES ('4', 'grupo editado 4', '4', '1', '2017-09-19 11:47:21');
INSERT INTO `grupos` VALUES ('5', 'sac1', '4', '1', '2017-09-19 16:06:25');

-- ----------------------------
-- Table structure for grupo_asignacion
-- ----------------------------
DROP TABLE IF EXISTS `grupo_asignacion`;
CREATE TABLE `grupo_asignacion` (
  `IdGrupo` int(11) NOT NULL,
  `ID_Vendedor` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `ID_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of grupo_asignacion
-- ----------------------------
INSERT INTO `grupo_asignacion` VALUES ('4', '3', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('4', '2', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('2', '2', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('2', '3', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('2', '4', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('5', '2', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('5', '4', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('1', '2', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('1', '4', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('1', '11', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('1', '3', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('1', '5', '2017-09-19', '1');
INSERT INTO `grupo_asignacion` VALUES ('3', '3', '2017-09-19', '1');

-- ----------------------------
-- Table structure for llaves
-- ----------------------------
DROP TABLE IF EXISTS `llaves`;
CREATE TABLE `llaves` (
  `concepto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of llaves
-- ----------------------------
INSERT INTO `llaves` VALUES ('Campaña', '0');
INSERT INTO `llaves` VALUES ('Campaña', '1');
INSERT INTO `llaves` VALUES ('Campaña', '2');
INSERT INTO `llaves` VALUES ('Campaña', '3');
INSERT INTO `llaves` VALUES ('Campaña', '4');
INSERT INTO `llaves` VALUES ('Campaña', '5');
INSERT INTO `llaves` VALUES ('Campaña', '6');
INSERT INTO `llaves` VALUES ('Campaña', '7');
INSERT INTO `llaves` VALUES ('Campaña', '8');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0', '');
INSERT INTO `usuario` VALUES ('2', 'SAC1', 'MARYAN', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('3', 'SAC2', 'BISMARK', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('4', 'SAC3', 'SAC3', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('5', 'SAC4', 'SAC4', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('6', 'SAC5', 'SAC5', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('7', 'SAC6', 'SAC6', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('8', 'SAC7', 'SAC7', 'e10adc3949ba59abbe56e057f20f883e', '1', '');
INSERT INTO `usuario` VALUES ('9', 'SAC8', 'SAC8', 'e10adc3949ba59abbe56e057f20f883e', '1', '\0');
INSERT INTO `usuario` VALUES ('10', 'SAC9', 'SAC9', 'e10adc3949ba59abbe56e057f20f883e', '1', '\0');
INSERT INTO `usuario` VALUES ('11', 'juan', 'Juan', '25d55ad283aa400af464c76d713c07ad', '1', '');

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
INSERT INTO `usuario_registros` VALUES ('1', 'f54bd8e4e9258e29a813b099bdd053ef70d271e3', 'admin', 'admin', '2017-09-12 02:21:26', '2017-09-12 02:24:28', '00:03:02', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '0944ac006f8940193c79afc402019506d38c49e4', 'SAC1', 'MARYAN', '2017-09-12 02:21:37', '2017-09-12 02:24:17', '00:02:40', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '0944ac006f8940193c79afc402019506d38c49e4', 'SAC1', 'MARYAN', '2017-09-12 02:21:57', '2017-09-12 02:24:17', '00:02:20', 'PAUSA');
INSERT INTO `usuario_registros` VALUES ('2', '5a09842fef15ba1bf4522c32763a536852310762', 'SAC1', 'MARYAN', '2017-09-12 02:24:39', '2017-09-12 02:29:29', '00:04:50', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '5a09842fef15ba1bf4522c32763a536852310762', 'SAC1', 'MARYAN', '2017-09-12 02:25:35', '2017-09-12 02:29:29', '00:03:54', 'PAUSA');
INSERT INTO `usuario_registros` VALUES ('1', 'e3abaa3d7923174c9522b9131eae5baa8916b421', 'admin', 'admin', '2017-09-12 02:30:21', '2017-09-12 02:30:38', '00:00:17', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'ca24e43617c4b8498c83ae8fd0e954b51118aa84', 'admin', 'admin', '2017-09-12 02:31:32', '2017-09-12 02:34:28', '00:02:56', 'ON');
INSERT INTO `usuario_registros` VALUES ('3', '3c3b2fbba352a28cdc94ec54b37f4c028b06279e', 'SAC2', 'BISMARK', '2017-09-12 02:35:33', '2017-09-12 02:37:18', '00:01:45', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '68d0af631b669175f5315ff45a664c59757c1fb8', 'admin', 'admin', '2017-09-12 02:36:57', '2017-09-12 02:38:58', '00:02:01', 'ON');
INSERT INTO `usuario_registros` VALUES ('3', '77eb1650d4e390a0e06e6d31680adaf87c315898', 'SAC2', 'BISMARK', '2017-09-12 02:37:24', '2017-09-12 02:38:48', '00:01:24', 'ON');
INSERT INTO `usuario_registros` VALUES ('3', '77eb1650d4e390a0e06e6d31680adaf87c315898', 'SAC2', 'BISMARK', '2017-09-12 02:37:37', '2017-09-12 02:37:53', '00:00:16', 'PAUSA');
INSERT INTO `usuario_registros` VALUES ('3', '77eb1650d4e390a0e06e6d31680adaf87c315898', 'SAC2', 'BISMARK', '2017-09-12 02:38:09', '2017-09-12 02:38:48', '00:00:39', 'PAUSA');
INSERT INTO `usuario_registros` VALUES ('1', 'b757a194f1500267e286acca5dbb80c5a67a4853', 'admin', 'admin', '2017-09-12 02:42:32', '2017-09-12 02:44:08', '00:01:36', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'baee3499b5f87234a7f5f746cdb577422e59a0ec', 'SAC1', 'MARYAN', '2017-09-12 02:42:48', '2017-09-12 02:47:43', '00:04:55', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'baee3499b5f87234a7f5f746cdb577422e59a0ec', 'SAC1', 'MARYAN', '2017-09-12 02:43:08', '2017-09-12 02:47:43', '00:04:35', 'PAUSA');
INSERT INTO `usuario_registros` VALUES ('1', 'f9e6d2a5203ba203f1598f9724cf9152b631dbec', 'SU', 'SU', '2017-09-18 09:09:13', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '175d6544b34471b455e50966ecd18d61e31e4313', 'SU', 'SU', '2017-09-18 09:10:03', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '5d712384fb99d309e3e519e58f0241170427070c', 'SAC1', 'MARYAN', '2017-09-18 09:15:07', '2017-09-18 09:15:53', '00:00:46', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '4abd8a447554adced026f93e9a1071e1bf63218b', 'admin', 'admin', '2017-09-18 09:18:08', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'a43dda0ee786e2f057fb8d3dbcb4c959756a0579', 'admin', 'admin', '2017-09-18 09:46:12', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'b3dc3bb40197ecef66b2c48c9ca339ad2422ebd5', 'admin', 'admin', '2017-09-18 09:47:30', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '1befa156244682928425c249e9776f5c31361e74', 'admin', 'admin', '2017-09-18 09:51:04', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '25113a35bf3af7952fe17632e3176cdc8546f42e', 'admin', 'admin', '2017-09-18 11:00:27', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '45d8ba23b9c80dfd2221a16c3e5884947baac0c7', 'admin', 'admin', '2017-09-19 07:58:36', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '2a977b04fad36057ebb699b93e297aa07fcb5334', 'admin', 'admin', '2017-09-19 08:05:32', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'd843a1c0bc869563880dbd9dd7b3304ceb5c8d25', 'admin', 'admin', '2017-09-19 09:07:47', '2017-09-19 09:08:40', '00:00:53', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '515c5a6d4e66cdae3f61eb7abcec27a52d5b5121', 'admin', 'admin', '2017-09-19 09:09:14', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'd240b81ee893c9adc10b30cc5ae5bbebabbd74e1', 'admin', 'admin', '2017-09-19 02:04:08', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '55f752d787161d1a3871c969a08bbb5855b36c6a', 'admin', 'admin', '2017-09-19 04:20:19', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '66100c0d8ef7c8d7c89aab348cd11c38c854b1b0', 'SAC1', 'MARYAN', '2017-09-19 04:53:16', '2017-09-19 04:53:23', '00:00:07', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '7014b6a26f40fb8cd0c98bbc50f066021ca48f50', 'SAC1', 'MARYAN', '2017-09-19 04:53:29', '2017-09-19 04:54:20', '00:00:51', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '9ce8de34bc1affe23b28a8115131976dafe27407', 'SAC1', 'MARYAN', '2017-09-19 04:54:57', '2017-09-19 04:55:07', '00:00:10', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '4868411ff6587a109036ddd3efa9a4828f0fd5c8', 'admin', 'admin', '2017-09-19 04:55:10', '2017-09-19 04:56:32', '00:01:22', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '8f643456e38b69c774f6eedabe4145efabb8e60a', 'SAC1', 'MARYAN', '2017-09-19 04:56:37', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', 'd69ffabb94799ddb5dc9fffe462ada731f432c0c', 'admin', 'admin', '2017-09-19 05:06:23', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('2', '6c0157f672c08ac261419186e41492ba43d71db1', 'SAC1', 'MARYAN', '2017-09-19 05:31:00', '2017-09-19 05:32:24', '00:01:24', 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '55eb3600f765a96d70b63da4b77af106c9cc6102', 'admin', 'admin', '2017-09-19 05:32:28', '2017-09-19 05:32:36', '00:00:08', 'ON');
INSERT INTO `usuario_registros` VALUES ('2', 'b939ee36422fe79f2832cba5f4f45b17daf5bc8f', 'SAC1', 'MARYAN', '2017-09-19 05:32:42', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '00b91d2b02deca19e4eaffe667110978deb7505b', 'admin', 'admin', '2017-09-19 05:38:53', null, null, 'ON');
INSERT INTO `usuario_registros` VALUES ('1', '7bb108f96e5cdc92fac67b8f9a9b5247a66f6d0b', 'admin', 'admin', '2017-09-20 07:58:19', null, null, 'ON');

-- ----------------------------
-- View structure for view_campannas_clientes
-- ----------------------------
DROP VIEW IF EXISTS `view_campannas_clientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_campannas_clientes` AS select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`ID_Cliente` AS `ID_Cliente`,`t1`.`Nombre` AS `Nombre`,`t1`.`Telefono1` AS `Telefono1`,`t1`.`Telefono2` AS `Telefono2`,`t1`.`Telefono3` AS `Telefono3`,`t0`.`Meta` AS `Meta` from (`campanna_cliente` `t0` join `clientes` `t1` on((`t0`.`ID_Cliente` = `t1`.`ID_Cliente`))) ;

-- ----------------------------
-- View structure for view_campannas_info
-- ----------------------------
DROP VIEW IF EXISTS `view_campannas_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_campannas_info` AS select `t0`.`ID_Campannas` AS `ID_Campannas`,`t1`.`Nombre` AS `Nombre`,`t1`.`Fecha_Inicio` AS `Fecha_Inicio`,`t1`.`Fecha_Cierre` AS `Fecha_Cierre`,count(`t0`.`ID_Campannas`) AS `TOTAL_LLAMADAS`,sec_to_time(sum(time_to_sec(`t0`.`Tiempo`))) AS `TIEMPO_TOTAL`,sec_to_time(avg(time_to_sec(`t0`.`Tiempo`))) AS `TIEMPO_PROMEDIO`,`t1`.`Meta` AS `Meta`,sum(`t0`.`Monto`) AS `MONTO_REAL`,`t1`.`Observaciones` AS `Observaciones`,`t1`.`Mensaje` AS `Mensaje`,`t1`.`Estado` AS `Estado` from (`campanna_registros` `t0` join `campanna` `t1` on((`t0`.`ID_Campannas` = `t1`.`ID_Campannas`))) group by `t0`.`ID_Campannas` ;

-- ----------------------------
-- View structure for view_monto_clientes
-- ----------------------------
DROP VIEW IF EXISTS `view_monto_clientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_monto_clientes` AS select `t0`.`ID_Campannas` AS `ID_Campannas`,`t0`.`ID_CLIENTE` AS `ID_CLIENTE`,sum(`t0`.`Monto`) AS `MONTO_REAL` from `campanna_registros` `t0` group by `t0`.`ID_Campannas`,`t0`.`ID_CLIENTE` ;
