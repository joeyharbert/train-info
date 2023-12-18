CREATE DATABASE train_info;
USE train_info;
CREATE USER 'trainuser'@'localhost' IDENTIFIED by 'secretpassword';
GRANT ALL PRIVILEGES on train_info.* to 'trainuser'@'localhost';

CREATE TABLE files(
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE trains(
  id INT(11) NOT NULL AUTO_INCREMENT,
  line VARCHAR(255),
  route VARCHAR(255),
  run_number VARCHAR(255),
  operator_id VARCHAR(255),
  file_id INT(11),
  PRIMARY KEY (id),
  FOREIGN KEY (file_id) REFERENCES files(id)
);
CREATE INDEX fk_file_id
on trains (file_id);