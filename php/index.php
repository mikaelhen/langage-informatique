<?php session_start();
require_once '../assets/include/bdd.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200&display=swap');
  </style>
  <title>tips</title>
</head>

<body>
  <div class="container-mik">
    <header class="header box">
      <?php include "../assets/include/navbar.php" ?>
    </header>

    <div class="nav box">
      <h1><span style="color: #059862;font-weight: bold;"> TIPS</span> Langage Informatique</h1>
      <p>Bienvenu sur le site d'<span style="color: #059862;font-weight: bold;">échange</span>et de <span style="color: #059862;font-weight: bold;">partage</span> sur le code informatique.<br><br> Ce site est fait dans le but d'apporter ses <span style="color: #059862;font-weight: bold;"> idées</span>, ses <span style="color: #059862;font-weight: bold;"> expériences</span>, d'enrichir ses <span style="color: #059862;font-weight: bold;"> connaissances</span>. </p>
    </div>
    <?php
        $sql = "SELECT * FROM langage WHERE id_langage";
        $requete = $bdd->prepare($sql);
        $requete->execute();
        $row = $requete->fetchAll();
        ?>

    <div class="container">
    <?php

foreach ($row as &$langage) {
?>
      <article class="box1">
                <a href="categorie.php?id_categorie=<?php echo $langage['id_langage'] ?>">
                <img src="../assets/img/<?php echo $langage['id_affiche'];?>">
                </a>
      </article>
      <?php
        }
      ?>
      
    </div>

    <?php include "../assets/include/footer.php"; ?>
  </div>
</body>

</html>