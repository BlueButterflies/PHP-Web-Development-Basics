
USE create_database_user;

CREATE TABLE `users` (
 `id` INT AUTO_INCREMENT PRIMARY KEY,
 `username` VARCHAR(30) UNIQUE NOT NULL,
 `password` VARCHAR(26) NOT NULL,
 `profile_picture` BLOB,
 `last_login_time` DATE,
 `is_deleted` BOOL
);

INSERT INTO `users`(`username`, `password`, `last_login_time`, `is_deleted`)
VALUES ('Asen', '963pesho', '2019-09-04', TRUE),
('Gloria', 'fddddd', '2019-01-02', FALSE),
('Anastasia', '0000', '2019-01-02', TRUE),
('Manuel', 'kkkkop85', '2019-04-05', TRUE),
('Sofia', 'plplplplpl', '2018-12-03', FALSE);
