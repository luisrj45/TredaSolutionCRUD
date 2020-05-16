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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla treda_solucion.productos: ~0 rows (aproximadamente)
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
	(16, 'czxczx3', 'dsfs', 'sdfsdf', 7, 444444, '/images/productos/1905195571.jpeg', '2020-05-16 18:25:14', '2020-05-16 18:25:14', NULL),
	(17, 'czxczx34', 'dsfs', 'sdfsdf', 7, 444444, '/images/productos/105793065.jpeg', '2020-05-16 18:26:05', '2020-05-16 18:26:05', NULL),
	(18, '1322', 'fdsfsdf', 'sfsf', 19, 2343242, '/images/productos/250675600.jpeg', '2020-05-16 18:28:23', '2020-05-16 22:19:15', NULL),
	(19, 'sadasd', 'asdasd', 'asdas', 18, 121211, '/images/productos/1554501274.jpeg', '2020-05-16 18:30:28', '2020-05-16 22:21:10', NULL),
	(20, 'wwwqwwqw', 'asdasd', 'asdas', 18, 121211, '/images/productos/169567700.jpeg', '2020-05-16 18:35:52', '2020-05-16 22:16:11', NULL),
	(21, 'aasda', 'sadad', 'qqqqqqpppppwwwwwww', 18, 32434, '/images/productos/532123681.jpeg', '2020-05-16 20:11:31', '2020-05-16 20:54:27', NULL),
	(22, '343523', 'DSCSDFASDF', 'SDFAFA', 16, 45355, '/images/productos/1912009665.jpeg', '2020-05-16 22:21:54', '2020-05-16 22:21:54', NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

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
