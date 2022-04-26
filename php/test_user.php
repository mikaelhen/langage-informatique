<?php session_start();
require_once '../assets/include/bdd.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/edit.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <script src="https://kit.fontawesome.com/f0fc4e252c.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <?php
        require_once '../assets/include/bdd.php';
        include "../assets/include/navbar_admin.php"
        ?>
    </header>
    <div class="role">
        <?php
        if (!isset($_SESSION['user'])) {
            header('location:index.php?login_err=pas_de_compte');
        }

        // Ici une requete selec where user = session user
        else {

            $sqladmin = 'SELECT * FROM users WHERE pseudo_users="' . $_SESSION['user'] . '"';
            $requeteadmin = $bdd->prepare($sqladmin);
            $requeteadmin->execute();
            $afficheadmin = $requeteadmin->fetch();
        ?>
    </div>

    <div class="titre_edit">
        <h2>Espace Membres</h2>
    </div>
    <div class="membre_tableau">
        <?php
            // die(var_dump($_POST));


            $sql = "SELECT * FROM users u, role r
    WHERE u.id_role= r.id_role";
            $requet_user = $bdd->prepare($sql);
            $requet_user->execute();


            $sqlrole = "SELECT * FROM role";
            $requeterole = $bdd->prepare($sqlrole);
            $requeterole->execute();

            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'roles') {
                    // tu fais un update de id_role en recuperant le post du form OU id_utilisateur = get user

                    echo "role ";
                    echo $_POST['roles'];
                    echo "id user ";
                    echo $_GET['id_user'];

                    $Req2 = $bdd->prepare(
                        "UPDATE users SET id_role=:roles WHERE id_users=:users"
                    );
                    $Req2->execute(array(
                        ":roles" => $_POST['roles'],
                        ":users" => $_GET['id_user'],
                    ));

                    echo "On change le rôle ici ";
                }
            }

        ?>

        <table>

            <div class="tableau">
                <div class="td1">Pseudo</div>
                <div class="td1">Mail</div>
                <div class="td1">Rôle</div>
            </div>


            <?php

            while ($affiche_users = $requet_user->fetch()) {
            ?>

                <div class="tableau">
                    <div class="td"><?php echo $affiche_users['pseudo_users']; ?></div>
                    <div class="td"><?php echo $affiche_users['mail_users']; ?></div>
                    <div class="td">
                        <form action="test_user.php?id_user=<?= $affiche_users['id_users']; ?>&action=roles" method="POST">

                            <!-- // Role admin, menbre // -->

                            <select class="select" name="roles">

                                <option value="<?php echo $affiche_users['id_role']; ?>">
                                    <?php echo $affiche_users['nom_role']; ?></option>

                                <?php
                                if ($affiche_users['id_role'] == 1) {
                                } else {
                                ?>

                                    <option value="1">Membre</option>
                                <?php
                                }
                                if ($affiche_users['id_role'] == 2) {
                                } else {
                                ?>
                                    <option value="2">Modérateur</option>
                                <?php
                                }
                                if ($affiche_users['id_role'] == 3) {
                                } else {
                                ?>
                                    <option value="3">Administrateur</option>
                                <?php
                                }


                                if ($affiche_users['id_role'] == 6) {
                                } else {
                                ?>
                                    <option value="6">Desactiver</option>
                                <?php
                                }
                                ?>

                            </select>
                            <input type="submit" value="Valider">
                        </form>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        </table>
    </div>


</body>
<div class="footer">
    <?php include "../assets/include/footer.php"; ?>
</div>

</html>