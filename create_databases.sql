CREATE DATABASE IF NOT EXISTS HW4;

USE HW4;

CREATE USER 'hw4_admin'@'localhost' IDENTIFIED BY '123qwerty';
GRANT ALL PRIVILEGES ON HW4.* TO 'hw4_admin'@'localhost' WITH GRANT OPTION;

CREATE TABLE IF NOT EXISTS User(
	user_id INT AUTO_INCREMENT, 
	login VARCHAR(64), 
	password VARCHAR(64), 
	name VARCHAR(64), 
	pathToPicture VARCHAR(256), 
	is_male BOOL, 
	height INT, 
	email varchar(128),
	PRIMARY KEY(user_id), CONSTRAINT UNIQUE (login),  CONSTRAINT UNIQUE (email)
) ENGINE=INNODB;

INSERT INTO User(login, password, is_male, height, email) VALUES('admin', SHA('123admin'), 'true', 171, 'ivajlo.p@abv.bg');
INSERT INTO User(login, password, is_male, height, email) VALUES('nemo', SHA('test'), 'true', 171, 'test@abv.bg');
INSERT INTO User(login, password, is_male, height, email) VALUES('isi', SHA('test'), 'false', 155, 'isi@gmail.com');

SELECT * FROM User;

CREATE TABLE IF NOT EXISTS Boys(
	user_id INT,
	salary FLOAT, 
	has_yaht BOOL, 
	has_villa BOOL,
	car_model VARCHAR(256),
	FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
) ENGINE=INNODB;
INSERT INTO Boys(user_id, salary, has_yaht, has_villa, car_model) VALUES(1, 500, false, true, NULL);
INSERT INTO Boys(user_id, salary, has_yaht, has_villa, car_model) VALUES(2, 400, false, false, NULL);

CREATE TABLE IF NOT EXISTS Girls(
	user_id INT,
	breast INT, 
	legs_lenght INT,
	hair_color VARCHAR(256),
	eyes_color VARCHAR(256),
	FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE
) ENGINE=INNODB;

INSERT INTO Girls(user_id, breast, hair_color, eyes_color, legs_lenght) VALUES(3, 90, 'brown','hazel', 50);
