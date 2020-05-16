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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.tiendas: ~1 rows (aproximadamente)
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
	(20, 'fsdf', '65', '1970-01-01', '2020-05-16 00:13:24', '2020-05-16 00:13:24', NULL);
/*!40000 ALTER TABLE `tiendas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
