SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `comment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL,
  `node_id` bigint(20) unsigned NOT NULL,
  `user` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `content` text COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `karma` smallint(6) NOT NULL,
  `ip` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `published_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=39 ;

INSERT INTO `comment` (`id`, `comment_id`, `node_id`, `user`, `mail`, `content`, `status`, `karma`, `ip`, `published_at`) VALUES
(2, 0, 1, '7687', '67876', '8768678', 'published', 0, '', '2013-02-06 14:03:16'),
(3, 0, 1, '876867867', '67876867', '678', 'published', 0, '', '2013-02-06 14:03:44'),
(4, 0, 1, 'sdf45 ', '67876867 345 345', 'aaaaaaaaaaaaaaaaaaaaa678 3434 5345dfgfd', 'published', 0, '', '2013-02-06 14:04:32'),
(5, 0, 1, 'iuiuyiyu', '87676i76', '786867', 'published', 0, '', '2013-02-06 14:08:53'),
(6, 0, 1, '67yuyt', 'uytuty', 'utyuytjjgh', 'published', 0, '', '2013-02-06 14:10:55'),
(7, 0, 1, 'HOLA', 'Mail@dot.com', 'fuckyou!', 'published', 0, '', '2013-02-07 17:36:40'),
(8, 0, 1, 'Fucker', 'crap@mail.com', 'YOU SUCK!', 'published', 0, '', '2013-02-07 17:48:01'),
(9, 0, 1, 'Fucker', 'crap@mail.com', 'YOU SUCK!', 'published', 0, '', '2013-02-07 17:48:25'),
(10, 0, 1, 'Fucker', 'crap@mail.com', 'YOU SUCK!', 'published', 0, '', '2013-02-07 17:48:41'),
(11, 0, 1, 'Miguel', 'leprosy57@gmail.com', 'DFSFPI OWERK EWORWE', 'published', 0, '', '2013-02-07 17:51:16'),
(12, 0, 1, 'blog', 'lepro@dol.com', 'fgu ds j ewlr l2k 34l 4k23 234', 'published', 0, '', '2013-02-07 17:51:52'),
(13, 0, 1, 'FUCK', 'FUCK', 'FUCK', 'published', 0, '', '2013-02-08 09:17:40'),
(14, 0, 1, '3', '3', '3', 'published', 0, '', '2013-02-08 10:14:56'),
(15, 0, 1, 'CRAPP', 'FUKK', 'FUCK YOU', 'published', 0, '', '2013-02-08 10:29:32'),
(16, 0, 1, '334', '344@dot.com', '234', 'published', 0, '', '2013-02-08 10:35:22'),
(17, 0, 1, '123213', '1231@gmail.com', '23123123', 'published', 0, '', '2013-02-08 10:38:39'),
(18, 0, 1, '12321334', '1231@gmail.com234', '23123123234', 'published', 0, '', '2013-02-08 10:39:27'),
(19, 0, 1, 'blog', 'maiol@dot.com', 'FUCK YOU!', 'published', 0, '', '2013-02-08 11:20:29'),
(20, 0, 1, 'blog', 'leprosy57@gmail.com', 'FUCKERS', 'published', 0, '', '2013-02-08 11:30:06'),
(21, 0, 1, 'blog', 'leprosy57@gmail.com', 'FUCKERS', 'published', 0, '', '2013-02-08 11:30:28'),
(22, 0, 1, 'blog', 'leprosy57@gmail.com', 'FUCKERS', 'published', 0, '', '2013-02-08 11:30:52'),
(23, 0, 1, 'blog', 'leprosy57@gmail.com', 'FUCKERS', 'published', 0, '', '2013-02-08 11:31:15'),
(24, 0, 1, 'blog', 'leprosy57@gmail.com', 'FUCKERS', 'published', 0, '', '2013-02-08 11:40:42'),
(25, 0, 1, 'SHIT ON YOU', 'jsdif@nosel.com', 'dsFDSf HANSAe', 'published', 0, '127.0.0.1', '2013-02-13 11:05:37'),
(26, 0, 1, 'SUCK', 'YOU@gmail.com', 'CRAP', 'published', 0, '127.0.0.1', '2013-02-13 11:08:25'),
(27, 0, 1, 'YO', 'nail@bomb.com', 'CRAP ONLY CRAP', 'published', 0, '127.0.0.1', '2013-02-13 11:09:07'),
(28, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:11:57'),
(29, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:12:04'),
(30, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:12:04'),
(31, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:12:05'),
(32, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:12:05'),
(33, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:12:05'),
(34, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:12:05'),
(35, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:12:06'),
(36, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:12:06'),
(37, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:12:07'),
(38, 0, 1, 'blog', 'leprosy57@gmail.com', 'SDFDSF', 'published', 0, '127.0.0.1', '2013-02-13 11:12:08');

CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `description` text CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `content` text CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `published_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

INSERT INTO `media` (`id`, `user_id`, `status`, `type`, `title`, `slug`, `description`, `content`, `created_at`, `published_at`, `modified_at`) VALUES
(1, 1, 'published', 'image', 'El inicio', 'el-inicio', 'Primera foto', '3.nocturno.jpg', '2013-01-31 13:42:35', '2013-01-31 13:42:35', '2013-01-31 13:42:35');

CREATE TABLE IF NOT EXISTS `node` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `description` text CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `media` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `content` text CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `published_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

INSERT INTO `node` (`id`, `user_id`, `status`, `title`, `slug`, `description`, `media`, `content`, `created_at`, `published_at`, `modified_at`) VALUES
(1, 1, 'published', 'El inicio', 'el-inicio', 'Mi primer post. Inauguro este nuevo espacio, que a la vez es un invento/proyecto...', 'el-inicio', 'El primer post. Wow...', '2013-01-31 13:34:09', '2013-01-31 13:34:09', '2013-01-31 13:34:09');

CREATE TABLE IF NOT EXISTS `node_term` (
  `node_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `node_term` (`node_id`, `term_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 2),
(4, 3),
(4, 1),
(23, 3),
(23, 1),
(24, 3),
(24, 1);

CREATE TABLE IF NOT EXISTS `term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

INSERT INTO `term` (`id`, `name`, `slug`, `type`) VALUES
(1, 'Tecnología', 'tecnologia', 'category'),
(2, 'Música', 'musica', 'category'),
(3, 'Android', 'android', 'tag');

CREATE TABLE IF NOT EXISTS `token` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `expires_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

INSERT INTO `token` (`id`, `user_id`, `token`, `created_at`, `expires_at`) VALUES
(7, 1, '99a16d8c5e70445c128cf1cd1146397838784d9c', '2013-05-03 10:30:44', '2013-04-18 10:30:44');

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

INSERT INTO `user` (`id`, `login`, `password`, `name`) VALUES
(1, 'leprosy', '9565d5ace7cae45a058389d8715c8da62b6bc458', 'Miguel Rojas O.');

