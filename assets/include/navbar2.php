<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel=" stylesheet" href="../assets/css/categorie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css%22%3E">
    <link href=" https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css%22%3E">
    <title>Categorie</title>
</head>

<body>

    <div class="navbar">
        <?php if (isset($_SESSION['user'])) { ?>
            <div class='user-content'><?php echo ("connecté en tant que : $_SESSION[user]"); ?></div>
            <div class="deconnection-container">

                <div class="navbar-container">
                    <a href="Deconnection.php">deconnection</a>
                </div><?php } else { ?>
            <?php } ?>
            <div class="logo-container">
                <h1 class="logo">Tips</h1>
            </div>
            </div>
    </div>



</body>

</html>