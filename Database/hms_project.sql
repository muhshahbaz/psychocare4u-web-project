-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 04:08 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile`) VALUES
(1, 'Babur', 'babur', 'baburr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `audience` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `audience`, `message`) VALUES
(1, 'Meeting', 'both', 'Please come to office on 12 pm for a meeting..'),
(2, 'Mettin', 'both', 'Today Meeting At 11:00 am');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `pat_username` varchar(100) NOT NULL,
  `doct_username` varchar(100) NOT NULL,
  `diases` varchar(100) NOT NULL,
  `app_date` date NOT NULL,
  `app_get_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `mode` varchar(10) NOT NULL,
  `link` varchar(100) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `pat_username`, `doct_username`, `diases`, `app_date`, `app_get_date`, `status`, `mode`, `link`, `blood`, `weight`) VALUES
(93, 'psy', 'doctor1', 'Heart Diases', '2021-02-26', '2021-02-26', 'checked', 'online', 'https://doxy.me/healthcare2', '110', '56'),
(94, 'psy16', 'doctor1', 'Heart', '2021-02-26', '2021-02-26', 'approved', 'physical', '', '120', '56'),
(95, 'psy15', 'doctor3', 'hert', '2021-02-26', '2021-02-26', 'checked', 'physical', 'https://doxy.me/healthcare2', '', ''),
(96, 'psy15', 'doctor3', 'hh', '2021-02-26', '2021-02-26', 'approved', 'online', 'https://doxy.me/healthcare2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_log`
--

CREATE TABLE `doctor_log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `logout` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_log`
--

INSERT INTO `doctor_log` (`id`, `username`, `login`, `logout`) VALUES
(150, 'doctor1', '2021-02-25 09:59:13', '2021-02-26 03:20:17'),
(151, 'omer', '2021-02-25 10:34:45', '2021-02-26 03:10:07'),
(152, 'doctor1', '2021-02-25 10:40:16', '2021-02-26 03:20:17'),
(153, 'doctor1', '2021-02-25 10:45:45', '2021-02-26 03:20:17'),
(154, 'doctor1', '2021-02-25 10:50:05', '2021-02-26 03:20:17'),
(155, 'doctor1', '2021-02-26 06:24:00', '2021-02-26 10:55:51'),
(156, 'doctor3', '2021-02-26 06:26:26', ''),
(157, 'doctor3', '2021-02-26 06:27:07', '');

-- --------------------------------------------------------

--
-- Table structure for table `doct_detail`
--

CREATE TABLE `doct_detail` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `specilization` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `summery` varchar(500) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doct_detail`
--

INSERT INTO `doct_detail` (`id`, `username`, `firstname`, `lastname`, `gender`, `qualification`, `specilization`, `phone`, `city`, `summery`, `pic`, `status`) VALUES
(18, 'doctor1', 'Umair Ali', '31301331233', 'Male', 'MBBS', 'Heart Surgen', '03013329745', 'Ahmed Nager Chatha', 'i am a heart surgen doctor. ', 'dr.jpg', 'approve'),
(19, 'doctor2', 'Ali', '31323123', 'Male', 'MBBS', 'Heart surgen', '234234', 'Chichawatni', 'i am a heart surgen', '', 'approve'),
(21, 'doctor3', 'Muhammad Babur', '3033206453', 'Male', 'MBBS', 'Heart surgen', '03013321413', 'Chillianwala', 'Obtain a 4-year undergraduate degree in pre-med with an emphasis on science.\r\nAttend and graduate from a 4-year medical school.\r\nComplete a 5-year general surgery residency program.', 'doctor-img2.png', 'approve'),
(22, 'omer', 'Syed Omar Abdur Rehman', '301323411323', 'Male', 'M.B.B.S., F.C.P.S', 'Eye Specialist, Eye Surgeon', '0618048444', 'Ali Khan Abad', 'Dr. Syed Omar Abdur Rehman is among the Best Eye Specialists in Bahawalpur. Dr Syed Omar AbdurRehman initially trained at the prestigious Al Shifa Trust Eye Hospital, Rawalpindi, the centre of excellence in Ophthalmology in Pakistan for two years before moving to Ireland for higher surgical training. He then served as Senior Resident Eye Surgeon at Cork University Hospital, Cork, Ireland for one year (Jul 2017-June 2018) and then again as Senior Resident Eye Surgeon at University Hospital Limeri', 'umar.PNG', 'pendding');

-- --------------------------------------------------------

--
-- Table structure for table `doct_log`
--

CREATE TABLE `doct_log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doct_log`
--

INSERT INTO `doct_log` (`id`, `username`, `email`, `password`) VALUES
(32, 'doctor1', 'dtest@gmail.com', '123'),
(33, 'doctor2', 'bethstlaurent024@gmail.com', '123'),
(35, 'doctor3', 'baburali894@gmail.com', '123'),
(36, 'omer', 'fasial@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `doct_permission`
--

CREATE TABLE `doct_permission` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `medicin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medicin`) VALUES
(1, 'penadol'),
(2, 'calpol');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `maritial_status` varchar(20) NOT NULL,
  `blood_g` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fname`, `lname`, `username`, `cnic`, `age`, `phone`, `gender`, `city`, `fee`, `maritial_status`, `blood_g`) VALUES
(14, 'zahid', 'ali', 'PSY', '310', '67', '0301332341', 'Male', 'Okara', '', 'Single', 'O Positive'),
(15, 'Ali ', 'ahmad', 'PSY15', '312', '43', '030123', 'Male', 'Rabwah', '', 'Single', 'O Positive'),
(16, 'Babur ali', 'Ahmad', 'PSY16', '310', '23', '03012314231', 'Male', 'Rahim Yar Khan', '', 'Single', 'O Positive');

-- --------------------------------------------------------

--
-- Table structure for table `pat_med`
--

CREATE TABLE `pat_med` (
  `id` int(11) NOT NULL,
  `pat_username` varchar(100) NOT NULL,
  `medician` varchar(100) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `next_app_date` varchar(100) NOT NULL,
  `checked_by` varchar(100) NOT NULL,
  `diases` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pat_med`
--

INSERT INTO `pat_med` (`id`, `pat_username`, `medician`, `remarks`, `next_app_date`, `checked_by`, `diases`) VALUES
(49, 'psy', 'PANDOL, CAPCOL', '2 MEDICINE DAILY', '2021-02-28', 'doctor1', 'Heart Patient'),
(50, 'psy15', 'penadol, capcol', 'take 2 med', '2021-02-28', 'doctor3', 'heart pain');

-- --------------------------------------------------------

--
-- Table structure for table `reception_log`
--

CREATE TABLE `reception_log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `logout` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reception_log`
--

INSERT INTO `reception_log` (`id`, `username`, `login`, `logout`) VALUES
(86, 'recept1', '2021-02-25 09:36:24', ''),
(87, 'recept1', '2021-02-25 09:59:58', ''),
(88, 'recept1', '2021-02-25 10:41:13', ''),
(89, 'recept1', '2021-02-26 06:24:42', ''),
(90, 'recept1', '2021-02-26 06:27:13', '');

-- --------------------------------------------------------

--
-- Table structure for table `recept_detail`
--

CREATE TABLE `recept_detail` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `summery` varchar(500) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recept_detail`
--

INSERT INTO `recept_detail` (`id`, `username`, `firstname`, `lastname`, `gender`, `qualification`, `phone`, `city`, `summery`, `pic`, `status`) VALUES
(9, 'recept1', 'Sarmad ali', '3130134345456', 'Male', 'inter', '03013324657', 'Qila Didar Singh', '', 'recpt.jpg', 'approve'),
(10, 'recept2', 'Qamar', '3130133241231', 'Male', 'Inter', '03201445432', 'Rahim Yar Khan', '', '', 'pendding');

-- --------------------------------------------------------

--
-- Table structure for table `recept_log`
--

CREATE TABLE `recept_log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recept_log`
--

INSERT INTO `recept_log` (`id`, `username`, `email`, `password`) VALUES
(11, 'recept1', 'test@gmail.com', '123'),
(12, 'recept2', 'bethstlaurent024@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `recept_permission`
--

CREATE TABLE `recept_permission` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resetpass`
--

CREATE TABLE `resetpass` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resetpass`
--

INSERT INTO `resetpass` (`id`, `email`, `token`) VALUES
(5, 'baburali894@gmail.com', '16038095b31660');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_log`
--
ALTER TABLE `doctor_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doct_detail`
--
ALTER TABLE `doct_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doct_log`
--
ALTER TABLE `doct_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doct_permission`
--
ALTER TABLE `doct_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pat_med`
--
ALTER TABLE `pat_med`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reception_log`
--
ALTER TABLE `reception_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recept_detail`
--
ALTER TABLE `recept_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recept_log`
--
ALTER TABLE `recept_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recept_permission`
--
ALTER TABLE `recept_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resetpass`
--
ALTER TABLE `resetpass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `doctor_log`
--
ALTER TABLE `doctor_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `doct_detail`
--
ALTER TABLE `doct_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `doct_log`
--
ALTER TABLE `doct_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `doct_permission`
--
ALTER TABLE `doct_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pat_med`
--
ALTER TABLE `pat_med`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `reception_log`
--
ALTER TABLE `reception_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `recept_detail`
--
ALTER TABLE `recept_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recept_log`
--
ALTER TABLE `recept_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recept_permission`
--
ALTER TABLE `recept_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resetpass`
--
ALTER TABLE `resetpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
