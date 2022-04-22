<?php
// die(var_dump($_POST));
session_start();
require_once '../assets/include/bdd.php';
if (!isset($_SESSION['user'])){header('location:index.php?login_err=pas_de_compte');}
else { 
 

?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tips</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
        </script>
        <link rel="stylesheet" href="../assets/css/navbar.css">
        <link rel="stylesheet" href="../assets/css/update.css">
        <link rel="stylesheet" href="../assets/css/footer.css">

    </head>


    <body>
        <header>
            <?php include "../assets/include/navbar.php" ?>
        </header>

        
        <?php
      
    //   $sqll = "SELECT * FROM possede p,categorie c,langage l WHERE p.id_langage = l.id_langage and p.id_categorie=c.id_categorie and l.id_langage=" . $_GET['id_langage'] . "";
    //         $requete = $bdd->prepare($sqll);
    //         $requete->execute();
    //         $row1 = $requete->fetchAll();
        $sql = 
        "SELECT *
         FROM langage l,possede p, categorie c, avoir a,t_tips tt
         where l.id_langage= p.id_langage 
         and c.id_categorie= p.id_categorie 
         and a.id_categorie= a.id_tips 
         and tt.id_tips= a.id_tips
         ";  
        $req1 = $bdd->prepare($sql);
        $req1->execute(array(
            ':id_langage' => $_GET['id_langage']
        ));
        $row1 = $req1->fetch();
 
        ?>

        <form action="update-langage.php?id_langage=<?php echo $row1['id_langage'];?>&action=maj" method="POST">
            
        <div class="tips">
            <h2>Langage a modifier</h2>
            <div type= "text" name="nom_langage" class="nom_langage">
                <?php echo htmlspecialchars($row1['nom_langage']); ?></div>
        </div>

        <!-- <?php
            // $reqone = $bdd->prepare(
            // "UPDATE langage
            // SET nom_langage=:nom_langage, id_langage=:id_langage
            // WHERE id_langage=:id_langage ");
            // $reqone->execute(array(
            // ":nom_langage"=> $_POST['nom_langage'],
            // ":id_langage"=> $_POST['id_langage'],
      
// ));
        ?> -->
            
      
    <?php } ?>


            <div class="container2">
                <button class="btn" type="submit">
                        update un langage
                </button>

        </form>

        <button class="btn">
            <a href="index.php">Retour</a>
        </button>
        </div>
    
    </div>
    <?php include "../assets/include/footer.php"; ?>
    </div>

    </body>
    </html>