-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 09 Juillet 2017 à 15:05
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `graviou`
--

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE IF NOT EXISTS `horaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begin` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `horaire`
--

INSERT INTO `horaire` (`id`, `begin`, `end`) VALUES
(1, '9h', '10h'),
(2, '10h', '11h'),
(3, '11h', '12h'),
(4, '12h', '13h'),
(5, '13h', '14h'),
(6, '14h', '15h'),
(7, '15h', '16h'),
(8, '16h', '17h'),
(9, '17h', '18h'),
(10, '18h', '19h'),
(11, '20h', '21h'),
(12, '21h', '22h');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id_photo` int(4) NOT NULL AUTO_INCREMENT,
  `image` blob NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_terrain` int(11) NOT NULL,
  `id_first_player` int(11) NOT NULL,
  `id_second_player` int(11) DEFAULT NULL,
  `id_third_player` int(11) DEFAULT NULL,
  `id_fourth_player` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `id_horaire` int(11) NOT NULL,
  `open` tinyint(1) NOT NULL,
  `TypeResa` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_terrain` (`id_terrain`,`id_first_player`,`id_second_player`),
  KEY `id_terrain_2` (`id_terrain`),
  KEY `id_first_player` (`id_first_player`),
  KEY `id_second_player` (`id_second_player`),
  KEY `id_first_player_2` (`id_first_player`),
  KEY `id_second_player_2` (`id_second_player`),
  KEY `id_third_player` (`id_third_player`),
  KEY `id_fourth_player` (`id_fourth_player`),
  KEY `id_second_player_3` (`id_second_player`),
  KEY `idResa` (`TypeResa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_terrain`, `id_first_player`, `id_second_player`, `id_third_player`, `id_fourth_player`, `date`, `id_horaire`, `open`, `TypeResa`) VALUES
(1, 1, 9, -1, -1, -1, '2015-08-10', 1, 0, 0),
(2, 1, 9, -1, -1, -1, '2015-08-10', 2, 1, 0),
(3, 2, 9, -1, -1, -1, '2016-05-20', 11, 1, 0),
(4, 1, 9, -1, -1, -1, '2016-06-23', 1, 0, 1),
(5, 1, 9, -1, -1, -1, '2016-06-23', 2, 0, 2),
(6, 1, 9, -1, -1, -1, '2016-06-23', 5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
--

CREATE TABLE IF NOT EXISTS `terrain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `terrain`
--

INSERT INTO `terrain` (`id`, `name`, `description`) VALUES
(1, 'court n°1', NULL),
(2, 'court n°2', NULL),
(6, 'rolland garros', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typeresa`
--

CREATE TABLE IF NOT EXISTS `typeresa` (
  `id` int(4) NOT NULL,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typeresa`
--

INSERT INTO `typeresa` (`id`, `libelle`) VALUES
(1, 'tournoi'),
(2, 'match amical');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `firstname`, `name`, `password`) VALUES
(-1, 'undefined', 'undefined', 'undefined', 'undefined'),
(3, 'admin@graviou.com', 'admin', 'admin', '$2y$10$qGud610OzGarMMM1fpkP0uVWTOt1IXnQzzyzm4ZyydbRpheOPKeT2'),
(4, 'fidalgo.antoine@gmail.com', 'Antoine', 'FIDALGO', '$2y$10$Dkfb1lepuooEz8AW9yaHMuH0UkVcb2SFlM2hgZ05mdALukItpa97q'),
(5, 'foo@foo.fr', 'foo', 'foo', '$2y$10$84iAWT1fLci/S6kpfEKNJOCj9UD.LhN/lRH0jxY2ARll6HKErhe7.'),
(6, 'test@test.fr', 'test', 'test', '$2y$10$9piLsVWy5l8pQq3fcqn0uuGv5c2y7vmnShd4C4mqKRffWUDttTCP6'),
(7, 'graviou@graviou.fr', 'graviou', 'graviou', '$2y$10$imJCC6MKf6ZTs0Ee8p2nVOSE/OK2uFOJe58Asvbhy8/IEsNNYIAjG'),
(8, 'yoyoyo@yoyoyo.fr', 'Pierre', 'Hernandez', '$2y$10$hyY/ZtmRiAhOYoF2vBPMDux8/y6jkyX3Q0fDzc94Al2FBLV.CGBma'),
(9, 'el_nino77940@hotmail.fr', 'PIERRE', 'HERNANDEZ', '$2y$10$oz0LmlJfWyMCK3xir0tvh.cLkR49MW5/9qbVIPL5oiP3hAH7KJDlS');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_terrain`) REFERENCES `terrain` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_first_player`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_second_player`) REFERENCES `utilisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
