-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 01 mai 2020 à 17:41
-- Version du serveur :  8.0.19-0ubuntu5
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- JOUGLET Grégory
-- GREMONT Quentin
--

-- --------------------------------------------------------

--
-- Structure de la table `Annonce`
--

CREATE TABLE `Annonce` (
  `ID_Annonce` varchar(32) NOT NULL,
  `ID_Utilisateur` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Nom_A` tinytext NOT NULL,
  `Prix_A` decimal(10,2) NOT NULL,
  `Date_A` datetime NOT NULL,
  `Desc_A` text NOT NULL,
  `IMG1_A` varchar(32) NOT NULL,
  `IMG2_A` varchar(32) NOT NULL,
  `IMG3_A` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Annonce`
--

INSERT INTO `Annonce` (`ID_Annonce`, `ID_Utilisateur`, `Type`, `Nom_A`, `Prix_A`, `Date_A`, `Desc_A`, `IMG1_A`, `IMG2_A`, `IMG3_A`) VALUES
('oui5e95a3a635aa3', 'oui', 'Multimedia', 'Vend Iphone 11', '650.00', '2020-04-14 07:51:02', 'Vend mon Iphone 11 tres bon etat avec facture', 'oui5e95a3a635aa31.png', 'oui5e95a3a635aa32.png', 'oui5e95a3a635aa33.png'),
('oui5e95a490b122c', 'oui', 'Mode', 'Vend lot de lunettes', '50.00', '2020-04-14 07:54:56', 'Vend lot de 3 Lunettes', 'oui5e95a490b122c1.png', 'oui5e95a490b122c2.png', 'oui5e95a490b122c3.png'),
('oui5e95a57d45bee', 'oui', 'Divers', 'Vend tondeuse', '63.00', '2020-04-14 07:58:53', 'Vend tondeuse avec tous les accessoires très bon état', 'oui5e95a57d45bee1.png', 'oui5e95a57d45bee2.png', 'oui5e95a57d45bee3.png'),
('Quxywa5e95a2ae39543', 'Quxywa', 'Véhicule', 'Tesla model S', '99000.00', '2020-04-14 07:46:54', 'Très belle voiture.', 'Quxywa5e95a2ae395431.png', 'Quxywa5e95a2ae395432.png', 'Quxywa5e95a2ae395433.png'),
('Quxywa5e95a32bbef9d', 'Quxywa', 'Véhicule', 'Berlingo', '20000.00', '2020-04-14 07:48:59', 'Familiale.', 'Quxywa5e95a32bbef9d1.png', 'Quxywa5e95a32bbef9d2.png', 'Quxywa5e95a32bbef9d3.png'),
('Quxywa5e95a515e0b54', 'Quxywa', 'Immobilier', 'T2 Amiens', '360.00', '2020-04-14 07:57:09', 'Spacieux et cool. Meublé TTC.', 'Quxywa5e95a515e0b541.png', 'Quxywa5e95a515e0b542.png', 'Quxywa5e95a515e0b543.png'),
('Quxywa5e95a5c187a4d', 'Quxywa', 'Immobilier', 'Chambre étudiant', '306.00', '2020-04-14 08:00:01', '15 m².', 'Quxywa5e95a5c187a4d1.png', 'Quxywa5e95a5c187a4d2.png', 'Quxywa5e95a5c187a4d3.png'),
('Quxywa5e95a6425d1ae', 'Quxywa', 'Immobilier', 'Maison Tranquille', '99999.00', '2020-04-14 08:09:10', '150 m².', 'Quxywa5e95a6425d1ae1.png', 'Quxywa5e95a6425d1ae2.png', 'Quxywa5e95a6425d1ae3.png'),
('Quxywa5e95a696ec46a', 'Quxywa', 'Loisir', 'Racket de tennis', '65.00', '2020-04-14 08:03:34', 'Pour personne de 15 ans', 'Quxywa5e95a696ec46a1.png', 'Quxywa5e95a696ec46a2.png', 'Quxywa5e95a696ec46a3.png'),
('Quxywa5e95a6ce1c30c', 'Quxywa', 'Matériel', 'Perceuse', '150.00', '2020-04-14 08:04:30', 'Grosse perceuse qui perce bien.', 'Quxywa5e95a6ce1c30c1.png', 'Quxywa5e95a6ce1c30c2.png', 'Quxywa5e95a6ce1c30c3.png');

-- --------------------------------------------------------

--
-- Structure de la table `Message`
--

CREATE TABLE `Message` (
  `ID_Message` int NOT NULL,
  `ID_Expediteur` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ID_Destinataire` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Date_M` datetime NOT NULL,
  `Text_M` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Message`
--

INSERT INTO `Message` (`ID_Message`, `ID_Expediteur`, `ID_Destinataire`, `Date_M`, `Text_M`) VALUES
(13, 'Greg', 'test', '2020-04-29 09:04:25', 'Bonjour'),
(14, 'test', 'Greg', '2020-04-29 09:04:47', 'Bonjour'),
(15, 'test', 'test', '2020-04-29 09:05:12', 'Bonjour');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `ID_Utilisateur` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Nom_U` varchar(20) NOT NULL,
  `Prenom_U` varchar(20) NOT NULL,
  `Mdp_U` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Date_U` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`ID_Utilisateur`, `Nom_U`, `Prenom_U`, `Mdp_U`, `Date_U`) VALUES
('Greg', 'Jouglet', 'Grégory', 'azertyuiop', '2020-04-10 08:17:39'),
('Quxywa', 'Poisson', 'Poisson', 'Azerty123', '2020-04-14 07:40:56'),
('Yiae', 'Chadal', 'Justine', 'Bz0dYalp64', '2020-04-15 07:52:22'),
('oui', 'non', 'quentin', 'Azerty123', '2020-04-14 07:43:30'),
('test', 'test', 'test', 'testtest8', '2020-04-29 09:02:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Annonce`
--
ALTER TABLE `Annonce`
  ADD PRIMARY KEY (`ID_Annonce`),
  ADD KEY `ID_Utilisateur` (`ID_Utilisateur`);

--
-- Index pour la table `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`ID_Message`),
  ADD KEY `ID_Destinataire` (`ID_Destinataire`),
  ADD KEY `ID_Expediteur` (`ID_Expediteur`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`ID_Utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Message`
--
ALTER TABLE `Message`
  MODIFY `ID_Message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Annonce`
--
ALTER TABLE `Annonce`
  ADD CONSTRAINT `Annonce_ibfk_1` FOREIGN KEY (`ID_Utilisateur`) REFERENCES `Utilisateur` (`ID_Utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`ID_Destinataire`) REFERENCES `Utilisateur` (`ID_Utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Message_ibfk_2` FOREIGN KEY (`ID_Expediteur`) REFERENCES `Utilisateur` (`ID_Utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Évènements
--
CREATE EVENT `auto_supp_annonce` ON SCHEDULE EVERY 1 DAY STARTS '2020-04-01 00:00:00' ON COMPLETION PRESERVE ENABLE DO DELETE FROM Annonce WHERE DATEDIFF(NOW(), Date_A) > 30$$

CREATE EVENT `auto_supp_message` ON SCHEDULE EVERY 1 DAY STARTS '2020-04-01 00:00:00' ON COMPLETION PRESERVE ENABLE DO DELETE FROM Message WHERE DATEDIFF(NOW(), Date_M) > 7$$

DELIMITER ;
COMMIT;

