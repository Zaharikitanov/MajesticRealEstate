-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 05:47 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majesticrealestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `brokers`
--

CREATE TABLE `brokers` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `userRole` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brokers`
--

INSERT INTO `brokers` (`id`, `username`, `email`, `password`, `userRole`, `token`, `created`) VALUES
(1, 'YKNylV+Jn9TGQXwycpZDS1DXD2TCbrrpCR8AumnWTbM=', 'vfQ4gq6cWuWJvLsF64veeMbE6x+X0HIxW8xP0hw1QbA=', 'Di5tsNLSaUo5QQFHbRWIdzGNRimEnn8fMvqq1/5e/yo=', 'E8YeguCnzEhQYnj54znQKhMeXKY35IRLVqCsANPj1fg=', 'SguniWPxp6JpTMmvjkOnJC6xH9lBJ7GWFEy3LeRhasI=', '2017-12-25 22:50:34'),
(2, 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', 'V9TSZiSGTya5J+QhPpUsu+SbMOyz25qQ21yx6Gq8kvM=', 'Di5tsNLSaUo5QQFHbRWIdzGNRimEnn8fMvqq1/5e/yo=', 'E8YeguCnzEhQYnj54znQKhMeXKY35IRLVqCsANPj1fg=', 'WyzclkpuFn+K9uk7CR0lYZU7C9KHEsLcRQaulvcdla8=', '2017-12-28 23:59:30'),
(3, 'YKNylV+Jn9TGQXwycpZDS1DXD2TCbrrpCR8AumnWTbM=', 'ezOvwgt+TeDOK4DRKYKmwRDmEwaCHcynvTVGeCEWUek=', 'bG3oshc1iTVd/9sxXJZD8V6XbnBocGHmT9hBm7I3q58=', 'E8YeguCnzEhQYnj54znQKhMeXKY35IRLVqCsANPj1fg=', 'Hs/A3i/iOu0rSCTEmyScqDMBLdlkQj9uZ9p90M0Bcf8=', '2018-01-28 17:08:29'),
(4, 'SLvrfz57oydJL2ORNR/9I/pSAv3iF8/esEkO11ubFBg=', 'qyIwQcTVge+jjjbrN8nQltQFZDBfcHm+HdbfgeE4t8I=', 'bG3oshc1iTVd/9sxXJZD8V6XbnBocGHmT9hBm7I3q58=', 'ky94yIghKXFiG5IMjUlsT885LPznRqCMHz6MuKEPEF4=', 'zE7duWnVY8TvOe6sHABfSGA8yr41FksNz/HT5ZIcTec=', '2018-04-12 22:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `secondPhone` varchar(100) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `familyStatus` varchar(255) DEFAULT NULL,
  `furnishing` varchar(255) DEFAULT NULL,
  `emergency` varchar(5) DEFAULT NULL,
  `pet` varchar(5) DEFAULT NULL,
  `estateType` varchar(255) DEFAULT NULL,
  `estateRegion` varchar(255) DEFAULT NULL,
  `estateNeighborhood` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `broker` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `secondPhone`, `budget`, `familyStatus`, `furnishing`, `emergency`, `pet`, `estateType`, `estateRegion`, `estateNeighborhood`, `note`, `broker`, `created`) VALUES
(4, '7DZXH+0lIeyS9A6MHbgwnYFzj7s3GAANhnJ/a4vdtxo=', 'JdiTYIX+aW+cixb9+E7s+SslRAjsEcd2kZihbpROAX4=', 'PfCjA7NOVp13IXn3wsdz/VwgyUEn4V8IeZQVrgwnYRM=', 400, 'Само момче', 'Полуобзавеждане', '1', '1', '[\"3-СТАЕН\"]', '[\"Север 3\"]', '[\"Борово\"]', 'Много яко', 'YKNylV+Jn9TGQXwycpZDS1DXD2TCbrrpCR8AumnWTbM=', '2017-12-25 23:25:49'),
(5, 'HUwVV3/iIIgQL3BQ4EXERnJ7jTQlN7saMGNZ4iCTVug=', 'yTPBLji4mpL3THqB9R0PT0bqqUrH5d9aidJxhEeoIOk=', '3RSIPFdNLc2RksYZPtLoDxmR7DZjSDsNzqiEbRvfO3k=', 400, 'Възрастна двойка', 'Не', '1', '1', '[\"4-СТАЕН\"]', '[\"Юг 1\"]', '[\"Борово\"]', '', 'Zahari Kitanov', '2017-12-27 10:34:18'),
(6, 'HUwVV3/iIIgQL3BQ4EXERnJ7jTQlN7saMGNZ4iCTVug=', 'yTPBLji4mpL3THqB9R0PT0bqqUrH5d9aidJxhEeoIOk=', '3RSIPFdNLc2RksYZPtLoDxmR7DZjSDsNzqiEbRvfO3k=', 400, 'Възрастна двойка', 'Не', '1', '1', '[\"4-СТАЕН\",\" МНОГОСТАЕН\",\" МЕЗОНЕТ\"]', '[\"Юг 1                    \"]', '[\"Борово                    \"]', 'Има', 'YKNylV+Jn9TGQXwycpZDS1DXD2TCbrrpCR8AumnWTbM=', '2017-12-27 10:35:55'),
(9, 'zor7/qyA+rpCm6VORydRk+tVNspxqw9V0FlXNbZJu1s=', 'XKCV/ZZh/Xjrk3Yj5XyNz56CuJvJOtDqscDpWfA8sLE=', '5BwkmHoLIHLXEXFmJJZ2XPpyaG3sKhg6I1RRHaNkgww=', 900, 'Млада двойка', 'Да', '1', '0', '[\"2-СТАЕН\",\" МНОГОСТАЕН\",\" 4-СТАЕН                                                                                                                        \"]', '[\"Изток 3\",\" Юг 2\",\" Юг 1\",\" Север 3                                                                                                                        \"]', '[\"Връбница 2\",\" Връбница                                                                                                                        \"]', 'Има', 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', '2017-12-28 23:27:59'),
(10, 'I66MyUTiAFra8OjXdifMAJlHK33uFSHEFfz7mkDLq84=', 'oyfsl83SQ6XaW+i95SPX4jqy569PBby/87kNTlmc0Fc=', 'KTIpwcM2SIrrZAzga19U2P9jLXSCLnr3bfZzTtEo0mQ=', 500, 'Само момче', 'Полуобзавеждане', 'Да', 'Да', '[\"2-СТАЕН\",\" 1-СТАЕН\",\" ПАРТЕР                                                                                                                        \"]', '[\"Север 3\",\" Север 2\",\" Север 1                                                                                                                        \"]', '[\"Бенковски\",\" Белите брези                                                                                                                        \"]', 'Да има да', 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', '2017-12-29 10:49:13'),
(11, 'VaA9A+Y+XUYWIY/QArsSrl/gpGGRB205uEkcQuWw+xo=', 'Ly2UWe0vSO7r4CfOyuT61MHA5fGsc7H3XpV8phuHEJo=', 'Qlpj+Eo2/sB5Bq6vU2Fa5qx4pRtLujjhW6Aj4Br0FfQ=', 900, 'Само момче', 'Да', 'Да', 'Не', '[\"2-СТАЕН\",\" 1-СТАЕН\",\" ПАРТЕР\",\" 3-СТАЕН\"]', '[\"Север 3\",\" Юг 1\",\" Юг 2                    \"]', '[\"Белите брези\",\" Борово\",\" Бенковски                    \"]', 'Има си да', 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', '2018-01-05 20:11:09'),
(12, 'ij0onSA5jwMYfy2gCh8vJZJjk+pv6DEBqO4EzLl2WHM=', 'yTKuGtyqmSAyig0x0QH61KKiVyDK7KkdcoqenJy06fA=', 'yTKuGtyqmSAyig0x0QH61KKiVyDK7KkdcoqenJy06fA=', 0, 'Избери', 'Избери', 'Не', '', '[\"1-СТАЕН\",\" 2-СТАЕН                    \"]', '[\"Център 2\",\" Център 1                    \"]', '[\"7ми 11ти километър\",\" Банишора                    \"]', '', 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', '2018-01-05 20:45:56'),
(13, 'H4qyht4yFdopC6PIXh1DIi0INtb3iRDcGuFktIVoel0=', 'yTKuGtyqmSAyig0x0QH61KKiVyDK7KkdcoqenJy06fA=', 'yTKuGtyqmSAyig0x0QH61KKiVyDK7KkdcoqenJy06fA=', 0, 'Избери', 'Избери', 'Не', '', '[\"1-СТАЕН\",\" 2-СТАЕН\",\" 3-СТАЕН\",\" 4-СТАЕН\"]', '[\"Център 2\",\" Север 1\",\" Север 2                                                            \"]', '[\"Белите брези\",\" Бенковски\",\" Борово                                                            \"]', '', 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', '2018-01-05 20:49:12'),
(14, 'sY2muqrPIkIpEJN3EY6V4k5+6y3pCynJm/kkjQoN+7k=', 'mly1YOuquLmBcUoDMm0Guf+Zw+STlgfdrnNtho/SMDs=', '94EmGiRKJUNxvND+a5ZOxt+k5mpghAQnqmIvyBzDF2E=', 500, 'Само момче', 'Да', 'Не', 'Да', '[\"4-СТАЕН                    \"]', '[\"Юг 1                    \"]', '[\"Бояна                    \"]', 'някаква', 'YKNylV+Jn9TGQXwycpZDS1DXD2TCbrrpCR8AumnWTbM=', '2018-03-04 21:43:42'),
(15, 'SMYBqIceuNa5xnaRQV5Z1geAgvRGYrwDXCtcyHbroeQ=', 'WwBtpgWniTGYpJKZzd2Qn89/1tdnSMHmu85a+kEJdtc=', 'Qlpj+Eo2/sB5Bq6vU2Fa5qx4pRtLujjhW6Aj4Br0FfQ=', 333, 'Възрастна двойка', 'Да', 'Не', 'Да', '[\"МЕЗОНЕТ\",\" 2-СТАЕН\",\" 1-СТАЕН\"]', '[\"Север 2                                                            \"]', '[\"Бояна                                                            \"]', 'ima', 'yTKuGtyqmSAyig0x0QH61KKiVyDK7KkdcoqenJy06fA=', '2018-03-04 21:45:12'),
(16, 'q04bAY+T9zsZB4hM18UsBtZbHW5vJ8XrDsbOdUeWDcI=', 'L0f1moi35Zex63bAFNqro/ofzKNN8qXw2gSyqq7X6Bk=', 'iu0vmc+6KidXTH5mcsB78YS7NtFf2LMDYb+YlGgD+iE=', 1313, 'Само момче', 'Не', 'Да', 'Да', '[\"2-СТАЕН\"]', '[\"Център 1\"]', '[\"Белите брези\"]', '', 'YKNylV+Jn9TGQXwycpZDS1DXD2TCbrrpCR8AumnWTbM=', '2018-03-04 21:48:10'),
(17, 'KCo5SSBtWnNJ1ha+iV4F7y/1dxff4VX/jAJUBSj+m/g=', 'zQewTzAblgMJE2nHQno1zw9CRmgeUVFIZDWUEbXllDk=', '4UVyVQWPPvY7Y6hLkLDBiXPFh+ejsqeMTgcVqhdteOg=', 599, 'Млада двойка', 'Полуобзавеждане', 'Не', 'Да', '[\"1-СТАЕН\",\" ПАРТЕР\"]', '[\"Център 1\"]', '[\"Борово\",\" Бенковски\",\" Белите брези\"]', 'такава е', 'YKNylV+Jn9TGQXwycpZDS1DXD2TCbrrpCR8AumnWTbM=', '2018-03-05 16:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `recepient` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `createdBy` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `realestateneighborhood`
--

CREATE TABLE `realestateneighborhood` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realestateneighborhood`
--

INSERT INTO `realestateneighborhood` (`id`, `name`) VALUES
(666, 'Белите брези'),
(667, 'Бенковски'),
(668, 'Борово'),
(669, 'Бояна'),
(670, 'Бъкстон'),
(671, 'Витоша'),
(672, 'Военна рампа'),
(673, 'Враждебна'),
(674, 'Връбница'),
(675, 'Връбница 2'),
(676, 'Гевгелийски'),
(677, 'Гео Милев'),
(678, 'Горна баня'),
(679, 'Горубляне'),
(680, 'Гоце Делчев'),
(681, 'Дианабад'),
(682, 'Докторски паметник'),
(683, 'Драгалевци'),
(684, 'Дружба 1'),
(685, 'Дружба 2'),
(686, 'Дървеница'),
(687, 'Западен парк'),
(688, 'Захарна фабрика'),
(689, 'Зона Б-18'),
(690, 'Зона Б-19'),
(691, 'Зона Б-5'),
(692, 'Зона Б-5-3'),
(693, 'Иван Вазов'),
(694, 'Изгрев'),
(695, 'Изток'),
(696, 'Илинден'),
(697, 'Илиянци'),
(698, 'Карпузица'),
(699, 'Княжево'),
(700, 'Красна Поляна'),
(701, 'Красна поляна 1'),
(702, 'Красна поляна 2'),
(703, 'Красна поляна 3'),
(704, 'Красно село'),
(705, 'Кръстова вада'),
(706, 'Лагера'),
(707, 'Левски'),
(708, 'Левски В'),
(709, 'Левски Г'),
(710, 'Лозенец'),
(711, 'Люлин - център'),
(712, 'Люлин 1'),
(713, 'Люлин 10'),
(714, 'Люлин 2'),
(715, 'Люлин 3'),
(716, 'Люлин 4'),
(717, 'Люлин 5'),
(718, 'Люлин 6'),
(719, 'Люлин 7'),
(720, 'Люлин 8'),
(721, 'Люлин 9'),
(722, 'Малашевци'),
(723, 'Малинова долина'),
(724, 'Манастирски ливади'),
(725, 'Медицинска академия'),
(726, 'Младост 1'),
(727, 'Младост 1А'),
(728, 'Младост 2'),
(729, 'Младост 3'),
(730, 'Младост 4'),
(731, 'Модерно предградие'),
(732, 'Мусагеница'),
(733, 'Надежда 1'),
(734, 'Надежда 2'),
(735, 'Надежда 3'),
(736, 'Надежда 4'),
(737, 'Надежда 5'),
(738, 'Надежда 6'),
(739, 'Обеля'),
(740, 'Обеля 1'),
(741, 'Обеля 2'),
(742, 'Оборище'),
(743, 'Овча купел'),
(744, 'Овча купел 1'),
(745, 'Овча купел 2'),
(746, 'Орландовци'),
(747, 'Павлово'),
(748, 'Подуяне'),
(749, 'Полигона'),
(750, 'Разсадника'),
(751, 'Редута'),
(752, 'Република'),
(753, 'Република 2'),
(754, 'Света Троица'),
(755, 'Свобода'),
(756, 'Сердика'),
(757, 'Симеоново'),
(758, 'Славия'),
(759, 'Слатина'),
(760, 'Стрелбище'),
(761, 'Студентски град'),
(762, 'Сухата река'),
(763, 'Суходол'),
(764, 'Толстой'),
(765, 'Триъгълника'),
(766, 'Фондови жилища'),
(767, 'Хаджи Димитър'),
(768, 'Хиподрума'),
(769, 'Хладилника'),
(770, 'Христо Ботев'),
(771, 'Централна гара'),
(772, 'Център'),
(773, 'Яворов'),
(777, 'Банишора');

-- --------------------------------------------------------

--
-- Table structure for table `realestateregion`
--

CREATE TABLE `realestateregion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realestateregion`
--

INSERT INTO `realestateregion` (`id`, `name`) VALUES
(1, 'Център 1'),
(2, 'Център 2'),
(3, 'Север 1'),
(4, 'Север 2'),
(5, 'Север 3'),
(6, 'Юг 1'),
(7, 'Юг 2'),
(8, 'Юг 3'),
(9, 'Юг 4'),
(10, 'Юг 5'),
(11, 'Изток 1'),
(12, 'Изток 2'),
(13, 'Изток 3'),
(14, 'Запад 1');

-- --------------------------------------------------------

--
-- Table structure for table `realestates`
--

CREATE TABLE `realestates` (
  `id` int(11) NOT NULL,
  `estateRegion` varchar(100) DEFAULT NULL,
  `estateNeighborhood` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `estateBlockOrNumber` varchar(30) DEFAULT NULL,
  `entrance` varchar(30) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `buildingType` varchar(30) DEFAULT NULL,
  `estateType` varchar(30) DEFAULT NULL,
  `estateArea` int(11) DEFAULT NULL,
  `furnishing` varchar(30) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `heatingType` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pictures` varchar(255) DEFAULT NULL,
  `ownerName` varchar(100) DEFAULT NULL,
  `ownerPhone` varchar(100) DEFAULT NULL,
  `ownerPhone2` varchar(100) DEFAULT NULL,
  `ownerPhone3` varchar(100) DEFAULT NULL,
  `infoFromOwner` varchar(255) DEFAULT NULL,
  `infoAboutOwner` varchar(255) DEFAULT NULL,
  `broker` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realestates`
--

INSERT INTO `realestates` (`id`, `estateRegion`, `estateNeighborhood`, `address`, `estateBlockOrNumber`, `entrance`, `floor`, `buildingType`, `estateType`, `estateArea`, `furnishing`, `price`, `heatingType`, `status`, `pictures`, `ownerName`, `ownerPhone`, `ownerPhone2`, `ownerPhone3`, `infoFromOwner`, `infoAboutOwner`, `broker`, `created`) VALUES
(4, 'LQGCuB5JgIEBR1ZYd+faF30P4UtlizszED2OprYiRJQ=', 'du8vCRIPE9i0JsdgZnlVJT01I5gRUR32jJaMW02/Q5w=', '4R8yo6uJxVJoBwpyqD0bvQaPsP22Yjth0KxYZaSmK0w=', '42', 'А', 2, 'ТУХЛА', '4-СТАЕН', 90, 'Да', 90000, 'ТЕЦ', 1, '[\"Disappointed-Meme.jpg\",\"durvo.jpg\",\"dynoFail.jpg\"]', 'zDwQjIRc/on7wafbSQgLLhOa0FxxRvKYRvVQSoP2hgE=', 'SbqK84PpBaCHZFA1VsxQz4tEn0IshM41k2thA9S4EUk=', 'TkMNesV9Qppc30xHi6o8YVlqwOS0NT4Lm0CPa28SBkw=', 'jfBrbztwWbxJPXYKwuPWX3DkmkvkzLCTWm3rJQ5BBxk=', 'Достоверна', 'много достоверна', 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', '2017-12-29 22:01:18'),
(5, 'LQGCuB5JgIEBR1ZYd+faF30P4UtlizszED2OprYiRJQ=', 'du8vCRIPE9i0JsdgZnlVJT01I5gRUR32jJaMW02/Q5w=', '4R8yo6uJxVJoBwpyqD0bvQaPsP22Yjth0KxYZaSmK0w=', '42', 'А', 2, 'ТУХЛА', '4-СТАЕН', 90, 'Да', 90000, 'ТЕЦ', 0, '[]', '6iqHGGy8uR5YGtMTitfdGCSsbQ0ybhyPuUGc0MreAUY=', 'SbqK84PpBaCHZFA1VsxQz4tEn0IshM41k2thA9S4EUk=', 'TkMNesV9Qppc30xHi6o8YVlqwOS0NT4Lm0CPa28SBkw=', 'jfBrbztwWbxJPXYKwuPWX3DkmkvkzLCTWm3rJQ5BBxk=', 'Достоверна', 'много достоверна', 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', '2017-12-29 23:25:37'),
(6, 'LQGCuB5JgIEBR1ZYd+faF30P4UtlizszED2OprYiRJQ=', 'du8vCRIPE9i0JsdgZnlVJT01I5gRUR32jJaMW02/Q5w=', '4R8yo6uJxVJoBwpyqD0bvQaPsP22Yjth0KxYZaSmK0w=', '42', 'А', 2, 'ТУХЛА', '4-СТАЕН', 90, 'Да', 70000, 'ТЕЦ', 0, '[]', 'HAshzRUF8xsXi4VAjiSJbcCf44aLtZ3N5Z7RVCxEfcQ=', 'SbqK84PpBaCHZFA1VsxQz4tEn0IshM41k2thA9S4EUk=', 'TkMNesV9Qppc30xHi6o8YVlqwOS0NT4Lm0CPa28SBkw=', 'jfBrbztwWbxJPXYKwuPWX3DkmkvkzLCTWm3rJQ5BBxk=', 'Достоверна е', 'много достоверна', 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', '2017-12-31 15:49:20'),
(7, 'LQGCuB5JgIEBR1ZYd+faF30P4UtlizszED2OprYiRJQ=', 'hypFnSwfzVYYYSUx5QgazOd+aAxnmmxd3k7ulnkAatQ=', 'B+d4ee47EPUmSPUQ7e9GByti7ybJvfxAXwB9yIVf0pU=', '44', 'а', 2, 'ТУХЛА', '4-СТАЕН', 44, 'Да', 90000, 'Локално отопление', 1, '[]', 'raW382BN5IInNxhZT/WF41U8xw00fIv37lovOb2f0yQ=', 'Qlpj+Eo2/sB5Bq6vU2Fa5qx4pRtLujjhW6Aj4Br0FfQ=', 'yTKuGtyqmSAyig0x0QH61KKiVyDK7KkdcoqenJy06fA=', 'yTKuGtyqmSAyig0x0QH61KKiVyDK7KkdcoqenJy06fA=', '', '', 'YKNylV+Jn9TGQXwycpZDS1DXD2TCbrrpCR8AumnWTbM=', '2018-01-04 23:29:26'),
(8, '2xJOqXGd936ZfM6aptNYDAXXtmihbcxAWCNGI8D+dgo=', 'du8vCRIPE9i0JsdgZnlVJT01I5gRUR32jJaMW02/Q5w=', 'MDM4FSBlo66n7YOTz20QOj9N8AxQ9pCJrlqCDHM7Srw=', '12', 'a', 54, 'ТУХЛА', '1-СТАЕН', 666, 'Не', 7000, 'Локално отопление', 0, '[]', 'LEEPUBQMPLZArYKj5FcmXvAQg98mmdDcBnA6WFD8Tp4=', 'XOdE1Q+vTTWOGxhWBBz91H7VhBhBVDGLZ18RoECo1xE=', 'GWYPJPucsB4JoAXZ0Djw1zhw7oe9hvgHH9NJLWHFoZY=', 'wOYB+1ssg0Nci80IxPyQmxiRfueNs0cL9ivOU5Uy7yo=', 'няма', 'има', 'YKNylV+Jn9TGQXwycpZDS1DXD2TCbrrpCR8AumnWTbM=', '2018-03-05 18:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `realestatetypes`
--

CREATE TABLE `realestatetypes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realestatetypes`
--

INSERT INTO `realestatetypes` (`id`, `name`) VALUES
(110, 'СТАЯ'),
(111, 'ПАРТЕР'),
(112, '1-СТАЕН'),
(113, '2-СТАЕН'),
(114, '3-СТАЕН'),
(115, '4-СТАЕН'),
(116, 'МНОГОСТАЕН'),
(117, 'МЕЗОНЕТ'),
(118, 'ОФИС'),
(119, 'АТЕЛИЕ'),
(120, 'ТАВАН'),
(121, 'ЕТАЖ ОТ КЪЩА'),
(122, 'КЪЩА'),
(123, 'ВИЛА'),
(124, 'МАГАЗИН'),
(125, 'ЗАВЕДЕНИЕ'),
(126, 'СКЛАД'),
(127, 'ГАРАЖ'),
(128, 'ПРОМ. ПОМЕЩЕНИЕ'),
(129, 'ХОТЕЛ'),
(130, 'ПАРЦЕЛ'),
(131, 'ЗЕМЕДЕЛСКА ЗЕМЯ');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(11) NOT NULL,
  `surveyDate` varchar(12) DEFAULT NULL,
  `surveyHour` varchar(12) NOT NULL,
  `broker` varchar(100) DEFAULT NULL,
  `client` varchar(100) DEFAULT NULL,
  `estate` varchar(100) DEFAULT NULL,
  `clientId` int(11) DEFAULT NULL,
  `estateId` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `surveyDate`, `surveyHour`, `broker`, `client`, `estate`, `clientId`, `estateId`, `note`, `created`) VALUES
(7, '08/01/2018', '09:30', 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', 'Jvc46AsJxKyg4ohy6g1rhraHHJP5w4Qr+MLEqpmB5QfvLrcbh8HJjJfxJlTls+uAdV4bRmA7m1AJ48ToDfs0FA==', 'ifF4NeNSsMk7cho58yk+h9sf4tkHvFU1TZ+yGfdZqs0sVEFYhZfMd54Ef2ub728jgVzsrg8yaPATnx/w+T/BvQ==', 10, 4, 'das', '2018-01-04 00:10:01'),
(8, '09/01/2018', '07:00', 'rkoDO5K+dl7bTipRMA+mfnCPDU4QQCYOoo7Ez9/TE2A=', 'N3iVLZHjrNpWAO+p7Zi0J9VtPhlF97U7MmK3N6QLqjT3r1gysGJlINnA/jHO6r0SfKRjOW06peUC/6mtxvejOg==', 'ifF4NeNSsMk7cho58yk+h9sf4tkHvFU1TZ+yGfdZqs0sVEFYhZfMd54Ef2ub728jgVzsrg8yaPATnx/w+T/BvQ==', 4, 6, 'belejka', '2018-01-04 07:28:11'),
(9, '28/01/2018', '11:00', 'YKNylV+Jn9TGQXwycpZDS1DXD2TCbrrpCR8AumnWTbM=', 'Jvc46AsJxKyg4ohy6g1rhraHHJP5w4Qr+MLEqpmB5QfvLrcbh8HJjJfxJlTls+uAdV4bRmA7m1AJ48ToDfs0FA==', 'ifF4NeNSsMk7cho58yk+h9sf4tkHvFU1TZ+yGfdZqs0sVEFYhZfMd54Ef2ub728jgVzsrg8yaPATnx/w+T/BvQ==', 10, 4, 'ima belejka', '2018-01-04 22:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `state` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `createdBy` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brokers`
--
ALTER TABLE `brokers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestateneighborhood`
--
ALTER TABLE `realestateneighborhood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestateregion`
--
ALTER TABLE `realestateregion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestates`
--
ALTER TABLE `realestates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestatetypes`
--
ALTER TABLE `realestatetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brokers`
--
ALTER TABLE `brokers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realestateneighborhood`
--
ALTER TABLE `realestateneighborhood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=778;

--
-- AUTO_INCREMENT for table `realestateregion`
--
ALTER TABLE `realestateregion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `realestates`
--
ALTER TABLE `realestates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `realestatetypes`
--
ALTER TABLE `realestatetypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
