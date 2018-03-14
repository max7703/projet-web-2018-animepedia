-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : animepedao77.mysql.db
-- Généré le :  mer. 14 mars 2018 à 04:58
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
  `nom_anime` varchar(40) NOT NULL,
  `description_anime` varchar(160) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `auteur_anime` varchar(30) NOT NULL,
  `studio_anime` varchar(30) NOT NULL,
  `nb_episodes_anime` int(11) NOT NULL,
  `img_path_anime` varchar(50) NOT NULL,
  `lien_trailer_anime` varchar(60) NOT NULL,
  `description_detail_anime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `anime`
--

INSERT INTO `anime` (`id_anime`, `nom_anime`, `description_anime`, `id_genre`, `auteur_anime`, `studio_anime`, `nb_episodes_anime`, `img_path_anime`, `lien_trailer_anime`, `description_detail_anime`) VALUES
(1, 'One Outs', 'Tokuchi est un joueur de baseball qui n&#39;a jamais raté un lancé de balle de sa vie.', 37, 'Shinobu Kaitani', 'Madhouse', 27, '../img/OneOuts.jpg', 'https://www.youtube.com/embed/UbJeAf7stfQ', 'Tokuchi est un joueur de baseball qui n&#39;a jamais raté un lancé de balle de sa vie. Un jour un joueur professionnel le défi, Tokuchi perd le duel, en gage de défaite, il doit rejoinre ln&#39;équipe du joueur professionnel et remporter le championnat'),
(2, 'My hero academia', 'Izuku veut devenir un super héros alors qu&#39;il n&#39;a pas d&#39;alter.', 33, 'Kouhei Horikoshi', 'Bones', 38, '../img/MyHeroAcademia.jpg', 'https://www.youtube.com/embed/77UEct0cZM', 'Izuku veut devenir un super héros alors qu&#39;il n&#39;a pas d&#39;alter. Il parvient quand même à rejoindre l&#39;académie des super héros malgré son handicap.'),
(3, 'Naruto', 'Naruto veut devenir Hokage pour être reconnu par le village de Konoha.', 33, 'Masashi Kishimoto', 'Studio Pierrot', 220, '../img/Naruto.jpg', 'https://www.youtube.com/embed/1DM0jNpCmJ4&t=3s', 'Naruto veut devenir Hokage pour être reconnu par le village de Konoha. Naruto possède le démon renard en lui, ce dernier avait détruit le village dans le passé. Naruto est donc évité de tous car ils ont peur du démon qui sommeille en lui.'),
(4, 'One Piece', 'One Piece relate les aventures d&#39;un pirate à la recherche du trésor nommé le OnePiece.', 33, 'Eiichirou Oda', 'Toei', 825, '../img/OnePiece.jpg', 'https://www.youtube.com/embed/ZwXKz2CeHwY', 'One Piece relate les aventures d&#39;un pirate à la recherche du trésor nommé le OnePiece. Il va devoir affronter beaucoup d&#39;ennemis pour trouver le OnePiece.'),
(5, 'Re:Zero kara hajimeru isekai seikatsu', 'Un jour, en sortant du dépanneur, Subaru est transporté dans un autre monde.', 9, 'Tappei Nagatsuki', 'White Fox', 25, '../img/ReZero.jpg', 'https://www.youtube.com/embed/YDq6RLsR57o', 'Un jour, en sortant du dépanneur, Subaru est transporté dans un autre monde. Dans cet autre monde, Subaru possède le pouvoir de remonter dans le temps si jamais il meurt.'),
(6, 'Bleach', 'Ichigo devient un dieu de la mort et protège la population de monstres.', 33, 'Tite Kubo', 'Shoueisha', 366, '../img/Bleach.jpg', 'https://www.youtube.com/embed/_ty-Nqm4Pdc', 'Ichigo devient un dieu de la mort et protège la population de monstres. Ichigo ayant une très grande quantité de force, il possède un sabre plus long que la moyenne.'),
(7, 'Ken Le Survivant', 'Ken est le survivant de l&#39;enfer, il croise souvent le fer, Omae Wa Mou Shindeiru.', 33, 'Toyoo Ashida', 'Toei', 109, '../img/KenLeSurvivant.jpg', 'https://www.youtube.com/embed/Ks3WAHefLDk', 'Ken est le survivant de l&#39;enfer, il croise souvent le fer, Omae Wa Mou Shindeiru. Il tue tout le monde sur son chemin.'),
(8, 'Sword Art Online', 'Kirito se retrouve enfermé dans un jeu vidéo ou la mort est synonyme de mort réelle.', 1, 'Reki Kawahara', 'ASCII Media Works', 25, '../img/SwordArtOnline.jpg', 'https://www.youtube.com/embed/cC-lD8v4E_s', 'Kirito se retrouve enfermé dans un jeu vidéo ou la mort est synonyme de mort réelle. Avec les autres joueurs eux aussi bloqués, ils doivent parvenir à la fin de la tour aux 100 étages pour être libres.'),
(9, 'FairyTail', 'Lucy est une invocatrice qui cherche à entrer dans la guilde FairyTail.', 33, 'Hiro Mashima', 'Satelight', 277, '../img/FairyTail.jpg', 'https://www.youtube.com/embed/tdrGjixAtKU', 'Lucy est une invocatrice qui cherche à entrer dans la guilde FairyTail. Un jour elle rencontre Natsu, membre de cette guilde. Ce dernier fait rentrer Lucy dans sa guilde.'),
(10, 'DragonBall Z', 'San Goku est un super saiyan qui détruit tout avec son KAMEHAMEHA.', 33, 'Takao Koyama', 'Toei', 291, '../img/DragonBallZ.jpg', 'https://www.youtube.com/embed/GHnfX1RmZX8', 'San Goku est un super saiyan qui détruit tout avec son KAMEHAMEHA. Il est super fort et il a les cheveux qui deviennent jaune quand il est pas content.'),
(11, 'Gurren Laggan', 'Les humains sont condamnés à vivre sous Terre, car des monstres habitent la surface.', 19, 'Hiroyuki Imaishi', 'Gainax', 27, '../img/GurrenLagann.jpg', 'https://www.youtube.com/embed/C_t47BVtPuE', 'Les humains sont condamnés à vivre sous Terre, car des monstres habitent la surface. Un jour une fille nommée Yoko, venant de la surface, convainc le reste des humains de sortir de sous terre pour reconquérir la surface.'),
(12, 'Death Note', 'Light veut tuer tous les criminels de la planète avec un livre d&#39;un dieu de la mort.', 7, 'Ōba Tsugumi', 'Madhouse', 37, '../img/DeathNote.jpg', 'https://www.youtube.com/embed/KdGOV8FX6F4', 'Light veut tuer tous les criminels de la planète avec un livre d&#39;un dieu de la mort. Quand Light écrit le nom d&#39;une personne dans ce livre, cette dernière meurt 45 secondes plus tard.'),
(13, 'Pokémon', 'Ash Ketchum veut battre la ligue Pokémon et capturer tous les Pokémons existants.', 33, 'Satoshi Tajiri', 'Oriental Light and Magic', 1000, '../img/Pokemon.jpg', 'https://www.youtube.com/embed/qyXTgqJtoGM', 'Ash Ketchum veut battre la ligue Pokémon et capturer tous les Pokémons existants. Il souhaite aussi vaincre la ligue Pokémon. Toujours accompagné de son Pikachu, Ash parcourt de nombreux environnements.'),
(14, 'Danganronpa', 'Des élèves sont enfermés dans une classe, pour en sortir ils doivent s&#39;entre-tuer.', 7, 'Seiji Kishi', 'Lerche', 36, '../img/Danganronpa.jpg', 'https://www.youtube.com/embed/Avr-Iu5vWsM', 'Des élèves sont enfermés dans une classe, pour en sortir ils doivent s&#39;entre-tuer. Cependant, si, après le soir d&#39;un meurtre le meurtrier n&#39;est pas trouvé, tous les autres élèves sont executés.'),
(15, 'Code Geass', 'Lelouch Lamperouge possède le pouvoir d&#39;ordonner ce qu&#39;il veut à n&#39;importe qui.', 7, 'Ichirou Oukouchi', 'Sunrise', 50, '../img/CodeGeass.jpg', 'https://www.youtube.com/embed/cZ7zQbMxm28', 'Lelouch Lamperouge possède le pouvoir d&#39;ordonner ce qu&#39;il veut à n&#39;importe qui. Grâce à ce pouvoir, Lelouch compte renverser l&#39;empire de Britania, un empire ayant pris possession du Japon.'),
(16, 'Naruto Shippuden', 'La suite des aventures de Naruto qui se passent 3 ans plus tard.', 33, 'Hayato Date', 'Studio Pierrot', 500, '../img/NarutoShippuden.jpg', 'https://www.youtube.com/embed/ecg9NBDA4OE&t=3s', 'La suite des aventures de Naruto qui se passent 3 ans plus tard. Naruto à grandi, il est devenu un ninja très puissant, grâce à son sensei, Jiraya.'),
(21, 'Ajin', 'Le héros de cette histoire est un Ajin, celà signifie qu&#39;il ne peut pas mourir.', 7, 'Gamon Sakurai', 'Polygon Pictures', 11, '../img/Ajin.jpg', 'https://www.youtube.com/embed/F9XNA-PWpks', 'Kei Nagai est un Ajin, il ne peut pas mourir, cependant ceci est très mal vu dans son pays natal, le Japon. Le gouvernement souhaite à le capturer pour pouvoir faire des expériences de nouveaux médicaments, ou des prélèvements d\'organes.'),
(22, 'Akagi', 'Akagi est un joueur de Majhong surdoué, qui n&#39;a jamais perdu une partie.', 25, 'Yuzo Sato', 'Madhouse', 26, '../img/Akagi.jpg', 'https://www.youtube.com/embed/lOhV_ZJNIxQ', 'Akagi est un joueur de Majhong surdoué, il pari des sommes astronomiques, parfois même ses organes vitaux lors de ses partie.'),
(23, 'Akame Ga Kill!', 'Tatsumi part de son village avec deux de ses amis pour récolter de l&#39;argent à sa famille.', 1, 'Tomoki Kobayashi', 'White Fox', 24, '../img/AkameGaKill.jpg', 'https://www.youtube.com/embed/dEjTWgB64Qs', 'Tatsumi part avec deux de ses amis pour récolter de l\'argent pour son village, en route ils sont attaqués et les deux amis de Tatsumi meurent, il est désormais seul'),
(24, 'Angel Beats!', 'Yuzuru est un enfant mort trop jeune, il se retrouve alors au purgatoire.', 26, 'Jun Maeda', 'P.A. Works', 13, '../img/AngelBeats.jpg', 'https://www.youtube.com/embed/-hA4na_3jT0', 'Yuruzu se retrouve au purgatoire où il ne peut pas mourir, cependant une intelligence artificielle sévit dans ce purgatoire.'),
(25, 'Another', 'En 1972, Misaki, élève de la classe de 3ème à Yomiyama, a trouvé la mort dans un incendie.', 7, 'Tsutomu Mizushima', 'P.A. Works', 12, '../img/Another.jpg', 'https://www.youtube.com/embed/kupW7eDG48s', 'En 1972, Misaki, élève de la classe de 3e 3 à Yomiyama, a trouvé la mort dans un incendie. En 1998, un jeune garçon rencontre une atmosphère mystérieuse et des élèves apeurés. Sa curiosité est éveillée par une adolescente étrange. Son nom est Misaki…'),
(26, 'Assassination Classroom', 'Koro Sensei est un extraterrestre qui enseigne à une classe de ratés.', 4, 'Yūsei Matsui', 'Lerche', 47, '../img/AssassinationClassroom.jpg', 'https://www.youtube.com/embed/hMYhMnRxj-0', 'Koro Sensei est un extraterrestre qui enseigne à une classe de ratés, cependant cette classe doit réussir à tuer son professeur pour réussir l\'année.'),
(27, 'Shingeki No Kyojin', 'L&#39;humanité est enfermée par des hauts murs de 40 mètres de hauts pour se protéger des titans.', 7, 'Hajime Isayama', 'Wit Studio', 37, '../img/AttackOnTitan.jpg', 'https://www.youtube.com/embed/XMXgHfHxKVM', 'L\'humanité est enfermée par des hauts murs de 40 mètres de hauts pour se protéger des titans, des monstres qui se nourrissent des humains.'),
(28, 'Erased', 'Satoru retourne dans le passé pour sauver une de ses amies d\'enfance qui a été kidnappée.', 7, 'Kei Sanbe', 'A-1 Pictures', 12, '../img/Erased.jpg', 'https://www.youtube.com/embed/Y9G20wV0KHE', 'Satoru retourne dans le passé pour sauver une de ses amies d\'enfance qui a été kidnappée par un tueur inconnu.'),
(29, 'Great Teacher Onizuka', 'Onizuka Eikichi possède 22 ans, ancien loubard reconverti en professeur.', 4, 'Tōru Fujisawa', 'Studio Pierrot', 43, '../img/GTO.jpg', 'https://www.youtube.com/embed/phAoChN1nC4', 'Onizuka est un ancien loubard qui rêve de devenir professeur, son souhait parvient à voir le jour, cependant, de par son passé, tout le monde pense qu\'il sera un très mauvais professeur, il est donc la cible de fausses plaintes pour pouvoir le renvoyer.'),
(30, 'Hunter X Hunter', 'Gon Freecss a douze ans, et rêve de devenir hunter.', 1, 'Yoshihiro Togashi', 'Nippon Animations', 150, '../img/HunterXHunter.jpg', 'https://www.youtube.com/embed/kUdfQJZWKN8', 'Les hunters sont des aventuriers d\'élite. Son père, Gin Freecss, qu\'il ne connaît pas directement, est considéré comme un des plus grands hunters de son temps. C\'est aussi pour le retrouver que Gon veut devenir hunter.'),
(31, 'Jojo&#39;s Bizarre Adventure', 'L&#39;histoire tourne autour des aventures de la lignée Joestar.', 1, 'Hirohiko Araki', 'David Productions', 113, '../img/JoJoBizarAdventure.jpg', 'https://www.youtube.com/embed/m_vux8N4dy4', 'L\'histoire tourne autour des aventures de la lignée Joestar. La série couvre plusieurs générations, et chaque partie propose de suivre un descendant des Joestar comme protagoniste principal, entouré de nombreux personnages.'),
(32, 'Mirai Nikki', 'Yukiteru joue à un Survival Game où il doit être le seul survivant parmi 13 candidats.', 7, 'Sakae Esuno', 'Asread', 26, '../img/MiraiNikki.jpg', 'https://www.youtube.com/embed/I59V9pjEOLI', 'Yukiteru joue à un Survival Game où il doit être le seul survivant parmi 13 candidats, chaque candidat possède un pouvoir particulier, celui de Yukitera est de voir l\'avenir 1h en avance.'),
(33, 'No Game No Life', 'Sora et Shiro sont des frère et soeur, invaincus aux jeux.', 25, 'Yū Kamiya', 'Madhouse', 12, '../img/NoGameNoLife.jpg', 'https://www.youtube.com/embed/NQCax11Q0Bs', 'Sora et Shiro sont des frère et soeur, invaincus aux jeux vidéos, ils sont transportés dans un monde où tout est décidé par le jeu, que ça soit le territoire, ou le droit de vivre.'),
(34, 'Kiseijuu', 'Une nouvelle espèce parasite prend le contrôle des humains.', 7, 'Hitoshi Iwaaki', 'Madhouse', 24, '../img/ParasyteTheMaxim.jpg', 'https://www.youtube.com/embed/GeMKMLkaokg', 'Une nouvelle espèce parasite prend le contrôle des humains. Shinichi, le héros à lui aussi été parasité, cependant le parasite n\'a pas atteint son cerveau, il possède encore sa conscience et tente d\'arrêter les autres parasites'),
(35, 'Steins;Gate', 'Okabe est un scientifique qui travaille sur un moyen de remonter le temps.', 29, 'Sarachi Yomi', 'White Fox', 24, '../img/SteinsGate.jpg', 'https://www.youtube.com/watch?v=1FPdtR_5KFo', 'Okabe est un scientifique qui travaille sur un moyen de remonter le temps avec l\'aide d\'une autre scientifique, Makise. '),
(36, 'Tokyo Ghoul', 'Kaneki est un humain qui se fait greffer des organes de ghoul, il devient humain et ghoul.', 7, 'Sarachi Yomi', 'White Fox', 24, '../img/TokyoGhoul.jpg', 'https://www.youtube.com/watch?v=uMeR2W19wT0', 'Kaneki est un humain qui se fait greffer des organes de ghoul, il devient alors mi-humain et mi-ghoul, ce qui fait qu\'il est rejeté des deux camps.'),
(37, 'Yu-Gi-Oh', 'Yugi est un joueur de cartes YuGiOh, il participe à un tournois pour être le meilleur.', 10, 'Kazuki Takahashi', 'Toei Animation', 263, '../img/YuGiOh.jpg', 'https://www.youtube.com/watch?v=-PG7eyV5soA', 'Yugi est un joueur de cartes YuGiOh, il participe à un tournois pour être le meilleur, il y participe avec ses amis.'),
(38, 'Yu-Gi-Oh GX', 'Nouvelle génération de YuGiOh, le héros principal s&#39;appelle Jaden.', 10, 'Hatsuki Tsuji', 'Nihon Ad Systems', 180, '../img/YuGiOhGX.jpg', 'https://www.youtube.com/watch?v=CN_DjYDHEVU', 'Nouvelle génération de YuGiOh, le héros principal s\'appelle Jaden, il est étudiant dans une école de jeu de cartes.');

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
  MODIFY `id_anime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
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
