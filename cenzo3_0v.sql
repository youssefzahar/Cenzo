-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 17 mai 2021 à 10:01
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cenzo3.0v`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(3000) COLLATE utf8_bin NOT NULL,
  `tel` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dernier_acc` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `email`, `mdp`, `tel`, `image`, `dernier_acc`) VALUES
(22, 'ahmed', 'ahmeduzumaki123@hotmail.com', '$2y$10$XsEmDYQLOk90jmei9py23O6WpzRVuMD9DDCBD7VagQJm8GkxpGKXq', 55526881, './assets/images/admin/777777777777777.PNG', '2021-05-16 23:07:32'),
(25, 'ahmed', 'ahmeduzumaki123@hotmail.com', '$2y$10$dVRYY45xlzfULj7NHS2oguj0CqAhCfbXC4eAWPAetpYjmoY4zFODG', 55526881, './assets/images/admin/777777777777777.PNG', '2021-05-16 23:07:32'),
(26, 'seif', 'seifeddine.amara@esprit.tn', '$2y$10$eQ1K6LuCTfYEdsmoNC3mAunQ1DzTe6QMWAqrxIQPGzgnJm3cyUv66', 55526881, './assets/images/admin/127889723_999379160549728_2542702105745124126_n.jpg', '2021-05-17 09:19:07');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8_bin NOT NULL,
  `tel` int(11) NOT NULL,
  `adresse` varchar(50) COLLATE utf8_bin NOT NULL,
  `sexe` varchar(20) COLLATE utf8_bin NOT NULL,
  `date_nais` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `mdp`, `tel`, `adresse`, `sexe`, `date_nais`, `image`) VALUES
(1, 'user1', 'user2', 'user1@gmail.com', 'test', 66666666, 'trdt', 'tset', NULL, NULL),
(9, 'Ahmed ', 'turki', 'ahmeduzumaki123@hotmail.com', '$2y$10$Iy3poowG/wbp2QlUJL2MZecQ3eTpHihF5geZfNQpqwVjoExakl5iW', 55526881, '35 RUE MAHMOUD CHABANE ENASER ', 'Homme', '2000-11-02', './img/client/111111111111111.PNG'),
(20, 'Louhaichi', 'Ahmed', 'louhaichi66@gmail.com', '$2y$10$pBMEXnHhEc5slyFxGOpf0.lJZC9ktmRN47x8H6PE0OimfOYvTTC3y', 23564657, 'Ariana', 'Homme', '2021-05-06', './img/client/283874-brain.jpg'),
(21, 'fea', 'khedhira', 'wajih.mejri@esprit.tn', '$2y$10$tqvWstDAE5ogxbwhTxVx6uLDwP.qaXxuGDtub9dwEuLVoDJWIJRmi', 20332985, '6 RUE KAMEROUN', 'Homme', '2021-06-01', './img/client/164493888_284973556490314_220761501831044655_n.jpg'),
(22, 'Ahmed ', 'turki', 'ahmeduzumaki123@hotmail.com', '$2y$10$08uoWuKp.RyFZ74NXYhNPekDLVTR.uc/4pawMKA3Y70NWnpM/aoZu', 55526881, '35 RUE MAHMOUD CHABANE ENASER ', 'Homme', '1950-02-12', './img/client/111111111111111.PNG'),
(23, 'seif', 'amara', 'amaraseif2@gmail.com', '$2y$10$4CZSnU9LhPK9opxIYkw4HOjfDVmscIEQ74NzyZ83NamPjiIvvRj3u', 22312884, 'ariana soghra', 'Homme', '1980-02-12', './img/client/127889723_999379160549728_2542702105745124126_n.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `nbrproduit` int(11) NOT NULL,
  `totalprix` float NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(50) NOT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `numeroTelephone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `nbrproduit`, `totalprix`, `date`, `etat`, `adresse`, `numeroTelephone`) VALUES
(1621237511, 23, 6, 2500, '2021-05-17', 'Confirme', 'ariana soghra', '22814555'),
(1621238193, 23, 1, 500, '2021-05-17', 'Confirme', 'naser 1', '1545123');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `com` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_forum`, `id_utilisateur`, `com`, `date`) VALUES
(29, 17, 8, 'aef', '2021-05-01 13:45:29'),
(30, 17, 8, 'ssa', '2021-05-03 02:26:01'),
(31, 29, 9, 'llllllllllllllllll', '2021-05-04 23:48:49'),
(36, 39, 9, 'ahmeddd', '2021-05-05 07:14:29'),
(40, 35, 20, 'bbbb', '2021-05-16 20:02:56'),
(41, 38, 21, 'feaf', '2021-05-16 21:13:49'),
(42, 35, 21, 'feaf', '2021-05-16 21:31:49'),
(43, 48, 21, 'ssss', '2021-05-16 21:39:11');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `categorie` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `sujet` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `etat` int(11) NOT NULL,
  `date_creation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `categorie`, `id_utilisateur`, `sujet`, `description`, `etat`, `date_creation`) VALUES
(48, 'Food Tn', 21, 'aaaa', 'feafea', 1, '2021-05-16'),
(50, 'Hrisa', 21, 'feafa', 'feaffff', 1, '2021-05-16'),
(52, 'Hrisa', 22, 'eeeeeeeeee', 'linaaaa kk', 1, '2021-05-16'),
(53, 'Hrisa', 22, 'hbivyi', 'uihuibui', 0, '2021-05-16'),
(55, 'Food Tn', 23, 'hnehn', 'erherher', 0, '2021-05-17'),
(56, 'Hrisa', 23, 'ssssssssssssssssssss', 'aaaaaaaaaaaaaaaaa', 0, '2021-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `calories` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `nom`, `calories`, `image`) VALUES
(10, 'zegzeg', 355, './assets/images/ingredient/AdobeColor-Italy Flag.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `lignecommande`
--

CREATE TABLE `lignecommande` (
  `id` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixunitaire` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lignecommande`
--

INSERT INTO `lignecommande` (`id`, `id_commande`, `id_produit`, `quantite`, `prixunitaire`) VALUES
(85, 1621237511, 6, 1, 0),
(86, 1621237511, 0, 5, 500),
(87, 1621238193, 0, 1, 500);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nom_plat` varchar(20) COLLATE utf8_bin NOT NULL,
  `prix_plat` int(11) NOT NULL,
  `image_plat` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `nom_plat`, `prix_plat`, `image_plat`) VALUES
(6, 'ma9rouna', 400, './assets/images/menu/3.jpg'),
(0, 'hamas', 500, './assets/images/menu/127889723_999379160549728_2542702105745124126_n.jpg'),
(0, 'kosksi', 700, './assets/images/menu/téléchargement.png');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE `plats` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `nom`, `prix`) VALUES
(1, 'couscous', 30),
(2, 'ma9rouna', 20),
(3, '3ejja', 15);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `nom`, `description`, `image`) VALUES
(28, 'gg', '33', './assets/images/recette/2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `recette_ingredient`
--

CREATE TABLE `recette_ingredient` (
  `id_recette` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette_ingredient`
--

INSERT INTO `recette_ingredient` (`id_recette`, `id_ingredient`) VALUES
(28, 10);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `sujet` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `id_utilisateur`, `sujet`, `description`) VALUES
(20, 23, 'ahmedd', 'bouhmiod');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num_table` int(11) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `idclient`, `date`, `num_table`, `etat`) VALUES
(35, 21, '2021-05-16 21:07:52', 4, 1),
(36, 22, '2021-05-16 21:07:52', 15, 1),
(37, 22, '2021-05-16 21:07:52', 2, 0),
(41, 23, '2021-05-29 07:26:00', 14, 0),
(42, 23, '2021-05-06 07:22:00', 17, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lignecommande_commande` (`id_commande`);

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recette_ingredient`
--
ALTER TABLE `recette_ingredient`
  ADD KEY `fk_recetteingredient_recette` (`id_recette`),
  ADD KEY `fk_recetteingredient_ingredient` (`id_ingredient`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1621238194;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `lignecommande`
--
ALTER TABLE `lignecommande`
  ADD CONSTRAINT `fk_lignecommande_commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recette_ingredient`
--
ALTER TABLE `recette_ingredient`
  ADD CONSTRAINT `fk_recetteingredient_ingredient` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_recetteingredient_recette` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
