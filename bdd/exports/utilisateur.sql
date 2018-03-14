-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : animepedao77.mysql.db
-- Généré le :  mer. 14 mars 2018 à 05:01
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
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo_utilisateur` varchar(20) NOT NULL,
  `mdp_utilisateur` varchar(60) NOT NULL,
  `email_utilisateur` varchar(30) NOT NULL,
  `id_privilege` int(11) NOT NULL,
  `image_utilisateur` varchar(100) NOT NULL,
  `description_utilisateur` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo_utilisateur`, `mdp_utilisateur`, `email_utilisateur`, `id_privilege`, `image_utilisateur`, `description_utilisateur`) VALUES
(2, 'lyanke', '$2y$10$ar9etAIukSQWZ6hyh1GvuOlAJv5YYPr7vZzaFa28nZMe6hysV.4zW', 'lyankedu9297@gmail.com', 1, '../img/profil/base-profile.png', 'fghgfh'),
(3, 'kelyan', '$2y$10$MyiCbCBPcMjPrUGAm52aNuNuANNAKk5FrPTdasuV7udDVbJV4rGtS', 'kelyan.chauffourier@gmail.com', 1, '../img/profil/base-profile.png', 'fhgfhgfhfg'),
(4, 'max7703', '$2y$10$TkajxRlmf7gwZfwO98GS6.iPArCPXBHN1VEPW104HE7Di26vdn8Ae', 'max7703@live.fr', 1, '../img/profil/max7703-gif-profile-picture-discord-2.gif', 'fghgfhg'),
(5, 'nico', '$2y$10$JPkmVwjCFRtWMkiyR2MA3eD268tNa4h8sE04S3v9CGh2z.VOf/HqG', 'test@test.fr', 1, '../img/profil/base-profile.png', 'noobml'),
(8, 'jeanbob', '$2y$10$VthbLmFcZ95aOPD19PskK.WN50Hr0DcHZbpHmWwMvgBuxV8X6I9jq', 'jeanbox@gmail.com', 1, '../img/profil/base-profile.png', 'Un king'),
(9, 'Max7703_', '$2y$10$.jzE6EjM3B8qF188KECmY.PjAfG44/xU1tDxNohlZwzwnZPMWUFOK', 'max7703@outlook.fr', 1, '../img/profil/base-profile.png', ''),
(14, 'zenoozhd', '$2y$10$lBdmFbqfyrzZG9Fw2Gab6OQGfbaDY0BEdbMWpV.S05anOagS8xXtC', 'johnathan60@hotmail.fr', 2, '../img/profil/base-profile.png', ''),
(15, 'rtgtgegrg', '$2y$10$s6sL0DylEsiwOSs3W3h3JuNRBWcYTITHzzYJN4HYaRs3FERqASxSS', 'ervrever@gmail.com', 2, '../img/profil/base-profile.png', ''),
(16, 'ergergr', '$2y$10$lUMAzL53DPV8.705h/Me9ekpghkRMGbk3mqxPXVvcK8kCU56Al2rq', 'ergerger@gmail.com', 2, '../img/profil/base-profile.png', ''),
(17, 'zaeddddddddddazsq', '$2y$10$wTJQiOIeGKXE3g2/O5565.Y.84RFmqlaMsqvGmDmoAMQ3BukKp2KK', 'sqdzaqd@gmail.fr', 2, '../img/profil/base-profile.png', ''),
(18, 'maximeszaja', '$2y$10$XGRpA.Rh9ZbLJUMnd3SC2ehy5mUGDR5jHKNB622iJWSVemhozDSPS', 'max77r03@live.fr', 2, '../img/profil/base-profile.png', ''),
(19, 'ferg', '$2y$10$E6Z3duhSp/Pnm2mpSX5kTOEoLkg0kiSQCL/XKuj7S3VVCbEwjeu4G', 'max770g3@live.fr', 3, '../img/profil/ferg-photo-48627.png', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `id_privilege` (`id_privilege`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_privilege`) REFERENCES `privilege` (`id_privilege`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
