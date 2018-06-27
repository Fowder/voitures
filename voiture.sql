-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 27 Juin 2018 à 15:14
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
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_favoris` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_voiture` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `favoris`
--

INSERT INTO `favoris` (`id_favoris`, `id_user`, `id_voiture`, `date`) VALUES
(78, 2, 8, '2018-06-26 07:57:45'),
(79, 2, 2, '2018-06-26 07:57:49'),
(80, 2, 4, '2018-06-26 07:57:53'),
(81, 1, 6, '2018-06-27 12:22:19');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id_marque` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id_marque`, `nom`) VALUES
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
(11, 'Honda'),
(12, 'Bugatti'),
(13, 'Koenigsegg'),
(14, 'Porsche'),
(15, 'Renault');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `classe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `classe`) VALUES
(1, 'Citadine'),
(2, 'Berline'),
(3, 'Cabriolet'),
(4, 'Supercar'),
(5, 'Muscle car'),
(6, 'Luxe'),
(7, '4x4'),
(8, 'Hypercar'),
(9, 'Break'),
(10, 'Coupé');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `cars` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `admin`, `cars`) VALUES
(1, 'Fowder', 'emile.troccaz@hotmail.com', 'Foudre46', 1, 65),
(2, 'Test', 'pokevend@gmail.com', 'Test', 0, 43);

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
  `type` int(11) NOT NULL,
  `modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`id`, `modele`, `annee`, `puissance`, `poids`, `image`, `vitesse_max`, `acceleration`, `consommation`, `co2`, `marque`, `type`, `modif`) VALUES
(2, 'LaFerrari', 2013, 963, 1350, 'laferrari.jpg', 349, 2.6, 14.2, 330, 1, 2, '2018-06-25 13:25:52'),
(3, 'Continental GT', 2003, 560, 2425, 'continentalgt.jpg', 318, 5.2, 16.6, 396, 8, 6, '2018-06-25 13:25:51'),
(4, 'Huracan Performante', 2017, 640, 1382, 'huracanperformante.jpg', 328, 2.8, 13.7, 314, 2, 4, '2018-06-26 12:09:46'),
(5, 'Centenario', 2016, 770, 1520, 'centenario.jpg', 350, 2.8, 0, 0, 2, 8, '2018-06-25 13:25:51'),
(6, 'M3', 2000, 343, 1495, 'm3.jpg', 253, 5.2, 11.9, 287, 7, 2, '2018-06-25 13:25:51'),
(7, 'C3', 2016, 100, 1090, 'c3.jpg', 181, 11.1, 3.7, 95, 3, 1, '2018-06-25 13:25:51'),
(8, 'C4 Picasso', 2013, 156, 1296, 'picasso.jpg', 209, 10.2, 6, 139, 3, 9, '2018-06-25 13:25:51'),
(9, 'Mustang Convertible', 2014, 317, 1640, 'mustang.jpg', 250, 6.4, 8.2, 184, 4, 3, '2018-06-25 13:25:51'),
(10, 'Evoque', 2012, 150, 1520, 'evoque.jpg', 180, 10.7, 5, 133, 6, 7, '2018-06-25 13:25:51'),
(13, 'Camaro ZL1 1LE', 2017, 659, 1733, 'camarozl11le.jpg', 306, 3.7, 14.7, 0, 5, 5, '2018-06-26 08:00:51'),
(14, 'Fiesta', 2011, 95, 1025, 'fiesta.jpg', 173, 12.3, 4.1, 107, 4, 1, '2018-06-26 08:03:47'),
(15, 'Chiron', 2016, 1500, 1920, 'chiron.jpg', 420, 2.5, 22.5, 516, 12, 8, '2018-06-26 08:22:54'),
(16, 'Elise', 2004, 192, 860, 'elise.jpg', 235, 5.5, 8.8, 208, 10, 3, '2018-06-26 10:01:47'),
(17, 'Agera RS', 2017, 1360, 1295, 'agerars.jpg', 447, 2.8, 0, 0, 13, 8, '2018-06-26 10:20:27'),
(18, 'GT3RS', 2006, 415, 1375, 'gt3rs.jpg', 318, 4.3, 12.8, 307, 14, 4, '2018-06-26 10:31:35'),
(19, 'Huracan LP 610-4', 2014, 610, 1422, 'huracanlp610-4.jpg', 325, 3.2, 9.4, 290, 2, 4, '2018-06-26 12:14:53'),
(20, 'LP 700-4', 2014, 700, 1575, 'aventadorlp700-4.jpg', 350, 2.9, 10.7, 370, 2, 4, '2018-06-26 12:14:15'),
(21, 'Diablo SV', 1999, 530, 1530, 'diablosv.jpg', 320, 3.8, 17.3, 0, 2, 4, '2018-06-26 12:16:51'),
(22, 'Gallardo', 2003, 519, 1430, 'gallardo.jpg', 315, 4, 13.9, 450, 2, 4, '2018-06-26 12:19:08'),
(23, 'Murcielago', 2001, 580, 1625, 'murcielago.jpg', 330, 3.8, 0, 0, 2, 4, '2018-06-26 12:20:29'),
(24, '360 Modena', 1999, 400, 1290, '360modena.jpg', 295, 4.5, 12, 0, 1, 4, '2018-06-26 12:23:34'),
(25, '456 GT', 1994, 442, 1690, '456gt.jpg', 309, 5.2, 11.6, 0, 1, 4, '2018-06-26 12:25:43'),
(26, '458 Italia', 2010, 570, 1485, '458italia.jpg', 325, 3.4, 9.7, 307, 1, 4, '2018-06-26 12:28:03'),
(27, '488 GTB', 2015, 670, 1475, '488gtb.jpg', 330, 3, 8.6, 277, 1, 4, '2018-06-26 12:29:45'),
(28, '512 TR', 1985, 428, 1630, '512tr.jpg', 314, 5.4, 0, 0, 1, 4, '2018-06-26 12:31:29'),
(29, '550 Maranello', 2001, 485, 1690, '550maranello.jpg', 320, 4.4, 15.5, 0, 1, 4, '2018-06-26 12:33:31'),
(30, '575 M Maranello', 2002, 515, 1730, '575mmaranello.jpg', 325, 4.2, 15.5, 499, 1, 4, '2018-06-26 13:05:44'),
(31, '599 GTB Fiorano', 2006, 620, 1690, '599gtbfiorano.jpg', 330, 3.7, 14.7, 490, 1, 4, '2018-06-26 13:07:30'),
(32, '612 Scaglietti', 2004, 540, 1840, '612scaglietti.jpg', 320, 4.2, 14, 475, 1, 4, '2018-06-26 13:09:01'),
(33, '812 Superfast', 2017, 800, 1630, '812superfast.jpg', 340, 2.9, 0, 340, 1, 4, '2018-06-26 13:11:28'),
(34, 'California', 2008, 460, 1735, 'california.jpg', 310, 4, 9.4, 299, 1, 3, '2018-06-26 13:13:21'),
(35, 'California T', 2015, 560, 1730, 'californiat.jpg', 316, 3.6, 8.2, 251, 1, 3, '2018-06-26 13:14:35'),
(36, 'F12 Berlinetta', 2012, 741, 1630, 'f12berlinetta.jpg', 340, 3.1, 11.3, 380, 1, 4, '2018-06-26 13:17:01'),
(37, 'F430', 2004, 489, 1450, 'f430.jpg', 315, 4, 13.3, 420, 1, 4, '2018-06-26 13:18:31'),
(38, 'FF', 2012, 690, 1880, 'ff.jpg', 335, 3.7, 0, 380, 1, 4, '2018-06-26 13:19:59'),
(39, 'GTC4 Lusso', 2016, 611, 1865, 'gt4clusso.jpg', 320, 3.5, 0, 265, 1, 4, '2018-06-26 13:22:45'),
(40, 'Portofino', 2018, 600, 1664, 'portofino.jpg', 320, 3.5, 0, 245, 1, 4, '2018-06-26 13:24:06'),
(41, 'Testarossa', 1984, 370, 1505, '512tr.jpg', 292, 5.6, 0, 0, 1, 4, '2018-06-26 13:27:24'),
(42, '718 Boxster', 2016, 300, 1410, 'boxster718.jpg', 275, 5.1, 6, 168, 14, 3, '2018-06-27 07:46:06'),
(43, '718 Cayman', 2016, 300, 1410, '718cayman.jpg', 275, 5.1, 6, 168, 14, 4, '2018-06-26 13:35:42'),
(44, '911 (996)', 1998, 300, 1395, '911996.jpg', 280, 5.4, 8.5, 0, 14, 4, '2018-06-26 13:42:00'),
(45, '911 (997)', 2005, 345, 1470, '911997.jpg', 284, 5, 7.4, 249, 14, 4, '2018-06-26 13:41:46'),
(46, '911 (991)', 2011, 350, 1455, '911991.jpg', 289, 4.8, 6.8, 212, 14, 4, '2018-06-27 07:44:35'),
(47, 'Boxster', 2002, 228, 1330, 'boxster2002.jpg', 248, 7.3, 7.9, 0, 14, 3, '2018-06-27 07:48:43'),
(48, 'Boxster (Phase II)', 2005, 256, 1335, 'boxster2005.jpg', 263, 5.9, 6.9, 221, 14, 3, '2018-06-27 07:55:20'),
(49, 'Boxster (Phase III)', 2012, 265, 1405, 'boxster2012.jpg', 264, 5.8, 6.4, 195, 14, 3, '2018-06-27 07:58:39'),
(50, 'Carrera GT', 2003, 612, 1455, 'carreragt.jpg', 330, 3.9, 11.7, 429, 14, 4, '2018-06-27 08:02:13'),
(51, 'Cayenne', 2002, 500, 2170, 'cayenne2002.jpg', 278, 4.7, 0, 270, 14, 7, '2018-06-27 08:59:25'),
(52, 'Cayenne (Phase II)', 2007, 290, 2160, 'cayenne2007.jpg', 227, 8.1, 9.3, 296, 14, 7, '2018-06-27 09:01:34'),
(53, 'Cayenne (Phase III)', 2011, 239, 2100, 'cayenne2011.jpg', 218, 7.8, 6.6, 195, 14, 7, '2018-06-27 09:04:05'),
(54, 'Cayenne (Phase IV)', 2015, 262, 2185, 'cayenne2015.jpg', 221, 7.3, 6, 179, 14, 7, '2018-06-27 09:07:32'),
(55, 'Cayenne (Phase V)', 2017, 440, 2095, 'cayenne2017.jpg', 265, 5.2, 8, 209, 14, 7, '2018-06-27 09:10:29'),
(56, 'Cayman', 2007, 245, 1330, 'cayman2007.jpg', 265, 5.8, 6.9, 221, 14, 10, '2018-06-27 11:36:19'),
(57, 'Cayman (Phase II)', 20014, 275, 1405, 'cayman2014.jpg', 266, 5.7, 6.4, 195, 14, 10, '2018-06-27 11:47:13'),
(58, 'Macan', 2015, 340, 1940, 'macan2015.jpg', 254, 5.4, 7.3, 212, 14, 7, '2018-06-27 11:50:34'),
(59, 'Panamera', 2009, 400, 1935, 'panamera2009.jpg', 282, 5, 7.9, 260, 14, 2, '2018-06-27 11:54:22'),
(60, 'Panamera (Phase II)', 2017, 330, 1925, 'panamera2017.jpg', 262, 5.5, 6.4, 175, 14, 2, '2018-06-27 11:56:54'),
(61, 'Alaskan', 2017, 160, 2000, 'alaskan2017.jpg', 172, 0, 6.1, 167, 15, 7, '2018-06-27 12:27:16'),
(62, 'Avantime', 2001, 210, 1741, 'avantime2001.jpg', 220, 8.6, 8.9, 0, 15, 9, '2018-06-27 12:29:37'),
(63, 'Captur', 2013, 90, 1101, 'captur2013.jpg', 171, 12.9, 4.3, 113, 15, 7, '2018-06-27 12:31:56'),
(64, 'Clio II', 1998, 60, 955, 'clio1998.jpg', 160, 15, 5.2, 0, 15, 1, '2018-06-27 12:36:30'),
(65, 'Clio III', 2005, 75, 930, 'clio2005.jpg', 170, 13, 4.9, 0, 15, 1, '2018-06-27 12:39:35'),
(66, 'Clio IV', 2013, 75, 1090, 'clio2013.jpg', 167, 13.4, 4.9, 130, 15, 1, '2018-06-27 12:41:51'),
(67, 'Espace III', 2000, 100, 1520, 'espace2000.jpg', 167, 15, 5.7, 0, 15, 9, '2018-06-27 13:06:55'),
(68, 'Espace IV', 2002, 116, 1755, 'epsace2002.jpg', 180, 13.2, 6, 187, 15, 9, '2018-06-27 13:08:07');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `conso`
--
ALTER TABLE `conso`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_favoris`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_voiture` (`id_voiture`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id_favoris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`id_voiture`) REFERENCES `voiture` (`id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`marque`) REFERENCES `marque` (`id_marque`),
  ADD CONSTRAINT `voiture_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type` (`id_type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
