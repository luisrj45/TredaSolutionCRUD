-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.17 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para treda_solucion
CREATE DATABASE IF NOT EXISTS `treda_solucion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `treda_solucion`;

-- Volcando estructura para tabla treda_solucion.ciudad
CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` int(20) unsigned NOT NULL,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.ciudad: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` (`id`, `nombre`) VALUES
	(1, 'medellin'),
	(2, 'cali');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;

-- Volcando estructura para tabla treda_solucion.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(20) unsigned NOT NULL,
  `primer_nombre` varchar(250) NOT NULL,
  `primer_apellido` varchar(250) NOT NULL,
  `dias_mora` int(20) NOT NULL,
  `id_ciudad` int(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cliente_ciudad` (`id_ciudad`),
  CONSTRAINT `FK_cliente_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `primer_nombre`, `primer_apellido`, `dias_mora`, `id_ciudad`) VALUES
	(1, 'martin', 'martinez', 40, 1),
	(2, 'juan', 'castro', 25, 2),
	(1458, 'julieta', 'perez', 5, 2);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla treda_solucion.cotizacion
CREATE TABLE IF NOT EXISTS `cotizacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor_poliza_iva_incl` double(20,2) NOT NULL,
  `valor_poliza` double(20,2) NOT NULL,
  `valor_poliza_cuota` double(20,2) NOT NULL,
  `id_sucursal` int(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cotizacion_sucursal` (`id_sucursal`),
  CONSTRAINT `FK_cotizacion_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.cotizacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cotizacion` DISABLE KEYS */;
INSERT INTO `cotizacion` (`id`, `valor_poliza_iva_incl`, `valor_poliza`, `valor_poliza_cuota`, `id_sucursal`) VALUES
	(1, 1025.36, 1240.30, 587.30, 2434),
	(2, 1211.10, 200.32, 21123.43, 123),
	(3, 1110.00, 2000.00, 12000.00, 2434),
	(4, 900.00, 1200.00, 2500.00, 2434);
/*!40000 ALTER TABLE `cotizacion` ENABLE KEYS */;

-- Volcando estructura para tabla treda_solucion.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `cc` int(11) unsigned NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `id_jefe` int(11) NOT NULL,
  KEY `FK_empleados_jefes` (`id_jefe`),
  CONSTRAINT `FK_empleados_jefes` FOREIGN KEY (`id_jefe`) REFERENCES `jefes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.empleados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` (`cc`, `nombre`, `cargo`, `area`, `id_jefe`) VALUES
	(75698, 'maria canchila', 'mesera', 'estadero', 258),
	(963258, 'lucia castilllo', 'aseadora', 'limpieza', 653),
	(96325, 'wilson betancur', 'mesero', 'atencion al cliente', 412),
	(1342, 'dilan cuello', 'celador', 'seguridad', 412);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;

-- Volcando estructura para tabla treda_solucion.estudios
CREATE TABLE IF NOT EXISTS `estudios` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `institucion` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `fkpersona` int(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_estudios_persona` (`fkpersona`),
  CONSTRAINT `FK_estudios_persona` FOREIGN KEY (`fkpersona`) REFERENCES `persona` (`cc`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.estudios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
INSERT INTO `estudios` (`id`, `institucion`, `fecha`, `fkpersona`) VALUES
	(1, 'luis carlos galan', '2013-05-16', 9856),
	(2, 'jose ignacio', '2019-05-17', 9856),
	(3, 'policarpa', '2019-05-17', 345667),
	(4, 'policarpa', '2020-05-21', 9856),
	(5, 'jose ignacio', '2014-05-17', 9856),
	(6, 'luis carlos galan', '2011-05-22', 9856),
	(7, 'jose ignacio', '2006-05-17', 9856),
	(8, 'jose ignacio', '2017-05-17', 345667),
	(9, 'central', '2019-05-17', 345667),
	(10, 'inst. merida', '2020-05-17', 123334),
	(11, 'inst. colombia', '2021-04-17', 123334);
/*!40000 ALTER TABLE `estudios` ENABLE KEYS */;

-- Volcando estructura para tabla treda_solucion.jefes
CREATE TABLE IF NOT EXISTS `jefes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.jefes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `jefes` DISABLE KEYS */;
INSERT INTO `jefes` (`id`, `nombre`) VALUES
	(258, 'mariano pinea'),
	(412, 'julia mar'),
	(653, 'juan del mar');
/*!40000 ALTER TABLE `jefes` ENABLE KEYS */;

-- Volcando estructura para tabla treda_solucion.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `cc` int(20) unsigned NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  PRIMARY KEY (`cc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.persona: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`cc`, `nombre`, `apellido`) VALUES
	(4563, 'monica', 'castro'),
	(9856, 'julio', 'barros'),
	(123334, 'mariana', 'jaraba'),
	(345667, 'manuel', 'paz');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla treda_solucion.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(50) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `tienda` int(20) unsigned NOT NULL,
  `valor` int(50) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`),
  KEY `FK_productos_tiendas` (`tienda`),
  CONSTRAINT `FK_productos_tiendas` FOREIGN KEY (`tienda`) REFERENCES `tiendas` (`id_tienda`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.productos: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `sku`, `nombre`, `descripcion`, `tienda`, `valor`, `imagen`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'dfsfa', 'sdfasf', 'sfdf', 19, 324234234, '/images/productos/1198624170.jpeg', '2020-05-16 17:36:12', '2020-05-16 17:36:12', NULL),
	(2, '2342fdsf', 'sdfasf', 'sfdf', 19, 324234234, '/images/productos/206334312.jpeg', '2020-05-16 17:36:50', '2020-05-16 17:36:50', NULL),
	(3, '85555', 'sdfasf', 'sfdf', 19, 324234234, '/images/productos/1893626979.jpeg', '2020-05-16 17:37:31', '2020-05-16 17:37:31', NULL),
	(4, 'xczcz', 'zxczxc', 'zxczxc', 13, 23232, '/images/productos/1730755080.jpeg', '2020-05-16 18:00:52', '2020-05-16 18:00:52', NULL),
	(5, 'xczcz222', 'zxczxc', 'zxczxc', 13, 23232, '/images/productos/406472392.jpeg', '2020-05-16 18:04:54', '2020-05-16 18:04:54', NULL),
	(6, 'xczeeerr', 'zxczxc', 'zxczxc', 13, 23232, '/images/productos/1070915176.jpeg', '2020-05-16 18:06:37', '2020-05-16 18:06:37', NULL),
	(7, 'asssssqqqq', 'ddsd', 'sdfaf', 6, 132332, '/images/productos/1719487891.jpeg', '2020-05-16 18:11:23', '2020-05-16 18:11:23', NULL),
	(8, 'qqqqqqqq', 'ddsd', 'asasdadasdsa', 6, 132332, '/images/productos/1560803446.jpeg', '2020-05-16 18:11:47', '2020-05-16 18:11:47', NULL),
	(9, 'werrwre', 'ddsd', 'asasdadasdsa', 6, 132332, '/images/productos/348434408.jpeg', '2020-05-16 18:12:08', '2020-05-16 18:12:08', NULL),
	(10, 'qwwqwqwwww', 'ddsd', 'asasdadasdsa', 6, 132332, '/images/productos/1034506493.jpeg', '2020-05-16 18:12:36', '2020-05-16 22:15:18', NULL),
	(11, '3434344', 'ddsd', 'asasdadasdsa', 6, 132332, '/images/productos/890191742.jpeg', '2020-05-16 18:12:56', '2020-05-16 21:49:02', '2020-05-16 21:49:02'),
	(12, '343434443', 'qqqqqqqq qqqqq', 'asasq pppppp', 6, 132332, '/images/productos/1688141928.jpeg', '2020-05-16 18:13:57', '2020-05-16 21:48:08', '2020-05-16 21:48:08'),
	(13, 'werw', 'sdsd', 'sdfsfa', 14, 243254, '/images/productos/1701504482.jpeg', '2020-05-16 18:15:36', '2020-05-16 22:04:49', NULL),
	(14, 'werwqwww', 'sdsd', 'sdfsfa', 14, 243254, '/images/productos/1383637100.jpeg', '2020-05-16 18:17:22', '2020-05-16 18:17:22', NULL),
	(15, 'czxczx', 'dsfs', 'sdfsdf', 7, 5456968, '/images/productos/819249996.jpeg', '2020-05-16 18:23:54', '2020-05-16 18:23:54', NULL),
	(16, 'czxczx3', 'qqqqqqqqqqq', 'sdfsdf', 7, 444444, '/images/productos/1905195571.jpeg', '2020-05-16 18:25:14', '2020-05-17 17:59:20', NULL),
	(17, 'czxczx34', 'dsfs', 'sdfsdf', 7, 444444, '/images/productos/105793065.jpeg', '2020-05-16 18:26:05', '2020-05-16 18:26:05', NULL),
	(18, '1322', 'fdsfsdf', 'sfsf', 19, 2343242, '/images/productos/250675600.jpeg', '2020-05-16 18:28:23', '2020-05-16 22:19:15', NULL),
	(19, 'sadasd', 'asdasd', 'asdas', 18, 121211, '/images/productos/1554501274.jpeg', '2020-05-16 18:30:28', '2020-05-16 22:21:10', NULL),
	(20, 'wwwqwwqw', 'asdasd', 'asdas', 18, 121211, '/images/productos/169567700.jpeg', '2020-05-16 18:35:52', '2020-05-16 22:16:11', NULL),
	(21, 'aasda', 'sadad', 'qqqqqqpppppwwwwwww', 18, 32434, '/images/productos/532123681.jpeg', '2020-05-16 20:11:31', '2020-05-16 20:54:27', NULL),
	(22, '343523', 'DSCSDFASDF', 'SDFAFA', 16, 45355, '/images/productos/1912009665.jpeg', '2020-05-16 22:21:54', '2020-05-16 22:21:54', NULL),
	(23, 'aadsa', 'fsfdf', 'dfsd', 14, 232424, '/images/productos/123213592.jpeg', '2020-05-17 10:39:03', '2020-05-17 10:39:03', NULL),
	(24, 'ppppppp', 'dsfsf', 'sfsdf', 12, 34543, '/images/productos/441561287.jpeg', '2020-05-17 10:43:28', '2020-05-17 18:00:45', NULL),
	(25, '455662334', 'dsfsf', 'sfsdf', 12, 34543, '/images/productos/2078706740.jpeg', '2020-05-17 10:46:07', '2020-05-17 10:46:07', NULL),
	(26, '243rwdfs', 'sdfdsfs', 'sfsfs', 11, 343522, '/images/productos/218586200.jpeg', '2020-05-17 10:55:49', '2020-05-17 10:55:49', NULL),
	(27, 'addafdf', 'afafas', 'afafaf', 18, 2342424, '/images/productos/1479759351.jpeg', '2020-05-17 18:01:38', '2020-05-17 18:01:38', NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla treda_solucion.sucursal
CREATE TABLE IF NOT EXISTS `sucursal` (
  `id` int(20) unsigned NOT NULL,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.sucursal: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` (`id`, `nombre`) VALUES
	(123, 'norte'),
	(2434, 'centro');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;

-- Volcando estructura para tabla treda_solucion.tiendas
CREATE TABLE IF NOT EXISTS `tiendas` (
  `id_tienda` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `id` varchar(200) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha_apertura` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tienda`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.tiendas: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `tiendas` DISABLE KEYS */;
INSERT INTO `tiendas` (`id_tienda`, `id`, `nombre`, `fecha_apertura`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'asdad', 'dadad', '2020-05-05', '2020-05-15 16:54:45', '2020-05-15 16:54:45', NULL),
	(4, '1234242', 'rewerwer', '2021-06-14', '2020-05-15 16:59:22', '2020-05-15 16:59:22', NULL),
	(5, '123424223', 'rewerwer', '2021-06-14', '2020-05-15 17:00:09', '2020-05-15 17:00:09', NULL),
	(6, 'sadaf32', 'rester', '1970-01-01', '2020-05-15 17:02:07', '2020-05-15 17:02:07', NULL),
	(7, 'gdfg', 'gddgz', '1970-01-01', '2020-05-15 17:04:23', '2020-05-15 17:04:23', NULL),
	(8, 'uihih', 'hui', '1970-01-01', '2020-05-15 17:04:39', '2020-05-15 22:02:18', '2020-05-15 22:02:18'),
	(9, 'efasf', 'fasfsa', '1970-01-01', '2020-05-15 18:33:14', '2020-05-15 18:33:14', NULL),
	(10, 'sadsa', 'safdsda', '1970-01-01', '2020-05-15 18:34:11', '2020-05-15 18:34:11', NULL),
	(11, 'ssss', 'ssss', '1970-01-01', '2020-05-15 18:34:56', '2020-05-15 18:34:56', NULL),
	(12, 'sdfsdf', 'dfsf', '1970-01-01', '2020-05-15 18:35:33', '2020-05-15 18:35:33', NULL),
	(13, '45345', 'fsfs', '1970-01-01', '2020-05-15 18:39:36', '2020-05-15 18:39:36', NULL),
	(14, 'dadad', 'wwwww ppp', '1970-01-01', '2020-05-15 19:50:02', '2020-05-15 21:37:55', NULL),
	(15, 'asjhsd', 'kjhui', '2020-12-12', '2020-05-15 21:45:38', '2020-05-15 22:24:43', '2020-05-15 22:24:43'),
	(16, 'fddsf', 'sdfasfd', '2020-10-20', '2020-05-15 23:18:15', '2020-05-15 23:18:15', NULL),
	(17, 'fasfasfas', 'dsaasfd', '2020-02-29', '2020-05-15 23:24:26', '2020-05-15 23:24:26', NULL),
	(18, 'dfsggsdg', '1025566fcf', '2025-10-20', '2020-05-15 23:34:43', '2020-05-15 23:34:43', NULL),
	(19, 'asdasd', '4545.5646', '2020-10-20', '2020-05-15 23:40:10', '2020-05-15 23:40:10', NULL),
	(20, 'fsdf', '65', '1970-01-01', '2020-05-16 00:13:24', '2020-05-16 00:13:24', NULL),
	(21, 'saadad', 'sadsd', '2020-01-01', '2020-05-16 11:08:43', '2020-05-16 11:08:43', NULL),
	(22, 'sadsad', '564646', '1970-01-01', '2020-05-16 11:19:21', '2020-05-16 11:19:21', NULL),
	(23, 'sasd', 'asdasd', '2055-10-04', '2020-05-16 13:12:02', '2020-05-16 13:12:02', NULL),
	(24, 'sadad', 'sadad', '2020-02-02', '2020-05-16 13:30:58', '2020-05-16 21:01:26', NULL);
/*!40000 ALTER TABLE `tiendas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
