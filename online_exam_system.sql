-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 01:36 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign_course`
--

CREATE TABLE `assign_course` (
  `id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_course`
--

INSERT INTO `assign_course` (`id`, `t_id`, `sub_id`) VALUES
(6, 1011, 3),
(7, 1012, 4),
(8, 1013, 5),
(9, 1014, 6),
(10, 1015, 7),
(11, 1017, 9),
(12, 1018, 10),
(13, 1016, 8),
(14, 1009, 1),
(16, 1010, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `ch_id` int(11) NOT NULL,
  `ch_name` varchar(100) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`ch_id`, `ch_name`, `sub_id`) VALUES
(1, '1st chapter', 7),
(2, '1st quiz', 7),
(3, 'introduction', 7);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `exam_name` mediumtext NOT NULL,
  `t_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_name`, `t_id`, `sub_id`) VALUES
(7, 'Normalization', 1010, 7),
(13, 'math01', 1012, 4),
(14, 'S&S01', 1013, 5),
(15, 'circuit01', 1014, 6),
(16, 'DStutorial01', 1015, 7),
(17, 'CN01', 1016, 8),
(18, 'oop01', 1017, 9),
(19, 'CA01', 1018, 10),
(27, 'stat01', 1011, 3),
(28, 'stat03', 1011, 3),
(29, 'stat04', 1011, 3),
(31, 'op01', 1009, 1),
(32, 'op02', 1009, 1),
(33, 'op03', 1009, 1);

-- --------------------------------------------------------

--
-- Table structure for table `finale_exam`
--

CREATE TABLE `finale_exam` (
  `fe_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finale_exam`
--

INSERT INTO `finale_exam` (`fe_id`, `t_id`, `sub_id`, `status`) VALUES
(4, 1017, 9, 'normal'),
(5, 1016, 9, 'normal'),
(6, 1015, 9, 'head'),
(7, 1009, 2, 'normal'),
(8, 1010, 2, 'normal'),
(9, 1016, 2, 'head');

-- --------------------------------------------------------

--
-- Table structure for table `finale_question`
--

CREATE TABLE `finale_question` (
  `fq_id` int(11) NOT NULL,
  `fq_name` mediumtext NOT NULL,
  `fe_id` int(11) NOT NULL,
  `fqc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finale_question`
--

INSERT INTO `finale_question` (`fq_id`, `fq_name`, `fe_id`, `fqc_id`) VALUES
(22, 'rdydgghdr', 4, 6),
(23, 'dhgdfhdhfh', 4, 6),
(24, 'frhdrdr', 4, 0),
(25, 'dhdrhdrfhdfhdfhdfhdfhdfhdfhfhdfh', 4, 0),
(26, 'fdhfdhdfhdfhfhrfdhfd', 4, 0),
(27, 'fdhfh', 4, 0),
(28, 'ykykyfkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 4, 6),
(29, 'fxdghfhbx', 5, 6),
(30, 'gbnvbn', 5, 0),
(31, 'xfbvxcbxcbxbc', 5, 0),
(32, 'xgbvbxcvb', 5, 0),
(33, 'xgbvbxcb', 5, 6),
(34, 'dxcvzxcvzxc', 5, 6),
(35, 'dxvxcvcxv', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `option_id` int(11) NOT NULL,
  `option` varchar(10000) NOT NULL,
  `q_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`option_id`, `option`, `q_id`, `status`) VALUES
(21, 'option a', 8, 1),
(22, 'option a', 8, 0),
(23, 'option a', 8, 0),
(24, 'option a', 8, 0),
(25, 'option a', 9, 1),
(26, 'option b', 9, 0),
(27, 'option c', 9, 0),
(28, 'option d', 9, 0),
(29, '10', 10, 0),
(30, '30', 10, 0),
(31, '5', 10, 1),
(32, '7', 10, 0),
(33, 'Meghla', 11, 1),
(34, 'Ishika', 11, 0),
(35, 'Tania', 11, 0),
(36, 'Fadul', 11, 0),
(37, '1NF', 12, 0),
(38, '2NF', 12, 1),
(39, '3NF', 12, 0),
(40, 'BCNF', 12, 0),
(41, 'Transitive dependencies', 13, 0),
(42, 'Partial dependencies', 13, 0),
(43, 'Multi valued dependencies', 13, 1),
(44, 'None', 13, 0),
(45, 'first-come, first-served scheduling', 14, 1),
(46, 'shortest job scheduling', 14, 0),
(47, 'priority scheduling', 14, 0),
(48, 'none of the mentioned', 14, 0),
(49, 'CPU is allocated to the process with highest priority', 15, 1),
(50, 'CPU is allocated to the process with lowest priority', 15, 0),
(51, 'Equal priority processes can not be scheduled', 15, 0),
(52, 'none of the mentioned', 15, 0),
(53, 'shortest job scheduling algorithm', 16, 0),
(54, 'round robin scheduling algorithm', 16, 1),
(55, 'priority scheduling algorithm', 16, 0),
(56, 'multilevel queue scheduling algorithm', 16, 0),
(57, 'shortest job scheduling algorithm', 17, 0),
(58, 'round robin scheduling algorithm', 17, 0),
(59, 'priority scheduling algorithm', 17, 0),
(60, 'multilevel queue scheduling algorithm', 17, 1),
(61, 'kernel level thread', 18, 0),
(62, 'user level thread', 18, 1),
(63, 'process', 18, 0),
(64, 'none of the mentioned', 18, 0),
(65, 'a', 19, 0),
(66, 'b', 19, 1),
(67, 'c', 19, 0),
(68, 'd', 19, 0),
(69, 'india', 20, 0),
(70, 'BD', 20, 1),
(71, 'us', 20, 0),
(72, 'uk', 20, 0),
(73, 'q', 21, 1),
(74, 'j', 21, 0),
(75, 'a', 21, 0),
(76, 'u', 21, 0),
(77, 'rty', 22, 0),
(78, 'ertyu', 22, 0),
(79, 'sdfgh', 22, 0),
(80, 'xcvb', 22, 1),
(81, 'dfgh', 23, 0),
(82, 'zxcvbncvb n', 23, 0),
(83, 'dfghj', 23, 1),
(84, 'ffhgftk', 23, 0),
(85, 'mean', 24, 0),
(86, 'mean', 24, 0),
(87, 'mean', 24, 0),
(88, 'mean', 24, 0),
(89, 'they must be mutually exclusive', 25, 0),
(90, 'the sum of their probabilities must be equal to one', 25, 1),
(91, 'their intersection must be zero', 25, 0),
(92, 'None of these alternatives is correct.', 25, 0),
(93, 'one', 26, 0),
(94, 'any positive value', 26, 0),
(95, 'zero', 26, 1),
(96, 'any value between 0 to 1', 26, 0),
(97, 'descriptive statistic', 27, 0),
(98, 'probability function', 27, 0),
(99, 'variance', 27, 0),
(100, 'random variable', 27, 1),
(101, 'normal distribution', 28, 1),
(102, 'binomial distribution', 28, 0),
(103, 'Poisson distribution', 28, 0),
(104, 'uniform distribution', 28, 0),
(105, 'the experiment consists of a sequence of n identical trials', 29, 0),
(106, 'each outcome can be referred to as a success or a failure', 29, 1),
(107, 'the probabilities of the two outcomes can change from one trial to the next', 29, 0),
(108, 'the trials are independent', 29, 0),
(109, 'maximum allowable probability of Type II error', 30, 0),
(110, 'maximum allowable probability of Type I error', 30, 0),
(111, 'same as the confidence coefficient', 30, 1),
(112, 'same as the p-value', 30, 0),
(113, 'making inferences about a single population variance', 31, 0),
(114, 'testing for goodness of fit', 31, 0),
(115, 'testing for the independence of two variables', 31, 0),
(116, 'All of these alternatives are correct.', 31, 1),
(117, 'the probability at a given value of x', 32, 1),
(118, 'the area under the curve at x', 32, 0),
(119, 'the area under the curve to the right of x', 32, 0),
(120, 'the height of the function at x', 32, 0),
(121, 'probabilistic sampling', 33, 0),
(122, 'stratified sampling', 33, 1),
(123, 'nonprobabilistic sampling', 33, 0),
(124, 'cluster sampling', 33, 0),
(125, 'Cyclic graph', 34, 0),
(126, 'Regular graph', 34, 0),
(127, 'Tree', 34, 1),
(128, 'Not a graph', 34, 0),
(129, '963/1000', 35, 1),
(130, '966/1000', 35, 0),
(131, '968/1000', 35, 0),
(132, '969/1000', 35, 0),
(133, 'Zero', 36, 0),
(134, 'Odd', 36, 0),
(135, 'Prime', 36, 0),
(136, 'Even', 36, 1),
(137, 'Row and columns', 37, 0),
(138, 'Vertices and edges', 37, 1),
(139, 'Equations', 37, 0),
(140, 'None of these', 37, 0),
(141, 'Reflexive', 38, 0),
(142, 'Transitive', 38, 1),
(143, 'SymmetricAsymmetric', 38, 0),
(144, 'Asymmetric', 38, 0),
(145, '2n(n+1)/2 and 2n.3n(n–1)/2', 39, 0),
(146, '3n(n–1)/2 and 2n(n–1)', 39, 0),
(147, '2n(n+1)/2 and 3n(n–1)/2', 39, 0),
(148, '2n(n+1)/2 and 2n(n–1)/2', 39, 1),
(149, '2', 40, 0),
(150, '3', 40, 0),
(151, '4', 40, 0),
(152, '5', 40, 1),
(153, '1/8', 41, 0),
(154, '1', 41, 0),
(155, '7', 41, 1),
(156, '8', 41, 0),
(157, 'A spanning sub graph', 42, 0),
(158, 'A tree', 42, 0),
(159, 'Minimum weights', 42, 0),
(160, 'All of above', 42, 1),
(161, '2d', 43, 1),
(162, '2d–1+1', 43, 0),
(163, '2d+1+1', 43, 0),
(164, '2d+1', 43, 0),
(165, 'Analog', 44, 0),
(166, 'Digital', 44, 1),
(167, '(a) or (b)', 44, 0),
(168, 'None of the above', 44, 0),
(169, 'Analog', 45, 0),
(170, 'Digital', 45, 0),
(171, 'either (a) or (b)', 45, 1),
(172, 'either (a) or (b)', 45, 0),
(173, 'Analog', 46, 1),
(174, 'Digital', 46, 0),
(175, '(a) or (b)', 46, 0),
(176, 'None of the above', 46, 0),
(177, 'Analog', 47, 0),
(178, 'Digital', 47, 1),
(179, '(a) or (b)', 47, 0),
(180, 'None of the above', 47, 0),
(181, 'inverse of each other', 48, 1),
(182, 'proportional to each other', 48, 0),
(183, 'the same', 48, 0),
(184, 'None of the above', 48, 0),
(185, 'Amplitude', 49, 0),
(186, 'Time', 49, 0),
(187, 'Frequency', 49, 1),
(188, 'Voltage', 49, 0),
(189, 'Frequency', 50, 0),
(190, 'Phase', 50, 1),
(191, 'Amplitude', 50, 0),
(192, 'Voltage', 50, 0),
(193, 'time; frequency', 51, 1),
(194, 'frequency; time', 51, 0),
(195, 'time; phase', 51, 0),
(196, 'phase; time', 51, 0),
(197, 'composite; single-frequency', 52, 0),
(198, 'single-frequency; composite', 52, 1),
(199, 'single-frequency; double-frequency', 52, 0),
(200, 'None of the above', 52, 0),
(201, 'Frequency', 53, 0),
(202, 'period', 53, 0),
(203, 'bandwidth', 53, 1),
(204, 'amplitude', 53, 0),
(205, 'biasing', 54, 1),
(206, 'reduction', 54, 0),
(207, 'bounding', 54, 0),
(208, 'modulation', 54, 0),
(209, 'nibble', 55, 0),
(210, 'bitwidth', 55, 0),
(211, 'byte', 55, 1),
(212, 'word', 55, 0),
(213, 'bipolar transistor', 56, 1),
(214, 'dipolar transistor', 56, 0),
(215, 'tripolar transistor', 56, 0),
(216, 'semipolar transistor', 56, 0),
(217, 'barrier potential', 57, 1),
(218, 'barrier difference', 57, 0),
(219, 'barrier intensity', 57, 0),
(220, 'barrier density', 57, 0),
(221, 'emitter', 58, 0),
(222, 'collector', 58, 0),
(223, 'source', 58, 0),
(224, 'base', 58, 1),
(225, 'O(n)', 59, 1),
(226, '(n log(n))', 59, 0),
(227, '(n log(n))', 59, 0),
(228, 'O(log n)', 59, 0),
(229, 'Simple Linked List', 60, 1),
(230, 'Linear Linked List', 60, 0),
(231, 'Doubly Linked List', 60, 0),
(232, 'Circular linked List', 60, 0),
(233, 'Array', 61, 1),
(234, 'Linked list', 61, 0),
(235, 'Pointers', 61, 0),
(236, 'Queues', 61, 0),
(237, 'Peek()', 62, 1),
(238, 'Push()', 62, 0),
(239, 'Pop()', 62, 0),
(240, 'IsElement()', 62, 0),
(241, 'queue', 63, 0),
(242, 'stack', 63, 1),
(243, 'arrays', 63, 0),
(244, 'list', 63, 0),
(245, 'The physical boundary of Network', 64, 0),
(246, 'An operating System of Computer Network', 64, 0),
(247, 'A system designed to prevent unauthorized access', 64, 1),
(248, 'A web browsing Software', 64, 0),
(249, '4', 65, 0),
(250, '5', 65, 0),
(251, '6', 65, 0),
(252, '7', 65, 1),
(253, 'Dynamic Host Control Protocol', 66, 0),
(254, 'Dynamic Host Configuration Protocol', 66, 1),
(255, 'Dynamic Hyper Control Protocol', 66, 0),
(256, 'Dynamic Hyper Configuration Protocol', 66, 0),
(257, '8 bit', 67, 0),
(258, '16 bit', 67, 0),
(259, '32 bit', 67, 1),
(260, '64 bit', 67, 0),
(261, 'Dynamic Name System', 68, 0),
(262, 'Dynamic Network System', 68, 0),
(263, 'Domain Name System', 68, 1),
(264, 'Domain Network Service', 68, 0),
(265, 'to connect LANs', 69, 1),
(266, 'to separate LANs', 69, 0),
(267, 'to control Network Speed', 69, 0),
(268, 'All of the above', 69, 0),
(269, '0', 70, 1),
(270, '1', 70, 0),
(271, 'Garbage value', 70, 0),
(272, 'Null', 70, 0),
(273, 'I = 0', 71, 0),
(274, 'I = 1', 71, 1),
(275, 'I = 2', 71, 0),
(276, 'I = 3', 71, 0),
(277, 'one class inheriting from more super classes', 72, 1),
(278, 'more classes inheriting from one super class', 72, 0),
(279, 'more classes inheriting from more super classes', 72, 0),
(280, 'None of the above', 72, 0),
(281, 'A public member of a class can be accessed in all the packages.', 73, 0),
(282, 'A private member of a class cannot be accessed by the methods of the same class.', 73, 1),
(283, 'A private member of a class cannot be accessed from its derived class.', 73, 0),
(284, 'A protected member of a class can be accessed from its derived class.', 73, 0),
(285, 'static', 74, 0),
(286, 'const', 74, 0),
(287, 'final', 74, 1),
(288, 'abstract', 74, 0),
(289, 'A class containing abstract methods is called an abstract class.', 75, 0),
(290, 'Abstract methods should be implemented in the derived class.', 75, 0),
(291, 'An abstract class cannot have non-abstract methods.', 75, 1),
(292, 'A class must be qualified as ‘abstract’ class, if it contains one abstract method.', 75, 0),
(293, 'static only', 76, 0),
(294, 'protected', 76, 0),
(295, 'private', 76, 0),
(296, 'both static and final', 76, 1),
(297, '1 , 3', 77, 0),
(298, '3 , 1', 77, 0),
(299, '1 , 1', 77, 1),
(300, '1 , 0', 77, 0),
(301, 'An interface can extend another interface.', 78, 0),
(302, 'A class which is implementing an interface must implement all the methods of the interface.', 78, 0),
(303, 'An interface can implement another interface.', 78, 1),
(304, 'An interface is a solution for multiple inheritance in java.', 78, 0),
(305, 'A finally block is executed before the catch block but after the try block.', 79, 0),
(306, 'A finally block is executed, only after the catch block is executed.', 79, 0),
(307, 'A finally block is executed whether an exception is thrown or not.', 79, 1),
(308, 'A finally block is executed, only if an exception occurs.', 79, 0),
(309, 'AB*CD*+', 80, 1),
(310, 'A*BCD*+', 80, 0),
(311, 'AB*CD+*', 80, 0),
(312, 'A*B*CD+', 80, 0),
(313, 'Boolean values', 81, 0),
(314, 'whole numbers', 81, 0),
(315, 'real integers', 81, 1),
(316, 'integers', 81, 0),
(317, 'uses alphabetic codes in place of binary numbers used in machine language', 82, 1),
(318, 'is the easiest language to write programs', 82, 0),
(319, 'need not be translated into machine language', 82, 0),
(320, 'None of these', 82, 0),
(321, '9’s complement', 83, 0),
(322, '10’s complement', 83, 0),
(323, '1’s complement', 83, 0),
(324, '2’s complement', 83, 1),
(325, 'too slow', 84, 0),
(326, 'unreliable', 84, 0),
(327, 'it is volatile', 84, 1),
(328, 'too bulky', 84, 0),
(329, 'Cache memory', 85, 0),
(330, 'Secondary memory', 85, 1),
(331, 'Registers', 85, 0),
(332, 'RAM', 85, 0),
(333, 'Absolute', 86, 0),
(334, 'indirect', 86, 0),
(335, 'index', 86, 1),
(336, 'none of these', 86, 0),
(337, '93%', 87, 0),
(338, '90%', 87, 1),
(339, '88%', 87, 0),
(340, '87%', 87, 0),
(341, 'LDA', 88, 1),
(342, 'IN', 88, 0),
(343, 'ADD', 88, 0),
(344, 'OUT', 88, 0),
(345, 'SISD', 89, 1),
(346, 'SIMD', 89, 0),
(347, 'MIMD', 89, 0),
(348, 'MISD', 89, 0),
(349, 'dd', 90, 1),
(350, 'dd', 90, 0),
(351, 'dd', 90, 0),
(352, 'dd', 90, 0),
(353, 'integer', 91, 1),
(354, 'boolean', 91, 0),
(355, 'float', 91, 0),
(356, 'char', 91, 0),
(357, '4', 92, 1),
(358, '2', 92, 0),
(359, '5', 92, 0),
(360, '6', 92, 0),
(361, 'gffg', 93, 1),
(362, 'gfgfg', 93, 0),
(363, 'fgfg', 93, 0),
(364, 'fgfgf', 93, 0),
(365, '4', 94, 1),
(366, 'boolean', 94, 0),
(367, 'fgfg', 94, 0),
(368, 'gfhdtf', 94, 0),
(369, 'sdsadsad', 95, 1),
(370, 'sdsd', 95, 0),
(371, 'dfgdsfsdf', 95, 0),
(372, 'sdsdf', 95, 0),
(373, 'dvdvv', 96, 1),
(374, 'vfxbfb', 96, 0),
(375, 'dvdvv', 96, 0),
(376, 'zfbzfbzb', 96, 0),
(377, 'dvdv', 97, 1),
(378, 'zdfvv', 97, 0),
(379, 'zdvzdv', 97, 0),
(380, 'zdvzcv', 97, 0),
(381, 'hhm', 98, 1),
(382, 'mmn', 98, 0),
(383, 'bnmvm', 98, 0),
(384, 'nmvnm', 98, 0),
(385, 'fgvfbvbf', 99, 1),
(386, 'bfbbb', 99, 0),
(387, 'fbb', 99, 0),
(388, 'fbvfbfb', 99, 0),
(389, 'jhkmcjkm', 100, 1),
(390, 'chjj', 100, 0),
(391, 'chjmchj', 100, 0),
(392, 'chjcj', 100, 0),
(393, 'chjchj', 101, 1),
(394, 'chj', 101, 0),
(395, 'hjc', 101, 0),
(396, 'cjjcj', 101, 0),
(397, 'hgxfhxgh', 102, 1),
(398, 'xtfhfxghx', 102, 0),
(399, 'xghxh', 102, 0),
(400, 'ncghnxghnh', 102, 0),
(401, 'zfgzg', 103, 1),
(402, 'zfgzg', 103, 0),
(403, 'zfgfg', 103, 0),
(404, 'zgzdgz', 103, 0),
(405, 'fdvdv', 104, 0),
(406, 'cxvxc', 104, 0),
(407, 'cvvzfvzdvz', 104, 1),
(408, 'dfvFfvdv', 104, 0),
(409, 'fb', 105, 1),
(410, 'bf', 105, 0),
(411, 'bfgbz', 105, 0),
(412, 'fzbzb', 105, 0),
(413, 'xthxhx', 106, 0),
(414, 'hxfghfx', 106, 1),
(415, 'xghxgfh', 106, 0),
(416, 'xghxgfhx', 106, 0),
(417, 'xghgfh', 107, 0),
(418, 'chxchj', 107, 1),
(419, 'xghxfh', 107, 0),
(420, 'xthjxhxh', 107, 0),
(421, 'integer', 108, 1),
(422, 'boolean', 108, 0),
(423, 'float', 108, 0),
(424, 'char', 108, 0),
(425, 'integer', 109, 1),
(426, 'boolean', 109, 0),
(427, 'float', 109, 0),
(428, 'char', 109, 0),
(429, '4', 110, 0),
(430, '2', 110, 1),
(431, '5', 110, 0),
(432, '6', 110, 0),
(433, '2', 111, 0),
(434, '3', 111, 0),
(435, '5', 111, 0),
(436, 'many', 111, 1),
(437, 'dddddd', 112, 1),
(438, 'dddddddd', 112, 0),
(439, 'dsddd', 112, 0),
(440, 'dds', 112, 0),
(441, 'integer', 113, 0),
(442, 'boolean', 113, 1),
(443, 'retgr', 113, 0),
(444, 'char', 113, 0),
(445, 'rfrffrfref', 114, 0),
(446, 'frfrfrf', 114, 0),
(447, 'frfrfrf', 114, 1),
(448, 'frffrffrf', 114, 0),
(449, 'vfvfvv', 115, 1),
(450, 'fvfvfv', 115, 0),
(451, 'fvfvfv', 115, 0),
(452, 'vfvfvv', 115, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `q_name` mediumtext NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_name`, `exam_id`) VALUES
(24, 'The measure of location which is the most likely to be influenced by extreme values in the data set is the?', 12),
(25, 'If two events are independent, then', 12),
(26, 'Two events, A and B, are mutually exclusive and each have a nonzero probability. If event A is known to occur, the probability of the occurrence of event B is', 12),
(27, 'A numerical description of the outcome of an experiment is called a', 12),
(28, 'In the textile industry, a manufacturer is interested in the number of blemishes or flaws occurring in each 100 feet of material. The probability distribution that has the greatest chance of applying to this situation is the', 12),
(29, 'Which of the following is not a property of a binomial experiment?', 12),
(30, 'The level of significance is the', 12),
(31, 'An important application of the chi-square distribution is', 12),
(32, 'For a continuous random variable x, the probability density function f(x) represents', 12),
(33, 'Convenience sampling is an example of', 12),
(34, 'A graph G is called a ..... if it is a connected acyclic graph', 13),
(35, 'What is the probability of choosing correctly an unknown integer between 0 and 9 with 3 chances ?', 13),
(36, 'In an undirected graph the number of nodes with odd degree must be', 13),
(37, 'A graph is a collection of', 13),
(38, 'The relation { (1,2), (1,3), (3,1), (1,1), (3,3), (3,2), (1,4), (4,2), (3,4)} is', 13),
(39, 'How many relations are there on a set with n elements that are symmetric and a set with n elements that are reflexive and symmetric ?', 13),
(40, 'The number of colours required to properly colour the vertices of every planer graph is', 13),
(41, 'Consider an undirected random graph of eight vertices. The probability that there is an edge between a pair of vertices is ½. What is the expected number of unordered cycles of length three?', 13),
(42, 'A minimal spanning tree of a graph G is', 13),
(43, 'The number of leaf nodes in a complete binary tree of depth d is', 13),
(44, '_______ data have discrete states and take discrete values', 14),
(45, 'Signals can be ________.', 14),
(46, '_____ signals can have an infinite number of values in a range.', 14),
(47, '_______ signals can have only a limited number of values.', 14),
(48, 'Frequency and period are ______.', 14),
(49, '________is the rate of change with respect to time.', 14),
(50, '_______ describes the position of the waveform relative to time 0.', 14),
(51, 'A sine wave in the ______ domain can be represented by one single spike in the _____ domain.', 14),
(52, 'A _________ sine wave is not useful in data communications; we need to send a _______ signal.', 14),
(53, 'The _____ of a composite signal is the difference between the highest and the lowest frequencies contained in that signal.', 14),
(54, 'Application of DC voltage to a diode, transistor, or other device to produce a desired mode of operation is called', 15),
(55, 'Group of eight bits in a binary data is called', 15),
(56, 'Transistor in which both free electrons and holes are current carriers is termed as', 15),
(57, 'Amount of energy required to produce full conduction across pn junction in forward bias is called', 15),
(58, 'Region of semiconductor which is very thin and lightly doped as compared to other regions is called', 15),
(59, 'Heap sort has an average-case complexity of', 16),
(60, 'A linked list type that navigates for an item in forward manner only, is called', 16),
(61, 'In hash table, data is stored in format of', 16),
(62, 'Function of stack that returns top data element of stack is known to be', 16),
(63, 'Which data structure is used for implementing recursion?', 16),
(64, 'What is a Firewall in Computer Network?', 17),
(65, 'How many layers does OSI Reference Model has?', 17),
(66, 'DHCP is the abbreviation of', 17),
(67, 'IPV4 Address is', 17),
(68, 'DNS is the abbreviation of', 17),
(69, 'What is the use of Bridge in Network?', 17),
(70, 'The default value of a static integer  variable of a class in Java is,', 18),
(71, 'What will be printed as the output of the following program?                   public class testincr                   {                   public static void main(String args[])                   {                      int i = 0;                      i = i++ + i;                      System.out.println(&quot;I = &quot; +i);                    }                    }', 18),
(72, 'Multiple inheritance means,', 18),
(73, 'Which statement is not true in java language?', 18),
(74, 'To prevent any method from overriding, we declare the method as,', 18),
(75, 'Which one of the following is not true?', 18),
(76, 'The fields in an interface are implicitly specified as,', 18),
(77, 'What is the output of the following program:                        public class testmeth                        {                            static int i = 1;                            public static void main(String args[])                             {                                  System.out.println(i+” , “);                                  m(i);                                  System.out.println(i);                             }                             public void m(int i)                             {                                i += 2;                                                           }                        }', 18),
(78, 'Which of the following is not true?', 18),
(79, 'Which of the following is true?', 18),
(80, 'In Reverse Polish notation, expression A*B+C*D is written as', 19),
(81, 'Floating point representation is used to store', 19),
(82, 'Assembly language', 19),
(83, 'In computers, subtraction is generally carried out by', 19),
(84, 'What characteristic of RAM memory makes it not suitable for permanent storage?', 19),
(85, 'Which of the following is lowest in memory hierarchy?', 19),
(86, 'The addressing mode used in an instruction of the form ADD X Y, is', 19),
(87, 'If memory access takes 20 ns with cache and 110 ns with out it, then the ratio ( cache uses a 10 ns memory) is', 19),
(88, 'In a memory-mapped I/O system, which of the following will not be there?', 19),
(89, 'Von Neumann architecture is', 19),
(90, 'ccc', 20),
(91, 'what is semaphore data type ?', 21),
(92, 'how many condition for mutual exclusion ?', 21),
(93, 'cfgfg', 0),
(94, 'what is semaphore data type ffdgfd?', 22),
(95, 'how many condition for mutual exclusion sdsds ?', 24),
(96, 'dvfdxvdv', 22),
(97, 'fvDSVV', 24),
(98, 'what is semaphore data type hhmnvhmnvhm?', 25),
(99, 'fdsfsdfsfdfdfgv', 25),
(100, 'hijkhjvkk', 26),
(101, 'chjhjcjcghjc', 26),
(102, 'what is semaphore data type hjgcjchj ?', 27),
(103, 'how many condition for mutual exclusion zxfgfgxfgxg?', 27),
(104, 'what is semaphore data typedvdxvdv ?', 28),
(105, 'how many condition for mvvfvxfutual exclusion ?', 27),
(106, 'what is semaphore data typexrdgdrgd ?', 29),
(107, 'xhxh', 29),
(108, 'what is semaphore data typee ?', 21),
(109, 'what is semaphore data ?', 31),
(110, 'how many condition are there for mutual exclusion ?', 31),
(111, 'how many types of operating system ?', 31),
(112, 'what is semaphore data type ?ddd', 31),
(113, 'how many condition for mutual exclusion ?dddd', 31),
(114, 'frefreferfrerfref', 31),
(115, 'vfvfvfvfv', 33);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `s_id`, `exam_id`, `point`) VALUES
(12, 1686, 7, 1),
(13, 1705, 7, 1),
(14, 1765, 8, 2),
(15, 1686, 9, 1),
(16, 1673, 7, 0),
(17, 1686, 10, 0),
(18, 1673, 11, 1),
(19, 1673, 20, 0),
(20, 1705, 20, 0),
(21, 1705, 21, 1),
(22, 1686, 21, 0),
(23, 1705, 0, 0),
(24, 1705, 0, 0),
(25, 1705, 24, 0),
(26, 1705, 26, 0),
(27, 1705, 27, 1),
(28, 1705, 28, 1),
(29, 1705, 28, 1),
(30, 1705, 28, 1),
(31, 1705, 29, 1),
(32, 1705, 31, 2),
(33, 1705, 0, 0),
(34, 1705, 0, 0),
(35, 1705, 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_name`) VALUES
(6, 'Spring-2017'),
(7, 'Fall-2018');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_uname` varchar(100) NOT NULL,
  `s_password` varchar(1000) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `s_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_uname`, `s_password`, `sem_id`, `s_email`) VALUES
(1673, 'Tamara Islam Meghla', 'tamara', 'tamara', 5, 'tamara@gmail.com'),
(1686, 'Tania Sultana', 'tania', 'tania', 5, 'tania@gmail.com'),
(1705, 'Fadul Skder', 'Fadul', 'fadul', 6, 'fadul@gmail.com'),
(1708, 'bijoy', 'bij', 'fadul', 5, 'bij@gmail.com'),
(1765, 'Ishika Tasnim', 'Ishika', 'ishika', 5, 'ishika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student _assessment`
--

CREATE TABLE `student _assessment` (
  `s_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sem_id`) VALUES
(1, 'Operating System', 5),
(2, 'Database System', 5),
(3, 'Statistics', 5),
(4, 'Discrete Mathematics', 5),
(5, 'Signal & System', 5),
(6, 'Electrical Circuit', 5),
(7, 'Data Structure', 5),
(8, 'Computer Networking', 5),
(9, 'Object Oriented Programming', 5),
(10, 'Computer Architecture', 5);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_uname` varchar(100) NOT NULL,
  `t_password` varchar(100) NOT NULL,
  `t_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_uname`, `t_password`, `t_email`) VALUES
(1009, 'Dr. Md Whaiduzzaman', 'wz', 'wz', 'wz@gmail.com'),
(1010, 'Fahima Tabassum', 'ft', 'ft', 'ft@gmail.com'),
(1011, 'Md. Fazlul Karim Patwary', 'fkp', 'fkp', 'fkp@gmail.com'),
(1012, 'M. Mesbahuddin Sarker', 'mms', 'mms', 'mms@gmail.com'),
(1013, 'K M Akkas Ali', 'kma', 'kma', 'kma@gmail.com'),
(1014, 'Dr M Shamim Kaiser', 'msk', 'msk', 'msk@gmail.com'),
(1015, 'Jesmin Akhter', 'ja', 'ja', 'ja@gmail.com'),
(1016, 'Risala Tasin Khan', 'rtk', 'rtk', 'rtk@gmail.com'),
(1017, 'Dr. Mohammad Abu Yousuf', 'may', 'may', 'may@gmail.com'),
(1018, 'Dr. Mohammad Shahidul Islam', 'msi', 'msi', 'msi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `s_time` varchar(100) NOT NULL,
  `e_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `exam_id`, `date`, `s_time`, `e_time`) VALUES
(2, 5, '2017-12-15', '01:00', '01:00'),
(3, 6, '2018-01-09', '13:03', '15:00'),
(4, 7, '2018-01-01', '12:00', '12:30'),
(5, 8, '2018-11-01', '12:00', '12:30'),
(6, 9, '0018-02-01', '12:00', '12:30'),
(7, 10, '12018-02-20', '12:01', '12:30'),
(8, 11, '2018-02-01', '02:00', '12:30'),
(9, 12, '2018-01-23', '12:00', '12:10'),
(10, 13, '2018-01-23', '12:20', '12:30'),
(11, 14, '2018-01-23', '12:30', '12:40'),
(12, 15, '2018-01-23', '12:45', '12:55'),
(13, 16, '2018-01-23', '13:00', '13:10'),
(14, 17, '2018-01-23', '14:00', '14:10'),
(15, 18, '2018-01-23', '14:30', '14:40'),
(16, 19, '2018-01-23', '16:00', '16:10'),
(17, 20, '2018-01-23', '01:01', '01:02'),
(18, 21, '2018-01-23', '02:59', '03:15'),
(19, 22, '2018-07-29', '11:36', '23:38'),
(20, 23, '2018-07-29', '23:40', '23:41'),
(21, 24, '2018-07-29', '23:51', '23:52'),
(22, 25, '', '00:24', ''),
(23, 26, '2018-07-30', '00:27', '00:25'),
(24, 27, '2018-07-30', '00:32', '00:34'),
(25, 28, '2018-07-30', '03:14', '03:15'),
(26, 29, '2018-07-30', '03:44', '03:46'),
(27, 30, '2018-07-30', '03:11', '03:13'),
(28, 31, '2018-07-31', '03:18', '03:20'),
(29, 32, '2018-07-31', '12:58', '00:58'),
(30, 33, '2018-07-31', '13:02', '13:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(1000) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `username`, `password`, `id`, `status`) VALUES
('admin@gmail', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `assign_course`
--
ALTER TABLE `assign_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `finale_exam`
--
ALTER TABLE `finale_exam`
  ADD PRIMARY KEY (`fe_id`);

--
-- Indexes for table `finale_question`
--
ALTER TABLE `finale_question`
  ADD PRIMARY KEY (`fq_id`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_course`
--
ALTER TABLE `assign_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `finale_exam`
--
ALTER TABLE `finale_exam`
  MODIFY `fe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `finale_question`
--
ALTER TABLE `finale_question`
  MODIFY `fq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=453;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1019;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
