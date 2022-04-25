<?php session_start();
require_once '../assets/include/bdd.php';
if (!isset($_SESSION['user']['role= 3']))   {
    header('location:index.php?login_err=pas_de_compte');
} else {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/edit.css">
        <link rel="stylesheet" href="../assets/css/footer.css">
        <link rel="stylesheet" href="../assets/css/navbar.css">
        <script src="https://kit.fontawesome.com/f0fc4e252c.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<header>
     <?php 
     require_once '../assets/include/bdd.php';
     include "../assets/include/navbar.php" ?>
        </header>
  



<div class="titre_edit">
<h2>Espace Membres</h2>
</div>

<?php
// die(var_dump($_POST));


    $sql= "SELECT * FROM users u, role r
    WHERE u.id_role= r.id_role";
    $requet_user = $bdd->prepare($sql);
    $requet_user ->execute();
    

    $sqlrole= "SELECT * FROM role";
    $requeterole = $bdd->prepare($sqlrole);
    $requeterole ->execute();

    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'roles')
        {
            // tu fais un update de id_role en recuperant le post du form OU id_utilisateur = get user

           echo "role ";  echo $_POST['roles'];echo "id user ";  echo $_GET['id_user'];

            $Req2 = $bdd->prepare(
                "UPDATE users SET id_role=:roles WHERE id_users=:users");
            $Req2->execute(array(
                ":roles" => $_POST['roles'],
                ":users" => $_GET['id_user'],
            ));
    
            echo "on change le role ici ";
        }
    }



?>

<table  >
<tr height="35px" >
    <td width="150px" >Pseudo</td>
    <td width="150px">Mail</td>
    <td width="150px">Role</td>
</tr>

<?php

while ($affiche_users = $requet_user->fetch())
{
?>
<tr height="50px" >
    <td><?php echo $affiche_users['pseudo_users'];?></td>
    <td><?php echo $affiche_users['mail_users'];?></td>
    <td>
    <form action="test_user.php?id_user=<?= $affiche_users['id_users'];?>&action=roles" method="POST">

<!-- // Role admin, menbre // -->

<select name="roles">

<option value="<?php echo $affiche_users['id_role'];?>"><?php echo $affiche_users['nom_role'];?></option>

<?php
if ($affiche_users['id_role'] == 1){}
else {
    ?> 
    <option value="1">Membre</option>
    <?php
}
if ($affiche_users['id_role'] == 2){}
else {
    ?> 
    <option value="2">Modérateur</option>
    <?php
}
if ($affiche_users['id_role'] == 3){}
else {
    ?> 
    <option value="3">Administrateur</option>
    <?php
}


if ($affiche_users['id_role'] == 6){}
else {
    ?> 
    <option value="6">Desactiver</option>
    <?php
}
?>

</select>
<input type="submit" value="Valider">
    </form>    
</tr>

<?php
}}
?>


</table>


</body>
</html>