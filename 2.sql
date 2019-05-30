-- --------------------------------------------------------
-- Хост:                         192.168.88.21
-- Версия сервера:               5.6.41 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных test_samson
CREATE DATABASE IF NOT EXISTS `test_samson` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test_samson`;

-- Дамп структуры для таблица test_samson.a_category
CREATE TABLE IF NOT EXISTS `a_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_category` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_samson.a_category: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `a_category` DISABLE KEYS */;
INSERT INTO `a_category` (`id`, `code_category`, `name_category`, `parent_id`) VALUES
	(132, 2, 'Бумага', NULL),
	(133, 3, 'Принтеры', NULL),
	(134, 3134, 'МФУ', 133),
	(135, 3135, 'супер', 134);
/*!40000 ALTER TABLE `a_category` ENABLE KEYS */;

-- Дамп структуры для таблица test_samson.a_price
CREATE TABLE IF NOT EXISTS `a_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `id_product` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_price` (`id_product`),
  CONSTRAINT `product_price` FOREIGN KEY (`id_product`) REFERENCES `a_product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=470 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_samson.a_price: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `a_price` DISABLE KEYS */;
INSERT INTO `a_price` (`id`, `type`, `price`, `id_product`) VALUES
	(462, 'Базовая', 11.5, 301),
	(463, 'Москва', 12.5, 301),
	(464, 'Базовая', 18.5, 302),
	(465, 'Москва', 22.5, 302),
	(466, 'Базовая', 3010, 303),
	(467, 'Москва', 3500, 303),
	(468, 'Базовая', 3310, 304),
	(469, 'Москва', 2999, 304);
/*!40000 ALTER TABLE `a_price` ENABLE KEYS */;

-- Дамп структуры для таблица test_samson.a_product
CREATE TABLE IF NOT EXISTS `a_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_samson.a_product: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `a_product` DISABLE KEYS */;
INSERT INTO `a_product` (`id`, `code`, `name`) VALUES
	(301, 201, 'Бумага А4'),
	(302, 202, 'Бумага А3'),
	(303, 302, 'Принтер Canon'),
	(304, 305, 'Принтер HP');
/*!40000 ALTER TABLE `a_product` ENABLE KEYS */;

-- Дамп структуры для таблица test_samson.a_property
CREATE TABLE IF NOT EXISTS `a_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_property` (`id_product`),
  CONSTRAINT `product_property` FOREIGN KEY (`id_product`) REFERENCES `a_product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=520 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_samson.a_property: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `a_property` DISABLE KEYS */;
INSERT INTO `a_property` (`id`, `id_product`, `value`) VALUES
	(511, 301, 'Плотность - 100'),
	(512, 301, 'Белизна - 150'),
	(513, 302, 'Плотность - 90'),
	(514, 302, 'Белизна - 100'),
	(515, 303, 'Формат - A4'),
	(516, 303, 'Формат - A3'),
	(517, 303, 'Тип - Лазерный'),
	(518, 304, 'Формат - A3'),
	(519, 304, 'Тип - Лазерный');
/*!40000 ALTER TABLE `a_property` ENABLE KEYS */;

-- Дамп структуры для таблица test_samson.category_product
CREATE TABLE IF NOT EXISTS `category_product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  KEY `category` (`id_category`),
  KEY `id_product_id_category` (`id_product`),
  CONSTRAINT `category` FOREIGN KEY (`id_category`) REFERENCES `a_category` (`id`),
  CONSTRAINT `product` FOREIGN KEY (`id_product`) REFERENCES `a_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы test_samson.category_product: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;
INSERT INTO `category_product` (`id_product`, `id_category`) VALUES
	(301, 132),
	(302, 132),
	(303, 133),
	(303, 134),
	(304, 133),
	(304, 134),
	(304, 135);
/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
