<?php
include 'config.php';


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css">
    <link rel="stylesheet" href="../assets/css/styletips.css">


</head>
<body>
    

<div class="tips">Tips en PHP</div>
    <?php
$results = $conn->query('SELECT  * FROM tips');
while($row = $results->fetch())
{


    ?>

<div class="titre">Titre de tips: <?php echo $row['titre_tips'].'<br>';?>
</div>
<div>Détail de tips: 
    <pre  class="detail">
        <code>

            <?php  echo $row['detail_tips'].'<br>'; ?>
        </code>

    </pre>

</div>
<?php
}
?>

<button class="btn">
                <a href="add_tips.php">ajouter un tips</a>
            </button>
            <a class="btn" href="liste.php">Retour</a>



<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>

</body>
</html>