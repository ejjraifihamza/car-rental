-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 28 mai 2021 à 15:52
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `car_rental`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'walid23', 'walid@walid.com', 'walid1234'),
(2, 'najat23', 'najat@najat.com', 'najat1234'),
(3, 'brahim01', 'brahim@brahim.com', '$2y$10$HmBVplmiZZd3TNLZ8FL/m.ih.L4JDkwUy9BYlUpEIFL1AiM5s5Dfq'),
(4, 'hamza01', 'hamza1@hamza1.com', '$2y$10$cBbphHTmQAmLR/FK/XRWU.JIhulxDxKh3Ld7G.Hj0L8itlPNZ7Zei'),
(5, 'yassin01', 'yassin@yassin.com', '$2y$10$flSXHPBT0bkGgBAA2e9eO.wBzQHdU2UAlIoa0xYIqQMwTaHxrQaEy'),
(6, 'test02', 'test02@test.com', '$2y$10$AHJwFRUkJZyrsWA2zbAxmuCEmgHwlQvXtbNSU4ENdcYxDMJAP24vW'),
(7, 'test04', 'test04@test.com', '$2y$10$JMADs9KDwLuwaMcfNvyou.q.OABE224oWYsOjJvAZHQgh0ZpsZmvW'),
(8, 'test07', 'test07@test.com', '$2y$10$jrfCnZ/WqHdL9rvPu4yKSOGlNVEKZxp3Xmby.Uu5srRpMoVDrWWv2'),
(9, 'test11', 'test11@test.com', '$2y$10$NQZ.UOdlvOBBhAOgc3P1GedhuMPqWKtKGi5RUIWxjo/53CTnMOuyS');

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `title`, `price`, `image_name`, `active`) VALUES
(1, 'mercedes', '400DH', 'car_555.jpg', 'Yes'),
(2, 'renault', '300DH', 'car_587.jpg', 'Yes'),
(5, 'volvo', '350DH', 'car_276.jpg', 'Yes'),
(6, 'peugeot', '320DH', 'car_544.jpg', 'Yes'),
(7, 'dacia', '200DH', 'car_375.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Structure de la table `reserv`
--

CREATE TABLE `reserv` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `begin` date NOT NULL,
  `finish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reserv`
--

INSERT INTO `reserv` (`id`, `user_email`, `car_name`, `begin`, `finish`) VALUES
(1, 'test@test.com', 'dacia', '2021-05-27', '2021-05-28');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'hamza23', 'ejjraifihamza@gmail.com', '$2y$10$cIDDGF5DX6Q3X6dabUWMOuX7.BaOz8aAJCEk9u5xgwIB9SpCp/5Ay'),
(2, 'walid23', 'hamza-_masta@outlook.com', '$2y$10$8BBxiiBlKnxubdZS6q1IxOEXBQjQvqRLBlU4ijeBg6aoXsRSFnO5O'),
(3, 'mousaab23', 'malekounet@gmail.com', '$2y$10$DlRvJnl3u5xRjGaT3TL2.uf0YjBDbYcW7jBC9LksAIyQWPKm.dl0C'),
(4, 'hamza01', 'hamza@hamza.com', '$2y$10$WBZncM/N3SaU1zIXyXbjQ.4cSIGtVtlBrOCOnKFcdvi4bmCWypyVq'),
(5, 'najat23', 'najat@najat.com', '$2y$10$/2q2e0FxvLUfGqp1SxlbD.n99Gy1Pxy7k3Vivul4C39C0crHpvqsa'),
(6, 'test01', 'test@test.com', '$2y$10$KP2WTD6jbPLsMX9VBe0EEez2Vr9Uf/NGW1BMqLE7TVSPoq12CwHfm'),
(7, 'test11', 'test@test.com', '$2y$10$KgXhLaxBQhK8W3J5PNWrLuMR3hD4OkzRPDb6SlZOzvy3QaXFlYl8q'),
(8, 'test13', 'test@test.com', '$2y$10$.RIUZzlgX5x2pxHF25C2W.aPPnBhG07JkO1HMNZ5m3tK1plRyuTie'),
(9, 'test12', 'test1@test.com', '$2y$10$HW.5p1EME3XCfI1goTnxreziXGHvJ0RQKQsMJ.ETCgvDJUU1T1xji'),
(10, 'test14', 'test2@test.com', '$2y$10$QNpReXeyog/TJVvMDwVBBuZiUShM6/P25JdQaNNiDD2ak/Sx5Gf0u'),
(11, 'test04', 'test4@test.com', '$2y$10$rrbOZ352KWoZ6DvDZMOMg.libcL/krIFDMXDoQz5I3.x4YqpUC8/e'),
(12, 'test15', 'test@test.com', '$2y$10$Oyy3UYPQFaNObtwtbX0rG.ljkFHmYx7n7AcIg1s9oDj/KWR4fc8FW');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reserv`
--
ALTER TABLE `reserv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reserv`
--
ALTER TABLE `reserv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
