-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 10 sep. 2019 à 10:03
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
-- Base de données :  `site_portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(4) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `nom`, `email`, `message`) VALUES
(1, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(2, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(3, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(4, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(25, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'poo'),
(26, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'xfthwxfth'),
(27, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'xfthwxfth'),
(28, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'xfthwxfth'),
(29, 'a', 'fjfjxf', 'u'),
(30, 'a', 'fjfjxf', 'u'),
(31, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'errors'),
(32, 'a', 'fchcfhcft', 'p'),
(33, 'a', 'fchcfhcft', 'p'),
(34, 'a', 'xfhxfthxfth', 'y'),
(35, 'a', 'xfhxfthxfth', 'y'),
(36, 't', 'fghxfthxfth', 'xfthxfthxfth'),
(37, 'xfthfth', 'nelson.vanicatte@lepoles.com', 'xfthxfthfth'),
(38, 'fxhxfth', 'nelson.vanicatte@lepoles.com', 'xfthxfthxfth'),
(39, 'xfthxfth', 'nelson.vanicatte@lepoles.com', 'wdtwdgh'),
(40, 'a', 'cvfgfxh', 'a'),
(41, 'a', 'cvfgfxh', 'a'),
(42, 'a', 'dfghdfgh', 'a'),
(43, 't', 'xfthxfth', 't'),
(44, 'wdrgwdrg', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(45, 'wdrgwdrg', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(46, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(47, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(48, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(49, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'xfthfth'),
(50, 'vanicatte', 'nelson.vanicatte@lepoles.com', 'xfthfth'),
(51, 'xdth', 'nelson.vanicatte@lepoles.com', 'yuyu'),
(52, 'xdth', 'nelson.vanicatte@lepoles.com', 'yuyu'),
(53, 'dfgh', 'nelson.vanicatte@lepoles.com', 'xfthxfth'),
(54, 'dfgh', 'nelson.vanicatte@lepoles.com', 'xfthxfth'),
(55, 'wdrgwdrg', 'nelson.vanicatte@lepoles.com', 'Coucou Michel'),
(56, 'wdrgwdrg', 'nelson.vanicatte@lepoles.com', 'Coucou Michel'),
(57, 'wdwfbwdb', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(58, 'wdwfbwdb', 'nelson.vanicatte@lepoles.com', 'wdrgwdrg'),
(59, 'fxthxfth', 'nelson.vanicatte@lepoles.com', 'yuooo'),
(61, 'test', 'nelson.vanicatte@lepoles.com', 'wdwdrhwdrh');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `statut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `statut`) VALUES
(1, 'alphazzis', 'sylvain94', 1);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(11) NOT NULL,
  `nom_photo` varchar(60) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `nom_photo`, `photo`) VALUES
(30, 'soleil1-56985491_2311448012246567_5611965360291971072_n.jpg', 'http://localhost/Back/test_site_perso/site_portfolio/images/soleil1-56985491_2311448012246567_5611965360291971072_n.jpg'),
(31, 'colza-56881382_2827906500766857_1315483396830396416_n.jpg', 'http://localhost/Back/test_site_perso/site_portfolio/images/colza-56881382_2827906500766857_1315483396830396416_n.jpg'),
(33, 'train-56848158_313404682689775_4713442181740756992_n.jpg', 'http://localhost/Back/test_site_perso/site_portfolio/images/train-56848158_313404682689775_4713442181740756992_n.jpg'),
(34, 'arbre1-P12201.JPG', 'http://localhost/Back/test_site_perso/site_portfolio/images/arbre1-P12201.JPG'),
(39, 'vity1-P1150-3.JPG', 'http://localhost/Back/test_site_perso/site_portfolio/images/vity1-P1150-3.JPG'),
(43, 'ville4-P1140_2.JPG', 'http://localhost/Back/test_site_perso/site_portfolio/images/ville4-P1140_2.JPG'),
(45, 'arbre2-img12.JPG', 'http://localhost/Back/test_site_perso/site_portfolio/images/arbre2-img12.JPG'),
(47, 'arbre3', 'http://localhost/Back/test_site_perso/site_portfolio/images/arbre3-img13.JPG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
