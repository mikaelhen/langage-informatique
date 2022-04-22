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
        $sql = "SELECT * FROM t_tips tt, avoir a, categorie c
         WHERE  tt.id_tips=a.id_tips
         AND c.id_categorie=a.id_categorie
         AND tt.id_tips=:idcat";
        $requete = $bdd->prepare($sql);
        $requete->execute(array(
            ':idcat' => $_GET['id_tips']
        ));
        $row = $requete->fetch();
        $sqll = "SELECT * FROM langage where id_langage";
        $req1 = $bdd->prepare($sqll);
        $req1->execute();
        $row1 = $req1->fetch();

        ?>

        <form action="traitement-update.php?id_tips=<?php echo $_GET['id_tips']; ?>&action=maj" method="POST">

            <!-- afficher le tips a modifier -->
            <div class="titre">Titre de tips:
                <input type="text" name="titre_tips" value="<?php echo $row['titre_tips']; ?>">

            </div>

            <h3>Détail de tips:</h3>
            <pre class="detail">
                <textarea type= "text" name="detail_tips" class="detail_tips"><?php echo htmlspecialchars($row['detail_tips']); ?></textarea>
                </pre>
        <?php }

    if (isset($_GET['action'])) {
    }

        ?>

        <!-- tips modifier a mettre a jour -->

        <?php

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
        }

        ?>

        <div class="container2">
            <button class="btn" type="submit">
                update un tips
            </button>

        </form>
        <div class="conatiner2">
            <button class="btn">
                <a href="index.php">Retour</a>
            </button>
            <button class="btn">
                <a href="update-categorie.php">update categorie</a>
            </button>
            <button class="btn">
                <a href="update-langage.php?id_tips=<?php echo $row1['id_langage'] ?>">Update langage</a>
            </button>
        </div>

        </div>
        </div>
        <?php include "../assets/include/footer.php"; ?>
        </div>

    </body>

    </html>