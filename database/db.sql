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
	(9, 'central', '2019-05-18', 345667),
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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.productos: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `sku`, `nombre`, `descripcion`, `tienda`, `valor`, `imagen`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(56, '2345', 'jabon', 'sirve para lavar', 25, 12345, '/images/productos/2097596761.jpg', '2020-05-18 11:36:37', '2020-05-18 11:42:17', '2020-05-18 11:42:17'),
	(57, '6987111', 'pantalon', 'pieza de vestir', 26, 234677, '/images/productos/1528552649.jpg', '2020-05-18 11:38:21', '2020-05-18 11:39:09', NULL),
	(58, '213213', 'blusa', 'pieza de vertil damas', 25, 100000, '/images/productos/596740493.jpg', '2020-05-18 11:40:31', '2020-05-18 11:40:31', NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.tiendas: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `tiendas` DISABLE KEYS */;
INSERT INTO `tiendas` (`id_tienda`, `id`, `nombre`, `fecha_apertura`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(25, '12345', 'exito', '2020-06-20', '2020-05-18 11:33:08', '2020-05-18 11:33:08', NULL),
	(26, '345676', 'carulla surtimax', '2025-07-15', '2020-05-18 11:33:40', '2020-05-18 11:33:40', NULL),
	(27, '8765', 'Olimpico', '2021-10-30', '2020-05-18 11:34:21', '2020-05-18 11:35:03', '2020-05-18 11:35:03');
/*!40000 ALTER TABLE `tiendas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
