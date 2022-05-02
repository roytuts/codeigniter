CREATE TABLE `users` (
	`id` INT COLLATE utf8mb4_unicode_ci NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
	`password` VARCHAR(255) COLLATE utf8mb4_unicode_ci NULL,
	`email` VARCHAR(100)COLLATE utf8mb4_unicode_ci NULL,
	`phone` INT COLLATE utf8mb4_unicode_ci NOT NULL,
	`gender` VARCHAR(6) COLLATE utf8mb4_unicode_ci NOT NULL,
	`dob` VARCHAR(10) COLLATE utf8mb4_unicode_ci NOT NULL,
	`address` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
