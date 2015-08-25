-- phpMyAdmin SQL Dump
-- version 4.4.6
-- http://www.phpmyadmin.net
--
-- Gép: localhost
-- Létrehozás ideje: 2015. Aug 25. 22:06
-- Kiszolgáló verziója: 10.0.17-MariaDB-1~wheezy
-- PHP verzió: 5.6.11-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `miniblog`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bejegyzesek`
--

CREATE TABLE IF NOT EXISTS `bejegyzesek` (
  `id` int(11) NOT NULL,
  `cim` varchar(50) NOT NULL,
  `szoveg` longtext NOT NULL,
  `kep` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `aktiv` tinyint(1) NOT NULL DEFAULT '1',
  `ki` int(11) NOT NULL,
  `mikor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `bejegyzesek`
--

INSERT INTO `bejegyzesek` (`id`, `cim`, `szoveg`, `kep`, `url`, `aktiv`, `ki`, `mikor`, `updated`) VALUES
(1, 'Teszt bejegyzés', '<p>haLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in massa sed nunc blandit feugiat at quis urna. Ut posuere faucibus iaculis. Phasellus ac purus metus. Ut ut cursus dui. Proin pretium urna et orci porttitor interdum vel quis quam. Nam sed velit condimentum, vehicula libero quis, laoreet purus. Ut fermentum fermentum facilisis. Donec rutrum fermentum lacus quis convallis. Integer dignissim nunc id vestibulum congue. Suspendisse eu eleifend urna. Praesent sed turpis feugiat, laoreet augue vitae, auctor libero. Fusce sollicitudin orci lectus, at mattis leo ullamcorper in. Nulla orci leo, pretium tincidunt massa eget, ultricies blandit nisl. Mauris faucibus volutpat justo auctor vestibulum. Morbi viverra velit nec libero blandit, et rhoncus dolor maximus. Donec convallis auctor neque vitae vulputate. Sed varius vitae libero a convallis. In vitae vestibulum nunc. Fusce porta velit vitae augue congue posuere. Praesent sit amet nisi vitae lectus vulputate efficitur ac eu tortor. Duis placerat aliquam elit. Proin semper suscipit massa, non tempus magna aliquet vitae. Donec nulla ipsum, consequat porta velit ut, hendrerit pretium turpis. Etiam eu arcu purus. Sed ac ex aliquet, tempus diam vel, commodo orci. Vestibulum rhoncus ultricies quam in ornare. Aliquam venenatis tortor turpis. Aenean sit amet neque at velit blandit feugiat. Aliquam purus lacus, dapibus at mollis ac, blandit nec enim. Vestibulum tristique elit sed lectus vehicula, non consectetur elit venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed vehicula tellus. Integer sit amet ipsum ante. Vestibulum metus magna, lacinia nec finibus vitae, accumsan a neque. Proin arcu odio, viverra nec luctus non, porta posuere dui. Ut ac sapien metus. Vivamus a arcu condimentum, semper massa at, placerat mauris. Nam sagittis mi turpis, eu faucibus sem pulvinar nec. Proin iaculis nulla ligula, vitae posuere enim dictum tristique. Ut in convallis mauris, sed facilisis ex. Curabitur interdum imperdiet ipsum nec fringilla. Donec ultricies neque ut efficitur facilisis. Maecenas ac pellentesque tortor, imperdiet consequat mauris. Mauris tempus ornare molestie. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis tempor nulla ac elit viverra, at rutrum velit fringilla. Ut commodo nunc quis ligula cursus, a pellentesque augue euismod. Ut convallis sed arcu at commodo. Fusce aliquet, nisl ac ornare pharetra, urna lectus bibendum nunc, ac porttitor libero quam eu tortor. Phasellus vulputate, diam at pulvinar mollis, risus arcu pulvinar eros, ac elementum mauris velit eu erat. Nunc maximus massa nulla, eget venenatis eros iaculis sed. Quisque et turpis eget odio commodo ultricies sed a est. Ut posuere nec erat non mattis. Etiam non tincidunt metus. Cras mollis sed ligula ac vulputate. Aliquam consectetur mauris vitae magna vulputate tincidunt eu non augue. In a leo sed sem feugiat elementum. Nunc neque enim, maximus in elit a, tempor ultrices mi. Ut vitae aliquam ante. Phasellus vestibulum mollis leo eu egestas. Phasellus augue odio, vestibulum nec vehicula auctor, eleifend eget leo. Nulla ac nisi libero.2</p>\r\n', 'cabin.png', 'portfolioModal1', 1, 0, '2015-08-22 21:14:55', '0000-00-00 00:00:00'),
(2, 'Teszt bejegyzés 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in massa sed nunc blandit feugiat at quis urna. Ut posuere faucibus iaculis. Phasellus ac purus metus. Ut ut cursus dui. Proin pretium urna et orci porttitor interdum vel quis quam. Nam sed velit condimentum, vehicula libero quis, laoreet purus. Ut fermentum fermentum facilisis. Donec rutrum fermentum lacus quis convallis. Integer dignissim nunc id vestibulum congue. Suspendisse eu eleifend urna.\n\nPraesent sed turpis feugiat, laoreet augue vitae, auctor libero. Fusce sollicitudin orci lectus, at mattis leo ullamcorper in. Nulla orci leo, pretium tincidunt massa eget, ultricies blandit nisl. Mauris faucibus volutpat justo auctor vestibulum. Morbi viverra velit nec libero blandit, et rhoncus dolor maximus. Donec convallis auctor neque vitae vulputate. Sed varius vitae libero a convallis. In vitae vestibulum nunc. Fusce porta velit vitae augue congue posuere.\n\nPraesent sit amet nisi vitae lectus vulputate efficitur ac eu tortor. Duis placerat aliquam elit. Proin semper suscipit massa, non tempus magna aliquet vitae. Donec nulla ipsum, consequat porta velit ut, hendrerit pretium turpis. Etiam eu arcu purus. Sed ac ex aliquet, tempus diam vel, commodo orci. Vestibulum rhoncus ultricies quam in ornare. Aliquam venenatis tortor turpis. Aenean sit amet neque at velit blandit feugiat. Aliquam purus lacus, dapibus at mollis ac, blandit nec enim. Vestibulum tristique elit sed lectus vehicula, non consectetur elit venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed vehicula tellus. Integer sit amet ipsum ante. Vestibulum metus magna, lacinia nec finibus vitae, accumsan a neque.\n\nProin arcu odio, viverra nec luctus non, porta posuere dui. Ut ac sapien metus. Vivamus a arcu condimentum, semper massa at, placerat mauris. Nam sagittis mi turpis, eu faucibus sem pulvinar nec. Proin iaculis nulla ligula, vitae posuere enim dictum tristique. Ut in convallis mauris, sed facilisis ex. Curabitur interdum imperdiet ipsum nec fringilla. Donec ultricies neque ut efficitur facilisis. Maecenas ac pellentesque tortor, imperdiet consequat mauris. Mauris tempus ornare molestie. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis tempor nulla ac elit viverra, at rutrum velit fringilla. Ut commodo nunc quis ligula cursus, a pellentesque augue euismod. Ut convallis sed arcu at commodo. Fusce aliquet, nisl ac ornare pharetra, urna lectus bibendum nunc, ac porttitor libero quam eu tortor.\n\nPhasellus vulputate, diam at pulvinar mollis, risus arcu pulvinar eros, ac elementum mauris velit eu erat. Nunc maximus massa nulla, eget venenatis eros iaculis sed. Quisque et turpis eget odio commodo ultricies sed a est. Ut posuere nec erat non mattis. Etiam non tincidunt metus. Cras mollis sed ligula ac vulputate. Aliquam consectetur mauris vitae magna vulputate tincidunt eu non augue. In a leo sed sem feugiat elementum. Nunc neque enim, maximus in elit a, tempor ultrices mi. Ut vitae aliquam ante. Phasellus vestibulum mollis leo eu egestas. Phasellus augue odio, vestibulum nec vehicula auctor, eleifend eget leo. Nulla ac nisi libero.', 'cake.png', 'portfolioModal2', 1, 0, '2015-08-22 19:26:39', '0000-00-00 00:00:00'),
(18, 'új bejegyzés', '<p><span style="color:rgb(44, 62, 80); font-family:lato,helvetica neue,helvetica,arial,sans-serif; font-size:20px; line-height:28.5714302062988px">andit nisl. Mauris faucibus volutpat justo auctor vestibulum. Morbi viverra velit nec libero blandit, et rhoncus dolor maximus. Donec convallis auctor neque vitae vulputate. Sed varius vitae libero a convallis. In vitae vestibulum nunc. Fusce porta velit vitae augue congue posuere. Praesent sit amet nisi vitae lectus vulputate efficitur ac eu tortor. Duis placerat aliquam elit. Proin semper suscipit massa, non tempus magna aliquet vitae. Donec nulla ipsum, consequat porta velit ut, hendrerit pretium turpis. Etiam eu arcu purus. Sed ac ex aliquet, tempus diam vel, commodo orci. Vestibulum rhoncus ultricies quam in ornare. Aliquam venenatis tortor turpis. Aenean sit amet neque at velit blandit feugiat. Aliquam purus lacus, dapibus at mollis ac, blandit nec enim. Vestibulum tristique elit sed lectus vehicula, non consectetur elit venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed vehicula tellus. Integer sit amet ipsum ante. Vestibulum metus magna, lacinia nec finibus vitae, accumsan a neque. Proin arcu odio, viverra nec luctus non, porta posuere dui. Ut ac sapien metus. Vivamus a arcu condimentum, semper massa at, placerat mauris. Nam sagittis mi turpis, eu faucibus sem pulvinar nec. Proin iaculis nulla ligula, vitae posuere enim dictum tristique. Ut in convallis mauris, sed facilisis ex. Curabitur interdum imperdiet ipsum nec fringilla. Donec ultricies neque ut efficitur facilisis. Maecenas ac pellentesque tortor, imperdiet consequat mauris. Mauris tempus ornare molestie. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis tempor nulla ac elit viverra, at rutrum velit fringilla. Ut commodo nunc quis ligula cursus, a pellentesque augue euismod. U</span></p>\r\n', 'uj-bejegyzes.jpg', 'uj-bejegyzes', 1, 0, '2015-08-22 22:29:40', '0000-00-00 00:00:00'),
(20, 'A nagy hír', '<p><span style="color:rgb(44, 62, 80); font-family:lato,helvetica neue,helvetica,arial,sans-serif; font-size:20px; line-height:28.5714302062988px">fermentum facilisis. Donec rutrum fermentum lacus quis convallis. Integer dignissim nunc id vestibulum congue. Suspendisse eu eleifend urna. Praesent sed turpis feugiat, laoreet augue vitae, auctor libero. Fusce sollicitudin orci lectus, at mattis leo ullamcorper in. Nulla orci leo, pretium tincidunt massa eget, ultricies blandit nisl. Mauris faucibus volutpat justo auctor vestibulum. Morbi viverra velit nec libero blandit, et rhoncus dolor maximus. Donec convallis auctor neque vitae vulputate. Sed varius vitae libero a convallis. In vitae vestibulum nunc. Fusce porta velit vitae augue congue posuere. Praesent sit amet nisi vitae lectus vulputate efficitur ac eu tortor. Duis placerat aliquam elit. Proin semper suscipit massa, non tempus magna aliquet vitae. Donec nulla ipsum, consequat porta velit ut, hendrerit pretium turpis. Etiam eu arcu purus. Sed ac ex aliquet, tempus diam vel, commodo orci. Vestibulum rhoncus ultricies quam in ornare. Aliquam venenatis tortor turpis. Aenean sit amet neque at velit blandit feugiat. Aliquam purus lacus, dapibus at mollis ac, blandit nec enim. Vestibulum tristique elit sed lectus vehicula, non consectetur elit venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed vehicula tellus. Integer sit amet ipsum ante. Vestibulum metus magna, lacinia nec finibus vitae, accumsan a neque. Proin arcu odio, viverra nec luctus non, porta posuere dui. Ut ac sapien metus. Vivamus a arcu condimentum, semper massa at, placerat mauris. Nam sagittis mi turpis, eu faucibus sem pulvinar nec. Proin iaculis nulla ligula, vitae posuere enim dictum tristique. Ut in convallis mauris, sed facilisis ex. Curabitur interdum imperdiet ipsum nec fringilla. Donec ultricies neque ut efficitur facilisis. Maecenas ac pellentesque tortor, imperdiet consequat mauris. Mauris tempus ornare molestie. Pellentesque habitant morbi tristique senectus et&nbsp;</span></p>\r\n', 'a-nagy-hir-url-cime.jpg', 'a-nagy-hir-url-cime', 1, 0, '2015-08-23 15:03:40', '2015-08-23 15:06:26'),
(23, 'Mai bejegyzés', '<p><span style="color:rgb(44, 62, 80); font-family:lato,helvetica neue,helvetica,arial,sans-serif; font-size:20px; line-height:28.5714302062988px">Mai bejegyz&eacute;s!</span></p>\r\n\r\n<p><span style="color:rgb(44, 62, 80); font-family:lato,helvetica neue,helvetica,arial,sans-serif; font-size:20px; line-height:28.5714302062988px">vitae lectus vulputate efficitur ac eu tortor. Duis placerat aliquam elit. Proin semper suscipit massa, non tempus magna aliquet vitae. Donec nulla ipsum, consequat porta velit ut, hendrerit pretium turpis. Etiam eu arcu purus. Sed ac ex aliquet, tempus diam vel, commodo orci. Vestibulum rhoncus ultricies quam in ornare. Aliquam venenatis tortor turpis. Aenean sit amet neque at velit blandit feugiat. Aliquam purus lacus, dapibus at mollis ac, blandit nec enim. Vestibulum tristique elit sed lectus vehicula, non consectetur elit venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed vehicula tellus. Integer sit amet ipsum ante. Vestibulum metus magna, lacinia nec finibus vitae, accumsan a neque. Proin arcu odio, viverra nec luctus non, porta posuere dui. Ut ac sapien metus. Vivamus a arcu condimentum, semper massa at, placerat mauris. Nam sagittis mi turpis, eu faucibus sem pulvinar nec. Proin iaculis nulla ligula, vitae posuere enim dictum tristique. Ut in convallis mauris, sed facilisis ex. Curabitur interdum imperdiet ipsum nec fringilla. Donec ultricies neque ut efficitur facilisis. Maecenas ac pellentesque tortor, imperdiet consequat mauris. Mauris tempus ornare molestie. Pellentesque habitant morbi tristique senectus et&nbsp;</span></p>\r\n\r\n<div>&nbsp;</div>\r\n', 'mai-bejegyzes.png', 'mai-bejegyzes', 1, 0, '2015-08-25 19:34:23', '0000-00-00 00:00:00'),
(22, 'Elindulás', '<p><span style="color:rgb(44, 62, 80); font-family:lato,helvetica neue,helvetica,arial,sans-serif; font-size:20px; line-height:28.5714302062988px">534tgrgbfvitae lectus vulputate efficitur ac eu tortor. Duis placerat aliquam elit. Proin semper suscipit massa, non tempus magna aliquet vitae. Donec nulla ipsum, consequat porta velit ut, hendrerit pretium turpis. Etiam eu arcu purus. Sed ac ex aliquet, tempus diam vel, commodo orci. Vestibulum rhoncus ultricies quam in ornare. Aliquam venenatis tortor turpis. Aenean sit amet neque at velit blandit feugiat. Aliquam purus lacus, dapibus at mollis ac, blandit nec enim. Vestibulum tristique elit sed lectus vehicula, non consectetur elit venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed vehicula tellus. Integer sit amet ipsum ante. Vestibulum metus magna, lacinia nec finibus vitae, accumsan a neque. Proin arcu odio, viverra nec luctus non, porta posuere dui. Ut ac sapien metus. Vivamus a arcu condimentum, semper massa at, placerat mauris. Nam sagittis mi turpis, eu faucibus sem pulvinar nec. Proin iaculis nulla ligula, vitae posuere enim dictum tristique. Ut in convallis mauris, sed facilisis ex. Curabitur interdum imperdiet ipsum nec fringilla. Donec ultricies neque ut efficitur facilisis. Maecenas ac pellentesque tortor, imperdiet consequat mauris. Mauris tempus ornare molestie. Pellentesque habitant morbi tristique senectus et&nbsp;</span></p>\r\n\r\n<div>&nbsp;</div>\r\n', 'elindulas.png', 'elindulas', 1, 0, '2015-08-25 19:33:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hsz`
--

CREATE TABLE IF NOT EXISTS `hsz` (
  `id` int(11) NOT NULL,
  `ki` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 NOT NULL,
  `mikor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `hsz`
--

INSERT INTO `hsz` (`id`, `ki`, `bid`, `comment`, `mikor`) VALUES
(1, 0, 1, 'Első hozzászólásom!', '2015-08-22 18:53:11'),
(2, 0, 1, 'Második hozzászólásom !', '2015-08-22 18:58:19'),
(3, 0, 2, 'Ide is hozzászólok teszt miatt!', '2015-08-22 19:00:58'),
(4, 0, 2, 'Új hsz!', '2015-08-22 20:51:38'),
(5, 0, 19, 'Hűha, az jó hír!', '2015-08-22 22:30:54'),
(6, 0, 19, 'Az biztos!\r\n', '2015-08-23 11:25:09'),
(7, 0, 21, 'Érdekes bejegyzés!', '2015-08-23 15:36:12'),
(8, 0, 21, 'Teszt hsz!', '2015-08-23 15:36:42'),
(9, 0, 21, 'Teszt2 hsz.', '2015-08-23 15:37:21'),
(10, 0, 18, 'Új bejegyzés alá írok egyet!', '2015-08-25 19:30:26'),
(11, 0, 23, 'Ide is egy hsz.\r\n', '2015-08-25 19:45:44');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `cim` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url` varchar(255) NOT NULL,
  `megjelenik` int(11) NOT NULL DEFAULT '1',
  `sorrend` int(11) NOT NULL,
  `elobukkano` tinyint(1) NOT NULL,
  `login` int(11) NOT NULL,
  `logout` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `menu`
--

INSERT INTO `menu` (`id`, `cim`, `url`, `megjelenik`, `sorrend`, `elobukkano`, `login`, `logout`) VALUES
(2, 'Bejegyzések', '#portfolio', 1, 0, 0, 0, 0),
(4, 'Adatlap', '#adatlap', 1, 0, 1, 0, 0),
(5, 'Kapcsolat', '#kapcsolat', 1, 0, 1, 0, 0),
(18, 'Belépés', '#belepes', 0, 0, 1, 1, 0),
(19, 'Kilépés', 'logout.php', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `oldalak`
--

CREATE TABLE IF NOT EXISTS `oldalak` (
  `oldal` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `tartalom` longtext NOT NULL,
  `cim` varchar(200) NOT NULL,
  `ikon` varchar(250) NOT NULL,
  `title` longtext NOT NULL,
  `kulcsszavak` longtext NOT NULL,
  `metaleiras` longtext NOT NULL,
  `mikor` datetime NOT NULL,
  `modositotta` varchar(255) NOT NULL,
  `megjelenik` int(11) NOT NULL DEFAULT '1',
  `kozzeteve` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `oldalak`
--

INSERT INTO `oldalak` (`oldal`, `id`, `tartalom`, `cim`, `ikon`, `title`, `kulcsszavak`, `metaleiras`, `mikor`, `modositotta`, `megjelenik`, `kozzeteve`) VALUES
('adatlap', 1, '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px;  font-family: Arial, Helvetica, sans;">\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in massa sed nunc blandit feugiat at quis urna. Ut posuere faucibus iaculis. Phasellus ac purus metus. Ut ut cursus dui. Proin pretium urna et orci porttitor interdum vel quis quam. Nam sed velit condimentum, vehicula libero quis, laoreet purus. Ut fermentum fermentum facilisis. Donec rutrum fermentum lacus quis convallis. Integer dignissim nunc id vestibulum congue. Suspendisse eu eleifend urna.</p>\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px;  font-family: Arial, Helvetica, sans;">\n	Praesent sed turpis feugiat, laoreet augue vitae, auctor libero. Fusce sollicitudin orci lectus, at mattis leo ullamcorper in. Nulla orci leo, pretium tincidunt massa eget, ultricies blandit nisl. Mauris faucibus volutpat justo auctor vestibulum. Morbi viverra velit nec libero blandit, et rhoncus dolor maximus. Donec convallis auctor neque vitae vulputate. Sed varius vitae libero a convallis. In vitae vestibulum nunc. Fusce porta velit vitae augue congue posuere.</p>\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px;  font-family: Arial, Helvetica, sans;">\n	Praesent sit amet nisi vitae lectus vulputate efficitur ac eu tortor. Duis placerat aliquam elit. Proin semper suscipit massa, non tempus magna aliquet vitae. Donec nulla ipsum, consequat porta velit ut, hendrerit pretium turpis. Etiam eu arcu purus. Sed ac ex aliquet, tempus diam vel, commodo orci. Vestibulum rhoncus ultricies quam in ornare. Aliquam venenatis tortor turpis. Aenean sit amet neque at velit blandit feugiat. Aliquam purus lacus, dapibus at mollis ac, blandit nec enim. Vestibulum tristique elit sed lectus vehicula, non consectetur elit venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed vehicula tellus. Integer sit amet ipsum ante. Vestibulum metus magna, lacinia nec finibus vitae, accumsan a neque.</p>\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px;  font-family: Arial, Helvetica, sans;">\n	Proin arcu odio, viverra nec luctus non, porta posuere dui. Ut ac sapien metus. Vivamus a arcu condimentum, semper massa at, placerat mauris. Nam sagittis mi turpis, eu faucibus sem pulvinar nec. Proin iaculis nulla ligula, vitae posuere enim dictum tristique. Ut in convallis mauris, sed facilisis ex. Curabitur interdum imperdiet ipsum nec fringilla. Donec ultricies neque ut efficitur facilisis. Maecenas ac pellentesque tortor, imperdiet consequat mauris. Mauris tempus ornare molestie. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis tempor nulla ac elit viverra, at rutrum velit fringilla. Ut commodo nunc quis ligula cursus, a pellentesque augue euismod. Ut convallis sed arcu at commodo. Fusce aliquet, nisl ac ornare pharetra, urna lectus bibendum nunc, ac porttitor libero quam eu tortor.</p>\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px;  font-family: Arial, Helvetica, sans;">\n	Phasellus vulputate, diam at pulvinar mollis, risus arcu pulvinar eros, ac elementum mauris velit eu erat. Nunc maximus massa nulla, eget venenatis eros iaculis sed. Quisque et turpis eget odio commodo ultricies sed a est. Ut posuere nec erat non mattis. Etiam non tincidunt metus. Cras mollis sed ligula ac vulputate. Aliquam consectetur mauris vitae magna vulputate tincidunt eu non augue. In a leo sed sem feugiat elementum. Nunc neque enim, maximus in elit a, tempor ultrices mi. Ut vitae aliquam ante. Phasellus vestibulum mollis leo eu egestas. Phasellus augue odio, vestibulum nec vehicula auctor, eleifend eget leo. Nulla ac nisi libero.</p>', 'Miniblog adatlapja', 'https://cdn4.iconfinder.com/data/icons/meBaze-Freebies/512/info.png', 'Miniblog adatlap', 'adatlap', 'Miniblog adatlapja', '2015-05-24 13:01:23', 'Buda', 1, 1),
('kapcsolat', 38, '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px;  font-family: Arial, Helvetica, sans;">\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in massa sed nunc blandit feugiat at quis urna. Ut posuere faucibus iaculis. Phasellus ac purus metus. Ut ut cursus dui. Proin pretium urna et orci porttitor interdum vel quis quam. Nam sed velit condimentum, vehicula libero quis, laoreet purus. Ut fermentum fermentum facilisis. Donec rutrum fermentum lacus quis convallis. Integer dignissim nunc id vestibulum congue. Suspendisse eu eleifend urna.</p>\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px;  font-family: Arial, Helvetica, sans;">\n	Praesent sed turpis feugiat, laoreet augue vitae, auctor libero. Fusce sollicitudin orci lectus, at mattis leo ullamcorper in. Nulla orci leo, pretium tincidunt massa eget, ultricies blandit nisl. Mauris faucibus volutpat justo auctor vestibulum. Morbi viverra velit nec libero blandit, et rhoncus dolor maximus. Donec convallis auctor neque vitae vulputate. Sed varius vitae libero a convallis. In vitae vestibulum nunc. Fusce porta velit vitae augue congue posuere.</p>\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px;  font-family: Arial, Helvetica, sans;">\n	Praesent sit amet nisi vitae lectus vulputate efficitur ac eu tortor. Duis placerat aliquam elit. Proin semper suscipit massa, non tempus magna aliquet vitae. Donec nulla ipsum, consequat porta velit ut, hendrerit pretium turpis. Etiam eu arcu purus. Sed ac ex aliquet, tempus diam vel, commodo orci. Vestibulum rhoncus ultricies quam in ornare. Aliquam venenatis tortor turpis. Aenean sit amet neque at velit blandit feugiat. Aliquam purus lacus, dapibus at mollis ac, blandit nec enim. Vestibulum tristique elit sed lectus vehicula, non consectetur elit venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed vehicula tellus. Integer sit amet ipsum ante. Vestibulum metus magna, lacinia nec finibus vitae, accumsan a neque.</p>\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px;  font-family: Arial, Helvetica, sans;">\n	Proin arcu odio, viverra nec luctus non, porta posuere dui. Ut ac sapien metus. Vivamus a arcu condimentum, semper massa at, placerat mauris. Nam sagittis mi turpis, eu faucibus sem pulvinar nec. Proin iaculis nulla ligula, vitae posuere enim dictum tristique. Ut in convallis mauris, sed facilisis ex. Curabitur interdum imperdiet ipsum nec fringilla. Donec ultricies neque ut efficitur facilisis. Maecenas ac pellentesque tortor, imperdiet consequat mauris. Mauris tempus ornare molestie. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis tempor nulla ac elit viverra, at rutrum velit fringilla. Ut commodo nunc quis ligula cursus, a pellentesque augue euismod. Ut convallis sed arcu at commodo. Fusce aliquet, nisl ac ornare pharetra, urna lectus bibendum nunc, ac porttitor libero quam eu tortor.</p>\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px;  font-family: Arial, Helvetica, sans;">\n	Phasellus vulputate, diam at pulvinar mollis, risus arcu pulvinar eros, ac elementum mauris velit eu erat. Nunc maximus massa nulla, eget venenatis eros iaculis sed. Quisque et turpis eget odio commodo ultricies sed a est. Ut posuere nec erat non mattis. Etiam non tincidunt metus. Cras mollis sed ligula ac vulputate. Aliquam consectetur mauris vitae magna vulputate tincidunt eu non augue. In a leo sed sem feugiat elementum. Nunc neque enim, maximus in elit a, tempor ultrices mi. Ut vitae aliquam ante. Phasellus vestibulum mollis leo eu egestas. Phasellus augue odio, vestibulum nec vehicula auctor, eleifend eget leo. Nulla ac nisi libero.</p>', 'Kapcsolat', '/img/contact.png', 'Kapcsolat', 'kapcsolat, elérhetőség', 'Miniblog elérhetősége', '2015-04-30 19:37:45', 'Buda', 1, 1),
('', 58, 'Üdv a Miniblogon, Magyarország egyetlen minőségi blogján!', 'Miniblog', '', 'Miniblog, Magyarország egyetlen minőségi blogja', 'blog, miniblog', 'Miniblog teszt weboldal', '0000-00-00 00:00:00', '', 1, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `sitename` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `settings`
--

INSERT INTO `settings` (`id`, `url`, `sitename`) VALUES
(1, 'http://miniblog.fayrpg.hu/', 'Miniblog');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT 'https://thismoment-a.akamaihd.net/other/1358541690-1665.gif',
  `regtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `utoljara_itt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `regip` varchar(100) NOT NULL DEFAULT '',
  `bans` tinyint(3) NOT NULL DEFAULT '0',
  `rank` tinyint(10) NOT NULL DEFAULT '0',
  `loginip` varchar(255) NOT NULL,
  `onlinemeddig` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=9079 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `user_id`, `nickname`, `password`, `email`, `avatar`, `regtime`, `utoljara_itt`, `regip`, `bans`, `rank`, `loginip`, `onlinemeddig`) VALUES
(5, 0, 'Buda', '18f84f9a90f2083b73bb0515d40d6d3a', 'faypalyazat@gmail2.com', 'http://buda.fayrpg.hu/feltoltes/feltolteseim/HATTER.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '31.46.128.5', 0, 2, '46.139.198.16', '2014-12-12 19:08:53'),
(9075, 1, 'teszt', '6c90aa3760658846a86a263a4e92630e', 'teszt@teszt.hu', 'http://buda.fayrpg.hu/feltoltes/feltolteseim/HATTER.png', '2015-01-14 20:19:45', '0000-00-00 00:00:00', '46.139.193.74', 0, 2, '46.139.198.16', '0000-00-00 00:00:00');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bejegyzesek`
--
ALTER TABLE `bejegyzesek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `hsz`
--
ALTER TABLE `hsz`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `oldalak`
--
ALTER TABLE `oldalak`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`nickname`),
  ADD KEY `user_ban_index` (`bans`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `bejegyzesek`
--
ALTER TABLE `bejegyzesek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT a táblához `hsz`
--
ALTER TABLE `hsz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT a táblához `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT a táblához `oldalak`
--
ALTER TABLE `oldalak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT a táblához `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9079;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
