<?php // die(var_dump($_POST));
session_start();
require_once '../assets/include/bdd.php';
if (!isset($_SESSION['user'])){header('location:index.php?login_err=pas_de_compte');}
else { 

    $sql = "DELETE * FROM t_tips WHERE id_tips=".$_GET['id_tips']."";
    $requete = $bdd->prepare($sql);
    $requete ->execute();
    $row =$requete->fetch();

echo "le tips a été supprimer"
 

    }   