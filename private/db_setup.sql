CREATE DATABASE train_info;
USE train_info;
CREATE USER 'trainuser'@'localhost' IDENTIFIED by 'secretpassword';
GRANT ALL PRIVILEGES on train_info.* to 'trainuser'@'localhost';

CREATE TABLE trains(
  run_number VARCHAR(255) NOT NULL,
  line VARCHAR(255),
  route VARCHAR(255),
  operator_id VARCHAR(255),
  PRIMARY KEY (run_number)
);
