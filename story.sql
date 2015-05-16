-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2015 at 04:40 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_image`
--

CREATE TABLE IF NOT EXISTS `comment_image` (
  `comment_image_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `content` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='chỉ chứa các comment trên image';

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
`file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `url_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories` int(11) DEFAULT NULL,
  `file_type` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `user_id`, `title`, `content`, `url_file`, `categories`, `file_type`) VALUES
(40, 1, NULL, NULL, '1_1431744056_dragon_symbol-wallpaper-1366x768.jpg', 1, 1),
(41, 1, NULL, NULL, '1_1431744683_blue_tailed_damselfly-wallpaper-1366x768.jpg', 1, 1),
(42, 1, NULL, NULL, '1_1431754044_dragon_symbol-wallpaper-1366x768.jpg', 1, 1),
(43, 27, NULL, NULL, '27_1431775129_dragon_symbol-wallpaper-1366x768.jpg', 1, 1),
(44, 27, NULL, NULL, '27_1431777270_chinese_black_dragon-wallpaper-1366x768.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `relationship` int(11) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='lưu quan hệ bạn bè.';

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`user_id1`, `user_id2`, `relationship`, `time`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '0000-00-00 00:00:00', '2015-05-01 19:52:25', '2015-05-01 19:52:25'),
(1, 3, 1, '0000-00-00 00:00:00', '2015-05-01 19:52:55', '2015-05-11 17:20:05'),
(1, 5, 1, '0000-00-00 00:00:00', '2015-05-11 16:40:47', '2015-05-11 17:03:48'),
(1, 27, 0, '0000-00-00 00:00:00', '2015-05-16 02:11:24', '2015-05-16 02:11:24'),
(2, 3, 0, '0000-00-00 00:00:00', '2015-05-01 19:53:09', '2015-05-01 19:53:09'),
(2, 4, 1, '0000-00-00 00:00:00', '2015-05-01 19:53:09', '2015-05-01 19:53:09'),
(4, 1, 1, '0000-00-00 00:00:00', '2015-05-01 19:52:55', '2015-05-01 19:52:55'),
(5, 2, 1, '0000-00-00 00:00:00', '2015-05-12 04:32:37', '2015-05-12 04:33:38'),
(27, 2, 1, '0000-00-00 00:00:00', '2015-05-13 11:50:33', '2015-05-13 12:07:31');

-- --------------------------------------------------------

--
-- Stand-in structure for view `full_post`
--
CREATE TABLE IF NOT EXISTS `full_post` (
`user_id` int(11)
,`user_name` varchar(100)
,`updated_at` timestamp
,`content` text
,`list_like` text
,`comment` mediumtext
,`post_id` int(11)
,`is_have_image` int(11)
,`image_file_id` int(11)
,`post_on_user_id` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text CHARACTER SET utf8mb4 NOT NULL,
  `like` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='lưu ảnh, dưới dạng folder_id, thời gian đăng ảnh đó và link ảnh, có lưu comment tương tự status, có like , cả 2 đều dạng json';

-- --------------------------------------------------------

--
-- Stand-in structure for view `list_request`
--
CREATE TABLE IF NOT EXISTS `list_request` (
`user_id1` int(11)
,`user_name` varchar(100)
,`user_id2` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `session_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_login` datetime NOT NULL,
  `ip` int(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`session_id`, `user_id`, `time_login`, `ip`, `created_at`, `updated_at`) VALUES
('jakshkjah', 3, '0000-00-00 00:00:00', 0, '2015-05-01 18:53:02', '2015-05-01 19:00:58'),
('jakshkjahsjkdhkajsd', 1, '0000-00-00 00:00:00', 0, '2015-05-01 18:51:27', '2015-05-01 18:51:27'),
('jakshkjahsjkdhkajsde', 2, '0000-00-00 00:00:00', 0, '2015-05-01 18:52:23', '2015-05-01 18:52:23'),
('jakshkjaj', 5, '0000-00-00 00:00:00', 0, '2015-05-01 18:53:02', '2015-05-01 18:53:02'),
('jakshkjax', 4, '0000-00-00 00:00:00', 0, '2015-05-01 18:53:02', '2015-05-01 18:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `user_id_sent` int(11) NOT NULL,
  `user_id_recieve` int(11) NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='chứa nội dung tin nhắn giữa 2 người dưới dạng json';

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`user_id_sent`, `user_id_recieve`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '[{"user_id_send":1,"content":"h\\u00ed h\\u00ed ^^","time":"11:14:16 12-05-15"},{"user_id_send":1,"content":"kjsdbfkj","time":"04:02:11 12-05-15"}]', '-1', '2015-05-12 04:14:16', '2015-05-12 09:02:12'),
(1, 2, '[{"user_id_send":"2","content":"viet nam","time":"10:00:53 10-05-15"},{"user_id_send":"2","content":"viet nam dat nuoc","time":"10:01:12 10-05-15"},{"user_id_send":"2","content":"viet nam dat nuoc con nguoi","time":"10:01:19 10-05-15"},{"user_id_send":1,"content":"Nh\\u1eafn ti\\u1ebfp nh\\u00e9","time":"11:44:17 10-05-15"},{"user_id_send":1,"content":"nh\\u1eafn ti\\u1ebfp nh\\u00e9","time":"11:53:03 10-05-15"},{"user_id_send":1,"content":"\\u00e1kjdhkajshdk","time":"11:53:10 10-05-15"},{"user_id_send":1,"content":"Tao l\\u00e0 L\\u1ef1c","time":"12:00:15 10-05-15"},{"user_id_send":2,"content":"kajshdkjahsdkja","time":"12:13:50 10-05-15"},{"user_id_send":2,"content":"\\u00e1khdkajshd","time":"12:14:38 10-05-15"},{"user_id_send":2,"content":"kshdjakskjd","time":"12:15:04 10-05-15"},{"user_id_send":1,"content":"akjsdhkajsd","time":"12:16:39 10-05-15"},{"user_id_send":2,"content":"\\u00e1kjdhaksd","time":"12:20:46 10-05-15"},{"user_id_send":2,"content":"aksjdhkjasd","time":"12:21:20 10-05-15"},{"user_id_send":2,"content":"aksjdhkjasd","time":"12:21:29 10-05-15"},{"user_id_send":2,"content":"aksjdhkjasd","time":"12:21:40 10-05-15"},{"user_id_send":2,"content":"L\\u00e0m g\\u00ec \\u0111\\u1ea5y L\\u01b0c","time":"12:21:48 10-05-15"},{"user_id_send":1,"content":"\\u1eeam, t\\u1edb v\\u1eeba \\u0111i ch\\u1ee3 c\\u1eadu \\u00e0 h\\u00ed h\\u00ed ^^","time":"12:22:03 10-05-15"},{"user_id_send":2,"content":"akjsdhkajs","time":"12:22:41 10-05-15"},{"user_id_send":1,"content":"jkshdkjahskd","time":"12:22:57 10-05-15"},{"user_id_send":1,"content":"jsjhdjaskhkjdahskjd","time":"12:23:05 10-05-15"},{"user_id_send":2,"content":"\\u1ebe, sao n\\u00f3 l\\u1ea1i nh\\u01b0 th\\u1ebf nh\\u1ec9?","time":"07:20:54 10-05-15"},{"user_id_send":2,"content":"D\\u0110M","time":"09:09:42 11-05-15"},{"user_id_send":1,"content":"EEk ","time":"09:10:03 11-05-15"},{"user_id_send":2,"content":"\\u00ea cu","time":"10:35:33 12-05-15"},{"user_id_send":1,"content":"what the fuck?","time":"10:37:04 12-05-15"},{"user_id_send":1,"content":"dsfgdfhb","time":"10:38:00 12-05-15"},{"user_id_send":2,"content":"sdghchdwj","time":"10:38:27 12-05-15"},{"user_id_send":1,"content":"hello","time":"10:39:03 12-05-15"},{"user_id_send":1,"content":"e cu","time":"10:40:19 12-05-15"},{"user_id_send":2,"content":"dfkjhksjdfkhsifj","time":"11:13:47 12-05-15"}]', '-1', '2015-05-10 03:00:53', '2015-05-12 04:13:53'),
(1, 3, '[{"user_id_send":3,"content":"ch\\u00e1t v\\u1edbi m\\u00e0y t\\u00ed nh\\u1ec9","time":"09:24:08 10-05-15"},{"user_id_send":3,"content":"ti\\u1ebfp n\\u00e0o","time":"09:24:12 10-05-15"},{"user_id_send":3,"content":"htjh","time":"09:28:46 10-05-15"},{"user_id_send":3,"content":"kjashdkjahsd","time":"09:55:52 10-05-15"},{"user_id_send":3,"content":"kkhsakdfhlsdlf","time":"11:24:04 10-05-15"},{"user_id_send":1,"content":"\\u00ea cu a \\u0111o","time":"07:46:52 11-05-15"},{"user_id_send":3,"content":"t \\u0111\\u00e2y","time":"07:54:28 11-05-15"}]', '-1', '2015-05-10 14:24:08', '2015-05-11 12:54:39'),
(1, 4, '[{"user_id_send":1,"content":"21312313","time":"01:45:07 15-05-15"},{"user_id_send":1,"content":"hello","time":"01:45:25 15-05-15"},{"user_id_send":1,"content":"asd","time":"01:45:30 15-05-15"},{"user_id_send":1,"content":"","time":"01:45:31 15-05-15"},{"user_id_send":1,"content":"asd","time":"01:45:33 15-05-15"},{"user_id_send":1,"content":"","time":"01:45:34 15-05-15"},{"user_id_send":1,"content":"","time":"01:45:35 15-05-15"},{"user_id_send":1,"content":"","time":"01:45:36 15-05-15"},{"user_id_send":1,"content":"asd","time":"01:45:38 15-05-15"},{"user_id_send":1,"content":"sdasd","time":"01:45:40 15-05-15"}]', '1', '2015-05-15 06:45:07', '2015-05-15 06:45:40'),
(1, 5, '[{"user_id_send":1,"content":"cho a l\\u00e0m quen nh\\u00e9","time":"12:09:48 12-05-15"},{"user_id_send":1,"content":"em \\u00eay","time":"12:17:05 12-05-15"},{"user_id_send":1,"content":"sdkjgfjfj","time":"11:21:51 12-05-15"},{"user_id_send":1,"content":"what the hell?","time":"03:13:08 12-05-15"},{"user_id_send":1,"content":"131233123","time":"07:22:56 15-05-15"}]', '1', '2015-05-11 17:09:48', '2015-05-15 00:22:56'),
(1, 6, '[{"user_id_send":6,"content":"con ma sao di the","time":"05:10:12 11-05-15"}]', '-1', '2015-05-11 10:10:12', '2015-05-11 12:52:10'),
(2, 3, '[{"user_id_send":3,"content":"Nguy\\u1ec5n V\\u0103n A ch\\u00e1t v\\u1edbi \\u0110\\u1eb7ng V\\u0103n \\u0110\\u1ea1i","time":"09:45:14 10-05-15"},{"user_id_send":3,"content":"skjdhajksd","time":"09:55:49 10-05-15"}]', '-1', '2015-05-10 14:45:14', '2015-05-11 12:25:37'),
(2, 5, '[{"user_id_send":2,"content":"jbsdmfbkswhfk dskufs","time":"11:21:39 12-05-15"}]', '-1', '2015-05-12 04:21:39', '2015-05-12 04:23:42'),
(4, 3, '[{"user_id_send":3,"content":"eek anh ch\\u01b0\\u01a1ng","time":"09:55:22 10-05-15"},{"user_id_send":3,"content":"\\u1ea1hdaksd","time":"09:55:25 10-05-15"},{"user_id_send":3,"content":"akjshdasd","time":"09:55:29 10-05-15"},{"user_id_send":3,"content":"ksjhdkjfasdf","time":"09:55:38 10-05-15"},{"user_id_send":3,"content":"akjshdasd","time":"09:55:45 10-05-15"},{"user_id_send":3,"content":"akjshdasd","time":"09:55:46 10-05-15"}]', '-1', '2015-05-10 14:55:22', '2015-05-11 12:33:12'),
(27, 2, '[{"user_id_send":27,"content":"123123123","time":"07:00:39 13-05-15"},{"user_id_send":27,"content":"","time":"07:00:41 13-05-15"},{"user_id_send":27,"content":"21312313","time":"07:00:44 13-05-15"}]', '-1', '2015-05-13 12:00:39', '2015-05-13 12:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `list_like` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_on_user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_file_id` int(11) DEFAULT '0',
  `is_have_image` int(11) DEFAULT '0',
  `categories` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='chứa bài đăng lên cần lưu, sẽ lưu status dưới dạng json. cấu trúc có thể là: user_id.user_name.content_status.user_id.user_name.content_comment....';

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `list_like`, `content`, `post_on_user_id`, `created_at`, `updated_at`, `comment`, `image_file_id`, `is_have_image`, `categories`) VALUES
(127, 1, NULL, 'luc duong<div><br></div>', 1, '2015-05-16 02:40:52', '2015-05-16 02:40:52', '', 0, 0, 1),
(128, 1, NULL, '21', 1, '2015-05-16 02:41:00', '2015-05-16 05:22:29', '[{"user_id":1,"user_name":"Mada94","content":"31231","time":"09:41:03 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:45 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:47 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:48 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:48 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:48 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:48 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:51 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:53 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:54 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:54 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:54 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:54 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:55 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:55 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:55 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"undefined","time":"11:46:55 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"123123","time":"11:47:10 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"123","time":"11:47:14 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"23123","time":"11:47:15 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"31231232","time":"11:47:17 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"1233123","time":"11:47:18 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"<div><br><\\/div><div><br><\\/div><div><br><\\/div><div><br><\\/div><div><br><\\/div>","time":"11:48:18 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"23123","time":"11:48:20 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"123","time":"12:22:29 16-05-15"}]', 40, 1, 1),
(129, 1, NULL, '23123', 1, '2015-05-16 05:22:40', '2015-05-16 05:22:40', '', 0, 0, 1),
(130, 1, NULL, '123123', 1, '2015-05-16 05:22:42', '2015-05-16 05:22:55', '[{"user_id":1,"user_name":"Mada94","content":"23123","time":"12:22:44 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"3123123","time":"12:22:55 16-05-15"}]', 0, 0, 1),
(131, 1, NULL, '123', 1, '2015-05-16 05:26:48', '2015-05-16 05:26:48', '', 0, 0, 1),
(132, 1, NULL, '3123123', 1, '2015-05-16 05:26:50', '2015-05-16 05:26:50', '', 0, 0, 1),
(133, 1, NULL, '231312', 1, '2015-05-16 05:26:51', '2015-05-16 05:26:51', '', 0, 0, 1),
(134, 1, NULL, '3', 1, '2015-05-16 05:26:51', '2015-05-16 05:26:51', '', 0, 0, 1),
(135, 1, NULL, '321', 1, '2015-05-16 05:26:52', '2015-05-16 05:26:52', '', 0, 0, 1),
(136, 1, NULL, '1', 1, '2015-05-16 05:26:52', '2015-05-16 05:26:52', '', 0, 0, 1),
(137, 1, NULL, '123', 1, '2015-05-16 05:26:52', '2015-05-16 05:26:52', '', 0, 0, 1),
(138, 1, NULL, '123', 1, '2015-05-16 05:26:53', '2015-05-16 05:26:53', '', 0, 0, 1),
(139, 1, NULL, '123', 1, '2015-05-16 05:26:53', '2015-05-16 05:26:53', '', 0, 0, 1),
(140, 1, NULL, '1231', 1, '2015-05-16 05:26:55', '2015-05-16 05:26:55', '', 0, 0, 1),
(141, 1, NULL, '1231', 1, '2015-05-16 05:26:56', '2015-05-16 05:26:56', '', 0, 0, 1),
(142, 1, NULL, '123123', 1, '2015-05-16 05:27:28', '2015-05-16 06:23:40', '[{"user_id":1,"user_name":"Mada94","content":"12313","time":"01:12:39 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"fslfjsflsajflskjfasf","time":"01:13:13 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"123123123","time":"01:18:50 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"13123","time":"01:18:52 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"12313123","time":"01:18:54 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"123123123","time":"01:18:55 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"23123123","time":"01:18:56 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"1231","time":"01:18:57 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"1231<div>23<\\/div>","time":"01:18:57 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"23","time":"01:18:57 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"1","time":"01:18:57 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"23","time":"01:18:58 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"23","time":"01:18:58 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"1","time":"01:18:58 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"3","time":"01:18:58 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"12","time":"01:18:58 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"3333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333","time":"01:19:02 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"11111111111111111111111111111111111111111111111111111111111111111111111111111","time":"01:23:33 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"<span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span><span style=\\"color: rgb(51, 51, 51); line-height: 22px; background-color: rgb(246, 246, 246);\\">11111111111111111111111111111111<\\/span>","time":"01:23:40 16-05-15"}]', 42, 1, 1),
(143, 1, NULL, '<div id="post_content" style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF</div>', 1, '2015-05-16 06:38:17', '2015-05-16 06:38:17', '', 0, 0, 1),
(144, 1, NULL, '<span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF</span>', 1, '2015-05-16 06:40:30', '2015-05-16 06:40:30', '', 0, 0, 1),
(145, 1, NULL, 'display:display:inline-block;display:inline-block;display:inline-block;display:inline-block;inline-block;display:inline-block;display:inline-block;display:inline-block;display:inline-block;', 1, '2015-05-16 06:43:07', '2015-05-16 06:43:13', '[{"user_id":1,"user_name":"Mada94","content":"display:inline-block;display:inline-block;display:inline-block;display:inline-block;display:inline-block;display:inline-block;display:inline-block;display:inline-block;display:inline-block;display:inline-block;","time":"01:43:13 16-05-15"}]', 0, 0, 1),
(146, 1, NULL, '123123123123123', 1, '2015-05-16 06:45:23', '2015-05-16 06:45:23', '', 0, 0, 1),
(147, 1, NULL, '123123123123123', 1, '2015-05-16 06:45:23', '2015-05-16 06:45:23', '', 0, 0, 1),
(148, 1, NULL, '<span style="font-weight: 700; color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;"><img src="http://localhost/index/demo/public/uploads/images/1_1431744683_blue_tailed_damselfly-wallpaper-1366x768.jpg" alt="logo" class="img-rounded img-responsive" style="margin-top: -5px; margin-right: 5px; margin-left: -8px; height: 30px; width: 30px; float: left;">1312312312313<a href="http://localhost/index/demo/public/users/1"></a></span><a href="http://localhost/index/demo/public/users/1"></a>', 1, '2015-05-16 06:45:33', '2015-05-16 07:13:15', '[{"user_id":1,"user_name":"Mada94","content":"asdasd","time":"01:48:14 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"123123","time":"01:55:33 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"<br>23123<br>","time":"01:58:35 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"123123","time":"01:58:38 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"ta van loi","time":"01:59:34 16-05-15"},{"user_id":1,"user_name":"Mada94","content":"12312313","time":"02:13:15 16-05-15"}]', 0, 0, 1),
(149, 1, NULL, '3123123122123123123123123312312312212312312312312331231231221231231231231233123123122123123123123123312312312212312312312312331231231221231231231231233123123122123123123123123312312312212312312312312331231231221231231231231233123123122123123123123123312312312212312312312312331231231221231231231231233123123122123123123123123312312312212312312312312331231231221231231231231233123123122123123123123123312312312212312312312312331231231221231231231231233123123122123123123123123', 1, '2015-05-16 07:13:28', '2015-05-16 07:13:28', '', 0, 0, 1),
(150, 1, NULL, '<span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">3123123312312312212312312312312331231231221231231231231</span>', 1, '2015-05-16 07:13:44', '2015-05-16 07:13:44', '', 0, 0, 1),
(151, 1, NULL, '<span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">display:display:inline-block;di</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">display:display:inline-block;di</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">display:display:inline-block;di</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">display:display:inline-block;di</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">display:display:inline-block;di</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">display:display:inline-block;div</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">display:display:inline-block;di</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">display:display:inline-block;di</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">display:display:inline-block;di</span><span style="color: rgb(51, 51, 51); font-size: 12px; line-height: 22px;">display:display:inline-block;div</span>', 1, '2015-05-16 07:14:08', '2015-05-16 07:14:08', '', 0, 0, 1),
(152, 1, NULL, '<span class="value" style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">', 1, '2015-05-16 07:16:17', '2015-05-16 07:16:17', '', 0, 0, 1),
(153, 1, NULL, '<span style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">tavanloi</span><span style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">tavanloi</span><span style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">tavanloi</span><span style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">tavanloi</span><span style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">tavanloi</span><span style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">tavanloi</span><span style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">tavanloi</span><span style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">tavanloi</span><span style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">tavanloi</span><span style="color: rgb(34, 34, 34); font-family: Consolas, ''Lucida Console'', monospace; font-size: 12px; line-height: normal;">tavanloi</span><br>', 1, '2015-05-16 07:16:28', '2015-05-16 07:16:28', '', 0, 0, 1),
(154, 1, NULL, 'asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdf', 1, '2015-05-16 07:17:15', '2015-05-16 07:17:15', '', 0, 0, 1),
(155, 1, NULL, 'toifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdljtoifsdfsdlj<div><br></div>', 1, '2015-05-16 07:17:54', '2015-05-16 07:17:54', '', 0, 0, 1),
(156, 1, NULL, '3123123312312331231233123123312312331231233123123312312331231233123123312312331231233123123312312331231233123123312312331231233123123312312331231233123123312312331231233123123', 1, '2015-05-16 07:25:21', '2015-05-16 07:25:21', '', 0, 0, 1),
(157, 1, NULL, '123123', 1, '2015-05-16 07:58:05', '2015-05-16 07:58:05', '', 0, 0, 1),
(158, 27, NULL, 'dasddasddasddasddasddasddasddasddasdv', 27, '2015-05-16 11:16:17', '2015-05-16 11:28:41', '[{"user_id":27,"user_name":"tavanloi","content":"sdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfsdfasdfasdfvvvvv","time":"06:28:41 16-05-15"}]', 0, 0, 1),
(159, 27, NULL, 'dasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasd', 27, '2015-05-16 11:17:21', '2015-05-16 11:17:21', '', 0, 0, 1),
(160, 27, NULL, 'dasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasddasd', 27, '2015-05-16 11:17:22', '2015-05-16 11:17:22', '', 0, 0, 1),
(161, 27, NULL, '3123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232', 27, '2015-05-16 11:18:56', '2015-05-16 11:18:56', '', 43, 1, 1),
(162, 27, NULL, '3123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232312323123231232', 27, '2015-05-16 11:18:59', '2015-05-16 11:18:59', '', 0, 0, 1),
(163, 27, NULL, 'asd', 27, '2015-05-16 11:19:15', '2015-05-16 11:23:28', '[{"user_id":27,"user_name":"tavanloi","content":"123123123123","time":"06:23:28 16-05-15"}]', 0, 0, 1),
(164, 27, NULL, '312313123131231312313123131231312313123131231312313123131231312313123131231312313123131231312313123131231312313123131231312313123131231312313123131231312313123131231vv', 27, '2015-05-16 11:23:41', '2015-05-16 11:23:41', '', 0, 0, 1),
(165, 27, NULL, 'sfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfv', 27, '2015-05-16 11:26:48', '2015-05-16 11:26:48', '', 0, 0, 1),
(166, 27, NULL, 'sfadsfsfadsfsfadsfsfadsfsfadsfsfadsffassfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfsfadsfv', 27, '2015-05-16 11:26:57', '2015-05-16 11:26:57', '', 0, 0, 1),
(167, 27, NULL, 'sfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdfsfsafasdf', 27, '2015-05-16 11:30:12', '2015-05-16 11:30:12', '', 0, 0, 1),
(168, 27, NULL, 'heelo<div><br></div>', 27, '2015-05-16 11:30:33', '2015-05-16 11:36:14', '[{"user_id":27,"user_name":"tavanloi","content":"fasfasdf","time":"06:31:46 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"<span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span><span style=\\"line-height: 16.3636360168457px;\\">21341234234<\\/span>","time":"06:36:14 16-05-15"}]', 0, 0, 1),
(169, 27, NULL, 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffvvv<div><br></div>', 27, '2015-05-16 11:36:32', '2015-05-16 11:36:38', '[{"user_id":27,"user_name":"tavanloi","content":"<span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdf<\\/span><span style=\\"line-height: 16.3636360168457px;\\">asdfasdfsdfasdfv<\\/span>","time":"06:36:38 16-05-15"}]', 0, 0, 1),
(170, 27, NULL, '13123', 27, '2015-05-16 11:39:02', '2015-05-16 11:39:02', '', 0, 0, 1),
(171, 27, NULL, '123123123', 27, '2015-05-16 11:41:10', '2015-05-16 11:42:26', '[{"user_id":27,"user_name":"tavanloi","content":"213123123","time":"06:42:26 16-05-15"}]', 0, 0, 1),
(172, 27, NULL, 'fasdfasdf', 27, '2015-05-16 11:41:42', '2015-05-16 11:41:42', '', 0, 0, 1),
(173, 27, NULL, 'fasdfasdf', 27, '2015-05-16 11:41:45', '2015-05-16 11:42:31', '[{"user_id":27,"user_name":"tavanloi","content":"23123123","time":"06:42:31 16-05-15"}]', 0, 0, 1),
(174, 27, NULL, '12312313<div>12312313</div>', 27, '2015-05-16 11:42:35', '2015-05-16 11:44:38', '[{"user_id":27,"user_name":"tavanloi","content":"3123123123","time":"06:43:20 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"1212","time":"06:44:38 16-05-15"}]', 0, 0, 1),
(175, 27, NULL, '123123<div><br></div>', 27, '2015-05-16 11:43:26', '2015-05-16 11:43:26', '', 0, 0, 1),
(176, 27, NULL, '4123412341234', 27, '2015-05-16 11:45:12', '2015-05-16 11:45:12', '', 0, 0, 1),
(177, 27, NULL, '23123123', 27, '2015-05-16 11:51:15', '2015-05-16 11:51:37', '[{"user_id":27,"user_name":"tavanloi","content":"123132","time":"06:51:18 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"123123","time":"06:51:20 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"2","time":"06:51:20 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"3","time":"06:51:20 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"3<br>123<br>","time":"06:51:20 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"1","time":"06:51:21 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"31","time":"06:51:21 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"23","time":"06:51:21 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"123","time":"06:51:21 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"1","time":"06:51:21 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"12","time":"06:51:21 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"3","time":"06:51:21 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"3","time":"06:51:22 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"23","time":"06:51:22 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"12","time":"06:51:22 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"1","time":"06:51:22 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"3","time":"06:51:22 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"23","time":"06:51:22 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"23<br>12<br>","time":"06:51:23 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"23","time":"06:51:23 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"123","time":"06:51:23 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"123<br>12<br>","time":"06:51:23 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"1","time":"06:51:23 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"12","time":"06:51:24 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"3","time":"06:51:24 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"13123","time":"06:51:32 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"12","time":"06:51:33 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"12<br>31<br>","time":"06:51:33 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"3","time":"06:51:33 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"3<br>1<br>","time":"06:51:33 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"1","time":"06:51:33 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"23","time":"06:51:34 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"1","time":"06:51:34 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"1","time":"06:51:34 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"31313123sfsfsjflksdjflksadjflsakdfjasldfkjsadflksajdf;lksadfjas;lkfd","time":"06:51:37 16-05-15"}]', 0, 0, 1),
(178, 27, NULL, '13123fjsdflksjflaskdfjlksfjslkdfjslfjslfjsflkjsdf', 2, '2015-05-16 11:51:57', '2015-05-16 11:52:03', '[{"user_id":27,"user_name":"tavanloi","content":"4123412412341234","time":"06:52:00 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"123412341341234","time":"06:52:02 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"214","time":"06:52:02 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"214<br>2<br>","time":"06:52:02 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"4312","time":"06:52:02 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"34","time":"06:52:02 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"234","time":"06:52:03 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"12","time":"06:52:03 16-05-15"}]', 0, 0, 1),
(179, 27, NULL, 'asfasfsa<div>dfas</div><div>fa</div><div>sf</div><div>asfasdfasfd</div>', 2, '2015-05-16 11:52:07', '2015-05-16 11:52:13', '[{"user_id":27,"user_name":"tavanloi","content":"sdfasdf","time":"06:52:11 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"sdfasdf<br>sadf<br>","time":"06:52:12 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"as","time":"06:52:12 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"df","time":"06:52:12 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"df","time":"06:52:12 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"d","time":"06:52:12 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"d<br>f<br>","time":"06:52:12 16-05-15"},{"user_id":27,"user_name":"tavanloi","content":"fd","time":"06:52:13 16-05-15"}]', 0, 0, 1),
(180, 27, NULL, '<span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asf</span><span style="color: rgb(51, 51, 51); line-height: 22px;">as</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span><span style="color: rgb(51, 51, 51); line-height: 22px;">asfasfsa</span>', 27, '2015-05-16 13:00:02', '2015-05-16 13:00:02', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brithday` date DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'http://localhost/index/demo/public/images/face.jpg',
  `avatar_file_id` int(11) DEFAULT NULL,
  `banner_file_id` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `hobby` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `age_interested` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intent` text COLLATE utf8mb4_unicode_ci,
  `gender` int(2) NOT NULL DEFAULT '1',
  `telephone_number` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='bảng chứa thông tin người sử dụng, account';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `user_name`, `brithday`, `address`, `job`, `profile_picture`, `avatar_file_id`, `banner_file_id`, `height`, `weight`, `hobby`, `description`, `age_interested`, `intent`, `gender`, `telephone_number`, `created_at`, `updated_at`) VALUES
(1, 'duongvanluc94@gmail.com', 'duong', 'Mada94', '2015-04-13', 'Hà Nam', 'Sinh Viên năm 3', 'http://localhost/index/demo/public/images/face.jpg', 41, NULL, NULL, NULL, '123412341234', NULL, NULL, NULL, 0, 13123, '2015-04-26 09:35:04', '2015-04-26 09:35:04'),
(2, 'daikk115@gmail.com', '123', 'Đại Đẹp Trai', '1994-05-11', 'Hà Tĩnh', 'Kỹ Sư WEB', 'http://localhost/index/demo/public/images/face1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2015-04-30 17:00:00', '2015-04-30 17:00:00'),
(3, 'ABC@GMAIL.COM', '123', 'Nguyễn Văn Anh', '1994-07-19', 'Hà Tây', 'Sinh Viên', 'http://localhost/index/demo/public/images/face2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2015-05-01 09:25:42', '2015-05-01 09:25:42'),
(4, 'chuong@gmail.com', '123', 'Nguyễn Viết CHương', '2015-05-14', 'Hà Tĩnh', 'Sắp ra trường', 'http://localhost/index/demo/public/images/face3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2015-05-01 11:13:07', '2015-05-01 11:13:07'),
(5, 'ngan@gmail.com', '123', 'Kim Ngân', '1995-01-12', 'Hà Tĩnh', 'Sinh Viên năm 2', 'http://localhost/index/demo/public/images/face4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2015-05-01 18:19:06', '2015-05-01 18:19:06'),
(6, 'kien@gmail.com', '123', 'Nguyễn Tuấn Kiên\r\n', '2015-05-09', 'Hà Nội', 'Sinh Viên năm 2', 'http://localhost:7070/social_network/public/images/face.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2015-05-04 07:53:03', '2015-05-04 07:53:03'),
(11, 'timelord@gmail.com', 'timelord', 'time lord', NULL, '', '', 'http://localhost:7070/social_network/public/images/face.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2015-05-12 09:40:49', '2015-05-12 09:40:49'),
(26, 'quach@gmail.com', 'quach', 'Quách Tỉnh', NULL, '', '', 'http://localhost/index/demo/public/images/face.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2015-05-12 11:50:22', '2015-05-12 11:50:22'),
(27, '1', '1', 'tavanloi', NULL, '', '', 'http://localhost/index/demo/public/images/face.jpg', 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2015-05-13 08:34:43', '2015-05-13 08:34:43');

-- --------------------------------------------------------

--
-- Structure for view `full_post`
--
DROP TABLE IF EXISTS `full_post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `full_post` AS select `user`.`user_id` AS `user_id`,`user`.`user_name` AS `user_name`,`post`.`updated_at` AS `updated_at`,`post`.`content` AS `content`,`post`.`list_like` AS `list_like`,`post`.`comment` AS `comment`,`post`.`post_id` AS `post_id`,`post`.`is_have_image` AS `is_have_image`,`post`.`image_file_id` AS `image_file_id`,`post`.`post_on_user_id` AS `post_on_user_id` from (`user` join `post`) where (`user`.`user_id` = `post`.`user_id`) order by `post`.`updated_at` desc;

-- --------------------------------------------------------

--
-- Structure for view `list_request`
--
DROP TABLE IF EXISTS `list_request`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_request` AS select `friend`.`user_id1` AS `user_id1`,`user`.`user_name` AS `user_name`,`friend`.`user_id2` AS `user_id2` from (`friend` join `user`) where ((`friend`.`user_id1` = `user`.`user_id`) and (`friend`.`relationship` = 0));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`comment_id`), ADD UNIQUE KEY `status_id_UNIQUE` (`post_id`);

--
-- Indexes for table `comment_image`
--
ALTER TABLE `comment_image`
 ADD PRIMARY KEY (`comment_image_id`), ADD UNIQUE KEY `image_id_UNIQUE` (`image_id`), ADD KEY `fk_userid_im_idx` (`user_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
 ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
 ADD PRIMARY KEY (`user_id1`,`user_id2`), ADD KEY `fk_userid2_idx` (`user_id2`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
 ADD PRIMARY KEY (`image_id`), ADD KEY `fk_userid_idx` (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`session_id`), ADD KEY `user_id` (`user_id`,`time_login`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`user_id_sent`,`user_id_recieve`), ADD KEY `fk_userid2_idx` (`user_id_recieve`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`post_id`), ADD KEY `fk_userid_st_idx` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `comment_image`
--
ALTER TABLE `comment_image`
ADD CONSTRAINT `fk_imageid_cm` FOREIGN KEY (`image_id`) REFERENCES `image` (`image_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_userid_im` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
ADD CONSTRAINT `fk_userid1` FOREIGN KEY (`user_id1`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_userid2` FOREIGN KEY (`user_id2`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
ADD CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
ADD CONSTRAINT `fk_userid1_ms` FOREIGN KEY (`user_id_sent`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_userid2_ms` FOREIGN KEY (`user_id_recieve`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
ADD CONSTRAINT `fk_userid_st` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
