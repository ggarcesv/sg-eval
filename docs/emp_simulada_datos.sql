INSERT INTO `alumno` (`id`, `carrera_id`, `sede_id`, `nombre`, `correo`, `password`, `created_at`, `updated_at`) VALUES
(89076, 2, 3, 'juan perez', 'perez@ipvg.cl', '$2y$10$BzVS276yxSEjSSWQ3wmHsu1s7hd2zwugX/BvWG', '2018-01-25 03:28:22', '2018-01-25 03:28:22'),
(1990082016, 2, 3, 'john connor', 'connor@ipvg.cl', '$2y$10$seuuvAFfSWM/SANDLf4LPOLm/qrXUy5q.61.3L', '2018-01-24 15:36:22', '2018-01-24 15:36:22');

INSERT INTO `asignatura` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(10, 'Empresa Simulada', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(20, 'Administracion Financiera', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(30, 'Auditoria', '2018-01-23 00:00:00', '2018-01-23 00:00:00');


INSERT INTO `asignatura_seccion` (`id`, `year`, `semestre`, `num_seccion`, `asignatura_id`, `carrera_id`, `docente_rut`, `created_at`, `updated_at`) VALUES
(1, 2018, 1, 1, 10, 1, '123', '2018-01-24 13:29:06', '2018-01-24 13:29:06'),
(2, 2018, 1, 2, 10, 1, '3084', '2018-01-24 13:30:27', '2018-01-24 13:30:27');

INSERT INTO `aspecto` (`id`, `nombre`, `ponderacion`, `created_at`, `updated_at`) VALUES
(1, 'Operacional', 60, '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(2, 'Actitudinal', 35, '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(3, 'Auto-Evaluacion', 5, '2018-01-24 00:00:00', '2018-01-24 00:00:00');

INSERT INTO `carrera` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Ingeniería de Ejecución en Administración', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(2, 'Auditoría', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(3, 'Técnico en Administración', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(4, 'Técnico en Comercio Exterior', '2018-01-23 00:00:00', '2018-01-23 00:00:00'),
(5, 'Técnico en Administración Financiera', '2018-01-23 00:00:00', '2018-01-23 00:00:00');


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


INSERT INTO `docente` (`id`, `nombre`, `email`, `password`, `sede_id`, `created_at`, `updated_at`) VALUES
('123', 'juan carlos bodoque', 'bodoque@ipvg.cl', '$2y$10$me7t1LfjHtyV/ggy3yrByOH7i6G6FwLi2eclDRGgUqL5XYZSeTEGW', 2, '2018-01-18 00:00:00', '2018-01-23 20:08:37'),
('3084', 'juanin juan harris', 'harris@ipvg.cl', '$2y$10$f6YbM3t.tJHDwy4LhVsDzer1Pf3YElFK21uCzG/dYxDVOi27PJPAm', 2, '2018-01-23 18:03:18', '2018-01-23 18:03:18'),
('456', 'tulio triviño', 'trivinno@ipvg.cl', '$2y$10$/9vZFutNdHb5ndB9dhpAVeNesPH7mc8HNUyL.qRxCucEO53KIsU5K', 1, '2018-01-22 00:00:00', '2018-01-22 00:00:00'),
('9803', 'joe pino', 'pino@ipvg.cl', '$2y$10$ArFXW6FU27p9XbrrJW/mgOIVguJW74rHlheaii1LZ4cJVhA3xKz3u', 3, '2018-01-23 17:57:25', '2018-01-23 20:07:39');

INSERT INTO `estado` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(2, 'Inactivo', '2018-01-25 00:00:00', '2018-01-25 00:00:00');

INSERT INTO `modulo` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'RRHH', '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(2, 'Ventas', '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(3, 'Bodega', '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(4, 'Inventario', '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(5, 'Auditoria', '2018-01-24 00:00:00', '2018-01-24 00:00:00'),
(6, 'Secretaria', '2018-01-24 00:00:00', '2018-01-24 00:00:00');

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


INSERT INTO `rotacion_grupo` (`id`, `fecha_inicio`, `fecha_termino`, `rotacion_numero`, `asignatura_seccion_id`, `created_at`, `updated_at`) VALUES
(1, '2018-01-24', '2018-01-25', 1, 1, '2018-01-25 14:57:51', '2018-01-25 14:57:51'),
(2, '2018-01-04', '2018-01-27', 10, 2, '2018-01-25 15:00:26', '2018-01-25 15:00:26'),
(3, '2018-01-18', '2018-01-26', 2, 2, '2018-01-25 15:10:09', '2018-01-25 15:10:09'),
(4, '2018-01-18', '2018-01-25', 1, 1, '2018-01-25 22:46:09', '2018-01-25 22:46:09');


INSERT INTO `rubrica` (`id`, `nombre`, `modulo_id`, `sede_has_carrera_id`, `created_at`, `updated_at`) VALUES
(4, 'rubrica 2018', 1, NULL, '2018-01-25 20:50:24', '2018-01-25 20:50:24'),
(5, 'rubrica 2018 ventas', 2, NULL, '2018-01-25 20:51:39', '2018-01-25 20:51:39'),
(6, 'bodega 2018 1', 3, NULL, '2018-01-26 13:34:15', '2018-01-26 13:34:15'),
(7, 'bodoque', 2, NULL, '2018-01-26 14:13:09', '2018-01-26 14:13:09'),
(8, 'iiii', 1, NULL, '2018-01-26 14:17:47', '2018-01-26 14:17:47');


INSERT INTO `rubrica_autoevaluacion` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(2, 'auto-evaluacion 2018 1', '2018-01-26 03:12:25', '2018-01-26 03:12:25'),
(3, 'auto-evaluacion 2018 2', '2018-01-26 03:55:55', '2018-01-26 03:55:55'),
(4, 'auto 2019', '2018-01-26 13:37:03', '2018-01-26 13:37:03');


INSERT INTO `rubrica_autoevaluacion_detalle` (`id`, `estado_id`, `criterio_id`, `rubrica_autoevaluacion_id`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 2, '2018-01-26 03:12:25', '2018-01-26 03:12:25'),
(2, 1, 15, 2, '2018-01-26 03:12:25', '2018-01-26 03:12:25'),
(3, 1, 17, 2, '2018-01-26 03:12:25', '2018-01-26 03:12:25'),
(4, 1, 13, 3, '2018-01-26 03:55:55', '2018-01-26 03:55:55'),
(5, 1, 14, 3, '2018-01-26 03:55:55', '2018-01-26 03:55:55'),
(6, 1, 15, 3, '2018-01-26 03:55:55', '2018-01-26 03:55:55'),
(7, 1, 14, 4, '2018-01-26 13:37:03', '2018-01-26 13:37:03'),
(8, 1, 15, 4, '2018-01-26 13:37:03', '2018-01-26 13:37:03');


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


INSERT INTO `sede` (`id`, `nombre`, `direccion`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'Concepción', 'Arturo Prat 193', '', '2018-01-18 00:00:00', '2018-01-18 00:00:00'),
(2, 'Chillán', 'Vicente Méndez 1240', '', '2018-01-22 00:00:00', '2018-01-22 00:00:00'),
(3, 'Los Ángeles', 'Ercilla 444', '', '2018-01-22 00:00:00', '2018-01-22 00:00:00');


INSERT INTO `sede_has_carrera` (`id`, `sede_id`, `carrera_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(2, 2, 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(3, 3, 2, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(4, 1, 1, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(5, 2, 1, '2018-01-25 00:00:00', '2018-01-25 00:00:00'),
(6, 3, 1, '2018-01-25 00:00:00', '2018-01-25 00:00:00');