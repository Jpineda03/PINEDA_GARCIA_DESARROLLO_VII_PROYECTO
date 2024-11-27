-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table recetas.comentarios
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_receta` int NOT NULL,
  `id_usuario` int NOT NULL,
  `contenido` text NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_receta` (`id_receta`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_receta`) REFERENCES `recetas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table recetas.comentarios: ~0 rows (approximately)

-- Dumping structure for table recetas.imagenes
CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `tamano` int NOT NULL,
  `fecha_subida` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table recetas.imagenes: ~2 rows (approximately)
INSERT INTO `imagenes` (`id`, `nombre`, `tipo`, `ruta`, `tamano`, `fecha_subida`) VALUES
	(1, 'libros-4.jpg', 'image/jpeg', 'uploads/67466a2c03a10_libros-4.jpg', 144439, '2024-11-27 00:39:08'),
	(2, 'libros-4.jpg', 'image/jpeg', 'uploads/67466a55a66b0_libros-4.jpg', 144439, '2024-11-27 00:39:49');

-- Dumping structure for table recetas.ingredientes
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_receta` int NOT NULL,
  `ingrediente` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `cantidad` varchar(100) NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_receta` (`id_receta`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`id_receta`) REFERENCES `recetas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ingredientes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table recetas.ingredientes: ~4 rows (approximately)
INSERT INTO `ingredientes` (`id`, `id_receta`, `ingrediente`, `cantidad`, `id_usuario`) VALUES
	(27, 55, '[{"ingrediente":"agua","cantidad":"500","unidades":"lt"},{"ingrediente":"name","cantidad":"20 ","unidades":"unidades"}]', '1', 11),
	(28, 56, '[]', '1', 11),
	(29, 57, '[{"ingrediente":"agua","cantidad":"500","unidades":"lt"},{"ingrediente":"name","cantidad":"20 ","unidades":"unidades"}]', '1', 11);

-- Dumping structure for table recetas.pasos
CREATE TABLE IF NOT EXISTS `pasos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_receta` int NOT NULL,
  `paso_numero` int NOT NULL,
  `descripcion` text NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_receta` (`id_receta`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `pasos_ibfk_1` FOREIGN KEY (`id_receta`) REFERENCES `recetas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pasos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table recetas.pasos: ~5 rows (approximately)
INSERT INTO `pasos` (`id`, `id_receta`, `paso_numero`, `descripcion`, `id_usuario`) VALUES
	(19, 49, 0, '', 11),
	(25, 55, 0, '["calentar las ollas"]', 11),
	(26, 56, 0, '[]', 11),
	(27, 57, 0, '["calentar","otro paso"]', 11);

-- Dumping structure for table recetas.recetas
CREATE TABLE IF NOT EXISTS `recetas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text,
  `imagen` varchar(255) DEFAULT NULL,
  `id_usuario` int NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_tipo` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_tipo` (`id_tipo`),
  CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `recetas_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table recetas.recetas: ~5 rows (approximately)
INSERT INTO `recetas` (`id`, `titulo`, `descripcion`, `imagen`, `id_usuario`, `fecha_creacion`, `id_tipo`) VALUES
	(49, 'Sopa de Pollo 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 11, '2024-11-24 19:45:47', 1),
	(55, 'Sopa de Pollo 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 11, '2024-11-27 02:28:12', 1),
	(56, 'Carne al Horno', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 11, '2024-11-27 03:31:41', 2),
	(57, 'Sopa de Pollo 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry  Lorem Ipsum has been the industry s standard dummy text ever since the 1500s  when an unknown printer took a galley of type and scrambled it to make a type specimen book  It has survived not only five centuries  but also the leap into electronic typesetting  remaining essentially unchanged  It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages  and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', NULL, 11, '2024-11-27 04:31:19', 2);

-- Dumping structure for table recetas.tipos
CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table recetas.tipos: ~3 rows (approximately)
INSERT INTO `tipos` (`id`, `nombre`) VALUES
	(1, 'pollo'),
	(2, 'res'),
	(3, 'chino');

-- Dumping structure for table recetas.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table recetas.usuarios: ~1 rows (approximately)
INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasena`) VALUES
	(11, 'Gabriel', 'gagarcia@panama-tec.com', '12345'),
	(12, 'javett', 'javet.pineda3@gmail.com', '12345'),
	(13, 'JAVETT', 'javett.pineda3@gmail.com', '12345'),
	(15, 'JAVETT', 'JOSEFA@GMAIL.COM', '12234'),
	(16, 'JAVETT', 'VDVF', 'FD');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
