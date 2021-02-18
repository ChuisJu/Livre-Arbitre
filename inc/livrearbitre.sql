-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 fév. 2021 à 10:56
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
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `isbn` varchar(50) NOT NULL,
  `idPersonne` int(255) NOT NULL,
  `idRole` int(255) NOT NULL,
  PRIMARY KEY (`isbn`,`idPersonne`,`idRole`),
  KEY `Auteur_Personne0_FK` (`idPersonne`),
  KEY `Auteur_Roles1_FK` (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`isbn`, `idPersonne`, `idRole`) VALUES
('9782226319494', 1, 1),
('9782290016169', 2, 1),
('9782290016169', 3, 3),
('9782266250566', 4, 1),
('9782266250566', 5, 3),
('9782266244510', 6, 1),
('9782226186072', 7, 1),
('9782226186072', 8, 3),
('9782266245302', 9, 1),
('9782266227018', 10, 1),
('9782266200127', 11, 1),
('9782266182690', 12, 1),
('9782266182690', 13, 3),
('9782290019436', 14, 1),
('9782290019436', 15, 3);

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

DROP TABLE IF EXISTS `date`;
CREATE TABLE IF NOT EXISTS `date` (
  `dateEmpreint` date NOT NULL,
  PRIMARY KEY (`dateEmpreint`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `idEditeur` int(11) NOT NULL AUTO_INCREMENT,
  `libelleEditeur` varchar(50) NOT NULL,
  PRIMARY KEY (`idEditeur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`idEditeur`, `libelleEditeur`) VALUES
(1, 'Hachette'),
(2, 'Larousse'),
(3, 'Magnard'),
(4, 'Hatier'),
(5, 'Albin Michel'),
(6, 'J\'ai Lu'),
(7, 'Pocket'),
(8, 'Pocket Jeunesse'),
(9, 'Nathan'),
(10, 'PKJ');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `isbn` varchar(50) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `dateEmpreint` date NOT NULL,
  PRIMARY KEY (`isbn`,`idUtilisateur`,`dateEmpreint`),
  KEY `Emprunt_Utilisateur0_FK` (`idUtilisateur`),
  KEY `Emprunt_Date1_FK` (`dateEmpreint`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

DROP TABLE IF EXISTS `formulaire`;
CREATE TABLE IF NOT EXISTS `formulaire` (
  `idForm` int(11) NOT NULL AUTO_INCREMENT,
  `prenomForm` varchar(20) NOT NULL,
  `nomForm` varchar(20) NOT NULL,
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
  PRIMARY KEY (`idGenre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`idGenre`, `libelle`) VALUES
(2, 'Théâtre'),
(3, 'Roman'),
(4, 'Nouvelle'),
(5, 'Essai'),
(6, 'Poésie');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `idLangue` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) NOT NULL,
  PRIMARY KEY (`idLangue`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`idLangue`, `language`) VALUES
(1, 'Anglais'),
(2, 'Français'),
(3, 'Japonais'),
(4, 'Espagnol'),
(5, 'Italien'),
(6, 'Allemand'),
(7, 'Suédois'),
(8, 'Portugais');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `isbn` varchar(50) NOT NULL,
  `titre` varchar(90) NOT NULL,
  `annee` int(11) NOT NULL,
  `nbpages` int(11) NOT NULL,
  `resume` text NOT NULL,
  `commentaireLivre` varchar(255) NOT NULL,
  `likeLivre` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL,
  `idEditeur` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  PRIMARY KEY (`isbn`),
  KEY `Livre_Langue_FK` (`idLangue`),
  KEY `Livre_Editeur0_FK` (`idEditeur`),
  KEY `Livre_Genre1_FK` (`idGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`isbn`, `titre`, `annee`, `nbpages`, `resume`, `commentaireLivre`, `likeLivre`, `idLangue`, `idEditeur`, `idGenre`) VALUES
('9782226186072', 'Percy Jackson: Tome 1 Le Voleur de Foudre\r\n', 2008, 424, 'Etre un demi-dieu, ça peut être mortel... Attaqué par sa prof de maths qui est en fait un monstre mythologique, injustement renvoyé de son collège et poursuivi par un minotaure enragé, Percy Jackson se retrouve en plus accusé d\'avoir dérobé l\'éclair de Zeus ! Pour rester en vie, s\'innocenter et découvrir l\'identité du dieu qui l\'a engendré, il devra accomplir sa quête au prix de mille dangers.', '', 0, 1, 5, 3),
('9782226319494', 'Un(e)Secte', 2019, 454, 'Et si tous les insectes du monde se mettaient soudainement à communiquer entre eux ? A s\'organiser ? Nous ne surviverons pas plus de queslques jours. Entre un crime spectaculaire et la disparition inexpliquée d\'une jeune femme, les chemins du detective Atticus Gore et de la privée Kat Kordell vont s\'entremêler. Et les confronter à une vérité effrayante. Des montagnes de Los Angeles aux bas-fonds de New York, un thriller implacable et documenté qui va vous démanger.', '', 0, 2, 5, 3),
('9782266182690', 'Hunger Games Tome 1', 2009, 400, 'Le vainqueur deviendra riche et célèbre. Les autres mourront... Dans un futur sombre, sur les ruines des États-Unis, un jeu télévisé est créé pour contrôler le peuple par la terreur. Douze garçons et douze filles tirés au sort participent à cette sinistre téléréalité, que tout le monde est forcé de regarder en direct. Une seule règle dans l\'arène: survivre, à tout prix.', '', 0, 1, 8, 3),
('9782266200127', 'Le Labyrinthe: Tome 1 L\'Epreuve', 2012, 416, 'Quand Thomas reprend connaissance, sa mémoire est vide, seul son nom lui est familier... Il se retrouve entouré d\'adolescents dans un lieu étrange, à l\'ombre de murs infranchissables. Quatre portes gigantesques, qui se referment le soir, ouvrent sur un labyrinthe peuplé de monstres d\'acier. Chaque nuit, le plan en est modifié. Thomas comprend qu\'une terrible épreuve les attend tous. Comment s\'échapper par le labyrinthe maudit sans risquer sa vie ? Si seulement il parvenait à exhumer les sombres secrets enfouis au plus profond de sa mémoire...', '', 0, 1, 10, 3),
('9782266227018', 'Le Cercle des 17 Tome 1', 2014, 480, 'Michael Vey possède des super pouvoirs. D\'un seul geste, il peut envoyer des décharges électriques de plusieurs milliers de volts. Pratique, quand on est harcelé par les caïds du lycée et atteint de tics embarrassants. Michael se croit seul...avant de découvrir que Taylor, ravissantes pom-pom girl, est elle aussi \"électrique\" . A peine commencent-ils à comprendre leur secret qu\'une mystérieuse organisation, convoitant les pouvoirs des deux adolescents, les prends en chasse...', '', 0, 1, 10, 3),
('9782266244510', 'Le Puits des Mémoires: 1 La Traque', 2012, 400, 'Trois hommes se réveillent dans les débris d\'un chariot accidenté en pleine montagne. Aucun d\'eux n\'a le moindre souvenir de son nom, de son passé, de la raison pour laquelle il se trouve là, en haillons, dans un pays inconnu. Sur leurs traces, une horde de guerriers, venus de l\'autre bout du monde, mettra le royaume à feu et à sang pour les retrouver. Fugitifs, mis à prix, impitoyablement traqués pour une raison mystérieuse, ils vont devoir survivre dans un monde où règnent la violence, les complots et la magie noire.', '', 0, 2, 7, 3),
('9782266245302', 'Instinct Tome 1', 2011, 400, 'Lorsque la Ford paternelle quitte la route inexplicablement, Tim a dix-sept ans. Il perd dans l\'accident ses parents et son frère Ben. Mais de cette effroyable nuit, le garçon ne garde qu\'un souvenir, troublant : quand il a repris conscience, il était un grizzly… Que s\'est-il passé ? Le choc a-t-il provoqué un accès de folie chez Tim ? Ce n’est pas l\'avis du Pr McIntyre. Selon lui, l’adolescent est effectivement devenu un ours, pendant plusieurs heures, tout comme des centaines d\'êtres humains se transforment chaque année en animal.', '', 0, 2, 9, 3),
('9782266250566', 'Au Service Surnaturel de sa Majesté', 2015, 665, 'Victime d\'une agression, Myfanwy Thomas reprend conscience dans un parc de Londres. Autour d\'elle, des hommes en costume portant des gants de latex. Tous sont morts. Situation peu réjouissante, certes, mais il y a pire : Myfanwy ne se souvient plus de rien. Le plus surprenant, c\'est qu\'elle semble avoir prévu cette amnésie. Elle a sur elle une lettre écrite de sa main lui expliquant qui elle est et ce qu\'elle doit faire pour découvrir qui veut l\'éliminer. C\'est ainsi que Myfawny rejoint le siège de l\'Échiquier, une organisation secrète chargée de combattre les forces surnaturelles qui menacent la Couronne.', '', 0, 1, 7, 3),
('9782290016169', 'Neverwhere', 1996, 380, 'Londres, un soir comme tant d\'autres. Richard Mayhew découvre une jeune fille gisant sur le trottoir, l\'épaule ensanglantée. Qui le supplie de ne pas l\'emmener à l\'hôpital... Et disparaît dès le lendemain. Pour Richard, tout dérape alors : sa fiancée le quitte, on ne le connaît plus au bureau, certains, même, ne le voient plus... Le monde à l\'envers, en quelque sorte. Car il semblerait que Londres ait un envers, la \"ville d\'En Bas\", cité souterraine où vit un peuple d\'une autre époque, invisible aux yeux du commun des mortels. Un peuple organisé, hiérarchisé, et à la tête duquel les rats jouent un rôle prépondérant. Plus rien ne le retenant \"là-haut\", Richard rejoint les profondeurs...', '', 0, 1, 6, 3),
('9782290019436', 'Game of Thrones Tome 1', 2010, 790, 'Le royaume des sept couronnes est sur le point de connaître son plus terrible hiver: par-delà le mur qui garde sa frontière nord, une armée de ténèbres se lève, menaçant de tout détruire sur son passage. Mais il en faut plus pour refroidir les ardeurs des rois, des reines, des chevaliers et des renégats qui se disputent le trône de fer, tous les coups sont permis, et seuls les plus forts, ou les plus retors s\'en sortiront indemnes...', '', 0, 1, 6, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `nom`, `prenom`) VALUES
(1, 'Chattam', 'Maxime'),
(2, 'Gaiman', 'Neil'),
(3, 'Marcel', 'Patrick'),
(4, 'O\'Malley', 'Daniel'),
(5, 'Bonnot', 'Charles'),
(6, 'Katz', 'Gabriel'),
(7, 'Riordan', 'Rick'),
(8, 'de Parcontal', 'Mona'),
(9, 'Villeminot', 'Vincent'),
(10, 'Paul Evans', 'Richard'),
(11, 'Dashner', 'James'),
(12, 'Collins', 'Suzanne'),
(13, 'Fournier', 'Guillaume'),
(14, 'R. R. Martin', 'George'),
(15, 'Sola', 'Jean');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idRole`, `role`) VALUES
(1, 'Ecrivain'),
(2, 'Illustrateur'),
(3, 'Traducteur'),
(4, 'Préface');

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
  `Admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD CONSTRAINT `Auteur_Livre_FK` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`),
  ADD CONSTRAINT `Auteur_Personne0_FK` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`),
  ADD CONSTRAINT `Auteur_Roles1_FK` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `Emprunt_Date1_FK` FOREIGN KEY (`dateEmpreint`) REFERENCES `date` (`dateEmpreint`),
  ADD CONSTRAINT `Emprunt_Livre_FK` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`),
  ADD CONSTRAINT `Emprunt_Utilisateur0_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `Livre_Editeur0_FK` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`),
  ADD CONSTRAINT `Livre_Genre1_FK` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`),
  ADD CONSTRAINT `Livre_Langue_FK` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`idLangue`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
