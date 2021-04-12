-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : sql25:3306
-- Généré le : mar. 23 mars 2021 à 13:05
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
-- Structure de la table `t_messenger_message`
--

CREATE TABLE `t_messenger_message` (
  `id` int(11) NOT NULL COMMENT 'clé primaire',
  `sender` varchar(16) NOT NULL COMMENT 'expéditeur du message',
  `sent_date` datetime DEFAULT current_timestamp() COMMENT 'date et heure d''envoi du message',
  `body` varchar(1024) DEFAULT NULL COMMENT 'corps du message',
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_messenger_message`
--

INSERT INTO `t_messenger_message` (`id`, `sender`, `sent_date`, `body`, `is_active`) VALUES
(1, 'guest', '2021-03-14 11:59:12', 'MariaDB est un système de gestion de base de données édité sous licence GPL. Il s\'agit d\'un fork communautaire de MySQL : la gouvernance du projet est assurée par la fondation MariaDB17, et sa maintenance par la société Monty Program AB, créateur du projet18. Cette gouvernance confère au logiciel l’assurance de rester libre.', 0),
(2, 'admin', '2021-03-14 12:02:39', 'En 2009, à la suite du rachat de MySQL par Sun Microsystems et des annonces du rachat de Sun Microsystems par Oracle Corporation, Michael Widenius, fondateur de MySQL, quitte cette société19 pour lancer le projet MariaDB, dans une démarche visant à remplacer MySQL tout en assurant l’interopérabilité. Le nom vient de la 2e fille de Michael Widenius, Maria (la première s\'appelant My)20.', 0),
(3, 'guest', '2021-03-15 12:00:00', 'L’encyclopédie libre Wikipédia annonce, fin 2012, la migration de MySQL à MariaDB21. Les distributions GNU/Linux, comme Fedora, openSuse et Debian abandonnent elles aussi MySQL. En septembre 2013, Google annonce l\'adoption de MariaDB en lieu et place de MySQL. Dans la foulée un des ingénieurs de Google est affecté à la Fondation MariaDB22.', 0),
(4, 'admin', '2021-03-15 12:02:10', 'Un consortium baptisé Open Database Alliance a par ailleurs été créé pour assurer le développement du logiciel (comparable à la fondation Linux avec le noyau Linux). Runa Capital a investi dans l\'entreprise en 201523.', 0),
(5, 'guest', '2021-03-15 14:50:57', 'Société fondée par Michael \"Monty\" Widenius, à l’origine du projet MariaDB, elle en assure aujourd’hui la maintenance. Les développeurs de cette entreprise sont aussi les principaux contributeurs sur le modèle de la société Mozilla Corporation.', 0),
(7, 'guest', '2021-03-15 15:00:17', 'Elle a signé un accord de fusion avec la société SkySQL24, en avril 2013, dans le but de développer MariaDB dans une version « NewSQL », en regroupant le meilleur des mondes SQL et NoSQL25.\r\n\r\n', 0),
(8, 'guest', '2021-03-15 15:07:00', 'La fondation MariaDB est une organisation à but non lucratif qui assure la protection légale du projet, sur le modèle de gouvernance de la Free Software Foundation pour le projet GNU.\r\n\r\n', 0),
(9, 'admin', '2021-03-15 15:08:02', 'Les différentes versions de MariaDB s’articulent sur le code source de MySQL de la version 5.1 aux versions plus récentes (comme la 5.6 fin 2012).\r\n\r\n', 0),
(10, 'guest', '2021-03-15 15:31:40', 'Articles connexes\r\nMySQL\r\nPostgreSQL\r\nSQLite', 0),
(11, 'admin', '2021-03-15 15:32:11', 'Liens externes\r\nSite officiel [archive]\r\nNotice technique, répertoire du logiciel libre\r\n', 0),
(12, 'admin', '2021-03-22 13:01:53', 'Bonjour à tous.   Notre messagerie est maintenant accessible à tout le monde ! ', 0),
(14, 'guest', '2021-03-22 13:12:53', 'Bonne pause de midi !', 0),
(15, 'custom', '2021-03-22 13:13:36', 'On reprend vers 14h15.   ', 0),
(16, 'custom', '2021-03-22 13:14:01', 'Envoyez des messages sur ce site.', 0),
(17, 'custom', '2021-03-22 13:14:22', 'Le lien est sur Discord.', 0),
(18, 'custom', '2021-03-22 13:15:16', 'Trois login possibles : admin, guest, custom.', 0),
(19, 'admin', '2021-03-22 13:27:09', 'bonne pause (nabel)\r\n', 0),
(21, 'custom', '2021-03-22 14:26:09', 'Bonjour tt le monde je suis Abdel de Bruxelles.', 1),
(22, 'guest', '2021-03-22 15:32:18', 'hello\r\n', 1),
(23, 'guest', '2021-03-22 15:36:34', 'hello\r\n', 1),
(43, 'guest', '2021-03-23 12:23:11', 'message récent', 1),
(44, 'redhat', '2021-03-23 12:24:00', 'chat chat ', 1),
(45, 'redhat', '2021-03-23 12:35:52', 'bj j suis abdel', 1),
(46, 'bluestar', '2021-03-23 12:37:14', 'j suis abdel', 1),
(47, 'anonymous', '2021-03-23 12:38:24', 'hello\r\n', 1),
(48, 'anonymous', '2021-03-23 12:40:19', 'Bonjour', 1),
(49, 'admin', '2021-03-23 12:45:54', 'Bonjour les amis !', 1),
(50, 'redhat', '2021-03-23 12:46:48', 'abdel', 1),
(51, 'bluestar', '2021-03-23 12:46:50', 'Salut (nabel)', 1),
(52, 'admin', '2021-03-23 12:47:22', 'Salut Nabel !', 1),
(53, 'anonymous', '2021-03-23 12:48:03', 'salut tout le monde\r\n', 1),
(54, 'admin', '2021-03-23 12:57:23', 'au revoir ', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_messenger_message`
--
ALTER TABLE `t_messenger_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_messenger_message`
--
ALTER TABLE `t_messenger_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire', AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
