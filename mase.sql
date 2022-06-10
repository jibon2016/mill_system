-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 08:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bazar_list`
--

CREATE TABLE `bazar_list` (
  `ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `B_Description` varchar(200) NOT NULL,
  `B_Amount` int(10) NOT NULL,
  `B_Date` date NOT NULL,
  `B_month` date NOT NULL,
  `approve_by_manager` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bazar_list`
--

INSERT INTO `bazar_list` (`ID`, `U_ID`, `B_Description`, `B_Amount`, `B_Date`, `B_month`, `approve_by_manager`) VALUES
(1, 5, 'Dim', 60, '2019-06-01', '2019-06-01', 0),
(2, 1, 'dfdfb     dfgdfg', 443, '2019-05-15', '2019-04-01', 0),
(3, 1, 'dfdfb     dfgdfg', 443, '2019-05-15', '2019-04-01', 0),
(4, 5, 'Dim, Tal', 92, '2019-06-08', '2019-06-01', 0),
(5, 3, 'Chicken, Vagetable', 512, '2019-06-13', '2019-06-01', 0),
(6, 6, 'Egg, Vagetable, Onine', 370, '2019-06-14', '2019-06-01', 0),
(7, 3, 'Rice 2 kg', 90, '2019-06-15', '2019-06-01', 0),
(8, 2, 'Rice, Fish, Vagetable', 460, '2019-06-16', '2019-06-01', 0),
(9, 4, 'Rice, Oil', 130, '2019-06-18', '2019-06-01', 0),
(10, 3, 'Chicken, Vagetable', 255, '2019-06-19', '2019-06-01', 0),
(11, 5, 'Rice, Oil', 265, '2019-06-20', '2019-06-01', 0),
(12, 2, 'Chicken, Rice, Oil, Other', 1272, '2019-06-21', '2019-06-01', 0),
(13, 4, 'Fish, Vagetable', 245, '2019-06-22', '2019-06-01', 0),
(14, 3, 'Rice, Egg', 250, '2019-06-23', '2019-06-01', 0),
(15, 5, 'Fish, Vagetable, Oninon', 345, '2019-06-24', '2019-06-01', 0),
(16, 5, 'Chal, Dhal , ', 360, '2020-05-20', '2020-05-01', 1),
(20, 5, 'Chal, Dhal , Dim', 225, '2020-05-26', '2020-05-01', 1),
(21, 5, 'Chal, Dhal ,', 360, '2020-05-27', '2020-05-01', 1),
(22, 5, 'Alu, paiz', 200, '2020-05-01', '2020-05-01', 1),
(23, 5, 'Chal, Dhal ,', 360, '2020-05-13', '2020-05-01', 0),
(24, 3, 'Chal, Dhal ,', 360, '2020-05-29', '2020-05-01', 0),
(25, 3, 'Chal, Dhal , Dim', 200, '2020-05-21', '2020-05-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Deposit_Date` date NOT NULL,
  `D_month` date NOT NULL,
  `approve_by_manager` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`ID`, `U_ID`, `Amount`, `Deposit_Date`, `D_month`, `approve_by_manager`) VALUES
(1, 2, 340, '2019-06-03', '2019-06-01', 0),
(2, 1, 500, '2019-05-08', '2019-04-01', 0),
(3, 1, 500, '2019-05-08', '2019-04-01', 1),
(4, 2, 25, '2019-06-04', '2019-06-01', 0),
(5, 2, 400, '2019-06-05', '2019-06-01', 0),
(6, 2, 172, '2019-06-07', '2019-06-01', 0),
(7, 3, 40, '2019-06-01', '2019-06-01', 0),
(8, 3, 12, '2019-06-03', '2019-06-01', 0),
(9, 3, 90, '2019-06-05', '2019-06-01', 0),
(10, 3, 55, '2019-06-12', '2019-06-01', 0),
(11, 3, 400, '2019-06-14', '2019-06-01', 0),
(12, 3, 340, '2019-06-18', '2019-06-01', 0),
(13, 4, 1000, '2019-06-07', '2019-06-01', 0),
(14, 7, 200, '2019-06-18', '2019-06-01', 0),
(15, 7, 500, '2019-06-24', '2019-06-01', 0),
(16, 5, 20, '2019-06-02', '2019-06-01', 0),
(17, 5, 92, '2019-06-03', '2019-06-01', 0),
(18, 5, 1000, '2019-06-07', '2019-06-01', 0),
(19, 5, 120, '2019-06-07', '2019-06-01', 0),
(20, 5, 340, '2019-06-13', '2019-06-01', 0),
(21, 5, 130, '2019-06-20', '2019-06-01', 0),
(22, 5, 135, '2019-06-23', '2019-06-01', 0),
(23, 6, 1000, '2019-06-13', '2019-06-01', 0),
(24, 6, 190, '2019-06-20', '2019-06-01', 0),
(25, 6, 100, '2019-06-23', '2019-06-01', 0),
(26, 5, 360, '2020-05-22', '2020-05-01', 1),
(27, 2, 360, '2020-05-15', '2020-05-01', 1),
(29, 5, 200, '2020-05-25', '2020-05-01', 1),
(30, 6, 360, '2020-05-25', '2020-05-01', 1),
(31, 2, 200, '2020-05-25', '2020-05-01', 1),
(32, 3, 500, '2020-05-28', '2020-05-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE `extra` (
  `id` int(255) NOT NULL,
  `extra_desc` varchar(255) NOT NULL,
  `extra_amount` int(255) NOT NULL,
  `extra_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra`
--

INSERT INTO `extra` (`id`, `extra_desc`, `extra_amount`, `extra_date`) VALUES
(1, 'Light', 120, '2020-06-07'),
(2, 'Harpic', 120, '2020-06-04'),
(3, 'Bonous ', 500, '2020-06-01'),
(4, 'light', 200, '2020-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `mill_info`
--

CREATE TABLE `mill_info` (
  `ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `Mill_Count` float NOT NULL,
  `MIll_rate` int(10) NOT NULL,
  `Date` date NOT NULL,
  `M_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mill_info`
--

INSERT INTO `mill_info` (`ID`, `U_ID`, `Mill_Count`, `MIll_rate`, `Date`, `M_Date`) VALUES
(1, 1, 5.5, 0, '2019-05-02', '2019-05-01'),
(2, 1, 5.5, 0, '2019-05-02', '2019-05-01'),
(3, 2, 1, 0, '2019-06-09', '2019-06-01'),
(4, 2, 2, 0, '2019-06-13', '2019-06-01'),
(5, 2, 3, 0, '2019-06-14', '2019-06-01'),
(6, 2, 1, 0, '2019-06-15', '2019-06-01'),
(7, 2, 1, 0, '2019-06-18', '2019-06-01'),
(8, 2, 2, 0, '2019-06-19', '2019-06-01'),
(9, 2, 1, 0, '2019-06-20', '2019-06-01'),
(10, 2, 1.5, 0, '2019-06-21', '2019-06-01'),
(11, 1, 5.5, 0, '2019-05-15', '2019-05-01'),
(12, 4, 2, 0, '2019-06-16', '2019-06-01'),
(13, 4, 2, 0, '2019-06-17', '2019-06-01'),
(14, 4, 3.5, 0, '2019-06-18', '2019-06-01'),
(15, 4, 2, 0, '2019-06-19', '2019-06-01'),
(16, 4, 3, 0, '2019-06-20', '2019-06-01'),
(17, 4, 1, 0, '2019-06-21', '2019-06-01'),
(18, 4, 2.5, 0, '2019-06-22', '2019-06-01'),
(19, 4, 2.5, 0, '2019-06-23', '2019-06-01'),
(20, 3, 3, 0, '2019-06-03', '2019-06-01'),
(21, 3, 1, 0, '2019-06-12', '2019-06-01'),
(22, 3, 1, 0, '2019-06-13', '2019-06-01'),
(23, 3, 1, 0, '2019-06-14', '2019-06-01'),
(24, 3, 0.5, 0, '2019-06-15', '2019-06-01'),
(25, 3, 1, 0, '2019-06-18', '2019-06-01'),
(26, 3, 1, 0, '2019-06-19', '2019-06-01'),
(27, 3, 1, 0, '2019-06-20', '2019-06-01'),
(28, 3, 1.5, 0, '2019-06-21', '2019-06-01'),
(29, 3, 2.5, 0, '2019-06-22', '2019-06-01'),
(30, 3, 2.5, 0, '2019-06-23', '2019-06-01'),
(31, 6, 1, 0, '2019-06-12', '2019-06-01'),
(32, 6, 2, 0, '2019-06-13', '2019-06-01'),
(33, 6, 2, 0, '2019-06-14', '2019-06-01'),
(34, 6, 2.5, 0, '2019-06-15', '2019-06-01'),
(35, 6, 2, 0, '2019-06-16', '2019-06-01'),
(36, 6, 2, 0, '2019-06-17', '2019-06-01'),
(37, 6, 2.5, 0, '2019-06-18', '2019-06-01'),
(38, 6, 2, 0, '2019-06-19', '2019-06-01'),
(39, 6, 2.5, 0, '2019-06-20', '2019-06-01'),
(40, 6, 2, 0, '2019-06-21', '2019-06-01'),
(41, 6, 2.5, 0, '2019-06-22', '2019-06-01'),
(42, 6, 2.5, 0, '2019-06-23', '2019-06-01'),
(43, 6, 1, 0, '2019-06-24', '2019-06-01'),
(44, 5, 3, 0, '2019-06-03', '2019-06-01'),
(45, 5, 2, 0, '2019-06-19', '2019-06-01'),
(46, 5, 2, 0, '2019-06-20', '2019-06-01'),
(47, 5, 1, 0, '2019-06-21', '2019-06-01'),
(48, 5, 1, 0, '2019-06-22', '2019-06-01'),
(49, 5, 1, 0, '2019-06-23', '2019-06-01'),
(50, 7, 1, 0, '2019-06-14', '2019-06-01'),
(51, 7, 1.5, 0, '2019-06-15', '2019-06-01'),
(52, 7, 1, 0, '2019-06-16', '2019-06-01'),
(53, 7, 1, 0, '2019-06-17', '2019-06-01'),
(54, 7, 1.5, 0, '2019-06-18', '2019-06-01'),
(55, 7, 1, 0, '2019-06-19', '2019-06-01'),
(56, 7, 1.5, 0, '2019-06-20', '2019-06-01'),
(57, 7, 1.5, 0, '2019-06-21', '2019-06-01'),
(58, 7, 1, 0, '2019-06-22', '2019-06-01'),
(59, 7, 1.5, 0, '2019-06-23', '2019-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `ID` int(11) NOT NULL,
  `S_Date` date NOT NULL,
  `E_Date` date NOT NULL,
  `M_rate` float(10,2) NOT NULL,
  `T_Cost` int(10) NOT NULL,
  `T_Mill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`ID`, `S_Date`, `E_Date`, `M_rate`, `T_Cost`, `T_Mill`) VALUES
(1, '2019-04-01', '2019-04-30', 0.00, 0, 0),
(2, '2019-05-01', '2019-05-31', 45.88, 780, 17),
(3, '2019-06-01', '2019-06-30', 0.00, 0, 0),
(4, '2019-09-24', '2019-09-30', 41.86, 0, 0),
(5, '2020-02-01', '2020-02-29', 0.00, 0, 0),
(6, '2020-05-01', '2020-05-31', 0.00, 2065, 0),
(15, '2020-06-01', '2020-06-30', 0.00, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(80) NOT NULL,
  `PASSWORD` varchar(36) NOT NULL,
  `U_Image` varchar(100) NOT NULL,
  `P_Address` varchar(200) NOT NULL,
  `MOBILE` int(11) NOT NULL,
  `ROLE` varchar(191) NOT NULL,
  `paid_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `NAME`, `EMAIL`, `PASSWORD`, `U_Image`, `P_Address`, `MOBILE`, `ROLE`, `paid_status`) VALUES
(1, 'Admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'uploads/1557761585.jpg', '56, Abul road , Abulpur, Dhaka 1200', 1725730333, 'admin', 1),
(2, 'Sobuj sutadhar', 'sobuj@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'uploads/1591521497.jpg', '129/2, new Merket, Dhanmondi, Dhaka 1000', 1687618428, 'manager', 1),
(3, 'Konok Ranjan Shill', 'Konok@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'uploads/1561394151.jpg', '129/2, new Merket, Dhanmondi, Dhaka 1000', 1855300207, 'user', 0),
(4, 'MD Saiful Islam', 'saiful@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'uploads/1561394108.jpg', '129/2, new Merket, Dhanmondi, Dhaka 1000', 1735730333, 'user', 0),
(5, 'Jibon sutradhar', 'jibon@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'uploads/1561394268.jpg', '129/2, new Merket, Dhanmondi, Dhaka 1000', 1855669205, 'user', 0),
(6, 'MD  Biddut Hossain', 'biddut@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'uploads/1561394381.jpg', '129/2, new Merket, Dhanmondi, Dhaka 1000', 1646895026, 'user', 0),
(7, 'Rasel Royal', 'royal@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'uploads/1561394457.png', '129/2, new Merket, Dhanmondi, Dhaka 1000', 1779423198, 'user', 0),
(8, 'Jibon', 'sdjibon2016@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'uploads/1591118843.jpg', 'asdfasdf', 1855669205, 'user', 0),
(9, 'Test', 'test@mail.com', '25d55ad283aa400af464c76d713c07ad', 'uploads/1591521225.jpg', 'Test, address', 12121420, 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bazar_list`
--
ALTER TABLE `bazar_list`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `B_month` (`B_month`),
  ADD KEY `U_ID` (`U_ID`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `U_ID` (`U_ID`),
  ADD KEY `D_month` (`D_month`) USING BTREE;

--
-- Indexes for table `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mill_info`
--
ALTER TABLE `mill_info`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `U_ID` (`U_ID`),
  ADD KEY `M_Date` (`M_Date`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `S_Date` (`S_Date`),
  ADD UNIQUE KEY `E_Date` (`E_Date`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bazar_list`
--
ALTER TABLE `bazar_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `extra`
--
ALTER TABLE `extra`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mill_info`
--
ALTER TABLE `mill_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `relation`
--
ALTER TABLE `relation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bazar_list`
--
ALTER TABLE `bazar_list`
  ADD CONSTRAINT `bazar_list_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bazar_list_ibfk_2` FOREIGN KEY (`B_month`) REFERENCES `relation` (`S_Date`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deposit_ibfk_2` FOREIGN KEY (`D_month`) REFERENCES `relation` (`S_Date`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mill_info`
--
ALTER TABLE `mill_info`
  ADD CONSTRAINT `mill_info_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mill_info_ibfk_2` FOREIGN KEY (`M_Date`) REFERENCES `relation` (`S_Date`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
