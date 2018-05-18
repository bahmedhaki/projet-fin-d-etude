-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 18 mai 2018 à 01:55
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_school`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

DROP TABLE IF EXISTS `absences`;
CREATE TABLE IF NOT EXISTS `absences` (
  `id_etudiant` int(5) NOT NULL,
  `date_today` date NOT NULL,
  `heur_debut` time NOT NULL,
  `heur_fin` time NOT NULL,
  `presence` varchar(10) NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  `justifier` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `code_class` int(11) NOT NULL AUTO_INCREMENT,
  `nivea_scolaire` varchar(35) NOT NULL,
  `section` varchar(5) NOT NULL,
  `annee_scolaire` year(4) NOT NULL,
  PRIMARY KEY (`code_class`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`code_class`, `nivea_scolaire`, `section`, `annee_scolaire`) VALUES
(12, 'Premiere annee moyenne', '1', 2018);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `code_coure` int(11) NOT NULL AUTO_INCREMENT,
  `code_class` int(11) NOT NULL,
  `ceoffesion` int(11) NOT NULL,
  `module` varchar(20) NOT NULL,
  `type_matiere` varchar(30) NOT NULL,
  PRIMARY KEY (`code_coure`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`code_coure`, `code_class`, `ceoffesion`, `module`, `type_matiere`) VALUES
(24, 12, 1, 'gl', '1'),
(25, 12, 3, 'algo', '1'),
(26, 12, 3, 'bd', '1');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(25) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(25) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date_de_naissance` date NOT NULL,
  `code_class` int(11) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`code`, `nom`, `prenom`, `sex`, `telephone`, `address`, `photo`, `date_de_naissance`, `code_class`) VALUES
(35, 'bahmed', 'hakimi', 'Male', '+213663727699', 'algeria', 'img/etudiant/img_avatar2.png ', '1999-02-02', 12);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `code_note` int(11) NOT NULL AUTO_INCREMENT,
  `code_class` int(11) NOT NULL,
  `code_coure` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `devoir1` float NOT NULL,
  `devoir2` float NOT NULL,
  `examan` float NOT NULL,
  `control` float NOT NULL,
  `note` float NOT NULL,
  `resultat` float NOT NULL,
  `note_semester` varchar(6) NOT NULL,
  `note_annualle` varchar(6) NOT NULL,
  `code_etud` int(11) NOT NULL,
  PRIMARY KEY (`code_note`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`code_note`, `code_class`, `code_coure`, `semester`, `devoir1`, `devoir2`, `examan`, `control`, `note`, `resultat`, `note_semester`, `note_annualle`, `code_etud`) VALUES
(66, 12, 24, 'Premiere semester', 12, 13, 12, 15, 12.53, 12.53, ' 1.79', '', 34),
(68, 12, 24, 'troisieme semester', 14, 12, 12, 13, 12.4, 12.4, ' 3.56', '', 34),
(67, 12, 24, 'deuxieme semester', 13, 15, 13, 12, 13.13, 13.13, ' 1.88', '', 34);

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

DROP TABLE IF EXISTS `prof`;
CREATE TABLE IF NOT EXISTS `prof` (
  `code_prof` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  PRIMARY KEY (`code_prof`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prof`
--

INSERT INTO `prof` (`code_prof`, `nom`, `prenom`, `telephone`, `sex`, `address`, `photo`) VALUES
(5, 'bahmed', 'hakimi', '+213663727699', '', 'ghardaia', 'img/prof/img_avatar2.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 NOT NULL,
  `type_user` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user`, `password`, `type_user`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('prof', '81dc9bdb52d04dc20036dbd8313ed055', 'prof'),
('etudiant', '912e79cd13c64069d91da65d62fbb78c', 'etudiant');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
