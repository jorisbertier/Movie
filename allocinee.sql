-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 juin 2023 à 12:46
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `allocinee`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

DROP TABLE IF EXISTS `actor`;
CREATE TABLE IF NOT EXISTS `actor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `first_name` (`first_name`,`last_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `actor`
--

INSERT INTO `actor` (`id`, `first_name`, `last_name`) VALUES
(2, 'Angelina', 'Jolie'),
(1, 'Brad', 'Pitt'),
(4, 'Johnny', 'Depp'),
(5, 'Leonardo', 'Di Caprio'),
(7, 'Marion', 'Cotillard'),
(6, 'Will', 'Smith');

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `release_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `release_date`) VALUES
(1, '400', '2001-01-01'),
(2, 'Les justiciers', '2003-01-01'),
(4, 'Black clover La renaissance', '1998-01-01'),
(6, 'Transformers 2', '1980-01-01'),
(7, 'Harry potter à lécole des sorciers', '1986-01-01'),
(8, 'Le roi Lion', '2010-01-01'),
(9, 'Inception', '2004-01-01'),
(10, 'Babilon', '2012-01-01'),
(11, 'Insterstallar', '2013-01-01'),
(12, 'Lala land', '2014-01-01'),
(20, 'Seigneur des anneaux', '2000-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `movie_actor`
--

DROP TABLE IF EXISTS `movie_actor`;
CREATE TABLE IF NOT EXISTS `movie_actor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_actor` int NOT NULL,
  `id_movie` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_actor_ibfk_1` (`id_actor`),
  KEY `movie_actor_ibfk_2` (`id_movie`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `movie_actor`
--

INSERT INTO `movie_actor` (`id`, `id_actor`, `id_movie`) VALUES
(1, 1, 1),
(2, 2, 1),
(5, 5, 4),
(6, 1, 4),
(7, 1, 6),
(8, 1, 7),
(9, 1, 8),
(12, 2, 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `movie_actor_ibfk_1` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `movie_actor_ibfk_2` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
