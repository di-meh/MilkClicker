-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 24 avr. 2019 à 03:57
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeu`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `dateMessage` datetime NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `id_partie` int(11) NOT NULL,
  `score` float NOT NULL,
  `clef` text NOT NULL,
  PRIMARY KEY (`id_partie`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`id_partie`, `score`, `clef`) VALUES
(10, 0, '0k1b5a2b15a3b100a4b1000a'),
(9, 0, '66.34k0b30.74a0b53.73a0b100a0b1000ak1b13a2b1ak');

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

DROP TABLE IF EXISTS `suivre`;
CREATE TABLE IF NOT EXISTS `suivre` (
  `id_suivi` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateurSuiveur` int(11) NOT NULL,
  `id_utilisateurSuivi` int(11) NOT NULL,
  PRIMARY KEY (`id_suivi`),
  KEY `id_utilisateurSuiveur` (`id_utilisateurSuiveur`),
  KEY `id_utilisateurSuivi` (`id_utilisateurSuivi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(64) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `estAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `mdp`, `email`, `estAdmin`) VALUES
(3, 'Tagueule', 'tagueule', 'cpatoiquidcid', 1),
(9, 'root', '$2y$10$.gqTaKdb3EKMa7S5mwCNJunKP/EBMrW1wZ7S6oRBZHUJUAKamBgZ6', 'aaaa@mmmm.com', 0),
(10, 'admin', '$2y$10$YZ9ezptrvliNA9aKvvfVQ.cJKN/ooVbu5pwprJ8fDypN4qm0Aw2CG', 'bbbb@mmmm.com', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
