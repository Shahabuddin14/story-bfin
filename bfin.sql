-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 12:00 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bfin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2019-12-19 16:21:18', '2020-12-02 16:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `storyId` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userId`, `storyId`, `comment`, `time`) VALUES
(10, 6, 16, 'Nice one!', '2020-12-03 13:01:22'),
(11, 5, 17, 'laravel :)', '2020-12-03 13:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Not to say');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `usermail` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `image` text NOT NULL,
  `caption` varchar(200) NOT NULL,
  `tags` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `userId`, `name`, `usermail`, `title`, `body`, `image`, `caption`, `tags`, `status`, `date`) VALUES
(15, 5, 'Mohammad Shahabuddin', 'shahabuddin650@gmail', 'Yamaha mt 15', 'The MT-15 is a Pure-bred hyper naked, one of the most dynamic lightweights from the MT stable. This bike has all the traits of a hyper naked with its agile handling, wide handlebar, and ultra-lightweight of 138 kgs.\r\n\r\nThe impeccably styled MT-15 with its Bifunctional LED headlight gives the motorcycle an aggressive and intimidating look. This hyper naked bike will not only give you the thrill you seek but will also inspire immense confidence in the rider.', 'Yamaha-MT-15-Photos-Blue-1000x570.jpg', 'MT-15', 'Bikes', 'Listed', '2020-12-03 12:45:46'),
(16, 5, 'Mohammad Shahabuddin', 'shahabuddin650@gmail', 'Laravel easy form making!', 'Creating forms with inputs and validation errors in the project is usually a long and boring copy-paste process.\r\n\r\nI hope you already tried the LaravelCollective package in your Laravel applications before because it’s a great tool to build Forms. What we will be focusing on today is creating custom components such as inputs, selects, etc. The goal is to speed up the developing process, and as a bonus — keep all our HTML for each component in one place, so it could be easily modified for the whole project once.', '2400ed69000b1030e74d026261e1eb9c.png', 'laravel', 'Tips', 'Listed', '2020-12-03 12:52:30'),
(17, 6, 'Farhan Islam', 'ifarhan550@gmail.com', 'Which php framework is best?', 'There is a lot of framework for PHP. As a new web application developer, which one should I need to learn first?\r\n\r\nAlong with that, what previous knowledge is needed to be required.', 'what-is-php-3-1.png', 'php framework', 'Framework', 'Listed', '2020-12-03 13:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(7, 'Bikes'),
(13, 'Tips'),
(14, 'Framework');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `birthday` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `birthday`, `phone`, `gender`, `image`, `password`) VALUES
(5, 'shahabuddin650@gmail.com', 'Mohammad Shahabuddin', '1994-10-22', '01680850224', 'Male', 'IMG_20200203_184147.jpg', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'ifarhan550@gmail.com', 'Farhan Islam', '1994-10-22', '01924931926', 'Male', 'Yamaha-MT-15-Photos-Blue-1000x570.jpg', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
