DROP DATABASE IF EXISTS `nasiol`;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`nasiol` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `nasiol`;

/*Table structure for table `banner_inicio` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fecha_alta` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `fecha_modifica` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nivel` int(2),
  `active` boolean DEFAULT TRUE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuario`(`nombre`,`apellidos`,`email`,`password`,`nivel`) 
values('Mario', 'Cuevas', 'mario.cuevas@gameloft.com', MD5('n@5i0112345'),0);

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(500) NOT NULL,
`key_nombre` varchar(500) NOT NULL,
`fecha_alta` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`fecha_modifica` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`active` boolean DEFAULT TRUE,
`imagenes` TEXT,
PRIMARY KEY(`id`)
) ENGINE= InnoDB DEFAULT CHARSET = latin1;

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(500) NOT NULL,
`key_nombre` varchar(500) NOT NULL,
`id_categoria` int(11) NOT NULL,
`fecha_alta` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`fecha_modifica` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`imagenes` TEXT,
`precio` decimal(10,2),
`descripcion` TEXT,
`url_video` varchar(250),
`especificaciones` text,
`active` boolean DEFAULT TRUE,
PRIMARY KEY(`id`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`)
) ENGINE= InnoDB DEFAULT CHARSET = latin1;

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`service` varchar(250),
`info` TEXT,
`expiration_date` TIMESTAMP,
PRIMARY KEY(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;