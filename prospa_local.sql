-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 06:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prospa_local`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `load_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `type_value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `load_id`, `type_name`, `type_value`) VALUES
(1, 1, 'Strongly Disagree', '1'),
(2, 1, 'Disagree', '2'),
(3, 1, 'Neither Agree or Disagree', '3'),
(4, 1, 'Agree', '4'),
(5, 1, 'Strongly Agree', '5'),
(6, 2, 'Strongly Disagree', '5'),
(7, 2, 'Disagree', '4'),
(8, 2, 'Neither Agree or Disagree', '3'),
(9, 2, 'Agree', '2'),
(10, 2, 'Strongly Agree', '1');

-- --------------------------------------------------------

--
-- Table structure for table `client_account`
--

CREATE TABLE `client_account` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client_users`
--

CREATE TABLE `client_users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_code` varchar(3) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_code`, `country_name`, `created_at`) VALUES
(1, 'AF', 'Afghanistan', '2022-09-02 05:47:56'),
(2, 'AL', 'Albania', '2022-09-02 05:48:21'),
(3, 'DZ', 'Algeria', '2022-09-02 05:48:22'),
(4, 'DS', 'American Samoa', '2022-09-02 05:48:22'),
(5, 'AD', 'Andorra', '2022-09-02 05:48:22'),
(6, 'AO', 'Angola', '2022-09-02 05:48:22'),
(7, 'AI', 'Anguilla', '2022-09-02 05:48:22'),
(8, 'AQ', 'Antarctica', '2022-09-02 05:48:22'),
(9, 'AG', 'Antigua and Barbuda', '2022-09-02 05:48:22'),
(10, 'AR', 'Argentina', '2022-09-02 05:48:22'),
(11, 'AM', 'Armenia', '2022-09-02 05:48:22'),
(12, 'AW', 'Aruba', '2022-09-02 05:48:22'),
(13, 'AU', 'Australia', '2022-09-02 05:48:22'),
(14, 'AT', 'Austria', '2022-09-02 05:48:22'),
(15, 'AZ', 'Azerbaijan', '2022-09-02 05:48:22'),
(16, 'BS', 'Bahamas', '2022-09-02 05:48:22'),
(17, 'BH', 'Bahrain', '2022-09-02 05:48:22'),
(18, 'BD', 'Bangladesh', '2022-09-02 05:48:22'),
(19, 'BB', 'Barbados', '2022-09-02 05:48:23'),
(20, 'BY', 'Belarus', '2022-09-02 05:48:23'),
(21, 'BE', 'Belgium', '2022-09-02 05:48:23'),
(22, 'BZ', 'Belize', '2022-09-02 05:48:23'),
(23, 'BJ', 'Benin', '2022-09-02 05:48:23'),
(24, 'BM', 'Bermuda', '2022-09-02 05:48:23'),
(25, 'BT', 'Bhutan', '2022-09-02 05:48:23'),
(26, 'BO', 'Bolivia', '2022-09-02 05:48:23'),
(27, 'BA', 'Bosnia and Herzegovina', '2022-09-02 05:48:23'),
(28, 'BW', 'Botswana', '2022-09-02 05:48:23'),
(29, 'BV', 'Bouvet Island', '2022-09-02 05:48:23'),
(30, 'BR', 'Brazil', '2022-09-02 05:48:23'),
(31, 'IO', 'British Indian Ocean Territory', '2022-09-02 05:48:23'),
(32, 'BN', 'Brunei Darussalam', '2022-09-02 05:48:23'),
(33, 'BG', 'Bulgaria', '2022-09-02 05:48:23'),
(34, 'BF', 'Burkina Faso', '2022-09-02 05:48:23'),
(35, 'BI', 'Burundi', '2022-09-02 05:48:24'),
(36, 'KH', 'Cambodia', '2022-09-02 05:48:24'),
(37, 'CM', 'Cameroon', '2022-09-02 05:48:24'),
(38, 'CA', 'Canada', '2022-09-02 05:48:24'),
(39, 'CV', 'Cape Verde', '2022-09-02 05:48:24'),
(40, 'KY', 'Cayman Islands', '2022-09-02 05:48:24'),
(41, 'CF', 'Central African Republic', '2022-09-02 05:48:24'),
(42, 'TD', 'Chad', '2022-09-02 05:48:24'),
(43, 'CL', 'Chile', '2022-09-02 05:48:24'),
(44, 'CN', 'China', '2022-09-02 05:48:24'),
(45, 'CX', 'Christmas Island', '2022-09-02 05:48:24'),
(46, 'CC', 'Cocos (Keeling) Islands', '2022-09-02 05:48:24'),
(47, 'CO', 'Colombia', '2022-09-02 05:48:24'),
(48, 'KM', 'Comoros', '2022-09-02 05:48:24'),
(49, 'CD', 'Democratic Republic of the Congo', '2022-09-02 05:48:24'),
(50, 'CG', 'Republic of Congo', '2022-09-02 05:48:24'),
(51, 'CK', 'Cook Islands', '2022-09-02 05:48:24'),
(52, 'CR', 'Costa Rica', '2022-09-02 05:48:24'),
(53, 'HR', 'Croatia (Hrvatska)', '2022-09-02 05:48:25'),
(54, 'CU', 'Cuba', '2022-09-02 05:48:25'),
(55, 'CY', 'Cyprus', '2022-09-02 05:48:25'),
(56, 'CZ', 'Czech Republic', '2022-09-02 05:48:25'),
(57, 'DK', 'Denmark', '2022-09-02 05:48:25'),
(58, 'DJ', 'Djibouti', '2022-09-02 05:48:25'),
(59, 'DM', 'Dominica', '2022-09-02 05:48:25'),
(60, 'DO', 'Dominican Republic', '2022-09-02 05:48:25'),
(61, 'TP', 'East Timor', '2022-09-02 05:48:25'),
(62, 'EC', 'Ecuador', '2022-09-02 05:48:25'),
(63, 'EG', 'Egypt', '2022-09-02 05:48:25'),
(64, 'SV', 'El Salvador', '2022-09-02 05:48:25'),
(65, 'GQ', 'Equatorial Guinea', '2022-09-02 05:48:25'),
(66, 'ER', 'Eritrea', '2022-09-02 05:48:25'),
(67, 'EE', 'Estonia', '2022-09-02 05:48:25'),
(68, 'ET', 'Ethiopia', '2022-09-02 05:48:25'),
(69, 'FK', 'Falkland Islands (Malvinas)', '2022-09-02 05:48:25'),
(70, 'FO', 'Faroe Islands', '2022-09-02 05:48:25'),
(71, 'FJ', 'Fiji', '2022-09-02 05:48:26'),
(72, 'FI', 'Finland', '2022-09-02 05:48:26'),
(73, 'FR', 'France', '2022-09-02 05:48:26'),
(74, 'FX', 'France, Metropolitan', '2022-09-02 05:48:26'),
(75, 'GF', 'French Guiana', '2022-09-02 05:48:26'),
(76, 'PF', 'French Polynesia', '2022-09-02 05:48:26'),
(77, 'TF', 'French Southern Territories', '2022-09-02 05:48:26'),
(78, 'GA', 'Gabon', '2022-09-02 05:48:26'),
(79, 'GM', 'Gambia', '2022-09-02 05:48:26'),
(80, 'GE', 'Georgia', '2022-09-02 05:48:26'),
(81, 'DE', 'Germany', '2022-09-02 05:48:26'),
(82, 'GH', 'Ghana', '2022-09-02 05:48:26'),
(83, 'GI', 'Gibraltar', '2022-09-02 05:48:26'),
(84, 'GK', 'Guernsey', '2022-09-02 05:48:26'),
(85, 'GR', 'Greece', '2022-09-02 05:48:26'),
(86, 'GL', 'Greenland', '2022-09-02 05:48:26'),
(87, 'GD', 'Grenada', '2022-09-02 05:48:26'),
(88, 'GP', 'Guadeloupe', '2022-09-02 05:48:26'),
(89, 'GU', 'Guam', '2022-09-02 05:48:26'),
(90, 'GT', 'Guatemala', '2022-09-02 05:48:27'),
(91, 'GN', 'Guinea', '2022-09-02 05:48:27'),
(92, 'GW', 'Guinea-Bissau', '2022-09-02 05:48:27'),
(93, 'GY', 'Guyana', '2022-09-02 05:48:27'),
(94, 'HT', 'Haiti', '2022-09-02 05:48:27'),
(95, 'HM', 'Heard and Mc Donald Islands', '2022-09-02 05:48:27'),
(96, 'HN', 'Honduras', '2022-09-02 05:48:27'),
(97, 'HK', 'Hong Kong', '2022-09-02 05:48:27'),
(98, 'HU', 'Hungary', '2022-09-02 05:48:27'),
(99, 'IS', 'Iceland', '2022-09-02 05:48:27'),
(100, 'IN', 'India', '2022-09-02 05:48:27'),
(101, 'IM', 'Isle of Man', '2022-09-02 05:48:27'),
(102, 'ID', 'Indonesia', '2022-09-02 05:48:27'),
(103, 'IR', 'Iran (Islamic Republic of)', '2022-09-02 05:48:27'),
(104, 'IQ', 'Iraq', '2022-09-02 05:48:27'),
(105, 'IE', 'Ireland', '2022-09-02 05:48:27'),
(106, 'IL', 'Israel', '2022-09-02 05:48:27'),
(107, 'IT', 'Italy', '2022-09-02 05:48:27'),
(108, 'CI', 'Ivory Coast', '2022-09-02 05:48:28'),
(109, 'JE', 'Jersey', '2022-09-02 05:48:28'),
(110, 'JM', 'Jamaica', '2022-09-02 05:48:28'),
(111, 'JP', 'Japan', '2022-09-02 05:48:28'),
(112, 'JO', 'Jordan', '2022-09-02 05:48:28'),
(113, 'KZ', 'Kazakhstan', '2022-09-02 05:48:28'),
(114, 'KE', 'Kenya', '2022-09-02 05:48:28'),
(115, 'KI', 'Kiribati', '2022-09-02 05:48:28'),
(116, 'KP', 'Korea, Democratic People\'s Republic of', '2022-09-02 05:48:28'),
(117, 'KR', 'Korea, Republic of', '2022-09-02 05:48:28'),
(118, 'XK', 'Kosovo', '2022-09-02 05:48:28'),
(119, 'KW', 'Kuwait', '2022-09-02 05:48:28'),
(120, 'KG', 'Kyrgyzstan', '2022-09-02 05:48:28'),
(121, 'LA', 'Lao People\'s Democratic Republic', '2022-09-02 05:48:28'),
(122, 'LV', 'Latvia', '2022-09-02 05:48:28'),
(123, 'LB', 'Lebanon', '2022-09-02 05:48:28'),
(124, 'LS', 'Lesotho', '2022-09-02 05:48:28'),
(125, 'LR', 'Liberia', '2022-09-02 05:48:28'),
(126, 'LY', 'Libyan Arab Jamahiriya', '2022-09-02 05:48:28'),
(127, 'LI', 'Liechtenstein', '2022-09-02 05:48:28'),
(128, 'LT', 'Lithuania', '2022-09-02 05:48:28'),
(129, 'LU', 'Luxembourg', '2022-09-02 05:48:29'),
(130, 'MO', 'Macau', '2022-09-02 05:48:29'),
(131, 'MK', 'North Macedonia', '2022-09-02 05:48:29'),
(132, 'MG', 'Madagascar', '2022-09-02 05:48:29'),
(133, 'MW', 'Malawi', '2022-09-02 05:48:29'),
(134, 'MY', 'Malaysia', '2022-09-02 05:48:29'),
(135, 'MV', 'Maldives', '2022-09-02 05:48:29'),
(136, 'ML', 'Mali', '2022-09-02 05:48:29'),
(137, 'MT', 'Malta', '2022-09-02 05:48:29'),
(138, 'MH', 'Marshall Islands', '2022-09-02 05:48:29'),
(139, 'MQ', 'Martinique', '2022-09-02 05:48:29'),
(140, 'MR', 'Mauritania', '2022-09-02 05:48:29'),
(141, 'MU', 'Mauritius', '2022-09-02 05:48:29'),
(142, 'TY', 'Mayotte', '2022-09-02 05:48:29'),
(143, 'MX', 'Mexico', '2022-09-02 05:48:29'),
(144, 'FM', 'Micronesia, Federated States of', '2022-09-02 05:48:29'),
(145, 'MD', 'Moldova, Republic of', '2022-09-02 05:48:29'),
(146, 'MC', 'Monaco', '2022-09-02 05:48:29'),
(147, 'MN', 'Mongolia', '2022-09-02 05:48:29'),
(148, 'ME', 'Montenegro', '2022-09-02 05:48:29'),
(149, 'MS', 'Montserrat', '2022-09-02 05:48:29'),
(150, 'MA', 'Morocco', '2022-09-02 05:48:30'),
(151, 'MZ', 'Mozambique', '2022-09-02 05:48:30'),
(152, 'MM', 'Myanmar', '2022-09-02 05:48:30'),
(153, 'NA', 'Namibia', '2022-09-02 05:48:30'),
(154, 'NR', 'Nauru', '2022-09-02 05:48:30'),
(155, 'NP', 'Nepal', '2022-09-02 05:48:30'),
(156, 'NL', 'Netherlands', '2022-09-02 05:48:30'),
(157, 'AN', 'Netherlands Antilles', '2022-09-02 05:48:30'),
(158, 'NC', 'New Caledonia', '2022-09-02 05:48:30'),
(159, 'NZ', 'New Zealand', '2022-09-02 05:48:30'),
(160, 'NI', 'Nicaragua', '2022-09-02 05:48:30'),
(161, 'NE', 'Niger', '2022-09-02 05:48:30'),
(162, 'NG', 'Nigeria', '2022-09-02 05:48:30'),
(163, 'NU', 'Niue', '2022-09-02 05:48:30'),
(164, 'NF', 'Norfolk Island', '2022-09-02 05:48:30'),
(165, 'MP', 'Northern Mariana Islands', '2022-09-02 05:48:30'),
(166, 'NO', 'Norway', '2022-09-02 05:48:30'),
(167, 'OM', 'Oman', '2022-09-02 05:48:30'),
(168, 'PK', 'Pakistan', '2022-09-02 05:48:30'),
(169, 'PW', 'Palau', '2022-09-02 05:48:30'),
(170, 'PS', 'Palestine', '2022-09-02 05:48:30'),
(171, 'PA', 'Panama', '2022-09-02 05:48:31'),
(172, 'PG', 'Papua New Guinea', '2022-09-02 05:48:31'),
(173, 'PY', 'Paraguay', '2022-09-02 05:48:31'),
(174, 'PE', 'Peru', '2022-09-02 05:48:31'),
(175, 'PH', 'Philippines', '2022-09-02 05:48:31'),
(176, 'PN', 'Pitcairn', '2022-09-02 05:48:31'),
(177, 'PL', 'Poland', '2022-09-02 05:48:31'),
(178, 'PT', 'Portugal', '2022-09-02 05:48:31'),
(179, 'PR', 'Puerto Rico', '2022-09-02 05:48:31'),
(180, 'QA', 'Qatar', '2022-09-02 05:48:31'),
(181, 'RE', 'Reunion', '2022-09-02 05:48:31'),
(182, 'RO', 'Romania', '2022-09-02 05:48:31'),
(183, 'RU', 'Russian Federation', '2022-09-02 05:48:31'),
(184, 'RW', 'Rwanda', '2022-09-02 05:48:31'),
(185, 'KN', 'Saint Kitts and Nevis', '2022-09-02 05:48:31'),
(186, 'LC', 'Saint Lucia', '2022-09-02 05:48:31'),
(187, 'VC', 'Saint Vincent and the Grenadines', '2022-09-02 05:48:31'),
(188, 'WS', 'Samoa', '2022-09-02 05:48:32'),
(189, 'SM', 'San Marino', '2022-09-02 05:48:32'),
(190, 'ST', 'Sao Tome and Principe', '2022-09-02 05:48:32'),
(191, 'SA', 'Saudi Arabia', '2022-09-02 05:48:32'),
(192, 'SN', 'Senegal', '2022-09-02 05:48:32'),
(193, 'RS', 'Serbia', '2022-09-02 05:48:32'),
(194, 'SC', 'Seychelles', '2022-09-02 05:48:32'),
(195, 'SL', 'Sierra Leone', '2022-09-02 05:48:32'),
(196, 'SG', 'Singapore', '2022-09-02 05:48:32'),
(197, 'SK', 'Slovakia', '2022-09-02 05:48:32'),
(198, 'SI', 'Slovenia', '2022-09-02 05:48:32'),
(199, 'SB', 'Solomon Islands', '2022-09-02 05:48:32'),
(200, 'SO', 'Somalia', '2022-09-02 05:48:32'),
(201, 'ZA', 'South Africa', '2022-09-02 05:48:32'),
(202, 'GS', 'South Georgia South Sandwich Islands', '2022-09-02 05:48:32'),
(203, 'SS', 'South Sudan', '2022-09-02 05:48:33'),
(204, 'ES', 'Spain', '2022-09-02 05:48:33'),
(205, 'LK', 'Sri Lanka', '2022-09-02 05:48:33'),
(206, 'SH', 'St. Helena', '2022-09-02 05:48:33'),
(207, 'PM', 'St. Pierre and Miquelon', '2022-09-02 05:48:33'),
(208, 'SD', 'Sudan', '2022-09-02 05:48:33'),
(209, 'SR', 'Suriname', '2022-09-02 05:48:33'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', '2022-09-02 05:48:33'),
(211, 'SZ', 'Eswatini', '2022-09-02 05:48:33'),
(212, 'SE', 'Sweden', '2022-09-02 05:48:33'),
(213, 'CH', 'Switzerland', '2022-09-02 05:48:33'),
(214, 'SY', 'Syrian Arab Republic', '2022-09-02 05:48:33'),
(215, 'TW', 'Taiwan', '2022-09-02 05:48:33'),
(216, 'TJ', 'Tajikistan', '2022-09-02 05:48:33'),
(217, 'TZ', 'Tanzania, United Republic of', '2022-09-02 05:48:33'),
(218, 'TH', 'Thailand', '2022-09-02 05:48:33'),
(219, 'TG', 'Togo', '2022-09-02 05:48:33'),
(220, 'TK', 'Tokelau', '2022-09-02 05:48:33'),
(221, 'TO', 'Tonga', '2022-09-02 05:48:34'),
(222, 'TT', 'Trinidad and Tobago', '2022-09-02 05:48:34'),
(223, 'TN', 'Tunisia', '2022-09-02 05:48:34'),
(224, 'TR', 'Turkey', '2022-09-02 05:48:34'),
(225, 'TM', 'Turkmenistan', '2022-09-02 05:48:34'),
(226, 'TC', 'Turks and Caicos Islands', '2022-09-02 05:48:34'),
(227, 'TV', 'Tuvalu', '2022-09-02 05:48:34'),
(228, 'UG', 'Uganda', '2022-09-02 05:48:34'),
(229, 'UA', 'Ukraine', '2022-09-02 05:48:34'),
(230, 'AE', 'United Arab Emirates', '2022-09-02 05:48:34'),
(231, 'GB', 'United Kingdom', '2022-09-02 05:48:34'),
(232, 'US', 'United States', '2022-09-02 05:48:34'),
(233, 'UM', 'United States minor outlying islands', '2022-09-02 05:48:34'),
(234, 'UY', 'Uruguay', '2022-09-02 05:48:34'),
(235, 'UZ', 'Uzbekistan', '2022-09-02 05:48:34'),
(236, 'VU', 'Vanuatu', '2022-09-02 05:48:34'),
(237, 'VA', 'Vatican City State', '2022-09-02 05:48:34'),
(238, 'VE', 'Venezuela', '2022-09-02 05:48:34'),
(239, 'VN', 'Vietnam', '2022-09-02 05:48:34'),
(240, 'VG', 'Virgin Islands (British)', '2022-09-02 05:48:34'),
(241, 'VI', 'Virgin Islands (U.S.)', '2022-09-02 05:48:35'),
(242, 'WF', 'Wallis and Futuna Islands', '2022-09-02 05:48:35'),
(243, 'EH', 'Western Sahara', '2022-09-02 05:48:35'),
(244, 'YE', 'Yemen', '2022-09-02 05:48:35'),
(245, 'ZM', 'Zambia', '2022-09-02 05:48:35'),
(246, 'ZW', 'Zimbabwe', '2022-09-02 05:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `focuses`
--

CREATE TABLE `focuses` (
  `focus_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` int(1) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'Not In Used(No Required)',
  `orgindustry_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `candidate_title` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Candidate Table';

-- --------------------------------------------------------

--
-- Table structure for table `loads`
--

CREATE TABLE `loads` (
  `load_id` int(11) NOT NULL,
  `load_name` varchar(255) NOT NULL,
  `load_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loads`
--

INSERT INTO `loads` (`load_id`, `load_name`, `load_description`) VALUES
(1, 'P', 'Positive'),
(2, 'N', 'Negitive');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2019_08_19_000000_create_failed_jobs_table', 1),
(30, '2020_11_21_155900_create_products_table', 1),
(31, '2020_12_07_123445_create_permission_tables', 1),
(32, '2020_12_24_063748_create_sessions_table', 2),
(36, '2021_01_08_141720_create_blogs_table', 5),
(37, '2021_01_26_155302_create_inquiries_table', 6),
(41, '2021_02_10_140359_create_subscribers_table', 8),
(42, '2021_02_17_160111_create_faqs_table', 9),
(43, '2021_02_18_122403_create_clients_table', 10),
(44, '2021_02_19_125634_create_positions_table', 11),
(45, '2021_02_19_132914_create_teams_table', 12),
(46, '2021_02_20_123735_create_testimonials_table', 13),
(47, '2021_02_23_132006_create_categories_table', 14),
(48, '2021_02_23_142315_create_tags_table', 15),
(49, '2021_02_24_120750_create_services_table', 16),
(50, '2021_02_24_133556_create_portfolios_table', 17),
(51, '2016_06_01_000001_create_oauth_auth_codes_table', 18),
(52, '2016_06_01_000002_create_oauth_access_tokens_table', 18),
(53, '2016_06_01_000003_create_oauth_refresh_tokens_table', 18),
(54, '2016_06_01_000004_create_oauth_clients_table', 18),
(55, '2016_06_01_000005_create_oauth_personal_access_clients_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 2),
(6, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 102),
(1, 'App\\Models\\User', 104),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 100),
(3, 'App\\Models\\User', 101),
(3, 'App\\Models\\User', 102),
(3, 'App\\Models\\User', 103),
(3, 'App\\Models\\User', 104),
(3, 'App\\Models\\User', 107),
(4, 'App\\Models\\User', 101),
(4, 'App\\Models\\User', 102),
(4, 'App\\Models\\User', 103);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Larademo Personal Access Client', 'OIKSDKQryYEyiGj6Nwbiw6rvjPs7kJh4Qn8109tp', NULL, 'http://localhost', 1, 0, 0, '2021-05-16 07:10:43', '2021-05-16 07:10:43'),
(2, NULL, 'Larademo Password Grant Client', '6VRAzGMzT2Wlhl8uYNYa0Oe4WJP4ApjtfWhKz0ZH', 'users', 'http://localhost', 0, 1, 0, '2021-05-16 07:10:44', '2021-05-16 07:10:44'),
(3, NULL, 'Prospa Personal Access Client', 'irEvj2injINiJ6QGJw0DP4FZr7Ewqz69Uo0C4Nx3', NULL, 'http://localhost', 1, 0, 0, '2022-09-09 03:58:46', '2022-09-09 03:58:46'),
(4, NULL, 'Prospa Password Grant Client', 'bh0Scph0wNthYI9CZbiWFDSGQI5DJgskPCg3qmV9', 'users', 'http://localhost', 0, 1, 0, '2022-09-09 03:58:46', '2022-09-09 03:58:46'),
(5, NULL, 'Laravel Personal Access Client', 'cCb2ShgtgkPcNpoWUrYlB8xwTlvW8jrL2WReOj6o', NULL, 'http://localhost', 1, 0, 0, '2022-09-09 05:01:10', '2022-09-09 05:01:10'),
(6, NULL, 'Laravel Password Grant Client', 'xk6DCoB4aq1NrKDXJnNzam4FFUxU82vz58lgdfDr', 'users', 'http://localhost', 0, 1, 0, '2022-09-09 05:01:10', '2022-09-09 05:01:10'),
(7, NULL, 'Laravel Personal Access Client', 'PXW2ueWorbojWgsSz2bqeXAf9znbusuuyXpX7B7p', NULL, 'http://localhost', 1, 0, 0, '2022-09-12 05:07:59', '2022-09-12 05:07:59'),
(8, NULL, 'Laravel Password Grant Client', 'wpyB1LtN6XEdTNqcIX1Paqytf4a62rYOjp8SJzRb', 'users', 'http://localhost', 0, 1, 0, '2022-09-12 05:07:59', '2022-09-12 05:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-16 07:10:44', '2021-05-16 07:10:44'),
(2, 3, '2022-09-09 03:58:46', '2022-09-09 03:58:46'),
(3, 5, '2022-09-09 05:01:10', '2022-09-09 05:01:10'),
(4, 7, '2022-09-12 05:07:59', '2022-09-12 05:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organisation_industry`
--

CREATE TABLE `organisation_industry` (
  `orgIndustry_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2020-12-07 08:20:08', '2020-12-07 08:20:08'),
(2, 'role-create', 'web', '2020-12-07 08:20:08', '2020-12-07 08:20:08'),
(3, 'role-edit', 'web', '2020-12-07 08:20:08', '2020-12-07 08:20:08'),
(4, 'role-delete', 'web', '2020-12-07 08:20:08', '2020-12-07 08:20:08'),
(5, 'product-list', 'web', '2020-12-07 08:20:08', '2020-12-07 08:20:08'),
(6, 'product-create', 'web', '2020-12-07 08:20:09', '2020-12-07 08:20:09'),
(7, 'product-edit', 'web', '2020-12-07 08:20:09', '2020-12-07 08:20:09'),
(8, 'product-delete', 'web', '2020-12-07 08:20:09', '2020-12-07 08:20:09'),
(11, 'role-view', 'web', '2021-01-18 07:31:55', '2021-01-18 07:31:55'),
(12, 'product-view', 'web', '2021-01-18 07:32:08', '2021-01-18 07:32:08'),
(13, 'user-list', 'web', '2021-01-18 07:32:33', '2021-01-18 07:32:33'),
(14, 'user-create', 'web', '2021-01-18 07:32:42', '2021-01-18 07:32:42'),
(15, 'user-edit', 'web', '2021-01-18 07:32:49', '2021-01-18 07:32:49'),
(16, 'user-delete', 'web', '2021-01-18 07:32:57', '2021-01-18 07:32:57'),
(17, 'user-view', 'web', '2021-01-18 07:33:53', '2021-01-18 07:33:53'),
(18, 'permission-list', 'web', '2021-01-18 07:34:25', '2021-01-18 07:34:25'),
(22, 'permission-delete', 'web', '2021-01-18 07:35:12', '2021-01-18 07:35:12'),
(23, 'blog-list', 'web', '2021-01-18 07:40:43', '2021-02-26 07:39:51'),
(24, 'blog-create', 'web', '2021-01-18 07:40:54', '2021-02-26 07:39:38'),
(25, 'blog-edit', 'web', '2021-01-18 07:41:03', '2021-02-26 07:39:25'),
(26, 'blog-delete', 'web', '2021-01-18 07:41:10', '2021-02-26 07:39:13'),
(27, 'blog-view', 'web', '2021-01-18 07:41:16', '2021-02-26 07:39:00'),
(38, 'inquiry-list', 'web', '2021-01-26 11:15:41', '2021-01-26 11:15:41'),
(41, 'inquiry-delete', 'web', '2021-01-26 11:16:16', '2021-01-26 11:16:16'),
(43, 'permission-create', 'web', '2021-01-30 07:19:49', '2021-01-30 07:19:49'),
(44, 'permission-edit', 'web', '2021-01-30 07:19:55', '2021-01-30 07:19:55'),
(45, 'permission-view', 'web', '2021-01-30 07:20:02', '2021-01-30 07:20:02'),
(46, 'settings', 'web', '2021-02-09 08:31:05', '2021-02-09 08:31:05'),
(47, 'subscriber-list', 'web', '2021-02-10 08:39:24', '2021-02-10 08:39:24'),
(48, 'subscriber-delete', 'web', '2021-02-10 08:39:31', '2021-02-10 08:39:31'),
(49, 'subscriber-edit', 'web', '2021-02-10 08:40:03', '2021-02-10 08:40:03'),
(50, 'subscriber-create', 'web', '2021-02-10 08:40:08', '2021-02-10 08:40:08'),
(51, 'faq-view', 'web', '2021-02-17 10:33:51', '2021-02-17 10:33:51'),
(52, 'faq-delete', 'web', '2021-02-17 10:34:03', '2021-02-17 10:34:03'),
(53, 'faq-edit', 'web', '2021-02-17 10:34:11', '2021-02-17 10:34:11'),
(54, 'faq-create', 'web', '2021-02-17 10:34:21', '2021-02-17 10:34:21'),
(55, 'faq-list', 'web', '2021-02-17 10:34:28', '2021-02-17 10:34:28'),
(56, 'client-list', 'web', '2021-02-18 07:00:24', '2021-02-18 07:00:24'),
(57, 'client-create', 'web', '2021-02-18 07:00:33', '2021-02-18 07:00:33'),
(58, 'client-edit', 'web', '2021-02-18 07:03:40', '2021-02-18 07:03:40'),
(59, 'client-delete', 'web', '2021-02-18 07:04:39', '2021-02-18 07:04:39'),
(60, 'client-view', 'web', '2021-02-18 07:04:48', '2021-02-18 07:04:48'),
(61, 'position-list', 'web', '2021-02-19 07:32:50', '2021-02-19 07:32:50'),
(62, 'position-create', 'web', '2021-02-19 07:32:58', '2021-02-19 07:32:58'),
(63, 'position-edit', 'web', '2021-02-19 07:33:05', '2021-02-19 07:33:05'),
(64, 'position-delete', 'web', '2021-02-19 07:33:15', '2021-02-19 07:33:15'),
(65, 'position-view', 'web', '2021-02-19 07:33:23', '2021-02-19 07:33:23'),
(66, 'team-list', 'web', '2021-02-19 08:11:08', '2021-02-19 08:11:08'),
(67, 'team-create', 'web', '2021-02-19 08:11:15', '2021-02-19 08:11:15'),
(68, 'team-edit', 'web', '2021-02-19 08:11:21', '2021-02-19 08:11:21'),
(69, 'team-delete', 'web', '2021-02-19 08:11:27', '2021-02-19 08:11:27'),
(70, 'team-view', 'web', '2021-02-19 08:11:33', '2021-02-19 08:11:33'),
(71, 'testimonial-list', 'web', '2021-02-20 07:13:48', '2021-02-20 07:13:48'),
(72, 'testimonial-create', 'web', '2021-02-20 07:13:56', '2021-02-20 07:13:56'),
(73, 'testimonial-edit', 'web', '2021-02-20 07:14:02', '2021-02-20 07:14:02'),
(74, 'testimonial-view', 'web', '2021-02-20 07:14:18', '2021-02-20 07:14:18'),
(75, 'testimonial-delete', 'web', '2021-02-20 07:14:25', '2021-02-20 07:14:25'),
(76, 'categories-list', 'web', '2021-02-23 07:58:04', '2021-02-23 07:58:04'),
(77, 'categories-create', 'web', '2021-02-23 07:58:12', '2021-02-23 07:58:12'),
(78, 'categories-edit', 'web', '2021-02-23 07:58:22', '2021-02-23 07:58:22'),
(79, 'categories-delete', 'web', '2021-02-23 07:58:30', '2021-02-23 07:58:30'),
(80, 'categories-view', 'web', '2021-02-23 07:58:38', '2021-02-23 07:58:38'),
(81, 'tags-list', 'web', '2021-02-23 08:48:12', '2021-02-23 08:48:12'),
(82, 'tags-create', 'web', '2021-02-23 08:48:19', '2021-02-23 08:48:19'),
(83, 'tags-edit', 'web', '2021-02-23 08:48:24', '2021-02-23 08:48:24'),
(84, 'tags-delete', 'web', '2021-02-23 08:48:29', '2021-02-23 08:48:29'),
(85, 'tags-view', 'web', '2021-02-23 08:48:35', '2021-02-23 08:48:35'),
(86, 'services-list', 'web', '2021-02-24 06:53:04', '2021-02-24 06:53:04'),
(87, 'services-create', 'web', '2021-02-24 06:53:11', '2021-02-24 06:53:11'),
(88, 'services-edit', 'web', '2021-02-24 06:53:17', '2021-02-24 06:53:17'),
(89, 'services-delete', 'web', '2021-02-24 06:53:22', '2021-02-24 06:53:22'),
(90, 'services-view', 'web', '2021-02-24 06:53:28', '2021-02-24 06:53:28'),
(91, 'portfolio-list', 'web', '2021-02-24 08:09:54', '2021-02-24 08:09:54'),
(92, 'portfolio-create', 'web', '2021-02-24 08:10:01', '2021-02-24 08:10:01'),
(93, 'portfolio-edit', 'web', '2021-02-24 08:10:06', '2021-02-24 08:10:06'),
(94, 'portfolio-delete', 'web', '2021-02-24 08:10:12', '2021-02-24 08:10:12'),
(95, 'portfolio-view', 'web', '2021-02-24 08:10:17', '2021-02-24 08:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `credits` int(11) NOT NULL,
  `remain_credits` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qustion_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `loads_id` int(11) DEFAULT NULL,
  `scale_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qustion_id`, `question`, `loads_id`, `scale_id`) VALUES
(1, 'I let people make up their own minds', 2, 9),
(2, 'I find it more important to focus on the longer-term goals than I do short-term chall5es', 1, 7),
(3, 'I believe laws should be strictly enforced', 1, 3),
(4, 'I would prefer to leave the details to others', 2, 13),
(5, 'I am confident telling others what to do', 1, 11),
(6, 'I like working with numbers', 1, 1),
(7, 'I am wiling to go against the consensus viewpoint', 2, 2),
(8, 'I evaluate the pros, cons, and implications of different courses of action', 1, 10),
(9, 'I get more done when I work alone', 2, 2),
(10, 'My personal problems are unsolvable', 2, 8),
(11, 'I am pretty disorganised', 2, 13),
(12, 'I wel3e new opinions and ideas', 1, 10),
(13, 'I get un3fortable if I can\'t check my work', 1, 13),
(14, 'I tend to analyse things', 1, 1),
(15, 'I find it difficult to approach others', 2, 5),
(16, 'I diligently check the details', 1, 13),
(17, 'I don\'t believe other peoples\' opinions can help me', 2, 10),
(18, 'Events in my life that I cannot influence are a constant source of worry/concern', 2, 8),
(19, 'I get bored doing things the same way', 2, 3),
(20, 'I have never broken or lost anything that belonged to someone else', 1, 6),
(21, 'I adapt my style to suit who I am speaking to', 1, 9),
(22, 'I rarely miss a deadline', 1, 13),
(23, 'I am a modest person', 2, 9),
(24, 'I know how to cope with most situations', 1, 8),
(25, 'I am un3fortable talking in front of groups', 2, 5),
(26, 'I almost never have a plan', 2, 7),
(27, 'I am easily distracted when doing routine work', 2, 13),
(28, 'Many people would describe me as ambitious', 1, 4),
(29, 'I like doing things differently', 1, 3),
(30, 'I prefer to text rather than talk on the phone', 1, 12),
(31, 'I don\'t consider setting goals as being important', 2, 7),
(32, 'I always find a solution when something unfo8een happens', 1, 8),
(33, 'I don\'t care about the details', 2, 13),
(34, 'I prefer to trust my instincts', 2, 1),
(35, 'Small errors bother me', 1, 13),
(36, 'I look for ways to deal with objections', 1, 9),
(37, 'I would describe myself as analytical', 1, 1),
(38, 'I am 3fortable negotiating', 1, 9),
(39, 'I seek to determine future goals', 1, 7),
(40, 'I often see patterns across unrelated events and information', 1, 10),
(41, 'I evaluate information', 1, 1),
(42, 'I worry about what might go wrong', 1, 3),
(43, 'It is more important to cooperate than it is to win', 2, 4),
(44, 'I am not 3fortable with financial data', 2, 1),
(45, 'I have never taken advantage of someone', 1, 6),
(46, 'I prefer to be one in charge', 1, 11),
(47, 'I have never taken anything that belonged to someone else', 1, 6),
(48, 'I accept decisions made by my team', 1, 2),
(49, 'I am a quiet person', 2, 5),
(50, 'I prefer to win rather than cooperate with others', 1, 4),
(51, 'I don\'t feel like I take offense easily', 1, 8),
(52, 'I will stick to a task until the end', 1, 13),
(53, 'I really don\'t care if I achieve my goals', 2, 4),
(54, 'I almost always have a plan', 1, 7),
(55, 'I let people reach their own conclusions', 2, 9),
(56, 'I am a talkative person', 1, 5),
(57, 'I don\'t like organising my emails into sub directories', 2, 12),
(58, 'I prefer to work in a team environment', 1, 5),
(59, 'I am willing to argue my point of view', 1, 9),
(60, 'Criticism does not bother me', 1, 8),
(61, 'I often do the unexpected', 2, 3),
(62, 'I take each day as it 3es', 2, 7),
(63, 'I won\'t back down on issues', 2, 2),
(64, 'In difficult periods I find something good that help me thrive', 1, 8),
(65, 'I regularly seek out the facts when making decisions', 1, 1),
(66, 'I am not very calm even in tense situations', 2, 8),
(67, 'I believe rules should be chall5ed', 2, 3),
(68, 'I often get my own way', 1, 9),
(69, 'I would do anything to win', 1, 4),
(70, 'I often doubt my judgements and decisions', 2, 8),
(71, 'I make sure others know what they need to do', 1, 11),
(72, 'I like being around others', 1, 5),
(73, 'I tend to deal with the problems/issues in front of me than think ahead', 2, 7),
(74, 'It\'s important to chall5e the status quo', 2, 3),
(75, 'I want to win', 1, 4),
(76, 'I like to make sure that I and those I work with have a plan', 1, 7),
(77, 'I have never said anything nasty about anyone', 1, 6),
(78, 'I don\'t make sure others know what they need to do', 2, 11),
(79, 'Understanding the strategic consequences of my decisions are critical', 1, 7),
(80, 'I like to solve 3plex problems', 1, 10),
(81, 'Am not 3fortable telling someone they\'ve made a mistake', 2, 11),
(82, 'I like to check my emails regularly even if I am on holidays', 1, 12),
(83, 'I often feel crushed by setbacks', 2, 8),
(84, 'Once I make up my mind I follow through with my decision', 1, 4),
(85, 'I strongly believe in my abilities', 1, 8),
(86, 'I much prefer to look at the overall picture', 1, 10),
(87, 'I prefer spending time away from people', 2, 5),
(88, 'I take my laptop or tablet with me wherever I go', 1, 12),
(89, 'Am 3fortable telling someone they\'ve made a mistake', 1, 11),
(90, 'I hardly ever put the \'pieces\' together to form a coherent picture', 2, 10),
(91, 'I try to get consensus', 1, 2),
(92, 'I see deadlines as flexible', 2, 13),
(93, 'I prefer to find other ways to do things', 2, 3),
(94, 'I prefer to take a long-term perspective', 1, 7),
(95, 'I find it easy to keep the conversation going', 1, 5),
(96, 'I would describe myself as organised', 1, 13),
(97, 'I don\'t like being the one in charge', 2, 11),
(98, 'I prefer to make the final decision', 2, 2),
(99, 'I prefer the \'the tried and true\'', 1, 3),
(100, 'I am a private person', 2, 5),
(101, 'I very much like helping others', 1, 2),
(102, 'I like selling', 1, 9),
(103, 'I take people\'s feelings into account', 1, 2),
(104, 'I don\'t go out of my way to win', 2, 4),
(105, 'It\'s important to keep people in the loop', 1, 2),
(106, 'I like to organise my emails regularly', 1, 12),
(107, 'I am not bothered by small errors', 2, 13),
(108, 'I like making the final decision', 1, 11),
(109, 'I think Social Media should be used more often in business', 1, 12),
(110, 'I don\'t take criticism very well', 2, 10),
(111, 'I tend to change people\'s minds readily', 1, 9),
(112, 'I base my decisions on feelings', 2, 1),
(113, 'It is best to ring someone rather than text them', 2, 12),
(114, 'I prefer to 3promise', 2, 9),
(115, 'Planning is fundamental to my approach', 1, 7),
(116, 'I base my decisions on the facts', 1, 1),
(117, 'I am often bothered by criticisms', 2, 8),
(118, 'I don\'t like making the final decision', 2, 11),
(119, 'I make up my mind but don\'t go through with the decision', 2, 4),
(120, 'I sell my successes', 1, 9),
(121, 'I believe that failing to plan is planning to fail', 1, 7),
(122, 'I wouldn\'t be described as ambitious', 2, 4),
(123, 'I never regret my actions', 1, 6),
(124, 'I like being the centre of attention', 1, 5),
(125, 'It is best just to do things rather than think about them', 2, 10),
(126, 'I prefer to let others lead the way', 2, 11),
(127, 'It\'s important not to make rash decisions', 1, 3),
(128, 'Winning is not always important', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `focus_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `complete_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-12-07 08:19:51', '2020-12-07 08:19:51'),
(3, 'Manager', 'web', '2020-12-08 06:47:27', '2020-12-08 06:47:27'),
(4, 'Customer', 'web', '2020-12-08 06:47:40', '2020-12-08 06:47:40'),
(5, 'Blogger', 'web', '2021-01-18 07:30:00', '2021-01-18 07:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(22, 1),
(23, 1),
(23, 3),
(23, 5),
(24, 1),
(24, 3),
(24, 5),
(25, 1),
(25, 3),
(25, 5),
(26, 1),
(26, 3),
(26, 5),
(27, 1),
(27, 3),
(27, 5),
(38, 1),
(41, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scales`
--

CREATE TABLE `scales` (
  `scale_id` int(11) NOT NULL,
  `scale_name` varchar(255) NOT NULL,
  `scale_description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scales`
--

INSERT INTO `scales` (`scale_id`, `scale_name`, `scale_description`, `created_at`) VALUES
(1, 'ANL', '', '2022-09-01 10:52:44'),
(2, 'COL', '', '2022-09-01 10:54:28'),
(3, 'COM', '', '2022-09-01 10:54:29'),
(4, 'DRI', '', '2022-09-01 10:54:29'),
(5, 'ENG', '', '2022-09-01 10:54:29'),
(6, 'EXG', '', '2022-09-01 10:54:29'),
(7, 'PLN', '', '2022-09-01 10:54:29'),
(8, 'RES', '', '2022-09-01 10:54:29'),
(9, 'SAP', '', '2022-09-01 10:54:29'),
(10, 'STT', '', '2022-09-01 10:54:29'),
(11, 'TCH', '', '2022-09-01 10:54:29'),
(12, 'TEC', '', '2022-09-01 10:54:29'),
(13, 'TOR', '', '2022-09-01 10:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('C9bLLdpQv2fCJmuS4KcJp9Az0yBsa0HRUz1HO5pD', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWlGVHoza1RlSHVRd0Jqd21lbURqMU9qVUFvUXprOW9uMm9VaWR2eSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3J0Zm9saW8iO319', 1621170592),
('QQsNFfqZlBWbr3gGJ0psb29SZ0UABiflK9nJ75TI', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS0J4SEhhM1dXeHJoMUQ1UmVWaEk2dHNQT2hEYktkR0lxTmtwbmVjYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrZW5kL3VzZXJzL2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1621080979),
('qSliSqu0r8fAqsPE1f4xRG7gJpdkd0mYDBZ2XVwQ', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRWZ6dHphOGNJbE5YQTVLcnIwMnpWOXVDbVNQNFpVeVFzYlRzZFJDaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrZW5kL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fX0=', 1620454912),
('VBYZHAUM7LCLcjFW4ouBsWmAnwcsAekNembI2iOs', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzJ6R2tWRWo1aXFsazBvcXVWN3B2bm0xRG9VTmpFSlRkSGt2bVVGUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrZW5kL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1620916800);

-- --------------------------------------------------------

--
-- Table structure for table `sten`
--

CREATE TABLE `sten` (
  `sten_id` int(11) NOT NULL,
  `scale_id` int(11) NOT NULL,
  `sten_number` int(11) NOT NULL COMMENT 'Find with Row Total',
  `sten_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sten`
--

INSERT INTO `sten` (`sten_id`, `scale_id`, `sten_number`, `sten_value`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 1, 12, 1),
(13, 1, 13, 1),
(14, 1, 14, 1),
(15, 1, 15, 1),
(16, 1, 16, 1),
(17, 1, 17, 1),
(18, 1, 18, 1),
(19, 1, 19, 1),
(20, 1, 20, 1),
(21, 1, 21, 1),
(22, 1, 22, 1),
(23, 1, 23, 1),
(24, 1, 24, 1),
(25, 1, 25, 1),
(26, 1, 26, 1),
(27, 1, 27, 1),
(28, 1, 28, 1),
(29, 1, 29, 2),
(30, 1, 30, 3),
(31, 1, 31, 3),
(32, 1, 32, 4),
(33, 1, 33, 4),
(34, 1, 34, 5),
(35, 1, 35, 6),
(36, 1, 36, 6),
(37, 1, 37, 7),
(38, 1, 38, 7),
(39, 1, 39, 8),
(40, 1, 40, 8),
(41, 1, 41, 9),
(42, 1, 42, 10),
(43, 1, 43, 10),
(44, 1, 44, 10),
(45, 1, 45, 10),
(46, 1, 46, 10),
(47, 1, 47, 10),
(48, 1, 48, 10),
(49, 1, 49, 10),
(50, 1, 50, 10),
(51, 1, 51, 10),
(52, 1, 52, 10),
(53, 1, 53, 10),
(54, 1, 54, 10),
(55, 1, 55, 10),
(56, 1, 56, 10),
(57, 1, 57, 10),
(58, 1, 58, 10),
(59, 1, 59, 10),
(60, 2, 1, 1),
(61, 2, 2, 1),
(62, 2, 3, 1),
(63, 2, 4, 1),
(64, 2, 5, 1),
(65, 2, 6, 1),
(66, 2, 7, 1),
(67, 2, 8, 1),
(68, 2, 9, 1),
(69, 2, 10, 1),
(70, 2, 11, 1),
(71, 2, 12, 1),
(72, 2, 13, 1),
(73, 2, 14, 1),
(74, 2, 15, 1),
(75, 2, 16, 1),
(76, 2, 17, 1),
(77, 2, 18, 1),
(78, 2, 19, 1),
(79, 2, 20, 1),
(80, 2, 21, 1),
(81, 2, 22, 1),
(82, 2, 23, 1),
(83, 2, 24, 1),
(84, 2, 25, 1),
(85, 2, 26, 1),
(86, 2, 27, 1),
(87, 2, 28, 1),
(88, 2, 29, 1),
(89, 2, 30, 1),
(90, 2, 31, 2),
(91, 2, 32, 3),
(92, 2, 33, 4),
(93, 2, 34, 4),
(94, 2, 35, 5),
(95, 2, 36, 6),
(96, 2, 37, 7),
(97, 2, 38, 7),
(98, 2, 39, 8),
(99, 2, 40, 8),
(100, 2, 41, 8),
(101, 2, 42, 9),
(102, 2, 43, 10),
(103, 2, 44, 10),
(104, 2, 45, 10),
(105, 2, 46, 10),
(106, 2, 47, 10),
(107, 2, 48, 10),
(108, 2, 49, 10),
(109, 2, 50, 10),
(110, 2, 51, 10),
(111, 2, 52, 10),
(112, 2, 53, 10),
(113, 2, 54, 10),
(114, 2, 55, 10),
(115, 2, 56, 10),
(116, 2, 57, 10),
(117, 2, 58, 10),
(118, 2, 59, 10),
(119, 3, 1, 1),
(120, 3, 2, 1),
(121, 3, 3, 1),
(122, 3, 4, 1),
(123, 3, 5, 1),
(124, 3, 6, 1),
(125, 3, 7, 1),
(126, 3, 8, 1),
(127, 3, 9, 1),
(128, 3, 10, 1),
(129, 3, 11, 1),
(130, 3, 12, 1),
(131, 3, 13, 1),
(132, 3, 14, 1),
(133, 3, 15, 1),
(134, 3, 16, 1),
(135, 3, 17, 1),
(136, 3, 18, 1),
(137, 3, 19, 1),
(138, 3, 20, 1),
(139, 3, 21, 1),
(140, 3, 22, 1),
(141, 3, 23, 1),
(142, 3, 24, 1),
(143, 3, 25, 1),
(144, 3, 26, 1),
(145, 3, 27, 2),
(146, 3, 28, 3),
(147, 3, 29, 3),
(148, 3, 30, 3),
(149, 3, 31, 4),
(150, 3, 32, 4),
(151, 3, 33, 5),
(152, 3, 34, 6),
(153, 3, 35, 6),
(154, 3, 36, 7),
(155, 3, 37, 7),
(156, 3, 38, 8),
(157, 3, 39, 9),
(158, 3, 40, 9),
(159, 3, 41, 10),
(160, 3, 42, 10),
(161, 3, 43, 10),
(162, 3, 44, 10),
(163, 3, 45, 10),
(164, 3, 46, 10),
(165, 3, 47, 10),
(166, 3, 48, 10),
(167, 3, 49, 10),
(168, 3, 50, 10),
(169, 3, 51, 10),
(170, 3, 52, 10),
(171, 3, 53, 10),
(172, 3, 54, 10),
(173, 3, 55, 10),
(174, 3, 56, 10),
(175, 3, 57, 10),
(176, 3, 58, 10),
(177, 3, 59, 10),
(178, 4, 1, 1),
(179, 4, 2, 1),
(180, 4, 3, 1),
(181, 4, 4, 1),
(182, 4, 5, 1),
(183, 4, 6, 1),
(184, 4, 7, 1),
(185, 4, 8, 1),
(186, 4, 9, 1),
(187, 4, 10, 1),
(188, 4, 11, 1),
(189, 4, 12, 1),
(190, 4, 13, 1),
(191, 4, 14, 1),
(192, 4, 15, 1),
(193, 4, 16, 1),
(194, 4, 17, 1),
(195, 4, 18, 1),
(196, 4, 19, 1),
(197, 4, 20, 1),
(198, 4, 21, 1),
(199, 4, 22, 1),
(200, 4, 23, 1),
(201, 4, 24, 1),
(202, 4, 25, 1),
(203, 4, 26, 1),
(204, 4, 27, 2),
(205, 4, 28, 2),
(206, 4, 29, 3),
(207, 4, 30, 3),
(208, 4, 31, 4),
(209, 4, 32, 4),
(210, 4, 33, 4),
(211, 4, 34, 5),
(212, 4, 35, 6),
(213, 4, 36, 6),
(214, 4, 37, 7),
(215, 4, 38, 7),
(216, 4, 39, 7),
(217, 4, 40, 8),
(218, 4, 41, 8),
(219, 4, 42, 9),
(220, 4, 43, 10),
(221, 4, 44, 10),
(222, 4, 45, 10),
(223, 4, 46, 10),
(224, 4, 47, 10),
(225, 4, 48, 10),
(226, 4, 49, 10),
(227, 4, 50, 10),
(228, 4, 51, 10),
(229, 4, 52, 10),
(230, 4, 53, 10),
(231, 4, 54, 10),
(232, 4, 55, 10),
(233, 4, 56, 10),
(234, 4, 57, 10),
(235, 4, 58, 10),
(236, 4, 59, 10),
(237, 5, 1, 1),
(238, 5, 2, 1),
(239, 5, 3, 1),
(240, 5, 4, 1),
(241, 5, 5, 1),
(242, 5, 6, 1),
(243, 5, 7, 1),
(244, 5, 8, 1),
(245, 5, 9, 1),
(246, 5, 10, 1),
(247, 5, 11, 1),
(248, 5, 12, 1),
(249, 5, 13, 1),
(250, 5, 14, 1),
(251, 5, 15, 1),
(252, 5, 16, 1),
(253, 5, 17, 1),
(254, 5, 18, 1),
(255, 5, 19, 1),
(256, 5, 20, 1),
(257, 5, 21, 1),
(258, 5, 22, 1),
(259, 5, 23, 1),
(260, 5, 24, 1),
(261, 5, 25, 2),
(262, 5, 26, 2),
(263, 5, 27, 2),
(264, 5, 28, 3),
(265, 5, 29, 3),
(266, 5, 30, 3),
(267, 5, 31, 4),
(268, 5, 32, 4),
(269, 5, 33, 5),
(270, 5, 34, 5),
(271, 5, 35, 6),
(272, 5, 36, 6),
(273, 5, 37, 7),
(274, 5, 38, 7),
(275, 5, 39, 8),
(276, 5, 40, 8),
(277, 5, 41, 9),
(278, 5, 42, 10),
(279, 5, 43, 10),
(280, 5, 44, 10),
(281, 5, 45, 10),
(282, 5, 46, 10),
(283, 5, 47, 10),
(284, 5, 48, 10),
(285, 5, 49, 10),
(286, 5, 50, 10),
(287, 5, 51, 10),
(288, 5, 52, 10),
(289, 5, 53, 10),
(290, 5, 54, 10),
(291, 5, 55, 10),
(292, 5, 56, 10),
(293, 5, 57, 10),
(294, 5, 58, 10),
(295, 5, 59, 10),
(296, 6, 1, 1),
(297, 6, 2, 1),
(298, 6, 3, 1),
(299, 6, 4, 1),
(300, 6, 5, 1),
(301, 6, 6, 1),
(302, 6, 7, 1),
(303, 6, 8, 1),
(304, 6, 9, 1),
(305, 6, 10, 2),
(306, 6, 11, 3),
(307, 6, 12, 3),
(308, 6, 13, 4),
(309, 6, 14, 4),
(310, 6, 15, 5),
(311, 6, 16, 5),
(312, 6, 17, 6),
(313, 6, 18, 6),
(314, 6, 19, 6),
(315, 6, 20, 7),
(316, 6, 21, 7),
(317, 6, 22, 8),
(318, 6, 23, 9),
(319, 6, 24, 10),
(320, 6, 25, 10),
(321, 6, 26, 10),
(322, 6, 27, 10),
(323, 6, 28, 10),
(324, 6, 29, 10),
(325, 6, 30, 10),
(326, 6, 31, 10),
(327, 6, 32, 10),
(328, 6, 33, 10),
(329, 6, 34, 10),
(330, 6, 35, 10),
(331, 6, 36, 10),
(332, 6, 37, 10),
(333, 6, 38, 10),
(334, 6, 39, 10),
(335, 6, 40, 10),
(336, 6, 41, 10),
(337, 6, 42, 10),
(338, 6, 43, 10),
(339, 6, 44, 10),
(340, 6, 45, 10),
(341, 6, 46, 10),
(342, 6, 47, 10),
(343, 6, 48, 10),
(344, 6, 49, 10),
(345, 6, 50, 10),
(346, 6, 51, 10),
(347, 6, 52, 10),
(348, 6, 53, 10),
(349, 6, 54, 10),
(350, 6, 55, 10),
(351, 6, 56, 10),
(352, 6, 57, 10),
(353, 6, 58, 10),
(354, 6, 59, 10),
(355, 7, 1, 1),
(356, 7, 2, 1),
(357, 7, 3, 1),
(358, 7, 4, 1),
(359, 7, 5, 1),
(360, 7, 6, 1),
(361, 7, 7, 1),
(362, 7, 8, 1),
(363, 7, 9, 1),
(364, 7, 10, 1),
(365, 7, 11, 1),
(366, 7, 12, 1),
(367, 7, 13, 1),
(368, 7, 14, 1),
(369, 7, 15, 1),
(370, 7, 16, 1),
(371, 7, 17, 1),
(372, 7, 18, 1),
(373, 7, 19, 1),
(374, 7, 20, 1),
(375, 7, 21, 1),
(376, 7, 22, 1),
(377, 7, 23, 1),
(378, 7, 24, 1),
(379, 7, 25, 1),
(380, 7, 26, 1),
(381, 7, 27, 1),
(382, 7, 28, 1),
(383, 7, 29, 1),
(384, 7, 30, 1),
(385, 7, 31, 1),
(386, 7, 32, 1),
(387, 7, 33, 1),
(388, 7, 34, 1),
(389, 7, 35, 1),
(390, 7, 36, 1),
(391, 7, 37, 1),
(392, 7, 38, 1),
(393, 7, 39, 2),
(394, 7, 40, 2),
(395, 7, 41, 3),
(396, 7, 42, 3),
(397, 7, 43, 4),
(398, 7, 44, 4),
(399, 7, 45, 5),
(400, 7, 46, 6),
(401, 7, 47, 6),
(402, 7, 48, 7),
(403, 7, 49, 7),
(404, 7, 50, 7),
(405, 7, 51, 8),
(406, 7, 52, 8),
(407, 7, 53, 9),
(408, 7, 54, 9),
(409, 7, 55, 9),
(410, 7, 56, 9),
(411, 7, 57, 10),
(412, 7, 58, 10),
(413, 7, 59, 10),
(414, 8, 1, 1),
(415, 8, 2, 1),
(416, 8, 3, 1),
(417, 8, 4, 1),
(418, 8, 5, 1),
(419, 8, 6, 1),
(420, 8, 7, 1),
(421, 8, 8, 1),
(422, 8, 9, 1),
(423, 8, 10, 1),
(424, 8, 11, 1),
(425, 8, 12, 1),
(426, 8, 13, 1),
(427, 8, 14, 1),
(428, 8, 15, 1),
(429, 8, 16, 1),
(430, 8, 17, 1),
(431, 8, 18, 1),
(432, 8, 19, 1),
(433, 8, 20, 1),
(434, 8, 21, 1),
(435, 8, 22, 1),
(436, 8, 23, 1),
(437, 8, 24, 1),
(438, 8, 25, 1),
(439, 8, 26, 1),
(440, 8, 27, 1),
(441, 8, 28, 1),
(442, 8, 29, 1),
(443, 8, 30, 1),
(444, 8, 31, 1),
(445, 8, 32, 1),
(446, 8, 33, 1),
(447, 8, 34, 1),
(448, 8, 35, 1),
(449, 8, 36, 1),
(450, 8, 37, 2),
(451, 8, 38, 2),
(452, 8, 39, 2),
(453, 8, 40, 2),
(454, 8, 41, 2),
(455, 8, 42, 4),
(456, 8, 43, 4),
(457, 8, 44, 4),
(458, 8, 45, 4),
(459, 8, 46, 5),
(460, 8, 47, 5),
(461, 8, 48, 6),
(462, 8, 49, 6),
(463, 8, 50, 7),
(464, 8, 51, 8),
(465, 8, 52, 8),
(466, 8, 53, 8),
(467, 8, 54, 8),
(468, 8, 55, 9),
(469, 8, 56, 9),
(470, 8, 57, 9),
(471, 8, 58, 9),
(472, 8, 59, 10),
(473, 9, 1, 1),
(474, 9, 2, 1),
(475, 9, 3, 1),
(476, 9, 4, 1),
(477, 9, 5, 1),
(478, 9, 6, 1),
(479, 9, 7, 1),
(480, 9, 8, 1),
(481, 9, 9, 1),
(482, 9, 10, 1),
(483, 9, 11, 1),
(484, 9, 12, 1),
(485, 9, 13, 1),
(486, 9, 14, 1),
(487, 9, 15, 1),
(488, 9, 16, 1),
(489, 9, 17, 1),
(490, 9, 18, 1),
(491, 9, 19, 1),
(492, 9, 20, 1),
(493, 9, 21, 1),
(494, 9, 22, 1),
(495, 9, 23, 1),
(496, 9, 24, 1),
(497, 9, 25, 1),
(498, 9, 26, 1),
(499, 9, 27, 1),
(500, 9, 28, 2),
(501, 9, 29, 2),
(502, 9, 30, 2),
(503, 9, 31, 3),
(504, 9, 32, 3),
(505, 9, 33, 3),
(506, 9, 34, 4),
(507, 9, 35, 4),
(508, 9, 36, 5),
(509, 9, 37, 5),
(510, 9, 38, 6),
(511, 9, 39, 7),
(512, 9, 40, 7),
(513, 9, 41, 8),
(514, 9, 42, 8),
(515, 9, 43, 9),
(516, 9, 44, 9),
(517, 9, 45, 10),
(518, 9, 46, 10),
(519, 9, 47, 10),
(520, 9, 48, 10),
(521, 9, 49, 10),
(522, 9, 50, 10),
(523, 9, 51, 10),
(524, 9, 52, 10),
(525, 9, 53, 10),
(526, 9, 54, 10),
(527, 9, 55, 10),
(528, 9, 56, 10),
(529, 9, 57, 10),
(530, 9, 58, 10),
(531, 9, 59, 10),
(532, 10, 1, 1),
(533, 10, 2, 1),
(534, 10, 3, 1),
(535, 10, 4, 1),
(536, 10, 5, 1),
(537, 10, 6, 1),
(538, 10, 7, 1),
(539, 10, 8, 1),
(540, 10, 9, 1),
(541, 10, 10, 1),
(542, 10, 11, 1),
(543, 10, 12, 1),
(544, 10, 13, 1),
(545, 10, 14, 1),
(546, 10, 15, 1),
(547, 10, 16, 1),
(548, 10, 17, 1),
(549, 10, 18, 1),
(550, 10, 19, 1),
(551, 10, 20, 1),
(552, 10, 21, 1),
(553, 10, 22, 1),
(554, 10, 23, 1),
(555, 10, 24, 1),
(556, 10, 25, 1),
(557, 10, 26, 1),
(558, 10, 27, 1),
(559, 10, 28, 1),
(560, 10, 29, 2),
(561, 10, 30, 2),
(562, 10, 31, 2),
(563, 10, 32, 2),
(564, 10, 33, 3),
(565, 10, 34, 4),
(566, 10, 35, 4),
(567, 10, 36, 5),
(568, 10, 37, 6),
(569, 10, 38, 6),
(570, 10, 39, 7),
(571, 10, 40, 7),
(572, 10, 41, 8),
(573, 10, 42, 9),
(574, 10, 43, 9),
(575, 10, 44, 10),
(576, 10, 45, 10),
(577, 10, 46, 10),
(578, 10, 47, 10),
(579, 10, 48, 10),
(580, 10, 49, 10),
(581, 10, 50, 10),
(582, 10, 51, 10),
(583, 10, 52, 10),
(584, 10, 53, 10),
(585, 10, 54, 10),
(586, 10, 55, 10),
(587, 10, 56, 10),
(588, 10, 57, 10),
(589, 10, 58, 10),
(590, 10, 59, 10),
(591, 11, 1, 1),
(592, 11, 2, 1),
(593, 11, 3, 1),
(594, 11, 4, 1),
(595, 11, 5, 1),
(596, 11, 6, 1),
(597, 11, 7, 1),
(598, 11, 8, 1),
(599, 11, 9, 1),
(600, 11, 10, 1),
(601, 11, 11, 1),
(602, 11, 12, 1),
(603, 11, 13, 1),
(604, 11, 14, 1),
(605, 11, 15, 1),
(606, 11, 16, 1),
(607, 11, 17, 1),
(608, 11, 18, 1),
(609, 11, 19, 1),
(610, 11, 20, 1),
(611, 11, 21, 1),
(612, 11, 22, 1),
(613, 11, 23, 2),
(614, 11, 24, 2),
(615, 11, 25, 2),
(616, 11, 26, 2),
(617, 11, 27, 2),
(618, 11, 28, 2),
(619, 11, 29, 2),
(620, 11, 30, 3),
(621, 11, 31, 3),
(622, 11, 32, 3),
(623, 11, 33, 3),
(624, 11, 34, 4),
(625, 11, 35, 4),
(626, 11, 36, 5),
(627, 11, 37, 5),
(628, 11, 38, 6),
(629, 11, 39, 6),
(630, 11, 40, 7),
(631, 11, 41, 7),
(632, 11, 42, 8),
(633, 11, 43, 8),
(634, 11, 44, 9),
(635, 11, 45, 9),
(636, 11, 46, 10),
(637, 11, 47, 10),
(638, 11, 48, 10),
(639, 11, 49, 10),
(640, 11, 50, 10),
(641, 11, 51, 10),
(642, 11, 52, 10),
(643, 11, 53, 10),
(644, 11, 54, 10),
(645, 11, 55, 10),
(646, 11, 56, 10),
(647, 11, 57, 10),
(648, 11, 58, 10),
(649, 11, 59, 10),
(650, 12, 1, 1),
(651, 12, 2, 1),
(652, 12, 3, 1),
(653, 12, 4, 1),
(654, 12, 5, 1),
(655, 12, 6, 1),
(656, 12, 7, 1),
(657, 12, 8, 1),
(658, 12, 9, 1),
(659, 12, 10, 1),
(660, 12, 11, 1),
(661, 12, 12, 1),
(662, 12, 13, 1),
(663, 12, 14, 1),
(664, 12, 15, 1),
(665, 12, 16, 1),
(666, 12, 17, 2),
(667, 12, 18, 3),
(668, 12, 19, 3),
(669, 12, 20, 4),
(670, 12, 21, 4),
(671, 12, 22, 5),
(672, 12, 23, 6),
(673, 12, 24, 7),
(674, 12, 25, 7),
(675, 12, 26, 8),
(676, 12, 27, 8),
(677, 12, 28, 9),
(678, 12, 29, 10),
(679, 12, 30, 10),
(680, 12, 31, 10),
(681, 12, 32, 10),
(682, 12, 33, 10),
(683, 12, 34, 10),
(684, 12, 35, 10),
(685, 12, 36, 10),
(686, 12, 37, 10),
(687, 12, 38, 10),
(688, 12, 39, 10),
(689, 12, 40, 10),
(690, 12, 41, 10),
(691, 12, 42, 10),
(692, 12, 43, 10),
(693, 12, 44, 10),
(694, 12, 45, 10),
(695, 12, 46, 10),
(696, 12, 47, 10),
(697, 12, 48, 10),
(698, 12, 49, 10),
(699, 12, 50, 10),
(700, 12, 51, 10),
(701, 12, 52, 10),
(702, 12, 53, 10),
(703, 12, 54, 10),
(704, 12, 55, 10),
(705, 12, 56, 10),
(706, 12, 57, 10),
(707, 12, 58, 10),
(708, 12, 59, 10),
(709, 13, 1, 1),
(710, 13, 2, 1),
(711, 13, 3, 1),
(712, 13, 4, 1),
(713, 13, 5, 1),
(714, 13, 6, 1),
(715, 13, 7, 1),
(716, 13, 8, 1),
(717, 13, 9, 1),
(718, 13, 10, 1),
(719, 13, 11, 1),
(720, 13, 12, 1),
(721, 13, 13, 1),
(722, 13, 14, 1),
(723, 13, 15, 1),
(724, 13, 16, 1),
(725, 13, 17, 1),
(726, 13, 18, 1),
(727, 13, 19, 1),
(728, 13, 20, 1),
(729, 13, 21, 1),
(730, 13, 22, 1),
(731, 13, 23, 1),
(732, 13, 24, 1),
(733, 13, 25, 1),
(734, 13, 26, 1),
(735, 13, 27, 1),
(736, 13, 28, 1),
(737, 13, 29, 1),
(738, 13, 30, 1),
(739, 13, 31, 1),
(740, 13, 32, 1),
(741, 13, 33, 1),
(742, 13, 34, 1),
(743, 13, 35, 1),
(744, 13, 36, 1),
(745, 13, 37, 1),
(746, 13, 38, 1),
(747, 13, 39, 1),
(748, 13, 40, 2),
(749, 13, 41, 2),
(750, 13, 42, 2),
(751, 13, 43, 3),
(752, 13, 44, 3),
(753, 13, 45, 4),
(754, 13, 46, 5),
(755, 13, 47, 5),
(756, 13, 48, 5),
(757, 13, 49, 6),
(758, 13, 50, 6),
(759, 13, 51, 7),
(760, 13, 52, 7),
(761, 13, 53, 8),
(762, 13, 54, 8),
(763, 13, 55, 9),
(764, 13, 56, 9),
(765, 13, 57, 10),
(766, 13, 58, 10),
(767, 13, 59, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sten_data`
--

CREATE TABLE `sten_data` (
  `sten_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `scale_id` int(11) NOT NULL,
  `focus_id` int(11) NOT NULL,
  `sten_value` int(11) NOT NULL COMMENT 'Final Sten Values'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1 => Active\r\n2 => Inactive\r\n3 => Deleted\r\n4 => Blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `photo`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', '9876543210', '1614858500.png', '2020-12-07 08:19:51', '$2y$10$w1Tr/p7bXWoYVLRPsRCIIeyIo1Gt.exe.sZiQPCazsRLGq7VyhUHK', 'eF402tEOXQTeBru5ZtiKSKIwyuRNHdPr5W68CZVahtyGNws5u0QxHsexKnUX', 1, '2020-12-07 08:19:51', '2021-03-04 06:18:20'),
(2, 'Nannie', 'Renner', 'hstark@example.net', NULL, NULL, '2020-12-07 08:20:39', '$2y$10$ykfmoegT0G5NhrY6bzxRheJL3l4MNpgVhuCqm/KQ.6ZfpMhSbUoSe', 'L5pxbUf9ml', NULL, '2020-12-07 08:20:39', '2020-12-07 08:20:39'),
(3, 'Elissa', 'Hills', 'emily.mann@example.org', NULL, NULL, '2020-12-07 08:20:39', '$2y$10$0IYlO5mxtPTgz1XvJP7IXOEaWLySP2M/4E7378q5M1xyb8PtjfDa2', 'P3GPTCYM4j', NULL, '2020-12-07 08:20:39', '2020-12-07 08:20:39'),
(4, 'Maeve', 'Wilderman', 'hlittle@example.net', NULL, NULL, '2020-12-07 08:20:39', '$2y$10$Or36jw4b1cJX2NdZQk2d2OLf7z66Jg1SHR5vtkZmgRAF/T6Q/dtC.', 'HcKb8C2zdp', NULL, '2020-12-07 08:20:40', '2020-12-07 08:20:40'),
(5, 'Gilbert', 'Stehr', 'pfeffer.unique@example.org', NULL, NULL, '2020-12-07 08:20:39', '$2y$10$/gX2wAjYj/haQT57yqNllOuWwHlEtQnUefVdfPdC460eEGvfi/qqS', 'iiLM9GqQl0', NULL, '2020-12-07 08:20:40', '2020-12-07 08:20:40'),
(6, 'Kassandra', 'Kulas', 'luciano.schiller@example.com', NULL, NULL, '2020-12-07 08:20:39', '$2y$10$fXgvGtaksk5s.hcNuDSNeuiZQiFAufaBbG9j4bMABBrKbN0aIk/vO', '1R4wDxiCY5', NULL, '2020-12-07 08:20:40', '2020-12-07 08:20:40'),
(7, 'Abby', 'Volkman', 'arnaldo.heaney@example.org', NULL, NULL, '2020-12-07 08:20:39', '$2y$10$K6W1grgofvzPFP5VsKBWGekMdrSELNxpT1efMYAyNCHgXelFhW9ca', 'vXykH5MOrX', NULL, '2020-12-07 08:20:40', '2020-12-07 08:20:40'),
(8, 'Tyson', 'VonRueden', 'wcole@example.com', NULL, NULL, '2020-12-07 08:20:39', '$2y$10$tgLlnT8NVlzQF.ANEJli1OkeV.Csby5szGk9LzMZ82MbWGSPkz8AS', 'd7a8GuYVPU', NULL, '2020-12-07 08:20:40', '2020-12-07 08:20:40'),
(9, 'Jayson', 'Schneider', 'vhowe@example.com', NULL, NULL, '2020-12-07 08:20:39', '$2y$10$UZJl6MrI5iNQQB6x/9P2geyI1UzAlCMQzCIzFLNiVzR7gkfehKQli', 'ONiU1Ye76d', NULL, '2020-12-07 08:20:40', '2020-12-07 08:20:40'),
(10, 'Juliana', 'Feil', 'lweimann@example.net', NULL, NULL, '2020-12-07 08:20:39', '$2y$10$kiX/Y4txctWXSzX4GQPO7OalD7rNw9w3TUJtXWogrc/aIXLNf4xFq', 'kYg0HNqPF5', NULL, '2020-12-07 08:20:40', '2020-12-07 08:20:40'),
(11, 'Frederick', 'Graham', 'otho34@example.org', NULL, NULL, '2020-12-07 08:20:39', '$2y$10$l4uoE.mmS9kpdxL6GFTlLuYYWEEvWJlqMSdzCfg070O5FYSycFZt.', 'qvDE3Kc5Wp', NULL, '2020-12-07 08:20:40', '2020-12-07 08:20:40'),
(12, 'Uriah', 'Blanda', 'jaskolski.jazlyn@example.net', NULL, NULL, '2020-12-07 08:20:58', '$2y$10$3qhLDUXqh40DKFtTSd51keRX2pRjR68tufenaiqpXQB.Ej.7HOkrq', 'UdckLSSoVO', NULL, '2020-12-07 08:20:58', '2020-12-07 08:20:58'),
(13, 'Henriette', 'Donnelly', 'heidi25@example.org', NULL, NULL, '2020-12-07 08:20:58', '$2y$10$h1iI9DAsMZugyEutflC9SeUVx8flpoJnh934EGjWGq2vbEmvy517C', '5p8AQm3apk', NULL, '2020-12-07 08:20:58', '2020-12-07 08:20:58'),
(14, 'Larue', 'Osinski', 'demarco81@example.org', NULL, NULL, '2020-12-07 08:20:58', '$2y$10$YZySAnDIYHWtVXwuTewsSeRLFCMDUHF8X7XhCkQ1Nbez8YsHDxqd.', '7MveCtbAiv', NULL, '2020-12-07 08:20:59', '2020-12-07 08:20:59'),
(15, 'Anjali', 'Swaniawski', 'smitham.mikayla@example.com', NULL, NULL, '2020-12-07 08:20:58', '$2y$10$prHIoUQ.viKF.FHaobXVlORqNrPAoLg2axxfOLhGCf59V920qBblO', 'JjqgziIaPU', NULL, '2020-12-07 08:20:59', '2020-12-07 08:20:59'),
(16, 'Shannon', 'Larson', 'wcremin@example.com', NULL, NULL, '2020-12-07 08:20:58', '$2y$10$EYDzwIvZS03zwrEmFS.EvuogEObV5A3vOXMZzNwrfFotGiEWHzay2', '02zEj4T3bC', NULL, '2020-12-07 08:20:59', '2020-12-07 08:20:59'),
(17, 'Sydnee', 'Flatley', 'fstreich@example.net', NULL, NULL, '2020-12-07 08:20:58', '$2y$10$XiN/EP9HONvMNpSd6D9VWusXhpV4UxSvIgwP2zl97u.bHNblGJBYS', '0cflSkrucH', NULL, '2020-12-07 08:20:59', '2020-12-07 08:20:59'),
(18, 'Benjamin', 'Johnston', 'tad.predovic@example.com', NULL, NULL, '2020-12-07 08:20:58', '$2y$10$AYNKF0EK0HV3zi9aPIrqyu5Pg.SDnEVMopnDZikvKe0dOxGJe0fiC', 'OJaWP8A9lA', NULL, '2020-12-07 08:20:59', '2020-12-07 08:20:59'),
(19, 'Ethelyn', 'Reinger', 'bertha.kozey@example.com', NULL, NULL, '2020-12-07 08:20:58', '$2y$10$u8HZiWzc1p2iXmJi2C81T.6cCW.mI7praidNEojEU71a3tDeMV4n6', 'nMlbZtetCY', NULL, '2020-12-07 08:20:59', '2020-12-07 08:20:59'),
(20, 'Adrianna', 'Predovic', 'cooper65@example.net', NULL, NULL, '2020-12-07 08:20:58', '$2y$10$v3gYtxzE0jjY9mCuCIH6GewHkA1cHF27dOhfDgAPiD2rCQS01TLw6', '87i5NBzzJp', NULL, '2020-12-07 08:20:59', '2020-12-07 08:20:59'),
(21, 'Clarissa', 'Hand', 'adouglas@example.com', NULL, NULL, '2020-12-07 08:20:58', '$2y$10$lFr7ZCjd03aa3O.EDzUeXeerGtW.2tB8xXHCRYc5GeKdfj8DVlL8S', 'NstaSZ5S7x', NULL, '2020-12-07 08:20:59', '2020-12-07 08:20:59'),
(22, 'Annette', 'Gerhold', 'ffeil@example.com', NULL, NULL, '2020-12-07 08:21:00', '$2y$10$aUhKoTvNZ4Gz9Fgl.Wvx3.23hJJ/wyblcYnJlqqFQ3.aAQ/DGLigm', 'KM2OHsfb7g', NULL, '2020-12-07 08:21:01', '2020-12-07 08:21:01'),
(23, 'Blanca', 'Ferry', 'evangeline.ortiz@example.org', NULL, NULL, '2020-12-07 08:21:00', '$2y$10$dB76IF8EO05u04IB3xjtOeRQa5uV8VQwqEKxtdDmZ9JJuD8oT0zdC', 'qKZuy2ZqHb', NULL, '2020-12-07 08:21:01', '2020-12-07 08:21:01'),
(24, 'Genevieve', 'Nicolas', 'pbraun@example.net', NULL, NULL, '2020-12-07 08:21:00', '$2y$10$vDDoeQKPLjc8VmELAzDUeu0VRut7JjT33XmOQw7GdqYm2DCFBcUJy', 'JXCzwktMPX', NULL, '2020-12-07 08:21:01', '2020-12-07 08:21:01'),
(25, 'Consuelo', 'Jakubowski', 'boyd.aufderhar@example.com', NULL, NULL, '2020-12-07 08:21:00', '$2y$10$UqCk5MtLRr5ap9bXinsqnOTcNyrothFJryKdjsuM.FK6MCXg00AI2', 'T3PqN4Obiw', NULL, '2020-12-07 08:21:01', '2020-12-07 08:21:01'),
(26, 'Brown', 'Mante', 'tanya84@example.net', NULL, NULL, '2020-12-07 08:21:00', '$2y$10$vUqxeIi3wv49sClMXN7KIu.E6iStdLYTt9edqPZwqYxEHCEyV3eXu', 'J0KOfVIow7', NULL, '2020-12-07 08:21:01', '2020-12-07 08:21:01'),
(27, 'Alex', 'Jacobi', 'moore.orville@example.com', NULL, NULL, '2020-12-07 08:21:01', '$2y$10$YleYXJzukBOK1a6/Ill5te7F2YaAMgkqloY7qWKWxMN3yzdzLG48C', 'L08PSzNwyH', NULL, '2020-12-07 08:21:01', '2020-12-07 08:21:01'),
(28, 'Danyka', 'Beier', 'olaf.bauch@example.net', NULL, NULL, '2020-12-07 08:21:01', '$2y$10$sBRVL/h6V3fTCWNRKsMVvur3xcQanjY6Lmy93e1Yxat5sRygHdVdm', 'tj0JlLp3Gv', NULL, '2020-12-07 08:21:01', '2020-12-07 08:21:01'),
(29, 'Jean', 'Nienow', 'wwyman@example.org', NULL, NULL, '2020-12-07 08:21:01', '$2y$10$VG1og9bzh5RovOZRQOd/bOZRXg3fVBLx7a1BRiZTE6xu89MrZdGNe', 'WWo95vHsA7', NULL, '2020-12-07 08:21:01', '2020-12-07 08:21:01'),
(30, 'Lorna', 'Dickens', 'cleuschke@example.com', NULL, NULL, '2020-12-07 08:21:01', '$2y$10$BtpCf228Ctqw/vqigJhJSu4CUlESgQREn1Dyv/f9sWoLpj/2HCjzC', 'kXcQfTRxj4', NULL, '2020-12-07 08:21:01', '2020-12-07 08:21:01'),
(31, 'Quinten', 'Pagac', 'bradly96@example.net', NULL, NULL, '2020-12-07 08:21:01', '$2y$10$StxpHAs0QzGgW48sncsdAeSazYgme0UoZJ89eD39HGAIYv6FGUura', 'TO35WdGjzr', NULL, '2020-12-07 08:21:01', '2020-12-07 08:21:01'),
(32, 'Jacinthe', 'Stoltenberg', 'dahlia02@example.com', NULL, NULL, '2020-12-07 08:21:02', '$2y$10$5ApAI8nuoM9ahMSpfeBHxuuayMiU7pg7AKG8CysMimzme4zEYc5t6', 'rQjRe3DAb9', NULL, '2020-12-07 08:21:03', '2020-12-07 08:21:03'),
(33, 'Elnora', 'Douglas', 'rhiannon.erdman@example.com', NULL, NULL, '2020-12-07 08:21:02', '$2y$10$qJJwXRdf3WU1N3yDPvfTuO.Q95yv.sVMAjcOStD4amDE9p259zS7W', 'SqJF2ewwVb', NULL, '2020-12-07 08:21:03', '2020-12-07 08:21:03'),
(34, 'Korbin', 'Cassin', 'wiza.jillian@example.net', NULL, NULL, '2020-12-07 08:21:02', '$2y$10$q50B6r5TXwzdeHxBVOZc.eEO/RN5TBNIx7wTXLPts4brCTvZcN2hG', '0p8KGImNh7', NULL, '2020-12-07 08:21:03', '2020-12-07 08:21:03'),
(35, 'Darwin', 'Robel', 'evonrueden@example.com', NULL, NULL, '2020-12-07 08:21:02', '$2y$10$WrOyDJya6CsCey2DQCI0t.0kuiXHD1bD58TOPH.OfwZ9hUNucJYRm', '2IW1VtFmO1', NULL, '2020-12-07 08:21:03', '2020-12-07 08:21:03'),
(36, 'Justus', 'Casper', 'hayes.christop@example.com', NULL, NULL, '2020-12-07 08:21:02', '$2y$10$fgg/Wd.BCZ6nlyRQSGxm1OWhd.cKr4z0qSkP1nHsIV6eFpiXwDlf2', 'kpd0sQZvVu', NULL, '2020-12-07 08:21:03', '2020-12-07 08:21:03'),
(37, 'Yesenia', 'Corkery', 'royal31@example.com', NULL, NULL, '2020-12-07 08:21:03', '$2y$10$NTRDIlGJO7FTUy6my6xiyeU97RbGJqPWCpfZDcurcUzk4n1v.q.Hm', 'LGmIzBMU79', NULL, '2020-12-07 08:21:03', '2020-12-07 08:21:03'),
(38, 'Retha', 'Romaguera', 'hkuhic@example.org', NULL, NULL, '2020-12-07 08:21:03', '$2y$10$iOM1pfi.rD.aRMTIbqtZBuqwZbNjt8VvnFPK9TKqXdoMUkXvSJ49a', 'Rg2mNR8ESs', NULL, '2020-12-07 08:21:03', '2020-12-07 08:21:03'),
(39, 'Amani', 'Mayert', 'fschulist@example.net', NULL, NULL, '2020-12-07 08:21:03', '$2y$10$9LZK/gDibQs9vKdxroWL..zOnk3dTYjfHA2oUIFWN6pqLg1oiscE2', 'WmjmIAdl1d', NULL, '2020-12-07 08:21:03', '2020-12-07 08:21:03'),
(40, 'Katarina', 'Bahringer', 'katarina17@example.net', NULL, NULL, '2020-12-07 08:21:03', '$2y$10$N7xaR63kwH2hMbEda7y97OLNkNwVAqcdvNOWrLPboEImLbci1O7jq', 'tPDNNIHZdp', NULL, '2020-12-07 08:21:03', '2020-12-07 08:21:03'),
(41, 'Dante', 'Reynolds', 'ztowne@example.net', NULL, NULL, '2020-12-07 08:21:03', '$2y$10$U6ZDHJl9SRAgDC7CPo9i.O2A9MjOTrLErTfgOVdpSDNVj47xHqRw6', 'OqVtV7CqbX', NULL, '2020-12-07 08:21:03', '2020-12-07 08:21:03'),
(42, 'Henry', 'Labadie', 'ashton.ruecker@example.com', NULL, NULL, '2020-12-07 08:21:04', '$2y$10$XaHHSigWj83PyjC3Cb0ZR.Tv.SEJUJMawX/a/0.wKvU8uNIz7l8ta', 'qIxrZRdvj8', NULL, '2020-12-07 08:21:05', '2020-12-07 08:21:05'),
(43, 'Montana', 'Hauck', 'verda95@example.org', NULL, NULL, '2020-12-07 08:21:04', '$2y$10$Ihi1GJ31jwXKTz1uWt.ESuSNMBCJuBJ4MJHVNhsGM3YBXeg9QoFLO', 'mi7t1Jb8cT', NULL, '2020-12-07 08:21:05', '2020-12-07 08:21:05'),
(44, 'Jerry', 'Pouros', 'candace.quitzon@example.org', NULL, NULL, '2020-12-07 08:21:04', '$2y$10$TbSbWnmZT4ckkgz/G7KChuKzvhPed0laMncnBQiEAlbXKOqqv9kQy', 'gUklfMOOFR', NULL, '2020-12-07 08:21:05', '2020-12-07 08:21:05'),
(45, 'Floyd', 'Mann', 'adela.abshire@example.com', NULL, NULL, '2020-12-07 08:21:04', '$2y$10$QhBQan6RlfGrYrFI5R5KHu1WQMXki0DRyH/wr.ww71so8CdvUMkSu', 'gvhu9edm2k', NULL, '2020-12-07 08:21:05', '2020-12-07 08:21:05'),
(46, 'Earl', 'Hauck', 'vhegmann@example.org', NULL, NULL, '2020-12-07 08:21:04', '$2y$10$1Z4MCspPfKaumbNnBDW5meqDzq30Wqo6kOjFo9VDmaFDTESvqCaDe', 'VBo22IeUPM', NULL, '2020-12-07 08:21:05', '2020-12-07 08:21:05'),
(47, 'Chase', 'Turner', 'toy.ian@example.org', NULL, NULL, '2020-12-07 08:21:04', '$2y$10$OGFfY6BK26FklcKLTlFdK.a0hBTFcSdUcL2kow1J80sVkD01Fx89W', '96HjOAndil', NULL, '2020-12-07 08:21:05', '2020-12-07 08:21:05'),
(48, 'Annabelle', 'Carter', 'nona.conroy@example.net', NULL, NULL, '2020-12-07 08:21:05', '$2y$10$RKu4BtohZ0zcIu.oIEvI3uQ6Ix7hgSajr.jBs.j1YDX5G07lP7dsK', 'q9SHhZVWzP', NULL, '2020-12-07 08:21:05', '2020-12-07 08:21:05'),
(49, 'Jada', 'Halvorson', 'brandt72@example.com', NULL, NULL, '2020-12-07 08:21:05', '$2y$10$ZJt2oU6GKMglY5pHqMobnup.serlf1Qd/bhi7wlq9Vysl1btqaRlK', '3kjC6oJdU1', NULL, '2020-12-07 08:21:05', '2020-12-07 08:21:05'),
(50, 'Adan', 'Bashirian', 'bert45@example.net', NULL, NULL, '2020-12-07 08:21:05', '$2y$10$sdukTEepMv7ZhsbqifyZVOjY0yeIypOD7ZmLLCk.VlXHK/mjsGFrO', 'FbFOtY6dwL', NULL, '2020-12-07 08:21:05', '2020-12-07 08:21:05'),
(51, 'Kenyatta', 'Kemmer', 'connelly.brent@example.org', NULL, NULL, '2020-12-07 08:21:05', '$2y$10$6kvxboOgvpFD.5xdqb4MBerVbMm45IK0B7CCeRyu0gdtWgH2QiL1q', 'B0dB3P27hj', NULL, '2020-12-07 08:21:05', '2020-12-07 08:21:05'),
(52, 'Laura', 'Hansen', 'lemke.magnolia@example.org', NULL, NULL, '2020-12-07 08:21:06', '$2y$10$z5vboIE7oa3ZGewtwLshU.AlRhfJ80IIFDqnwiETZuRIWGLRgdELa', '049HV5qSG2', NULL, '2020-12-07 08:21:07', '2020-12-07 08:21:07'),
(53, 'Bert', 'Dickinson', 'etreutel@example.org', NULL, NULL, '2020-12-07 08:21:06', '$2y$10$WiZpGYGTM6Idkv3TMCJKWOP8qeyHXWNOffvM9CB.QyCClo0Qy5KJy', '1k8dKLhFUW', NULL, '2020-12-07 08:21:07', '2020-12-07 08:21:07'),
(54, 'Sage', 'Kub', 'nora48@example.com', NULL, NULL, '2020-12-07 08:21:06', '$2y$10$goxaxsDGe9s9nSmujhy9Ke7KPcrd.VOtr/hiFGs1Kh182s0udUOr6', 'OG5zb4OGQy', NULL, '2020-12-07 08:21:07', '2020-12-07 08:21:07'),
(55, 'Toney', 'Beer', 'uschroeder@example.com', NULL, NULL, '2020-12-07 08:21:06', '$2y$10$9X1B7RJ3m9MNjX1ddKlKvetfAXTq2pG3lsHeNdBP6nF4SgCW4R7h6', 'WblvggBL0t', NULL, '2020-12-07 08:21:07', '2020-12-07 08:21:07'),
(56, 'Hermann', 'Lueilwitz', 'isai.rodriguez@example.net', NULL, NULL, '2020-12-07 08:21:07', '$2y$10$O7UN55.7ecTYAFnJqVG3XeVqdxbAzzuFGZRlVQWM2Sj/86RqL7jly', 'F6BAIvNK2c', NULL, '2020-12-07 08:21:07', '2020-12-07 08:21:07'),
(57, 'Greta', 'Mitchell', 'frederique.hoppe@example.org', NULL, NULL, '2020-12-07 08:21:07', '$2y$10$R9Q/ngFLbdqcTqSgHJ7PwO4qr5bO.JmqXZe6pXSvGrC2mGr2om3SW', 'ycSCbXP11A', NULL, '2020-12-07 08:21:07', '2020-12-07 08:21:07'),
(58, 'Tiana', 'Jaskolski', 'imani.schuster@example.com', NULL, NULL, '2020-12-07 08:21:07', '$2y$10$vaKNf/32Rr3EkyKMYbMJ4.l33tvhLehtZFOWPTJBF.0h2Uc/58Z52', 'NmvtfmPUgv', NULL, '2020-12-07 08:21:07', '2020-12-07 08:21:07'),
(59, 'Hosea', 'Toy', 'iharvey@example.com', NULL, NULL, '2020-12-07 08:21:07', '$2y$10$./0GhJ3CyZGRsCJQKkYVZuU5CeRbz/amiN./pJ5W/.tWd0AkRrst6', 'XALLhAomQf', NULL, '2020-12-07 08:21:07', '2020-12-07 08:21:07'),
(60, 'Bonnie', 'Orn', 'sterling.ferry@example.org', NULL, NULL, '2020-12-07 08:21:07', '$2y$10$3bPBewQgIYGysUQ5nBI3QuJR.9rRI3vZc35Awn/rHNuJAy4JDI.nq', '6wWYzKtaPF', NULL, '2020-12-07 08:21:07', '2020-12-07 08:21:07'),
(61, 'Mike', 'Bechtelar', 'rippin.roberta@example.com', NULL, NULL, '2020-12-07 08:21:07', '$2y$10$X7rltWjTgwHelHHgQBVWpegG5vUfshIHdpR/n9n5vuvE47VRoqjGu', 'nGH0uR1LAF', NULL, '2020-12-07 08:21:07', '2020-12-07 08:21:07'),
(62, 'Jazmyn', 'Donnelly', 'nicola.fay@example.org', NULL, NULL, '2020-12-07 08:21:08', '$2y$10$6v3Vl5vyaesXm/Z65FcUGObLFfpYk9aEL7LXGLq/zxBPxXiKYjH2y', '9gfsL1xGGI', NULL, '2020-12-07 08:21:09', '2020-12-07 08:21:09'),
(63, 'Kayla', 'Jerde', 'emayer@example.net', NULL, NULL, '2020-12-07 08:21:08', '$2y$10$c1EXK0kobzB0XwsQkHAo0etKl4kW9EJOS1wdFSf4msyRcQip1QNGG', 'Bfk9VIAmpO', NULL, '2020-12-07 08:21:09', '2020-12-07 08:21:09'),
(64, 'Imogene', 'Reinger', 'sadie58@example.org', NULL, NULL, '2020-12-07 08:21:08', '$2y$10$/8gDUBGnAsCl/CK9A43PgO0jYUq4SunsWbRCYl//R9zT8qHu5gs36', 'mVqL5ifc7z', NULL, '2020-12-07 08:21:09', '2020-12-07 08:21:09'),
(65, 'Rylan', 'Gerlach', 'kaylin.lubowitz@example.org', NULL, NULL, '2020-12-07 08:21:08', '$2y$10$xAJZ/4Gqpikov9wKuF0dW.kQtJ8CtYxNSjujURRoJ0.sWjuQ6ppUS', 'UkeISC9Q8i', NULL, '2020-12-07 08:21:09', '2020-12-07 08:21:09'),
(66, 'Janice', 'Satterfield', 'iweimann@example.net', NULL, NULL, '2020-12-07 08:21:08', '$2y$10$t5CcFr12I2K3DO/uqAGt7u1OaM.bBV/DOKZmrvqK1Gvbh2lPnuPeG', 'dsbSUFPLVT', NULL, '2020-12-07 08:21:09', '2020-12-07 08:21:09'),
(67, 'Beth', 'Wisozk', 'gayle05@example.com', NULL, NULL, '2020-12-07 08:21:08', '$2y$10$ODvYRgx8iEmMG9gZIvu5Pebckv.Dl1QlAdpfsIacSUbCRDEXeuY0W', '0FYPQDaXGW', NULL, '2020-12-07 08:21:09', '2020-12-07 08:21:09'),
(68, 'Makenna', 'Hintz', 'xlowe@example.com', NULL, NULL, '2020-12-07 08:21:08', '$2y$10$/DO9jtPVAdhJSWsftfLrNexYA43dgIFsfy/nlDQBdRBkuHuJhBkiK', 'BTRdVJ8mIr', NULL, '2020-12-07 08:21:09', '2020-12-07 08:21:09'),
(69, 'Gail', 'Kling', 'ivah84@example.com', NULL, NULL, '2020-12-07 08:21:09', '$2y$10$4aWjqbZLIyHb7PdvRHh3bOiOlSS/GY1ujHF/HISt82/.IriTnNiXe', 'Yx2p4kA3HT', NULL, '2020-12-07 08:21:09', '2020-12-07 08:21:09'),
(70, 'Manley', 'Bauch', 'ova.blanda@example.org', NULL, NULL, '2020-12-07 08:21:09', '$2y$10$MTDATb9HJifp.SRXwE3bru7rpfSTVN.iBwOHmjfC2ZZ.mmaz1iBK2', 'bWNxekZsUO', NULL, '2020-12-07 08:21:09', '2020-12-07 08:21:09'),
(71, 'Mafalda', 'Stark', 'crona.joana@example.net', NULL, NULL, '2020-12-07 08:21:09', '$2y$10$uAG8t95BTP/yDm/jC935k.MO74R/NWP25xA5nvUJOEWK1Q362V1d6', 'yba9fjnoh7', NULL, '2020-12-07 08:21:09', '2020-12-07 08:21:09'),
(72, 'Gia', 'Weissnat', 'ziemann.euna@example.com', NULL, NULL, '2020-12-07 08:21:11', '$2y$10$/jB./E79slolI4N1nmZYI.rhu3iykh01ASFOfNtjmI6oFrsBfc57G', 'cCHU5YWUVG', NULL, '2020-12-07 08:21:11', '2020-12-07 08:21:11'),
(73, 'Claude', 'Weissnat', 'heaven51@example.net', NULL, NULL, '2020-12-07 08:21:11', '$2y$10$.ONdjs/0kl/6Zg3BUwstqOp.MDdKY6Kn70MVlrAhovyp6gFo9u9Bu', '1SsV11N0vR', NULL, '2020-12-07 08:21:11', '2020-12-07 08:21:11'),
(74, 'Katelin', 'Doyle', 'zdaniel@example.net', NULL, NULL, '2020-12-07 08:21:11', '$2y$10$4/oasGcsBDPdVsykV9abL.jHLGiiNXMWOlrNSSXWdoXAQsYkENEYS', 'WrlZBLvhIr', NULL, '2020-12-07 08:21:11', '2020-12-07 08:21:11'),
(75, 'Camila', 'Weissnat', 'lkoch@example.net', NULL, NULL, '2020-12-07 08:21:11', '$2y$10$K3A3Mu55Bgv0n6nRMyFW9u6eETA0mGuUKr/VE3GJ3gLBdcblk9lRK', '3EOdDn66p3', NULL, '2020-12-07 08:21:11', '2020-12-07 08:21:11'),
(76, 'Jerad', 'Lind', 'isaac25@example.net', NULL, NULL, '2020-12-07 08:21:11', '$2y$10$T2m8GW.Ou2V9ixkRzLsR9erHo2e7nxWzYOPIFP9Hg5k3mutolqJFK', 'GveU2PjnjI', NULL, '2020-12-07 08:21:12', '2020-12-07 08:21:12'),
(77, 'Virginie', 'Lang', 'tratke@example.net', NULL, NULL, '2020-12-07 08:21:11', '$2y$10$H1aZ/NyLCZ/VIlaq67DYJ.fp90tjnFVcPx1do9nRKzdeQKByVL54K', 'Ep2VvKXhWx', NULL, '2020-12-07 08:21:12', '2020-12-07 08:21:12'),
(78, 'Charity', 'Kohler', 'zemlak.gladys@example.net', NULL, NULL, '2020-12-07 08:21:11', '$2y$10$2iftjuoWFy6wG27aDiavAuX9hYmOLCcbdDDuu8p.b7lJVL3gT.u9m', 'o8maIx47Lj', NULL, '2020-12-07 08:21:12', '2020-12-07 08:21:12'),
(79, 'Stan', 'Kutch', 'rosalinda14@example.com', NULL, NULL, '2020-12-07 08:21:11', '$2y$10$xF1366BdXeOVoiPVkj7VqO/2r50lYuaJPRblXoR1jkAPPRfTTM.le', 'IhpHvg0OFt', NULL, '2020-12-07 08:21:12', '2020-12-07 08:21:12'),
(80, 'Lessie', 'Nitzsche', 'denesik.roberta@example.com', NULL, NULL, '2020-12-07 08:21:11', '$2y$10$UgX0GTDR5Ame/bSUiSn.H.GT7Ux8zBIjdy0bgHCTLtcTL3R41CLNC', 'bhCfcPtm0q', NULL, '2020-12-07 08:21:12', '2020-12-07 08:21:12'),
(81, 'Randall', 'Schneider', 'wilmer41@example.com', NULL, NULL, '2020-12-07 08:21:11', '$2y$10$kHVyhTQdp7mEk2DtI6/PzuBtOF/Fi5CIpy3dBzfFw4T4SLasICM8.', 'ttY3kCtRok', 2, '2020-12-07 08:21:12', '2021-03-10 07:18:38'),
(82, 'Kareem', 'Turner', 'spencer.bonnie@example.org', NULL, NULL, '2020-12-07 08:21:13', '$2y$10$JkMJ6oxXrIVmQrGaFUa6CeuWS.Z3eYQKB9DQsUDg0EYGulP1VpDRu', 'RegU6D0Bb0', 2, '2020-12-07 08:21:13', '2021-03-10 07:18:38'),
(83, 'Damian', 'Graham', 'myrl.paucek@example.com', NULL, NULL, '2020-12-07 08:21:13', '$2y$10$UxA/NKjosxiklSWSiGcUcOg3hcCXhkXZo7OkJJapMuaxr/L8svmg2', 'oFe6Dw0UHp', NULL, '2020-12-07 08:21:13', '2020-12-07 08:21:13'),
(84, 'Kaia', 'Borer', 'erich.gorczany@example.net', NULL, NULL, '2020-12-07 08:21:13', '$2y$10$1gfLF5R4qKUWCgKjeSi.EuNQNQVeQb0LB5ceyDIJoV91XeucXlbBW', '0PndnE7qYV', NULL, '2020-12-07 08:21:13', '2020-12-07 08:21:13'),
(85, 'Ebba', 'Carroll', 'adella95@example.org', NULL, NULL, '2020-12-07 08:21:13', '$2y$10$gd4bH0Pdfev7Lnl9sv.9Leshd9xl7QRe1ujJxtzY1rYUmNAXAYPHG', '6bN4bc5ZW0', 4, '2020-12-07 08:21:13', '2021-03-10 07:19:39'),
(86, 'Muriel', 'Marquardt', 'lonzo.bahringer@example.net', NULL, NULL, '2020-12-07 08:21:13', '$2y$10$.93jD.Q.cPTA9wYj/pXASOt5/hoknovB6d2PqJTl7E0tHE1W70iKe', 'ON44Oq8G3O', 4, '2020-12-07 08:21:13', '2021-03-10 07:19:39'),
(87, 'Arno', 'Doyle', 'kasey.jakubowski@example.com', NULL, NULL, '2020-12-07 08:21:13', '$2y$10$5Ss1yudM7KMLC27Gt6nwQurOKMX6GgnDClllbgIGujJHMnP5BmFCa', 'Yuify47z0Y', NULL, '2020-12-07 08:21:13', '2020-12-07 08:21:13'),
(88, 'Sophie', 'Williamson', 'aniyah.stehr@example.com', NULL, NULL, '2020-12-07 08:21:13', '$2y$10$juq6ml/F9QIOqf9yy6zK5OD6.xykvJ0Z2iK5SfAdY6oNSxNEqdbwu', 'tr453PmO9J', NULL, '2020-12-07 08:21:13', '2020-12-07 08:21:13'),
(89, 'Marcos', 'Keebler', 'sboyer@example.com', NULL, NULL, '2020-12-07 08:21:13', '$2y$10$OVq7irBi0sR.5j3imAnwFuLpCxKPnRrI4GpAKLoUnNKBGtXrkE2yK', 'I4mNoSizvY', NULL, '2020-12-07 08:21:13', '2020-12-07 08:21:13'),
(90, 'Lavada', 'Mosciski', 'zpfannerstill@example.org', NULL, NULL, '2020-12-07 08:21:13', '$2y$10$RqpM4MVKcEiuDwOrkKePkuTQ13k5TO8eX2y2ioaoKwh9VqHK/mnJq', 'fhPlztx3Pu', 1, '2020-12-07 08:21:13', '2021-03-10 07:59:46'),
(91, 'Kari', 'Johnston', 'glenna05@example.net', NULL, NULL, '2020-12-07 08:21:13', '$2y$10$apdJHe6sqNWqRbzqYtLzhu8HdBmddmAAXNEbnNERRZmLpVE7MhkQ2', '0tTo8AuIWr', 1, '2020-12-07 08:21:14', '2021-03-10 07:59:46'),
(94, 'Jaylen', 'Kirlin', 'esteuber@example.com', NULL, NULL, '2020-12-07 08:21:15', '$2y$10$63.t.V3xI2C.PZcYnjFbS.ZhccuLwtUjYKJBA7Z4cGfubDv5oEZ0u', 'MXag2Wb1Jm', 1, '2020-12-07 08:21:15', '2021-03-10 07:59:46'),
(98, 'Juwan', 'Russel', 'cloyd.little@example.com', NULL, NULL, '2020-12-07 08:21:15', '$2y$10$gYrmT3g.o6TZhSFN7514i.mF1GQXnkOuyuprfU8vb2NbGFzwY56eC', 'W7e9TfjC11', 1, '2020-12-07 08:21:15', '2021-03-10 07:59:46'),
(100, 'Hailie', 'Dare', 'owatsica@example.com', NULL, NULL, '2020-12-07 08:21:15', '$2y$10$HidQPxVRkyMBsb6DGpsGm.0zAGPAUxthonaoZ3JGA.dEFKoLuyA4S', 'U2VTnlgxXEP6fJI03WZ5Mwbl7aE9SPLtgvPBUV3enwE78fuQbkYqMEoMqIgJ', 1, '2020-12-07 08:21:16', '2021-03-10 07:59:46'),
(101, 'Estel', 'Quigley', 'sharon13@example.org', NULL, NULL, '2020-12-07 08:21:15', '$2y$10$Z9rTe.2ZIOUDGMtoIGvXk.mp88LlWzUFN2e36Uu4TLfYweeB3qrlm', 'wdcsMAhLo4', 1, '2020-12-07 08:21:16', '2021-03-10 07:59:46'),
(102, 'test', 'admin', 'test@admin.com', NULL, NULL, NULL, '$2y$10$BJo/kEiHUlsysBr/QpJRCeKyzxBGZulQvSCKAy1GvoschYSiGd98K', NULL, 1, '2020-12-20 07:22:45', '2021-03-10 07:59:46'),
(103, 'test 1', 'admin 1', 'test1@admin1.com', NULL, NULL, NULL, '$2y$10$OBZHbNA2td0DTxgq4frlfuPzwdyYDMyTE5Ajz6KmYy74U0R8C1wyy', NULL, 1, '2020-12-20 07:30:47', '2021-03-10 07:59:46'),
(104, 'Peter', 'Parker', 'peter@parker.com', NULL, NULL, NULL, '$2y$10$vDUWoKjhEBQYQZsEOpHgg.hKxT5umiXt/A9MjSpaJ6caT./av1wwa', NULL, 1, '2021-01-30 08:58:12', '2021-03-10 07:59:46'),
(107, 'test', 'test', 'admin123@admin.com', '9876543210', NULL, NULL, '$2y$10$n3bFOaPR8os1Zx8iTUm.NO6nSj/oRzUALpjEiuTzeFFAHmprOsqDy', NULL, 1, '2021-02-03 07:08:01', '2021-03-10 07:59:46'),
(108, 'use', 'api', 'user@api.com', NULL, NULL, NULL, '$2y$10$I0nIi9HVOS7XQZ7ez8VYQOB7ojk8cLAizjqLGuef69T7x4TXjTVs.', NULL, NULL, '2021-05-16 07:28:57', '2021-05-16 07:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `load_id` (`load_id`);

--
-- Indexes for table `client_account`
--
ALTER TABLE `client_account`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `client_users`
--
ALTER TABLE `client_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `roldID` (`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `focuses`
--
ALTER TABLE `focuses`
  ADD PRIMARY KEY (`focus_id`),
  ADD KEY `orgindustry_id` (`orgindustry_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `loads`
--
ALTER TABLE `loads`
  ADD PRIMARY KEY (`load_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `organisation_industry`
--
ALTER TABLE `organisation_industry`
  ADD PRIMARY KEY (`orgIndustry_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `client_id` (`client_id`,`survey_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qustion_id`),
  ADD KEY `scale_id` (`scale_id`),
  ADD KEY `loads_id` (`loads_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `survey_id` (`survey_id`,`question_id`,`answer_id`,`focus_id`),
  ADD KEY `answer_id` (`answer_id`),
  ADD KEY `focus_id` (`focus_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `scales`
--
ALTER TABLE `scales`
  ADD PRIMARY KEY (`scale_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sten`
--
ALTER TABLE `sten`
  ADD PRIMARY KEY (`sten_id`),
  ADD KEY `scale_id` (`scale_id`);

--
-- Indexes for table `sten_data`
--
ALTER TABLE `sten_data`
  ADD PRIMARY KEY (`sten_id`),
  ADD KEY `survey_id` (`survey_id`,`scale_id`,`focus_id`),
  ADD KEY `focus_id` (`focus_id`),
  ADD KEY `scale_id` (`scale_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `question_id` (`question_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client_account`
--
ALTER TABLE `client_account`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_users`
--
ALTER TABLE `client_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `focuses`
--
ALTER TABLE `focuses`
  MODIFY `focus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loads`
--
ALTER TABLE `loads`
  MODIFY `load_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organisation_industry`
--
ALTER TABLE `organisation_industry`
  MODIFY `orgIndustry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qustion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `scales`
--
ALTER TABLE `scales`
  MODIFY `scale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sten`
--
ALTER TABLE `sten`
  MODIFY `sten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=768;

--
-- AUTO_INCREMENT for table `sten_data`
--
ALTER TABLE `sten_data`
  MODIFY `sten_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`load_id`) REFERENCES `loads` (`load_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_account`
--
ALTER TABLE `client_account`
  ADD CONSTRAINT `client_account_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_users`
--
ALTER TABLE `client_users`
  ADD CONSTRAINT `client_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `focuses`
--
ALTER TABLE `focuses`
  ADD CONSTRAINT `focuses_ibfk_1` FOREIGN KEY (`orgindustry_id`) REFERENCES `organisation_industry` (`orgIndustry_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `focuses_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `organisation_industry`
--
ALTER TABLE `organisation_industry`
  ADD CONSTRAINT `organisation_industry_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `organisation_industry_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `client_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_account` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`scale_id`) REFERENCES `scales` (`scale_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`loads_id`) REFERENCES `loads` (`load_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`focus_id`) REFERENCES `focuses` (`focus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `questions` (`qustion_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_4` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sten`
--
ALTER TABLE `sten`
  ADD CONSTRAINT `sten_ibfk_1` FOREIGN KEY (`scale_id`) REFERENCES `scales` (`scale_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sten_data`
--
ALTER TABLE `sten_data`
  ADD CONSTRAINT `sten_data_ibfk_1` FOREIGN KEY (`focus_id`) REFERENCES `focuses` (`focus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sten_data_ibfk_2` FOREIGN KEY (`scale_id`) REFERENCES `scales` (`scale_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sten_data_ibfk_3` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`survey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`qustion_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survey_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `client_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
