<?php
// die(var_dump($_POST));
session_start();
require_once '../assets/include/bdd.php';
// include 'mesfonctionSQL';
if (!isset($_SESSION['user'])) {
    header('location:index.php?login_err=pas_de_compte');
} else {


    // $sqlTips = "SELECT * FROM titre_tips , langage, categorie";
    $params = [];
    $sqlTips = "SELECT * FROM t_tips
    INNER JOIN avoir ON t_tips.id_tips = avoir.id_tips
    INNER JOIN categorie ON avoir.id_categorie = categorie.id_categorie
    INNER JOIN possede ON possede.id_categorie = categorie.id_categorie
    INNER JOIN langage ON possede.id_langage = langage.id_langage";
    if (isset($_GET['id_tips'])) {
        $sqlTips = $sqlTips . " WHERE t_tips.id_tips = ?";
        $params = [$_GET['id_tips']];
    }

    // WHERE t_tips.id_tips = ?";
    $requeteTips = $bdd->prepare($sqlTips);
    $requeteTips->execute($params);
    $tips = $bdd->lastInsertId();
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/edit.css">
        <link rel="stylesheet" href="../assets/css/footer.css">
        <link rel="stylesheet" href="../assets/css/navbar.css">

        <title>edit</title>
    </head>

    <body>
        <?php include "../assets/include/navbar.php" ?>
        <div class="titre_edit">
            <h2>Selection le tips a modifier</h2>
        </div>

        <div class="tableau">
            <div class="langage">
                <h2>LANGAGE</h2>
            </div>

            <div class="categorie">
                <h2>CATEGORIE</h2>
            </div>

            <div class="tips">
                <h2>TITRE TIPS</h2>
            </div>

            <div class="option">
                <h2>OPTIONS</h2>
            </div>

        </div>

        <?php foreach ($requeteTips as $table) { ?>
            <div class="tableau">


                <div class="langage">
                    <h3><?php echo $table["nom_langage"]; ?></h3>
                </div>

                <div class="categorie">
                    <h3><?php echo $table["nom_categorie"]; ?></h3>
                </div>

                <div class="tips">
                    <h3><?php echo $table["titre_tips"]; ?></h3>
                </div>

                <div class="option">

                    <a href="tips.php?id_tips=<?php echo $table['id_tips'] ?>"><button>voir</button> </a>
                    <a href="traitement-update.php?id_tips=<?php echo $table['id_tips'] ?>"><button>update</button> </a>
                    <a href="traitement-delete.php?id_tips=<?php echo $table['id_tips'] ?>"><button>delete</button> </a>

                </div>

            </div>

        <?php } ?>


        <!-- <div class="container2">

            <form action="edit.php?action=choix" method="post">

                <div class="Tips">choisssir le tips :
                        <select name="id_tips">
                        
                    <?php
                    // while ($tips = $requeteTips->fetch()) {

                    ?>

                            <!-- <option value="<?= $tips['id_tips'] ?>"><?= $tips['titre_tips'] ?></option> -->

        <?php
        // }

        ?>
        <!-- </select>
                        <input type="submit" class="btn" name="submit" value="validé votre choix">
                
                <a class="btn" href="liste.php">Retour</a> -->

    <?php } ?>
    </div>
    <?php include "../assets/include/footer.php"; ?>
    </div>
    </body>

    </html>