<?php
session_start();
require_once '../assets/include/bdd.php';
if (!isset($_SESSION['user'])){header('location:index.php?login_err=pas_de_compte');}
else {
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
  $sql = "SELECT * FROM possede p,categorie c,langage l WHERE p.id_langage = l.id_langage and p.id_categorie=c.id_categorie and l.id_langage=" . $_GET['id_categorie'] . "";
  $requete = $bdd->prepare($sql);
  $requete->execute();
  $row = $requete->fetchAll();
  $sql1 = "SELECT * FROM langage WHERE id_langage=:idcat";
  // $sql1 = "SELECT * FROM possede p,categorie c,langage l WHERE p.id_langage = l.id_langage and p.id_categorie=c.id_categorie and l.id_langage=".$_GET['id_categorie']."";
  $requete1 = $bdd->prepare($sql1);
  $requete1->execute(array(
    ':idcat' => $_GET['id_categorie']
  ));
  $row1 = $requete1->fetch();

  // $sql = "SELECT * FROM langage WHERE id_langage=".$_GET['id_langage']."";
  //                                   $requete = $bdd ->prepare($sql);
  //                                   $requete ->execute(); 
  //                                   $row =$requete->fetch();
  //                                   
  ?>

  <?php

  if ($requete1->rowCount() > 0) {

  ?>
    <div class="contenaire5">
      <div class="box3">
        <img src="../assets/img/<?php echo $row1['id_affiche']; ?>">
      </div>
    </div>

  <?php } ?>

  <div class="container">
    <?php
    if ($requete->rowCount() > 0) {

      foreach ($row as &$categorie) {
    ?>
        <article class="box2">
          <a href="liste.php?id_tips=<?php echo $categorie['id_categorie'] ?>">
            <img src="images/<?php echo $categorie['id_image']; ?>">
          </a>
        </article>
    <?php
      }
    }
    ?>
  </div>
  </div>

  </div>
  <div class="container2">
            <button class="btn">
                <a href="add_tips.php">
                    Ajouter un tips</b>
            </button>
            <button class="btn">
                <a href="liste.php">Retour</a>
            </button>
        </div>

  <?php include "../assets/include/footer.php"; ?>
  </div>
  <?php } ?>
</body>

</html>