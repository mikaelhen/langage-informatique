<?php


    $user = "root";
    $pass = "";

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=tips;charset=utf8', $user, $pass);
        $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>