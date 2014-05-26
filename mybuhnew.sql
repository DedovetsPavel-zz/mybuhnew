/*
MySQL Data Transfer
Source Host: localhost
Source Database: mybuhnew
Target Host: localhost
Target Database: mybuhnew
Date: 23.05.2014 18:30:08
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for buh_accounting
-- ----------------------------
CREATE TABLE `buh_accounting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `date_update` int(20) DEFAULT NULL,
  `comment` mediumtext,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

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
  `parent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `buh_accounting` VALUES ('1', 'счет', '1', '1400225431', 'комментарий', '5');
INSERT INTO `buh_accounting` VALUES ('2', 'тест', '2', '1400502975', 'коммент', '5');
INSERT INTO `buh_accounting` VALUES ('5', 'asdasdasd', '6', '1400503135', 'фавфывафыва', '5');
INSERT INTO `buh_accounting` VALUES ('9', 'asdasdas', '1', '1400505006', 'asdasdasd', '5');
INSERT INTO `buh_accounting` VALUES ('10', 'sadfasdf', '6', '1400678900', 'коммент', '5');
INSERT INTO `buh_accounting` VALUES ('11', 'тест', '5', '1400678980', 'фыва sadf asdf ', '5');
INSERT INTO `buh_accounting` VALUES ('12', 'тест', '2', '1400679201', 'коммент 1111', '5');
INSERT INTO `buh_entrepreneurs` VALUES ('5', '6', 'Иван', 'Организация \"Три руки\"', 'фывфыв111', 'фывфывфы111', 'вфыв', 'фыв111', '1401134400', 'фыввфыв', '12321', '3123', '123123', '123213', '1231', '23123', '123213', '123', '213213', '213', '23213', '1232', '131232', '3123123', '1400702400', '1400788800');
INSERT INTO `buh_entrepreneurs` VALUES ('6', '23', 'asdfasdf', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0');
INSERT INTO `buh_entrepreneurs` VALUES ('7', '24', 'Второй нормальный ', 'asdf', 'asdfasdf', '123123123', '123123213', '123123123', '1398888000', '123 213 ', '213213213', '123123', '3123', '213213', '12321312', '21323', '12312', '3123123', '12312', '3213', '21321', '321323', '123213', '123213', '1400184000', '1401480000');
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
INSERT INTO `buh_files` VALUES ('13', 'infiniti-)))))))14.jpg', '1', '7', '5');
INSERT INTO `buh_files` VALUES ('14', 'infiniti-)))))))54.jpg', '1', '7', '5');
INSERT INTO `buh_files` VALUES ('15', 'infiniti-)))))))76.jpg', '2', '8', '5');
INSERT INTO `buh_files` VALUES ('16', 'kartinka23.jpg', '2', '9', '5');
INSERT INTO `buh_files` VALUES ('17', 'infiniti-)))))))10.jpg', '2', '9', '5');
INSERT INTO `buh_prognozes` VALUES ('51', 'слово', '1399406400', '123', '123213', '5');
INSERT INTO `buh_prognozes` VALUES ('53', 'asdfdfdf', '1398974400', '234123', ' 123 213 213 21', '5');
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
INSERT INTO `buh_users` VALUES ('4', 'admin1', '202cb962ac59075b964b07152d234b70', 'test@mail.ru', '1399384642', '0', '1', '0', 'Иван');
INSERT INTO `buh_users` VALUES ('5', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dedovets_pavel@mail.ru', '0', '0', '0', '0', 'Павел');
INSERT INTO `buh_users` VALUES ('6', 'booker', '202cb962ac59075b964b07152d234b70', 'test1@mail.ru', '1399384642', '0', '2', '4', 'Павел');
INSERT INTO `buh_users` VALUES ('7', 'admin2', '202cb962ac59075b964b07152d234b70', 'test2@mail.ru', '1399384642', '0', '2', '4', 'Павел1');
INSERT INTO `buh_users` VALUES ('8', 'admin31', 'd41d8cd98f00b204e9800998ecf8427e', 'test31@mail.ru', '1400589700', '0', '1', '0', 'Павел31');
INSERT INTO `buh_users` VALUES ('10', '11111111111', 'bbb8aae57c104cda40c93843ad5e6db8', '111@mail.ru', '1400592203', '0', '2', '0', '111111111');
INSERT INTO `buh_users` VALUES ('11', '22222222', '79d886010186eb60e3611cd4a5d0bcae', '222222@mail.ru', '1400592250', '0', '2', '0', '22222222');
INSERT INTO `buh_users` VALUES ('12', '444444444441', 'd41d8cd98f00b204e9800998ecf8427e', '4444444441@mail.ru', '1400592473', '0', '2', '0', '44444444444441');
INSERT INTO `buh_users` VALUES ('13', 'Первый нормальный', '202cb962ac59075b964b07152d234b70', 'first_normal@mail.ru', '1400593484', '0', '2', '0', 'first_normal');
INSERT INTO `buh_users` VALUES ('14', 'fgsdfgsdf', 'eb731f30b94758c9da850a13aecb9b2a', 'test123123123@mail.ru', '1400593633', '0', '2', '0', 'dsfgsd');
INSERT INTO `buh_users` VALUES ('15', '3123123', '230caee2a6820003b2a62f5904c1b293', 'tes123123123123t@mail.ru', '1400593686', '0', '2', '0', '12312');
INSERT INTO `buh_users` VALUES ('16', '312312312', 'd41d8cd98f00b204e9800998ecf8427e', '222123123123123222@mail.ru', '1400593711', '0', '2', '8', '12312');
INSERT INTO `buh_users` VALUES ('17', '12312312', '087b8ec58a9d24257f3711d898377edb', 'te1231232st@mail.ru', '1400595226', '0', '1', '0', '123123');
INSERT INTO `buh_users` VALUES ('18', 'booker_first', '202cb962ac59075b964b07152d234b70', 'booker_first@mail.ru', '1400595328', '0', '1', '0', 'Первый нормальный');
INSERT INTO `buh_users` VALUES ('19', 'first_entre1', 'd41d8cd98f00b204e9800998ecf8427e', 'first_entr1e@mai.ru', '1400595436', '0', '2', '18', 'Первый предприниматель1');
INSERT INTO `buh_users` VALUES ('20', '23123123', 'd6a2e3c51e2434ed72ca2e8ecfe9a34c', 'tes123123123123123123t@mail.ru', '1400595554', '0', '2', '18', '1231');
INSERT INTO `buh_users` VALUES ('21', 'dfasdfasdf', '5e64fe04bfd8363b6c74ea86f5c867f1', 'bosdfsdfsdfoker_first@mail.rusa', '1400597312', '0', '2', '4', 'fas');
INSERT INTO `buh_users` VALUES ('22', 'dfasdfasdf1212', '5e64fe04bfd8363b6c74ea86f5c867f1', 'bosdfs12312dfsdfoker_first@mail.rusa', '1400597339', '0', '2', '4', 'fas1212');
INSERT INTO `buh_users` VALUES ('23', 'sadfsadfsadf', '980c74b90cb5aa611feaec8692bf2853', 'asdfsadfsadf@mai.ru', '1400597488', '0', '2', '4', 'asdfasdf');
INSERT INTO `buh_users` VALUES ('24', 'second_normal', '9ac7bc38d1c12764350f776bfc17c454', 'second_normal@mai.ru', '1400597545', '0', '2', '18', 'Второй нормальный ');
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
INSERT INTO `buh_workers` VALUES ('22', 'asdasd', 'asdasdasd', '1399233600', '1', '21', '12321', '1399320000', '0', '12312312', '5');
INSERT INTO `buh_workers` VALUES ('23', '123123', '123123', '1399492800', '1', '23123123213', '23213', '1398888000', '0', '123213', '5');
INSERT INTO `buh_workers` VALUES ('24', '12312', '12312', '1399406400', '1', '123123', '123123', '1399406400', '0', '123123', '5');
INSERT INTO `buh_workers` VALUES ('25', '123', '123', '1399406400', '1', '12312', '123123', '1400616000', '0', '123123', '5');
INSERT INTO `buh_workers` VALUES ('26', '1232', '12312', '1399320000', '1', '123', '123', '1401220800', '0', '123123', '5');
INSERT INTO `buh_workers` VALUES ('27', '12312323', '123123213', '1400011200', '1', '123123', '123123', '1399924800', '0', '123123', '5');
