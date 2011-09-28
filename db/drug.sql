-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 28 Eylül 2011 saat 11:15:20
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
-- Tablo için tablo yapısı `drug`
--

DROP TABLE IF EXISTS `drug`;
CREATE TABLE IF NOT EXISTS `drug` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `drug`
--

INSERT INTO `drug` (`id`, `name`) VALUES
(978, 'test'),
(153, 'foo'),
(123, 'aferin'),
(234, 'aspirin');
