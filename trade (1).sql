-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 12:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trade`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

use trade;

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_balance` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `account_number` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `account_balance`, `created_at`, `account_number`) VALUES
(1, 'Ndanu J', 0, '2023-07-28 13:22:28', 'R5YG36P'),
(3, 'Ngumbau Joshua', 0, '2023-07-29 07:45:15', 'M5UU37N'),
(5, 'Joshua john', 170, '2023-07-31 08:19:36', 'Q4UU36L'),
(7, 'jason2000', 1060, '2023-08-01 13:19:33', 'J4UU36N'),
(8, 'mosesM', 0, '2023-08-06 17:23:13', 'EULU805'),
(9, 'victorM', 0, '2023-08-06 17:26:50', '3KER82U'),
(10, 'Tony Odolo', 0, '2023-08-07 10:46:23', 'O4C87SX');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cat_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`, `created_at`, `cat_username`) VALUES
(9, 'finance', '2023-07-11 09:37:30', 'john'),
(35, 'cross platform trading', '2023-07-26 11:13:13', 'victor'),
(36, 'financial growth', '2023-07-27 07:19:57', ''),
(37, 'financial stability', '2023-08-03 09:14:26', ''),
(38, 'money increment', '2023-08-03 09:14:38', ''),
(39, 'money market survey', '2023-08-03 09:15:00', ''),
(40, 'surplus money creation', '2023-08-03 09:15:20', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_status` enum('approved','unapproved') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_content`, `comment_status`, `created_at`) VALUES
(25, 13, 'Joshua john', 'yes joly jolu\r\n', 'unapproved', '2023-08-09 18:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main_account`
--

CREATE TABLE `main_account` (
  `balance` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_account`
--

INSERT INTO `main_account` (`balance`, `id`) VALUES
(43184, 18),
(43184, 19),
(43184, 20),
(43184, 21),
(43184, 22);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(13, 'joshua', 'joshujohn03@gmail.com', 'john', 'i have loved the whole website can i get mine', '2023-08-04 16:21:39'),
(14, 'samuel', 'joshujohn03@gmail.com', 'reports', 'very well detailed reports', '2023-08-04 16:26:24'),
(15, 'joshua', 'joshujohn03@gmail.com', 'intergrations', 'i can sign in with google', '2023-08-04 16:27:44'),
(16, 'joshua', 'joshujohn03@gmail.com', '0759707049', 'hello test', '2023-08-07 10:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` enum('published','draft') NOT NULL,
  `likes` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `likes`, `created_at`) VALUES
(13, 9, 'money', 'Joshua john', 'events.png', '<p>dkjlalj;lg</p>', 'node js is the future', 0, 'published', 0, '2023-08-09 18:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `subscription_name` varchar(255) NOT NULL,
  `subscription_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `subscription_end` date DEFAULT NULL,
  `subscription_amount` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `subscription_duration` enum('monthly','halfyear','year') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `subscription_name`, `subscription_start`, `subscription_end`, `subscription_amount`, `username`, `subscription_duration`) VALUES
(8, 'Plus Member', '2023-08-06 21:00:00', '2024-08-07', 11999, 'Joshua john', 'year'),
(9, 'Advanced', '2023-08-08 21:00:00', '2024-08-09', 5999, 'Joshua john', 'year');

-- --------------------------------------------------------

--
-- Table structure for table `trading`
--

CREATE TABLE `trading` (
  `id` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `principal` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `intrest` int(11) NOT NULL,
  `traded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trading`
--

INSERT INTO `trading` (`id`, `owner`, `principal`, `amount`, `intrest`, `traded_at`) VALUES
(1, 'Joshua john', 20, 20, 0, '2023-08-04 09:48:18'),
(2, 'Joshua john', 20, 20, 0, '2023-08-04 10:00:15'),
(3, 'Joshua john', 40, 40, 0, '2023-08-04 10:08:35'),
(4, 'Joshua john', 20, 20, 0, '2023-08-04 16:00:05'),
(5, 'Joshua john', 20, 20, 0, '2023-08-04 16:01:55'),
(6, 'Joshua john', 10, 10, 0, '2023-08-07 10:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transcation_code` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `transaction_amount` int(11) NOT NULL,
  `transaction_status` enum('fail','succesiful') NOT NULL,
  `username` varchar(255) NOT NULL,
  `transaction_type` enum('add','withdraw','invest','purchase') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transcation_code`, `created_at`, `transaction_amount`, `transaction_status`, `username`, `transaction_type`) VALUES
(41, '0MPAZB8OK6', '2023-07-31 11:15:19', 100, 'succesiful', 'Joshua john', 'add'),
(42, '7OR9SANK9G', '2023-07-31 11:53:53', 10, 'succesiful', 'Joshua john', 'invest'),
(43, '36GK9OKQPA', '2023-07-31 11:56:29', 10, 'succesiful', 'Joshua john', 'withdraw'),
(44, 'KA21AKIQ1O', '2023-08-01 11:00:13', 10, 'succesiful', 'Joshua john', 'add'),
(45, 'OOKX5A4A1C', '2023-08-01 11:00:24', 10, 'succesiful', 'Joshua john', 'add'),
(49, 'OPA5KYTI00', '2023-08-01 13:26:24', 500, 'succesiful', 'jason2000', 'add'),
(50, 'R0BAK0DQ9O', '2023-08-01 13:27:54', 140, 'succesiful', 'jason2000', 'invest'),
(51, 'L09TBO8AKU', '2023-08-01 13:28:11', 140, 'succesiful', 'jason2000', 'invest'),
(52, 'KB1A3OOIS7', '2023-08-01 13:28:17', 140, 'succesiful', 'jason2000', 'invest'),
(57, 'OA7KJJ9F3K', '2023-08-03 14:26:15', 7999, 'succesiful', 'Joshua john', 'purchase'),
(58, '0NAQV9OKN6', '2023-08-03 14:26:23', 7999, 'succesiful', 'Joshua john', 'purchase'),
(61, 'YRO4KTA4C8', '2023-08-09 18:38:47', 5999, 'succesiful', 'Joshua john', 'purchase');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_residence` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `leaving_date` date NOT NULL,
  `user_state` enum('allowed','forbidden') NOT NULL,
  `user_type` enum('investor','admin') NOT NULL,
  `amount` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_profile`, `user_email`, `user_firstname`, `user_lastname`, `user_name`, `user_country`, `user_phone`, `user_residence`, `joining_date`, `leaving_date`, `user_state`, `user_type`, `amount`, `password`, `token`, `gender`, `reset_token`, `created_at`) VALUES
(49, 'sam bro 20230704_135056.jpg', 'samuel@gmail.com', 'samuel', 'john', 'samuelM', 'kenya', 791752105, 'nairobi', '2023-07-28 11:39:55', '0000-00-00', 'forbidden', 'investor', 0, '$2y$10$92snLX7oMjGqe4epg1k5CurHmwoRJO3Tvs3JhyKV7dY/HhoNA4mGa', '', '', '', '2023-07-28 11:39:55'),
(50, 'ndanu-team.jpeg', 'ndanujohn@gmail.com', 'ndanu', 'john', 'Ndanu J', 'kenya', 728057665, 'muranga', '2023-07-28 13:22:28', '0000-00-00', 'allowed', 'investor', 0, '$2y$10$VuGT6MiFYWMETL1fJo/1UuctNVpohsLGfBFbEgPRtc7nC2bommUyq', '', '', '', '2023-07-28 13:22:28'),
(51, 'image00008.jpeg', 'joshujohn03@gmail.com', 'Joshua', 'Ngumbau', 'JoshuaN', 'kenya', 759707049, 'kiambu', '2023-07-29 07:39:14', '0000-00-00', 'allowed', 'investor', 0, '$2y$10$3r2z0FVOztZ0AOTXFs1/eOZnhN17v6RLc/oLsNjRhGBM9OOVF9due', '', '', '75d7f535a6be9344d1ff4dce7e821e0aaf503fb7f2c20ee371744561b83a8bf6fee1159e8a9ac36793363832e528176246cf', '2023-07-29 07:39:14'),
(52, 'aboutjoshua.jpeg', 'joshuangumbau131@gmail.com', 'Ngumbau', 'Joshua', 'Ngumbau Joshua', 'kenya', 74979452, 'nakuru', '2023-07-29 07:45:15', '0000-00-00', 'allowed', 'admin', 0, '$2y$10$j4Rt1OauEE/wB0BEv561COJZivj5fSYmPkgL3nuQOKTN1aXz9eLva', '111926745821172954640', '', '1e62d3602697ba2cf4a112f87eea0db5ed79f0eeb7b6d7b3d0e2f313059b9611d02ad0b868d5b5d9671ef2a5017ede679f82', '2023-07-29 07:45:15'),
(54, '0x0.jpg', 'joshujohn03@gmail.com', 'Joshua', 'John', 'Joshua john', 'kenya', 749952962, 'nairobi', '2023-07-31 08:19:36', '0000-00-00', 'allowed', 'admin', 0, '$2y$10$QEBx0rNoR9U7uaPhUpcI8.1eOsj9czcOKbnBye9Pgm2DPfNz61p9i', '110565315830701612025', '', '75d7f535a6be9344d1ff4dce7e821e0aaf503fb7f2c20ee371744561b83a8bf6fee1159e8a9ac36793363832e528176246cf', '2023-07-31 08:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '9cet3bjagl87hpfpsbo5hon05r', 1690530959),
(2, 'qq0lqkigvq272t3d4jrhqeiak3', 1690531509),
(3, '4ktb6t8lbngc76vb3ngrttj7cm', 1690462023),
(4, '56t2aqn0u3qnh6oc4bgqb49s58', 1690537847),
(5, '9h4omv720a6vhnhnff4pus4lst', 1690631099),
(6, 'dv759nbu0rckj8k2jmm7rlttdd', 1690616418),
(7, '4vi192ohr8hu1h5id5068adkrg', 1690632523),
(8, 'ugiirv3c2c2c2772t6v92dm9a3', 1691405955),
(9, 'e7rv36fcmhltatcjlm465ibpf2', 1691073740),
(10, '8ffaftejo7c5fcihljrt6nvkdq', 1691607183),
(11, '66j69p8ht82nmavp6741d507op', 1692175881);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_account`
--
ALTER TABLE `main_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trading`
--
ALTER TABLE `trading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_account`
--
ALTER TABLE `main_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trading`
--
ALTER TABLE `trading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
