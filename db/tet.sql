-- phpMyAdmin SQL Dump
-- version 3.3.7deb5
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 19 Eylül 2011 saat 18:11:48
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

--
-- Tablo döküm verisi `tet`
--

