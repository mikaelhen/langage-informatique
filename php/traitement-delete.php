<?php // die(var_dump($_POST));
session_start();
require_once '../assets/include/bdd.php';
if (!isset($_SESSION['user'])){header('location:index.php?login_err=pas_de_compte');}
else 
{ 
    function deletetips($id)
    {
        try 
        {
            $requete = "DELETE from t_tips where id_tips=:idcat";
            $requete = $bdd->prepare($sql);
            $requete->execute(array(
                ':idcat' => $_GET['id_tips']
                $stmt = $bdd->query($requete);
            ));  ?>
            
            
            
            
            
        }
    }

}