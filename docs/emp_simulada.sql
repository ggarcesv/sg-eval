-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-03-2018 a las 16:25:32
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emp_simulada`
--
CREATE DATABASE IF NOT EXISTS `emp_simulada` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `emp_simulada`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `carrera_id`, `sede_id`, `nombre`, `correo`, `password`, `created_at`, `updated_at`) VALUES
(89076, 2, 3, 'juan perez', 'perez@ipvg.cl', '$2y$10$BzVS276yxSEjSSWQ3wmHsu1s7hd2zwugX/BvWG', '2018-01-25 03:28:22', '2018-01-25 03:28:22'),
(1990082016, 2, 3, 'john connor', 'connor@ipvg.cl', '$2y$10$seuuvAFfSWM/SANDLf4LPOLm/qrXUy5q.61.3L', '2018-01-24 15:36:22', '2018-01-24 15:36:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(10, 'Empresa Simulada', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(20, 'Administracion Financiera', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(30, 'Auditoria', '2018-01-23 00:00:00', '2018-01-23 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura_seccion`
--

CREATE TABLE `asignatura_seccion` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `num_seccion` int(11) NOT NULL,
  `asignatura_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `docente_rut` varchar(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura_seccion`
--

INSERT INTO `asignatura_seccion` (`id`, `year`, `semestre`, `num_seccion`, `asignatura_id`, `carrera_id`, `docente_rut`, `created_at`, `updated_at`) VALUES
(1, 2018, 1, 1, 10, 1, '123', '2018-01-24 13:29:06', '2018-01-24 13:29:06'),
(2, 2018, 1, 2, 10, 1, '3084', '2018-01-24 13:30:27', '2018-01-24 13:30:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspecto`
--

CREATE TABLE `aspecto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ponderacion` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aspecto`
--

INSERT INTO `aspecto` (`id`, `nombre`, `ponderacion`, `created_at`, `updated_at`) VALUES
(1, 'Operacional', 60, '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(2, 'Actitudinal', 35, '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(3, 'Auto-Evaluacion', 5, '2018-01-24 00:00:00', '2018-01-24 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoevaluacion_detalle`
--

CREATE TABLE `autoevaluacion_detalle` (
  `alumno_id` int(11) NOT NULL,
  `rubrica_autoevaluacion_detalle_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nota` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bc_alumno`
--

CREATE TABLE `bc_alumno` (
  `id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Ingeniería de Ejecución en Administración', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(2, 'Auditoría', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(3, 'Técnico en Administración', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(4, 'Técnico en Comercio Exterior', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(5, 'Técnico en Administración Financiera', '2018-01-23 00:00:00', '2018-01-23 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio`
--

CREATE TABLE `criterio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `aspecto_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `criterio`
--

INSERT INTO `criterio` (`id`, `nombre`, `aspecto_id`, `created_at`, `updated_at`) VALUES
(1, 'Revisa y responde sus emails', 1, '2018-01-24 16:11:57', '2018-01-24 16:11:57'),
(2, 'tienen una actitud de superacion', 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(3, 'Atiende oportunamente las cotizaciones de Clientes según protocolo', 1, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(4, 'Tiene conocimiento de los artículos existentes en stock', 1, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(5, 'Demuestra una conducta acorde a los valores del IPVG', 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(6, 'Ejerce su libertad y autonomía responsablemente', 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(7, 'Demuestra buena disposición y dedicación por el trabajo asignado', 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(8, 'Demuestra una actitud positiva frente a los demás', 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(9, 'Informes de Salidas de Productos', 1, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(10, 'Informe sobre Rotación de Inventarios', 1, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(11, 'hace reportes de ventas diarias', 1, '2018-01-26 02:00:41', '2018-01-26 02:00:41'),
(12, 'cumple reglamento interno', 2, '2018-01-26 02:01:05', '2018-01-26 02:01:05'),
(13, 'Asistes a reuniones programadas', 3, '2018-01-26 02:52:51', '2018-01-26 02:52:51'),
(14, 'Cumplo los plazos establecidos para el desarrollo de las actividades que me son asignadas', 3, '2018-01-26 02:53:19', '2018-01-26 02:53:19'),
(15, 'Asumo las consecuencias de mis actos dentro del ámbito de las decisiones adoptadas', 3, '2018-01-26 02:53:40', '2018-01-26 02:53:40'),
(16, 'Mantengo relaciones respetuosas y colaborativas con mis compañeros a través de un lenguaje formal y ', 3, '2018-01-26 02:53:56', '2018-01-26 02:53:56'),
(17, 'Mantengo Una actitud positiva frente al evaluador y mis compañeros', 3, '2018-01-26 02:54:16', '2018-01-26 02:54:16'),
(18, 'presentacion formal', 3, '2018-03-01 16:31:56', '2018-03-01 16:31:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id` varchar(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `nombre`, `email`, `password`, `sede_id`, `created_at`, `updated_at`) VALUES
('123', 'juan carlos bodoque', 'bodoque@ipvg.cl', '$2y$10$me7t1LfjHtyV/ggy3yrByOH7i6G6FwLi2eclDRGgUqL5XYZSeTEGW', 2, '2018-01-18 00:00:00', '2018-01-23 20:08:37'),
('3084', 'juanin juan harris', 'harris@ipvg.cl', '$2y$10$f6YbM3t.tJHDwy4LhVsDzer1Pf3YElFK21uCzG/dYxDVOi27PJPAm', 2, '2018-01-23 18:03:18', '2018-01-23 18:03:18'),
('456', 'tulio triviño', 'trivinno@ipvg.cl', '$2y$10$/9vZFutNdHb5ndB9dhpAVeNesPH7mc8HNUyL.qRxCucEO53KIsU5K', 1, '2018-01-22 00:00:00', '2018-01-22 00:00:00'),
('9803', 'joe pino', 'pino@ipvg.cl', '$2y$10$ArFXW6FU27p9XbrrJW/mgOIVguJW74rHlheaii1LZ4cJVhA3xKz3u', 3, '2018-01-23 17:57:25', '2018-01-23 20:07:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(2, 'Inactivo', '2018-01-25 00:00:00', '2018-01-25 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_detalle`
--

CREATE TABLE `evaluacion_detalle` (
  `id` int(11) NOT NULL,
  `nota` float NOT NULL,
  `rotacion_alumno_id` int(11) NOT NULL,
  `rubrica_detalle_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'RRHH', '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(2, 'Ventas', '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(3, 'Bodega', '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(4, 'Inventario', '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(5, 'Auditoria', '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(6, 'Secretaria', '2018-01-24 00:00:00', '2018-01-24 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rotacion_alumno`
--

CREATE TABLE `rotacion_alumno` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `rotacion_grupo_id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rotacion_alumno`
--

INSERT INTO `rotacion_alumno` (`id`, `alumno_id`, `rotacion_grupo_id`, `modulo_id`, `created_at`, `updated_at`) VALUES
(1, 1990082016, 1, 3, '2018-01-25 14:57:51', '2018-01-25 14:57:51'),
(2, 89076, 2, 6, '2018-01-25 15:00:26', '2018-01-25 15:00:26'),
(3, 89076, 3, 2, '2018-01-25 15:10:09', '2018-01-25 15:10:09'),
(4, 1990082016, 3, 2, '2018-01-25 15:10:09', '2018-01-25 15:10:09'),
(5, 89076, 4, 6, '2018-01-25 22:46:09', '2018-01-25 22:46:09'),
(6, 1990082016, 4, 6, '2018-01-25 22:46:09', '2018-01-25 22:46:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rotacion_grupo`
--

CREATE TABLE `rotacion_grupo` (
  `id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date DEFAULT NULL,
  `rotacion_numero` int(11) NOT NULL,
  `asignatura_seccion_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rotacion_grupo`
--

INSERT INTO `rotacion_grupo` (`id`, `fecha_inicio`, `fecha_termino`, `rotacion_numero`, `asignatura_seccion_id`, `created_at`, `updated_at`) VALUES
(1, '2018-01-24', '2018-01-25', 1, 1, '2018-01-25 14:57:51', '2018-01-25 14:57:51'),
(2, '2018-01-04', '2018-01-27', 10, 2, '2018-01-25 15:00:26', '2018-01-25 15:00:26'),
(3, '2018-01-18', '2018-01-26', 2, 2, '2018-01-25 15:10:09', '2018-01-25 15:10:09'),
(4, '2018-01-18', '2018-01-25', 1, 1, '2018-01-25 22:46:09', '2018-01-25 22:46:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubrica`
--

CREATE TABLE `rubrica` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `sede_has_carrera_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubrica`
--

INSERT INTO `rubrica` (`id`, `nombre`, `modulo_id`, `sede_has_carrera_id`, `created_at`, `updated_at`) VALUES
(4, 'rubrica 2018', 1, NULL, '2018-01-25 20:50:24', '2018-01-25 20:50:24'),
(5, 'rubrica 2018 ventas', 2, NULL, '2018-01-25 20:51:39', '2018-01-25 20:51:39'),
(6, 'bodega 2018 1', 3, NULL, '2018-01-26 13:34:15', '2018-01-26 13:34:15'),
(7, 'bodoque', 2, NULL, '2018-01-26 14:13:09', '2018-01-26 14:13:09'),
(8, 'iiii', 1, NULL, '2018-01-26 14:17:47', '2018-01-26 14:17:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubrica_autoevaluacion`
--

CREATE TABLE `rubrica_autoevaluacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubrica_autoevaluacion`
--

INSERT INTO `rubrica_autoevaluacion` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(2, 'auto-evaluacion 2018 1', '2018-01-26 03:12:25', '2018-01-26 03:12:25'),
(3, 'auto-evaluacion 2018 2', '2018-01-26 03:55:55', '2018-01-26 03:55:55'),
(4, 'auto 2019', '2018-01-26 13:37:03', '2018-01-26 13:37:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubrica_autoevaluacion_detalle`
--

CREATE TABLE `rubrica_autoevaluacion_detalle` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `criterio_id` int(11) NOT NULL,
  `rubrica_autoevaluacion_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubrica_autoevaluacion_detalle`
--

INSERT INTO `rubrica_autoevaluacion_detalle` (`id`, `estado_id`, `criterio_id`, `rubrica_autoevaluacion_id`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 2, '2018-01-26 03:12:25', '2018-01-26 03:12:25'),
(2, 1, 15, 2, '2018-01-26 03:12:25', '2018-01-26 03:12:25'),
(3, 1, 17, 2, '2018-01-26 03:12:25', '2018-01-26 03:12:25'),
(4, 1, 13, 3, '2018-01-26 03:55:55', '2018-01-26 03:55:55'),
(5, 1, 14, 3, '2018-01-26 03:55:55', '2018-01-26 03:55:55'),
(6, 1, 15, 3, '2018-01-26 03:55:55', '2018-01-26 03:55:55'),
(7, 1, 14, 4, '2018-01-26 13:37:03', '2018-01-26 13:37:03'),
(8, 1, 15, 4, '2018-01-26 13:37:03', '2018-01-26 13:37:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubrica_detalle`
--

CREATE TABLE `rubrica_detalle` (
  `id` int(11) NOT NULL,
  `criterio_id` int(11) NOT NULL,
  `rubrica_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubrica_detalle`
--

INSERT INTO `rubrica_detalle` (`id`, `criterio_id`, `rubrica_id`, `estado_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, '2018-01-25 20:50:24', '2018-01-25 20:50:24'),
(2, 4, 4, 1, '2018-01-25 20:50:24', '2018-01-25 20:50:24'),
(3, 10, 4, 1, '2018-01-25 20:50:24', '2018-01-25 20:50:24'),
(4, 2, 4, 1, '2018-01-25 20:50:24', '2018-01-25 20:50:24'),
(5, 6, 4, 1, '2018-01-25 20:50:24', '2018-01-25 20:50:24'),
(6, 8, 4, 1, '2018-01-25 20:50:24', '2018-01-25 20:50:24'),
(7, 1, 5, 2, '2018-01-25 20:51:39', '2018-01-25 20:51:39'),
(8, 4, 5, 2, '2018-01-25 20:51:39', '2018-01-25 20:51:39'),
(9, 2, 5, 1, '2018-01-25 20:51:39', '2018-01-25 20:51:39'),
(10, 6, 5, 1, '2018-01-25 20:51:39', '2018-01-25 20:51:39'),
(12, 1, 7, 2, '2018-01-26 14:13:09', '2018-01-26 14:13:09'),
(13, 3, 7, 2, '2018-01-26 14:13:09', '2018-01-26 14:13:09'),
(14, 2, 7, 1, '2018-01-26 14:13:09', '2018-01-26 14:13:09'),
(15, 5, 7, 1, '2018-01-26 14:13:09', '2018-01-26 14:13:09'),
(16, 1, 8, 1, '2018-01-26 14:17:47', '2018-01-26 14:17:47'),
(17, 4, 8, 1, '2018-01-26 14:17:47', '2018-01-26 14:17:47'),
(18, 2, 8, 1, '2018-01-26 14:17:47', '2018-01-26 14:17:47'),
(19, 6, 8, 1, '2018-01-26 14:17:47', '2018-01-26 14:17:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id`, `nombre`, `direccion`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'Concepción', 'Arturo Prat 193', '', '2018-01-18 00:00:00', '2018-01-18 00:00:00'),
(2, 'Chillán', 'Vicente Méndez 1240', '', '2018-01-22 00:00:00', '2018-01-22 00:00:00'),
(3, 'Los Ángeles', 'Ercilla 444', '', '2018-01-22 00:00:00', '2018-01-22 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede_has_carrera`
--

CREATE TABLE `sede_has_carrera` (
  `id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sede_has_carrera`
--

INSERT INTO `sede_has_carrera` (`id`, `sede_id`, `carrera_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(2, 2, 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(3, 3, 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(4, 1, 1, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(5, 2, 1, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(6, 3, 1, '2018-01-25 00:00:00', '2018-01-25 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alumno_carrera1_idx` (`carrera_id`),
  ADD KEY `fk_alumno_sede1_idx` (`sede_id`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignatura_seccion`
--
ALTER TABLE `asignatura_seccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seccion_asignatura1_idx` (`asignatura_id`),
  ADD KEY `fk_asignatura_seccion_carrera1_idx` (`carrera_id`),
  ADD KEY `fk_asignatura_seccion_docente1_idx` (`docente_rut`);

--
-- Indices de la tabla `aspecto`
--
ALTER TABLE `aspecto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autoevaluacion_detalle`
--
ALTER TABLE `autoevaluacion_detalle`
  ADD KEY `fk_autoevaluacion_detalle_rubrica_autoevaluacion_detalle1_idx` (`rubrica_autoevaluacion_detalle_id`),
  ADD KEY `fk_autoevaluacion_detalle_alumno1_idx` (`alumno_id`);

--
-- Indices de la tabla `bc_alumno`
--
ALTER TABLE `bc_alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `criterio`
--
ALTER TABLE `criterio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criterios_criterio_aspecto_id_fk` (`id`),
  ADD KEY `fk_criterios_criterio_aspecto_idx` (`aspecto_id`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docente_sede1_idx` (`sede_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluacion_detalle`
--
ALTER TABLE `evaluacion_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_evaluacion1_idx` (`rotacion_alumno_id`),
  ADD KEY `fk_evaluacion_alumno_criterio_detalle_grupos_criterios_deta_idx` (`rubrica_detalle_id`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rotacion_alumno`
--
ALTER TABLE `rotacion_alumno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evaluacion_alumno1_idx` (`alumno_id`),
  ADD KEY `fk_evaluacion_alumno_seccion_rotacion_grupo1_idx` (`rotacion_grupo_id`);

--
-- Indices de la tabla `rotacion_grupo`
--
ALTER TABLE `rotacion_grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rotacion_grupo_asignatura_seccion1_idx` (`asignatura_seccion_id`);

--
-- Indices de la tabla `rubrica`
--
ALTER TABLE `rubrica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupo_modulo1_idx` (`modulo_id`),
  ADD KEY `fk_grupo_sede_has_carrera1_idx` (`sede_has_carrera_id`);

--
-- Indices de la tabla `rubrica_autoevaluacion`
--
ALTER TABLE `rubrica_autoevaluacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rubrica_autoevaluacion_detalle`
--
ALTER TABLE `rubrica_autoevaluacion_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rubrica_autoevaluacion_detalle_estado1_idx` (`estado_id`),
  ADD KEY `fk_rubrica_autoevaluacion_detalle_criterio1_idx` (`criterio_id`),
  ADD KEY `fk_rubrica_autoevaluacion_detalle_rubrica_autoevaluacion1_idx` (`rubrica_autoevaluacion_id`);

--
-- Indices de la tabla `rubrica_detalle`
--
ALTER TABLE `rubrica_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criterios_has_modulo_criterios2_idx` (`criterio_id`),
  ADD KEY `fk_grupos_criterios_grupo1_idx` (`rubrica_id`),
  ADD KEY `fk_grupos_criterios_estado1_idx` (`estado_id`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sede_has_carrera`
--
ALTER TABLE `sede_has_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sede_has_carrera_carrera1_idx` (`carrera_id`),
  ADD KEY `fk_sede_has_carrera_sede1_idx` (`sede_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura_seccion`
--
ALTER TABLE `asignatura_seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `aspecto`
--
ALTER TABLE `aspecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `criterio`
--
ALTER TABLE `criterio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `rotacion_alumno`
--
ALTER TABLE `rotacion_alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rotacion_grupo`
--
ALTER TABLE `rotacion_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rubrica`
--
ALTER TABLE `rubrica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rubrica_autoevaluacion`
--
ALTER TABLE `rubrica_autoevaluacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rubrica_autoevaluacion_detalle`
--
ALTER TABLE `rubrica_autoevaluacion_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rubrica_detalle`
--
ALTER TABLE `rubrica_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignatura_seccion`
--
ALTER TABLE `asignatura_seccion`
  ADD CONSTRAINT `fk_asignatura_seccion_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignatura_seccion_docente1` FOREIGN KEY (`docente_rut`) REFERENCES `docente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_seccion_asignatura1` FOREIGN KEY (`asignatura_id`) REFERENCES `asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `autoevaluacion_detalle`
--
ALTER TABLE `autoevaluacion_detalle`
  ADD CONSTRAINT `fk_autoevaluacion_detalle_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_autoevaluacion_detalle_rubrica_autoevaluacion_detalle1` FOREIGN KEY (`rubrica_autoevaluacion_detalle_id`) REFERENCES `rubrica_autoevaluacion_detalle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `criterio`
--
ALTER TABLE `criterio`
  ADD CONSTRAINT `fk_criterios_criterio_aspecto` FOREIGN KEY (`aspecto_id`) REFERENCES `aspecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluacion_detalle`
--
ALTER TABLE `evaluacion_detalle`
  ADD CONSTRAINT `fk_detalle_evaluacion1` FOREIGN KEY (`rotacion_alumno_id`) REFERENCES `rotacion_alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_alumno_criterio_detalle_grupos_criterios_detalle1` FOREIGN KEY (`rubrica_detalle_id`) REFERENCES `rubrica_detalle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rotacion_alumno`
--
ALTER TABLE `rotacion_alumno`
  ADD CONSTRAINT `fk_evaluacion_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_alumno_seccion_rotacion_grupo1` FOREIGN KEY (`rotacion_grupo_id`) REFERENCES `rotacion_grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rotacion_grupo`
--
ALTER TABLE `rotacion_grupo`
  ADD CONSTRAINT `fk_rotacion_grupo_asignatura_seccion1` FOREIGN KEY (`asignatura_seccion_id`) REFERENCES `asignatura_seccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rubrica`
--
ALTER TABLE `rubrica`
  ADD CONSTRAINT `fk_grupo_modulo1` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_sede_has_carrera1` FOREIGN KEY (`sede_has_carrera_id`) REFERENCES `sede_has_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rubrica_autoevaluacion_detalle`
--
ALTER TABLE `rubrica_autoevaluacion_detalle`
  ADD CONSTRAINT `fk_rubrica_autoevaluacion_detalle_criterio1` FOREIGN KEY (`criterio_id`) REFERENCES `criterio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rubrica_autoevaluacion_detalle_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rubrica_autoevaluacion_detalle_rubrica_autoevaluacion1` FOREIGN KEY (`rubrica_autoevaluacion_id`) REFERENCES `rubrica_autoevaluacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rubrica_detalle`
--
ALTER TABLE `rubrica_detalle`
  ADD CONSTRAINT `fk_criterios_has_modulo_criterios2` FOREIGN KEY (`criterio_id`) REFERENCES `criterio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupos_criterios_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupos_criterios_grupo1` FOREIGN KEY (`rubrica_id`) REFERENCES `rubrica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sede_has_carrera`
--
ALTER TABLE `sede_has_carrera`
  ADD CONSTRAINT `fk_sede_has_carrera_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sede_has_carrera_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
