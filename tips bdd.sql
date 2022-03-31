-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 31 mars 2022 à 06:58
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tips`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

DROP TABLE IF EXISTS `avoir`;
CREATE TABLE IF NOT EXISTS `avoir` (
  `id_tips` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_tips`,`id_categorie`),
  KEY `avoir_categorie0_FK` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avoir1`
--

DROP TABLE IF EXISTS `avoir1`;
CREATE TABLE IF NOT EXISTS `avoir1` (
  `id_users` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_users`,`id_role`),
  KEY `avoir1_role0_FK` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) NOT NULL,
  `id_affiche` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `id_affiche`) VALUES
(1, 'PDO', 'PDO.jpg'),
(2, 'POO', 'formation-php-poo.jpg'),
(3, 'CRUD', 'CRUD.jpg'),
(4, 'LIKE ET DISLIKE SYSTEME', 'maxresdefault.jpg'),
(5, 'CHAT SYSTEME AUTOMATISER', 'CHAT.jpg'),
(6, 'PHP LOGIN SYSTEME', 'PHP LOGIN.jpg'),
(7, 'PHP REPORT SIMPLE API', 'PHP REPORTS.jpg'),
(8, 'RECHERCHE PAR MINPHP', 'search modal.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `langage`
--

DROP TABLE IF EXISTS `langage`;
CREATE TABLE IF NOT EXISTS `langage` (
  `id_langage` int(11) NOT NULL AUTO_INCREMENT,
  `nom_langage` varchar(50) NOT NULL,
  `id_affiche` varchar(255) NOT NULL,
  PRIMARY KEY (`id_langage`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langage`
--

INSERT INTO `langage` (`id_langage`, `nom_langage`, `id_affiche`) VALUES
(1, 'php', 'téléchargement.jpg'),
(2, 'html', 'html.png'),
(3, 'c++', 'Cplus.jpg'),
(4, 'java script', 'java.png'),
(5, 'python', 'python.jpg'),
(6, 'css', 'css.png'),
(7, 'sql', 'sql.png'),
(8, 'ruby', 'ruby.jpg'),
(9, 'kotlin', 'kotlin.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

DROP TABLE IF EXISTS `possede`;
CREATE TABLE IF NOT EXISTS `possede` (
  `id_categorie` int(11) NOT NULL,
  `id_langage` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`,`id_langage`),
  KEY `possede_langage0_FK` (`id_langage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tips`
--

DROP TABLE IF EXISTS `tips`;
CREATE TABLE IF NOT EXISTS `tips` (
  `id_tips` int(11) NOT NULL AUTO_INCREMENT,
  `titre_tips` varchar(255) NOT NULL,
  `detail_tips` varchar(2555) NOT NULL,
  PRIMARY KEY (`id_tips`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tips`
--

INSERT INTO `tips` (`id_tips`, `titre_tips`, `detail_tips`) VALUES
(1, 'Connexion base de donnée pdo', '<?php\r\n    try\r\n    {\r\n        $bdd = new PDO(\'mysql:host=localhost;dbname=metropolis;charset=UTF8\',\'root\',\'\',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]\r\n    );\r\n    }catch(Exception $e)\r\n    {\r\n        print \"Erreur!: \".$e->getMessage() .\"<br/>\";\r\n        die();\r\n    }\r\n\r\n?>');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_users` varchar(255) NOT NULL,
  `mail_users` varchar(255) NOT NULL,
  `mdp_users` varchar(255) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `avoir_categorie0_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `avoir_tips_FK` FOREIGN KEY (`id_tips`) REFERENCES `tips` (`id_tips`);

--
-- Contraintes pour la table `avoir1`
--
ALTER TABLE `avoir1`
  ADD CONSTRAINT `avoir1_role0_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `avoir1_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `possede_categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `possede_langage0_FK` FOREIGN KEY (`id_langage`) REFERENCES `langage` (`id_langage`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
