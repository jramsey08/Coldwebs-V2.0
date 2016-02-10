-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2014 at 07:17 PM
-- Server version: 5.5.36-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kokonang_coldweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `active` varchar(10) NOT NULL DEFAULT '1',
  `hits` varchar(300) NOT NULL,
  `content` blob NOT NULL,
  `date` varchar(50) NOT NULL,
  `type` varchar(300) NOT NULL,
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `url` varchar(300) NOT NULL,
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `category` varchar(300) NOT NULL,
  `search` varchar(10) NOT NULL DEFAULT '1',
  `other` longblob NOT NULL,
  `rand` varchar(300) NOT NULL,
  `feat` varchar(10) NOT NULL DEFAULT '0',
  `list` varchar(10) NOT NULL,
  `info` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `articles`
--

-- --------------------------------------------------------

--
-- Table structure for table `error_log`
--

CREATE TABLE IF NOT EXISTS `error_log` (
  `error` longtext NOT NULL,
  `priority` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `comment` longtext NOT NULL,
  `id` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `functions`
--

CREATE TABLE IF NOT EXISTS `functions` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `function` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `template` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `functions`
--

INSERT INTO `functions` (`id`, `name`, `function`, `active`, `trash`, `template`) VALUES
(1, 'pull articles', 'PullArticles', '1', '0', 'cwadmin');

-- --------------------------------------------------------

--
-- Table structure for table `function_java`
--

CREATE TABLE IF NOT EXISTS `function_java` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `function` varchar(300) NOT NULL,
  `url` blob NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `template` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `gallery` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `album` varchar(100) NOT NULL,
  `list` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `name` varchar(300) NOT NULL,
  `domain` varchar(300) NOT NULL,
  `mp` varchar(300) NOT NULL,
  `slogan` varchar(300) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `status` longblob NOT NULL,
  `theme` varchar(300) NOT NULL,
  `other` longblob NOT NULL,
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`name`, `domain`, `mp`, `slogan`, `logo`, `status`, `theme`, `other`) VALUES
('Site Name', 'http://domain.com', '', '', '', 0x613a313a7b733a373a226f66666c696e65223b733a313a2231223b7d, 'comingsoon', 0x613a323a7b733a363a22736f6369616c223b613a32303a7b733a383a2266616365626f6f6b223b733a303a22223b733a373a2274776974746572223b733a303a22223b733a383a226c696e6b6564696e223b733a303a22223b733a383a2270696e7472657374223b733a303a22223b733a31303a22676f6f676c65706c7573223b733a303a22223b733a363a2274756d626c72223b733a303a22223b733a393a22696e7374616772616d223b733a303a22223b733a323a22766b223b733a303a22223b733a363a22666c69636b72223b733a303a22223b733a373a226d797370616365223b733a303a22223b733a343a226265626f223b733a303a22223b733a31303a22667269656e6473746572223b733a303a22223b733a333a22686935223b733a303a22223b733a353a22686162626f223b733a303a22223b733a343a226e696e67223b733a303a22223b733a31303a22636c6173736d61746573223b733a303a22223b733a363a22746167676564223b733a303a22223b733a31303a226d7979656172626f6f6b223b733a303a22223b733a363a226d6565747570223b733a303a22223b733a353a226f726b7574223b733a303a22223b7d733a373a226f66666c696e65223b733a373a22626f6f73746572223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `login_session`
--

CREATE TABLE IF NOT EXISTS `login_session` (
  `session` longtext NOT NULL,
  `userid` varchar(300) NOT NULL,
  `ipaddress` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  `computerinfo` varchar(300) NOT NULL,
  `browser_name` varchar(300) NOT NULL,
  `browser_useragent` varchar(300) NOT NULL,
  `browser_version` varchar(300) NOT NULL,
  `browser_platform` varchar(300) NOT NULL,
  `browser_pattern` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `country` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `state` varchar(300) NOT NULL,
  `zip` varchar(300) NOT NULL,
  `lat` varchar(300) NOT NULL,
  `lon` varchar(300) NOT NULL,
  `countrycode` varchar(300) NOT NULL,
  `timezone` varchar(300) NOT NULL,
  `session_generate` blob NOT NULL,
  `cookie` varchar(300) NOT NULL,
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `name` varchar(300) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `ip` varchar(300) NOT NULL,
  `message` longtext NOT NULL,
  `email` varchar(300) NOT NULL,
  `read` varchar(10) NOT NULL DEFAULT '0',
  `priority` varchar(10) NOT NULL,
  `user` varchar(300) NOT NULL,
  `current` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `admin` varchar(10) NOT NULL DEFAULT '0',
  `date` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `website` varchar(300) NOT NULL,
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `view` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opn_country`
--

CREATE TABLE IF NOT EXISTS `opn_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `iso_code_2` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '',
  `iso_code_3` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '',
  `address_format` text COLLATE utf8_bin NOT NULL,
  `postcode_required` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=240 ;

--
-- Dumping data for table `opn_country`
--

INSERT INTO `opn_country` (`country_id`, `name`, `iso_code_2`, `iso_code_3`, `address_format`, `postcode_required`, `status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '', 0, 1),
(2, 'Albania', 'AL', 'ALB', '', 0, 1),
(3, 'Algeria', 'DZ', 'DZA', '', 0, 1),
(4, 'American Samoa', 'AS', 'ASM', '', 0, 1),
(5, 'Andorra', 'AD', 'AND', '', 0, 1),
(6, 'Angola', 'AO', 'AGO', '', 0, 1),
(7, 'Anguilla', 'AI', 'AIA', '', 0, 1),
(8, 'Antarctica', 'AQ', 'ATA', '', 0, 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', '', 0, 1),
(10, 'Argentina', 'AR', 'ARG', '', 0, 1),
(11, 'Armenia', 'AM', 'ARM', '', 0, 1),
(12, 'Aruba', 'AW', 'ABW', '', 0, 1),
(13, 'Australia', 'AU', 'AUS', '', 0, 1),
(14, 'Austria', 'AT', 'AUT', '', 0, 1),
(15, 'Azerbaijan', 'AZ', 'AZE', '', 0, 1),
(16, 'Bahamas', 'BS', 'BHS', '', 0, 1),
(17, 'Bahrain', 'BH', 'BHR', '', 0, 1),
(18, 'Bangladesh', 'BD', 'BGD', '', 0, 1),
(19, 'Barbados', 'BB', 'BRB', '', 0, 1),
(20, 'Belarus', 'BY', 'BLR', '', 0, 1),
(21, 'Belgium', 'BE', 'BEL', '', 0, 1),
(22, 'Belize', 'BZ', 'BLZ', '', 0, 1),
(23, 'Benin', 'BJ', 'BEN', '', 0, 1),
(24, 'Bermuda', 'BM', 'BMU', '', 0, 1),
(25, 'Bhutan', 'BT', 'BTN', '', 0, 1),
(26, 'Bolivia', 'BO', 'BOL', '', 0, 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', '', 0, 1),
(28, 'Botswana', 'BW', 'BWA', '', 0, 1),
(29, 'Bouvet Island', 'BV', 'BVT', '', 0, 1),
(30, 'Brazil', 'BR', 'BRA', '', 0, 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', '', 0, 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', '', 0, 1),
(33, 'Bulgaria', 'BG', 'BGR', '', 0, 1),
(34, 'Burkina Faso', 'BF', 'BFA', '', 0, 1),
(35, 'Burundi', 'BI', 'BDI', '', 0, 1),
(36, 'Cambodia', 'KH', 'KHM', '', 0, 1),
(37, 'Cameroon', 'CM', 'CMR', '', 0, 1),
(38, 'Canada', 'CA', 'CAN', '', 0, 1),
(39, 'Cape Verde', 'CV', 'CPV', '', 0, 1),
(40, 'Cayman Islands', 'KY', 'CYM', '', 0, 1),
(41, 'Central African Republic', 'CF', 'CAF', '', 0, 1),
(42, 'Chad', 'TD', 'TCD', '', 0, 1),
(43, 'Chile', 'CL', 'CHL', '', 0, 1),
(44, 'China', 'CN', 'CHN', '', 0, 1),
(45, 'Christmas Island', 'CX', 'CXR', '', 0, 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', '', 0, 1),
(47, 'Colombia', 'CO', 'COL', '', 0, 1),
(48, 'Comoros', 'KM', 'COM', '', 0, 1),
(49, 'Congo', 'CG', 'COG', '', 0, 1),
(50, 'Cook Islands', 'CK', 'COK', '', 0, 1),
(51, 'Costa Rica', 'CR', 'CRI', '', 0, 1),
(52, 'Cote D''Ivoire', 'CI', 'CIV', '', 0, 1),
(53, 'Croatia', 'HR', 'HRV', '', 0, 1),
(54, 'Cuba', 'CU', 'CUB', '', 0, 1),
(55, 'Cyprus', 'CY', 'CYP', '', 0, 1),
(56, 'Czech Republic', 'CZ', 'CZE', '', 0, 1),
(57, 'Denmark', 'DK', 'DNK', '', 0, 1),
(58, 'Djibouti', 'DJ', 'DJI', '', 0, 1),
(59, 'Dominica', 'DM', 'DMA', '', 0, 1),
(60, 'Dominican Republic', 'DO', 'DOM', '', 0, 1),
(61, 'East Timor', 'TP', 'TMP', '', 0, 1),
(62, 'Ecuador', 'EC', 'ECU', '', 0, 1),
(63, 'Egypt', 'EG', 'EGY', '', 0, 1),
(64, 'El Salvador', 'SV', 'SLV', '', 0, 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', '', 0, 1),
(66, 'Eritrea', 'ER', 'ERI', '', 0, 1),
(67, 'Estonia', 'EE', 'EST', '', 0, 1),
(68, 'Ethiopia', 'ET', 'ETH', '', 0, 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', '', 0, 1),
(70, 'Faroe Islands', 'FO', 'FRO', '', 0, 1),
(71, 'Fiji', 'FJ', 'FJI', '', 0, 1),
(72, 'Finland', 'FI', 'FIN', '', 0, 1),
(73, 'France', 'FR', 'FRA', '', 0, 1),
(74, 'France, Metropolitan', 'FX', 'FXX', '', 0, 1),
(75, 'French Guiana', 'GF', 'GUF', '', 0, 1),
(76, 'French Polynesia', 'PF', 'PYF', '', 0, 1),
(77, 'French Southern Territories', 'TF', 'ATF', '', 0, 1),
(78, 'Gabon', 'GA', 'GAB', '', 0, 1),
(79, 'Gambia', 'GM', 'GMB', '', 0, 1),
(80, 'Georgia', 'GE', 'GEO', '', 0, 1),
(81, 'Germany', 'DE', 'DEU', '', 0, 1),
(82, 'Ghana', 'GH', 'GHA', '', 0, 1),
(83, 'Gibraltar', 'GI', 'GIB', '', 0, 1),
(84, 'Greece', 'GR', 'GRC', '', 0, 1),
(85, 'Greenland', 'GL', 'GRL', '', 0, 1),
(86, 'Grenada', 'GD', 'GRD', '', 0, 1),
(87, 'Guadeloupe', 'GP', 'GLP', '', 0, 1),
(88, 'Guam', 'GU', 'GUM', '', 0, 1),
(89, 'Guatemala', 'GT', 'GTM', '', 0, 1),
(90, 'Guinea', 'GN', 'GIN', '', 0, 1),
(91, 'Guinea-bissau', 'GW', 'GNB', '', 0, 1),
(92, 'Guyana', 'GY', 'GUY', '', 0, 1),
(93, 'Haiti', 'HT', 'HTI', '', 0, 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', '', 0, 1),
(95, 'Honduras', 'HN', 'HND', '', 0, 1),
(96, 'Hong Kong', 'HK', 'HKG', '', 0, 1),
(97, 'Hungary', 'HU', 'HUN', '', 0, 1),
(98, 'Iceland', 'IS', 'ISL', '', 0, 1),
(99, 'India', 'IN', 'IND', '', 0, 1),
(100, 'Indonesia', 'ID', 'IDN', '', 0, 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', '', 0, 1),
(102, 'Iraq', 'IQ', 'IRQ', '', 0, 1),
(103, 'Ireland', 'IE', 'IRL', '', 0, 1),
(104, 'Israel', 'IL', 'ISR', '', 0, 1),
(105, 'Italy', 'IT', 'ITA', '', 0, 1),
(106, 'Jamaica', 'JM', 'JAM', '', 0, 1),
(107, 'Japan', 'JP', 'JPN', '', 0, 1),
(108, 'Jordan', 'JO', 'JOR', '', 0, 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', '', 0, 1),
(110, 'Kenya', 'KE', 'KEN', '', 0, 1),
(111, 'Kiribati', 'KI', 'KIR', '', 0, 1),
(112, 'North Korea', 'KP', 'PRK', '', 0, 1),
(113, 'Korea, Republic of', 'KR', 'KOR', '', 0, 1),
(114, 'Kuwait', 'KW', 'KWT', '', 0, 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', '', 0, 1),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', '', 0, 1),
(117, 'Latvia', 'LV', 'LVA', '', 0, 1),
(118, 'Lebanon', 'LB', 'LBN', '', 0, 1),
(119, 'Lesotho', 'LS', 'LSO', '', 0, 1),
(120, 'Liberia', 'LR', 'LBR', '', 0, 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', '', 0, 1),
(122, 'Liechtenstein', 'LI', 'LIE', '', 0, 1),
(123, 'Lithuania', 'LT', 'LTU', '', 0, 1),
(124, 'Luxembourg', 'LU', 'LUX', '', 0, 1),
(125, 'Macau', 'MO', 'MAC', '', 0, 1),
(126, 'Macedonia', 'MK', 'MKD', '', 0, 1),
(127, 'Madagascar', 'MG', 'MDG', '', 0, 1),
(128, 'Malawi', 'MW', 'MWI', '', 0, 1),
(129, 'Malaysia', 'MY', 'MYS', '', 0, 1),
(130, 'Maldives', 'MV', 'MDV', '', 0, 1),
(131, 'Mali', 'ML', 'MLI', '', 0, 1),
(132, 'Malta', 'MT', 'MLT', '', 0, 1),
(133, 'Marshall Islands', 'MH', 'MHL', '', 0, 1),
(134, 'Martinique', 'MQ', 'MTQ', '', 0, 1),
(135, 'Mauritania', 'MR', 'MRT', '', 0, 1),
(136, 'Mauritius', 'MU', 'MUS', '', 0, 1),
(137, 'Mayotte', 'YT', 'MYT', '', 0, 1),
(138, 'Mexico', 'MX', 'MEX', '', 0, 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', '', 0, 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', '', 0, 1),
(141, 'Monaco', 'MC', 'MCO', '', 0, 1),
(142, 'Mongolia', 'MN', 'MNG', '', 0, 1),
(143, 'Montserrat', 'MS', 'MSR', '', 0, 1),
(144, 'Morocco', 'MA', 'MAR', '', 0, 1),
(145, 'Mozambique', 'MZ', 'MOZ', '', 0, 1),
(146, 'Myanmar', 'MM', 'MMR', '', 0, 1),
(147, 'Namibia', 'NA', 'NAM', '', 0, 1),
(148, 'Nauru', 'NR', 'NRU', '', 0, 1),
(149, 'Nepal', 'NP', 'NPL', '', 0, 1),
(150, 'Netherlands', 'NL', 'NLD', '', 0, 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', '', 0, 1),
(152, 'New Caledonia', 'NC', 'NCL', '', 0, 1),
(153, 'New Zealand', 'NZ', 'NZL', '', 0, 1),
(154, 'Nicaragua', 'NI', 'NIC', '', 0, 1),
(155, 'Niger', 'NE', 'NER', '', 0, 1),
(156, 'Nigeria', 'NG', 'NGA', '', 0, 1),
(157, 'Niue', 'NU', 'NIU', '', 0, 1),
(158, 'Norfolk Island', 'NF', 'NFK', '', 0, 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', '', 0, 1),
(160, 'Norway', 'NO', 'NOR', '', 0, 1),
(161, 'Oman', 'OM', 'OMN', '', 0, 1),
(162, 'Pakistan', 'PK', 'PAK', '', 0, 1),
(163, 'Palau', 'PW', 'PLW', '', 0, 1),
(164, 'Panama', 'PA', 'PAN', '', 0, 1),
(165, 'Papua New Guinea', 'PG', 'PNG', '', 0, 1),
(166, 'Paraguay', 'PY', 'PRY', '', 0, 1),
(167, 'Peru', 'PE', 'PER', '', 0, 1),
(168, 'Philippines', 'PH', 'PHL', '', 0, 1),
(169, 'Pitcairn', 'PN', 'PCN', '', 0, 1),
(170, 'Poland', 'PL', 'POL', '', 0, 1),
(171, 'Portugal', 'PT', 'PRT', '', 0, 1),
(172, 'Puerto Rico', 'PR', 'PRI', '', 0, 1),
(173, 'Qatar', 'QA', 'QAT', '', 0, 1),
(174, 'Reunion', 'RE', 'REU', '', 0, 1),
(175, 'Romania', 'RO', 'ROM', '', 0, 1),
(176, 'Russian Federation', 'RU', 'RUS', '', 0, 1),
(177, 'Rwanda', 'RW', 'RWA', '', 0, 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', '', 0, 1),
(179, 'Saint Lucia', 'LC', 'LCA', '', 0, 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '', 0, 1),
(181, 'Samoa', 'WS', 'WSM', '', 0, 1),
(182, 'San Marino', 'SM', 'SMR', '', 0, 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', '', 0, 1),
(184, 'Saudi Arabia', 'SA', 'SAU', '', 0, 1),
(185, 'Senegal', 'SN', 'SEN', '', 0, 1),
(186, 'Seychelles', 'SC', 'SYC', '', 0, 1),
(187, 'Sierra Leone', 'SL', 'SLE', '', 0, 1),
(188, 'Singapore', 'SG', 'SGP', '', 0, 1),
(189, 'Slovak Republic', 'SK', 'SVK', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{city} {postcode}\r\n{zone}\r\n{country}', 0, 1),
(190, 'Slovenia', 'SI', 'SVN', '', 0, 1),
(191, 'Solomon Islands', 'SB', 'SLB', '', 0, 1),
(192, 'Somalia', 'SO', 'SOM', '', 0, 1),
(193, 'South Africa', 'ZA', 'ZAF', '', 0, 1),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', '', 0, 1),
(195, 'Spain', 'ES', 'ESP', '', 0, 1),
(196, 'Sri Lanka', 'LK', 'LKA', '', 0, 1),
(197, 'St. Helena', 'SH', 'SHN', '', 0, 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', '', 0, 1),
(199, 'Sudan', 'SD', 'SDN', '', 0, 1),
(200, 'Suriname', 'SR', 'SUR', '', 0, 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', '', 0, 1),
(202, 'Swaziland', 'SZ', 'SWZ', '', 0, 1),
(203, 'Sweden', 'SE', 'SWE', '', 0, 1),
(204, 'Switzerland', 'CH', 'CHE', '', 0, 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', '', 0, 1),
(206, 'Taiwan', 'TW', 'TWN', '', 0, 1),
(207, 'Tajikistan', 'TJ', 'TJK', '', 0, 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', '', 0, 1),
(209, 'Thailand', 'TH', 'THA', '', 0, 1),
(210, 'Togo', 'TG', 'TGO', '', 0, 1),
(211, 'Tokelau', 'TK', 'TKL', '', 0, 1),
(212, 'Tonga', 'TO', 'TON', '', 0, 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', '', 0, 1),
(214, 'Tunisia', 'TN', 'TUN', '', 0, 1),
(215, 'Turkey', 'TR', 'TUR', '', 0, 1),
(216, 'Turkmenistan', 'TM', 'TKM', '', 0, 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', '', 0, 1),
(218, 'Tuvalu', 'TV', 'TUV', '', 0, 1),
(219, 'Uganda', 'UG', 'UGA', '', 0, 1),
(220, 'Ukraine', 'UA', 'UKR', '', 0, 1),
(221, 'United Arab Emirates', 'AE', 'ARE', '', 0, 1),
(222, 'United Kingdom', 'GB', 'GBR', '', 1, 1),
(223, 'United States', 'US', 'USA', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{city}, {zone} {postcode}\r\n{country}', 0, 1),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', '', 0, 1),
(225, 'Uruguay', 'UY', 'URY', '', 0, 1),
(226, 'Uzbekistan', 'UZ', 'UZB', '', 0, 1),
(227, 'Vanuatu', 'VU', 'VUT', '', 0, 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', '', 0, 1),
(229, 'Venezuela', 'VE', 'VEN', '', 0, 1),
(230, 'Viet Nam', 'VN', 'VNM', '', 0, 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', '', 0, 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', '', 0, 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', '', 0, 1),
(234, 'Western Sahara', 'EH', 'ESH', '', 0, 1),
(235, 'Yemen', 'YE', 'YEM', '', 0, 1),
(236, 'Yugoslavia', 'YU', 'YUG', '', 0, 1),
(237, 'Democratic Republic of Congo', 'CD', 'COD', '', 0, 1),
(238, 'Zambia', 'ZM', 'ZMB', '', 0, 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_dynamic`
--

CREATE TABLE IF NOT EXISTS `page_dynamic` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `level` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `theme` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `urlid` varchar(300) NOT NULL,
  `urltype` varchar(300) NOT NULL,
  `end` varchar(300) NOT NULL,
  `admin` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `page_dynamic`
--

INSERT INTO `page_dynamic` (`id`, `level`, `url`, `active`, `trash`, `theme`, `type`, `urlid`, `urltype`, `end`, `admin`) VALUES
(1, 'type', 'articles', '1', '0', 'cwadmin', 'article', '', '', '', '1'),
(2, 'type', 'pages', '1', '0', 'cwadmin', 'listpage', '', '', '', '1'),
(3, 'type', 'social', '1', '0', 'cwadmin', 'social', '', '', '', '1'),
(4, 'type', 'menu', '1', '0', 'cwadmin', 'listmenu', '', '', '', '1'),
(5, 'type', 'tickets', '1', '0', 'cwadmin', 'viewticket', '', '', '', '1'),
(6, 'type', 'category', '1', '0', 'cwadmin', 'listcat', '', '', '', '1'),
(7, 'type', 'transfer', '1', '0', 'cwadmin', 'viewtransfer', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `page_function`
--

CREATE TABLE IF NOT EXISTS `page_function` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `function` varchar(300) NOT NULL,
  `template` varchar(300) NOT NULL,
  `page` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `list` varchar(300) NOT NULL,
  `dynamic` varchar(10) NOT NULL DEFAULT '0',
  `contents` longblob NOT NULL,
  `rand` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `page_function`
--

INSERT INTO `page_function` (`id`, `name`, `function`, `template`, `page`, `active`, `trash`, `list`, `dynamic`, `contents`, `rand`) VALUES
(1, 'Edit-Create Articles', '31', 'cwadmin', '', '1', '0', '02', '1', '', ''),
(2, 'Pull Articles', '15', 'cwadmin', '', '1', '0', '02', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `page_restrict`
--

CREATE TABLE IF NOT EXISTS `page_restrict` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `page` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `startdate` varchar(300) NOT NULL,
  `enddate` varchar(300) NOT NULL,
  `addedby` varchar(300) NOT NULL,
  `pagerestrict` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_scripts`
--

CREATE TABLE IF NOT EXISTS `page_scripts` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `function` varchar(300) NOT NULL,
  `src` longtext NOT NULL,
  `theme` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE IF NOT EXISTS `page_settings` (
  `url` varchar(300) NOT NULL,
  `autoplay` varchar(10) NOT NULL DEFAULT '1',
  `album` varchar(300) NOT NULL,
  `background` varchar(300) NOT NULL,
  `secure` varchar(10) NOT NULL DEFAULT '0',
  `end` varchar(300) NOT NULL,
  `urltype` varchar(300) NOT NULL,
  `urlid` varchar(300) NOT NULL,
  `dashboard` varchar(10) NOT NULL DEFAULT '0',
  `dynamiclevel` varchar(300) NOT NULL,
  `admin` varchar(10) NOT NULL DEFAULT '0',
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`url`, `autoplay`, `album`, `background`, `secure`, `end`, `urltype`, `urlid`, `dashboard`, `dynamiclevel`, `admin`, `id`) VALUES
('admin', '1', '', '', '1', '', '', '', '0', '', '1', 1),
('articles', '1', '', '', '1', '', '', '', '0', 'type', '1', 2),
('profile', '1', '', '', '1', '', '', '', '0', 'type', '1', 3),
('category', '1', '', '', '1', '', '', '', '0', 'type', '1', 4),
('menu', '1', '', '', '1', '', '', '', '0', 'type', '1', 5),
('settings', '1', '', '', '1', '', '', '', '0', '', '1', 6),
('pages', '1', '', '', '1', '', '', '', '0', 'type', '1', 7),
('articles', '1', '', '', '1', '', 'trash', '', '0', '', '1', 8),
('login', '1', '', '', '0', '', '', '', '0', '', '1', 9),
('social', '1', '', '', '1', '', '', '', '0', 'type', '1', 10),
('tickets', '1', '', '', '1', '', '', '', '0', 'type', '1', 11),
('Home', '', '', '', '', '', '', '', '', '', '', 12);

-- --------------------------------------------------------

--
-- Table structure for table `page_structure`
--

CREATE TABLE IF NOT EXISTS `page_structure` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `template` varchar(300) NOT NULL,
  `article` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `end` varchar(300) NOT NULL,
  `urlid` varchar(300) NOT NULL,
  `urltype` varchar(300) NOT NULL,
  `admin` varchar(10) NOT NULL DEFAULT '0',
  `img` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `page_structure`
--

INSERT INTO `page_structure` (`id`, `name`, `url`, `active`, `trash`, `template`, `article`, `type`, `end`, `urlid`, `urltype`, `admin`, `img`) VALUES
(1, 'Admin Dashboard', '', '1', '0', 'cwadmin', '', 'dashboard', '', '', '', '1', ''),
(2, 'Menu', 'Menu', '1', '0', 'cwadmin', '', 'menu', '', '', '', '1', ''),
(3, 'profile', 'profile', '1', '0', 'cwadmin', '', 'profile', '', '', '', '1', ''),
(4, 'login', 'login', '1', '0', 'cwadmin', '', 'login', '', '', '', '1', ''),
(5, 'articles', 'articles', '1', '0', 'cwadmin', '', 'viewarticles', '', '', '', '1', ''),
(6, 'trash', 'articles', '0', '0', 'cwadmin', '', 'trash', '', '', 'trash', '1', ''),
(7, 'category', 'category', '1', '0', 'cwadmin', '', 'category', '', '', '', '1', ''),
(8, 'pages', 'pages', '1', '0', 'cwadmin', '', 'page', '', '', '', '1', ''),
(9, 'settings', 'settings', '1', '0', 'cwadmin', '', 'settings', '', '', '', '1', ''),
(10, 'tickets', 'Tickets', '1', '0', 'cwadmin', '', 'tickets', '', '', '', '1', ''),
(11, 'Transactions', 'Transactions', '1', '0', 'cwadmin', '', 'tickets', '', '', '', '1', ''),
(12, 'Home', 'home', '1', '0', 'default', '', 'home', '', '', '', '0', ''),
(13, 'transfer', 'transfer', '1', '0', 'cwadmin', '', 'transfer', '', '', '', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `page_template`
--

CREATE TABLE IF NOT EXISTS `page_template` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `template` varchar(300) NOT NULL,
  `urltype` varchar(300) NOT NULL,
  `urlid` varchar(300) NOT NULL,
  `end` varchar(300) NOT NULL,
  `admin` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `page_template`
--

INSERT INTO `page_template` (`id`, `name`, `url`, `active`, `trash`, `template`, `urltype`, `urlid`, `end`, `admin`) VALUES
(1, 'Admin Dashboard', '', '1', '0', 'cwadmin', '', '', '', '1'),
(2, 'articles', 'articles', '1', '0', 'cwadmin', '', '', '', '1'),
(3, 'login', 'login', '1', '0', 'cwadmin', '', '', '', '1'),
(4, 'profile', 'profile', '1', '0', 'cwadmin', '', '', '', '1'),
(5, 'test', '2', '1', '0', 'booster', '', '', '', '0'),
(6, 'category', 'category', '1', '0', 'cwadmin', '', '', '', '1'),
(7, 'pages', 'pages', '1', '0', 'cwadmin', '', '', '', '1'),
(8, 'settings', 'settings', '1', '0', 'cwadmin', '', '', '', '1'),
(9, 'Menu', 'Menu', '1', '0', 'cwadmin', '', '', '', '1'),
(10, 'Social Media', 'Social', '1', '0', 'cwadmin', '', '', '', '1'),
(11, 'Tickets', 'Tickets', '1', '0', 'cwadmin', '', '', '', '1'),
(12, 'Transactions', 'Transactions', '1', '0', 'cwadmin', '', '', '', '1'),
(13, 'Messages', 'Messages', '1', '0', 'cwadmin', '', '', '', '1'),
(14, 'Transfer', 'Transfer', '1', '0', 'cwadmin', '', '', '', '1'),
(15, 'Home', 'home', '1', '0', 'prosandro', '', '', '', '0'),
(16, 'Shop', 'Shop', '1', '0', 'prosandro', '', '', '', '0'),
(17, 'Wedding', 'Wedding', '1', '0', 'prosandro', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `session_clear`
--

CREATE TABLE IF NOT EXISTS `session_clear` (
  `session` longtext NOT NULL,
  `userid` varchar(300) NOT NULL,
  `ipaddress` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  `computerinfo` varchar(300) NOT NULL,
  `browser_name` varchar(300) NOT NULL,
  `browser_useragent` varchar(300) NOT NULL,
  `browser_version` varchar(300) NOT NULL,
  `browser_platform` varchar(300) NOT NULL,
  `browser_pattern` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `country` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `state` varchar(300) NOT NULL,
  `zip` varchar(300) NOT NULL,
  `lat` varchar(300) NOT NULL,
  `lon` varchar(300) NOT NULL,
  `countrycode` varchar(300) NOT NULL,
  `timezone` varchar(300) NOT NULL,
  `adminid` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` blob NOT NULL,
  `content` longblob NOT NULL,
  `api` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`, `api`) VALUES
(1, 0x66616365626f6f6b, 0x613a323a7b733a383a226175746f706f7374223b4e3b733a363a22616374697665223b733a313a2231223b7d, '0'),
(2, 0x74776974746572, 0x0072726179, '0');

-- --------------------------------------------------------

--
-- Table structure for table `structure_possible`
--

CREATE TABLE IF NOT EXISTS `structure_possible` (
  `structure` varchar(300) NOT NULL,
  `template` varchar(300) NOT NULL,
  `sidebar` varchar(10) NOT NULL DEFAULT '1',
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subscribe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `type` varchar(300) NOT NULL,
  `website` varchar(300) NOT NULL,
  `url` blob NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `info` blob NOT NULL,
  `requestid` blob NOT NULL,
  `content` blob NOT NULL,
  `user` blob NOT NULL,
  `social` blob NOT NULL,
  `rd` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tasks`
--


-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE IF NOT EXISTS `tracker` (
  `ipaddress` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  `page` varchar(300) NOT NULL,
  `pagename` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL,
  `state` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `lon` varchar(300) NOT NULL,
  `lat` varchar(300) NOT NULL,
  `zipcode` varchar(300) NOT NULL,
  `timezone` varchar(300) NOT NULL,
  `countrycode` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL DEFAULT '0',
  `user` varchar(300) NOT NULL,
  `date2` varchar(300) NOT NULL,
  `arrival` varchar(300) NOT NULL,
  `date3` varchar(300) NOT NULL,
  `ref` longtext NOT NULL,
  `browser_useragent` varchar(500) NOT NULL,
  `browser_name` varchar(500) NOT NULL,
  `browser_version` varchar(500) NOT NULL,
  `browser_platform` varchar(500) NOT NULL,
  `browser_pattern` varchar(500) NOT NULL,
  `session` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `tracker_new`
--

CREATE TABLE IF NOT EXISTS `tracker_new` (
  `date` varchar(300) NOT NULL,
  `ipaddress` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracker_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE IF NOT EXISTS `trans` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `type` blob NOT NULL,
  `method` blob NOT NULL,
  `user` blob NOT NULL,
  `status` blob NOT NULL,
  `price` blob NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `trash` varchar(10) NOT NULL DEFAULT '0',
  `transid` blob NOT NULL,
  `typeid` blob NOT NULL,
  `other` blob NOT NULL,
  `notes` blob NOT NULL,
  `attend` varchar(10) NOT NULL DEFAULT '0',
  `img` blob NOT NULL,
  `qty` varchar(300) NOT NULL,
  `guest` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE IF NOT EXISTS `transfer` (
  `name` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL,
  `content` longblob NOT NULL,
  `url` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  `active` varchar(10) NOT NULL,
  `trash` varchar(10) NOT NULL,
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(300) NOT NULL,
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `other` longblob NOT NULL,
  `info` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
