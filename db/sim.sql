-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Eylül 2011 saat 00:44:36
-- Sunucu sürümü: 5.1.49
-- PHP Sürümü: 5.3.3-7+squeeze1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `sim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `title`, `content`) VALUES
(1, 'Deneme Olgusu Sisteme işlendi', 'Olguya Müdahil olabilmek için bilmem ne yapınız'),
(2, 'Sistem Üzerinde Çalışmalar Devam ediyor', 'Çalışılıyo öyle işte'),
(3, 'Simulation v1.4.9.5 has been released!', 'Full and Patch Only: http://test.omu.edu.tr');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `discipline`
--

DROP TABLE IF EXISTS `discipline`;
CREATE TABLE IF NOT EXISTS `discipline` (
  `discipline_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`discipline_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `discipline`
--

INSERT INTO `discipline` (`discipline_id`, `name`) VALUES
(1, 'Radyolojik'),
(2, 'Biyokimya'),
(3, 'Patolojik'),
(4, 'Mikrobiyoloji'),
(5, 'Nükleer Tıp');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `d_survey`
--

DROP TABLE IF EXISTS `d_survey`;
CREATE TABLE IF NOT EXISTS `d_survey` (
  `d_survey_id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`d_survey_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `d_survey`
--

INSERT INTO `d_survey` (`d_survey_id`, `name`, `type`, `value`) VALUES
('117', 'Skrotal US', 'null', 'null'),
('114', 'Submandibuler bez US', 'null', 'null'),
('115', 'Toraks US', 'null', 'null'),
('116', 'Yüzeysel doku US', 'null', 'null'),
('113', 'Paratis bezi US', 'null', 'null'),
('108', 'Renal US', 'null', 'null'),
('109', 'Üriner sistem US', 'null', 'null'),
('110', 'Tiroid US', 'null', 'null'),
('111', 'Transfontanel US', 'null', 'null'),
('112', 'Boyun US', 'null', 'null'),
('107', 'Hepatobilier US', 'null', 'null'),
('104', 'Pompa BT', 'null', 'null'),
('105', 'Abdomen (üst) US ', 'null', 'null'),
('106', 'Suprapubik pelvik US', 'null', 'null'),
('103', 'BT tomografi ve diğer', 'null', 'null'),
('102', 'BT radyoterapi planlaması için tomog.', 'null', 'null'),
('101', 'BT eşliğinde girişimsel tetkik (biyopsi vb.)', 'null', 'null'),
('99', 'Dinamik BT incelemesi', 'null', 'null'),
('100', 'BT perfüzyon çalışmaları', 'null', 'null'),
('98', 'BT sanal endoskopi', 'null', 'null'),
('96', 'BT kantitatif tomografi (kals.skor.) BTBMD g', 'null', 'null'),
('97', 'Üç boyutlu(3D) BT', 'null', 'null'),
('95', 'BT anjiografi ve tek anatomik bölge', 'null', 'null'),
('94', 'BT yüksek rezolusyonlu akciğer ve ekspratuar', 'null', 'null'),
('93', 'Yüksek rezol.AC BT (HRCT)', 'null', 'null'),
('92', 'Toraks BT', 'null', 'null'),
('89', 'Üst abdomen BT', 'null', 'null'),
('90', 'Vertebra (4 adet) BT', 'null', 'null'),
('91', 'Extremite ( 20-50cm ) BT', 'null', 'null'),
('87', 'BT ve dental tomografi', 'null', 'null'),
('88', 'Alt abdomen(pelvik) BT', 'null', 'null'),
('86', 'Orbita BT', 'null', 'null'),
('85', 'Maksillofasial BT Koronal', 'null', 'null'),
('82', 'BT ve tempomandibular eklem', 'null', 'null'),
('83', 'Larenks BT', 'null', 'null'),
('84', 'Maksillofasial BT Aksiyel', 'null', 'null'),
('80', 'Paranasal sinüs BT Aksiyel', 'null', 'null'),
('81', 'Paranasal sinüs BT Koronal', 'null', 'null'),
('78', 'Nazofarenks BT Aksiyel', 'null', 'null'),
('79', 'Nazofarenks BT Koronal', 'null', 'null'),
('77', 'BT ve hava veya opaklı sisternografi', 'null', 'null'),
('76', 'Temporal BT', 'null', 'null'),
('75', 'Hipofiz(sella) BT', 'null', 'null'),
('73', 'Beyin BT', 'null', 'null'),
('74', 'Boyun Tomografisi', 'null', 'null'),
('72', 'Kalça Grafisi (iki yön) Karşılaştırmalı', 'null', 'null'),
('71', 'Kalça Grafisi Karşılaştırmalı (Tek Yön)', 'null', 'null'),
('69', 'Kalça Eklemi Grafisi (Tek Yön)', 'null', 'null'),
('70', 'Kalça Eklemi Grafisi (iki yön)', 'null', 'null'),
('68', 'Pelvimetri (iki yön)', 'null', 'null'),
('67', 'Pelvis Grafisi (Sakro İliak Eklem)', 'null', 'null'),
('66', 'Pelvis Grafisi (2 Yönlü)', 'null', 'null'),
('65', 'Pelvis Grafisi', 'null', 'null'),
('64', 'Skolyoz tetkiki', 'null', 'null'),
('63', 'L5-S1 spot grafisi', 'null', 'null'),
('62', 'Lomber Vertebra Grafileri (dört yön )', 'null', 'null'),
('61', 'Lomber Vertebra Grafileri (üç yön )', 'null', 'null'),
('60', 'Lomber Vertebra Grafileri (iki yön )', 'null', 'null'),
('58', 'Dorsal (Torakal) Vertebra Grafisi 3 Yönlü', 'null', 'null'),
('59', 'Lomber Vertebra Grafisi ve AP', 'null', 'null'),
('57', 'Dorsal (Torakal) Vertebra Grafisi 2 Yönlü', 'null', 'null'),
('56', 'Dorsal (Torakal) Vertebra Grafisi ve AP', 'null', 'null'),
('55', 'Servikal Vertebra Grafisi (dört yön)', 'null', 'null'),
('54', 'Servikal Vertebra Grafisi (üç yön)', 'null', 'null'),
('53', 'Servikal Vertebra Grafisi (iki yön)', 'null', 'null'),
('52', 'Servikal Vertebra Grafisi (tek yön)', 'null', 'null'),
('51', 'Kafa grafisi (Dört yön) ', 'null', 'null'),
('50', 'Kafa grafisi (iki yön) ', 'null', 'null'),
('49', 'Kafa grafisi (tek yön)', 'null', 'null'),
('48', 'Sella spot grafisi', 'null', 'null'),
('47', 'Temporo-mandibuler grafi (Karşılaştırmalı)', 'null', 'null'),
('46', 'Mandibula Grafisi', 'null', 'null'),
('45', 'Stenvers Grafisi (Karşılaştırmalı)', 'null', 'null'),
('44', 'Schuller grafisi (Karşılaştırmalı)', 'null', 'null'),
('43', 'Sinüs (Water''s) Grafisi', 'null', 'null'),
('42', 'Floroskopi-Skopi', 'null', 'null'),
('41', 'Kalp teleradyogram (üç yön) baryumlu', 'null', 'null'),
('40', 'Kalp teleradyogram (üç yön) ', 'null', 'null'),
('39', 'Kalp teleradyogram (iki yön)', 'null', 'null'),
('38', 'Kalp Teleradyogram (tek yön)', 'null', 'null'),
('37', 'Akciğer Grafisi Lateral', 'null', 'null'),
('36', 'Akciğer Grafisi ve Lateral Dekibitüs ', 'null', 'null'),
('35', 'Akciğer Grafisi ve Apikolordotik ', 'null', 'null'),
('34', 'Akciğer Grafisi (üç yön) Baryumlu ', 'null', 'null'),
('33', 'Akciğer grafisi (üç yön) ', 'null', 'null'),
('32', 'Akciğer Grafisi (iki yön)', 'null', 'null'),
('31', 'Artrografi MR', 'null', 'null'),
('30', 'MR Temporo-Mandibula Eklem MR', 'null', 'null'),
('29', 'Ayak-Bilek Eklem', 'null', 'null'),
('28', 'Diz Eklem MR', 'null', 'null'),
('27', 'Sakro-ilikal Eklem MR', 'null', 'null'),
('26', 'Kalça Eklem MR', 'null', 'null'),
('25', 'El-Bilek Eklem MR', 'null', 'null'),
('24', 'Dirsek Eklem MR', 'null', 'null'),
('23', 'Myelografi MR Omuz Eklem MR', 'null', 'null'),
('22', 'Lomber Vebtebra MR', 'null', 'null'),
('21', 'Torakal Vebtebra MR', 'null', 'null'),
('20', 'Servikal Vebtebra MR', 'null', 'null'),
('19', 'Ürografi MR', 'null', 'null'),
('18', 'Kolanjiografi MR', 'null', 'null'),
('17', 'Dinamik MR', 'null', 'null'),
('16', 'Meme MR', 'null', 'null'),
('15', 'Alt Abdomen MR', 'null', 'null'),
('14', 'Üst Abdomen MR', 'null', 'null'),
('13', 'Spektroskobi MR', 'null', 'null'),
('12', 'Anjiyografi MR', 'null', 'null'),
('11', 'Kardiyak MR', 'null', 'null'),
('10', 'Akciğer ve Mediasten MR', 'null', 'null'),
('9', 'Boyun MR', 'null', 'null'),
('8', 'Nazofarinks MR', 'null', 'null'),
('7', 'Orbita MR', 'null', 'null'),
('6', 'Kulak MR', 'null', 'null'),
('5', 'Hipofiz MR', 'null', 'null'),
('4', 'Bos Akım MR', 'null', 'null'),
('3', 'Perfüzyon MR', 'null', 'null'),
('2', 'Diffüzyon MR', 'null', 'null'),
('1', 'Beyin MR', 'null', 'null'),
('118', 'Eklem US (tek taraf)', 'null', 'null'),
('119', 'Kalça eklemi US', 'null', 'null'),
('120', 'Transrektal US', 'null', 'null'),
('121', 'Transvajinal US', 'null', 'null'),
('122', 'Obstetrik US', 'null', 'null'),
('123', 'Endoskopik US', 'null', 'null'),
('124', 'Orbita US (bilateral )', 'null', 'null'),
('125', 'US Eşliğinde parasentez ve torosentez', 'null', 'null'),
('126', 'Görüntüleme eşliğinde biyopsi (US)', 'null', 'null'),
('127', 'Perkütan Akciğer absesi drenajı', 'null', 'null'),
('128', 'Perkütan abse drenajı', 'null', 'null'),
('129', 'Perkütan Nefrostomi', 'null', 'null'),
('130', 'Perkütan ampiyem drenajı', 'null', 'null'),
('131', 'Alt Ekstremite venöz sis. ve tek taraflı RDUS', 'null', 'null'),
('132', 'Alt ekstremite venöz sis.iki taraflı RDUS (GH', 'null', 'null'),
('133', 'Alt Ekstremite arteriel sis. tek taraflı RDUS', 'null', 'null'),
('134', 'Alt Ekstremeti Arterial Sis.iki taraflı RDUS ', 'null', 'null'),
('135', 'Üst Ekstremite venöz sistem tek taraflı RDUS ', 'null', 'null'),
('136', 'Üst ekstremite venöz sistem iki taraflı RDUS ', 'null', 'null'),
('137', 'Üst Ekstremite arteriel sistem tek taraflı RD', 'null', 'null'),
('138', 'Üst Ekstremite Arterial Sis.iki taraflı RDUS ', 'null', 'null'),
('139', 'Orbita RDUS', 'null', 'null'),
('140', 'Tiroid RDUS', 'null', 'null'),
('141', 'Transrektal RDUS', 'null', 'null'),
('142', 'Karotis renkli Doppler US', 'null', 'null'),
('143', 'Vertebral arter RDUS', 'null', 'null'),
('144', 'Renal RDUS (bilateral)', 'null', 'null'),
('145', 'Penil RDUS', 'null', 'null'),
('146', 'Skrotal RDUS', 'null', 'null'),
('147', 'Portal ven RDUS', 'null', 'null'),
('148', 'Abdominal aorta RDUS', 'null', 'null'),
('149', 'Kitle lezyonu RDUS', 'null', 'null'),
('150', 'Meme RDUS', 'null', 'null'),
('151', 'Obstetrik RDUS', 'null', 'null'),
('152', 'Transfontonel RDUS', 'null', 'null'),
('153', 'Transkranial RDUS', 'null', 'null'),
('154', 'Tümör FDG PET', 'null', 'null'),
('155', 'Miyokard PET', 'null', 'null'),
('156', 'Beyin PET', 'null', 'null'),
('157', 'Diğer PET', 'null', 'null');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surveys` varchar(45) NOT NULL,
  `results` varchar(45) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `patient_id` (`patient_id`),
  KEY `story_id` (`story_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `event`
--

INSERT INTO `event` (`event_id`, `patient_id`, `story_id`, `name`, `surveys`, `results`) VALUES
(1, 1, 1, 'deneme-olgu', '12:1,5,7,8,12', '1;2,5,6'),
(2, 1, 2, 'olgu2', 'null', 'null');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ncase`
--

DROP TABLE IF EXISTS `ncase`;
CREATE TABLE IF NOT EXISTS `ncase` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `ncase`
--

INSERT INTO `ncase` (`cid`, `title`, `description`, `type_playable_by`, `type_navigation_panel`, `patient_info`, `edu_opts`, `other`, `bdugumu`) VALUES
(1, 'Çiçek Serası Çalışanı merdivenden düştü', 'TODO', 0, 0, 0, 0, 0, 1),
(2, 'deneme', '', 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `node`
--

DROP TABLE IF EXISTS `node`;
CREATE TABLE IF NOT EXISTS `node` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=35 ;

--
-- Tablo döküm verisi `node`
--

INSERT INTO `node` (`nid`, `id`, `title`, `media`, `content`, `question`, `options`, `type`, `parent`, `isOnset`, `isWrong`, `cid`) VALUES
(10, 4, 'Hata: olay yerine gitmek', NULL, '', 'Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirilmemiş oldu?', 'Aşağıdaki boşluğa yanıtınız yazıp gönder tuşuna tıklayınız.;;Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.::5', 'dal', 0, 0, 0, 1),
(9, 3, 'Doğru: devam', NULL, '', 'Olay yerine gitmeniz, hekimin yasal sorumluluklarından hangisi içine girer?', 'Yanıtınızı aşağıdaki alana yazıp gönder tuşuna tıklayınız.;;Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.::5', 'dal', 0, 0, 0, 1),
(7, 1, 'Giriş', '_n00007.jpg', '33 yaşındaki Hamdi Mersin, çiçek serasında ilaçlama yaptıktan sonra, çiçek serasının tavanındaki bir hasarı gidermek için merdivene çıkarken, kendini kötü hissetmiş, bulantısı olmuş, kısa süreli bir baygınlık geçirmiş, gözleri kararmış ve  5 basamak yukarıdan yere düşmüştür. Düşme sırasında boyun ve bel bölgesini zemindeki beton çıkıntıya çarpmıştır. Kafasına ise bir darbe almadığını belirtmiştir. Doktor olarak görev yaptığınız, çiçek serasının 50 metre uzağında bulunan  aile hekimliği merkezinden, hastaya müdahale etmeniz için çağrıldınız.::', 'Bundan sonraki yaklaşımınız ne olur?', 'Hastalara ilk acil müdahalenin, 112 acil ambulans merkezi tarafından yapılmasının gerektiğini, bu nedenle aile hekimliği kliniğini terk edemeyeceğimi belirtirim. Bu belirtilen hususu ilgili klinik muayene defterine kayıt ederim.::2::::5,,Hastanın durumunu görmek ve gerekirse tıbbi müdahale etmek için, varsa yardımcı sağlık personeli eşliğinde, yoksa bizzat kendim acil hastaya müdahale etmek için çiçek serasına giderim. ::3::6::,,Aile hekimliği merkezi sorumlusunun resmi iznini beklerim. Gerekli izin alınınca olay yerine giderim. ::4::::5', 'dal', 1, 1, 0, 1),
(8, 2, 'Hata: acil mudahele', NULL, '', 'Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirmemiş oldunuz?', 'Yanıtınızı aşağıdaki boşluğu basıp gönder tuşuna basınız.;;Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.::5', 'dal', 0, 0, 0, 1),
(11, 5, 'Acil hastaya müdahele prensipleri', '_n00011.jpg', '5 dakika içinde gerekli tıbbi aletleriniz ile olay yerine ulaştınız. 112 Ambulans merkezine haber verilmesini sağladınız. Sonrasında bir paramedik sağlık memuru da, size yardımcı olabileceğini belirterek sizinle beraber hasta başına geldi. Hasta seranın içinde, açık kapının yanındaki kanepede uzanmaktadır. Halen bulantısı olduğunu belirten hasta, doktor bey bana yardımcı olur musunuz, kendimi iyi hissetmiyorum  demektedir ? Kanepenin yanında, ağzı açık metal kutular bulunmaktadır. Hasta karın ağrısı şikayetininde olduğunu belirtmekte ve yardım istemektedir. <br>\r\nBundan sonraki aşamada ne yaparsınız?::,,\r\n\r\n1- Olay yeri ve çevresini hızlıca incelerim. Aynı anda havayolu, solunum dolaşım kontrolü için hastayı değerlendiririm. Kanepe yanındaki teneke kutuların ne için kullanıldığını sorarım.::\r\n\r\n2- Cevap: Doktor bey bunlar senelerdir çiçek serasında kullandığımız tarım ilaçlarının kutuları. Çiçeklerin üzerinde yerleşen böceklerin öldürülmesi için kullanıyoruz. Ancak bugün ilaçlamada kullanılan k,,', 'Bundan sonraki yaklaşımınız ne olur?', 'Hastanın zehirlenmiş olabileceğini de düşünüp, yeni kullanıldığı belirtilen tarım ilacı kutusunu da getirmelerini isterim ve sera içinde kanepede yatan hastanın öyküsünü öyküsünü alıp, fizik muayenesine geçerim. ::6::::3,,Hastanın öyküsünü alıp, muayenesini yapmadan önce:.....;;doğru yanıt::7::3::', 'dal', 0, 0, 0, 1),
(12, 6, 'Hata: transport gerekirdi', NULL, 'Doktor bey öncelikle hastanın ve sağlık çalışanlarının güvenliği için hastanın seradan uzak havadar bir yere transportunu öneriyorum.', '', 'Transport gerekirdi.::8', 'dal', 0, 0, 0, 1),
(13, 7, 'Acil hastaya yaklaşımda çevre güvenliği', NULL, 'Hastanın ve sağlık çalışanlarının güveliği için öncelikle hastanın sera içinde yattığı yerden, havadar ve açık bir alana nakli gerekmektedir. ', '', 'Transport et::8', 'dal', 0, 0, 0, 1),
(14, 8, 'Hastanın taşınması', '_n00014.jpg', 'Hasta taşınmasında yakınları, hastayı battaniye üzerine taşımak istemektedir.', 'Hastanın transportu sırasında nelere dikkat edersiniz?', 'Hastanın, hasta yakınlarının da yardımı ile bir battaniye üzerine alınarak, yukarıda gösterilen şekilde taşınmasını sağlarım.::9::::2,,Hastanın transportu sırasında önce,;;doğru yanıt::10::::', 'dal', 0, 0, 0, 1),
(15, 9, 'Hata: boyunluk', '_n00015.jpg', 'Doktor bey öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınmasını öneriyorum.', '', 'Devam etmek için tıklayınız.::10', 'dal', 0, 0, 0, 1),
(16, 10, 'Öykü', '_n00016.jpg', 'Öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınması gerekmektedir.Bu işlem acil müdahale edilen hastanın taşınmasında dikkat edilmesi gereken temel ilkelerdir. \r\n\r\nHastanın uygun şartlarda transportu acil olarak sağlandı. Sonrasında havayolu, solunum ve dolaşım değerlendirldi. Olayın öyküsü soruldu.<br>\r\n\r\nResimde görüldüğü şekilde sera içinde ilaçlama yaptığını, sonrasında bulantı hissinin olduğunu, ancak işlerini bugün tamamlaması gerektiğini bu nedenle seranın içinde tamirat işi için çıktığı merdiven üzerinde iken fenalaşıp 5 basamaklı merdivenden düştüğünü, seranın zemininde bulunan beton çıktıya çarptığını, boynunu ve belini incittiğini, halen bulantısı ve terlemeleri olduğunu belirtti. ', 'Sera çalışanının mevcut resim ve öykü kayıtları doğrultusunda şikayetlerine neden olabilecek nedenler nelerdir?', 'Yanıtınızı aşağıdaki alana girip gönder tuşuna tıklayınız.;;doğru yanıt::11', 'dal', 0, 0, 0, 1),
(17, 11, 'Öntanı', NULL, 'Halen açık alanda bir sert bir zemin üzerinde yatan hastanın gömleğinin yaka bölgesinde boyun bölgesindeki  künt travmatik yaralanma sonucu meydana gelen deri abrazyonundan kaynaklanan kan bulaşı görülmekte, ancak aktif kanama izlenmemektedir.', ' Düşündüğünüz ön tanılar doğrultusunda, hastanın tedavisinde acilen yapılması gereken hangi işlem hastanın yaşamının kurtulması açısından önemlidir ?', 'Hastanın gömleğinin düğmelerini açmasını söyler, pantolonunu çıkartmasını söyleyip,  tüm vücudu hızlıca inceler, fizik muayenesini dikkatlice yaparak,  patolojik lezyonları not ederim. Hastanın,elbiselerini tekrar giymesi için yakınlarının yardım etmesini sağlarım.::12::::2,,Öncelikle,;;doğru yanıt::13::::', 'dal', 0, 0, 0, 1),
(18, 12, 'Hata: elbiseler', NULL, 'Elbiselerini çıkartmak çok önemlidir.', '', 'Devam etmek için tıklayınız.::13', 'dal', 0, 0, 0, 1),
(19, 13, 'Tetkik', NULL, 'Hastanın gelen ambulans ile tam teşekkülü devlet hastanesi acil servisine sevki gerçekleşmiştir.  Ambulans gelene kadar bol ılık su ile vücudu yıkanmış ve üzerine temiz bir çarşaf örtülmüştür. Tarım ilacı ile kontaminasyon şüphesi olan elbiseleri imha/analiz edilmek üzere tehlikeli tıbbi atık çöpüne atılmıştır.', 'Acil serviste bu hastaya yönelik olarak hangi tetkikleri istersiniz?', 'Rutin biyokimya::14,,Kan kolinesteraz düzeyi::15,,Direkt Radyografi Tetkiki::16,,Tedavi önerisi için tıklayınız.::17', 'dal', 0, 0, 0, 1),
(20, 14, 'Rutin biyokimya', NULL, 'Sonuçlar: ...', '', 'Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17', 'dal', 0, 0, 0, 1),
(21, 15, 'Kan kolinesteraz düzeyi', NULL, 'Sonuçlar: ...', '', 'Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17', 'dal', 0, 0, 0, 1),
(22, 16, 'Direkt Grafiği', NULL, 'Direkt Grafi Sonucunu <a href=/public/pdf/direkt-grafi.pdf>tıklayınız</a>.', '', 'Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17', 'dal', 0, 0, 0, 1),
(23, 17, 'Tedavi', NULL, 'Tarım ilacı zehirlenmesine yönelik tedavi yaklaşımınızı (Basamaklar halinde belirtin) belirtiniz. Hangi ilacı hangi dozda hangi yolla verilmesini önerirsiniz.', '', 'Yanıtınızı aşağıdaki alana yazıp gönder tuşuna tıklayınız.;;İlaçlar: A,B,C,D::26', 'dal', 0, 0, 0, 1),
(24, 18, 'Tramva', NULL, '::', 'Travmaya yönelik hangi incelemeleri yaparsınız?', 'Yanıtınızı aşağıdaki alana girip gönder tuşuna tıklayınız.;;doğru yanıt::19', 'dal', 0, 0, 0, 1),
(25, 19, 'Görsel Tetkik', NULL, 'İstenen tetkik sonuçlarını değerlendirin? ', '', 'Radyoloji tetkiki::20,,Boyun omur filmi::21,,XYZ tetkiki::24,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25', 'dal', 0, 0, 0, 1),
(26, 20, 'Radyoloji Tetkik Sonuçları', '_n00026.jpg', 'Sonuçlar: <br>\r\n\r\nbel ve göğüs omur filmi: normal <br>\r\nKafa grafisi: Kırık Yok. \r\n', '', 'Başka tetkik için tıklayınız.::19,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25', 'dal', 0, 0, 0, 1),
(27, 21, 'Boyun Omur Filmi ', '_n00027.jpg', 'Resim üzerinde işaretleyiniz.', '', 'Değerlendir;;sdada ::23', 'dal', 0, 0, 0, 1),
(28, 22, 'end', NULL, 'Burada RAPOR sunulacak.', '', 'Başa dönmek için tıklayınız.::1', 'dal', 0, 0, 0, 1),
(29, 23, 'Boyun Omur Filmi Değerlendirme', '_n00029.jpg', 'xxx i işaretlemeniz beklenirdi.', '', 'Başka tetkik için tıklayınız.::19,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25', 'dal', 0, 0, 0, 1),
(30, 24, 'XYZ Tetkiki', NULL, 'Bu tetkik değeri normaldir.', '', 'Başka tetkik için tıklayınız.::19,,Başka tetkik istemiyorsanız. Yorumlamaya geçmek için tıklayınız.::25', 'dal', 0, 0, 0, 1),
(31, 25, 'Yorum', NULL, '::', 'Ne düşünüyorsunuz?', 'Kişinin servika grafisi normal olarak değerlendirdim.Ancak ayrıntılı inceleme için radyoloji konsültasyonu istiyorum.::22,,Yorumunuzu aşağıdaki alana girip gönder tuşuna tıklayınız.;;ddd::22', 'dal', 0, 0, 0, 1),
(33, 26, 'doz', NULL, '::', 'Doz miktarını ve hangi uygulanacağını seçiniz.', 'A--50--250--150--1::1,,B--50--250--50--2::1,,C--50--250--200--3::1,,Dozaj ve alım yolu tercihlerini gönder.::18', 'dal', 0, 0, 0, 1),
(34, 1, 'yeni', '', '', '', '', 'dal', 1, 1, 0, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `discipline_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`parent_id`),
  KEY `discipline_id` (`discipline_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Tablo döküm verisi `parent`
--

INSERT INTO `parent` (`parent_id`, `discipline_id`, `name`) VALUES
(25, 2, 'İlaç Düzeyleri'),
(24, 2, 'Kan Gazı'),
(23, 2, 'Rutin İdrar Tetkiki'),
(22, 2, 'Hemogram'),
(21, 2, 'Rutin Biyokimya'),
(11, 1, 'Direkt Radyografi İstem Formu'),
(12, 1, 'Manyetik Rezonans Görüntüleme İstem Formu'),
(13, 1, 'Bilgisayarlı Tomografi Görüntüleme istem Form'),
(14, 1, 'Ultrasonografi Görüntüleme istem Formu'),
(15, 1, 'Doppler Ultrasonografi İstem Formu'),
(26, 2, 'BOS Biyokimya'),
(27, 2, 'HPLC Testleri'),
(28, 2, 'İdrar Biyokimya'),
(29, 2, 'Hormon Testleri'),
(41, 4, 'Merkez Mikrobiyoloji Tetkik İstem Formu'),
(42, 4, 'Hematolojik Testler Formu'),
(43, 4, 'İmmünolojik Testler Formu'),
(44, 4, 'Merkez Lab. Adli Toksikoloji İstem Formu'),
(51, 5, 'Pozitron Emisyon Tomografi'),
(52, 5, 'I-131 MIBG Sintigrafisi İstem Formu'),
(53, 5, 'In-111 Octreotid Sintigrafisi İstem Formu'),
(54, 5, 'Tc-99m Hmpao İşaretli Lökosit Sintigrafisi İs');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `age` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `surname`, `age`, `gender`) VALUES
(1, 'cemal', 'yıldız', '33', 'E');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `tc` bigint(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `super` int(1) NOT NULL,
  `type` int(1) NOT NULL,
  `photo` varchar(45) NOT NULL,
  PRIMARY KEY (`tc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `people`
--

INSERT INTO `people` (`tc`, `name`, `surname`, `password`, `super`, `type`, `photo`) VALUES
(32977301484, 'emin', 'eker', 'bal19', 1, 1, '32977301484.jpg'),
(11111111111, 'bal19', 'bal19', 'bal19', 1, 1, '11111111111.jpg'),
(12345678912, '', '', '123456', 1, 1, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
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

--
-- Tablo döküm verisi `result`
--


-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `story`
--

DROP TABLE IF EXISTS `story`;
CREATE TABLE IF NOT EXISTS `story` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(45) NOT NULL,
  `content` varchar(800) NOT NULL,
  `photo` varchar(45) NOT NULL,
  PRIMARY KEY (`story_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `story`
--

INSERT INTO `story` (`story_id`, `topic`, `content`, `photo`) VALUES
(1, 'Yaralanma Vakası', 'Arkadaşları tarafından acil servise getirilen öyküsünde yarım saat önce uyluk bölgesinden bıçaklandığı belirtilen, yapılan muayenesinde sağ uyluk üstünde yara bölgesinde sızıntı şeklinde aktif kanaması olan hastaya Uyluk bölgesinden yaralandığı belirtilen şahsın ilk müdahalesini yapıp gerekli öncül tetkikleri yaptıktan sonra yaralanma bölgesi ile ilgili acil yaklaşım gerektiren patolojik durum ne olabilir?', 'bicaklanma.jpg'),
(2, 'Çiçek Serası Çalışanı merdivenden düştü', '33 yaşındaki Hamdi Mersin, çiçek serasında ilaçlama yaptıktan sonra, çiçek serasının tavanındaki bir hasarı gidermek için merdivene çıkarken, kendini kötü hissetmiş, bulantısı olmuş, kısa süreli bir baygınlık geçirmiş, gözleri kararmış ve  5 basamak yukarıdan yere düşmüştür. Düşme sırasında boyun ve bel bölgesini zemindeki beton çıkıntıya çarpmıştır. Kafasına ise bir darbe almadığını belirtmiştir. Doktor olarak görev yaptığınız, çiçek serasının 50 metre uzağında bulunan  aile hekimliği merkezinden, hastaya müdahale etmeniz için çağrıldınız.', 'sera-hastasi.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `survey`
--

DROP TABLE IF EXISTS `survey`;
CREATE TABLE IF NOT EXISTS `survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_survey_id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`survey_id`),
  KEY `discipline_id` (`d_survey_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Tablo döküm verisi `survey`
--

INSERT INTO `survey` (`survey_id`, `d_survey_id`, `name`, `value`) VALUES
(1, '1', 'Beyin MR', 'null'),
(2, '1', 'Diffüzyon MR', 'null'),
(3, '1', 'Perfüzyon MR', 'null'),
(4, '1', 'Bos Akım MR', 'null'),
(5, '1', 'Hipofiz MR', 'null'),
(6, '1', 'Kulak MR', 'null'),
(7, '1', 'Orbita MR', 'null'),
(8, '1', 'Nazofarinks MR', 'null'),
(9, '1', 'Boyun MR', 'null'),
(10, '1', 'Akciğer ve Mediasten MR', 'null'),
(11, '1', 'Kardiyak MR', 'null'),
(12, '1', 'Anjiyografi MR', 'null'),
(13, '1', 'Spektroskobi MR', 'null'),
(14, '1', 'Üst Abdomen MR', 'null'),
(15, '1', 'Alt Abdomen MR', 'null'),
(16, '1', 'Meme MR', 'null'),
(17, '1', 'Dinamik MR', 'null'),
(18, '1', 'Kolanjiografi MR', 'null'),
(19, '1', 'Ürografi MR', 'null'),
(20, '1', 'Servikal Vebtebra MR', 'null'),
(21, '1', 'Torakal Vebtebra MR', 'null'),
(22, '1', 'Lomber Vebtebra MR', 'null'),
(23, '1', 'Myelografi MR Omuz Eklem MR', 'null'),
(24, '1', 'Dirsek Eklem MR', 'null'),
(25, '1', 'El-Bilek Eklem MR', 'null'),
(26, '1', 'Kalça Eklem MR', 'null'),
(27, '1', 'Sakro-ilikal Eklem MR', 'null'),
(28, '1', 'Diz Eklem MR', 'null'),
(29, '1', 'Ayak-Bilek Eklem', 'null'),
(30, '1', 'MR Temporo-Mandibula Eklem MR', 'null'),
(31, '1', 'Artrografi MR', 'null');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takip`
--

DROP TABLE IF EXISTS `takip`;
CREATE TABLE IF NOT EXISTS `takip` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nodes` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `response` varchar(1250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Tablo döküm verisi `takip`
--

INSERT INTO `takip` (`tid`, `nodes`, `response`) VALUES
(1, '1:0 , 1:1 , 1:1 , 2:1 , 1:1', ':,:,:,:,:,'),
(2, '1:0 , 1:1 , 2:1 , 2:1', ':,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,'),
(3, '1:0 , 1:1 , 2:0 ,  1:2 , 3:1', ':,:,:,:,:,'),
(4, '1:0 , 1:3 , 4:1', ':,:,:,'),
(5, '1:0 , 1:2 , 3:1 , 5:1 , 5:1 , 5:1 , 5:1 , 5:2 , 7:1 , 7:1 , 7:1 , 8:2 , 10:1 , 10:1 , 11:1 , 11:1 , 11:2 , 13:1 , 14:1 , 13:2 , 15:1 , 13:3 , 16:2 , 17:1 , 17:0 ,  14:0 ,  13:3 , 16:2 , 15:1 , 13:1 , 14:0 ,  13:4 , 17:1 , 18:1 , 19:1 , 20:2 , 25:1 , ', ':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,:,:,:,:,doğru yanıt:ss,:,:,:,doğru yanıt:sfsf,:,doğru yanıt:sasaa,:,:,doğru yanıt:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,doğru yanıt:ddd,doğru yanıt:ffff,:,:,:,:,:,:,:,:,'),
(6, '1:0 , 1:2 , 3:0 , 1:2 , 3:1 , 5:1 , 5:2 , 7:1 , 8:1 , 8:1 , 8:2 , 10:1 , 11:1 , 11:2 , 13:4 , 17:0 ,  13:1 , 14:1 , 13:1 , 14:2 , 17:1', ':,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:sssss,:,doğru yanıt:sssss,:,:,:,doğru yanıt:,doğru yanıt:,:,doğru yanıt:,:,:,:,:,:,:,:,'),
(7, '1:0 , 1:2 , 17:1 , 18:1 , 19:4 , 25:2 , 22:1 , 1:2 , 22:4 , 25:1 , 25:1 , 25:2', ':,:,doğru yanıt:,doğru yanıt:,:,:,:,:,:,:,:,ddd:,'),
(8, '1:0 , 1:2 , 3:1 , 5:2 , 7:1 , 8:2 , 10:1 , 11:2 , 13:4 , 17:1 , 18:1 , 19:4 , 25:2 , 22:2 , 22:2 , 22:1 , 1:1 , 1:1 , 1:1 , 1:1', ':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:,:,ddd:,ddd:,ddd:,:,:,:,:,:,'),
(9, '1:0 , 1:2 , 3:1', ':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,'),
(10, '1:0 , 1:1 , 2:1 , 2:1 , 5:1 , 5:2 , 7:1 , 8:1 , 9:1 , 10:1 , 11:1 , 11:1 , 11:2 , 13:4 , 17:1 , 18:4 , 17:1 , 17:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , 26:1 , ', ':,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:,:,:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,doğru yanıt:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,:,'),
(11, '1:0 , 1:2 , 3:1 , 5:2 , 7:1 , 8:2 , 10:1 , 11:2 , 13:4 , 17:1 , 26:4 , 18:1 , 19:4 , 25:2', ':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,İlaçlar: A,B,C,D:,:,doğru yanıt:,:,ddd:,'),
(12, '1:0 , 1:0 , 26:0 , 26:0 , 26:0 , 26:0 , 26:4 , 18:0 , 26:0 , 26:0 , 26:0 , 26:4 , 18:1 , 19:4 , 25:2', ':,:,:,:,:,:,:,:,:,:,:,A--50--250--150--1,,B--50--250--50--2,,C--50--250--200--3,,:,doğru yanıt:,:,ddd:,'),
(13, '1:0', ':,'),
(14, '1:0 , 1:2 , 3:0 , 1:1 , 1:2 , 3:1 , 5:1 , 5:0 , 1:2 , 3:1 , 5:2 , 7:1 , 8:2 , 10:1 , 8:1 , 8:2 , 10:1 , 11:2 , 13:1 , 14:2 , 17:1 , 26:1 , 26:2 , 17:1 , 26:4 , 18:1 , 19:1 , 20:1 , 20:1 , 19:2 , 21:1 , 23:1 , 19:4 , 25:2 , 22:4 , 25:2 , 22:0 , 1:2 , ', ':,:,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:deneme,doğru yanıt:,:,doğru yanıt:,:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,:,İlaçlar: A,B,C,D:,:,:,İlaçlar: A,B,C,D:,A--50--250--150--1==B--50--250--50--2==C--50--250--200--3==:,doğru yanıt:,:,:,:,:,:,:,:,ddd:,:,ddd:asdasd,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,:,:,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:,:,doğru yanıt:,:,:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,:,:,:,:,:,:,:,Hekimin yas'),
(15, '1:0', ':,'),
(16, '1:0 , 1:1 , 2:1 , 5:1 , 2:0 , 1:2 , 3:0 , 1:3 , 4:1 , 5:2 , 7:1 , 8:2 , 7:1 , 8:2 , 10:1 , 8:1 , 9:1 , 10:1 , 11:1 , 12:1 , 11:2 , 13:1 , 13:3 , 16:3 , 16:3 , 16:1 , 13:1 , 14:2 , 17:1 , 26:4 , 18:1 , 19:1 , 20:1 , 19:2 , 21:1 , 23:1 , 23:2 , 21:1 , ', ':,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,:,:,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:gübceasdasasd ,:,:,:,doğru yanıt:,:,:,:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:dsfsf,:,:,:,:,:,:,:,İlaçlar: A,B,C,D:,A--50--250--150--1==B--50--250--50--2==C--50--250--200--3==:,doğru yanıt:,:,:,:,:,:,:,:,:,sdada :zdfsdf fss,:,sdada :zdfsdf fss,:,sdada :zdfsdf fss,:,ddd:,'),
(17, '1:0 , 1:2 , 3:0 , 1:2 , 3:1 , 5:2 , 7:1 , 8:2 , 10:1 , 11:2 , 13:4 , 17:1 , 26:4 , 17:1 , 11:1 , 1:1 , 2:1 , 1:1 , 2:1 , 5:1 , 2:1 , 1:1 , 1:2 , 3:2', ':,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,doğru yanıt:,:,doğru yanıt:,doğru yanıt:,doğru yanıt:,:,İlaçlar: A,B,C,D:,:,:,:,:,:,:,Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.:,:,:,:,:,:,'),
(18, '', ''),
(19, '1:0 , 1:1', ':,:,'),
(20, '1:0 , 1:0', ':,:,'),
(21, '1:0 , 1:0 , 1:logout', ':,:,:,'),
(22, '1:0 , 1:0', ':,:,'),
(23, '', ''),
(24, '', ''),
(25, '', ''),
(26, '', ''),
(27, '', ''),
(28, '', ''),
(29, '', ''),
(30, '', ''),
(31, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tet`
--

DROP TABLE IF EXISTS `tet`;
CREATE TABLE IF NOT EXISTS `tet` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=51 ;

--
-- Tablo döküm verisi `tet`
--

INSERT INTO `tet` (`id`, `skey`, `cid`, `nid`, `sid`, `beklenen`, `soylenen`, `zaman`, `puan`) VALUES
(1, 1067235880, 1, 1, 2147483647, '', '', 391.824, 6),
(2, 1067235880, 1, 1, 2147483647, '', '', 930.394, 6),
(3, 1067235880, 1, 1, 2147483647, '', '', 1030.09, 6),
(4, 1067235880, 1, 1, 2147483647, '', '', 1035.81, 6),
(5, 1067235880, 1, 2, 2147483647, '', '', 1056.49, 0),
(6, 1067235880, 1, 1, 2147483647, '', '', 1059.95, -5),
(7, 1067235880, 1, 3, 2147483647, '', '', 1084.9, 0),
(8, 1067235880, 1, 3, 2147483647, '', '', 1101.94, 0),
(9, 1067235880, 1, 3, 2147483647, '', '', 1117.9, 0),
(10, 1067235880, 1, 1, 2147483647, '', '', 1122.32, 0),
(11, 1067235880, 1, 1, 2147483647, '', '', 0.16496, 0),
(12, 60484408, 1, 1, 2147483647, '', '', 0.162767, -5),
(13, 1901049645, 1, 1, 2147483647, '', '', 12.0443, 0),
(14, 1901049645, 1, 3, 2147483647, '', '', 45.761, 0),
(15, 1901049645, 1, 1, 2147483647, '', '', 47.7759, 0),
(16, 1901049645, 1, 1, 2147483647, '', '', 0.167745, 0),
(17, 684729269, 1, 1, 2147483647, '', '', 3.41772, -5),
(18, 684729269, 1, 2, 2147483647, '', '', 5.54535, 0),
(19, 684729269, 1, 1, 2147483647, '', '', 8.34997, 6),
(20, 684729269, 1, 3, 2147483647, '', '', 10.679, 0),
(21, 684729269, 1, 1, 2147483647, '', '', 30.8471, -5),
(22, 684729269, 1, 4, 2147483647, '', '', 0.157591, 0),
(23, 211768497, 1, 1, 2147483647, '', '', 2.19421, -5),
(24, 211768497, 1, 2, 2147483647, '', '', 17.0532, 0),
(25, 211768497, 1, 2, 2147483647, 'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.', '', 19.9218, 0),
(26, 211768497, 1, 5, 2147483647, '', '', 39.2638, -3),
(27, 211768497, 1, 5, 2147483647, '', '', 54.412, -3),
(28, 211768497, 1, 5, 2147483647, 'doğru yanıt', '', 62.1968, 3),
(29, 211768497, 1, 7, 2147483647, '', '', 64.9547, 0),
(30, 211768497, 1, 8, 2147483647, '', '', 84.8331, -2),
(31, 211768497, 1, 8, 2147483647, 'doğru yanıt', '', 90.9109, 0),
(32, 211768497, 1, 10, 2147483647, 'doğru yanıt', '', 97.2812, 0),
(33, 211768497, 1, 11, 2147483647, '', '', 110.595, -2),
(34, 211768497, 1, 11, 2147483647, 'doğru yanıt', '', 113.847, 0),
(35, 211768497, 1, 13, 2147483647, '', '', 0.149342, 0),
(36, 706604553, 1, 1, 2147483647, '', '', 2.73927, -5),
(37, 706604553, 1, 2, 2147483647, 'Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.', '', 4.42984, 0),
(38, 706604553, 1, 5, 2147483647, 'doğru yanıt', '', 8.14433, 3),
(39, 706604553, 1, 7, 2147483647, '', '', 10.2956, 0),
(40, 706604553, 1, 8, 2147483647, '', '', 13.0478, -2),
(41, 706604553, 1, 9, 2147483647, '', '', 14.8118, 0),
(42, 706604553, 1, 10, 2147483647, 'doğru yanıt', '', 19.519, 0),
(43, 706604553, 1, 11, 2147483647, 'doğru yanıt', '', 22.06, 0),
(44, 706604553, 1, 13, 2147483647, '', '', 27.4795, 0),
(45, 706604553, 1, 17, 2147483647, 'İlaçlar: A,B,C,D', '', 29.8471, 0),
(46, 706604553, 1, 26, 2147483647, 'doz::150--50--200--,,ayol::1--2--3--', 'doz::150--50--200--,,ayol::1--1--1--', 36.9198, 0),
(47, 706604553, 1, 18, 2147483647, 'doğru yanıt', '', 38.9851, 0),
(48, 706604553, 1, 19, 2147483647, '', '', 41.1198, 0),
(49, 706604553, 1, 25, 2147483647, 'ddd', '', 43.0041, 0),
(50, 706604553, 1, 22, 2147483647, '', '', 0, 0);
