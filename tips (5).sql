-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 26 avr. 2022 à 08:45
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
(150, 1),
(3, 2),
(4, 2),
(163, 3),
(5, 12),
(6, 12),
(7, 12),
(101, 12),
(102, 12),
(8, 14),
(9, 14),
(10, 14),
(112, 14),
(113, 14),
(11, 15),
(85, 73),
(86, 73),
(87, 74),
(88, 74),
(91, 75),
(92, 76),
(93, 77),
(96, 77),
(98, 77),
(103, 81),
(104, 81),
(109, 81),
(110, 81),
(111, 81),
(117, 82),
(118, 82),
(119, 82),
(122, 83),
(123, 83),
(124, 84),
(125, 84),
(126, 84),
(127, 85),
(129, 85),
(130, 85),
(131, 85),
(132, 85),
(133, 86),
(134, 86),
(135, 86),
(136, 86),
(137, 87),
(138, 87),
(139, 87),
(140, 87),
(141, 87),
(142, 87),
(143, 87),
(144, 87),
(145, 87),
(146, 87),
(147, 87),
(148, 88),
(149, 88),
(151, 89),
(152, 89),
(153, 89),
(154, 89),
(155, 89),
(156, 89),
(157, 89),
(158, 89),
(160, 89),
(161, 89),
(162, 89);

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
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

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
(77, 'PHP Constants', 'img_62558a303c518.png'),
(81, 'HTML Global Attributes', 'img_625e65c0d501a.jpg'),
(82, 'Python Reference', 'img_625fb9cbd7032.jpg'),
(83, 'C++ Output/Print', 'img_625fc48de111d.png'),
(84, 'Java Variables', 'img_625fc953ab5c7.jpg'),
(85, 'Types de données Java', 'java type of class.jpg'),
(86, 'How To Add CSS', 'img_625fd205826df.jpg'),
(87, 'CSS Layout - The position Property', 'CSS POSITION.jpg'),
(88, 'CSS Layout ', 'img_625fd7cadd96b.jpg'),
(89, 'SQL Keywords Reference', 'img_625feb49465ac.png'),
(92, 'TEST 2', 'img_626276378ed4e.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(35, 'img_62558a652cae3.png', '2022-04-12 16:19:17', '1'),
(36, 'img_625e621e844d3.jpg', '2022-04-19 09:17:50', '1'),
(37, 'img_625e65c0d501a.jpg', '2022-04-19 09:33:20', '1'),
(38, 'img_625fb9cbd7032.jpg', '2022-04-20 09:44:11', '1'),
(39, 'img_625fc48de111d.png', '2022-04-20 10:30:05', '1'),
(40, 'img_625fc953ab5c7.jpg', '2022-04-20 10:50:27', '1'),
(41, 'img_625fd205826df.jpg', '2022-04-20 11:27:33', '1'),
(42, 'img_625fd7cadd96b.jpg', '2022-04-20 11:52:10', '1'),
(43, 'img_625feb49465ac.png', '2022-04-20 13:15:21', '1'),
(44, 'img_625ff5c405fdc.jpg', '2022-04-20 14:00:04', '1'),
(45, 'img_626276378ed4e.jpg', '2022-04-22 11:32:39', '1');

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
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(12, 2),
(14, 2),
(15, 2),
(81, 2),
(83, 3),
(84, 4),
(85, 4),
(82, 5),
(92, 5),
(86, 6),
(87, 6),
(88, 6),
(3, 7),
(89, 7);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'membre'),
(2, 'moderateur'),
(3, 'administrateur'),
(6, 'desactiver');

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
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

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
(99, 'Create a MySQL Database Using MySQLi and PDO', '<?php $servername = \"localhost\"; $username = \"username\"; $password = \"password\";  // Create connection $conn = new mysqli($servername, $username, $password); // Check connection if ($conn->connect_error) {   die(\"Connection failed: \" . $conn->connect_error); }  // Create database $sql = \"CREATE DATABASE myDB\"; if ($conn->query($sql) === TRUE) {   echo \"Database created successfully\"; } else {   echo \"Error creating database: \" . $conn->error; }  $conn->close(); ?>'),
(100, 'HTML_canvas', '<canvas id=\"myCanvas\"> Your browser does not support the canvas tag. </canvas>  <script> var canvas = document.getElementById(\"myCanvas\"); var ctx = canvas.getContext(\"2d\"); ctx.fillStyle = \"#FF0000\"; ctx.fillRect(0, 0, 80, 80); </script>'),
(101, 'HTML_section', '<section> <h2>WWF History</h2> <p>The World Wide Fund for Nature (WWF) is an international organization working on issues regarding the conservation, research and restoration of the environment, formerly named the World Wildlife Fund. WWF was founded in 1961.</p> </section>  <section> <h2>WWF\'s Symbol</h2> <p>The Panda has become the symbol of WWF. The well-known panda logo of WWF originated from a panda named Chi Chi that was transferred from the Beijing Zoo to the London Zoo in the same year of the establishment of WWF.</p> </section>'),
(102, 'HTML_ul', '<ul>   <li>Coffee</li>   <li>Tea</li>   <li>Milk</li> </ul>'),
(103, 'HTML accesskey Attribute', '<a href=\"https://www.w3schools.com/html/\" accesskey=\"h\">HTML</a><br> <a href=\"https://www.w3schools.com/css/\" accesskey=\"c\">CSS</a>'),
(104, 'HTML contenteditable Attribute', '<p contenteditable=\"true\">This is an editable paragraph.</p>'),
(109, 'HTML data- Attributes', '<ul>   <li data-animal-type=\"bird\">Owl</li>   <li data-animal-type=\"fish\">Salmon</li>   <li data-animal-type=\"spider\">Tarantula</li> </ul>'),
(110, 'HTML dir Attribute', '<p dir=\"rtl\">Write this text right-to-left!</p>'),
(111, 'HTML draggable Attribute', 'L\' draggableattribut spécifie si un élément est déplaçable ou non.  Conseil : les liens et les images sont déplaçables par défaut.  Conseil : L\' draggableattribut est souvent utilisé dans les opérations de glisser-déposer. Lisez notre tutoriel HTML Drag and Drop pour en savoir plus.<p draggable=\"true\">This is a draggable paragraph.</p>'),
(112, 'HTML Action Attribute', '<form action=\"/action_page.php\" method=\"get\">   <label for=\"fname\">First name:</label>   <input type=\"text\" id=\"fname\" name=\"fname\"><br><br>   <label for=\"lname\">Last name:</label>   <input type=\"text\" id=\"lname\" name=\"lname\"><br><br>   <input type=\"submit\" value=\"Submit\"> </form>'),
(113, 'HTML  autocomplete Attribute', '<form action=\"/action_page.php\" method=\"get\" autocomplete=\"on\">   <label for=\"fname\">First name:</label>   <input type=\"text\" id=\"fname\" name=\"fname\"><br><br>   <label for=\"email\">Email:</label>   <input type=\"text\" id=\"email\" name=\"email\"><br><br>   <input type=\"submit\"> </form>'),
(117, 'Python all() Function', 'mylist = [0, 1, 1] x = all(mylist)     mytuple = (0, True, False) x = all(mytuple)      myset = {0, 1, 0} x = all(myset) '),
(118, 'Python delattr() Function', 'class Person:   name = \"John\"   age = 36   country = \"Norway\"  delattr(Person, \'age\')'),
(119, 'Python dir() Function', 'class Person:   name = \"John\"   age = 36   country = \"Norway\"  print(dir(Person))'),
(122, 'insert a new line with \\ n', 'using namespace std;  int main() {   cout << \"Hello World! \\n\";   cout << \"I am learning C++\";   return 0; } = Hello World! I am learning C++'),
(123, 'Insert a news line with endl', 'using namespace std;  int main() {   cout << \"Hello World!\" << endl;   cout << \"I am learning C++\";   return 0; }  = Hello World! I am learning C++ '),
(124, 'Variables d\'impression Java', 'String firstName = \"John \"; String lastName = \"Doe\"; String fullName = firstName + lastName; System.out.println(fullName);'),
(125, 'Java déclarer plusieurs variables', 'Vous pouvez également affecter la même valeur à plusieurs variables sur une seule ligne :    int x, y, z; x = y = z = 50; System.out.println(x + y + z); '),
(126, 'Identifiants Java', '// Good int minutesPerHour = 60;  // OK, but not so easy to understand what m actually is int m = 60;'),
(127, 'Types de données Java exemple', 'int myNum = 5;               // Integer (whole number) float myFloatNum = 5.99f;    // Floating point number char myLetter = \'D\';         // Character boolean myBool = true;       // Boolean String myText = \"Hello\";     // String'),
(129, 'Java Numbers', 'byte myNum = 100; System.out.println(myNum);       short myNum = 5000; System.out.println(myNum);       int myNum = 100000; System.out.println(myNum);         long myNum = 15000000000L; System.out.println(myNum); '),
(130, 'Java Boolean Data Types', 'boolean isJavaFun = true; boolean isFishTasty = false; System.out.println(isJavaFun);     // Outputs true System.out.println(isFishTasty);   // Outputs false'),
(131, 'Java Characters', 'char myVar1 = 65, myVar2 = 66, myVar3 = 67; System.out.println(myVar1); System.out.println(myVar2); System.out.println(myVar3);          String greeting = \"Hello World\"; System.out.println(greeting); '),
(132, 'Java Type Casting', 'public class Main {   public static void main(String[] args) {     int myInt = 9;     double myDouble = myInt; // Automatic casting: int to double      System.out.println(myInt);      // Outputs 9     System.out.println(myDouble);   // Outputs 9.0   } }'),
(133, 'Inline CSS', '<!DOCTYPE html> <html> <body>  <h1 style=\"color:blue;text-align:center;\">This is a heading</h1> <p style=\"color:red;\">This is a paragraph.</p>  </body> </html>'),
(134, 'Internal CSS', '<!DOCTYPE html> <html> <head> <style> body {   background-color: linen; }  h1 {   color: maroon;   margin-left: 40px; } </style> </head> <body>  <h1>This is a heading</h1> <p>This is a paragraph.</p>  </body> </html>'),
(135, 'Multiple Style Sheets', ' after   = <head> <link rel=\"stylesheet\" type=\"text/css\" href=\"mystyle.css\"> <style> h1 {   color: orange; } </style> </head>         before =  <head> <style> h1 {   color: orange; } </style> <link rel=\"stylesheet\" type=\"text/css\" href=\"mystyle.css\"> </head>'),
(136, 'CSS Comments', 'Un commentaire CSS est placé à l\'intérieur de l\' <style>élément, et commence par /*et se termine par */:           /* This is a single-line comment */ p {   color: red; }         p {   color: red;  /* Set text color to red */ }            /* This is a multi-line comment */  p {   color: red; }                                           '),
(137, 'CSS position: static;', 'div.static {   position: static;   border: 3px solid #73AD21; }'),
(138, 'CSS position: relative;', 'div.relative {   position: relative;   left: 30px;   border: 3px solid #73AD21; }'),
(139, 'CSS position: fixed;', 'div.fixed {   position: fixed;   bottom: 0;   right: 0;   width: 300px;   border: 3px solid #73AD21; }'),
(140, 'CSS position: absolute;', 'div.relative {   position: relative;   width: 400px;   height: 200px;   border: 3px solid #73AD21; }  div.absolute {   position: absolute;   top: 80px;   right: 0;   width: 200px;   height: 100px;   border: 3px solid #73AD21; }'),
(141, ' CSS position: sticky;', 'div.sticky {   position: -webkit-sticky; /* Safari */   position: sticky;   top: 0;   background-color: green;   border: 2px solid #4CAF50; }'),
(142, 'CSS left Property', 'div.c {   position: absolute;   left: 150px;   width: 200px;   height: 120px;   border: 3px solid green; }'),
(143, 'CSS right Property', 'div.absolute {   position: absolute;   right: 150px;   width: 200px;   height: 120px;   border: 3px solid green; } '),
(144, 'CSS top Property', 'div.b {   position: absolute;   top: -20px;   border: 3px solid blue; }  div.c {   position: absolute;   top: 150px;   border: 3px solid green; }'),
(145, 'CSS position Property', 'h2.pos_left {   position: relative;   left: -20px; }  h2.pos_right {   position: relative;   left: 20px; }'),
(146, 'CSS clip Property', 'Clip ou image =      img {   position: absolute;   clip: rect(0px,60px,200px,0px); }'),
(147, 'CSS bottom Property', 'div.absolute {   position: absolute;   bottom: 10px;   width: 50%;   border: 3px solid #8AC007; }'),
(148, 'CSS Layout - width and max-width', 'div.ex1 {   width: 500px;   margin: auto;   border: 3px solid #73AD21; }  div.ex2 {   max-width: 500px;   margin: auto;   border: 3px solid #73AD21; }'),
(149, 'CSS Layout - The display Property', '<span>  =    span {   display: block; }       <a> = a {   display: block; }      <li> = li {   display: inline; }     visibility:hidden = h1.hidden {visibility: hidden;}     hidden = h1.hidden {display: none;}'),
(150, 'ADD', 'ALTER TABLE Customers ADD Email varchar(255);'),
(151, 'ADD CONSTRAINT', 'ALTER TABLE Persons ADD CONSTRAINT PK_Person PRIMARY KEY (ID,LastName);'),
(152, 'SQL ALL Keyword', 'SELECT ProductName FROM Products WHERE ProductID = ALL (SELECT ProductID FROM OrderDetails WHERE Quantity = 10);'),
(153, 'SQL ALTER Keyword', 'ALTER TABLE  COLUMM =  ALTER TABLE Customers DROP COLUMN Email;             ALTER TABLE Customers ADD Email varchar(255);   '),
(154, 'SQL AND Keyword', 'SELECT * FROM Customers WHERE Country=\'Germany\' AND City=\'Berlin\';'),
(155, 'SQL ANY Keyword', 'ANY = SELECT ProductName FROM Products WHERE ProductID = ANY (SELECT ProductID FROM OrderDetails WHERE Quantity = 10);'),
(156, 'SQL AS Keyword', 'AS = SELECT CustomerID AS ID, CustomerName AS Customer FROM Customers;       Address =    SELECT CustomerName, CONCAT(Address,\', \',PostalCode,\', \',City,\', \',Country) AS Address FROM Customers;\r\n\r\nAlias for Tables = SELECT o.OrderID, o.OrderDate, c.CustomerName FROM Customers AS c, Orders AS o WHERE c.CustomerName=\"Around the Horn\" AND c.CustomerID=o.CustomerID;'),
(157, 'SQL ASC Keyword', 'SELECT * FROM Customers ORDER BY CustomerName ASC;'),
(158, 'SQL BACKUP DATABASE Keyword', 'BACKUP DATABASE testDB TO DISK = \'D:\\backups\\testDB.bak\' WITH DIFFERENTIAL;'),
(160, 'SQL BETWEEN Keyword', 'BETWEEN = SELECT * FROM Products WHERE Price BETWEEN 10 AND 20;          NOT BETWEEN = SELECT * FROM Products WHERE Price NOT BETWEEN 10 AND 20; '),
(161, 'SQL CHECK Keyword', 'MySQL / SQL Server / Oracle / MS Access: = CREATE TABLE Persons (     Age int,     City varchar(255),     CONSTRAINT CHK_Person CHECK (Age>=18 AND City=\'Sandnes\') );'),
(162, 'DROP a CHECK Constraint', 'MySQL: =  ALTER TABLE Persons DROP CHECK CHK_PersonAge;'),
(163, 'test4', '<test>');

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
  `actif_user` int(11) NOT NULL DEFAULT '1',
  `id_role` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `pseudo_users`, `mail_users`, `mdp_users`, `actif_user`, `id_role`) VALUES
(2, 'jp', 'JP@JP.fr', 'root', 1, '3'),
(3, 'jpp', 'jpp@jpp.fr', 'jpp', 1, '1'),
(4, 'GGT', 'GGT@GGT.fr', 'gggg', 0, '6'),
(5, 'lol', 'lol@lol.fr', 'root', 1, '2'),
(6, 'ddd', 'ddd@ddd.fr', '01464e1616e3fdd5c60c0cc5516c1d1454cc4185', 1, '1'),
(8, 'jpb', 'jpb@jpb.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 1, '3'),
(9, 'gggg', 'gggg@gggg.fr', '46295fcb2eee0ac3b097d6e78562910fe9d7f27b', 1, '2');

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
