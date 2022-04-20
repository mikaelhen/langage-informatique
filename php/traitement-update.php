<?php session_start();
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
        <title>Tips</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
        </script>
        <link rel="stylesheet" href="../assets/css/navbar.css">
        <link rel="stylesheet" href="../assets/css/update.css">
        <link rel="stylesheet" href="../assets/css/footer.css">

    </head>


    <body>
        <header>
            <?php include "../assets/include/navbar.php" ?>
        </header>

        <div class="tips">
            <h2>Tips en PHP</h2>
        </div>
        <?php
        $sql1 = "SELECT * FROM langage WHERE id_langage";
        $requete1 = $bdd->prepare($sql1);
        $requete1->execute();


        $sql2 = "SELECT * FROM categorie WHERE id_categorie";
        $requete2 = $bdd->prepare($sql2);
        $requete2->execute();



        $sql = "SELECT * FROM t_tips WHERE id_tips=:idcat";
        $requete = $bdd->prepare($sql);
        $requete->execute(array(
            ':idcat' => $_GET['id_tips']
        ));
        $row = $requete->fetch(); {
        ?>
<!-- afficher le tips a modifier --> 
            <div class="titre">Titre de tips: <?php echo $row['titre_tips']; ?>
            </div>
            <div class="detail_tips">
                <h3>Détail de tips:</h3>
                <pre class="detail">
        <code>
        <?php echo htmlspecialchars($row['detail_tips']); ?>
        </code>
                </pre>

            </div>
        <?php
        }
        ?>
    <?php } ?>

    <div class="cont_all">

    </div>
    <!-- tips modifier a mettre a jour -->
<form action="" method="post" >
    <div class="titre1">
        <input type="name" name="titre_tips" placeholder="TITRE" value="">
    </div>
    <div class="detaille">
        <input type="name" name="detail_tips" placeholder="DETAILS" value="">
    </div>
    <div class="categorie3">
        <input type="name" name="nom_categorie" placeholder="nom categorie" value="">ou bien
        <select class="selection" name="id_categorie">

            <?php
            while ($categorie = $requete2->fetch()) { ?>

                <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>

            <?php } ?>
    </div>
    </select>
    <select class="selection" name="id_categorie">
        <?php
        while ($langage = $requete1->fetch()) { ?>
            <option value="<?= $langage['id_langage'] ?>"><?= $langage['nom_langage'] ?></option>
        <?php } ?>
    </select>


    <div class="detaille1">
        Image à envoyer :
        <input type="file" name="file">
    </div>
<form>
    <?php

    if (isset($_POST['titre_tips'])) {
        $reqone = $bdd->prepare("UPDATE INTO t_tips (titre_tips, detail_tips) VALUES (?,?)");
        $reqone->execute(array($_POST['titre_tips'], $_POST['detail_tips']));
        $tips = $bdd->lastInsertId();

        // if ($_POST['id_categorie'] == ''){

        if ($_POST['nom_categorie'] != '') {
            $requete = $bdd->prepare("UPDATE categorie SET nom_categorie=:nom_categorie, id_image=id_image WHERE id_categorie=:id_categorie");
            $requete->execute(array(
                ":nom_categorie" => $_POST['nom_categorie'],
                 ":id_image" => $fileName,
                 ":id_categorie" => $_GET['id_categorie']

                ));

            $categorie = $bdd->lastInsertId();


            $req = $bdd->prepare("UPDATE possede SET id_categorie=:id_categorie, id_langage=:id_langage WHERE id_categorie=:id_categorie");
            $req->execute(array(
                ":id_categorie" => $categorie,
                ":id_langage" => $idlang
            ));
            
        } else {
            $categorie = $_POST['id_categorie'];


        }

        $Req2 = $bdd->prepare("UPDATE  avoir SET id_tips=:id_tips, id_categorie=:id_categorie WHERE id_categorie=:id_categorie");
        $Req2->execute(array(
            ":id_tips" => $tips,
            ":id_categorie" => $categorie
        ));

        $sql = "UPDATE langage SET  nom_langage=:nom_langage, WHERE id_langage=:id_langage";
        $add = $bdd->prepare($sql);
        $add->execute(array(
            ':nom_langage' => $langage,
            ':id_langage' => $l

        ));
        $sql = "UPDATE categorie SET nom_categorie=:nom_categorie WHERE  id_categorie=:id_categorie";
        $add = $bdd->prepare($sql);
        $add->execute(array(
            ':nom_categorie' => $categorie,
            ':id_categorie' => $cat
        ));
    }
    var_dump($langage ,$l ,$categorie ,$cat ,$tips)
    ?>




    <div class="container2">
        <button class="btn" type="submit">
            <a href="">
                update un tips</a>
        </button>

        </form>

        <button class="btn">
            <a href="index.php">Retour</a>
        </button>
    </div>
</form>
    </div>
    <?php include "../assets/include/footer.php"; ?>
    </div>

    </body>

    </html>