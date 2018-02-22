-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : animepedao77.mysql.db
-- Généré le :  jeu. 22 fév. 2018 à 14:53
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
-- Structure de la table `anime`
--

CREATE TABLE `anime` (
  `id_anime` int(11) NOT NULL,
  `nom_anime` text NOT NULL,
  `description_anime` text NOT NULL,
  `id_genre` int(11) NOT NULL,
  `auteur_anime` text NOT NULL,
  `studio_anime` text NOT NULL,
  `nb_episodes_anime` int(11) NOT NULL,
  `img_path_anime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `anime`
--

INSERT INTO `anime` (`id_anime`, `nom_anime`, `description_anime`, `id_genre`, `auteur_anime`, `studio_anime`, `nb_episodes_anime`, `img_path_anime`) VALUES
(1, 'One Outs', 'Tokuchi est un joueur de baseball qui n&#39;a jamais raté un lancé de balle de sa vie.', 37, 'Shinobu Kaitani', 'Madhouse', 26, '../img/OneOuts.jpg'),
(2, 'My Hero Academia', 'Izuku veut devenir un super héros alors qu\'il n\'a pas d\'alter.', 33, 'Kouhei Horikoshi', 'Bones', 38, '../img/MyHeroAcademia.png'),
(3, 'Naruto', 'Naruto veut devenir Hokage pour être reconnu par tout son village.', 33, 'Masashi Kishimoto', 'Studio Pierrot', 220, '../img/Naruto.jpg'),
(4, 'One Piece', 'One Piece relate les aventures d&#39;un pirate à la recherche du trésor nommé le OnePiece', 33, 'Eiichirou Oda', 'Toei', 825, '../img/OnePiece.jpg'),
(5, 'Re:Zero Kara Hajimeru Isekai Seikatsu', 'Un jour, en sortant du dépanneur, Subaru est transporté dans un autre monde.', 9, 'Tappei Nagatsuki', 'White Fox', 25, '../img/ReZero.jpg'),
(6, 'Bleach', 'Ichigo devient un dieu de la mort et protège la population de monstres.', 33, 'Tite Kubo', 'Shoueisha', 366, '../img/Bleach.jpg'),
(7, 'Ken Le Survivant', 'Ken est le survivant de l\'enfer, il croise souvent le fer, Omae Wa Mou Shideiriu.', 33, 'Toyoo Ashida', 'Toei', 109, '../img/KenLeSurvivant.jpg'),
(8, 'Sword Art Online', 'Kirito se retrouve enfermé dans un jeu vidéo ou la mort est synonyme de mort réelle.', 1, 'Reki Kawahara', 'ASCII Media Works', 25, '../img/SwordArtOnline.jpg'),
(9, 'FairyTail', 'Lucy est une invocatrice qui cherche à entrer dans la guilde FairyTail', 33, 'Hiro Mashima', 'Satelight', 277, '../img/FairyTail.jpg'),
(10, 'DragonBall Z', 'San Goku est un super saiyan qui détruit tout avec son KAMEHAMEHA.', 33, 'Takao Koyama', 'Toei', 291, '../img/DragonBallZ.jpg'),
(11, 'Gurren Laggan', 'Les humains sont condamnés à vivre sous Terre, car des monstres habitent la surface.', 19, 'Hiroyuki Imaishi', 'Gainax', 27, '../img/GurrenLaggan.jpg'),
(12, 'Death Note', 'Light veut tuer tous les criminels de la planète avec un livre d\'un dieu de la mort.', 7, 'Ōba Tsugumi', 'Madhouse', 37, '../img/Deathnote.png'),
(13, 'Pokémon', 'Ash Ketchum veut battre la ligue Pokémon et capturer tous les Pokémons existants.', 33, 'Satoshi Tajiri', 'Oriental Light and Magic', 1000, '../img/Pokemon.png'),
(14, 'Danganronpa', 'Des élèves sont enfermés dans une classe, pour en sortir ils doivent s\'entre-tuer.', 7, 'Seiji Kishi', 'Lerche', 36, '../img/Danganronpa.jpg'),
(15, 'Code Geass', 'Lelouch Lamperouge possède le pouvoir d\'ordonner ce qu\'il veut à n\'importe qui.', 7, 'Ichirou Oukouchi', 'Sunrise', 50, '../img/CodeGeass.jpg'),
(16, 'Naruto Shippuden', 'La suite des aventures de Naruto qui se passent 3 ans plus tard', 33, 'Hayato Date', 'Studio Pierrot', 500, '../img/NarutoShippuden.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id_anime`),
  ADD KEY `id_genre` (`id_genre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `anime`
--
ALTER TABLE `anime`
  MODIFY `id_anime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `anime`
--
ALTER TABLE `anime`
  ADD CONSTRAINT `anime_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
