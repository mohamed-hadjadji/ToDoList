-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 mai 2020 à 17:52
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tdl`
--
CREATE DATABASE IF NOT EXISTS `tdl` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tdl`;

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

DROP TABLE IF EXISTS `taches`;
CREATE TABLE IF NOT EXISTS `taches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `etat` varchar(255) NOT NULL,
  `date_fin` date DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`id`, `nom`, `date_creation`, `etat`, `date_fin`, `id_utilisateur`) VALUES
(125, 'tache3', '2020-05-18', 'en-cours', NULL, 1),
(93, 'tache2', '2020-05-17', 'accomplie', '2020-05-18', 2),
(95, 'tache1', '2020-05-17', 'en-cours', NULL, 2),
(96, 'tache3', '2020-05-17', 'accomplie', '2020-05-18', 2),
(123, 'tache1', '2020-05-18', 'en-cours', NULL, 1),
(124, 'tache2', '2020-05-18', 'en-cours', NULL, 1),
(122, 'tache', '2020-05-18', 'accomplie', '2020-05-18', 2),
(128, 'tache 4', '2020-05-18', 'accomplie', '2020-05-18', 1),
(129, 'tache 5', '2020-05-18', 'accomplie', '2020-05-18', 1),
(130, 'Rambo', '2020-05-18', 'accomplie', '2020-05-18', 3),
(135, 'HADJA', '2020-05-18', 'en-cours', NULL, 3),
(133, 'OK', '2020-05-18', 'accomplie', '2020-05-18', 3),
(136, 'OK', '2020-05-18', 'en-cours', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$12$vZCSX3GQCKtX00mrRFWDxe2dYacK5.MZk27Tx0ltM.J.n1EiIPFiq'),
(2, 'kiki', '$2y$12$mRx0rUJDAoDXz/xUWNgpOejOt2HNNCRwcEItqnmr9TLIPjUulS4Pu'),
(3, 'momo', '$2y$12$WRO0K763sONt9wGdtyOt3.RF4xiiDj0AL0dS7IghF/WKvmWLL5fHu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
