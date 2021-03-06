-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 02:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_symblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `blog` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `image` longtext NOT NULL,
  `tags` longtext NOT NULL,
  `comment` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog`, `author`, `image`, `tags`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'A day with Symfony2', 'Lorem ipsum dolor sit amet, co', 'dsyph3r', 'beach.jpg', 'symfony2, php, paradise, symblog', '2', '2021-01-27 20:35:50', '2021-01-27 20:35:50'),
(2, 'The pool on the roof must have', 'Vestibulum vulputate mauris eg', 'Zero Cool', 'pool_leak.jpg', 'pool, leaky, hacked, movie, hacking, symblog', '20', '2011-07-23 06:12:33', '2011-07-23 06:12:33'),
(3, 'Misdirection. What the eyes se', 'Lorem ipsumvehicula nunc non l', 'Gabriel', 'misdirection.jpg', 'misdirection, magic, movie, hacking, symblog', '2', '2011-07-16 16:14:06', '2011-07-16 16:14:06'),
(4, 'The grid - A digital frontier', 'Lorem commodo. Vestibulum vulp', 'Kevin Flynn', 'the_grid.jpg', 'grid, daftpunk, movie, symblog', '0', '2011-06-02 18:54:12', '2011-06-02 18:54:12'),
(5, 'You\'re either a one or a zero.', 'Lorem ipsum dolor sit amet, co', 'Gary Winston', 'one_or_zero.jpg', 'binary, one, zero, alive, dead, !trusting, movie, symblog', '2', '2011-04-25 15:34:18', '2011-04-25 15:34:18'),
(7, 'sdf', 'sdfsdf', 'sdfsdf', '602244c93df6aunknown.png', 'sdfsdf', '', '2021-02-09 09:16:09', '2021-02-09 09:16:09'),
(8, 'titulamos', 'describimos', 'asdasd', '60224e8de9d4e3.jpg', 'asd', '', '2021-02-09 09:57:49', '2021-02-09 09:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `approved` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `blog_id`, `user`, `comment`, `approved`, `created_at`, `updated_at`) VALUES
(1, 1, 'symfony', 'To make a long story short. You can\'t go wrong by choosing Symfony! And no one has ever been fired for using Symfony.', 0, '2021-01-27 19:38:18', '2021-01-27 19:38:18'),
(2, 1, 'David', 'To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!', 0, '2011-07-23 04:12:33', '2011-07-23 04:12:33'),
(3, 2, 'Dade', 'Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.', 0, '2011-07-23 04:15:20', '2011-07-23 04:15:20'),
(4, 2, 'Kate', 'Are you challenging me? ', 0, '2011-07-23 04:15:20', '2011-07-23 04:15:20'),
(5, 2, 'Dade', 'Name your stakes.', 0, '2011-07-23 04:18:35', '2011-07-23 04:18:35'),
(6, 2, 'Kate', 'If I win, you become my slave.', 0, '2011-07-23 04:22:53', '2011-07-23 04:22:53'),
(7, 2, 'Dade', 'Your SLAVE?', 0, '2011-07-23 04:25:15', '2011-07-23 04:25:15'),
(8, 2, 'Kate', 'You wish! You\'ll do shitwork, scan, crack copyrights...', 0, '2011-07-23 04:46:08', '2011-07-23 04:46:08'),
(9, 2, 'Dade', 'And if I win?', 0, '2011-07-23 08:22:46', '2011-07-23 08:22:46'),
(10, 2, 'Kate', 'Make it my first-born!', 0, '2011-07-23 09:08:08', '2011-07-23 09:08:08'),
(11, 2, 'Dade', 'Make it our first-date!', 0, '2011-07-24 16:56:01', '2011-07-24 16:56:01'),
(12, 2, 'Kate', 'I don\'t DO dates. But I don\'t lose either, so you\'re on!', 0, '2011-07-25 20:28:42', '2011-07-25 20:28:42'),
(13, 3, 'Stanley', 'It\'s not gonna end like this.', 0, '2011-07-16 14:14:06', '2011-07-16 14:14:06'),
(14, 3, 'Gabriel', 'Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.', 0, '2011-07-16 14:14:06', '2011-07-16 14:14:06'),
(15, 4, 'Mile', 'Doesn\'t Bill Gates have something like that?', 0, '2011-06-02 16:54:12', '2011-06-02 16:54:12'),
(16, 5, 'Gary', 'Bill Who?', 0, '2011-04-25 13:34:18', '2011-04-25 13:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `name`, `image`, `updated_at`, `created_at`) VALUES
('m@g.com', '$2y$10$xbKhwpWcu6rerNvYwQivre/PcSuGltOMSvUPDau.HU9.u1ZZ/vpl2', 'Mario', '', '2021-02-12 09:32:41', '2021-02-12 09:32:41'),
('ruperto@gmail.com', '$2y$10$J7udgYXuKghHmslA40CIw.0hQTbjPNTaZGp5nAItLnzrDhqWfvzay', 'ruperto', '6025020fd2c6a4.png', '2021-02-11 10:08:15', '2021-02-11 10:08:15'),
('usuario@usuario', '$2y$10$K.f3jorjttx5MS3AZjz7ruimKBteGr6OYw/ilIeWn3jHaTv5KgBUm', 'usuario', '6023c06a4304d1.png', '2021-02-10 11:15:54', '2021-02-10 11:15:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
