-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 nov. 2022 à 09:31
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qcmfac`
--
CREATE DATABASE IF NOT EXISTS `qcmfac` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `qcmfac`;

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `id_admin` int(2) NOT NULL AUTO_INCREMENT,
  `login_admin` varchar(50) NOT NULL,
  `psw_admin` varchar(60) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`id_admin`, `login_admin`, `psw_admin`) VALUES
(1, 'admin', '$2y$10$MT37HoqtTwQ04CzHg5lDf.STDbIMR4uD90ciOwDnLpHat1rqYns2u');

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id_answer` int(5) NOT NULL AUTO_INCREMENT,
  `answer_text` varchar(255) NOT NULL,
  `true_answer` tinyint(1) NOT NULL,
  `id_question` int(4) NOT NULL,
  PRIMARY KEY (`id_answer`),
  KEY `fk_question` (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`id_answer`, `answer_text`, `true_answer`, `id_question`) VALUES
(1, 'REPONSE TEST 1', 1, 1),
(2, 'REPONSE TEST 2', 0, 1),
(3, 'rÃ©ponse vraie 1', 1, 2),
(4, 'rÃ©ponse fausse 1', 0, 2),
(5, 'rÃ©ponse fausse 2', 0, 2),
(6, 'rÃ©ponse vraie 2', 1, 2),
(7, '42', 1, 3),
(8, 'C\'est pas faux', 0, 3),
(9, 'La rÃ©ponse D', 0, 3),
(10, 'bonne rÃ©ponse 1', 1, 4),
(11, 'bonne rÃ©ponse 2', 1, 4),
(12, 'pas bon', 0, 4),
(13, 'toujours pas bon', 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(3) NOT NULL AUTO_INCREMENT,
  `lib_cat` varchar(50) NOT NULL,
  `id_supercat` int(3) NOT NULL,
  PRIMARY KEY (`id_cat`),
  KEY `fk_supercat` (`id_supercat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `lib_cat`, `id_supercat`) VALUES
(1, 'CAT_DEFAULT', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cat_question`
--

DROP TABLE IF EXISTS `cat_question`;
CREATE TABLE IF NOT EXISTS `cat_question` (
  `id_question` int(4) NOT NULL,
  `id_cat` int(3) NOT NULL,
  PRIMARY KEY (`id_question`,`id_cat`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cat_question`
--

INSERT INTO `cat_question` (`id_question`, `id_cat`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `group_user`
--

DROP TABLE IF EXISTS `group_user`;
CREATE TABLE IF NOT EXISTS `group_user` (
  `id_group` int(5) NOT NULL AUTO_INCREMENT,
  `lib_group` varchar(50) NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=100000 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `group_user`
--

INSERT INTO `group_user` (`id_group`, `lib_group`) VALUES
(11111, 'Test version'),
(99999, 'administration');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(4) NOT NULL AUTO_INCREMENT,
  `statements` varchar(255) NOT NULL,
  `statements_bis` varchar(255) DEFAULT NULL,
  `difficult` int(1) DEFAULT NULL,
  `lesson_ref` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `statements`, `statements_bis`, `difficult`, `lesson_ref`) VALUES
(1, 'QUESTION TEST', NULL, 0, 'REF QUESTION TEST'),
(2, 'test enonce', '', NULL, NULL),
(3, 'Quel est le sens de la vie?', '', NULL, NULL),
(4, 'Ajouter une question Ã  4 rÃ©ponses', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `supercat`
--

DROP TABLE IF EXISTS `supercat`;
CREATE TABLE IF NOT EXISTS `supercat` (
  `id_supercat` int(3) NOT NULL AUTO_INCREMENT,
  `lib_supercat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_supercat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `supercat`
--

INSERT INTO `supercat` (`id_supercat`, `lib_supercat`) VALUES
(1, 'DEFAULT');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `mail_user` varchar(100) NOT NULL,
  `psw_user` varchar(60) NOT NULL,
  `id_group` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_group` (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `last_name`, `first_name`, `mail_user`, `psw_user`, `id_group`) VALUES
(14, 'DouÃ©', 'FranÃ§ois', 'doue.francois@outlook.com', '$2y$10$cbpczx4ZCeY/N5osNIoyG.eJhDwSDDVcBFA38H8xIm2H0uy.Oz0Qq', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_question` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`);

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `fk_supercat` FOREIGN KEY (`id_supercat`) REFERENCES `supercat` (`id_supercat`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `cat_question`
--
ALTER TABLE `cat_question`
  ADD CONSTRAINT `cat_question_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`),
  ADD CONSTRAINT `cat_question_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_group` FOREIGN KEY (`id_group`) REFERENCES `group_user` (`id_group`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
