-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mai 2024 à 12:41
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `game_eval`
--

-- --------------------------------------------------------

--
-- Structure de la table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auth`
--

INSERT INTO `auth` (`id`, `username`, `password`) VALUES
(6, 'Aeroofly', '$2y$10$U9K95qRM4cfG9FUNsl6LtuF/Hkn/bbVbSbK24vkBruB0jLz/jkPRK');

-- --------------------------------------------------------

--
-- Structure de la table `jeuxvidéo`
--

CREATE TABLE `jeuxvidéo` (
  `id` int(100) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `editor` varchar(60) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `note` int(20) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jeuxvidéo`
--

INSERT INTO `jeuxvidéo` (`id`, `name`, `editor`, `image`, `description`, `note`, `date`) VALUES
(5, 'World of Warcraft', 'Blizzard', 'https://upload.wikimedia.org/wikipedia/fr/e/e3/World_of_Warcraft_Logo.png', 'The best game ever created ! A piece of art, you\'ll never be disappoint', 20, '2024-05-23 10:16:45'),
(7, 'League of Legends', 'Riot Games', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d8/League_of_Legends_2019_vector.svg/600px-League_of_Legends_2019_vector.svg.png?20200109211810', 'Kinda good but too addictive...', 13, '2024-05-23 10:19:19'),
(8, 'Minecraft', 'Mojang', 'https://www.freepnglogos.com/uploads/minecraft-logo-3.png', 'Sandbox game, soothing, lovely gameplay', 17, '2024-05-24 09:12:42'),
(9, 'Counter Strike Global Offensive', 'Valve', 'https://iconape.com/wp-content/png_logo_vector/counter-strike-global-offensive-2.png', 'Competitive, intense, insane but so raging', 14, '2024-05-24 10:57:47');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `jeuxvidéo`
--
ALTER TABLE `jeuxvidéo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `jeuxvidéo`
--
ALTER TABLE `jeuxvidéo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
