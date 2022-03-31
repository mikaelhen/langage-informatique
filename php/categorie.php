<?php
session_start();
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

  <div class="box">
    <img src="../assets/img/images.png">
  </div>
  <?php
  $sql = "SELECT * FROM langage WHERE id_langage=".$_GET['id_langage']."";
                                    $requete = $bdd ->prepare($sql);
                                    $requete ->execute(); 
                                    $row =$requete->fetch();
                                    ?>
  <div class="container">
    <article class="box2">
      <img src="../assets/img/PDO.jpg">
    </article>
    
  </div>
  </div>

  </div>

  <?php include "../assets/include/footer.php"; ?>
  </div>
</body>

</html>