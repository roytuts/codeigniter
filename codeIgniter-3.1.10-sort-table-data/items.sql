#for MySQL 8.x
CREATE TABLE `items` (
  `item_id` int unsigned COLLATE utf8mb4_unicode_ci NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_desc` text COLLATE utf8mb4_unicode_ci,
  `item_price` double COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=UTF8MB4_UNICODE_CI;


insert  into `items`(`item_id`,`item_name`,`item_desc`,`item_price`)
values (1,'CD','CD is a compact disk',100),
(2,'DVD','DVD is larger than CD in size',150),
(3,'ABC','ABC test description',24),
(4,'XYZ','XYZ test description',25.32),
(5,'CD Player','CD player is used to play CD',30.02);

#for MySQL 5.x
CREATE TABLE `items` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `item_desc` text COLLATE latin1_general_ci,
  `item_price` double unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

insert  into `items`(`item_id`,`item_name`,`item_desc`,`item_price`)
values (1,'CD','CD is a compact disk',100),
(2,'DVD','DVD is larger than CD in size',150),
(3,'ABC','ABC test description',24),
(4,'XYZ','XYZ test description',25.32),
(5,'CD Player','CD player is used to play CD',30.02);
