
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
    <link rel="stylesheet" href="assets/css/add_tips.css">
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
    $l = $bdd->lastInsertId();
  

  
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


<form action="upload.php" method="post" enctype="multipart/form-data">
    Image à envoyer :
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>




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

                                    if (isset($_POST['id_langage'])){$idlang = $_POST['id_langage'];}
                                    else {$idlang= $_GET['idlang'];}


                                $sqlCategorie= "SELECT * FROM categorie c, possede p, langage l WHERE c.id_categorie = p.id_categorie and 
                                p.id_langage=l.id_langage and 
                                p.id_langage=".$idlang."";


                                $requeteCategorie = $bdd->prepare($sqlCategorie);
                                $requeteCategorie->execute();
                                $nbcat = $requeteCategorie->rowcount();

                                ?>
                                    <form action="add_tips.php?action=choix&idlang=<?php echo $idlang;?>" method="post">
                                <?php

                            if ($nbcat >= '1') {

                                ?>
                        
                                <div class="categorie">
                         <select name="id_categorie">
                         <option value=""></option>
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

                             else if ($nbcat == '0') {
                                 
                             }
                            }
                            
// ici creation de cat*
                             


                        ?>
                       
                        <div class="categorie">
                        <input type="name" name="nom_categorie" placeholder="crée_categorie" value="">
                        </div>
                        
                        <div class="titre">
                        <input type="name" name="titre_tips" placeholder="titre" value="">
                        </div>
                        <div class="detaille">
                        <input type="name" name="detail_tips" placeholder="detail" value="">
                        </div>
                        <input type="submit" class="btn"  value="submit">
                        <?php
                        if (isset($_POST['id_langage'])) {
                            ?>
                        <input type="hidden" name="language" value="<?= $_POST['id_langage']  ?>">
                        <?php
                        }
                        ?>
                        </form>

                        <?php
     
                            if (isset($_POST['titre_tips'])) {
        

                                    $reqone = $bdd->prepare("INSERT INTO tips (titre_tips, detail_tips) VALUES (?,?)");
                                    $reqone->execute(array($_POST['titre_tips'], $_POST['detail_tips']));
                                    $tips = $bdd->lastInsertId();

                                    // if ($_POST['id_categorie'] == ''){
                                        
                                        if ($_POST['nom_categorie'] != ''){
                                            $requete = $bdd->prepare("INSERT INTO categorie (nom_categorie, id_image) VALUES(?,?)");
                                            $requete->execute(array($_POST['nom_categorie'], 'imagefictif'));

                                         

                                            $categorie = $bdd->lastInsertId();


                                            $req = $bdd->prepare("INSERT INTO possede (id_categorie, id_langage) VALUES (:cat,:idlang)");
                                            $req->execute(array(
                                                ":cat" => $categorie,
                                                 ":idlang" => $idlang
                                                ));
                                          
                                        }else{
                                           $categorie = $_POST['id_categorie'];
                                        }
                                        echo 'tips crée';

                                    // }else{
                                    //     $categorie = $_POST['id_categorie'];
                                    // }

                                    $Req2 = $bdd->prepare("INSERT INTO avoir (id_tips, id_categorie) VALUES (?, ?)");
                                    $Req2->execute(array($tips, $categorie));

                                    $sql = "INSERT INTO langage (nom_langage) values( :nom_langage)";
                                    $add = $bdd->prepare($sql);
                                    $add->execute(array(
                                        ':nom_langage' => $l,
                            
                                    ));
                                    $sql = "INSERT INTO categorie (nom_categorie) values( :nom_categorie)";
                                    $add = $bdd->prepare($sql);
                                    $add->execute(array(
                                        ':nom_categorie' => $categorie,
                                    ));
                            
                                    // echo "votre tips a bien été ajouter";
                                    // header("Location: liste.php");
                                                 
                            } // fin de mon action choix


                         // fin de isset get action





      
    }
    ?>



</body>

</html>