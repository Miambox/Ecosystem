-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Nov 20, 2018 at 01:14 PM
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
  `IDCommunication` int(11) NOT NULL,
  `Nom` varchar(250) NOT NULL,
  `Valeur` varchar(2500) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `IDFaq` int(11) NOT NULL,
  `Question` varchar(2500) NOT NULL,
  `Reponse` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `IDInformation` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `Valeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logement`
--

CREATE TABLE `logement` (
  `IDLogement` int(11) NOT NULL,
  `Photo` varchar(250) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Rue` varchar(100) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `codePostal` int(5) NOT NULL,
  `complementAdresse` varchar(250) NOT NULL,
  `nbrHabitant` int(11) NOT NULL,
  `Surface` int(11) NOT NULL,
  `anneeConstruction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `IDMessage` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `Texte` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `objet`
--

CREATE TABLE `objet` (
  `IDObjet` int(11) NOT NULL,
  `numeroRef` int(11) NOT NULL,
  `Nom` varchar(250) NOT NULL,
  `Etat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partagelogement`
--

CREATE TABLE `partagelogement` (
  `IDpartageLogement` int(11) NOT NULL,
  `Lien` varchar(250) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partagepiece`
--

CREATE TABLE `partagepiece` (
  `IDPartageLogement` int(11) NOT NULL,
  `Lien` varchar(250) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `IDPiece` int(11) NOT NULL,
  `Nom` varchar(250) NOT NULL,
  `Surface` int(11) NOT NULL,
  `Etage` int(11) NOT NULL,
  `Type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programmationhoraire`
--

CREATE TABLE `programmationhoraire` (
  `IDProgrammationHoraire` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `IDTicket` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `Texte` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typeobjet`
--

CREATE TABLE `typeobjet` (
  `IDType` int(11) NOT NULL,
  `Nom` varchar(250) NOT NULL,
  `uniteMesure` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IDUtilisateur` int(11) NOT NULL,
  `Nom` varchar(250) NOT NULL,
  `Prenom` varchar(250) NOT NULL,
  `dateNaissance` date NOT NULL,
  `Photo` varchar(250) NOT NULL,
  `telPortable` int(11) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `motDePasse` varchar(250) NOT NULL,
  `questionSecurite` varchar(250) NOT NULL,
  `reponseSecurite` varchar(250) NOT NULL,
  `Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `communication`
--
ALTER TABLE `communication`
  ADD PRIMARY KEY (`IDCommunication`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`IDFaq`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`IDInformation`);

--
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`IDLogement`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`IDMessage`);

--
-- Indexes for table `objet`
--
ALTER TABLE `objet`
  ADD PRIMARY KEY (`IDObjet`);

--
-- Indexes for table `partagelogement`
--
ALTER TABLE `partagelogement`
  ADD PRIMARY KEY (`IDpartageLogement`);

--
-- Indexes for table `partagepiece`
--
ALTER TABLE `partagepiece`
  ADD PRIMARY KEY (`IDPartageLogement`);

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`IDPiece`);

--
-- Indexes for table `programmationhoraire`
--
ALTER TABLE `programmationhoraire`
  ADD PRIMARY KEY (`IDProgrammationHoraire`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`IDTicket`);

--
-- Indexes for table `typeobjet`
--
ALTER TABLE `typeobjet`
  ADD PRIMARY KEY (`IDType`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDUtilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `communication`
--
ALTER TABLE `communication`
  MODIFY `IDCommunication` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `IDFaq` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `IDInformation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logement`
--
ALTER TABLE `logement`
  MODIFY `IDLogement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `IDMessage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `objet`
--
ALTER TABLE `objet`
  MODIFY `IDObjet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `partagelogement`
--
ALTER TABLE `partagelogement`
  MODIFY `IDpartageLogement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `partagepiece`
--
ALTER TABLE `partagepiece`
  MODIFY `IDPartageLogement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `IDPiece` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programmationhoraire`
--
ALTER TABLE `programmationhoraire`
  MODIFY `IDProgrammationHoraire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `IDTicket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typeobjet`
--
ALTER TABLE `typeobjet`
  MODIFY `IDType` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDUtilisateur` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
