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

-- Dumping structure for table final_project_webdev.prof_img
CREATE TABLE IF NOT EXISTS `prof_img` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prof_img_user1_idx1` (`user_id`),
  CONSTRAINT `fk_prof_img_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.prof_img: ~3 rows (approximately)
/*!40000 ALTER TABLE `prof_img` DISABLE KEYS */;
INSERT INTO `prof_img` (`id`, `code`, `user_id`) VALUES
	(1, 'resources//profpic//6360e0088d3f6yang-wewe-JjrP8j-v_Jg-unsplash.jpg', 0),
	(2, 'resources//profpic//6360e89faed9btesla-cybertruck-concept-cars-3840x2400-882.jpg', 0),
	(3, 'resources//profpic//6360fb8ec573cclownfish-aquarium-underwater-3840x2400-42.jpg', 0);
/*!40000 ALTER TABLE `prof_img` ENABLE KEYS */;

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
	(4, 'Hashan Edited', 'lakruwan', 'hashan.lakruwan2020@gmail.com', '0771433565', '123123123', '2022-11-01 16:11:29', 1, 'HASH_6360fabb31d49', 2);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table final_project_webdev.user_has_address: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` (`id`, `line1`, `line2`, `city`, `postal_code`, `user_id`) VALUES
	(1, '483', 'Dadugama', 'Ja Ela', '11350', 0),
	(2, '457', 'Kadirana', 'Negombo', '11350', 0),
	(3, '78', 'asad', 'asdas', '11350', 0),
	(4, '483', 'Dadugama', 'JaEla', '11350', 4);
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
