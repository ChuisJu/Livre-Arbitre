-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 fév. 2021 à 16:15
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livrearbitre`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `mdpAdmin` varchar(50) NOT NULL,
  `utilisateurAdmin` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `idLivre` int(11) NOT NULL,
  `idPersonne` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idLivre`,`idPersonne`,`idRole`),
  KEY `Auteur_Personne0_FK` (`idPersonne`),
  KEY `Auteur_Roles1_FK` (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `idEditeur` int(11) NOT NULL AUTO_INCREMENT,
  `libelleEditeur` varchar(50) NOT NULL,
  `idLivre` int(11) NOT NULL,
  PRIMARY KEY (`idEditeur`),
  KEY `Editeur_Livre_FK` (`idLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

DROP TABLE IF EXISTS `formulaire`;
CREATE TABLE IF NOT EXISTS `formulaire` (
  `idForm` int(11) NOT NULL AUTO_INCREMENT,
  `prenomForm` varchar(50) NOT NULL,
  `nomForm` varchar(50) NOT NULL,
  `objet` varchar(90) NOT NULL,
  `mail` varchar(90) NOT NULL,
  `telephone` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  PRIMARY KEY (`idForm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `idGenre` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `idLivre` int(11) NOT NULL,
  PRIMARY KEY (`idGenre`),
  KEY `Genre_Livre_FK` (`idLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `idLangue` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) NOT NULL,
  `idLivre` int(11) NOT NULL,
  PRIMARY KEY (`idLangue`),
  KEY `Langue_Livre_FK` (`idLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `idLivre` int(11) NOT NULL,
  `isbn` int(11) NOT NULL,
  `titre` varchar(90) NOT NULL,
  `editeur` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `langue` int(11) DEFAULT NULL,
  `nbpages` int(11) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `commentaireLivre` varchar(255) NOT NULL,
  `likeLivre` int(11) NOT NULL,
  PRIMARY KEY (`idLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `mdp` varchar(50) NOT NULL,
  `utilisateur` varchar(50) NOT NULL,
  `numCarte` varchar(50) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD CONSTRAINT `Auteur_Livre_FK` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`),
  ADD CONSTRAINT `Auteur_Personne0_FK` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`),
  ADD CONSTRAINT `Auteur_Roles1_FK` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);

--
-- Contraintes pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD CONSTRAINT `Editeur_Livre_FK` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`);

--
-- Contraintes pour la table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `Genre_Livre_FK` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`);

--
-- Contraintes pour la table `langue`
--
ALTER TABLE `langue`
  ADD CONSTRAINT `Langue_Livre_FK` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
