<?php session_start();
require_once '../assets/include/bdd.php';
?>
<!DOC TYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/navbar.css">
        <title>Document</title>
    </head>

    <body>
        <?php include "../assets/include/navbar.php" ?>
        <?php

        $sql = "SELECT * FROM avoir a,categorie c,tips t WHERE a.id_tips = t.id_tips and c.id_categorie= a.id_categorie and c.id_categorie=".$_GET['id_tips']."";
 
        $requete = $bdd->prepare($sql);
        $requete->execute();
        $row = $requete->fetchAll();
        ?>
        <h2>LES TIPS</h2>
        <div class="container2">
            <ul>
                <?php

                foreach ($row as &$tip) {
                ?>
                    <li>
                        <a href="tips.php?id_tips=<?php echo $tip['id_tips'] ?>">
                        <?php echo $tip['titre_tips'] ?>
                        </a>
                    </li>
                <?php
                }

                ?>

            </ul>
        </div>
        <div class="container2">
            <button class="btn">
                <b href="add_tips.php">
                    ajouter un tips</b>
            </button>
            <a class="btn" href="liste.php">Retour</a>
        </div>
        </div>
    </body>

    </html>