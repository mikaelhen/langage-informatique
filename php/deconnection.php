
<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tips','root','');
}catch(PDOException $e)
{
    die('Erreur' .$e->getMessage());
}

    session_start();
    session_destroy();

    require_once 'bdd.php';

    header("Location:index.php?disc_err=deconnecté")

?>