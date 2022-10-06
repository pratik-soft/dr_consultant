-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: test_consultant
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
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient_symptoms_form`
--

DROP TABLE IF EXISTS `patient_symptoms_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient_symptoms_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnoses` text NOT NULL,
  `past_medical_history` text NOT NULL COMMENT 'Past medical history',
  `chest_pain` tinyint(1) NOT NULL COMMENT 'Chest pain',
  `tightness` tinyint(1) NOT NULL,
  `pulpitations` tinyint(1) NOT NULL,
  `shortness_of_breath` tinyint(1) NOT NULL COMMENT 'SOB: Shortness of breath',
  `orthopnea` tinyint(1) NOT NULL COMMENT 'O: Orthopnea',
  `pnd` tinyint(1) NOT NULL COMMENT 'PND: Paroxysmal nocturnal dyspnea',
  `swelling_of_ankles` tinyint(1) NOT NULL COMMENT 'SOA: Swelling of ankles',
  `coughing` tinyint(1) NOT NULL COMMENT 'C: Coughing',
  `wheezing` tinyint(1) NOT NULL COMMENT 'W: Wheezing',
  `sputum` tinyint(1) NOT NULL COMMENT 'S: Sputum',
  `dizziness` tinyint(1) NOT NULL COMMENT 'D: Dizziness',
  `presyncope` tinyint(1) NOT NULL COMMENT 'PRE: Presyncope',
  `tiredness` tinyint(1) NOT NULL COMMENT 'Tiredness',
  `exercise` tinyint(1) NOT NULL COMMENT 'Exercise',
  `other_symptoms` text NOT NULL COMMENT 'other symptoms',
  `central_nervous_system` text NOT NULL COMMENT 'CNS: Central nervous system',
  `musculoskeletal` text NOT NULL COMMENT 'MSK: Musculoskeletal',
  `gastrointestinal` text NOT NULL COMMENT 'GI: Gastrointestinal',
  `urogenital_symptoms` text NOT NULL COMMENT 'UGS: Urogenital symptoms',
  `skin` text NOT NULL COMMENT 'Skin',
  `gynae` text NOT NULL COMMENT 'Gynae',
  `medications` tinyint(1) NOT NULL COMMENT 'Meds: Medications',
  `drug_allergies` text NOT NULL COMMENT 'Drug allergies',
  `updates` text NOT NULL COMMENT 'Updates',
  `risk_factors` text NOT NULL COMMENT 'RF: Risk factors',
  `family_history` text NOT NULL COMMENT 'FHx: Family History',
  `interventions` text NOT NULL COMMENT 'Invs: Interventions',
  `new_tests` text NOT NULL COMMENT 'New tests',
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient_symptoms_form`
--

LOCK TABLES `patient_symptoms_form` WRITE;
/*!40000 ALTER TABLE `patient_symptoms_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient_symptoms_form` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-10 14:28:55
