<?php
// die(var_dump($_POST));
session_start();
require_once '../assets/include/bdd.php';
// include 'mesfonctionSQL';
if (!isset($_SESSION['user'])) {
    header('location:index.php?login_err=pas_de_compte');
} else {


    $sql= "SELECT * FROM users u, role r
    WHERE u.id_role= r.id_role";
    $requet_user = $bdd->prepare($sql);
    $requet_user ->execute();
  
// ?>

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
                    <h2>PSEUDO USERS</h2>
                </div>

                <div class="categorie">
                    <h2>MAIL USERS</h2>
                </div>

                <div class="tips">
                    <h2>MDP USERS</h2>
                </div>

                <div class="option">
                    <h2>ROLE USERS</h2>
                </div>

                
                <div class="option">
                    <h2>GESTION</h2>
                </div>

            </div>
        </div>
        <!-- <?php foreach ($requet_user as $table) { ?>
        <div class="tab_all">
            <div class="tableau1">
                <div class="langage">
                    <h2><?php echo $table["pseudo_users"]; ?></h2>
                </div>

                <div class="categorie">
                    <h2><?php echo $table["mail_users"]; ?></h2>
                </div>

                <div class="tips">
                    <h2><?php echo $table["mdp_users"]; ?></h2>
                </div>

                <div class="option">
                    <h2><?php echo $table['nom_role'] ?></h2>
                </div>

            </div>
        </div> -->
        <?php foreach ($requet_user as $table) { ?>
                <div class="tableau">

                    <div class="langage">
                        <h3><?php echo $table["pseudo_users"]; ?></h3>
                    </div>

                    <div class="categorie" >
                        <h3><?php echo $table["mail_users"]; ?></h3>
                    </div>

                    <div class="tips">
                        <h3><?php echo $table["mdp_users"]; ?></h3>
                    </div>

                    <div class="tips">
                        <h3><?php echo $table["nom_role"]; ?></h3>
                    </div>

                    <div class="option">
                        <ul>
                            <li> <a href="tips.php?id_tips=<?php echo $table['nom_role'] ?>">
                            <button><i class="far fa-eye"></i></button></a></li>
                            <li>voir</li>
                        </ul>
                        <ul>
                            <li><a href="update.php?id_role=<?php echo $table['id_role'] ?>">
                            <button><i class="fa fa-refresh" aria-hidden="true"></i>
                                    </button> </a></li>
                            <li>update</li>
                        </ul>
                        <ul>
                            <li> <a href="traitement-delete.php?id_tips=<?php echo $table['id_role'] ?>"><button>
                                <i class="fas fa-trash-alt"></i></button></a></li>
                            <li>supprimer</li>
                        </ul>

                    </div>

                </div>

                <?php } }?>
        <?php } ?>
     
        </div>
        <?php include "../assets/include/footer.php"; ?>
        </div>
    </body>

    </html>