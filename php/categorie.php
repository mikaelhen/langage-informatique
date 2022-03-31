<?php
session_start();
require_once '../assets/include/bdd.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="../assets/css/categorie.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
  <title>Categorie</title>
</head>

<body>
  <?php include "../assets/include/navbar.php" ?>
  <?php
        $sql = "SELECT * FROM langage WHERE id_langage";
        $requete = $bdd->prepare($sql);
        $requete->execute();
        $langage = $requete->fetch();
        ?>
  <div class="box">
  <img src="../assets/img/<?php echo $langage['id_affiche'];?>">
  </div>
  <?php
  $sql = "SELECT * FROM possede p,categorie c,langage l WHERE p.id_langage = l.id_langage and p.id_categorie=c.id_categorie and l.id_langage=" . $_GET['id_categorie'] . "";
  $requete = $bdd->prepare($sql);
  $requete->execute();
  $row = $requete->fetchAll();
  // $sql = "SELECT * FROM langage WHERE id_langage=".$_GET['id_langage']."";
  //                                   $requete = $bdd ->prepare($sql);
  //                                   $requete ->execute(); 
  //                                   $row =$requete->fetch();
  //                                   
  ?>
  <div class="container">
    <?php

    foreach ($row as &$categorie) {
    ?>
      <article class="box2">
        <a href="liste.php?id_tips=<?php echo $categorie['id_categorie'] ?>">
          <img src="../assets/img/<?php echo $categorie['id_image']; ?>">
        </a>
      </article>
    <?php
    }
    ?>
  </div>
  </div>

  </div>

  <?php include "../assets/include/footer.php"; ?>
  </div>
</body>

</html>