-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 24 mai 2020 à 14:59
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbbm2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `concerne`
--

CREATE TABLE `concerne` (
  `idStatus` int(11) NOT NULL,
  `numFormation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `concerne`
--

INSERT INTO `concerne` (`idStatus`, `numFormation`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `numFormation` int(20) NOT NULL,
  `objectif` varchar(255) NOT NULL,
  `couts` int(20) DEFAULT NULL,
  `titre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`numFormation`, `objectif`, `couts`, `titre`) VALUES
(1, 'Soirée d\'information sur la convention collective nationale du sport.', NULL, 'Gestion'),
(2, 'Actualisation des connaissances sur la convention collective nationale sport et la responsabilité des dirigeants.', NULL, 'Gestion'),
(3, 'Comptabilité.', NULL, 'Gestion'),
(4, 'Recherche de partenariat.', NULL, 'Gestion'),
(5, 'Cette année, en informatique tout sera possible!', NULL, 'Informatique'),
(6, 'Organiser une manifestation éco responsable.', NULL, 'Développement durable'),
(7, 'Prévention et secours civiques (PSC1)', NULL, 'Secourisme'),
(8, 'Conduite de réunion.', NULL, 'Communication'),
(9, 'Communiquer avec la presse.', NULL, 'Communication'),
(10, 'Langues étrangères.', NULL, 'Communication'),
(11, 'Formation PowerPoint niveau 1 -1 journée :\r\nDécouverte et prise en main /Création d\'une présentation : mise en page des diapos /Les différents mode d\'affichage /Intégration de diapos extérieures /Mise en page du diaporama /Les animations /Les modèles ...', 55, 'Informatique'),
(12, 'Formation PowerPoint niveau 2 -1 journée :\r\nAmélioration d\'une présentation /L\'affichage /Personnalisation des diapositives /Les modèles /Les animations/ Enregistrer une présentation /Ajouter du son /PowerPoint et internet.\r\n', 55, 'Informatique'),
(13, 'Formation Photoshop - 2 journées :\r\nLes images numériques /Les modes colorimétriques /Présentation et personnalisation /Traitement numérique et retouche partielle /Travaux photographiques /Les formats d\'échange /Principes de base d\'impression...', 110, 'Informatique'),
(14, 'Formation Publisher - en 2 journées :\r\nTypographie /La page /Texte /Image /Les effets spéciaux de WordArt /Objets graphiques /Composition.', 110, 'Informatique'),
(15, 'Formation PowerPoint niveau 1 -1 journée :\r\nDécouverte et prise en main /Création d\'une présentation : mise en page des diapos /Les différents mode d\'affichage /Intégration de diapos extérieures /Mise en page du diaporama /Les animations /Les modèles...', 55, 'Informatique'),
(16, 'Formation Outlook Niveau 1 - 1 journée :\r\nOutlook /Envoi de messages /Ouverture de messages /Gestion du carnet d\'adresses /Gestion des messages /Contacts /Calendrier.', 55, 'Informatique'),
(17, 'Traumatologie sportive.', NULL, 'Santé'),
(18, 'Alimentation du sportif.', NULL, 'Santé'),
(19, 'Conduites addictives (les dépendances).', NULL, 'Santé');

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE `intervenant` (
  `idIntervenant` int(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `titre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervenant`
--

INSERT INTO `intervenant` (`idIntervenant`, `nom`, `prenom`, `titre`) VALUES
(1, 'Poe', 'jerome', 'RMI informatique'),
(2, 'Contet-Audonneau', 'jean-Luc', 'docteur'),
(3, 'Laure', 'patrick', 'docteur');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `idLieu` int(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codePostal` int(5) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `nom`, `adresse`, `codePostal`, `ville`, `telephone`) VALUES
(1, 'Maison des formations', '13, rue Jean Moulin - BP70001', 54510, 'TOMBLAINE', 383188704),
(2, 'CDOS 54 - salle Lorraine 1', '13 rue Jean Moulin', 54510, 'TOMBLAINE', 383188754),
(3, 'maison régionale des sports de Lorraine - salle informatique', '13 rue Jean Moulin', 54510, 'TOMBLAINE', 383188754);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `numSession` int(11) NOT NULL,
  `dateLimiteInsc` date DEFAULT NULL,
  `dateSession` date DEFAULT NULL,
  `dateDeFin` date DEFAULT NULL,
  `idIntervenant` int(11) NOT NULL,
  `idLieu` int(11) NOT NULL,
  `numFormation` int(11) NOT NULL,
  `nbPlace` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`numSession`, `dateLimiteInsc`, `dateSession`, `dateDeFin`, `idIntervenant`, `idLieu`, `numFormation`, `nbPlace`) VALUES
(1, '2005-10-15', '2005-10-25', '2005-10-25', 1, 1, 1, 20),
(2, '2005-10-31', '2005-11-05', '2005-11-05', 1, 1, 11, 15),
(3, '2005-10-31', '2005-11-15', '2005-11-15', 1, 1, 12, 15),
(4, '2005-11-18', '2005-12-01', '2005-12-05', 1, 1, 13, 15),
(5, '2005-11-25', '2005-12-15', '2006-01-05', 1, 1, 14, 15),
(6, '2005-12-02', '2005-12-17', '2005-12-17', 1, 1, 15, 15),
(7, '2005-11-05', '2005-11-26', '2005-11-26', 1, 1, 16, 15),
(8, '2006-01-15', '2006-01-29', '2006-02-15', 2, 2, 2, 10),
(9, '2006-02-19', '2006-03-01', '2006-04-15', 1, 1, 3, 14),
(10, '2006-02-19', '2006-03-01', '2006-04-15', 3, 3, 4, 10),
(11, '2006-03-19', '2006-04-01', '2006-06-15', 3, 1, 4, 5),
(12, '2006-05-19', '2006-06-01', '2006-07-15', 1, 3, 5, 15),
(13, '2006-06-19', '2006-07-01', '2006-08-15', 1, 2, 6, 10);

-- --------------------------------------------------------

--
-- Structure de la table `sinscrire`
--

CREATE TABLE `sinscrire` (
  `idUtilisateur` int(11) NOT NULL,
  `numSession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sinscrire`
--

INSERT INTO `sinscrire` (`idUtilisateur`, `numSession`) VALUES
(16, 8);

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `idStatus` int(4) NOT NULL,
  `libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`idStatus`, `libelle`) VALUES
(1, 'benevole'),
(2, 'salarié');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresseMail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `idStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `adresseMail`, `password`, `idStatus`) VALUES
(1, 'conan', 'barbare', 'conan-le-barbare@ici.fr', 'soleil', 1),
(16, 'brest', 'yaon', 'brest@mail.com', '123456', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `concerne`
--
ALTER TABLE `concerne`
  ADD PRIMARY KEY (`idStatus`,`numFormation`),
  ADD KEY `idFormation` (`numFormation`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`numFormation`);

--
-- Index pour la table `intervenant`
--
ALTER TABLE `intervenant`
  ADD PRIMARY KEY (`idIntervenant`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`idLieu`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`numSession`),
  ADD KEY `idintervenant` (`idIntervenant`),
  ADD KEY `idlieu` (`idLieu`),
  ADD KEY `numformation` (`numFormation`);

--
-- Index pour la table `sinscrire`
--
ALTER TABLE `sinscrire`
  ADD PRIMARY KEY (`idUtilisateur`,`numSession`),
  ADD KEY `numSession` (`numSession`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idStatus`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD KEY `idStatus` (`idStatus`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `numFormation` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `intervenant`
--
ALTER TABLE `intervenant`
  MODIFY `idIntervenant` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `idLieu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `numSession` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `idStatus` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concerne`
--
ALTER TABLE `concerne`
  ADD CONSTRAINT `concerne_ibfk_1` FOREIGN KEY (`numFormation`) REFERENCES `formation` (`numFormation`),
  ADD CONSTRAINT `fk_concerne` FOREIGN KEY (`idStatus`) REFERENCES `status` (`idStatus`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`idIntervenant`) REFERENCES `intervenant` (`idIntervenant`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`idLieu`) REFERENCES `lieu` (`idLieu`),
  ADD CONSTRAINT `session_ibfk_3` FOREIGN KEY (`numFormation`) REFERENCES `formation` (`numFormation`);

--
-- Contraintes pour la table `sinscrire`
--
ALTER TABLE `sinscrire`
  ADD CONSTRAINT `fk_sinscrire` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `sinscrire_ibfk_1` FOREIGN KEY (`numSession`) REFERENCES `session` (`numSession`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `status` (`idStatus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
