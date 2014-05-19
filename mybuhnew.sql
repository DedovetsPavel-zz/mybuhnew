/*
MySQL Data Transfer
Source Host: localhost
Source Database: mybuhnew
Target Host: localhost
Target Database: mybuhnew
Date: 16.05.2014 17:56:43
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for buh_entrepreneurs
-- ----------------------------
CREATE TABLE `buh_entrepreneurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `short_name_organization` varchar(255) DEFAULT NULL,
  `inn` varchar(255) DEFAULT NULL,
  `kpp` varchar(255) DEFAULT NULL,
  `ogrn` varchar(255) DEFAULT NULL,
  `registration_date` int(20) DEFAULT NULL,
  `organization_address` varchar(255) DEFAULT NULL,
  `okved` varchar(255) DEFAULT NULL,
  `okato` varchar(255) DEFAULT NULL,
  `okpo` varchar(255) DEFAULT NULL,
  `okfs` varchar(255) DEFAULT NULL,
  `oktmo` varchar(255) DEFAULT NULL,
  `okogu` varchar(255) DEFAULT NULL,
  `okopf` varchar(255) DEFAULT NULL,
  `ifns` varchar(255) DEFAULT NULL,
  `prf` varchar(255) DEFAULT NULL,
  `registration_number_in_prf` varchar(255) DEFAULT NULL,
  `fss` varchar(255) DEFAULT NULL,
  `registration_number_in_fss` varchar(255) DEFAULT NULL,
  `code_subordination` varchar(255) DEFAULT NULL,
  `insurance_tariv_fss` varchar(255) DEFAULT NULL,
  `date_avance` int(20) DEFAULT NULL,
  `date_pay` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for buh_files
-- ----------------------------
CREATE TABLE `buh_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `entrepreneur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for buh_prognozes
-- ----------------------------
CREATE TABLE `buh_prognozes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(255) DEFAULT NULL,
  `deadline` int(20) DEFAULT NULL,
  `consumption` int(20) DEFAULT NULL,
  `comment` mediumtext,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for buh_reports
-- ----------------------------
CREATE TABLE `buh_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `comment` mediumtext,
  `date_update` int(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `pay` int(1) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `entrepreneur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for buh_users
-- ----------------------------
CREATE TABLE `buh_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `createdon` int(20) NOT NULL,
  `blocked` int(1) NOT NULL,
  `role` int(1) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for buh_workers
-- ----------------------------
CREATE TABLE `buh_workers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `date_of_birth` int(20) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `inn` varchar(255) DEFAULT NULL,
  `snils` varchar(255) DEFAULT NULL,
  `hire_date` int(20) DEFAULT NULL,
  `termination_date` int(20) DEFAULT NULL,
  `pay` int(20) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `buh_entrepreneurs` VALUES ('5', '6', 'Иван', 'фыв111', 'фывфыв111', 'фывфывфы111', 'вфыв', 'фыв111', '1401134400', 'фыввфыв', '12321', '3123', '123123', '123213', '1231', '23123', '123213', '123', '213213', '213', '23213', '1232', '131232', '3123123', '1400702400', '1400788800');
INSERT INTO `buh_files` VALUES ('1', 'infiniti-)))))))64.jpg', '1', '12', '5');
INSERT INTO `buh_files` VALUES ('2', 'kartinka67.jpg', '1', '12', '5');
INSERT INTO `buh_files` VALUES ('3', 'infiniti-)))))))64.jpg', '1', '13', '5');
INSERT INTO `buh_files` VALUES ('4', 'kartinka67.jpg', '1', '13', '5');
INSERT INTO `buh_files` VALUES ('5', 'infiniti-)))))))78.jpg', '1', '13', '5');
INSERT INTO `buh_files` VALUES ('6', 'kartinka43.jpg', '1', '13', '5');
INSERT INTO `buh_files` VALUES ('7', 'infiniti-)))))))85.jpg', '1', '14', '5');
INSERT INTO `buh_files` VALUES ('8', 'infiniti-)))))))23.jpg', '1', '15', '5');
INSERT INTO `buh_files` VALUES ('9', 'kartinka33.jpg', '1', '16', '5');
INSERT INTO `buh_files` VALUES ('10', 'infiniti-)))))))42.jpg', '1', '17', '5');
INSERT INTO `buh_files` VALUES ('11', 'infiniti-)))))))44.jpg', '1', '18', '5');
INSERT INTO `buh_files` VALUES ('12', 'infiniti-)))))))94.jpg', '1', '19', '5');
INSERT INTO `buh_prognozes` VALUES ('51', 'слово', '1399406400', '123', '123213', '5');
INSERT INTO `buh_prognozes` VALUES ('52', 'какой-то текст', '1399406400', '123123', '123123', '5');
INSERT INTO `buh_reports` VALUES ('1', 'счет 1', 'коммент', '1399384642', '2', '0', '5', null);
INSERT INTO `buh_reports` VALUES ('2', 'тест ', 'коммент ', '1400161552', '1', '1', '5', null);
INSERT INTO `buh_reports` VALUES ('3', 'ффывфыв', 'фывфывфы', '1400161552', '1', '1', '5', null);
INSERT INTO `buh_reports` VALUES ('4', 'фывафыв', 'афывафыва', '1400161552', '1', '1', '5', null);
INSERT INTO `buh_reports` VALUES ('5', '111111111', '222222222', '1400223372', '1', null, '5', null);
INSERT INTO `buh_reports` VALUES ('6', '333333333', '3444444444444444444', '1400223390', '1', '1', '5', null);
INSERT INTO `buh_reports` VALUES ('7', '123123123', '123123123123123', '1400225431', '2', null, '5', null);
INSERT INTO `buh_reports` VALUES ('8', 'sdfasdf', 'sadfasdfsadfsdf', '1400233213', '1', null, '5', null);
INSERT INTO `buh_reports` VALUES ('9', 'sdfasdfas', 'dfasdfasdf', '1400233239', '1', null, '5', null);
INSERT INTO `buh_reports` VALUES ('10', 'asdasd', 'asdasdasd', '1400234213', '1', null, '5', null);
INSERT INTO `buh_reports` VALUES ('11', 'asdfasdfasdfasdfa', 'sdfasdfasd', '1400239402', '1', '1', '5', '5');
INSERT INTO `buh_reports` VALUES ('12', 'тест файлов', 'тест файлов', '1400239800', '1', '1', '5', '5');
INSERT INTO `buh_reports` VALUES ('13', 'много файлов ', 'sadfasdfasdf', '1400239869', '2', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('14', 'sdfasdfasdfasdfsdasdasdfa', 'sdfasdfasdf', '1400239888', '2', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('15', 'dsf', 'sadfasdfasdf', '1400239978', '2', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('16', 'asdfdfa', 'asвафывафыва', '1400239995', '2', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('17', 'фывафыва', 'фывафывафыва', '1400242748', '1', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('19', '1111111111', '111111111111111', '1400250475', '1', '1', '5', '5');
INSERT INTO `buh_users` VALUES ('4', 'admin1', 'admin1', 'test@mail.ru', '1399384642', '0', '1', '0');
INSERT INTO `buh_users` VALUES ('5', 'admin', 'admin', 'Dedovets_pavel@mail.ru', '0', '0', '0', '0');
INSERT INTO `buh_users` VALUES ('6', 'booker', 'booker', 'test1@mail.ru', '1399384642', '0', '2', '4');
INSERT INTO `buh_workers` VALUES ('1', 'Иван', 'менеджер', '1401134400', '1', '11111111', '22222222', '1401134400', '1401134400', '1401134400', '5');
INSERT INTO `buh_workers` VALUES ('2', '', '', null, null, '', '', null, null, null, null);
INSERT INTO `buh_workers` VALUES ('3', 'asdf', '', null, null, '', '', null, null, null, null);
INSERT INTO `buh_workers` VALUES ('4', 'asdf', '', null, null, '', '', null, null, null, null);
INSERT INTO `buh_workers` VALUES ('5', 'asdf', '', null, null, '', '', null, null, null, null);
INSERT INTO `buh_workers` VALUES ('6', 'asdf', '', null, null, '', '', null, null, null, null);
INSERT INTO `buh_workers` VALUES ('7', 'asdf', '', null, null, '', '', null, null, null, null);
INSERT INTO `buh_workers` VALUES ('8', '11111', '1111', '21', '111', '11', '111', '28', '28', '1111', null);
INSERT INTO `buh_workers` VALUES ('9', '11111', '1111', '21', '111', '11', '111', '28', '28', '1111', null);
INSERT INTO `buh_workers` VALUES ('10', 'sdaf', 'sadfsadf', '7', '1111', 'asdf', '123123', '21', '8', '11111', null);
INSERT INTO `buh_workers` VALUES ('11', 'sdaf', 'sadfsadf', '7', '1111', 'asdf', '123123', '21', '8', '11111', null);
INSERT INTO `buh_workers` VALUES ('12', '12312', '312312', '7', '123', '12321312', '3213', '14', '29', '123123123', '5');
INSERT INTO `buh_workers` VALUES ('13', 'sadfsadf', 'sdfsdafsdf', '1', '1231', '23123', '123123213', '1', '14', '2147483647', '5');
INSERT INTO `buh_workers` VALUES ('14', '123123123123', '12312321', '8', '123', '23123123', '123', '28', '31', '123123', '5');
INSERT INTO `buh_workers` VALUES ('15', 'тест', 'тест', '1399579200', '1', '111111111', '2222222222', '1401393600', '0', '111111', '5');
INSERT INTO `buh_workers` VALUES ('16', '12312', '123', '1398888000', '2', '12312312', '323', '1398888000', '0', '123213', '5');
INSERT INTO `buh_workers` VALUES ('17', '1232132', '3123123', '1401220800', '2', '123123', '123123', '1401220800', '1401393600', '123123123', '5');
