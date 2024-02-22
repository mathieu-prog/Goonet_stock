-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: goonet_stock_db
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Current Database: `goonet_stock_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `goonet_stock_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `goonet_stock_db`;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(100) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(100) NOT NULL,
  `prenom_client` varchar(100) NOT NULL,
  `societe_client` varchar(100) NOT NULL,
  `tel_client` varchar(20) NOT NULL,
  `adresse_client` varchar(255) NOT NULL,
  `bp_client` double NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entree`
--

DROP TABLE IF EXISTS `entree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entree` (
  `id_entree` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_type_stock_source` int(11) NOT NULL,
  `id_type_stock_dest` int(11) NOT NULL,
  `quantite` double NOT NULL,
  `pa_article` double NOT NULL,
  `id_source` int(11) DEFAULT NULL,
  `id_destination` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `date_entree` datetime NOT NULL DEFAULT current_timestamp(),
  `etat` varchar(20) NOT NULL DEFAULT 'non payé',
  PRIMARY KEY (`id_entree`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entree`
--

LOCK TABLES `entree` WRITE;
/*!40000 ALTER TABLE `entree` DISABLE KEYS */;
/*!40000 ALTER TABLE `entree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fournisseur` varchar(100) NOT NULL,
  `prenom_fournisseur` varchar(100) NOT NULL,
  `societe_fournisseur` varchar(100) DEFAULT NULL,
  `tel_fournisseur` varchar(100) NOT NULL,
  `adresse_fournisseur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fournisseur`
--

LOCK TABLES `fournisseur` WRITE;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
/*!40000 ALTER TABLE `fournisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sorties`
--

DROP TABLE IF EXISTS `sorties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sorties` (
  `id_sortie` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_type_stock_source` int(11) NOT NULL,
  `id_type_stock_dest` int(11) NOT NULL,
  `quantite` double NOT NULL,
  `id_source` int(11) DEFAULT NULL,
  `id_destination` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `date_sortie` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_sortie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sorties`
--

LOCK TABLES `sorties` WRITE;
/*!40000 ALTER TABLE `sorties` DISABLE KEYS */;
/*!40000 ALTER TABLE `sorties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_stock`
--

DROP TABLE IF EXISTS `type_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_stock` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_stock`
--

LOCK TABLES `type_stock` WRITE;
/*!40000 ALTER TABLE `type_stock` DISABLE KEYS */;
INSERT INTO `type_stock` VALUES (1,'Stock principal'),(2,'Stock client'),(3,'Stock périmé'),(4,'Fournisseur');
/*!40000 ALTER TABLE `type_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name_user` varchar(40) NOT NULL,
  `last_name_user` varchar(40) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `gender_user` varchar(1) NOT NULL,
  `password` varchar(60) NOT NULL,
  `picture_user` varchar(255) DEFAULT NULL,
  `state_user` varchar(20) NOT NULL DEFAULT 'offline',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Irumva','Shalom','irumvashalom@gmail.com','m','944d072a7c899b7933ac8d81668e0b3b9e63f28f',NULL,'online'),(2,'NSABIYUMVA','Mathieu','nsabiyumvamathieu@gmail.com','m','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',NULL,'online'),(3,'Arakaza','Axcel','arakaza@gmail.com','m','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',NULL,'offline');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-12 10:20:55
