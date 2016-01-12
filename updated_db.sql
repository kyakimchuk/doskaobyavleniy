-- --------------------------------------------------------
-- Сервер:                       127.0.0.1
-- Версія сервера:               5.5.45 - MySQL Community Server (GPL)
-- ОС сервера:                   Win32
-- HeidiSQL Версія:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for doskaobyavl
CREATE DATABASE IF NOT EXISTS `doskaobyavl` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `doskaobyavl`;


-- Dumping structure for таблиця doskaobyavl.ads
CREATE TABLE IF NOT EXISTS `ads` (
  `id_ad` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL DEFAULT '0',
  `img` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `create_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ad`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- Dumping data for table doskaobyavl.ads: ~4 rows (приблизно)
/*!40000 ALTER TABLE `ads` DISABLE KEYS */;
INSERT INTO `ads` (`id_ad`, `title`, `message`, `type_id`, `category_id`, `cost`, `img`, `email`, `create_data`) VALUES
	(38, 'Tiger Zhorik, 5 months', 'Zhorik looking for a home! The kid is healthy, vaccinated (have a passport). Eats dry food. Playful, active, affectionate, curious.', 6, 1, 0, '1452608463.jpg', 'brianmolko@gmail.com', '2016-01-12 16:21:03'),
	(39, 'Apartments in Arcadia', 'Apartment in Arcadia in a quiet gated complex with a protected area, a gym, a billiard room, home theater, its own autonomous boiler rooms, terrace, large bathroom with walk-in closets.', 7, 3, 600000, '1452609448.jpg', 'brianmolko@gmail.com', '2016-01-12 16:37:28'),
	(40, 'Group need a guitarist', 'Our musical group need another one guitarist.', 6, 6, 2000, '1452611231.jpg', 'matthewbellamy@gmail.com', '2016-01-12 17:07:11'),
	(41, 'My guitar', 'Selling my old guitar', 7, 7, 3500, '1452123455.jpg', 'matthewbellamy@gmail.com', '2016-01-12 17:13:02');
/*!40000 ALTER TABLE `ads` ENABLE KEYS */;


-- Dumping structure for таблиця doskaobyavl.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table doskaobyavl.categories: ~7 rows (приблизно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id_category`, `name`, `description`) VALUES
	(1, 'Animals', NULL),
	(2, 'Services', NULL),
	(3, 'Immovables', NULL),
	(4, 'Appliances', NULL),
	(5, 'Clothes', NULL),
	(6, 'Job', NULL),
	(7, 'Electronics', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for таблиця doskaobyavl.memberlist
CREATE TABLE IF NOT EXISTS `memberlist` (
  `login` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Dumping data for table doskaobyavl.memberlist: ~3 rows (приблизно)
/*!40000 ALTER TABLE `memberlist` DISABLE KEYS */;
INSERT INTO `memberlist` (`login`, `pass`, `name`, `surname`, `email`, `id_member`) VALUES
	('first_user', 'c81e728d9d4c2f636f067f89cc14862c', 'Brian', 'Molko', 'brianmolko@gmail.com', 24),
	('second_user', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Matthew', 'Bellamy', 'matthewbellamy@gmail.com', 25),
	('third_user', 'a87ff679a2f3e71d9181a67b7542122c', 'Chester', 'Bennington', 'chesterbennington@gmail.com', 26);
/*!40000 ALTER TABLE `memberlist` ENABLE KEYS */;


-- Dumping structure for таблиця doskaobyavl.types
CREATE TABLE IF NOT EXISTS `types` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table doskaobyavl.types: ~6 rows (приблизно)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id_type`, `name`) VALUES
	(2, 'Rent'),
	(3, 'Lease'),
	(4, 'Buy'),
	(5, 'Swop'),
	(6, 'Give'),
	(7, 'Realization');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
