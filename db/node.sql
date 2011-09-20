-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 20 Eylül 2011 saat 03:04:47
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
(7, 1, 'Giriş', '_n00007.jpg', '33 yaşındaki Hamdi Mersin, çiçek serasında ilaçlama yaptıktan sonra, çiçek serasının tavanındaki bir hasarı gidermek için merdivene çıkarken, kendini kötü hissetmiş, bulantısı olmuş, kısa süreli bir baygınlık geçirmiş, gözleri kararmış ve  5 basamak yukarıdan yere düşmüştür. Düşme sırasında boyun ve bel bölgesini zemindeki beton çıkıntıya çarpmıştır. Kafasına ise bir darbe almadığını belirtmiştir. Doktor olarak görev yaptığınız, çiçek serasının 50 metre uzağında bulunan  aile hekimliği merkezinden, hastaya müdahale etmeniz için çağrıldınız.::', 'Bundan sonraki yaklaşımınız ne olur?', 'Hastalara ilk acil müdahalenin, 112 acil ambulans merkezi tarafından yapılmasının gerektiğini, bu nedenle aile hekimliği kliniğini terk edemeyeceğimi belirtirim. Bu belirtilen hususu ilgili klinik muayene defterine kayıt ederim.::2::0::5,,Hastanın durumunu görmek ve gerekirse tıbbi müdahale etmek için, varsa yardımcı sağlık personeli eşliğinde, yoksa bizzat kendim acil hastaya müdahale etmek için çiçek serasına giderim. ::3::6::,,Aile hekimliği merkezi sorumlusunun resmi iznini beklerim. Gerekli izin alınınca olay yerine giderim. ::4::::5', 'dal', 1, 1, 0, 1),
(8, 2, 'Hata: acil mudahele', NULL, '', 'Olay yerine gidilmeyerek hekimin hangi yasal sorumluluğu yerine getirmemiş oldunuz?', 'Yanıtınızı aşağıdaki boşluğu basıp gönder tuşuna basınız.;;Hekimin yasal sorumluluklarından en önemli bir tanesi acil hastaya müdahele zorunluluğudur. Bu nedenle hastanın acil tşhis ve tedavisine yönelik işlemin yapılması gerekmektedir.::5', 'dal', 0, 0, 0, 1),
(11, 5, 'Acil hastaya müdahele prensipleri', '_n00011.jpg', '5 dakika içinde gerekli tıbbi aletleriniz ile olay yerine ulaştınız. 112 Ambulans merkezine haber verilmesini sağladınız. Sonrasında bir paramedik sağlık memuru da, size yardımcı olabileceğini belirterek sizinle beraber hasta başına geldi. Hasta seranın içinde, açık kapının yanındaki kanepede uzanmaktadır. Halen bulantısı olduğunu belirten hasta, doktor bey bana yardımcı olur musunuz, kendimi iyi hissetmiyorum  demektedir ? Kanepenin yanında, ağzı açık metal kutular bulunmaktadır. Hasta karın ağrısı şikayetininde olduğunu belirtmekte ve yardım istemektedir. <br>\r\nBundan sonraki aşamada ne yaparsınız?::,,\r\n\r\n1- Olay yeri ve çevresini hızlıca incelerim. Aynı anda havayolu, solunum dolaşım kontrolü için hastayı değerlendiririm. Kanepe yanındaki teneke kutuların ne için kullanıldığını sorarım.::\r\n\r\n2- Cevap: Doktor bey bunlar senelerdir çiçek serasında kullandığımız tarım ilaçlarının kutuları. Çiçeklerin üzerinde yerleşen böceklerin öldürülmesi için kullanıyoruz. Ancak bugün ilaçlamada kullanılan k,,', 'Bundan sonraki yaklaşımınız ne olur?', 'Hastanın zehirlenmiş olabileceğini de düşünüp, yeni kullanıldığı belirtilen tarım ilacı kutusunu da getirmelerini isterim ve sera içinde kanepede yatan hastanın öyküsünü öyküsünü alıp, fizik muayenesine geçerim. ::6,,Hastanın öyküsünü alıp, muayenesini yapmadan önce:.....;;doğru yanıt::7', 'dal', 0, 0, 0, 1),
(12, 6, 'Hata: transport gerekirdi', NULL, 'Doktor bey öncelikle hastanın ve sağlık çalışanlarının güvenliği için hastanın seradan uzak havadar bir yere transportunu öneriyorum.', '', 'Transport gerekirdi.::8', 'dal', 0, 0, 0, 1),
(13, 7, 'Acil hastaya yaklaşımda çevre güvenliği', NULL, 'Hastanın ve sağlık çalışanlarının güveliği için öncelikle hastanın sera içinde yattığı yerden, havadar ve açık bir alana nakli gerekmektedir. ', '', 'Transport et::8', 'dal', 0, 0, 0, 1),
(14, 8, 'Hastanın taşınması', '_n00014.jpg', 'Hasta taşınmasında yakınları, hastayı battaniye üzerine taşımak istemektedir.', 'Hastanın transportu sırasında nelere dikkat edersiniz?', 'Hastanın, hasta yakınlarının da yardımı ile bir battaniye üzerine alınarak, yukarıda gösterilen şekilde taşınmasını sağlarım.::9,,Hastanın transportu sırasında önce,;;doğru yanıt::10', 'dal', 0, 0, 0, 1),
(15, 9, 'Hata: boyunluk', '_n00015.jpg', 'Doktor bey öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınmasını öneriyorum.', '', 'Devam etmek için tıklayınız.::10', 'dal', 0, 0, 0, 1),
(16, 10, 'Öykü', '_n00016.jpg', 'Öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınması gerekmektedir.Bu işlem acil müdahale edilen hastanın taşınmasında dikkat edilmesi gereken temel ilkelerdir. \r\n\r\nHastanın uygun şartlarda transportu acil olarak sağlandı. Sonrasında havayolu, solunum ve dolaşım değerlendirldi. Olayın öyküsü soruldu.<br>\r\n\r\nResimde görüldüğü şekilde sera içinde ilaçlama yaptığını, sonrasında bulantı hissinin olduğunu, ancak işlerini bugün tamamlaması gerektiğini bu nedenle seranın içinde tamirat işi için çıktığı merdiven üzerinde iken fenalaşıp 5 basamaklı merdivenden düştüğünü, seranın zemininde bulunan beton çıktıya çarptığını, boynunu ve belini incittiğini, halen bulantısı ve terlemeleri olduğunu belirtti. ', 'Sera çalışanının mevcut resim ve öykü kayıtları doğrultusunda şikayetlerine neden olabilecek nedenler nelerdir?', 'Yanıtınızı aşağıdaki alana girip gönder tuşuna tıklayınız.;;doğru yanıt::11', 'dal', 0, 0, 0, 1),
(17, 11, 'Öntanı', NULL, 'Halen açık alanda bir sert bir zemin üzerinde yatan hastanın gömleğinin yaka bölgesinde boyun bölgesindeki  künt travmatik yaralanma sonucu meydana gelen deri abrazyonundan kaynaklanan kan bulaşı görülmekte, ancak aktif kanama izlenmemektedir.', ' Düşündüğünüz ön tanılar doğrultusunda, hastanın tedavisinde acilen yapılması gereken hangi işlem hastanın yaşamının kurtulması açısından önemlidir ?', 'Hastanın gömleğinin düğmelerini açmasını söyler, pantolonunu çıkartmasını söyleyip,  tüm vücudu hızlıca inceler, fizik muayenesini dikkatlice yaparak,  patolojik lezyonları not ederim. Hastanın,elbiselerini tekrar giymesi için yakınlarının yardım etmesini sağlarım.::12,,Öncelikle,;;doğru yanıt::13', 'dal', 0, 0, 0, 1),
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
