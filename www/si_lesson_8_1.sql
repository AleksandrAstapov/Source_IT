
CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `surname` VARCHAR(32) NULL DEFAULT NULL,
  `name` VARCHAR(32) NULL DEFAULT NULL,
  `patronymic` VARCHAR(32) NULL DEFAULT NULL,
  `email` VARCHAR(32) NOT NULL,
  `phone` VARCHAR(20) NULL DEFAULT NULL,
  `comment` TEXT NULL,
  `login` VARCHAR(32) NULL DEFAULT NULL,
  `password` VARCHAR(32) NOT NULL,
  `access` VARCHAR(32) NOT NULL,
  `register_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `e-mail` (`email`),
  UNIQUE INDEX `login` (`login`)
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `session` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `date_session` DATE NOT NULL,
  `end_register` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `acces` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `permission` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name` (`name`)
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `acces_users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `access_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `access_id` (`access_id`),
  INDEX `user_id` (`user_id`),
  CONSTRAINT `acces_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `acces_users_ibfk_2` FOREIGN KEY (`access_id`) REFERENCES `access` (`id`)
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;