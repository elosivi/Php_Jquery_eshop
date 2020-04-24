-- MySQL dump 10.17  Distrib 10.3.21-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: pool_php_rush
-- ------------------------------------------------------
-- Server version	10.3.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--
CREATE DATABASE IF NOT EXISTS `pool_php_rush` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pool_php_rush`;

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'tops',NULL),(2,'jackets',NULL),(3,'jeans',NULL),(4,'hello',NULL),(5,'hello',NULL),(6,'hello',NULL),(7,'Shirts',NULL),(8,'Bra',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `picture_url` varchar(255) NOT NULL,
  `target_id` tinyint(4) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'NOSTELLE FYX BIKER HALFZIP',7995,1,'https://mosaic03.ztat.net/vgs/media/catalog-lg/GS/12/1J/08/3M/11/GS121J083-M11@13.jpg',2,'Coucou'),(2,'EASY TANK - Débardeur',2995,1,'https://img01.ztat.net/article/TH/34/1D/03/3C/11/TH341D033-C11@8.jpg?imwidth=762',2,'Je suis un product'),(3,'GYRE CUT & SEW - T-shirt imprimé',2795,1,'https://img01.ztat.net/article/GS/12/1D/0L/AH/11/GS121D0LA-H11@7.jpg?imwidth=300',2,'Le sion dans des applications de mise en page de texte, comme Aldus PageMaker.'),(4,'ESPOR HIGH - Pantalon classique',9995,3,'https://img01.ztat.net/article/GS/12/1A/0L/9K/11/GS121A0L9-K11@18.jpg?imwidth=1800',2,''),(5,'BLOSSITE HIGH - Pantalon cargo',11995,3,'https://img01.ztat.net/article/GS/12/1A/0K/1M/11/GS121A0K1-M11@29.jpg?imwidth=762',2,''),(7,'ARC SLIM - Veste en jean',13995,2,'https://img01.ztat.net/article/GS/12/1G/08/4Q/11/GS121G084-Q11@17.jpg?imwidth=762',2,''),(8,'ONLANETTA - Blazer',3669,2,'https://img01.ztat.net/article/ON/32/1G/0Z/OC/11/ON321G0ZO-C11@6.jpg?imwidth=762',2,''),(9,'Trench',5995,2,'https://img01.ztat.net/article/CA/O2/1U/02/MB/11/CAO21U02M-B11@2.1.jpg?imwidth=762',2,''),(10,'GSRAW POCKET - T-shirt imprimé\r\n',3995,1,'https://img01.ztat.net/article/GS/12/2O/0S/RA/11/GS122O0SR-A11@18.jpg?imwidth=762',1,''),(12,'PREMIUM CORE - T-shirt basique\r\n',3295,1,'https://img01.ztat.net/article/GS/12/2O/0T/5O/11/GS122O0T5-O11@30.jpg?imwidth=762',1,''),(13,'CHEST MONOGRAM - T-shirt basique',3395,1,'https://img01.ztat.net/article/C1/82/2O/08/9Q/11/C1822O089-Q11@9.jpg?imwidth=1800',1,''),(14,'ZIP KNEE - Jean slim - blue ink',14995,3,'https://img01.ztat.net/article/GS/12/2G/0Q/HK/11/GS122G0QH-K11@16.jpg?imwidth=762',1,''),(15,'5620 3D SKINNY ZIP - Jean slim',12695,3,'https://img01.ztat.net/article/GS/12/2G/0O/IK/11/GS122G0OI-K11@9.jpg?imwidth=762',1,''),(16,'AIRBLAZE 3D SKINNY - Jeans Skinny',15995,3,'https://img01.ztat.net/article/GS/12/2G/0O/LQ/11/GS122G0OL-Q11@13.jpg?imwidth=1800',1,''),(18,'MULTIPOCKET - Parka',13795,2,'https://img01.ztat.net/article/GS/12/2T/07/QN/11/GS122T07Q-N11@9.jpg?imwidth=762',1,''),(19,'SLIM - Veste en jean',9995,2,'https://img01.ztat.net/article/GS/12/2T/08/RC/11/GS122T08R-C11@17.jpg?imwidth=762',1,''),(20,'JEWESTERN SHERIDAN - Chemise',2995,1,'https://img01.ztat.net/article/JA/N2/4I/00/8K/11/JAN24I008-K11@7.jpg?imwidth=762',4,''),(21,'BIG TREFOIL - T-shirt',1995,1,'https://img01.ztat.net/article/AD/12/6G/02/QK/11/AD126G02Q-K11@20.jpg?imwidth=762&filter=packshot',3,''),(22,'T-shirt imprimé',2495,1,'https://img01.ztat.net/article/AD/12/6G/02/TQ/11/AD126G02T-Q11@7.jpg?imwidth=1800',3,''),(23,'Veste en jean',2995,2,'https://img01.ztat.net/article/OV/02/3L/07/6K/11/OV023L076-K11@8.jpg?imwidth=762&filter=packshot',3,''),(24,'NKFMELLEN - Veste en similicuir',3995,2,'https://img01.ztat.net/article/NA/82/3L/0G/PJ/11/NA823L0GP-J11@2.jpg?imwidth=762&filter=packshot',3,''),(25,'TORCA TASLON - Blouson Bomber',4995,2,'https://img01.ztat.net/article/C7/42/4L/02/PK/11/C7424L02P-K11@13.jpg?imwidth=1800',3,''),(26,'SPORTSWEAR LOGO TEE',2195,1,'https://img01.ztat.net/article/LE/22/4G/08/HK/11/LE224G08H-K11@7.jpg?imwidth=762',3,''),(27,'Pantalon cargo',4995,3,'https://img01.ztat.net/article/JA/N2/4B/00/3N/11/JAN24B003-N11@6.jpg?imwidth=762&filter=packshot',3,''),(28,'Jeans Skinny',2995,3,'https://img01.ztat.net/article/JA/N2/4A/00/7K/11/JAN24A007-K11@17.1.jpg?imwidth=1800',3,''),(29,'Jeans Skinny F',2995,3,'https://img01.ztat.net/article/KI/J2/3A/00/RK/11/KIJ23A00R-K11@8.jpg?imwidth=762&filter=packshot',3,''),(30,'Veste en similicuir',6995,2,'https://img01.ztat.net/article/FI/02/2T/01/8B/11/FI022T018-B11@8.jpg?imwidth=762',1,''),(34,'CRUSADE - Pantalon lamo',5555,3,'https://img01.ztat.net/article/PE/12/1A/0F/9M/11/PE121A0F9-M11@4.jpg?imwidth=762',2,'Hyper cool et moins cher !'),(35,'CRUSADE - Pantalon moins cher',3499,3,'https://img01.ztat.net/article/PE/12/1A/0F/9M/11/PE121A0F9-M11@4.jpg?imwidth=762',2,'Le pantalon est moin cher'),(37,'CRUSADE - Pantalon moins cher',3499,3,'https://img01.ztat.net/article/PE/12/1A/0F/9M/11/PE121A0F9-M11@4.jpg?imwidth=762',2,'Le pantalon est moin cher'),(38,'aze',3344,2,'https://img01.ztat.net/article/PE/12/1A/0F/9M/11/PE121A0F9-M11@4.jpg?imwidth=762',2,'&Ã©\"');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `targets`
--

DROP TABLE IF EXISTS `targets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `targets` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `picture_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `targets`
--

LOCK TABLES `targets` WRITE;
/*!40000 ALTER TABLE `targets` DISABLE KEYS */;
INSERT INTO `targets` VALUES (1,'men','https://s1.1zoom.me/big0/247/Men_Gray_background_Glance_Formal_shirt_Suit_567120_1280x895.jpg'),(2,'women','https://www.wallpaperup.com/uploads/wallpapers/2014/03/17/300621/ffbbd159d52bcf9720cb3511208a9d69-700.jpg'),(3,'kids','https://mosaic03.ztat.net/tdz/landing/spring_2019/d-kids2.jpg');
/*!40000 ALTER TABLE `targets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `secret_question` varchar(40) NOT NULL,
  `answer` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'laura','$2y$10$DyDn866hMSKwo5TzX1RkLe6JFBgUWm3GL2v7l/BitEj960YWiUN6G','email@wanadoo.fr',NULL,'',''),(3,'laura','$2y$10$HccU3U8X.v3sbDBesIAv9eFizrrPgBdkIMLWxs7ihbA1akTyC5wAK','laura.baudean@wanadoo.fr',NULL,'',''),(5,'paul','$2y$10$PFXwH8.AY9t9IcTxtMi16eD.a/37slfVTY32tCHobxv26GEkbG62u','paul@paul.com',NULL,'',''),(6,'vincent','$2y$10$lUpwqK01CeojHEYVtRFTZuSh/Zix21Jp/PHfoL865jP8LtFIg8aBS','email@wanadoo.fre',NULL,'',''),(7,'vincent','$2y$10$yZCtBIuB3GWT7TIXFejSwe8LFM69rafjja/TxMSy7fRCTnaYuUV7a','vincent@gmail.com',NULL,'',''),(8,'tristan','$2y$10$qb88HrGEo01fR9NNjioxLOSIHqKyCg8gUVjarkifuNkFfjwxcJU6S','tristan@tristan.com',0,'',''),(11,'aze','$2y$10$k6w7ayvMU0tY2tS2pjFOZuMT27ZIjNShE3ZnXKSeGXCKSW7o6wZma','aze@aze.com',1,'',''),(12,'admin','$2y$10$966vOgH5gexnVKk4j8leM.Sq0KSwoNA794eXFtRrW/rDa3oWocCm6','admin@admin.com',1,'',''),(13,'Tristan','$2y$10$1AwQZW7Fa9Xq252hHn0PsON/33y2xUnzQYCdJScZYbKPTBHkiUk.G','Tristan.zenone@gmail.com',NULL,'Oui ?','Non'),(16,'oui','oui','oui@oui.com',0,'oui','oui'),(19,'admin1','admin','admin1@admin.com',1,'Question','Answer'),(21,'admin2','$2y$10$MN3ahBBv.Z2yVuIMX3jXruxws.v4cGo8wpkPUo8SMCsjmG4ZLgFdS','admin2@admin.com',1,'Question','Answer'),(22,'test','$2y$10$Su./nf6DrySiUxofBvVD7..rLXKb5acnct5qasU2Tf35TNM8AIxLy','test@test.com',0,'Question','Answer'),(23,'val','$2y$10$T7MN/yeR5WwZf16CliyuhufcSH4Rq7xyjbDXdxfAh7tbtz.k5mrAe','val@val.com',NULL,'Oui ?','non');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-17 12:12:57
