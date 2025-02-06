-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: tutor_match
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

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
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `education` (
  `id` int NOT NULL AUTO_INCREMENT,
  `university_name` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `teacher_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `education_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` VALUES (1,'Toshkent Milliy universitet','bachelor',1),(2,'Toshkent davlat pedagokika universitetti','master',1),(3,'Toshkent Milliy universitet','bachelor',3),(4,'Toshkent davlat pedagokika universitetti','master',3);
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `experience` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int DEFAULT NULL,
  `student_numbers` int DEFAULT NULL,
  `experience_years` int DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `workplace` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (1,1,300,8,'biology','abu ali ibn sino nomidagi ixtisoslashtirilgan maktab'),(2,3,1000,12,'english','school');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_student_user` (`student_id`),
  CONSTRAINT `fk_student_id` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_student_user` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,1,'Ramzan','ramzan@gmail.com','1234',12,'Men matematikani zo`r o`rganmoqchiman va doim vazifalarni bajaraman','2025-02-06 04:15:02');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_students_update` AFTER UPDATE ON `students` FOR EACH ROW BEGIN
    UPDATE users
    SET full_name = NEW.full_name,
        email = NEW.email
    WHERE id = NEW.student_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,2,'Charos ','charos@gmail.com','1234','1992-01-01','Tashkent','Men biologiya fanidan tajribali va oliy malumotli o`qtuvchiman','2025-02-05 23:16:38','2025-02-05 23:18:33','pending'),(2,3,'Rano','rano@gmail.com','1234',NULL,NULL,NULL,'2025-02-05 23:21:46','2025-02-05 23:21:46','pending'),(3,10,'charos','charos1@gmail.com','1234','2025-02-14','Tashkent','i am good teacher','2025-02-06 08:35:34','2025-02-06 08:36:17','pending');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_api_tokens`
--

DROP TABLE IF EXISTS `user_api_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_api_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `token` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_api_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_api_tokens`
--

LOCK TABLES `user_api_tokens` WRITE;
/*!40000 ALTER TABLE `user_api_tokens` DISABLE KEYS */;
INSERT INTO `user_api_tokens` VALUES (1,'7180840ab0b2a80a6871fe6a5412bf37c56b431c3a28fe5e2e8b15e97def5324cfef16cc2afcb630',3,'2025-01-29 05:40:26','2025-01-22 10:40:26'),(2,'8b42b6f3834cf9e62659aec46c8b40c007ceb197a4ce53376d15b9814a9b95c00420ccd0d98079da',1,'2025-01-29 05:41:52','2025-01-22 10:41:52'),(3,'e2954b4e024a5fb9a2fed65a3b47dfa9c8a177916caef66973e59d8b04e5bea11b0917406a567385',1,'2025-01-29 05:49:11','2025-01-22 10:49:11'),(4,'019bbe29051a261dfb5731e28682e8d480b494c8f0844a94db5fa25bec36cffdb3f538035d67e329',2,'2025-01-29 06:04:39','2025-01-22 11:04:39'),(5,'a12bcfb102b34f4a43fccb20a2ead53dc6ddcde6316a0d5ef1bc2049a2fdacf4f733ab847b4b7cb1',3,'2025-01-29 06:07:02','2025-01-22 11:07:02'),(6,'dea2721867efe831a94211d6487bb0ed95161fc0c4f1d078f0cc99da5393a4e0b1a4826e106ca0bf',4,'2025-01-29 06:08:13','2025-01-22 11:08:13'),(7,'6a9fd01b6e513e1f842674b9f8b050fe77e11979627fa2eb4385152145179f172427d860652de355',5,'2025-01-29 06:19:55','2025-01-22 11:19:55'),(8,'9b422541100becbb6f01aee85c9e9a8e56c6e4a26bd2fe344692ce0d1ac6cfa91b68a65b691b6872',6,'2025-01-30 11:24:11','2025-01-23 16:24:11'),(9,'23e415bcad4e35c5a9a781738f469144815fe4e2268e851dfcb8fb0b12139eb81dc19bca1bb55939',7,'2025-01-30 11:45:27','2025-01-23 16:45:27'),(10,'7713403ae4764d87a321a31a847aeeb5f59fe5ec209ef6979786118a0b40acc84acfb04aba5496ee',1,'2025-01-30 13:45:44','2025-01-23 18:45:44'),(11,'5b129f53bbb9611a41d3417f59e895e082101a3357fd7bee0036198c9dee705005d47bc4a7a6abea',8,'2025-01-30 16:12:49','2025-01-23 21:12:49'),(12,'dc46a1b69625eca6343c84e863b78b5ee30d2c016191dce71ccd4778bc5f8baac2f166cf721690bd',10,'2025-01-31 03:43:20','2025-01-24 08:43:20'),(13,'2f8aad8bf0d61f1ec10681bf6f96fb23f3e489d098f6ae45c27ace596fd93c29e356203e012e8990',12,'2025-01-31 03:45:09','2025-01-24 08:45:09'),(14,'cda9bc0178c5c93c3e4423db249ead428ebe3f74b1d846ac074411d43685124c76edf447838cedc5',13,'2025-01-31 03:46:49','2025-01-24 08:46:49'),(15,'995da56be707784cc800ca120f37d82b84616fc7c53d4b1d1d82c5c8114d252429518a5940186678',14,'2025-01-31 03:49:04','2025-01-24 08:49:04'),(16,'f2713d6fa207e4a496c223dc91eb1386a2d1b1b547c33499010f71d2614beea4053fc15b3fe1a8f1',15,'2025-01-31 03:50:53','2025-01-24 08:50:53'),(17,'c8657ae9fa4d6d0514b4ebab11f01b2902872139b33ba2caa562bf048f9787d68d01775d33f2cccb',16,'2025-01-31 03:52:03','2025-01-24 08:52:03'),(18,'3ec9348c6bacae2a6c72e18f6b753d90277f3cbcb7f0573912bb5c0b44f84e6b50aa3caad6b1e3a0',17,'2025-01-31 03:54:14','2025-01-24 08:54:14'),(19,'6df5ba3e4cdfb9a126f7c5aae81c555ec68f565ec43eddb3e7c5c754817306807402577f893310b2',18,'2025-01-31 03:58:13','2025-01-24 08:58:13'),(20,'62bbf8931a1badaca92d91848785b47bd656c28d525a4b7a09926fbd2d129e6adbe0a5ffa5cc2393',18,'2025-01-31 04:10:25','2025-01-24 09:10:25'),(21,'d36b9c6418bdd3f731ed6a14102eee975e7c47a46fe1fb97b843b40311a4cde20ffb9c9443ddbc80',18,'2025-01-31 04:36:37','2025-01-24 09:36:37'),(22,'be86fb0c7fd1262702a119760f3c50148002cfc7a0073f18a522b167a58bb631ff5a7a09f0ca17b1',18,'2025-01-31 04:40:07','2025-01-24 09:40:07'),(23,'37ed4777550ea3f302ef6c1e61283da5bb5d7642cd02a6d2ba383594badd8df422b4033a91188889',18,'2025-01-31 04:44:18','2025-01-24 09:44:18'),(24,'7744d94330299765357de8d3872c1d512ad57623ebfaaf9d6c7cf0a4bfee922febe4193bf51383ad',2,'2025-01-31 05:05:58','2025-01-24 10:05:58'),(25,'b48845709aeeed4000a4cc6b6a5bf61832204a4627a0efd74db14f6c57ca6159f0897507705078f2',19,'2025-01-31 05:06:47','2025-01-24 10:06:47'),(26,'b3e5ca6d08ba0c543a8b2b75f63f6adb973de25a97b4a2ecced8abf3618b8cdc02a38dd736452432',18,'2025-01-31 06:09:09','2025-01-24 11:09:09'),(27,'966e2b7267f19a37f68d3f89fafc5a5b517b934e4654423ff0b6bbdefc87c4cce0b1a737d86154fb',20,'2025-01-31 06:43:08','2025-01-24 11:43:08'),(28,'542b058d237a0ab9c86baa54379713b98df73e71a68ea56c32dcdef60151c2ca3d4dff4d59d6c37a',21,'2025-01-31 06:46:43','2025-01-24 11:46:43'),(29,'209e179318926016c4580879648a5a350dde692bbdfa44c3cbb3b1b7c621069cbcfd72b36554daa4',22,'2025-01-31 06:49:21','2025-01-24 11:49:21'),(30,'0c1f12ab4773246a61c4da0a4b93e953b300fbaa4a4322874e9dd5339ae7fdaa7867140bc0e87b5e',24,'2025-01-31 06:52:49','2025-01-24 11:52:49'),(31,'91b791d9ce9c21680c3060c31e0be485998ffdf468c3a7556d31677df572f8618510482cc6c4a515',25,'2025-01-31 06:53:30','2025-01-24 11:53:30'),(32,'a61c756f365b2efea70e5e03486ff98f4f9c9cb9de3a32cf1d23695b721a9fd124d23909856761a1',26,'2025-01-31 11:27:04','2025-01-24 16:27:04'),(33,'37c502e9fa0a9159fc1cc1dec9eca2d1b95dfcc40fbda743131674a8443802e5c726810d923d65f0',27,'2025-01-31 11:35:10','2025-01-24 16:35:10'),(34,'312a3647644ea520cbcc6e3b17d29eec589ea198345dfb098b1be6cf41d894c32ad790010ad07435',26,'2025-01-31 15:56:58','2025-01-24 20:56:58'),(35,'c843bc5b67f1e8e92f1e0a38046634b05ef24f423d8143745d206c51466e78b2bfa0f7643aa7d4f9',28,'2025-01-31 15:59:18','2025-01-24 20:59:18'),(36,'e2e10f6ab476a04d003cda1d867d9de84acb8b01f7abe7a8a2e3edae9ea3e49b5836489eedad0594',28,'2025-01-31 16:01:05','2025-01-24 21:01:05'),(37,'d3fe103557ea11f856f8b6a8bc1fbddf0f9750c0861398c2ad9ba7f9bdb4aae7f966d25039d7e8cf',27,'2025-01-31 17:56:32','2025-01-24 22:56:32'),(38,'97d0630b1369f659708fe650d0347a508cbdeafb5f5efa07fecf0037c613cfb22e4118273a181459',26,'2025-01-31 17:56:45','2025-01-24 22:56:45'),(39,'f1b7a86136b45820aef5d372ccda4158683bb0a145a12174304124bdab42eb6a9d921ede6b9c21d2',29,'2025-01-31 17:57:25','2025-01-24 22:57:25'),(40,'977dfe9af322de151c1ea4baa1a0db12ce9f059257ca90c0f1d6a7129d34aaab0bb7b5c680f21709',29,'2025-02-03 13:49:37','2025-01-27 18:49:37'),(41,'8960d9fcd26dc03c6dbd53b97cc167cbba5165e4ac104113f959a4eca7c12450e928d8145991dccd',2,'2025-02-03 13:50:48','2025-01-27 18:50:48'),(42,'697c1d1f2078318cba76887c4ee2434fa2d5d2df8eef82503642ef60ebeca4d427f5e76a94329028',1,'2025-02-04 12:58:46','2025-01-28 17:58:46'),(43,'c532952612df7c95e67e43f0912dcf7863baea78658c2db9e42bb3630a8cb11298cf67cdd23d36df',1,'2025-02-04 13:56:29','2025-01-28 18:56:29'),(44,'742d5e8c9e36ad53bf2f1cd725d118142597118ad7a9885aeab83c02c1ec02c7fbd4a1e5eb85dad3',2,'2025-02-04 16:06:39','2025-01-28 21:06:39'),(45,'4fec1f40ec32875fad66f64f87bb4d4c916ca6ff3978dddf5bf86e10d8e20f4315c9e72abc54c179',1,'2025-02-04 17:00:47','2025-01-28 22:00:47'),(46,'4dbc9e5cd1e83350820dea2c241afb9db1fef40693ab8d6326025c3e006e352f6e9c7bb6dc7a5680',2,'2025-02-04 17:01:10','2025-01-28 22:01:10'),(47,'023aa67e0c5f91e703d029ddd2d6f225a270d78654fc6876758534bbd2700eb73ebf6b3ac3372b00',2,'2025-02-05 03:40:10','2025-01-29 08:40:10'),(48,'1caa075bd6ae18c458e1753c31467cdc700d53904a2d67b3abe66ba4758c49753d4a6832219a02d0',2,'2025-02-05 03:46:19','2025-01-29 08:46:19'),(49,'e09e36e2196affeeb34479432ce221f078403596fb506180651af374f7682bf437a4c7ed76811817',1,'2025-02-05 03:49:38','2025-01-29 08:49:38'),(50,'6142b1490fcdde71a3150392e4d5b4c7936aaf81f72e95b3c29da116cf7b1be2c2d51fd231b66c0b',2,'2025-02-05 03:52:10','2025-01-29 08:52:10'),(51,'676e2ce6ba9f8493199db170e4e52b2560ae80f7f992d784e318a86cd4e369e45f8a769d816db7ef',2,'2025-02-05 03:52:52','2025-01-29 08:52:52'),(52,'c7a62251a485892c39071fb7511b4e7fd40810043c9c919eef06754026fb089b2af93229d15f2257',2,'2025-02-05 03:53:30','2025-01-29 08:53:30'),(53,'a8488f8136a002310b30265bade20dc7ecf1857bfe76fa46410f510860af118282ac4f0988f78f10',1,'2025-02-05 06:25:05','2025-01-29 11:25:05'),(54,'bf1747969d4c39250d0321a03071d52a00b66a3596c81bd22216f3364f96e893de609f1f3a633dc5',2,'2025-02-05 06:25:25','2025-01-29 11:25:25'),(55,'07117ba570cc33537869ea907ad9b3a3f806f629fccbe6b53e6621c1d762d4195c0b89a2c9222fe2',1,'2025-02-05 06:27:17','2025-01-29 11:27:17'),(56,'3745443b422d57244a474dd00ffe826873d3d3c4239f3770afc7e2f2bb092c786772c84d2d269d82',3,'2025-02-05 06:33:10','2025-01-29 11:33:10'),(57,'deebe28018f9620712a069793fd6f834671a8d614c612f36c3ecf484b8510fba1c48787ac648a253',1,'2025-02-05 06:38:36','2025-01-29 11:38:36'),(58,'f93b25b8a6ff8c20b1fec19bda8552fb31899f468472abf0c386f64e9c93cfe7d9478e22197132d9',2,'2025-02-05 06:40:51','2025-01-29 11:40:51'),(59,'4cf1cc547c4d5802247a292ef4df6f27909876da6f68106c2de90fbd62a06ebedcdc34e10fbefea2',4,'2025-02-05 07:05:11','2025-01-29 12:05:11'),(60,'303cb9deaa0deb491058b2808e1fac7c049adc4e5cf31d093584246d380d69d369b4a6b37e57fac5',6,'2025-02-05 07:05:44','2025-01-29 12:05:44'),(61,'40147257224411db526742d071b276847905835ac9925a1c1df0bcc933db8a1b5fc5e5e003a17eb5',8,'2025-02-05 07:06:15','2025-01-29 12:06:15'),(62,'c703b64daea64f8bb60e6de2aaa4084b4cdb4d3e1d06941b85d0751ecf2bb0217d404c8c0279194a',9,'2025-02-05 07:08:26','2025-01-29 12:08:26'),(63,'bcf9104c15d18338867d8109369dd59ce39c2e92a202dde6a8363ab8cad3fe8fdb6199ae3fe9eded',10,'2025-02-05 07:09:22','2025-01-29 12:09:22'),(64,'dbfb9a0d96cd677397e42410232c34133562af45b55f3f7f0f192837e214179c922ad5bfa2f5527f',11,'2025-02-05 07:12:07','2025-01-29 12:12:07'),(65,'aaaea31a465d54e7d21d0b440ccc4fc265bb66e940f43e0fbd9fa1f7b49136c918e51e0489e3dedc',11,'2025-02-05 09:27:34','2025-01-29 14:27:34'),(66,'4cee2bb2aa924a3a7f3c6b50546e4da4751835a2d10f556c9323a06290bf2bd93c31ae15343957c9',17,'2025-02-05 09:30:07','2025-01-29 14:30:07'),(67,'61d27b9f785e67023b3b706293f6492fa9b1b3abd2bc569027f5bdbbca108eaa246b6b1257bfcb8b',11,'2025-02-05 14:04:17','2025-01-29 19:04:17'),(68,'b09f711b13807962d16c754e1e32488546eb7e3b1a6e0df1525b8047645b46c73c28abaca9e7cdee',17,'2025-02-05 14:04:36','2025-01-29 19:04:36'),(69,'1354feebe9c28cf66ae3fa91f8f4151d93a1ba7182418916541e341fd1063a4a2479385dd7485d7d',1,'2025-02-05 14:25:16','2025-01-29 19:25:16'),(70,'bbb2c618da1433bfb70c7677e48e947b37b5826f02243f0d039d945fe97db2794b4d14a269e8b690',18,'2025-02-10 08:32:49','2025-02-03 13:32:49'),(71,'f821ff559578e9e7e157fedeaeb65f43cb303af0ced2ec7ab9b28164ed2e600be210dffe1f27f932',19,'2025-02-10 08:33:40','2025-02-03 13:33:40'),(72,'a10bb8d0ea1bf7f5e244e892673a1f9341d6279875674772c145099b7af0020d284714e4e61ced5f',20,'2025-02-12 19:13:02','2025-02-06 00:13:02'),(73,'2a16576e812109a0d2bef65a37e429354efed1412d5b1911c61b905aeac7d1a816392eaf6b265fbb',2,'2025-02-12 19:14:23','2025-02-06 00:14:23'),(74,'253e4098c5e3fdb9df8ab543ec81a30b0da3cd36cd78db8f57d9482dd8e3a6085c77cd0f545c74c7',2,'2025-02-12 20:46:01','2025-02-06 01:46:01'),(75,'71e7442d78799c10d0e54c51532ceacdeb951dc1e534f09099e02d8060eaa95866333441cd23160e',21,'2025-02-12 20:46:47','2025-02-06 01:46:47'),(76,'e424f1267862673fa8bd9bf124f43e18de2d8b8c12562fe84c6314399737f47d04b8e794f2f4ce1b',21,'2025-02-12 20:49:46','2025-02-06 01:49:46'),(77,'d142ce2818926e52fc7fa5359318ac2e2c346f9882129172c16cef3631736ee084c469599d8dee35',2,'2025-02-12 21:00:39','2025-02-06 02:00:39'),(78,'cc96b93d21a523882ff30be2ee15788b7767f88c6bb5293712870d2cf187bbabf7641131d8c8a3a9',2,'2025-02-12 21:07:36','2025-02-06 02:07:36'),(79,'0f087d935a7c6b0346ee585f96e365d69e39f7e52e1fbf91c16ec157f4a00bc79cb1ad3351866583',2,'2025-02-12 22:01:03','2025-02-06 03:01:03'),(80,'09681eb8ce01236d054dab1f6d4777f01623ec5ecc4fa936265fb2a769f6fd82ea8510f02fb1f312',21,'2025-02-12 22:03:57','2025-02-06 03:03:57'),(81,'db8fef998ea6b2f30ee1b219a6c0bc1732d74779c4a89916c97a510f6f994505d6577807f831b024',22,'2025-02-12 22:07:40','2025-02-06 03:07:40'),(82,'d23a86dec6578cd0eb345088f93ddbf7c6a77d35ed2aecb1c7522e416ecaba91b8e044c2051a6844',23,'2025-02-12 22:27:33','2025-02-06 03:27:33'),(83,'41a9e820f1e2e3c0ad12baea598fe661be12b5f8a694aba28d03a40eb05536f7504a4bab71cbd64f',24,'2025-02-12 22:30:53','2025-02-06 03:30:53'),(84,'5d0484fc6f00df57129ffc2a45c3848b187a88819ce029abce0f6733696ceaa2ed154530f7c159e2',27,'2025-02-12 22:32:05','2025-02-06 03:32:05'),(85,'a2faa83d7402c535b7d0b673959cc7dd0aef404a403badaffa77305b61c59b71623c98928c0da036',28,'2025-02-12 22:41:09','2025-02-06 03:41:09'),(86,'5f886480d5515b3b17d34aee3c9861ce697750cc373047b66a9f5aa5b8bfb2e2cfd97938f216fcce',28,'2025-02-12 22:59:42','2025-02-06 03:59:42'),(87,'8eadc9a7535d3691b7efe505633a19b36604b750cffe7bb3672ba29052776ca19388570df2c46ff6',28,'2025-02-12 23:10:59','2025-02-06 04:10:59'),(88,'3f4ceb13e8dac6ed8af5e1f5549a8e9a326278ad5fc13a92dc65cde3b0d01d481fc1150a64ef1698',1,'2025-02-12 23:15:02','2025-02-06 04:15:02'),(89,'a662967f8206df9bdbc17ca2e4bf0bff513b717d266b6ce2711b473323cb4392b8070df14bb59677',2,'2025-02-12 23:16:38','2025-02-06 04:16:38'),(90,'9da484b6fbc187f33444ec51776ce48e84d93bb5b03324e8dbc84b556293a8fb8a28359caa721ab1',2,'2025-02-12 23:19:33','2025-02-06 04:19:33'),(91,'bf010a4946093836904ed1c843d526c47d35a71613212f5dd962d12fc262cad2a5fdb720cecc714f',3,'2025-02-12 23:21:46','2025-02-06 04:21:46'),(92,'4d742894c501ba2af85ae4755627fba597892c5050b18ab956e9acf596ec7d8e92866bc795bf98fc',1,'2025-02-13 04:10:03','2025-02-06 09:10:03'),(93,'699d18443bac21211ab6299284269e8e8143178233f5fcf7e721dc57f73fd09b7021a6e5d2c9342b',2,'2025-02-13 04:11:19','2025-02-06 09:11:19'),(94,'e9b7a909aa8c72e407c79b5258054ef6ad2b160a6370d5b66b011b406c5d441c656d82be84873440',4,'2025-02-13 04:12:45','2025-02-06 09:12:45'),(95,'201361ba3e885774f83ce14761afa39bb8c47f2f3c2aea2d6081ceaeab6c91ce57cdbb176b82b2d0',2,'2025-02-13 04:18:04','2025-02-06 09:18:04'),(96,'9dc84b440f2503c3c80abe0fb4efb99836033fdeb645ebee5c14a68204c6cef6189c339961632e4f',4,'2025-02-13 04:18:55','2025-02-06 09:18:55'),(97,'f9eb1af3fd168827e722fb0416c50627c6dd49b026f4431d1dc5a665d9f052fb76fdc23a7db2f946',4,'2025-02-13 04:34:50','2025-02-06 09:34:50'),(98,'c62bf43cbf83efcb3b47460253705c1b5b52967033218c394545641e3e18c5651180374916d4911b',4,'2025-02-13 04:36:06','2025-02-06 09:36:06'),(99,'0a79bb4f9f1757e6f2401c610071e3c175b62601908a436ded9989964bb36011abc9958af303a51e',4,'2025-02-13 04:48:36','2025-02-06 09:48:36'),(100,'a2a87e682ad19fde1ecbbc32228c5c8d0d322b93bc739a99e48d697bd5d8a13233ff5d254228f8c4',4,'2025-02-13 04:50:02','2025-02-06 09:50:02'),(101,'822768738e5d354bb96243e48fb6037c303fca21d9228e2ad240bee81a63f3f64b257916f7efe398',4,'2025-02-13 05:11:53','2025-02-06 10:11:53'),(102,'8f3138bbdf3c7a6c6f8f98107608e99520b1a5ac5c90e75089c321e083142ed66474c88237d205c0',4,'2025-02-13 05:35:45','2025-02-06 10:35:45'),(103,'bd731d24125d35760b144be17eb9463d0258dda02816f14a10bc4f8725561195f4e7a1beb56eba7a',4,'2025-02-13 05:48:29','2025-02-06 10:48:29'),(104,'53ed63a471de93c9a7a5c7c464c7eaf34199b24bb53e5e3f5c8b9ffa95608a015960715afaadf186',5,'2025-02-13 05:48:58','2025-02-06 10:48:58'),(105,'262a2800a94540f69fc8929565aac3b172f85292bd7d78b67240c29efbb0a99d6fb4c277a94dbda1',4,'2025-02-13 05:49:10','2025-02-06 10:49:10'),(106,'b279fedfb2df7bcbecc9936fe0ac65f2117804002c6d14e4a5733b10746e674ce87646f7f88cdb44',6,'2025-02-13 05:52:10','2025-02-06 10:52:10'),(107,'f27fd03fe7b13073432c3f919fde35b47c69746b49c6be2a15cf15df5c23a61fb5e403892fa391f2',7,'2025-02-13 05:52:23','2025-02-06 10:52:23'),(108,'057b52820e6cf6afee118b2beb23f7d33f0023474954a920cd3af588bd747e7eaffeceb2d97c33c0',4,'2025-02-13 05:52:35','2025-02-06 10:52:35'),(109,'2acef743fb4ecad0f79ea1e1986d5ab41ece32e87179e1625e298964ca1b3ced4194c100ccabdf3d',4,'2025-02-13 05:55:29','2025-02-06 10:55:29'),(110,'0d3b49f32a047ddabddc761aa5bf59d78de5fed18b6a7488fbdafa0179cccec8011d4ab70a6f0fad',8,'2025-02-13 05:59:03','2025-02-06 10:59:03'),(111,'229f61159c56dfc75ae12fbd3d1483e3911f70e19bc36901c66bf6e33d44c6feaa0b7f9afd11db4a',9,'2025-02-13 05:59:20','2025-02-06 10:59:20'),(112,'51dffb8e42763b6c6977d36180bcb1d8f21021ffb1cd81aa94b82090bee4157af6007179d52e9332',4,'2025-02-13 05:59:29','2025-02-06 10:59:29'),(113,'d9268dbb159c56936f14f02d76ec66547239db27264983cee8c9d6ff04a55071d377eaf753305ee8',10,'2025-02-13 08:35:34','2025-02-06 13:35:34'),(114,'75f1257e00c4ab1a62220c2fd902c289768fb15e54b2db9de30c8a790e5b0bbd7fb0318e565b3433',4,'2025-02-13 08:36:43','2025-02-06 13:36:43'),(115,'d764ae503dd6681c204a7f38b73aeabd1f19aa524de90692cfb54136a392349ec52ab573511eff16',4,'2025-02-13 08:57:09','2025-02-06 13:57:09');
/*!40000 ALTER TABLE `user_api_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ramzan','ramzan@gmail.com','$2y$10$oea9TUo6m4tN8UbD6zLm5euvJ4RX6OanV82thaGa2JQUFdVEVYIaK','Learner','2025-02-06 04:15:02','2025-02-06 04:15:02'),(2,'Charos ','charos@gmail.com','$2y$10$MyYn5bMi.jskB6zFEM29tewiQlxQ/akUtgSYVljAk86p1xI.xMCxq','Teacher','2025-02-06 04:16:38','2025-02-06 04:16:38'),(3,'Rano','rano@gmail.com','$2y$10$0tN3cFvsMF2Px2rl71gLFOKuqXtgVnXT5bfSIELHf4tK/ccklsuwO','Teacher','2025-02-06 04:21:46','2025-02-06 04:21:46'),(4,'Maftuna','maftuna@gmail.com','$2y$10$O8eUgyjgt0GgoKe4dUpyLuD8Cx25xUWcVo3en2l/a91meg34McoW2','Admin','2025-02-06 09:12:45','2025-02-06 09:12:45'),(5,'fdjfdv','fdkfdmaftuna@gmail.com','$2y$10$tizTSrbIaPiDl19jETnokOgjJizwCxlT3Qh1Ecw08qqj9KO.6rP3S','Learner','2025-02-06 10:48:58','2025-02-06 10:48:58'),(6,'kgfmgf','teacherkmmfr@gmail.com','$2y$10$YJUz4xFQltWefbhICiPEzOVgEasVGvwKNzutu7Li5sm8tzgzjn8Qm','Learner','2025-02-06 10:52:10','2025-02-06 10:52:10'),(7,'mmgrmmg','chatrktgrkros@gmail.com','$2y$10$YSjjeX4U9HhHsILmZxNVd.8YU95YN3HGmMgSKJ0fzSSCG8ms8cu0C','Learner','2025-02-06 10:52:23','2025-02-06 10:52:23'),(8,'mfmmfd','teacherfkg@gmail.com','$2y$10$ZuaiCCCIbuEoNWEg5tlZ/uzS5i.mf6vz7YtBGXGixGzU01b9HrO1y','Learner','2025-02-06 10:59:03','2025-02-06 10:59:03'),(9,'gfmgbfmg','maftungggfa@gmail.comf','$2y$10$PKoRn9KmjmNOuZvoOeYfwuxI9kafAar2FVDDov85LhPaH8i4BTppW','Learner','2025-02-06 10:59:20','2025-02-06 10:59:20'),(10,'charos','charos1@gmail.com','$2y$10$LLbzZDbmujufm/qYFU.jnuDm1MZr7awOG8MKfVaUlmhB3BSabaYDK','Teacher','2025-02-06 13:35:33','2025-02-06 13:35:33');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_users_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    IF NEW.status = 'students' THEN
        INSERT INTO students (student_id, full_name, email, age, description)
        VALUES (NEW.id, NEW.full_name, NEW.email, NULL, NULL);
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `update_teacher_info` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
    
    IF OLD.full_name <> NEW.full_name OR OLD.email <> NEW.email OR OLD.password <> NEW.password THEN
        UPDATE teachers
        SET full_name = NEW.full_name,
            email = NEW.email,
            password = NEW.password,
            updated_at = CURRENT_TIMESTAMP
        WHERE teacher_id = NEW.id;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-06 14:02:41
