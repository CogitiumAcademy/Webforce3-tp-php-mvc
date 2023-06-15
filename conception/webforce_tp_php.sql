-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 15 juin 2023 à 16:18
-- Version du serveur :  5.7.19-log
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `webforce_tp_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `contest`
--

DROP TABLE IF EXISTS `contest`;
CREATE TABLE IF NOT EXISTS `contest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_player` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contest_game_FK` (`id_game`),
  KEY `contest_player0_FK` (`id_player`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contest`
--

INSERT INTO `contest` (`id`, `start_date`, `id_game`, `id_player`) VALUES
(1, '2019-12-25', 23, 2),
(2, '2020-12-25', 25, NULL),
(3, '2023-06-17', 24, NULL),
(4, '2023-06-15', 25, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `min_players` int(11) NOT NULL,
  `max_players` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `title`, `min_players`, `max_players`) VALUES
(23, '7 Wonders', 2, 7),
(24, 'Ticket to Ride', 2, 5),
(25, 'Pandemic', 2, 4),
(26, 'Munchkin', 3, 6),
(27, 'Minecraft', 1, 10),
(28, 'Sims 5', 1, 5),
(29, 'Sims4', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `play`
--

DROP TABLE IF EXISTS `play`;
CREATE TABLE IF NOT EXISTS `play` (
  `id` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_player`),
  KEY `play_player0_FK` (`id_player`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `play`
--

INSERT INTO `play` (`id`, `id_player`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(3, 3),
(1, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `player_AK` (`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `email`, `nickname`) VALUES
(1, 'luke.skywalker@rogue.sw', 'Luke'),
(2, 'amidala.padme@naboo.gov', 'Padme'),
(3, 'han.solo@millenium-falcon.com', 'HanSolo'),
(4, 'chewbacca@wook.ie', 'Chewbie'),
(5, 'rey@jakku.planet', 'Rey');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contest`
--
ALTER TABLE `contest`
  ADD CONSTRAINT `contest_game_FK` FOREIGN KEY (`id_game`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `contest_player0_FK` FOREIGN KEY (`id_player`) REFERENCES `player` (`id`);

--
-- Contraintes pour la table `play`
--
ALTER TABLE `play`
  ADD CONSTRAINT `play_contest_FK` FOREIGN KEY (`id`) REFERENCES `contest` (`id`),
  ADD CONSTRAINT `play_player0_FK` FOREIGN KEY (`id_player`) REFERENCES `player` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
