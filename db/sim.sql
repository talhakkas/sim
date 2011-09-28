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
INSERT INTO `announcement` VALUES (1,'Deneme Olgusu Sisteme işlendi','Olguya Müdahil olabilmek için bilmem ne yapınız'),(2,'Sistem Üzerinde Çalışmalar Devam ediyor','Çalışılıyo öyle işte'),(3,'Simulation v1.4.9.5 has been released!','Full and Patch Only: http://test.omu.edu.tr');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `d_survey`
--

DROP TABLE IF EXISTS `d_survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `d_survey` (
  `d_survey_id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`d_survey_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10241 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_survey`
--

LOCK TABLES `d_survey` WRITE;
/*!40000 ALTER TABLE `d_survey` DISABLE KEYS */;
INSERT INTO `d_survey` VALUES (010101,'Akciğer grafisi (tek yön)','null','null'),(010102,'Akciğer grafisi (iki yön)','null','null'),(010103,'Akciğer grafisi (üç yön)','null','null'),(010104,'Akciğer grafisi (üç yön) baryumlu','null','null'),(010105,'Akciğer Grafisi Apikolordotik','null','null'),(010106,'Akciğer Grafisi Lateral Dekibitüs','null','null'),(010107,'Akciğer Grafisi Lateral','null','null'),(010108,'Kalp teleradyogram (tek yön)','null','null'),(010109,'Kalp teleradyogram (iki yön)','null','null'),(010110,'Kalp teleradyogram (üç yön)','null','null'),(010111,'Kalp teleradyogram (üç yön) baryumlu','null','null'),(010112,'Floroskopi-Skopi','null','null'),(010113,'Sinüs (Water\'s) Grafisi','null','null'),(010114,'Schuller grafisi (Karşılaştırmalı)','null','null'),(010115,'Stenvers Grafisi (Karşılaştırmalı)','null','null'),(010116,'Mandibula Grafisi','null','null'),(010117,'Temporo-mandibuler grafi (Karşılaştırmalı)','null','null'),(010118,'Sella spot grafisi','null','null'),(010119,'Kafa grafisi (tek yön)','null','null'),(010120,'Kafa grafisi (iki yön)','null','null'),(010121,'Kafa grafisi (Dört yön)','null','null'),(010122,'Servikal Vertebra Grafisi (tek yön)','null','null'),(010123,'Servikal Vertebra Grafisi (iki yön)','null','null'),(010124,'Servikal Vertebra Grafisi (üç yön)','null','null'),(010125,'Servikal Vertebra Grafisi (dört yön)','null','null'),(010126,'Dorsal (Torakal) Vertebra Grafisi AP','null','null'),(010127,'Dorsal (Torakal) Vertebra Grafisi 2 Yönlü','null','null'),(010128,'Dorsal (Torakal) Vertebra Grafisi 3 Yönlü','null','null'),(010129,'Lomber Vertebra Grafisi AP','null','null'),(010130,'Lomber Vertebra Grafileri (iki yön)','null','null'),(010131,'Lomber Vertebra Grafileri (üç yön)','null','null'),(010132,'Lomber Vertebra Grafileri (dört yön)','null','null'),(010133,'L5-S1 spot grafisi','null','null'),(010134,'Skolyoz tetkiki','null','null'),(010135,'Pelvis Grafisi','null','null'),(010136,'Pelvis Grafisi(iki Yön)','null','null'),(010137,'Pelvis Grafisi (Sakro İliak Eklem)','null','null'),(010138,'Pelvimetri (iki yön)','null','null'),(010139,'Kalça Eklemi Grafisi (Tek Yön) -Sol','null','null'),(010140,'Kalça Eklemi Grafisi (Tek Yön) -Sol','null','null'),(010141,'Kalça Eklemi Grafisi (iki yön) -Sağ','null','null'),(010142,'Kalça Eklemi Grafisi (iki yön) -Sol','null','null'),(010143,'Kalça Grafisi Karşılaştırmalı (Tek Yön)','null','null'),(010144,'Kalça Grafisi (iki yön) Karşılaştırmalı','null','null'),(010201,'Beyin MR','null','null'),(010202,'Diffüzyon MR','null','null'),(010203,'Perfüzyon MR','null','null'),(010204,'BOS Akım MR','null','null'),(010205,'Hipofiz MR','null','null'),(010206,'Kulak MR','null','null'),(010207,'Orbita MR','null','null'),(010208,'Nazofarinks MR','null','null'),(010209,'Boyun MR','null','null'),(010210,'Akciğer ve Mediasten MR','null','null'),(010211,'Kardiyak MR','null','null'),(010212,'Anjiyografi MR','null','null'),(010213,'Spektroskopi MR','null','null'),(010214,'Üst Abdomen MR','null','null'),(010215,'Alt Abdomen MR','null','null'),(010216,'Meme MR','null','null'),(010217,'Dinamik MR','null','null'),(010218,'Kolanjiografi MR','null','null'),(010219,'Ürografi MR','null','null'),(010220,'Servikal Vertebra MR','null','null'),(010221,'Torakal Vertebra MR','null','null'),(010222,'Lomber Vertebra MR','null','null'),(010223,'Myelografi MR','null','null'),(010224,'Omuz Eklem MR -Sağ','null','null'),(010225,'Omuz Eklem MR -Sol','null','null'),(010226,'Dirsek Eklem MR -Sağ','null','null'),(010227,'Dirsek Eklem MR -Sol','null','null'),(010228,'El-Bilek Eklem MR -Sağ','null','null'),(010229,'El-Bilek Eklem MR -Sol','null','null'),(010230,'Kalça Eklem MR -Sağ','null','null'),(010231,'Kalça Eklem MR -Sol','null','null'),(010232,'Sakro-İliak Eklem MR -Sağ','null','null'),(010233,'Sakro-İliak Eklem MR -Sol','null','null'),(010234,'Diz Eklem MR -Sağ','null','null'),(010235,'Diz Eklem MR -Sol','null','null'),(010236,'Ayak-Bilek Eklem MR -Sağ','null','null'),(010237,'Ayak-Bilek Eklem MR -Sol','null','null'),(010238,'Temporo-Mandibula Eklem MR -Sağ','null','null'),(010239,'Temporo-Mandibula Eklem MR -Sol','null','null'),(010240,'Artrografi MR','null','null');
/*!40000 ALTER TABLE `d_survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discipline`
--

DROP TABLE IF EXISTS `discipline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discipline` (
  `discipline_id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`discipline_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discipline`
--

LOCK TABLES `discipline` WRITE;
/*!40000 ALTER TABLE `discipline` DISABLE KEYS */;
INSERT INTO `discipline` VALUES (01,'Radyolojik'),(02,'Biyokimya'),(03,'Patolojik'),(04,'Mikrobiyoloji'),(05,'Nükleer Tıp');
/*!40000 ALTER TABLE `discipline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drug`
--

DROP TABLE IF EXISTS `drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug`
--

LOCK TABLES `drug` WRITE;
/*!40000 ALTER TABLE `drug` DISABLE KEYS */;
INSERT INTO `drug` VALUES (45,'5-Fluorouracil Ebewe'),(46,'5-FU'),(52,'Abelcet IV'),(50,'acerilin'),(53,'Actrapid HM\r\nPenfill'),(54,'Acuitel'),(55,'Acular'),(56,'Acyl'),(60,'Adafen'),(61,'Adalat\r\nCrono'),(62,'Adant'),(63,'Adepiron'),(57,'Adrenalin'),(58,'Adriblastina'),(59,'Advantan'),(64,'Aerius'),(65,'Aerodiol'),(66,'Aethoxysklerol'),(47,'Aferin'),(67,'Afro'),(70,'Agen'),(71,'Aggrastat'),(68,'Agnucaston'),(69,'Agretik'),(72,'Aimafix\r\nD.I.'),(79,'Akineton'),(74,'Aklovir'),(75,'Aknefug\r\nBP5'),(76,'Aknilox'),(77,'Akrofolline'),(80,'Aksef'),(78,'Aktibol'),(103,'Alarin'),(81,'Alba'),(83,'Albumina\r\nUmana ISI'),(82,'AlbuminLFB'),(84,'AlcaC'),(85,'Alcaine'),(86,'Alcon\r\nBSS'),(87,'Aldactazide'),(88,'Aldactone'),(104,'Aldara'),(89,'Aldolan'),(105,'Alergoftal'),(106,'Aleve'),(107,'Alexan'),(90,'Alfamet'),(92,'Alfasid'),(91,'Alfasilin'),(93,'Alfoxil'),(94,'Algesal'),(108,'Alimta'),(109,'Alin'),(95,'Aljil'),(110,'Alkagin'),(96,'AlkaSeltzer'),(97,'Alkeran'),(111,'Alkyloxan\r\n'),(112,'AllergoComod'),(113,'Allergocrom'),(98,'Allergodil'),(101,'Allerjin'),(99,'Allerset'),(100,'Allersol'),(102,'Alma'),(51,'alomide'),(114,'Alora'),(115,'Alpha\r\nD3'),(116,'Alphagan'),(117,'AltizemSR'),(118,'Alujel\r\nForte'),(124,'Amaryl'),(125,'Ambreks'),(126,'Ametik'),(127,'Amikozit'),(128,'Aminocardol'),(119,'Amlodis'),(120,'Amlokard'),(121,'Amlovas'),(129,'Amoksilav\r\nB'),(130,'Amoksilin'),(131,'Amoksina'),(123,'Ampisid'),(122,'Ampisina'),(141,'Anafranil'),(140,'Anapolon'),(142,'Andante'),(132,'Andazol'),(133,'Andolor'),(3,'Andraxan'),(2,'Androcur'),(144,'Anestol'),(143,'Anexate'),(145,'Angeliq'),(134,'Angiodel'),(146,'Anksen'),(48,'aNox\r\nFort'),(135,'Antabus'),(148,'Anti\r\nSkab'),(139,'Antibeksin'),(136,'AntiBit'),(137,'AntiEm'),(138,'AntiVomit'),(147,'Antrex'),(149,'Anzatax'),(49,'aPer'),(154,'Apikobal'),(155,'ApoGo'),(156,'Apraljin'),(150,'Apranax'),(157,'Aprazol'),(152,'Aprol'),(153,'Apromed'),(151,'Aprowell'),(161,'Aranesp'),(162,'Arava'),(158,'Arcalion'),(163,'Aredia'),(164,'Aricept'),(165,'Arimidex'),(159,'Armisetin'),(167,'Aromasin'),(166,'Aromer'),(168,'Artril'),(160,'Artu'),(169,'Arveles'),(173,'Asidopan\r\nPlus'),(174,'Asilon'),(175,'Asinpirine'),(176,'Asist'),(177,'Asiviral'),(178,'Asmafilin\r\nFort'),(180,'Asocal'),(179,'Asomal'),(170,'Aspartil'),(171,'Aspinal'),(172,'Aspirin'),(184,'Atacand'),(183,'Atarax'),(185,'Ataspin'),(186,'Ativan\r\nExpidet'),(187,'Atoksilin'),(188,'Ator'),(181,'Atropin'),(182,'Atrosol'),(2279,'AUGMENTIN\r\nES'),(2278,'AUGMENTIN-BID'),(2277,'AUGMENTIN-BID 200/28'),(2276,'AUGMENTIN-BID 400/57\r\nForte'),(190,'Augmentin'),(189,'Aurorix'),(191,'Avandia'),(192,'Avaxim'),(193,'Avelox'),(194,'Avemar'),(195,'Avicap'),(196,'Avil'),(197,'Avmigran'),(198,'Avonex'),(199,'Axid'),(200,'Ayra'),(202,'Azacid'),(203,'Azathioprine\r\nAtafarm'),(204,'Azathioprine\r\nPCH'),(205,'Azelderm'),(206,'Azeltin'),(207,'Azitro'),(208,'Azosilin'),(201,'Azro'),(209,'Babyprin'),(210,'Bactrim'),(211,'Bactroban'),(212,'Bakton'),(213,'Balmandol'),(214,'Balya'),(215,'Batticon'),(216,'BayHep\r\nB'),(217,'Baypress'),(218,'BCgSSI\r\nK'),(234,'Becloforte'),(219,'Becodisks'),(220,'Beconase'),(221,'Becotide'),(222,'Becovital'),(235,'Beklazon'),(236,'Bellargal'),(223,'Bemiks'),(237,'BenGay'),(224,'Benoral'),(238,'Benzac\r\nAC'),(240,'Benzapen\r\nLA'),(239,'Benzidan'),(241,'Betafact'),(225,'Betaferon'),(226,'Betakon'),(229,'Betaksim'),(227,'Betanorm'),(228,'Betaserc'),(230,'Betnovate'),(231,'Betoptic'),(232,'Bevitab'),(242,'BevitinC'),(233,'Bevitol'),(244,'Biarison'),(245,'Biaven\r\nV.I.'),(246,'Bilokan\r\nForte'),(247,'Biokadin'),(248,'Biophen'),(243,'BiProfenid'),(249,'Bisakol'),(251,'Bismomagnesie'),(250,'Biteral'),(252,'Bleocin'),(253,'Bleolem'),(254,'Blephamide\r\nLiquifilm'),(255,'Bonefos'),(257,'Borneral'),(256,'Botox'),(258,'Brethal'),(259,'Brevibloc'),(260,'Bricanyl'),(261,'Brodil'),(263,'Broksin'),(262,'Bromek'),(264,'BronchoWaxom'),(265,'Bronkar'),(266,'Bronkolin\r\n300'),(267,'Brufen 400'),(268,'BSS\r\nPlus'),(272,'Bucobleu'),(269,'Bu'),(270,'Bu'),(271,'Bu'),(273,'Burazin'),(275,'Burnil'),(274,'Butopan'),(284,'Cabaser'),(283,'Cabral'),(285,'Caduet'),(276,'Cafergot'),(286,'Calcia'),(287,'Calcidine'),(288,'Calcijex'),(289,'Calcitonina\r\nHubber'),(291,'Calcium Leucovorin DBL'),(292,'Calcium\r\nSandoz'),(290,'Calcium'),(293,'Campral'),(296,'Cancidas'),(297,'Canderel'),(294,'Candidin'),(277,'Canesten'),(298,'Canolen'),(295,'Cantabiline'),(278,'Capila\r\nSavon'),(299,'Capsalgine'),(301,'Carboplatin Atafarm'),(302,'Carboplatin DBL'),(303,'Carboplatin\r\nTeva'),(300,'Carbosin'),(304,'Cardioket'),(279,'Carena'),(305,'Carnitene'),(280,'Carovit'),(306,'Carteol\r\nLP'),(281,'Casodex'),(282,'Cataflam'),(307,'Cebedex'),(308,'Cebemyxine'),(317,'Ceclor'),(309,'Cefamezin'),(310,'Cefatin'),(311,'Cefizox'),(312,'Cefobid'),(313,'Cefozin'),(318,'Cefradur'),(314,'CelestodermV'),(315,'Celeston\r\nChronodose'),(319,'CellCept'),(320,'Celoftal\r\nSurgical'),(321,'Centrum'),(322,'Cephaxon'),(323,'Cernevit'),(316,'CetafluForte'),(324,'Cetrotide'),(325,'Cetryn'),(326,'Cezol'),(327,'Chenofalk'),(328,'Choragon'),(334,'Cialis'),(329,'Cibacen'),(330,'Cibadrex'),(335,'Ciflosin'),(331,'Ciloxan'),(341,'Cipralex'),(337,'Cipram'),(336,'Ciprasid'),(338,'Cipro\r\nIV'),(340,'Ciproktan'),(339,'Ciproxin IV'),(342,'Cirkulin'),(343,'Cirkulin\r\nValerian'),(344,'Cirrus'),(346,'Cisplatin Ebewe'),(345,'Cisplatinum'),(332,'Citanest\r\n%2'),(347,'Citara'),(333,'Citazon'),(348,'Citol'),(349,'Citolap'),(350,'Claforan'),(351,'Clamine T\r\nDeklarit'),(352,'Clarinase'),(353,'Claritine'),(354,'Clexane'),(355,'Cliacil 1.2\r\nMega'),(356,'Climara'),(357,'Climen'),(358,'Climodien'),(359,'Clin'),(360,'Clonex'),(362,'Clopixol'),(361,'Clozol'),(363,'Codelsol'),(364,'Codelton'),(372,'ColchicumDispert'),(370,'Coldeks'),(371,'Colpermin'),(373,'Colposeptine'),(374,'Colpotrophine'),(375,'Combicid'),(376,'Combivent'),(377,'Combivir'),(378,'Comtan'),(379,'Concor'),(382,'Contex'),(383,'Contractubex'),(381,'Contramal'),(380,'Convulex'),(365,'Copaxone'),(366,'Coraspin'),(384,'Cordarone'),(385,'Cortimycine'),(386,'Cosmogen'),(387,'Cosopt'),(367,'Coumadin'),(388,'Coversyl'),(368,'Coxulid'),(369,'Cozaar'),(2272,'Cravit\r\niV'),(389,'Crinone'),(390,'Crixivan'),(391,'Cromabak'),(392,'Croxilex-BiD'),(393,'Cusimolol'),(394,'Cutivate'),(395,'Cycladol'),(397,'Cyclogest'),(396,'CycloProgynova'),(398,'Cymevene'),(399,'Cynt'),(401,'Cytarabine\r\nDBL'),(400,'Cytarabine\r\n'),(402,'Cytonal'),(403,'Cytotec'),(73,''),(408,'Dacrolux'),(409,'Daflon 500'),(410,'Dalman\r\nAQ'),(405,'Danitrin Forte'),(411,'Dank\r\nPastil'),(406,'Darob'),(412,'Darvolin'),(407,'Daunomicina'),(433,'Debridat'),(414,'Decapeptyl'),(415,'Degastrol'),(416,'Dekort'),(434,'Deksan'),(417,'Delix'),(435,'Deltacortril'),(418,'Demeprazol'),(419,'Demoksil'),(413,'DeNol'),(436,'Dentinox'),(420,'Depakin'),(421,'DepoDilar'),(422,'DepoMedrol'),(424,'Deponit'),(423,'DepoProvera'),(425,'Deposilin'),(438,'Depreks'),(437,'Deprenil'),(439,'Depset'),(426,'Dequadin'),(440,'Dermatol'),(441,'Dermatol\r\nAroma'),(442,'Dermatop'),(443,'Dermikolin'),(444,'DermoRest'),(445,'DermoTrosyd'),(446,'Dermovate'),(447,'Dervanol'),(427,'Desal'),(448,'Desferal'),(428,'Desolett'),(449,'Desyrel'),(429,'Deticene'),(450,'Detrusitol'),(431,'Devaljin'),(430,'Devapen'),(451,'Devit3'),(432,'DexaSine'),(404,'dFlor'),(454,'Diabinese'),(455,'Diafuryl'),(466,'Diameprid'),(456,'Diamicron'),(458,'Dianorm'),(457,'Diazomid'),(459,'Dicetel'),(468,'Dicloflam'),(467,'Diclomec'),(460,'Dideral'),(469,'Didronat'),(471,'Difenak'),(470,'Differin'),(461,'Difilin'),(474,'Dilatrend'),(472,'Dilticard'),(473,'Diltizem'),(475,'Diprivan'),(452,'DiPro\r\nOleosum'),(462,'Diprolene'),(476,'Diprospan'),(477,'Dispril'),(453,'Di'),(463,'Diyaben'),(464,'Diyenil'),(465,'DiyetTat'),(478,'Dodex'),(483,'Dogmatil'),(484,'Doksetil'),(485,'Doksin'),(486,'Doksura'),(479,'Doladamon\r\nP'),(487,'Dolgit'),(490,'Doline'),(480,'Dolorex'),(491,'Dolphin'),(488,'Dolven'),(489,'Dolviran'),(481,'Dopergin'),(492,'Dopmin'),(493,'Dorfan'),(494,'Dormicum'),(496,'Dorsiflex'),(495,'Dorsilon'),(497,'Dostinex'),(482,'Doxium'),(498,'Dramamine'),(499,'Drapolene'),(501,'Drisentin'),(500,'Dristan'),(503,'Drogryl'),(502,'Drovid'),(504,'Duact'),(512,'Dulcaryl'),(506,'Duobak'),(507,'Duobaktam'),(505,'Duocid'),(508,'Duovel'),(513,'Duovisc'),(514,'Duphalac'),(515,'Duphaston'),(509,'Durapan'),(516,'Duratears'),(510,'Duricef'),(517,'Durisal'),(511,'Durogesic'),(518,'Duspatalin'),(519,'Duspaverin'),(521,'Dynabac'),(520,'Dynacirc\r\nSRO'),(522,'Dysport'),(524,'Ebixa'),(525,'Ecopirin'),(526,'Edronax'),(531,'Efedrin\r\nArsan'),(529,'Efemoline'),(530,'Efexor'),(527,'Efferalgan'),(532,'Eforol'),(528,'Efpa'),(533,'Eklips'),(534,'Ekorinol'),(535,'Ekosetol'),(536,'Eksofed'),(537,'Elevit\r\nPronatal'),(538,'Elidel'),(539,'Elocon'),(541,'Emadine'),(542,'Emedur'),(540,'Emla'),(548,'Enalap'),(523,'enapril'),(549,'Enbrel'),(550,'Endobulin\r\nS/D'),(545,'Endol'),(543,'Endosin'),(544,'Endoxan'),(551,'Enfexia'),(546,'Enho'),(552,'Enoksetin'),(547,'Entersal'),(553,'Entocort'),(556,'Epanutin'),(557,'Epargriseovit'),(554,'Epdantoin'),(558,'Ephedrin\r\nPalmer'),(559,'Epidosin'),(555,'Eprex'),(560,'Eqizolin'),(561,'Erbolin'),(562,'Ercefuryl'),(563,'Erdostin'),(564,'Erfulyn'),(565,'Ergafein'),(566,'Eritro'),(567,'Eritrosif'),(568,'Eryacne'),(569,'Erythrocin'),(571,'Eslopram'),(570,'Esmeron'),(577,'Estandron\r\nProlongatum'),(578,'EsterVit'),(572,'Estracombi TTS'),(574,'Estracyt'),(573,'Estraderm\r\nTTS'),(575,'Estreva'),(579,'Estriol'),(576,'Estrofem'),(581,'Ethrane'),(582,'Ethyol IV'),(584,'Etol\r\nFort'),(585,'Etoposid\r\nEbewe'),(583,'Etoposide'),(586,'EtoposideTeva'),(580,'Etyomid'),(587,'Ex-cipial\r\nHydro'),(589,'Exelderm'),(588,'Exelon'),(590,'Exen'),(591,'Exocin'),(592,'Exoderil'),(4,'Expigment'),(593,'EyeVisol'),(594,'Ezetrol'),(602,'Factane'),(603,'Factor\r\nvon\r\nWillebrand'),(595,'Famodin'),(596,'Famogast'),(597,'Famoser'),(598,'Famotep'),(599,'Famotsan'),(604,'Famvir'),(607,'Farengil'),(600,'Farial'),(605,'Farlutal'),(606,'Farmorubicin'),(608,'Fastjel'),(609,'Fasturtec'),(601,'Faverin'),(610,'Favirab'),(611,'Femara'),(612,'Fenidin'),(613,'Fenilefrin'),(614,'Fenistil'),(616,'Fentanyl\r\nCitrate'),(615,'FentanylJanssen'),(617,'Ferplex'),(619,'Ferro\r\nAroma'),(618,'FerroSanol'),(620,'Ferrum Hausman'),(621,'Festal\r\nN'),(622,'Fexofen'),(623,'Finarid'),(624,'Fito'),(625,'Flagentyl'),(627,'Flagyl'),(628,'Flantadin'),(626,'Flarex'),(629,'Flaton'),(630,'Flexo\r\nIM'),(632,'Flix-otide'),(631,'Flixonase Aqueous'),(635,'Flomax\r\nMR'),(634,'Florak'),(633,'Floraquin'),(636,'Flubest'),(637,'Flucan'),(638,'Fludara'),(639,'Fludex'),(640,'Fludin'),(641,'Fluibron'),(643,'Fluorescite'),(642,'Fluorouracil\r\nBiosyn'),(644,'Fluothane'),(647,'Fluoxytil'),(645,'Flupamid'),(646,'Flutans'),(648,'FML'),(652,'Folbiol'),(653,'Folic\r\nPlus'),(649,'Foradil'),(650,'Forane'),(654,'Forsef'),(657,'Forsteo Kullan'),(655,'Fortum'),(656,'Forza'),(651,'Fosamax'),(658,'Fosfokalsiyum'),(660,'Fragmin'),(659,'Fraxiparine'),(661,'Fraxodi'),(665,'Fulpen'),(666,'Fulsac'),(670,'Fungan'),(667,'Fungizone\r\nIV'),(668,'Fungoral'),(671,'Fungostatin'),(669,'Fungucit'),(662,'Furazol'),(664,'Furoksan'),(663,'Furomid'),(673,'Gamaflex'),(672,'Gamakuil'),(677,'Gansol'),(678,'Gargarex'),(679,'Garmastan'),(680,'Gasterol'),(681,'Gastifam'),(682,'Gastrofam'),(683,'Gastrosidin'),(674,'Gaviscon'),(675,'Gayabeksin'),(676,'Gayaben'),(685,'Gefulvin\r\nFort'),(686,'Gelocaps'),(693,'Gemzar'),(696,'Gengraf'),(697,'Genhevac\r\nB'),(698,'Genmisin'),(687,'Genotropin'),(694,'Genta'),(695,'Gentagut'),(699,'Gentamed'),(700,'Gentreks'),(684,'GeOral'),(688,'Geotril'),(689,'Gerakon'),(690,'GeralgineK'),(691,'Gerofen'),(1,'Geroxalen'),(692,'Getamisin'),(703,'Giludop'),(706,'GineksinF'),(701,'Ginera'),(704,'Ginger'),(705,'Gingobil'),(702,'Girasid'),(707,'Gliben'),(708,'Glifor'),(709,'Glimax'),(710,'Glirid'),(711,'GliserinKansuk'),(712,'Glivec'),(713,'Glucagen\r\nHypokit'),(714,'Glucobay'),(718,'Glucophage'),(715,'Glucotrol\r\nXL'),(719,'Glucovance'),(716,'Glukofen'),(720,'Glumikron'),(717,'Glurenorm'),(721,'Glutril'),(722,'Glynose'),(723,'Glypressin'),(724,'GonalF'),(725,'Gonaphene'),(726,'Gopten'),(727,'Grandpherol'),(728,'Granocyte\r\n34'),(730,'Gribex Hot'),(729,'Grisovin'),(735,'Gyno Canesten\r\n1'),(736,'Gynodel'),(737,'Gynoferon'),(738,'Gynoflor'),(731,'GynoLomexin'),(732,'GynoTardyferon'),(733,'GynoTravogen'),(734,'GynoTrosyd'),(741,'Haemoctin\r\nSDH'),(740,'Hametan'),(742,'Havilland'),(743,'Hazmolin'),(739,'hbVax\r\nII'),(744,'Hedensa'),(748,'Heksa'),(749,'Hekzoton'),(754,'Helicol'),(755,'Helipak'),(750,'Helmicide'),(751,'Helmipar'),(752,'Helmobleu'),(753,'Helpa'),(745,'Hemoralgine'),(756,'Hepatect\r\nCP'),(746,'Hepavax-Gene'),(757,'Hepsera'),(758,'Hernovir'),(747,'Hexacorton'),(760,'HibTITER'),(762,'Hipersar'),(761,'Hippurin'),(765,'Hismen'),(763,'Histazol'),(764,'Histogenol'),(766,'Hitrizin'),(759,'Hivid'),(767,'Holoxan'),(769,'Humalog'),(768,'HumulinM\r\n70/30'),(770,'Hyalgan'),(771,'Hycamtin'),(772,'Hydrea'),(773,'Hydryllin'),(774,'Hylaform'),(775,'Hyperium'),(776,'Hypnomidate'),(777,'Hytrin'),(778,'Hyzaar'),(779,'I.N.H.'),(780,'IG\r\nVena N I.V.'),(781,'Imovax Meningo A+C'),(782,'Implanon'),(783,'Innohep'),(784,'Intron\r\nA'),(785,'Is'),(786,'Isotrexin'),(5,''),(6,''),(8,''),(9,''),(10,''),(11,''),(7,''),(12,''),(13,''),(14,''),(15,''),(18,''),(19,''),(20,''),(16,''),(21,''),(17,''),(22,''),(23,''),(24,''),(25,''),(33,''),(26,''),(27,''),(36,''),(34,''),(35,''),(28,''),(29,''),(37,''),(30,''),(31,''),(32,''),(38,''),(39,''),(42,''),(43,''),(40,''),(41,''),(787,'Jetokain'),(788,'Kalamin'),(2273,'Kaletra'),(790,'Kalidren'),(789,'Kalinor'),(795,'Kalmosan'),(796,'Kalsifluor'),(797,'Kalsiyumfolinat\r\nEbewe'),(798,'Kamfolin'),(799,'Kandizol'),(800,'Kansilak'),(801,'Kanzuk'),(791,'Kapnax'),(802,'Kapril'),(803,'Kaptoril'),(792,'Karazepin'),(804,'Karbalex'),(805,'Karberol'),(806,'Kardilat'),(809,'KardilSR'),(807,'Kardisentin'),(810,'Kardozin'),(811,'Karum'),(808,'Karvea'),(812,'Karvezide'),(793,'Katarin'),(794,'Kazepin'),(819,'Kefsid'),(813,'Kemicetine'),(814,'Kemoprim'),(820,'Keppra'),(815,'Kerasal'),(816,'Ketalar'),(817,'Ketek'),(821,'Keten\r\nTohumu'),(818,'Ketoral'),(822,'Klacid'),(828,'Klamaxin'),(823,'Klarolid'),(824,'Klaromin'),(825,'Klavunat'),(826,'Klavupen'),(827,'Klax'),(832,'Klimadynon'),(833,'Klindan'),(829,'Klinoksin'),(830,'Kliogest'),(831,'Klipaks'),(834,'Klomen'),(835,'Klomen'),(836,'Klorheksol\r\nScrub'),(837,'Klorhex'),(838,'Kloroben'),(839,'KlovireksL'),(852,'Ko'),(844,'Kolestor'),(840,'Kolestran'),(843,'Kolsin'),(845,'KombevitC'),(846,'Kompensan'),(841,'Konakion\r\nMM'),(842,'Konazol'),(847,'Kongest'),(848,'Konsantre Dobutamin'),(849,'Konsantre\r\nPotasyum'),(850,'Kontil'),(851,'Konveril'),(2271,'Konveril\r\nPlus'),(853,'Kortos'),(854,'Kreon'),(856,'Kristapen'),(855,'Kristasil'),(857,'Kuiflex'),(858,'Kuilil'),(859,'Kursept'),(861,'Kwellada\r\nKrem\r\nRinse'),(860,'KwellP'),(863,'Lacipil'),(868,'Lacryvisc'),(869,'Lactulac'),(864,'Laevolac'),(870,'Laksafenol'),(865,'Lamisil'),(871,'Lansazol'),(872,'Lansoprol'),(873,'Lansor'),(875,'Lantus\r\nOptiPen'),(874,'Lanvis'),(876,'Lanzedin'),(877,'Largactil'),(878,'Largopen'),(866,'Laroxyl'),(867,'Lasix'),(879,'Lastet'),(880,'Leponex'),(887,'Lercadip'),(888,'Lescol'),(881,'Leucomax'),(883,'Leucovorin\r\nAtafarm'),(889,'Leucovorin Teva'),(882,'Leukeran'),(884,'Leunase\r\n'),(890,'Levitra'),(886,'Levopront'),(885,'Levotiron'),(891,'LhRH\r\nFerring'),(892,'Libalaks'),(893,'Libavit B6'),(894,'Libavit\r\nK'),(895,'Libenta'),(908,'Liberate'),(906,'Libkol'),(909,'Libradin'),(907,'Librax'),(896,'Lidanil'),(910,'LidCare'),(911,'Likit\r\nPedvax-HiB'),(912,'Lincocin'),(913,'Linkoles'),(915,'Linkomed'),(914,'Linkomisin'),(897,'Linosin'),(898,'Lioresal'),(916,'Lipitaksin'),(899,'Lipitor'),(900,'Lipofen\r\nSR'),(901,'Lipovas'),(902,'Liquemine'),(903,'Liquifilm\r\nTears'),(917,'Lithuril'),(904,'Livial'),(905,'Lizan'),(2275,'Lobem'),(919,'Locabiotal'),(920,'LocacorteneVioform'),(921,'Locasalene'),(922,'Locoid'),(923,'Lodine'),(935,'Lodoz'),(924,'Lokalen'),(936,'Loksetin'),(925,'Lomotil'),(937,'Longacor'),(938,'Longifene'),(918,'LoOvral'),(926,'Lopermid'),(927,'Lopid'),(939,'Lopresor'),(928,'Lorabid'),(929,'Loradif'),(930,'Lorantis'),(931,'Loritine'),(933,'Losec'),(932,'Losefar'),(934,'Loxasid'),(940,'Loxicam'),(862,'L'),(944,'Lucrin'),(941,'Ludiomil'),(942,'Lumen'),(945,'Lumigan'),(943,'Luminal'),(946,'Lustral'),(947,'Lutenyl'),(948,'Luveris'),(949,'Lymphoglobuline'),(950,'Lyomer'),(951,'Majezik'),(957,'Makrosilin'),(959,'Maksipor'),(958,'Maksiporin'),(952,'Maliasin'),(960,'Maltofer'),(953,'Manuprin'),(961,'Maprotil'),(962,'Marcaine\r\n'),(954,'Marincap'),(955,'Materna'),(963,'Maxaljin'),(964,'Maxalt'),(956,'Maxidex'),(965,'Mefoxin'),(966,'Megace'),(967,'Megadyn'),(2280,'Melcam'),(976,'Mellerettes'),(968,'Melox'),(969,'Menefloks\r\nIV'),(978,'Meneklin'),(970,'Menogon'),(971,'Menopace'),(977,'Mentoseptol'),(972,'Mepadol'),(979,'Mercaptopurin'),(981,'Meresa'),(980,'Mersol'),(973,'Meteospasmyl'),(987,'Methotrexat\r\nEbewe'),(983,'Methotrexate'),(984,'Methotrexate\r\nDBL'),(982,'MethotrexateTeva'),(974,'Metiler'),(975,'Metoprim'),(988,'Metpamid'),(985,'Metrodin\r\nHP'),(986,'Metsil'),(989,'Miambutol'),(999,'Micardis'),(998,'Microgynon'),(1000,'Miflonide'),(990,'Mikoderm'),(1001,'Mikrosid'),(991,'Minulet'),(992,'Miostat'),(993,'Mirena'),(994,'Mitomycin\r\nC Kyowa'),(995,'Mivacron'),(1002,'Mixtard 10 HM\r\nPenfill'),(996,'Miyadren'),(997,'Miyorel'),(1003,'Mobic'),(1004,'Modivid'),(1005,'Moduretic'),(1016,'Moksilin'),(1006,'Molit'),(1017,'MonarcM'),(1007,'Monodoks'),(1008,'Monodur'),(1009,'Monoket'),(1010,'Monolong\r\nSR'),(1012,'Monopril'),(1011,'Monovas'),(1018,'Monurol'),(1019,'Morfozid'),(1013,'Motilium'),(1014,'Motival'),(1015,'Moverdin'),(1020,'Mucaine'),(1025,'Muconex'),(1021,'Mucosis'),(1022,'Mukoliz'),(1023,'Mukoral'),(1026,'Multisef'),(1027,'Muphoran'),(1030,'Muscoflex'),(1028,'MuscoRil'),(1024,'Musilaks'),(1031,'Musillium'),(1029,'Muskazon'),(1032,'Mycobutin'),(1033,'Mycocur'),(1034,'Mycospor'),(1035,'Myralon'),(1036,'Mysoline'),(1042,'Naaxia'),(1043,'Nalokson\r\nHCl'),(1044,'Naponal'),(1049,'Napradol\r\nFort'),(1050,'NaprenS'),(1052,'Naprodev'),(1051,'Naprosyn'),(1053,'Naropin'),(1054,'Nasacort'),(1045,'Nasonex\r\nAqueous'),(1046,'Natisedine'),(1055,'Nature Made Oyster Shell Calcium'),(1056,'Naturel\r\nKalsiyum+VitD Oyster\r\nShell'),(1047,'Navelbine'),(1048,'Navoban'),(1060,'Neofedrin'),(1057,'Neolet'),(1074,'NeoPenotran'),(1061,'Neorecormon'),(1062,'Neosporin'),(1063,'Neostigmin'),(1058,'Neotab'),(1064,'Neotalem'),(1059,'Neotigason'),(1065,'NerisonaC'),(1066,'Nerox-B'),(1075,'Nervium'),(1076,'Nesgarin'),(1067,'Neturone'),(1070,'Neupogen'),(1068,'Neurogriseovit'),(1077,'Neurontin'),(1071,'Neurovit'),(1072,'Neutrogena\r\nAcne'),(1069,'Neuvitan'),(1073,'Nevakson'),(1078,'NevofamL'),(1079,'Nevparin'),(1080,'Nexium'),(1081,'Nibulen'),(1082,'Nidilat'),(1083,'Nifuryl'),(1088,'Niksen'),(1089,'Nilvadis'),(1090,'Nimbex'),(1084,'Nimes'),(1085,'Nimotop'),(1086,'Nipidol'),(1091,'Nipruss'),(1092,'Nitroderm\r\nTTS'),(1093,'Nitrofix'),(1094,'Nitrogliserin'),(1087,'Nizoral'),(1095,'Nobateks'),(1110,'Nobecid'),(1111,'Noctissin'),(1112,'Nogesic'),(1096,'Nootropil'),(1097,'Noral'),(1113,'Norditropin'),(1119,'Norlevo'),(1114,'Norlopin'),(1098,'Noroxin'),(1115,'Norpace'),(1120,'Norsol\r\nForte'),(1116,'Nortan'),(1121,'Norvadin'),(1117,'Norvasc'),(1118,'Norvir'),(1122,'Nostil'),(1099,'Notidin'),(1101,'Novade'),(1102,'Novadral'),(1100,'NovakomS'),(1103,'Novalgin'),(1104,'Novantrone'),(1105,'Novesin'),(1123,'NovoMix\r\n30'),(1124,'NovoNorm'),(1106,'NovoPlan'),(1108,'Novopyrine'),(1125,'NovoRapid'),(1107,'Novosef'),(1126,'NovoSeven'),(1109,'Novuxol'),(1037,'N'),(1038,'N'),(1039,'N'),(1127,'Nuritrex\r\nB12'),(1128,'Nurofen'),(1130,'Nutraplus'),(1129,'NutraTat'),(1040,'N'),(1041,'N'),(1131,'Nyolol'),(1134,'Oceral'),(1132,'Octinum'),(1133,'Octostim'),(1136,'Ocubrax'),(1135,'Oculotect\r\nFluid'),(1137,'Ofkozin'),(1138,'Oflocide'),(1139,'Ofloks'),(1140,'Oftalmotrim'),(1141,'Ogastro'),(1144,'Okacin'),(1145,'Okavax'),(1142,'Oksamen'),(1143,'Oksikam'),(1146,'Oksinazal'),(1147,'Oksitin'),(1148,'Olmetec'),(1149,'Omeksin'),(1150,'Omeprazid'),(1151,'Omeprol'),(1153,'Onadron'),(1154,'Onceair'),(1152,'OncoTice'),(1156,'One\r\nA Day 55\r\nPlus'),(1155,'OneAlpha'),(1159,'Opagis'),(1160,'Opak'),(1157,'Opraks'),(1158,'Opridon'),(1165,'Oraceftin'),(1166,'Oramikron'),(1167,'Orgalutran'),(1161,'Ormil'),(1162,'Ornidone'),(1163,'Ornisid'),(1164,'Ornitop'),(1168,'Oroferon'),(1169,'Oroheks'),(1171,'Orthoclono\r\nOKT 3'),(1170,'Orthovisc'),(1173,'Osalen'),(1172,'Osmolak'),(1174,'Osteo\r\nD'),(1175,'Osteocare'),(1176,'Osteomax'),(1177,'Ostram'),(1180,'Otac'),(1181,'Otimisin'),(1178,'Otrisalin'),(1179,'Otrivine'),(1182,'Ovadril'),(1183,'Ovestin'),(1184,'Ovitrelle'),(1185,'Ox-xa'),(1186,'Oxis'),(1187,'Pacofen'),(1188,'Painex'),(1202,'Panadol'),(1189,'Panalgine'),(1203,'Pankreoflat'),(1201,'Pantenol'),(1204,'Panthec'),(1205,'Panto'),(1206,'Pantogar'),(1207,'Pantpas'),(1190,'Papaverin\r\nHCl'),(1191,'Paracetamol'),(1194,'Paraflex'),(1192,'Parafon'),(1195,'Paraks'),(1193,'Paranox'),(1196,'Paraplatin\r\nRTU'),(1208,'Parlodel'),(1198,'Parol'),(1197,'Paroma\r\n50'),(1209,'PAS'),(1210,'Passiflora'),(1211,'Pasteur\r\nHDCV'),(1199,'Patanol'),(1200,'Pavulon'),(1212,'Paxil'),(1213,'Pedifen'),(1214,'Pedilin'),(1215,'Pedimat'),(1216,'Peditus'),(1223,'Pedrin'),(1224,'Peflacine'),(1217,'PenadurLA'),(1218,'Penicillin\r\nG\r\nPotasyum'),(1219,'Penipastil'),(1220,'Penoksil'),(1225,'PenOs'),(1221,'Pensilina'),(1222,'Peracon'),(1230,'Perbron'),(1226,'Pergonal'),(1227,'Perlinganit'),(1228,'Permasol'),(1229,'Permax'),(1231,'Pexola'),(1232,'Pharmaton'),(1233,'PhosBind'),(1234,'Physiologica'),(1235,'Physiotens'),(1236,'Pilogel\r\nHS'),(1237,'Pilokarsol'),(1238,'Pilosed'),(1239,'Pimafucin'),(1246,'Pipraks'),(1247,'Piptalin'),(1241,'Pirantel'),(1242,'Pirasmin'),(1240,'Pirazinid'),(1248,'Pirofen'),(1244,'Pirok'),(1243,'Pirosal'),(1245,'Piyeloseptyl'),(1250,'Plasbumin'),(1249,'PlatosinS'),(1251,'Plavix'),(1252,'Plegicil'),(1253,'Plegisol'),(1254,'Plendil'),(1255,'Pneumo\r\n23'),(1256,'Pofol'),(1260,'Poliacel'),(1257,'Polimisin'),(1258,'Polivit'),(1259,'Polyod'),(1261,'Polytrim'),(1262,'Pomat\r\n'),(1263,'Pommade\r\n'),(1264,'Ponstan'),(1266,'Prakten'),(1265,'Pravachol'),(1271,'PredForte'),(1272,'Prednisolon'),(1273,'Prednol'),(1274,'Pregnyl'),(1268,'Premarin'),(1275,'Premelle\r\n2.5\r\nmg'),(1269,'Prepagel'),(1267,'PrePar'),(1270,'Preterax'),(1276,'Preven'),(1277,'Prevenar'),(1280,'Primobolan\r\nDepot'),(1278,'PrimolutN'),(1279,'Primperan'),(1281,'Pritor'),(1300,'Problok'),(1301,'ProctoGlyvenol'),(1302,'Proctolog'),(1282,'Prodisan'),(1283,'ProfasiHP'),(1284,'Profenid'),(1285,'Progestan'),(1303,'Prograf'),(1304,'Prokain\r\nPenicillin'),(1286,'Proleukin'),(1287,'Prolixin'),(1288,'Proluton'),(1289,'Promid'),(1290,'Promod'),(1291,'Pronapen'),(1305,'Propecia'),(1306,'Propofol\r\nAbbott'),(1307,'Propycil'),(1308,'Proscar'),(1292,'Prosek'),(1309,'Prostagood\r\nMono'),(1310,'Prosterit'),(1293,'Protagent'),(1294,'Protamin'),(1295,'Protelos'),(1296,'Proviron'),(1297,'Provisc'),(1298,'Proxacin'),(1299,'Prozac'),(1311,'Prozinc'),(1312,'Psoderm'),(1313,'Psoraks'),(1315,'Psorcutan'),(1314,'Psovate'),(1322,'Pulcet'),(1319,'Pulmicort'),(1323,'Pulmor'),(1320,'Pulmozyme'),(1321,'Pulnase'),(1316,'Puregon'),(1325,'Purgyl'),(1317,'PuriNethol'),(1318,'Purinol'),(1324,'Pursennid'),(1326,'Pylorid'),(1327,'Quinicardine'),(1332,'Radyocodin'),(1328,'Ranitab'),(1329,'Ranitine'),(1330,'Ranobel'),(1333,'Rantudil'),(1331,'Rapifen'),(1343,'Rebetol'),(1334,'Rebif'),(1344,'Recofol\r\n%1'),(1335,'Reductil'),(1345,'Reflor'),(1346,'Refresh'),(1347,'Regroton'),(1348,'Relaxol'),(1349,'Relenza'),(1350,'Relifex'),(1351,'Relokap'),(1352,'Relpax'),(1336,'Remeron'),(1353,'Remicade'),(1337,'Remidon'),(1354,'Reminyl'),(1338,'Remora'),(1339,'Remoxil'),(1355,'Renagel'),(1340,'Renitec'),(1341,'ReparilGel\r\nN'),(1342,'Repozal'),(1356,'Rescuvolin'),(1357,'Ressital'),(1358,'Restasis'),(1359,'Retrovir\r\nIV'),(1360,'Rheumon IM'),(1361,'Rhinocort'),(1362,'Rhinomer Force\r\n1'),(1363,'Rhinopront'),(1364,'Rhinotussal'),(1365,'Ricilaks'),(1366,'Ricipan'),(1376,'Rif'),(1367,'Rifadin'),(1377,'Rifcap'),(1368,'Rifex'),(1369,'Rifocin'),(1370,'Rilace'),(1378,'Rilastil'),(1379,'Rilutek'),(1380,'Rinizol'),(1371,'Rinogest'),(1372,'Rinolar'),(1373,'Rinosil'),(1381,'Risperdal'),(1382,'Ritalin'),(1383,'Ritin'),(1374,'Ritosin'),(1375,'Rivotril'),(1384,'Roaccutane'),(1385,'Rocaltrol'),(1386,'Rocephin'),(1387,'Rofen'),(1395,'RoferonA'),(1394,'Roflazin'),(1388,'RohaLax'),(1396,'Roksolit'),(1389,'Rolan'),(1397,'Romatim'),(1398,'Rosenda'),(1390,'Rouvax'),(1391,'Rovamycine'),(1392,'Roxin'),(1393,'Roza'),(1399,'Rulid'),(1400,'Rumasin'),(1401,'RynacromComp'),(1402,'Rynset'),(1403,'Rytmonorm'),(1412,'Sabalaks'),(1411,'Sabril'),(1405,'Saizen\r\n4 IU'),(1406,'Sakarin'),(1407,'Salazopyrine\r\nEN'),(1413,'SalbutamSR'),(1414,'Salbutol'),(1408,'Salofalk'),(1415,'Salsil2'),(1409,'Sanasol'),(1416,'Sandimmun'),(1418,'Sandoglobulin'),(1417,'Sandomigran'),(1419,'Sandostatin'),(1420,'Sanpa'),(1421,'Sanset'),(1422,'Santanol'),(1423,'Saphire'),(1424,'Sarvas'),(1425,'Sarvastan'),(1426,'Savlex'),(1410,'Savonol'),(1427,'Scabin\r\nFort'),(1428,'Sebon'),(1447,'Sedaflora'),(1448,'Sef'),(1449,'Sefaktil'),(1450,'Sefamax'),(1430,'Sefoksim'),(1429,'Sefotak'),(1451,'Sefuroks'),(1431,'Segol'),(1432,'Sekodin'),(1452,'Sekrol'),(1453,'Seldepar'),(1454,'Seldiyet'),(1433,'Selectra'),(1455,'Selenase'),(1456,'Semprex'),(1458,'SenaLaks'),(1434,'Senokot'),(1457,'Sensodyne\r\nGel'),(1435,'Seralin'),(1459,'Serdep'),(1436,'Seremaks\r\nFort'),(1461,'Seretide'),(1437,'Serevent'),(1438,'Serfiz'),(1460,'Sermion'),(1439,'Seroderm'),(1440,'Seronil'),(1443,'Serophene'),(1462,'Seroquel'),(1441,'Seroxat'),(1442,'Serozil'),(1444,'Serum\r\nFizyolojik'),(1445,'Setamol'),(1446,'Setiral'),(1463,'Setron'),(1464,'Seven Seas Cherry\r\nFlavoured & Cod Liver\r\nOil'),(1465,'Sevorane'),(1466,'Sibelium'),(1479,'Siccafluid'),(1480,'Siccapos'),(1481,'Siccaprotect'),(1467,'Sicorten'),(1482,'Sifloks'),(1483,'Siklocap'),(1484,'Siklomid'),(1485,'Sikloplejin'),(1486,'Sildegra'),(1468,'Silina'),(1489,'Silovir'),(1487,'Silvadiazin'),(1490,'Silvamed'),(1488,'Silverdin'),(1469,'Simeco'),(1470,'Simelgat\r\nPlus'),(1492,'Simulect'),(1491,'Simvakol'),(1471,'SinakortA'),(1472,'Sinecod'),(1473,'Sinemet'),(1493,'Singulair'),(1475,'Sinopryl'),(1474,'Sinoretic'),(1494,'Sipraktin'),(1495,'Siprobel'),(1496,'Siprogut'),(1497,'Siprosan'),(1498,'Sirdalud'),(1476,'Siropar'),(1499,'Sistral'),(1500,'Sitraks'),(1501,'Sitraks'),(1477,'SivEx'),(1478,'Siyafen'),(1905,'Skinoren'),(1906,'Sokol'),(1909,'Solian'),(1908,'Soliyod'),(1907,'Somatostatin\r\nUCB'),(1910,'Sormodren'),(1911,'Soventol'),(1912,'Spalt'),(1914,'Spasmex'),(1913,'Spasmo\r\nPanalgine'),(1915,'Spasmomen'),(1916,'Spazmol'),(1917,'Spazmotek'),(1918,'Spectracef'),(1919,'Spersadex'),(1920,'Spiriva'),(1921,'Sporex'),(1923,'Stablon'),(1922,'Stafine'),(1924,'Stalevo'),(1925,'Starlix'),(1926,'Steocin'),(1927,'Stilamin'),(1928,'Stilex'),(1929,'Stilizan'),(1930,'Stocrin'),(1931,'Strepsils'),(1932,'Streptomagma'),(1933,'Subitol'),(1934,'Sudafed'),(1936,'Sufenta'),(1943,'Sulbaksit'),(1937,'Sulcid'),(1938,'Sulfarhin'),(1939,'Sulfarlem'),(1944,'Sulidin'),(1940,'Sulperazon'),(1941,'Sultamat'),(1942,'Sultasid'),(1945,'Sultibac'),(1935,'Sumatran'),(1951,'Superheks'),(1946,'Suprafen\r\n400'),(1947,'Suprax'),(1948,'Suprecur'),(1949,'Suprefact Pro\r\n'),(1950,'Suprenil'),(1952,'Surgam'),(1953,'Survanta'),(1954,'Sustanon\r\n250'),(1404,'S'),(1955,'Syklofosfamid Atafarm'),(1956,'Symbicort'),(1958,'Synacthen\r\nDepot'),(1959,'Synagis'),(1957,'Synarel'),(1960,'Synax'),(1961,'Syndol'),(1962,'Synergon'),(1963,'Synpitan'),(1964,'Synvisc'),(1965,'Tadalin'),(1966,'Tadex'),(1967,'Tadolak'),(1981,'Talcid'),(1969,'Talotren'),(1968,'Talozin'),(1982,'Tambutol'),(1983,'Tamiflu'),(1971,'Tamofen'),(1972,'Tamol'),(1973,'Tamoplex'),(1984,'Tamoxifencell'),(1970,'TamoxifenTeva'),(1986,'Tanakan'),(1987,'Tanflex'),(1974,'Tanol'),(1985,'Tantum'),(1990,'Tarden'),(1991,'Tardyferon'),(1988,'Targocid'),(1975,'Tarivid\r\nIV'),(1989,'Tarka'),(1976,'Tavanic\r\nIV'),(1977,'Tavegyl'),(1979,'Taxol'),(1978,'Taxotere'),(1980,'Tazocin'),(1992,'Tears Naturale\r\nFree'),(1993,'Tebokan Fort'),(1994,'Tefor\r\nDuotab'),(1995,'TegelineLFB'),(2003,'Tegretol'),(2004,'Telfast'),(1996,'Temetex'),(2005,'Tempo'),(1997,'Tenoksan'),(1998,'Tenoktil'),(2006,'Tenoretic'),(1999,'Tenox'),(2000,'Teokap\r\nSR'),(2012,'Terafin'),(2014,'Terbin'),(2013,'Terbisil'),(2015,'Teril\r\nCR'),(2007,'Terkur'),(2008,'Termacet'),(2009,'Termalgine'),(2010,'Ternex'),(2011,'Terramycin'),(2016,'Testogel'),(2023,'Tetanea'),(2001,'TetanusGamma'),(2002,'Tetavax'),(2017,'Tetra'),(2021,'TetraCoq'),(2022,'TetrActHIB'),(2018,'Tetradox'),(2019,'Tetralet'),(2020,'Tetramine'),(2024,'TFtThilo'),(2025,'Thalidomide\r\nPharmion'),(2027,'TheoDur'),(2026,'TheraFlu C&C'),(2028,'Thermo Doline'),(2029,'Thermo\r\nRheumon'),(2030,'Thermoflex'),(2032,'Thilomaxine'),(2033,'Thilomide'),(2031,'ThiloTears'),(2034,'Thiocilline'),(2035,'Thomapyrin'),(2036,'Thymoglobuline'),(2037,'Thyromazol'),(2046,'Ticlid'),(2047,'Ticlocard'),(2038,'Tienam'),(2048,'Tigal'),(2049,'Tilcotil'),(2050,'Tilko'),(2051,'Timabak'),(2052,'TimoComod'),(2040,'Timoftal'),(2053,'TimololPOS'),(2041,'Timoptic'),(2039,'Timosol'),(2043,'Tiocan'),(2054,'Tiocell\r\n%1'),(2042,'Tiofen'),(2044,'Tionamid'),(2045,'Tiromel'),(2055,'Tobel'),(2058,'Tobrased'),(2059,'Tobrex'),(2060,'Tobsin'),(2061,'Toclase'),(2062,'Tofranil'),(2056,'Tolectin'),(2063,'Tolvon'),(2064,'Tomudex'),(2065,'Tonimer'),(2066,'Tonocalcin'),(2057,'Tonoferrin'),(2068,'Topamax'),(2067,'Topramoxin'),(2071,'Tracrium'),(2072,'Tramadolor\r\n100'),(2073,'TrankoBuskas'),(2074,'Transamine'),(2075,'Tranxilene'),(2076,'Trasylol'),(2077,'Travatan'),(2078,'Travazol'),(2069,'Travocort'),(2070,'Travogen'),(2080,'Tremac'),(2081,'Trental'),(2082,'Trentilin'),(2079,'Trexan'),(2083,'TRH'),(2095,'Triakne'),(2084,'Triamteril'),(2096,'Triat'),(2097,'Triaxon'),(2085,'Tribeksol'),(2098,'Tribudat'),(2086,'Trifen'),(2099,'Triflucan'),(2087,'Trileptal'),(2089,'Trimoks'),(2088,'Trimovax'),(2090,'Tripacel'),(2100,'Triptilin'),(2091,'Triquilar'),(2092,'Trisequens'),(2093,'Trivastal'),(2094,'Trizol'),(2103,'Tromboliz'),(2101,'Tropamid'),(2102,'Tropicamide'),(2104,'Trusopt'),(2105,'Tuba'),(2106,'Turoptin'),(2107,'Tuseptil'),(2109,'Tusilin'),(2108,'Tussifed'),(2110,'Tylol\r\nBaby'),(2111,'Tylol\r\nPlus'),(2113,'Ucecal'),(2114,'UFT'),(2116,'Ulcoreks'),(2115,'Ulcuran'),(2117,'Ultracain\r\n%2'),(2118,'Ultralan'),(2119,'Ultraproct'),(2112,'uman Albumin Biagini'),(2120,'UmanCry\r\nD.I.'),(2121,'Umca'),(2124,'Unacefin'),(2122,'UndoPate'),(2123,'UndoTalk'),(2125,'UnicapT'),(2128,'Uniklar'),(2126,'Unisom'),(2129,'Univasc'),(2127,'Univit'),(2130,'Unotat'),(2131,'Upren'),(2133,'Ureacort'),(2132,'Urfamycin'),(2135,'UrokinaseKGCC\r\ninj.'),(2134,'Uromitexan'),(2136,'Urosin'),(2137,'Ursofalk'),(2138,'Utalk'),(2139,'Uterjin'),(44,''),(2142,'Vagihex'),(2143,'Valtrex'),(2144,'Vancomycin\r\nDBL'),(2145,'Vankomisin HCl\r\nAbbott'),(2146,'Vaqta'),(2140,'Vasocard'),(2141,'Vasolapril'),(2149,'Vasoplan'),(2147,'Vasoserc'),(2148,'Vasoxen'),(2150,'Vastarel'),(2151,'Vazkor'),(2158,'Vectavir'),(2159,'Vegabon'),(2160,'Vendal\r\nRetard'),(2163,'Venofer'),(2152,'Venoruton'),(2165,'Ventide'),(2161,'Ventodisks'),(2162,'Ventolin\r\nIV'),(2164,'Ventosal'),(2153,'Vepesid'),(2154,'Veraljin'),(2166,'Vermazol'),(2167,'Vermidon'),(2155,'Veroptin'),(2168,'Verrutol'),(2156,'Vesanoid'),(2157,'Vexol'),(2169,'Vfend'),(2174,'Viagra'),(2183,'Vicks\r\nMedinait'),(2170,'ViD3'),(2171,'ViDaylin'),(2175,'Videx'),(2176,'Vienoks'),(2172,'ViFer'),(2184,'Vigrande'),(2185,'Vimin\r\nC'),(2173,'ViMineral'),(2186,'Vincristine'),(2188,'Vincristine S'),(2187,'Vincristine\r\nS'),(2189,'Vincristini\r\nPCH'),(2177,'Viojen'),(2178,'Viramune'),(2179,'Virigen'),(2180,'Virosil'),(2190,'Virupos'),(2191,'Viscoat'),(2193,'Viscol'),(2192,'Viscotears'),(2194,'Visken'),(2195,'Vistaril'),(2196,'Visudyne'),(2181,'Vitadyn'),(2197,'VitaMerfen'),(2182,'Viteksir'),(2198,'VitPso'),(2202,'Vogast'),(2203,'Volmax'),(2199,'Volog'),(2204,'Volpan'),(2205,'Voltaren\r\nIM'),(2200,'Vomet'),(2201,'Vomitin'),(2206,'Wintus'),(2209,'Xalacom'),(2210,'Xalatan'),(2207,'Xamamine'),(2208,'Xanax'),(2274,'Xatral'),(2212,'Xefo'),(2213,'Xeloda'),(2211,'Xenical'),(2214,'Xigris'),(2215,'XylestesinA'),(2217,'Xylocain'),(2218,'Xylocaine'),(2216,'XyloComod'),(2219,'Xyzal'),(2220,'Yasmin'),(2221,'Zaditen'),(2223,'Zalain'),(2224,'Zalvor'),(2222,'Zavedos'),(2232,'Zedprex'),(2225,'Zefan'),(2233,'Zeffix'),(2226,'Zefiran\r\nForte'),(2227,'Zefol'),(2228,'Zefort'),(2234,'Zeldox'),(2235,'Zelium'),(2236,'Zelmac'),(2237,'Zeloxim'),(2229,'Zenapax\r\nIV'),(2238,'Zeprid'),(2230,'Zerit'),(2239,'Zestoretic'),(2240,'Zestril'),(2231,'Zetion'),(2241,'Zevalin'),(2244,'Ziagen'),(2242,'Zikaral'),(2245,'Zimaks'),(2248,'Zinco'),(2249,'ZinfoC'),(2246,'Zinnat'),(2247,'Zintion'),(2243,'Zitazonium'),(2250,'Zitromax'),(2251,'Zitrotek'),(2252,'Zocor'),(2258,'Zofer'),(2259,'Zofran'),(2253,'Zoladex\r\nDepot'),(2254,'Zolax'),(2260,'Zoltem'),(2255,'Zomacton'),(2261,'Zometa'),(2262,'Zomig'),(2263,'Zoprol'),(2264,'Zoprotec'),(2265,'Zostex'),(2256,'Zovatin'),(2257,'Zovirax'),(2266,'Zyban'),(2267,'Zymafluor'),(2268,'Zyprexa'),(2269,'Zyrtec'),(2270,'Zyvoxid');
/*!40000 ALTER TABLE `drug` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,1,1,'deneme-olgu','12:1,5,7,8,12','1;2,5,6'),(2,1,2,'olgu2','null','null');
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
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
INSERT INTO `node` VALUES (10,4,'Hata: olay yerine gitmek',NULL,'','Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirilmemiş oldu?','Aşağıdaki boşluğa yanıtınız yazıp gönder tuşuna tıklayınız.;;Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.::5','dal',0,0,0,1),(9,3,'Doğru: devam',NULL,'','Olay yerine gitmeniz, hekimin yasal sorumluluklarından hangisi içine girer?','Yanıtınızı aşağıdaki alana yazıp gönder tuşuna tıklayınız.;;Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.::5','dal',0,0,0,1),(7,1,'Giriş','_n00007.jpg','33 yaşındaki Hamdi Mersin, çiçek serasında ilaçlama yaptıktan sonra, çiçek serasının tavanındaki bir hasarı gidermek için merdivene çıkarken, kendini kötü hissetmiş, bulantısı olmuş, kısa süreli bir baygınlık geçirmiş, gözleri kararmış ve  5 basamak yukarıdan yere düşmüştür. Düşme sırasında boyun ve bel bölgesini zemindeki beton çıkıntıya çarpmıştır. Kafasına ise bir darbe almadığını belirtmiştir. Doktor olarak görev yaptığınız, çiçek serasının 50 metre uzağında bulunan  aile hekimliği merkezinden, hastaya müdahale etmeniz için çağrıldınız.::','Bundan sonraki yaklaşımınız ne olur?','Hastalara ilk acil müdahalenin, 112 acil ambulans merkezi tarafından yapılmasının gerektiğini, bu nedenle aile hekimliği kliniğini terk edemeyeceğimi belirtirim. Bu belirtilen hususu ilgili klinik muayene defterine kayıt ederim.::2::::5,,Hastanın durumunu görmek ve gerekirse tıbbi müdahale etmek için, varsa yardımcı sağlık personeli eşliğinde, yoksa bizzat kendim acil hastaya müdahale etmek için çiçek serasına giderim. ::3::6::,,Aile hekimliği merkezi sorumlusunun resmi iznini beklerim. Gerekli izin alınınca olay yerine giderim. ::4::::5','dal',1,1,0,1),(8,2,'Hata: acil mudahele',NULL,'','Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirmemiş oldunuz?','Yanıtınızı aşağıdaki boşluğu basıp gönder tuşuna basınız.;;Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.::5','dal',0,0,0,1),(11,5,'Acil hastaya müdahele prensipleri','_n00011.jpg','5 dakika içinde gerekli tıbbi aletleriniz ile olay yerine ulaştınız. 112 Ambulans merkezine haber verilmesini sağladınız. Sonrasında bir paramedik sağlık memuru da, size yardımcı olabileceğini belirterek sizinle beraber hasta başına geldi. Hasta seranın içinde, açık kapının yanındaki kanepede uzanmaktadır. Halen bulantısı olduğunu belirten hasta, doktor bey bana yardımcı olur musunuz, kendimi iyi hissetmiyorum  demektedir ? Kanepenin yanında, ağzı açık metal kutular bulunmaktadır. Hasta karın ağrısı şikayetininde olduğunu belirtmekte ve yardım istemektedir. <br>\r\nBundan sonraki aşamada ne yaparsınız?::,,\r\n\r\n1- Olay yeri ve çevresini hızlıca incelerim. Aynı anda havayolu, solunum dolaşım kontrolü için hastayı değerlendiririm. Kanepe yanındaki teneke kutuların ne için kullanıldığını sorarım.::\r\n\r\n2- Cevap: Doktor bey bunlar senelerdir çiçek serasında kullandığımız tarım ilaçlarının kutuları. Çiçeklerin üzerinde yerleşen böceklerin öldürülmesi için kullanıyoruz. Ancak bugün ilaçlamada kullanılan k,,','Bundan sonraki yaklaşımınız ne olur?','Hastanın zehirlenmiş olabileceğini de düşünüp, yeni kullanıldığı belirtilen tarım ilacı kutusunu da getirmelerini isterim ve sera içinde kanepede yatan hastanın öyküsünü öyküsünü alıp, fizik muayenesine geçerim. ::6::::3,,Hastanın öyküsünü alıp, muayenesini yapmadan önce:.....;;doğru yanıt::7::3::','dal',0,0,0,1),(12,6,'Hata: transport gerekirdi',NULL,'Doktor bey öncelikle hastanın ve sağlık çalışanlarının güvenliği için hastanın seradan uzak havadar bir yere transportunu öneriyorum.','','Transport gerekirdi.::8','dal',0,0,0,1),(13,7,'Acil hastaya yaklaşımda çevre güvenliği',NULL,'Hastanın ve sağlık çalışanlarının güveliği için öncelikle hastanın sera içinde yattığı yerden, havadar ve açık bir alana nakli gerekmektedir. ','','Transport et::8','dal',0,0,0,1),(14,8,'Hastanın taşınması','_n00014.jpg','Hasta taşınmasında yakınları, hastayı battaniye üzerine taşımak istemektedir.','Hastanın transportu sırasında nelere dikkat edersiniz?','Hastanın, hasta yakınlarının da yardımı ile bir battaniye üzerine alınarak, yukarıda gösterilen şekilde taşınmasını sağlarım.::9::::2,,Hastanın transportu sırasında önce,;;doğru yanıt::10::::','dal',0,0,0,1),(15,9,'Hata: boyunluk','_n00015.jpg','Doktor bey öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınmasını öneriyorum.','','Devam etmek için tıklayınız.::10','dal',0,0,0,1),(16,10,'Öykü','_n00016.jpg','Öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınması gerekmektedir.Bu işlem acil müdahale edilen hastanın taşınmasında dikkat edilmesi gereken temel ilkelerdir. \r\n\r\nHastanın uygun şartlarda transportu acil olarak sağlandı. Sonrasında havayolu, solunum ve dolaşım değerlendirldi. Olayın öyküsü soruldu.<br>\r\n\r\nResimde görüldüğü şekilde sera içinde ilaçlama yaptığını, sonrasında bulantı hissinin olduğunu, ancak işlerini bugün tamamlaması gerektiğini bu nedenle seranın içinde tamirat işi için çıktığı merdiven üzerinde iken fenalaşıp 5 basamaklı merdivenden düştüğünü, seranın zemininde bulunan beton çıktıya çarptığını, boynunu ve belini incittiğini, halen bulantısı ve terlemeleri olduğunu belirtti. ','Sera çalışanının mevcut resim ve öykü kayıtları doğrultusunda şikayetlerine neden olabilecek nedenler nelerdir?','Yanıtınızı aşağıdaki alana girip gönder tuşuna tıklayınız.;;doğru yanıt::11','dal',0,0,0,1),(17,11,'Öntanı',NULL,'Halen açık alanda bir sert bir zemin üzerinde yatan hastanın gömleğinin yaka bölgesinde boyun bölgesindeki  künt travmatik yaralanma sonucu meydana gelen deri abrazyonundan kaynaklanan kan bulaşı görülmekte, ancak aktif kanama izlenmemektedir.',' Düşündüğünüz ön tanılar doğrultusunda, hastanın tedavisinde acilen yapılması gereken hangi işlem hastanın yaşamının kurtulması açısından önemlidir ?','Hastanın gömleğinin düğmelerini açmasını söyler, pantolonunu çıkartmasını söyleyip,  tüm vücudu hızlıca inceler, fizik muayenesini dikkatlice yaparak,  patolojik lezyonları not ederim. Hastanın,elbiselerini tekrar giymesi için yakınlarının yardım etmesini sağlarım.::12::::2,,Öncelikle,;;doğru yanıt::13::::','dal',0,0,0,1),(18,12,'Hata: elbiseler',NULL,'Elbiselerini çıkartmak çok önemlidir.','','Devam etmek için tıklayınız.::13','dal',0,0,0,1),(19,13,'Tetkik',NULL,'Hastanın gelen ambulans ile tam teşekkülü devlet hastanesi acil servisine sevki gerçekleşmiştir.  Ambulans gelene kadar bol ılık su ile vücudu yıkanmış ve üzerine temiz bir çarşaf örtülmüştür. Tarım ilacı ile kontaminasyon şüphesi olan elbiseleri imha/analiz edilmek üzere tehlikeli tıbbi atık çöpüne atılmıştır.','Acil serviste bu hastaya yönelik olarak hangi tetkikleri istersiniz?','Rutin biyokimya::14,,Kan kolinesteraz düzeyi::15,,Direkt Radyografi Tetkiki::16,,Tedavi önerisi için tıklayınız.::17','dal',0,0,0,1),(20,14,'Rutin biyokimya',NULL,'Sonuçlar: ...','','Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17','dal',0,0,0,1),(21,15,'Kan kolinesteraz düzeyi',NULL,'Sonuçlar: ...','','Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17','dal',0,0,0,1),(22,16,'Direkt Grafiği',NULL,'Direkt Grafi Sonucunu <a href=/public/pdf/direkt-grafi.pdf>tıklayınız</a>.','','Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17','dal',0,0,0,1),(23,17,'Tedavi',NULL,'Tarım ilacı zehirlenmesine yönelik tedavi yaklaşımınızı (Basamaklar halinde belirtin) belirtiniz. Hangi ilacı hangi dozda hangi yolla verilmesini önerirsiniz.','','Yanıtınızı aşağıdaki alana yazıp gönder tuşuna tıklayınız.;;İlaçlar: A,B,C,D::26','dal',0,0,0,1),(24,18,'Tramva',NULL,'::','Travmaya yönelik hangi incelemeleri yaparsınız?','Yanıtınızı aşağıdaki alana girip gönder tuşuna tıklayınız.;;doğru yanıt::19','dal',0,0,0,1),(25,19,'Görsel Tetkik',NULL,'İstenen tetkik sonuçlarını değerlendirin? ','','Radyoloji tetkiki::20,,Boyun omur filmi::21,,XYZ tetkiki::24,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25','dal',0,0,0,1),(26,20,'Radyoloji Tetkik Sonuçları','_n00026.jpg','Sonuçlar: <br>\r\n\r\nbel ve göğüs omur filmi: normal <br>\r\nKafa grafisi: Kırık Yok. \r\n','','Başka tetkik için tıklayınız.::19,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25','dal',0,0,0,1),(27,21,'Boyun Omur Filmi ','_n00027.jpg','Resim üzerinde işaretleyiniz.','','Değerlendir;;sdada ::23','dal',0,0,0,1),(28,22,'end',NULL,'Burada RAPOR sunulacak.','','Başa dönmek için tıklayınız.::1','dal',0,0,0,1),(29,23,'Boyun Omur Filmi Değerlendirme','_n00029.jpg','xxx i işaretlemeniz beklenirdi.','','Başka tetkik için tıklayınız.::19,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25','dal',0,0,0,1),(30,24,'XYZ Tetkiki',NULL,'Bu tetkik değeri normaldir.','','Başka tetkik için tıklayınız.::19,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25','dal',0,0,0,1),(31,25,'Yorum',NULL,'::','Ne düşünüyorsunuz?','Kişinin servika grafisi normal olarak değerlendirdim.Ancak ayrıntılı inceleme için radyoloji konsültasyonu istiyorum.::22,,Yorumunuzu aşağıdaki alana girip gönder tuşuna tıklayınız.;;ddd::22','dal',0,0,0,1),(33,26,'doz',NULL,'::','Doz miktarını ve hangi uygulanacağını seçiniz.','A--50--250--150--1::1,,B--50--250--50--2::1,,C--50--250--200--3::1,,Dozaj ve alım yolu tercihlerini gönder.::18','dal',0,0,0,1);
/*!40000 ALTER TABLE `node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parent` (
  `parent_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `discipline_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`parent_id`),
  KEY `discipline_id` (`discipline_id`)
) ENGINE=MyISAM AUTO_INCREMENT=505 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent`
--

LOCK TABLES `parent` WRITE;
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
INSERT INTO `parent` VALUES (0101,1,'Direkt Radyografi İstem Formu'),(0102,1,'Manyetik Rezonans Görüntüleme İstem Formu'),(0103,1,'Bilgisayarlı Tomografi Görüntüleme istem Form'),(0104,1,'Ultrasonografi Görüntüleme istem Formu'),(0105,1,'Doppler Ultrasonografi İstem Formu'),(0201,2,'Rutin Biyokimya'),(0202,2,'Hemogram'),(0203,2,'Rutin İdrar Tetkiki'),(0204,2,'Kan Gazı'),(0205,2,'İlaç Düzeyleri'),(0206,2,'BOS Biyokimya'),(0207,2,'HPLC Testleri'),(0208,2,'İdrar Biyokimya'),(0209,2,'Hormon Testleri'),(0401,4,'Merkez Mikrobiyoloji Tetkik İstem Formu'),(0402,4,'Hematolojik Testler Formu'),(0403,4,'İmmünolojik Testler Formu'),(0404,4,'Merkez Lab. Adli Toksikoloji İstem Formu'),(0501,5,'Pozitron Emisyon Tomografi'),(0502,5,'I-131 MIBG Sintigrafisi İstem Formu'),(0503,5,'In-111 Octreotid Sintigrafisi İstem Formu'),(0504,5,'Tc-99m Hmpao İşaretli Lökosit Sintigrafisi İs');
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
INSERT INTO `people` VALUES (32977301484,'emin','eker','bal19',1,1,'32977301484.jpg'),(11111111111,'bal19','bal19','bal19',1,1,'11111111111.png'),(12345678912,'Gökan','Demir','123456',1,1,'');
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `takip`
--

LOCK TABLES `takip` WRITE;
/*!40000 ALTER TABLE `takip` DISABLE KEYS */;
INSERT INTO `takip` VALUES (1,'1:0 , 1:1 , 1:1 , 2:1 , 1:1',':,:,:,:,:,'),(2,'1:0 , 1:1 , 2:1 , 2:1',':,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,'),(3,'1:0 , 1:1 , 2:0 ,  1:2 , 3:1',':,:,:,:,:,'),(4,'1:0 , 1:3 , 4:1',':,:,:,'),(5,'1:0 , 1:2 , 3:1 , 5:1 , 5:1 , 5:1 , 5:1 , 5:2 , 7:1 , 7:1 , 7:1 , 8:2 , 10:1 , 10:1 , 11:1 , 11:1 , 11:2 , 13:1 , 14:1 , 13:2 , 15:1 , 13:3 , 16:2 , 17:1 , 17:0 ,  14:0 ,  13:3 , 16:2 , 15:1 , 13:1 , 14:0 ,  13:4 , 17:1 , 18:1 , 19:1 , 20:2 , 25:1 , ',':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,:,:,:,:,doğru yanıt:ss,:,:,:,doğru yanıt:sfsf,:,doğru yanıt:sasaa,:,:,doğru yanıt:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,doğru yanıt:ddd,doğru yanıt:ffff,:,:,:,:,:,:,:,:,'),(6,'1:0 , 1:2 , 3:0 , 1:2 , 3:1 , 5:1 , 5:2 , 7:1 , 8:1 , 8:1 , 8:2 , 10:1 , 11:1 , 11:2 , 13:4 , 17:0 ,  13:1 , 14:1 , 13:1 , 14:2 , 17:1',':,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:sssss,:,doğru yanıt:sssss,:,:,:,doğru yanıt:,doğru yanıt:,:,doğru yanıt:,:,:,:,:,:,:,:,'),(7,'1:0 , 1:2 , 17:1 , 18:1 , 19:4 , 25:2 , 22:1 , 1:2 , 22:4 , 25:1 , 25:1 , 25:2',':,:,doğru yanıt:,doğru yanıt:,:,:,:,:,:,:,:,ddd:,'),(8,'1:0 , 1:2 , 3:1 , 5:2 , 7:1 , 8:2 , 10:1 , 11:2 , 13:4 , 17:1 , 18:1 , 19:4 , 25:2 , 22:2 , 22:2 , 22:1 , 1:1 , 1:1 , 1:1 , 1:1',':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:,:,ddd:,ddd:,ddd:,:,:,:,:,:,'),(9,'1:0 , 1:2 , 3:1',':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,'),(10,'1:0 , 1:1 , 2:1 , 2:1 , 5:1 , 5:2 , 7:1 , 8:1 , 9:1 , 10:1 , 11:1 , 11:1 , 11:2 , 13:4 , 17:1 , 18:4 , 17:1 , 17:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , ',':,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:,:,:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,doğru yanıt:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,'),(11,'1:0 , 1:2 , 3:1 , 5:2 , 7:1 , 8:2 , 10:1 , 11:2 , 13:4 , 17:1 , 26:4 , 18:1 , 19:4 , 25:2',':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,İlaçlar: A,B,C,D:,:,doğru yanıt:,:,ddd:,'),(12,'1:0 , 1:0 , 26:0 , 26:0 , 26:0 , 26:0 , 26:4 , 18:0 , 26:0 , 26:0 , 26:0 , 26:4 , 18:1 , 19:4 , 25:2',':,:,:,:,:,:,:,:,:,:,:,A--50--250--150--1,,B--50--250--50--2,,C--50--250--200--3,,:,doğru yanıt:,:,ddd:,'),(13,'1:0',':,'),(14,'1:0 , 1:2 , 3:0 , 1:1 , 1:2 , 3:1 , 5:1 , 5:0 , 1:2 , 3:1 , 5:2 , 7:1 , 8:2 , 10:1 , 8:1 , 8:2 , 10:1 , 11:2 , 13:1 , 14:2 , 17:1 , 26:1 , 26:2 , 17:1 , 26:4 , 18:1 , 19:1 , 20:1 , 20:1 , 19:2 , 21:1 , 23:1 , 19:4 , 25:2 , 22:4 , 25:2 , 22:0 , 1:2 , ',':,:,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:deneme,doğru yanıt:,:,doğru yanıt:,:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,:,İlaçlar: A,B,C,D:,:,:,İlaçlar: A,B,C,D:,A--50--250--150--1==B--50--250--50--2==C--50--250--200--3==:,doğru yanıt:,:,:,:,:,:,:,:,ddd:,:,ddd:asdasd,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,:,:,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:,:,doğru yanıt:,:,:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,:,:,:,:,:,:,:,Hekimin yas'),(15,'1:0',':,'),(16,'1:0 , 1:1 , 2:1 , 5:1 , 2:0 , 1:2 , 3:0 , 1:3 , 4:1 , 5:2 , 7:1 , 8:2 , 7:1 , 8:2 , 10:1 , 8:1 , 9:1 , 10:1 , 11:1 , 12:1 , 11:2 , 13:1 , 13:3 , 16:3 , 16:3 , 16:1 , 13:1 , 14:2 , 17:1 , 26:4 , 18:1 , 19:1 , 20:1 , 19:2 , 21:1 , 23:1 , 23:2 , 21:1 , ',':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,:,:,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:gübceasdasasd ,:,:,:,doğru yanıt:,:,:,:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:dsfsf,:,:,:,:,:,:,:,İlaçlar: A,B,C,D:,A--50--250--150--1==B--50--250--50--2==C--50--250--200--3==:,doğru yanıt:,:,:,:,:,:,:,:,:,sdada :zdfsdf fss,:,sdada :zdfsdf fss,:,sdada :zdfsdf fss,:,ddd:,'),(17,'1:0 , 1:2 , 3:0 , 1:2 , 3:1 , 5:2 , 7:1 , 8:2 , 10:1 , 11:2 , 13:4 , 17:1 , 26:4 , 17:1 , 11:1 , 1:1 , 2:1 , 1:1 , 2:1 , 5:1 , 2:1 , 1:1 , 1:2 , 3:2',':,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,İlaçlar: A,B,C,D:,:,:,:,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,:,:,:,:,:,'),(18,'',''),(19,'1:0 , 1:1',':,:,'),(20,'1:0 , 1:0',':,:,'),(21,'1:0 , 1:0 , 1:logout',':,:,:,'),(22,'1:0 , 1:0',':,:,'),(23,'',''),(24,'',''),(25,'',''),(26,'',''),(27,'',''),(28,'',''),(29,'',''),(30,'',''),(31,'','');
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
) ENGINE=MyISAM AUTO_INCREMENT=285 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tet`
--

LOCK TABLES `tet` WRITE;
/*!40000 ALTER TABLE `tet` DISABLE KEYS */;
INSERT INTO `tet` VALUES (1,1067235880,1,1,2147483647,'','',391.824,6),(2,1067235880,1,1,2147483647,'','',930.394,6),(3,1067235880,1,1,2147483647,'','',1030.09,6),(4,1067235880,1,1,2147483647,'','',1035.81,6),(5,1067235880,1,2,2147483647,'','',1056.49,0),(6,1067235880,1,1,2147483647,'','',1059.95,-5),(7,1067235880,1,3,2147483647,'','',1084.9,0),(8,1067235880,1,3,2147483647,'','',1101.94,0),(9,1067235880,1,3,2147483647,'','',1117.9,0),(10,1067235880,1,1,2147483647,'','',1122.32,0),(11,1067235880,1,1,2147483647,'','',0.16496,0),(12,60484408,1,1,2147483647,'','',0.162767,-5),(13,1901049645,1,1,2147483647,'','',12.0443,0),(14,1901049645,1,3,2147483647,'','',45.761,0),(15,1901049645,1,1,2147483647,'','',47.7759,0),(16,1901049645,1,1,2147483647,'','',0.167745,0),(17,684729269,1,1,2147483647,'','',3.41772,-5),(18,684729269,1,2,2147483647,'','',5.54535,0),(19,684729269,1,1,2147483647,'','',8.34997,6),(20,684729269,1,3,2147483647,'','',10.679,0),(21,684729269,1,1,2147483647,'','',30.8471,-5),(22,684729269,1,4,2147483647,'','',0.157591,0),(23,211768497,1,1,2147483647,'','',2.19421,-5),(24,211768497,1,2,2147483647,'','',17.0532,0),(25,211768497,1,2,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','',19.9218,0),(26,211768497,1,5,2147483647,'','',39.2638,-3),(27,211768497,1,5,2147483647,'','',54.412,-3),(28,211768497,1,5,2147483647,'doğru yanıt','',62.1968,3),(29,211768497,1,7,2147483647,'','',64.9547,0),(30,211768497,1,8,2147483647,'','',84.8331,-2),(31,211768497,1,8,2147483647,'doğru yanıt','',90.9109,0),(32,211768497,1,10,2147483647,'doğru yanıt','',97.2812,0),(33,211768497,1,11,2147483647,'','',110.595,-2),(34,211768497,1,11,2147483647,'doğru yanıt','',113.847,0),(35,211768497,1,13,2147483647,'','',0.149342,0),(36,706604553,1,1,2147483647,'','',2.73927,-5),(37,706604553,1,2,2147483647,'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.','',4.42984,0),(38,706604553,1,5,2147483647,'doğru yanıt','',8.14433,3),(39,706604553,1,7,2147483647,'','',10.2956,0),(40,706604553,1,8,2147483647,'','',13.0478,-2),(41,706604553,1,9,2147483647,'','',14.8118,0),(42,706604553,1,10,2147483647,'doğru yanıt','',19.519,0),(43,706604553,1,11,2147483647,'doğru yanıt','',22.06,0),(44,706604553,1,13,2147483647,'','',27.4795,0),(45,706604553,1,17,2147483647,'İlaçlar: A,B,C,D','',29.8471,0),(46,706604553,1,26,2147483647,'doz::150--50--200--,,ayol::1--2--3--','doz::150--50--200--,,ayol::1--1--1--',36.9198,0),(47,706604553,1,18,2147483647,'doğru yanıt','',38.9851,0),(48,706604553,1,19,2147483647,'','',41.1198,0),(49,706604553,1,25,2147483647,'ddd','',43.0041,0),(50,706604553,1,22,2147483647,'','',0,0),(51,1327291234,1,1,-1773790777,'','',0,0),(52,1327291234,1,1,-1773790777,'','',0,0),(53,1327291234,1,2,-1773790777,'','',0,0),(54,1327291234,1,2,-1773790777,'','',0,0),(55,1327291234,1,2,-1773790777,'','',0,0),(56,1327291234,1,2,-1773790777,'','',0,0),(57,1327291234,1,2,-1773790777,'','',0,0),(58,1327291234,1,2,-1773790777,'','',0,0),(59,1327291234,1,2,-1773790777,'','',0,0),(60,1327291234,1,2,-1773790777,'','',0,0),(61,1327291234,1,2,-1773790777,'','',0,0),(62,1327291234,1,2,-1773790777,'','',0,0),(63,1327291234,1,2,-1773790777,'','',0,0),(64,1327291234,1,2,-1773790777,'','',0,0),(65,1327291234,1,2,-1773790777,'','',0,0),(66,1327291234,1,2,-1773790777,'','',0,0),(67,1327291234,1,2,-1773790777,'','',0,0),(68,1327291234,1,2,-1773790777,'','',0,0),(69,1327291234,1,2,-1773790777,'','',0,0),(70,1327291234,1,2,-1773790777,'','',0,0),(71,1327291234,1,2,-1773790777,'','',0,0),(72,1327291234,1,2,-1773790777,'','',0,0),(73,1327291234,1,2,-1773790777,'','',0,0),(74,1327291234,1,2,-1773790777,'','',0,0),(75,1327291234,1,2,-1773790777,'','',0,0),(76,1327291234,1,2,-1773790777,'','',0,0),(77,1327291234,1,2,-1773790777,'','',0,0),(78,1327291234,1,2,-1773790777,'','',0,0),(79,1327291234,1,2,-1773790777,'','',0,0),(80,1327291234,1,2,-1773790777,'','',0,0),(81,1327291234,1,2,-1773790777,'','',0,0),(82,1327291234,1,2,-1773790777,'','',0,0),(83,1327291234,1,2,-1773790777,'','',0,0),(84,1327291234,1,2,-1773790777,'','',0,0),(85,1327291234,1,2,-1773790777,'','',0,0),(86,1327291234,1,2,-1773790777,'','',0,0),(87,1327291234,1,2,-1773790777,'','',0,0),(88,1327291234,1,2,-1773790777,'','',0,0),(89,1327291234,1,2,-1773790777,'','',0,0),(90,1327291234,1,2,-1773790777,'','',0,0),(91,1327291234,1,2,-1773790777,'','',0,0),(92,1327291234,1,2,-1773790777,'','',0,0),(93,1327291234,1,2,-1773790777,'','',0,0),(94,1327291234,1,2,-1773790777,'','',0,0),(95,1327291234,1,2,-1773790777,'','',0,0),(96,1327291234,1,2,-1773790777,'','',0,0),(97,1327291234,1,2,-1773790777,'','',0,0),(98,1327291234,1,2,-1773790777,'','',0,0),(99,1327291234,1,2,-1773790777,'','',0,0),(100,1327291234,1,2,-1773790777,'','',0,0),(101,1327291234,1,2,-1773790777,'','',0,0),(102,1327291234,1,2,-1773790777,'','',0,0),(103,1327291234,1,2,-1773790777,'','',0,0),(104,1327291234,1,2,-1773790777,'','',0,0),(105,1327291234,1,2,-1773790777,'','',0,0),(106,1327291234,1,2,-1773790777,'','',0,0),(107,1327291234,1,2,-1773790777,'','',0,0),(108,1327291234,1,2,-1773790777,'','',0,0),(109,1327291234,1,2,-1773790777,'','',0,0),(110,1327291234,1,2,-1773790777,'','',0,0),(111,1327291234,1,2,-1773790777,'','',0,0),(112,1327291234,1,2,-1773790777,'','',0,0),(113,1327291234,1,2,-1773790777,'','',0,0),(114,1327291234,1,2,-1773790777,'','',0,0),(115,1327291234,1,2,-1773790777,'','',0,0),(116,1327291234,1,2,-1773790777,'','',0,0),(117,465411933,1,1,-1773790777,'','',0,0),(118,465411933,1,2,-1773790777,'','',0,0),(119,465411933,1,5,-1773790777,'','',0,0),(120,465411933,1,7,-1773790777,'','',0,0),(121,465411933,1,8,-1773790777,'','',0,0),(122,465411933,1,10,-1773790777,'','',0,0),(123,465411933,1,11,-1773790777,'','',0,0),(124,465411933,1,13,-1773790777,'','',0,0),(125,465411933,1,16,-1773790777,'','',0,0),(126,465411933,1,13,-1773790777,'','',0,0),(127,465411933,1,17,-1773790777,'','',0,0),(128,465411933,1,26,-1773790777,'','',0,0),(129,465411933,1,18,-1773790777,'','',0,0),(130,465411933,1,19,-1773790777,'','',0,0),(131,465411933,1,25,-1773790777,'','',0,0),(132,465411933,1,25,-1773790777,'','',0,0),(133,465411933,1,22,-1773790777,'','',0,0),(134,465411933,1,25,-1773790777,'','',0,0),(135,465411933,1,25,-1773790777,'','',0,0),(136,465411933,1,25,-1773790777,'','',0,0),(137,274591426,1,1,-1773790777,'','',0,0),(138,274591426,1,1,-1773790777,'','',0,0),(139,274591426,1,3,-1773790777,'','',0,0),(140,274591426,1,26,-1773790777,'','',0,0),(141,274591426,1,25,-1773790777,'','',0,0),(142,274591426,1,25,-1773790777,'','',0,0),(143,274591426,1,25,-1773790777,'','',0,0),(144,274591426,1,25,-1773790777,'','',0,0),(145,274591426,1,25,-1773790777,'','',0,0),(146,274591426,1,25,-1773790777,'','',0,0),(147,274591426,1,25,-1773790777,'','',0,0),(148,274591426,1,25,-1773790777,'','',0,0),(149,274591426,1,26,-1773790777,'','',0,0),(150,274591426,1,26,-1773790777,'','',0,0),(151,274591426,1,26,-1773790777,'','',0,0),(152,274591426,1,26,-1773790777,'','',0,0),(153,274591426,1,26,-1773790777,'','',0,0),(154,274591426,1,26,-1773790777,'','',0,0),(155,274591426,1,26,-1773790777,'','',0,0),(156,274591426,1,26,-1773790777,'','',0,0),(157,274591426,1,26,-1773790777,'','',0,0),(158,274591426,1,25,-1773790777,'','',0,0),(159,274591426,1,26,-1773790777,'','',0,0),(160,274591426,1,26,-1773790777,'','',0,0),(161,274591426,1,26,-1773790777,'','',0,0),(162,274591426,1,26,-1773790777,'','',0,0),(163,274591426,1,25,-1773790777,'','',0,0),(164,274591426,1,25,-1773790777,'','',0,0),(165,274591426,1,26,-1773790777,'','',0,0),(166,274591426,1,26,-1773790777,'','',0,0),(167,274591426,1,25,-1773790777,'','',0,0),(168,274591426,1,25,-1773790777,'','',0,0),(169,274591426,1,25,-1773790777,'','',0,0),(170,274591426,1,26,-1773790777,'','',0,0),(171,274591426,1,25,-1773790777,'','',0,0),(172,274591426,1,25,-1773790777,'','',0,0),(173,274591426,1,25,-1773790777,'','',0,0),(174,274591426,1,25,-1773790777,'','',0,0),(175,274591426,1,25,-1773790777,'','',0,0),(176,1406748703,1,1,-1773790777,'','',0,0),(177,1406748703,1,1,-1773790777,'','',0,0),(178,1406748703,1,1,-1773790777,'','',0,0),(179,1406748703,1,1,-1773790777,'','',0,0),(180,1406748703,1,1,-1773790777,'','',0,0),(181,1406748703,1,1,-1773790777,'','',0,0),(182,1406748703,1,1,-1773790777,'','',0,0),(183,1406748703,1,1,-1773790777,'','',0,0),(184,1406748703,1,1,-1773790777,'','',0,0),(185,1406748703,1,1,-1773790777,'','',0,0),(186,1406748703,1,1,-1773790777,'','',0,0),(187,1406748703,1,1,-1773790777,'','',0,0),(188,1406748703,1,1,-1773790777,'','',0,0),(189,1406748703,1,1,-1773790777,'','',0,0),(190,1406748703,1,1,-1773790777,'','',0,0),(191,1406748703,1,1,-1773790777,'','',0,0),(192,1406748703,1,1,-1773790777,'','',0,0),(193,1406748703,1,1,-1773790777,'','',0,0),(194,1406748703,1,1,-1773790777,'','',0,0),(195,1406748703,1,1,-1773790777,'','',0,0),(196,1406748703,1,1,-1773790777,'','',0,0),(197,1406748703,1,1,-1773790777,'','',0,0),(198,1406748703,1,1,-1773790777,'','',0,0),(199,1406748703,1,1,-1773790777,'','',0,0),(200,1406748703,1,1,-1773790777,'','',0,0),(201,1406748703,1,1,-1773790777,'','',0,0),(202,1406748703,1,1,-1773790777,'','',0,0),(203,1406748703,1,1,-1773790777,'','',0,0),(204,1406748703,1,1,-1773790777,'','',0,0),(205,1406748703,1,1,-1773790777,'','',0,0),(206,1406748703,1,1,-1773790777,'','',0,0),(207,1406748703,1,1,-1773790777,'','',0,0),(208,1406748703,1,1,-1773790777,'','',0,0),(209,1406748703,1,1,-1773790777,'','',0,0),(210,1152670075,1,1,-1773790777,'','',0,0),(211,1152670075,1,2,-1773790777,'','',0,0),(212,1152670075,1,2,-1773790777,'','',0,0),(213,1152670075,1,2,-1773790777,'','',0,0),(214,1152670075,1,2,-1773790777,'','',0,0),(215,1152670075,1,2,-1773790777,'','',0,0),(216,1152670075,1,2,-1773790777,'','',0,0),(217,1152670075,1,2,-1773790777,'','',0,0),(218,1152670075,1,2,-1773790777,'','',0,0),(219,1152670075,1,2,-1773790777,'','',0,0),(220,1152670075,1,2,-1773790777,'','',0,0),(221,1152670075,1,1,-1773790777,'','',0,0),(222,1152670075,1,3,-1773790777,'','',0,0),(223,1152670075,1,5,-1773790777,'','',0,0),(224,1152670075,1,7,-1773790777,'','',0,0),(225,1152670075,1,8,-1773790777,'','',0,0),(226,1152670075,1,9,-1773790777,'','',0,0),(227,1152670075,1,10,-1773790777,'','',0,0),(228,1152670075,1,11,-1773790777,'','',0,0),(229,1152670075,1,13,-1773790777,'','',0,0),(230,1152670075,1,13,-1773790777,'','',0,0),(231,1152670075,1,13,-1773790777,'','',0,0),(232,1152670075,1,13,-1773790777,'','',0,0),(233,1152670075,1,13,-1773790777,'','',0,0),(234,1152670075,1,13,-1773790777,'','',0,0),(235,1152670075,1,16,-1773790777,'','',0,0),(236,1152670075,1,13,-1773790777,'','',0,0),(237,1152670075,1,16,-1773790777,'','',0,0),(238,1152670075,1,17,-1773790777,'','',0,0),(239,1152670075,1,26,-1773790777,'','',0,0),(240,1152670075,1,18,-1773790777,'','',0,0),(241,1152670075,1,19,-1773790777,'','',0,0),(242,1152670075,1,19,-1773790777,'','',0,0),(243,1152670075,1,19,-1773790777,'','',0,0),(244,1152670075,1,21,-1773790777,'','',0,0),(245,1152670075,1,23,-1773790777,'','',0,0),(246,1152670075,1,25,-1773790777,'','',0,0),(247,1152670075,1,25,-1773790777,'','',0,0),(248,1152670075,1,19,-1773790777,'','',0,0),(249,1152670075,1,21,-1773790777,'','',0,0),(250,1152670075,1,23,-1773790777,'','',0,0),(251,1152670075,1,25,-1773790777,'','',0,0),(252,1152670075,1,22,-1773790777,'','',0,0),(253,1266075094,1,1,-1773790777,'','',0,0),(254,1776386375,1,1,-1773790777,'','',0,0),(255,1776386375,1,1,-1773790777,'','',0,0),(256,1776386375,1,2,-1773790777,'','',0,0),(257,1776386375,1,5,-1773790777,'','',0,0),(258,1776386375,1,7,-1773790777,'','',0,0),(259,1776386375,1,7,-1773790777,'','',0,0),(260,1697675238,1,1,-1773790777,'','',0,0),(261,1697675238,1,1,-1773790777,'','',0,0),(262,1697675238,1,2,-1773790777,'','',0,0),(263,773310727,1,1,-1773790777,'','',0,0),(264,308213653,1,1,-1773790777,'','',0,0),(265,1611111046,1,1,-1773790777,'','',0,0),(266,673110237,1,1,-1773790777,'','',0,0),(267,673110237,1,2,-1773790777,'','',0,0),(268,673110237,1,5,-1773790777,'','',0,0),(269,554679855,1,1,-1773790777,'','',0,0),(270,554679855,1,2,-1773790777,'','',0,0),(271,554679855,1,5,-1773790777,'','',0,0),(272,554679855,1,6,-1773790777,'','',0,0),(273,554679855,1,8,-1773790777,'','',0,0),(274,554679855,1,9,-1773790777,'','',0,0),(275,554679855,1,10,-1773790777,'','',0,0),(276,554679855,1,11,-1773790777,'','',0,0),(277,554679855,1,12,-1773790777,'','',0,0),(278,554679855,1,13,-1773790777,'','',0,0),(279,554679855,1,15,-1773790777,'','',0,0),(280,554679855,1,13,-1773790777,'','',0,0),(281,554679855,1,16,-1773790777,'','',0,0),(282,554679855,1,13,-1773790777,'','',0,0),(283,554679855,1,17,-1773790777,'','',0,0),(284,27745101,1,1,-1773790777,'','',0,0);
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

-- Dump completed on 2011-09-28 18:32:32
