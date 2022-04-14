-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 avr. 2022 à 06:48
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

--
-- Déchargement des données de la table `avoir`
--

INSERT INTO `avoir` (`id_tips`, `id_categorie`) VALUES
(1, 1),
(99, 1),
(3, 2),
(4, 2),
(5, 12),
(6, 12),
(7, 12),
(8, 14),
(9, 14),
(10, 14),
(11, 15),
(85, 73),
(86, 73),
(87, 74),
(88, 74),
(90, 74),
(91, 75),
(92, 76),
(93, 77),
(96, 77),
(98, 77);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) NOT NULL,
  `id_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `id_image`) VALUES
(1, 'PDO', 'PDO.jpg'),
(2, 'POO', 'formation-php-poo.jpg'),
(3, 'CRUD', 'CRUD.jpg'),
(12, 'HTML Element Reference', 'HTML-Element-Reference-Category.jpg'),
(14, 'HTML Forms', 'HTML-Form-Elements.jpg'),
(15, 'API de géolocalisation HTML', 'geolocalisation.jpg'),
(73, 'echo / print', 'img_625561d64c9d5.jpg'),
(74, 'PHP Data Types', 'img_6255637c4c542.png'),
(75, 'PHP Strings', 'img_6255656de1a0c.png'),
(76, 'The PHP switch Statement', 'img_6255895c01116.png'),
(77, 'PHP Constants', 'img_62558a303c518.png');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`) VALUES
(22, 'img_624d808a06b8c.jpg', '2022-04-06 13:59:06', '1'),
(23, 'img_624d8117ed6d5.jpg', '2022-04-06 14:01:27', '1'),
(24, 'img_624d81750a828.jpg', '2022-04-06 14:03:01', '1'),
(25, 'img_624d81ce69e39.jpg', '2022-04-06 14:04:30', '1'),
(29, 'img_624fe14d0d13a.jpg', '2022-04-08 09:16:29', '1'),
(30, 'img_625561d64c9d5.jpg', '2022-04-12 13:26:14', '1'),
(31, 'img_6255637c4c542.png', '2022-04-12 13:33:16', '1'),
(32, 'img_6255656de1a0c.png', '2022-04-12 13:41:33', '1'),
(33, 'img_6255895c01116.png', '2022-04-12 16:14:52', '1'),
(34, 'img_62558a303c518.png', '2022-04-12 16:18:24', '1'),
(35, 'img_62558a652cae3.png', '2022-04-12 16:19:17', '1');

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
(1, 'php', 'php.jpg'),
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

--
-- Déchargement des données de la table `possede`
--

INSERT INTO `possede` (`id_categorie`, `id_langage`) VALUES
(1, 1),
(2, 1),
(3, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(12, 2),
(14, 2),
(15, 2);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'menbre'),
(2, 'moderateur'),
(3, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `t_tips`
--

DROP TABLE IF EXISTS `t_tips`;
CREATE TABLE IF NOT EXISTS `t_tips` (
  `id_tips` int(11) NOT NULL AUTO_INCREMENT,
  `titre_tips` varchar(255) NOT NULL,
  `detail_tips` varchar(2555) NOT NULL,
  PRIMARY KEY (`id_tips`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_tips`
--

INSERT INTO `t_tips` (`id_tips`, `titre_tips`, `detail_tips`) VALUES
(1, 'Connexion base de donnee pdo', '\r\n    try\r\n    {\r\n        $bdd = new PDO(\'mysql:host=localhost;dbname=metropolis;charset=UTF8\',\'root\',\'\',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]\r\n    );\r\n    }catch(Exception $e)\r\n    {\r\n        print \"Erreur!: \".$e->getMessage() .\"<br/>\";\r\n        die();\r\n    }\r\n\r\n\r\n'),
(3, 'PHP OOP - Classes and Objects', 'class Fruit {\r\n  // Properties\r\n  public $name;\r\n  public $color;\r\n\r\n  // Methods\r\n  function set_name($name) {\r\n    $this->name = $name;\r\n  }\r\n  function get_name() {\r\n    return $this->name;\r\n  }\r\n}\r\n\r\n$apple = new Fruit();\r\n$banana = new Fruit();\r\n$apple->set_name(\'Apple\');\r\n$banana->set_name(\'Banana\');\r\n\r\necho $apple->get_name();\r\necho \"<br>\";\r\necho $banana->get_name();\r\n\r\n'),
(4, 'PHP - The __construct Function\r\n', '\r\nclass Fruit {\r\n  public $name;\r\n  public $color;\r\n\r\n  function __construct($name) {\r\n    $this->name = $name;\r\n  }\r\n  function get_name() {\r\n    return $this->name;\r\n  }\r\n}\r\n\r\n$apple = new Fruit(\"Apple\");\r\necho $apple->get_name();\r\n'),
(5, 'HTML_address', '<pre>\r\n<address>\r\n  Vous pouvez contacter l\'auteur à l\'adresse\r\n  <a href=\"http://www.undomaine.com/contact\">www.undomaine.com</a>.<br>\r\n  Si vous relevez quelques bogues que ce soient, merci de contacter\r\n  <a href=\"mailto:webmaster@somedomain.com\">le webmaster</a>.<br>\r\n  Vous pouvez aussi venir nous voir :<br>\r\n  Mozilla Foundation<br>\r\n  1981 Landings Drive<br>\r\n  Building K<br>\r\n  Mountain View, CA 94043-0801<br>\r\n  USA\r\n</address>\r\n</pre>'),
(6, 'HTML_canvas', '<canvas id=\"myCanvas\">\r\nYour browser does not support the canvas tag.\r\n</canvas>\r\n\r\n<script>\r\nvar canvas = document.getElementById(\"myCanvas\");\r\nvar ctx = canvas.getContext(\"2d\");\r\nctx.fillStyle = \"#FF0000\";\r\nctx.fillRect(0, 0, 80, 80);\r\n</script>'),
(7, 'HTML_button', '<button type=\"button\">Click Me!</button>'),
(8, 'L\'élément_input', 'L\'élément HTML <input> est l\'élément de formulaire le plus utilisé.\r\n\r\nUn <input>élément peut être affiché de plusieurs façons, selon l\' type attribut.\r\n\r\nVoici quelques exemples:\r\n\r\nTaper La description:\r\n\r\n\r\n<type d\'entrée=\"texte\">	          Affiche un champ de saisie de texte sur une seule ligne\r\n\r\n<type d\'entrée=\"radio\">	          Affiche un bouton radio (pour sélectionner l\'un des nombreux choix)\r\n\r\n<type d\'entrée=\"case à cocher\">	  Affiche une case à cocher (pour sélectionner zéro ou plusieurs choix)\r\n\r\n<type d\'entrée=\"soumettre\">	  Affiche un bouton de soumission (pour soumettre le formulaire)\r\n\r\n<type d\'entrée=\"bouton\">	  Affiche un bouton cliquable'),
(9, 'Boutons_radio', 'Le <input type=\"radio\">définit un bouton radio.\r\n\r\nLes boutons radio permettent à un utilisateur de sélectionner UN parmi un nombre limité de choix.\r\n\r\n<p>Choose your favorite Web language:</p>\r\n\r\n<form>\r\n <input type=\"radio\" id=\"html\" name=\"fav_language\" value=\"HTML\">\r\n  <label for=\"html\">HTML</label><br>\r\n  <input type=\"radio\" id=\"css\" name=\"fav_language\" value=\"CSS\">\r\n  <label for=\"css\">CSS</label><br>\r\n  <input type=\"radio\" id=\"javascript\" name=\"fav_language\" value=\"JavaScript\">\r\n  <label for=\"javascript\">JavaScript</label>\r\n</form>'),
(10, 'Cases à cocher', '<form>\r\n  <input type=\"checkbox\" id=\"vehicle1\" name=\"vehicle1\" value=\"Bike\">\r\n  <label for=\"vehicle1\"> I have a bike</label><br>\r\n  <input type=\"checkbox\" id=\"vehicle2\" name=\"vehicle2\" value=\"Car\">\r\n  <label for=\"vehicle2\"> I have a car</label><br>\r\n  <input type=\"checkbox\" id=\"vehicle3\" name=\"vehicle3\" value=\"Boat\">\r\n  <label for=\"vehicle3\"> I have a boat</label>\r\n</form>'),
(11, 'Utilisation de la géolocalisation_HTML', 'Utilisation de la géolocalisation HTML\r\nLa getCurrentPosition()méthode est utilisée pour renvoyer la position de l\'utilisateur.\r\n\r\nL\'exemple ci-dessous renvoie la latitude et la longitude de la position de l\'utilisateur :\r\n\r\n<script>\r\nvar x = document.getElementById(\"demo\");\r\nfunction getLocation() {\r\n  if (navigator.geolocation) {\r\n    navigator.geolocation.getCurrentPosition(showPosition);\r\n  } else {\r\n    x.innerHTML = \"Geolocation is not supported by this browser.\";\r\n  }\r\n}\r\n\r\nfunction showPosition(position) {\r\n  x.innerHTML = \"Latitude: \" + position.coords.latitude +\r\n  \"<br>Longitude: \" + position.coords.longitude;\r\n}\r\n</script>\r\n'),
(12, 'php echo statement', '<?php echo \"<h2>PHP is Fun!</h2>\"; echo \"Hello world!<br>\"; echo \"I\'m about to learn PHP!<br>\"; echo \"This \", \"string \", \"was \", \"made \", \"with multiple parameters.\"; ?>'),
(82, '', ''),
(83, '', ''),
(84, 'LOL', 'LOL'),
(85, 'echo / print', '<?php echo \"<h2>PHP is Fun!</h2>\"; echo \"Hello world!<br>\"; echo \"I\'m about to learn PHP!<br>\"; echo \"This \", \"string \", \"was \", \"made \", \"with multiple parameters.\"; ?>'),
(86, 'Print', '<?php $txt1 = \"Learn PHP\"; $txt2 = \"W3Schools.com\"; $x = 5; $y = 4;  print \"<h2>\" . $txt1 . \"</h2>\"; print \"Study PHP at \" . $txt2 . \"<br>\"; print $x + $y; ?>'),
(87, 'PHP String', '<?php $x = \"Hello world!\"; $y = \'Hello world!\';  echo $x; echo \"<br>\"; echo $y; ?>'),
(88, 'PHP Float', '<?php $x = 10.365; var_dump($x); ?>'),
(89, 'PHP Array', '<?php $cars = array(\"Volvo\",\"BMW\",\"Toyota\"); var_dump($cars); ?>'),
(90, 'PHP Array', '<?php $cars = array(\"Volvo\",\"BMW\",\"Toyota\"); var_dump($cars); ?>'),
(91, 'strlen() - Return the Length of a String', '<?php echo strlen(\"Hello world!\"); // outputs 12 ?>'),
(92, 'switch', '<?php $favcolor = \"red\";  switch ($favcolor) {   case \"red\":     echo \"Your favorite color is red!\";     break;   case \"blue\":     echo \"Your favorite color is blue!\";     break;   case \"green\":     echo \"Your favorite color is green!\";     break;   default:     echo \"Your favorite color is neither red, blue, nor green!\"; } ?>'),
(93, 'Constants', '<?php define(\"GREETING\", \"Welcome to W3Schools.com!\"); echo GREETING; ?>'),
(94, 'Constants', '<?php define(\"GREETING\", \"Welcome to W3Schools.com!\"); echo GREETING; ?>'),
(95, 'PHP Constant Arrays', '<?php define(\"cars\", [   \"Alfa Romeo\",   \"BMW\",   \"Toyota\" ]); echo cars[0]; ?>'),
(96, 'PHP Constant Arrays', '<?php define(\"cars\", [   \"Alfa Romeo\",   \"BMW\",   \"Toyota\" ]); echo cars[0]; ?>'),
(97, 'Constants are Global', '<?php define(\"GREETING\", \"Welcome to W3Schools.com!\");  function myTest() {   echo GREETING; }   myTest(); ?>'),
(98, 'Constants are Global', '<?php define(\"GREETING\", \"Welcome to W3Schools.com!\");  function myTest() {   echo GREETING; }   myTest(); ?>'),
(99, 'Create a MySQL Database Using MySQLi and PDO', '<?php $servername = \"localhost\"; $username = \"username\"; $password = \"password\";  // Create connection $conn = new mysqli($servername, $username, $password); // Check connection if ($conn->connect_error) {   die(\"Connection failed: \" . $conn->connect_error); }  // Create database $sql = \"CREATE DATABASE myDB\"; if ($conn->query($sql) === TRUE) {   echo \"Database created successfully\"; } else {   echo \"Error creating database: \" . $conn->error; }  $conn->close(); ?>');

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
  `id_role` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `pseudo_users`, `mail_users`, `mdp_users`, `id_role`) VALUES
(2, 'jp', 'JP@JP.fr', 'root', '3'),
(3, 'jpp', 'jpp@jpp.fr', 'jpp', '1'),
(4, 'GGT', 'GGT@GGT.fr', 'gggg', '1');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `avoir_categorie0_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `avoir_tips_FK` FOREIGN KEY (`id_tips`) REFERENCES `t_tips` (`id_tips`);

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
