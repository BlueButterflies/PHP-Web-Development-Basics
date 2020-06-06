
USE create_database_people;

CREATE TABLE `people` (
 `id` INT AUTO_INCREMENT PRIMARY KEY,
 `name` VARCHAR(200) NOT NULL,
 `picture` MEDIUMBLOB,
 `height` FLOAT(6, 2),
 `weight` FLOAT(6,2),
 `gender` ENUM('m','f') NOT NULL,create_database_user
 `birthdate` DATE NOT NULL,
 `biography` TEXT
);

INSERT INTO `people` (`name`, `picture`, `height`, `weight`, 
`gender`, `birthdate`, `biography`)
VALUES ('Ivan', NULL, 159.90, 45.80, 'f', '1999-03-26', ''),
('Vincent', NULL, 176.90, 70.80, 'm', '1994-10-26', ''),
('Kathryn', NULL, 165.90, 55.80, 'f', '1999-08-04', ''),
('Kristiana', NULL, 175.90, 65.80, 'f', '1999-08-26', ''),
('Michele', NULL, 170.90, 69.80, 'm', '1991-05-08', '');
