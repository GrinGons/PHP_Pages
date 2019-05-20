drop database if exists php_car;
create database php_car;

grant all privileges on kunho.* to 'kunho'@'localhost' identified by 'lamp2!@#G';

USE php_car;

CREATE TABLE IF NOT EXISTS `proj_ex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_sl` varchar(100) NOT NULL,
  `year_r` int(3) NOT NULL,
  `colr_c` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
); 
