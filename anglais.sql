-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mai 2024 à 21:39
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `anglais`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

CREATE TABLE `absences` (
  `ID` int(11) NOT NULL,
  `ApprenantID` int(11) DEFAULT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `DateAbsence` date NOT NULL,
  `Raison` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `absences`
--

INSERT INTO `absences` (`ID`, `ApprenantID`, `Nom`, `Prenom`, `DateAbsence`, `Raison`) VALUES
(9, 52, 'Benteboula', 'Mohaned', '2024-05-22', 'malade');

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `AdminID` int(15) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `DateNaissance` date NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Telephone` int(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`AdminID`, `Nom`, `Prenom`, `DateNaissance`, `Adresse`, `Telephone`, `Email`, `Password`, `Role`) VALUES
(1, 'benteboula', 'benteboula', '2024-05-14', 'assss', 655165151, 'benteboula', 'benteboula', '');

-- --------------------------------------------------------

--
-- Structure de la table `apprenants`
--

CREATE TABLE `apprenants` (
  `ApprenantID` int(15) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `DateNaissance` date NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Telephone` int(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Cours` varchar(50) NOT NULL,
  `note` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apprenants`
--

INSERT INTO `apprenants` (`ApprenantID`, `Nom`, `Prenom`, `DateNaissance`, `Adresse`, `Telephone`, `Email`, `Password`, `Cours`, `note`) VALUES
(52, 'Benteboula', 'Mohaned', '2015-05-14', 'adreessss', 55842274, 'Mohaned@gmail.com', 'Mohaned', 'Speaking club', 0),
(54, 'benteboula', 'mohaned', '1995-06-21', '', 125874210, 'bms@gmail.com', '', 'General English Course', 0);

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE `class` (
  `idformation` int(11) NOT NULL,
  `nomforma` varchar(50) NOT NULL,
  `nbrheure` varchar(20) NOT NULL,
  `prix` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`idformation`, `nomforma`, `nbrheure`, `prix`) VALUES
(2, 'acadimic year diploma', '3h:20m', 7000),
(4, 'General English Course', '4h:00m', 4000),
(5, 'Ielts preparation', '3h:30m', 6000),
(6, 'Speaking club', '3h:50m', 1000),
(7, 'Business english', '5h:00m', 3000),
(8, 'English for kids', '4h:50m', 2000);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idcontact` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `obj` varchar(100) NOT NULL,
  `msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idcontact`, `nom`, `email`, `obj`, `msg`) VALUES
(5, 'benteboula', 'benteboula@gmail.com', 'avis du site web', 'je veut remercie pour votre attention');

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `idemploi` int(15) NOT NULL,
  `jour` varchar(15) NOT NULL,
  `Seance` varchar(50) NOT NULL,
  `formation` varchar(50) NOT NULL,
  `salle` varchar(15) NOT NULL,
  `Nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`idemploi`, `jour`, `Seance`, `formation`, `salle`, `Nom`) VALUES
(84, 'Mardi', '10:00-12:00', 'acadimic year diploma', 'salle1', 'Salim'),
(92, 'Dimanche', '10:00-12:00', 'acadimic year diploma', 'salle6', 'Mohamed'),
(95, 'Dimanche', '08:00-10:00', 'acadimic year diploma ', 'salle4', 'Islem '),
(96, 'Dimanche', '08:00-10:00', 'acadimic year diploma ', 'salle4', 'Ali');

-- --------------------------------------------------------

--
-- Structure de la table `exam`
--

CREATE TABLE `exam` (
  `idexam` int(20) NOT NULL,
  `nomforma` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `exsalle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `exam`
--

INSERT INTO `exam` (`idexam`, `nomforma`, `date`, `heure`, `exsalle`) VALUES
(4, 'acadimic year diploma', '2024-05-11', '23:47:00', 'salle3'),
(5, 'acadimic year diploma', '2024-05-11', '20:39:00', 'salle2'),
(6, 'Speaking club', '2024-05-23', '10:00:00', 'salle3');

-- --------------------------------------------------------

--
-- Structure de la table `formateurs`
--

CREATE TABLE `formateurs` (
  `FormateurID` int(15) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `DateNaissance` date NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Telephone` int(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `DiplomesCertifications` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formateurs`
--

INSERT INTO `formateurs` (`FormateurID`, `Nom`, `Prenom`, `DateNaissance`, `Adresse`, `Telephone`, `Email`, `Password`, `DiplomesCertifications`) VALUES
(18, 'Bougera', 'Mohamed', '2024-05-08', '', 4224502, 'mohamed@gmail.com', 'bent', 'docteur'),
(19, 'Benteboula', 'Mohamed', '2024-05-18', '', 5784252, 'bent@gmail.com', 'bms', 'docteur');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `idsalle` int(20) NOT NULL,
  `nomsalle` varchar(20) NOT NULL,
  `nbrplace` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`idsalle`, `nomsalle`, `nbrplace`) VALUES
(2, 'salle1', 20),
(3, 'salle2', 50),
(4, 'salle3', 20),
(5, 'salle4', 20),
(6, 'salle5', 20),
(7, 'salle6', 20),
(8, 'salle7', 20),
(9, 'salle8', 20),
(10, 'salle9', 100);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ApprenantID` (`ApprenantID`);

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Index pour la table `apprenants`
--
ALTER TABLE `apprenants`
  ADD PRIMARY KEY (`ApprenantID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`idformation`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idcontact`);

--
-- Index pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`idemploi`);

--
-- Index pour la table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`idexam`);

--
-- Index pour la table `formateurs`
--
ALTER TABLE `formateurs`
  ADD PRIMARY KEY (`FormateurID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idsalle`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absences`
--
ALTER TABLE `absences`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `AdminID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `apprenants`
--
ALTER TABLE `apprenants`
  MODIFY `ApprenantID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
  MODIFY `idformation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idcontact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `idemploi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `exam`
--
ALTER TABLE `exam`
  MODIFY `idexam` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `formateurs`
--
ALTER TABLE `formateurs`
  MODIFY `FormateurID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `idsalle` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `absences_ibfk_1` FOREIGN KEY (`ApprenantID`) REFERENCES `apprenants` (`ApprenantID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
