DROP DATABASE IF EXISTS `nasiol`;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nasiol` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `nasiol`;

/*Table structure for table `banner_inicio` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fecha_alta` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `fecha_modifica` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nivel` int(2),
  `active` boolean DEFAULT TRUE,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuario`(`nombre`,`apellidos`,`email`,`password`,`nivel`) 
values('Mario', 'Cuevas', 'mario.cuevas@gameloft.com', MD5('n@5i0112345'),0);

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
`id_categoria` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(500) NOT NULL,
`fecha_alta` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`fecha_modifica` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`active` boolean DEFAULT TRUE,
`imagenes` TEXT,
PRIMARY KEY(`id_categoria`)
) ENGINE= InnoDB DEFAULT CHARSET = latin1;

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
`id_producto` int(11) NOT NULL AUTO_INCREMENT,
`nombre` varchar(500) NOT NULL,
`id_categoria` int(11) NOT NULL,
`fecha_alta` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`fecha_modifica` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`imagenes` TEXT,
`active` boolean DEFAULT TRUE,
PRIMARY KEY(`id_producto`),
KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE= InnoDB DEFAULT CHARSET = latin1;

DROP 