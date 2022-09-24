-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: zakatfitrah
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
-- Table structure for table `bayarzakat`
--

DROP TABLE IF EXISTS `bayarzakat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bayarzakat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kk` varchar(255) NOT NULL,
  `jumlah_tanggungan` varchar(255) NOT NULL,
  `jenis_bayar` varchar(255) NOT NULL,
  `jumlah_tanggunganyangdibayar` varchar(255) NOT NULL,
  `bayar_beras` varchar(255) NOT NULL,
  `bayar_uang` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bayarzakat`
--

LOCK TABLES `bayarzakat` WRITE;
/*!40000 ALTER TABLE `bayarzakat` DISABLE KEYS */;
INSERT INTO `bayarzakat` VALUES (2,'Indra ','5','uang','3','0','Rp. 90000'),(3,'Agus ','3','beras','3','7.5 Kg','0'),(4,'Bambang ','5','uang','4','0','Rp. 120000'),(6,'Budi ','3','beras','2','5 Kg','0');
/*!40000 ALTER TABLE `bayarzakat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_mustahik`
--

DROP TABLE IF EXISTS `kategori_mustahik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_mustahik` (
  `id_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `jumlah_hak` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_mustahik`
--

LOCK TABLES `kategori_mustahik` WRITE;
/*!40000 ALTER TABLE `kategori_mustahik` DISABLE KEYS */;
INSERT INTO `kategori_mustahik` VALUES (1,'Fakir','6'),(2,'Fakir 1','21 kg'),(6,'Fakir 2','16 kg'),(7,'Miskin 1','8 kg'),(8,'Miskin 2 ','6 kg'),(9,'Fisabilillah (ustad)','3 kg'),(10,'Fisabilillah (santri)','3 kg'),(11,'Mampu','4 kg'),(13,'Lainnya','4 kg');
/*!40000 ALTER TABLE `kategori_mustahik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kepala_keluarga`
--

DROP TABLE IF EXISTS `kepala_keluarga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kepala_keluarga` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `NIK` int(255) NOT NULL,
  `nama_kk` varchar(255) NOT NULL,
  `jumlah_anggota_kk` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `muzakki` tinyint(1) NOT NULL,
  `bayarzakat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kepala_keluarga`
--

LOCK TABLES `kepala_keluarga` WRITE;
/*!40000 ALTER TABLE `kepala_keluarga` DISABLE KEYS */;
INSERT INTO `kepala_keluarga` VALUES (2,1234,'Indra',5,'warga tetap',1,1),(3,2222,'Agus',3,'warga tetap',1,1),(4,1243445,'Bambang',5,'warga tetap',1,1),(6,121212,'Budi',3,'warga tetap',1,1),(12,123,'Yudi',5,'warga tetap',0,0);
/*!40000 ALTER TABLE `kepala_keluarga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mustahik_lainnya`
--

DROP TABLE IF EXISTS `mustahik_lainnya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mustahik_lainnya` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `hak` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mustahik_lainnya`
--

LOCK TABLES `mustahik_lainnya` WRITE;
/*!40000 ALTER TABLE `mustahik_lainnya` DISABLE KEYS */;
INSERT INTO `mustahik_lainnya` VALUES (1,'Bayu','Amilin','10 Kg'),(3,'Udin','Fisabilillah','3 Kg'),(4,'Yuki','Mualaf','4 Kg'),(5,'Jono','Ibnu Sabil','4 Kg'),(10,'Nobita','Fisabilillah','3 Kg'),(11,'Nobara','Amilin','10 Kg'),(12,'Anya','Ibnu Sabil','4 Kg');
/*!40000 ALTER TABLE `mustahik_lainnya` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mustahik_warga`
--

DROP TABLE IF EXISTS `mustahik_warga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mustahik_warga` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `hak` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mustahik_warga`
--

LOCK TABLES `mustahik_warga` WRITE;
/*!40000 ALTER TABLE `mustahik_warga` DISABLE KEYS */;
INSERT INTO `mustahik_warga` VALUES (4,'Dinda','Miskin','8 Kg'),(5,'Dodi','Mampu','4 Kg'),(9,'Doni','Fakir','21 Kg'),(10,'Didin','Mampu','4 Kg'),(11,'Syifa','Miskin','8 Kg'),(12,'Zeke','Miskin','8 Kg');
/*!40000 ALTER TABLE `mustahik_warga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `muzakki`
--

DROP TABLE IF EXISTS `muzakki`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `muzakki` (
  `id_muzakki` int(10) NOT NULL AUTO_INCREMENT,
  `nama_muzakki` varchar(255) NOT NULL,
  `jumlah_tanggungan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_muzakki`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `muzakki`
--

LOCK TABLES `muzakki` WRITE;
/*!40000 ALTER TABLE `muzakki` DISABLE KEYS */;
INSERT INTO `muzakki` VALUES (52,'Budi','3','warga tetap'),(53,'Yudi','5','warga tetap'),(54,'test1','2','test1'),(55,'test1','2','test1'),(56,'Budi','3','warga tetap');
/*!40000 ALTER TABLE `muzakki` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'indra rusyana','207006040');
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

-- Dump completed on 2022-05-26  8:25:49
