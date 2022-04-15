-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 mars 2022 à 11:32
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
-- Structure de la table `tips`
--

DROP TABLE IF EXISTS `tips`;
CREATE TABLE IF NOT EXISTS `tips` (
  `id_tips` int(11) NOT NULL AUTO_INCREMENT,
  `titre_tips` varchar(255) NOT NULL,
  `detail_tips` varchar(2555) NOT NULL,
  PRIMARY KEY (`id_tips`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tips`
--

INSERT INTO `tips` (`id_tips`, `titre_tips`, `detail_tips`) VALUES
(1, 'Connexion base de donnee pdo', '\r\n    try\r\n    {\r\n        $bdd = new PDO(\'mysql:host=localhost;dbname=metropolis;charset=UTF8\',\'root\',\'\',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]\r\n    );\r\n    }catch(Exception $e)\r\n    {\r\n        print \"Erreur!: \".$e->getMessage() .\"<br/>\";\r\n        die();\r\n    }\r\n\r\n\r\n'),
(3, 'PHP OOP - Classes and Objects', 'class Fruit {\r\n  // Properties\r\n  public $name;\r\n  public $color;\r\n\r\n  // Methods\r\n  function set_name($name) {\r\n    $this->name = $name;\r\n  }\r\n  function get_name() {\r\n    return $this->name;\r\n  }\r\n}\r\n\r\n$apple = new Fruit();\r\n$banana = new Fruit();\r\n$apple->set_name(\'Apple\');\r\n$banana->set_name(\'Banana\');\r\n\r\necho $apple->get_name();\r\necho \"<br>\";\r\necho $banana->get_name();\r\n\r\n'),
(4, 'PHP - The __construct Function\r\n', '\r\nclass Fruit {\r\n  public $name;\r\n  public $color;\r\n\r\n  function __construct($name) {\r\n    $this->name = $name;\r\n  }\r\n  function get_name() {\r\n    return $this->name;\r\n  }\r\n}\r\n\r\n$apple = new Fruit(\"Apple\");\r\necho $apple->get_name();\r\n');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
