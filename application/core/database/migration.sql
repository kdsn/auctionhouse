CREATE DATABASE coredb
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

CREATE USER 'coreusr'@'localhost' IDENTIFIED BY '2Cq-Tom7-cEg';

GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,ALTER
     ON coredb.*
     TO 'coreusr'@'localhost';

/*
  --------------------------------------------------------------------------------------------------------------------
*/

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(64) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `permissions` enum('user','staff','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `users_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(35) DEFAULT NULL,
  `last_name` varchar(35) DEFAULT NULL,
  `address` varchar(140) DEFAULT NULL,
  `zip` varchar(16) DEFAULT NULL,
  `city` varchar(35) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `phone` varchar(33) DEFAULT NULL COMMENT 'up to 5 digit prefix, up to 15 digit phone no, up to 11 digit extension, separated by .',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `users_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='up to 5 digit prefix, up to 15 digit phone no, up to 11 digit extension, separated by .';

CREATE TABLE `users_session` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `hash` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
  --------------------------------------------------------------------------------------------------------------------
*/

CREATE TABLE `tabel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,



  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)