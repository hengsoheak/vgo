-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: camvgo
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_09_13_200000_create_branch_table',1),('2016_09_13_200000_create_categories_table',1),('2016_09_13_300000_create_manufacturer_table',1),('2016_09_14_500000_create_pages_table',1),('2016_09_14_600000_create_products_table',1),('2016_09_14_600000_create_session_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(22) NOT NULL,
  `user_data` text,
  `provider_user_id` varchar(200) NOT NULL,
  `provider` varchar(150) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `avatar` text,
  `social_count` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_accounts`
--

LOCK TABLES `social_accounts` WRITE;
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
INSERT INTO `social_accounts` VALUES (14,33,'{\"kind\":\"plus#person\",\"etag\":\"\\\"FT7X6cYw9BSnPtIywEFNNGVVdio\\/91LtQ6fBbX2CKTQ_RlTfUHWZ9eo\\\"\",\"gender\":\"male\",\"emails\":[{\"value\":\"khmyads@gmail.com\",\"type\":\"account\"}],\"objectType\":\"person\",\"id\":\"113301647966062231327\",\"displayName\":\"Awesome Thing\",\"name\":{\"familyName\":\"Thing\",\"givenName\":\"Awesome\"},\"url\":\"https:\\/\\/plus.google.com\\/+Cambodiachannel168\",\"image\":{\"url\":\"https:\\/\\/lh6.googleusercontent.com\\/-Gcp_Wjj7yA0\\/AAAAAAAAAAI\\/AAAAAAAAAB8\\/hl1xcz4FnEI\\/photo.jpg?sz=50\",\"isDefault\":false},\"isPlusUser\":true,\"language\":\"en\",\"ageRange\":{\"min\":21},\"circledByCount\":80,\"verified\":false}','113301647966062231327','google',NULL,'https://lh6.googleusercontent.com/-gcp_wjj7ya0/aaaaaaaaaai/aaaaaaaaab8/hl1xcz4fnei/photo.jpg?sz=50',NULL,'2017-02-16 10:48:45','2017-02-16 10:48:45'),(15,32,'{\"name\":\"Heng Sopheak\",\"email\":\"hengsopheakbest1@yahoo.com\",\"gender\":\"male\",\"verified\":true,\"link\":\"https:\\/\\/www.facebook.com\\/app_scoped_user_id\\/585722174951882\\/\",\"id\":\"585722174951882\"}','585722174951882','facebook',NULL,'https://graph.facebook.com/v2.8/585722174951882/picture?type=normal',NULL,'2017-02-16 11:34:04','2017-02-16 11:34:04');
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(3) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (18,NULL,'Heng Sopheak','hengsopheakbest@gmail.com',NULL,'1','9ABqshIT9uRxvK0EzcvbI0cRlzFHCmttcN7ZT046YeqPoSSG7Fw1nqSTXQJd',0,'2017-02-14 02:38:26','2017-02-16 07:54:21'),(31,NULL,'Riya Kh','riyakh5@gmail.com',NULL,'0','BZFGqvRKWO3nW3Xy9Q5R4BPeM1XiQ8UaSq2PPmljkICttQfHabLgZZ1sUU9u',0,'2017-02-15 07:01:05','2017-02-15 07:01:05'),(32,NULL,'Heng Sopheak','hengsopheakbest1@yahoo.com',NULL,'0','geQC6kAlIdceFFxIPn7iSUofy8isbjHHpgTYT6uNUjTgMExRIjlcoh0hMWuC',0,'2017-02-15 07:26:00','2017-02-15 07:26:00'),(33,NULL,'Awesome Thing','khmyads@gmail.com',NULL,'0','0N0YpbBNFHVQVtppWSQFPcsnRuF57iFkOXF0d2qx7upDHdiDCHOkYzmTJnAq',0,'2017-02-15 14:21:10','2017-02-15 14:21:10'),(35,NULL,'cam can','camvgo@camvgo.com',NULL,'0','H4KDLfNJD4V1FtSaDXoFQkoNi0ypSQmoIEHctKPtSs2pKoL7MDjywQ8sOPF2',NULL,'2017-02-16 08:58:47','2017-02-16 08:58:47'),(36,NULL,'hengsopheak',NULL,NULL,'0','6bgVZuah7ORIl9XgXSGriPCk3lPt7yT6QnJA8vD8a1qFLypHxS6iFszryA8D',NULL,'2017-02-16 09:45:06','2017-02-16 09:45:06');
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

-- Dump completed on 2017-02-16 15:46:34
