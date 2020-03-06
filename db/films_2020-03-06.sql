# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.5.5-10.4.6-MariaDB)
# Схема: films
# Время создания: 2020-03-06 13:49:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `telephone` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`id`, `name`, `email`, `telephone`, `created_at`, `updated_at`)
VALUES
	(1,'Jessy','jessy@example.com','0971231212','2020-05-01 22:22:22','2020-05-01 22:22:22'),
	(2,'Rick','info@example.com','+3805086177704','2020-03-06 11:43:42','2020-03-06 11:43:42'),
	(3,'Can','info@example.com','+3809786177701','2020-03-06 11:54:16','2020-03-06 11:54:16'),
	(4,'Yaroslav','info@zenlix.com','+3809786177704','2020-03-06 11:54:49','2020-03-06 11:54:49'),
	(5,'Bob','bob@example.com','+3805086177702','2020-03-06 11:55:52','2020-03-06 11:55:52');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы films
# ------------------------------------------------------------

DROP TABLE IF EXISTS `films`;

CREATE TABLE `films` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `poster` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;

INSERT INTO `films` (`id`, `name`, `poster`, `description`, `created_at`, `updated_at`)
VALUES
	(11,'Сияние','cb60f76d6e5e0430456af48f42048733.jpeg','Главный герой — Джек Торренс — приехал в элегантный уединенный отель, чтобы поработать смотрителем во время мертвого сезона вместе со своей женой и сыном. Торренс здесь раньше никогда не бывал. Или это не совсем так? Ответ лежит во мраке, сотканном из преступного кошмара.','2020-03-06 14:49:18','2020-03-06 14:49:18'),
	(12,'Во все тяжкие','e7bde3b075b4696925386e14ed29db0a.jpg','«Во все тяжкие» — американская телевизионная криминальная драма, транслировавшаяся с 20 января 2008 года по 29 сентября 2013 года по кабельному каналу AMC. На протяжении пяти сезонов, состоящих из 62 эпизодов, показана история Уолтера Уайта, школьного учителя, у которого диагностировали неоперабельный рак лёгких.','2020-03-06 14:50:12','2020-03-06 14:50:12'),
	(13,'Лучше звоните солу','f51d43a31a300c4d98dded501da6ba07.jpg','«Лучше звоните Солу» — американский криминально-драматический телесериал, премьера которого состоялась на канале AMC 8 февраля 2015 года. Сериал, созданный Винсом Гиллиганом и Питером Гулдом, является спин-оффом и приквелом другого сериала Гиллигана — «Во все тяжкие».','2020-03-06 14:54:45','2020-03-06 14:54:45');

/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы places
# ------------------------------------------------------------

DROP TABLE IF EXISTS `places`;

CREATE TABLE `places` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `row_id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;

INSERT INTO `places` (`id`, `row_id`, `place`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,1,3),
	(4,1,4),
	(5,1,5),
	(6,1,6),
	(7,1,7),
	(8,1,8),
	(9,1,9),
	(10,1,10),
	(11,2,1),
	(12,2,2),
	(13,2,3),
	(14,2,4),
	(15,2,5),
	(16,2,6),
	(17,2,7),
	(18,2,8),
	(19,2,9),
	(20,2,10),
	(21,3,1),
	(22,3,2),
	(23,3,3),
	(24,3,4),
	(25,3,5),
	(26,3,6),
	(27,3,7),
	(28,3,8),
	(29,3,9),
	(30,3,10),
	(31,4,1),
	(32,4,2),
	(33,4,3),
	(34,4,4),
	(35,4,5),
	(36,4,6),
	(37,4,7),
	(38,4,8),
	(39,4,9),
	(40,4,10),
	(41,5,1),
	(42,5,2),
	(43,5,3),
	(44,5,4),
	(45,5,5),
	(46,5,6),
	(47,5,7),
	(48,5,8),
	(49,5,9),
	(50,5,10);

/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы rows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rows`;

CREATE TABLE `rows` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `row` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `rows` WRITE;
/*!40000 ALTER TABLE `rows` DISABLE KEYS */;

INSERT INTO `rows` (`id`, `row`)
VALUES
	(1,1),
	(2,2),
	(3,3),
	(4,4),
	(5,5);

/*!40000 ALTER TABLE `rows` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы session_times
# ------------------------------------------------------------

DROP TABLE IF EXISTS `session_times`;

CREATE TABLE `session_times` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `session_times` WRITE;
/*!40000 ALTER TABLE `session_times` DISABLE KEYS */;

INSERT INTO `session_times` (`id`, `time`)
VALUES
	(1,'10:00:00'),
	(2,'12:00:00'),
	(3,'14:00:00'),
	(4,'16:00:00'),
	(5,'18:00:00'),
	(6,'20:00:00');

/*!40000 ALTER TABLE `session_times` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `payed` enum('true','false') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `time_id`, `client_id`, `place_id`, `film_id`, `payed`)
VALUES
	(13,1,3,1,12,'false'),
	(14,1,2,24,12,'false'),
	(15,1,2,14,12,'false'),
	(16,4,2,23,11,'false'),
	(17,6,2,26,13,'false');

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
