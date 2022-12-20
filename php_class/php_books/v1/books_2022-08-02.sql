# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.17-MariaDB)
# Base de Dados: books
# Tempo de Geração: 2022-08-02 22:25:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `id_state` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_STATE_ID` (`id_state`),
  CONSTRAINT `FK_STATE_ID` FOREIGN KEY (`id_state`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;

INSERT INTO `cities` (`id`, `name`, `id_state`)
VALUES
	(1,'Rio Branco',1);

/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela people
# ------------------------------------------------------------

DROP TABLE IF EXISTS `people`;

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `address` varchar(155) DEFAULT NULL,
  `district` varchar(155) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mail` varchar(155) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela states
# ------------------------------------------------------------

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `uf` char(2) DEFAULT NULL,
  `name` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;

INSERT INTO `states` (`id`, `uf`, `name`)
VALUES
	(1,'AC','Acre');

/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tb_famous
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_famous`;

CREATE TABLE `tb_famous` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` smallint(6) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tb_famous` WRITE;
/*!40000 ALTER TABLE `tb_famous` DISABLE KEYS */;

INSERT INTO `tb_famous` (`id`, `code`, `name`)
VALUES
	(1,1,'Érico Veríssimo'),
	(2,2,'John Lennon'),
	(3,3,'Mahatma Gandhi'),
	(4,4,'Ayrton Senna'),
	(5,5,'Charlie Chaplin'),
	(6,6,'Anita Garibaldi'),
	(7,7,'Mário Quintana'),
	(8,1,'Érico Veríssimo'),
	(9,2,'John Lennon'),
	(10,3,'Mahatma Gandhi'),
	(11,4,'Ayrton Senna'),
	(12,5,'Charlie Chaplin'),
	(13,6,'Anita Garibaldi'),
	(14,7,'Mário Quintana'),
	(15,1,'Érico Veríssimo'),
	(16,2,'John Lennon'),
	(17,3,'Mahatma Gandhi'),
	(18,4,'Ayrton Senna'),
	(19,5,'Charlie Chaplin'),
	(20,6,'Anita Garibaldi'),
	(21,7,'Mário Quintana'),
	(22,1,'Érico Veríssimo'),
	(23,2,'John Lennon'),
	(24,3,'Mahatma Gandhi'),
	(25,4,'Ayrton Senna'),
	(26,5,'Charlie Chaplin'),
	(27,6,'Anita Garibaldi'),
	(28,7,'Mário Quintana');

/*!40000 ALTER TABLE `tb_famous` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
