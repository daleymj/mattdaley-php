-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2017 at 05:29 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mattdaley_blog`
--
CREATE DATABASE IF NOT EXISTS `mattdaley_blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mattdaley_blog`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
`category_id` smallint(6) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Sports'),
(2, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
`comment_id` smallint(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `body` text NOT NULL,
  `email` varchar(254) NOT NULL,
  `url` varchar(3000) NOT NULL,
  `post_id` smallint(6) NOT NULL,
  `is_approved` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `name`, `date`, `body`, `email`, `url`, `post_id`, `is_approved`) VALUES
(1, 'Billy', '2017-02-10 10:00:36', 'Basket weaving is for pussies!!! I twiddle my thumbs for a living! That''s a mans job.', 'bitchtits@asshole.com', 'bitchtits.com', 1, 0),
(2, 'Shaniqua', '2017-02-01 00:00:00', 'I love these!! ', 'shaniqua@urban.com', 'www.hood.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
`link_id` smallint(6) NOT NULL,
  `url` varchar(3000) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`link_id`, `url`, `title`, `description`) VALUES
(1, 'https://www.food.com', 'Food.com', 'All things food.'),
(2, 'https://www.sports.com', 'Sports.com', 'All things sports.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
`post_id` smallint(6) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `body` text NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `allow_comments` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `date`, `category_id`, `body`, `user_id`, `is_published`, `allow_comments`) VALUES
(1, 'Look into the amazing world of basket weeving!', '2017-02-10 09:55:12', 1, 'Get a degree in basket weaving and then you can do what you love for the rest of your life.', 1, 1, 1),
(2, 'Beer can Burgers!!!!', '2017-02-10 09:55:12', 2, 'Wrap a ball of ground beef around a beer can. Wrap bacon around that. Fill with all the delicious things your heart desires and top with cheese.  Grill on indirect heat for an hour.  Enjoy Heaven!', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`user_id` smallint(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `userpic` varchar(3000) NOT NULL,
  `bio` text NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_approved` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `userpic`, `bio`, `is_admin`, `is_approved`) VALUES
(1, 'daleymj', '8488307681665f3dc017ebcab0c4cd7b1733e102', 'mdaley@gmail.com', '', 'AAAAAAHHHHAHAAAAHHHHAAAAHHHAAAA!!!', 1, 1),
(2, 'Big_Cheese', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'ilovecheese@gmail.com', '', 'I enjoy cheese... ALOT!', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
 ADD PRIMARY KEY (`link_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `category_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
MODIFY `link_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `post_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
