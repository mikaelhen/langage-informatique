<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/inscription.css">
    <title>inscription</title>
</head>

<body>
    <div class="loginBox">
        <form action="inscription.php?action=ajout" method="post">
            <a href="index.php"> <img src="../assets/img/logo2.png" class="user"></a>
            <h2>Inscription</h2>
            <p>Pseudo</p>
            <input type="text" name="pseudo_users" class="form-control" placeholder="pseudo" required="required" autocomplete="off">


            <p>Adresse E-mail</p>
            <input type="email" name="mail_users" class="form-control" placeholder="Email" required="required" autocomplete="off">


            <p>Mot de passe</p>
            <input type="password" name="mdp_users" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">

            <input type="submit" name="" value="Inscription">

            <?php
            include('../assets/include/bdd.php');
            echo "salut";

            if (isset($_GET["action"])) {
                if ($_GET["action"] == "ajout") {



                    if (!empty($_POST)) { // ici on fait le traitement de l'inscription

                        if (isset($_POST['pseudo_users']) && isset( $_POST['mail_users'])&& isset( $_POST['mdp_users'])) {
                            echo ($_POST['pseudo_users']);


                            // $check = $bdd->prepare('SELECT * FROM users WHERE pseudo_users = ?');
                            // $check->execute(array($_POST['pseudo']));
                            // $data = $check->fetch();
                            // $row = $check->rowCount();

                            $pseudo = htmlspecialchars($_POST['pseudo_users']);
                            $email = htmlspecialchars($_POST['mail_users']);
                            $password = htmlspecialchars($_POST['mdp_users']);
                            $check = $bdd->prepare(
                                'SELECT pseudo_users, mail_users, mdp_users, id_role FROM users WHERE pseudo_users =?'
                            );
                            $check->execute(array($pseudo));
                            $data = $check->fetch();
                            $row = $check->rowCount();

                            if ($row == 0) {
                                if (strlen($pseudo) <= 100) {
                                    if (strlen($email) <= 100) {
                                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                            $password = hash('sha1', $password);

                                            $insert = $bdd->prepare('INSERT INTO users(pseudo_users, mail_users, mdp_users, id_role) 
                            VALUES (:pseudo_users, :mail_users, :mdp_users ,1)');
                                            $insert->execute(array(
                                                'pseudo_users' => $pseudo,
                                                'mail_users' => $email,
                                                'mdp_users' => $password,

                                            ));
                                            header('location: connexion.php?reg_err=success');
                                        } else header('location:inscription.php');
                                    } else header('location:inscription.php?reg_err=email');
                                } else header('location:inscription.php?reg_err=email_length');
                            } else header('location:inscription.php?reg_err=pseudo_length');
                        } else header('location:inscription.php?reg_err=already');
            ?>

        </form>
        <div class="compte">
<?php

                    }
                }
            }

?>

        </div>

    </div>

</body>

</html>