-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 18 Ağustos 2011 saat 04:06:15
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

CREATE TABLE IF NOT EXISTS `node` (
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

--
-- Tablo döküm verisi `node`
--

INSERT INTO `node` (`id`, `title`, `media`, `content`, `question`, `options`, `type`, `parent`, `isOnset`, `isWrong`) VALUES
(1, 'Patient Presentation', '', '', '', 'Order Tests:2', 0, 0, 1, 0),
(2, 'Tests', 'test.jpg', 'The patient is waiting and the nurse asks what tests you''d like to order.', 'Which tests would you like to order?', 'Lumbar puncture:3, CT Scan:4', 1, 1, 0, 0),
(3, 'Results', '', '', '', 'Incorrect -- try again:2', 0, 2, 0, 1),
(4, 'CT Results', 'ct.jpg', 'Başarıyla tamamladınız.', '', '', 0, 2, 0, 0);
