-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';


INSERT INTO `component` (`component_id`, `c_type_id`, `c_name`, `c_powercon`, `c_price`, `c_stock`, `c_score`) VALUES
('PC115176',	'PC1151',	'i7 8700k',	120,	6330000,	3,	0),
('PC115175',	'PC1151',	'i7 8700',	120,	5330000,	8,	0),
('PC115174',	'PC1151',	'i7 7700k',	110,	5070000,	4,	0),
('PC115173',	'PC1151',	'i7 7700',	110,	4540000,	5,	0),
('PC115172',	'PC1151',	'i7 6700k',	125,	4590000,	2,	0),
('PC115171',	'PC1151',	'i7 6700',	120,	4515000,	7,	0),
('PC115160',	'PC1151',	'i5 8600k',	115,	4430000,	5,	0),
('PC115159',	'PC1151',	'i5 8400',	110,	3130000,	7,	0),
('PC115158',	'PC1151',	'i5 7600k',	120,	3500000,	6,	0),
('PC115157',	'PC1151',	'i5 7600',	115,	3230000,	4,	0),
('PC115156',	'PC1151',	'i5 7500',	110,	2900000,	3,	0),
('PC115155',	'PC1151',	'i5 7400',	105,	2560000,	6,	0),
('PC115154',	'PC1151',	'i5 6600k',	120,	3250000,	3,	0),
('PC115153',	'PC1151',	'i5 6600',	115,	3000000,	6,	0),
('PC115152',	'PC1151',	'i5 6500',	110,	2815000,	1,	0),
('PC115151',	'PC1151',	'i5 6400',	105,	2515000,	3,	0),
('PC115106',	'PC1151',	'i3 8350k',	95,	3065000,	3,	0),
('PC115105',	'PC1151',	'i3 8100',	85,	2015000,	6,	0),
('PC115104',	'PC1151',	'i3 7350k',	95,	2135000,	2,	0),
('PC115103',	'PC1151',	'i3 7300',	85,	2215000,	1,	0),
('PC115102',	'PC1151',	'i3 7100',	80,	1585000,	6,	0),
('PC115101',	'PC1151',	'i3 6100',	75,	1575000,	3,	0);

INSERT INTO `component_type` (`c_type_id`, `c_type_name`) VALUES
('PC1151',	'Processor'),
('MB1151',	'Motherboard'),
('RM4418',	'RAM'),
('GC1000',	'Graphics Card');





INSERT INTO `user` (`email`, `user_name`, `first_name`, `last_name`, `password`, `salt`, `address`, `phone`) VALUES
('jorji.gjk@gmail.com',	'1050ti',	'George',	'Joseph Kristian',	'bb91c269d9df379eb9dae85c1f64139e',	'admin',	'Serpong',	2147483647);

-- 2017-12-04 11:42:23
