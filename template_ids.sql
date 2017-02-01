-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: stonegate_email_builder
-- ------------------------------------------------------
-- Server version	5.7.16-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `template_ids`
--

DROP TABLE IF EXISTS `template_ids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_ids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(45) DEFAULT NULL,
  `auto_welcome_uk` varchar(45) DEFAULT NULL,
  `welcome_1_day_uk` varchar(45) DEFAULT NULL,
  `welcome_7_days_uk` varchar(45) DEFAULT NULL,
  `welcome_21_days_uk` varchar(45) DEFAULT NULL,
  `auto_welcome_scot` varchar(45) DEFAULT NULL,
  `welcome_1_day_scot` varchar(45) DEFAULT NULL,
  `welcome_7_days_scot` varchar(45) DEFAULT NULL,
  `welcome_21_days_scot` varchar(45) DEFAULT NULL,
  `birthday_1_week` varchar(45) DEFAULT NULL,
  `birthday_3_weeks` varchar(45) DEFAULT NULL,
  `birthday_6_weeks` varchar(45) DEFAULT NULL,
  `wifi_1_day` varchar(45) DEFAULT NULL,
  `wifi_7_days` varchar(45) DEFAULT NULL,
  `wifi_21_days` varchar(45) DEFAULT NULL,
  `password_reset` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_ids`
--

LOCK TABLES `template_ids` WRITE;
/*!40000 ALTER TABLE `template_ids` DISABLE KEYS */;
INSERT INTO `template_ids` VALUES (1,'admiral_duncan','19028\r\n','19053\r\n','19077\r\n','19101\r\n','19125\r\n','19149\r\n','19173\r\n','19197\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'beduin','19029\r\n','19054\r\n','19078','19102\r\n','19126\r\n','19150\r\n','19174\r\n','19198\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'charles_street','19030\r\n','19055\r\n','19079\r\n','19103\r\n','19127\r\n','19151\r\n','19175\r\n','19199\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'colors','19031\r\n','19056\r\n','19080\r\n','19104\r\n','19128\r\n','19152\r\n','19176\r\n','19200\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'duke_of_wellington','19032\r\n','19057\r\n','19081\r\n','19105\r\n','19129\r\n','19153\r\n','19177\r\n','19201\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'edwards','19033\r\n','19058\r\n','19082\r\n','19106\r\n','19130\r\n','19154\r\n','19178\r\n','19202\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'finnegans_wake','19034\r\n','19059\r\n','19083\r\n','19107\r\n','19131\r\n','19155\r\n','19179\r\n','19203\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'flares','19035\r\n','19060\r\n','19084\r\n','19108\r\n','19132\r\n','19156\r\n','19180\r\n','19204\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'halfway_to_heaven','19036\r\n','19061\r\n','19085\r\n','19109\r\n','19133\r\n','19157','19181\r\n','19205\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'kings_arms','19037\r\n','19062\r\n','19086\r\n','19110\r\n','19134\r\n','19158\r\n','19182\r\n','19206\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'luna','19038\r\n','19063\r\n','19087\r\n','19111\r\n','19135\r\n','19159\r\n','19183\r\n','19207\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'marys','19039\r\n','19064\r\n','19088\r\n','19112\r\n','19136\r\n','19160\r\n','19184\r\n','19208\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'missoula','19040\r\n','19065\r\n','19089\r\n','19113\r\n','19137\r\n','19161\r\n','19185\r\n','19209\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'pit_and_pendulum','19041\r\n','19066\r\n','19090\r\n','19114\r\n','19138\r\n','19162\r\n','19186\r\n','19210\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'popworld','19042\r\n','19067\r\n','19091\r\n','19115\r\n','19139\r\n','19163\r\n','19187\r\n','19211\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'queens_court','19043\r\n','19068\r\n','19092\r\n','19116\r\n','19140\r\n','19164\r\n','19188\r\n','19212\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'reflex','19044\r\n','19069\r\n','19093\r\n','19117\r\n','19141\r\n','19165\r\n','19189\r\n','19213\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'retro_bar','19045\r\n','19070\r\n','19094\r\n','19118\r\n','19142\r\n','19166\r\n','19190\r\n','19214\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'rosies','19046\r\n','19071\r\n','19095\r\n','19119\r\n','19143\r\n','19167\r\n','19191\r\n','19215\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'rupert_street','19047\r\n','19072\r\n','19096\r\n','19120\r\n','19144\r\n','19168\r\n','19192\r\n','19216\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'slains_castle','19048\r\n','19073\r\n','19097\r\n','19121\r\n','19145\r\n','19169\r\n','19193\r\n','19217\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'slug','19049\r\n','19074\r\n','19098\r\n','19122\r\n','19146\r\n','19170\r\n','19194\r\n','19218\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'two_brewers','19050\r\n','19075\r\n','19099\r\n','19123\r\n','19147\r\n','19171\r\n','19195\r\n','19219\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'via','19051\r\n','19076\r\n','19100\r\n','19124\r\n','19148\r\n','19172\r\n','19196\r\n','19220\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'yates','19286\r\n','19292\r\n','19298\r\n','19304\r\n','19289\r\n','19295\r\n','19301\r\n','19307\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'bosleys','19284\r\n','19290\r\n','19296\r\n','19302\r\n','19287\r\n','19293\r\n','19299\r\n','19305\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'common_room','19285\r\n','19291\r\n','19297\r\n','19303\r\n','19288\r\n','19294\r\n','19300\r\n','19306\r\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `template_ids` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-01 17:38:33
