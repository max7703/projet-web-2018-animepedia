-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : animepedao77.mysql.db
-- Généré le :  mer. 14 mars 2018 à 04:59
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `animepedao77`
--

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nom_genre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Cars'),
(4, 'Comedy'),
(5, 'Dementia'),
(6, 'Demons'),
(7, 'Drama'),
(8, 'Ecchi'),
(9, 'Fantasy'),
(10, 'Game'),
(11, 'Harem'),
(12, 'Hentai'),
(13, 'Historical'),
(14, 'Horror'),
(15, 'Josei'),
(16, 'Kids'),
(17, 'Magic'),
(18, 'Martial Arts'),
(19, 'Mecha'),
(20, 'Military'),
(21, 'Music'),
(22, 'Mystery'),
(23, 'Parody'),
(24, 'Police'),
(25, 'Psychological'),
(26, 'Romance'),
(27, 'Samurai'),
(28, 'School'),
(29, 'Sci-Fi'),
(30, 'Seinen'),
(31, 'Shoujo'),
(32, 'Shoujo Ai'),
(33, 'Shounen'),
(34, 'Shounen Ai'),
(35, 'Slice of Life'),
(36, 'Space'),
(37, 'Sports'),
(38, 'Super Power'),
(39, 'Supernatural'),
(40, 'Thriller'),
(41, 'Vampire'),
(42, 'Yaoi'),
(43, 'Yuri');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
