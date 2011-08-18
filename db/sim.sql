-- MySQL dump 10.13  Distrib 5.1.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sim
-- ------------------------------------------------------
-- Server version	5.1.54-1ubuntu4

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
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (1,'Deneme Olgusu Sisteme işlendi','Olguya Müdahil olabilmek için bilmem ne yapınız'),(2,'Sistemd Çalışmalar Devam ediyor','Çalışılıyo öyle işte'),(3,'Simulation v1.4.9.5 has been released!','Full and Patch Only: http://test.omu.edu.tr');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `d_survey`
--

DROP TABLE IF EXISTS `d_survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `d_survey` (
  `d_survey_id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`d_survey_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_survey`
--

LOCK TABLES `d_survey` WRITE;
/*!40000 ALTER TABLE `d_survey` DISABLE KEYS */;
INSERT INTO `d_survey` VALUES ('117','Skrotal US','null','null'),('114','Submandibuler bez US','null','null'),('115','Toraks US','null','null'),('116','Yüzeysel doku US','null','null'),('113','Paratis bezi US','null','null'),('108','Renal US','null','null'),('109','Üriner sistem US','null','null'),('110','Tiroid US','null','null'),('111','Transfontanel US','null','null'),('112','Boyun US','null','null'),('107','Hepatobilier US','null','null'),('104','Pompa BT','null','null'),('105','Abdomen (üst) US ','null','null'),('106','Suprapubik pelvik US','null','null'),('103','BT tomografi ve diğer','null','null'),('102','BT radyoterapi planlaması için tomog.','null','null'),('101','BT eşliğinde girişimsel tetkik (biyopsi vb.)','null','null'),('99','Dinamik BT incelemesi','null','null'),('100','BT perfüzyon çalışmaları','null','null'),('98','BT sanal endoskopi','null','null'),('96','BT kantitatif tomografi (kals.skor.) BTBMD g','null','null'),('97','Üç boyutlu(3D) BT','null','null'),('95','BT anjiografi ve tek anatomik bölge','null','null'),('94','BT yüksek rezolusyonlu akciğer ve ekspratuar','null','null'),('93','Yüksek rezol.AC BT (HRCT)','null','null'),('92','Toraks BT','null','null'),('89','Üst abdomen BT','null','null'),('90','Vertebra (4 adet) BT','null','null'),('91','Extremite ( 20-50cm ) BT','null','null'),('87','BT ve dental tomografi','null','null'),('88','Alt abdomen(pelvik) BT','null','null'),('86','Orbita BT','null','null'),('85','Maksillofasial BT Koronal','null','null'),('82','BT ve tempomandibular eklem','null','null'),('83','Larenks BT','null','null'),('84','Maksillofasial BT Aksiyel','null','null'),('80','Paranasal sinüs BT Aksiyel','null','null'),('81','Paranasal sinüs BT Koronal','null','null'),('78','Nazofarenks BT Aksiyel','null','null'),('79','Nazofarenks BT Koronal','null','null'),('77','BT ve hava veya opaklı sisternografi','null','null'),('76','Temporal BT','null','null'),('75','Hipofiz(sella) BT','null','null'),('73','Beyin BT','null','null'),('74','Boyun Tomografisi','null','null'),('72','Kalça Grafisi (iki yön) Karşılaştırmalı','null','null'),('71','Kalça Grafisi Karşılaştırmalı (Tek Yön)','null','null'),('69','Kalça Eklemi Grafisi (Tek Yön)','null','null'),('70','Kalça Eklemi Grafisi (iki yön)','null','null'),('68','Pelvimetri (iki yön)','null','null'),('67','Pelvis Grafisi (Sakro İliak Eklem)','null','null'),('66','Pelvis Grafisi (2 Yönlü)','null','null'),('65','Pelvis Grafisi','null','null'),('64','Skolyoz tetkiki','null','null'),('63','L5-S1 spot grafisi','null','null'),('62','Lomber Vertebra Grafileri (dört yön )','null','null'),('61','Lomber Vertebra Grafileri (üç yön )','null','null'),('60','Lomber Vertebra Grafileri (iki yön )','null','null'),('58','Dorsal (Torakal) Vertebra Grafisi 3 Yönlü','null','null'),('59','Lomber Vertebra Grafisi ve AP','null','null'),('57','Dorsal (Torakal) Vertebra Grafisi 2 Yönlü','null','null'),('56','Dorsal (Torakal) Vertebra Grafisi ve AP','null','null'),('55','Servikal Vertebra Grafisi (dört yön)','null','null'),('54','Servikal Vertebra Grafisi (üç yön)','null','null'),('53','Servikal Vertebra Grafisi (iki yön)','null','null'),('52','Servikal Vertebra Grafisi (tek yön)','null','null'),('51','Kafa grafisi (Dört yön) ','null','null'),('50','Kafa grafisi (iki yön) ','null','null'),('49','Kafa grafisi (tek yön)','null','null'),('48','Sella spot grafisi','null','null'),('47','Temporo-mandibuler grafi (Karşılaştırmalı)','null','null'),('46','Mandibula Grafisi','null','null'),('45','Stenvers Grafisi (Karşılaştırmalı)','null','null'),('44','Schuller grafisi (Karşılaştırmalı)','null','null'),('43','Sinüs (Water\'s) Grafisi','null','null'),('42','Floroskopi-Skopi','null','null'),('41','Kalp teleradyogram (üç yön) baryumlu','null','null'),('40','Kalp teleradyogram (üç yön) ','null','null'),('39','Kalp teleradyogram (iki yön)','null','null'),('38','Kalp Teleradyogram (tek yön)','null','null'),('37','Akciğer Grafisi Lateral','null','null'),('36','Akciğer Grafisi ve Lateral Dekibitüs ','null','null'),('35','Akciğer Grafisi ve Apikolordotik ','null','null'),('34','Akciğer Grafisi (üç yön) Baryumlu ','null','null'),('33','Akciğer grafisi (üç yön) ','null','null'),('32','Akciğer Grafisi (iki yön)','null','null'),('31','Artrografi MR','null','null'),('30','MR Temporo-Mandibula Eklem MR','null','null'),('29','Ayak-Bilek Eklem','null','null'),('28','Diz Eklem MR','null','null'),('27','Sakro-ilikal Eklem MR','null','null'),('26','Kalça Eklem MR','null','null'),('25','El-Bilek Eklem MR','null','null'),('24','Dirsek Eklem MR','null','null'),('23','Myelografi MR Omuz Eklem MR','null','null'),('22','Lomber Vebtebra MR','null','null'),('21','Torakal Vebtebra MR','null','null'),('20','Servikal Vebtebra MR','null','null'),('19','Ürografi MR','null','null'),('18','Kolanjiografi MR','null','null'),('17','Dinamik MR','null','null'),('16','Meme MR','null','null'),('15','Alt Abdomen MR','null','null'),('14','Üst Abdomen MR','null','null'),('13','Spektroskobi MR','null','null'),('12','Anjiyografi MR','null','null'),('11','Kardiyak MR','null','null'),('10','Akciğer ve Mediasten MR','null','null'),('9','Boyun MR','null','null'),('8','Nazofarinks MR','null','null'),('7','Orbita MR','null','null'),('6','Kulak MR','null','null'),('5','Hipofiz MR','null','null'),('4','Bos Akım MR','null','null'),('3','Perfüzyon MR','null','null'),('2','Diffüzyon MR','null','null'),('1','Beyin MR','null','null'),('118','Eklem US (tek taraf)','null','null'),('119','Kalça eklemi US','null','null'),('120','Transrektal US','null','null'),('121','Transvajinal US','null','null'),('122','Obstetrik US','null','null'),('123','Endoskopik US','null','null'),('124','Orbita US (bilateral )','null','null'),('125','US Eşliğinde parasentez ve torosentez','null','null'),('126','Görüntüleme eşliğinde biyopsi (US)','null','null'),('127','Perkütan Akciğer absesi drenajı','null','null'),('128','Perkütan abse drenajı','null','null'),('129','Perkütan Nefrostomi','null','null'),('130','Perkütan ampiyem drenajı','null','null'),('131','Alt Ekstremite venöz sis. ve tek taraflı RDUS','null','null'),('132','Alt ekstremite venöz sis.iki taraflı RDUS (GH','null','null'),('133','Alt Ekstremite arteriel sis. tek taraflı RDUS','null','null'),('134','Alt Ekstremeti Arterial Sis.iki taraflı RDUS ','null','null'),('135','Üst Ekstremite venöz sistem tek taraflı RDUS ','null','null'),('136','Üst ekstremite venöz sistem iki taraflı RDUS ','null','null'),('137','Üst Ekstremite arteriel sistem tek taraflı RD','null','null'),('138','Üst Ekstremite Arterial Sis.iki taraflı RDUS ','null','null'),('139','Orbita RDUS','null','null'),('140','Tiroid RDUS','null','null'),('141','Transrektal RDUS','null','null'),('142','Karotis renkli Doppler US','null','null'),('143','Vertebral arter RDUS','null','null'),('144','Renal RDUS (bilateral)','null','null'),('145','Penil RDUS','null','null'),('146','Skrotal RDUS','null','null'),('147','Portal ven RDUS','null','null'),('148','Abdominal aorta RDUS','null','null'),('149','Kitle lezyonu RDUS','null','null'),('150','Meme RDUS','null','null'),('151','Obstetrik RDUS','null','null'),('152','Transfontonel RDUS','null','null'),('153','Transkranial RDUS','null','null'),('154','Tümör FDG PET','null','null'),('155','Miyokard PET','null','null'),('156','Beyin PET','null','null'),('157','Diğer PET','null','null');
/*!40000 ALTER TABLE `d_survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discipline`
--

DROP TABLE IF EXISTS `discipline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discipline` (
  `discipline_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`discipline_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discipline`
--

LOCK TABLES `discipline` WRITE;
/*!40000 ALTER TABLE `discipline` DISABLE KEYS */;
INSERT INTO `discipline` VALUES (1,'Radyolojik'),(2,'Biyokimya'),(3,'Patolojik'),(4,'Mikrobiyoloji'),(5,'Nükleer Tıp');
/*!40000 ALTER TABLE `discipline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surveys` varchar(45) NOT NULL,
  `results` varchar(45) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `patient_id` (`patient_id`),
  KEY `story_id` (`story_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,1,1,'deneme-olgu','12:1,5,7,8,12','1;2,5,6'),(2,1,2,'Tarım ilacı Zehirlenmesi','null','null');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node`
--

DROP TABLE IF EXISTS `node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `media` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `content` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `question` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `options` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `parent` int(10) unsigned NOT NULL,
  `isOnset` tinyint(1) NOT NULL,
  `isWrong` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node`
--

LOCK TABLES `node` WRITE;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
INSERT INTO `node` VALUES (1,'Patient Presentation','','','','Order Tests:2',0,0,1,0),(2,'Tests','nursing.jpg','The patient is waiting and the nurse asks what tests you\'d like to order.','Which tests would you like to order?','Lumbar puncture:3, CT Scan:4',1,1,0,0),(3,'Results','','','','Incorrect -- try again:2',0,2,0,1),(4,'CT Results','tutor-service.jpg','Başarıyla tamamladınız.','','',0,2,0,0);
/*!40000 ALTER TABLE `node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `discipline_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`parent_id`),
  KEY `discipline_id` (`discipline_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent`
--

LOCK TABLES `parent` WRITE;
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
INSERT INTO `parent` VALUES (25,2,'İlaç Düzeyleri'),(24,2,'Kan Gazı'),(23,2,'Rutin İdrar Tetkiki'),(22,2,'Hemogram'),(21,2,'Rutin Biyokimya'),(11,1,'Direkt Radyografi İstem Formu'),(12,1,'Manyetik Rezonans Görüntüleme İstem Formu'),(13,1,'Bilgisayarlı Tomografi Görüntüleme istem Form'),(14,1,'Ultrasonografi Görüntüleme istem Formu'),(15,1,'Doppler Ultrasonografi İstem Formu'),(26,2,'BOS Biyokimya'),(27,2,'HPLC Testleri'),(28,2,'İdrar Biyokimya'),(29,2,'Hormon Testleri'),(41,4,'Merkez Mikrobiyoloji Tetkik İstem Formu'),(42,4,'Hematolojik Testler Formu'),(43,4,'İmmünolojik Testler Formu'),(44,4,'Merkez Lab. Adli Toksikoloji İstem Formu'),(51,5,'Pozitron Emisyon Tomografi'),(52,5,'I-131 MIBG Sintigrafisi İstem Formu'),(53,5,'In-111 Octreotid Sintigrafisi İstem Formu'),(54,5,'Tc-99m Hmpao İşaretli Lökosit Sintigrafisi İs');
/*!40000 ALTER TABLE `parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `age` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (1,'cemal','yıldız','33','E');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `tc` bigint(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `super` int(1) NOT NULL,
  `type` int(1) NOT NULL,
  `photo` varchar(45) NOT NULL,
  PRIMARY KEY (`tc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (32977301484,'emin','eker','bal19',1,1,'32977301484.jpg'),(11111111111,'bal19','bal19','bal19',1,1,'11111111111.jpg'),(22768864182,'Gökhan','Demir','159654kafkef55',1,1,'default.jpg');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `tc` bigint(20) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `results` varchar(45) NOT NULL,
  `comment` varchar(45) NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `case_id` (`event_id`),
  KEY `tc` (`tc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `story`
--

DROP TABLE IF EXISTS `story`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `story` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(45) NOT NULL,
  `content` varchar(800) NOT NULL,
  `photo` varchar(45) NOT NULL,
  PRIMARY KEY (`story_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `story`
--

LOCK TABLES `story` WRITE;
/*!40000 ALTER TABLE `story` DISABLE KEYS */;
INSERT INTO `story` VALUES (1,'Yaralanma Vakası','Arkadaşları tarafından acil servise getirilen öyküsünde yarım saat önce uyluk bölgesinden bıçaklandığı belirtilen, yapılan muayenesinde sağ uyluk üstünde yara bölgesinde sızıntı şeklinde aktif kanaması olan hastaya Uyluk bölgesinden yaralandığı belirtilen şahsın ilk müdahalesini yapıp gerekli öncül tetkikleri yaptıktan sonra yaralanma bölgesi ile ilgili acil yaklaşım gerektiren patolojik durum ne olabilir?','bicaklanma.jpg'),(2,'Çiçek Serası Çalışanı merdivenden düştü','33 yaşındaki Hamdi Mersin, çiçek serasında ilaçlama yaptıktan sonra, çiçek serasının tavanındaki bir hasarı gidermek için merdivene çıkarken, kendini kötü hissetmiş, bulantısı olmuş, kısa süreli bir baygınlık geçirmiş, gözleri kararmış ve  5 basamak yukarıdan yere düşmüştür. Düşme sırasında boyun ve bel bölgesini zemindeki beton çıkıntıya çarpmıştır. Kafasına ise bir darbe almadığını belirtmiştir. Doktor olarak görev yaptığınız, çiçek serasının 50 metre uzağında bulunan  aile hekimliği merkezinden, hastaya müdahale etmeniz için çağrıldınız.','sera-hastasi.jpg');
/*!40000 ALTER TABLE `story` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_survey_id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`survey_id`),
  KEY `discipline_id` (`d_survey_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey`
--

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
INSERT INTO `survey` VALUES (1,'1','Beyin MR','null'),(2,'1','Diffüzyon MR','null'),(3,'1','Perfüzyon MR','null'),(4,'1','Bos Akım MR','null'),(5,'1','Hipofiz MR','null'),(6,'1','Kulak MR','null'),(7,'1','Orbita MR','null'),(8,'1','Nazofarinks MR','null'),(9,'1','Boyun MR','null'),(10,'1','Akciğer ve Mediasten MR','null'),(11,'1','Kardiyak MR','null'),(12,'1','Anjiyografi MR','null'),(13,'1','Spektroskobi MR','null'),(14,'1','Üst Abdomen MR','null'),(15,'1','Alt Abdomen MR','null'),(16,'1','Meme MR','null'),(17,'1','Dinamik MR','null'),(18,'1','Kolanjiografi MR','null'),(19,'1','Ürografi MR','null'),(20,'1','Servikal Vebtebra MR','null'),(21,'1','Torakal Vebtebra MR','null'),(22,'1','Lomber Vebtebra MR','null'),(23,'1','Myelografi MR Omuz Eklem MR','null'),(24,'1','Dirsek Eklem MR','null'),(25,'1','El-Bilek Eklem MR','null'),(26,'1','Kalça Eklem MR','null'),(27,'1','Sakro-ilikal Eklem MR','null'),(28,'1','Diz Eklem MR','null'),(29,'1','Ayak-Bilek Eklem','null'),(30,'1','MR Temporo-Mandibula Eklem MR','null'),(31,'1','Artrografi MR','null');
/*!40000 ALTER TABLE `survey` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-08-18 16:00:46
