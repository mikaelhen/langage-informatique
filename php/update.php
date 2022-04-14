<?php
// die(var_dump($_POST));
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
        <title>Document</title>
    </head>
    <body>
        <?php
    $sql = "SELECT * FROM t_tips WHERE id_tips=:idcat";
    $requete = $bdd->prepare($sql);
    $requete->execute(array(
        ':idcat' => $_GET['id_tips']
    ));  ?>

  <?php  $row = $requete->fetch(); { ?>
    <div class="titre">Titre de tips: <?php echo $row['titre_tips'] . '<br>'; ?>
    <?php echo htmlspecialchars($row['detail_tips']);
    
  }?>


        

    <?php } ?>
    </body>
    </html>