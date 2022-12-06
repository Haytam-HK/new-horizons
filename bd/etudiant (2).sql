-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 13 juin 2022 à 13:54
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
-- Base de données : `pfe`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom`, `prenom`, `login`, `photoE`, `password`, `mailS`, `id_classe`, `idf`) VALUES
(1, 'SEDDIKI', 'yassine', 'L386441040@horizons.acm', 'k.jpg', 'GZ7869XY8875', NULL, 1, 1),
(2, 'HAKKACHE', 'haytam', 'Q398690795@horizons.acm', 'k.jpg', 'NA6588PM6987', NULL, 1, 1),
(3, 'EL HAJJAMI', 'jawad', 'C755032348@horizons.acm', 'k.jpg', 'SY7172QI9066', NULL, 1, 1),
(4, 'EL JANYANI', 'imane', 'Q776950073@horizons.acm', 'k.jpg', 'QO8476ZU7968', NULL, 1, 1),
(5, 'CHERRAT ', 'yahia', 'L207803344@horizons.acm', 'k.jpg', 'FA8680HV7782', NULL, 1, 1),
(6, 'MONTASSER', 'zaid', 'W787826538@horizons.acm', 'k.jpg', 'GH7979MY7576', NULL, 1, 1),
(7, 'BEN DAOUD', 'douha', 'A629129028@horizons.acm', 'k.jpg', 'BC7083PU8771', NULL, 1, 1),
(8, 'LGARTIT ', 'doha', 'P290695190@horizons.acm', 'k.jpg', 'JS7080OB8981', NULL, 1, 1),
(9, 'AMMAR', 'oumayma', 'T753384399@horizons.acm', 'k.jpg', 'YO8683UC6777', NULL, 1, 1),
(10, 'THAYBEL', 'imad', 'O494931030@horizons.acm', 'k.jpg', 'KZ8873DS8765', NULL, 1, 1),
(11, 'ZERYOUHI', 'chaimae', 'C664944458@horizons.acm', 'k.jpg', 'AE8170NA8175', NULL, 1, 1),
(12, 'EL FELLAKI', 'ilyass', 'Y359909057@horizons.acm', 'k.jpg', 'JR7470TA7477', NULL, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
