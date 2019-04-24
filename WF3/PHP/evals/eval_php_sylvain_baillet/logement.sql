-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 23 avr. 2019 à 15:48
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(3) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `cp` int(5) NOT NULL,
  `surface` int(3) NOT NULL,
  `prix` int(7) NOT NULL,
  `photo` text NOT NULL,
  `type` enum('vente','location') NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'bel appartement', '12 rue des abbesses', 'Paris', 75009, 92, 350000, 'logement4.jpg', 'vente', 'dgjkdyjdyjyjyjfyjdyjyjsyjsyjsyjsyj'),
(2, 'appartement de style', '265 boulevard Gardere', 'Nantes', 44012, 80, 180000, 'logement2.jpg', 'vente', 'la superficie de cet appartement est absolument gr'),
(3, 'petit studio tout équipé', 'place des voges', 'Lorient', 57000, 30, 80000, 'logement1.jpg', 'vente', 'petit studio , tres bien placé en centre ville ref'),
(4, 'logement neuf', 'place des lilas', 'Lyon', 69003, 90, 450, '', 'location', 'superbe location tres peu chere pour tous les stag'),
(5, 'bel appartement neuf', '25 brooklyn street', 'brooklyn', 54890, 120, 460000, '', 'vente', 'eh ben si avec ça vous etes pas content, ou allez ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
