-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2020 at 07:15 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_user_id` int(11) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_body` text NOT NULL,
  `project_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `project_end_date` varchar(255) NOT NULL,
  `project_status` varchar(255) NOT NULL DEFAULT 'uncomplete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_user_id`, `project_title`, `project_body`, `project_date`, `project_end_date`, `project_status`) VALUES
(3, 6, 'First project', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur exercitationem officia, voluptatem officiis fugit sed, nihil obcaecati aliquid tempora doloribus. Facere eligendi suscipit quia, deleniti aut dolore eum voluptate maxime?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur exercitationem officia, voluptatem officiis fugit sed, nihil obcaecati aliquid tempora doloribus. Facere eligendi suscipit quia, deleniti aut dolore eum voluptate maxime?', '2020-08-29 17:02:59', '2020-09-03', 'uncomplete'),
(4, 6, 'second project', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur exercitationem officia, voluptatem officiis fugit sed, nihil obcaecati aliquid tempora doloribus. Facere eligendi suscipit quia, deleniti aut dolore eum voluptate maxime?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur exercitationem officia, voluptatem officiis fugit sed, nihil obcaecati aliquid tempora doloribus. Facere eligendi suscipit quia, deleniti aut dolore eum voluptate maxime?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur exercitationem officia, voluptatem officiis fugit sed, nihil obcaecati aliquid tempora doloribus. Facere eligendi suscipit quia, deleniti aut dolore eum voluptate maxime?', '2020-08-29 17:03:13', '2020-09-05', 'uncomplete');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_project_id` int(11) NOT NULL,
  `task_title` varchar(255) NOT NULL,
  `task_body` text NOT NULL,
  `task_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `task_end_date` varchar(255) NOT NULL,
  `task_status` varchar(255) NOT NULL DEFAULT 'uncomplete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_project_id`, `task_title`, `task_body`, `task_date`, `task_end_date`, `task_status`) VALUES
(7, 3, 'task2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur exercitationem officia, voluptatem officiis fugit sed, nihil obcaecati aliquid tempora doloribus. Facere eligendi suscipit quia, deleniti aut dolore eum voluptate maxime?', '2020-08-29 17:03:59', '2020-09-02', 'uncomplete');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`) VALUES
(3, 'hamza', 'ham', 'Hamza', 'Zia', 'hamza@gmail.com', 'beautiful_scenery_05_hd_pictures_166316.jpg'),
(4, 'fahad', 'fah', 'Fahad', 'Nouman', 'fahad@gmail.com', 'car.jpg'),
(5, 'root', 'root', 'Root', 'Root', 'niaz@gmail.com', 'car.jpg'),
(6, 'niaz', 'niaz123', 'Niaz', 'Muhammad', 'niazmnd1996@gmail.com', 'niaz.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
