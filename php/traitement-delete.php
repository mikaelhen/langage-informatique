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
        // $sql = "DELETE FROM t_tips WHERE id_tips=:idcat";
        // $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        // $requete = $bdd->prepare($sql);
        // $result = $requete->execute(array(
        //     ':idcat' => intval($_GET['id_tips'])
        //     // $stmt = $bdd->query($requete);
        // ));
        // $requete->debugDumpParams();
        
        // header('location: edit.php');
        // $sqlTips = "DELETE t_tips, avoir 
        // FROM t_tips, avoir 
        // where t_tips.id_tips=:idcat
        // AND avoir.id_tips=idcat";
        // $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        // $requete = $bdd->prepare($sqlTips);
        // $requete->execute(array(
        //     ':idcat' => intval($_GET['id_tips'])
        //     // $stmt = $bdd->query($requete);
        //     // var_dump($requete);
        // ));


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