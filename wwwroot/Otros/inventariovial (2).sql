-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2019 a las 23:55:20
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inventariovial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminrecursos`
--

CREATE TABLE IF NOT EXISTS `adminrecursos` (
  `IdAp` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdAp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `adminrecursos`
--

INSERT INTO `adminrecursos` (`IdAp`, `Nombre`) VALUES
(1, 'Invias'),
(2, 'ANI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alcantarilla`
--

CREATE TABLE IF NOT EXISTS `alcantarilla` (
  `IdAlc` int(11) NOT NULL AUTO_INCREMENT,
  `CantidadDuctos` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `AreaDrenaje` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `IdEstr` int(11) DEFAULT NULL,
  `IdTal` int(11) DEFAULT NULL,
  `IdMtu` int(11) DEFAULT NULL,
  `IdEs` int(11) DEFAULT NULL,
  `IdLi` int(11) NOT NULL,
  `IdLoc` int(11) NOT NULL,
  PRIMARY KEY (`IdAlc`),
  KEY `IdEstr` (`IdEstr`,`IdTal`,`IdMtu`,`IdEs`),
  KEY `IdMtu` (`IdMtu`),
  KEY `IdTal` (`IdTal`),
  KEY `IdEs` (`IdEs`),
  KEY `IdLi` (`IdLi`),
  KEY `IdLoc` (`IdLoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `alcantarilla`:
--   `IdEstr`
--       `estructuraalcantarilla` -> `IdEstr`
--   `IdMtu`
--       `materiatuberia` -> `IdMtu`
--   `IdTal`
--       `tipoalcantarilla` -> `IdTal`
--   `IdEs`
--       `estado` -> `IdEs`
--   `IdLi`
--       `limpieza` -> `IdLi`
--   `IdAlc`
--       `iv` -> `IdAlc`
--   `IdLoc`
--       `localizacion` -> `IdLoc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anden`
--

CREATE TABLE IF NOT EXISTS `anden` (
  `IdAn` int(11) NOT NULL AUTO_INCREMENT,
  `IdIv` int(11) NOT NULL,
  `NumeroAndenes` int(11) DEFAULT NULL,
  `AlturaBordillo` varchar(100) NOT NULL,
  `Ancho` varchar(100) NOT NULL,
  `costado` int(100) NOT NULL,
  `Numero Obstaculos` int(100) DEFAULT NULL,
  `IdEs` int(11) NOT NULL,
  `IdTc` int(11) NOT NULL,
  PRIMARY KEY (`IdAn`),
  KEY `costado` (`costado`),
  KEY `IdO_3` (`costado`),
  KEY `IdIv` (`IdIv`),
  KEY `IdEs` (`IdEs`),
  KEY `IdTc` (`IdTc`),
  KEY `costado_2` (`costado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `anden`:
--   `costado`
--       `costado` -> `IdCo`
--   `IdIv`
--       `iv` -> `IdIv`
--   `IdEs`
--       `estado` -> `IdEs`
--   `IdTc`
--       `tipocobertura` -> `IdTc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `berma`
--

CREATE TABLE IF NOT EXISTS `berma` (
  `IdBer` int(12) NOT NULL AUTO_INCREMENT,
  `Ancho` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `IdTc` int(12) DEFAULT NULL,
  `IdCo` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdBer`),
  KEY `IdCo` (`IdCo`),
  KEY `IdTc` (`IdTc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- RELACIONES PARA LA TABLA `berma`:
--   `IdCo`
--       `costado` -> `IdCo`
--   `IdTc`
--       `tipocobertura` -> `IdTc`
--

--
-- Volcado de datos para la tabla `berma`
--

INSERT INTO `berma` (`IdBer`, `Ancho`, `IdTc`, `IdCo`) VALUES
(1, '0.5', 4, 1),
(2, '0.5', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bicicarril`
--

CREATE TABLE IF NOT EXISTS `bicicarril` (
  `IdBc` int(11) NOT NULL AUTO_INCREMENT,
  `Ancho` varchar(100) NOT NULL,
  `Localizacion` varchar(100) NOT NULL,
  `NumCarriles` int(100) NOT NULL,
  `IdEs` int(11) NOT NULL,
  `IdTs` int(11) NOT NULL,
  `IdSc` int(11) NOT NULL,
  `IdTc` int(11) NOT NULL,
  `IdIv` int(11) NOT NULL,
  PRIMARY KEY (`IdBc`),
  KEY `IdEs` (`IdEs`,`IdTs`,`IdSc`,`IdTc`),
  KEY `IdTs` (`IdTs`),
  KEY `IdSc` (`IdSc`),
  KEY `IdTc` (`IdTc`),
  KEY `IdIv` (`IdIv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `bicicarril`:
--   `IdEs`
--       `estado` -> `IdEs`
--   `IdTs`
--       `tiposegregacion` -> `IdTs`
--   `IdSc`
--       `sentidocirculacion` -> `IdSc`
--   `IdTc`
--       `tipocobertura` -> `IdTc`
--   `IdIv`
--       `iv` -> `IdIv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calzada`
--

CREATE TABLE IF NOT EXISTS `calzada` (
  `IdCal` int(11) NOT NULL AUTO_INCREMENT,
  `Ancho` varchar(100) NOT NULL,
  `Carriles` int(100) NOT NULL,
  `IdEs` int(11) NOT NULL,
  `IdSc` int(11) NOT NULL,
  `IdTc` int(11) NOT NULL,
  `IdIv` int(11) NOT NULL,
  `CalzadaParqueo` int(11) NOT NULL,
  `IdCat` int(12) NOT NULL,
  `Codigovia` varchar(12) NOT NULL,
  PRIMARY KEY (`IdCal`),
  KEY `IdEs` (`IdEs`,`IdSc`,`IdTc`),
  KEY `IdEs_2` (`IdEs`,`IdSc`,`IdTc`),
  KEY `IdTc` (`IdTc`),
  KEY `IdSc` (`IdSc`),
  KEY `IdIv` (`IdIv`),
  KEY `IdCat` (`IdCat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `calzada`:
--   `IdTc`
--       `tipocobertura` -> `IdTc`
--   `IdSc`
--       `sentidocirculacion` -> `IdSc`
--   `IdEs`
--       `estado` -> `IdEs`
--   `IdIv`
--       `iv` -> `IdIv`
--   `IdCat`
--       `categoriavia` -> `IdCat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `IdC` int(11) NOT NULL AUTO_INCREMENT,
  `nombreC` varchar(100) NOT NULL,
  PRIMARY KEY (`IdC`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`IdC`, `nombreC`) VALUES
(1, 'Administrador'),
(2, 'Consultor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriavia`
--

CREATE TABLE IF NOT EXISTS `categoriavia` (
  `IdCat` int(12) NOT NULL AUTO_INCREMENT,
  `NombreCat` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categoriavia`
--

INSERT INTO `categoriavia` (`IdCat`, `NombreCat`) VALUES
(1, 'Primaria'),
(2, 'Secundaria'),
(3, 'Terciaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costado`
--

CREATE TABLE IF NOT EXISTS `costado` (
  `IdCo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCo` varchar(100) NOT NULL,
  PRIMARY KEY (`IdCo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `costado`
--

INSERT INTO `costado` (`IdCo`, `nombreCo`) VALUES
(1, 'Derecho'),
(2, 'Izquierdo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuneta`
--

CREATE TABLE IF NOT EXISTS `cuneta` (
  `IdCun` int(11) NOT NULL AUTO_INCREMENT,
  `IdCo` int(11) DEFAULT NULL,
  `Ancho` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Revestimiento` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `IdTCu` int(11) NOT NULL,
  `IdEs` int(11) NOT NULL,
  `IdLim` int(11) NOT NULL,
  PRIMARY KEY (`IdCun`),
  KEY `IdCo` (`IdCo`,`IdTCu`,`IdEs`,`IdLim`),
  KEY `IdTCu` (`IdTCu`),
  KEY `IdEs` (`IdEs`),
  KEY `IdLim` (`IdLim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `cuneta`:
--   `IdTCu`
--       `tipocuneta` -> `IdTcu`
--   `IdCo`
--       `costado` -> `IdCo`
--   `IdEs`
--       `estado` -> `IdEs`
--   `IdLim`
--       `limpieza` -> `IdLi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `danoafirmado`
--

CREATE TABLE IF NOT EXISTS `danoafirmado` (
  `IdDa` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdDa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `danoafirmado`
--

INSERT INTO `danoafirmado` (`IdDa`, `Nombre`) VALUES
(1, 'Baches'),
(2, 'Areas Erosionadas'),
(3, 'Ondulaciones o rizados'),
(4, 'Ahuellamiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `danoflexible`
--

CREATE TABLE IF NOT EXISTS `danoflexible` (
  `IdDaFe` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdDaFe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `danoflexible`
--

INSERT INTO `danoflexible` (`IdDaFe`, `Nombre`) VALUES
(1, 'Ahuellamiento Promedio(mm)'),
(2, 'Asentamiento transversal(mm)'),
(3, 'Abultamientos(m2)'),
(4, 'Desplazamiento de borde (m2)'),
(5, 'Media luna (m2)'),
(6, 'Depresiones o hundimientos(m2)'),
(7, 'Descaramiento(m2)'),
(8, 'Ojo de pescado (m2)'),
(9, 'Desprendimiento de borde (m2)'),
(10, 'Perdida de ligante (m2)'),
(11, 'Perdida de agregados (m2)'),
(12, 'Longitudinales (m2)'),
(13, 'Transversales (m2)'),
(14, 'Media luna (m2)'),
(15, 'De junta (m2)'),
(16, 'Parabolica (m2)'),
(17, 'Enbloque(m2)'),
(18, 'Piel de cocodrilo (m2)'),
(19, 'Baches (m2)'),
(20, 'Cabezas duras (m2)'),
(21, 'Pulimiento (m2)'),
(22, 'Exudacion (m2)'),
(23, 'Afloramiento (m2)'),
(24, 'Surcos (m2)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `danorigido`
--

CREATE TABLE IF NOT EXISTS `danorigido` (
  `IdDr` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(55) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdDr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `danorigido`
--

INSERT INTO `danorigido` (`IdDr`, `Nombre`) VALUES
(1, 'Grietas de esquina (m)'),
(2, 'Grietas longitudinales (m)'),
(3, 'Grietas Transversales (m)'),
(4, 'Grietas en los extremos de pasadores(m)'),
(5, 'Grietas en bloque o frecturación multiple (m2)'),
(6, 'Grietas en pozos o sumideros(m2)'),
(7, 'Separacion de juntas longitudinales (m)'),
(8, 'Deterioro del sello(m)'),
(9, 'Desportillamiento de juntas(m2)'),
(10, 'Descaramiento(m2)'),
(11, 'Desintegracion (m2)'),
(12, 'Baches (m2)'),
(13, 'Pulimiento (m2)'),
(14, 'Escalonamiento de juntas (unidad)'),
(15, 'Levantamiento Localizado (m)'),
(16, 'Parches (m2)'),
(17, 'Hundimientos y asentamientos (unidad)'),
(18, 'Fisuracion por retración o tipo malla (m2)'),
(19, 'Fisuracion por durabilidad(m2)'),
(20, 'Bombeo (m)'),
(21, 'Ondulaciones (m2)'),
(22, 'Descenso de la berma (m)'),
(23, 'Separacion entre la berma y el pavimento (m)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `daño`
--

CREATE TABLE IF NOT EXISTS `daño` (
  `IdDag` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroCarril` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `IdDa` int(11) DEFAULT NULL,
  `IdDaFe` int(11) DEFAULT NULL,
  `IdDr` int(11) DEFAULT NULL,
  `IdIv` int(11) NOT NULL,
  PRIMARY KEY (`IdDag`),
  KEY `IdDa` (`IdDa`,`IdDaFe`,`IdDr`),
  KEY `IdDaFe` (`IdDaFe`),
  KEY `IdDr` (`IdDr`),
  KEY `IdIv` (`IdIv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `daño`:
--   `IdDa`
--       `danoafirmado` -> `IdDa`
--   `IdDaFe`
--       `danoflexible` -> `IdDaFe`
--   `IdDr`
--       `danorigido` -> `IdDr`
--   `IdIv`
--       `iv` -> `IdIv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `IdEs` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`IdEs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`IdEs`, `nombre`) VALUES
(1, 'Bueno'),
(2, 'Regular'),
(3, 'Malo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructuraalcantarilla`
--

CREATE TABLE IF NOT EXISTS `estructuraalcantarilla` (
  `IdEstr` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdEstr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estructuraalcantarilla`
--

INSERT INTO `estructuraalcantarilla` (`IdEstr`, `Nombre`) VALUES
(1, 'Cajon'),
(2, 'Circular'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interseccion`
--

CREATE TABLE IF NOT EXISTS `interseccion` (
  `IdIn` int(11) NOT NULL AUTO_INCREMENT,
  `Nivel` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Alumbrado` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Semaforos` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `IdTI` int(11) DEFAULT NULL,
  `IdCal` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdIn`),
  KEY `IdTI` (`IdTI`,`IdCal`),
  KEY `IdCal` (`IdCal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `interseccion`:
--   `IdCal`
--       `calzada` -> `IdCal`
--   `IdTI`
--       `tipointerseccion` -> `IdTI`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iv`
--

CREATE TABLE IF NOT EXISTS `iv` (
  `IdIv` int(11) NOT NULL AUTO_INCREMENT,
  `FechaIni` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `Direccion` varchar(100) NOT NULL,
  `ViaPrin` varchar(100) DEFAULT NULL,
  `TramoIni` varchar(100) DEFAULT NULL,
  `TramoFin` varchar(100) DEFAULT NULL,
  `LongTramo` varchar(100) DEFAULT NULL,
  `IdTv` int(11) DEFAULT NULL,
  `IdP` int(11) DEFAULT NULL,
  `Inclinacion` varchar(100) NOT NULL,
  `IdPer` int(11) NOT NULL,
  `IdPu` int(11) DEFAULT NULL,
  `IdMu` int(11) DEFAULT NULL,
  `IdTu` int(11) DEFAULT NULL,
  `IdPes` int(11) DEFAULT NULL,
  `IdCun` int(11) DEFAULT NULL,
  `IdPea` int(11) DEFAULT NULL,
  `IdAlc` int(11) NOT NULL,
  `IdPon` int(11) DEFAULT NULL,
  `IdSCon` int(11) DEFAULT NULL,
  `IdMuni` int(5) NOT NULL,
  PRIMARY KEY (`IdIv`),
  KEY `IdTv` (`IdTv`,`IdP`),
  KEY `IdTv_2` (`IdTv`),
  KEY `IdTv_3` (`IdTv`,`IdP`),
  KEY `IdP` (`IdP`),
  KEY `IdPer` (`IdPer`),
  KEY `IdPu` (`IdPu`),
  KEY `IdMu` (`IdMu`),
  KEY `IdTu` (`IdTu`),
  KEY `IdPes` (`IdPes`),
  KEY `IdDag` (`IdCun`),
  KEY `IdPea` (`IdPea`),
  KEY `IdA` (`IdAlc`),
  KEY `IdPon` (`IdPon`),
  KEY `IdSCon` (`IdSCon`),
  KEY `IdMuni` (`IdMuni`),
  KEY `IdTu_2` (`IdTu`),
  KEY `IdTu_3` (`IdTu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- RELACIONES PARA LA TABLA `iv`:
--   `IdP`
--       `proyecto` -> `IdP`
--   `IdPer`
--       `persona` -> `IdPer`
--   `IdPu`
--       `puente` -> `IdPu`
--   `IdMu`
--       `muro` -> `IdMu`
--   `IdPes`
--       `pesaje` -> `IdPes`
--   `IdCun`
--       `cuneta` -> `IdCun`
--   `IdPea`
--       `peaje` -> `IdPea`
--   `IdPon`
--       `ponton` -> `IdPon`
--   `IdSCon`
--       `sistemacontencion` -> `IdSCon`
--   `IdTu`
--       `tunel` -> `IdTu`
--   `IdTv`
--       `tipovia` -> `IdTv`
--

--
-- Volcado de datos para la tabla `iv`
--

INSERT INTO `iv` (`IdIv`, `FechaIni`, `FechaFin`, `Direccion`, `ViaPrin`, `TramoIni`, `TramoFin`, `LongTramo`, `IdTv`, `IdP`, `Inclinacion`, `IdPer`, `IdPu`, `IdMu`, `IdTu`, `IdPes`, `IdCun`, `IdPea`, `IdAlc`, `IdPon`, `IdSCon`, `IdMuni`) VALUES
(24, '2019-02-13', '2019-02-15', 'weeq2324', 'edefq2321', '213123', '123123', '1231231', 1, 3, '2131', 1, 2, NULL, NULL, 2, NULL, NULL, 0, 2, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `limpieza`
--

CREATE TABLE IF NOT EXISTS `limpieza` (
  `IdLi` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdLi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `limpieza`
--

INSERT INTO `limpieza` (`IdLi`, `Nombre`) VALUES
(1, 'Colmatada'),
(2, 'Limpia'),
(3, 'Obstruida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listaobstaculos`
--

CREATE TABLE IF NOT EXISTS `listaobstaculos` (
  `IdList` int(11) NOT NULL AUTO_INCREMENT,
  `IdAn` int(11) NOT NULL,
  `IdO` int(11) NOT NULL,
  PRIMARY KEY (`IdList`),
  KEY `IdAn` (`IdAn`),
  KEY `IdO` (`IdO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `listaobstaculos`:
--   `IdO`
--       `obstaculos` -> `IdO`
--   `IdAn`
--       `anden` -> `IdAn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listasuelo`
--

CREATE TABLE IF NOT EXISTS `listasuelo` (
  `IdListUs` int(11) NOT NULL AUTO_INCREMENT,
  `IdCos` int(11) NOT NULL,
  `IdTus` int(11) NOT NULL,
  `IdIv` int(11) NOT NULL,
  PRIMARY KEY (`IdListUs`),
  KEY `IdCos` (`IdCos`),
  KEY `IdTus` (`IdTus`),
  KEY `IdIv` (`IdIv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `listasuelo`:
--   `IdIv`
--       `iv` -> `IdIv`
--   `IdCos`
--       `costado` -> `IdCo`
--   `IdTus`
--       `tipousosuelo` -> `IdTus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE IF NOT EXISTS `localizacion` (
  `IdLoc` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `cx` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cy` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`IdLoc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=133 ;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`IdLoc`, `Titulo`, `cx`, `cy`) VALUES
(1, 'Estatua', '5.8277852407', ' -73.0347490'),
(2, 'Estatua', '5.8277852407', ' -73.0347490'),
(3, 'Catedral', '5.8282762162', ' -73.0341589'),
(4, 'Catedral', '5.8282762162', ' -73.0341589'),
(5, '', '', ''),
(6, 'Parque', '5.8277852407', ' -73.0347490'),
(7, '', '', ''),
(8, 'Bucaramanga', '6.8295802891', ' -72.2519541'),
(9, 'Sogamoso', '5.7078899380', ' -73.0107725'),
(10, '', '', ''),
(11, '', '10.433095419', ' -66.9742810'),
(12, 'prueba ', '10.431511479', ' -66.9746692'),
(13, 'prueba ', '10.431511479', ' -66.9746692'),
(14, 'prueba ', '5.8093559267', '-73.02619301'),
(15, 'Alcantarilla', '5.8093584912', '-73.02619233'),
(16, '', '', ''),
(17, '', '', ''),
(18, '', '', ''),
(19, '', '', ''),
(20, '', '', ''),
(21, '', '', ''),
(22, '', '', ''),
(23, '', '', ''),
(24, '', '', ''),
(25, '', '', ''),
(26, '', '', ''),
(27, '', '', ''),
(28, '', '', ''),
(29, '', '', ''),
(30, '', '', ''),
(31, '', '', ''),
(32, '', '', ''),
(33, '', '', ''),
(34, '', '', ''),
(35, '', '', ''),
(36, '', '', ''),
(37, '', '', ''),
(38, '', '', ''),
(39, '', '', ''),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, '', '', ''),
(44, '', '', ''),
(45, '', '', ''),
(46, '', '', ''),
(47, '', '', ''),
(48, '', '', ''),
(49, '', '', ''),
(50, '', '', ''),
(51, '', '', ''),
(52, '', '', ''),
(53, '', '', ''),
(54, '', '', ''),
(55, '', '', ''),
(56, '', '', ''),
(57, '', '', ''),
(58, '', '', ''),
(59, '', '', ''),
(60, '', '', ''),
(61, '', '', ''),
(62, '', '', ''),
(63, '', '', ''),
(64, '', '', ''),
(65, '', '', ''),
(66, '', '', ''),
(67, '', '', ''),
(68, '', '', ''),
(69, '', '', ''),
(70, '', '', ''),
(71, '', '', ''),
(72, '', '', ''),
(73, '', '', ''),
(74, '', '', ''),
(75, '', '', ''),
(76, '', '', ''),
(77, '', '', ''),
(78, '', '', ''),
(79, '', '', ''),
(80, '', '', ''),
(81, '', '', ''),
(82, '', '', ''),
(83, '', '', ''),
(84, '', '', ''),
(85, '', '', ''),
(86, '', '', ''),
(87, '', '', ''),
(88, '', '', ''),
(89, '', '', ''),
(90, '', '', ''),
(91, '', '', ''),
(92, '', '', ''),
(93, '', '', ''),
(94, '', '', ''),
(95, '', '', ''),
(96, '', '', ''),
(97, '', '', ''),
(98, '', '', ''),
(99, '', '', ''),
(100, '', '', ''),
(101, '', '', ''),
(102, '', '', ''),
(103, '', '', ''),
(104, '', '', ''),
(105, '', '', ''),
(106, '', '', ''),
(107, '', '', ''),
(108, 'Alcantarilla', '5.8093482819', '-73.02622421'),
(109, '', '', ''),
(110, '', '', ''),
(111, '', '', ''),
(112, '', '', ''),
(113, '', '', ''),
(114, '', '', ''),
(115, '', '', ''),
(116, '', '', ''),
(117, '', '', ''),
(118, '', '', ''),
(119, '', '', ''),
(120, '', '', ''),
(121, '', '', ''),
(122, '', '', ''),
(123, '', '', ''),
(124, '', '', ''),
(125, '', '', ''),
(126, '', '', ''),
(127, 'Alcantarilla', '5.8093624015', '-73.02623438'),
(128, 'Alcantarilla', '5.8093909715', '-73.02612442'),
(129, '', '', ''),
(130, '', '', ''),
(131, 'Berma ', '5.8093595477', '-73.02617947'),
(132, 'BiciCarril ', '5.8093512318', '-73.02620890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `IdLogin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`IdLogin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`IdLogin`, `usuario`, `password`, `rol`) VALUES
(1, 'Stiven@gmail.com', 'brayam', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialmuro`
--

CREATE TABLE IF NOT EXISTS `materialmuro` (
  `IdMMu` int(11) NOT NULL AUTO_INCREMENT,
  `NombreMu` varchar(35) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdMMu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `materialmuro`
--

INSERT INTO `materialmuro` (`IdMMu`, `NombreMu`) VALUES
(1, 'Bolsas de concreto'),
(2, 'Muros de gaviones'),
(3, 'Muros de gravedad en concreto'),
(4, 'Muro de encofrado o de cribas'),
(5, 'Muros de tierra reforzada'),
(6, 'Muros en concreto reforzada'),
(7, 'Muros anclados'),
(8, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialponton`
--

CREATE TABLE IF NOT EXISTS `materialponton` (
  `IdMaPo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdMaPo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `materialponton`
--

INSERT INTO `materialponton` (`IdMaPo`, `Nombre`) VALUES
(1, 'Mamposteria'),
(2, 'Metalico'),
(3, 'Concreto'),
(4, 'Mixto'),
(5, 'Provisional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiatuberia`
--

CREATE TABLE IF NOT EXISTS `materiatuberia` (
  `IdMtu` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdMtu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `materiatuberia`
--

INSERT INTO `materiatuberia` (`IdMtu`, `Nombre`) VALUES
(1, 'Concreto'),
(2, 'Metalica'),
(3, 'Otra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muro`
--

CREATE TABLE IF NOT EXISTS `muro` (
  `IdMu` int(11) NOT NULL AUTO_INCREMENT,
  `AnchoCorona` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `AnchoCimiento` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Altura` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `IdCo` int(11) DEFAULT NULL,
  `IdMMu` int(11) NOT NULL,
  `PR` varchar(3) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LocalizacionInicial` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LocalizacionFinal` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LongitudMuro` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `IdLoc` int(11) NOT NULL,
  PRIMARY KEY (`IdMu`),
  KEY `IdCo` (`IdCo`),
  KEY `IdMMu` (`IdMMu`),
  KEY `IdLoc` (`IdLoc`),
  KEY `IdLoc_2` (`IdLoc`),
  KEY `IdLoc_3` (`IdLoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `muro`:
--   `IdMMu`
--       `materialmuro` -> `IdMMu`
--   `IdCo`
--       `costado` -> `IdCo`
--   `IdLoc`
--       `localizacion` -> `IdLoc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obstaculos`
--

CREATE TABLE IF NOT EXISTS `obstaculos` (
  `IdO` int(11) NOT NULL AUTO_INCREMENT,
  `nombreO` varchar(100) NOT NULL,
  PRIMARY KEY (`IdO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `obstaculos`
--

INSERT INTO `obstaculos` (`IdO`, `nombreO`) VALUES
(1, 'Arbol'),
(2, 'Poste'),
(3, 'Silla'),
(4, 'Carteles'),
(5, 'Retenedor de arboles'),
(6, 'Basureros'),
(7, 'Señal'),
(8, 'Monumentos'),
(9, 'Puesto Ambulante '),
(10, 'Hidrante'),
(11, 'Desague'),
(12, 'Piso Dañado'),
(13, 'Vehiculo Parqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operador`
--

CREATE TABLE IF NOT EXISTS `operador` (
  `IdOp` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdOp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `operador`
--

INSERT INTO `operador` (`IdOp`, `Nombre`) VALUES
(1, 'Invias'),
(2, 'ANI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peaje`
--

CREATE TABLE IF NOT EXISTS `peaje` (
  `IdPea` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `IdAp` int(11) DEFAULT NULL,
  `IdOp` int(11) DEFAULT NULL,
  `CategoriaPeaje` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdPea`),
  KEY `IdAp` (`IdAp`,`IdOp`),
  KEY `IdOp` (`IdOp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `peaje`:
--   `IdAp`
--       `adminrecursos` -> `IdAp`
--   `IdOp`
--       `operador` -> `IdOp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `IdPer` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `IdC` int(11) NOT NULL,
  PRIMARY KEY (`IdPer`),
  KEY `IdC` (`IdC`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- RELACIONES PARA LA TABLA `persona`:
--   `IdC`
--       `cargo` -> `IdC`
--

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`IdPer`, `nombre`, `telefono`, `direccion`, `IdC`) VALUES
(1, 'William', '3203653214', 'cra 1', 1),
(2, 'Salo', '315254220', 'Callw12', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pesaje`
--

CREATE TABLE IF NOT EXISTS `pesaje` (
  `IdPes` int(11) NOT NULL AUTO_INCREMENT,
  `IdAp` int(11) DEFAULT NULL,
  `IdOp` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdPes`),
  KEY `IdAp` (`IdAp`,`IdOp`),
  KEY `IdOp` (`IdOp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- RELACIONES PARA LA TABLA `pesaje`:
--   `IdAp`
--       `adminrecursos` -> `IdAp`
--   `IdOp`
--       `operador` -> `IdOp`
--

--
-- Volcado de datos para la tabla `pesaje`
--

INSERT INTO `pesaje` (`IdPes`, `IdAp`, `IdOp`) VALUES
(2, 1, 2),
(1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponton`
--

CREATE TABLE IF NOT EXISTS `ponton` (
  `IdPon` int(11) NOT NULL AUTO_INCREMENT,
  `Variante` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `IdMaPo` int(11) DEFAULT NULL,
  `IdTpo` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdPon`),
  KEY `IdMaPo` (`IdMaPo`,`IdTpo`),
  KEY `IdTpo` (`IdTpo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- RELACIONES PARA LA TABLA `ponton`:
--   `IdMaPo`
--       `materialponton` -> `IdMaPo`
--   `IdTpo`
--       `tipoponton` -> `IdTpo`
--

--
-- Volcado de datos para la tabla `ponton`
--

INSERT INTO `ponton` (`IdPon`, `Variante`, `IdMaPo`, `IdTpo`) VALUES
(1, '2', 2, 2),
(2, '3', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `IdP` int(11) NOT NULL AUTO_INCREMENT,
  `nombrep` varchar(100) NOT NULL,
  PRIMARY KEY (`IdP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`IdP`, `nombrep`) VALUES
(3, 'Caqueza'),
(4, 'Envigado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puente`
--

CREATE TABLE IF NOT EXISTS `puente` (
  `IdPu` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroLuces` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `AnchoTablero` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `AnchoCalzada` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `IdTPu` int(11) NOT NULL,
  `IdTPa` int(11) NOT NULL,
  `IdSc` int(11) NOT NULL,
  `IdTMa` int(11) NOT NULL,
  PRIMARY KEY (`IdPu`),
  KEY `IdTPu` (`IdTPu`),
  KEY `IdTPa` (`IdTPa`),
  KEY `IdSPu` (`IdSc`),
  KEY `IdTMa` (`IdTMa`),
  KEY `IdSc` (`IdSc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- RELACIONES PARA LA TABLA `puente`:
--   `IdTPu`
--       `tipopuente` -> `IdTPu`
--   `IdTPa`
--       `tipopaso` -> `IdTPa`
--   `IdTMa`
--       `tipomaterialpuente` -> `IdTMa`
--   `IdSc`
--       `sentidocirculacion` -> `IdSc`
--

--
-- Volcado de datos para la tabla `puente`
--

INSERT INTO `puente` (`IdPu`, `NumeroLuces`, `AnchoTablero`, `AnchoCalzada`, `IdTPu`, `IdTPa`, `IdSc`, `IdTMa`) VALUES
(1, '212', '2313', '1323', 1, 1, 2, 2),
(2, '12312', '13231', '123213', 1, 2, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sentidocirculacion`
--

CREATE TABLE IF NOT EXISTS `sentidocirculacion` (
  `IdSc` int(11) NOT NULL AUTO_INCREMENT,
  `NombreSc` varchar(100) NOT NULL,
  PRIMARY KEY (`IdSc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `sentidocirculacion`
--

INSERT INTO `sentidocirculacion` (`IdSc`, `NombreSc`) VALUES
(1, 'NS'),
(2, 'SN'),
(3, 'EW'),
(4, 'WE'),
(5, 'NS-SN'),
(6, 'EW-WE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `separador`
--

CREATE TABLE IF NOT EXISTS `separador` (
  `IdSe` int(11) NOT NULL AUTO_INCREMENT,
  `Ancho` int(100) NOT NULL,
  `AlturaBordillo` varchar(100) NOT NULL,
  `IdIv` int(100) NOT NULL,
  `IdTc` int(11) NOT NULL,
  `IdEs` int(11) NOT NULL,
  `IdTs` int(11) NOT NULL,
  PRIMARY KEY (`IdSe`),
  KEY `IdIv` (`IdIv`),
  KEY `IdTc` (`IdTc`),
  KEY `IdEs` (`IdEs`),
  KEY `IdTs` (`IdTs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- RELACIONES PARA LA TABLA `separador`:
--   `IdTs`
--       `tiposegregacion` -> `IdTs`
--

--
-- Volcado de datos para la tabla `separador`
--

INSERT INTO `separador` (`IdSe`, `Ancho`, `AlturaBordillo`, `IdIv`, `IdTc`, `IdEs`, `IdTs`) VALUES
(1, 12, '23', 1, 2, 2, 2),
(2, 15, '16', 2, 1, 2, 3),
(3, 3, '10', 3, 1, 1, 3),
(4, 15, '12', 20, 1, 2, 2),
(5, 120, '25', 22, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `IdSer` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdSer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`IdSer`, `Nombre`) VALUES
(1, 'Funcionamiento'),
(2, 'Abandono'),
(3, 'Construccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemacontencion`
--

CREATE TABLE IF NOT EXISTS `sistemacontencion` (
  `IdSCon` int(11) NOT NULL AUTO_INCREMENT,
  `IdEs` int(11) DEFAULT NULL,
  `Material` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `IdCo` int(11) DEFAULT NULL,
  `Longitud` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `DistanciaPunto0` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdSCon`),
  KEY `IdEs` (`IdEs`,`IdCo`),
  KEY `IdCo` (`IdCo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `sistemacontencion`:
--   `IdCo`
--       `costado` -> `IdCo`
--   `IdEs`
--       `estado` -> `IdEs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitioscriticos`
--

CREATE TABLE IF NOT EXISTS `sitioscriticos` (
  `IdSc` int(11) NOT NULL AUTO_INCREMENT,
  `IdCo` int(11) DEFAULT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `IdIv` int(11) NOT NULL,
  PRIMARY KEY (`IdSc`),
  KEY `IdCo` (`IdCo`),
  KEY `IdIv` (`IdIv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `sitioscriticos`:
--   `IdCo`
--       `costado` -> `IdCo`
--   `IdIv`
--       `iv` -> `IdIv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sumidero`
--

CREATE TABLE IF NOT EXISTS `sumidero` (
  `IdSu` int(11) NOT NULL AUTO_INCREMENT,
  `Distanciadesdeini` int(100) NOT NULL,
  `IdIv` int(100) NOT NULL,
  `IdCo` int(11) NOT NULL,
  PRIMARY KEY (`IdSu`),
  KEY `IdIv` (`IdIv`),
  KEY `IdC` (`IdCo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `sumidero`:
--   `IdIv`
--       `iv` -> `IdIv`
--   `IdCo`
--       `costado` -> `IdCo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taludinestable`
--

CREATE TABLE IF NOT EXISTS `taludinestable` (
  `IdTIne` int(11) NOT NULL AUTO_INCREMENT,
  `IdCo` int(11) NOT NULL,
  `IdTTal` int(11) NOT NULL,
  `Desprendimiento` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdTIne`),
  KEY `IdCo` (`IdCo`,`IdTTal`),
  KEY `IdTTal` (`IdTTal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `taludinestable`:
--   `IdTTal`
--       `tipotalud` -> `IdTTal`
--   `IdCo`
--       `costado` -> `IdCo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoalcantarilla`
--

CREATE TABLE IF NOT EXISTS `tipoalcantarilla` (
  `IdTal` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdTal`),
  KEY `IdTal` (`IdTal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipoalcantarilla`
--

INSERT INTO `tipoalcantarilla` (`IdTal`, `Nombre`) VALUES
(1, 'Simple'),
(2, 'Doble'),
(3, 'Multiple');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocobertura`
--

CREATE TABLE IF NOT EXISTS `tipocobertura` (
  `IdTc` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTC` varchar(100) NOT NULL,
  PRIMARY KEY (`IdTc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipocobertura`
--

INSERT INTO `tipocobertura` (`IdTc`, `nombreTC`) VALUES
(1, 'flexible'),
(2, 'rigido'),
(3, 'Articulado '),
(4, 'Granulado'),
(5, 'Tratamiento Superficial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocuneta`
--

CREATE TABLE IF NOT EXISTS `tipocuneta` (
  `IdTcu` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdTcu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipocuneta`
--

INSERT INTO `tipocuneta` (`IdTcu`, `Nombre`) VALUES
(1, 'Triangular'),
(2, 'Trapezoidal'),
(3, 'Rectangular'),
(4, 'Circular'),
(5, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipointerseccion`
--

CREATE TABLE IF NOT EXISTS `tipointerseccion` (
  `IdTI` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdTI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tipointerseccion`
--

INSERT INTO `tipointerseccion` (`IdTI`, `Nombre`) VALUES
(1, 'Cruz'),
(2, 'En T'),
(3, 'En T con canales'),
(4, 'En Y'),
(5, 'Ortogonal'),
(6, 'Glorietas'),
(7, 'Tipo Trompeta'),
(8, 'Tipo Trebol'),
(9, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomaterialpuente`
--

CREATE TABLE IF NOT EXISTS `tipomaterialpuente` (
  `IdTMa` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTm` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdTMa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipomaterialpuente`
--

INSERT INTO `tipomaterialpuente` (`IdTMa`, `NombreTm`) VALUES
(1, 'Concreto'),
(2, 'Metalico'),
(3, 'Mixto'),
(4, 'Provisional'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopaso`
--

CREATE TABLE IF NOT EXISTS `tipopaso` (
  `IdTPa` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTp` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdTPa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipopaso`
--

INSERT INTO `tipopaso` (`IdTPa`, `NombreTp`) VALUES
(1, 'Superior'),
(2, 'Inferior ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoponton`
--

CREATE TABLE IF NOT EXISTS `tipoponton` (
  `IdTpo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdTpo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipoponton`
--

INSERT INTO `tipoponton` (`IdTpo`, `Nombre`) VALUES
(1, 'Vehicular'),
(2, 'Ferreo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopuente`
--

CREATE TABLE IF NOT EXISTS `tipopuente` (
  `IdTPu` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdTPu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipopuente`
--

INSERT INTO `tipopuente` (`IdTPu`, `Nombre`) VALUES
(1, 'Vehicular'),
(2, 'Peatonal'),
(3, 'Mixto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposegregacion`
--

CREATE TABLE IF NOT EXISTS `tiposegregacion` (
  `IdTs` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTs` varchar(100) NOT NULL,
  PRIMARY KEY (`IdTs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tiposegregacion`
--

INSERT INTO `tiposegregacion` (`IdTs`, `NombreTs`) VALUES
(1, 'Tachas'),
(2, 'Separador Vertical'),
(3, 'Division De Cemento'),
(4, 'Separador Vial Reflectante'),
(5, ' Postes de PVC con base'),
(6, ' Poste de señalización'),
(7, 'Poste flexible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotalud`
--

CREATE TABLE IF NOT EXISTS `tipotalud` (
  `IdTTal` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdTTal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipotalud`
--

INSERT INTO `tipotalud` (`IdTTal`, `Nombre`) VALUES
(1, 'De desmonte'),
(2, 'Terraplen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousosuelo`
--

CREATE TABLE IF NOT EXISTS `tipousosuelo` (
  `IdTus` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTus` varchar(100) NOT NULL,
  PRIMARY KEY (`IdTus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tipousosuelo`
--

INSERT INTO `tipousosuelo` (`IdTus`, `NombreTus`) VALUES
(1, 'Residencial'),
(2, 'Comercial'),
(3, 'Residencial,Comercial'),
(4, 'Servicios'),
(5, 'Educativo'),
(6, 'Recreativo'),
(7, 'Proteccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovia`
--

CREATE TABLE IF NOT EXISTS `tipovia` (
  `IdTv` int(11) NOT NULL AUTO_INCREMENT,
  `nombretv` varchar(100) NOT NULL,
  PRIMARY KEY (`IdTv`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipovia`
--

INSERT INTO `tipovia` (`IdTv`, `nombretv`) VALUES
(1, 'Rural'),
(2, 'Urbana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tunel`
--

CREATE TABLE IF NOT EXISTS `tunel` (
  `IdTu` int(11) NOT NULL AUTO_INCREMENT,
  `IdSer` int(11) DEFAULT NULL,
  `IdCal` int(11) DEFAULT NULL,
  `Anclaje` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `CentroControl` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Iluminacion` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Ventilacion` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Altura` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdTu`),
  KEY `IdSer` (`IdSer`,`IdCal`),
  KEY `IdCal` (`IdCal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `tunel`:
--   `IdCal`
--       `calzada` -> `IdCal`
--   `IdSer`
--       `servicio` -> `IdSer`
--

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alcantarilla`
--
ALTER TABLE `alcantarilla`
  ADD CONSTRAINT `alcantarilla_ibfk_1` FOREIGN KEY (`IdEstr`) REFERENCES `estructuraalcantarilla` (`IdEstr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alcantarilla_ibfk_2` FOREIGN KEY (`IdMtu`) REFERENCES `materiatuberia` (`IdMtu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alcantarilla_ibfk_3` FOREIGN KEY (`IdTal`) REFERENCES `tipoalcantarilla` (`IdTal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alcantarilla_ibfk_4` FOREIGN KEY (`IdEs`) REFERENCES `estado` (`IdEs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alcantarilla_ibfk_5` FOREIGN KEY (`IdLi`) REFERENCES `limpieza` (`IdLi`),
  ADD CONSTRAINT `alcantarilla_ibfk_6` FOREIGN KEY (`IdAlc`) REFERENCES `iv` (`IdAlc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alcantarilla_ibfk_7` FOREIGN KEY (`IdLoc`) REFERENCES `localizacion` (`IdLoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anden`
--
ALTER TABLE `anden`
  ADD CONSTRAINT `anden_ibfk_1` FOREIGN KEY (`costado`) REFERENCES `costado` (`IdCo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anden_ibfk_2` FOREIGN KEY (`IdIv`) REFERENCES `iv` (`IdIv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anden_ibfk_4` FOREIGN KEY (`IdEs`) REFERENCES `estado` (`IdEs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anden_ibfk_5` FOREIGN KEY (`IdTc`) REFERENCES `tipocobertura` (`IdTc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `berma`
--
ALTER TABLE `berma`
  ADD CONSTRAINT `berma_ibfk_1` FOREIGN KEY (`IdCo`) REFERENCES `costado` (`IdCo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berma_ibfk_2` FOREIGN KEY (`IdTc`) REFERENCES `tipocobertura` (`IdTc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bicicarril`
--
ALTER TABLE `bicicarril`
  ADD CONSTRAINT `bicicarril_ibfk_1` FOREIGN KEY (`IdEs`) REFERENCES `estado` (`IdEs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bicicarril_ibfk_2` FOREIGN KEY (`IdTs`) REFERENCES `tiposegregacion` (`IdTs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bicicarril_ibfk_3` FOREIGN KEY (`IdSc`) REFERENCES `sentidocirculacion` (`IdSc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bicicarril_ibfk_4` FOREIGN KEY (`IdTc`) REFERENCES `tipocobertura` (`IdTc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bicicarril_ibfk_5` FOREIGN KEY (`IdIv`) REFERENCES `iv` (`IdIv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calzada`
--
ALTER TABLE `calzada`
  ADD CONSTRAINT `calzada_ibfk_2` FOREIGN KEY (`IdTc`) REFERENCES `tipocobertura` (`IdTc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calzada_ibfk_3` FOREIGN KEY (`IdSc`) REFERENCES `sentidocirculacion` (`IdSc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calzada_ibfk_4` FOREIGN KEY (`IdEs`) REFERENCES `estado` (`IdEs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calzada_ibfk_5` FOREIGN KEY (`IdIv`) REFERENCES `iv` (`IdIv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calzada_ibfk_6` FOREIGN KEY (`IdCat`) REFERENCES `categoriavia` (`IdCat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuneta`
--
ALTER TABLE `cuneta`
  ADD CONSTRAINT `cuneta_ibfk_1` FOREIGN KEY (`IdTCu`) REFERENCES `tipocuneta` (`IdTcu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuneta_ibfk_2` FOREIGN KEY (`IdCo`) REFERENCES `costado` (`IdCo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuneta_ibfk_3` FOREIGN KEY (`IdEs`) REFERENCES `estado` (`IdEs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuneta_ibfk_4` FOREIGN KEY (`IdLim`) REFERENCES `limpieza` (`IdLi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `daño`
--
ALTER TABLE `daño`
  ADD CONSTRAINT `da@0xo_ibfk_1` FOREIGN KEY (`IdDa`) REFERENCES `danoafirmado` (`IdDa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `da@0xo_ibfk_2` FOREIGN KEY (`IdDaFe`) REFERENCES `danoflexible` (`IdDaFe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `da@0xo_ibfk_3` FOREIGN KEY (`IdDr`) REFERENCES `danorigido` (`IdDr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `da@0xo_ibfk_4` FOREIGN KEY (`IdIv`) REFERENCES `iv` (`IdIv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `interseccion`
--
ALTER TABLE `interseccion`
  ADD CONSTRAINT `interseccion_ibfk_1` FOREIGN KEY (`IdCal`) REFERENCES `calzada` (`IdCal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interseccion_ibfk_2` FOREIGN KEY (`IdTI`) REFERENCES `tipointerseccion` (`IdTI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `iv`
--
ALTER TABLE `iv`
  ADD CONSTRAINT `iv_ibfk_1` FOREIGN KEY (`IdP`) REFERENCES `proyecto` (`IdP`) ON DELETE CASCADE,
  ADD CONSTRAINT `iv_ibfk_10` FOREIGN KEY (`IdPer`) REFERENCES `persona` (`IdPer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iv_ibfk_11` FOREIGN KEY (`IdPu`) REFERENCES `puente` (`IdPu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iv_ibfk_12` FOREIGN KEY (`IdMu`) REFERENCES `muro` (`IdMu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iv_ibfk_13` FOREIGN KEY (`IdPes`) REFERENCES `pesaje` (`IdPes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iv_ibfk_15` FOREIGN KEY (`IdCun`) REFERENCES `cuneta` (`IdCun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iv_ibfk_17` FOREIGN KEY (`IdPea`) REFERENCES `peaje` (`IdPea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iv_ibfk_18` FOREIGN KEY (`IdPon`) REFERENCES `ponton` (`IdPon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iv_ibfk_19` FOREIGN KEY (`IdSCon`) REFERENCES `sistemacontencion` (`IdSCon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iv_ibfk_20` FOREIGN KEY (`IdTu`) REFERENCES `tunel` (`IdTu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iv_ibfk_9` FOREIGN KEY (`IdTv`) REFERENCES `tipovia` (`IdTv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `listaobstaculos`
--
ALTER TABLE `listaobstaculos`
  ADD CONSTRAINT `listaobstaculos_ibfk_2` FOREIGN KEY (`IdO`) REFERENCES `obstaculos` (`IdO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listaobstaculos_ibfk_3` FOREIGN KEY (`IdAn`) REFERENCES `anden` (`IdAn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `listasuelo`
--
ALTER TABLE `listasuelo`
  ADD CONSTRAINT `listasuelo_ibfk_1` FOREIGN KEY (`IdIv`) REFERENCES `iv` (`IdIv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listasuelo_ibfk_2` FOREIGN KEY (`IdCos`) REFERENCES `costado` (`IdCo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listasuelo_ibfk_3` FOREIGN KEY (`IdTus`) REFERENCES `tipousosuelo` (`IdTus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `muro`
--
ALTER TABLE `muro`
  ADD CONSTRAINT `muro_ibfk_1` FOREIGN KEY (`IdMMu`) REFERENCES `materialmuro` (`IdMMu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `muro_ibfk_2` FOREIGN KEY (`IdCo`) REFERENCES `costado` (`IdCo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `muro_ibfk_3` FOREIGN KEY (`IdLoc`) REFERENCES `localizacion` (`IdLoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peaje`
--
ALTER TABLE `peaje`
  ADD CONSTRAINT `peaje_ibfk_1` FOREIGN KEY (`IdAp`) REFERENCES `adminrecursos` (`IdAp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peaje_ibfk_2` FOREIGN KEY (`IdOp`) REFERENCES `operador` (`IdOp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`IdC`) REFERENCES `cargo` (`IdC`);

--
-- Filtros para la tabla `pesaje`
--
ALTER TABLE `pesaje`
  ADD CONSTRAINT `pesaje_ibfk_1` FOREIGN KEY (`IdAp`) REFERENCES `adminrecursos` (`IdAp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesaje_ibfk_2` FOREIGN KEY (`IdOp`) REFERENCES `operador` (`IdOp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ponton`
--
ALTER TABLE `ponton`
  ADD CONSTRAINT `ponton_ibfk_1` FOREIGN KEY (`IdMaPo`) REFERENCES `materialponton` (`IdMaPo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ponton_ibfk_2` FOREIGN KEY (`IdTpo`) REFERENCES `tipoponton` (`IdTpo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puente`
--
ALTER TABLE `puente`
  ADD CONSTRAINT `puente_ibfk_1` FOREIGN KEY (`IdTPu`) REFERENCES `tipopuente` (`IdTPu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puente_ibfk_2` FOREIGN KEY (`IdTPa`) REFERENCES `tipopaso` (`IdTPa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puente_ibfk_4` FOREIGN KEY (`IdTMa`) REFERENCES `tipomaterialpuente` (`IdTMa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puente_ibfk_5` FOREIGN KEY (`IdSc`) REFERENCES `sentidocirculacion` (`IdSc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `separador`
--
ALTER TABLE `separador`
  ADD CONSTRAINT `separador_ibfk_1` FOREIGN KEY (`IdTs`) REFERENCES `tiposegregacion` (`IdTs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sistemacontencion`
--
ALTER TABLE `sistemacontencion`
  ADD CONSTRAINT `sistemacontencion_ibfk_1` FOREIGN KEY (`IdCo`) REFERENCES `costado` (`IdCo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sistemacontencion_ibfk_2` FOREIGN KEY (`IdEs`) REFERENCES `estado` (`IdEs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sitioscriticos`
--
ALTER TABLE `sitioscriticos`
  ADD CONSTRAINT `sitioscriticos_ibfk_1` FOREIGN KEY (`IdCo`) REFERENCES `costado` (`IdCo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sitioscriticos_ibfk_2` FOREIGN KEY (`IdIv`) REFERENCES `iv` (`IdIv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sumidero`
--
ALTER TABLE `sumidero`
  ADD CONSTRAINT `sumidero_ibfk_1` FOREIGN KEY (`IdIv`) REFERENCES `iv` (`IdIv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sumidero_ibfk_2` FOREIGN KEY (`IdCo`) REFERENCES `costado` (`IdCo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `taludinestable`
--
ALTER TABLE `taludinestable`
  ADD CONSTRAINT `taludinestable_ibfk_1` FOREIGN KEY (`IdTTal`) REFERENCES `tipotalud` (`IdTTal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taludinestable_ibfk_2` FOREIGN KEY (`IdCo`) REFERENCES `costado` (`IdCo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tunel`
--
ALTER TABLE `tunel`
  ADD CONSTRAINT `tunel_ibfk_1` FOREIGN KEY (`IdCal`) REFERENCES `calzada` (`IdCal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tunel_ibfk_2` FOREIGN KEY (`IdSer`) REFERENCES `servicio` (`IdSer`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
