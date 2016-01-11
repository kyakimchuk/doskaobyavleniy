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
-- Dumping data for table doskaobyavl.ads: ~2 rows (приблизно)
/*!40000 ALTER TABLE `ads` DISABLE KEYS */;
INSERT INTO `ads` (`id_ad`, `title`, `message`, `type_id`, `category_id`, `cost`, `img`, `email`, `create_data`) VALUES
	(34, 'ав', 'ав njkbk jk', 2, 1, 43, '1452507311.jpg', 'ggg@mail.ru', '2016-01-11 12:15:11'),
	(35, 'у', 'hj hk', 3, 3, 5, 'nophoto.jpg', 'hhh@yandex.ua', '2016-01-11 12:16:49');
/*!40000 ALTER TABLE `ads` ENABLE KEYS */;

-- Dumping data for table doskaobyavl.categories: ~6 rows (приблизно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id_category`, `name`, `description`) VALUES
	(1, 'Animals', NULL),
	(2, 'Services', NULL),
	(3, 'Immovables', NULL),
	(4, 'Appliances', NULL),
	(5, 'Clothes', NULL),
	(6, 'Job', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping data for table doskaobyavl.memberlist: ~3 rows (приблизно)
/*!40000 ALTER TABLE `memberlist` DISABLE KEYS */;
INSERT INTO `memberlist` (`login`, `pass`, `name`, `surname`, `email`, `id_member`) VALUES
	('1', 'c81e728d9d4c2f636f067f89cc14862c', '3', '4', '5', 16),
	('2', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '4', '5', '6', 17),
	('3', 'c81e728d9d4c2f636f067f89cc14862c', '3', '3', '2', 18);
/*!40000 ALTER TABLE `memberlist` ENABLE KEYS */;

-- Dumping data for table doskaobyavl.types: ~4 rows (приблизно)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id_type`, `name`) VALUES
	(2, 'Rent'),
	(3, 'Lease'),
	(4, 'Buy'),
	(5, 'Swop');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
