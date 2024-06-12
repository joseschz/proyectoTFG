-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         11.3.2-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para eventos
CREATE DATABASE IF NOT EXISTS `eventos` ;
USE `eventos`;

CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaccion` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `id_cliente` varchar(50) NOT NULL DEFAULT '',
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `NombreCompra` varchar(50) DEFAULT NULL,
  `PrimerApellidoCompra` varchar(50) DEFAULT NULL,
  `SegundoApellidoCompra` varchar(50) DEFAULT NULL,
  `DireccionCompra` varchar(100) NOT NULL DEFAULT '',
  `CPCompra` varchar(50) NOT NULL DEFAULT '',
  `TelefonoCompra` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS `cupones` (
  `Porcentaje` int(11) NOT NULL,
  `Codigo` varchar(50) NOT NULL DEFAULT '',
  `REBAJA` int(11) DEFAULT NULL,
  `ID_Cupon` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  PRIMARY KEY (`ID_Cupon`),
  KEY `ID_Producto` (`ID_Producto`),
  CONSTRAINT `FK_cupones_productos` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS `detalle_compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(255) DEFAULT NULL,
  `id_producto` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS `productos` (
  `ID_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Precio` float NOT NULL DEFAULT 0,
  `Descripcion` text NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `stock` varchar(50) NOT NULL DEFAULT '0',
  `Orden` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Producto`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS `reseña` (
  `id` int(11) NOT NULL ,
  `id_usuario` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL DEFAULT '',
  `valoracion` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_reseña` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) NOT NULL DEFAULT '[ROLE_USER]',
  `nombre` varchar(255) DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `contraseña` varchar(255) NOT NULL DEFAULT '',
  `Primer_Apellido` varchar(255) NOT NULL DEFAULT '',
  `Segundo_Apellido` varchar(255) NOT NULL DEFAULT '',
  `fecha` timestamp NULL DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla eventos.usuarios: ~7 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
