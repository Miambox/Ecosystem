-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mar 22 Janvier 2019 à 15:38
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ecosystem`
--

-- --------------------------------------------------------

--
-- Structure de la table `communication`
--

CREATE TABLE `communication` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `valeur` varchar(2500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(2500) NOT NULL,
  `reponse` varchar(2500) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `valeur` int(11) NOT NULL,
  `id_objet` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `information`
--

INSERT INTO `information` (`id`, `date`, `heure`, `valeur`, `id_objet`) VALUES
(1, '2018-11-02', '10:22:22', 20, 1),
(2, '2019-11-02', '10:22:22', 25, 1),
(3, '2019-11-02', '10:22:22', 25, 1),
(4, '2019-11-02', '10:22:22', 25, 1),
(5, '2019-11-02', '10:22:22', 25, 1),
(6, '2019-11-02', '10:22:22', 25, 1),
(7, '2019-11-02', '10:22:22', 25, 1),
(8, '2019-11-02', '10:22:22', 25, 1),
(9, '2019-11-02', '10:22:22', 25, 1),
(10, '2019-11-02', '10:22:22', 25, 1),
(11, '2019-11-02', '10:22:22', 25, 1),
(12, '2019-11-02', '10:22:22', 25, 1),
(13, '2019-11-02', '10:22:22', 25, 1),
(14, '2019-11-02', '10:22:22', 25, 1),
(15, '2019-11-02', '10:22:22', 25, 1),
(16, '2019-11-02', '10:22:22', 25, 1),
(17, '2019-11-02', '10:22:22', 25, 1),
(18, '2019-11-02', '10:22:22', 25, 1),
(19, '2019-11-02', '10:22:22', 25, 1),
(20, '2019-11-02', '10:22:22', 25, 1),
(21, '2019-11-02', '10:22:22', 25, 1),
(22, '2019-11-02', '10:22:22', 25, 1),
(23, '2019-11-02', '10:22:22', 25, 1),
(24, '2019-11-02', '10:22:22', 25, 1),
(25, '2019-11-02', '10:22:22', 25, 1),
(26, '2019-11-02', '10:22:22', 25, 1),
(27, '2019-11-02', '10:22:22', 25, 1),
(28, '2019-11-02', '10:22:22', 25, 1),
(29, '2019-11-02', '10:22:22', 25, 1),
(30, '2019-11-02', '10:22:22', 30, 1),
(31, '2019-11-02', '10:22:22', 25, 1),
(32, '2019-11-02', '10:22:22', 25, 1),
(33, '2019-11-02', '10:22:22', 25, 1),
(34, '2019-11-02', '10:22:22', 25, 1),
(35, '2019-11-02', '10:22:22', 25, 1),
(36, '2019-11-02', '10:22:22', 25, 1),
(37, '2019-11-02', '10:22:22', 25, 1),
(38, '2019-11-02', '10:22:22', 30, 1),
(39, '2019-11-02', '10:22:22', 25, 1),
(40, '2019-11-02', '10:22:22', 25, 1),
(41, '2019-11-02', '10:22:22', 25, 1),
(42, '2019-11-02', '10:22:22', 25, 1),
(43, '2019-11-02', '10:22:22', 25, 1),
(44, '2019-11-02', '10:22:22', 25, 1),
(45, '2019-11-02', '10:22:22', 25, 1),
(46, '2019-11-02', '10:22:22', 30, 1),
(47, '2019-11-02', '10:22:22', 25, 1),
(48, '2019-11-02', '10:22:22', 25, 1),
(49, '2019-11-02', '10:22:22', 25, 1),
(50, '2019-11-02', '10:22:22', 25, 1),
(51, '2019-11-02', '10:22:22', 25, 1),
(52, '2019-11-02', '10:22:22', 25, 1),
(53, '2019-11-02', '10:22:22', 25, 1),
(54, '2019-11-02', '10:22:22', 30, 1),
(55, '2019-11-02', '10:22:22', 35, 1);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id` int(11) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `complement_adresse` varchar(250) DEFAULT NULL,
  `nbr_habitant` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `annee_construction` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id`, `photo`, `numero`, `rue`, `ville`, `code_postal`, `complement_adresse`, `nbr_habitant`, `surface`, `annee_construction`, `id_utilisateur`) VALUES
(3, NULL, 16, 'rue de la Chapelle', 'Paris', 75018, '3ème étage', 2, 50, 1988, 1),
(4, NULL, 100, 'de la Chapelle', 'Paris', 75018, '27ème étage', 5, 60, 1900, 9),
(12, NULL, 1345, 'DFN ERK', '?HNEZHK', 3546547, NULL, 646474, 32, 3468743, 1),
(13, NULL, 12, 'sdn,ze', 'Paris', 2345, NULL, 12234, 122, 995, 1),
(14, NULL, 1, 'azeef', 'qdsqdfs', 8, NULL, 3, 4, -2, 1),
(15, NULL, 17, 'Rue Chaptal', 'Levallois-Perret', 92300, NULL, 120, 300, 1986, 3),
(16, NULL, 15, 'Clemenceay', 'Paris', 75009, NULL, 3, 50, 0, 3),
(17, NULL, 26, 'des perpigons', 'Paris', 75006, NULL, 1, 50, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `mentionsLegales`
--

CREATE TABLE `mentionsLegales` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `texte` varchar(2500) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mode`
--

CREATE TABLE `mode` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) COLLATE utf8_bin NOT NULL,
  `valeur` int(11) NOT NULL,
  `etat` varchar(250) COLLATE utf8_bin NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `mode`
--

INSERT INTO `mode` (`id`, `nom`, `valeur`, `etat`, `id_utilisateur`) VALUES
(4, 'Tamisé', 12, 'Arrêt', 1),
(5, 'Travail', 34, 'Arrêt', 1),
(6, 'illumination Max', 100, 'Arrêt', 1),
(7, 'Tamis&eacute;', 50, '', 5);

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE `objet` (
  `id` int(11) NOT NULL,
  `numero_ref` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `etat` varchar(250) NOT NULL,
  `id_type_objet` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `objet`
--

INSERT INTO `objet` (`id`, `numero_ref`, `nom`, `etat`, `id_type_objet`, `id_piece`) VALUES
(1, 209876, 'ecolight-lucas', 'marche', 1, 2),
(2, 209877, 'ecolight-lucas', 'marche', 1, 1),
(3, 123455, 'Capteur Lumirère', 'marche', 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `partagelogement`
--

CREATE TABLE `partagelogement` (
  `id` int(11) NOT NULL,
  `lien` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `id_logement` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partagepiece`
--

CREATE TABLE `partagepiece` (
  `id` int(11) NOT NULL,
  `lien` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `id_piece` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `surface` int(11) NOT NULL,
  `etage` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `id_logement` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`id`, `nom`, `surface`, `etage`, `type`, `id_logement`) VALUES
(1, 'salon', 5, 0, 'salon', 12),
(2, 'salle de bain', 2, 0, 'salle de bain', 3),
(3, 'Salon 1', 3, 2, 'Salon', 13),
(4, 'Salon 1', 3, 2, 'Salon', 14),
(5, 'Chambre 1', 28, 3, 'Salon', 3),
(6, 'Salon', 23, 2, 'Salon', 13),
(7, 'Salon', 23, 2, 'Salon', 12),
(8, 'Cuisine', 32, 2, 'Cuisine', 12),
(9, 'Salle à manger', 10, 0, 'Salle à manger', 3),
(10, 'Dupont', 30, 0, 'Salon', 15);

-- --------------------------------------------------------

--
-- Structure de la table `programmationhoraire`
--

CREATE TABLE `programmationhoraire` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `id_objet` int(11) NOT NULL,
  `id_mode` int(11) NOT NULL,
  `etat` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `programmationhoraire`
--

INSERT INTO `programmationhoraire` (`id`, `date`, `heure_debut`, `heure_fin`, `id_objet`, `id_mode`, `etat`) VALUES
(5, '2019-02-04', '12:34:00', '14:56:00', 1, 6, NULL),
(6, '1998-11-24', '23:34:00', '22:34:00', 1, 6, 'on'),
(7, '0000-00-00', '00:00:00', '00:00:00', 1, 4, NULL),
(8, '0000-00-00', '00:00:00', '00:00:00', 1, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `texte` varchar(2500) NOT NULL,
  `id_information` int(11) NOT NULL,
  `id_objet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typeobjet`
--

CREATE TABLE `typeobjet` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `unite_mesure` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typeobjet`
--

INSERT INTO `typeobjet` (`id`, `nom`, `unite_mesure`) VALUES
(1, 'photoelectrique', 'lum');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `date_naissance` date NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `tel_portable` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `question_securite` varchar(250) NOT NULL,
  `reponse_securite` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `date_naissance`, `photo`, `tel_portable`, `mail`, `mot_de_passe`, `question_securite`, `reponse_securite`, `type`) VALUES
(1, 'Perrault', 'Lucas', '1998-11-24', NULL, 679214610, 'luperrau@gmail.com', 'lucas', 'Quel est mon prenom', 'lucas', 'utilisateur'),
(3, 'Perrault', 'Charles', '1703-05-16', NULL, 666666666, 'charles.perrault@mail.com', 'perrault', 'Quel est votre nom ?', 'Perrault', 'utilisateur'),
(4, 'Forterre', 'Guyonne', '1998-02-19', NULL, 679209878, 'guyonne.forterre@gmail.com', 'guyonne', 'Quel est votre prénom ?', 'Guyonne', 'utilisateur'),
(5, '', '', '0000-00-00', NULL, 0, 'ecosystem.admin@gmail.com', 'adminadmin', '', '', 'administrateur'),
(9, 'Ly', 'Félix', '1998-06-26', NULL, 666666666, 'felixly98@gmail.com', 'felix', '?', '?', 'utilisateur'),
(10, 'Antoinette', 'Marie', '1755-11-02', NULL, 600123456, 'marie@mail.com', '??z6??Nhp????d;???S00?<??', 'Quel est votre nom ?', 'Antoinette', 'utilisateur'),
(11, 'Ly', 'F&eacute;lix', '0000-00-00', NULL, 0, 'felixly98@gmail.com', 'felix', '', '', 'service_apr&egrave;s_vente');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `communication`
--
ALTER TABLE `communication`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_objet` (`id_objet`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `mentionsLegales`
--
ALTER TABLE `mentionsLegales`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_expediteur`),
  ADD KEY `destinataire` (`id_destinataire`);

--
-- Index pour la table `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `objet`
--
ALTER TABLE `objet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type_objet`),
  ADD KEY `id_piece` (`id_piece`);

--
-- Index pour la table `partagelogement`
--
ALTER TABLE `partagelogement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_logement` (`id_logement`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `partagepiece`
--
ALTER TABLE `partagepiece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_piece` (`id_piece`),
  ADD KEY `id_logement` (`id_logement`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_logement` (`id_logement`);

--
-- Index pour la table `programmationhoraire`
--
ALTER TABLE `programmationhoraire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_objet` (`id_objet`),
  ADD KEY `id_mode` (`id_mode`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_information` (`id_information`),
  ADD KEY `id_objet` (`id_objet`);

--
-- Index pour la table `typeobjet`
--
ALTER TABLE `typeobjet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `communication`
--
ALTER TABLE `communication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `mentionsLegales`
--
ALTER TABLE `mentionsLegales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mode`
--
ALTER TABLE `mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `objet`
--
ALTER TABLE `objet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `partagelogement`
--
ALTER TABLE `partagelogement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `partagepiece`
--
ALTER TABLE `partagepiece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `programmationhoraire`
--
ALTER TABLE `programmationhoraire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typeobjet`
--
ALTER TABLE `typeobjet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_expediteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_destinataire`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `mode`
--
ALTER TABLE `mode`
  ADD CONSTRAINT `mode_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `objet_ibfk_1` FOREIGN KEY (`id_type_objet`) REFERENCES `typeobjet` (`id`),
  ADD CONSTRAINT `objet_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `partagelogement`
--
ALTER TABLE `partagelogement`
  ADD CONSTRAINT `partagelogement_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`),
  ADD CONSTRAINT `partagelogement_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `partagepiece`
--
ALTER TABLE `partagepiece`
  ADD CONSTRAINT `partagepiece_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`),
  ADD CONSTRAINT `partagepiece_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id`);

--
-- Contraintes pour la table `programmationhoraire`
--
ALTER TABLE `programmationhoraire`
  ADD CONSTRAINT `programmationhoraire_ibfk_1` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`),
  ADD CONSTRAINT `programmationhoraire_ibfk_2` FOREIGN KEY (`id_mode`) REFERENCES `mode` (`id`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_information`) REFERENCES `information` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`);
