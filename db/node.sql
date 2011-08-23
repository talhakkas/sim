-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 Ağustos 2011 saat 08:24:57
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
-- Tablo için tablo yapısı `node`
--

DROP TABLE IF EXISTS `node`;
CREATE TABLE IF NOT EXISTS `node` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `media` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `question` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `options` varchar(1500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `type` varchar(5) COLLATE utf8_turkish_ci DEFAULT NULL,
  `parent` int(10) unsigned DEFAULT NULL,
  `isOnset` tinyint(1) DEFAULT NULL,
  `isWrong` tinyint(1) DEFAULT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=45 ;

--
-- Tablo döküm verisi `node`
--

INSERT INTO `node` (`nid`, `id`, `title`, `media`, `content`, `question`, `options`, `type`, `parent`, `isOnset`, `isWrong`, `cid`) VALUES
(1, 1, 'Çiçek Serası Çalışanı merdivenden düştü', 'default.jpg', '33 yaşındaki Hamdi Mersin, çiçek serasında ilaçlama yaptıktan sonra, çiçek serasının tavanındaki bir hasarı gidermek için merdivene çıkarken, kendini kötü hissetmiş, bulantısı olmuş, kısa süreli bir baygınlık geçirmiş, gözleri kararmış ve 5 basamak yukarıdan yere düşmüştür. Düşme sırasında boyun ve bel bölgesini zemindeki beton çıkıntıya çarpmıştır. Kafasına ise bir darbe almadığını belirtmiştir. Doktor olarak görev yaptığınız, çiçek serasının 50 metre uzağında bulunan aile hekimliği merkezinden, hastaya müdahale etmeniz için çağrıldınız. 																																																																		', 'Bundan sonraki yaklaşımınız ne olur?', ' Hastalara ilk acil müdahalenin, 112 acil ambulans merkezi tarafından yapılmasının gerektiğini, bu nedenle aile hekimliği kliniğini terk edemeyeceğimi belirtirim. Bu belirtilen hususu ilgili klinik muayene defterine kayıt ederim.      ::2,, Hastanın durumunu görmek ve gerekirse tıbbi müdahale etmek için, varsa yardımcı sağlık personeli eşliğinde, yoksa bizzat kendim acil hastaya müdahale etmek için çiçek serasına giderim. ::3,, Aile hekimliği merkezi sorumlusunun resmi iznini beklerim. Gerekli izin alınınca olay yerine giderim. ::4', 'dal', 4, 1, 0, 1),
(30, 30, 'bar', '', '', '', '  foo::9', 'dal', 22, 0, 0, 2),
(31, 31, 'zoooooooooo', '', '', '', 'vadd::3,,foo::2,,bar::14', 'dal', 30, 0, 0, 2),
(32, 32, 'deneme', '', 'nasıl', 'nasıl', 'ilk::2,,ikin::14,,deaaa::31', 'dal', 1, 0, 0, 2),
(3, 3, 'Doğru', '', '								', 'Olay yerine gitmeniz, hekimin yasal sorumluluklarından hangisi içine girer?', '<input type=text><br>						\r\nAmbulans gelir  ::5', 'dal', 2, 0, 1, 1),
(4, 4, 'Hata', '', '', 'Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirilmemiş oldu?', ' <input type=text><br>\r\nTry again -- olgu sonu::1', 'dal', 1, 0, 1, 1),
(5, 5, 'Ambulans geldi', '', '				5 dakika içinde gerekli tıbbi aletleriniz ile olay yerine ulaştınız. 112 Ambulans merkezine haber verilmesini sağladınız. Sonrasında bir paramedik sağlık memuru da, size yardımcı olabileceğini belirterek sizinle beraber hasta başına geldi. \r\nHasta seranın içinde, açık kapının yanındaki kanepede uzanmaktadır. Halen bulantısı olduğunu belirten hasta, doktor bey bana yardımcı olur musunuz, kendimi iyi hissetmiyorum demektedir ? Kanepenin yanında, ağzı açık metal kutular bulunmaktadır. Hasta karın ağrısı şikayetininde olduğunu belirtmekte ve yardım istemektedir. ', 'Bundan sonraki aşamada ne yaparsınız?', 'Olay yeri ve çevresini hızlıca incelerim Aynı anda havayolu, solunum dolaşım kontrolü için hastayı değerlendiririm. Kanepe yanındaki teneke kutuların ne için kullanıldığını sorarım ::6', 'dal', 3, 0, 0, 0),
(6, 6, 'Doğru', '', '						Doktor bey bunlar senelerdir çiçek serasında kullandığımız tarım ilaçlarının kutuları. Çiçeklerin üzerinde yerleşen böceklerin öldürülmesi için kullanıyoruz. Ancak bugün ilaçlamada kullanılan kimyasal maddeyi yeni temin ettiğimiz için kutusunu burada depolamadık. Burada yok isterseniz, siz hastaya müdahale ederken ilgili tarım ilacı kutusunu incelemeniz için size getirebiliriz. 		', 'Bundan sonraki aşamada ne yaparsınız?', 'Hastanın zehirlenmiş olabileceğini de düşünüp, yeni kullanıldığı belirtilen tarım ilacı kutusunu da getirmelerini isterim ve derhal hastanın öyküsünü alıp, muayenesine geçerim.::7,,Hastanın, <input type=text>::8', 'dal', 5, 0, 0, 1),
(7, 7, 'Hata', '', '				Paramedik konuşur. Doktor bey öncelikle hastanın ve sağlık çalışanlarının güvenliği için hastanın seradan uzak havadar bir yere transportunu öneriyorum. ', '', '		Try again--Olgu sonu::7			', 'dal', 0, 0, 0, 1),
(8, 8, 'Transport', '', '								Hasta seranın içinde, açık kapının yanındaki kanepede uzanmaktadır. Halen bulantısı olduğunu belirten hasta, doktor bey bana yardımcı olur musunuz, kendimi iyi hissetmiyorum demektedir ? Kanepenin yanında, ağzı açık metal kutular bulunmaktadır. Hasta karın ağrısı şikayetininde olduğunu belirtmekte ve yardım istemektedir.', 'Hastanın transportu sırasında nelere dikkat edersiniz?', '										hastanın, hasta yakınlarının da yardımı ile bir battaniye üzerine alınarak, belirtilen yere taşınmasını sağlarım.::10,,Hastanın <input type=text>::11', 'dal', 30, 0, 0, 1),
(10, 10, 'Hata', '', '				paramedik konuşur: Doktor bey öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınmasını öneriyorum. ', '', '					Try again--Olgu sonu::8', 'dal', 0, 0, 0, 1),
(11, 11, 'Hastanın uygun şartlarda transportu acil olarak sağlandı. Sonrasında havayolu, solunum ve dolaşım de', 'olgu.jpg', '								Resimde görüldüğü şekilde sera içinde ilaçlama yaptığını, sonrasında bulantı hissinin olduğunu, ancak işlerini bugün tamamlaması gerektiğini bu nedenle seranın içinde tamirat işi için çıktığı merdiven üzerinde iken fenalaşıp 5 basamaklı merdivenden düştüğünü, seranın zemininde bulunan beton çıktıya çarptığını, boynunu ve belini incittiğini, halen bulantısı ve terlemeleri olduğunu belirtti. 								', 'Sera çalışanının mevcut resim ve öykü kayıtları doğrultusunda şikayetlerine neden olabilecek nedenler nelerdir?', '											devam::12																			', 'dal', 0, 0, 0, 1),
(12, 12, 'Doğru', '', '				Halen açık alanda bir set zemin üzerinde yatan hastanın gömleğinin yaka bölgesinde boyundaki künt travmatik yaralanmadan kaynaklanan kan bulaşı görülmekte, aktif kanama izlenmemektedir.', 'Düşündüğünüz ön tanılar doğrultusunda, hastanın tedavisinde acilen yapılması gereken hangi işlem hastanın yaşamının kurtulması açısından önemlidir ? ', '					Hastanın gömleğinin düğmelerini açmasını söyler, pantolonunu çıkartmasını söyleyip, tüm vücuduna hızlıca bakar, patolojik lezyonları not eder ve elbiselerini tekrar giymesi için yakınlarının yardım etmesini sağlarım.::13,,Öncelikle, <input type=text>::14', 'dal', 0, 0, 0, 1),
(13, 13, 'Hata', '', '				', '', '	Try again--olgu sonu::12			', 'dal', 0, 0, 0, 1),
(14, 14, 'Devam', '', '	Hastanın gelen ambulans ile tam teşekkülü devlet hastanesi acil servisine sevki gerçekleşmiştir. Ambulans gelene kadar bol ılık su ile vücudu yıkanmış ve üzerine temiz bir çarşaf örtülmüştür. Tarım ilacı ile kontaminasyon şüphesi olan elbiseleri imha edilmek üzere tehlikeli tıbbi atık çöpüne atılmıştır.			', 'Hangi tetkikleri istersiniz', ' 					 ggg::33', 'dal', 0, 0, 0, 1),
(2, 2, 'Hata', '', '																', 'Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirmemiş oldunuz?', '<input type=text><br>\r\n														try again -- olgu sonu ::1', 'dal', 1, 0, 0, 1),
(33, 33, 'gggggggggggg', '', '', '', ' foo ::1,, foo ::1,,::1', 'dal', 1, 0, 0, 0),
(37, 1, 'İlk öykü', '', '', '', '', 'oyku', 1, 1, 0, 11),
(39, 1, 'İlk öykü', '', '', '', '', 'oyku', 1, 1, 0, 12),
(0, 1, 'İlk öykü', 'default.jpg', '', '', ' ::2', 'oyku', 1, 1, 0, 13),
(41, 1, 'İlk öykü', '', '', '', '', 'oyku', 1, 1, 0, 4),
(42, 2, 'foo', NULL, 'bar', 'ne', 'buraya yaz::1', 'dal', 1, 0, 0, 0),
(43, 2, 'ff', NULL, 'bbb', 'ne', 'buraya yaz::1', 'dal', 1, 0, 0, 0),
(44, 2, 'ff', NULL, 'ada', '', 'buraya yaz::1', 'dal', 1, 0, 0, 13);
