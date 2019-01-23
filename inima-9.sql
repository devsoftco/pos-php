-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2019 at 12:45 PM
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
(1, 'NORMAL', '48000', 1, '2019-01-10 19:43:08'),
(2, 'INDEPENDIENTE', '30000', 1, '2019-01-10 19:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `afiliaciones`
--

CREATE TABLE `afiliaciones` (
  `id` int(11) NOT NULL,
  `afiliado_id` int(11) NOT NULL,
  `tarifa_ibc` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `profesiones_id` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `arl_tarifas_id` int(11) DEFAULT NULL,
  `eps_id` int(11) NOT NULL,
  `arl_id` int(11) DEFAULT NULL,
  `afp_id` int(11) DEFAULT NULL,
  `caja_compensaciones_id` int(11) DEFAULT NULL,
  `tipo_afiliados_id` int(11) NOT NULL,
  `administracion_tarifas_id` int(11) NOT NULL,
  `impuestos_tarifa_id` int(11) NOT NULL,
  `empresa_afi_id` int(11) DEFAULT NULL,
  `empresa_apo_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `afiliaciones`
--

INSERT INTO `afiliaciones` (`id`, `afiliado_id`, `tarifa_ibc`, `profesiones_id`, `arl_tarifas_id`, `eps_id`, `arl_id`, `afp_id`, `caja_compensaciones_id`, `tipo_afiliados_id`, `administracion_tarifas_id`, `impuestos_tarifa_id`, `empresa_afi_id`, `empresa_apo_id`, `usuario_id`, `estado`, `fecha`) VALUES
(1, 89, '828200', '5', 1, 11, 5, 0, 0, 2, 1, 0, NULL, 5, 1, 1, '2019-01-10 19:29:13'),
(2, 88, '828200', '5', 1, 11, 5, 0, 0, 2, 1, 0, NULL, 5, 1, 1, '2019-01-10 19:34:50');

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
(1, 'CLARA INES', 'TREJOS', 'RAMIREZ', 'CC', '24580315', '', '(312) 857-2795', '', 'CRA 27# 34-20 EDIFICIO LAS AMERICAS APTO 101', 'LAS AMERICAS', 'QUINDIO', '1963-10-03', '', '2018-12-23 21:27:45', 0, NULL),
(2, 'DIANA MARCELA ', 'FARACO', 'LONDOÑO', 'CC', '1037598404', 'AGUAFILM@GMAIL.COM', '(300) 864-4302', '', 'CRA 19 #24N-04', 'CONJUNTO GALICIA', 'QUINDIO', '1989-09-30', 'vistas/img/afiliados/1037598404/733.pdf', '2018-12-23 21:39:43', 0, NULL),
(3, 'LUZ STELLA', 'MORALES', 'ARIAS', 'CC', '1082954144', 'MSTELLA.216@GMAIL.COM', '(304) 654-1716', '', 'CLL 3 # 13-88 GAIRA SANTA MARTA', 'GAIRA', 'SANTA MARTA', '1992-07-03', 'vistas/img/afiliados/1082954144/177.pdf', '2018-12-23 22:01:19', 0, NULL),
(4, 'WILLIAM ANDRES', 'BUITRAGO', 'VALENCIA', 'CC', '1094889072', 'LEVACO94@HOTMAIL.COM', '(322) 552-6010', '', 'MZ 3 SECTOR 4 CASA 40', 'LAS COLINAS', 'QUINDIO', '2040-09-19', 'vistas/img/afiliados/1094889072/312.pdf', '2018-12-23 22:14:47', 0, NULL),
(5, 'JINETH CONSUELO', 'DIAZ', 'CALLEJAS', 'CC', '1094897348', '', '(314) 671-1288', '', 'CRA 40 A # 43-80 VILLA LILIANA', 'VILLA LILIANA', 'QUINDIO', '1988-06-17', 'vistas/img/afiliados/1094897348/132.pdf', '2018-12-23 22:26:02', 0, NULL),
(6, 'ARLEX STEVEN', 'ABRIL', 'RUIZ', 'CC', '1094925120', '', '(310) 891-1633', '', 'PATIO BONITO ALTO MZ N CASA 10', 'PATIO BONITO', 'QUINDIO', '1992-01-07', 'vistas/img/afiliados/1094925120/280.pdf', '2018-12-23 22:42:31', 0, NULL),
(7, 'JUAN SEBASTIAN', 'CEPEDA', 'ECHEVERRY', 'CC', '1094928254', '', '(310) 373-0656', '', 'KM 1 VIA LA BELLA', 'CUNJUNTO RESIDENCIAL BIOMA', 'QUINDIO', '1992-06-09', 'vistas/img/afiliados/1094928254/813.pdf', '2018-12-23 22:49:34', 0, NULL),
(8, 'LEIDY VIVIANA', 'MURILLO', 'DUQUE', 'CC', '1094934858', '', '(301) 555-8697', '', 'XMZ 22  CASA # 4', '7 DE AGOSTO', 'QUINDIO', '1993-04-23', '', '2018-12-23 22:55:16', 0, NULL),
(9, 'DANIEL', 'SAMPEDRO', 'POTES', 'CC', '1094935308', 'DANIEL.SAMP.DSP@GMAIL.COM', '(311) 326-6737', '', 'CARRERA 13A 2NORTE 01', 'NORTE', 'QUINDIO', '1993-05-22', 'vistas/img/afiliados/1094935308/240.pdf', '2018-12-23 22:58:15', 0, NULL),
(10, 'KATHERINE GISELL', 'MARTINEZ', 'CORTINEZ', 'CC', '1094937860', 'KATHERINEGMC@OUTLOOK.COM', '(317) 431-0501', '', 'CLL 10N # 18 76 LAS VERANERAS APTO 202 BLOQ 2', 'CONJUNTO LAS VERANERAS', 'QUINDIO', '1993-09-15', 'vistas/img/afiliados/1094937860/861.pdf', '2018-12-23 23:01:21', 0, NULL),
(11, 'LUIS MIGUEL', 'CALVO', 'ARISTIZABAL', 'CC', '1094937888', '', '(318) 382-0717', '', 'BARRIO 8 DE MARZO MZ 7 CASA 19', '8 DE MARZO', 'QUINDIO', '1993-10-06', '', '2018-12-23 23:23:40', 0, NULL),
(12, 'MABEL LORENA', 'VARGAS', 'GOMEZ', 'CC', '1005093160', '', '(310) 846-3521', '', 'NISA BULEVAR BLOQUE 1 APTO 305', '', 'QUINDIO', '1986-08-18', '', '2018-12-23 23:30:19', 0, NULL),
(13, 'MARIA FANNY', 'SERNA', 'CIFUENTES', 'CC', '24462422', '', '(312) 742-0235', '', 'CR 13 9 56', 'CENTRO', 'QUINDIO', '1934-08-07', '', '2018-12-23 23:34:51', 0, NULL),
(14, 'ABEL ANDRES', 'GRIZALES', 'ARISTIZABAL', 'CC', '1094914888', '', '(318) 791-6511', '739-6322', 'CLL 26 16 ', 'CENTRO', 'QUINDIO', '1990-09-08', 'vistas/img/afiliados/1094914888/149.pdf', '2018-12-23 23:47:17', 0, NULL),
(15, 'ELVIS DE JESUS', 'MORENO', 'PEREZ', 'CC', '72164603', 'ELVISVIRTUOSOVALL@HOTMAIL.COM', '(315) 288-4959', '', 'ROJAS PINILLA  ETP  1  MZ 4 N 17', 'ROJAS ESPINILLA', 'QUINDIO', '1969-06-24', '', '2019-01-02 23:57:09', 0, NULL),
(16, 'MARGARITA LUCIA', 'PARRA', 'GIRALDO', 'CC', '41917235', '', '(315) 733-7318', '', 'MZ A CASA 7', 'CONJUNTO IBERICA', 'QUINDIO', '1968-12-29', '', '2019-01-03 00:06:22', 0, NULL),
(17, 'LUZ MARIELLY', 'ROMAN', 'PARRA', 'CC', '38756348', '', '(316) 840-3538', '', 'PORVENIR MZ 1 CASA 3', 'PORVENIR', 'QUINDIO', '1983-06-02', '', '2019-01-03 00:09:11', 0, NULL),
(18, 'MARIA MERCEDES', 'RIOS', 'GUTIERREZ', 'CC', '24873770', '', '(321) 894-5145', '', 'TES AL VOLANTE', 'CENTRO', 'QUINDIO', '1981-09-28', '', '2019-01-03 00:16:56', 0, NULL),
(19, 'EDIXON JAVIER', 'GOMEZ', 'CRIOLLO', 'CC', '1096032157', '', '(310) 371-8197', '748-7634', 'CRA 14 # 9-18', 'CENTRO', 'QUINDIO', '1986-04-17', '', '2019-01-03 00:24:37', 0, NULL),
(20, 'JOHAN SEBASTIAN', 'GARCIA', 'SUAREZ', 'CC', '1094962042', '', '(300) 594-5263', '', 'MZ A # 8 BARRIO BELEN', 'BELEN', 'QUINDIO', '1997-04-27', '', '2019-01-03 00:27:37', 0, NULL),
(21, 'JULIAN ALBERTO ', 'VILLEGAS', 'OBANDO', 'CC', '80716720', 'JULIAN3SERGI1@HOTMAIL.COM', '(302) 449-5610', '', 'URB  SAN  FRANCISCO  ETP 2 MZ B N  6', 'SAN FRANCISCO', 'QUINDIO', '1983-07-19', '', '2019-01-03 00:32:17', 0, NULL),
(22, 'LUIS ALBERTO ', 'BARRERA', 'MARIN', 'CC', '7551148', 'FELIPE9771131@HOTMAIL.COM', '(320) 538-2657', '', 'CRA 21 CASA 12', 'CENTENARIO', 'QUINDIO', '1966-04-06', '', '2019-01-03 00:35:16', 0, NULL),
(23, 'JAVIER IGNACIO', 'CARDENAS', 'NIETO', 'CC', '4407533', '', '(313) 714-2559', '', 'COOPERATIVO  MZ  D  CASA  8', 'COOPERATIVO', 'CIRCASIA', '1961-12-03', '', '2019-01-03 00:38:05', 0, NULL),
(24, 'MARTHA ROCIO', 'SANCHEZ', 'ARIAS', 'CC', '41920768', '', '(313) 714-7380', '', 'MZ 92 # 17', 'LA PATRIA', 'QUINDIO', '1970-09-02', '', '2019-01-03 00:40:24', 0, NULL),
(25, 'DINA LUZ', 'FAJARDO', 'ALMANZA', 'CC', '39057362', '', '(310) 371-8797', '', 'CLL 4 15-32', 'CENTRO', 'QUINDIO', '1978-03-15', '', '2019-01-03 00:43:02', 0, NULL),
(26, 'GLORIA INES ', 'OROZCO', 'ARENAS', 'CC', '24807671', '', '(321) 960-3929', '', 'CRA 5 # 19-19 CENTRO', 'CENTRO', 'QUINDIO', '1956-03-11', '', '2019-01-03 00:45:40', 0, NULL),
(27, 'PABLO JOSE ', 'JARAMILLO', 'PATIÑO', 'CC', '18415550', '', '(320) 728-6113', '', 'CRA 8 NRO 21-01', 'CENTRO', 'QUINDIO', '1971-11-09', '', '2019-01-03 00:48:11', 0, NULL),
(28, 'SILVANA ', 'MORENO', 'HERNANDEZ', 'CC', '1121934932', '', '(322) 703-0237', '', 'DIAGONAL 17 # 15-29 CASA 6', 'CENTRO', 'QUINDIO', '1996-06-07', '', '2019-01-03 00:52:06', 0, NULL),
(29, 'JHON STIVEN ', 'ESPITIA', 'MONTOYA', 'CC', '1096036969', '', '(318) 373-0956', '', ' CRA 16  17 24', 'CENTRO', 'QUINDIO', '1993-08-21', '', '2019-01-03 00:54:40', 0, NULL),
(30, 'DIANA CATHERINE', 'DAVILA', 'RAMOS', 'CC', '1094950410', 'DIANACATHERINE@LIVE.COM', '(310) 491-4681', '', 'MZ 6 CASA 9', 'CASTILLA GRANDE', 'QUINDIO', '1995-07-23', '', '2019-01-03 00:57:24', 0, NULL),
(31, 'JUAN CARLOS', 'LOAIZA', 'NOREÑA', 'CC', '1094942194', '', '(318) 373-0956', '', '3183730956', 'CENTRO', 'QUINDIO', '1994-05-10', '', '2019-01-03 00:59:25', 0, NULL),
(32, 'ELIENA MARCELA', 'OSORIO', 'GUERRERO', 'CC', '1094907207', 'ELI.OSORIO1819@GMAIL.COM', '(320) 753-1263', '', 'MZ 3 CASA 5 EPTA 1', 'VILLA ALEJANDRA', 'QUINDIO', '1989-08-15', '', '2019-01-03 01:01:38', 0, NULL),
(33, 'YOHANA MILENA', 'VELEZ', 'MARIN', 'CC', '41954512', 'YOHANA-MILENA-VELEZ@HOTMAIL.COM', '(315) 928-4459', '', 'BLQUE 1 APTO 401', 'CONJUNTO TORRES DEL RIO', 'QUINDIO', '1982-08-14', '', '2019-01-03 13:30:33', 0, NULL),
(34, 'JOSE JULIAN', 'HERRERA', 'ARANDO', 'CC', '1094885378', '', '(316) 250-5653', '', 'CARRERA 15 12 NORTE 89', 'PROVIDENCIA', 'QUINDIO', '1986-12-27', '', '2019-01-03 14:57:38', 0, NULL),
(35, 'EDNA TIVISAY', 'OVIEDO', 'GOMEZ', 'CC', '1094904450', 'TIVISAY08@HOTMAIL.COM', '(318) 714-2520', '', 'CRA 22 8 50', 'GRANADA', 'QUINDIO', '1989-04-08', '', '2019-01-03 15:16:56', 0, NULL),
(36, 'LUISA MARIA', 'VELEZ', 'CASTAÑO', 'CC', '1094904827', 'LMVC1205@GMAIL.COM', '(318) 492-0646', '', 'MZ N CAS 7 ETAPA 3', 'NUEVO ARMENIA', 'QUINDIO', '1989-05-12', '', '2019-01-03 15:37:07', 0, NULL),
(37, 'NIKOLAY', 'ROMAN', 'SANCHEZ', 'CC', '1094912671', 'MORFEOJ21@GMAIL.COM', '(311) 745-8885', '', 'MZ B CASA  29-09', 'OCTUBRE', 'QUINDIO', '1990-04-01', '', '2019-01-03 15:45:14', 0, NULL),
(38, 'ANDRES FELIPE', 'MUÑOZ', 'FRANCO', 'CC', '1094926156', 'FELIPEM292@HOTMAIL.COM', '(314) 829-9486', '', 'MZ 6 CASA 4', 'UBR ZAGUANES', 'QUINDIO', '1992-02-27', '', '2019-01-03 15:51:37', 0, NULL),
(39, 'VALENTINA', 'BUENO', 'HENAO', 'CC', '1094928192', '', '(322) 626-0993', '', 'AV 19N # 26N 69 APTO 801', 'EDI EL MIRADOR', 'QUINDIO', '1989-10-19', '', '2019-01-04 12:42:36', 0, NULL),
(40, 'LINA ISABEL ', 'BELTRAN', 'TREJOS', 'CC', '1097388158', '', '(312) 272-5304', '', 'CALLE 24 # 25-50CONJUNTO LA ABADEA CASA 2', '', 'QUINDIO', '1986-01-23', '', '2019-01-04 12:46:05', 0, NULL),
(41, 'JUAN GABRIEL', 'HENAO', 'NIÑO', 'CC', '1116433496', '', '(310) 371-8797', '', 'CRA 22 8 50', 'CENTRO', 'QUINDIO', '1985-02-27', '', '2019-01-04 12:52:13', 0, NULL),
(42, 'RIVER', 'VARGAS', 'HERRERA', 'CC', '16944388', 'LEIDYDI2008@HOTMAIL.COM', '(314) 717-6709', '', 'CRA 19 # 10 NORTE 89', 'UND RESIDENCIAL LAS RAMBLAS', 'QUINDIO', '1982-04-26', '', '2019-01-04 12:54:46', 0, NULL),
(43, 'JORGE EDWARD', 'BETANCOURT', 'BETANCOURT', 'CC', '18420650', 'JORGEBETANCURT184@HOTMAIL.COM', '(311) 761-7926', '', 'JARDIN ', 'TERRAZA JARDIN', 'QUINDIO', '1983-06-05', '', '2019-01-04 12:57:29', 0, NULL),
(44, 'GILBERTO', 'OCAMPO', 'VARGAS', 'CC', '19429574', '', '(300) 234-0116', '', 'MZ D CASA 2', 'SAN FRANCISCO', 'QUINDIO', '1989-10-17', '', '2019-01-04 12:59:24', 0, NULL),
(45, 'LAURA ESPERANZA', 'MORALES', 'ARIAS', 'CC', '1036422343', 'LAURAMORA-23@HOTMAIL.COM', '(300) 502-2769', '', 'CLL 3  13 88 ', 'GAIRA', 'QUINDIO', '1987-11-22', '', '2019-01-04 13:02:33', 0, NULL),
(46, 'DIANA MARCELA ', 'ZULUAGA', 'VASQUEZ', 'CC', '41954438', '', '(301) 627-1879', '', 'CALLE 17 NRO.15-22 PISO 2', 'CENTRO COMERCIAL LUCIANA', 'QUINDIO', '1982-10-22', '', '2019-01-04 13:06:20', 0, NULL),
(47, 'ANGIE TATIANA', 'URIBE', 'OSORIO', 'CC', '1094940982', '', '(311) 367-6936', '', 'MX 3 CASA 12', 'LA ISABELLA', 'QUINDIO', '1994-03-25', '', '2019-01-04 13:18:26', 0, NULL),
(48, 'LUIS AMADO', 'CASTAÑO', 'ZULUAGA', 'CC', '4377223', '', '(317) 441-3799', '', 'CRA  15 CL 17  JOYERIA 18KL', 'CENTRO', 'QUINDIO', '1978-06-25', '', '2019-01-04 13:21:23', 0, NULL),
(49, 'ARTURO', 'MUÑOZ', 'QUITIAN', 'CC', '4525606', '', '(318) 863-9727', '', 'CARRERA SEXTA 47 NORTE 20 ', 'FLORESTA DE SAN JUAN', 'QUINDIO', '1964-04-17', '', '2019-01-04 13:33:15', 0, NULL),
(50, 'GLORIA PATRICIA ', 'CORTES', 'RAMIREZ', 'CC', '51967928', '', '(311) 229-5275', '', 'MZ 3 CASA 2', 'ACACIAS', 'QUINDIO', '1969-04-26', '', '2019-01-04 13:35:59', 0, NULL),
(51, 'LORENA IBETH ', 'PINZON', 'MURILLO', 'CC', '53055677', 'LORENAMURILLO85@HOTMAIL.COM', '(300) 427-0028', '', 'CRA 6  19A 59', 'LA FLORESTA', 'QUINDIO', '1985-05-17', '', '2019-01-04 13:39:10', 0, NULL),
(52, 'SANDRA LILIANA', 'ORTIZ', 'MATEUS', 'CC', '66729144', 'SORTIZM02@HOTMAIL.COM', '(320) 725-9924', '', 'CASA 36', 'BOSQUES DE VILLA LILIANA', 'QUINDIO', '1977-05-05', '', '2019-01-04 13:41:24', 0, NULL),
(53, 'CESAR AGUSTO', 'PATIÑO', 'LOPEZ', 'CC', '7557441', '', '(318) 813-7902', '', 'BLOQ 10 APTO402', 'CONDOMINIO EL RETIRO', 'QUINDIO', '1969-05-08', '', '2019-01-04 13:43:52', 0, NULL),
(54, 'JOSE JOSER', 'RENDON', 'RAMOS', 'CC', '89003088', 'CM.ARTO@HOTMAIL.COM', '(318) 485-1032', '', ' CALLE 23N #14-35 APTO 502', 'EDIFICIO BARICHARA', 'QUINDIO', '1974-08-14', '', '2019-01-04 13:52:10', 0, NULL),
(55, 'ANDRES DIONISIO', 'MONTAÑO', 'BLANDON', 'CC', '94453798', '', '(316) 462-5538', '', 'CALLE 11A # 51-09  ETAPA 4 CASA 45', 'CAMINO REAL', 'QUINDIO', '1976-02-22', '', '2019-01-04 13:55:53', 0, NULL),
(56, 'STEEVEN', 'OCAMPO', 'CANO', 'CC', '9771633', '', '(310) 371-8797', '', 'CASA 36', 'CENTRO', 'QUINDIO', '1985-01-06', '', '2019-01-04 13:58:21', 0, NULL),
(57, 'JORGE IVAN', 'GOMEZ', 'ECHEVERRY', 'CC', '98494037', 'SONJO66@HOTMAIL.COM', '(312) 696-1255', '', 'CALLE  41 N  28-59 PISO  2', 'CLUB QUINDIO', 'QUINDIO', '1966-06-09', '', '2019-01-04 14:00:31', 0, NULL),
(58, 'JUAN DAVID ', 'MONSALVE', 'LOPEZ', 'CC', '1097399078', 'JUANDAVIDMONSLAVELOPEZ@GMAIL.COM', '(318) 352-8411', '', 'AV COLON # 17-02  ', 'CENTRO', 'QUINDIO', '1992-10-08', '', '2019-01-04 14:06:45', 0, NULL),
(59, 'CLAUDIA LORENA', 'CAICEDO', 'MARTINEZ', 'CC', '41938253', 'CLAULORE.CAY.MAR@HOTMAIL.COM', '(316) 640-6296', '', ' MZ 33 CASA 26', 'LA FACHADA', 'QUINDIO', '1977-04-05', '', '2019-01-04 14:15:29', 0, NULL),
(60, 'LUIS ALFREDO ', 'PERALDA', 'IZQUIERDO', 'CC', '1096038199', '', '(323) 474-6161', '', 'MZ 2 CASA 12', 'PORVENIR', 'QUINDIO', '1995-05-16', '', '2019-01-04 14:22:47', 0, NULL),
(61, 'DIANA LORENA', 'RAMIREZ', 'HERNANDEZ', 'CC', '1115421832', '', '(318) 734-1892', '', 'CRA 5 NRO 3 78', 'CENTRO', 'QUINDIO', '1992-11-15', '', '2019-01-04 14:25:07', 0, NULL),
(62, 'JAIME ALEJANDRO', 'ARANZAZU', 'HERRERA', 'CC', '1097403880', 'JAIMEARANZAZO7@GMAIL.COM', '(321) 630-0074', '', 'ETAPA 3  MZ F # 8', 'GUADUALES', 'QUINDIO', '1996-03-03', '', '2019-01-04 14:27:04', 0, NULL),
(63, 'JORGE MARIO', 'ARDILA', 'RENDON', 'CC', '1094930570', '', '(315) 208-7241', '', 'CR 15  15 21', 'CENTRO', 'QUINDIO', '1992-09-10', '', '2019-01-04 14:28:57', 0, NULL),
(64, 'ANDRES DAVID', 'CASTRILLON', 'CARO', 'CC', '1094918634', '', '(321) 907-6691', '', 'CLL 17 15-29 APTO 202', 'CENTRO', 'QUINDIO', '1991-03-09', '', '2019-01-04 14:31:36', 0, NULL),
(65, 'DAVID MIGUEL ', 'VALENCIA', 'MONTIEL', 'CC', '1041259989', 'NEGROVALENCIA1@HOTMAIL.COM', '(320) 655-2336', '', 'MZ 65 CASA 19', 'FACHADA', 'QUINDIO', '1988-10-04', '', '2019-01-04 14:35:30', 0, NULL),
(66, 'VIVIAN MARTIZA ', 'HERRERA', 'VILLANUEVA', 'CC', '1094885350', 'VMHV300@HOTMAIL.COM', '(316) 490-4767', '', 'BLOQ 1 APTO 202', 'BOSQUES DE PALERMO', 'QUINDIO', '1986-12-11', '', '2019-01-04 19:02:10', 0, NULL),
(67, 'LENID VIVIANA', 'GOMEZ', 'HERNANDEZ', 'CC', '1094892025', '', '(312) 400-8609', '', 'CRA 22 8 50', 'SALVADOR AYENDE', 'QUINDIO', '1987-10-17', '', '2019-01-04 19:05:18', 0, NULL),
(68, 'JOAO GIANINNI', 'OSORIO', 'RODRIGUEZ', 'CC', '1094934086', '', '(321) 851-8751', '', '18  16 31 APT 301', 'CENTRO', 'QUINDIO', '1993-04-04', '', '2019-01-04 19:15:09', 0, NULL),
(69, 'JHON JAIRO', 'RUBIANO', 'MONTES', 'CC', '1094940067', 'TRAVIS20-14@HOTMAIL.COM', '(322) 607-2466', '', 'MZ N   # 12', 'PATIO BONITO BAJO', 'QUINDIO', '1994-01-20', '', '2019-01-04 19:17:30', 0, NULL),
(70, 'DARIO ALEXANDER', 'QUINTERO', 'CORREA', 'CC', '1094946851', '', '(321) 406-5348', '', 'CRA 27  36-33 ', 'VILLA XIMENA', 'QUINDIO', '1995-01-18', '', '2019-01-04 19:19:32', 0, NULL),
(71, 'JUAN DAVID ', 'LOPEZ', 'ALEGRIA', 'CC', '3174205039', '', '(317) 420-5039', '', 'MZ K CASA 44', 'PALARES', 'QUINDIO', '1998-05-11', '', '2019-01-04 19:21:51', 0, NULL),
(72, 'JUAN CAMILO', 'FRANCO', 'GUZMAN', 'CC', '1094970219', '', '(310) 654-8829', '', 'MZ A CASA 3', 'EL POBLADO', 'QUINDIO', '1998-07-06', '', '2019-01-04 19:23:52', 0, NULL),
(73, 'JESUS HERNANDO', 'HERNANDEZ', 'ORJUELA', 'CC', '18389332', 'JESUSHH@HOTMAIL.COM', '(320) 653-6045', '', ' CRA 18   49 05 TORRE 2 APTO 305', 'CONJ ARREBOLES', 'QUINDIO', '1983-08-25', '', '2019-01-04 19:26:54', 0, NULL),
(74, 'ROBINSON', 'JARAMILLO', 'PUYO', 'CC', '18494014', 'ROBINSON.JARAMILLOPUYO@GMAIL.COM', '(301) 784-1189', '', 'MZ  2 CASA 6 ETP 2', 'LIMONAR', 'QUINDIO', '1972-07-11', '', '2019-01-04 19:29:14', 0, NULL),
(75, 'KELLY JOHANA', 'ALMANZA', 'TOLEDO', 'CC', '1084734191', '', '(321) 398-6175', '', 'CLL 36  20-44', 'SANTANDER', 'QUINDIO', '1989-05-20', '', '2019-01-04 19:32:58', 0, NULL),
(76, 'MARIA PIEDAD ', 'VERGARA', 'GUTIERREZ', 'CC', '35465359', 'PIAVER1@HOTMAIL.COM', '(310) 413-0379', '', 'CASA 36', 'FINCA EL ROBLE', 'QUINDIO', '1957-12-24', '', '2019-01-04 21:17:12', 0, NULL),
(77, 'JUAN CAMILO', 'ARISTIZABAL', 'TORRES', 'CC', '1094953196', '', '(310) 371-8797', '', 'MZ A 34 33', 'LA FACHADA', 'QUINDIO', '1995-11-22', '', '2019-01-04 21:20:57', 0, NULL),
(78, 'RAMLANI', 'BUSTILLO', 'SILVA', 'CC', '41872187', '', '(302) 237-2311', '', 'CASA B1', 'KM 4 VIA EL VALLE FUNDACION AMANECER', 'QUINDIO', '1984-03-16', '', '2019-01-04 21:23:20', 0, NULL),
(79, 'RUBY', 'OBANDO', 'JIMENEZ', 'CC', '41912102', 'JULIAN3SERGI1@HOTMAIL.COM', '(302) 449-5610', '', 'SEGUNDA ETAPA MZ B  6', 'URB SAN FRANCISCO', 'QUINDIO', '1964-08-01', '', '2019-01-04 21:25:33', 0, NULL),
(80, 'LUZ MARYORI', 'DIAZ', 'CALLEJAS', 'CC', '41940226', '', '(301) 532-4606', '', 'CALLE 2A NO 6 69', 'LA ESTANCIA 39', 'QUINDIO', '1978-03-27', '', '2019-01-04 21:27:47', 0, NULL),
(81, 'JUAN GUILLERMO', 'CORTES', 'GALINDO', 'CC', '4376339', '', '(314) 741-5696', '', 'MZ 54 CASA 47', 'LA PATRIA', 'QUINDIO', '1982-04-25', '', '2019-01-04 21:30:12', 0, NULL),
(82, 'ALBEIRO', 'CARDONA', 'MARIN', 'CC', '7491082', '', '(313) 780-3214', '', 'CALLE 40 18 44', 'VERSALLES', 'CALARCA', '1955-05-01', '', '2019-01-04 21:37:59', 0, NULL),
(83, 'JAIDER', 'AGUDELO', 'GOMEZ', 'CC', '7549507', '', '(305) 306-1656', '', 'MZ 1 CASA 7', 'LA MILAGROSA', 'QUINDIO', '1966-02-14', '', '2019-01-04 21:44:49', 0, NULL),
(84, 'JORGE LIRES', 'LOPEZ', 'LOAIZA', 'CC', '9775968', 'LUISORLANDOLOPEZL@HOTMAIL.COM', '(321) 817-6076', '', 'CRA 25 41 10', 'CENTRO', 'QUINDIO', '1951-10-28', '', '2019-01-04 21:46:39', 0, NULL),
(85, 'YUR BAIRON ', 'HENAO', 'OTALVARO', 'CC', '18398477', '', '(301) 543-2024', '', 'CR 15  15 21', 'CENTRO', 'CALARCA', '1979-03-02', '', '2019-01-04 22:14:27', 0, NULL),
(86, 'DIANA MARCELA ', 'MESA', 'LOPEZ', 'CC', '1096644406', '', '(312) 766-1611', '', 'MZ I CASA 14', 'VALDEPEÑA', 'CALARCA', '1987-09-12', '', '2019-01-04 22:17:33', 0, NULL),
(87, 'JUAN CAMILO ', 'JIMENEZ', 'RAMIREZ', 'CC', '1094975792', '', '(323) 474-6161', '', 'MZ 2 CASA 12', 'PORVENIR', 'QUINDIO', '1999-07-03', '', '2019-01-04 22:19:50', 0, NULL),
(88, 'MICHELLE ', 'ANDUJAR', 'CORDIBA', 'CC', '29360655', 'ANDUJARCORDOBA@GMAIL.COM', '(311) 430-0481', '', 'CALLE 24A NORTE 8N 44', 'SANTA MONICA', 'QUINDIO', '1982-08-26', '', '2019-01-04 22:22:01', 0, NULL),
(89, 'KAREN NATHALIA', 'JARA', 'PERDOMO', 'CC', '1094904522', 'JARPER23@GMAIL.COM', '(310) 459-0017', '', 'CALLE  40  27 48', 'LA CLARITA', 'QUINDIO', '1989-04-30', '', '2019-01-04 22:23:37', 0, NULL);

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

--
-- Dumping data for table `antecedentes`
--

INSERT INTO `antecedentes` (`id`, `nombre`, `archivo`, `afiliados_id`, `usuarios_id`, `fecha`) VALUES
(1, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/24580315/466.pdf', 1, NULL, '2018-12-23 21:36:54'),
(2, 'RADICADO CCF', 'vistas/img/afiliados/antecedentes/1037598404/490.pdf', 2, NULL, '2018-12-23 21:53:21'),
(3, '', 'vistas/img/afiliados/antecedentes/1082954144/592.pdf', 3, NULL, '2018-12-23 22:12:31'),
(4, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094897348/273.pdf', 5, NULL, '2018-12-23 22:30:49'),
(5, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094897348/310.pdf', 5, NULL, '2018-12-23 22:31:18'),
(6, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094925120/535.pdf', 6, NULL, '2018-12-23 22:46:10'),
(7, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094937860/257.pdf', 10, NULL, '2018-12-23 23:06:29'),
(8, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094935308/932.pdf', 9, NULL, '2018-12-23 23:06:46'),
(9, 'RADICADO EPS', '', 8, NULL, '2018-12-23 23:16:12'),
(10, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094934858/443.pdf', 8, NULL, '2018-12-23 23:18:33'),
(11, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094935308/402.pdf', 9, NULL, '2018-12-23 23:18:59'),
(12, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094937860/491.pdf', 10, NULL, '2018-12-23 23:19:11'),
(13, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094928254/316.pdf', 7, NULL, '2018-12-23 23:21:11'),
(14, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094937888/871.pdf', 11, NULL, '2018-12-23 23:27:18'),
(15, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1005093160/526.pdf', 12, NULL, '2018-12-23 23:33:13'),
(16, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/24462422/421.pdf', 13, NULL, '2018-12-23 23:37:31'),
(17, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094914888/598.pdf', 14, NULL, '2018-12-23 23:50:43'),
(18, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094904450/681.pdf', 35, NULL, '2019-01-03 15:18:46'),
(19, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094912671/686.pdf', 37, NULL, '2019-01-03 15:47:54'),
(20, 'RADICADO EPS', 'vistas/img/afiliados/antecedentes/1094926156/335.pdf', 38, NULL, '2019-01-03 15:52:48');

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
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `afiliaciones_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, 'RIESGO 1', '4323', 1, '2019-01-10 18:48:17'),
(2, 'RIESGO 2', '8646', 1, '2019-01-10 18:49:15'),
(3, 'RIESGO 3', '20175', 1, '2019-01-10 18:49:38'),
(4, 'RIESGO 4', '36027', 1, '2019-01-10 18:50:02'),
(5, 'RIESGO 5', '57643', 1, '2019-01-10 18:50:26');

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
(1, 'CAMILO ANDRES', 'VAQUERO', 'PEREZ', 'ESPOSO', 'CC', '1072647682', 'vistas/img/beneficiarios/cedulas/1072647682/229.pdf', '', '2018-12-23 21:53:08', 0, 2, NULL),
(2, 'VIOLETA', 'OSORIO', 'MORALES', 'HIJO', 'RC', '108397118', 'vistas/img/beneficiarios/cedulas/108397118/679.pdf', '', '2018-12-23 22:08:29', 0, 3, NULL),
(3, 'LUCIANA', 'OSORIO', 'MORALES', 'HIJO', 'RC', '1205968833', 'vistas/img/beneficiarios/cedulas/1205968833/439.pdf', '', '2018-12-23 22:10:12', 0, 3, NULL),
(4, 'LUZ DARY ', 'GOMEZ ', 'CARDONA', 'MADRE', 'CC', '41922200', 'vistas/img/beneficiarios/cedulas/41922200/317.pdf', '', '2019-01-03 15:31:59', 0, 35, NULL),
(5, 'LUIS GONZAGA', 'OVIEDO', 'OVIEDO', 'PADRE', 'CC', '7525486', 'vistas/img/beneficiarios/cedulas/7525486/395.pdf', '', '2019-01-03 15:32:48', 0, 35, NULL);

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
(4, 'JESICA VALENCIA', 'CRA', 1, '2018-11-23 13:58:23'),
(5, 'TES AL VOLANTE', 'CENTRO', 1, '2019-01-03 00:20:56'),
(6, 'TODO DOS MIL ARMENIA LEONARDO', 'CENTRO CRA 15', 1, '2019-01-04 14:04:47'),
(7, 'BLOKER CALARCA', 'CENTRO', 1, '2019-01-04 22:16:33');

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
(1, 1, NULL, 'AFILIACION', '', '2018-12-01', '0', 1, '2019-01-10 19:37:50', 1, 1),
(2, 1, NULL, 'AFILIACION', '', '2019-01-01', '0', 1, '2019-01-11 00:25:00', 2, 1);

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
(1, 'AñO 2019', '828200', 1, '2019-01-10 18:46:29');

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
(8, 'AUXILIAR', '2018-11-23 13:47:48'),
(9, 'CONDUCTOR', '2018-12-23 22:15:30'),
(10, 'CANTANTE', '2019-01-02 23:58:02'),
(11, 'COCINERA', '2019-01-03 00:43:37');

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
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', '', 1, '2019-06-05 16:04:34', '2019-06-05 21:04:34'),
(2, 'Elizabeth Gómez', 'eli', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Administrador', 'vistas/img/usuarios/eli/779.jpg', 1, '2019-01-05 14:03:23', '2019-01-05 19:03:23'),
(3, 'cristian sanchez', 'cristian', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Administrador', 'vistas/img/usuarios/cristian/764.jpg', 1, '2018-10-23 17:05:55', '2018-12-21 14:06:43');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `afiliaciones`
--
ALTER TABLE `afiliaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `afiliacion_tarifas`
--
ALTER TABLE `afiliacion_tarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `afiliados`
--
ALTER TABLE `afiliados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `afp`
--
ALTER TABLE `afp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `antecedentes`
--
ALTER TABLE `antecedentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `aportes`
--
ALTER TABLE `aportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tipo_afiliados`
--
ALTER TABLE `tipo_afiliados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
