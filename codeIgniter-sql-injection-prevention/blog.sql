CREATE DATABASE IF NOT EXISTS `roytuts` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `roytuts`;

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_date` datetime NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_content`, `blog_date`) VALUES
	(1, 'Test Blog Title', 'Test Blog Content', '2020-09-30 13:42:17'),
	(2, 'Test Blog Title', 'Test Blog Content', '2020-09-30 13:42:17'),
	(3, 'Test Blog Title', 'Test Blog Content', '2020-09-30 13:42:17');
