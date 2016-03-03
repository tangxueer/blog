-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-03-03 09:20:33
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `caid` int(11) NOT NULL AUTO_INCREMENT,
  `caname` varchar(20) NOT NULL,
  PRIMARY KEY (`caid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`caid`, `caname`) VALUES
(1, '哈哈'),
(2, '测试'),
(3, '高数'),
(4, '线代');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_content` text NOT NULL,
  `c_name` varchar(10) NOT NULL,
  `c_date` timestamp NOT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `c_content`, `c_name`, `c_date`, `c_id`) VALUES
(1, '小于两颗高数', 'admin', '2016-02-22 06:55:47', 12),
(2, '小于三个电路', 'admin', '2016-02-22 06:56:17', 12),
(3, '成功！', 'admin', '2016-02-22 06:57:27', 2),
(4, 'success!', 'guest', '2016-02-22 06:59:27', 11),
(5, 'hahahhaa', 'caj', '2016-02-22 20:45:02', 12),
(6, '三大殿', 'admin', '2016-03-02 08:08:22', 13),
(7, '是否', 'admin', '2016-03-02 08:15:05', 12);

-- --------------------------------------------------------

--
-- 表的结构 `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL,
  `hit` int(11) NOT NULL,
  `ca_name` varchar(20) NOT NULL,
  `comment_num` int(11) NOT NULL,
  PRIMARY KEY (`cid`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `content`
--

INSERT INTO `content` (`cid`, `title`, `content`, `date`, `hit`, `ca_name`, `comment_num`) VALUES
(1, '哈哈哈', '博客施工完毕！', '2016-02-22 06:52:06', 1, '哈哈', 0),
(2, '测试', 'test!test!', '2016-02-22 06:52:23', 3, '测试', 1),
(3, '高数', '一棵高数', '2016-02-22 06:52:53', 0, '高数', 0),
(4, '高数2.0', '两颗高数', '2016-02-22 06:53:08', 0, '高数', 0),
(5, '高数3.0', '三颗高数', '2016-02-22 06:53:23', 0, '高数', 0),
(6, '高数4.0', '四颗高数', '2016-02-22 06:53:44', 1, '高数', 0),
(7, '高数5.0', '五颗高数', '2016-02-22 06:54:00', 1, '高数', 0),
(8, '高数6.0', '六颗高数', '2016-02-22 06:54:17', 0, '高数', 0),
(9, '高数7.0', '七颗高数', '2016-02-22 06:54:37', 0, '高数', 0),
(10, '线代1.0', '一只线代', '2016-02-22 06:54:54', 2, '线代', 0),
(11, '线代2.0', '两只线代', '2016-02-22 06:55:11', 5, '线代', 1),
(12, '线代3.0', '三只线代', '2016-02-22 06:55:25', 22, '线代', 5);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(17) DEFAULT NULL,
  `upass` varchar(46) DEFAULT NULL,
  `udate` timestamp NOT NULL,
  `nickname` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `uname`, `upass`, `udate`, `nickname`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-02-22 06:51:37', '博主'),
(2, 'guest', '084e0343a0486ff05530df6c705c8bb4', '2016-02-22 06:58:50', '访客no.1'),
(3, 'caj', '547a6e93a75e597c03c613f93dcdc8dd', '2016-02-22 20:44:43', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
