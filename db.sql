-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 08:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


use trade;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trade`;
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

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
(5, 'Joshua john', 140, '2023-07-31 08:19:36', 'Q4UU36L'),
(7, 'jason2000', 1060, '2023-08-01 13:19:33', 'J4UU36N');

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
(8, 'currency growth', '2023-07-11 09:37:12', 'ngumbau'),
(9, 'asset finance', '2023-07-11 09:37:30', 'john'),
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
(13, 11, 'Joshua john', 'what a great post\r\n', 'approved', '2023-07-27 09:50:31'),
(14, 9, 'Joshua john', 'very good text for us', 'approved', '2023-07-27 09:50:51'),
(15, 9, 'Joshua john', 'very protectiful measures', 'approved', '2023-07-27 09:51:35'),
(16, 10, 'Joshua john', 'asset finance is very broad i appriciate', 'approved', '2023-07-27 09:52:19'),
(17, 6, 'Joshua john', 'thank you', 'approved', '2023-07-27 09:52:46'),
(18, 10, 'Ngumbau Joshua', 'nice one\r\n', 'approved', '2023-07-29 11:56:29'),
(19, 11, 'Ngumbau Joshua', 'nice content', 'approved', '2023-07-29 12:00:21'),
(20, 11, 'jason2000', 'nice', 'approved', '2023-08-01 13:21:49'),
(21, 5, 'Joshua john', 'All about money ofcourse\r\n', 'approved', '2023-08-04 16:18:25'),
(22, 8, 'Joshua john', 'financial stability at the best', 'approved', '2023-08-04 16:19:45');

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
(25156, 18),
(25156, 19),
(25156, 20),
(25156, 21),
(25156, 22);

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
(15, 'joshua', 'joshujohn03@gmail.com', 'intergrations', 'i can sign in with google', '2023-08-04 16:27:44');

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
(5, 8, 'money planning', 'JOHN N.', 'about.jpg', '<p>Financial planning is an essential process that helps individuals and families achieve their long-term financial goals and secure their financial future. It involves assessing current financial status, setting realistic objectives, and developing strat', 'money ', 0, 'published', 0, '2023-07-14 11:50:01'),
(6, 8, 'currency growth in kenya', 'JOHN N.', 'blogs3.jpg', '<p><strong>Currency growth</strong> in<i> Kenya</i> has experienced notable developments in recent years. The Kenyan shilling, the official currency, has shown a resilient trajectory, exhibiting stability and gradual appreciation against major foreign cur', 'growth', 0, 'published', 0, '2023-07-16 11:52:50'),
(8, 8, 'good finacial skills', 'JOHN N.', 'blog1.jpg', '<p>In today\'s fast-paced world, having good finance skills is crucial for achieving financial success and stability. Whether you are managing personal finances or handling a business\'s financial affairs, these skills can pave the way to a secure financial', 'finance', 0, 'published', 0, '2023-07-24 21:12:02'),
(9, 35, 'The world coin Scam', 'Joshua john', 'coins.png', '<p><strong>Unveiling the World of Coin Scamming: How to Stay Safe</strong></p><p><i>Introduction</i></p><p>In recent years, the rise of cryptocurrencies and digital coins has captured the attention of investors worldwide. The lure of lucrative profits and', 'cross platform trading scaming', 0, 'draft', 0, '2023-07-27 09:07:11'),
(10, 9, 'Nurturing Your Wealth: The Art of Asset Growth Monitoring', 'Joshua john', 'about.jpg', '<p><strong>Introduction</strong></p><p>In the pursuit of financial stability and long-term prosperity, monitoring the growth of your assets plays a crucial role. Whether you are an individual investor or a business owner, understanding and tracking the pe', 'asset growth', 0, 'draft', 0, '2023-07-27 09:11:06'),
(11, 8, ' Bank Financial Growth in the New Era: Adapting to Technological Advancements and Customer Demands', 'JOHN N.', 'breadcrumb.jpg', '<p><strong>Introduction:</strong></p><p>In today \'s rapidly evolving world, the banking industry is undergoing a transformative shift, driven by technological advancements and changing customer expectations. The new era has brought about numerous challenges and opportunities for banks to achieve financial growth and sustain their competitiveness. In this blog, we will explore how banks are adapting to this changing landscape and harnessing innovative strategies to ensure their financial growth.</p><p><i><strong>1. Embracing Digital Transformation:</strong></i></p><blockquote><p>One of the key drivers of financial growth in the new era is the adoption of digital transformation. Banks are investing heavily in digital technologies to streamline their operations, enhance customer experiences, and improve efficiency. Online banking, mobile apps, and digital payment solutions have become the norm, enabling customers to conduct transactions conveniently and securely from anywhere, at any time.</p><p>Moreover, the implementation of Artificial Intelligence (AI), Machine Learning (ML), and Big Data analytics empowers banks to gain valuable insights into customer behavior, identify potential fraud, and offer personalized financial products. This data-driven approach enables banks to tailor their services to individual needs, thereby enhancing customer satisfaction and loyalty.</p></blockquote><p><i><strong>2. Fostering Financial Inclusion:</strong></i></p><blockquote><p>In the new era, financial institutions are increasingly focusing on fostering financial inclusion. With advancements in mobile technology and internet connectivity, banks are reaching out to the unbanked and underbanked populations in remote areas. Digital banking solutions and mobile wallets provide these individuals with access to essential financial services, such as savings accounts, loans, and insurance.</p><p>By promoting financial inclusion, banks not only contribute to social development but also tap into new customer segments, expanding their customer base and driving financial growth.</p></blockquote><p><i><strong>3. Reinventing Customer Experience:</strong></i></p><blockquote><p>Customer expectations have evolved significantly in the new era. Today\'s customers demand seamless, personalized, and convenient banking experiences. To stay ahead in the competitive landscape, banks are reinventing their customer experience strategies.</p><p>Interactive chatbots, virtual assistants, and self-service kiosks are some of the tools banks are using to provide real-time assistance and support. Moreover, omnichannel banking ensures a consistent experience across various touchpoints, whether it\'s in-branch, online, or mobile.</p><p>Enhancing customer experience fosters trust and loyalty, leading to increased customer retention and positive word-of-mouth referrals, which ultimately contribute to financial growth.</p></blockquote><p><i>4. Prioritizing Cybersecurity:</i></p><blockquote><p>As banks embrace digitalization, the importance of robust cybersecurity cannot be overstated. With increased digital transactions, the risk of cyber threats and data breaches has become a significant concern.</p><p>Banks are investing heavily in cybersecurity measures to protect customer data and secure financial transactions. Advanced encryption techniques, multi-factor authentication, and continuous monitoring are some of the strategies employed to safeguard against cyberattacks.</p><p>By ensuring a secure banking environment, financial institutions not only protect their reputation but also earn the trust of customers, which is vital for long-term financial growth.</p></blockquote><p><i><strong>Conclusion:</strong></i></p><p>In the new era, the banking industry is undergoing a profound transformation, marked by technological innovations and evolving customer demands. Banks that adapt to this changing landscape by embracing digital transformation, fostering financial inclusion, reinventing customer experiences, and prioritizing cybersecurity are best positioned for financial growth.</p><p>As the financial ecosystem continues to evolve, banks must remain agile and open to adopting new technologies and strategies that align with customer expectations. By leveraging these opportunities, banks can navigate the challenges of the new era and thrive in a competitive financial landscape.</p>', 'financial growth', 0, 'published', 0, '2023-07-27 09:45:19');

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
(5, 'Basic', '2023-08-02 21:00:00', '2024-02-03', 3999, 'Joshua john', 'halfyear');

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
(5, 'Joshua john', 20, 20, 0, '2023-08-04 16:01:55');

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
(58, '0NAQV9OKN6', '2023-08-03 14:26:23', 7999, 'succesiful', 'Joshua john', 'purchase');

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
(49, 'sam bro 20230704_135056.jpg', 'samuel@gmail.com', 'samuel', 'john', 'samuelM', 'kenya', 791752105, 'nairobi', '2023-07-28 11:39:55', '2023-07-28', 'allowed', 'investor', 0, '$2y$10$92snLX7oMjGqe4epg1k5CurHmwoRJO3Tvs3JhyKV7dY/HhoNA4mGa', '', '', '', '2023-07-28 11:39:55'),
(50, 'ndanu-team.jpeg', 'ndanujohn@gmail.com', 'ndanu', 'john', 'Ndanu J', 'kenya', 728057665, 'muranga', '2023-07-28 13:22:28', '2023-07-28', 'allowed', 'investor', 0, '$2y$10$VuGT6MiFYWMETL1fJo/1UuctNVpohsLGfBFbEgPRtc7nC2bommUyq', '', '', '', '2023-07-28 13:22:28'),
(51, 'image00008.jpeg', 'joshujohn03@gmail.com', 'Joshua', 'Ngumbau', 'JoshuaN', 'kenya', 759707049, 'kiambu', '2023-07-29 07:39:14', '2023-07-28', 'allowed', 'investor', 0, '$2y$10$3r2z0FVOztZ0AOTXFs1/eOZnhN17v6RLc/oLsNjRhGBM9OOVF9due', '', '', '', '2023-07-29 07:39:14'),
(52, 'walpaper1 (1).jpg', 'joshuangumbau131@gmail.com', 'Ngumbau', 'Joshua', 'Ngumbau Joshua', 'uganda', 2147483647, 'entebe', '2023-07-29 07:45:15', '2023-07-28', 'allowed', 'investor', 0, '', '111926745821172954640', '', '', '2023-07-29 07:45:15'),
(54, 'image00008.jpeg', 'joshujohn03@gmail.com', 'Joshua', 'John', 'Joshua john', 'United States', 798074346, 'calfornia', '2023-07-31 08:19:36', '2023-07-28', 'allowed', 'admin', 0, '$2y$10$QEBx0rNoR9U7uaPhUpcI8.1eOsj9czcOKbnBye9Pgm2DPfNz61p9i', '110565315830701612025', '', '', '2023-07-31 08:19:36'),
(55, 'imgonline-com-ua-resize-tqyJCLbdzd61bx.jpg', 'mwas@gmail.com', 'jason', 'mwas', 'jason2000', 'United States', 2147483647, 'jason', '2023-08-01 13:19:33', '2023-07-28', 'allowed', 'investor', 0, '$2y$10$j3S0iHgUd5nZUXfgsCy.3OhVfb2y17vMR6K7kvGEs6etWvRiH5cRW', '', '', '', '2023-08-01 13:19:33');

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
(8, 'ugiirv3c2c2c2772t6v92dm9a3', 1691051015),
(9, 'e7rv36fcmhltatcjlm465ibpf2', 1691073740);

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
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trading`
--
ALTER TABLE `trading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `USERS_ONLINE` MODIFY `ID` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
