<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/css/navbartest.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="navigation navigation_accueil">
        <div class="burger">
            <span class="line-1"></span>
            <span class="line-2"></span>
            <span class="line-3"></span>
        </div>
        <nav class="nav1">
            <?php
            if (isset($_SESSION['user'])) {
                echo ('Connecté en tant que : ' . $_SESSION['user']); ?>
                <ul>
                    <li class="menu-item">
                        <a href="deconnection.php">deconnection</a>
                    </li>
                <?php
            } else { ?>
                    <li class="menu-item">
                        <a class="pageactive" href="index.php">Accueil</a>
                    </li>
                    <li class="menu-item">
                        <a href="inscription.php">Inscription</a>
                    </li>
                    <li class="menu-item">
                        <a href="connexion.php">Connexion</a>
                    </li>


                    <li class="menu-item">
                        <a href="#">Contact</a>
                    </li>

                </ul>
        </nav>
    </div>
<?php
            }
?>
</body>

</html>