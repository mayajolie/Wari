-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 01 Juillet 2019 à 09:39
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Universite`
--

-- --------------------------------------------------------

--
-- Structure de la table `Batiments`
--

CREATE TABLE `Batiments` (
  `id_batiment` int(11) NOT NULL,
  `nom_batiment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Batiments`
--

INSERT INTO `Batiments` (`id_batiment`, `nom_batiment`) VALUES
(1, 'PavillonA'),
(2, 'PavillonB'),
(3, 'PavillonC');

-- --------------------------------------------------------

--
-- Structure de la table `Boursiers`
--

CREATE TABLE `Boursiers` (
  `id_etudiant` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Boursiers`
--

INSERT INTO `Boursiers` (`id_etudiant`, `id_type`) VALUES
(77, 1),
(84, 1),
(86, 1),
(90, 1),
(94, 1),
(78, 2),
(82, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Chambres`
--

CREATE TABLE `Chambres` (
  `id_chambre` int(11) NOT NULL,
  `id_batiment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Chambres`
--

INSERT INTO `Chambres` (`id_chambre`, `id_batiment`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `nom_etudiant` varchar(255) NOT NULL,
  `prenom_etudiant` varchar(255) NOT NULL,
  `date_naiss` date NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Etudiant`
--

INSERT INTO `Etudiant` (`id_etudiant`, `matricule`, `nom_etudiant`, `prenom_etudiant`, `date_naiss`, `telephone`, `email`) VALUES
(77, '44528495', 'Ngom', 'Mouhamed', '1990-08-23', 775349973, 'momo@gmail.com'),
(78, '47525014', 'ngom', 'mariama', '1995-01-28', 772918604, 'maya@gmail.com'),
(80, '81926509', 'ndir', 'betty', '2000-01-27', 781736518, 'bety@gmail.com'),
(82, '19002918', 'bb', 'sokhna', '2017-08-23', 771479013, 'bb@gmail.com'),
(83, '70353423', 'ngom', 'junior', '1993-04-04', 776418887, 'junior@gmail.com'),
(84, '26652256', 'diouf', 'fatou', '1996-01-25', 778954621, 'fatou@gmail.com'),
(86, '89886085', 'ngom', 'ndeye', '1986-12-24', 775534635, 'ndeye@gmail.com'),
(87, '36392667', 'gaye', 'babacar', '1986-12-24', 775534635, 'ndeye@gmail.com'),
(88, '67272297', 'ngom', 'Alioune', '2019-06-29', 7714758, 'aliou@gmail.com'),
(90, '49123002', 'ly', 'yaya', '1582-02-02', 77658412, 'ly@gmail.com'),
(92, '57249134', 'lena', 'mane', '2019-07-14', 77658245, 'lena@gmail.com'),
(94, '6584132', 'drame', 'aminata', '2019-07-27', 778659847, 'mina@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `Logers`
--

CREATE TABLE `Logers` (
  `id_etudiant` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Logers`
--

INSERT INTO `Logers` (`id_etudiant`, `id_chambre`) VALUES
(78, 1),
(77, 2),
(86, 3),
(88, 3),
(94, 5);

-- --------------------------------------------------------

--
-- Structure de la table `Non_boursiers`
--

CREATE TABLE `Non_boursiers` (
  `id_etudiant` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Non_boursiers`
--

INSERT INTO `Non_boursiers` (`id_etudiant`, `adresse`) VALUES
(80, 'Nguinth'),
(83, 'Pikine'),
(87, 'parcelle'),
(88, 'dakar'),
(92, 'dakar');

-- --------------------------------------------------------

--
-- Structure de la table `Types`
--

CREATE TABLE `Types` (
  `id_type` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Types`
--

INSERT INTO `Types` (`id_type`, `libelle`) VALUES
(1, 'Entier'),
(2, 'Demi');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Batiments`
--
ALTER TABLE `Batiments`
  ADD PRIMARY KEY (`id_batiment`);

--
-- Index pour la table `Boursiers`
--
ALTER TABLE `Boursiers`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `Chambres`
--
ALTER TABLE `Chambres`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_batiment` (`id_batiment`);

--
-- Index pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `Logers`
--
ALTER TABLE `Logers`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- Index pour la table `Non_boursiers`
--
ALTER TABLE `Non_boursiers`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `Types`
--
ALTER TABLE `Types`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Batiments`
--
ALTER TABLE `Batiments`
  MODIFY `id_batiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Chambres`
--
ALTER TABLE `Chambres`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT pour la table `Types`
--
ALTER TABLE `Types`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Boursiers`
--
ALTER TABLE `Boursiers`
  ADD CONSTRAINT `Boursiers_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `Etudiant` (`id_etudiant`),
  ADD CONSTRAINT `Boursiers_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `Types` (`id_type`);

--
-- Contraintes pour la table `Chambres`
--
ALTER TABLE `Chambres`
  ADD CONSTRAINT `Chambres_ibfk_1` FOREIGN KEY (`id_batiment`) REFERENCES `Batiments` (`id_batiment`);

--
-- Contraintes pour la table `Logers`
--
ALTER TABLE `Logers`
  ADD CONSTRAINT `Logers_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `Etudiant` (`id_etudiant`),
  ADD CONSTRAINT `Logers_ibfk_2` FOREIGN KEY (`id_chambre`) REFERENCES `Chambres` (`id_chambre`);

--
-- Contraintes pour la table `Non_boursiers`
--
ALTER TABLE `Non_boursiers`
  ADD CONSTRAINT `Non_boursiers_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `Etudiant` (`id_etudiant`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
