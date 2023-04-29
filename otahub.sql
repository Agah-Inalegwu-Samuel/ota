-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2023 at 02:48 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otahub`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `body` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `sessionofadmission` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `full_name`, `username`, `email`, `phone`, `gender`, `sessionofadmission`, `image`) VALUES
(1, 11, 'Aga', 'John', 'agahinalegwusamuel@gmail.com', '4324535', 'Female', '2001/2002', '123562342111127042023122410.jpg'),
(2, 11, 'Aga', 'John', 'agahinalegwusamuel@gmail.com', '4324535', 'Female', '2001/2002', '123562342111127042023122410.jpg'),
(3, 11, 'Aga', 'John', 'agahinalegwusamuel@gmail.com', '4324535', 'Female', '2001/2002', '123562342111127042023122410.jpg'),
(4, 11, 'Aga', 'John', 'agahinalegwusamuel@gmail.com', '4324535', 'Female', '2001/2002', '123562342111127042023122410.jpg'),
(5, 11, 'Aga', 'John', 'agahinalegwusamuel@gmail.com', '4324535', 'Female', '2001/2002', '123562342111127042023122410.jpg'),
(6, 16, 'Isama Michael', 'isamamichael', 'isama@gmail.com', '98023901', 'female', '2000/2001', '9802390128042023134033.jpg'),
(7, 1, 'faihyt', 'faith', 'charabeauty001@gmail.com', '31322', 'female', '2020/2021', '3132228042023134956.jpg'),
(8, 17, 'nowww', 'combat', 'n@gmail.com', '765432', 'female', '2020/2021', '76543228042023135310.jpg'),
(9, 18, 'wow', 'wow', 'g@gmail.com', '39393', 'female', '2001/2002', '3939328042023135959.jpg'),
(10, 19, 'Inalegwu Sam ', 'Inalegwu Sam ', 'me@gmail.com', '657438', 'female', '2020/2021', '65743828042023141056.jpg'),
(11, 20, 'John', 'Doe', 'h@gmail.com', '8488383', 'female', '2000/2001', '848838329042023102025.jpg'),
(12, 21, 'k', 'kanty', 'k@gmail.com', '432', 'female', '2020/2021', '43229042023103319.jpg'),
(13, 23, 'u', 'user', 'u@g.mail', '345678', 'female', '2000/2001', '34567829042023110929.jpg'),
(14, 24, 'Paul', 'Walker', 'p@gmail.com', '333333', 'female', '2020/2021', '33333329042023113335.jpg'),
(15, 25, 'Bruise', 'Lee', 'l@gmail.com', '334433', 'female', '2020/2021', '33443329042023141154.jpeg'),
(16, 27, 'jfjfjf', 'kfkfkf', 'b@gmail.com', '3232333', 'female', '2020/2021', '323233329042023143812.jpg'),
(17, 28, 'ututut', 'jrjrjr', 'kkk@gmail.com', '465455', 'female', '2020/2021', '46545529042023144102.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'charabeauty001@gmail.com', '11111'),
(11, 'agahinalegwusamuel@gmail.com', '111111'),
(10, 'ddd@gmail.com', '11111'),
(9, 'aa@gmail.com', '1234567'),
(12, 'ff@gmail.com', '11111'),
(13, 'll@gmail.com', '11111'),
(14, 'jj@gmail.com', '11111'),
(15, '6@gmail.co', '11111'),
(16, 'isama@gmail.com', 'isama'),
(17, 'n@gmail.com', '11111'),
(18, 'g@gmail.com', '11111'),
(19, 'me@gmail.com', '11111'),
(20, 'h@gmail.com', '11111'),
(21, 'k@gmail.com', '11111'),
(22, 'm@mail.com', '11111'),
(23, 'u@g.mail', '11111'),
(24, 'p@gmail.com', '11111'),
(25, 'l@gmail.com', '11111'),
(26, 'bruiselee@gmail.com', '11111'),
(27, 'b@gmail.com', '555555'),
(28, 'kkk@gmail.com', '11111');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
