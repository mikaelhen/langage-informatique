<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/connexion.css">

    <title>Document</title>
</head>

<body>
    <div class="loginBox">
        <a href="index.php"> <img src="../assets/img/logo2.png" class="user"></a>
        <h2>Login</h2>
        <form action="connexion.php" method="post">
            <p>Pseudo</p>
            <input type="text" name="pseudo" class="form-control" placeholder="pseudo" required="required" autocomplete="off">
            <p>Mot de passe</p>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            <input type="submit" name="" value="s'identifier">
            <div class="compte">
                <?php
                include('../assets/include/bdd.php');
                if (isset($_POST['pseudo']) && isset($_POST['password'])) {
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $password = htmlspecialchars($_POST['password']);

                    if (isset($_POST['pseudo']) && isset($_POST['password'])) {
                        $pseudo = htmlspecialchars($_POST['pseudo']);
                        $password = htmlspecialchars($_POST['password']);

                        $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo_users = ?');
                        $check->execute(array($pseudo));
                        $data = $check->fetch();
                        $row = $check->rowCount();

                        if ($row == 1) {
                            // $password = hash('sha256', $password);


                            if ($password == $data['mdp_users']) {
                                $_SESSION['user'] = $pseudo;
                                header('Location:index.php');
                            } else
                                echo "Mot de passe incorrect";
                        } else
                            echo "Ce compte n'existe pas !";
                    } else
                        echo "pseudo non valide !";
                }
                ?>
            </div>
            <a href="inscription.php">INSCRIPTION</a>
    </div>

    </form>




</body>

</html>