-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2018 at 02:10 AM
-- Server version: 5.6.32-78.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eshoppe4_dazz`
--

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `mailaddress` longtext NOT NULL,
  `password` varchar(255) NOT NULL,
  `port` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `host`, `mailaddress`, `password`, `port`, `created_at`, `updated_at`) VALUES
(1, 'mail.imarasoft.net', 'dazz@imarasoft.net', 'Dazz@123', '143', '0000-00-00 00:00:00', '2017-04-05 11:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE IF NOT EXISTS `login_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(350) NOT NULL,
  `logintime` varchar(550) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `ip_address`, `logintime`, `created_at`, `updated_at`) VALUES
(1, 8, '66.147.244.92', '03/27/2018 12:01:42 pm', '2018-03-27 18:01:42', '2018-03-27 18:01:42'),
(2, 19, '66.147.244.92', '03/27/2018 12:08:51 pm', '2018-03-27 18:08:51', '2018-03-27 18:08:51'),
(3, 8, '66.147.244.92', '03/27/2018 04:33:48 pm', '2018-03-27 22:33:48', '2018-03-27 22:33:48'),
(4, 8, '66.147.244.92', '03/28/2018 09:04:50 am', '2018-03-28 15:04:50', '2018-03-28 15:04:50'),
(5, 19, '66.147.244.92', '03/28/2018 09:17:30 am', '2018-03-28 15:17:30', '2018-03-28 15:17:30'),
(6, 8, '66.147.244.92', '03/28/2018 09:17:42 am', '2018-03-28 15:17:42', '2018-03-28 15:17:42'),
(7, 8, '66.147.244.92', '03/28/2018 09:20:10 am', '2018-03-28 15:20:10', '2018-03-28 15:20:10'),
(8, 8, '66.147.244.92', '03/28/2018 09:42:18 am', '2018-03-28 15:42:18', '2018-03-28 15:42:18'),
(9, 8, '66.147.244.92', '03/28/2018 11:09:29 am', '2018-03-28 17:09:29', '2018-03-28 17:09:29'),
(10, 8, '66.147.244.92', '03/29/2018 05:15:44 am', '2018-03-29 11:15:44', '2018-03-29 11:15:44'),
(11, 8, '66.147.244.92', '03/29/2018 08:21:01 am', '2018-03-29 14:21:01', '2018-03-29 14:21:01'),
(12, 8, '66.147.244.92', '03/29/2018 01:59:00 pm', '2018-03-29 19:59:00', '2018-03-29 19:59:00'),
(13, 8, '66.147.244.92', '03/30/2018 04:04:18 am', '2018-03-30 10:04:18', '2018-03-30 10:04:18'),
(14, 8, '66.147.244.92', '03/30/2018 04:51:04 am', '2018-03-30 10:51:04', '2018-03-30 10:51:04'),
(15, 8, '66.147.244.92', '03/30/2018 05:35:57 am', '2018-03-30 11:35:57', '2018-03-30 11:35:57'),
(16, 8, '66.147.244.92', '03/30/2018 07:56:32 am', '2018-03-30 13:56:32', '2018-03-30 13:56:32'),
(17, 8, '66.147.244.92', '04/02/2018 04:22:05 am', '2018-04-02 10:22:05', '2018-04-02 10:22:05'),
(18, 8, '66.147.244.92', '04/02/2018 07:53:43 am', '2018-04-02 13:53:43', '2018-04-02 13:53:43'),
(19, 8, '66.147.244.92', '04/02/2018 10:43:09 am', '2018-04-02 16:43:09', '2018-04-02 16:43:09'),
(20, 8, '66.147.244.92', '04/02/2018 11:16:41 am', '2018-04-02 17:16:41', '2018-04-02 17:16:41'),
(21, 8, '66.147.244.92', '04/02/2018 12:24:33 pm', '2018-04-02 18:24:33', '2018-04-02 18:24:33'),
(22, 8, '66.147.244.92', '04/02/2018 12:25:05 pm', '2018-04-02 18:25:05', '2018-04-02 18:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `note_history`
--

CREATE TABLE IF NOT EXISTS `note_history` (
  `id` int(11) NOT NULL,
  `orderitem_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `note` longtext NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note_history`
--

INSERT INTO `note_history` (`id`, `orderitem_id`, `users_id`, `note`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 8, 'This is test image for staff assign', '2017-03-31 06:00:00', 0, '2017-03-31 22:59:33', '2017-04-05 16:28:02'),
(2, 6, 8, 'Roshan Test 2', '2017-03-31 06:00:00', 0, '2017-03-31 23:06:35', '2018-03-19 18:37:52'),
(3, 6, 8, 'Small deferent test', '2017-03-31 06:00:00', 0, '2017-03-31 23:12:53', '2018-03-19 18:37:52'),
(4, 7, 8, 'test', '2017-04-04 06:00:00', 0, '2017-04-04 13:19:41', '2017-04-04 13:21:35'),
(5, 7, 18, 'hgfhgfhgfjg', '2017-04-04 07:21:42', 0, '2017-04-04 13:21:42', '2017-05-05 17:26:49'),
(6, 8, 8, 'iaiaiiiiaiaiiiiiaiaiaiaiaiii', '2017-04-04 06:00:00', 0, '2017-04-04 13:35:46', '2017-04-04 13:42:27'),
(7, 8, 18, 'kfskfhkhfkhfkhfkhfkh', '2017-04-04 07:42:33', 0, '2017-04-04 13:42:33', '2017-04-04 13:49:29'),
(8, 5, 8, 'mnvmnvnmnmvnm', '2017-04-04 06:00:00', 0, '2017-04-04 13:48:23', '2017-04-05 16:28:02'),
(9, 5, 20, 'nnmnmvnmvnmvnm', '2017-04-04 07:53:51', 0, '2017-04-04 13:53:51', '2017-04-24 14:42:56'),
(10, 10, 8, 'Good luck\r\n', '2017-04-04 06:00:00', 0, '2017-04-04 15:27:44', '2018-03-15 13:30:41'),
(11, 10, 8, 'aNOTHER COMMENT\r\n', '2017-04-04 09:30:15', 0, '2017-04-04 15:30:15', '2018-03-15 13:30:41'),
(12, 10, 8, 'pls do ', '2017-04-04 06:00:00', 0, '2017-04-04 15:33:47', '2018-03-15 13:30:41'),
(13, 10, 8, 'The tree should be more precise\r\n', '2017-04-04 06:00:00', 0, '2017-04-04 15:42:04', '2018-03-15 13:30:41'),
(14, 11, 8, 'aaaaaaaaaaaaaaaaaallllllllllllllllllllllllllllllll', '2017-04-05 06:00:00', 0, '2017-04-05 14:27:56', '2017-04-05 14:28:30'),
(15, 11, 21, 'llllllllllllllllaaaaaaaaaaaaaa', '2017-04-05 08:28:36', 0, '2017-04-05 14:28:36', '2018-04-02 14:02:30'),
(16, 5, 8, 'pls do it', '2017-04-05 06:00:00', 0, '2017-04-05 16:26:46', '2017-04-05 16:28:02'),
(17, 4, 18, 'Nice work', '2017-04-18 08:06:13', 0, '2017-04-18 14:06:13', '2017-10-30 20:46:29'),
(18, 64, 8, 'Test shasitha', '2017-10-30 06:00:00', 1, '2017-10-30 18:55:00', '2017-10-30 18:55:00'),
(19, 9, 8, 'testtttttttt', '2018-03-14 06:00:00', 0, '2018-03-14 15:40:11', '2018-03-14 15:41:27'),
(20, 11, 8, 'pls modify ', '2018-03-15 06:00:00', 1, '2018-03-15 10:54:14', '2018-03-15 10:54:14'),
(21, 10, 8, 'pls modify ', '2018-03-15 06:00:00', 0, '2018-03-15 10:54:31', '2018-03-15 13:30:41'),
(22, 75, 8, 'pls do ASAP', '2018-03-15 06:00:00', 0, '2018-03-15 13:16:29', '2018-03-15 15:40:35'),
(23, 5, 8, 'testttttttttttttttt', '2018-04-02 12:12:22', 1, '2018-04-02 18:12:22', '2018-04-02 18:12:22'),
(24, 50, 8, 'first test comment', '2018-04-02 12:19:39', 1, '2018-04-02 18:19:39', '2018-04-02 18:19:39'),
(25, 77, 8, 'kjkk', '2018-04-02 12:25:04', 1, '2018-04-02 18:25:04', '2018-04-02 18:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `create_date` varchar(150) NOT NULL,
  `need_by_date` varchar(150) NOT NULL,
  `address` longtext NOT NULL,
  `tel` varchar(555) NOT NULL,
  `web` varchar(1000) NOT NULL,
  `message` longtext NOT NULL,
  `frametype` varchar(250) DEFAULT NULL,
  `headlinetext` varchar(250) DEFAULT NULL,
  `file_name` varchar(1000) NOT NULL,
  `size` varchar(500) NOT NULL,
  `file_type` varchar(500) NOT NULL,
  `image_path` longtext NOT NULL,
  `output_image_path` longtext,
  `note` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_name`, `email`, `create_date`, `need_by_date`, `address`, `tel`, `web`, `message`, `frametype`, `headlinetext`, `file_name`, `size`, `file_type`, `image_path`, `output_image_path`, `note`, `created_at`, `updated_at`) VALUES
(4, 'Ulf order 1', 'unbehaun7@personello.com', '', '2017-04-28', 'Saarbrücken Hreg: 13583', '06841 / 979 142, Fax: 06841 979 215', 'Personello.com', 'The following section of this message contains a file attachment\r\nprepared for transmission using the Internet MIME message format.\r\nIf you are using Pegasus Mail, or any other MIME-compliant system,\r\nyou should be able to save it or view it from within your mailer.\r\nIf you cannot, please ask your system administrator for assistance.', NULL, NULL, 'Fotolia_56423594_M.jpg', '433812', 'image/jpeg', 'orderfiles/4/Fotolia_56423594_M.jpg', 'completefiles/4/Admin1490699966754.jpg', '', '2017-03-30 19:05:45', '2017-04-04 13:21:56'),
(5, 'Ulf order 2', 'unbehaun7@personello.com', '', '2017-04-29', 'Saarbrücken Hreg: 13583', '06841 / 979 142, Fax: 06841 979 215', 'Personello.com', 'The following section of this message contains a file attachment\r\nprepared for transmission using the Internet MIME message format.\r\nIf you are using Pegasus Mail, or any other MIME-compliant system,\r\nyou should be able to save it or view it from within your mailer.\r\nIf you cannot, please ask your system administrator for assistance.', NULL, NULL, 'Fotolia_5356354_S.jpg', '223142', 'image/jpeg', 'orderfiles/5/Fotolia_5356354_S.jpg', 'completefiles/5/orderfiles-5-Fotolia_5356354_S.jpg', '', '2017-03-30 19:08:06', '2017-04-05 16:28:39'),
(6, 'Ulf order 3', 'unbehaun7@personello.com', '', '2017-04-20', 'Saarbrücken Hreg: 13583', '06841 / 979 142, Fax: 06841 979 215', 'Personello.com', 'The following section of this message contains a file attachment\r\nprepared for transmission using the Internet MIME message format.\r\nIf you are using Pegasus Mail, or any other MIME-compliant system,\r\nyou should be able to save it or view it from within your mailer.\r\nIf you cannot, please ask your system administrator for assistance.', NULL, NULL, '02F18952.jpg', '8456754', 'image/jpeg', 'orderfiles/6/02F18952.jpg', 'completefiles/6/orderfiles-6-02F18952 finished.jpg', '', '2017-03-30 19:09:13', '2017-03-31 23:14:52'),
(7, 'Ulf order 4', 'unbehaun7@personello.com', '', '2017-04-22', 'Saarbrücken Hreg: 13583', '06841 / 979 142, Fax: 06841 979 215', 'Personello.com', 'The following section of this message contains a file attachment\r\nprepared for transmission using the Internet MIME message format.\r\nIf you are using Pegasus Mail, or any other MIME-compliant system,\r\nyou should be able to save it or view it from within your mailer.\r\nIf you cannot, please ask your system administrator for assistance.', NULL, NULL, 'DZ_Dog.jpg', '5522481', 'image/jpeg', 'orderfiles/7/DZ_Dog.jpg', NULL, '', '2017-03-30 19:10:16', '2017-03-30 19:10:16'),
(8, 'mohamed ihjas', 'ihjas@gmail.com', '', '2017-04-04', 'kandalkuda ', '123456', 'google.com', 'bs,b,sbm,sbm,sbm,sb,mbm,bm,dbs,m', NULL, NULL, 'specialist-512.png', '29430', 'image/png', 'orderfiles/8/specialist-512.png', 'completefiles/8/specialist-512.png', '', '2017-04-04 13:31:54', '2017-04-04 13:43:13'),
(9, 'Rilwan', 'rilwan@gmail.com', '', '2017-05-17', 'Colombo', '0712067575', 'www.rilwan.lk', '', NULL, NULL, '10641120_1529228537338729_192732457284151558_n.jpg', '74326', 'image/jpeg', 'orderfiles/9/10641120_1529228537338729_192732457284151558_n.jpg', 'completefiles/9/a-amazing_forest_background.jpg', '', '2017-04-04 15:12:42', '2018-03-14 15:41:50'),
(10, 'Bill', 'uu1@personello.com', '', '2017-04-11', 'Teststreet 1\r\nComombo', '000', '', 'Please cut out the tree', NULL, NULL, '330px-Ash_Tree_-_geograph.org.uk_-_590710.jpg', '47844', 'image/jpeg', 'orderfiles/10/330px-Ash_Tree_-_geograph.org.uk_-_590710.jpg', 'completefiles/10/330px-Ash_Tree_-_geograph.org.uk_-_590710.jpg', '', '2017-04-04 15:24:59', '2017-04-04 15:45:26'),
(11, 'alex ', 'alex@gmail.com', '', '2017-04-11', 'lalalalalallalala', '000111222', 'google.com', 'asasasasasasasasasasas', NULL, NULL, '5.png', '30694', 'image/png', 'orderfiles/11/5.png', 'completefiles/11/self-icon-for-dribbble.png', '', '2017-04-05 14:25:57', '2017-04-05 14:28:58'),
(12, 'New order', 'rilwanhnd20@gmail.com', '', '2017-04-29', 'Puttalam', '0712067576', '', '', NULL, NULL, '15727267_858659604272690_8913150594745470199_n.jpg', '76998', 'image/jpeg', 'orderfiles/12/15727267_858659604272690_8913150594745470199_n.jpg', NULL, 'No time', '2017-04-19 14:40:35', '2017-04-19 14:54:37'),
(13, 'Rilwan Test Order', 'rilwanhnd20@gmail.com', '', '2017-04-29', 'Puttalam', '0712067576', '', '', NULL, NULL, '8d28223ed31318668aa9729cc9cc1951.jpg', '10129', 'image/jpeg', 'orderfiles/13/8d28223ed31318668aa9729cc9cc1951.jpg', NULL, '', '2017-04-24 11:33:58', '2017-04-24 11:33:58'),
(50, '', 'unbehaun7@personello.com', '', '', '', '', '', '', NULL, NULL, '20170327_103746.jpg', '', '', 'orderfiles/50/20170327_103746.jpg', NULL, '', '2017-04-28 10:55:07', '2017-04-28 10:55:07'),
(51, '', 'rilwanhnd20@gmail.com', '', '', '', '', '', '', NULL, NULL, 'c960fdda12ae9610623b9e192aa59d09.jpg', '', '', 'orderfiles/51/c960fdda12ae9610623b9e192aa59d09.jpg', NULL, 'no', '2017-04-28 10:55:07', '2017-05-03 17:55:54'),
(52, '', 'unbehaun7@personello.com', '', '', '', '', '', '', NULL, NULL, '20170327_103746.jpg', '', '', 'orderfiles/52/20170327_103746.jpg', NULL, 'test cancel order ', '2017-05-02 15:11:27', '2017-05-03 17:56:22'),
(53, 'Shasitha', 'shasifernando@personello.com', '', '2017-10-31', '180C, Borella Mill Road, Wennappuwa.', '+94776293698', '', 'I need this ontime', NULL, NULL, 'Ulf Unbehaun.jpg', '182859', 'image/jpeg', 'orderfiles/53/Ulf Unbehaun.jpg', NULL, 'just for test', '2017-10-30 18:47:45', '2017-10-30 18:48:54'),
(54, '', 'rilwanhnd20@gmail.com', '', '', '', '', '', '', NULL, NULL, 'orderfiles-4-Fotolia_56423594_M (1).jpg', '', '', 'orderfiles/54/orderfiles-4-Fotolia_56423594_M (1).jpg', NULL, '', '2018-03-14 11:46:52', '2018-03-14 11:46:52'),
(62, '', 'rilwanhnd20@gmail.com', '', '', '', '', '', '', NULL, NULL, '330px-Ash_Tree_-_geograph.org.uk_-_590710.jpg,4b001c363f3f7a042802632c002a53e9.jpg,', '', '', 'orderfiles/62/330px-Ash_Tree_-_geograph.org.uk_-_590710.jpg,orderfiles/62/4b001c363f3f7a042802632c002a53e9.jpg,', 'completefiles/62/Windows-10-Forest-Wallpaper-HD.jpg,completefiles/62/windows-10-wallpaper-free-download (38).jpg,', '', '2018-03-14 15:05:28', '2018-03-15 11:41:37'),
(64, '', 'rilwanhnd20@gmail.com', '', '', '', '', '', '', 'Frame-Gold', 'Family 2018', 'b081fc9380a7d277d78b6dea75fe1d6f.jpg,8d28223ed31318668aa9729cc9cc1951.jpg,c960fdda12ae9610623b9e192aa59d09.jpg,', '', '', 'orderfiles/64/b081fc9380a7d277d78b6dea75fe1d6f.jpg,orderfiles/64/8d28223ed31318668aa9729cc9cc1951.jpg,orderfiles/64/c960fdda12ae9610623b9e192aa59d09.jpg,', 'completefiles/75/8d28223ed31318668aa9729cc9cc1951.jpg,completefiles/75/b081fc9380a7d277d78b6dea75fe1d6f.jpg,completefiles/75/c960fdda12ae9610623b9e192aa59d09.jpg,', '', '2018-03-15 12:53:36', '2018-03-15 15:46:53'),
(65, 'Ulf', 'uu1@personello.com', '', '2018-03-29', '0', '0', '', 'Test Ulf', NULL, NULL, '', '', '', '', NULL, '', '2018-03-19 21:52:36', '2018-03-19 21:52:36'),
(66, 'rilwan', 'rilwanhnd20@gmail.com', '', '2018-03-30', 'sri', '074526586', '', '', NULL, NULL, '16730313_1306199702759998_6969982465748086900_n.jpg', '36822', 'image/jpeg', 'orderfiles/66/16729009_1306199486093353_3159272428911700088_n.jpg,orderfiles/66/16730313_1306199702759998_6969982465748086900_n.jpg,', NULL, '', '2018-03-20 11:07:59', '2018-03-20 11:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE IF NOT EXISTS `orderitem` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `userrole_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`id`, `order_id`, `userrole_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, 1, 2, '2017-03-30 19:05:45', '2017-04-18 14:01:32'),
(5, 5, 3, 2, '2017-03-30 19:08:06', '2018-03-14 11:10:16'),
(6, 6, 5, 4, '2017-03-30 19:09:13', '2017-03-31 23:14:52'),
(7, 7, 4, 1, '2017-03-30 19:10:16', '2017-04-24 14:38:08'),
(8, 8, 1, 4, '2017-04-04 13:31:54', '2017-04-04 13:43:13'),
(9, 9, 3, 4, '2017-04-04 15:12:42', '2018-03-14 15:41:50'),
(10, 10, 1, 1, '2017-04-04 15:24:59', '2018-03-15 10:54:31'),
(11, 11, 2, 1, '2017-04-05 14:25:57', '2018-03-15 10:54:14'),
(12, 12, 1, 3, '2017-04-19 14:40:35', '2017-04-19 14:54:37'),
(13, 13, 1, 0, '2017-04-24 11:33:58', '2017-04-24 11:33:58'),
(14, 14, 1, 0, '2017-04-27 10:55:08', '2017-04-27 10:55:08'),
(15, 15, 4, 0, '2017-04-27 10:55:08', '2017-04-27 10:55:08'),
(16, 16, 1, 0, '2017-04-27 10:59:13', '2017-04-27 10:59:13'),
(17, 17, 4, 0, '2017-04-27 10:59:13', '2017-04-27 10:59:13'),
(18, 18, 1, 0, '2017-04-27 10:59:14', '2017-04-27 10:59:14'),
(19, 19, 4, 0, '2017-04-27 10:59:14', '2017-04-27 10:59:14'),
(20, 20, 1, 0, '2017-04-27 14:42:48', '2017-04-27 14:42:48'),
(21, 21, 1, 0, '2017-04-27 14:43:27', '2017-04-27 14:43:27'),
(22, 22, 1, 0, '2017-04-27 14:45:02', '2017-04-27 14:45:02'),
(23, 23, 1, 0, '2017-04-27 14:46:22', '2017-04-27 14:46:22'),
(24, 24, 4, 0, '2017-04-27 14:46:22', '2017-04-27 14:46:22'),
(25, 25, 1, 0, '2017-04-27 14:47:43', '2017-04-27 14:47:43'),
(26, 26, 4, 0, '2017-04-27 14:47:43', '2017-04-27 14:47:43'),
(27, 27, 1, 0, '2017-04-27 14:48:37', '2017-04-27 14:48:37'),
(28, 28, 1, 0, '2017-04-27 14:51:21', '2017-04-27 14:51:21'),
(29, 29, 1, 0, '2017-04-27 14:53:25', '2017-04-27 14:53:25'),
(30, 30, 1, 0, '2017-04-27 14:53:54', '2017-04-27 14:53:54'),
(31, 31, 1, 0, '2017-04-27 14:54:00', '2017-04-27 14:54:00'),
(32, 32, 1, 0, '2017-04-27 15:00:23', '2017-04-27 15:00:23'),
(33, 33, 1, 0, '2017-04-27 15:01:11', '2017-04-27 15:01:11'),
(34, 34, 1, 0, '2017-04-27 15:01:47', '2017-04-27 15:01:47'),
(35, 35, 1, 0, '2017-04-27 15:04:36', '2017-04-27 15:04:36'),
(36, 36, 1, 0, '2017-04-27 15:06:04', '2017-04-27 15:06:04'),
(37, 37, 1, 0, '2017-04-27 15:07:22', '2017-04-27 15:07:22'),
(38, 38, 1, 0, '2017-04-27 15:11:51', '2017-04-27 15:11:51'),
(39, 39, 1, 0, '2017-04-27 15:16:23', '2017-04-27 15:16:23'),
(40, 40, 1, 0, '2017-04-27 15:17:08', '2017-04-27 15:17:08'),
(41, 41, 4, 0, '2017-04-27 15:17:08', '2017-04-27 15:17:08'),
(42, 42, 1, 0, '2017-04-27 15:46:13', '2017-04-27 15:46:13'),
(43, 43, 1, 0, '2017-04-27 15:48:00', '2017-04-27 15:48:00'),
(44, 44, 1, 0, '2017-04-27 17:06:59', '2017-04-27 17:06:59'),
(45, 45, 1, 0, '2017-04-27 17:17:57', '2017-04-27 17:17:57'),
(46, 46, 1, 0, '2017-04-27 17:18:17', '2017-04-27 17:18:17'),
(47, 47, 2, 3, '2017-04-27 17:18:17', '2017-04-27 18:11:43'),
(48, 48, 1, 0, '2017-04-28 10:54:26', '2017-04-28 10:54:26'),
(49, 49, 2, 0, '2017-04-28 10:54:26', '2017-04-28 10:54:26'),
(50, 50, 1, 0, '2017-04-28 10:55:07', '2017-04-28 10:55:07'),
(51, 51, 2, 3, '2017-04-28 10:55:07', '2017-05-03 17:55:54'),
(52, 52, 1, 3, '2017-05-02 15:11:27', '2017-05-03 17:56:22'),
(53, 53, 2, 3, '2017-05-02 15:11:27', '2017-10-30 18:48:54'),
(54, 54, 5, 0, '2017-05-02 15:11:27', '2017-05-02 15:11:27'),
(55, 55, 5, 0, '2017-05-04 17:40:08', '2017-05-04 17:40:08'),
(56, 56, 5, 0, '2017-05-05 14:55:18', '2017-05-05 14:55:18'),
(57, 57, 5, 0, '2017-05-05 14:55:18', '2017-05-05 14:55:18'),
(58, 58, 5, 0, '2017-05-05 14:55:21', '2017-05-05 14:55:21'),
(59, 59, 5, 0, '2017-05-05 14:55:21', '2017-05-05 14:55:21'),
(60, 60, 5, 0, '2017-05-05 14:56:12', '2017-05-05 14:56:12'),
(61, 61, 5, 0, '2017-05-05 14:56:12', '2017-05-05 14:56:12'),
(62, 62, 5, 4, '2017-05-05 15:03:31', '2018-03-15 11:41:37'),
(63, 63, 5, 0, '2017-05-05 15:03:31', '2017-05-05 15:03:31'),
(64, 53, 14, 1, '2017-10-30 18:47:45', '2017-10-30 18:54:59'),
(65, 54, 1, 0, '2018-03-14 11:46:52', '2018-03-14 11:46:52'),
(66, 55, 1, 0, '2018-03-14 14:41:13', '2018-03-14 14:41:13'),
(67, 56, 1, 0, '2018-03-14 14:57:55', '2018-03-14 14:57:55'),
(68, 57, 1, 0, '2018-03-14 15:00:02', '2018-03-14 15:00:02'),
(69, 58, 1, 0, '2018-03-14 15:00:57', '2018-03-14 15:00:57'),
(70, 59, 1, 0, '2018-03-14 15:01:05', '2018-03-14 15:01:05'),
(71, 60, 1, 0, '2018-03-14 15:01:14', '2018-03-14 15:01:14'),
(72, 61, 1, 0, '2018-03-14 15:01:56', '2018-03-14 15:01:56'),
(73, 62, 1, 0, '2018-03-14 15:05:28', '2018-03-14 15:05:28'),
(74, 63, 15, 0, '2018-03-15 12:51:07', '2018-03-15 12:51:07'),
(75, 64, 15, 2, '2018-03-15 12:53:36', '2018-03-15 15:47:11'),
(76, 65, 15, 0, '2018-03-19 21:52:36', '2018-03-19 21:52:36'),
(77, 66, 15, 0, '2018-03-20 11:07:59', '2018-03-20 11:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `orderuser`
--

CREATE TABLE IF NOT EXISTS `orderuser` (
  `id` int(11) NOT NULL,
  `orderitem_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `note` longtext NOT NULL,
  `cancel_date` varchar(500) NOT NULL,
  `assign_date` varchar(500) NOT NULL,
  `complete_date` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderuser`
--

INSERT INTO `orderuser` (`id`, `orderitem_id`, `users_id`, `status`, `note`, `cancel_date`, `assign_date`, `complete_date`, `created_at`, `updated_at`) VALUES
(10, 4, 18, 0, '', '', '2017-03-31', '', '2017-03-31 22:10:45', '2017-03-31 22:10:45'),
(11, 5, 20, 1, 'Sample reject', '2017-03-31 17:02:08', '2017-03-31', '', '2017-03-31 22:59:33', '2017-03-31 23:02:08'),
(12, 6, 19, 0, '', '', '2017-03-31', '', '2017-03-31 23:06:35', '2017-03-31 23:06:35'),
(13, 7, 18, 1, 'can''t do', '2017-04-04 08:35:40', '2017-04-04', '', '2017-04-04 13:19:41', '2017-04-04 14:35:40'),
(14, 8, 18, 0, '', '', '2017-04-04', '', '2017-04-04 13:35:46', '2017-04-04 13:35:46'),
(15, 5, 20, 1, 'ffffdf', '2017-04-04 07:54:54', '2017-04-04', '', '2017-04-04 13:48:23', '2017-04-04 13:54:54'),
(16, 10, 19, 1, 'i AM SICK: i CANT DO IT\r\n', '2017-04-04 09:32:33', '2017-04-04', '', '2017-04-04 15:27:44', '2017-04-04 15:37:23'),
(17, 10, 19, 0, '', '', '2017-04-04', '', '2017-04-04 15:33:47', '2017-04-04 15:37:23'),
(18, 11, 21, 0, '', '', '2017-04-05', '', '2017-04-05 14:27:56', '2017-04-05 14:27:56'),
(19, 5, 20, 0, '', '', '2017-04-05', '', '2017-04-05 16:26:46', '2017-04-05 16:26:46'),
(20, 7, 21, 0, '', '', '2017-04-24', '', '2017-04-24 14:38:08', '2017-04-24 14:38:08'),
(21, 64, 22, 0, '', '', '2017-10-30', '', '2017-10-30 18:55:00', '2017-10-30 18:55:00'),
(22, 9, 19, 0, '', '', '2018-03-14', '', '2018-03-14 15:40:11', '2018-03-14 15:40:11'),
(23, 62, 19, 0, '', '', '2018-03-14', '', '2018-03-14 15:42:30', '2018-03-14 15:42:30'),
(24, 75, 19, 0, '', '', '2018-03-15', '', '2018-03-15 13:16:29', '2018-03-15 13:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE IF NOT EXISTS `userrole` (
  `id` int(11) NOT NULL,
  `work_roal` varchar(500) NOT NULL,
  `note` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`id`, `work_roal`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Blackandwhite', 'Black and White', 0, '0000-00-00 00:00:00', '2017-03-20 11:32:06'),
(2, 'Trim to Mug', 'Description of Trim to Mug ', 0, '0000-00-00 00:00:00', '2017-03-20 11:31:48'),
(3, 'Cutting path', '', 0, '0000-00-00 00:00:00', '2017-03-20 14:09:42'),
(4, '3D', '', 0, '0000-00-00 00:00:00', '2017-03-09 11:45:00'),
(5, 'blue eyes', '', 0, '2017-03-20 15:05:06', '2017-03-20 16:26:56'),
(6, 'Leader ship', '', 1, '2017-03-20 16:34:50', '2017-03-20 16:42:50'),
(7, 'Managing', '', 1, '2017-03-20 16:35:12', '2017-03-20 16:58:35'),
(8, 'writing', '', 1, '2017-03-20 16:46:00', '2017-03-20 16:58:15'),
(9, 'Programming', '', 1, '2017-03-20 16:46:33', '2017-03-20 16:58:29'),
(10, 'dfsdf', '', 1, '2017-03-20 16:55:35', '2017-03-20 16:58:25'),
(11, 'test', '', 1, '2017-03-20 16:56:38', '2017-03-20 16:58:20'),
(12, 'PhotoZippoEngrave', '', 1, '2017-04-24 14:36:40', '2017-04-24 14:37:08'),
(13, 'PhotoZippoEngrave', 'Turn photos into a laserable format for the engraving of Zippo lighters', 1, '2017-04-24 14:36:53', '2017-04-24 14:37:13'),
(14, 'PhotoZippoEngrave', 'Turn photos into a laserable format for the engraving of Zippo lighters', 0, '2017-04-24 14:37:19', '2017-04-24 14:37:19'),
(15, 'FrameInFrame', '', 0, '2018-03-14 11:01:03', '2018-03-14 11:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `worktask` longtext COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(1055) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `lastlogindate` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theam_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `dateofbirth` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8_unicode_ci,
  `cpassword` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `phonenumber`, `address`, `worktask`, `img`, `status`, `lastlogindate`, `remember_token`, `theam_name`, `dateofbirth`, `about`, `cpassword`, `created_at`, `updated_at`) VALUES
(8, 'Dazz Master', '', 'admin@gmail.com', '$2y$10$ey8wAxC.f69PNhHl9B0bcuFg/6bUPY/dRCJXPFm4r6.mqA3c6qe5u', '071256356', 'Colombo', 'Trim to Mug,', 'user_image/RilwanMohamedMT1490005806171.jpg', 1, '', 'sJmMbpPHLnYcuNd0bc4QwwmouvZpXN9z24q6f9Aw8CAhMYquRKd3vK391eJH', 'default', '1991-03-21', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.', 'e10adc3949ba59abbe56e057f20f883e', '2017-03-14 15:02:21', '2018-03-28 15:20:05'),
(18, 'Staff 1', '', 'user@gmail.com', '$2y$10$c590MTsSeW.jLftq89fyde.a2scKnqO3kNafhNLpoJFSL3ASDzLoS', '072453652', 'Colombo', '', 'user_image/userjon.jpg', 0, '', 'EeDtNKpmWxNT9t3meLtiWrJK1NhglGQH6hs03mwoqx5UCDjQ5DtLD26j1l5z', 'default', '', '', 'e10adc3949ba59abbe56e057f20f883e', '2017-03-30 19:16:14', '2018-03-14 09:39:40'),
(19, 'Staff 2', '', 'user1@gmail.com', '$2y$10$fFlh/e7nvosCR6Rp6MCG3e.ZJqYQt1f5u8CDe7k0GimqBu6edSlcq', '0758694563', 'Kandy', '', 'user_image/userSali.jpg', 0, '', 'cqKjQTYv3qFFODUEhxgayvraQHdak3FQkalJwiVedVbOMHorXOsLMalJxvOX', 'default', '', '', 'e10adc3949ba59abbe56e057f20f883e', '2017-03-30 19:17:01', '2018-03-28 15:17:35'),
(20, 'Staff 3', '', 'user2@gmail.com', '$2y$10$q1/BCwopo28U6V93zXGzq.pMF0kX7qyTERrvjNnOb48Twp.Z3p0Cm', '075369856', 'Puttalam', '', 'user_image/userTest.jpg', 0, '', 'el1XjYqG0tSed2fwTsWacr8LK5lls5gRXJg0RlvcW3udgPQYZCZZJBO1Jw0C', 'default', '', '', 'e10adc3949ba59abbe56e057f20f883e', '2017-03-30 19:17:59', '2018-03-14 09:39:49'),
(21, 'Roshan Test1', '', 'test1@gmail.com', '$2y$10$jfODMzxjWWTFrcHHv25bMes/hrhyODtxNS3yYuMQktzL3b4VvRo0C', '', '', '', 'user_image/RoshanTest1.jpg', 0, '', 'iiApbWOnXi6I7YnRnEdi9HwcW12cBrX36daDE7WIW3fxGj7ghZWxK4QTuZOy', 'default', '', NULL, 'e10adc3949ba59abbe56e057f20f883e', '2017-03-31 23:05:36', '2018-03-14 09:39:37'),
(22, 'Shasitha', '', 'shasifernando@personello.com', '$2y$10$gmkm/YkG1cUttakA6xTMK.bc.CVY1UhA/9zkbT/u1HS0XNo/ZIbnG', '0776293698', '', '', 'user_image/Shasitha.jpg', 0, '', NULL, 'default', '', NULL, 'a9045b9b3a841c4fac974b41dfe79cec', '2017-10-30 18:54:19', '2017-10-30 18:54:19'),
(23, 'Shehan', '', 'niroshan@personello.com', '$2y$10$c9KNekZzpt8Aqa9UcHexLOUOxF09eV7/g1k33srCqdCVQngD8rfny', '', '', '', 'user_image/Shehan.jpg', 0, '', NULL, 'default', '', NULL, 'a9045b9b3a841c4fac974b41dfe79cec', '2017-10-30 19:02:51', '2017-10-30 19:02:51'),
(24, 'Sherith', '', 'sherith@personello.com', '$2y$10$jsdOJmlX/3JNw.WH3eAhZ.i42kIg1gQwdPzi/L1vpU94plGjD8Wee', '', '', '', 'user_image/Sherith1509676234196.jpg', 0, '', NULL, 'default', '', NULL, 'a9045b9b3a841c4fac974b41dfe79cec', '2017-10-30 19:07:15', '2017-11-03 08:30:34'),
(25, 'Ulf', '', 'uu1@personello.com', '$2y$10$sWClbT4DUH.2k.voUJPaXumEo1X9sYjwit6MJyv9AmMppbvgORafa', '', '', '', 'user_image/user.jpg', 0, '', NULL, 'default', '', NULL, '1666d7dfc2d1429125202a90ab02aaef', '2018-03-13 00:25:45', '2018-03-13 00:25:45'),
(26, 'Ali Naveed', '', 'flashi@gmail.com', '$2y$10$g7AHIPO9RCm1uuPEvMtg..yxwS64zfwWfj7FFbWXKk7MY3.AT79OC', '', '', '', 'user_image/AliNaveed.jpg', 0, '', 'cO4R8UWR6XeobEAaE0mRwkhA5zm2LlRP3w192Ob8tBrfbtCF2N1dCdkhOSaY', 'default', '', NULL, 'e10adc3949ba59abbe56e057f20f883e', '2018-03-19 11:43:29', '2018-03-19 11:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `userskills`
--

CREATE TABLE IF NOT EXISTS `userskills` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `userrole_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userskills`
--

INSERT INTO `userskills` (`id`, `users_id`, `userrole_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 6, 4, 0, '2017-03-19 22:46:45', '2017-03-19 22:46:45'),
(4, 7, 1, 0, '2017-03-19 22:46:49', '2017-03-19 22:46:49'),
(5, 9, 2, 0, '2017-03-19 22:46:54', '2017-03-19 22:46:54'),
(6, 14, 2, 0, '2017-03-19 22:46:58', '2017-03-19 22:46:58'),
(7, 14, 3, 0, '2017-03-19 22:46:58', '2017-03-19 22:46:58'),
(12, 15, 1, 0, '2017-03-23 02:18:15', '2017-03-23 02:18:15'),
(13, 15, 4, 0, '2017-03-23 02:18:16', '2017-03-23 02:18:16'),
(15, 3, 3, 0, '2017-03-23 02:21:23', '2017-03-23 02:21:23'),
(27, 16, 2, 0, '2017-03-28 03:03:34', '2017-03-28 03:03:34'),
(28, 10, 4, 0, '2017-03-30 11:25:50', '2017-03-30 11:25:50'),
(29, 11, 5, 0, '2017-03-30 11:26:05', '2017-03-30 11:26:05'),
(32, 20, 3, 0, '2017-03-30 19:17:59', '2017-03-30 19:17:59'),
(41, 21, 2, 0, '2017-03-31 23:31:30', '2017-03-31 23:31:30'),
(42, 21, 3, 0, '2017-03-31 23:31:30', '2017-03-31 23:31:30'),
(43, 21, 4, 0, '2017-03-31 23:31:30', '2017-03-31 23:31:30'),
(61, 22, 1, 0, '2017-10-30 19:59:32', '2017-10-30 19:59:32'),
(62, 22, 3, 0, '2017-10-30 19:59:32', '2017-10-30 19:59:32'),
(63, 22, 4, 0, '2017-10-30 19:59:32', '2017-10-30 19:59:32'),
(64, 22, 14, 0, '2017-10-30 19:59:32', '2017-10-30 19:59:32'),
(66, 25, 1, 0, '2018-03-13 00:27:45', '2018-03-13 00:27:45'),
(67, 25, 2, 0, '2018-03-13 00:27:45', '2018-03-13 00:27:45'),
(68, 25, 3, 0, '2018-03-13 00:27:45', '2018-03-13 00:27:45'),
(69, 25, 4, 0, '2018-03-13 00:27:45', '2018-03-13 00:27:45'),
(70, 25, 5, 0, '2018-03-13 00:27:45', '2018-03-13 00:27:45'),
(71, 25, 14, 0, '2018-03-13 00:27:45', '2018-03-13 00:27:45'),
(74, 23, 1, 0, '2018-03-14 11:06:41', '2018-03-14 11:06:41'),
(75, 23, 3, 0, '2018-03-14 11:06:41', '2018-03-14 11:06:41'),
(76, 23, 15, 0, '2018-03-14 11:06:41', '2018-03-14 11:06:41'),
(77, 0, 15, 0, '2018-03-15 13:05:44', '2018-03-15 13:05:44'),
(88, 18, 1, 0, '2018-03-15 13:14:11', '2018-03-15 13:14:11'),
(89, 18, 4, 0, '2018-03-15 13:14:11', '2018-03-15 13:14:11'),
(91, 19, 1, 0, '2018-03-15 13:15:48', '2018-03-15 13:15:48'),
(92, 19, 2, 0, '2018-03-15 13:15:48', '2018-03-15 13:15:48'),
(93, 19, 3, 0, '2018-03-15 13:15:48', '2018-03-15 13:15:48'),
(94, 19, 5, 0, '2018-03-15 13:15:48', '2018-03-15 13:15:48'),
(95, 19, 15, 0, '2018-03-15 13:15:48', '2018-03-15 13:15:48'),
(96, 26, 1, 0, '2018-03-19 11:43:29', '2018-03-19 11:43:29'),
(97, 26, 3, 0, '2018-03-19 11:43:29', '2018-03-19 11:43:29'),
(98, 26, 4, 0, '2018-03-19 11:43:29', '2018-03-19 11:43:29'),
(99, 26, 15, 0, '2018-03-19 11:43:29', '2018-03-19 11:43:29'),
(100, 24, 1, 0, '2018-03-30 11:59:43', '2018-03-30 11:59:43'),
(101, 24, 3, 0, '2018-03-30 11:59:43', '2018-03-30 11:59:43'),
(102, 24, 4, 0, '2018-03-30 11:59:43', '2018-03-30 11:59:43'),
(103, 24, 5, 0, '2018-03-30 11:59:43', '2018-03-30 11:59:43'),
(104, 24, 15, 0, '2018-03-30 11:59:43', '2018-03-30 11:59:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_history`
--
ALTER TABLE `note_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderuser`
--
ALTER TABLE `orderuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `userskills`
--
ALTER TABLE `userskills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `note_history`
--
ALTER TABLE `note_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `orderuser`
--
ALTER TABLE `orderuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `userskills`
--
ALTER TABLE `userskills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
