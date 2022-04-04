
<?php
// die(var_dump($_POST));
session_start();
require_once '../assets/include/bdd.php';;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>doc</title>
</head>

<body>

    <?php

    // if (isset($_GET["action"])) {
    //     if ($_GET["action"] == "ajout") {
    //         echo "tu ajoutes ton tips";
    //         $titre = $_POST["titre_tips"];
    //         $detail = $_POST["detail_tips"];
    //     }
    // }

    $sqlLangages = "SELECT * FROM langage";
    $requeteLangages = $bdd->prepare($sqlLangages);
    $requeteLangages->execute();
  

  
    // $sql = "SELECT * FROM langage WHERE id_langage=".$_GET['id_langage']."";
    //                                   $requete = $bdd ->prepare($sql);
    //                                   $requete ->execute(); 
    //                                   $row =$requete->fetch();
    //                                   
    ?>
  
    <?php
  
    // if ($requete1->rowCount() > 0) {
  
  


    ?>
    <h2>Ajouter un tips</h2>
    <div class="container2">

        <?php

if (empty($_GET['action']))
{



?>


        <form action="add_tips.php?action=choix" method="post">
            <div class="langue">
                <select name="id_langage">
                    <?php
                        while($l = $requeteLangages->fetch())
                        {
                            
                        ?>

                        <option value="<?= $l['id_langage']?>"><?= $l['nom_langage'] ?></option>

                    <?php
                        }

                    ?>
                </select>
            </div>
            <input type="submit" class="btn" name="submit" value="submit">
            <a class="btn" href="liste.php">Retour</a>

        </form>

<?php 
}
?>
    </div>
    <?php


                        if(isset($_GET["action"]))
                        {

                            if ($_GET["action"] == "choix")
                            {

                                echo "a partir d'ici on met les autres champs<br>";
                                echo "le langage est : ";
                                echo $_POST['id_langage'];

                                $sqlCategorie = "SELECT * FROM categorie c, possede p, langage l WHERE c.id_categorie = p.id_categorie and 
                                p.id_langage=l.id_langage and 
                                p.id_langage=".$_POST['id_langage']."";
                                $requeteCategorie = $bdd->prepare($sqlCategorie);
                                $requeteCategorie->execute();
                                $nbcat = $requeteCategorie->rowcount();
    
                                echo "nb de cat : <br>";
                                echo $nbcat;

                                
                            
                            if ($nbcat >= '1') {

                                ?>

                                <div class="categorie">
                         <select name="id_categorie">
                        <?php

                                while($l = $requeteCategorie->fetch())
                                {
                        ?>

                        <option value="<?= $l['id_categorie']?>"><?= $l['nom_categorie'] ?></option>

                        <?php
                        } // fin de ma boucle
                         
                        ?>
                        </select>
                        <?php 
                             } // fin de mon else if

                             else if ($nbcat == '0') {}

// ici creation de cat*
                             


                        ?>
                        <form action="add_tips.php?action" method="post">
                        <div class="categorie">
                        <input type="name" name="nom_categorie" placeholder="crée_categorie" value="<?php echo !empty($categorie) ? $categorie : ''; ?>">
                        </div>
                        <div class="titre">
                        <input type="name" name="titre_tips" placeholder="titre" value="<?php echo !empty($titre) ? $titre : ''; ?>">
                        </div>
                        <div class="detaille">
                        <input type="name" name="detail_tips" placeholder="detail" value="<?php echo !empty($detail) ? $detail : ''; ?>">
                        </div>
                        <input type="submit" class="btn" name="submit" value="submit">
                        </form>

                        <?php
                            //                     if (isset($_POST['submit'])) {
                            //                         $sql = "INSERT INTO tips (titre_tips,detail_tips) values( :titre_tips, :detail_tips)";
                            //                             $add = $bdd->prepare($sql);
                            //                             $add->execute(array(
                            //                                 ':titre_tips' => $titre,
                            //                                 ':detail_tips' => $detail
                                                 
                            // } // fin de mon action choix


                        } // fin de isset get action




    //     $sql = "INSERT INTO tips (titre_tips,detail_tips) values( :titre_tips, :detail_tips)";
    //     $add = $bdd->prepare($sql);
    //     $add->execute(array(
    //         ':titre_tips' => $titre,
    //         ':detail_tips' => $detail
    //     ));

    //     echo "votre tips a bien été ajouter";
    //     // Database::disconnect();
    //     header("Location: liste.php");
    }
    ?>



</body>

</html>