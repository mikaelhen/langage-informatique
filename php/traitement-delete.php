<?php // die(var_dump($_POST));
session_start();
require_once '../assets/include/bdd.php';
if (!isset($_SESSION['user']))
{
    header('location:index.php?login_err=pas_de_compte');
}
else 
{
    if (isset($_GET['id_tips']))
    {

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

        echo "on supprime : ";
        echo $_GET['id_tips'];

    }             
}
?>