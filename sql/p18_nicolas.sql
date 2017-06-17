-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 16 Juin 2017 à 23:53
-- Version du serveur :  5.6.30-1
-- Version de PHP :  7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p18_nicolas`
--

-- --------------------------------------------------------

--
-- Structure de la table `proj_Categorie`
--

CREATE TABLE `proj_Categorie` (
  `idCategorie` int(11) NOT NULL,
  `Categorie` varchar(20) COLLATE utf8_roman_ci NOT NULL,
  `idSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Contenu de la table `proj_Categorie`
--

INSERT INTO `proj_Categorie` (`idCategorie`, `Categorie`, `idSalle`) VALUES
(4, 'Parterre', 2),
(5, 'Orchestre', 2),
(6, 'Balcon', 2),
(7, 'Loges', 2),
(8, 'Balcon', 3),
(9, 'Loges', 3),
(10, 'Parterre', 3),
(11, 'Orchestre', 3);

-- --------------------------------------------------------

--
-- Structure de la table `proj_Place`
--

CREATE TABLE `proj_Place` (
  `idPlace` varchar(10) COLLATE utf8_roman_ci NOT NULL,
  `idSalle` int(11) NOT NULL,
  `Categorie` varchar(20) COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proj_PrixPlace`
--

CREATE TABLE `proj_PrixPlace` (
  `idCategorie` int(11) NOT NULL,
  `idSpectacle` int(11) NOT NULL,
  `Prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Contenu de la table `proj_PrixPlace`
--

INSERT INTO `proj_PrixPlace` (`idCategorie`, `idSpectacle`, `Prix`) VALUES
(4, 2, '125.00'),
(4, 3, '125.00'),
(5, 2, '135.00'),
(5, 3, '135.00'),
(6, 2, '100.00'),
(6, 3, '100.00'),
(7, 2, '90.00'),
(7, 3, '90.00'),
(8, 4, '100.00'),
(8, 5, '130.00'),
(9, 4, '130.00'),
(9, 5, '150.00'),
(10, 4, '180.00'),
(10, 5, '210.00'),
(11, 4, '160.00'),
(11, 5, '170.00');

-- --------------------------------------------------------

--
-- Structure de la table `proj_Representation`
--

CREATE TABLE `proj_Representation` (
  `idRepresentation` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  `idSpectacle` int(11) NOT NULL,
  `date` date NOT NULL,
  `horaireDebut` time NOT NULL,
  `horaireFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Contenu de la table `proj_Representation`
--

INSERT INTO `proj_Representation` (`idRepresentation`, `idSalle`, `idSpectacle`, `date`, `horaireDebut`, `horaireFin`) VALUES
(1, 2, 2, '2017-04-07', '19:00:00', '23:00:00'),
(2, 2, 2, '2017-05-05', '19:00:00', '23:00:00'),
(3, 2, 3, '2017-05-13', '20:00:00', '23:30:00'),
(4, 2, 3, '2017-06-10', '20:00:00', '23:30:00'),
(5, 3, 4, '2017-06-02', '20:00:00', '00:00:00'),
(6, 3, 5, '2017-07-01', '20:00:00', '00:00:00'),
(7, 2, 3, '2017-08-15', '20:00:00', '23:30:00'),
(8, 2, 3, '2017-09-09', '20:00:00', '23:30:00'),
(9, 2, 2, '2017-09-30', '20:00:00', '23:30:00'),
(10, 3, 4, '2017-09-22', '20:00:00', '23:00:00'),
(11, 3, 5, '2017-09-29', '20:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `proj_Reservation`
--

CREATE TABLE `proj_Reservation` (
  `idUtilisateur` int(11) NOT NULL,
  `idRepresentation` int(11) NOT NULL,
  `idPlace` varchar(10) COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proj_Salle`
--

CREATE TABLE `proj_Salle` (
  `idSalle` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_roman_ci NOT NULL,
  `adresse` text COLLATE utf8_roman_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Contenu de la table `proj_Salle`
--

INSERT INTO `proj_Salle` (`idSalle`, `nom`, `adresse`, `type`) VALUES
(1, 'Le Palace', 'Rue du Théatre \r\n84000 AVIGNON', 'Théatre'),
(2, 'Opéra Bastille', ' Place de la Bastille, 75012 Paris', 'Opéra'),
(3, 'Palais Garnier', '8 Rue Scribe, 75009 Paris', 'Opéra');

-- --------------------------------------------------------

--
-- Structure de la table `proj_Spectacle`
--

CREATE TABLE `proj_Spectacle` (
  `idSpectacle` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_roman_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_roman_ci NOT NULL,
  `infos` text COLLATE utf8_roman_ci NOT NULL,
  `nomImage` varchar(30) COLLATE utf8_roman_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Contenu de la table `proj_Spectacle`
--

INSERT INTO `proj_Spectacle` (`idSpectacle`, `nom`, `type`, `infos`, `nomImage`) VALUES
(1, 'Henri Dès En Famille', 'Spectacle pour enfant', '<p>\r\nConnu pour son répertoire de musique pour enfants, Henri Dès est un auteur-compositeur-interprète suisse. Avec 50 ans de carrière au compteur, cet artiste a connu deux grandes périodes: celle des chansons pour adultes, à laquelle il se consacre dans un premier temps, puis celle, plus longue, des oeuvres pour enfants qu\'il poursuit encore aujourd\'hui avec des albums de compositions originales, des comédies musicales, des concerts, des contes, des livres...</p>\r\n\r\n<p>Représentant de la Suisse au concours Eurovision de la chanson en 1970, Henri Dès (de son vrai nom Henri Destraz) constitue pour plusieurs générations la référence en matière de comptines pour enfants. Son répertoire regorge de classiques chantées par les \"kids\" d\'aujourd\'hui, comme pour leurs parents et les grands-parents: \"Les Bêtises à l\'école\", \"La Petite Charlotte\", \"La Glace au citron\", \"Le Petit zinzin\"…</p>\r\n', 'DES_7833565682037481098.jpg'),
(2, 'Les Contes d\'Hoffmann', 'Opéra', '<p>Opéra fantastique en un prologue, trois actes et un épilogue (1881)</p>\r\n\r\n\r\n<p>Musique: Jacques Offenbach</p>\r\n<p>Livret: Jules Barbier</p>\r\n\r\n\r\n<p>D’après Jules Barbier, Michel Carré</p>\r\n<p>En langue française</p>\r\n', 'contesHoffman.webp'),
(3, 'Aida', 'Opéra', '<p>Opéra en quatre actes (1871)</p>\r\n\r\n\r\n<p>Musique : Giuseppe Verdi</p>\r\n<p>Livret : Antonio Ghislanzoni</p>\r\n\r\n<p>D\'après Auguste Mariette</p>\r\n<p>En langue italienne</p>', 'aida.jpg'),
(4, 'La Source', 'Ballet', '<p>Son goût pour l’histoire de la danse et ses recherches autour du répertoire du 19ème siècle, ont conduit le danseur étoile de l’Opéra de Paris et chorégraphe Jean-Guillaume Bart à ressusciter un ballet classique, créé en 1866, dont il renouvelle avec bonheur la lettre tout en conservant l’esprit : un pur enchantement.</p>\r\n\r\n<p>Aérienne, poétique, imagée et sophistiquée, la danse littéralement habitée sous une musique réorchestrée par le compositeur Marc Olivier Dupin témoigne d’un élan à la fois créatif, virtuose et naturel.</p>\r\n\r\n<p>L’histoire met en scène Naïla, une fée, esprit de la source, et qui s’apparente à la petite sirène. Elle tombe amoureuse d’un mortel, Djémil, le chasseur, qui ne l’aime pas en retour car son cœur bat la chamade pour une mystérieuse Orientale Nouredda, promise au Khan. Naïla sacrifiera alors sa vie et son pouvoir afin de rendre possible l’amour terrestre des deux amoureux où entre temps les rebondissements liés aux incertitudes du cœur et aux jalousies du clan auront fait rage.</p>', 'Affiche-la-source-1.jpg'),
(5, 'La Balayère', 'Ballet', '<p>En trois actes</p>\r\n\r\n<p>Musique : Ludwig Minkus</p> \r\n<p>Livret : Marius Petipa et Serguei Khoudekov</p>\r\n<p>Chorégraphie : Rudolf Noureev</p>\r\n\r\n<p>Le guerrier Solor et la belle bayadère Nikiya sont secrètement amants et ont prévu de s\'enfuir et de se marier. Mais le Rajah a choisi Solor comme mari pour sa fille Gamzatti, et le Brahmane du temple veut épouser Nikiya.</p>', 'la_balayere.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `proj_Types_Utilisateur`
--

CREATE TABLE `proj_Types_Utilisateur` (
  `TypeUtilisateur` varchar(10) COLLATE utf8_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci COMMENT='Référence les types utilisateurs: user, admin, manager';

--
-- Contenu de la table `proj_Types_Utilisateur`
--

INSERT INTO `proj_Types_Utilisateur` (`TypeUtilisateur`) VALUES
('admin'),
('manager'),
('user');

-- --------------------------------------------------------

--
-- Structure de la table `proj_utilisateur`
--

CREATE TABLE `proj_utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `login` varchar(60) COLLATE utf8_roman_ci NOT NULL,
  `passHash` varchar(255) COLLATE utf8_roman_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_roman_ci DEFAULT NULL,
  `prenom` varchar(30) COLLATE utf8_roman_ci DEFAULT NULL,
  `adressePostale1` varchar(50) COLLATE utf8_roman_ci DEFAULT NULL,
  `adressePostale2` varchar(50) COLLATE utf8_roman_ci DEFAULT NULL,
  `codePostal` varchar(10) COLLATE utf8_roman_ci DEFAULT NULL,
  `ville` varchar(50) COLLATE utf8_roman_ci DEFAULT NULL,
  `adresseMail` varchar(255) COLLATE utf8_roman_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8_roman_ci DEFAULT NULL,
  `typeUtilisateur` varchar(10) COLLATE utf8_roman_ci NOT NULL DEFAULT 'user',
  `code_confirmation` varchar(60) COLLATE utf8_roman_ci DEFAULT NULL,
  `date_confirmation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Contenu de la table `proj_utilisateur`
--

INSERT INTO `proj_utilisateur` (`idUtilisateur`, `login`, `passHash`, `nom`, `prenom`, `adressePostale1`, `adressePostale2`, `codePostal`, `ville`, `adresseMail`, `telephone`, `typeUtilisateur`, `code_confirmation`, `date_confirmation`) VALUES
(1, 'niko', '$2y$10$zsvTwVw.4WKjqIUvBZWXE.ySB7jb5DrhLsRqAyDkGjVnRLFGfuG2m', 'Niko', 'Nicolas', 'Université Paris8', '2 rue de la Liberté', '93526', 'Saint-Denis cedex ', 'youpitralala126@yopmail.com', '001122334455', 'admin', NULL, NULL),
(2, 'Pinpin', '$2y$10$bmJ/sE7oo4h6GUAzuNdol.eklYPtCrRG16iyw1VF8dpAwIQi220ly', 'Pinpin', 'Lelapin', '12 allées des carottes', '', '73200', 'Lapinville', 'lapin@mail.animaux.com', '0123456789', 'user', NULL, NULL),
(3, 'toto', '$2y$10$83SfoF4Mlq8.MnhYA2db8eKvpiue4IWuMjvA3ux0xOxkbVNsphC3K', 'to', 'to', 'néant', 'néant', '75000', 'Paris', 'toto@mail.bidon', '0123456789', 'user', NULL, NULL),
(4, 'charles', '$2y$10$Fc9/d/CD0s/43Iai5ar0JuB/tD0cSIXetwksWofAK6H8fTSfNWFnm', 'Carlito', 'Charles', 'Université Paris 8', '2 rue de la liberté', '93300', 'Saint Denis', 'mail.bidon@mail.bidon', '012346789', 'admin', NULL, NULL),
(5, 'bilo', '$2y$10$ThHbq38jbz6KYWNH6cPQwuvY84xHipAmoR1Vj9MeH6CBj6XetZRqG', 'Bilo', 'Bilo', 'Université Paris 8', '2 rue de la Liberté', '93300', 'Saint Denis', 'mail.bidon2@mail.bidon', '9876543210', 'admin', NULL, NULL),
(6, 'nassim', '$2y$10$nNVq8jN7b25qUz91KDXQbeEXZOhGyiyQ5VfLYqsPlNzX6SQebSWn6', 'Nassim', 'Nassim', 'Université Paris8', '2 rue de la liberté', '93300', 'Saint Denis', 'mail.bidon3@mail.bidon', '365484255475', 'admin', NULL, NULL),
(8, 'nicoledingo', '$2y$12$316538023593fea21ad22uJhPTdKHZQafwlqV9iGsfqVly9zeuy4e', NULL, NULL, NULL, NULL, NULL, NULL, 'nicolas.roelandt@etud.univ-paris8.fr', NULL, 'user', 'XCJZcEuKb3tqwFCsEsETZJsw5JDsGa6Bb6EDCSvQxjgMIgxoSnDhpgcuaQc8', NULL),
(9, 'serge', '$2y$12$191970061659403b3369ceHdZ8Q7N0upyBwerMw1ftuPNRiJ8Tq2u', NULL, NULL, NULL, NULL, NULL, NULL, 'serge2yn@hotmail.fr', NULL, 'user', 'nyx2gF6eDmbTd5CrAoxN5GKWGx6e3x0aWrt8RwTRpNFgFz0vUDkZUVwHQGm8', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `TP3_client`
--

CREATE TABLE `TP3_client` (
  `ID` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `courriel` varchar(60) NOT NULL,
  `dateInscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `TP3_client`
--

INSERT INTO `TP3_client` (`ID`, `nom`, `prenom`, `ville`, `sexe`, `courriel`, `dateInscription`) VALUES
(2, 'Dupont', 'Marcel', 'Paris', 'M', 'dupont.marcel@free.fr', '2017-04-02'),
(3, 'Dupond', 'Pierre', 'Marseille', 'M', 'dupondp@mail.com', '2016-04-16'),
(4, 'North', 'Pierre', 'Paris', 'M', 'north.pierre@pentouse.com', '2015-08-02');

-- --------------------------------------------------------

--
-- Structure de la table `TP3_commentaire`
--

CREATE TABLE `TP3_commentaire` (
  `id` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `comm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `TP3_commentaire`
--

INSERT INTO `TP3_commentaire` (`id`, `idClient`, `comm`) VALUES
(2, 4, 'Premier commentaire'),
(3, 3, 'Balaala bla'),
(4, 3, 'Nickel'),
(5, 3, 'Encore un'),
(6, 3, 'Le dernier');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `proj_Categorie`
--
ALTER TABLE `proj_Categorie`
  ADD PRIMARY KEY (`idCategorie`),
  ADD KEY `idSalle` (`idSalle`),
  ADD KEY `Categorie` (`Categorie`);

--
-- Index pour la table `proj_Place`
--
ALTER TABLE `proj_Place`
  ADD PRIMARY KEY (`idPlace`),
  ADD UNIQUE KEY `idPlace` (`idPlace`),
  ADD KEY `idSalle` (`idSalle`),
  ADD KEY `Categorie` (`Categorie`);

--
-- Index pour la table `proj_PrixPlace`
--
ALTER TABLE `proj_PrixPlace`
  ADD PRIMARY KEY (`idCategorie`,`idSpectacle`),
  ADD KEY `idSpectacle` (`idSpectacle`);

--
-- Index pour la table `proj_Representation`
--
ALTER TABLE `proj_Representation`
  ADD PRIMARY KEY (`idRepresentation`),
  ADD KEY `idSalle` (`idSalle`),
  ADD KEY `idSpectacle` (`idSpectacle`);

--
-- Index pour la table `proj_Reservation`
--
ALTER TABLE `proj_Reservation`
  ADD PRIMARY KEY (`idPlace`,`idRepresentation`,`idUtilisateur`),
  ADD KEY `idUtilisateur` (`idUtilisateur`),
  ADD KEY `idRepresentation` (`idRepresentation`);

--
-- Index pour la table `proj_Salle`
--
ALTER TABLE `proj_Salle`
  ADD PRIMARY KEY (`idSalle`);

--
-- Index pour la table `proj_Spectacle`
--
ALTER TABLE `proj_Spectacle`
  ADD PRIMARY KEY (`idSpectacle`);

--
-- Index pour la table `proj_Types_Utilisateur`
--
ALTER TABLE `proj_Types_Utilisateur`
  ADD PRIMARY KEY (`TypeUtilisateur`);

--
-- Index pour la table `proj_utilisateur`
--
ALTER TABLE `proj_utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `uniq_courriel` (`adresseMail`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `typeUtilisateur` (`typeUtilisateur`);

--
-- Index pour la table `TP3_client`
--
ALTER TABLE `TP3_client`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `TP3_commentaire`
--
ALTER TABLE `TP3_commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cons_idClient` (`idClient`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `proj_Categorie`
--
ALTER TABLE `proj_Categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `proj_Representation`
--
ALTER TABLE `proj_Representation`
  MODIFY `idRepresentation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `proj_Salle`
--
ALTER TABLE `proj_Salle`
  MODIFY `idSalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `proj_Spectacle`
--
ALTER TABLE `proj_Spectacle`
  MODIFY `idSpectacle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `proj_utilisateur`
--
ALTER TABLE `proj_utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `TP3_client`
--
ALTER TABLE `TP3_client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `TP3_commentaire`
--
ALTER TABLE `TP3_commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `proj_Categorie`
--
ALTER TABLE `proj_Categorie`
  ADD CONSTRAINT `proj_Categorie_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `proj_Salle` (`idSalle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj_Place`
--
ALTER TABLE `proj_Place`
  ADD CONSTRAINT `proj_Place_ibfk_1` FOREIGN KEY (`idPlace`) REFERENCES `proj_Reservation` (`idPlace`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj_Place_ibfk_2` FOREIGN KEY (`idSalle`) REFERENCES `proj_Salle` (`idSalle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj_Place_ibfk_3` FOREIGN KEY (`Categorie`) REFERENCES `proj_Categorie` (`Categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj_PrixPlace`
--
ALTER TABLE `proj_PrixPlace`
  ADD CONSTRAINT `proj_PrixPlace_ibfk_1` FOREIGN KEY (`idSpectacle`) REFERENCES `proj_Spectacle` (`idSpectacle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj_PrixPlace_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `proj_Categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj_Representation`
--
ALTER TABLE `proj_Representation`
  ADD CONSTRAINT `proj_Representation_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `proj_Salle` (`idSalle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj_Representation_ibfk_2` FOREIGN KEY (`idSpectacle`) REFERENCES `proj_Spectacle` (`idSpectacle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj_Reservation`
--
ALTER TABLE `proj_Reservation`
  ADD CONSTRAINT `proj_Reservation_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `proj_utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj_Reservation_ibfk_2` FOREIGN KEY (`idRepresentation`) REFERENCES `proj_Representation` (`idRepresentation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj_utilisateur`
--
ALTER TABLE `proj_utilisateur`
  ADD CONSTRAINT `proj_utilisateur_ibfk_1` FOREIGN KEY (`typeUtilisateur`) REFERENCES `proj_Types_Utilisateur` (`TypeUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `TP3_commentaire`
--
ALTER TABLE `TP3_commentaire`
  ADD CONSTRAINT `cons_idClient` FOREIGN KEY (`idClient`) REFERENCES `TP3_client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
