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
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `format` varchar(50) NOT NULL,
  `place` varchar(255) DEFAULT NULL,
  `duration` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `cost` int NOT NULL,
  `description` text NOT NULL,
  `seats` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'open',
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,1,'Step into Biology','biology','online','via Zoom','6 months','10:00-12:00, weekdays',500000,'This course covers the human body systems, genetics, and ecological interactions. Students will explore real-world biological concepts through case studies and lab activities.',120,'2025-02-11 03:54:34','open'),(2,1,'Learn Physics ','Physics','offline','at school number 1','4 months','09:00-11:00, mon/wed/fri',300000,'A deep dive into Newton’s laws of motion, forces, energy, and kinematics. This class includes hands-on experiments to help students understand the fundamental principles of physics.',60,'2025-02-11 03:56:29','open'),(3,1,'Step into Anatomy','human anatomy','online','Telegram channe;','1 year','17:00-20:00, weekdays',250000,'This course covers the human body systems, genetics, and ecological interactions. Students will explore real-world biological concepts through case studies and lab activities.',300,'2025-02-11 03:57:49','open'),(4,2,'World Civilizations','History ','offline','20 school','4 months','8:00-9:30, weekdays',400000,'Study the rise and fall of civilizations, important historical events, and their impact on today’s world. This class encourages critical thinking and discussion about global history.',50,'2025-02-11 04:00:29','open'),(5,2,' Programming & AI ','Computer Science-','online','via Zoom','5 months','17:00-20:00, weekdays',450000,'An introduction to coding, algorithms, and artificial intelligence. Students will learn programming languages like Python and work on real-world projects.\r\n\r\n',80,'2025-02-11 04:02:50','open'),(6,3,'Biologiya tayyorlov kursi','biology','offline','academic lyceum','1 year ','09:00-11:00, mon/wed/fri',700000,'This course covers the human body systems, genetics, and ecological interactions. Students will explore real-world biological concepts through case studies and lab activities.',40,'2025-02-11 04:04:07','open');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` VALUES (1,'Toshkent Milliy universitet','bachelor',1),(2,'Toshkent davlat pedagokika universitetti','master',1),(3,'Toshkent Milliy universitet','bachelor',3),(4,'Toshkent davlat pedagokika universitetti','master',3),(5,'Toshkent Milliy universitet','bachelor',4),(6,'Toshkent Milliy universitet','bachelor',5),(7,'Toshkent Milliy universitet','bachelor',6),(8,'Toshkent Milliy universitet','bachelor',8),(9,'Toshkent Milliy universitet','bachelor',9),(10,'Toshkent davlat pedagokika universitetti','master',9),(11,'Toshkent Milliy universitet','bachelor',10),(12,'Toshkent Milliy universitet','bachelor',1),(13,'Toshkent davlat pedagokika universitetti','master',1),(14,'Toshkent Milliy universitet','bachelor',2),(15,'Toshkent davlat pedagokika universitetti','bachelor',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experience`
--

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` VALUES (1,1,300,8,'biology','abu ali ibn sino nomidagi ixtisoslashtirilgan maktab'),(2,3,1000,12,'english','school'),(3,4,1000,13,'chemistry','lyceum'),(4,5,13,123,'ff,sb',',fgbf,'),(5,6,23,32,'dffdv','afdvfv'),(6,8,78,88,'gvgv','bjnj'),(7,9,400,5,'english','school'),(8,10,439,3434,'43i4','mfmvgvg'),(9,1,1000,14,'math','School number 1'),(10,2,500,7,'phycics','academic lyceum'),(11,3,450,5,'chemistry','college');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `register` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `register_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `register_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES (5,5,5),(6,6,5),(7,1,5),(8,2,5),(9,3,5),(10,4,5),(11,1,1),(12,2,1),(13,3,1),(14,4,1),(15,5,1),(16,6,1),(17,1,2),(18,6,2),(19,4,2),(20,3,2);
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rejections`
--

DROP TABLE IF EXISTS `rejections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rejections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int NOT NULL,
  `reason` text NOT NULL,
  `rejected_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `rejections_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rejections`
--

LOCK TABLES `rejections` WRITE;
/*!40000 ALTER TABLE `rejections` DISABLE KEYS */;
INSERT INTO `rejections` VALUES (1,5,'talabga javob bermaydi','2025-02-07 00:50:03'),(2,7,'malumotlar yetarli emas','2025-02-07 09:10:56'),(3,6,'diplom yoq','2025-02-07 09:11:18'),(4,8,'sabab kop','2025-02-07 09:11:50'),(5,10,'diplom yoq','2025-02-07 09:19:49'),(6,11,'hecch qanaqa malumot yoq','2025-02-08 17:43:41');
/*!40000 ALTER TABLE `rejections` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,1,'John Smith','john@gmail.com','1234',15,' A passionate learner who loves solving math problems. He dreams of becoming a data scientist and enjoys coding in his free time.\n','2025-02-11 08:37:19'),(2,2,'Emily Johnson','emily@gmail.com','1234',17,'A curious physics enthusiast who loves conducting experiments. She hopes to work for NASA someday.','2025-02-11 08:40:36'),(3,3,'Daniel Brown','daniel@gmail.com','1234',15,' A book lover and an excellent writer. He enjoys writing poetry and aspires to become a novelist.','2025-02-11 08:41:36'),(4,4,'Sarah Miller','sarah@gmail.com','1234',14,'A chemistry enthusiast who loves mixing elements and making new discoveries. She wants to become a pharmacist.','2025-02-11 08:42:27'),(5,5,'Michail Davis','michael@gmail.com','1234',18,'A future biologist who spends hours watching documentaries on wildlife and nature. His dream is to work in environmental conservation.','2025-02-11 08:43:20');
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
  `phone` varchar(20) DEFAULT NULL,
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
INSERT INTO `teachers` VALUES (1,6,'William Clark','william@gmail.com','1234','1980-10-11','Tashkent','A dedicated math teacher with over 10 years of experience. He loves helping students develop logical thinking skills and problem-solving abilities.','2025-02-11 03:44:11','2025-02-11 03:52:02','confirmed','+1122334455'),(2,7,'Sophia Adams','sophia.a@email.com','1234','1977-02-11','Kashkadaryo','A curious physics enthusiast who loves conducting experiments. She hopes to work for NASA someday.','2025-02-11 03:46:55','2025-02-11 03:52:05','confirmed','+1122334456'),(3,8,'Benjamin Hall -','hall@gmail.com','1234','1988-07-11','Jizzakh','A highly experienced chemistry professor who enjoys making complex concepts simple for students. His favorite hobby is conducting research in organic chemistry.','2025-02-11 03:48:54','2025-02-11 03:52:07','confirmed','+1122334457');
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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_api_tokens`
--

LOCK TABLES `user_api_tokens` WRITE;
/*!40000 ALTER TABLE `user_api_tokens` DISABLE KEYS */;
INSERT INTO `user_api_tokens` VALUES (1,'2e265fd9a1ed704222a07860bdacdc69650be77ab8e8d6e9062931b6f707e3d46f5318f2090a7fba',19,'2025-02-15 13:22:54','2025-02-08 13:22:54'),(2,'4a273d53e3a7823218f812cd2415eaa75a8cf509e5727b1ed845e22a7e59635fb33bf109ebb8b454',4,'2025-02-15 13:23:38','2025-02-08 13:23:38'),(3,'40ebd5be4beb0bb6e6bc4f2bbb24c199970c198127fc927dffd29731da5db9cfeffd8493333cf405',16,'2025-02-15 13:24:06','2025-02-08 13:24:06'),(4,'ce5cb6558ce124ec75181c33e4a11d9e6bc67277d03a066003d5c48ad500ebfc2ecc2f746834a221',4,'2025-02-15 13:39:45','2025-02-08 13:39:45'),(5,'5f460e7be38899e80d0a818f0a49b2a3210f5d744141021eeb13fe1227f43a5476af4011a56a0f7d',16,'2025-02-15 13:39:53','2025-02-08 13:39:53'),(6,'66d1729bdf2e3df56f78cc4d8052e358f7c760e2bb160c75f296d3da01613b523e8964a3e75cb1a5',4,'2025-02-15 18:47:21','2025-02-08 18:47:21'),(7,'3437738b76e6862f2380de73185df7e4be44f429559ac5b894d20d35e9a7046d69669deb5a177918',16,'2025-02-15 18:47:43','2025-02-08 18:47:43'),(8,'c3d48e099bf74e57716c162cf34d6ada6a3c7d157256c3f4d4ceda23a41d2e303beeea2314bb8376',16,'2025-02-15 18:49:06','2025-02-08 18:49:06'),(9,'cd2c11b905e2993457b60193e6a35ebbb041b26f237c5c401ec38afc4646930e29de9ed69a5c0574',4,'2025-02-15 18:56:43','2025-02-08 18:56:43'),(10,'52e2df29fae2b4d160eb881edda024aee95e1d5922cfde3ee07a6702d679d474bdb55996f69f19c2',1,'2025-02-15 18:56:56','2025-02-08 18:56:56'),(11,'2fc92c9990827fd703dfc97e7023f9d8816a0130480c5d7a87f8e894f6554bda79f22ce50ee0cac8',20,'2025-02-15 18:57:22','2025-02-08 18:57:22'),(12,'7fefa438d0732c36e0c9ff3279ae6128514eb1b1f74aa71b6694d7c60b7f93f721be3334e14364d2',4,'2025-02-15 18:57:37','2025-02-08 18:57:37'),(13,'bc312908a2157f86ab826a843bbf8051f976272f2c462791f0ecc52055fdec5ffdd107c8729acccf',16,'2025-02-15 18:57:44','2025-02-08 18:57:44'),(14,'6e3351286aa104cefbb85368234310103301e234693a34d12aa9c76d38f8fcb12851f4028b157886',16,'2025-02-15 19:18:32','2025-02-08 19:18:32'),(15,'495a28ff72028b83c53277fbb535a8a8691c5f6a430a729f3d9026022164f4d4c51bdcd0f4107b74',4,'2025-02-15 19:21:58','2025-02-08 19:21:58'),(16,'e2cf4b66e5ba0889c31a4dd1640570377e39e2955449ae123249180477e82319276dcbee45f5a967',16,'2025-02-15 19:23:53','2025-02-08 19:23:53'),(17,'425f0d9c380cef61d3c0a05ca81d9eceb5a74079047c1f679c2f87364f578a06c6e09c9fd455cfd1',16,'2025-02-15 20:29:14','2025-02-08 20:29:14'),(18,'66112d816e5a557e8f618333a4efddb315cedf44133b4cb0f3a93aa9d8939082e7cc4d7650de5ca7',1,'2025-02-15 22:35:53','2025-02-08 22:35:53'),(19,'3fcfde04d8456d5070ad2cebdb3967f0e9e84c1b6ce517b379cf623e2eca79d5f014cff793f8c5d2',1,'2025-02-15 22:39:50','2025-02-08 22:39:50'),(20,'b357262b517c81cac417729b58f1723f01d8e1e6fa8aeed03cc288cdea43f485a293ba2d9f8c3afe',16,'2025-02-15 22:40:12','2025-02-08 22:40:12'),(21,'49c75f9674daeba5ed000f3bfdee3192f61cef31b1ce1b4c06716a247cbbe41e77419e99b87f74db',4,'2025-02-15 22:42:01','2025-02-08 22:42:01'),(22,'c5ed25f290e3b238f7d4c38568a6ce7d710f35ae0bf43c4e9ba6390da666873a2902ef6143cdcaaf',20,'2025-02-15 22:44:09','2025-02-08 22:44:09'),(23,'7e3ea22f4283be6ca9595cf70bd7a190a69562f3e7b24c93bdf5db85ea232daad921c2987bad54ae',4,'2025-02-16 06:49:15','2025-02-09 06:49:15'),(24,'5ca77f0152197750109b8c28521273bbe131743c3339ddba2803e4d51e46a6ecdd086ef8850266ab',16,'2025-02-16 06:49:26','2025-02-09 06:49:26'),(25,'6afdf42f192fc00b0ab9edd49c5d506e410c30d8cf5fc48c0754b14f212f553deaa4974b8e8dd404',1,'2025-02-16 06:50:04','2025-02-09 06:50:04'),(26,'d5082e8c450d9188cb6b0b7cfb883c08b3e0b2d2d8b98df5804dc4369eaaae65f5636e074dfd17e0',1,'2025-02-16 09:32:37','2025-02-09 09:32:37'),(27,'06f8b53d4c790ac486f4d0ab932cdbc76d07430a0fde69b8fc67ff934d68e18fc681c9638c1ecf3e',16,'2025-02-16 09:33:31','2025-02-09 09:33:31'),(28,'2f60ce71ee48405bd5bf01ee52065b6b3eae26139863036386f4920ae27b2ab01129a18aafabc375',1,'2025-02-16 15:00:01','2025-02-09 15:00:01'),(29,'68257658cae5d9fa3baebfcd7bc145b787dfa4f9b65a40dff82230c3c6378910528beb4b3f849537',1,'2025-02-16 16:01:03','2025-02-09 16:01:03'),(30,'d419a09bded63af4873671059d5983e8bcde02925e1e3048d0fdbc43f640aaa02ca9d7bc49875038',1,'2025-02-16 23:45:00','2025-02-09 23:45:00'),(31,'1afd2ec3e79642fe9bf6c7bc97221fe291c7dcce74045f6b15ae817df8f0462cf6906cd6ed8f7e36',1,'2025-02-17 08:52:52','2025-02-10 08:52:52'),(32,'bb92fca0a2ae35753564fdbb08381699a9a11a003d0c59453e1ccc8fde507fe4bef5c81a797cee96',16,'2025-02-17 09:18:58','2025-02-10 09:18:58'),(33,'e35685cfd35d580170e27dbb0d3d7ac4abb6c1e4ac895ca4508a994a259a04cf8ce9d22c5c8cb1dd',1,'2025-02-17 09:26:58','2025-02-10 09:26:58'),(34,'6082c5d5ad7ad385c5ef8c3bb5eef84eca5cbfedd78ce303de23e6e4a1250654de1b8153d58b5ff5',1,'2025-02-17 10:30:06','2025-02-10 10:30:06'),(35,'ee6d28ce7fdef67387357b77c860ebcf1080bd769eb48149d98b3391aa5d2abd5963ec754d52d1c5',16,'2025-02-17 12:04:34','2025-02-10 12:04:34'),(36,'1168cc2b8e5f0e9082f724fa49b2237718ba495748aaae51fd7a05f6a7d2dd7d5f02758e0aa60223',16,'2025-02-17 12:18:29','2025-02-10 12:18:29'),(37,'426b00c74230c44da75fa915c74cfe33e0b86e5c10d8bf9ce7d50c1795badefa4ba47e163f8aae78',2,'2025-02-17 14:30:20','2025-02-10 14:30:20'),(38,'2232ca25ae74b648fb660fe22239cc1c423afe122e7872c9e077063d8c51deb67a603193706496bc',4,'2025-02-17 14:50:55','2025-02-10 14:50:55'),(39,'549f93e5c0167ed3de02574a676d18972a28d8b132ff910300e55f1f03c5bcddc36abe19cf58e4d7',1,'2025-02-17 14:51:53','2025-02-10 14:51:53'),(40,'7375a1970f6b2a94ccc74b0150895451a7abb008eac6e29137afb7abe4023157083d1e69f3272ff6',21,'2025-02-17 20:48:13','2025-02-10 20:48:13'),(41,'24859be60ca48991b319768f3fc0c8018bd7776882a90c774b304a6776f0e0dd4c50d06cc29e6ce8',1,'2025-02-17 21:03:04','2025-02-10 21:03:04'),(42,'1c4924ee6cbe7204ea37b43b5e7c51730ece66eeee582e2adcb4fa994d915d78a19b5ee32f20d419',21,'2025-02-17 22:20:10','2025-02-10 22:20:10'),(43,'c13ceb6cdcfc43ebdda0384c1f0db8ab888103899a7d1cdd12d98cd71efb7917cb4f2a5dbf0b00a5',1,'2025-02-17 22:41:37','2025-02-10 22:41:37'),(44,'be702425d7af0ca5dc2cfd64aee62773750d305166fe08d162c307332029d85fcf112b370188f4da',21,'2025-02-17 22:46:32','2025-02-10 22:46:32'),(45,'cd16782c8279d9258f72058be21bea2b3accc057003c032245e4367045866fd97f40235633a541ab',16,'2025-02-17 23:01:01','2025-02-10 23:01:01'),(46,'8ee5b28b34b240bc77d1f31b992c2c71bdf9e3eccf12af9aac9e6458fbc6bef0c2b627cbdabfe941',22,'2025-02-17 23:32:06','2025-02-10 23:32:06'),(47,'43f0db893cdb3df862d24cf518f81fbe9910f30705b5fc35d4fd63ccda88424005c5d7611b0f8725',23,'2025-02-17 23:32:38','2025-02-10 23:32:38'),(48,'552afa3cdf748143a8b61af386277b906a97b96d886d56139b44c10d6c118296904c98d3176eaee1',24,'2025-02-17 23:33:08','2025-02-10 23:33:08'),(49,'7423e65554bc0b73fcd6e56265c0b822e35bac0e98c5213bb81d234d7c1e9726a1cc07ececdd8520',25,'2025-02-17 23:33:56','2025-02-10 23:33:56'),(50,'b87f8de005fb874692e396ea50017dd5c73b162ac80914f0bd6e98774efb7ebe3f735881c2d2b72f',16,'2025-02-17 23:34:18','2025-02-10 23:34:18'),(51,'8b141a3d51129017075c65ab967da49e60602876369b0695e90df649134d4a0770b82c5a892f5de7',2,'2025-02-17 23:37:40','2025-02-10 23:37:40'),(52,'3960c6a07fd3a79c4442cc71365b17bfa31ef30b047cb2e671e4e72b5a6b2bc96fc00c5fa7ffb0a2',21,'2025-02-17 23:37:59','2025-02-10 23:37:59'),(53,'4d2a76661eb32ffba40bd0e71861627fb11c86e5c041d2b4af9aafd896e075444630f2b97151b3ca',1,'2025-02-18 08:20:35','2025-02-11 08:20:35'),(54,'03e5f5d161afdcdab14a2b431d8c6ba3684ff1b7d10fd5d4c204aa94beb228ebb2c811382e58500e',26,'2025-02-18 08:26:43','2025-02-11 08:26:43'),(55,'c8bd8cadea106c2b354f1561f87a0f9ffc02f33e5ce842cca65ffda9edf15d4d7c7d13800b99eccd',1,'2025-02-18 08:37:19','2025-02-11 08:37:19'),(56,'464d2d6f5a46293d91831293f4e72286475e4d90bd980102bec98f153f79eeea2041ef2a8e518a00',2,'2025-02-18 08:40:36','2025-02-11 08:40:36'),(57,'b2f3e85a0d8b1678c457e229d54c8d90eaa68fa4e41aff3f49201c58c1a5089cf3751d4ce232020f',3,'2025-02-18 08:41:36','2025-02-11 08:41:36'),(58,'7defd67bc4572c06c74c9f390895b4a7a1175146421edaabfaac874fd4f4fcba505cc3395a73f2e3',4,'2025-02-18 08:42:27','2025-02-11 08:42:27'),(59,'3e80aea089c90fd11aad818f5d0d75035ccef010e9a5b897e7ac30d75a264daa36f0f09661fcb5ae',5,'2025-02-18 08:43:20','2025-02-11 08:43:20'),(60,'9e3d3e67c96a8fd65d9329ac7ded43dd4bd6ca1bfbe6aead1a0b7238de4c77471d178bd1831a003f',6,'2025-02-18 08:44:11','2025-02-11 08:44:11'),(61,'524e5433156f07758ec91392fb50a88117605908bdff0ca481426f7aa0f048a5b7163a2ca5d8488c',7,'2025-02-18 08:46:55','2025-02-11 08:46:55'),(62,'045d62d5e1d8e23bf59fa92cf539e45eb452337d542574c17301ca816396cc644dea58c3863691ee',8,'2025-02-18 08:48:54','2025-02-11 08:48:54'),(63,'7a6a380fc12721a6473821adaa2e569e59de5c721bfd157376af4a5c02de90ad14475709568db626',9,'2025-02-18 08:50:57','2025-02-11 08:50:57'),(64,'a62f127a98debc80111a5c4aeffd21b4265a54c28d0aaee93d6f3cd9db41615ff21dfa2a95353d0c',6,'2025-02-18 08:52:47','2025-02-11 08:52:47'),(65,'878930abefbc2dfd316921a48ef8e76d6bdb9a5a5e8efdd14370ad5586b6e1b0222f0282123ce94a',5,'2025-02-18 08:58:05','2025-02-11 08:58:05'),(66,'98cd31494af8dcad607863ae173b990aff0fdce972dd31e37f8a2c2cae797ef4d51a97056c6e661d',7,'2025-02-18 08:59:02','2025-02-11 08:59:02'),(67,'ffbfdf18e283392a1e96e88b04da163766e9d7fd381a6b6d066b9b84d00fc5b2d6c8785bd3f81705',8,'2025-02-18 09:03:15','2025-02-11 09:03:15'),(68,'73f8d6b5574ab7dfbf54e77e52e58df122543edc71f38f980c44824d583211ce4f5e13d5d871fc39',5,'2025-02-18 09:04:19','2025-02-11 09:04:19'),(69,'854bf0ac318907a3802a012dbc87f3f7339c585356b945a02f7383d622238302eb2e8131c66afd83',1,'2025-02-18 09:07:06','2025-02-11 09:07:06'),(70,'e62bff37dd1525f6fe3ff2423d05562995a367fc49e1fcd701e46bbccb3428a259f4d8625dfbc905',2,'2025-02-18 09:07:24','2025-02-11 09:07:24'),(71,'ee80dd3f5cfea63add52a5a513808208bd732013c1ceea187386587b56505c99b5378b92dfc3bad9',6,'2025-02-18 09:08:11','2025-02-11 09:08:11');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'John Smith','john@gmail.com','$2y$10$XtvXvfYR/xapxPEOHGnfZenDgqfZ15n6V6tX24UfzV0v.LHgWK3RC','Learner','2025-02-11 08:37:19','2025-02-11 08:37:19'),(2,'Emily Johnson','emily@gmail.com','$2y$10$DBaMzYF6P7nDnq/kdS5luO6r2DYO1MighmqzuDp7ZzQDEYEeIa2Uy','Learner','2025-02-11 08:40:36','2025-02-11 08:40:36'),(3,'Daniel Brown','daniel@gmail.com','$2y$10$LfLCs2zyIK49qMwwBAHkcewSP5ukb2ElkR2cG4q9/OQjaw5aQzt1G','Learner','2025-02-11 08:41:36','2025-02-11 08:41:36'),(4,'Sarah Miller','sarah@gmail.com','$2y$10$hd/fqkXSV8bKLD6pj9FtEu8kF3uzHRjz0rSOHuETpYHRf/kTCT3fe','Learner','2025-02-11 08:42:27','2025-02-11 08:42:27'),(5,'Michail Davis','michael@gmail.com','$2y$10$S6bzRkyZkcSVUCTbbUXvGe5g7aP/8QNcItVpwY2ozSPNrt5L3vqfC','Learner','2025-02-11 08:43:20','2025-02-11 08:43:20'),(6,'William Clark','william@gmail.com','$2y$10$FTlaQx.zdXAUAvDG0qLtpO1fSbUjhSW3QIWqn4ufejm.UoBUdjPeu','Teacher','2025-02-11 08:44:11','2025-02-11 08:44:11'),(7,'Sophia Adams','sophia.a@email.com','$2y$10$YJsRbjF9lR9FMmxbf6c5YO/IMfHG7mUypvvAP8UVjfCxWgOjTF.cq','Teacher','2025-02-11 08:46:55','2025-02-11 08:46:55'),(8,'Benjamin Hall -','hall@gmail.com','$2y$10$BymhLinmsy/FFgKu0URZLuh7zGJ1BbsoUPdLnQJ5NTjkZrU637d/.','Teacher','2025-02-11 08:48:54','2025-02-11 08:48:54'),(9,'maftuna','maftuna@gmail.com','$2y$10$tHB0jzhrdHRuSM81L/BteOkbT1oIghTHY072XHfc2xS8OB78ZWVbW','Admin','2025-02-11 08:50:57','2025-02-11 08:50:57');
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

-- Dump completed on 2025-02-11  9:10:01
