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
            <input type="text" name="pseudo" class="form-control" placeholder="pseudo" required="required" autocomplete="off">


            <p>Adresse E-mail</p>
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">


            <p>Mot de passe</p>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">

            <input type="submit" name="" value="Inscription">

        </form>
        <div class="compte">
            <?php
            include('../assets/include/bdd.php');

            if (isset($_GET["action"])) {
                if ($_GET["action"] == "ajout") {



                    if (!empty($_POST)) { // ici on fait le traitement de l'inscription

                        if (isset($_POST['pseudo'], $_POST['email'], $_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])) {


                            $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo_users = ?');
                            $check->execute(array($_POST['pseudo']));
                            $data = $check->fetch();
                            $row = $check->rowCount();

                            if ($row == 1) {
                                echo ('pseudo est déja utilisé');
                            } else {


                                $sql = "INSERT INTO utilisateurs (pseudo_users, email_users, mdp_users) 
                        VALUES (:pseudo_users, :email_users,:mdp_users)";

                                $query = $bdd->prepare($sql);

                                // permet de verifier que c'est bien une chaine de caractere
                                $query->bindValue(":pseudo_users", $_POST['pseudo'], PDO::PARAM_STR);
                                $query->bindValue(":email_users", $_POST['email'], PDO::PARAM_STR);
                                $query->bindValue(":mdp_users", $_POST['password'], PDO::PARAM_STR);

                                $query->execute();
                                echo "c'est bon";
                                header("Location:connexion.php");
                            }
                        } else {
                            echo "merci de remplir les champs";
                        }
                    }
                }
            }

            ?>

        </div>

    </div>

</body>

</html>