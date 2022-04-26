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
            <?php include "../assets/include/navbar_admin.php" ?>
        </header>

        <div class="tips">
            <h2>Tips en PHP</h2>
        </div>
        <div class="modif">
            <?php
            if (isset($_GET['action'])) {

                if ($_GET['action'] == 'maj') {

                    if (isset($_POST['titre_tips'])) {
                        $reqone = $bdd->prepare(
                            "UPDATE t_tips 
            SET titre_tips=:titre_tips, detail_tips=:detail_tips
            WHERE id_tips=:id_tips "
                        );
                        $reqone->execute(array(
                            ":detail_tips" => $_POST['detail_tips'],
                            ":titre_tips" => $_POST['titre_tips'],
                            ":id_tips" => $_GET['id_tips'],


                        ));
                        $tips = $bdd->lastInsertId();
                        // if ($_POST['nom_categorie'] = '') {

                        // je modifie que le nom categorie + image
                        $sqlcat = "SELECT * FROM categorie WHERE id_categorie=" . $_POST['id_categorie'] . "";
                        $requetecat = $bdd->prepare($sqlcat);
                        $requetecat->execute();
                        $rowcat = $requetecat->fetch();
                        $requete = $bdd->prepare(
                            "UPDATE categorie 
                SET nom_categorie=:nom_categorie
                WHERE id_categorie=:id_categorie "
                        );
                        $requete->execute(array(
                            ":nom_categorie" => $rowcat['nom_categorie'],
                            ":id_categorie" => $_POST['id_categorie'],
                        ));


                        $categorie = $bdd->lastInsertId();


                        $req = $bdd->prepare(
                            "UPDATE possede 
                SET id_langage=:id_langage 
                WHERE id_categorie=:id_categorie"
                        );
                        $req->execute(array(
                            ":id_categorie" => $_POST['id_categorie'],
                            ":id_langage" => $_POST['langage'],
                        ));
                        // } else {
                        //     $categorie = $_POST['id_categorie'];
                        // }

                        $Req2 = $bdd->prepare(
                            "UPDATE  avoir 
            SET id_categorie=:id_categorie
            WHERE  id_tips=:id_tips"
                        );
                        $Req2->execute(array(
                            ":id_tips" => $_GET['id_tips'],
                            ":id_categorie" => $_POST['id_categorie'],
                        ));
                    }
                    echo "La modification est prise en compte";
                }
            }

            $sql1 = "SELECT * FROM langage";
            $requete1 = $bdd->prepare($sql1);
            $requete1->execute();


            $sql2 = "SELECT * FROM categorie ORDER BY nom_categorie ASC";
            $requete2 = $bdd->prepare($sql2);
            $requete2->execute();



            $sql = "SELECT * FROM t_tips tt, avoir a, categorie c, langage l, possede p
         WHERE  tt.id_tips=a.id_tips
         AND c.id_categorie=a.id_categorie
         AND p.id_langage=l.id_langage
         AND p.id_categorie=c.id_categorie
         AND tt.id_tips=:idcat";
            $requete = $bdd->prepare($sql);
            $requete->execute(array(
                ':idcat' => $_GET['id_tips']
            ));
            $row = $requete->fetch();

            ?>

        </div>

        <form action="update.php?id_tips=<?php echo $_GET['id_tips']; ?>&action=maj" method="POST">

            <!-- afficher le tips a modifier -->
            <div class="titre">Titre de tips:
                <input type="text" name="titre_tips" required minlength="1" maxlength="50" size="50" value="<?php echo $row['titre_tips']; ?>"></input>
            </div>
            <div class="detail_tips">
                <h3>Détail de tips:</h3>
                <pre class="detail">
                <textarea cols="100" rows="10" type= "text" name="detail_tips" class="detail_tips"><?php echo htmlspecialchars($row['detail_tips']); ?></textarea>
                </pre>

                <!-- si vous choisissez pas de categorie, choississez une categorie existante -->
            </div>
            <div>
                <select class="selection" name="id_categorie">
                    <option value="<?php echo $row['id_categorie']; ?>">
                        <?php echo $row['nom_categorie']; ?></option>
                    <?php
                    while ($categorie = $requete2->fetch()) {

                        if ($categorie['id_categorie'] == $row['id_categorie']) {
                        } else {

                    ?>

                            <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie']  ?>
                            </option>

                    <?php }
                    } ?>
            </div>
        <?php }
        ?>
        <!-- tips modifier a mettre a jour -->
        </select>
        <div>

            <select class="selection" name="langage">
                <option value="<?= $row['id_langage'] ?>">
                    <?php echo  $row['nom_langage']; ?></option>
                <?php
                while ($langage = $requete1->fetch()) {

                    if ($langage['id_langage'] == $row['id_langage']) {
                    } else {
                ?>
                        <option value="<?= $langage['id_langage'] ?>">
                            <?php echo  $langage['nom_langage']; ?></option>
                <?php
                    }
                } ?>
        </div>
        </select>
        <br> <br>
        <?php
        echo ($langage);
        ?>

        <!-- <div class="detaille1">
            Image à envoyer :
            <input type="file" name="file">
        </div> -->

        </form>
        <div class="container2">
            <button class="btn">
                <a href=""> Mise à jour tips</a>
            </button>
            <button class="btn">
                <a href="index.php">Retour</a>
            </button>
        </div>

        </div>
        <?php include "../assets/include/footer.php"; ?>
        </div>

    </body>

    </html>