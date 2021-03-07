-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 07, 2021 at 08:02 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livrearbitre`
--

-- --------------------------------------------------------

--
-- Table structure for table `aime`
--

CREATE TABLE `aime` (
  `ISBN` varchar(50) NOT NULL,
  `Aime` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE `auteur` (
  `isbn` varchar(50) NOT NULL,
  `idPersonne` int(255) NOT NULL,
  `idRole` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auteur`
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
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `dateEmpreint` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`dateEmpreint`) VALUES
('2021-02-15'),
('2021-03-07'),
('2021-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `editeur`
--

CREATE TABLE `editeur` (
  `idEditeur` int(11) NOT NULL,
  `libelleEditeur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `editeur`
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
(10, 'PKJ'),
(11, 'Gallimard');

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

CREATE TABLE `emprunt` (
  `isbn` varchar(50) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `dateEmpreint` date NOT NULL,
  `dateRendu` date DEFAULT NULL,
  `Prolongation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `formulaire`
--

CREATE TABLE `formulaire` (
  `idForm` int(255) NOT NULL,
  `prenomForm` varchar(20) NOT NULL,
  `nomForm` varchar(20) NOT NULL,
  `objet` varchar(90) NOT NULL,
  `mail` varchar(90) NOT NULL,
  `telephone` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `idGenre` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`idGenre`, `libelle`) VALUES
(1, 'Biographie'),
(2, 'Théâtre'),
(3, 'Roman'),
(4, 'Nouvelle'),
(5, 'Essai'),
(6, 'Poésie');

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `idLangue` int(11) NOT NULL,
  `language` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `langue`
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
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `isbn` varchar(50) NOT NULL,
  `titre` varchar(90) NOT NULL,
  `annee` int(11) NOT NULL,
  `nbpages` int(11) NOT NULL,
  `resume` text NOT NULL,
  `commentaireLivre` varchar(255) DEFAULT NULL,
  `idLangue` int(11) NOT NULL,
  `idEditeur` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`isbn`, `titre`, `annee`, `nbpages`, `resume`, `commentaireLivre`, `idLangue`, `idEditeur`, `idGenre`) VALUES
('9782070662159', 'EndGame : L\'appel', 2014, 545, 'ENDGAME EST UNE RÉALITÉ. ENDGAME A COMMENCÉ.Douze jeunes élus, issus de peuples anciens. L\'humanité tout entière descend de leurs lignées, choisies il y a des milliers d\'années.Ils sont héritiers de la Terre.Pour la sauver, ils doivent se battre, résoudre la Grande Énigme.L\'un d\'eux doit y parvenir, ou bien nous sommes tous perdus. Ils ne possèdent pas de pouvoirs magiques. Ils ne sont pas immortels. Traîtrise, courage, amitié, chacun suivra son propre chemin, selon sa personnalité, ses intuitions et ses traditions.Il n\'y aura qu\'un seul vainqueur.', NULL, 1, 11, 3),
('9782226186072', 'Percy Jackson: Tome 1 Le Voleur de Foudre\r\n', 2008, 424, 'Etre un demi-dieu, ça peut être mortel... Attaqué par sa prof de maths qui est en fait un monstre mythologique, injustement renvoyé de son collège et poursuivi par un minotaure enragé, Percy Jackson se retrouve en plus accusé d\'avoir dérobé l\'éclair de Zeus ! Pour rester en vie, s\'innocenter et découvrir l\'identité du dieu qui l\'a engendré, il devra accomplir sa quête au prix de mille dangers.', '', 1, 5, 3),
('9782226319494', 'Un(e)Secte', 2019, 454, 'Et si tous les insectes du monde se mettaient soudainement à communiquer entre eux ? A s\'organiser ? Nous ne surviverons pas plus de queslques jours. Entre un crime spectaculaire et la disparition inexpliquée d\'une jeune femme, les chemins du detective Atticus Gore et de la privée Kat Kordell vont s\'entremêler. Et les confronter à une vérité effrayante. Des montagnes de Los Angeles aux bas-fonds de New York, un thriller implacable et documenté qui va vous démanger.', '', 2, 5, 3),
('9782266182690', 'Hunger Games Tome 1', 2009, 400, 'Le vainqueur deviendra riche et célèbre. Les autres mourront... Dans un futur sombre, sur les ruines des États-Unis, un jeu télévisé est créé pour contrôler le peuple par la terreur. Douze garçons et douze filles tirés au sort participent à cette sinistre téléréalité, que tout le monde est forcé de regarder en direct. Une seule règle dans l\'arène: survivre, à tout prix.', '', 1, 8, 3),
('9782266200127', 'Le Labyrinthe: Tome 1 L\'Epreuve', 2012, 416, 'Quand Thomas reprend connaissance, sa mémoire est vide, seul son nom lui est familier... Il se retrouve entouré d\'adolescents dans un lieu étrange, à l\'ombre de murs infranchissables. Quatre portes gigantesques, qui se referment le soir, ouvrent sur un labyrinthe peuplé de monstres d\'acier. Chaque nuit, le plan en est modifié. Thomas comprend qu\'une terrible épreuve les attend tous. Comment s\'échapper par le labyrinthe maudit sans risquer sa vie ? Si seulement il parvenait à exhumer les sombres secrets enfouis au plus profond de sa mémoire...', '', 1, 10, 3),
('9782266227018', 'Le Cercle des 17 Tome 1', 2014, 480, 'Michael Vey possède des super pouvoirs. D\'un seul geste, il peut envoyer des décharges électriques de plusieurs milliers de volts. Pratique, quand on est harcelé par les caïds du lycée et atteint de tics embarrassants. Michael se croit seul...avant de découvrir que Taylor, ravissantes pom-pom girl, est elle aussi \"électrique\" . A peine commencent-ils à comprendre leur secret qu\'une mystérieuse organisation, convoitant les pouvoirs des deux adolescents, les prends en chasse...', '', 1, 10, 3),
('9782266244510', 'Le Puits des Mémoires: 1 La Traque', 2012, 400, 'Trois hommes se réveillent dans les débris d\'un chariot accidenté en pleine montagne. Aucun d\'eux n\'a le moindre souvenir de son nom, de son passé, de la raison pour laquelle il se trouve là, en haillons, dans un pays inconnu. Sur leurs traces, une horde de guerriers, venus de l\'autre bout du monde, mettra le royaume à feu et à sang pour les retrouver. Fugitifs, mis à prix, impitoyablement traqués pour une raison mystérieuse, ils vont devoir survivre dans un monde où règnent la violence, les complots et la magie noire.', '', 2, 7, 3),
('9782266245302', 'Instinct Tome 1', 2011, 400, 'Lorsque la Ford paternelle quitte la route inexplicablement, Tim a dix-sept ans. Il perd dans l\'accident ses parents et son frère Ben. Mais de cette effroyable nuit, le garçon ne garde qu\'un souvenir, troublant : quand il a repris conscience, il était un grizzly… Que s\'est-il passé ? Le choc a-t-il provoqué un accès de folie chez Tim ? Ce n’est pas l\'avis du Pr McIntyre. Selon lui, l’adolescent est effectivement devenu un ours, pendant plusieurs heures, tout comme des centaines d\'êtres humains se transforment chaque année en animal.', '', 2, 9, 3),
('9782266250566', 'Au Service Surnaturel de sa Majesté', 2015, 665, 'Victime d\'une agression, Myfanwy Thomas reprend conscience dans un parc de Londres. Autour d\'elle, des hommes en costume portant des gants de latex. Tous sont morts. Situation peu réjouissante, certes, mais il y a pire : Myfanwy ne se souvient plus de rien. Le plus surprenant, c\'est qu\'elle semble avoir prévu cette amnésie. Elle a sur elle une lettre écrite de sa main lui expliquant qui elle est et ce qu\'elle doit faire pour découvrir qui veut l\'éliminer. C\'est ainsi que Myfawny rejoint le siège de l\'Échiquier, une organisation secrète chargée de combattre les forces surnaturelles qui menacent la Couronne.', '', 1, 7, 3),
('9782290016169', 'Neverwhere', 1996, 380, 'Londres, un soir comme tant d\'autres. Richard Mayhew découvre une jeune fille gisant sur le trottoir, l\'épaule ensanglantée. Qui le supplie de ne pas l\'emmener à l\'hôpital... Et disparaît dès le lendemain. Pour Richard, tout dérape alors : sa fiancée le quitte, on ne le connaît plus au bureau, certains, même, ne le voient plus... Le monde à l\'envers, en quelque sorte. Car il semblerait que Londres ait un envers, la \"ville d\'En Bas\", cité souterraine où vit un peuple d\'une autre époque, invisible aux yeux du commun des mortels. Un peuple organisé, hiérarchisé, et à la tête duquel les rats jouent un rôle prépondérant. Plus rien ne le retenant \"là-haut\", Richard rejoint les profondeurs...', '', 1, 6, 3),
('9782290019436', 'Game of Thrones Tome 1', 2010, 790, 'Le royaume des sept couronnes est sur le point de connaître son plus terrible hiver: par-delà le mur qui garde sa frontière nord, une armée de ténèbres se lève, menaçant de tout détruire sur son passage. Mais il en faut plus pour refroidir les ardeurs des rois, des reines, des chevaliers et des renégats qui se disputent le trône de fer, tous les coups sont permis, et seuls les plus forts, ou les plus retors s\'en sortiront indemnes...', '', 1, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `idPersonne` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personne`
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRole` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRole`, `role`) VALUES
(1, 'Ecrivain'),
(2, 'Illustrateur'),
(3, 'Traducteur'),
(4, 'Préface');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `utilisateur` varchar(50) NOT NULL,
  `numCarte` varchar(50) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `mdp`, `utilisateur`, `numCarte`, `Admin`) VALUES
(1, '1234', 'user', '01020304', 1),
(2, 'LivreArbitre78', 'Dupont', '12345678', 0),
(3, 'motdepasse', 'Michel', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`isbn`,`idPersonne`,`idRole`),
  ADD KEY `Auteur_Personne0_FK` (`idPersonne`),
  ADD KEY `Auteur_Roles1_FK` (`idRole`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`dateEmpreint`);

--
-- Indexes for table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`idEditeur`);

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`isbn`,`idUtilisateur`,`dateEmpreint`),
  ADD KEY `Emprunt_Utilisateur0_FK` (`idUtilisateur`),
  ADD KEY `Emprunt_Date1_FK` (`dateEmpreint`);

--
-- Indexes for table `formulaire`
--
ALTER TABLE `formulaire`
  ADD PRIMARY KEY (`idForm`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`);

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`idLangue`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `Livre_Langue_FK` (`idLangue`),
  ADD KEY `Livre_Editeur0_FK` (`idEditeur`),
  ADD KEY `Livre_Genre1_FK` (`idGenre`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`idPersonne`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `idEditeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `formulaire`
--
ALTER TABLE `formulaire`
  MODIFY `idForm` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `idGenre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `langue`
--
ALTER TABLE `langue`
  MODIFY `idLangue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `idPersonne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auteur`
--
ALTER TABLE `auteur`
  ADD CONSTRAINT `Auteur_Livre_FK` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`),
  ADD CONSTRAINT `Auteur_Personne0_FK` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`),
  ADD CONSTRAINT `Auteur_Roles1_FK` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `Emprunt_Date1_FK` FOREIGN KEY (`dateEmpreint`) REFERENCES `date` (`dateEmpreint`),
  ADD CONSTRAINT `Emprunt_Livre_FK` FOREIGN KEY (`isbn`) REFERENCES `livre` (`isbn`),
  ADD CONSTRAINT `Emprunt_Utilisateur0_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `Livre_Editeur0_FK` FOREIGN KEY (`idEditeur`) REFERENCES `editeur` (`idEditeur`),
  ADD CONSTRAINT `Livre_Genre1_FK` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`),
  ADD CONSTRAINT `Livre_Langue_FK` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`idLangue`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
