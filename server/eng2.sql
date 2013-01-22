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
  `published_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;
INSERT INTO `comment` (`id`, `comment_id`, `node_id`, `user`, `mail`, `content`, `status`, `karma`, `published_at`) VALUES
(1, 0, 4, 'Miguel', 'leprosy57@gmail.com', 'This is a comment', 'published', 3, '2013-01-10 11:06:00'),
(2, 1, 4, 'Leprosy', 'miguel@nimbic.com', 'crap comments', 'spam', -4, '2013-01-10 12:06:00');

CREATE TABLE IF NOT EXISTS `node` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `description` text CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `content` text CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `published_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;
INSERT INTO `node` (`id`, `user_id`, `status`, `title`, `slug`, `description`, `content`, `created_at`, `published_at`, `modified_at`) VALUES
(1, 1, 'published', 'This is an amazing postss', 'first-one', 'First one in db. Another one, amazing posts. This funny post, nedd moar posts. Nom nom nom.', 'THis is First one in db', '2012-12-10 00:00:00', '2012-12-10 04:00:00', '0000-00-00 00:00:00'),
(2, 1, 'published', 'Another one, this time, is the second', 'tow', 'Another one, amazing posts. This funny post, nedd moar posts. Nom nom nom.', 'THis is 2nd one in db', '2012-12-10 00:00:00', '2012-12-10 14:00:00', '0000-00-00 00:00:00'),
(3, 1, 'draft', 'This is Sparta', 'this-is-sparta', 'Another one, amazing posts .First one in db. This funny post, nedd moar posts. Nom nom nom.', '33333333333333THis is First one in db', '2012-12-10 00:00:00', '2012-12-10 14:30:00', '0000-00-00 00:00:00'),
(4, 1, 'published', 'Tool', 'tttow', 'First one in db. Another one, amazing posts. This funny post, nedd moar posts. Nom nom nom.', '<p>Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that''s what you see at a toy store. And you must think you''re in a toy store, because you''re here shopping for an infant named Jeb. </p>\n\n<p>Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like they''re actually proud of that shit.  </p>\n\n<p>Now that we know who you are, I know who I am. I''m not a mistake! It all makes sense! In a comic, you know how you can tell who the arch-villain''s going to be? He''s the exact opposite of the hero. And most times they''re friends, like you and me! I should''ve known way back when... You know why, David? Because of the kids. They called me Mr Glass. </p>', '2012-12-10 00:00:00', '2012-12-10 14:40:00', '0000-00-00 00:00:00');


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
(4, 1);

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

