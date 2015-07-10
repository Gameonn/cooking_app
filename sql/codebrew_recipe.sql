-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2015 at 01:57 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codebrew_recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_on`) VALUES
(1, 'admin', 'admin@recipe.com', 'c4ca4238a0b923820dcc509a6f75849b', '2015-02-17 04:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `aisles`
--

CREATE TABLE IF NOT EXISTS `aisles` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aisles`
--

INSERT INTO `aisles` (`id`, `title`) VALUES
(1, 'Milk & Dairy'),
(2, 'Chocolate'),
(4, 'Vegetables'),
(5, 'Spices'),
(6, 'Oil'),
(7, 'Fruits'),
(8, 'Ethnic Food'),
(24, 'Dry Fruits'),
(25, 'Seafood'),
(26, 'Bread & Baking'),
(27, 'Meat'),
(28, 'Juices'),
(29, 'Alochol');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=594 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `recipe_id`, `created_on`) VALUES
(2, 1, 2, '2015-02-27 07:15:29'),
(3, 1, 3, '2015-02-27 07:15:29'),
(4, 1, 4, '2015-02-27 07:15:29'),
(5, 1, 5, '2015-02-27 07:15:29'),
(6, 1, 6, '2015-02-27 07:15:29'),
(7, 1, 7, '2015-02-27 07:15:29'),
(38, 24, 3, '2015-02-27 10:38:57'),
(69, 24, 16, '2015-02-27 11:25:49'),
(70, 24, 12, '2015-02-27 11:30:00'),
(75, 24, 9, '2015-02-27 12:19:58'),
(76, 24, 42, '2015-02-27 12:20:06'),
(77, 24, 30, '2015-02-27 12:20:16'),
(78, 24, 43, '2015-02-27 12:20:27'),
(79, 24, 25, '2015-02-27 12:25:16'),
(82, 24, 11, '2015-02-27 12:29:12'),
(83, 24, 8, '2015-02-27 12:31:34'),
(84, 24, 44, '2015-02-27 12:32:11'),
(146, 13, 8, '2015-03-03 06:31:50'),
(149, 13, 15, '2015-03-03 06:31:54'),
(150, 13, 17, '2015-03-03 06:31:55'),
(151, 13, 19, '2015-03-03 06:31:57'),
(152, 13, 21, '2015-03-03 06:31:59'),
(153, 13, 20, '2015-03-03 06:32:06'),
(154, 13, 22, '2015-03-03 06:32:16'),
(155, 13, 25, '2015-03-03 06:32:17'),
(156, 13, 28, '2015-03-03 06:32:18'),
(157, 13, 30, '2015-03-03 06:32:19'),
(158, 13, 32, '2015-03-03 06:32:22'),
(159, 13, 31, '2015-03-03 06:32:24'),
(160, 13, 36, '2015-03-03 06:32:39'),
(161, 13, 37, '2015-03-03 06:32:39'),
(162, 13, 41, '2015-03-03 06:32:40'),
(163, 13, 42, '2015-03-03 06:32:41'),
(164, 13, 45, '2015-03-03 06:32:43'),
(165, 13, 51, '2015-03-03 06:32:44'),
(166, 13, 52, '2015-03-03 06:32:46'),
(167, 13, 54, '2015-03-03 06:32:47'),
(168, 13, 55, '2015-03-03 06:32:48'),
(169, 13, 57, '2015-03-03 06:32:50'),
(170, 13, 59, '2015-03-03 06:32:51'),
(171, 13, 62, '2015-03-03 06:32:52'),
(172, 13, 65, '2015-03-03 06:32:54'),
(173, 13, 66, '2015-03-03 06:32:55'),
(174, 13, 84, '2015-03-03 06:33:04'),
(175, 13, 83, '2015-03-03 06:33:05'),
(176, 13, 82, '2015-03-03 06:33:06'),
(177, 13, 80, '2015-03-03 06:33:20'),
(178, 13, 79, '2015-03-03 06:33:34'),
(179, 13, 78, '2015-03-03 06:33:35'),
(180, 13, 77, '2015-03-03 06:33:36'),
(181, 13, 74, '2015-03-03 06:33:39'),
(182, 13, 71, '2015-03-03 06:33:41'),
(183, 13, 73, '2015-03-03 06:33:42'),
(184, 13, 70, '2015-03-03 06:33:43'),
(185, 13, 69, '2015-03-03 06:33:44'),
(186, 13, 68, '2015-03-03 06:33:44'),
(187, 13, 67, '2015-03-03 06:33:46'),
(188, 13, 2, '2015-03-03 06:47:55'),
(191, 13, 1, '2015-03-03 09:49:07'),
(196, 14, 3, '2015-03-05 13:22:04'),
(197, 14, 4, '2015-03-05 13:38:24'),
(198, 14, 5, '2015-03-05 13:40:13'),
(199, 14, 9, '2015-03-05 13:40:30'),
(200, 14, 10, '2015-03-05 13:41:17'),
(201, 14, 11, '2015-03-05 13:42:01'),
(202, 14, 13, '2015-03-05 13:42:13'),
(203, 14, 12, '2015-03-05 13:42:26'),
(204, 14, 25, '2015-03-05 13:44:42'),
(205, 14, 22, '2015-03-05 13:48:58'),
(206, 14, 6, '2015-03-05 13:49:14'),
(207, 14, 24, '2015-03-05 13:55:03'),
(208, 14, 23, '2015-03-05 13:55:27'),
(209, 14, 14, '2015-03-05 13:55:58'),
(210, 14, 42, '2015-03-05 14:01:47'),
(211, 14, 44, '2015-03-05 14:02:14'),
(212, 14, 20, '2015-03-05 14:09:34'),
(213, 14, 28, '2015-03-05 14:10:33'),
(214, 14, 29, '2015-03-05 14:10:42'),
(215, 14, 30, '2015-03-05 14:10:51'),
(216, 14, 31, '2015-03-05 14:11:00'),
(217, 14, 32, '2015-03-05 14:11:06'),
(218, 14, 33, '2015-03-05 14:13:51'),
(219, 14, 37, '2015-03-05 14:14:03'),
(220, 14, 34, '2015-03-05 14:14:16'),
(221, 14, 35, '2015-03-05 14:14:20'),
(223, 30, 2, '2015-03-11 06:22:18'),
(224, 30, 3, '2015-03-11 06:22:27'),
(226, 30, 8, '2015-03-11 06:22:37'),
(227, 30, 11, '2015-03-11 06:22:39'),
(228, 34, 1, '2015-03-11 06:57:40'),
(229, 14, 18, '2015-03-12 10:22:41'),
(230, 14, 1, '2015-03-12 10:23:53'),
(231, 14, 50, '2015-03-12 10:24:27'),
(232, 14, 51, '2015-03-12 10:24:40'),
(245, 13, 24, '2015-03-14 06:21:19'),
(246, 32, 6, '2015-03-14 06:30:25'),
(247, 32, 4, '2015-03-14 06:31:17'),
(258, 42, 1, '2015-03-14 13:21:49'),
(259, 42, 6, '2015-03-14 13:22:02'),
(314, 40, 6, '2015-03-16 07:42:58'),
(337, 39, 6, '2015-03-18 04:38:39'),
(355, 39, 28, '2015-03-18 05:25:28'),
(366, 40, 9, '2015-03-18 14:20:15'),
(372, 44, 3, '2015-03-19 07:25:13'),
(373, 44, 37, '2015-03-19 07:25:24'),
(374, 38, 6, '2015-03-19 09:13:35'),
(377, 38, 87, '2015-03-19 09:25:35'),
(399, 45, 2, '2015-03-19 11:57:04'),
(424, 45, 6, '2015-03-19 12:32:21'),
(430, 22, 4, '2015-03-19 12:45:17'),
(433, 43, 27, '2015-03-19 21:45:09'),
(438, 42, 8, '2015-03-20 10:45:34'),
(461, 23, 5, '2015-03-23 10:29:19'),
(462, 23, 7, '2015-03-23 10:29:23'),
(463, 23, 8, '2015-03-23 10:29:27'),
(464, 23, 10, '2015-03-23 10:29:30'),
(465, 23, 2, '2015-03-23 10:29:37'),
(476, 46, 6, '2015-03-23 12:49:23'),
(477, 42, 2, '2015-03-23 13:07:17'),
(481, 42, 7, '2015-03-23 13:30:29'),
(488, 39, 9, '2015-03-25 10:16:22'),
(490, 13, 3, '2015-03-25 10:26:58'),
(493, 13, 12, '2015-03-25 12:02:45'),
(494, 13, 11, '2015-03-25 12:02:50'),
(495, 13, 10, '2015-03-25 12:02:55'),
(496, 13, 9, '2015-03-25 12:03:03'),
(498, 39, 3, '2015-03-25 12:15:44'),
(500, 39, 14, '2015-03-25 12:16:53'),
(501, 39, 10, '2015-03-25 12:17:02'),
(505, 12, 2, '2015-03-25 12:43:53'),
(506, 12, 4, '2015-03-25 13:18:43'),
(507, 39, 4, '2015-03-25 13:20:26'),
(508, 39, 5, '2015-03-25 13:20:51'),
(545, 1, 1, '2015-03-27 05:16:14'),
(570, 41, 6, '2015-03-27 06:27:08'),
(573, 41, 3, '2015-03-27 06:38:13'),
(575, 39, 39, '2015-03-27 06:53:47'),
(577, 41, 16, '2015-03-27 09:03:24'),
(578, 41, 1, '2015-03-27 09:03:55'),
(579, 39, 23, '2015-03-27 09:18:01'),
(580, 41, 23, '2015-03-27 09:23:41'),
(581, 41, 30, '2015-03-27 09:24:09'),
(582, 41, 43, '2015-03-27 09:24:12'),
(583, 41, 9, '2015-03-27 09:24:18'),
(584, 41, 2, '2015-03-27 09:27:17'),
(585, 12, 3, '2015-03-27 10:07:01'),
(588, 43, 1, '2015-03-28 23:06:02'),
(589, 43, 86, '2015-03-28 23:06:42'),
(590, 47, 1, '2015-03-28 23:20:03'),
(591, 47, 2, '2015-03-28 23:20:14'),
(592, 43, 3, '2015-03-31 22:13:31'),
(593, 43, 95, '2015-04-03 21:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `aisle_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `ingredient_type_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=833 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `title`, `aisle_id`, `recipe_id`, `ingredient_type_id`) VALUES
(6, '1 (1 pound) loaf frozen bread dough, thawed', 2, 21, 4),
(7, ' 1/4 cup vegetable oil ', 2, 22, 22),
(8, '1 cup shredded mozzarella cheese ', 1, 11, 4),
(9, 'salt and ground black pepper to taste', 2, 23, 7),
(11, '4 tablespoons butter, divided', 1, 2, 15),
(14, ' 8 slices bread ', 1, 16, 14),
(15, ' 1 cup brown sugar ', 1, 5, 16),
(16, ' 1/2 cup water ', 1, 7, 11),
(18, ' 1 cup soy sauce', 1, 10, 18),
(19, ' 3 large garlic cloves, chopped ', 3, 4, 19),
(20, ' 1/2 cup pineapple juice (optional) ', 2, 19, 17),
(22, ' 1/2 cup water ', 2, 18, 11),
(23, ' 4 pounds boneless round steak, cut into 1/4-inch slices  bamboo skewers, soaked in water', 1, 9, 23),
(24, '1/2 cup Parmesan cheese', 1, 20, 4),
(25, '3/4 teaspoon ground black pepper', 3, 2, 7),
(26, '1/2 teaspoon garlic powder', 1, 12, 20),
(27, '1 (17.5 ounce) package frozen puff pastry, thawed', 1, 13, 21),
(29, ' 2 cups milk ', 2, 3, 9),
(30, '  2 slices bacon', 2, 16, 26),
(31, '  8 ounces penne pasta', 2, 15, 27),
(32, ' 1 onion, chopped ', 2, 14, 24),
(33, '2 clove garlic, minced ', 2, 13, 25),
(34, ' 3 cups shredded Cheddar cheese ', 1, 15, 4),
(35, ' 2 tablespoons butter ', 1, 14, 15),
(36, ' 3 tablespoons all-purpose flour ', 2, 9, 23),
(37, ' 4 cups sweet potato, cubed ', 2, 11, 1),
(38, ' 1/2 cup white sugar ', 2, 17, 16),
(39, ' 2 eggs, beaten ', 1, 17, 13),
(41, ' 4 tablespoons butter, softened ', 1, 18, 15),
(42, ' 1/2 cup milk ', 1, 5, 9),
(43, ' 1/2 teaspoon vanilla extract ', 2, 8, 15),
(44, ' 1/2 cup packed brown sugar ', 1, 23, 16),
(45, ' 1/3 cup all-purpose flour ', 2, 7, 23),
(46, ' 3 tablespoons butter, softened ', 1, 19, 15),
(48, '1 egg white, lightly beaten', 2, 12, 13),
(49, '8 slices bread', 1, 21, 14),
(50, '1 cup brown sugar', 2, 4, 16),
(51, '1/2 teaspoon garlic powder', 2, 10, 20),
(52, '1/2 cup pineapple juice (optional)', 2, 3, 17),
(53, '1/8 teaspoon salt', 2, 5, 10),
(54, '4 tablespoons butter, divided', 1, 22, 15),
(55, '1/2 teaspoon garlic powder', 3, 5, 14),
(56, '1/2 teaspoon vanilla extract', 3, 6, 7),
(57, '1/2 cup milk', 3, 17, 1),
(58, '3 tablespoons butter, softened', 3, 14, 2),
(59, '4 tablespoons butter, divided', 3, 7, 4),
(60, '1/2 teaspoon vanilla extract', 3, 13, 3),
(61, '1/2 teaspoon garlic powder', 3, 22, 5),
(62, '1 cup brown sugar', 3, 21, 6),
(63, '8 slices bread', 3, 9, 14),
(64, '1 egg white, lightly beaten', 3, 20, 7),
(65, '1/2 teaspoon garlic powder', 3, 18, 9),
(66, '1/2 cup milk', 3, 10, 8),
(67, '1/2 cup chopped pecans', 3, 19, 11),
(68, '3 tablespoons butter, softened', 3, 11, 19),
(69, '1 egg white, lightly beaten', 3, 15, 10),
(70, '4 tablespoons butter, divided', 3, 12, 13),
(71, '1/2 cup milk', 3, 8, 12),
(74, '3 tablespoons butter, softened', 4, 22, 2),
(76, '1/2 teaspoon vanilla extract', 4, 23, 3),
(77, '1/2 teaspoon garlic powder', 4, 3, 5),
(79, '8 slices bread', 4, 4, 14),
(82, '1/2 cup milk', 4, 19, 8),
(83, '1/2 cup chopped pecans', 4, 6, 11),
(85, '1 egg white, lightly beaten', 4, 7, 10),
(86, '4 tablespoons butter, divided', 4, 17, 13),
(87, '4 tablespoons butter, divided', 4, 8, 12),
(88, '8 slices bread', 4, 15, 17),
(90, '1/2 cup chopped pecans', 4, 9, 11),
(92, '1 egg white, lightly beaten', 4, 11, 10),
(93, '4 tablespoons butter, divided', 4, 13, 13),
(94, '1 cup brown sugar', 4, 12, 12),
(234, '1/2 cup of milk', 1, 35, 9),
(235, '1/2 cup of butter', 1, 35, 15),
(236, '2 cup of flour', 23, 1, 23),
(237, '2 cup of sugar', 2, 1, 16),
(243, 'a cup of water', 1, 1, 1),
(247, 'fggopp', 1, 86, 1),
(248, 'dgdgfdiop', 1, 86, 1),
(249, 'gdfggg', 1, 86, 16),
(252, '1/2 teaspoon garlic powder', 2, 0, 2),
(270, '1/2 teaspoon garlic powder', 2, 1, 30),
(275, '1/2 cup chopped pecans', 1, 1, 14),
(277, '8 slices bread', 1, 1, 15),
(292, '4 tablespoons butter', 2, 1, 43),
(294, '1 egg white, lightly beaten', 2, 1, 42),
(299, '1 cup brown sugar', 1, 1, 20),
(300, '1/2 cup milk', 2, 1, 39),
(303, '1/2 cup chopped pecans', 2, 2, 4),
(309, '1 egg white, lightly beaten', 1, 2, 7),
(315, '1 cup brown sugar', 1, 2, 10),
(318, '1/2 teaspoon garlic powder', 2, 2, 30),
(324, '1/2 cup chopped pecans', 2, 2, 27),
(325, '8 slices bread', 1, 2, 15),
(335, '1 cup brown sugar', 1, 2, 20),
(350, '3 tablespoons butter', 2, 3, 38),
(351, '1/2 cup chopped pecans', 2, 3, 4),
(373, '9 slices bread', 1, 3, 15),
(378, '1 egg white, lightly beaten', 2, 3, 24),
(383, '1 cup brown sugar', 1, 3, 20),
(397, '3 tablespoons butter', 2, 4, 3),
(399, '1/2 cup chopped pecans', 2, 4, 4),
(401, '1/2 teaspoon garlic powder', 2, 4, 5),
(405, '1 egg white, lightly beaten', 1, 4, 7),
(407, '1/2 cup milk', 1, 4, 8),
(446, 'milk', 6, 2, 1),
(453, '2 cups butter', 6, 11, 4),
(455, '2 cups water', 3, 14, 2),
(456, '2 cups water', 1, 15, 2),
(457, '2 cups water', 5, 16, 2),
(462, '1 cups water', 7, 14, 10),
(464, '1/2 pound bulk pork sausage', 2, 2, 2),
(466, '3 large garlic cloves, chopped', 3, 3, 2),
(467, '1/2 cup milk', 3, 15, 3),
(468, '1/2 pound bulk pork sausage', 2, 4, 1),
(469, '3 large garlic cloves, chopped', 1, 16, 3),
(470, '1/2 cup pineapple juice (optional)', 9, 5, 2),
(472, '1/2 pound bulk pork sausage', 8, 6, 3),
(473, '1/2 cup pineapple juice (optional)', 3, 18, 14),
(474, '1/2 pound bulk pork sausage', 7, 7, 4),
(475, '1 cup brown sugar', 4, 19, 15),
(476, '1 cup brown sugar', 6, 8, 5),
(477, '8 slices bread', 5, 20, 16),
(479, '1/2 cup milk', 6, 21, 17),
(480, '6 eggs', 4, 10, 7),
(481, '1/2 cup milk', 7, 22, 18),
(482, '1/2 pound bulk pork sausage', 3, 12, 8),
(483, '6 eggs', 8, 23, 19),
(484, '6 eggs', 2, 11, 9),
(485, '1/2 cup milk', 9, 24, 20),
(487, '4 tablespoons butter, divided', 3, 25, 3),
(489, '14 tablespoons butter, divided', 3, 26, 3),
(490, '1/2 pound bulk pork sausage', 3, 50, 2),
(491, '1 1/2 cups light brown sugar', 3, 27, 3),
(492, '1 1/2 cups light brown sugar', 2, 49, 1),
(493, 'salt and ground black pepper to taste', 1, 28, 3),
(494, 'salt and ground black pepper to taste', 9, 48, 2),
(495, '2 cup shredded mozzarella cheese', 2, 29, 13),
(496, '1/2 pound bulk pork sausage', 8, 47, 3),
(497, '1/2 cup milk', 3, 30, 14),
(498, '1 cup shredded mozzarella cheese', 7, 46, 4),
(499, '1/2 cup milk', 4, 31, 15),
(500, '1/4 cup vegetable oil', 6, 45, 5),
(501, '1/4 cup vegetable oil', 5, 32, 16),
(502, '1 (1 pound) loaf frozen bread dough, thawed', 5, 44, 6),
(503, '1 (1 pound) loaf frozen bread dough, thawed', 6, 33, 17),
(504, '1 egg white, lightly beaten', 4, 43, 7),
(505, '1 egg white, lightly beaten', 7, 34, 18),
(506, '4 slices thinly sliced ham', 3, 42, 8),
(507, '4 slices thinly sliced ham', 8, 35, 19),
(508, '4 slices hard salami', 2, 41, 9),
(509, '4 slices hard salami', 9, 36, 20),
(510, '1/2 pound bulk pork sausage', 1, 40, 2),
(511, '1/2 cup milk', 3, 37, 3),
(512, '4 slices American cheese', 2, 39, 2),
(513, '4 slices American cheese', 3, 38, 3),
(514, '1/2 pound bulk pork sausage', 8, 68, 3),
(515, '1/2 cup milk', 3, 51, 14),
(516, '1 cup shredded mozzarella cheese', 7, 67, 4),
(517, '1/2 cup milk', 4, 52, 15),
(518, '1/4 cup vegetable oil', 6, 66, 5),
(519, '1/4 cup vegetable oil', 5, 53, 16),
(520, '1 (1 pound) loaf frozen bread dough, thawed', 5, 65, 6),
(521, '1 (1 pound) loaf frozen bread dough, thawed', 6, 54, 17),
(522, '1 egg white, lightly beaten', 4, 64, 7),
(523, '1 egg white, lightly beaten', 7, 55, 18),
(524, '4 slices thinly sliced ham', 3, 63, 8),
(525, '4 slices thinly sliced ham', 8, 56, 19),
(526, '4 slices hard salami', 2, 62, 9),
(527, '4 slices hard salami', 9, 57, 20),
(528, '1/2 pound bulk pork sausage', 1, 61, 2),
(529, '1/2 cup milk', 3, 58, 3),
(530, '4 slices American cheese', 2, 60, 2),
(531, '4 slices American cheese', 3, 59, 3),
(532, '2 cups of water', 6, 67, 6),
(533, '2 cups of water', 6, 67, 6),
(534, '1 egg white, lightly beaten', 4, 68, 7),
(535, '1 egg white, lightly beaten', 7, 69, 18),
(536, '4 slices thinly sliced ham', 3, 71, 8),
(537, '4 slices thinly sliced ham', 8, 70, 19),
(538, '4 slices hard salami', 2, 72, 9),
(539, '6 slices hard salami', 9, 73, 20),
(540, '1/2 pound bulk pork sausage', 1, 75, 2),
(541, '1/2 cup milk', 3, 74, 3),
(542, '4 slices American cheese', 2, 76, 2),
(543, '4 slices American cheese', 3, 77, 3),
(544, '1/2 pound bulk pork sausage', 8, 79, 3),
(545, '1/2 cup milk', 3, 78, 14),
(546, '1 cup shredded mozzarella cheese', 7, 80, 4),
(547, '1/2 cup milk', 4, 81, 15),
(548, '1/4 cup vegetable oil', 6, 83, 5),
(549, '1/4 cup vegetable oil', 5, 82, 16),
(550, '1 (1 pound) loaf frozen bread dough, thawed', 5, 84, 6),
(551, '1 (1 pound) loaf frozen bread dough, thawed', 6, 85, 17),
(552, '1 egg white, lightly beaten', 4, 86, 7),
(553, '1 egg white, lightly beaten', 7, 87, 18),
(554, '6 eggs', 1, 6, 1),
(556, ' 4 slices thinly sliced ham ', 2, 20, 12),
(557, '2', 2, 2, 2),
(558, '2', 2, 2, 2),
(559, '1/2 pound bulk pork sausage ', 2, 2, 4),
(560, '4 tablespoons butter, divided', 1, 3, 15),
(561, ' 4 slices American cheese ', 1, 3, 1),
(562, '1/2 pound bulk pork sausage ', 2, 3, 4),
(563, ' 4 slices hard salami', 2, 3, 8),
(564, ' 3 large garlic cloves, chopped ', 3, 12, 19),
(565, ' 1/2 cup pineapple juice (optional) ', 2, 12, 17),
(566, ' 4 slices American cheese ', 1, 1, 1),
(567, '2 spoon salt', 2, 13, 12),
(568, '2 cup shredded mozzarella cheese ', 1, 13, 4),
(569, ' 1/4 cup vegetable oil ', 2, 20, 22),
(570, ' 4 slices hard salami', 2, 1, 8),
(571, '', 1, 8, 1),
(572, '', 1, 1, 1),
(573, '', 2, 1, 4),
(574, ' 4 slices hard salami', 2, 1, 8),
(575, ' 4 slices thinly sliced ham ', 2, 1, 12),
(576, ' 1 egg white, lightly beaten ', 1, 1, 13),
(577, '1 (1 pound) loaf frozen bread dough, thawed', 2, 1, 4),
(578, ' 1/4 cup vegetable oil ', 2, 1, 22),
(579, '', 1, 1, 1),
(580, '', 2, 1, 4),
(581, ' 4 slices thinly sliced ham ', 2, 1, 12),
(584, 'Fish fillets - 3-4 remove all thorns', 25, 93, 3),
(585, 'Onion - 1/2 (grated)', 4, 93, 54),
(586, 'Garlic - 3 cloves (grated)', 5, 93, 54),
(587, 'Ginger - 1"slice (grated)', 5, 93, 54),
(588, 'Garam masala - 1 tsp', 5, 93, 54),
(589, '2 Eggs', 1, 93, 54),
(590, '1 tsp - Chilly powder', 5, 93, 54),
(591, '1 tsp - Cumin powder', 5, 93, 54),
(592, '1/2 cup - Bread Crumbs', 26, 93, 54),
(593, 'Corriander', 4, 93, 54),
(594, 'Oil for frying', 6, 93, 54),
(595, '1/2 Kg Beef or Lamb mince', 27, 94, 1),
(596, '2 - Onions', 4, 94, 54),
(597, '1 Potato', 4, 94, 54),
(598, '1 - Carrot', 4, 94, 54),
(599, '1/2 Capsicum (optional)', 4, 94, 54),
(600, '5 - Garlic Cloves', 5, 94, 54),
(601, '1/2 tsp - Turmeric', 5, 94, 54),
(602, '1 - Egg', 1, 94, 54),
(603, '1/2 - Ginger', 5, 94, 54),
(604, '6 - French Beans', 4, 94, 54),
(605, '100 gms - Peas', 4, 94, 54),
(606, '2 - Green Chillies', 5, 94, 54),
(607, '1 tbsp - Cumin powder', 5, 94, 54),
(608, 'few Coriander leaves', 4, 94, 54),
(609, '1 tbsp - Garam Masala', 5, 94, 54),
(610, '2 tsp - lime juice or Vinegar', 5, 94, 54),
(611, 'Bread Slices', 26, 94, 54),
(612, 'Fine Semolina or Rawa', 8, 94, 54),
(613, '1 cup - Gram Flour', 26, 95, 54),
(614, '2 tbsp - Fine Semolina', 8, 95, 54),
(615, 'Oil for deep Frying', 6, 95, 54),
(616, '1/2 tsp - Turmeric', 5, 95, 54),
(617, '1 tbsp - Cumin powder', 5, 95, 54),
(618, '1 tbsp - Carom Seeds', 5, 95, 54),
(619, '1 tbsp - Onion seeds', 5, 95, 54),
(620, '1 tbsp - Coriander powder', 5, 95, 54),
(621, '1 tbsp - Asafoetida Powder', 5, 95, 54),
(622, '1 tbsp - Baking soda', 26, 95, 54),
(623, '1 tbsp - Red Chilly powder', 5, 95, 54),
(624, '2 - Green Chillies', 5, 95, 54),
(625, '2 tbsp - Ginger & Garlic paste', 5, 95, 54),
(626, '2 - Onions', 4, 95, 54),
(627, '2 - Potato', 4, 95, 2),
(628, '8 Chicken Wing or 6 Chicken Drumsticks', 27, 96, 5),
(629, '2 tbsp - Soya sauce', 8, 96, 54),
(630, '2 tsp - Red Chilli Sauce', 8, 96, 54),
(631, '2 tsp - Ginger & Garlic paste', 5, 96, 54),
(632, '2 - Eggs', 1, 96, 54),
(633, '5 tbsp - Corn Flour (1 for paste & 4 for batter)', 26, 96, 54),
(634, '1 tsp - Chilli Powder', 5, 96, 54),
(635, 'Oil for frying', 6, 96, 54),
(636, '4 - bone-in pork chops', 27, 97, 6),
(637, '3 tbsp of vindaloo masala', 8, 97, 54),
(638, '4 - Eggs ', 1, 98, 13),
(639, '1 - Large Onion (Sliced)', 4, 98, 54),
(640, '1 tsp - turmeric powder', 5, 98, 54),
(641, '1 tsp - mustard seeds', 5, 98, 54),
(642, '1 tsp - Cumin seeds', 5, 98, 54),
(643, '3 - Green chilies', 5, 98, 54),
(644, '2 tbsp - Ginger garlic paste', 5, 98, 54),
(645, '1 - Large Tomato', 4, 98, 54),
(646, '1 tsp - Red Chilli Powder', 5, 98, 54),
(647, '1tsp - Cumin powder', 5, 98, 54),
(648, '1tsp - Coriander powder', 5, 98, 54),
(649, 'Corriander', 4, 98, 54),
(650, '2 tbsp - Oil', 6, 98, 54),
(651, '1 kg - Pork (with fat)', 27, 99, 6),
(652, '1/2 cup - Vinegar', 5, 99, 54),
(653, '15  - Large raisins', 24, 99, 54),
(654, '3 - Bay leaves', 5, 99, 54),
(655, '1 - Tamarind ball', 5, 99, 54),
(656, '1 tbsp - Cinnamon power or 2 medium Cinnamon Sticks', 5, 99, 54),
(657, '2 tbsp - Cumin seeds', 5, 99, 54),
(658, '2 tbsp - Coriander seeds', 5, 99, 54),
(659, '8 peppercorns', 5, 99, 54),
(660, '1 tsp - turmeric powder', 5, 99, 54),
(661, '4 tbsp - Kashmiri Red Chilli powder or 8 to 12 dry Kashmiri Chillies', 5, 99, 54),
(662, '1 tbsp - Poppy seeds', 5, 99, 54),
(663, '2 inch - Ginger', 5, 99, 54),
(664, '8-10 Garlic pods', 5, 99, 54),
(665, '2 - Star Anis', 5, 99, 54),
(666, '4 - Cardamom pods', 5, 99, 54),
(667, '6 - Cloves', 5, 99, 54),
(668, '2 to 3 - Onions', 4, 99, 54),
(669, 'Few Mint leaves', 5, 99, 54),
(670, '1 tbsp - Onion seeds (optional)', 5, 99, 54),
(671, '1 Large lamb leg on the bone with fat ', 27, 100, 52),
(672, '4-5 tbsp - Olive Oil ', 6, 100, 54),
(673, '8 to 10 - Peppercorns', 5, 100, 54),
(674, '8 to 10 - Cloves', 5, 100, 54),
(675, '4 to 5 - Cardmom pods', 5, 100, 54),
(676, '1 inch - Cinnamon', 5, 100, 54),
(677, '4 to 5 springs of Thyme', 4, 100, 54),
(678, '1 - Lime', 7, 100, 54),
(679, '12 to 15 - Garlic', 5, 100, 54),
(680, '1 - Onion', 4, 100, 54),
(681, '2 - Large Potato', 4, 100, 54),
(682, 'Ingredients for Chicken Tikka', 27, 102, 54),
(683, '2 tbsp - Ginger & Garlic paste', 5, 102, 54),
(684, '1 pound(approx 450 gms) skinless, boneless chicken breasts', 27, 102, 5),
(685, '1 tsp  - Turmeric powder', 5, 102, 54),
(686, '1 tsp - Coriander powder', 5, 102, 54),
(687, '1 tsp - Cumin powder', 5, 102, 54),
(688, '1 tsp - Kashmiri Red Chilli powder', 5, 102, 54),
(689, '1/2 cup - Yoghurt', 1, 102, 54),
(690, 'Salt to taste', 5, 102, 54),
(691, 'few drops red food colour (optional)', 26, 102, 54),
(692, 'Long shaslik/bamboo skewer', 8, 102, 54),
(693, 'Ingredients for Chicken Tikka Masala Curry:', 8, 102, 54),
(694, '2 tsp - Garam Masala', 5, 102, 54),
(695, '1/2 tsp - Turmeric', 5, 102, 54),
(696, '1 tbsp - Vegetable Oil or Ghee', 6, 102, 54),
(697, '1 - Onion', 4, 102, 54),
(698, '1 - Tomato', 4, 102, 54),
(699, '8 to 10 - Cashews', 24, 102, 54),
(700, '3 - Cardamom pods', 5, 102, 54),
(701, '1 tbsp - Kashimiri Chilli powder', 5, 102, 54),
(702, '1 tbsp - Fenugreek (Kasoori Methi)', 5, 102, 54),
(703, '1/2 Cup - Cream', 1, 102, 54),
(704, '1/2 Cup chopped fresh Coriander for garnishing', 4, 102, 54),
(705, '350 gms - Diced Beef', 27, 103, 1),
(706, '1 tbsp - Ginger Garlic Paste', 5, 103, 54),
(707, '1/2 tsp - Turmeric', 5, 103, 54),
(708, '1 tsp - Red Chilli powder', 5, 103, 54),
(709, '1 tsp - Pepper Powder', 5, 103, 54),
(710, '1/2 tsp - Cumin seeds', 5, 103, 54),
(711, '1/2 tsp - Coriander seeds', 5, 103, 54),
(712, '3 - Green chilies', 5, 103, 54),
(713, '1 - Tomato', 4, 103, 54),
(714, '1 - Onion', 4, 103, 54),
(715, '1 tbsp - Garam Masala', 5, 103, 54),
(716, '2 tbsp - Oil', 6, 103, 54),
(717, 'Coriander to garnish', 4, 103, 54),
(718, '2 cups - Lentil Dal (Use any Dal you prefer wash and soak for 1 hour)', 8, 104, 2),
(719, '2 tbsp - Ghee (clarified butter)', 1, 104, 54),
(720, '1 tsp - Cumin seeds', 5, 104, 54),
(721, '1 tsp - Mustard seeds', 5, 104, 54),
(722, '1 - Onion', 4, 104, 54),
(723, '1 - Tomato', 4, 104, 54),
(724, '1 tsp - Coriander powder', 5, 104, 54),
(725, '2 - Green Chillies', 5, 103, 54),
(726, '2 tbsp - Ginger & Garlic paste', 5, 104, 54),
(727, '1/2 tsp - Turmeric', 5, 104, 54),
(728, '2 to 3 - Bay leaves (Currry leaves)', 5, 104, 54),
(729, '1 tsp - Fennel seeds (Optional)', 5, 104, 54),
(730, 'Finely Chopped Coriander for garnishing', 4, 104, 54),
(731, '6 drumstick or 3 pair of whole Chicken legs', 27, 105, 5),
(732, '2 tbsp - Yoghurt', 1, 105, 54),
(733, '1 tbsp - Garam Masala', 5, 105, 54),
(734, '2 tbsp - Kashmiri Chilli powder', 5, 105, 54),
(735, '1 tsp - Coriander powder', 5, 105, 54),
(736, '1 tsp - Cumin powder', 5, 105, 54),
(737, '1 tsp - Turmeric powder', 5, 105, 54),
(738, '1 tbsp - Fenugreek (Kasoori Methi)', 5, 105, 54),
(739, '2 tbsp - Ginger & Garlic paste', 5, 105, 54),
(740, 'Oil for greasing', 6, 105, 54),
(741, 'Salt as per taste', 5, 105, 54),
(742, 'Red Food Color (optional)', 26, 105, 54),
(743, '2 cups all purpose flour + extra for dusting tin', 26, 106, 2),
(744, '2 tsp - Baking powder', 26, 106, 14),
(745, '1 cup powdered brown sugar', 26, 106, 54),
(746, '2 tsp - Orange Juice', 28, 106, 54),
(747, '1 tsp - Fresh Ginger juice from crushed Ginger', 5, 106, 54),
(748, '150 gms - Butter + Extra for Greasing tin', 1, 106, 54),
(749, '3 - Eggs (Separate Yolk & White)', 1, 106, 13),
(750, '1 tsp - Vanilla Essence', 26, 106, 54),
(751, '2 tbsp - Melted Dark Chocolate or Dark Cocoa powder', 2, 106, 54),
(752, '1 cup - Raisins', 24, 106, 54),
(753, 'mixed dried fruits (candied orange peels, sultanas, cherry, tutti-fruiti or any other of your choice)', 24, 106, 54),
(754, 'Crushed cashews and hazelnuts(any of your choice) (those who have nut alergy please avoid this)', 24, 106, 54),
(755, '40 ml - Dark Rum (You can use more if you wish to make it stronger)', 29, 106, 54),
(756, '40 ml - Wine (Used to soak the Raisins)', 29, 106, 54),
(757, '1 - Cinnamon stick or 1 tsp powder', 5, 106, 54),
(758, '5 - Cloves or 1/2 tsp powder', 5, 106, 54),
(759, '1 - Star Anaise', 5, 106, 54),
(760, '1 tsp - Nutmeg powder', 5, 106, 54),
(761, 'A cake pan / Tin - 8 or 10 inch.', 26, 106, 54),
(762, '2 cups - Basmati Rice', 8, 107, 42),
(763, '1 tbsp - Cumin seeds (Jeera)', 5, 107, 54),
(764, '1 - Star Anaise', 5, 107, 54),
(765, '1 cup - Green Peas', 4, 107, 2),
(766, '3 tbsp - Oil or Ghee', 6, 107, 54),
(767, 'Coriander to garnish', 4, 107, 54),
(768, 'Salt as per taste', 8, 107, 54),
(769, '3 cups - Water', 8, 107, 54),
(771, '----Mixer Grinder Ingredients----', 4, 108, 54),
(772, '160 gms - Spinach', 4, 108, 2),
(773, '2 tsp - Cumin seeds', 5, 108, 54),
(774, '2 tsp - Coriander seeds', 5, 108, 54),
(775, '2 tbsp - Ginger & Garlic paste', 5, 108, 54),
(776, '1 tsp - Turmeric powder', 5, 108, 54),
(777, '1 tsp - Red Chilli powder', 5, 108, 54),
(778, '2 - Green Chillies', 5, 108, 54),
(779, '1/2 - Onion', 4, 108, 54),
(780, '1 - Tomato', 4, 108, 54),
(781, '2 tbsp - Lemon juice', 8, 108, 54),
(782, '1 cup water', 8, 108, 54),
(783, '---Tempering Ingredients---', 8, 108, 54),
(784, '10 to 15 - Cottage Cheese cubes', 1, 108, 54),
(785, '2 tsp Cumin Seeds', 5, 108, 54),
(786, '2 tsp - Mustard seeds', 5, 108, 54),
(787, '1/2 - Diced Onion', 4, 108, 54),
(788, '1 tbsp - Garam Masala', 5, 108, 54),
(789, 'Salt as per taste', 8, 108, 54),
(790, 'Mix Vegetables - Carrots, cauliflower, french beans, peas, sweetcorn, mix bell peppers. You can use any mixed from frozen section.', 4, 109, 2),
(791, '4 to 5 - Big Potatoes', 4, 109, 2),
(792, '1 - Onion (finely chopped)', 4, 109, 54),
(793, '1 - Tomato (finely chopped)', 4, 109, 54),
(794, '2 tbsp - Ginger & Garlic paste', 5, 109, 54),
(795, '2 tbsp - Pav Bhaji Masala', 8, 109, 54),
(796, '1 tbsp - Garam Masala', 5, 109, 54),
(797, '1/2 cup - Green Peas (cooked & steamed)', 4, 109, 54),
(798, '1 tbsp - Lemon juice', 8, 109, 54),
(799, '2 tbsp - Butter', 1, 109, 54),
(800, '6 to 8 - Buns or Baps', 26, 109, 54),
(801, 'Coriander to garnish', 4, 109, 54),
(802, 'Salt as per taste', 8, 109, 54),
(803, '2 - Pomfrets (Can substitute with any white flesh fish)', 25, 110, 3),
(804, '1 Onion', 4, 110, 54),
(805, '5 to 6 - Dry Red Kashmiri Chilies', 5, 110, 54),
(806, '1 cup - Grated Coconut', 8, 110, 54),
(807, '1 tsp - Turmeric powder (1/2 for marinade & 1/2 for grinding)', 5, 110, 54),
(808, '2 tbsp - Coriander seeds', 5, 110, 54),
(809, '10 to 15 - Peppercorns', 5, 110, 54),
(810, '1/2  tsp - Fenugreek Seeds', 5, 110, 54),
(811, '1 - Ball of Tamarind or 1 tbsp Tomato Puree', 5, 110, 54),
(812, '15 - Garlic cloves', 5, 110, 54),
(813, '1 - Tomato (Finely Chopped)', 4, 110, 54),
(814, '1 tbsp - Red Chilly powder (1/2 for Marinade & 1/2 for Grinding)', 5, 110, 54),
(815, 'Coriander to garnish', 4, 110, 54),
(816, 'Salt to taste', 8, 110, 54),
(817, 'Oil for cooking', 6, 110, 54),
(818, '2 - Pomfrets (Can substitute with any white flesh fish)', 25, 111, 3),
(819, '25 - Kashmiri Chillies', 5, 111, 54),
(820, '4 to 5 - Garlic pods', 5, 111, 54),
(821, '8 - Cloves', 5, 111, 54),
(822, '1 tsp - Turmeric powder', 5, 111, 54),
(823, '1 tsp - Cumin seeds', 5, 111, 54),
(824, '1 tsp - Mustard seeds', 5, 111, 54),
(825, '1 tsp - Black Peppercorn powder', 5, 111, 54),
(826, '2 inch - Ginger', 5, 111, 54),
(827, '1/2 tsp - Methi seeds', 5, 111, 54),
(828, 'A small ball of Tamarind', 5, 111, 54),
(829, 'A pinch of Sugar', 26, 111, 54),
(830, '1 kg - Chicken', 27, 113, 5),
(831, '2 - Onions', 4, 113, 54),
(832, '1 kg - Chicken ', 27, 114, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_type`
--

CREATE TABLE IF NOT EXISTS `ingredient_type` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `generic` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredient_type`
--

INSERT INTO `ingredient_type` (`id`, `title`, `image`, `generic`, `created_on`) VALUES
(1, 'beef', 'beef.png', 0, '2014-12-22 09:47:20'),
(2, 'vegetable', 'vegetable.png', 0, '2014-12-22 09:47:20'),
(3, 'seafood', 'fish.png', 0, '2014-12-22 09:47:20'),
(5, 'chicken', 'chicken.png', 0, '2014-12-22 09:47:20'),
(6, 'pork', 'pork.png', 0, '2014-12-23 07:58:45'),
(13, 'egg', 'egg.png', 0, '2014-12-23 08:12:41'),
(14, 'bread', 'bread.png', 1, '2014-12-23 08:12:41'),
(26, 'Bacon', 'bacon.png', 1, '2014-12-23 11:40:29'),
(42, 'Rice', 'rice.jpg', 0, '2015-02-06 10:51:00'),
(52, 'lamb', 'salami.png', 0, '2015-03-25 12:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `my_recipes`
--

CREATE TABLE IF NOT EXISTS `my_recipes` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_recipes`
--

INSERT INTO `my_recipes` (`id`, `user_id`, `recipe_id`, `created_on`) VALUES
(1, 5, 3, '2014-12-26 07:03:48'),
(2, 3, 2, '2014-12-26 07:03:48'),
(3, 2, 4, '2014-12-26 07:03:48'),
(4, 1, 5, '2014-12-26 07:03:48'),
(5, 4, 2, '2014-12-26 07:03:48'),
(6, 6, 3, '2014-12-26 07:03:48'),
(7, 1, 3, '2014-12-26 07:03:48'),
(8, 5, 1, '2014-12-26 07:03:48'),
(9, 3, 4, '2014-12-26 07:03:48'),
(10, 6, 1, '2014-12-26 07:03:48'),
(11, 1, 0, '2015-03-10 07:57:31'),
(12, 1, 1, '2015-03-10 07:57:40'),
(13, 1, 1, '2015-03-10 08:01:55'),
(14, 1, 1, '2015-03-10 08:01:55'),
(15, 2, 15, '2015-03-10 08:01:55'),
(16, 2, 6, '2015-03-10 08:01:55'),
(17, 2, 8, '2015-03-10 08:01:55'),
(18, 2, 5, '2015-03-10 08:01:55'),
(19, 3, 15, '2015-03-10 08:01:55'),
(20, 3, 6, '2015-03-10 08:01:55'),
(21, 3, 8, '2015-03-10 08:01:55'),
(22, 3, 5, '2015-03-10 08:01:55'),
(23, 4, 15, '2015-03-10 08:01:55'),
(24, 4, 6, '2015-03-10 08:01:55'),
(25, 4, 8, '2015-03-10 08:01:55'),
(26, 4, 5, '2015-03-10 08:01:55'),
(27, 5, 15, '2015-03-10 08:01:55'),
(28, 5, 6, '2015-03-10 08:01:55'),
(29, 5, 8, '2015-03-10 08:01:55'),
(30, 5, 5, '2015-03-10 08:01:55'),
(31, 6, 15, '2015-03-10 08:01:55'),
(32, 6, 6, '2015-03-10 08:01:55'),
(33, 6, 8, '2015-03-10 08:01:55'),
(34, 6, 5, '2015-03-10 08:01:55'),
(35, 7, 15, '2015-03-10 08:01:55'),
(36, 7, 6, '2015-03-10 08:01:55'),
(37, 7, 8, '2015-03-10 08:01:55'),
(38, 7, 5, '2015-03-10 08:01:55'),
(39, 8, 15, '2015-03-10 08:01:55'),
(40, 8, 6, '2015-03-10 08:01:55'),
(41, 8, 8, '2015-03-10 08:01:55'),
(42, 8, 5, '2015-03-10 08:01:55'),
(43, 9, 15, '2015-03-10 08:01:55'),
(44, 9, 6, '2015-03-10 08:01:55'),
(45, 9, 8, '2015-03-10 08:01:55'),
(46, 9, 5, '2015-03-10 08:01:55'),
(47, 13, 15, '2015-03-10 08:01:55'),
(48, 13, 6, '2015-03-10 08:01:55'),
(49, 13, 8, '2015-03-10 08:01:55'),
(50, 13, 5, '2015-03-10 08:01:55'),
(51, 15, 15, '2015-03-10 08:01:55'),
(52, 15, 6, '2015-03-10 08:01:55'),
(53, 15, 8, '2015-03-10 08:01:55'),
(54, 15, 5, '2015-03-10 08:01:55'),
(55, 1, 15, '2015-03-10 08:01:55'),
(56, 1, 6, '2015-03-10 08:01:55'),
(57, 1, 8, '2015-03-10 08:01:55'),
(58, 1, 5, '2015-03-10 08:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prep_time` int(11) NOT NULL,
  `cook_time` int(11) NOT NULL,
  `diff_level` varchar(255) NOT NULL,
  `serves` int(11) NOT NULL,
  `spicy` int(11) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `method_html` text NOT NULL,
  `recipe_type_id` int(11) NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `image`, `created_on`, `prep_time`, `cook_time`, `diff_level`, `serves`, `spicy`, `video_url`, `method_html`, `recipe_type_id`, `is_featured`) VALUES
(93, 'FISH CUTLET', 'Img_551eb9d0799ac590.JPG', '2015-04-03 16:03:28', 15, 30, '2', 4, 2, '1.mp4', '1. Take water in a pan and bring it to a boil. Add the fish fillets to the water and let it cook nicely \r\n2. Remove the fish from the water and shred it into small pieces.\r\n3. Heat oil in a small skillet and saute the onions, ginger and garlic till brown.\r\n4. Add the shredded fish to it along with garam masala, salt, chilly powder , cumin powder and coriander.\r\n5. Keep stirring the mixture until it becomes very dry. This is essential for the cutlets to bind together very well.\r\n6. Once the above mixture is cool enough to handle, add one raw egg to it. Mix everything nicely with hands.\r\n7. Beat another egg in a bowl. Bread crumbs in another plate and keep aside.\r\n8. Now Make small round balls out of the cutlet mixture and press and make into cutlets.\r\n9. Dip in the egg & then the bread crumb and shallow fry in a pan with little oil.\r\n10. Once brown on both sides remove and serve', 24, 0),
(94, 'Goan beef croquettes', 'Img_551ebb412d18e280.jpg', '2015-04-03 16:09:37', 15, 30, '1', 4, 2, '2.mp4', '1. In a pressure cooker boil the mince, diced vegetables, garam masala, turmeric, pepper, cinnamon, cloves and cumin powder, add little water and 1 whistle it out, switch the gas/hob off and let it sit there in it, till it cools down. \r\n2. Once cool, open and check if the water has evaporated, if not cook on slow heat till it''s dry. \r\n3. Now add the sour lime/vinegar.\r\n4. Add chopped coriander and crushed bread slices for binding. \r\n5. Add the mixer to a blender and blitz till all combined well. \r\n6. Remove in a bowl and break an egg to it. In a shallow pan heat oil.\r\n7. Take a ball of the mixture elongate it and roll it in the semolina mixture on all sides.\r\n8. Shallow fry on all sides, keep turning and fry till it''s golden brown.\r\n9. Serve with green chutney/baps and enjoy.', 24, 0),
(95, 'ONION & POTATO BHAJI''S', 'Img_551ebe8ce9490139.jpg', '2015-04-08 15:16:04', 15, 15, '1', 4, 1, 'https://www.youtube.com/watch?v=Qr7BOnrwoeI', ' 1. Sift the flour into a mixing bowl and add all the ingredients except bakind soda, oil, salt and the vegetables.\r\n2. Mix well with a spoon.\r\n3. Add half glass water and stir well.\r\n4. Add the remaining water and use a beater to remove lumps.\r\n5. Add salt and baking soda and stir well and keep aside.\r\n6. Add oil to the pan for deep frying. \r\n7. Now take few of the diced onions and caot in the batter and gently add to the oil.\r\n8. Fry one side for 3-5 minutes.\r\n9. Turn and fry on the other side too.\r\n10. Take it out on the paper towel and serve hot with green chutney and ketchup.\r\nTip: Do the smae with the spinach or potato sliced in circles.\r\nAdjust the heat as per your preference.\r\nThis dish goes well on a rainy and cold evening with masala chai.', 24, 1),
(96, 'CHILLI CHICKEN LILLIPOP', 'Img_551ec473a1184303.jpg', '2015-04-08 15:14:12', 15, 15, '1', 4, 2, 'https://www.youtube.com/watch?v=MHEKTeMH4as', '1. Cut the wings into two, chop the end bone, pull the flesh up with the skin and remove the thin bone and mould into a lollipop.  In case of drumstick make cuts on the flesh like the above video.\r\n2. Now dip the chicken in the egg batter and then the flour batter and gently fry in the hot oil.\r\n3. Turn on all sides till well cooked.\r\n4. Remove onto the kitchen tissues.\r\n5. Serve hot with any chutney or sauce of your choice.\r\n\r\nTip: For better results always fry it few minutes before serving. You can make the batter, cover and keep aside and make this just before serving. Please adjust heat as per your reference. In India the two batter is mixed together. But I wanted it seperate so that the chicken gets well coated in the spice. Also its'' usually the wings that are used but I used the legs.', 24, 1),
(97, 'Grilled Vindaloo Pork Chops', 'Img_551eca0a5a865780.jpg', '2015-04-03 17:12:42', 10, 15, '1', 2, 3, '2.mp4', '1. Wash the pork chops, dry it with paper towel.\r\n2. Mix vindaloo paste, sugar and salt to taste in a bowl or zip-lock bag.\r\n3. Apply and let marinate in the refrigerator for at least 30 to 45 minutes. If possible the day before is the best.\r\n4. On a hot grill lay the pork chops and cook till done according to your preference.  I like my pork chops well done I grilled mine on for 20 minutes.', 24, 0),
(98, 'BOILED EGG MASALA ROAST', 'Img_551ecfaa481c4205.jpg', '2015-04-08 15:13:32', 15, 30, '2', 2, 3, 'https://www.youtube.com/watch?v=nRR8rwTQDrg', '1. Heat oil in a heavy bottomed vessel, add mustard & cumin seeds.\r\n2. Once hot add sliced onions and green chilies.\r\n3. Add 1 tsp turmeric powder.\r\n4. Roast the boiled egg in the same oil on all sides and keep aside.\r\n5. Add the tomato & green chillies and mash well.\r\n6. Add ginger garlic paste and saute well\r\n7. Add red chili powder, coriander powder, cumin powder and stir well.\r\n8. Add salt and mix.\r\n9. Add half cup water & mix well. Reduce consistency and add remaining water.\r\n10. If the gravy dries out add another cup of water and stir.\r\n11. Add the boiled eggs, coriander place lid and simmer till gravy dries out.\r\nServe with any bread.\r\n\r\nTip: You can add ready chopped tomato''s and adjust heat as per your requirement.', 5, 0),
(99, 'MANGALOREAN PORK INDAD', 'Img_551edb3289174770.jpg', '2015-04-08 15:15:26', 20, 30, '2', 4, 4, 'https://www.youtube.com/watch?v=CWWE72TRYTM', '1. Wash and drain the pork and cut into squares along with the fat on each piece. \r\n2. Grind all the ingredients mentioned under ''For the masala''.\r\n3. Reserve the masala water from the mixer grinder.\r\n4. In a deep pan fry the pork pieces in batches one by one and keep aside/\r\n5. Add the ground masala to the oil and continue to fry for about 8-10 minutes on a slow flame.  Add the reserved water from the mixer \r\n6. Add the pork pieces. \r\n7. Cook well for more 15 minutes and add vinegar\r\nServe hot with warm neer dosa/steamed sannas (These are typical mangalorean bread which go very well with this dish). You can eat this with any rice or bread of your choice.', 5, 0),
(100, 'LAMB LEG ROAST', 'Img_551ee27744061985.jpg', '2015-04-08 15:14:58', 15, 105, '1', 4, 1, 'https://www.youtube.com/watch?v=D8zShbQsDu4', '1. Poke holes in the lamb using a sharp knife and fill the holes with the garlic. fill some cloves too and spread the cinnamon, peppercorn, cardamom, break the thyme and lime juice. \r\n2. Repeat the above procedure on the other side too and rub the lamb well. \r\n3. Add olive oil on both sides and rub again. \r\n4. Sprinkle salt and rub again.\r\n5. Now place the sliced onion and carrots well near the lamb and place lime rounds on it.\r\n6. Add the 2 cups of water in the tray and cover the lamb with the aluminium foil.\r\n7. Preheat the oven to 200C/400F/Gas 6 and cook for 1 hour 45 minutes if you want well done.\r\nFor rare cook for rare 15-20 minutes, for Medium rare 25-30 minutes, for Medium Done 45 minutes - 1hour and for Well done 1 hour 45 minutes.\r\n8. Check once at 45 minutes and put it back if not satisfied.\r\n9. Once done the lamb should have a good crust on top and soft pink brown and juicy inside.\r\n10. Separate the potatoes, gravy and meat.\r\n11. Scrape the gravy and juices from the bottom of the pan. Strain the gravy.\r\n12.  Add 2 tspn of honey if the gravy is sour.\r\n13.  Now start carving the meat and cut in pieces.\r\n14. Serve with the potatoes and pour the gravy on it.\r\nTip: Cover the remaining meat with aluminium foil to retain mositure. This will stay fresh in the fridge for 1 week.\r\nBaby carrots, asparagus, baby corn, whole baby potatoes and mushrooms can also be added and they taste delicious with this recipe.\r\nI have used light whole spices since too much overpowers the taste and flavour of the lamb. You can adjust the heat as per your preference. To thicken the gravy you can add flour and heat it up.', 5, 0),
(102, 'Chicken Tikka Masala', 'Img_551f05eee80c8151.JPG', '2015-04-03 21:28:14', 25, 30, '2', 4, 2, 'https://www.youtube.com/watch?v=PnOKLaupZ4s', 'Method 1 for Chicken Tikka:\r\n1. In a bowl whisk fresh yoghurt, salt, 1 tspn turmeric, ginger & garlic paste, food colour red (optional), 1 tspn garam masala, red kashmiri chilli powder, and lemon juice. Add the cubed boneless chicken pieces to the marinade and mix well. Cover and keep aside for 2 hours in room temperature or in the fridge overnight. \r\n\r\nMethod 1 for Chicken Tikka Masala Curry:\r\n1. In the meanwhile heat ghee/oil in a large heavy pot over medium heat. Add onion, 1/2 tspn turmeric.\r\n2. Once the onion has browned add the tomato paste, whole crushed cardamom, and chillies and cook, stirring often, until the oil leaves the sides of the pan for 5minutes.\r\n3. Add tomatoes with the juices, and crush them. Bring to a boil, reduce heat, and simmer, stirring often until the gravy thickens, 5 minutes\r\n4. Add the cashew paste ( Please note: people with nut allergy please avoid the cashew paste).,and red food colour(optional) few drops in it.\r\n5. Add a cup of water if the curry is thick. Cover & keep it aside.\r\n\r\nMethod 2 for Chicken Tikka:\r\n1. Now take the chicken pieces and pass it through the grill sticks/skewers which were soaked in water. \r\n2. Line them on the tray and grill it in the oven for Gas mark Preheat the oven to 200ºC (400ºF) or gas mark 6 (for fan assisted ovens adjust temperature/time accordingly). Apply marinade & oil with brush.Cook well and turn on sides till black spots appear in them. \r\n\r\nMethod 2 for Chicken Tikka Masala Curry:\r\n1. Open the cover from the pot and scrape the bottom well. Add a cup of water to it.\r\n2. Add the cream and 1 tspn garam masala and 1 tbspn kasoori methi. Simmer, stirring occasionally, until sauce thickens for 10 minutes.\r\n3. Take the chicken out from the stick and add it to the gravy along with the chopped coriander and simmer. \r\n4. Serve with steamed rice and salad of your choice.\r\n\r\nTip: Marinade chicken overnight for better results. Also the kashmiri chilli gives rich red colour and has less heat in it. Does''nt matter in which order you put the marinade mixture and mix, but as long as it''s the right quantity. Please reduce the heat as per your preference.\r\nPlease note: people with nut allergy please avoid the cashew paste.', 5, 0),
(103, 'BEEF MADRAS CURRY', 'Img_551f0f0f8d904889.JPG', '2015-04-09 18:53:47', 25, 60, '1', 4, 3, 'https://www.youtube.com/watch?v=3Ub5mWZDNxE', '1. Add oil in a pan once the oil has heated up add the chopped onion.\r\n2. Add a pinch of turmeric to speed up browning.\r\n3. Add the beef pieces and stir well.\r\n4. Now grind the masala from the grinder ingredients. Grind with enough water to make it a smooth paste.\r\n5. Add the paste to the beef.\r\n6. Cover and simmer. Add the water reserved from the grinder. \r\n7. Cover and cook for 15-30 minutes on low flame. \r\n8. Finally add the Garam Masala and mix in well and cook for a further 5 minutes.\r\n9. Add salt and simmer for few minutes.\r\n10. Scrape the bottom of the pan well and mix well.\r\n11. Remove from the hob and serve with Rice or Naan\r\n12. Garnish with Coriander.\r\n\r\nTip: Adjust heat as per your preference. Instead of hot chilli powder you can use kashmiri chilli powder which adds colour and less heat to the food. You can make the grinder paste and store in the fridge in advance. It remains fresh for 2 weeks.\r\nThe reserved water from grinder means. Adding water to the remaining unwashed juice and paste on the sides of the grinder vessel and using those juices for the curry.', 5, 1),
(104, 'DAL FRY', 'Img_551f2c20358a5905.jpg', '2015-04-06 12:29:28', 10, 30, '1', 4, 2, 'https://www.youtube.com/watch?v=HgpTjG6dRNY', '1. Clean, wash and soak the dals together in a bowl for an hour. Drain and keep aside.\r\n2. Heat the ghee in a deep pan, add the cumin seeds, mustard seeds.\r\n3. Once it crackles add onions and turmeric powder let it brown well.\r\n4. Add the chopped tomatoes.\r\n5. Now add the cumin powder, fennel powder and coriander powder.\r\n6. Now smash the mixture well with the back of the spoon.\r\n7. Cook till the ghee leaves the sides\r\n8. Add the dals, salt and 1 cup water, mix well and pressure cook for 10-15 minutes.\r\n9. Add one more cup of water if it''s dry and cook further for 5 minutes.\r\n\r\nGarnish with coriander and serve immediately with steamed rice, naan, chapathi or bred of your choice and salad.\r\nAdjust chilli heat as per your preference.', 5, 1),
(105, 'Chicken Tandoori', 'Img_551ff46b81b9f264.JPG', '2015-04-04 14:25:47', 15, 30, '1', 4, 2, 'https://www.youtube.com/watch?v=2JM3zVSYTwk', '1. In a bowl add the ingredients for the marinade 2 tablespoon yoghurt, 1 tablespoon garam masala, 2 tablespoon kashmiri chilli powder, 1 teaspoon coriander powder, 1 teaspoon cumin powder, 1 teaspoon turmeric powder, 1 tablespoon kasoori methi (dried fenugreek leaves), Salt as per taste, red food colour (optional) 2 tablespoon ginger and garlic paste.\r\n2. Mix well to a smooth paste.\r\n3. Make cuts in the chicken as per the video above and rub the marinade well in the chicken cuts and all over.\r\n4. Cover and keep aside for 2 hours or overnight in the fridge.\r\n5. Grease the pan with oil and roll the drumsticks in the oil.\r\n6. Line them on the tray and grill it in the oven for Gas mark Preheat the oven to 200ºC (400ºF) or gas mark 6 (for fan assisted ovens adjust temperature/time accordingly).\r\n7. Grill till black spots appear on them.\r\n8. Serve hot with green chutney\r\nTips:  \r\nI have used chicken drumstick but you can use the whole chicken legs for this. Increase the quantity by 1 tablespoon for the ingredients and the spice as per your preference.?\r\nAlso use kashmiri chilli as that adds colour and less heat to the recipe.\r\nStore in marinade overnight for better taste results.', 24, 0),
(106, 'WINE / RUM SPICE CAKE', 'Img_551ff9e92aae0407.JPG', '2015-04-04 14:57:17', 25, 60, '3', 10, 1, 'https://www.youtube.com/watch?v=8XU0bjsbNh0', '1. In a large bowl sieve the flour & baking powder together cover & keep aside.\r\n2. Grease cake tin with butter and then dust the flour in it to seal it.\r\n3. In another bowl separate egg yolks from the whites and whisk the egg yolks separately with vanilla.\r\n4. In a coffee grinder/mixer grinder grind all the spice ingredients.\r\n5. In seperate bowl beat the butter and powdered brown sugar till it''s soft and fluffy.\r\n6. Strain the soaked raisins and reserve the the wine.\r\n7. In another bowl add the dried fruits and the strained raisins. (Add few spoons of all purpose flour on it, mix well, this will prevent it from sinking to the bottom of the cake.) \r\n8. Now take the large flour bowl and add the egg yolk to it, gently fold it.\r\nNow add the butter and sugar mixture little by lttle and fold it gently again.\r\nAdd the ground spice powder and 10ml reserved wine & 10ml dark rum and mix well.\r\n9. Add the fluffy egg white little by little and mix gently.\r\n10. Add the mixed fruits & nuts to the cake batter little by little and cut and fold gently.\r\n11. Add the orange and ginger juice and mix well\r\n12. Add the reamining nuts mixture and melted dark chocolate and mix well\r\n13. Add the remaining egg white mixture and cut and fold gently.\r\n14. Pour the batter in the cake pan and make sure leave 1 inch of a height for the cake to rise, which means fill the pan almost half and not full.\r\n15. Gently tap at the sides to level the cake batter.\r\n16. In a pre-heated oven bake the cake at 325 degrees F for about 45 minutes.\r\n17. Check once at 25-30 minutes & do a skewer test. If it''s wet cook further for 10-15 minutes. \r\n18. Test again if the skewer is dry your cake is ready.\r\n19. Cool your cake in room temperature \r\n20. Make few holes on the cake and drizzle the top with the remaining rum & wine. You can do this several times & use more rum if you want it really rum & wine soaked.\r\n21. Wrap with an aluminium foil and keep it outside in room temperature in a close container.\r\n22. This cake lasts for a month outside, but it''s so tempting that you may not wait to finish it.\r\nTips: Avoid nuts if allergic to nuts. If you don''t like sultana''s and raisins use other dried fruits. Use orange zest if you dont want the juice. This cake can be made in advance and soaked. You can adjust the spice as per your preference and the alcohol too.\r\nIf you do not want alcohol you can substitute with non-alcoholic juices and drinks.', 2, 1),
(107, 'Peas Pilau / Pulav Rice', 'Img_552010fa59476279.png', '2015-04-04 16:27:38', 5, 15, '1', 4, 1, 'https://www.youtube.com/watch?v=JOzPRSVwGhg', '1. Soak the basmati rice in water for 30-40 minutes in cold water to let it bloom.\r\n2. Drain the rice and keep aside.\r\n3. Heat a pan. Add oil or ghee.\r\n4. On a low or medium flame when the oil becomes hot, add the cumin once it crackles  add the star anis.\r\n5. Add the soaked rice. Stir and saute for 1-2 minutes\r\n6. Add the green peas and stir well.\r\n7. Add salt and water.\r\n8. Check the rice once and don''t overcook it. \r\n9. Strain and serve with curry of your choice.\r\n Tip: \r\nIn a deep pan you can add oil and add your favourite spice combo and then add the soaked rice and water and boil to give the rice some flavour.\r\nYou can add green peas when the rice is almost done and then mix well and strain the rice.\r\nPlease do add spices of your choice and make it spicy if you wish.', 5, 0),
(108, 'Palak Paneer (Spinach & Cottage Cheese)', 'Img_5520134679e60892.jpg', '2015-04-04 16:37:26', 15, 30, '2', 4, 3, 'https://www.youtube.com/watch?v=hekWzhknf2M', '1. In a mixer grinder blitz together grinder ingredients and make a thick paste.\r\n2. In Heat a deep cooking pot add oil, when the oil is hot add mustard & cumin seeds.\r\n3. Add the sliced onions and stir till golden brown.\r\n4. Add the paneer/cottage cheese cubes and stir well till brown on all sides.\r\n5. Now add the grinder paste, stir and cook for 5-10 minutes.\r\n6. Add the resereved water from the grinder and stir.\r\n7. Add the garam masala and stir again.\r\n8. Cover and simmer for few more minutes.\r\n9. Serve warm with rice, naan or any bread of your choice with hot poppodams. \r\nTips: \r\nThe lemon juice helps in mintaining the green colour and digestion of the spinach.\r\nPlease adjust heat as per your preference. If you prefer it a bit more tangy do add 1 tbspn lemon juice once again just before serving at the end.', 5, 0),
(109, 'Pav Bhaji', 'Img_552018216e8f1045.png', '2015-04-04 16:58:09', 15, 30, '2', 4, 2, 'https://www.youtube.com/watch?v=gxnur5QLJ5A', '1. Boil the potatoes and mix veg using 2 cups of water in a pressure cooker  or a pot until very soft and mushy. Once cooked, mash using a potato masher until smooth and creamy.\r\n2. Heat oil in a pan add onions, garlic, ginger and sauté until tender on low heat. Add in the tomatoes and sauté until the soft.\r\n3. Now add the pav bhaji masala and garam masala and sauté for a few minutes.\r\n4. Make sure not to burn the masala.\r\n5. Finally add in the mashed vegetables, salt, butter and lemon juice. Stir all the ingredients until well combined.\r\n6. Please add water if the mashed vegetables are too thick before adding it to the masala.\r\n7. Take care while adding salt as all the masala’s contain some amount of salt in them.\r\n8. Turn the heat to low, add the two tablespoons of butter and simmer the bhaji for about 10 minutes stirring occasionally.\r\n9. Turn of the heat and stir in the chopped coriander leaves and the steamed peas.\r\n10. Toast the pav buns/baps on a skillet with butter.\r\n11. Top them with chopped onions and coriander and serve them with buns/baps. ', 24, 0),
(110, 'GOAN POMFRET (FISH) AMBOTIK CURRY', 'Img_55201b40e970f233.JPG', '2015-04-04 17:11:49', 15, 30, '2', 4, 3, '1.mp4', '1. Clean and cut the pomfret fish into small pieces.\r\n2. Wash the pomfret pieces and marinate with salt,turmeric powder and red chilly powder for atleast an hour.\r\n3. Grind the following ingredients to a fine paste - 1 cup coconut, 5-6 kashmiri red chillies, turmeric powder 1/2 tspn, 1 tamarind small ball/tomato puree, coriander seeds 2 tbspn,peppercorns 10-15, 15 garlic cloves, 1/2 onion with little water.\r\n4. Reserve water from grinder.\r\n5. Heat oil in a non-stick pan. Add the fenugreek seeds 1/2 tspn once it splutters and changes colour add the finely chopped onion to it.\r\n6. Once the onions have been sauted and turn brown add the above ground paste.\r\n7. Add the tomato after a boil and mash it well.\r\n8. Add some salt and stir well.\r\n9. Stir well and once the oil leaves the sides add little of the reserved water. \r\n10. Cook for 10-15 minutes and add the rest of the reserved water.\r\n11. Put in the marinated fish and gentle fold the gravy.\r\n12. Cook for about 5-6 minutes as pomfret cooks fast.\r\n13. Add the chopped coriander leaves and stir.\r\n14. Serve hot fish curry with steamed rice and salad of your choice.\r\nTip: Adjust heat as per your preference. ', 5, 1),
(111, 'Goan Raechard Fish Fry', 'Img_55201f7bb3f31206.JPG', '2015-04-04 17:29:31', 20, 30, '2', 4, 3, '2.mp4', '1. Marinate the cleaned fish, make sure you take all scales by using back of the knife.\r\n2. Make slits in the fish and add salt and lime juice and set aside for 15 mins.\r\n3. Grind all the other ingredients to a paste except the oil.\r\n4. Wash the fish and smear the ground paste all over the fish and in the slits.\r\n5. It''s better to marinate and keep in fridge overnight.\r\n6. Shallow fry, grill or barbeque for 6 mins on each side.\r\n7. Serve hot with steamed rice and any light gravy or dal.', 24, 0),
(114, 'Chicken Vindaloo', 'Img_553d43a2b67e2796.jpg', '2015-04-26 19:59:30', 10, 35, '2', 4, 4, 'https://www.youtube.com/watch?v=YJ6A0CGWErE', 'The name Vindaloo is derived from the Portuguese dish that was known as “Carne de Vinha d’Alhos” that means a dish made of pork cooked with wine. Slowly the locals of Goa in India replaced the wine with vinegar and added their touch of spices and blends. The authentic taste of vindaloo comes from a unique blend of garlic, vinegar, and kashmiri chili.\r\n\r\n1. Wash the Chicken pieces well, and then chop them up into nice bits.\r\n2. Dry them up using a kitchen towel to absorb all the water.\r\n3. Then add some salt this should help dry the pieces even more.\r\n4. Add all the ingredients of the vindaloo masala and then grind all of it in the blender.\r\n5. Add 1/4 vinegar & blend.\r\n6. After few minutes add more 1/4 vinegar & blend again.\r\n7. Add your masala to the chicken pieces and mix it up well. Make sure all the pieces of meat are evenly mixed with the masala mix it up and store it overnight in the fridge or aside for 2 hours.\r\n8. In a deep pan add some oil and transfer the pieces of chicken to it.\r\n9. Add 4-6 peppercorns and 4-6 cloves.\r\n10 Let the vindaloo simmer on a low fire as the meat soaks in the masala and gets cooked for 15-20 minutes.\r\n11. Add the potatoes & cook for 2-3 minutes further.\r\nTip: The Vindaloo tastes better the next day as the meat gets properly marinated, its not really a very spicy dish but on the tangy side. The longer you store it the better it tastes just like any pickle. Adjust heat as per your preference.', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_type`
--

CREATE TABLE IF NOT EXISTS `recipe_type` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_type`
--

INSERT INTO `recipe_type` (`id`, `title`, `image`, `created_on`) VALUES
(2, 'Dessert', 'dessert.png', '2014-12-22 09:50:28'),
(3, 'Drinks', 'beverage.png', '2014-12-22 09:50:28'),
(5, 'Main', 'main_dish.png', '2014-12-22 09:50:28'),
(6, 'Salad', 'salad.png', '2014-12-22 09:50:28'),
(22, 'Soups', 'soups.jpg', '2015-02-06 11:11:38'),
(24, 'Starters', 'rolls.jpg', '2015-03-25 13:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_views`
--

CREATE TABLE IF NOT EXISTS `recipe_views` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `views` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=420 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipe_views`
--

INSERT INTO `recipe_views` (`id`, `user_id`, `recipe_id`, `views`) VALUES
(1, 1, 1, 1),
(2, 3, 1, 1),
(3, 0, 1, 1),
(4, 2147483647, 1, 1),
(5, 2147483647, 1, 1),
(6, 2147483647, 1, 1),
(7, 2147483647, 1, 1),
(8, 2147483647, 1, 1),
(9, 2147483647, 1, 1),
(10, 2147483647, 1, 1),
(11, 2147483647, 1, 1),
(12, 2147483647, 1, 1),
(13, 2147483647, 1, 1),
(14, 2147483647, 1, 1),
(15, 2147483647, 1, 1),
(16, 2147483647, 1, 1),
(17, 2147483647, 1, 1),
(18, 2147483647, 1, 1),
(19, 2147483647, 1, 1),
(20, 2147483647, 1, 1),
(21, 2147483647, 1, 1),
(22, 2147483647, 1, 1),
(23, 2147483647, 1, 1),
(24, 2147483647, 1, 1),
(25, 2147483647, 1, 1),
(26, 2147483647, 1, 1),
(27, 2147483647, 1, 1),
(28, 2147483647, 1, 1),
(29, 2147483647, 1, 1),
(30, 2147483647, 1, 1),
(31, 2147483647, 1, 1),
(32, 2147483647, 1, 1),
(33, 2147483647, 1, 1),
(34, 2147483647, 1, 1),
(35, 1, 2, 1),
(36, 1, 6, 1),
(37, 2147483647, 1, 1),
(38, 2147483647, 1, 1),
(39, 2147483647, 1, 1),
(40, 2147483647, 1, 1),
(41, 2147483647, 1, 1),
(42, 2147483647, 1, 1),
(43, 2147483647, 1, 1),
(44, 2147483647, 1, 1),
(45, 2147483647, 1, 1),
(46, 2147483647, 1, 1),
(47, 2147483647, 1, 1),
(48, 1, 5, 1),
(49, 1, 4, 1),
(50, 2147483647, 1, 1),
(51, 2147483647, 1, 1),
(52, 2147483647, 1, 1),
(53, 1, 43, 1),
(54, 1, 30, 1),
(55, 1, 25, 1),
(56, 1, 16, 1),
(57, 2147483647, 1, 1),
(58, 2147483647, 1, 1),
(59, 2147483647, 1, 1),
(60, 2147483647, 1, 1),
(61, 2147483647, 1, 1),
(62, 2147483647, 1, 1),
(63, 2147483647, 1, 1),
(64, 2147483647, 1, 1),
(65, 2147483647, 1, 1),
(66, 2147483647, 1, 1),
(67, 2147483647, 1, 1),
(68, 2147483647, 1, 1),
(69, 2147483647, 1, 1),
(70, 1, 9, 1),
(71, 2147483647, 1, 1),
(72, 2147483647, 1, 1),
(73, 2147483647, 1, 1),
(74, 2147483647, 1, 1),
(75, 2147483647, 1, 1),
(76, 24, 1, 1),
(77, 2147483647, 1, 1),
(78, 2147483647, 1, 1),
(79, 2147483647, 1, 1),
(80, 2147483647, 1, 1),
(81, 30, 1, 1),
(82, 30, 2, 1),
(83, 30, 8, 1),
(84, 30, 3, 1),
(85, 1, 49, 1),
(86, 1, 47, 1),
(87, 30, 84, 1),
(88, 30, 71, 1),
(89, 30, 21, 1),
(90, 30, 51, 1),
(91, 30, 30, 1),
(92, 30, 6, 1),
(93, 30, 20, 1),
(94, 30, 15, 1),
(95, 30, 77, 1),
(96, 1, 54, 1),
(97, 1, 59, 1),
(98, 24, 6, 1),
(99, 1, 35, 1),
(100, 1, 36, 1),
(101, 1, 20, 1),
(102, 30, 70, 1),
(103, 30, 69, 1),
(104, 30, 67, 1),
(105, 1, 11, 1),
(106, 1, 3, 1),
(107, 24, 2, 1),
(108, 1, 23, 1),
(109, 24, 3, 1),
(110, 13, 1, 1),
(111, 22, 11, 1),
(112, 22, 53, 1),
(113, 22, 1, 1),
(114, 22, 2, 1),
(115, 13, 76, 1),
(116, 13, 11, 1),
(117, 30, 65, 1),
(118, 30, 11, 1),
(119, 30, 19, 1),
(120, 30, 22, 1),
(121, 30, 31, 1),
(122, 30, 68, 1),
(123, 24, 12, 1),
(124, 24, 36, 1),
(125, 24, 25, 1),
(126, 30, 17, 1),
(127, 30, 32, 1),
(128, 30, 42, 1),
(129, 30, 83, 1),
(130, 24, 65, 1),
(131, 30, 12, 1),
(132, 24, 68, 1),
(133, 24, 70, 1),
(134, 24, 83, 1),
(135, 30, 62, 1),
(136, 24, 51, 1),
(137, 24, 59, 1),
(138, 30, 55, 1),
(139, 30, 24, 1),
(140, 30, 26, 1),
(141, 13, 4, 1),
(142, 30, 85, 1),
(143, 13, 3, 1),
(144, 13, 5, 1),
(145, 13, 9, 1),
(146, 24, 16, 1),
(147, 24, 9, 1),
(148, 24, 42, 1),
(149, 24, 11, 1),
(150, 24, 30, 1),
(151, 24, 43, 1),
(152, 30, 9, 1),
(153, 24, 8, 1),
(154, 24, 44, 1),
(155, 30, 16, 1),
(156, 0, 9, 1),
(157, 0, 8, 1),
(158, 13, 2, 1),
(159, 13, 6, 1),
(160, 13, 53, 1),
(161, 13, 10, 1),
(162, 23, 12, 1),
(163, 23, 13, 1),
(164, 13, 73, 1),
(165, 13, 36, 1),
(166, 13, 16, 1),
(167, 13, 15, 1),
(168, 13, 13, 1),
(169, 22, 3, 1),
(170, 22, 4, 1),
(171, 13, 19, 1),
(172, 13, 54, 1),
(173, 13, 84, 1),
(174, 13, 21, 1),
(175, 13, 83, 1),
(176, 13, 31, 1),
(177, 13, 82, 1),
(178, 13, 80, 1),
(179, 13, 67, 1),
(180, 13, 68, 1),
(181, 13, 69, 1),
(182, 13, 70, 1),
(183, 13, 74, 1),
(184, 13, 77, 1),
(185, 13, 78, 1),
(186, 13, 52, 1),
(187, 13, 8, 1),
(188, 13, 12, 1),
(189, 14, 2, 1),
(190, 14, 1, 1),
(191, 14, 5, 1),
(192, 14, 84, 1),
(193, 14, 4, 1),
(194, 14, 11, 1),
(195, 14, 3, 1),
(196, 14, 7, 1),
(197, 14, 6, 1),
(198, 14, 9, 1),
(199, 14, 10, 1),
(200, 14, 12, 1),
(201, 14, 25, 1),
(202, 14, 22, 1),
(203, 14, 24, 1),
(204, 14, 23, 1),
(205, 14, 14, 1),
(206, 14, 42, 1),
(207, 14, 44, 1),
(208, 14, 45, 1),
(209, 14, 31, 1),
(210, 14, 33, 1),
(211, 14, 37, 1),
(212, 0, 30, 1),
(213, 0, 41, 1),
(214, 0, 32, 1),
(215, 0, 6, 1),
(216, 0, 7, 1),
(217, 0, 2, 1),
(218, 0, 11, 1),
(219, 30, 7, 1),
(220, 34, 1, 1),
(221, 34, 11, 1),
(222, 30, 45, 1),
(223, 0, 18, 1),
(224, 0, 10, 1),
(225, 0, 16, 1),
(226, 0, 20, 1),
(227, 0, 3, 1),
(228, 14, 20, 1),
(229, 14, 8, 1),
(230, 14, 18, 1),
(231, 14, 50, 1),
(232, 14, 51, 1),
(233, 39, 4, 1),
(234, 39, 5, 1),
(235, 39, 1, 1),
(236, 39, 24, 1),
(237, 39, 20, 1),
(238, 39, 22, 1),
(239, 40, 1, 1),
(240, 40, 20, 1),
(241, 38, 1, 1),
(242, 40, 6, 1),
(243, 0, 22, 1),
(244, 40, 49, 1),
(245, 40, 50, 1),
(246, 40, 46, 1),
(247, 40, 2, 1),
(248, 39, 18, 1),
(249, 39, 2, 1),
(250, 39, 6, 1),
(251, 39, 8, 1),
(252, 39, 12, 1),
(253, 39, 16, 1),
(254, 40, 7, 1),
(255, 39, 9, 1),
(256, 39, 10, 1),
(257, 0, 21, 1),
(258, 38, 7, 1),
(259, 13, 24, 1),
(260, 13, 25, 1),
(261, 32, 6, 1),
(262, 32, 1, 1),
(263, 32, 4, 1),
(264, 40, 8, 1),
(265, 39, 7, 1),
(266, 39, 3, 1),
(267, 39, 29, 1),
(268, 39, 84, 1),
(269, 39, 83, 1),
(270, 39, 80, 1),
(271, 39, 88, 1),
(272, 39, 53, 1),
(273, 39, 76, 1),
(274, 39, 13, 1),
(275, 39, 14, 1),
(276, 39, 77, 1),
(277, 0, 24, 1),
(278, 40, 28, 1),
(279, 0, 62, 1),
(280, 42, 31, 1),
(281, 42, 30, 1),
(282, 42, 1, 1),
(283, 42, 2, 1),
(284, 42, 6, 1),
(285, 42, 20, 1),
(286, 43, 1, 1),
(287, 40, 18, 1),
(288, 41, 1, 1),
(289, 41, 6, 1),
(290, 41, 20, 1),
(291, 39, 28, 1),
(292, 39, 11, 1),
(293, 39, 23, 1),
(294, 39, 42, 1),
(295, 41, 7, 1),
(296, 39, 31, 1),
(297, 39, 36, 1),
(298, 39, 61, 1),
(299, 40, 9, 1),
(300, 40, 11, 1),
(301, 40, 4, 1),
(302, 41, 2, 1),
(303, 40, 14, 1),
(304, 40, 25, 1),
(305, 22, 5, 1),
(306, 22, 30, 1),
(307, 22, 6, 1),
(308, 44, 16, 1),
(309, 44, 1, 1),
(310, 44, 6, 1),
(311, 44, 3, 1),
(312, 22, 19, 1),
(313, 22, 14, 1),
(314, 44, 17, 1),
(315, 44, 7, 1),
(316, 44, 2, 1),
(317, 44, 9, 1),
(318, 22, 9, 1),
(319, 38, 6, 1),
(320, 38, 2, 1),
(321, 38, 20, 1),
(322, 38, 9, 1),
(323, 38, 24, 1),
(324, 41, 4, 1),
(325, 41, 87, 1),
(326, 41, 55, 1),
(327, 22, 25, 1),
(328, 22, 7, 1),
(329, 41, 8, 1),
(330, 22, 16, 1),
(331, 22, 13, 1),
(332, 22, 10, 1),
(333, 45, 6, 1),
(334, 45, 2, 1),
(335, 45, 11, 1),
(336, 45, 1, 1),
(337, 22, 20, 1),
(338, 41, 3, 1),
(339, 45, 7, 1),
(340, 43, 2, 1),
(341, 43, 27, 1),
(342, 42, 7, 1),
(343, 42, 8, 1),
(344, 42, 10, 1),
(345, 41, 16, 1),
(346, 23, 3, 1),
(347, 23, 2, 1),
(348, 23, 6, 1),
(349, 23, 5, 1),
(350, 23, 7, 1),
(351, 41, 25, 1),
(352, 41, 11, 1),
(353, 41, 18, 1),
(354, 46, 6, 1),
(355, 42, 11, 1),
(356, 46, 3, 1),
(357, 46, 4, 1),
(358, 23, 10, 1),
(359, 41, 22, 1),
(360, 41, 12, 1),
(361, 41, 9, 1),
(362, 41, 86, 1),
(363, 41, 14, 1),
(364, 39, 40, 1),
(365, 39, 39, 1),
(366, 41, 23, 1),
(367, 41, 17, 1),
(368, 41, 10, 1),
(369, 0, 14, 1),
(370, 0, 86, 1),
(371, 0, 4, 1),
(372, 0, 5, 1),
(373, 0, 39, 1),
(374, 0, 23, 1),
(375, 0, 90, 1),
(376, 0, 37, 1),
(377, 0, 38, 1),
(378, 42, 39, 1),
(379, 43, 86, 1),
(380, 47, 1, 1),
(381, 47, 2, 1),
(382, 47, 7, 1),
(383, 43, 5, 1),
(384, 43, 3, 1),
(385, 43, 99, 1),
(386, 43, 95, 1),
(387, 43, 96, 1),
(388, 43, 102, 1),
(389, 43, 105, 1),
(390, 43, 103, 1),
(391, 41, 104, 1),
(392, 43, 110, 1),
(393, 0, 103, 1),
(394, 0, 96, 1),
(395, 0, 104, 1),
(396, 0, 97, 1),
(397, 0, 94, 1),
(398, 0, 99, 1),
(399, 0, 100, 1),
(400, 0, 95, 1),
(401, 0, 110, 1),
(402, 0, 111, 1),
(403, 0, 106, 1),
(404, 0, 105, 1),
(405, 0, 102, 1),
(406, 0, 98, 1),
(407, 41, 103, 1),
(408, 41, 96, 1),
(409, 41, 94, 1),
(410, 41, 106, 1),
(411, 41, 95, 1),
(412, 41, 100, 1),
(413, 41, 107, 1),
(414, 0, 107, 1),
(415, 0, 109, 1),
(416, 0, 113, 1),
(417, 0, 108, 1),
(418, 0, 93, 1),
(419, 0, 114, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `fbid` varchar(100) NOT NULL,
  `googleid` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fbid`, `googleid`, `name`, `email`, `token`, `created_on`, `password`) VALUES
(1, '880738028637782', '', 'Alisha Kapoor', 'kapoor28alisha@gmail.com', 'c8206fa32365bbd51a4b3d4a0435f097', '2014-12-18 09:50:12', 'abc'),
(2, '0', '9223372036854775807', 'Ankit Garg', 'er.ankitgarg@gmail.com', '', '2014-12-18 09:50:12', 'def'),
(3, '0', '', 'anika chopra', 'ankitachopra@gmail.com', '', '2014-12-18 09:50:12', 'ghi'),
(4, '0', '', 'amisha malhotra', 'malhotra.amish@gmail.com', '', '2014-12-18 09:50:12', 'xyz'),
(5, '0', '', 'manisha dhingra', 'manisha.dhingra@gmail.com', '', '2014-12-18 09:50:12', 'pqr'),
(6, '0', '', 'nikita sharma', 'sharmanikita@gmail.com', '', '2014-12-18 09:50:12', 'mnop'),
(7, '0', '', 'sourabh gautam', 'sourabh20gautam@gmail.com', '', '2014-12-18 09:50:12', 'zxc'),
(8, '45646545', '', 'AK Grg', 'er1.ankitgarg@gmail.com', '7217593fbd365b1f8582f44de5df2ba5', '2015-02-03 05:33:31', ''),
(9, '880738028637782', '', '', '123@gmail.com', '3d53a705e9811e63b8689823aee7b6a0', '2015-02-17 07:28:07', ''),
(13, '', '104430323019308834938', '', 'gurpreetkaur939@gmail.com', '6175353f9cfac36b65aa6ef84663730b', '2015-02-17 11:55:41', ''),
(22, '793947614031088', '', '', 'gurpreetkaur939@gmail.com', '0988bbb63626d535efe05aa5c5e28da7', '2015-02-21 08:07:21', ''),
(23, '', '107881524135336651732', '', 'deepaknadda@gmail.com', '32f5d7165d45f0dcfdbaf73bebec8fe2', '2015-02-21 08:07:51', ''),
(26, '722883837829808', '', '', 'mukul_badhan@yahoo.com', '3609242c6fc68e4b88f21876fadc276a', '2015-02-21 13:02:36', ''),
(28, '781864761868915', '', 'Clone Trash', 'abc@gmail.com', 'a8ff53c097e3701db060e08417b63a46', '2015-02-21 14:46:18', ''),
(29, '', '4564651231345', 'AK Grg', 'er1.ankitgarg@gmail.com', '2825737321d8bcc47f61b4f2bd30cd1a', '2015-02-23 06:43:54', ''),
(30, '795036493922200', '', '', 'gurpreetkaur939@gmail.com', '75b986735364e04268d94ae0eb6c0a17', '2015-02-23 07:51:08', ''),
(32, '1052623824760263', '', '', 'gaganai3@yahoo.com', '56309bb92115a9eefd4af09927e3c5ca', '2015-03-09 11:46:10', ''),
(38, '113359640609517352961', '', '', 'binitvermani@gmail.com', '00a45b303ea636e0b666eede5ed75204', '2015-03-11 11:30:39', ''),
(39, '624122164386700', '', '', 'sharingan0867@gmail.com', 'acaffcc8a7f5e23bf0e8cfd95d303312', '2015-03-12 10:36:50', ''),
(40, '781864761868915', '', 'upasana', '(null)', 'a2c9fc0cfc77474186700cb0dec994f2', '2015-03-13 06:04:49', ''),
(41, '1386452581669222', '', 'somita', 'binitvermani@gmail.com', 'f98a5015112009013aff707bd2462f57', '2015-03-13 06:10:19', ''),
(42, '', '102766211041055571404', 'ashima', 'godwin.pinto@news.co.uk', '5e6126b5f1ca860933c847ff70e4b1aa', '2015-03-14 13:07:09', ''),
(43, '110255015557470763589', '', 'shwati', 'vazmargaret@gmail.com', 'f31a27a5315afdd13fa10896e5b1341c', '2015-03-14 19:23:35', ''),
(44, '104430323019308834938', '', '', 'gurpreetkaur939@gmail.com', '6175353f9cfac36b65aa6ef84663730b', '2015-03-19 06:24:15', ''),
(45, '739896559441766', '', '', 'pargat46@gmail.com', '9ba6d19ac2894a22c53de11a9f21de84', '2015-03-19 11:56:23', ''),
(46, '', '116930595831552824315', '', 'mukeshrana909@gmail.com', 'e2fe04a894dc66cb6a9a335e751c8e76', '2015-03-23 12:49:02', ''),
(47, '10153120244710781', '', '', 'vazmargaret@gmail.com', 'a48fa54878977eba3052459e9b58238f', '2015-03-28 23:19:51', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aisles`
--
ALTER TABLE `aisles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_type`
--
ALTER TABLE `ingredient_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_recipes`
--
ALTER TABLE `my_recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_type`
--
ALTER TABLE `recipe_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_views`
--
ALTER TABLE `recipe_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aisles`
--
ALTER TABLE `aisles`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=594;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=833;
--
-- AUTO_INCREMENT for table `ingredient_type`
--
ALTER TABLE `ingredient_type`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `my_recipes`
--
ALTER TABLE `my_recipes`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `recipe_type`
--
ALTER TABLE `recipe_type`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `recipe_views`
--
ALTER TABLE `recipe_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=420;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
