<?php
// die(var_dump($_POST));
session_start();
require_once '../assets/include/bdd.php';
if (!isset($_SESSION['user'])) {
    header('location:index.php?login_err=pas_de_compte');
} else {

?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/navbar.css">
        <link rel="stylesheet" href="../assets/css/footer.css">
        <link rel="stylesheet" href="../assets/css/add_tips.css">

        <title>Tips</title>
    </head>
    <header>
        <?php include "../assets/include/navbar.php" ?>
    </header>

    <body>

        <?php
        $sqlLangages = "SELECT * FROM langage";
        $requeteLangages = $bdd->prepare($sqlLangages);
        $requeteLangages->execute();
        $l = $bdd->lastInsertId();
        ?>


        <h2>Ajouter un tips</h2>

        <div class="container6">

            <?php

            if (empty($_GET['action'])) {
            ?>

                <form action="add_tips.php?action=choix" method="post">
                    <div class="cont_langue">
                        <div class="langue">choisir votre langage :
                            <select name="id_langage">

                                <?php
                                while ($l = $requeteLangages->fetch()) {

                                ?>

                                    <option value="<?= $l['id_langage'] ?>"><?= $l['nom_langage'] ?></option>

                                <?php
                                }

                                ?>
                            </select>

                        </div>
                    </div>
                    <input type="submit" class="btn" name="submit" value="VALIDER LE LANGUAGE">

                </form>

            <?php
            }
            ?>

        </div>

        <?php


        if (isset($_GET["action"])) {

            if ($_GET["action"] == "choix") {

                if (isset($_POST['id_langage'])) {
                    $idlang = $_POST['id_langage'];
                } else {
                    $idlang = $_GET['idlang'];
                }

                $sqlCategorie = "SELECT * FROM categorie c, possede p, langage l WHERE c.id_categorie = p.id_categorie and 
                                p.id_langage=l.id_langage and 
                                p.id_langage=" . $idlang . "";


                $requeteCategorie = $bdd->prepare($sqlCategorie);
                $requeteCategorie->execute();
                $nbcat = $requeteCategorie->rowcount();

        ?>
                <div class="action">
                    <form action="add_tips.php?action=choix&idlang=<?php echo $idlang; ?>" method="post" enctype="multipart/form-data">
                        <?php

                        if ($nbcat >= '1') {

                        ?>
                            <div class="selec">
                                <select class="selection" name="id_categorie">
                                    <option value="">...</option>

                                    <?php

                                    while ($l = $requeteCategorie->fetch()) {

                                    ?>

                                        <option value="<?= $l['id_categorie'] ?>"><?= $l['nom_categorie'] ?></option>

                                    <?php

                                    } // fin de ma boucle

                                    ?>
                                </select>
                            </div>
                    <?php
                        } // fin de mon else if

                        else if ($nbcat == '0') {
                            echo "aucune categorie existante <br>";
                            echo "crée votre catégorie";
                        }
                    }

                    // ici creation de cat*

                    ?>
                </div>
                <div class="cont_all">
                    <div class="categorie3">
                        <input type="name" name="nom_categorie" placeholder="CREER CATEGORIE" value="">
                    </div>

                    <div class="titre1">
                        <input type="name" name="titre_tips" placeholder="TITRE" value="">
                    </div>
                    <div class="detaille">
                        <input type="name" name="detail_tips" placeholder="DETAILS" value="">
                    </div>

                    <div class="detaille1">
                        Image à envoyer :
                        <input type="file" name="file">
                    </div>

                    .
                    <input type="submit" class="btn1" name="submit" value="Valider">


                    <?php
                    if (isset($_POST['id_langage'])) {
                    ?>


                        <input type="hidden" name="language" value="<?= $_POST['id_langage']  ?>">
                    <?php
                    }
                    ?>

                    </form>

                </div>
        <?php

            if (isset($_POST['titre_tips'])) {


                // Include the database configuration file
                // include '../assets/include/bdd.php';
                $statusMsg = '';



                // File upload path
                $targetDir = "images/";
                $fileName = basename($_FILES["file"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);



                if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
                    // Allow certain file formats
                    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

                    $fileName = uniqid('img_') . '.' . $fileType;


                    if (in_array($fileType, $allowTypes)) {

                        // Upload file to server

                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetDir . $fileName)) {
                            var_dump($targetDir . $fileName);


                            // Insert image file name into database


                            $insert = $bdd->query("INSERT into images (file_name, uploaded_on) VALUES ('" . $fileName . "', NOW())");
                            if ($insert) {
                                $statusMsg = "L'image " . $fileName . " à été upload correctement.";
                            } else {
                                $statusMsg = "L'upload de l'image à échoué, merci de réesssayez.";
                            }
                        } else {
                            $statusMsg = "Malheureusement, il y a eu une erreur lors de l'upload de l'image.";
                        }
                    } else {
                        $statusMsg = 'Désolé, seul les formats suivents sont autorisés : JPG, JPEG, PNG, GIF et PDF.';
                    }
                } else {
                    $statusMsg = 'Merci de choisir un fichier à upload.';
                }

                // Display status message
                echo $statusMsg;

                $reqone = $bdd->prepare("INSERT INTO t_tips (titre_tips, detail_tips) VALUES (?,?)");
                $reqone->execute(array($_POST['titre_tips'], $_POST['detail_tips']));
                $tips = $bdd->lastInsertId();

                // if ($_POST['id_categorie'] == ''){

                if ($_POST['nom_categorie'] != '') {
                    $requete = $bdd->prepare("INSERT INTO categorie (nom_categorie, id_image) VALUES(?,?)");
                    $requete->execute(array($_POST['nom_categorie'], $fileName));

                    $categorie = $bdd->lastInsertId();


                    $req = $bdd->prepare("INSERT INTO possede (id_categorie, id_langage) VALUES (:cat,:idlang)");
                    $req->execute(array(
                        ":cat" => $categorie,
                        ":idlang" => $idlang
                    ));
                } else {
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
    }

        ?>
        <div class="container10">
            <button class="btn">
                <a href="index.php">Retour</a>
            </button>
        </div>
        <div>
            <?php include "../assets/include/footer.php"; ?>
        </div>

    </body>

    </html>