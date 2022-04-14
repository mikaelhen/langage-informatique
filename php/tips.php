<?php session_start();
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
    <title>Tips</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
    <link rel="stylesheet" href="../assets/css/styletips.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">



</head>
<header>
    <?php include "../assets/include/navbar.php" ?>
</header>

<body>


    <div class="tips">Tips en PHP</div>
    <?php


    $sql = "SELECT * FROM t_tips WHERE id_tips=:idcat";
    $requete = $bdd->prepare($sql);
    $requete->execute(array(
        ':idcat' => $_GET['id_tips']
    ));
    $row = $requete->fetch(); {
        // $sql = "SELECT * FROM avoir a,categorie c,tips t WHERE a.id_tips = t.id_tips and c.id_categorie= a.id_categorie and c.id_categorie=".$_GET['id_tips']."";

        // $requete = $bdd->prepare($sql);
        // $requete->execute();
        // $row = $requete->fetch();{
    ?>

        <div class="titre">Titre de tips: <?php echo $row['titre_tips'] . '<br>'; ?>
        </div>
        <div>Détail de tips:
            <pre class="detail">
        <code>
        <?php echo htmlspecialchars($row['detail_tips']); ?>
        </code>

    </pre>

        </div>
    <?php
    }
    ?>

    <button class="btn">
        <a href="add_tips.php">Ajouter un tips</a>
    </button>
    <div class="btn">
        <a href="liste.php">Retour</a>
    </div>


    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
<?php } ?>
</body>

</html>