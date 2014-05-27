/*
MySQL Data Transfer
Source Host: localhost
Source Database: mybuhnew
Target Host: localhost
Target Database: mybuhnew
Date: 27.05.2014 16:29:13
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for buh_account_comments
-- ----------------------------
CREATE TABLE `buh_account_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` mediumtext,
  `user_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `createdon` int(20) DEFAULT NULL,
  `author` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

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
  `ready` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `buh_account_comments` VALUES ('1', 'коммент1', '4', '13', '1401110032', '1');
INSERT INTO `buh_account_comments` VALUES ('2', 'коммент2', '4', '13', '1401110099', '1');
INSERT INTO `buh_account_comments` VALUES ('3', 'коммент 3', '4', '13', '1401174854', '1');
INSERT INTO `buh_account_comments` VALUES ('4', 'коммент 4', '4', '13', '1401175027', '1');
INSERT INTO `buh_account_comments` VALUES ('5', 'коммент 5', '4', '13', '1401175070', '1');
INSERT INTO `buh_account_comments` VALUES ('6', 'коммент 6', '4', '13', '1401175101', '1');
INSERT INTO `buh_account_comments` VALUES ('7', 'коммент предпринимателя', '6', '13', '1401176156', '2');
INSERT INTO `buh_account_comments` VALUES ('8', 'новый коммент', '4', '13', '1401176745', '1');
INSERT INTO `buh_account_comments` VALUES ('9', 'еще новый коммент', '6', '13', '1401176756', '2');
INSERT INTO `buh_account_comments` VALUES ('10', 'еще новее коммент', '6', '13', '1401176922', '2');
INSERT INTO `buh_account_comments` VALUES ('11', 'коммент 1', '6', '14', '1401176993', '2');
INSERT INTO `buh_account_comments` VALUES ('12', 'ответ ', '4', '14', '1401177050', '1');
INSERT INTO `buh_account_comments` VALUES ('13', 'вопрос 2', '6', '14', '1401177062', '2');
INSERT INTO `buh_account_comments` VALUES ('14', 'ответ 2', '4', '14', '1401177071', '1');
INSERT INTO `buh_account_comments` VALUES ('15', 'sdfasf', '6', '15', '1401177810', '2');
INSERT INTO `buh_account_comments` VALUES ('16', 'вафывафыа', '6', '16', '1401177822', '2');
INSERT INTO `buh_account_comments` VALUES ('17', 'фывафывафываываыфва', '6', '16', '1401177836', '2');
INSERT INTO `buh_account_comments` VALUES ('18', '123', '6', '16', '1401177983', '2');
INSERT INTO `buh_account_comments` VALUES ('19', '123123', '6', '16', '1401178154', '2');
INSERT INTO `buh_account_comments` VALUES ('20', 'sdafasdf', '6', '16', '1401178173', '2');
INSERT INTO `buh_account_comments` VALUES ('21', 'sdaf ыва выа', '6', '16', '1401178202', '2');
INSERT INTO `buh_account_comments` VALUES ('22', '123', '6', '16', '1401178318', '2');
INSERT INTO `buh_account_comments` VALUES ('23', '123', '6', '16', '1401178360', '2');
INSERT INTO `buh_account_comments` VALUES ('24', 'asdasd', '6', '16', '1401181217', '2');
INSERT INTO `buh_account_comments` VALUES ('25', 'sdfffff', '6', '16', '1401181321', '2');
INSERT INTO `buh_account_comments` VALUES ('26', 'asdasd', '4', '5', '1401190596', '1');
INSERT INTO `buh_account_comments` VALUES ('27', 'новая задача, первый комментарий', '6', '17', '1401191678', '2');
INSERT INTO `buh_account_comments` VALUES ('28', 'коммент', '4', '17', '1401192123', '1');
INSERT INTO `buh_accounting` VALUES ('1', '1123', '8', '1401181833', '', '5', null);
INSERT INTO `buh_accounting` VALUES ('2', 'тест', '2', '1400502975', 'коммент', '5', null);
INSERT INTO `buh_accounting` VALUES ('5', 'asdasdasd11', '6', '1401190596', 'asdasd', '5', null);
INSERT INTO `buh_accounting` VALUES ('9', 'asdasdas', '1', '1401178790', '', '5', null);
INSERT INTO `buh_accounting` VALUES ('10', 'sadfasdf', '6', '1400678900', 'коммент', '5', null);
INSERT INTO `buh_accounting` VALUES ('11', 'тест', '5', '1400678980', 'фыва sadf asdf ', '5', null);
INSERT INTO `buh_accounting` VALUES ('12', 'тест123123123123123', '1', '1401190574', '', '5', null);
INSERT INTO `buh_accounting` VALUES ('13', '111', '1', '1401176922', 'еще новее коммент', '5', '1');
INSERT INTO `buh_accounting` VALUES ('14', 'новая задача11', '1', '1401192339', '', '5', null);
INSERT INTO `buh_accounting` VALUES ('15', 'фываа', '8', '1401177810', 'sdfasf', '5', null);
INSERT INTO `buh_accounting` VALUES ('16', '111', '4', '1401181536', '', '5', null);
INSERT INTO `buh_accounting` VALUES ('17', 'Новая задача1', '7', '1401192123', 'коммент', '5', null);
INSERT INTO `buh_entrepreneurs` VALUES ('5', '6', 'Павел', 'Организация \"Три руки\"', 'фывфыв111', 'фывфывфы111', 'вфыв', 'фыв111', '1401134400', 'фыввфыв', '12321', '3123', '123123', '123213', '1231', '23123', '123213', '123', '213213', '213', '23213', '1232', '131232', '3123123', '1400702400', '1400788800');
INSERT INTO `buh_entrepreneurs` VALUES ('6', '23', 'asdfasdf', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0');
INSERT INTO `buh_entrepreneurs` VALUES ('7', '24', 'Второй нормальный ', 'asdf', 'asdfasdf', '123123123', '123123213', '123123123', '1398888000', '123 213 ', '213213213', '123123', '3123', '213213', '12321312', '21323', '12312', '3123123', '12312', '3213', '21321', '321323', '123213', '123213', '1400184000', '1401480000');
INSERT INTO `buh_entrepreneurs` VALUES ('8', '25', 'Тест', null, null, null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0');
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
INSERT INTO `buh_files` VALUES ('18', 'infiniti-)))))))71.jpg', '2', '13', '5');
INSERT INTO `buh_files` VALUES ('19', 'kartinka78.jpg', '2', '13', '5');
INSERT INTO `buh_files` VALUES ('20', 'infiniti-)))))))52.jpg', '2', '13', '5');
INSERT INTO `buh_files` VALUES ('21', 'kartinka2248.jpg', '2', '13', '5');
INSERT INTO `buh_files` VALUES ('22', 'infiniti-)))))))2823.jpg', '2', '13', '5');
INSERT INTO `buh_files` VALUES ('23', 'infiniti-)))))))83.jpg', '2', '13', '5');
INSERT INTO `buh_files` VALUES ('24', 'infiniti-)))))))2868.jpg', '2', '13', '5');
INSERT INTO `buh_files` VALUES ('25', 'kartinka15.jpg', '2', '13', '5');
INSERT INTO `buh_files` VALUES ('26', 'infiniti-)))))))40.jpg', '2', '14', '5');
INSERT INTO `buh_files` VALUES ('27', 'infiniti-)))))))2344.jpg', '2', '15', '5');
INSERT INTO `buh_files` VALUES ('28', 'infiniti-)))))))88.jpg', '2', '16', '5');
INSERT INTO `buh_files` VALUES ('29', 'infiniti-)))))))1442.jpg', '2', '16', '5');
INSERT INTO `buh_files` VALUES ('30', 'infiniti-)))))))36.jpg', '2', '16', '5');
INSERT INTO `buh_files` VALUES ('31', 'infiniti-)))))))6674.jpg', '2', '17', '5');
INSERT INTO `buh_files` VALUES ('32', 'kartinka10.jpg', '2', '17', '5');
INSERT INTO `buh_files` VALUES ('33', 'infiniti-)))))))4578.jpg', '2', '17', '5');
INSERT INTO `buh_files` VALUES ('34', 'infiniti-)))))))57.jpg', '1', '14', '5');
INSERT INTO `buh_files` VALUES ('35', 'infiniti-)))))))8144.jpg', '1', '15', '5');
INSERT INTO `buh_files` VALUES ('36', 'kartinka83.jpg', '1', '16', '5');
INSERT INTO `buh_files` VALUES ('37', 'infiniti-)))))))43.jpg', '1', '17', '5');
INSERT INTO `buh_files` VALUES ('38', 'infiniti-)))))))8323.jpg', '1', '18', '5');
INSERT INTO `buh_files` VALUES ('39', 'infiniti-)))))))7275.jpg', '1', '19', '5');
INSERT INTO `buh_files` VALUES ('40', 'infiniti-)))))))6087.jpg', '1', '20', '5');
INSERT INTO `buh_prognozes` VALUES ('56', '123213', '1399579200', '123123', '123 13 23', '5');
INSERT INTO `buh_prognozes` VALUES ('57', '123123213', '1399579200', '1232', '123123', '5');
INSERT INTO `buh_reports` VALUES ('7', '123123123', '123123123123123', '1401183703', '1', null, '5', null);
INSERT INTO `buh_reports` VALUES ('8', 'sdfasdf', 'sadfasdfsadfsdf', '1401192746', '1', null, '5', null);
INSERT INTO `buh_reports` VALUES ('9', 'sdfasdfas', 'dfasdfasdf', '1401192745', '1', null, '5', null);
INSERT INTO `buh_reports` VALUES ('10', 'asdasd', 'asdasdasd', '1400234213', '2', null, '5', null);
INSERT INTO `buh_reports` VALUES ('11', 'asdfasdfasdfasdfa', 'sdfasdfasd', '1400239402', '2', '1', '5', '5');
INSERT INTO `buh_reports` VALUES ('12', 'тест файлов', 'тест файлов', '1401192620', '2', '1', '5', '5');
INSERT INTO `buh_reports` VALUES ('13', 'много файлов ', 'sadfasdfasdf', '1401183697', '2', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('14', 'выафыва', 'фывфыв', '1401192851', '2', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('15', '123123', '123123', '1401192893', '1', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('16', 'фывфыв', 'фsdasdasd', '1401192985', '2', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('17', 'asdasd', 'asdasdasd', '1401193296', '1', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('18', 'asdasdasd', 'asdasdas', '1401193312', '1', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('19', 'asdasd', 'asdasdasd', '1401193321', '2', null, '5', '5');
INSERT INTO `buh_reports` VALUES ('20', 'asdasdasdd', 'asdasdasd', '1401193332', '1', null, '5', '5');
INSERT INTO `buh_users` VALUES ('4', 'admin1', '202cb962ac59075b964b07152d234b70', 'test@mail.ru', '1399384642', '0', '1', '0', 'Иван');
INSERT INTO `buh_users` VALUES ('5', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dedovets_pavel@mail.ru', '0', '0', '0', '0', 'Павел');
INSERT INTO `buh_users` VALUES ('6', 'booker', '202cb962ac59075b964b07152d234b70', 'test1@mail.ru', '1399384642', '0', '2', '4', 'Павел');
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
INSERT INTO `buh_users` VALUES ('24', 'second_normal', '9ac7bc38d1c12764350f776bfc17c454', 'second_normal@mai.ru', '1400597545', '0', '2', '18', 'Второй нормальный ');
INSERT INTO `buh_users` VALUES ('25', 'test_user', 'd41d8cd98f00b204e9800998ecf8427e', 'te123123123st@mail.ru', '1401173290', '0', '2', '4', 'Тест111');
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
INSERT INTO `buh_workers` VALUES ('29', '222222222222', '22222222222', '1398888000', '1', '1111111111', '11111111111', '1398974400', '1400184000', '2147483647', '5');
INSERT INTO `buh_workers` VALUES ('30', '44444444', '44444444444', '1399579200', '1', '11111111', '1111111111', '1400097600', '1400788800', '2147483647', '5');
INSERT INTO `buh_workers` VALUES ('32', '123213', '123213', '1400184000', '1', '123213', '123123213', '1399579200', '1400788800', '123213', '5');
INSERT INTO `buh_workers` VALUES ('33', 'тетс ', '123', '1398888000', '1', '12312', '3123123', '1398888000', '1398974400', '123213', '5');
INSERT INTO `buh_workers` VALUES ('34', '123', '1232', '1399406400', '1', '123', '23213', '1399492800', '0', '123123', '5');
INSERT INTO `buh_workers` VALUES ('35', '123123', '123', '1399579200', '1', '12312', '1231', '1398974400', '0', '123123', '5');
