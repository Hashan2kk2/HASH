-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.26 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for final_project_webdev
CREATE DATABASE IF NOT EXISTS `final_project_webdev` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `final_project_webdev`;

-- Dumping structure for table final_project_webdev.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.brand: ~9 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `name`) VALUES
	(1, 'Nike'),
	(2, 'Adidas'),
	(3, 'New Balance'),
	(4, 'Puma'),
	(5, 'Converse'),
	(6, 'Reebok'),
	(7, 'Under Armour'),
	(8, 'Fila'),
	(9, 'Athleta'),
	(10, 'Lululemon');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.category: ~4 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Business Attire'),
	(2, 'Casual Wear'),
	(3, 'Formal Waer'),
	(4, 'Sports Wear'),
	(5, 'Childrens Wear');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.color: ~6 rows (approximately)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` (`id`, `name`) VALUES
	(1, 'Blue'),
	(2, 'Gray'),
	(3, 'Green'),
	(4, 'Yellow'),
	(5, 'Black'),
	(6, 'Red'),
	(7, 'Orange');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.gender: ~2 rows (approximately)
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` (`id`, `name`) VALUES
	(1, 'Male'),
	(2, 'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  `product_id` int NOT NULL,
  `img_no` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.images: ~36 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `code`, `product_id`, `img_no`) VALUES
	(33, '..//resources//product_img//63bb315ad6fdamacos-catalina-mountains-island-daytime-stock-5k-6016x6016-188.jpg', 14, 1),
	(34, '..//resources//product_img//63bb315ad6fdemacos-catalina-mountains-island-morning-foggy-stock-5k-6016x6016-4019.jpg', 14, 2),
	(35, '..//resources//product_img//63bb315ad6fdfmacos-catalina-mountains-island-night-stock-5k-6016x6016-189.jpg', 14, 3),
	(36, '..//resources//product_img//63bb315ad6fe0macos-catalina-mountains-island-sunny-day-stock-5k-6016x6016-4013.jpg', 14, 4),
	(37, '..//resources//product_img//63bb3184e7d84macos-catalina-mountains-island-daytime-stock-5k-6016x6016-188.jpg', 15, 1),
	(38, '..//resources//product_img//63bb3184e7d87macos-catalina-mountains-island-morning-foggy-stock-5k-6016x6016-4019.jpg', 15, 2),
	(39, '..//resources//product_img//63bb3184e7d88macos-catalina-mountains-island-night-stock-5k-6016x6016-189.jpg', 15, 3),
	(40, '..//resources//product_img//63bb3184e7d89macos-catalina-mountains-island-sunny-day-stock-5k-6016x6016-4013.jpg', 15, 4),
	(41, '..//resources//product_img//63bb31972d142macos-catalina-mountains-island-daytime-stock-5k-6016x6016-188.jpg', 16, 1),
	(42, '..//resources//product_img//63bb31972d145macos-catalina-mountains-island-morning-foggy-stock-5k-6016x6016-4019.jpg', 16, 2),
	(43, '..//resources//product_img//63bb31972d146macos-catalina-mountains-island-night-stock-5k-6016x6016-189.jpg', 16, 3),
	(44, '..//resources//product_img//63bb31972d147macos-catalina-mountains-island-sunny-day-stock-5k-6016x6016-4013.jpg', 16, 4),
	(45, '..//resources//product_img//63bb31b3815b9macos-catalina-mountains-island-daytime-stock-5k-6016x6016-188.jpg', 17, 1),
	(46, '..//resources//product_img//63bb31b3815bbmacos-catalina-mountains-island-morning-foggy-stock-5k-6016x6016-4019.jpg', 17, 2),
	(47, '..//resources//product_img//63bb31b3815bcmacos-catalina-mountains-island-night-stock-5k-6016x6016-189.jpg', 17, 3),
	(48, '..//resources//product_img//63bb31b3815bdmacos-catalina-mountains-island-sunny-day-stock-5k-6016x6016-4013.jpg', 17, 4),
	(49, '..//resources//product_img//63bb3457b5260adidas.jpg', 18, 1),
	(50, '..//resources//product_img//63bb3457b5263adidas2.jpg', 18, 2),
	(51, '..//resources//product_img//63bb3457b5264adidas3.jpg', 18, 3),
	(52, '..//resources//product_img//63bb3457b5265adidas4.jpg', 18, 4),
	(53, '..//resources//product_img//63bb34b60497cadidas4.jpg', 19, 1),
	(54, '..//resources//product_img//63bb34b60497fadidas3.jpg', 19, 2),
	(55, '..//resources//product_img//63bb34b604980adidas2.jpg', 19, 3),
	(56, '..//resources//product_img//63bb34b604981adidas.jpg', 19, 4),
	(57, '..//resources//product_img//63bb37e7c9766trio21.jpg', 20, 1),
	(58, '..//resources//product_img//63bb37e7c9769trio22.jpg', 20, 2),
	(59, '..//resources//product_img//63bb37e7c976atrio23.jpg', 20, 3),
	(60, '..//resources//product_img//63bb37e7c976btrio24.jpg', 20, 4),
	(61, '..//resources//product_img//63bb387a816ectrio24.jpg', 21, 1),
	(62, '..//resources//product_img//63bb387a816eftrio23.jpg', 21, 2),
	(63, '..//resources//product_img//63bb387a816f0trio22.jpg', 21, 3),
	(64, '..//resources//product_img//63bb387a816f1trio21.jpg', 21, 4),
	(65, '..//resources//product_img//63bb38bc44df5trio23.jpg', 22, 1),
	(66, '..//resources//product_img//63bb38bc44df8trio24.jpg', 22, 2),
	(67, '..//resources//product_img//63bb38bc44df9trio21.jpg', 22, 3),
	(68, '..//resources//product_img//63bb38bc44dfatrio22.jpg', 22, 4),
	(69, '..//resources//product_img//63bc122655a0fwallpaperflare.com_wallpaper(2).jpg', 25, 1),
	(70, '..//resources//product_img//63bc122655a19ice-caves-frozen-glacier-mendenhall-glacier-underwater-7000x3653-5424.jpg', 25, 2),
	(71, '..//resources//product_img//63bc122655a1aiphone-background-nature.jpg', 25, 3),
	(72, '..//resources//product_img//63bc122655a1bisolated-black-t-shirt-model-front-view.jpg', 25, 4);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `qty` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_user1_idx` (`user_id`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.invoice: ~0 rows (approximately)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `order_id`, `user_id`, `product_id`, `date`, `total`, `qty`, `status`) VALUES
	(1, '41245', 3, 21, '2023-01-09 05:13:53', 14000, 2, 1);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `qty` int NOT NULL,
  `description` text NOT NULL,
  `productName` varchar(45) NOT NULL,
  `date_added` date NOT NULL,
  `delivery_fee` double NOT NULL,
  `user_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `status_id` int NOT NULL,
  `type_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_user1_idx` (`user_id`),
  KEY `fk_product_brand1_idx` (`brand_id`),
  KEY `fk_product_type1_idx` (`type_id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  CONSTRAINT `fk_product_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_product_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`),
  CONSTRAINT `fk_product_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.product: ~11 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `price`, `qty`, `description`, `productName`, `date_added`, `delivery_fee`, `user_id`, `brand_id`, `status_id`, `type_id`, `category_id`) VALUES
	(11, 123, 123, 'qwe', '123', '2022-03-12', 123, 4, 2, 1, 3, 1),
	(12, 123, 123, 'this is the description', 'Product 01', '2023-02-01', 123, 4, 2, 1, 2, 1),
	(13, 123, 123, 'Product 2 with images', 'Product 2 with images', '2023-01-04', 123, 4, 1, 1, 1, 1),
	(14, 1000, 21, 'wallpapers update', 'Mac Os', '2023-01-04', 500, 4, 1, 1, 1, 1),
	(15, 123, 123, 'Product 3 with images', 'Product 3 with images', '2023-01-04', 123, 4, 1, 1, 1, 1),
	(16, 123, 123, 'Product 3 with images', 'Product 4 with images', '2023-01-04', 123, 4, 1, 1, 1, 1),
	(17, 123, 123, 'Product 5 with images', 'Product 5 with images', '2023-01-04', 123, 4, 1, 1, 1, 1),
	(18, 8500, 25, 'Tiro 21 Track Jacket', 'Tiro 21 Track Jacket', '2023-01-10', 1000, 4, 2, 1, 2, 4),
	(19, 321, 32, 'Tiro 21 Track Jacket', 'Tiro 21 Track Jacket', '2023-01-26', 321, 4, 2, 1, 2, 4),
	(20, 6700, 84, 'Tiro 21 Training Jersey', 'Tiro 21 Training Jersey', '2023-02-03', 750, 4, 2, 1, 2, 4),
	(21, 14500, 24, 'Tiro 21 Training Jersey', 'Tiro 21 Training Jersey', '2023-04-05', 1500, 4, 2, 1, 2, 4),
	(22, 1234, 45, 'Tiro 21 Training Jersey', 'Tiro 21 Training Jersey', '2023-05-20', 3214, 4, 5, 1, 1, 1),
	(23, 1231, 32, 'adasda', 'test prod', '2023-01-18', 123, 4, 5, 1, 2, 1),
	(24, 1231, 32, 'adasda', 'test prod', '2023-01-18', 123, 4, 5, 1, 2, 1),
	(25, 1231, 32, 'adasda', 'test prod update', '2023-01-18', 123, 4, 5, 1, 2, 1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.prof_img
CREATE TABLE IF NOT EXISTS `prof_img` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prof_img_user1_idx1` (`user_id`),
  CONSTRAINT `fk_prof_img_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.prof_img: ~0 rows (approximately)
/*!40000 ALTER TABLE `prof_img` DISABLE KEYS */;
INSERT INTO `prof_img` (`id`, `code`, `user_id`) VALUES
	(6, '..//resources//profpic//63bc57c587bdfmicrosoft-surface-3840x2638-9237.png', 4);
/*!40000 ALTER TABLE `prof_img` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.size
CREATE TABLE IF NOT EXISTS `size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.size: ~4 rows (approximately)
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` (`id`, `name`) VALUES
	(1, 'Small'),
	(2, 'Medium'),
	(3, 'Large'),
	(4, 'Extra Large');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.status: ~2 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Available'),
	(2, 'Unavailable');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.type
CREATE TABLE IF NOT EXISTS `type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.type: ~2 rows (approximately)
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` (`id`, `name`) VALUES
	(1, 'Kids'),
	(2, 'Men'),
	(3, 'Woman');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `register_date` datetime NOT NULL,
  `gender_id` int NOT NULL,
  `verification_code` varchar(50) DEFAULT NULL,
  `user_type_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_gender_idx` (`gender_id`),
  KEY `fk_user_user_type1_idx1` (`user_type_id`),
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_user_user_type1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `contact_number`, `password`, `register_date`, `gender_id`, `verification_code`, `user_type_id`) VALUES
	(2, 'Hashan', 'Lakruwan', 'hashan@gmail.com', '0771433565', '12345', '2022-08-24 18:11:25', 1, 'HASH_6341913fcf5bd', 1),
	(3, 'User', 'test', 'test@gmail.com', '0757769990', 'test20020311', '2022-10-30 12:15:39', 1, 'HASH_636008deee7bd', 1),
	(4, 'B A Hashan', 'Lakruwan', 'hashan.lakruwan2020@gmail.com', '0771433565', 'Hashan123321123', '2022-11-01 16:11:29', 1, 'HASH_6360fabb31d49', 2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` varchar(45) NOT NULL,
  `line2` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `postal_code` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_user1_idx1` (`user_id`),
  CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.user_has_address: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` (`id`, `line1`, `line2`, `city`, `postal_code`, `user_id`) VALUES
	(1, '483', 'Dadugama', 'Ja Ela', '11350', 0),
	(2, '457', 'Kadirana', 'Negombo', '11350', 0),
	(3, '78', 'asad', 'asdas', '11350', 0),
	(4, '483', 'Dadugama', 'JaEla', '11350', 4),
	(5, '438', 'Dadugama', 'Ja Ela', '11350', 3);
/*!40000 ALTER TABLE `user_has_address` ENABLE KEYS */;

-- Dumping structure for table final_project_webdev.user_type
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.user_type: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` (`id`, `name`) VALUES
	(1, 'customer'),
	(2, 'admin');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
