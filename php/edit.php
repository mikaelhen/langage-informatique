<?php
// die(var_dump($_POST));
session_start();
require_once '../assets/include/bdd.php';
if (!isset($_SESSION['user'])){header('location:index.php?login_err=pas_de_compte');}
else {


<<<<<<< HEAD
    $sqlTips = "SELECT * FROM titre, langage, categorie";
=======
<<<<<<< HEAD
    $sqlTips = "SELECT * FROM titre_tips , langage, categorie";
=======
    $sqlTips = "SELECT tips FROM langage, categorie, titre_tips";
>>>>>>> 2397255eb4c83a84923c7ace87c6d01120ac9a36
>>>>>>> 9c090983faeb5a313341e8d4e8987122c65eeedb
    $requeteTips = $bdd->prepare($sqlTips);
    $requeteTips->execute();
    $tips = $bdd->lastInsertId();
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/edit.css">
        <title>Document</title>
    </head>
    <body>
    <h2>Selection le tips a modifier</h2>

    <div class="tableau">


            <div class="langage">langage</div>

            <div class="categorie">categorie</div>

            <div class="tips">titre tips</div>

            <div class="option">option</div>





    </div>

    <?php foreach ($requeteTips as $table){ ?>
        <div class="tableau">


            <div class="langage"><?php echo $table["nom_langage"];?></div>

            <div class="categorie"><?php echo $table["nom_categorie"];?></div>

            <div class="tips"><?php echo $table["titre_tips"];?></div>

            <div class="option">


            <button>lire</button>
            <button>update</button>
            <button>delete</button>


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
    </body>
    </html>