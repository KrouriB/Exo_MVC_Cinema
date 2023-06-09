-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour cinema_brice
CREATE DATABASE IF NOT EXISTS `cinema_brice` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cinema_brice`;

-- Listage de la structure de la table cinema_brice. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `sexe` varchar(50) NOT NULL,
  `date_naissance_acteur` date NOT NULL,
  `id_personne` int(11) NOT NULL,
  PRIMARY KEY (`id_acteur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.acteur : ~10 rows (environ)
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `sexe`, `date_naissance_acteur`, `id_personne`) VALUES
	(1, 'Homme', '1942-07-13', 1),
	(2, 'Homme', '1924-10-03', 3),
	(3, 'Femme', '1933-02-13', 4),
	(4, 'Homme', '1937-07-13', 5),
	(5, 'Homme', '1932-11-02', 6),
	(6, 'Femme', '1959-11-20', 8),
	(7, 'Femme', '1983-06-01', 10),
	(8, 'Homme', '1942-05-14', 2),
	(9, 'Homme', '1998-04-18', 11),
	(10, 'Femme', '1999-08-26', 12);
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;

-- Listage de la structure de la table cinema_brice. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  KEY `casting_ibfk_2` (`id_acteur`),
  KEY `casting_ibfk_3` (`id_role`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.casting : ~15 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
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
	(7, 8, 12),
	(8, 9, 14),
	(8, 10, 13);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Listage de la structure de la table cinema_brice. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre_film` varchar(50) NOT NULL,
  `date_sortie_film` date NOT NULL,
  `temps_min_film` int(11) NOT NULL DEFAULT '0',
  `resume_film` text,
  `note_film` int(11) DEFAULT NULL,
  `image_film` varchar(50) DEFAULT 'indisponible.jpg',
  `id_realisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `FK_FILM_REALISATEUR` (`id_realisateur`),
  CONSTRAINT `FK_FILM_REALISATEUR` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.film : ~7 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre_film`, `date_sortie_film`, `temps_min_film`, `resume_film`, `note_film`, `image_film`, `id_realisateur`) VALUES
	(1, 'Star Wars IV', '1977-10-19', 121, 'un nouvel espoir', 5, 'star_wars_IV.jpg', 1),
	(2, 'Star Wars V', '1980-08-20', 124, 'l\'empire contre attaque', 5, 'star_wars_V.jpg', 1),
	(3, 'Star Wars VI', '1983-10-19', 131, 'le retour du jedi', 5, 'star_wars_VI.jpg', 1),
	(4, 'Indiana Jones : Les Aventurier de l\'arche perdue', '1981-09-16', 115, NULL, 4, NULL, 1),
	(5, 'Blade Runner', '1982-09-15', 117, NULL, 5, 'blade_runner.jpg', 2),
	(6, 'Blade Runner 2049', '2017-10-04', 163, NULL, 3, 'blade_runner_2049.jpg', 3),
	(7, 'Star Wars III', '2005-05-18', 140, 'la revanche du sith', NULL, 'star_wars_III.jpg', 1),
	(8, 'It&#039;s Like WTF', '2023-01-23', 696, 'Le film sur VOTRE formation!', 5, 'elan.jpg', 4);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinema_brice. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.genre : ~2 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `libelle_genre`) VALUES
	(1, 'SF'),
	(2, 'Aventure'),
	(3, 'Gore');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema_brice. genrer
CREATE TABLE IF NOT EXISTS `genrer` (
  `id_film` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `genrer_ibfk_2` (`id_genre`),
  CONSTRAINT `genrer_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `genrer_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.genrer : ~9 rows (environ)
/*!40000 ALTER TABLE `genrer` DISABLE KEYS */;
INSERT INTO `genrer` (`id_film`, `id_genre`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(5, 1),
	(6, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(8, 3);
/*!40000 ALTER TABLE `genrer` ENABLE KEYS */;

-- Listage de la structure de la table cinema_brice. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int(11) NOT NULL AUTO_INCREMENT,
  `nom_personne` varchar(50) NOT NULL,
  `prenom_personne` varchar(50) NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.personne : ~13 rows (environ)
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
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
	(10, 'HOEKS', 'Sylvia'),
	(11, 'MAID', 'Moi'),
	(12, 'NEZ', 'Doigt'),
	(13, 'AUNIZ', 'Rentre');
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;

-- Listage de la structure de la table cinema_brice. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int(11) NOT NULL AUTO_INCREMENT,
  `id_personne` int(11) NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.realisateur : ~3 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 2),
	(2, 7),
	(3, 9),
	(4, 13);
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la table cinema_brice. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema_brice.role : ~12 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
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
	(12, 'Baron Papanoida'),
	(13, 'Duanee'),
	(14, 'Mohamed');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
