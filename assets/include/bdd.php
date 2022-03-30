<?php


try {
    $bdd = new PDO('mysql:host=localhost;dbname=tips;charset=utf8', 'root', '');
} catch (Exception $e) {

    die('Erreur' . $e->getMessage());
}

    $user = "root";
    $pass = "";

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=tips;charset=utf8', $user, $pass);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

