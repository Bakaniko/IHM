-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 24 Juin 2017 à 21:53
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.24

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
-- Structure de la table `messages_contacts`
--

CREATE TABLE `messages_contacts` (
  `id_message_contact` bigint(20) UNSIGNED NOT NULL,
  `Nom_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prenom_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mail_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Text_message` text COLLATE utf8mb4_unicode_ci,
  `date_message_contact` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `messages_contacts`
--

INSERT INTO `messages_contacts` (`id_message_contact`, `Nom_contact`, `Prenom_contact`, `Mail_contact`, `Text_message`, `date_message_contact`) VALUES
(1, 'Gosse', 'Bo', 'bo.gosse@gmail.com', 'Message bidon', '2017-06-24');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `messages_contacts`
--
ALTER TABLE `messages_contacts`
  ADD UNIQUE KEY `idMessage` (`id_message_contact`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `messages_contacts`
--
ALTER TABLE `messages_contacts`
  MODIFY `id_message_contact` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
