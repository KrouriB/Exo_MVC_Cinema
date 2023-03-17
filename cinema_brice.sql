-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema_brice
CREATE DATABASE IF NOT EXISTS `cinema_brice` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema_brice`;

-- Listage de la structure de table cinema_brice. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `sexe` varchar(50) NOT NULL,
  `date_naissance_acteur` date NOT NULL,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.acteur : ~8 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `sexe`, `date_naissance_acteur`, `id_personne`) VALUES
	(1, 'Homme', '1942-07-13', 1),
	(2, 'Homme', '1924-10-03', 3),
	(3, 'Femme', '1933-02-13', 4),
	(4, 'Homme', '1937-07-13', 5),
	(5, 'Homme', '1932-11-02', 6),
	(6, 'Femme', '1959-11-20', 8),
	(7, 'Femme', '1983-06-01', 10),
	(8, 'Homme', '1942-05-14', 2);

-- Listage de la structure de table cinema_brice. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  KEY `casting_ibfk_2` (`id_acteur`),
  KEY `casting_ibfk_3` (`id_role`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.casting : ~15 rows (environ)
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 1),
	(2, 1, 1),
	(3, 1, 1),
	(4, 1, 8),
	(5, 1, 9),
	(6, 1, 9),
	(1, 2, 3),
	(3, 3, 7),
	(1, 4, 2),
	(2, 4, 4),
	(3, 4, 6),
	(2, 5, 5),
	(5, 6, 10),
	(6, 7, 11),
	(7, 8, 12);

-- Listage de la structure de table cinema_brice. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre_film` varchar(50) NOT NULL,
  `date_sortie_film` date NOT NULL,
  `temps_min_film` int NOT NULL DEFAULT '0',
  `resume_film` text,
  `note_film` int DEFAULT NULL,
  `image_film` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'indisponible.jpg',
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `FK_FILM_REALISATEUR` (`id_realisateur`),
  CONSTRAINT `FK_FILM_REALISATEUR` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.film : ~7 rows (environ)
INSERT INTO `film` (`id_film`, `titre_film`, `date_sortie_film`, `temps_min_film`, `resume_film`, `note_film`, `image_film`, `id_realisateur`) VALUES
	(1, 'Star Wars IV', '1977-10-19', 121, 'un nouvel espoir', 5, 'star_wars_IV.jpg', 1),
	(2, 'Star Wars V', '1980-08-20', 124, 'l\'empire contre attaque', 5, 'star_wars_V.jpg', 1),
	(3, 'Star Wars VI', '1983-10-19', 131, 'le retour du jedi', 5, 'star_wars_VI.jpg', 1),
	(4, 'Indiana Jones : Les Aventurier de l\'arche perdue', '1981-09-16', 115, NULL, 4, NULL, 1),
	(5, 'Blade Runner', '1982-09-15', 117, NULL, 5, 'blade_runner.jpg', 2),
	(6, 'Blade Runner 2049', '2017-10-04', 163, NULL, 3, 'blade_runner_2049.jpg', 3),
	(7, 'Star Wars III', '2005-05-18', 140, 'la revanche du sith', NULL, 'star_wars_III.jpg', 1);

-- Listage de la structure de table cinema_brice. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `libelle_genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.genre : ~2 rows (environ)
INSERT INTO `genre` (`id_genre`, `libelle_genre`) VALUES
	(1, 'SF'),
	(2, 'Aventure');

-- Listage de la structure de table cinema_brice. genrer
CREATE TABLE IF NOT EXISTS `genrer` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `genrer_ibfk_2` (`id_genre`),
  CONSTRAINT `genrer_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `genrer_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.genrer : ~9 rows (environ)
INSERT INTO `genrer` (`id_film`, `id_genre`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(5, 1),
	(6, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2);

-- Listage de la structure de table cinema_brice. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom_personne` varchar(50) NOT NULL,
  `prenom_personne` varchar(50) NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.personne : ~10 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom_personne`, `prenom_personne`) VALUES
	(1, 'FORD', 'Harrison'),
	(2, 'LUCAS', 'George'),
	(3, 'WARD', 'Larry'),
	(4, 'BLACKISTON', 'Caroline'),
	(5, 'PURVIS', 'Jack'),
	(6, 'RICHARDS', 'Terry'),
	(7, 'SCOTT', 'Ridley'),
	(8, 'YOUNG', 'Sean'),
	(9, 'VILLENEUVE', 'Denis'),
	(10, 'HOEKS', 'Sylvia');

-- Listage de la structure de table cinema_brice. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.realisateur : ~3 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 2),
	(2, 7),
	(3, 9);

-- Listage de la structure de table cinema_brice. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.role : ~12 rows (environ)
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Han SOLO'),
	(2, 'Chief Jawa'),
	(3, 'Greedo'),
	(4, 'Chief Ugnaught'),
	(5, 'Wampa'),
	(6, 'Teebo'),
	(7, 'Mon MOTHMA'),
	(8, 'Indiana JONES'),
	(9, 'Rick DECKARD'),
	(10, 'Rachael'),
	(11, 'Luv'),
	(12, 'Baron Papanoida');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
