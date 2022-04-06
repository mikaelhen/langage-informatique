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
    ?>
    
    <?php
    // Database configuration
    $dbHost     = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbName     = "codexworld";
    
    // Create database connection
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    ?>