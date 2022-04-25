<!-- <?php
        session_start();
        ?> -->

<header>

    <nav>
        <?php
        if (isset($_SESSION['user'])) {
            echo ('Connecté en tant que : ' . $_SESSION['user']); ?>
            <a href="index.php">
                <div class="logo"><img src="../assets/img/logo2.png"></div>
            </a>
            <li><a href="deconnection.php">deconnexion</a></li>
        <?php
        } else { ?>
            <li><a href="inscription.php">Inscription</a></li>
            <a href="index.php">
                <div class="logo"><img src="../assets/img/logo2.png"></div>
            </a>
            <li>
                <a href="connexion.php">Connexion</a>
            </li>
        <?php
        }

        ?>

    </nav>
</header>