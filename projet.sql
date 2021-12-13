-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 12 déc. 2021 à 19:42
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

CREATE TABLE `catalogue` (
  `id` int(60) NOT NULL,
  `nomCategorie` varchar(255) NOT NULL,
  `nbrProd` int(60) NOT NULL,
  `dscrpt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `catalogue`
--

INSERT INTO `catalogue` (`id`, `nomCategorie`, `nbrProd`, `dscrpt`) VALUES
(21, 'aziz', 4, 'bramlim');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `codec` varchar(255) NOT NULL,
  `nomcm` varchar(255) NOT NULL,
  `emailc` varchar(255) NOT NULL,
  `adressec` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postale` int(11) NOT NULL,
  `payement` varchar(255) NOT NULL,
  `nom_carte` varchar(255) NOT NULL,
  `num_carte` bigint(11) NOT NULL,
  `date_carte` date NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`codec`, `nomcm`, `emailc`, `adressec`, `pays`, `ville`, `code_postale`, `payement`, `nom_carte`, `num_carte`, `date_carte`, `cvv`) VALUES
('H123547', 'Hopital', 'Rabta216@gmail.com', 'ffevdfv', 'tggbg', 'dcdvfvg', 2000, 'ttvrtvgr', 'jfv', 3657789, '0000-00-00', 123);

-- --------------------------------------------------------

--
-- Structure de la table `equipementmed`
--

CREATE TABLE `equipementmed` (
  `ref` int(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `dsc` varchar(255) NOT NULL,
  `quantite` int(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `img` text NOT NULL,
  `id_catalogue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipementmed`
--

INSERT INTO `equipementmed` (`ref`, `nom`, `dsc`, `quantite`, `prix`, `img`, `id_catalogue`) VALUES
(528, 'ghodghoda', 'espritt', 562, 1203, 'https://www.developpez.net/template/images/logo-dvp-h55.png', 21),
(529, 'bbbbbb', 'jjjjjjjj', 120, 2560, 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png', 21);

-- --------------------------------------------------------

--
-- Structure de la table `reclam`
--

CREATE TABLE `reclam` (
  `identifiant` int(8) NOT NULL,
  `nom et prenom` varchar(20) NOT NULL,
  `type de reclamation` varchar(10) NOT NULL,
  `numero de commande` int(10) NOT NULL,
  `date de reclamation` date NOT NULL,
  `texte de reclamation` varchar(100) NOT NULL,
  `etat de reclamation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reclam`
--

INSERT INTO `reclam` (`identifiant`, `nom et prenom`, `type de reclamation`, `numero de commande`, `date de reclamation`, `texte de reclamation`, `etat de reclamation`) VALUES
(5423, 'youssef riahi', '******', 122, '2021-11-02', 'fggggdggdcg c cbcgngng cbcgnvnvb xfbbcgbc bcbcbv xfbcbbv ', 'non traiter'),
(22154, 'anis chebbi ', '******', 1224, '2021-11-06', 'dhdfhnjbcjln fdbncljnbcj fnlfcbncvlj fbcjlbncbjlm  dfbncbmcjlbmn', 'en cours de traiteme');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`codec`);

--
-- Index pour la table `equipementmed`
--
ALTER TABLE `equipementmed`
  ADD PRIMARY KEY (`ref`),
  ADD KEY `fk_categorie` (`id_catalogue`);

--
-- Index pour la table `reclam`
--
ALTER TABLE `reclam`
  ADD PRIMARY KEY (`identifiant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2334;

--
-- AUTO_INCREMENT pour la table `equipementmed`
--
ALTER TABLE `equipementmed`
  MODIFY `ref` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `equipementmed`
--
ALTER TABLE `equipementmed`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`id_catalogue`) REFERENCES `catalogue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
