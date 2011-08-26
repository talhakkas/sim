-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 26 Ağustos 2011 saat 05:29:57
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `ncase`
--

INSERT INTO `ncase` (`cid`, `title`, `description`, `type_playable_by`, `type_navigation_panel`, `patient_info`, `edu_opts`, `other`, `bdugumu`) VALUES
(1, 'Çiçek Serası Çalışanı merdivenden düştü', 'TODO', 0, 0, 0, 0, 0, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=33 ;

--
-- Tablo döküm verisi `node`
--

INSERT INTO `node` (`nid`, `id`, `title`, `media`, `content`, `question`, `options`, `type`, `parent`, `isOnset`, `isWrong`, `cid`) VALUES
(10, 4, 'Hata: olay yerine gitmek', NULL, 'Hekimin yasal sorumluluğu\r\n\r\nTCK 4. maddesi uyarınca .... olay yerine gitmeniz gerekirdi.', 'Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirilmemiş oldu?', '[GİRDİ ALANI]::1', 'dal', 0, 0, 0, 1),
(9, 3, 'Doğru: devam', NULL, 'Hekimin yasal sorumluluğu\r\n\r\nTCK ... 4 maddesi ... tıbbı ilgilendiren ... acil hastaya müdahele sorumluluğu bulunmaktadır.', 'Olay yerine gitmeniz, hekimin yasal sorumluluklarından hangisi içine girer?', '[GİRDİ ALANI]::5', 'dal', 0, 0, 0, 1),
(7, 1, 'Giriş', '_n00007.jpg', '33 yaşındaki Hamdi Mersin, çiçek serasında ilaçlama yaptıktan sonra, çiçek serasının tavanındaki bir hasarı gidermek için merdivene çıkarken, kendini kötü hissetmiş, bulantısı olmuş, kısa süreli bir baygınlık geçirmiş, gözleri kararmış ve  5 basamak yukarıdan yere düşmüştür. Düşme sırasında boyun ve bel bölgesini zemindeki beton çıkıntıya çarpmıştır. Kafasına ise bir darbe almadığını belirtmiştir. Doktor olarak görev yaptığınız, çiçek serasının 50 metre uzağında bulunan  aile hekimliği merkezinden, hastaya müdahale etmeniz için çağrıldınız.', 'Bundan sonraki yaklaşımınız ne olur?', 'Klinik defterine kayıt ederim::2,,Acil hastaya müdahele etmek için seraya giderim.::3,,Aile hekimliği merkezinin resmi iznini isterim. Gerekli izin alınınca olay yerine giderim.::4', 'dal', 1, 1, 0, 1),
(8, 2, 'Hata: acil mudahele', NULL, 'Hekimin yasal sorumluluğu\r\n\r\nTCK ... 4 maddesi uyarınca ... acil hastaya müdahele etmeniz gerekiyordu.', 'Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirmemiş oldunuz?', '[GİRDİ ALANI]::1', 'dal', 0, 0, 0, 1),
(11, 5, 'Acil hastaya müdahele prensipleri', NULL, '5 dakika içinde gerekli tıbbi aletleriniz ile olay yerine ulaştınız. 112 Ambulans merkezine haber verilmesini sağladınız. Sonrasında bir paramedik sağlık memuru da, size yardımcı olabileceğini belirterek sizinle beraber hasta başına geldi.\r\n\r\nHasta seranın içinde, açık kapının yanındaki kanepede uzanmaktadır. Halen bulantısı olduğunu belirten hasta, doktor bey bana yardımcı olur musunuz, kendimi iyi hissetmiyorum  demektedir ? Kanepenin yanında, ağzı açık metal kutular bulunmaktadır. Hasta karın ağrısı şikayetininde olduğunu belirtmekte ve yardım istemektedir. Bundan sonraki aşamada ne yaparsınız?\r\n\r\n1- Olay yeri ve çevresini hızlıca incelerim. Aynı anda havayolu, solunum dolaşım kontrolü için hastayı değerlendiririm. Kanepe yanındaki teneke kutuların ne için kullanıldığını sorarım.\r\n\r\n2- Cevap: Doktor bey bunlar senelerdir çiçek serasında kullandığımız tarım ilaçlarının kutuları. Çiçeklerin üzerinde yerleşen böceklerin öldürülmesi için kullanıyoruz. Ancak bugün ilaçlamada kullanılan k', 'Bundan sonraki yaklaşımınız ne olur?', 'Hastanın zehirlenmiş olabileceğini de düşünüp, yeni kullanıldığı belirtilen tarım ilacı kutusunu da getirmelerini isterim ve derhal hastanın öyküsünü alıp, muayenesine geçerim. ::6,,B) Hastanın öykü ve muayenesini yapmadan önce,\r\n\r\n[GİRDİ ALANI]::7', 'dal', 0, 0, 0, 1),
(12, 6, 'Hata: transport gerekirdi', NULL, 'Doktor bey öncelikle hastanın ve sağlık çalışanlarının güvenliği için hastanın seradan uzak havadar bir yere transportunu öneriyorum.', '', 'Transport gerekirdi.::5', 'dal', 0, 0, 0, 1),
(13, 7, 'Acil hastaya yaklaşımda çevre güvenliği', NULL, 'Doktor bey ben de öncelikle hastanın ve sağlık çalışanlarının güveliği için hastanın seradan uzak havadar bir yere transportunun faydalı olduğu inancındayım.', '', 'Transport et::8', 'dal', 0, 0, 0, 1),
(14, 8, 'Hastanın taşınması', NULL, 'Hasta taşınmasında yakınları battaniye üzerine almak istediler.', 'Hastanın transportu sırasında nelere dikkat edersiniz?', 'Hastanın, hasta yakınlarının da yardımı ile bir battaniye üzerine alınarak, belirtilen yere taşınmasını sağlarım.::9,,Hastanın transportu sırasında önce,\r\n\r\n[GİRDİ ALANI]::10', 'dal', 0, 0, 0, 1),
(15, 9, 'Hata: boyunluk', NULL, 'Doktor bey öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınmasını öneriyorum.', '', 'Tekrar deneyiniz.::8', 'dal', 0, 0, 0, 1),
(16, 10, 'Öykü', '_n00016.jpg', 'Doktor bey öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınmasını) destekliyorum. Bu noktalar acil müdahale edilen hastanın taşınmasında temel ilkelerdir. <br>\r\n\r\nHastanın uygun şartlarda transportu acil olarak sağlandı. Sonrasında havayolu, solunum ve dolaşım değerlendirldi. Olayın öyküsü soruldu.<br>\r\n\r\nResimde görüldüğü şekilde sera içinde ilaçlama yaptığını, sonrasında bulantı hissinin olduğunu, ancak işlerini bugün tamamlaması gerektiğini bu nedenle seranın içinde tamirat işi için çıktığı merdiven üzerinde iken fenalaşıp 5 basamaklı merdivenden düştüğünü, seranın zemininde bulunan beton çıktıya çarptığını, boynunu ve belini incittiğini, halen bulantısı ve terlemeleri olduğunu belirtti. ', 'Sera çalışanının mevcut resim ve öykü kayıtları doğrultusunda şikayetlerine neden olabilecek nedenler nelerdir?', 'Öntanı işlemiyle devam [GİRDİ ALANI]::11', 'dal', 0, 0, 0, 1),
(17, 11, 'Öntanı', NULL, 'Halen açık alanda bir set zemin üzerinde yatan hastanın gömleğinin yaka bölgesinde boyundaki künt travmatik yaralanmadan kaynaklanan kan bulaşı görülmekte, aktif kanama  izlenmemektedir.', ' Düşündüğünüz ön tanılar doğrultusunda, hastanın tedavisinde acilen yapılması gereken hangi işlem hastanın yaşamının kurtulması açısından önemlidir ?', 'Hastanın gömleğinin düğmelerini açmasını söyler, pantolonunu çıkartmasını söyleyip,  tüm vücuduna hızlıca bakar, patolojik lezyonları not eder ve elbiselerini tekrar giymesi için yakınlarının yardım etmesini sağlarım.::12,,Öncelikle, [GİRDİ ALANI]::13', 'dal', 0, 0, 0, 1),
(18, 12, 'Hata: elbiseler', NULL, 'Elbiselerini çıkartmak çok önemlidir.', '', 'Tekrar deneyiniz.::11', 'dal', 0, 0, 0, 1),
(19, 13, 'Tetkik', NULL, 'Hastanın gelen ambulans ile tam teşekkülü devlet hastanesi acil servisine sevki gerçekleşmiştir.  Ambulans gelene kadar bol ılık su ile vücudu yıkanmış ve üzerine temiz bir çarşaf örtülmüştür. Tarım ilacı ile kontaminasyon şüphesi olan elbiseleri imha edilmek üzere tehlikeli tıbbi atık çöpüne atılmıştır.', 'Acil serviste bu hastaya yönelik olarak hangi tetkikleri istersiniz?', 'Rutin biyokimya::14,,Kan kolinesteraz düzeyi::15,,XYZ::16,,Tedavi önerisi için ::17', 'dal', 0, 0, 0, 1),
(20, 14, 'Rutin biyokimya', NULL, 'Sonuçlar: ...', '', 'Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17', 'dal', 0, 0, 0, 1),
(21, 15, 'Kan kolinesteraz düzeyi', NULL, 'Sonuçlar: ...', '', 'Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17', 'dal', 0, 0, 0, 1),
(22, 16, 'Hata: XYZ', NULL, 'Bu hasta için XYZ tetkiki gereksizdir.', '', 'Başka tetkik yaptırmak için::13,,Tedavi önerisi için::17', 'dal', 0, 0, 0, 1),
(23, 17, 'Tedavi', NULL, 'Tarım ilacı zehirlenmesine yönelik tedavi yaklaşımınızı (Basmaklar halinde belirtin) belirtiniz.', '', '[GİRDİ ALANI] Tramvayla ilgili olarak::18', 'dal', 0, 0, 0, 1),
(24, 18, 'Tramva', NULL, '', 'Travmaya yönelik hangi incelemeleri yaparsınız?', '[GİRDİ ALANI] görsel tetkik::19', 'dal', 0, 0, 0, 1),
(25, 19, 'Görsel Tetkik', NULL, 'İstenen tetkik sonuçlarını değerlendirin? ', '', 'Radyoloji tetkiki::20,,Boyun omur filmi::21,,XYZ tetkiki::24,,Başka tetkik istemiyorum. Yorumlayacağım.::25', 'dal', 0, 0, 0, 1),
(26, 20, 'Radyoloji Tetkik Sonuçları', '_n00026.jpg', 'Sonuçlar: <br>\r\n\r\nbel ve göğüs omur filmi: normal <br>\r\nKafa grafisi: Kırık Yok. \r\n', '', 'Başka tetkik için::19,,Başka tetkik istemiyorum. Yorumlayacağım.::25', 'dal', 0, 0, 0, 1),
(27, 21, 'Boyun Omur Filmi ', '_n00027.jpg', 'Resim üzerinde işaretleyiniz.', '', 'Değerlendir::23', 'dal', 0, 0, 0, 1),
(28, 22, 'Olgu Sonu', NULL, 'Yorumunuz şöyle fakat böyle olmalıydı. Rapor sunulur. ', '', '', 'dal', 0, 0, 0, 1),
(29, 23, 'Boyun Omur Filmi Değerlendirme', '_n00029.jpg', 'xxx i işaretlemeniz beklenirdi.', '', 'Başka tetkik için::19,,Başka tetkik istemiyorum. Yorumlayacağım.::25', 'dal', 0, 0, 0, 1),
(30, 24, 'XYZ Tetkiki', NULL, 'Bu tetkik değeri normaldir.', '', 'Başka tetkik için::19,,Başka tetkik istemiyorum. Yorumlayacağım.::25', 'dal', 0, 0, 0, 1),
(31, 25, 'Yorum', NULL, '', 'Ne düşünüyorsunuz?', '[GİRDİ ALANI]::22', 'dal', 0, 0, 0, 1);
