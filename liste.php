<?php session_start();
require_once 'assets/include/bdd.php';
?>
<!DOC
TYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
<?php
$sql = "SELECT * FROM tips WHERE id_tips";
                                    $requete = $bdd ->prepare($sql);
                                    $requete ->execute(); 
                                    $row =$requete->fetchAll();
?>
    <h2>LES TIPS</h2>
    <div class="container">
    <ul>
        <?php

foreach ($row as &$tip) {
    ?>
        <li><a href=""><?php echo $tip['titre_tips']?></a></li>
    <?php
}

        ?>

    </ul>
    </div>
    <div class="container">
    <button class="btn">
        <a href="add_tips.php">ajouter un tips</a>
    </button>
    </div>
    </div>
</body>
</html>