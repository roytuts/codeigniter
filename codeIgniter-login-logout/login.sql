USE `roytuts`;

--MySQL 5--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

--MySQL 8--
CREATE TABLE login (
    id INT UNSIGNED COLLATE utf8mb4_unicode_ci AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    password VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    last_login DATETIME COLLATE utf8mb4_unicode_ci DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `login` (`id`, `username`, `password`, `last_login`) VALUES
	(1, 'user', 'user', '2021-10-10 15:14:30');