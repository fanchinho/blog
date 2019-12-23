-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 20 déc. 2019 à 16:19
-- Version du serveur :  5.5.34
-- Version de PHP :  5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `moderate` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `mail`, `date`, `content`, `status`, `moderate`, `id_post`, `author`) VALUES
(1, 'azd@gmail.com', '2019-12-11 12:12:16', 'zdzede', 1, 0, 243, 'azd'),
(2, 'azd@gmail.com', '2019-12-11 14:12:18', 'autre commentaire', 1, 0, 243, 'moi ');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `visiblility` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `author`, `title`, `content`, `date`, `image`, `visiblility`) VALUES
(238, '', 'premier article', '<p>zadazdazd</p>', '2019-11-26 18:23:42', 'patrick-perkins-3wylDrjxH-E-unsplash.jpg', 0),
(239, '', 'azdazd', '<p>azdazdazd</p>', '2019-11-27 10:16:55', 'salome-watel-51N2NTDDtLw-unsplash.jpg', 0),
(240, '', 'azdazd', '<p><strong>azdazdazd</strong></p>', '2019-11-27 10:17:09', 'salome-watel-51N2NTDDtLw-unsplash.jpg', 0),
(243, '', 'avant dernier article', '<p>azdazdad</p>', '2019-11-27 10:17:42', 'salome-watel-51N2NTDDtLw-unsplash.jpg', 0),
(244, '', 'rgrtgrtgrtg', '<p>rtgrtgr</p>', '2019-12-17 16:42:30', 'vlad-kutepov-apk5a5OFjtY-unsplash.jpg', 0),
(245, '', 'rtgrtg', '<p>rtgrtgrt</p>', '2019-12-17 16:42:38', 'vlad-kutepov-apk5a5OFjtY-unsplash.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`) VALUES
(78, 'ecole'),
(79, ' mode'),
(80, 'photo'),
(81, 'design'),
(82, 'mode'),
(83, 'test'),
(84, 'nouveau'),
(85, 'super'),
(86, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `TagsPost`
--

CREATE TABLE `TagsPost` (
  `IdPost` int(11) NOT NULL,
  `IdTag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `TagsPost`
--

INSERT INTO `TagsPost` (`IdPost`, `IdTag`) VALUES
(245, 86);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mail`, `password`) VALUES
(4, 'admin', 'admin@michel-smith.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441'),
(5, 'test', 'test@test.com', '*94BDCEBE19083CE2A1F959FD02F964C7AF4CFC29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `connexion_post` (`id_post`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TagsPost`
--
ALTER TABLE `TagsPost`
  ADD KEY `tagspost_ibfk_2` (`IdTag`),
  ADD KEY `tagspost_ibfk_1` (`IdPost`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `connexion_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Contraintes pour la table `TagsPost`
--
ALTER TABLE `TagsPost`
  ADD CONSTRAINT `tagspost_ibfk_1` FOREIGN KEY (`IdPost`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagspost_ibfk_2` FOREIGN KEY (`IdTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
