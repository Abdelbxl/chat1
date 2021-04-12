-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : sql25:3306
-- Généré le : mar. 23 mars 2021 à 13:04
-- Version du serveur :  10.3.25-MariaDB-1:10.3.25+maria~stretch-log
-- Version de PHP : 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `msb77833`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_messenger_user`
--

CREATE TABLE `t_messenger_user` (
  `id` int(11) NOT NULL,
  `login` varchar(16) NOT NULL,
  `color` varchar(16) NOT NULL,
  `is_logged` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_messenger_user`
--

INSERT INTO `t_messenger_user` (`id`, `login`, `color`, `is_logged`) VALUES
(1, 'admin', 'red', 1),
(2, 'guest', 'blue', 0),
(3, 'custom', 'grey', 0),
(4, 'anonymous', 'brown', 1),
(5, 'hacker', 'pink', 0),
(6, 'bluestar', 'Khaki', 1),
(7, 'redhat', 'LightCoral', 1),
(8, 'LastChance', 'MediumTurquoise', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_messenger_user`
--
ALTER TABLE `t_messenger_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `color` (`color`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_messenger_user`
--
ALTER TABLE `t_messenger_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
