-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2016 at 06:40 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airtm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` int(20) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`, `Name`, `Email`, `Mobile`, `Address`) VALUES
('a1111', '1111', 'Mohidul', 'mislam6789@gmail.com', 1575, 'Dhaka'),
('a2222', '2222', 'Islam', 'mahmuda_habib@yahoo.com', 1675, '');

-- --------------------------------------------------------

--
-- Table structure for table `bookinfo`
--

CREATE TABLE `bookinfo` (
  `id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `ScheduleID` int(11) NOT NULL,
  `Class` varchar(20) NOT NULL,
  `TotalSeat` int(11) NOT NULL,
  `CostPerSeat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookinfo`
--

INSERT INTO `bookinfo` (`id`, `Username`, `ScheduleID`, `Class`, `TotalSeat`, `CostPerSeat`) VALUES
(1, 'u1111', 251, 'Economy', 4, 3000),
(2, 'u1111', 302, 'Normal', 2, 800),
(4, 'shovon', 251, 'Economy', 1, 3000),
(5, 'shovon', 259, 'Normal', 20, 1000),
(6, 'shovon', 355, 'Normal', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `flightinfo`
--

CREATE TABLE `flightinfo` (
  `FlightId` int(11) NOT NULL,
  `FlightName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flightinfo`
--

INSERT INTO `flightinfo` (`FlightId`, `FlightName`) VALUES
(15, 'X Air 065'),
(16, 'X Air 091'),
(17, 'X Air 007'),
(18, 'X Air 008'),
(19, 'X Air 071B'),
(20, 'X Air 087');

-- --------------------------------------------------------

--
-- Table structure for table `flightroute`
--

CREATE TABLE `flightroute` (
  `FlightRouteId` varchar(300) NOT NULL,
  `FlightTo` varchar(100) NOT NULL,
  `FlightFrom` varchar(100) NOT NULL,
  `FlightName` varchar(100) NOT NULL,
  `Stoppage` int(11) NOT NULL,
  `StartDay` varchar(20) NOT NULL,
  `StartTime` varchar(20) NOT NULL,
  `Economy` int(11) NOT NULL,
  `Business` int(11) NOT NULL,
  `Normal` int(11) NOT NULL,
  `PriceEcomomy` int(11) NOT NULL,
  `PriceBuisness` int(11) NOT NULL,
  `PriceNormal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flightroute`
--

INSERT INTO `flightroute` (`FlightRouteId`, `FlightTo`, `FlightFrom`, `FlightName`, `Stoppage`, `StartDay`, `StartTime`, `Economy`, `Business`, `Normal`, `PriceEcomomy`, `PriceBuisness`, `PriceNormal`) VALUES
('X Air 065Mumbai Intl AirportZia international airport', 'Mumbai Intl Airport', 'Zia international airport', 'X Air 065', 0, 'Monday', '01:30', 0, 0, 200, 0, 0, 800),
('X Air 065Taiwan Taoyuan AirportZia international airport', 'Taiwan Taoyuan Airport', 'Zia international airport', 'X Air 065', 1, 'Sunday', '22:30', 100, 200, 300, 3000, 2000, 1000),
('X Air 071BTaiwan Taoyuan AirportZia international airport', 'Taiwan Taoyuan Airport', 'Zia international airport', 'X Air 071B', 0, 'Sunday', '01:10', 100, 200, 300, 500, 300, 100);

-- --------------------------------------------------------

--
-- Table structure for table `flightrouteschedule`
--

CREATE TABLE `flightrouteschedule` (
  `Id` int(11) NOT NULL,
  `FlightRouteId` varchar(300) NOT NULL,
  `StartDate` varchar(20) NOT NULL,
  `RemEconomy` int(11) NOT NULL,
  `RemBuisness` int(11) NOT NULL,
  `RemNormal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flightrouteschedule`
--

INSERT INTO `flightrouteschedule` (`Id`, `FlightRouteId`, `StartDate`, `RemEconomy`, `RemBuisness`, `RemNormal`) VALUES
(251, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/05/01', 95, 200, 300),
(252, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/05/08', 100, 200, 300),
(253, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/05/15', 100, 200, 300),
(254, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/05/22', 100, 200, 300),
(255, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/05/29', 100, 200, 300),
(256, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/06/05', 100, 200, 300),
(257, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/06/12', 100, 200, 300),
(258, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/06/19', 100, 197, 300),
(259, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/06/26', 100, 200, 400),
(260, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/07/03', 100, 200, 300),
(261, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/07/10', 100, 200, 300),
(262, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/07/17', 100, 200, 300),
(263, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/07/24', 100, 200, 300),
(264, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/07/31', 100, 200, 300),
(265, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/08/07', 100, 200, 300),
(266, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/08/14', 100, 200, 300),
(267, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/08/21', 100, 200, 300),
(268, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/08/28', 100, 200, 300),
(269, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/09/04', 100, 200, 300),
(270, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/09/11', 100, 200, 300),
(271, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/09/18', 100, 200, 300),
(272, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/09/25', 100, 200, 300),
(273, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/10/02', 100, 200, 300),
(274, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/10/09', 100, 200, 300),
(275, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/10/16', 100, 200, 300),
(276, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/10/23', 100, 200, 300),
(277, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/10/30', 100, 200, 300),
(278, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/11/06', 100, 200, 300),
(279, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/11/13', 100, 200, 300),
(280, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/11/20', 100, 200, 300),
(281, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/11/27', 100, 200, 300),
(282, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/12/04', 100, 200, 300),
(283, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/12/11', 100, 200, 300),
(284, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/12/18', 100, 200, 300),
(285, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2016/12/25', 100, 200, 300),
(286, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/01/01', 100, 200, 300),
(287, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/01/08', 100, 200, 300),
(288, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/01/15', 100, 200, 300),
(289, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/01/22', 100, 200, 300),
(290, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/01/29', 100, 200, 300),
(291, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/02/05', 100, 200, 300),
(292, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/02/12', 100, 200, 300),
(293, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/02/19', 100, 200, 300),
(294, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/02/26', 100, 200, 300),
(295, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/03/05', 100, 200, 300),
(296, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/03/12', 100, 200, 300),
(297, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/03/19', 100, 200, 300),
(298, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/03/26', 100, 200, 300),
(299, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/04/02', 100, 200, 300),
(300, 'X Air 065Taiwan Taoyuan AirportZia international airport', '2017/04/09', 100, 200, 300),
(301, 'X Air 065Mumbai Intl AirportZia international airport', '2016/04/25', 0, 0, 200),
(302, 'X Air 065Mumbai Intl AirportZia international airport', '2016/05/02', 0, 0, 198),
(303, 'X Air 065Mumbai Intl AirportZia international airport', '2016/05/09', 0, 0, 200),
(304, 'X Air 065Mumbai Intl AirportZia international airport', '2016/05/16', 0, 0, 200),
(305, 'X Air 065Mumbai Intl AirportZia international airport', '2016/05/23', 0, 0, 200),
(306, 'X Air 065Mumbai Intl AirportZia international airport', '2016/05/30', 0, 0, 200),
(307, 'X Air 065Mumbai Intl AirportZia international airport', '2016/06/06', 0, 0, 200),
(308, 'X Air 065Mumbai Intl AirportZia international airport', '2016/06/13', 0, 0, 200),
(309, 'X Air 065Mumbai Intl AirportZia international airport', '2016/06/20', 0, 0, 200),
(310, 'X Air 065Mumbai Intl AirportZia international airport', '2016/06/27', 0, 0, 200),
(311, 'X Air 065Mumbai Intl AirportZia international airport', '2016/07/04', 0, 0, 200),
(312, 'X Air 065Mumbai Intl AirportZia international airport', '2016/07/11', 0, 0, 200),
(313, 'X Air 065Mumbai Intl AirportZia international airport', '2016/07/18', 0, 0, 200),
(314, 'X Air 065Mumbai Intl AirportZia international airport', '2016/07/25', 0, 0, 200),
(315, 'X Air 065Mumbai Intl AirportZia international airport', '2016/08/01', 0, 0, 200),
(316, 'X Air 065Mumbai Intl AirportZia international airport', '2016/08/08', 0, 0, 200),
(317, 'X Air 065Mumbai Intl AirportZia international airport', '2016/08/15', 0, 0, 200),
(318, 'X Air 065Mumbai Intl AirportZia international airport', '2016/08/22', 0, 0, 200),
(319, 'X Air 065Mumbai Intl AirportZia international airport', '2016/08/29', 0, 0, 200),
(320, 'X Air 065Mumbai Intl AirportZia international airport', '2016/09/05', 0, 0, 200),
(321, 'X Air 065Mumbai Intl AirportZia international airport', '2016/09/12', 0, 0, 200),
(322, 'X Air 065Mumbai Intl AirportZia international airport', '2016/09/19', 0, 0, 200),
(323, 'X Air 065Mumbai Intl AirportZia international airport', '2016/09/26', 0, 0, 200),
(324, 'X Air 065Mumbai Intl AirportZia international airport', '2016/10/03', 0, 0, 200),
(325, 'X Air 065Mumbai Intl AirportZia international airport', '2016/10/10', 0, 0, 200),
(326, 'X Air 065Mumbai Intl AirportZia international airport', '2016/10/17', 0, 0, 200),
(327, 'X Air 065Mumbai Intl AirportZia international airport', '2016/10/24', 0, 0, 200),
(328, 'X Air 065Mumbai Intl AirportZia international airport', '2016/10/31', 0, 0, 200),
(329, 'X Air 065Mumbai Intl AirportZia international airport', '2016/11/07', 0, 0, 200),
(330, 'X Air 065Mumbai Intl AirportZia international airport', '2016/11/14', 0, 0, 200),
(331, 'X Air 065Mumbai Intl AirportZia international airport', '2016/11/21', 0, 0, 200),
(332, 'X Air 065Mumbai Intl AirportZia international airport', '2016/11/28', 0, 0, 200),
(333, 'X Air 065Mumbai Intl AirportZia international airport', '2016/12/05', 0, 0, 200),
(334, 'X Air 065Mumbai Intl AirportZia international airport', '2016/12/12', 0, 0, 200),
(335, 'X Air 065Mumbai Intl AirportZia international airport', '2016/12/19', 0, 0, 200),
(336, 'X Air 065Mumbai Intl AirportZia international airport', '2016/12/26', 0, 0, 200),
(337, 'X Air 065Mumbai Intl AirportZia international airport', '2017/01/02', 0, 0, 200),
(338, 'X Air 065Mumbai Intl AirportZia international airport', '2017/01/09', 0, 0, 200),
(339, 'X Air 065Mumbai Intl AirportZia international airport', '2017/01/16', 0, 0, 200),
(340, 'X Air 065Mumbai Intl AirportZia international airport', '2017/01/23', 0, 0, 200),
(341, 'X Air 065Mumbai Intl AirportZia international airport', '2017/01/30', 0, 0, 200),
(342, 'X Air 065Mumbai Intl AirportZia international airport', '2017/02/06', 0, 0, 200),
(343, 'X Air 065Mumbai Intl AirportZia international airport', '2017/02/13', 0, 0, 200),
(344, 'X Air 065Mumbai Intl AirportZia international airport', '2017/02/20', 0, 0, 200),
(345, 'X Air 065Mumbai Intl AirportZia international airport', '2017/02/27', 0, 0, 200),
(346, 'X Air 065Mumbai Intl AirportZia international airport', '2017/03/06', 0, 0, 200),
(347, 'X Air 065Mumbai Intl AirportZia international airport', '2017/03/13', 0, 0, 200),
(348, 'X Air 065Mumbai Intl AirportZia international airport', '2017/03/20', 0, 0, 200),
(349, 'X Air 065Mumbai Intl AirportZia international airport', '2017/03/27', 0, 0, 200),
(350, 'X Air 065Mumbai Intl AirportZia international airport', '2017/04/03', 0, 0, 200),
(351, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/05/01', 100, 200, 300),
(352, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/05/08', 100, 200, 300),
(353, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/05/15', 100, 200, 300),
(354, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/05/22', 100, 200, 300),
(355, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/05/29', 100, 200, 299),
(356, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/06/05', 100, 200, 300),
(357, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/06/12', 100, 200, 300),
(358, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/06/19', 100, 200, 300),
(359, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/06/26', 100, 200, 300),
(360, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/07/03', 100, 200, 300),
(361, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/07/10', 100, 200, 300),
(362, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/07/17', 100, 200, 300),
(363, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/07/24', 100, 200, 300),
(364, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/07/31', 100, 200, 300),
(365, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/08/07', 100, 200, 300),
(366, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/08/14', 100, 200, 300),
(367, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/08/21', 100, 200, 300),
(368, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/08/28', 100, 200, 300),
(369, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/09/04', 100, 200, 300),
(370, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/09/11', 100, 200, 300),
(371, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/09/18', 100, 200, 300),
(372, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/09/25', 100, 200, 300),
(373, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/10/02', 100, 200, 300),
(374, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/10/09', 100, 200, 300),
(375, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/10/16', 100, 200, 300),
(376, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/10/23', 100, 200, 300),
(377, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/10/30', 100, 200, 300),
(378, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/11/06', 100, 200, 300),
(379, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/11/13', 100, 200, 300),
(380, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/11/20', 100, 200, 300),
(381, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/11/27', 100, 200, 300),
(382, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/12/04', 100, 200, 300),
(383, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/12/11', 100, 200, 300),
(384, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/12/18', 100, 200, 300),
(385, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2016/12/25', 100, 200, 300),
(386, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/01/01', 100, 200, 300),
(387, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/01/08', 100, 200, 300),
(388, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/01/15', 100, 200, 300),
(389, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/01/22', 100, 200, 300),
(390, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/01/29', 100, 200, 300),
(391, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/02/05', 100, 200, 300),
(392, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/02/12', 100, 200, 300),
(393, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/02/19', 100, 200, 300),
(394, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/02/26', 100, 200, 300),
(395, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/03/05', 100, 200, 300),
(396, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/03/12', 100, 200, 300),
(397, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/03/19', 100, 200, 300),
(398, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/03/26', 100, 200, 300),
(399, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/04/02', 100, 200, 300),
(400, 'X Air 071BTaiwan Taoyuan AirportZia international airport', '2017/04/09', 100, 200, 300);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LocID` int(11) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `TimeAddSub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LocID`, `Location`, `TimeAddSub`) VALUES
(34, 'Taiwan Taoyuan Airport', 5),
(35, 'Zia international airport', 0),
(36, 'Mumbai Intl Airport', 1),
(37, 'Dubai Airport', 2),
(38, 'Adelaide Airport', 5),
(39, 'London Heathrow', -5),
(40, 'Los Angeles Airport', -11),
(41, 'London City Airport', -4),
(42, 'Hong Kong Intl Airport', 2);

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `NoticeId` int(11) NOT NULL,
  `NoticeTitle` varchar(100) NOT NULL,
  `NoticeDetails` text NOT NULL,
  `NoticePostedBy` varchar(20) NOT NULL,
  `NoticePostedTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`NoticeId`, `NoticeTitle`, `NoticeDetails`, `NoticePostedBy`, `NoticePostedTime`) VALUES
(18, 'Flight May Delay on 10th May', 'According  to BBC there may be a wind on 10th May so if any unexpected circumstance occurs we may change our flight schedule on 10th May.\r\n\r\nThank you\r\nStay With Touch Airlines', 'a2222', '10:04:10am 02/05/16');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Account` varchar(20) NOT NULL,
  `Passport` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`Username`, `Password`, `Email`, `Mobile`, `Account`, `Passport`) VALUES
('shovon', '1234', 'mislam543@gmail.com', '01675955487', '26515785', '1234'),
('u1111', '1111', 'jagjb@ghah.cjhgjhs', '4155', '54154154', '4515154');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Mobie` (`Mobile`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `bookinfo`
--
ALTER TABLE `bookinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flightinfo`
--
ALTER TABLE `flightinfo`
  ADD PRIMARY KEY (`FlightId`);

--
-- Indexes for table `flightroute`
--
ALTER TABLE `flightroute`
  ADD PRIMARY KEY (`FlightRouteId`);

--
-- Indexes for table `flightrouteschedule`
--
ALTER TABLE `flightrouteschedule`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LocID`),
  ADD UNIQUE KEY `Location` (`Location`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`NoticeId`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinfo`
--
ALTER TABLE `bookinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `flightinfo`
--
ALTER TABLE `flightinfo`
  MODIFY `FlightId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `flightrouteschedule`
--
ALTER TABLE `flightrouteschedule`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LocID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `NoticeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
