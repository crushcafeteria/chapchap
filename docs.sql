-- phpMyAdmin SQL Dump
-- version 4.0.0-beta3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2014 at 01:59 PM
-- Server version: 5.5.32-0ubuntu0.12.04.1
-- PHP Version: 5.4.21-1+debphp.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `docs`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `chapter_id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `created_on` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `chapter_id`, `title`, `content`, `created_on`, `last_update`) VALUES
(6, 6, 'sdfsdfsfsdf', '<p>sdfsdfsdf</p>', '2014-05-17 21:08:21', '2014-05-17 18:08:21'),
(8, 6, 'sdfsdfsdf', '<p>sdfsfsdfsdffsdf</p>', '2014-05-17 21:08:33', '2014-05-17 18:08:33'),
(10, 6, 'Creating a poll question', '<p><span style="font-family:lucida grande,verdana,geneva,sans-serif; font-size:14px">Under normal circumstances you won&#39;t even notice the Output class since it works transparently without your intervention. For example, when you use the&nbsp;</span><a href="http://localhost/devportal/user_guide/libraries/loader.html" style="color: rgb(1, 52, 197); text-decoration: none; outline-style: none; font-family: ''Lucida Grande'', Verdana, Geneva, sans-serif; font-size: 14px; line-height: normal;">Loader</a><span style="font-family:lucida grande,verdana,geneva,sans-serif; font-size:14px">&nbsp;class to load a view file, it&#39;s automatically passed to the Output class, which will be called automatically by CodeIgniter at the end of system execution. It is possible, however, for you to manually intervene with the output if you need to, using either of the two following functions:</span></p>\n\n<p><span style="font-family:lucida grande,verdana,geneva,sans-serif; font-size:14px">Under normal circumstances you won&#39;t even notice the Output class since it works transparently without your intervention. For example, when you use the&nbsp;</span><a href="http://localhost/devportal/user_guide/libraries/loader.html" style="color: rgb(1, 52, 197); text-decoration: none; outline-style: none; font-family: ''Lucida Grande'', Verdana, Geneva, sans-serif; font-size: 14px; line-height: normal;">Loader</a><span style="font-family:lucida grande,verdana,geneva,sans-serif; font-size:14px">&nbsp;class to load a view file, it&#39;s automatically passed to the Output class, which will be called automatically by CodeIgniter at the end of system execution. It is possible, however, for you to manually intervene with the output if you need to, using either of the two following functions:</span></p>\n\n<p><span style="font-family:lucida grande,verdana,geneva,sans-serif; font-size:14px">Under normal circumstances you won&#39;t even notice the Output class since it works transparently without your intervention. For example, when you use the&nbsp;</span><a href="http://localhost/devportal/user_guide/libraries/loader.html" style="color: rgb(1, 52, 197); text-decoration: none; outline-style: none; font-family: ''Lucida Grande'', Verdana, Geneva, sans-serif; font-size: 14px; line-height: normal;">Loader</a><span style="font-family:lucida grande,verdana,geneva,sans-serif; font-size:14px">&nbsp;class to load a view file, it&#39;s automatically passed to the Output class, which will be called automatically by CodeIgniter at the end of system execution. It is possible, however, for you to manually intervene with the output if you need to, using either of the two following functions:</span></p>\n\n<p><span style="font-family:lucida grande,verdana,geneva,sans-serif; font-size:14px">Under normal circumstances you won&#39;t even notice the Output class since it works transparently without your intervention. For example, when you use the&nbsp;</span><a href="http://localhost/devportal/user_guide/libraries/loader.html" style="color: rgb(1, 52, 197); text-decoration: none; outline-style: none; font-family: ''Lucida Grande'', Verdana, Geneva, sans-serif; font-size: 14px; line-height: normal;">Loader</a><span style="font-family:lucida grande,verdana,geneva,sans-serif; font-size:14px">&nbsp;class to load a view file, it&#39;s automatically passed to the Output class, which will be called automatically by CodeIgniter at the end of system execution. It is possible, however, for you to manually intervene with the output if you need to, using either of the two following functions:</span></p>', '2014-05-17 21:17:42', '2014-05-17 18:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `description` varchar(20000) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `description`, `created_on`) VALUES
(6, 'Arena User Guide', 'Only the name and value are required. To delete a cookie set it with the expiration blank.\n\nThe expiration is set in seconds, which will be added to the current time. Do not include the time, but rather only the number of seconds from now that you wish the cookie to be valid. If the expiration is set to zero the cookie will only last as long as the browser is open.\n\nFor site-wide cookies regardless of how your site is requested, add your URL to the domain starting with a period, like this: .your-domain.com', '2014-05-12 07:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `book_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `book_id`, `name`, `description`, `created_on`) VALUES
(6, 6, 'User Authentication', 'Only the name and value are required. To delete a cookie set it with the expiration blank.\n\nThe expiration is set in seconds, which will be added to the current time. Do not include the time, but rather only the number of seconds from now that you wish the cookie to be valid. If the expiration is set to zero the cookie will only last as long as the browser is open.\n\nFor site-wide cookies regardless of how your site is requested, add your URL to the domain starting with a period, like this: .your-domain.com', '2014-05-12 07:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `names`, `gender`, `email`, `password`, `created_on`, `last_update`) VALUES
(1, 'Nelson Ameyo', 'MA', 'nelson@arena.co.ke', '99adc231b045331e514a516b4b7680f588e3823213abe901738bc3ad67b2f6fcb3c64efb93d18002588d3ccc1a49efbae1ce20cb43df36b38651f11fa75678e8', '2014-02-16 21:27:15', '2014-02-16 18:27:15'),
(4, 'Asdasd', 'MA', 'nelson@arena.co.kes', '3e181257ea477ec94c71d9e9acef7d5810855f64deb03e6ab3c163c1a3a04c9bd9ae4c2b24ad1f31bf22d68283c393be80dea0a0cab2d2dafa9ac47a5ebb8f83', '0000-00-00 00:00:00', '2014-05-13 21:00:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
