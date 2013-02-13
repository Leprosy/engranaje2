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
  `ip` varchar(15) NOT NULL,
  `published_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

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

