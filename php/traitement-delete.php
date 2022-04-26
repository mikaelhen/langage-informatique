<?php session_start();
require_once '../assets/include/bdd.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['user'])) {
        header('location:index.php?login_err=pas_de_compte');
    } else {

        $sqladmin = 'SELECT * FROM users WHERE pseudo_users="' . $_SESSION['user'] . '"';
        $requeteadmin = $bdd->prepare($sqladmin);
        $requeteadmin->execute();
        $afficheadmin = $requeteadmin->fetch();

        if ($afficheadmin["id_role"] == 3) {
            echo "vous etes admin";
        } else {
            header('location:index.php?login_err=pas_admin');
        }

        if (isset($_GET['id_tips'])) {

            $sql = "DELETE FROM avoir WHERE id_tips=:idcat";
            $requete = $bdd->prepare($sql);
            $result = $requete->execute(array(
                ':idcat' => $_GET['id_tips']
            ));

            $sql = "DELETE FROM t_tips WHERE id_tips=:idcat";
            $requete = $bdd->prepare($sql);
            $result = $requete->execute(array(
                ':idcat' => $_GET['id_tips']
            ));

            header('location:edit.php?tips_sup');
            echo $_GET['id_tips'];
        }
    }
    ?>
    <div class="container2">
        <button class="btn">
            <a href="edit.php">Retour</a>
        </button>
    </div>
</body>

</html>