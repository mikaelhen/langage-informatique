<?php session_start();
require_once '../assets/include/bdd.php';
if (!isset($_SESSION['user'])) {
    header('location:index.php?login_err=pas_de_compte');
} 
else {

    $sqladmin = 'SELECT * FROM users WHERE pseudo_users="'.$_SESSION['user'].'"';
    $requeteadmin = $bdd->prepare($sqladmin);
    $requeteadmin->execute();
    $afficheadmin = $requeteadmin->fetch();

    if ($afficheadmin["id_role"] == 3){
        echo "vous etes admin";
    }
    else {header('location:index.php?login_err=pas_admin');}
      


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
        <script src="https://kit.fontawesome.com/f0fc4e252c.js" crossorigin="anonymous"></script>

        <title>edit</title>
    </head>

    <body>
        <?php include "../assets/include/navbar.php" ?>
        <div class="titre_edit">
            <h2>TIPS à modifier</h2>
        </div>
        <div class="tab_all">
            <div class="tableau1">
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

                    <div class="categorie" >
                        <h3><?php echo $table["nom_categorie"]; ?></h3>
                    </div>

                    <div class="tips">
                        <h3><?php echo $table["titre_tips"]; ?></h3>
                    </div>

                    <div class="option">
                        <ul>
                            <li> <a href="tips.php?id_tips=<?php echo $table['id_tips'] ?>">
                            <button><i class="far fa-eye"></i></button></a></li>
                            <li>voir</li>
                        </ul>
                        <ul>
                            <li><a href="update.php?id_tips=<?php echo $table['id_tips'] ?>">
                            <button><i class="fa fa-refresh" aria-hidden="true"></i>
                                    </button> </a></li>
                            <li>update</li>
                        </ul>
                        <ul>
                            <li> <a href="traitement-delete.php?id_tips=<?php echo $table['id_tips'] ?>"><button>
                                <i class="fas fa-trash-alt"></i></button></a></li>
                            <li>supprimer</li>
                        </ul>

                    </div>

                </div>

            <?php } ?>

        <?php } ?>
        </div>
        </div>
        <?php include "../assets/include/footer.php"; ?>
        </div>
    </body>

    </html>