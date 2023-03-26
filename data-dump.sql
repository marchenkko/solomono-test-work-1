-- MySQL dump 10.13  Distrib 8.0.32, for macos12.6 (arm64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Phone'),(2,'Laptop'),(3,'TV'),(4,'Smart Watches');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,'aIphone 11',200000.00,'2023-03-15 22:00:00'),(5,1,'fIphone 12',2400.00,'2023-03-20 22:00:00'),(6,1,'cIphone 13',32473243.00,'2023-03-22 22:00:00'),(7,1,'bIphone 14',24.00,'2023-03-24 22:00:00'),(8,1,'dIphone 14 pro',111.00,'2023-03-24 22:00:00'),(9,2,'Apple MacBook Pro',55000.00,'2023-03-27 21:00:00'),(10,2,'Ноутбук Lenovo IdeaPad 5 Pro ',35000.00,'2023-03-20 22:00:00'),(11,2,'Ноутбук ASUS Laptop X515JA-BR3971W ',18500.00,'2023-03-20 22:00:00'),(12,2,'Ноутбук Apple MacBook Air 13.6\" M2 512GB 2022 ',76200.00,'2023-03-30 21:00:00'),(13,2,'Ноутбук Apple MacBook Pro 16\" M2 Max 1TB 2023 ',180000.00,'2023-03-31 21:00:00'),(14,3,'Телевизор Samsung QE50Q60BAUXUA',23600.00,'2023-03-27 21:00:00'),(15,3,'Телевизор LG OLED55C24LA',68100.00,'2023-03-19 22:00:00'),(16,4,'Смарт-часы Amazfit T-Rex 2 Wild Green (955553)',8800.00,'2023-03-23 22:00:00'),(17,3,'Телевизор LG 32LQ63006LA',11999.00,'2023-03-19 22:00:00'),(18,3,'Телевизор Philips 50PUS8507/12',27800.00,'2023-03-13 22:00:00'),(19,4,'Смарт-часы Samsung Galaxy Watch 5 44mm ',10200.00,'2023-03-14 22:00:00'),(20,4,'Смарт-часы Apple Watch SE (2022) GPS 40mm ',12300.00,'2023-03-13 22:00:00'),(21,4,'Смарт-часы Apple Watch Ultra GPS + Cellular 49mm ',36500.00,'2023-03-15 22:00:00');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-26 19:24:31
