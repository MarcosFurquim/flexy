# ************************************************************
# Sequel Pro SQL dump
# Vers�o 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: local.db (MySQL 5.5.5-10.3.10-MariaDB-1:10.3.10+maria~bionic)
# Base de Dados: flexy
# Tempo de Gera��o: 2018-12-04 21:55:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela Product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Product`;

CREATE TABLE `Product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(6) NOT NULL DEFAULT '',
  `description` varchar(4000) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `stock` varchar(255) NOT NULL DEFAULT '',
  `tag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag` (`tag`),
  CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`tag`) REFERENCES `Tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump da tabela Tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Tag`;

CREATE TABLE `Tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
