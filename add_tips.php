<?php
    session_start();
    require_once 'assets/include/bdd.php';

;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    
<?php 

if (isset($_GET["action"]))
{
if ($_GET["action"] == "ajout")
{
    echo "tu ajoutes ton tips";
    $titre = $_POST["titre_tips"];
    $detail = $_POST["detail_tips"];

}

}

?>
<h2>Ajouter un tips</h2>
<div class="container">
    <form action="add_tips.php?action=ajout" method="post">
        <div class="titre">
            <input type="name" name="titre_tips"placeholder="titre" value="<?php echo !empty($titre)?$titre:''; ?>">
        </div>
        <div class="detaille">
            <input type="name" name="detail_tips" placeholder="detail" value="<?php echo !empty($detail)?$detail:''; ?>">
        </div>
 
        <input type="submit" class="btn btn-success" name="submit" value="submit">
                 <a class="btn" href="liste.php">Retour</a>

    </form>
</div>
<?php

if(isset($_POST['submit']))
{
    $sql = "INSERT INTO tips (titre_tips,detail_tips) values( :titre_tips, :detail_tips)";
        $add = $bdd->prepare($sql);
        $add->execute(array(
            ':titre_tips' => $titre,
            ':detail_tips' => $detail
        ));

        echo "votre tips a bien été ajouter";
        // Database::disconnect();
        header("Location: liste.php");

}
?>



</body>
</html>