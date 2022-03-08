-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 01 oct. 2021 à 08:46
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `anabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `NUM_ACTIVITE` int NOT NULL AUTO_INCREMENT,
  `NOM_ACTIVITE` char(32) DEFAULT NULL,
  `DATE_ACTIVITE` date DEFAULT NULL,
  `HEURE_ACTIVITE` time DEFAULT NULL,
  `PRIX_ACTIVITE` int DEFAULT NULL,
  PRIMARY KEY (`NUM_ACTIVITE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `congressiste`
--

DROP TABLE IF EXISTS `congressiste`;
CREATE TABLE IF NOT EXISTS `congressiste` (
  `NUM_CONGRESSISTE` int NOT NULL AUTO_INCREMENT,
  `NUM_ORGANISME` int DEFAULT NULL,
  `NUM_HOTEL` int DEFAULT NULL,
  `NOM_CONGRESSISTE` char(32) DEFAULT NULL,
  `PRENOM_CONGRESSISTE` char(32) DEFAULT NULL,
  `ADRESSE_CONGRESSISTE` char(50) DEFAULT NULL,
  `TEL_CONGRESSISTE` char(10) DEFAULT NULL,
  `DATE_INSCRIPTION` date DEFAULT NULL,
  `CODE_ACCOMPAGNATEUR` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`NUM_CONGRESSISTE`),
  KEY `I_FK_CONGRESSISTE_ORGANISME_PAYEUR` (`NUM_ORGANISME`),
  KEY `I_FK_CONGRESSISTE_HOTEL` (`NUM_HOTEL`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `congressiste`
--

INSERT INTO `congressiste` (`NUM_CONGRESSISTE`, `NUM_ORGANISME`, `NUM_HOTEL`, `NOM_CONGRESSISTE`, `PRENOM_CONGRESSISTE`, `ADRESSE_CONGRESSISTE`, `TEL_CONGRESSISTE`, `DATE_INSCRIPTION`, `CODE_ACCOMPAGNATEUR`) VALUES
(1, 1, 2, 'Bogusz', 'Thierry', 'Rue Bloc2 cool la vie', '0999999999', '2021-10-05', NULL),
(2, 2, 5, 'Bourgeois', 'Agnès', 'Rue php Futur Symphonie', '0123456789', '2021-10-19', NULL),
(3, 3, 4, 'Kebaili', 'Farid', 'Cool la vie', '0152634789', '2021-10-05', NULL),
(4, 5, 2, 'Techer', 'Charles', 'Le réseau c\'est cool', '0214563987', '2021-10-12', NULL),
(5, 4, 9, 'Pasqua', 'Lini', 'Rue retraite mdrr lol', '0145632987', '2021-10-26', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `NUM_FACTURE` int NOT NULL AUTO_INCREMENT,
  `NUM_CONGRESSISTE` int NOT NULL,
  `DATE_FACTURE` date DEFAULT NULL,
  `CODE_REGLEMENT` tinyint(1) DEFAULT NULL,
  `MONTANT_FACTURE` bigint DEFAULT NULL,
  PRIMARY KEY (`NUM_FACTURE`),
  UNIQUE KEY `I_FK_FACTURE_CONGRESSISTE` (`NUM_CONGRESSISTE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `NUM_HOTEL` int NOT NULL AUTO_INCREMENT,
  `NOM_HOTEL` char(32) DEFAULT NULL,
  `ADRESSE_HOTEL` char(50) DEFAULT NULL,
  `NOMBRE_ETOILES` smallint DEFAULT NULL,
  `PRIX_PARTICIPANT` int DEFAULT NULL,
  `PRIX_SUPPL` int DEFAULT NULL,
  PRIMARY KEY (`NUM_HOTEL`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`NUM_HOTEL`, `NOM_HOTEL`, `ADRESSE_HOTEL`, `NOMBRE_ETOILES`, `PRIX_PARTICIPANT`, `PRIX_SUPPL`) VALUES
(2, 'Ibis', '3 rue Alphonse Leclerc', 2, 100, 20),
(4, 'Hotel transilvania', 'adresse transivania', 1, 200, 50),
(5, 'Cinq', 'Cinq rue 55 avenue 55', 5, 555, 5),
(6, 'Carabean', 'Caranbean adresse', 3, 150, 30),
(7, 'Mercury', 'Mercury adresse', 5, 510, 300),
(8, 'Hotel t\'es beau', 'Hotel t\'es beau adresse', 3, 360, 51),
(9, 'Harry Potter', 'Avenue 9 3/4', 3, 666, 0);

-- --------------------------------------------------------

--
-- Structure de la table `organisme_payeur`
--

DROP TABLE IF EXISTS `organisme_payeur`;
CREATE TABLE IF NOT EXISTS `organisme_payeur` (
  `NUM_ORGANISME` int NOT NULL AUTO_INCREMENT,
  `NOM_ORGANISME` char(32) DEFAULT NULL,
  `ADRESSE_ORGANISME` char(50) DEFAULT NULL,
  PRIMARY KEY (`NUM_ORGANISME`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `organisme_payeur`
--

INSERT INTO `organisme_payeur` (`NUM_ORGANISME`, `NOM_ORGANISME`, `ADRESSE_ORGANISME`) VALUES
(1, 'Organisme coucou', 'Avenue coucou trop bien'),
(2, 'Bonjour', 'Avenue de la bonjourness'),
(3, 'tu', 'Rue conjugaison 2e personne'),
(4, 'vas', 'Avenue verbe aller'),
(5, 'bien', 'Rue bien c\'est bien');

-- --------------------------------------------------------

--
-- Structure de la table `participation_session`
--

DROP TABLE IF EXISTS `participation_session`;
CREATE TABLE IF NOT EXISTS `participation_session` (
  `NUM_CONGRESSISTE` int NOT NULL,
  `NUM_SESSION` int NOT NULL,
  PRIMARY KEY (`NUM_CONGRESSISTE`,`NUM_SESSION`),
  KEY `I_FK_PARTICIPATION_SESSION_CONGRESSISTE` (`NUM_CONGRESSISTE`),
  KEY `I_FK_PARTICIPATION_SESSION_SESSION` (`NUM_SESSION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rel_1`
--

DROP TABLE IF EXISTS `rel_1`;
CREATE TABLE IF NOT EXISTS `rel_1` (
  `NUM_CONGRESSISTE` int NOT NULL,
  `NUM_ACTIVITE` int NOT NULL,
  PRIMARY KEY (`NUM_CONGRESSISTE`,`NUM_ACTIVITE`),
  KEY `I_FK_REL_1_CONGRESSISTE` (`NUM_CONGRESSISTE`),
  KEY `I_FK_REL_1_ACTIVITE` (`NUM_ACTIVITE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `NUM_SESSION` int NOT NULL AUTO_INCREMENT,
  `DATE_SESSION` date DEFAULT NULL,
  `HEURE_SESSION` time DEFAULT NULL,
  `PRIX_SESSION` int DEFAULT NULL,
  `NOM_SESSION` char(32) DEFAULT NULL,
  PRIMARY KEY (`NUM_SESSION`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
