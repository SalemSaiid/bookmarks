SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_bookmarks`
--
-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'user', '$2y$13$QhuZuFEKo7l4stV1OGiqQO3g63O90xS.u.qNUyUWiiR2d7rIOuxPC', 'user@bookmarks.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_bookmarks`
--

-- --------------------------------------------------------

--
-- Structure de la table `referenced_link`
--

CREATE TABLE `referenced_link` (
  `id` int NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` double DEFAULT NULL,
  `height` double DEFAULT NULL,
  `duration` double DEFAULT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `referenced_link`
--

INSERT INTO `referenced_link` (`id`, `type`, `width`, `height`, `duration`, `url`, `title`, `author`, `created_at`) VALUES
(4, 'video', 1222, 2222, 111, 'https://www.youtube.com/watch?v=fJeunkTCvWQ', 'PES2021 Double Touch Skills Tips For New Players | When To Use', 'LFFL', '2020-10-28 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `referenced_link`
--
ALTER TABLE `referenced_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_idx` (`type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `referenced_link`
--
ALTER TABLE `referenced_link`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;
