CREATE TABLE IF NOT EXISTS celebrity (
  id int unsigned COLLATE utf8mb4_unicode_ci NOT NULL AUTO_INCREMENT,
  full_name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_date date COLLATE utf8mb4_unicode_ci NOT NULL,
  shown tinyint COLLATE utf8mb4_unicode_ci NOT NULL default 0,
  photo varchar(255) COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (id),
  UNIQUE KEY (full_name)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

insert into celebrity(id,full_name,created_date,shown) values(1, 'Scarlett Johansson','2020-09-16',0);
insert into celebrity(id,full_name,created_date,shown) values(2, 'Madhuri Dixit','2020-09-19',0);
insert into celebrity(id,full_name,created_date,shown) values(3, 'Natalie Portman','2020-09-17',0);
insert into celebrity(id,full_name,created_date,shown) values(4, 'Aishwarya Rai','2020-09-19',0);
insert into celebrity(id,full_name,created_date,shown) values(5, 'Salma Hayek','2020-09-16',0);
insert into celebrity(id,full_name,created_date,shown) values(6, 'Divya Bharati','2020-09-19',0);