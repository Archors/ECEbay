-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 avr. 2020 à 23:08
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecebay`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

CREATE TABLE `acheteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `typecarte` varchar(255) NOT NULL,
  `nomcarte` varchar(255) NOT NULL,
  `codecarte` varchar(255) NOT NULL,
  `datecarte` date NOT NULL,
  `cryptogramme` int(11) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `codepostal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `panier` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresse2` varchar(255) NOT NULL,
  `solde` int(11) NOT NULL,
  `negocie` varchar(255) NOT NULL,
  `enchere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`id`, `nom`, `prenom`, `mail`, `password`, `typecarte`, `nomcarte`, `codecarte`, `datecarte`, `cryptogramme`, `pays`, `codepostal`, `ville`, `telephone`, `panier`, `pseudo`, `adresse1`, `adresse2`, `solde`, `negocie`, `enchere`) VALUES
(17, 'Davodet', 'Aurélien', 'aurelien.davodet@gmail.com', '$2y$10$BVpV3AO/6LLPCEOb.kCRueNeTCf3HqiVYsSgtbeDyFQhTpoK.nwPm', '', '', '', '0000-00-00', 0, '', '', '', '', 0, 'Aurelien2404', '', '', 9999, '', ''),
(18, 'Delahegue', 'Emilien', 'emilien.delahegue@gmail.com', '$2y$10$mg2BDeLZ9vDSacsg.BDB4.ljJGQAq.ZLvVyR9SHqRyZRQt8M5kWNW', '', '', '', '0000-00-00', 0, '', '', '', '', 0, 'Emilien08', '', '', 10000, '', ''),
(19, 'Combe', 'Antoine', 'antoine.combe@gmail.com', '$2y$10$3mpTaqHnSaD91h2hn0yEMuf7Sm6TJtyYvuaPCuOgZbxrTA1skStRy', '', '', '', '0000-00-00', 0, '', '', '', '', 0, 'Antoine05', '', '', 10000, '', ''),
(20, 'Davodet', 'Christine', 'christine.davodet@gmail.com', '$2y$10$Csrig/ldIYoCPa1TC6deseDC31SPk1U9hFlLCSSfmREki5Jk5rqj2', '', '', '', '0000-00-00', 0, '', '', '', '', 0, 'Kiki', '', '', 10000, '', ''),
(21, 'Davodet', 'Dominique', 'dominique.davodet@gmail.com', '$2y$10$MQaw9fDeKa0lTl/sDlVNfO/idhqmUuIhFqKX3eatqC.2jSfr6TZsW', '', '', '', '0000-00-00', 0, '', '', '', '', 0, 'dom', '', '', 10000, '', ''),
(22, 'Marze', 'Oscar', 'oscar.marze@gmail.com', '$2y$10$9iK.iv5jxYlfTas/9N9Xaee2dihHDTKkuDTKxT1MryOfcLVgyAyia', '', '', '', '0000-00-00', 0, '', '', '', '', 0, 'Mars', '', '', 9988, 'aa', ''),
(23, 'Pichon', 'Gauthier', 'gauthier.pichon@gmail.com', '$2y$10$GUVKuVYdKgmRAojSNG0kfu4Xarf0pSHlz/MFNdp6o.AFtqQ9gIEOi', 'mastercard', 'pichon', '123', '2020-04-26', 345, 'France', '75016', 'paris', '0625', 0, 'Gotpich', 'paul', 'soso', 9952, '', 'qq');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idvendeur` int(11) NOT NULL,
  `imageprofil` varchar(255) NOT NULL,
  `imagefond` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `mail`, `password`, `idvendeur`, `imageprofil`, `imagefond`) VALUES
(1, 'Auré', 'aurelien.davodet@gmail.com', 'password', 7, 'aureo.png', 'fondaureo.png'),
(2, 'Emlo', 'emilien.delahegue@gmail.com', 'password', 8, 'milou.png', 'fondmilou.png'),
(3, 'Toitoine', 'antoine.combe@gmail.com', 'password', 9, 'tonio.png', 'fondtonio.png');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `type` int(11) NOT NULL,
  `vendeur` int(11) NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `nom`, `description`, `prix`, `image`, `date`, `type`, `vendeur`, `categorie`) VALUES
(12, 'Montre Hugo Boss', 'montre en or massif', 1230, 'montre2.jpg', '0000-00-00 00:00:00', 1, 7, 2),
(13, 'Montre estivale', 'montre de marque et bracelet torssadé', 340, 'montre3.jpg', '0000-00-00 00:00:00', 1, 8, 1),
(14, 'Montre sportive', 'montre de la marque mazeratti, parfaite pour les fans de voiture et de sport', 2090, 'montre4.jpg', '0000-00-00 00:00:00', 1, 8, 3),
(18, 'Montre noire', 'montre officielle de l\'équipe de france de tennis, portée notamment par Monfils', 6000, 'montre8.jpg', '0000-00-00 00:00:00', 3, 10, 3),
(19, 'Montre Hamilton', 'Première montre de la célèbre marque Hamilton disigné par christian Louboutin', 900, 'montre9.jpg', '0000-00-00 00:00:00', 1, 11, 3),
(62, 'Montre classique', 'montre classique pour homme', 299, 'montre1.jpg', '0000-00-00 00:00:00', 1, 12, 1),
(63, 'Montre luxueuse', 'montre en or blanc', 3000, 'montre5.jpg', '0000-00-00 00:00:00', 3, 12, 3),
(64, 'Montre ancienne', 'Première montre du créateur stark au XIXe', 300, 'montre6.jpg', '2021-02-02 12:00:00', 2, 12, 2),
(65, 'Montre féminine', 'montre féminine en or blanc et rose, parfait pour la fête des mères', 347, 'montre8.jpg', '2021-04-12 12:12:12', 2, 12, 3),
(66, 'Montre noire', 'montre noir assez simple, aussi bien pour les hommes et les femmes', 1, 'montre10.jpg', '0000-00-00 00:00:00', 3, 13, 2),
(67, 'Montre Mazerrati', 'montre pour les fans de voitures de sports et de blingbling', 3000, 'montre4.jpg', '2021-04-20 12:12:12', 2, 13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Férailles et Trésors'),
(2, 'Bons musées'),
(3, 'Articles VIP');

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

CREATE TABLE `enchere` (
  `id` int(11) NOT NULL,
  `iditem` int(11) NOT NULL,
  `idacheteur` int(11) NOT NULL,
  `montantmax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `negociation`
--

CREATE TABLE `negociation` (
  `id` int(11) NOT NULL,
  `iditem` int(11) NOT NULL,
  `idacheteur` int(11) NOT NULL,
  `offre` int(11) NOT NULL,
  `compteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `numpanier` int(11) NOT NULL,
  `article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `numpanier`, `article`) VALUES
(13, 17, 12);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Achats immédiats'),
(2, 'Enchères'),
(3, 'Meilleurs offres');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `photoprofil` varchar(255) NOT NULL,
  `photofond` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id`, `pseudo`, `mail`, `motdepasse`, `photoprofil`, `photofond`) VALUES
(7, 'Auréo', 'aurelien.davodet@gmail.com', '$2y$10$tYXIQnub6tPsMYrwdpROp.O87MQ0iir1xygcMXz6Kdf/J12GbVoAG', 'aureo.png', 'fondaureo.png'),
(8, 'Milou', 'emilien.delahegue@gmail.Com', '$2y$10$8oUpwLPT/twZ03zZIuf/meV8/6rcJ3KOww2mpMWDoeeyppIZVQqIi', 'milou.png', 'fondmilou.png'),
(9, 'Tonio', 'antoine.combe@gmail.com', '$2y$10$LOyUXdTqKiy9VCF9upWoO.Wr5WPQfEw926vjETx6FfUodz/83jgzW', 'tonio.png', 'fondtonio.png'),
(10, 'Ju', 'julien.marechal@gmail.com', '$2y$10$CCpMLq2c9VDErEYbyX7u5eKHJOV3nF.BwDxWznw28CBAxH5lBO9ji', 'julien.png', 'fondjulien.png'),
(11, 'Val', 'valentin.guisnet@gmail.com', '$2y$10$0MzUff517lkt6JYcWSaHPu.yohLCLJXziSmBOTltnNt05j1038zF2', 'val.png', 'fondval.png'),
(12, 'paulco', 'paul.caudal@gmail.com', '$2y$10$ED/pNngBZRKO.AbClH6hluaeeAWPWDLR8ln/w1vRUyblajqzuz1sK', 'paul.png', 'fondpaul.png'),
(13, 'tatane', 'ethane.kalifa@gmail.com', '$2y$10$V/LZbcuJdHcJrL3C/umnNudIpqUsR1aPXQpNp0TXpjAheTIzvz8hG', 'ethane.png', 'fondethane.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acheteur`
--
ALTER TABLE `acheteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panier` (`panier`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idvendeur` (`idvendeur`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `vendeur` (`vendeur`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iditem` (`iditem`),
  ADD KEY `idacheteur` (`idacheteur`);

--
-- Index pour la table `negociation`
--
ALTER TABLE `negociation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iditem` (`iditem`),
  ADD KEY `idacheteur` (`idacheteur`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article` (`article`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acheteur`
--
ALTER TABLE `acheteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `enchere`
--
ALTER TABLE `enchere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `negociation`
--
ALTER TABLE `negociation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`idvendeur`) REFERENCES `vendeur` (`id`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
