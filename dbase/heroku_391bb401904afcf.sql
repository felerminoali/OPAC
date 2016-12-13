/*
Navicat MySQL Data Transfer

Source Server         : myopac
Source Server Version : 50546
Source Host           : us-cdbr-iron-east-04.cleardb.net:3306
Source Database       : heroku_391bb401904afcf

Target Server Type    : MYSQL
Target Server Version : 50546
File Encoding         : 65001

Date: 2016-12-14 00:08:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `loanPeriod` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('2', 'Books', '21', 'book.png');
INSERT INTO `categories` VALUES ('12', 'Audio', '7', 'audio.png');
INSERT INTO `categories` VALUES ('22', 'Video', '7', 'video.png');
INSERT INTO `categories` VALUES ('32', 'Periodicals', '21', 'periodicals.png');

-- ----------------------------
-- Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `max_renewal` varchar(100) DEFAULT NULL,
  `sys_name` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `website` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('2', '4', 'Online Public Access Catalog', '+60122641402', 'testing@sparkpostbox.com', 'myopac.herokuapp.com');

-- ----------------------------
-- Table structure for `countries`
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'Afghanistan', 'AF');
INSERT INTO `countries` VALUES ('2', 'ÃƒÆ’land Islands', 'AX');
INSERT INTO `countries` VALUES ('3', 'Albania', 'AL');
INSERT INTO `countries` VALUES ('4', 'Algeria', 'DZ');
INSERT INTO `countries` VALUES ('5', 'American Samoa', 'AS');
INSERT INTO `countries` VALUES ('6', 'Andorra', 'AD');
INSERT INTO `countries` VALUES ('7', 'Angola', 'AO');
INSERT INTO `countries` VALUES ('8', 'Anguilla', 'AI');
INSERT INTO `countries` VALUES ('9', 'Antarctica', 'AQ');
INSERT INTO `countries` VALUES ('10', 'Antigua And Barbuda', 'AG');
INSERT INTO `countries` VALUES ('11', 'Argentina', 'AR');
INSERT INTO `countries` VALUES ('12', 'Armenia', 'AM');
INSERT INTO `countries` VALUES ('13', 'Aruba', 'AW');
INSERT INTO `countries` VALUES ('14', 'Australia', 'AU');
INSERT INTO `countries` VALUES ('15', 'Austria', 'AT');
INSERT INTO `countries` VALUES ('16', 'Azerbaijan', 'AZ');
INSERT INTO `countries` VALUES ('17', 'Bahamas', 'BS');
INSERT INTO `countries` VALUES ('18', 'Bahrain', 'BH');
INSERT INTO `countries` VALUES ('19', 'Bangladesh', 'BD');
INSERT INTO `countries` VALUES ('20', 'Barbados', 'BB');
INSERT INTO `countries` VALUES ('21', 'Belarus', 'BY');
INSERT INTO `countries` VALUES ('22', 'Belgium', 'BE');
INSERT INTO `countries` VALUES ('23', 'Belize', 'BZ');
INSERT INTO `countries` VALUES ('24', 'Benin', 'BJ');
INSERT INTO `countries` VALUES ('25', 'Bermuda', 'BM');
INSERT INTO `countries` VALUES ('26', 'Bhutan', 'BT');
INSERT INTO `countries` VALUES ('27', 'Bolivia', 'BO');
INSERT INTO `countries` VALUES ('28', 'Bosnia And Herzegovina', 'BA');
INSERT INTO `countries` VALUES ('29', 'Botswana', 'BW');
INSERT INTO `countries` VALUES ('30', 'Bouvet Island', 'BV');
INSERT INTO `countries` VALUES ('31', 'Brazil', 'BR');
INSERT INTO `countries` VALUES ('32', 'British Indian Ocean Territory', 'IO');
INSERT INTO `countries` VALUES ('33', 'Brunei Darussalam', 'BN');
INSERT INTO `countries` VALUES ('34', 'Bulgaria', 'BG');
INSERT INTO `countries` VALUES ('35', 'Burkina Faso', 'BF');
INSERT INTO `countries` VALUES ('36', 'Burundi', 'BI');
INSERT INTO `countries` VALUES ('37', 'Cambodia', 'KH');
INSERT INTO `countries` VALUES ('38', 'Cameroon', 'CM');
INSERT INTO `countries` VALUES ('39', 'Canada', 'CA');
INSERT INTO `countries` VALUES ('40', 'Cape Verde', 'CV');
INSERT INTO `countries` VALUES ('41', 'Cayman Islands', 'KY');
INSERT INTO `countries` VALUES ('42', 'Central African Republic', 'CF');
INSERT INTO `countries` VALUES ('43', 'Chad', 'TD');
INSERT INTO `countries` VALUES ('44', 'Chile', 'CL');
INSERT INTO `countries` VALUES ('45', 'China', 'CN');
INSERT INTO `countries` VALUES ('46', 'Christmas Island', 'CX');
INSERT INTO `countries` VALUES ('47', 'Cocos (keeling) Islands', 'CC');
INSERT INTO `countries` VALUES ('48', 'Colombia', 'CO');
INSERT INTO `countries` VALUES ('49', 'Comoros', 'KM');
INSERT INTO `countries` VALUES ('50', 'Congo', 'CG');
INSERT INTO `countries` VALUES ('51', 'Congo, The Democratic Republic Of', 'CD');
INSERT INTO `countries` VALUES ('52', 'Cook Islands', 'CK');
INSERT INTO `countries` VALUES ('53', 'Costa Rica', 'CR');
INSERT INTO `countries` VALUES ('54', 'Cote D\'ivoire', 'CI');
INSERT INTO `countries` VALUES ('55', 'Croatia', 'HR');
INSERT INTO `countries` VALUES ('56', 'Cuba', 'CU');
INSERT INTO `countries` VALUES ('57', 'Cyprus', 'CY');
INSERT INTO `countries` VALUES ('58', 'Czech Republic', 'CZ');
INSERT INTO `countries` VALUES ('59', 'Denmark', 'DK');
INSERT INTO `countries` VALUES ('60', 'Djibouti', 'DJ');
INSERT INTO `countries` VALUES ('61', 'Dominica', 'DM');
INSERT INTO `countries` VALUES ('62', 'Dominican Republic', 'DO');
INSERT INTO `countries` VALUES ('63', 'Ecuador', 'EC');
INSERT INTO `countries` VALUES ('64', 'Egypt', 'EG');
INSERT INTO `countries` VALUES ('65', 'El Salvador', 'SV');
INSERT INTO `countries` VALUES ('66', 'Equatorial Guinea', 'GQ');
INSERT INTO `countries` VALUES ('67', 'Eritrea', 'ER');
INSERT INTO `countries` VALUES ('68', 'Estonia', 'EE');
INSERT INTO `countries` VALUES ('69', 'Ethiopia', 'ET');
INSERT INTO `countries` VALUES ('70', 'Falkland Islands (malvinas)', 'FK');
INSERT INTO `countries` VALUES ('71', 'Faroe Islands', 'FO');
INSERT INTO `countries` VALUES ('72', 'Fiji', 'FJ');
INSERT INTO `countries` VALUES ('73', 'Finland', 'FI');
INSERT INTO `countries` VALUES ('74', 'France', 'FR');
INSERT INTO `countries` VALUES ('75', 'French Guiana', 'GF');
INSERT INTO `countries` VALUES ('76', 'French Polynesia', 'PF');
INSERT INTO `countries` VALUES ('77', 'French Southern Territories', 'TF');
INSERT INTO `countries` VALUES ('78', 'Gabon', 'GA');
INSERT INTO `countries` VALUES ('79', 'Gambia', 'GM');
INSERT INTO `countries` VALUES ('80', 'Georgia', 'GE');
INSERT INTO `countries` VALUES ('81', 'Germany', 'DE');
INSERT INTO `countries` VALUES ('82', 'Ghana', 'GH');
INSERT INTO `countries` VALUES ('83', 'Gibraltar', 'GI');
INSERT INTO `countries` VALUES ('84', 'Greece', 'GR');
INSERT INTO `countries` VALUES ('85', 'Greenland', 'GL');
INSERT INTO `countries` VALUES ('86', 'Grenada', 'GD');
INSERT INTO `countries` VALUES ('87', 'Guadeloupe', 'GP');
INSERT INTO `countries` VALUES ('88', 'Guam', 'GU');
INSERT INTO `countries` VALUES ('89', 'Guatemala', 'GT');
INSERT INTO `countries` VALUES ('90', 'Guernsey', 'GG');
INSERT INTO `countries` VALUES ('91', 'Guinea', 'GN');
INSERT INTO `countries` VALUES ('92', 'Guinea-bissau', 'GW');
INSERT INTO `countries` VALUES ('93', 'Guyana', 'GY');
INSERT INTO `countries` VALUES ('94', 'Haiti', 'HT');
INSERT INTO `countries` VALUES ('95', 'Heard Island And Mcdonald Islands', 'HM');
INSERT INTO `countries` VALUES ('96', 'Holy See (vatican City State)', 'VA');
INSERT INTO `countries` VALUES ('97', 'Honduras', 'HN');
INSERT INTO `countries` VALUES ('98', 'Hong Kong', 'HK');
INSERT INTO `countries` VALUES ('99', 'Hungary', 'HU');
INSERT INTO `countries` VALUES ('100', 'Iceland', 'IS');
INSERT INTO `countries` VALUES ('101', 'India', 'IN');
INSERT INTO `countries` VALUES ('102', 'Indonesia', 'ID');
INSERT INTO `countries` VALUES ('103', 'Iran, Islamic Republic Of', 'IR');
INSERT INTO `countries` VALUES ('104', 'Iraq', 'IQ');
INSERT INTO `countries` VALUES ('105', 'Ireland', 'IE');
INSERT INTO `countries` VALUES ('106', 'Isle Of Man', 'IM');
INSERT INTO `countries` VALUES ('107', 'Israel', 'IL');
INSERT INTO `countries` VALUES ('108', 'Italy', 'IT');
INSERT INTO `countries` VALUES ('109', 'Jamaica', 'JM');
INSERT INTO `countries` VALUES ('110', 'Japan', 'JP');
INSERT INTO `countries` VALUES ('111', 'Jersey', 'JE');
INSERT INTO `countries` VALUES ('112', 'Jordan', 'JO');
INSERT INTO `countries` VALUES ('113', 'Kazakhstan', 'KZ');
INSERT INTO `countries` VALUES ('114', 'Kenya', 'KE');
INSERT INTO `countries` VALUES ('115', 'Kiribati', 'KI');
INSERT INTO `countries` VALUES ('116', 'Korea, Democratic People\'s Republic Of', 'KP');
INSERT INTO `countries` VALUES ('117', 'Korea, Republic Of', 'KR');
INSERT INTO `countries` VALUES ('118', 'Kuwait', 'KW');
INSERT INTO `countries` VALUES ('119', 'Kyrgyzstan', 'KG');
INSERT INTO `countries` VALUES ('120', 'Lao People\'s Democratic Republic', 'LA');
INSERT INTO `countries` VALUES ('121', 'Latvia', 'LV');
INSERT INTO `countries` VALUES ('122', 'Lebanon', 'LB');
INSERT INTO `countries` VALUES ('123', 'Lesotho', 'LS');
INSERT INTO `countries` VALUES ('124', 'Liberia', 'LR');
INSERT INTO `countries` VALUES ('125', 'Libyan Arab Jamahiriya', 'LY');
INSERT INTO `countries` VALUES ('126', 'Liechtenstein', 'LI');
INSERT INTO `countries` VALUES ('127', 'Lithuania', 'LT');
INSERT INTO `countries` VALUES ('128', 'Luxembourg', 'LU');
INSERT INTO `countries` VALUES ('129', 'Macao', 'MO');
INSERT INTO `countries` VALUES ('130', 'Macedonia, The Former Yugoslav Republic Of', 'MK');
INSERT INTO `countries` VALUES ('131', 'Madagascar', 'MG');
INSERT INTO `countries` VALUES ('132', 'Malawi', 'MW');
INSERT INTO `countries` VALUES ('133', 'Malaysia', 'MY');
INSERT INTO `countries` VALUES ('134', 'Maldives', 'MV');
INSERT INTO `countries` VALUES ('135', 'Mali', 'ML');
INSERT INTO `countries` VALUES ('136', 'Malta', 'MT');
INSERT INTO `countries` VALUES ('137', 'Marshall Islands', 'MH');
INSERT INTO `countries` VALUES ('138', 'Martinique', 'MQ');
INSERT INTO `countries` VALUES ('139', 'Mauritania', 'MR');
INSERT INTO `countries` VALUES ('140', 'Mauritius', 'MU');
INSERT INTO `countries` VALUES ('141', 'Mayotte', 'YT');
INSERT INTO `countries` VALUES ('142', 'Mexico', 'MX');
INSERT INTO `countries` VALUES ('143', 'Micronesia, Federated States Of', 'FM');
INSERT INTO `countries` VALUES ('144', 'Moldova, Republic Of', 'MD');
INSERT INTO `countries` VALUES ('145', 'Monaco', 'MC');
INSERT INTO `countries` VALUES ('146', 'Mongolia', 'MN');
INSERT INTO `countries` VALUES ('147', 'Montserrat', 'MS');
INSERT INTO `countries` VALUES ('148', 'Morocco', 'MA');
INSERT INTO `countries` VALUES ('149', 'Mozambique', 'MZ');
INSERT INTO `countries` VALUES ('150', 'Myanmar', 'MM');
INSERT INTO `countries` VALUES ('151', 'Namibia', 'NA');
INSERT INTO `countries` VALUES ('152', 'Nauru', 'NR');
INSERT INTO `countries` VALUES ('153', 'Nepal', 'NP');
INSERT INTO `countries` VALUES ('154', 'Netherlands', 'NL');
INSERT INTO `countries` VALUES ('155', 'Netherlands Antilles', 'AN');
INSERT INTO `countries` VALUES ('156', 'New Caledonia', 'NC');
INSERT INTO `countries` VALUES ('157', 'New Zealand', 'NZ');
INSERT INTO `countries` VALUES ('158', 'Nicaragua', 'NI');
INSERT INTO `countries` VALUES ('159', 'Niger', 'NE');
INSERT INTO `countries` VALUES ('160', 'Nigeria', 'NG');
INSERT INTO `countries` VALUES ('161', 'Niue', 'NU');
INSERT INTO `countries` VALUES ('162', 'Norfolk Island', 'NF');
INSERT INTO `countries` VALUES ('163', 'Northern Mariana Islands', 'MP');
INSERT INTO `countries` VALUES ('164', 'Norway', 'NO');
INSERT INTO `countries` VALUES ('165', 'Oman', 'OM');
INSERT INTO `countries` VALUES ('166', 'Pakistan', 'PK');
INSERT INTO `countries` VALUES ('167', 'Palau', 'PW');
INSERT INTO `countries` VALUES ('168', 'Palestinian Territory, Occupied', 'PS');
INSERT INTO `countries` VALUES ('169', 'Panama', 'PA');
INSERT INTO `countries` VALUES ('170', 'Papua New Guinea', 'PG');
INSERT INTO `countries` VALUES ('171', 'Paraguay', 'PY');
INSERT INTO `countries` VALUES ('172', 'Peru', 'PE');
INSERT INTO `countries` VALUES ('173', 'Philippines', 'PH');
INSERT INTO `countries` VALUES ('174', 'Pitcairn', 'PN');
INSERT INTO `countries` VALUES ('175', 'Poland', 'PL');
INSERT INTO `countries` VALUES ('176', 'Portugal', 'PT');
INSERT INTO `countries` VALUES ('177', 'Puerto Rico', 'PR');
INSERT INTO `countries` VALUES ('178', 'Qatar', 'QA');
INSERT INTO `countries` VALUES ('179', 'Reunion', 'RE');
INSERT INTO `countries` VALUES ('180', 'Romania', 'RO');
INSERT INTO `countries` VALUES ('181', 'Russian Federation', 'RU');
INSERT INTO `countries` VALUES ('182', 'Rwanda', 'RW');
INSERT INTO `countries` VALUES ('183', 'Saint Helena', 'SH');
INSERT INTO `countries` VALUES ('184', 'Saint Kitts And Nevis', 'KN');
INSERT INTO `countries` VALUES ('185', 'Saint Lucia', 'LC');
INSERT INTO `countries` VALUES ('186', 'Saint Pierre And Miquelon', 'PM');
INSERT INTO `countries` VALUES ('187', 'Saint Vincent And The Grenadines', 'VC');
INSERT INTO `countries` VALUES ('188', 'Samoa', 'WS');
INSERT INTO `countries` VALUES ('189', 'San Marino', 'SM');
INSERT INTO `countries` VALUES ('190', 'Sao Tome And Principe', 'ST');
INSERT INTO `countries` VALUES ('191', 'Saudi Arabia', 'SA');
INSERT INTO `countries` VALUES ('192', 'Senegal', 'SN');
INSERT INTO `countries` VALUES ('193', 'Serbia And Montenegro', 'CS');
INSERT INTO `countries` VALUES ('194', 'Seychelles', 'SC');
INSERT INTO `countries` VALUES ('195', 'Sierra Leone', 'SL');
INSERT INTO `countries` VALUES ('196', 'Singapore', 'SG');
INSERT INTO `countries` VALUES ('197', 'Slovakia', 'SK');
INSERT INTO `countries` VALUES ('198', 'Slovenia', 'SI');
INSERT INTO `countries` VALUES ('199', 'Solomon Islands', 'SB');
INSERT INTO `countries` VALUES ('200', 'Somalia', 'SO');
INSERT INTO `countries` VALUES ('201', 'South Africa', 'ZA');
INSERT INTO `countries` VALUES ('202', 'South Georgia And The South Sandwich Islands', 'GS');
INSERT INTO `countries` VALUES ('203', 'Spain', 'ES');
INSERT INTO `countries` VALUES ('204', 'Sri Lanka', 'LK');
INSERT INTO `countries` VALUES ('205', 'Sudan', 'SD');
INSERT INTO `countries` VALUES ('206', 'Suriname', 'SR');
INSERT INTO `countries` VALUES ('207', 'Svalbard And Jan Mayen', 'SJ');
INSERT INTO `countries` VALUES ('208', 'Swaziland', 'SZ');
INSERT INTO `countries` VALUES ('209', 'Sweden', 'SE');
INSERT INTO `countries` VALUES ('210', 'Switzerland', 'CH');
INSERT INTO `countries` VALUES ('211', 'Syrian Arab Republic', 'SY');
INSERT INTO `countries` VALUES ('212', 'Taiwan, Province Of China', 'TW');
INSERT INTO `countries` VALUES ('213', 'Tajikistan', 'TJ');
INSERT INTO `countries` VALUES ('214', 'Tanzania, United Republic Of', 'TZ');
INSERT INTO `countries` VALUES ('215', 'Thailand', 'TH');
INSERT INTO `countries` VALUES ('216', 'Timor-leste', 'TL');
INSERT INTO `countries` VALUES ('217', 'Togo', 'TG');
INSERT INTO `countries` VALUES ('218', 'Tokelau', 'TK');
INSERT INTO `countries` VALUES ('219', 'Tonga', 'TO');
INSERT INTO `countries` VALUES ('220', 'Trinidad And Tobago', 'TT');
INSERT INTO `countries` VALUES ('221', 'Tunisia', 'TN');
INSERT INTO `countries` VALUES ('222', 'Turkey', 'TR');
INSERT INTO `countries` VALUES ('223', 'Turkmenistan', 'TM');
INSERT INTO `countries` VALUES ('224', 'Turks And Caicos Islands', 'TC');
INSERT INTO `countries` VALUES ('225', 'Tuvalu', 'TV');
INSERT INTO `countries` VALUES ('226', 'Uganda', 'UG');
INSERT INTO `countries` VALUES ('227', 'Ukraine', 'UA');
INSERT INTO `countries` VALUES ('228', 'United Arab Emirates', 'AE');
INSERT INTO `countries` VALUES ('229', 'United Kingdom', 'GB');
INSERT INTO `countries` VALUES ('230', 'United States', 'US');
INSERT INTO `countries` VALUES ('231', 'United States Minor Outlying Islands', 'UM');
INSERT INTO `countries` VALUES ('232', 'Uruguay', 'UY');
INSERT INTO `countries` VALUES ('233', 'Uzbekistan', 'UZ');
INSERT INTO `countries` VALUES ('234', 'Vanuatu', 'VU');
INSERT INTO `countries` VALUES ('235', 'Venezuela', 'VE');
INSERT INTO `countries` VALUES ('236', 'Viet Nam', 'VN');
INSERT INTO `countries` VALUES ('237', 'Virgin Islands, British', 'VG');
INSERT INTO `countries` VALUES ('238', 'Virgin Islands, U.S.', 'VI');
INSERT INTO `countries` VALUES ('239', 'Wallis And Futuna', 'WF');
INSERT INTO `countries` VALUES ('240', 'Western Sahara', 'EH');
INSERT INTO `countries` VALUES ('241', 'Yemen', 'YE');
INSERT INTO `countries` VALUES ('242', 'Zambia', 'ZM');
INSERT INTO `countries` VALUES ('243', 'Zimbabwe', 'ZW');

-- ----------------------------
-- Table structure for `feedback_comments`
-- ----------------------------
DROP TABLE IF EXISTS `feedback_comments`;
CREATE TABLE `feedback_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation` int(11) NOT NULL,
  `comment` text,
  `date_posted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_comments_ibfk_1` (`reservation`),
  CONSTRAINT `feedback_comments_ibfk_1` FOREIGN KEY (`reservation`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=892 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feedback_comments
-- ----------------------------

-- ----------------------------
-- Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `description` text,
  `available` tinyint(11) DEFAULT NULL,
  `library` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `author` varchar(250) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `publishing_date` datetime DEFAULT NULL,
  `edition` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`available`),
  KEY `items_ibfk_3` (`library`),
  KEY `items_ibfk_4` (`category`),
  CONSTRAINT `items_ibfk_4` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `items_ibfk_3` FOREIGN KEY (`library`) REFERENCES `library` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('2', 'C# game programming: for serious game creation', '32000001121613', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '2', 'book7.png', '2', ' Marshall, Donis', '2008', null, null);
INSERT INTO `items` VALUES ('12', 'Java programming', '32000001123895', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '2', 'book4.png', '2', 'Farrell, Joyce', '2012', null, null);
INSERT INTO `items` VALUES ('32', 'C++ programming: from problem analysis to program design', '32000001116006', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '12', 'book2.png', '2', 'Malik, D. S', '2011', null, null);
INSERT INTO `items` VALUES ('42', 'LINQ Programming', '32000001116090', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '12', null, '2', 'Mayo, Joseph', '2009', null, null);
INSERT INTO `items` VALUES ('52', 'Java programming: from problem analysis to program design', '32000001116064', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '2', null, '2', 'Malik, D. S', '2010', null, null);
INSERT INTO `items` VALUES ('62', 'Ruby programming', '32000001148380', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '22', 'book3.png', '2', 'Ford, Jerry Lee', '2011', null, null);
INSERT INTO `items` VALUES ('72', 'Sarawak ethnic groups oral tradition audio: Iban section', '32000000062481', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '2', null, '12', null, '1999', null, null);
INSERT INTO `items` VALUES ('82', 'Sarawak ethnic groups oral tradition audio: Orang Ulu section', '32000000062470', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', '12', null, '12', null, '1999', null, null);
INSERT INTO `items` VALUES ('92', 'Sarawak ethnic groups oral tradition audio: Bidayuh section', '32000000062475', null, '1', '22', null, '12', null, '1999', null, null);
INSERT INTO `items` VALUES ('102', 'Sarawak ethnic groups oral tradition audio: Chinise section', '32000000012814', null, '1', '22', null, '12', null, '1999', null, null);
INSERT INTO `items` VALUES ('112', 'Sarawak ethnic groups oral tradition audio: Malay section', '32000000062478', null, '1', '2', null, '12', null, '1999', null, null);
INSERT INTO `items` VALUES ('122', 'Sarawak ethnic groups oral tradition audio: Melanau section', '32000000062480', null, '1', '2', null, '12', null, '1999', null, null);
INSERT INTO `items` VALUES ('132', 'Non-metals reacting with oxygen', '0243130102', 'Burning substances - oxygen relights a glowing splint; oxygen reacting with non-metallic elements such as sulphur and red phosphorus. Water is added to the', '1', '12', null, '22', null, null, null, null);
INSERT INTO `items` VALUES ('142', 'Going down with the Ship - 1915', '003itn0306', '\'Blacher\' is the German navy\'s most powerful armoured cruiser. Trapped by British battle cruisers in the North Sea in January 1915, a heavy ship she is too...', '1', '12', null, '22', 'Channel 4', null, null, null);
INSERT INTO `items` VALUES ('152', 'Stress in a ski resort', '0265730302', 'A new road enabled the village of Livigno to become a successful ski resort. This has created both new business opportunities and a more stressful lifestyle...', '1', '22', null, '22', 'Channel 4', null, null, null);
INSERT INTO `items` VALUES ('162', 'The Revolution', '32000001088268', 'Chronicles the events of the American Revolution', '1', '22', null, '22', null, '2007', null, null);
INSERT INTO `items` VALUES ('172', 'News - The Daily Telegraph', '32000001324353', null, '1', '2', null, '32', null, null, '2015-06-29 23:48:25', null);
INSERT INTO `items` VALUES ('182', 'News - The Daily Telegraph', '32000001939393', null, '1', '2', null, '32', null, null, '2015-08-01 23:49:44', null);
INSERT INTO `items` VALUES ('192', 'News - Daily Telegraph (London, England)', '32000001473939', null, '1', '12', null, '32', null, null, '2015-07-08 23:51:41', null);

-- ----------------------------
-- Table structure for `library`
-- ----------------------------
DROP TABLE IF EXISTS `library`;
CREATE TABLE `library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `contact` varchar(55) DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of library
-- ----------------------------
INSERT INTO `library` VALUES ('2', 'BDA Public Library', null, null);
INSERT INTO `library` VALUES ('12', 'Bahagian Perpistakaan, LGCD', null, null);
INSERT INTO `library` VALUES ('22', 'JKR Resource Centre', null, null);
INSERT INTO `library` VALUES ('32', 'Kanowit Public Library', null, null);
INSERT INTO `library` VALUES ('42', 'Kota Sentosa Public Library', null, null);

-- ----------------------------
-- Table structure for `lms`
-- ----------------------------
DROP TABLE IF EXISTS `lms`;
CREATE TABLE `lms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lms
-- ----------------------------
INSERT INTO `lms` VALUES ('2', 'Felermino', 'Ali', 'admin', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');

-- ----------------------------
-- Table structure for `loans`
-- ----------------------------
DROP TABLE IF EXISTS `loans`;
CREATE TABLE `loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `loandate` datetime NOT NULL,
  `duedate` datetime NOT NULL,
  `renewal` tinyint(4) NOT NULL DEFAULT '0',
  `checked_in` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `loans_ibfk_2` (`item`),
  KEY `loans_ibfk_4` (`reservation`),
  CONSTRAINT `loans_ibfk_4` FOREIGN KEY (`reservation`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of loans
-- ----------------------------

-- ----------------------------
-- Table structure for `reservation`
-- ----------------------------
DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `dateRevesed` datetime NOT NULL,
  `pickuplocation` int(11) DEFAULT NULL,
  `until` datetime DEFAULT NULL,
  `canceled` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `reservation_ibfk_1` (`pickuplocation`),
  KEY `reservation_ibfk_4` (`user`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`pickuplocation`) REFERENCES `library` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=862 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reservation
-- ----------------------------

-- ----------------------------
-- Table structure for `reservation_items`
-- ----------------------------
DROP TABLE IF EXISTS `reservation_items`;
CREATE TABLE `reservation_items` (
  `reservation` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `readyForPickUp` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reservation`,`item`),
  KEY `reservation_items_ibfk_2` (`item`),
  CONSTRAINT `reservation_items_ibfk_1` FOREIGN KEY (`reservation`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reservation_items_ibfk_2` FOREIGN KEY (`item`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reservation_items
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `card_id` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `country` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country`)
) ENGINE=InnoDB AUTO_INCREMENT=362 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('312', 'GUEST', 'test', 'guest', 'Casa Residenza, B1-09-05, Jalan Teknologi 2/1D', 'Signature Park, Kota Damasara', 'Petaling jaya', 'Kota Damansara', '47810', '133', 'felerminoali@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2016-12-04 15:21:03', '1', '20161204152103');
INSERT INTO `users` VALUES ('322', 'felermino', 'ali', 'unilurio', 'Casa Residenza, B1-09-05, Jalan Teknologi 2/1D', 'Signature Park, Kota Damasara', 'Petaling jaya', 'Kota Damansara', '47810', '133', 'felermino.ali@unilurio.ac.mz', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2016-12-09 04:03:56', '1', '20161209040356');
INSERT INTO `users` VALUES ('332', 'felermino', 'ali', 'outlook', 'Casa Residenza, B1-09-05, Jalan Teknologi 2/1D', 'Signature Park, Kota Damasara', 'Petaling jaya', 'Kota Damansara', '47810', '133', 'felerminoali@outlook.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2016-12-09 04:07:18', '1', '20161209040718');
INSERT INTO `users` VALUES ('342', 'felermino', 'ali', 'felasbe', 'Casa Residenza, B1-09-05, Jalan Teknologi 2/1D', 'Signature Park, Kota Damasara', 'Petaling jaya', 'Kota Damansara', '47810', '133', 'felasbe@hotmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2016-12-09 04:08:37', '0', '20161209040837');
INSERT INTO `users` VALUES ('352', 'Realdo Domingos', 'Dias', 'OPACDIAS352', 'B19-05 Casa Residenza (SEGi Residences), Jalan Teknologi 2/1D, Signature Park, Kota Damansara.', '', 'Petaling Jaya', 'Malaysia', '47810', '133', 'realdo.dias3@gmail.com', 'c6ef997ffee29309313c34cc71f247ab1ae998b268ec6290a51d5f4e7850c21dba458fd752d826e982325374aa0c6e8f1a2c14bb003f21af36f44ed074a72a82', '2016-12-10 17:35:48', '1', '20161210173548');
