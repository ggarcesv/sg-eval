-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: 152.74.180.106    Database: emp_simulada
-- ------------------------------------------------------
-- Server version	10.1.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `id` int(10) NOT NULL,
  `carrera_id` int(6) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_alumno_carrera1_idx` (`carrera_id`),
  KEY `fk_alumno_sede1_idx` (`sede_id`),
  CONSTRAINT `fk_alumno_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_bc`
--

DROP TABLE IF EXISTS `alumno_bc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_bc` (
  `id` int(10) NOT NULL,
  `carrera_id` int(6) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_bc`
--

LOCK TABLES `alumno_bc` WRITE;
/*!40000 ALTER TABLE `alumno_bc` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno_bc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignatura` (
  `id` int(6) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` VALUES (20,'Administracion Financiera','2018-01-23 00:00:00','2018-01-23 00:00:00'),(30,'Auditoria','2018-01-23 00:00:00','2018-01-23 00:00:00'),(201583,'Empresa Simulada en el aula','2018-01-23 00:00:00','2018-01-23 00:00:00');
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignatura_seccion`
--

DROP TABLE IF EXISTS `asignatura_seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignatura_seccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  `semestre` int(2) NOT NULL,
  `num_seccion` int(2) NOT NULL,
  `asignatura_id` int(6) NOT NULL,
  `carrera_id` int(6) NOT NULL,
  `docente_rut` varchar(8) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_seccion_asignatura1_idx` (`asignatura_id`),
  KEY `fk_asignatura_seccion_carrera1_idx` (`carrera_id`),
  KEY `fk_asignatura_seccion_docente1_idx` (`docente_rut`),
  CONSTRAINT `fk_asignatura_seccion_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignatura_seccion_docente1` FOREIGN KEY (`docente_rut`) REFERENCES `docente` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_seccion_asignatura1` FOREIGN KEY (`asignatura_id`) REFERENCES `asignatura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura_seccion`
--

LOCK TABLES `asignatura_seccion` WRITE;
/*!40000 ALTER TABLE `asignatura_seccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignatura_seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspecto`
--

DROP TABLE IF EXISTS `aspecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aspecto` (
  `id` int(1) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ponderacion` int(3) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspecto`
--

LOCK TABLES `aspecto` WRITE;
/*!40000 ALTER TABLE `aspecto` DISABLE KEYS */;
INSERT INTO `aspecto` VALUES (1,'Operacional',60,'2018-01-24 00:00:00','2018-01-24 00:00:00'),(2,'Actitudinal',35,'2018-01-24 00:00:00','2018-01-24 00:00:00'),(3,'Auto-Evaluacion',5,'2018-01-24 00:00:00','2018-01-24 00:00:00');
/*!40000 ALTER TABLE `aspecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autoevaluacion_detalle`
--

DROP TABLE IF EXISTS `autoevaluacion_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autoevaluacion_detalle` (
  `alumno_id` int(10) NOT NULL,
  `rubrica_autoevaluacion_detalle_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nota` float DEFAULT NULL,
  KEY `fk_autoevaluacion_detalle_rubrica_autoevaluacion_detalle1_idx` (`rubrica_autoevaluacion_detalle_id`),
  KEY `fk_autoevaluacion_detalle_alumno1_idx` (`alumno_id`),
  CONSTRAINT `fk_autoevaluacion_detalle_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_autoevaluacion_detalle_rubrica_autoevaluacion_detalle1` FOREIGN KEY (`rubrica_autoevaluacion_detalle_id`) REFERENCES `rubrica_autoevaluacion_detalle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoevaluacion_detalle`
--

LOCK TABLES `autoevaluacion_detalle` WRITE;
/*!40000 ALTER TABLE `autoevaluacion_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `autoevaluacion_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrera` (
  `id` int(6) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera`
--

LOCK TABLES `carrera` WRITE;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` VALUES (1,'Ingeniería de Ejecución en Administración','2018-01-23 00:00:00','2018-01-23 00:00:00'),(2,'Auditoría','2018-01-23 00:00:00','2018-01-23 00:00:00'),(3,'Técnico en Administración','2018-01-23 00:00:00','2018-01-23 00:00:00'),(4,'Técnico en Comercio Exterior','2018-01-23 00:00:00','2018-01-23 00:00:00'),(5,'Técnico en Administración Financiera','2018-01-23 00:00:00','2018-01-23 00:00:00'),(6,'Técnico en Logística Marítima Portuaria','2018-01-23 00:00:00','2018-01-23 00:00:00'),(7,'Técnico en Logística','2018-01-23 00:00:00','2018-01-23 00:00:00');
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criterio`
--

DROP TABLE IF EXISTS `criterio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criterio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `aspecto_id` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `criterios_criterio_aspecto_id_fk` (`id`),
  KEY `fk_criterios_criterio_aspecto_idx` (`aspecto_id`),
  CONSTRAINT `fk_criterios_criterio_aspecto` FOREIGN KEY (`aspecto_id`) REFERENCES `aspecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterio`
--

LOCK TABLES `criterio` WRITE;
/*!40000 ALTER TABLE `criterio` DISABLE KEYS */;
INSERT INTO `criterio` VALUES (1,'Responsabilidad - Asistes a reuniones programadas',3,'2018-01-24 16:11:57','2018-01-24 16:11:57'),(2,'Responsabilidad - Cumplo los plazos establecidos para el desarrollo de las actividades que me son asignadas',3,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(3,'Responsabilidad - Asumo las consecuencias de mis actos dentro del ámbito de las decisiones adoptadas',3,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(4,'Respeto - Mantengo relaciones respetuosas y colaborativas con mis compañeros a través de un lenguaje formal y académico',3,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(5,'Respeto - Mantengo Una actitud positiva frente al evaluador y mis compañeros',3,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(6,'Respeto - Cuido mi integridad física, entorno laboral, infraestructura y materiales que tengo a disposición',3,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(7,'Proactividad - Demuestro iniciativa en la búsqueda de alternativas para resolver el problema',3,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(8,'Proactividad - Demuestro disposición para el trabajo grupal y desarrollo de las tareas solicitadas,compartiendo ideas, experiencias y conocimientos',3,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(9,'Proactividad - Demuestro capacidad para tomar decisiones en base al diálogo y la información disponible',3,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(10,'Mantiene una actitud positiva frente al evaluador',2,'2018-04-16 19:58:25','2018-04-16 19:58:32'),(11,'Respeta a todos los miembros de su equipo de trabajo',2,'2018-04-16 19:58:37','2018-04-16 19:58:40'),(12,'Demuestra buena disposición y dedicación por el trabajo asignado',2,'2018-04-16 19:58:42','2018-04-16 19:58:44'),(13,'Demuestra una actitud positiva frente a los demás',2,'2018-04-16 19:58:50','2018-04-16 19:58:53'),(14,'Se caracteriza por su puntualidad y asistencia a las actividades',2,'2018-04-16 19:58:46','2018-04-16 19:58:48'),(15,'Resuelve los problemas que se le presentan a través del diálogo',2,'2018-04-16 19:58:54','2018-04-16 19:58:56'),(16,'Controla sus impulsos, evitando lenguaje soez, violencia física y psicológica',2,'2018-04-16 19:58:58','2018-04-16 19:58:59'),(17,'Manifiesta orden y cuidado con sus pertenencias personales y la de sus pares',2,'2018-04-16 19:59:01','2018-04-16 19:59:03'),(18,'Reconoce sus errores y trabaja por corregirlos',2,'2018-04-16 19:59:04','2018-04-16 19:59:06'),(19,'Valora y participa del trabajo en equipo',2,'2018-04-16 19:59:08','2018-04-16 19:59:09'),(20,'Acepta y cumple sus deberes como estudiante',2,'2018-04-16 19:59:11','2018-04-16 19:59:14'),(21,'Protege y promueve el cuidado del entorno laboral',2,'2018-04-16 19:59:15','2018-04-16 19:59:17'),(22,'Respeta los bienes de uso común',2,'2018-04-16 19:59:19','2018-04-16 19:59:20'),(23,'Mantiene buenas relaciones con sus pares',2,'2018-04-16 19:59:23','2018-04-16 19:59:24'),(24,'Participa activamente en las actividades del equipo de trabajo',2,'2018-04-16 20:12:46','2018-04-16 20:18:51'),(25,'Atender requerimientos del Gerente de la empresa',1,'2018-04-16 19:47:17','2018-04-16 19:47:22'),(26,'Revisa y responde los correos de su email corporativo',1,'2018-04-16 19:47:42','2018-04-16 19:47:45'),(27,'Ingreso Ficha del Proveedor',1,'2018-01-25 00:00:00','2018-01-25 00:00:00'),(28,'Ingreso Ficha del Producto',1,'2018-01-26 02:00:41','2018-01-26 02:00:41'),(29,'Ingreso Guías de Entrada de Productos',1,'2018-01-26 02:01:05','2018-01-26 02:01:05'),(30,'Ingreso Guías de Salidas de Productos',1,'2018-01-26 02:52:51','2018-01-26 02:52:51'),(31,'Informes de Stock de Productos',1,'2018-01-26 02:53:19','2018-01-26 02:53:19'),(32,'Informes de Salidas de Productos',1,'2018-01-26 02:53:40','2018-01-26 02:53:40'),(33,'Informe sobre Rotación de Inventarios',1,'2018-01-26 02:53:56','2018-01-26 02:53:56'),(34,'Realiza cotizaciones',1,'2018-01-26 02:54:16','2018-01-26 02:54:16'),(35,'Emite Órdenes de Compra',1,'2018-03-01 16:31:56','2018-03-01 16:31:56'),(36,'Atiende vencimiento de productos',1,'2018-04-16 19:46:04','2018-04-16 19:46:09'),(37,'Contabilización de costos (Tributarios)',1,'2018-04-16 19:46:36','2018-04-16 19:46:47'),(38,'Generación de cuentas contables y definición de características',1,'2018-04-16 20:06:54','2018-04-16 20:06:57'),(39,'Digitación de facturas de compra de bienes y servicios básicos',1,'2018-04-16 20:06:59','2018-04-16 20:07:00'),(40,'Digitación de boletas de honorarios y servicios profesionales',1,'2018-04-16 20:07:02','2018-04-16 20:07:03'),(41,'Emisión de documentos de pago ',1,'2018-04-16 20:07:05','2018-04-16 20:07:07'),(42,'Mantención de archivo y control de documentación mercantil',1,'2018-04-16 20:07:12','2018-04-16 20:07:14'),(43,'Informes: Libro Mayor',1,'2018-04-16 20:07:22','2018-04-16 20:07:23'),(44,'Mantención Estado de cuentas auxiliares (Clientes y Proveedores)',1,'2018-04-16 20:07:25','2018-04-16 20:07:26'),(45,'Informes: Pre-balance',1,'2018-04-16 20:07:28','2018-04-16 20:07:30'),(46,'Generación de Informes: Libro de Compra y Venta Mensual',1,'2018-04-16 20:07:32','2018-04-16 20:07:33'),(47,'Generación de Informes: Libro de Honorarios',1,'2018-04-16 20:07:35','2018-04-16 20:07:38'),(48,'Generación de Informes: Libro Banco',1,'2018-04-16 20:07:39','2018-04-16 20:07:41'),(49,'Actualiza estado de cuenta Banco con el VGBanK',1,'2018-04-16 20:07:43','2018-04-16 20:07:45'),(50,'Declaraciones mensuales al SII: Formulario N°29 (IVA)',1,'2018-04-16 20:07:46','2018-04-16 20:07:48'),(51,'Declara cotizaciones previsionales del mes (AFP, FONASA, ISAPRES, AFC, MUTUAL)',1,'2018-04-16 20:07:50','2018-04-16 20:07:52'),(52,'Genera protocolo para responder sus emails',1,'2018-04-16 20:18:33','2018-04-16 20:18:53'),(53,'Atiende oportunamente las cotizaciones de clientes según protocolo',1,'2018-04-16 20:18:36','2018-04-16 20:18:56'),(54,'Tiene conocimiento de los artículos existentes en stock',1,'2018-04-16 20:18:42','2018-04-16 20:18:57'),(55,'Ingreso ficha del cliente al E.R.P',1,'2018-04-16 20:18:44','2018-04-16 20:18:59'),(56,'Genera política de precios y créditos a clientes',1,'2018-04-16 20:18:45','2018-04-16 20:19:01'),(57,'Ingreso listas de precios para los productos',1,'2018-04-16 20:18:47','2018-04-16 20:19:03'),(58,'Genera y Mantiene catálogos y webshop actualizados',1,'2018-04-16 20:19:06','2018-04-16 20:19:07'),(59,'Conoce estado de cuentas de clientes',1,'2018-04-16 20:19:09','2018-04-16 20:19:11'),(60,'Genera plan de marketing para el empresa',1,'2018-04-16 20:19:13','2018-04-16 20:19:14'),(61,'Genera y completa bitácora de actividades de la empresa',1,'2018-04-16 20:19:20','2018-04-16 20:19:22'),(62,'Confecciona ficha de personal',1,'2018-04-16 20:34:03','2018-04-16 20:34:05'),(63,'Confección de contrato de trabajo',1,'2018-04-16 20:34:07','2018-04-16 20:34:08'),(64,'Registra contrato archivadores (Expedientes de trabajadores)',1,'2018-04-16 20:34:10','2018-04-16 20:34:12'),(65,'Registro de contratos en E.R.P',1,'2018-04-16 20:34:13','2018-04-16 20:34:15'),(66,'Ingresa fotografía a ficha de personal en E.R.P',1,'2018-04-16 20:34:16','2018-04-16 20:34:18'),(67,'Asigna área de negocio al personal',1,'2018-04-16 20:34:20','2018-04-16 20:34:21'),(68,'Asigna centro de costo al personal',1,'2018-04-16 20:34:23','2018-04-16 20:34:25'),(69,'Anexa curriculum vitae E.R.P',1,'2018-04-16 20:34:26','2018-04-16 20:34:28'),(70,'Anexa cédula de identidad',1,'2018-04-16 20:34:30','2018-04-16 20:34:31'),(71,'Registra cargas familiares',1,'2018-04-16 20:34:33','2018-04-16 20:34:37'),(72,'Envía mail a cumpleañeros del mes',1,'2018-04-16 20:34:38','2018-04-16 20:34:40'),(73,'Ingreso UF a E.R.P',1,'2018-04-16 20:34:42','2018-04-16 20:34:43'),(74,'Ingreso UTM a E.R.P',1,'2018-04-16 20:34:45','2018-04-16 20:34:47'),(75,'Ingreso mes de trabajo a E.R.P',1,'2018-04-16 20:34:48','2018-04-16 20:34:50'),(76,'Ingreso de fecha a E.R.P',1,'2018-04-16 20:34:51','2018-04-16 20:34:53'),(77,'Actualiza porcentajes AFPs e Isapres en E.R.P',1,'2018-04-16 20:34:55','2018-04-16 20:34:56'),(78,'Genera Anticipo a trabajadores',1,'2018-04-16 20:34:58','2018-04-16 20:35:00'),(79,'Ingresa días de inasistencia',1,'2018-04-16 20:35:02','2018-04-16 20:35:03'),(80,'Ingresa monto sueldo base pactado',1,'2018-04-16 20:35:07','2018-04-16 20:35:09'),(81,'Ingresa Aguinaldo/Bono de Producción',1,'2018-04-16 20:35:11','2018-04-16 20:35:12'),(82,'Ingresa monto sueldo Asignación Familiar',1,'2018-04-16 20:35:14','2018-04-16 20:35:15'),(83,'Define mes de ingreso AFC',1,'2018-04-16 20:35:17','2018-04-16 20:35:19'),(84,'Define año de ingreso AFC',1,'2018-04-16 20:35:20','2018-04-16 20:35:22'),(85,'Calcula liquidaciones en E.R.P',1,'2018-04-16 20:35:24','2018-04-16 20:35:26'),(86,'Emite Liquidaciones de sueldo',1,'2018-04-16 20:35:28','2018-04-16 20:35:29'),(87,'Realiza contabilización de remuneraciones',1,'2018-04-16 20:35:31','2018-04-16 20:35:33'),(88,'Emite informe costo empresa mensual',1,'2018-04-16 20:35:35','2018-04-16 20:35:36'),(89,'Respalda remuneraciones en archivador',1,'2018-04-16 20:35:38','2018-04-16 20:35:39'),(90,'Pago de cotizaciones previsionales',1,'2018-04-16 20:35:42','2018-04-16 20:35:44'),(91,'Comunica carta de despido a trabajadores',1,'2018-04-16 20:35:45','2018-04-16 20:35:47'),(92,'Calcula finiquito de trabajadores',1,'2018-04-16 20:35:49','2018-04-16 20:35:50'),(93,'Firma y pago de finiquito',1,'2018-04-16 20:35:52','2018-04-16 20:35:53'),(94,'Informa amonestación',1,'2018-04-16 20:35:55','2018-04-16 20:35:57');
/*!40000 ALTER TABLE `criterio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente` (
  `rut` varchar(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `privilegio_id` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`rut`),
  KEY `fk_docente_sede1_idx` (`sede_id`),
  KEY `fk_docente_privilegio1` (`privilegio_id`),
  CONSTRAINT `fk_docente_privilegio1` FOREIGN KEY (`privilegio_id`) REFERENCES `privilegio` (`id`),
  CONSTRAINT `fk_docente_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente`
--

LOCK TABLES `docente` WRITE;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` VALUES ('17320649','Giuliano Garcés Vega','giuliano.garces@virginiogomez.cl','$2y$10$me7t1LfjHtyV/ggy3yrByOH7i6G6FwLi2eclDRGgUqL5XYZSeTEGW',2,2,'2018-01-18 00:00:00','2018-01-23 20:08:37'),('9143127','Alejandro Castro Sanhueza','acastro@virginiogomez.cl','$2y$10$me7t1LfjHtyV/ggy3yrByOH7i6G6FwLi2eclDRGgUqL5XYZSeTEGW',2,1,'2018-01-23 18:03:18','2018-01-23 18:03:18');
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(1) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Activo','2018-01-25 00:00:00','2018-01-25 00:00:00'),(2,'Inactivo','2018-01-25 00:00:00','2018-01-25 00:00:00');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion_detalle`
--

DROP TABLE IF EXISTS `evaluacion_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nota` float NOT NULL,
  `rotacion_alumno_id` int(11) NOT NULL,
  `rubrica_detalle_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalle_evaluacion1_idx` (`rotacion_alumno_id`),
  KEY `fk_evaluacion_alumno_criterio_detalle_grupos_criterios_deta_idx` (`rubrica_detalle_id`),
  CONSTRAINT `fk_detalle_evaluacion1` FOREIGN KEY (`rotacion_alumno_id`) REFERENCES `rotacion_alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_alumno_criterio_detalle_grupos_criterios_detalle1` FOREIGN KEY (`rubrica_detalle_id`) REFERENCES `rubrica_detalle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion_detalle`
--

LOCK TABLES `evaluacion_detalle` WRITE;
/*!40000 ALTER TABLE `evaluacion_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluacion_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (1,'Recursos humanos','2018-01-24 00:00:00','2018-01-24 00:00:00'),(2,'Ventas','2018-01-24 00:00:00','2018-01-24 00:00:00'),(3,'Compra, bodega e inventario','2018-01-24 00:00:00','2018-01-24 00:00:00'),(4,'Contabilidad y finanzas','2018-01-24 00:00:00','2018-01-24 00:00:00');
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privilegio`
--

DROP TABLE IF EXISTS `privilegio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privilegio` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privilegio`
--

LOCK TABLES `privilegio` WRITE;
/*!40000 ALTER TABLE `privilegio` DISABLE KEYS */;
INSERT INTO `privilegio` VALUES (1,'Administrador'),(2,'Usuario');
/*!40000 ALTER TABLE `privilegio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rotacion_alumno`
--

DROP TABLE IF EXISTS `rotacion_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rotacion_alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_id` int(10) NOT NULL,
  `rotacion_grupo_id` int(11) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evaluacion_alumno1_idx` (`alumno_id`),
  KEY `fk_evaluacion_alumno_seccion_rotacion_grupo1_idx` (`rotacion_grupo_id`),
  KEY `fk_grupo_modulo1_idx` (`modulo_id`),
  CONSTRAINT `fk_evaluacion_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_alumno_seccion_rotacion_grupo1` FOREIGN KEY (`rotacion_grupo_id`) REFERENCES `rotacion_grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_modulo_grupo1` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rotacion_alumno`
--

LOCK TABLES `rotacion_alumno` WRITE;
/*!40000 ALTER TABLE `rotacion_alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `rotacion_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rotacion_grupo`
--

DROP TABLE IF EXISTS `rotacion_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rotacion_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date DEFAULT NULL,
  `rotacion_numero` int(2) NOT NULL,
  `asignatura_seccion_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rotacion_grupo_asignatura_seccion1_idx` (`asignatura_seccion_id`),
  CONSTRAINT `fk_rotacion_grupo_asignatura_seccion1` FOREIGN KEY (`asignatura_seccion_id`) REFERENCES `asignatura_seccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rotacion_grupo`
--

LOCK TABLES `rotacion_grupo` WRITE;
/*!40000 ALTER TABLE `rotacion_grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `rotacion_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubrica`
--

DROP TABLE IF EXISTS `rubrica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubrica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `sede_has_carrera_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_grupo_modulo1_idx` (`modulo_id`),
  KEY `fk_grupo_sede_has_carrera1_idx` (`sede_has_carrera_id`),
  CONSTRAINT `fk_grupo_modulo1` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupo_sede_has_carrera1` FOREIGN KEY (`sede_has_carrera_id`) REFERENCES `sede_has_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubrica`
--

LOCK TABLES `rubrica` WRITE;
/*!40000 ALTER TABLE `rubrica` DISABLE KEYS */;
INSERT INTO `rubrica` VALUES (1,'Rúbrica Compra y Bodega Empresa Simulada ',3,NULL,'2018-01-25 20:50:24','2018-01-25 20:50:24'),(2,'Rúbrica Contabilidad Empresa Simulada ',4,NULL,NULL,NULL),(3,'Rúbrica Marketing y Ventas Empresa Simulada ',2,NULL,NULL,NULL),(4,'Rúbrica Recursos Humanos Empresa Simulada',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `rubrica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubrica_autoevaluacion`
--

DROP TABLE IF EXISTS `rubrica_autoevaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubrica_autoevaluacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubrica_autoevaluacion`
--

LOCK TABLES `rubrica_autoevaluacion` WRITE;
/*!40000 ALTER TABLE `rubrica_autoevaluacion` DISABLE KEYS */;
INSERT INTO `rubrica_autoevaluacion` VALUES (1,'Rúbrica Auto-Evaluacion','2018-01-26 03:12:25','2018-01-26 03:12:25');
/*!40000 ALTER TABLE `rubrica_autoevaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubrica_autoevaluacion_detalle`
--

DROP TABLE IF EXISTS `rubrica_autoevaluacion_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubrica_autoevaluacion_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(1) NOT NULL,
  `criterio_id` int(11) NOT NULL,
  `rubrica_autoevaluacion_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rubrica_autoevaluacion_detalle_estado1_idx` (`estado_id`),
  KEY `fk_rubrica_autoevaluacion_detalle_criterio1_idx` (`criterio_id`),
  KEY `fk_rubrica_autoevaluacion_detalle_rubrica_autoevaluacion1_idx` (`rubrica_autoevaluacion_id`),
  CONSTRAINT `fk_rubrica_autoevaluacion_detalle_criterio1` FOREIGN KEY (`criterio_id`) REFERENCES `criterio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rubrica_autoevaluacion_detalle_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rubrica_autoevaluacion_detalle_rubrica_autoevaluacion1` FOREIGN KEY (`rubrica_autoevaluacion_id`) REFERENCES `rubrica_autoevaluacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubrica_autoevaluacion_detalle`
--

LOCK TABLES `rubrica_autoevaluacion_detalle` WRITE;
/*!40000 ALTER TABLE `rubrica_autoevaluacion_detalle` DISABLE KEYS */;
INSERT INTO `rubrica_autoevaluacion_detalle` VALUES (9,1,1,1,NULL,NULL),(10,1,2,1,NULL,NULL),(11,1,3,1,NULL,NULL),(12,1,4,1,NULL,NULL),(13,1,5,1,NULL,NULL),(14,1,6,1,NULL,NULL),(15,1,7,1,NULL,NULL),(16,1,8,1,NULL,NULL),(17,1,9,1,NULL,NULL);
/*!40000 ALTER TABLE `rubrica_autoevaluacion_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubrica_detalle`
--

DROP TABLE IF EXISTS `rubrica_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubrica_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `criterio_id` int(11) NOT NULL,
  `rubrica_id` int(11) NOT NULL,
  `estado_id` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_criterios_has_modulo_criterios2_idx` (`criterio_id`),
  KEY `fk_grupos_criterios_grupo1_idx` (`rubrica_id`),
  KEY `fk_grupos_criterios_estado1_idx` (`estado_id`),
  CONSTRAINT `fk_criterios_has_modulo_criterios2` FOREIGN KEY (`criterio_id`) REFERENCES `criterio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupos_criterios_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupos_criterios_grupo1` FOREIGN KEY (`rubrica_id`) REFERENCES `rubrica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubrica_detalle`
--

LOCK TABLES `rubrica_detalle` WRITE;
/*!40000 ALTER TABLE `rubrica_detalle` DISABLE KEYS */;
INSERT INTO `rubrica_detalle` VALUES (20,27,1,1,NULL,NULL),(21,28,1,1,NULL,NULL),(22,29,1,1,NULL,NULL),(23,30,1,1,NULL,NULL),(24,31,1,1,NULL,NULL),(25,32,1,1,NULL,NULL),(26,33,1,1,NULL,NULL),(27,34,1,1,NULL,NULL),(28,35,1,1,NULL,NULL),(29,36,1,1,NULL,NULL),(30,37,1,1,NULL,NULL),(31,25,1,1,NULL,NULL),(32,26,1,1,NULL,NULL),(33,10,1,1,NULL,NULL),(34,11,1,1,NULL,NULL),(35,12,1,1,NULL,NULL),(36,13,1,1,NULL,NULL),(37,14,1,1,NULL,NULL),(38,15,1,1,NULL,NULL),(39,16,1,1,NULL,NULL),(40,17,1,1,NULL,NULL),(41,18,1,1,NULL,NULL),(42,19,1,1,NULL,NULL),(43,20,1,1,NULL,NULL),(44,21,1,1,NULL,NULL),(45,22,1,1,NULL,NULL),(46,23,1,1,NULL,NULL),(47,24,1,1,NULL,NULL),(48,38,2,1,NULL,NULL),(49,39,2,1,NULL,NULL),(50,40,2,1,NULL,NULL),(51,41,2,1,NULL,NULL),(52,42,2,1,NULL,NULL),(53,25,2,1,NULL,NULL),(54,43,2,1,NULL,NULL),(55,44,2,1,NULL,NULL),(56,45,2,1,NULL,NULL),(57,46,2,1,NULL,NULL),(58,47,2,1,NULL,NULL),(59,48,2,1,NULL,NULL),(60,49,2,1,NULL,NULL),(61,50,2,1,NULL,NULL),(62,51,2,1,NULL,NULL),(63,26,2,1,NULL,NULL),(64,10,2,1,NULL,NULL),(65,11,2,1,NULL,NULL),(66,12,2,1,NULL,NULL),(67,13,2,1,NULL,NULL),(68,14,2,1,NULL,NULL),(69,15,2,1,NULL,NULL),(70,16,2,1,NULL,NULL),(71,17,2,1,NULL,NULL),(72,18,2,1,NULL,NULL),(73,19,2,1,NULL,NULL),(74,20,2,1,NULL,NULL),(75,21,2,1,NULL,NULL),(76,22,2,1,NULL,NULL),(77,23,2,1,NULL,NULL),(78,24,2,1,NULL,NULL),(91,52,3,1,NULL,NULL),(92,26,3,1,NULL,NULL),(93,53,3,1,NULL,NULL),(94,54,3,1,NULL,NULL),(95,55,3,1,NULL,NULL),(96,56,3,1,NULL,NULL),(97,57,3,1,NULL,NULL),(98,58,3,1,NULL,NULL),(99,59,3,1,NULL,NULL),(100,60,3,1,NULL,NULL),(101,25,3,1,NULL,NULL),(102,61,3,1,NULL,NULL),(103,10,3,1,NULL,NULL),(104,11,3,1,NULL,NULL),(105,12,3,1,NULL,NULL),(106,13,3,1,NULL,NULL),(107,14,3,1,NULL,NULL),(108,15,3,1,NULL,NULL),(109,16,3,1,NULL,NULL),(110,17,3,1,NULL,NULL),(111,18,3,1,NULL,NULL),(112,19,3,1,NULL,NULL),(113,20,3,1,NULL,NULL),(114,21,3,1,NULL,NULL),(115,22,3,1,NULL,NULL),(116,23,3,1,NULL,NULL),(117,24,3,1,NULL,NULL),(118,62,4,1,NULL,NULL),(119,63,4,1,NULL,NULL),(120,64,4,1,NULL,NULL),(121,65,4,1,NULL,NULL),(122,66,4,1,NULL,NULL),(123,67,4,1,NULL,NULL),(124,68,4,1,NULL,NULL),(125,69,4,1,NULL,NULL),(126,70,4,1,NULL,NULL),(127,71,4,1,NULL,NULL),(128,72,4,1,NULL,NULL),(129,73,4,1,NULL,NULL),(130,74,4,1,NULL,NULL),(131,75,4,1,NULL,NULL),(132,76,4,1,NULL,NULL),(133,77,4,1,NULL,NULL),(134,78,4,1,NULL,NULL),(135,79,4,1,NULL,NULL),(136,80,4,1,NULL,NULL),(137,81,4,1,NULL,NULL),(138,82,4,1,NULL,NULL),(139,83,4,1,NULL,NULL),(140,84,4,1,NULL,NULL),(141,85,4,1,NULL,NULL),(142,86,4,1,NULL,NULL),(143,87,4,1,NULL,NULL),(144,88,4,1,NULL,NULL),(145,89,4,1,NULL,NULL),(146,90,4,1,NULL,NULL),(147,91,4,1,NULL,NULL),(148,92,4,1,NULL,NULL),(149,93,4,1,NULL,NULL),(150,94,4,1,NULL,NULL),(151,25,4,1,NULL,NULL),(152,26,4,1,NULL,NULL),(153,10,4,1,NULL,NULL),(154,11,4,1,NULL,NULL),(155,12,4,1,NULL,NULL),(156,13,4,1,NULL,NULL),(157,14,4,1,NULL,NULL),(158,15,4,1,NULL,NULL),(159,16,4,1,NULL,NULL),(160,17,4,1,NULL,NULL),(161,18,4,1,NULL,NULL),(162,19,4,1,NULL,NULL),(163,20,4,1,NULL,NULL),(164,21,4,1,NULL,NULL),(165,22,4,1,NULL,NULL),(166,23,4,1,NULL,NULL),(167,24,4,1,NULL,NULL);
/*!40000 ALTER TABLE `rubrica_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sede`
--

DROP TABLE IF EXISTS `sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sede` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sede`
--

LOCK TABLES `sede` WRITE;
/*!40000 ALTER TABLE `sede` DISABLE KEYS */;
INSERT INTO `sede` VALUES (1,'Concepción','Arturo Prat 193','','2018-01-18 00:00:00','2018-01-18 00:00:00'),(2,'Chillán','Vicente Méndez 1240','','2018-01-22 00:00:00','2018-01-22 00:00:00'),(3,'Los Ángeles','Ercilla 444','','2018-01-22 00:00:00','2018-01-22 00:00:00');
/*!40000 ALTER TABLE `sede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sede_has_carrera`
--

DROP TABLE IF EXISTS `sede_has_carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sede_has_carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sede_id` int(11) NOT NULL,
  `carrera_id` int(6) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sede_has_carrera_carrera1_idx` (`carrera_id`),
  KEY `fk_sede_has_carrera_sede1_idx` (`sede_id`),
  CONSTRAINT `fk_sede_has_carrera_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sede_has_carrera_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sede_has_carrera`
--

LOCK TABLES `sede_has_carrera` WRITE;
/*!40000 ALTER TABLE `sede_has_carrera` DISABLE KEYS */;
/*!40000 ALTER TABLE `sede_has_carrera` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-18 18:46:09
