-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2018 at 01:25 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inima`
--

-- --------------------------------------------------------

--
-- Table structure for table `administracion_tarifas`
--

CREATE TABLE `administracion_tarifas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tarifa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `administracion_tarifas`
--

INSERT INTO `administracion_tarifas` (`id`, `nombre`, `tarifa`, `estado`, `fecha`) VALUES
(1, 'NORMAL', '22500', 1, '2018-10-27 04:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `afiliaciones`
--

CREATE TABLE `afiliaciones` (
  `id` int(11) NOT NULL,
  `afiliado_id` int(11) NOT NULL,
  `tarifa_ibc` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `profesiones_id` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `arl_tarifas_id` int(11) NOT NULL,
  `eps_id` int(11) NOT NULL,
  `arl_id` int(11) NOT NULL,
  `afp_id` int(11) DEFAULT NULL,
  `caja_compensaciones_id` int(11) DEFAULT NULL,
  `tipo_afiliados_id` int(11) NOT NULL,
  `administracion_tarifas_id` int(11) NOT NULL,
  `impuestos_tarifa_id` int(11) NOT NULL,
  `empresa_afi_id` int(11) DEFAULT NULL,
  `empresa_apo_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `afiliaciones`
--

INSERT INTO `afiliaciones` (`id`, `afiliado_id`, `tarifa_ibc`, `profesiones_id`, `arl_tarifas_id`, `eps_id`, `arl_id`, `afp_id`, `caja_compensaciones_id`, `tipo_afiliados_id`, `administracion_tarifas_id`, `impuestos_tarifa_id`, `empresa_afi_id`, `empresa_apo_id`, `usuario_id`, `fecha`) VALUES
(1, 1, '781242', '7', 1, 13, 5, NULL, NULL, 2, 1, 1, NULL, 5, 1, '2018-12-28 21:14:22'),
(2, 2, '781242', '8', 1, 13, 5, NULL, NULL, 2, 1, 1, NULL, 5, 1, '2018-12-28 21:14:24'),
(3, 4, '781242', '8', 1, 11, 5, 0, 0, 2, 1, 0, NULL, 5, 13, '2018-12-29 00:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `afiliacion_tarifas`
--

CREATE TABLE `afiliacion_tarifas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tarifa` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `afiliacion_tarifas`
--

INSERT INTO `afiliacion_tarifas` (`id`, `nombre`, `tarifa`, `estado`, `fecha`) VALUES
(1, 'NORMAL', 75000, 1, '2018-10-27 03:32:33'),
(2, 'PROMOCIóN', 40000, 1, '2018-10-29 22:03:39'),
(3, 'GRATIS', 0, 1, '2018-10-29 22:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `afiliados`
--

CREATE TABLE `afiliados` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `cedula` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `afiliados`
--

INSERT INTO `afiliados` (`id`, `nombres`, `apellido_paterno`, `apellido_materno`, `tipo_documento`, `numero_documento`, `email`, `celular`, `telefono`, `direccion`, `barrio`, `departamento`, `fecha_nacimiento`, `cedula`, `fecha`, `estado`, `usuario_id`) VALUES
(1, 'ELVIS DE JESUS', 'MORENO', 'PEREZ', 'CC', '72164603', '', '(317) 515-8177', '', 'MZ 4 #17', '', 'QUINDIO', '1969-06-24', 'vistas/img/afiliados/72164603/475.pdf', '2018-11-23 12:31:06', 0, NULL),
(2, 'MARGARITA LUCIA', 'PARRA', 'GIRALDO', 'CC', '41917235', '', '(317) 515-8177', '', 'MZ A CASA 7', '', 'QUINDIO', '1968-12-29', 'vistas/img/afiliados/41917235/672.pdf', '2018-11-23 12:34:15', 0, NULL),
(3, 'LUZ MARIELLY', 'ROMAN', 'PARRA', 'CC', '38756348', '', '(317) 515-8177', '', 'MZ 1 CASA 3', '', 'QUINDIO', '1983-06-02', 'vistas/img/afiliados/38756348/501.pdf', '2018-11-23 12:36:02', 0, NULL),
(4, 'YUR BAIRON', 'HENAO', 'OTALVARO', 'CC', '18398477', '', '(301) 543-2024', '', 'CENTTRO DE CALARCA CAMARA DE COMERCIO', 'CENTRO', 'QUINDIO', '1979-02-03', '', '2018-12-29 00:10:20', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `afp`
--

CREATE TABLE `afp` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `afp`
--

INSERT INTO `afp` (`id`, `nombre`, `codigo`, `nit`, `direccion`, `estado`, `fecha`) VALUES
(1, 'PROTECCIÓN', '230201', '800229739-0', 'CALLE 49', 1, '2018-11-23 13:48:44'),
(2, 'PORVENIR', '230301', '800224808-8', 'AVENIDA', 1, '2018-11-23 13:50:38'),
(3, 'OLD MUTUAL', '230901', '800253055-2', 'AVENIDA 19 N', 1, '2018-11-23 13:50:38'),
(4, 'COLFONDOS', '231001', '800227940-6', 'CALLE 67 NO. 7', 1, '2018-11-23 13:50:38'),
(5, 'COLPENSIONES', '25-14', '900336004-7', 'CRA', 1, '2018-11-23 13:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `antecedentes`
--

CREATE TABLE `antecedentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` text COLLATE utf8_spanish_ci NOT NULL,
  `afiliados_id` int(11) NOT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aportes`
--

CREATE TABLE `aportes` (
  `id` int(11) NOT NULL,
  `periodo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dias` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `retiro` int(11) DEFAULT NULL,
  `arl_id` int(11) NOT NULL,
  `arl_tarifas_id` int(11) NOT NULL,
  `tarifa_arl` int(11) NOT NULL,
  `tarifa_por_dia_arl` int(11) NOT NULL,
  `eps_id` int(11) NOT NULL,
  `tarifa_eps` int(11) NOT NULL,
  `tarifa_por_dia_eps` int(11) NOT NULL,
  `afp_id` int(11) NOT NULL,
  `tarifa_afp` int(11) NOT NULL,
  `tarifa_por_dia_afp` int(11) NOT NULL,
  `caja_compensaciones_id` int(11) NOT NULL,
  `tarifa_ccf` int(11) NOT NULL,
  `tarifa_por_dia_ccf` int(11) NOT NULL,
  `tarifa_administracion` int(11) NOT NULL,
  `tarifa_cree` int(11) NOT NULL,
  `tarifa_ibc` int(11) NOT NULL,
  `total_pagado` int(11) NOT NULL,
  `metodo_pago` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `comprobante` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `afiliaciones_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `aportes`
--

INSERT INTO `aportes` (`id`, `periodo`, `dias`, `retiro`, `arl_id`, `arl_tarifas_id`, `tarifa_arl`, `tarifa_por_dia_arl`, `eps_id`, `tarifa_eps`, `tarifa_por_dia_eps`, `afp_id`, `tarifa_afp`, `tarifa_por_dia_afp`, `caja_compensaciones_id`, `tarifa_ccf`, `tarifa_por_dia_ccf`, `tarifa_administracion`, `tarifa_cree`, `tarifa_ibc`, `total_pagado`, `metodo_pago`, `comprobante`, `fecha`, `afiliaciones_id`, `usuarios_id`) VALUES
(1, '201811', '30', NULL, 5, 1, 4100, 137, 13, 31250, 1042, 0, 124999, 4167, 0, 31250, 1042, 22500, 1, 781242, 69000, 'EFECTIVO', '', '2018-12-30 17:07:01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `arl`
--

CREATE TABLE `arl` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `arl`
--

INSERT INTO `arl` (`id`, `nombre`, `codigo`, `nit`, `direccion`, `estado`, `fecha`) VALUES
(1, 'ALFA SA', '14-17', '860503617-3', 'carrera 13', 0, '2018-11-23 12:43:35'),
(2, 'LIBERTY', '14-18', '860008645-7', 'avenida ...', 0, '2018-11-23 12:43:37'),
(3, 'POSITIVA', '14-23', '860011153-6', 'CARRERA 7 NO', 1, '2018-11-23 12:39:16'),
(4, 'COLMENA', '14-25', '800226175-3', 'AVENIDA', 0, '2018-11-23 12:43:37'),
(5, 'SURA', '14-28', '800256161-9', 'CARRERA', 1, '2018-11-23 12:40:57'),
(6, 'LA EQUIDAD', '14-29', '830008686-1', 'CALLE 19 NO. 6', 1, '2018-11-23 12:41:28'),
(7, 'MAPFRE', '14-30', '830054904-6', 'CRA 14 NO 96 -', 0, '2018-11-23 12:43:39'),
(8, 'COLPATRIA', '14-4', '860002183-9', 'AVENIDA', 1, '2018-11-23 12:42:29'),
(9, 'SEGUROS BOLIVAR', '42565', '860002503-2', 'CARRERA 10 N', 0, '2018-11-23 12:44:32'),
(10, 'SEGUROS DE VIDA AURORA', '42596', '860022137-5', 'CARRERA 7 NO', 0, '2018-11-23 12:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `arl_tarifas`
--

CREATE TABLE `arl_tarifas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tarifa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `arl_tarifas`
--

INSERT INTO `arl_tarifas` (`id`, `nombre`, `tarifa`, `estado`, `fecha`) VALUES
(1, 'RIESGO 1', '4100', 1, '2018-10-26 17:03:02'),
(2, 'RIESGO 2', '8200', 1, '2018-10-26 17:04:21'),
(3, 'RIESGO 3', '19100', 1, '2018-10-26 17:04:21'),
(4, 'RIESGO 4', '34000', 1, '2018-10-26 17:04:22'),
(5, 'RIESGO 5', '52300', 1, '2018-10-26 17:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiarios`
--

CREATE TABLE `beneficiarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `parentesco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` text COLLATE utf8_spanish_ci,
  `documentos` text COLLATE utf8_spanish_ci,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL,
  `afiliado_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `beneficiarios`
--

INSERT INTO `beneficiarios` (`id`, `nombres`, `apellido_paterno`, `apellido_materno`, `parentesco`, `tipo_documento`, `numero_documento`, `cedula`, `documentos`, `fecha`, `estado`, `afiliado_id`, `usuario_id`) VALUES
(1, 'OLGA CECILIA', 'LOPEZ ', 'LONDOÑO', 'ESPOSO', 'CC', '41923238', 'vistas/img/beneficiarios/cedulas/41923238/641.pdf', 'vistas/img/beneficiarios/documentos/41923238/423.pdf', '2018-11-24 15:05:19', 1, 1, NULL),
(2, 'KEVIN JARED', 'MORENO', 'LOPEZ', 'HIJO', 'TI', '24607587', 'vistas/img/beneficiarios/cedulas/24607587/157.pdf', 'vistas/img/beneficiarios/documentos/24607587/980.pdf', '2018-11-24 15:19:49', 1, 1, NULL),
(3, 'ALLISON MAILY', 'MORENO', 'LOPEZ', 'HIJO', 'TI', '18731688', 'vistas/img/beneficiarios/cedulas/18731688/196.pdf', 'vistas/img/beneficiarios/documentos/18731688/595.pdf', '2018-11-24 15:19:50', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `caja_compensaciones`
--

CREATE TABLE `caja_compensaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `caja_compensaciones`
--

INSERT INTO `caja_compensaciones` (`id`, `nombre`, `codigo`, `nit`, `direccion`, `estado`, `fecha`) VALUES
(1, 'CAMACOL', 'CCF02', '890900840-1', 'CALLE 49 B NO', 1, '2018-11-14 03:43:06'),
(2, 'COMFENALCO ANTIOQUIA', 'CCF03', '890900842-6', 'CARRERA 50 N', 1, '2018-11-14 03:45:20'),
(3, 'COMFAMA ANTIOQUIA', 'CCF04', '890900841-9', 'CARRERA 45 N', 1, '2018-11-14 03:45:21'),
(4, 'COMFENALCO QUINDIO', 'CCF43', '890000381-0', 'CALLE 16 NO. 1', 1, '2018-11-23 12:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `fecha`) VALUES
(1, 'ENTIDAD PROMOTORA DE SALUD', '2018-10-05 03:37:35'),
(2, 'ASEGURADORA DE RIESGOS LABORALES', '2018-10-04 20:50:35'),
(3, 'ADMINISTRADORAS DE FONDOS DE PENSIONES', '2018-10-04 20:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` text COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `celular` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `barrio` text COLLATE utf8_spanish_ci NOT NULL,
  `departamento` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pagos` int(11) DEFAULT NULL,
  `cedula` text COLLATE utf8_spanish_ci,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellido_paterno`, `apellido_materno`, `tipo_documento`, `numero_documento`, `email`, `celular`, `telefono`, `direccion`, `barrio`, `departamento`, `fecha_nacimiento`, `pagos`, `cedula`, `fecha`, `estado`) VALUES
(1, 'CRISTIAN CAMILO', 'SANCHEZ', 'GOMEZ', 'CC', '763052', 'CRISTIAN.CAMILO@GMAIL.COM', '(111) 111-1111', '222-2222', 'CARRERA 14 #56-89', 'LAS INDUSTRIAS', 'QUINDIO', '2011-11-11', NULL, 'vistas/img/clientes/763052/780.pdf', '2018-10-19 19:07:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `empresas_afi`
--

CREATE TABLE `empresas_afi` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `empresas_afi`
--

INSERT INTO `empresas_afi` (`id`, `nombre`, `direccion`, `estado`, `fecha`) VALUES
(2, 'MARGARITA DEL AMOR', 'AVENIDA', 1, '2018-11-23 13:58:08'),
(3, 'MACIEL', 'CRA', 1, '2018-11-23 13:58:09'),
(4, 'JESICA VALENCIA', 'CRA', 1, '2018-11-23 13:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `empresas_apo`
--

CREATE TABLE `empresas_apo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `empresas_apo`
--

INSERT INTO `empresas_apo` (`id`, `nombre`, `nit`, `direccion`, `estado`, `fecha`) VALUES
(4, 'GYS SAS', '901212547-5', 'CARRERA', 1, '2018-10-11 17:14:32'),
(5, 'CASA LIMPIA CALI SAS', '901190153-0', 'CRA 68 #650', 1, '2018-11-24 16:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `eps`
--

CREATE TABLE `eps` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `eps`
--

INSERT INTO `eps` (`id`, `nombre`, `codigo`, `nit`, `direccion`, `estado`, `fecha`) VALUES
(1, 'ALIANSALUD', 'EPS001', '830113831-0', 'AVENIDA', 1, '2018-11-23 12:47:28'),
(5, 'SALUD TOTAL', 'EPS002', '800130907', 'AVENIDA', 1, '2018-11-23 12:47:43'),
(6, 'CAFESALUD', 'EPS003', '800140949-6', 'CALLE 73 #12-', 1, '2018-11-23 12:48:13'),
(7, 'SANITAS', 'EPS005', '800251440-6', 'CALLE 100 #11', 1, '2018-11-23 12:49:08'),
(8, 'COMPENSAR', 'EPS008', '860066942-7', 'AVENIDA 68 #4', 1, '2018-11-23 12:49:08'),
(9, 'SURA', 'EPS010', '800088702-2', 'CALLE 54 #46-', 1, '2018-11-23 12:49:41'),
(10, 'COMFENALCO VALLE', 'EPS012', '890303093-5', 'CALLE 5 # 6-63', 0, '2018-11-23 12:50:11'),
(11, 'COOMEVA', 'EPS016', '805000427-1', 'CARRERA 13 #', 1, '2018-11-23 13:47:07'),
(12, 'FAMISANAR', 'EPS017', '830003564-7', 'CARRERA 13A', 0, '2018-11-23 12:52:38'),
(13, 'SOS', 'EPS018', '805001157-2', 'AVENIDA DE L', 1, '2018-11-23 13:47:08'),
(14, 'CRUZ BLANCA', 'EPS023', '830009783-0', 'CALLE 86 A #1', 0, '2018-11-23 12:53:30'),
(15, 'SALUDVIDA', 'EPS033', '830074184-5', 'AV. CALLE 40 A', 0, '2018-11-23 12:53:53'),
(16, 'NUEVA EPS CONTRIBUTIVO', 'EPS037', '900156264-2', 'CR 85K 46A 66', 1, '2018-11-23 13:47:12'),
(17, 'NUEVA EPS MOVILIDAD', 'EPS041', '900156264-2', 'CR 85K 46A 66', 1, '2018-11-23 13:47:13'),
(18, 'MEDIMAS EPS CONTRIBUTIVO', 'EPS044', '901097473-5', 'CRA', 1, '2018-11-23 13:47:14'),
(19, 'MEDIMAS EPS MOVILIDAD', 'EPS045', '901097473-5', 'CRA', 1, '2018-11-23 13:47:15'),
(20, 'ASMET SALUD', 'ESSC62', '817000248-3', 'CRA 4 NO. 18 -', 1, '2018-11-23 13:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `estado_afiliaciones`
--

CREATE TABLE `estado_afiliaciones` (
  `id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `motivo` text COLLATE utf8_spanish_ci,
  `texto_adicional` text COLLATE utf8_spanish_ci,
  `fecha_afiliacion` date DEFAULT NULL,
  `tarifa` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado_pago` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `afiliaciones_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `estado_afiliaciones`
--

INSERT INTO `estado_afiliaciones` (`id`, `estado`, `fecha_retiro`, `motivo`, `texto_adicional`, `fecha_afiliacion`, `tarifa`, `estado_pago`, `fecha`, `afiliaciones_id`, `usuarios_id`) VALUES
(1, 1, NULL, 'AFILIACION', '', '2018-11-01', '0', 1, '2018-12-28 21:25:51', 1, 1),
(2, 1, NULL, 'AFILIACION', '', '2018-11-01', '0', 1, '2018-12-28 21:25:54', 2, 1),
(3, 1, NULL, 'AFILIACION', '', '2018-11-01', '0', 1, '2018-12-29 00:11:48', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `ibc`
--

CREATE TABLE `ibc` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tarifa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ibc`
--

INSERT INTO `ibc` (`id`, `nombre`, `tarifa`, `estado`, `fecha`) VALUES
(1, 'AñO 2018', '781242', 1, '2018-10-26 18:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `impuestos_tarifa`
--

CREATE TABLE `impuestos_tarifa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tarifa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `impuestos_tarifa`
--

INSERT INTO `impuestos_tarifa` (`id`, `nombre`, `tarifa`, `estado`, `fecha`) VALUES
(1, 'CREE', '10500', 1, '2018-12-28 21:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `profesiones`
--

CREATE TABLE `profesiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `profesiones`
--

INSERT INTO `profesiones` (`id`, `nombre`, `fecha`) VALUES
(1, 'AUXILIAR CONTABLE', '2018-10-24 15:57:28'),
(3, 'PROFESOR', '2018-10-24 15:58:25'),
(5, 'INDEPENDIENTE', '2018-10-24 19:06:03'),
(6, 'JARDINERO', '2018-11-01 15:11:36'),
(7, 'MUSICO', '2018-11-23 13:47:40'),
(8, 'AUXILIAR', '2018-11-23 13:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_afiliados`
--

CREATE TABLE `tipo_afiliados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `porcentaje_eps` int(11) NOT NULL,
  `porcentaje_afp` int(11) NOT NULL,
  `porcentaje_ccf` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tipo_afiliados`
--

INSERT INTO `tipo_afiliados` (`id`, `nombre`, `porcentaje_eps`, `porcentaje_afp`, `porcentaje_ccf`, `estado`, `fecha`) VALUES
(1, 'INDEPENDIENTE', 12, 16, 4, 1, '2018-12-28 20:59:37'),
(2, 'DEPENDIENTE', 4, 16, 4, 1, '2018-12-28 20:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci,
  `estado` int(11) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', '', 1, '2019-01-03 19:49:15', '2019-01-04 00:49:15'),
(13, 'Elizabeth Gómez', 'eli', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Administrador', 'vistas/img/usuarios/eli/779.jpg', 1, '2018-12-28 19:07:14', '2018-12-29 00:07:14'),
(15, 'cristian sanchez', 'cristian', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Administrador', 'vistas/img/usuarios/cristian/764.jpg', 1, '2018-10-23 17:05:55', '2018-10-23 22:05:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administracion_tarifas`
--
ALTER TABLE `administracion_tarifas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `afiliaciones`
--
ALTER TABLE `afiliaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `afiliacion_tarifas`
--
ALTER TABLE `afiliacion_tarifas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `afiliados`
--
ALTER TABLE `afiliados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `afp`
--
ALTER TABLE `afp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aportes`
--
ALTER TABLE `aportes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arl`
--
ALTER TABLE `arl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arl_tarifas`
--
ALTER TABLE `arl_tarifas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiarios`
--
ALTER TABLE `beneficiarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caja_compensaciones`
--
ALTER TABLE `caja_compensaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresas_afi`
--
ALTER TABLE `empresas_afi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresas_apo`
--
ALTER TABLE `empresas_apo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eps`
--
ALTER TABLE `eps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado_afiliaciones`
--
ALTER TABLE `estado_afiliaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ibc`
--
ALTER TABLE `ibc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impuestos_tarifa`
--
ALTER TABLE `impuestos_tarifa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_afiliados`
--
ALTER TABLE `tipo_afiliados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administracion_tarifas`
--
ALTER TABLE `administracion_tarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `afiliaciones`
--
ALTER TABLE `afiliaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `afiliacion_tarifas`
--
ALTER TABLE `afiliacion_tarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `afiliados`
--
ALTER TABLE `afiliados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `afp`
--
ALTER TABLE `afp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `antecedentes`
--
ALTER TABLE `antecedentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aportes`
--
ALTER TABLE `aportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arl`
--
ALTER TABLE `arl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `arl_tarifas`
--
ALTER TABLE `arl_tarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `beneficiarios`
--
ALTER TABLE `beneficiarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `caja_compensaciones`
--
ALTER TABLE `caja_compensaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empresas_afi`
--
ALTER TABLE `empresas_afi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `empresas_apo`
--
ALTER TABLE `empresas_apo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eps`
--
ALTER TABLE `eps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `estado_afiliaciones`
--
ALTER TABLE `estado_afiliaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ibc`
--
ALTER TABLE `ibc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `impuestos_tarifa`
--
ALTER TABLE `impuestos_tarifa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tipo_afiliados`
--
ALTER TABLE `tipo_afiliados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
