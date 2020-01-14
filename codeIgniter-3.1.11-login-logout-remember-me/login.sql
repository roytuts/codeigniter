USE `roytuts`;

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `login` (`id`, `username`, `password`, `last_login`) VALUES
	(1, 'user', 'user', '2020-01-13 15:14:30');