-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 22 Juin 2018 à 21:58
-- Version du serveur :  5.7.22-0ubuntu0.17.10.1
-- Version de PHP :  7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `voiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `conso`
--

CREATE TABLE `conso` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `maximum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `conso`
--

INSERT INTO `conso` (`id`, `nom`, `maximum`) VALUES
(1, 'A', 4.2),
(2, 'B', 5.5),
(3, 'C', 6.7),
(4, 'D', 8),
(5, 'E', 9.3),
(6, 'F', 10.5),
(7, 'G', 100);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id`, `nom`) VALUES
(1, 'Ferrari'),
(2, 'Lamborghini'),
(3, 'Citroën'),
(4, 'Ford'),
(5, 'Chevrolet'),
(6, 'Land Rover'),
(7, 'BMW'),
(8, 'Bentley'),
(9, 'TVR'),
(10, 'Lotus'),
(11, 'Honda');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `classe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `classe`) VALUES
(1, 'Citadine'),
(2, 'Berline'),
(3, 'Cabriolet'),
(4, 'Supercar'),
(5, 'Muscle car'),
(6, 'Luxe'),
(7, '4x4'),
(8, 'Hypercar'),
(9, 'Break');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `annee` int(4) NOT NULL,
  `puissance` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `vitesse_max` int(11) NOT NULL,
  `acceleration` float NOT NULL,
  `consommation` float NOT NULL,
  `co2` int(5) NOT NULL,
  `marque` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`id`, `modele`, `annee`, `puissance`, `poids`, `image`, `vitesse_max`, `acceleration`, `consommation`, `co2`, `marque`, `type`) VALUES
(1, 'C3', 2016, 100, 1090, 'c3.jpg', 181, 11.1, 3.7, 95, 3, 1),
(2, 'LaFerrari', 2013, 963, 1350, 'laferrari.jpg', 349, 2.6, 14.2, 330, 1, 8),
(3, 'Huracan Performante', 2017, 640, 1382, 'huracan.jpg', 328, 2.8, 13.7, 314, 2, 4),
(4, 'Mustang Convertible', 2014, 421, 1740, 'mustang.jpg', 239, 5.6, 12.4, 184, 4, 3),
(5, 'Impala', 1967, 195, 1655, 'impala.jpg', 165, 13.1, 18, 0, 5, 5),
(6, 'Evoque', 2012, 150, 1520, 'evoque.jpg', 180, 10.7, 5, 133, 6, 7),
(7, 'M3', 2000, 343, 1495, 'm3.jpg', 289, 5.2, 11.9, 287, 7, 2),
(8, 'Continental GT', 2003, 560, 2425, 'continentalgt.jpg', 318, 5.2, 16.6, 396, 8, 6),
(9, 'C4 picasso', 2013, 156, 1296, 'picasso.jpg', 209, 10.6, 6, 139, 3, 9),
(10, 'Centenario', 2016, 770, 1520, 'centenario.jpg', 350, 2.8, 10.7, 370, 2, 8);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `conso`
--
ALTER TABLE `conso`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `marque` (`marque`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `conso`
--
ALTER TABLE `conso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`marque`) REFERENCES `marque` (`id`),
  ADD CONSTRAINT `voiture_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
