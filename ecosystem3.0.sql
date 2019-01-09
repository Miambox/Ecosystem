-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 18, 2018 at 01:03 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecosystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `communication`
--

CREATE TABLE `communication` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `valeur` varchar(2500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(2500) NOT NULL,
  `reponse` varchar(2500) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `valeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logement`
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
  `annee_construction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logement`
--

INSERT INTO `logement` (`id`, `photo`, `numero`, `rue`, `ville`, `code_postal`, `complement_adresse`, `nbr_habitant`, `surface`, `annee_construction`) VALUES
(1, NULL, 16, 'desnouettes', 'Paris', 75015, NULL, 1, 14, 1996);

-- --------------------------------------------------------

--
-- Table structure for table `message`
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
-- Table structure for table `mode`
--

CREATE TABLE `mode` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) COLLATE utf8_bin NOT NULL,
  `valeur` int(11) NOT NULL,
  `etat` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `objet`
--

CREATE TABLE `objet` (
  `id` int(11) NOT NULL,
  `numero_ref` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `etat` varchar(250) NOT NULL,
  `id_type_objet` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objet`
--

INSERT INTO `objet` (`id`, `numero_ref`, `nom`, `etat`, `id_type_objet`, `id_piece`) VALUES
(1, 209876, 'ecolight-lucas', 'marche', 1, 2),
(2, 209877, 'ecolight-lucas', 'marche', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `partagelogement`
--

CREATE TABLE `partagelogement` (
  `id` int(11) NOT NULL,
  `lien` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `id_logement` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partagelogement`
--

INSERT INTO `partagelogement` (`id`, `lien`, `date`, `id_logement`, `id_utilisateur`) VALUES
(2, 'proprietaire', '2016-02-14', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `partagepiece`
--

CREATE TABLE `partagepiece` (
  `id` int(11) NOT NULL,
  `lien` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `id_piece` int(11) NOT NULL,
  `id_logement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partagepiece`
--

INSERT INTO `partagepiece` (`id`, `lien`, `date`, `id_piece`, `id_logement`) VALUES
(1, 'proprietaire', '2018-12-04', 1, 1),
(2, 'proprietaire', '2018-12-12', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `surface` int(11) NOT NULL,
  `etage` int(11) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piece`
--

INSERT INTO `piece` (`id`, `nom`, `surface`, `etage`, `type`) VALUES
(1, 'salon', 5, 0, 'salon'),
(2, 'salle de bain', 2, 0, 'salle de bain');

-- --------------------------------------------------------

--
-- Table structure for table `programmationhoraire`
--

CREATE TABLE `programmationhoraire` (
  `id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `id_objet` int(11) NOT NULL,
  `id_mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
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
-- Table structure for table `typeobjet`
--

CREATE TABLE `typeobjet` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `unite_mesure` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeobjet`
--

INSERT INTO `typeobjet` (`id`, `nom`, `unite_mesure`) VALUES
(1, 'photoelectrique', 'lum');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
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
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `date_naissance`, `photo`, `tel_portable`, `mail`, `mot_de_passe`, `question_securite`, `reponse_securite`, `type`) VALUES
(1, 'Perrault', 'Lucas', '1998-11-24', NULL, 679214610, 'luperrau@gmail.com', 'lucas', 'Quel est mon prenom', 'lucas', 0),
(2, 'Feller', 'Herve', '1990-02-11', NULL, 679209878, 'hervefeller@gmail.com', 'herve', 'Quel est mon prenom ?', 'herve', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `communication`
--
ALTER TABLE `communication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_expediteur`),
  ADD KEY `destinataire` (`id_destinataire`);

--
-- Indexes for table `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objet`
--
ALTER TABLE `objet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type_objet`),
  ADD KEY `id_piece` (`id_piece`);

--
-- Indexes for table `partagelogement`
--
ALTER TABLE `partagelogement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_logement` (`id_logement`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `partagepiece`
--
ALTER TABLE `partagepiece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_piece` (`id_piece`),
  ADD KEY `id_logement` (`id_logement`);

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmationhoraire`
--
ALTER TABLE `programmationhoraire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_objet` (`id_objet`),
  ADD KEY `id_mode` (`id_mode`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_information` (`id_information`),
  ADD KEY `id_objet` (`id_objet`);

--
-- Indexes for table `typeobjet`
--
ALTER TABLE `typeobjet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `communication`
--
ALTER TABLE `communication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mode`
--
ALTER TABLE `mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `objet`
--
ALTER TABLE `objet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `partagelogement`
--
ALTER TABLE `partagelogement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `partagepiece`
--
ALTER TABLE `partagepiece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `programmationhoraire`
--
ALTER TABLE `programmationhoraire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typeobjet`
--
ALTER TABLE `typeobjet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_expediteur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_destinataire`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `objet_ibfk_1` FOREIGN KEY (`id_type_objet`) REFERENCES `typeobjet` (`id`),
  ADD CONSTRAINT `objet_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id`);

--
-- Constraints for table `partagelogement`
--
ALTER TABLE `partagelogement`
  ADD CONSTRAINT `partagelogement_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`),
  ADD CONSTRAINT `partagelogement_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `partagepiece`
--
ALTER TABLE `partagepiece`
  ADD CONSTRAINT `partagepiece_ibfk_1` FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id`),
  ADD CONSTRAINT `partagepiece_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id`);

--
-- Constraints for table `programmationhoraire`
--
ALTER TABLE `programmationhoraire`
  ADD CONSTRAINT `programmationhoraire_ibfk_1` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`),
  ADD CONSTRAINT `programmationhoraire_ibfk_2` FOREIGN KEY (`id_mode`) REFERENCES `mode` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_information`) REFERENCES `information` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
