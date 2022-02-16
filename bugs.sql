-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2022 at 12:00 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bugs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bug`
--

CREATE TABLE `bug` (
  `id` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` int NOT NULL,
  `priority_id` int NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bug`
--

INSERT INTO `bug` (`id`, `description`, `date`, `status_id`, `priority_id`, `user_id`) VALUES
(1, 'Prueba 1', '2022-02-04 09:15:19', 3, 1, 1),
(25, 'Prueba 2', '2022-02-14 11:32:36', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220128092513', '2022-01-28 10:25:43', 1934),
('DoctrineMigrations\\Version20220128092812', '2022-01-28 10:28:16', 8145),
('DoctrineMigrations\\Version20220128093008', '2022-01-28 10:30:16', 9802),
('DoctrineMigrations\\Version20220128093347', '2022-01-28 10:33:50', 12890),
('DoctrineMigrations\\Version20220202071353', '2022-02-02 08:14:09', 7546),
('DoctrineMigrations\\Version20220209093447', '2022-02-09 10:35:12', 6248),
('DoctrineMigrations\\Version20220211124547', '2022-02-11 13:46:37', 17045);

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `id` int NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `level`) VALUES
(1, 'Baja'),
(2, 'Media'),
(3, 'Alta');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Sin asignar'),
(2, 'En proceso'),
(3, 'En pruebas'),
(4, 'Acabados');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1, 'pruebaUser', '[]', '$2y$13$YvIuFkdBCOiu5ODa328DWuAUo/XB3U0V0V7jgLF0qpoZeFTPDpcs.'),
(2, 'holaUser', '[]', '$2y$13$VpkWwGPacVEQUQicbZq0E.FlWtHovoyKsHZBoKzohRlb1Q0oZOtOG'),
(3, 'adiosUser', '[]', '$2y$13$4yp28Sclblo23knrTqnNKuFm1xRJIdtk9kopSpUaacRiiN26b7jfu'),
(4, 'userHola', '[]', '$2y$13$NKvPzGIc5CiF.hhNsB3uZ.2yOTIT1/KnE.VQEN9M5rulelE9R8MVu'),
(5, 'aargon', '[]', '$2y$13$qDk5pxIenDxXnop/ewmPAuI74ijLNwMay5rvN7Gg6UtdUCIICXLQO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_358CBF146BF700BD` (`status_id`),
  ADD KEY `IDX_358CBF14497B19F9` (`priority_id`),
  ADD KEY `IDX_358CBF14A76ED395` (`user_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bug`
--
ALTER TABLE `bug`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bug`
--
ALTER TABLE `bug`
  ADD CONSTRAINT `FK_358CBF14497B19F9` FOREIGN KEY (`priority_id`) REFERENCES `priority` (`id`),
  ADD CONSTRAINT `FK_358CBF146BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_358CBF14A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
