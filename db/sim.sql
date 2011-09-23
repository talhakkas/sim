-- MySQL dump 10.13  Distrib 5.1.56, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: sim
-- ------------------------------------------------------
-- Server version	5.1.56-0.dotdeb.1

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
-- Table structure for table `ncase`
--

DROP TABLE IF EXISTS `ncase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ncase` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `type_playable_by` int(11) NOT NULL,
  `type_navigation_panel` int(11) NOT NULL,
  `patient_info` int(11) NOT NULL,
  `edu_opts` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `bdugumu` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ncase`
--

LOCK TABLES `ncase` WRITE;
/*!40000 ALTER TABLE `ncase` DISABLE KEYS */;
INSERT INTO `ncase` VALUES (1,'Çiçek Serası Çalışanı merdivenden düştü','TODO',0,0,0,0,0,1);
/*!40000 ALTER TABLE `ncase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node`
--

DROP TABLE IF EXISTS `node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(10) unsigned NOT NULL,
  `title` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `media` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `content` varchar(10000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `question` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `options` varchar(10000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `type` varchar(5) COLLATE utf8_turkish_ci DEFAULT NULL,
  `parent` int(10) unsigned DEFAULT NULL,
  `isOnset` tinyint(1) DEFAULT NULL,
  `isWrong` tinyint(1) DEFAULT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node`
--

LOCK TABLES `node` WRITE;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
INSERT INTO `node` VALUES (10,4,'Hata: olay yerine gitmek',NULL,'','Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirilmemiş oldu?','Aşağıdaki boşluğa yanıtınız yazıp gönder tuşuna tıklayınız.;;Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.::5','dal',0,0,0,1),(9,3,'Doğru: devam',NULL,'','Olay yerine gitmeniz, hekimin yasal sorumluluklarından hangisi içine girer?','Yanıtınızı aşağıdaki alana yazıp gönder tuşuna tıklayınız.;;Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.::5','dal',0,0,0,1),(7,1,'Giriş','_n00007.jpg','33 yaşındaki Hamdi Mersin, çiçek serasında ilaçlama yaptıktan sonra, çiçek serasının tavanındaki bir hasarı gidermek için merdivene çıkarken, kendini kötü hissetmiş, bulantısı olmuş, kısa süreli bir baygınlık geçirmiş, gözleri kararmış ve  5 basamak yukarıdan yere düşmüştür. Düşme sırasında boyun ve bel bölgesini zemindeki beton çıkıntıya çarpmıştır. Kafasına ise bir darbe almadığını belirtmiştir. Doktor olarak görev yaptığınız, çiçek serasının 50 metre uzağında bulunan  aile hekimliği merkezinden, hastaya müdahale etmeniz için çağrıldınız.::','Bundan sonraki yaklaşımınız ne olur?','Hastalara ilk acil müdahalenin, 112 acil ambulans merkezi tarafından yapılmasının gerektiğini, bu nedenle aile hekimliği kliniğini terk edemeyeceğimi belirtirim. Bu belirtilen hususu ilgili klinik muayene defterine kayıt ederim.::2::0::5,,Hastanın durumunu görmek ve gerekirse tıbbi müdahale etmek için, varsa yardımcı sağlık personeli eşliğinde, yoksa bizzat kendim acil hastaya müdahale etmek için çiçek serasına giderim. ::3::6::,,Aile hekimliği merkezi sorumlusunun resmi iznini beklerim. Gerekli izin alınınca olay yerine giderim. ::4::::5','dal',1,1,0,1),(8,2,'Hata: acil mudahele',NULL,'','Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirmemiş oldunuz?','Yanıtınızı aşağıdaki boşluğu basıp gönder tuşuna basınız.;;Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.::5','dal',0,0,0,1),(11,5,'Acil hastaya müdahele prensipleri','_n00011.jpg','5 dakika içinde gerekli tıbbi aletleriniz ile olay yerine ulaştınız. 112 Ambulans merkezine haber verilmesini sağladınız. Sonrasında bir paramedik sağlık memuru da, size yardımcı olabileceğini belirterek sizinle beraber hasta başına geldi. Hasta seranın içinde, açık kapının yanındaki kanepede uzanmaktadır. Halen bulantısı olduğunu belirten hasta, doktor bey bana yardımcı olur musunuz, kendimi iyi hissetmiyorum  demektedir ? Kanepenin yanında, ağzı açık metal kutular bulunmaktadır. Hasta karın ağrısı şikayetininde olduğunu belirtmekte ve yardım istemektedir. <br>\r\nBundan sonraki aşamada ne yaparsınız?::,,\r\n\r\n1- Olay yeri ve çevresini hızlıca incelerim. Aynı anda havayolu, solunum dolaşım kontrolü için hastayı değerlendiririm. Kanepe yanındaki teneke kutuların ne için kullanıldığını sorarım.::\r\n\r\n2- Cevap: Doktor bey bunlar senelerdir çiçek serasında kullandığımız tarım ilaçlarının kutuları. Çiçeklerin üzerinde yerleşen böceklerin öldürülmesi için kullanıyoruz. Ancak bugün ilaçlamada kullanılan k,,','Bundan sonraki yaklaşımınız ne olur?','Hastanın zehirlenmiş olabileceğini de düşünüp, yeni kullanıldığı belirtilen tarım ilacı kutusunu da getirmelerini isterim ve sera içinde kanepede yatan hastanın öyküsünü öyküsünü alıp, fizik muayenesine geçerim. ::6,,Hastanın öyküsünü alıp, muayenesini yapmadan önce:.....;;doğru yanıt::7','dal',0,0,0,1),(12,6,'Hata: transport gerekirdi',NULL,'Doktor bey öncelikle hastanın ve sağlık çalışanlarının güvenliği için hastanın seradan uzak havadar bir yere transportunu öneriyorum.','','Transport gerekirdi.::8','dal',0,0,0,1),(13,7,'Acil hastaya yaklaşımda çevre güvenliği',NULL,'Hastanın ve sağlık çalışanlarının güveliği için öncelikle hastanın sera içinde yattığı yerden, havadar ve açık bir alana nakli gerekmektedir. ','','Transport et::8','dal',0,0,0,1),(14,8,'Hastanın taşınması','_n00014.jpg','Hasta taşınmasında yakınları, hastayı battaniye üzerine taşımak istemektedir.','Hastanın transportu sırasında nelere dikkat edersiniz?','Hastanın, hasta yakınlarının da yardımı ile bir battaniye üzerine alınarak, yukarıda gösterilen şekilde taşınmasını sağlarım.::9,,Hastanın transportu sırasında önce,;;doğru yanıt::10','dal',0,0,0,1),(15,9,'Hata: boyunluk','_n00015.jpg','Doktor bey öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınmasını öneriyorum.','','Devam etmek için tıklayınız.::10','dal',0,0,0,1),(16,10,'Öykü','_n00016.jpg','Öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınması gerekmektedir.Bu işlem acil müdahale edilen hastanın taşınmasında dikkat edilmesi gereken temel ilkelerdir. \r\n\r\nHastanın uygun şartlarda transportu acil olarak sağlandı. Sonrasında havayolu, solunum ve dolaşım değerlendirldi. Olayın öyküsü soruldu.<br>\r\n\r\nResimde görüldüğü şekilde sera içinde ilaçlama yaptığını, sonrasında bulantı hissinin olduğunu, ancak işlerini bugün tamamlaması gerektiğini bu nedenle seranın içinde tamirat işi için çıktığı merdiven üzerinde iken fenalaşıp 5 basamaklı merdivenden düştüğünü, seranın zemininde bulunan beton çıktıya çarptığını, boynunu ve belini incittiğini, halen bulantısı ve terlemeleri olduğunu belirtti. ','Sera çalışanının mevcut resim ve öykü kayıtları doğrultusunda şikayetlerine neden olabilecek nedenler nelerdir?','Yanıtınızı aşağıdaki alana girip gönder tuşuna tıklayınız.;;doğru yanıt::11','dal',0,0,0,1),(17,11,'Öntanı',NULL,'Halen açık alanda bir sert bir zemin üzerinde yatan hastanın gömleğinin yaka bölgesinde boyun bölgesindeki  künt travmatik yaralanma sonucu meydana gelen deri abrazyonundan kaynaklanan kan bulaşı görülmekte, ancak aktif kanama izlenmemektedir.',' Düşündüğünüz ön tanılar doğrultusunda, hastanın tedavisinde acilen yapılması gereken hangi işlem hastanın yaşamının kurtulması açısından önemlidir ?','Hastanın gömleğinin düğmelerini açmasını söyler, pantolonunu çıkartmasını söyleyip,  tüm vücudu hızlıca inceler, fizik muayenesini dikkatlice yaparak,  patolojik lezyonları not ederim. Hastanın,elbiselerini tekrar giymesi için yakınlarının yardım etmesini sağlarım.::12,,Öncelikle,;;doğru yanıt::13','dal',0,0,0,1),(18,12,'Hata: elbiseler',NULL,'Elbiselerini çıkartmak çok önemlidir.','','Devam etmek için tıklayınız.::13','dal',0,0,0,1),(19,13,'Tetkik',NULL,'Hastanın gelen ambulans ile tam teşekkülü devlet hastanesi acil servisine sevki gerçekleşmiştir.  Ambulans gelene kadar bol ılık su ile vücudu yıkanmış ve üzerine temiz bir çarşaf örtülmüştür. Tarım ilacı ile kontaminasyon şüphesi olan elbiseleri imha/analiz edilmek üzere tehlikeli tıbbi atık çöpüne atılmıştır.','Acil serviste bu hastaya yönelik olarak hangi tetkikleri istersiniz?','Rutin biyokimya::14,,Kan kolinesteraz düzeyi::15,,Direkt Radyografi Tetkiki::16,,Tedavi önerisi için tıklayınız.::17','dal',0,0,0,1),(20,14,'Rutin biyokimya',NULL,'Sonuçlar: ...','','Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17','dal',0,0,0,1),(21,15,'Kan kolinesteraz düzeyi',NULL,'Sonuçlar: ...','','Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17','dal',0,0,0,1),(22,16,'Direkt Grafiği',NULL,'Direkt Grafi Sonucunu <a href=/public/pdf/direkt-grafi.pdf>tıklayınız</a>.','','Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17','dal',0,0,0,1),(23,17,'Tedavi',NULL,'Tarım ilacı zehirlenmesine yönelik tedavi yaklaşımınızı (Basamaklar halinde belirtin) belirtiniz. Hangi ilacı hangi dozda hangi yolla verilmesini önerirsiniz.','','Yanıtınızı aşağıdaki alana yazıp gönder tuşuna tıklayınız.;;İlaçlar: A,B,C,D::26','dal',0,0,0,1),(24,18,'Tramva',NULL,'::','Travmaya yönelik hangi incelemeleri yaparsınız?','Yanıtınızı aşağıdaki alana girip gönder tuşuna tıklayınız.;;doğru yanıt::19','dal',0,0,0,1),(25,19,'Görsel Tetkik',NULL,'İstenen tetkik sonuçlarını değerlendirin? ','','Radyoloji tetkiki::20,,Boyun omur filmi::21,,XYZ tetkiki::24,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25','dal',0,0,0,1),(26,20,'Radyoloji Tetkik Sonuçları','_n00026.jpg','Sonuçlar: <br>\r\n\r\nbel ve göğüs omur filmi: normal <br>\r\nKafa grafisi: Kırık Yok. \r\n','','Başka tetkik için tıklayınız.::19,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25','dal',0,0,0,1),(27,21,'Boyun Omur Filmi ','_n00027.jpg','Resim üzerinde işaretleyiniz.','','Değerlendir;;sdada ::23','dal',0,0,0,1),(28,22,'end',NULL,'Burada RAPOR sunulacak.','','Başa dönmek için tıklayınız.::1','dal',0,0,0,1),(29,23,'Boyun Omur Filmi Değerlendirme','_n00029.jpg','xxx i işaretlemeniz beklenirdi.','','Başka tetkik için tıklayınız.::19,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25','dal',0,0,0,1),(30,24,'XYZ Tetkiki',NULL,'Bu tetkik değeri normaldir.','','Başka tetkik için tıklayınız.::19,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25','dal',0,0,0,1),(31,25,'Yorum',NULL,'::','Ne düşünüyorsunuz?','Kişinin servika grafisi normal olarak değerlendirdim.Ancak ayrıntılı inceleme için radyoloji konsültasyonu istiyorum.::22,,Yorumunuzu aşağıdaki alana girip gönder tuşuna tıklayınız.;;ddd::22','dal',0,0,0,1),(33,26,'doz',NULL,'::','Doz miktarını ve hangi uygulanacağını seçiniz.','A--50--250--150--1::1,,B--50--250--50--2::1,,C--50--250--200--3::1,,Dozaj ve alım yolu tercihlerini gönder.::18','dal',0,0,0,1),(34,1,'yeni','','','','','dal',1,1,0,2);
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
INSERT INTO `people` VALUES (32977301484,'emin','eker','bal19',1,1,'32977301484.jpg'),(11111111111,'bal19','bal19','bal19',1,1,'11111111111.png'),(22768864182,'Gökhan','Demir','159654kafkef55',1,1,'22768864182.jpeg'),(233,'x','y','z',0,0,'people/233.jpg');
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

--
-- Table structure for table `takip`
--

DROP TABLE IF EXISTS `takip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `takip` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nodes` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `response` varchar(1250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `takip`
--

LOCK TABLES `takip` WRITE;
/*!40000 ALTER TABLE `takip` DISABLE KEYS */;
INSERT INTO `takip` VALUES (1,'1:0 , 1:1 , 2:1 , 5:1 , 6:1 , 8:2 , 10:1 , 11:1 , 12:1 , 13:1 , 14:2 , 17:1 , 18:1 , 19:4 , 25:1',':,:,doğru yanıt:,:,:,doğru yanıt:,doğru yanıt:,:,:,:,:,doğru yanıt:,doğru yanıt:,:,doğru yanıt:,'),(2,'1:0',':,'),(3,'1:0 , 1:1',':,:,'),(4,'1:0 , 1:1',':,:,'),(5,'1:0 , 1:1 , 1:1',':,:,:,'),(6,'1:0 , 1:2',':,:,'),(7,'1:0 , 1:2 , 3:1 , 5:2 , 7:1 , 8:2 , 10:1 , 11:2 , 13:2 , 15:1 , 13:3 , 16:1 , 13:4 , 17:1 , 18:1 , 19:0 ,  17:0 ,  13:2',':,:,doğru yanıt:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,:,:,:,:,doğru yanıt:,doğru yanıt:,:,:,:,'),(8,'1:0 , 1:1 , 1:1 , 2:1',':,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,'),(9,'1:0 , 1:2 , 3:1',':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,');
/*!40000 ALTER TABLE `takip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tet`
--

DROP TABLE IF EXISTS `tet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `skey` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `beklenen` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `soylenen` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `zaman` float NOT NULL,
  `puan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tet`
--

LOCK TABLES `tet` WRITE;
/*!40000 ALTER TABLE `tet` DISABLE KEYS */;
INSERT INTO `tet` VALUES (1,2119443638,1,1,2147483647,'','',3.4847,0),(2,2119443638,1,4,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','',5.30199,0),(3,2119443638,1,5,2147483647,'doğru yanıt','',7.24048,0),(4,2119443638,1,7,2147483647,'','',8.86781,0),(5,2119443638,1,8,2147483647,'doğru yanıt','',11.7487,0),(6,2119443638,1,10,2147483647,'doğru yanıt','',14.1684,0),(7,2119443638,1,11,2147483647,'doğru yanıt','',15.8764,0),(8,2119443638,1,13,2147483647,'','',17.2093,0),(9,2119443638,1,17,2147483647,'İlaçlar: A,B,C,D','',18.9276,0),(10,2119443638,1,26,2147483647,'doz::150--50--200--,,ayol::1--2--3--','doz::150--50--200--,,ayol::1--1--1--',20.3414,0),(11,2119443638,1,18,2147483647,'doğru yanıt','',21.8234,0),(12,2119443638,1,19,2147483647,'','',22.8182,0),(13,2119443638,1,25,2147483647,'ddd','',24.9092,0),(14,2119443638,1,22,2147483647,'','',0.016762,0),(15,116921600,1,1,2147483647,'','',63.236,-5),(16,116921600,1,3,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','resp::hekimin acil hastaya müdahele zorunluluğu,,',116.885,0),(17,116921600,1,5,2147483647,'doğru yanıt','resp::olay yeri güvenliği\r\n,,',239.03,0),(18,116921600,1,7,2147483647,'','',248.766,0),(19,116921600,1,8,2147483647,'doğru yanıt','',507.892,0),(20,116921600,1,10,2147483647,'doğru yanıt','resp::organik fosfor,,',553.035,0),(21,116921600,1,11,2147483647,'doğru yanıt','',571.377,0),(22,116921600,1,13,2147483647,'','',582.212,0),(23,116921600,1,16,2147483647,'','',585.743,0),(24,116921600,1,17,2147483647,'İlaçlar: A,B,C,D','',593.21,0),(25,116921600,1,26,2147483647,'doz::150--50--200--,,ayol::1--2--3--','doz::78--76--200--,,ayol::1--1--1--',668.584,0),(26,116921600,1,18,2147483647,'doğru yanıt','',670.531,0),(27,116921600,1,19,2147483647,'','',675.147,0),(28,116921600,1,20,2147483647,'','',680.219,0),(29,116921600,1,19,2147483647,'','',681.679,0),(30,116921600,1,21,2147483647,'sdada ','resp::servikal kırık medulla spinalise bası var,,',832.118,0),(31,116921600,1,23,2147483647,'','',0.0581901,0),(32,1690905816,1,1,2147483647,'','',2.9481,6),(33,1690905816,1,2,2147483647,'','',6.20588,0),(34,1690905816,1,25,2147483647,'ddd','',8.58563,0),(35,1690905816,1,22,2147483647,'','',0.966133,0),(36,2133149720,1,1,2147483647,'','',4.56846,-5),(37,2133149720,1,2,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','',7.22656,0),(38,2133149720,1,5,2147483647,'','',35.9467,0),(39,2133149720,1,6,2147483647,'','',0.052669,0),(40,2010108030,1,1,2147483647,'','',1.80893,-5),(41,2010108030,1,2,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','',3.37268,0),(42,2010108030,1,5,2147483647,'doğru yanıt','',5.90627,0),(43,2010108030,1,7,2147483647,'','',7.43706,0),(44,2010108030,1,8,2147483647,'doğru yanıt','',8.95878,0),(45,2010108030,1,10,2147483647,'doğru yanıt','',10.1385,0),(46,2010108030,1,11,2147483647,'doğru yanıt','',11.4534,0),(47,2010108030,1,13,2147483647,'','',12.8816,0),(48,2010108030,1,17,2147483647,'İlaçlar: A,B,C,D','',14.037,0),(49,2010108030,1,26,2147483647,'doz::150--50--200--,,ayol::1--2--3--','doz::150--188--143--,,ayol::1--1--1--',18.5664,0),(50,2010108030,1,18,2147483647,'İlaçlar: A,B,C,D','',24.1916,0),(51,2010108030,1,26,2147483647,'doz::150--50--200--,,ayol::1--2--3--','doz::150--50--200--,,ayol::2--1--1--',263.239,0),(52,2010108030,1,18,2147483647,'doğru yanıt','',264.995,0),(53,2010108030,1,19,2147483647,'','',266.719,0),(54,2010108030,1,25,2147483647,'ddd','',268.003,0),(55,2010108030,1,22,2147483647,'','',1.31667e+09,0),(56,0,1,26,0,'','',1.31669e+09,0),(57,0,1,26,0,'','',1.31669e+09,0),(58,0,1,26,0,'','',1.31669e+09,0),(59,0,1,26,0,'doz::150--50--200--,,ayol::1--2--3--','doz::242--250--250--,,ayol::1--1--1--',1.31669e+09,0),(60,0,1,18,0,'','',1.31669e+09,0),(61,0,1,26,0,'','',1.31669e+09,0),(62,0,1,26,0,'','',1.31669e+09,0),(63,0,1,26,0,'','',1.31669e+09,0),(64,0,1,26,0,'','',1.3167e+09,0),(65,0,1,26,0,'','',0.0137329,0),(66,941385316,1,1,2147483647,'','',1.34129,6),(67,941385316,1,3,2147483647,'','',1.3167e+09,0),(68,0,1,26,0,'','',0.07201,0),(69,995708717,1,1,2147483647,'','',3.16666,-5),(70,995708717,1,2,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','',5.23834,0),(71,995708717,1,5,2147483647,'','',9.09466,0),(72,995708717,1,5,2147483647,'','',0.0130939,0),(73,409060145,1,1,2147483647,'','',0.012852,0),(74,957655577,1,1,2147483647,'','',5.82438,0),(75,957655577,1,1,2147483647,'','',135.171,-5),(76,957655577,1,2,2147483647,'','',137.892,0),(77,957655577,1,1,2147483647,'','',138.8,6),(78,957655577,1,3,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','',140.198,0),(79,957655577,1,5,2147483647,'','',0.0140629,0),(80,504006489,1,1,2147483647,'','',256.339,-5),(81,504006489,1,2,2147483647,'','',337.963,0),(82,504006489,1,1,2147483647,'','',401.133,-5),(83,504006489,1,2,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','',432.125,0),(84,504006489,1,5,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','',569.114,0),(85,504006489,1,5,2147483647,'doğru yanıt','',612.499,0),(86,504006489,1,7,2147483647,'','',623.739,0),(87,504006489,1,8,2147483647,'doğru yanıt','',625.756,0),(88,504006489,1,10,2147483647,'doğru yanıt','',629.254,0),(89,504006489,1,11,2147483647,'doğru yanıt','',631.285,0),(90,504006489,1,13,2147483647,'','',633.176,0),(91,504006489,1,17,2147483647,'İlaçlar: A,B,C,D','',634.766,0),(92,504006489,1,26,2147483647,'','',645.09,0),(93,504006489,1,17,2147483647,'İlaçlar: A,B,C,D','',664.238,0),(94,504006489,1,26,2147483647,'doz::150--50--200--,,ayol::1--2--3--','doz::231--50--200--,,ayol::2--1--1--',689.295,0),(95,504006489,1,18,2147483647,'doğru yanıt','',690.828,0),(96,504006489,1,19,2147483647,'','',694.009,0),(97,504006489,1,21,2147483647,'sdada ','',787.449,0),(98,504006489,1,23,2147483647,'','',789.998,0),(99,504006489,1,21,2147483647,'sdada ','',793.216,0),(100,504006489,1,23,2147483647,'','',806.876,0),(101,504006489,1,25,2147483647,'ddd','',808.288,0),(102,504006489,1,22,2147483647,'','',0.0143921,0),(103,677401560,1,1,2147483647,'','',1.56821,-5),(104,677401560,1,2,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','resp::kemal,,',4.72958,0),(105,677401560,1,5,2147483647,'doğru yanıt','resp::mehmet,,',8.47433,0),(106,677401560,1,7,2147483647,'','',9.45673,0),(107,677401560,1,8,2147483647,'doğru yanıt','',11.4416,0),(108,677401560,1,10,2147483647,'doğru yanıt','',12.3971,0),(109,677401560,1,11,2147483647,'doğru yanıt','',13.2508,0),(110,677401560,1,13,2147483647,'','',14.2402,0),(111,677401560,1,17,2147483647,'İlaçlar: A,B,C,D','',15.4086,0),(112,677401560,1,26,2147483647,'doz::150--50--200--,,ayol::1--2--3--','doz::150--50--200--,,ayol::1--1--1--',16.4986,0),(113,677401560,1,18,2147483647,'doğru yanıt','',17.9871,0),(114,677401560,1,19,2147483647,'','',19.1617,0),(115,677401560,1,25,2147483647,'ddd','',20.1944,0),(116,677401560,1,22,2147483647,'','',0.014153,0),(117,1787540581,1,1,2147483647,'','',1.23739,6),(118,1787540581,1,3,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','',2.41287,0),(119,1787540581,1,5,2147483647,'doğru yanıt','',3.5452,0),(120,1787540581,1,7,2147483647,'','',5.08164,0),(121,1787540581,1,8,2147483647,'doğru yanıt','',6.05694,0),(122,1787540581,1,10,2147483647,'doğru yanıt','',7.19333,0),(123,1787540581,1,11,2147483647,'doğru yanıt','',8.24332,0),(124,1787540581,1,13,2147483647,'','',0.0187869,0),(125,381687948,1,1,2147483647,'','',74.791,-5),(126,381687948,1,2,2147483647,'','',94.5278,0),(127,381687948,1,2,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','resp::dadada,,',107.196,0),(128,381687948,1,5,2147483647,'doğru yanıt','',120.843,0),(129,381687948,1,7,2147483647,'','',123.288,0),(130,381687948,1,8,2147483647,'','',160.143,0),(131,381687948,1,8,2147483647,'doğru yanıt','',161.798,0),(132,381687948,1,10,2147483647,'doğru yanıt','',162.99,0),(133,381687948,1,11,2147483647,'doğru yanıt','',164.182,0),(134,381687948,1,13,2147483647,'','',180.035,0),(135,381687948,1,14,2147483647,'doğru yanıt','',185.085,0),(136,381687948,1,13,2147483647,'','',266.759,0),(137,381687948,1,16,2147483647,'doğru yanıt','',293.037,0),(138,381687948,1,13,2147483647,'','',297.324,0),(139,381687948,1,15,2147483647,'','',299.009,0),(140,381687948,1,17,2147483647,'İlaçlar: A,B,C,D','',322.671,0),(141,381687948,1,26,2147483647,'','',324.3,0),(142,381687948,1,17,2147483647,'İlaçlar: A,B,C,D','',451.7,0),(143,381687948,1,26,2147483647,'doz::150--50--200--,,ayol::1--2--3--','doz::188--214--200--,,ayol::3--1--1--',479.633,0),(144,381687948,1,18,2147483647,'doğru yanıt','',482.302,0),(145,381687948,1,19,2147483647,'','',485.198,0),(146,381687948,1,20,2147483647,'doğru yanıt','',489.759,0),(147,381687948,1,19,2147483647,'','',493.416,0),(148,381687948,1,21,2147483647,'sdada ','',515.088,0),(149,381687948,1,23,2147483647,'','',544.489,0),(150,381687948,1,25,2147483647,'ddd','',547.031,0),(151,381687948,1,22,2147483647,'','',0.015178,0),(152,878346393,1,1,2147483647,'','',1.14127,-5),(153,878346393,1,2,2147483647,'','',0.0554259,0),(154,918420204,1,1,2147483647,'','',0,0);
/*!40000 ALTER TABLE `tet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-09-23 19:11:58
