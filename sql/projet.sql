-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 10 Juin 2017 à 12:27
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test_proj`
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

-- --------------------------------------------------------

--
-- Structure de la table `proj_Place`
--

CREATE TABLE `proj_Place` (
  `idPlace` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Structure de la table `proj_Reservation`
--

CREATE TABLE `proj_Reservation` (
  `idUtilisateur` int(11) NOT NULL,
  `idRepresentation` int(11) NOT NULL,
  `idPlace` int(11) NOT NULL
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
(1, 'Henri Dès En Famille', 'Spectacle pour enfant', 'onnu pour son répertoire de musique pour enfants, Henri Dès est un auteur-compositeur-interprète suisse. Avec 50 ans de carrière au compteur, cet artiste a connu deux grandes périodes: celle des chansons pour adultes, à laquelle il se consacre dans un premier temps, puis celle, plus longue, des oeuvres pour enfants qu''il poursuit encore aujourd''hui avec des albums de compositions originales, des comédies musicales, des concerts, des contes, des livres...\r\n\r\nReprésentant de la Suisse au concours Eurovision de la chanson en 1970, Henri Dès (de son vrai nom Henri Destraz) constitue pour plusieurs générations la référence en matière de comptines pour enfants. Son répertoire regorge de classiques chantées par les "kids" d''aujourd''hui, comme pour leurs parents et les grands-parents: "Les Bêtises à l''école", "La Petite Charlotte", "La Glace au citron", "Le Petit zinzin"…', 'DES_7833565682037481098.jpg'),
(2, 'Les Contes d''Hoffmann', 'Opéra', 'Opéra fantastique en un prologue, trois actes et un épilogue (1881)\r\n\r\nMusique: Jacques Offenbach \r\nLivret: Jules Barbier\r\n\r\nD’après Jules Barbier, Michel Carré\r\nEn langue française', 'contesHoffman.webp'),
(3, 'Aida', 'Opéra', 'Opéra en quatre actes (1871)\r\n\r\nMusique Giuseppe Verdi \r\nLivret Antonio Ghislanzoni \r\n\r\nD''après Auguste Mariette\r\nEn langue italienne', 'aida.jpg'),
(4, 'La Source', 'Ballet', 'Son goût pour l’histoire de la danse et ses recherches autour du répertoire du 19ème siècle, ont conduit le danseur étoile de l’Opéra de Paris et chorégraphe Jean-Guillaume Bart à ressusciter un ballet classique, créé en 1866, dont il renouvelle avec bonheur la lettre tout en conservant l’esprit : un pur enchantement.\r\n\r\nAérienne, poétique, imagée et sophistiquée, la danse littéralement habitée sous une musique réorchestrée par le compositeur Marc Olivier Dupin témoigne d’un élan à la fois créatif, virtuose et naturel\r\n\r\nL’histoire met en scène Naïla, une fée, esprit de la source, et qui s’apparente à la petite sirène. Elle tombe amoureuse d’un mortel, Djémil, le chasseur, qui ne l’aime pas en retour car son cœur bat la chamade pour une mystérieuse Orientale Nouredda, promise au Khan. Naïla sacrifiera alors sa vie et son pouvoir afin de rendre possible l’amour terrestre des deux amoureux où entre temps les rebondissements liés aux incertitudes du cœur et aux jalousies du clan auront fait rage.', 'Affiche-la-source-1.jpg'),
(5, 'La Balayère', 'Ballet', '\r\nEn trois actes\r\n\r\nMusique Ludwig Minkus \r\nLivret Marius Petipa et Serguei Khoudekov \r\nChorégraphie Rudolf Noureev\r\n\r\nLe guerrier Solor et la belle bayadère Nikiya sont secrètement amants et ont prévu de s''enfuir et de se marier. Mais le Rajah a choisi Solor comme mari pour sa fille Gamzatti, et le Brahmane du temple veut épouser Nikiya.', 'la_balayere.jpg');

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
-- Structure de la table `proj_Utilisateur`
--

CREATE TABLE `proj_Utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8_roman_ci NOT NULL,
  `passHash` varchar(255) COLLATE utf8_roman_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_roman_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_roman_ci NOT NULL,
  `adressePostale1` varchar(50) COLLATE utf8_roman_ci NOT NULL,
  `adressePostale2` varchar(50) COLLATE utf8_roman_ci NOT NULL,
  `codePostal` varchar(10) COLLATE utf8_roman_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8_roman_ci NOT NULL,
  `adresseMail` varchar(50) COLLATE utf8_roman_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8_roman_ci NOT NULL,
  `typeUtilisateur` varchar(10) COLLATE utf8_roman_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

--
-- Contenu de la table `proj_Utilisateur`
--

INSERT INTO `proj_Utilisateur` (`idUtilisateur`, `login`, `passHash`, `nom`, `prenom`, `adressePostale1`, `adressePostale2`, `codePostal`, `ville`, `adresseMail`, `telephone`, `typeUtilisateur`) VALUES
(1, 'niko', '$2y$10$zsvTwVw.4WKjqIUvBZWXE.ySB7jb5DrhLsRqAyDkGjVnRLFGfuG2m', 'Niko', 'Nicolas', 'Université Paris8', '2 rue de la Liberté', '93526', 'Saint-Denis cedex ', 'youpitralala126@yopmail.com', '001122334455', 'admin'),
(2, 'Pinpin', '$2y$10$bmJ/sE7oo4h6GUAzuNdol.eklYPtCrRG16iyw1VF8dpAwIQi220ly', 'Pinpin', 'Lelapin', '12 allées des carottes', '', '73200', 'Lapinville', 'lapin@mail.animaux.com', '0123456789', 'user'),
(3, 'toto', '$2y$10$83SfoF4Mlq8.MnhYA2db8eKvpiue4IWuMjvA3ux0xOxkbVNsphC3K', 'to', 'to', 'néant', 'néant', '75000', 'Paris', 'toto@mail.bidon', '0123456789', 'user'),
(4, 'charles', '$2y$10$Fc9/d/CD0s/43Iai5ar0JuB/tD0cSIXetwksWofAK6H8fTSfNWFnm', 'Carlito', 'Charles', 'Université Paris 8', '2 rue de la liberté', '93300', 'Saint Denis', 'mail.bidon@mail.bidon', '012346789', 'admin'),
(5, 'bilo', '$2y$10$ThHbq38jbz6KYWNH6cPQwuvY84xHipAmoR1Vj9MeH6CBj6XetZRqG', 'Bilo', 'Bilo', 'Université Paris 8', '2 rue de la Liberté', '93300', 'Saint Denis', 'mail.bidon2@mail.bidon', '9876543210', 'admin'),
(6, 'nassim', '$2y$10$nNVq8jN7b25qUz91KDXQbeEXZOhGyiyQ5VfLYqsPlNzX6SQebSWn6', 'Nassim', 'Nassim', 'Université Paris8', '2 rue de la liberté', '93300', 'Saint Denis', 'mail.bidon3@mail.bidon', '365484255475', 'admin');

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
-- Index pour la table `proj_Utilisateur`
--
ALTER TABLE `proj_Utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `uniq_courriel` (`adresseMail`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `typeUtilisateur` (`typeUtilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `proj_Categorie`
--
ALTER TABLE `proj_Categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `proj_Place`
--
ALTER TABLE `proj_Place`
  MODIFY `idPlace` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `proj_Representation`
--
ALTER TABLE `proj_Representation`
  MODIFY `idRepresentation` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT pour la table `proj_Utilisateur`
--
ALTER TABLE `proj_Utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `proj_Categorie`
--
ALTER TABLE `proj_Categorie`
  ADD CONSTRAINT `proj_Categorie_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `proj_Salle` (`idSalle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj_Categorie_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `proj_PrixPlace` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj_Place`
--
ALTER TABLE `proj_Place`
  ADD CONSTRAINT `proj_Place_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `proj_Salle` (`idSalle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj_Place_ibfk_2` FOREIGN KEY (`Categorie`) REFERENCES `proj_Categorie` (`Categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj_PrixPlace`
--
ALTER TABLE `proj_PrixPlace`
  ADD CONSTRAINT `proj_PrixPlace_ibfk_1` FOREIGN KEY (`idSpectacle`) REFERENCES `proj_Spectacle` (`idSpectacle`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `proj_Reservation_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `proj_Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj_Reservation_ibfk_2` FOREIGN KEY (`idRepresentation`) REFERENCES `proj_Representation` (`idRepresentation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj_Reservation_ibfk_3` FOREIGN KEY (`idPlace`) REFERENCES `proj_Place` (`idPlace`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proj_Utilisateur`
--
ALTER TABLE `proj_Utilisateur`
  ADD CONSTRAINT `proj_Utilisateur_ibfk_1` FOREIGN KEY (`typeUtilisateur`) REFERENCES `proj_Types_Utilisateur` (`TypeUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
