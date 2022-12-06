-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 20 juin 2022 à 16:58
-- Version du serveur :  5.7.36
-- Version de PHP : 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfepfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `id_absence` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `semestre` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  PRIMARY KEY (`id_absence`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id_absence`, `date`, `semestre`, `id_etudiant`, `id_matiere`) VALUES
(1, '2022-06-23', 1, 1, 4),
(2, '2022-06-23', 1, 4, 2),
(3, '2022-06-23', 1, 5, 4),
(4, '2022-06-23', 1, 7, 2),
(5, '2022-06-03', 2, 1, 3),
(6, '2022-06-03', 2, 1, 5),
(7, '2022-06-03', 2, 14, 3);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `photoA` text,
  `email` varchar(50) NOT NULL,
  `password` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `prenom`, `nom`, `photoA`, `email`, `password`) VALUES
(1, 'Haytam', 'hakkache', 'IMG-62ab814dba8133.82887074.jpeg', 'haytamhakkach8@gmail.com', '$2y$10$M5dIMw7OBfydk6gAVsv8s.p7gjf/9IR.921JO2n.h/k0QTW8X.H1q'),
(2, 'Seddiki', 'Yassine', 'k.jpg', 'yassine.seddiki@gmail.com', '$2y$10$CqfnTAk1ziIu/XsVt7Wg4OvmP.bgxxH5wVX6wnkAPzE2Y8/o/jibu');

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_classe` varchar(100) CHARACTER SET utf8 NOT NULL,
  `annee_scolaire` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idf` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`id_classe`, `nom_classe`, `annee_scolaire`, `idf`) VALUES
(1, 'MCW', '2022', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(5000) NOT NULL,
  `desription` varchar(5000) NOT NULL,
  `designation` text NOT NULL,
  `datecours` date NOT NULL,
  `id_classe` int(11) NOT NULL,
  PRIMARY KEY (`id_cours`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `titre`, `desription`, `designation`, `datecours`, `id_classe`) VALUES
(4, 'Devloppement limiter', 'les dÃ©veloppements limitÃ©s permettent de trouver plus simplement des limites de fonctions.', 'CR-62aba36ce3d7c4.20490092.pdf ', '2022-04-16', 1),
(5, 'Les interfaces JAVA', 'Une interface dÃ©crit un ensemble de mÃ©thodes en fournissant uniquement leur signature.', 'CR-62aba3d1964af6.85635172.pdf ', '2022-05-12', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(5000) NOT NULL,
  `prenom` varchar(5000) NOT NULL,
  `login` varchar(5000) NOT NULL,
  `photoE` text,
  `password` varchar(5000) NOT NULL,
  `mailS` text,
  `id_classe` int(11) NOT NULL,
  `idf` int(11) NOT NULL,
  PRIMARY KEY (`id_etudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom`, `prenom`, `login`, `photoE`, `password`, `mailS`, `id_classe`, `idf`) VALUES
(1, 'SEDDIKI', 'yassine', 'L386441040@horizons.acm', 'IMG-62ab99e4cfa135.70904963.png', 'GZ7869XY8875', NULL, 1, 1),
(12, 'EL FELLAKI', 'ilyass', 'Y359909057@horizons.acm', 'k.jpg', 'JR7470TA7477', NULL, 1, 1),
(14, 'AMAR', 'oumaima', 'A251556396@horizons.acm', 'k.jpg', 'GS7490IR8379', NULL, 1, 1),
(15, 'EL HAJAMI ', 'jawad', 'E355432128@horizons.acm', 'k.jpg', 'MB6675TZ8273', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `idf` int(11) NOT NULL AUTO_INCREMENT,
  `nom_filiere` varchar(30) NOT NULL,
  `nombre_matiere` int(11) NOT NULL,
  PRIMARY KEY (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`idf`, `nom_filiere`, `nombre_matiere`) VALUES
(1, '2MCW', 7);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `nom_matiere` varchar(50) CHARACTER SET utf8 NOT NULL,
  `confession` int(11) NOT NULL,
  `idf` int(10) NOT NULL,
  PRIMARY KEY (`id_matiere`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_matiere`, `nom_matiere`, `confession`, `idf`) VALUES
(1, 'Etude de cas', 60, 1),
(2, 'Math', 10, 1),
(3, 'ICM', 35, 1),
(4, 'Langue franÃ§ais', 10, 1),
(5, 'Langue arabe', 10, 1),
(6, 'Langue anglais', 10, 1),
(7, 'TEC', 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id_note`, `valeur`, `semestre`, `id_etudiant`, `id_matiere`) VALUES
(1, 16, 1, 1, 1),
(2, 14, 1, 1, 2),
(3, 16, 1, 1, 3),
(4, 15, 1, 1, 4),
(5, 16, 1, 1, 5),
(6, 19, 1, 1, 6),
(7, 12, 1, 1, 7),
(8, 13, 1, 12, 1),
(9, 18, 1, 14, 1),
(10, 12, 1, 15, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
