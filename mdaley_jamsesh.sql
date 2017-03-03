-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2017 at 09:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mdaley_jamsesh`
--
CREATE DATABASE IF NOT EXISTS `mdaley_jamsesh` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mdaley_jamsesh`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
`comment_id` smallint(6) NOT NULL,
  `date` datetime NOT NULL,
  `body` text NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `post_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

DROP TABLE IF EXISTS `instruments`;
CREATE TABLE IF NOT EXISTS `instruments` (
`instrument_id` smallint(6) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrument_id`, `name`) VALUES
(1, 'drums'),
(2, 'guitar');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
`like_id` smallint(6) NOT NULL,
  `post_id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `is_like` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
`post_id` smallint(6) NOT NULL,
  `title` varchar(500) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `body`, `date`, `user_id`, `photo`) VALUES
(1, 'Drums Rule!', 'They are the rhythm!', '2017-03-03 10:31:52', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`user_id` smallint(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(254) NOT NULL,
  `user_pic` text NOT NULL,
  `date_joined` datetime NOT NULL,
  `account_type` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `zip_code` smallint(6) NOT NULL,
  `security_key` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `user_pic`, `date_joined`, `account_type`, `is_admin`, `zip_code`, `security_key`) VALUES
(1, 'daleymj', 'aece4b06c33d667a17af94fa22fe6cf7b83fceaa', 'daley@gmail.com', '', '2017-03-02 11:22:48', 1, 1, 32767, 'ae67c221ad705ac50d56f0ca7d74702c76ced34c'),
(2, 'george', '59f566c930ad326955ed4adb5da7ff56d8bfa240', 'george@george.com', '', '2017-03-02 11:16:15', 3, 0, 32767, ''),
(3, 'melissa', '59f566c930ad326955ed4adb5da7ff56d8bfa240', 'melissa@melissa.com', '', '2017-03-03 10:53:31', 3, 0, 32767, '5782b8aa25e6a077023b9eae6aa6e74ef67afa61');

-- --------------------------------------------------------

--
-- Table structure for table `user_instruments`
--

DROP TABLE IF EXISTS `user_instruments`;
CREATE TABLE IF NOT EXISTS `user_instruments` (
`user_instrument_id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `instrument_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
 ADD PRIMARY KEY (`instrument_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_instruments`
--
ALTER TABLE `user_instruments`
 ADD PRIMARY KEY (`user_instrument_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
MODIFY `instrument_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
MODIFY `like_id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `post_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_instruments`
--
ALTER TABLE `user_instruments`
MODIFY `user_instrument_id` smallint(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
